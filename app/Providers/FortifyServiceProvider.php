<?php

namespace App\Providers;

use App\Actions\Fortify\CreateNewUser;
use App\Actions\Fortify\ResetUserPassword;
use App\Actions\Fortify\UpdateUserPassword;
use App\Actions\Fortify\UpdateUserProfileInformation;
use App\Models\Country;
use App\Models\Residence;
use Illuminate\Support\ServiceProvider;
use Laravel\Fortify\Fortify;

class FortifyServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Fortify::createUsersUsing(CreateNewUser::class);
        Fortify::updateUserProfileInformationUsing(UpdateUserProfileInformation::class);
        Fortify::updateUserPasswordsUsing(UpdateUserPassword::class);
        Fortify::resetUserPasswordsUsing(ResetUserPassword::class);

        // login
        Fortify::loginView(function () {
            return view('auth.login');
        });

        // reg
        Fortify::registerView(function () {
            $countries = Country::all();
            $residences = Residence::all();
            return view('auth.register', compact('countries', 'residences'));
        });

        // forget password
        Fortify::requestPasswordResetLinkView(function () {
            return view('auth.forgot-password');
        });


        // reset password
        Fortify::resetPasswordView(function ($request) {
            return view('auth.reset-password', ['request' => $request]);
        });

        // verify
        Fortify::verifyEmailView(function () {
            return view('auth.verify-email');
        });

    }
}
