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
    }


    public function store(Request $request, ToastrFactory $factory, User $user)
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
            'country_id'    =>['required', 'regex:/^1?[0-9]$/'],
            'residence_id'  =>['required','regex:/^[1-2]$/']
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

    }


} // End Mod Controller
