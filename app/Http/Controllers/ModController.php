<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Residence;
use App\Models\User;
use Carbon\Carbon;
use Flasher\Toastr\Prime\ToastrFactory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class ModController extends Controller
{
    //
    public function index()
    {
        $mods = User::where('role_id', '3')->paginate(20);
        $countries = Country::all();
        $residences = Residence::all();
        return view('cp.moderators.index', compact('mods', 'countries', 'residences'));
    } // End Index


    public function store(Request $request, ToastrFactory $factory)
    {

        //dd($request->all());
        $request->validate([
            'firstName'    => ['required', 'string', 'max:100'],
            'lastName'     => ['required', 'string', 'max:100'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique(User::class),
            ],
            'password'      => ['required', 'string', 'min:8'],
            'phone_number'  =>['required', 'string', 'regex:/^[0-9\-\(\)\/\+\s]*$/'],
            'whatsapp'      =>['required', 'string', 'regex:/^[0-9\-\(\)\/\+\s]*$/'],
            'gender'        =>['required', 'string', 'regex:/^(male|female)$/'],
            'country_id'    =>['required', 'exists:App\Models\Country,id'],
            'residence_id'  =>['required','exists:App\Models\residence,id']
        ]);

        $createdMod = User::create([
            'first_name'        => $request->firstName,
            'last_name'         => $request->lastName,
            'email'             => $request->email,
            'password'          => Hash::make($request->password),
            'phone_number'      =>  $request->phone_number,
            'whatsapp'          => $request->whatsapp,
            'gender'            => $request->gender,
            'country_id'        => $request->country_id,
            'residence_id'      => $request->residence_id,
            'role_id'           => 3,
            'email_verified_at' =>  $request->verified == "on" ? null : Carbon::now()
        ]);

        if ($request->verified == "on"){
            $factory->addWarning('تم تسجيل عضوية المشرف ولكن يجب أن يقوم بتفعيل البريد');
        }else{
            $factory->addSuccess(' تم تسجيل عضوية المشرف ويستطيع تسجيل الدخول');
        }

        return redirect()->back();

    }// End Store

    public function update(Request $request,User $user)
    {
        $data = $request->validate([
            'firstName'    => ['required', 'string', 'max:100'],
            'lastName'     => ['required', 'string', 'max:100'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                "unique:users,email,$user->id",
            ],
            'phone_number'      =>['required', 'string', 'regex:/^[0-9\-\(\)\/\+\s]*$/'],
            'whatsapp'          =>['required', 'string', 'regex:/^[0-9\-\(\)\/\+\s]*$/'],
            'gender'            =>['required', 'string', 'regex:/^(male|female)$/'],
            'country_id'        =>['required', 'exists:App\Models\Country,id'],
            'residence_id'      =>['required','exists:App\Models\residence,id'],
            'password'          =>['nullable', 'min:8'],
            'email_verified_at' =>  ["nullable"]
        ]);

        //dd($data);

        $data['email_verified_at'] = ($request->email_verified_at == 'on' and $user->email_verified_at == null) ? Carbon::now() : null;

        $data['password'] = Hash::make($data['password']);

        $data = array_filter($data);

        //dd($data);
        $user->update($data);


       return redirect()->back();
    } // end update


    public function destroy(Request $request, ToastrFactory $factory)
    {

        $mod = User::where('id',"$request->mod_id")->first();
        //dd($user);

        $mod->delete();

        $factory->addSuccess('تم إيقاف المشرف');

        return redirect()->back();
    }

    public function delete(Request $request, ToastrFactory $factory)
    {

        //Get Mod account
        $mod = User::withTrashed()->where('id',"$request->mod_id")->first();
        // Delete
        $mod->forceDelete();

        $factory->addSuccess('تم حذف المُشرف نهائياً');

        return redirect()->back();
    }


    public function restore(Request $request, ToastrFactory $factory)
    {
        $mod = User::withTrashed()->find($request->mod_id);
        // dd($mod);
        $mod->restore();

        $factory->addSuccess('تم إستعادة المُشرف');

        return redirect()->back();
    }


    public function suspended()
    {
        $mods = User::onlyTrashed()->paginate(5);

        //dd($teachers);
        return view('cp.moderators.suspended', compact('mods'));
    }

} // End Mod Controller
