<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Flasher\Toastr\Prime\ToastrFactory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        Validator::make($input, [
            'first_name'    => ['required', 'string', 'max:100'],
            'last_name'     => ['required', 'string', 'max:100'],
            'email'         => [
                                'required',
                                'string',
                                'email',
                                'max:255',
                                Rule::unique(User::class),
            ],
            'password'      => $this->passwordRules(),
            'phone_number'  =>['required', 'string', 'regex:/^[0-9\-\(\)\/\+\s]*$/'],
            'whatsapp'      =>['required', 'string', 'regex:/^[0-9\-\(\)\/\+\s]*$/'],
            'gender'        =>['required', 'string', 'regex:/^(male|female)$/'],
            'country_id'    =>['required', 'exists:App\Models\Country,id'],
            'residence_id'    =>['required', 'exists:App\Models\Residence,id'],
          //  'role_id'       =>['required','regex:/^[1-2]$/'],
            'g-recaptcha-response' => 'required|captcha'

        ])->validate();

        session()->flash('success', 'تم تسجيل عضوية جديدة، يرجى تفعيل الحساب عبر البريد');
        //$factory->addWarning('تم تسجيل عضوية جديدة، يرجى تفعيل الحساب عبر البريد');

        return User::create([
            'first_name'    => $input['first_name'],
            'last_name'     => $input['last_name'],
            'email'         => $input['email'],
            'password'      => Hash::make($input['password']),
            'role_id'       => 2,
            'gender'        => $input['gender'],
            'country_id'    => $input['country_id'],
            'residence_id'  => $input['residence_id'],
            'phone_number'  =>$input['phone_number'],
            'whatsapp'      =>$input['whatsapp']
        ]);
    }
}
