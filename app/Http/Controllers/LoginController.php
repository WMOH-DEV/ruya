<?php
namespace App\Http\Controllers;


use Carbon\Carbon;
use Flasher\Toastr\Prime\ToastrFactory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller{
    public function authenticate(Request $request, ToastrFactory $factory){

        $request->validate([
            'email' => ['required','string'],
            'password'=>['required']
        ]);


        // Retrieve Input
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // if success login

            // Update Last Login for All Users
            $current_time = Carbon::now()->toDateTimeString();
            Auth::user()->last_login = $current_time;
            Auth::user()->save();
            //dd(Auth::user()->last_login);
         //   Auth::login(Auth::user());

            $factory->addSuccess('تم تسجيل الدخول بنجاح');
            return redirect('/');

        }
        // if failed login
        $factory->addError('البيانات غير صحيحة');
        return redirect('login');
    }
}
