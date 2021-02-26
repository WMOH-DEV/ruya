@extends('main.layout')

@section('title')
    تغيير كلمة المرور
@endsection


@section('content')
    <div class="login-container h-screen flex item-center">

        <div class=" lg:w-5/6 xl:w-4/6  flex flex-col items-center justify-center w-full">
            <div class="register md:w-2/3  xl:px-0 h-2/3 md:mt-8  w-full pt-5 px-10">
                <p class="text-center text-gray-400 md:text-2xl mt-16 text-lg">{{ __('Reset Password') }}</p>
                <!-- form reset -->
                <form method="POST" action="{{ route('password.update') }}"
                      class="grid grid-cols-6 gap-x-4 gap-y-2 place-content-center ">
                    @csrf
                    <input type="hidden" name="token" value="{{ request()->token }}">

                    <label for="email" class="col-span-6 mt-10">
                        {{ __('E-Mail Address') }}
                        <input id="email" type="email" placeholder="البريد الإلكتروني الخاص بك"
                               class="focus:outline-none  appearance-none w-full p-2  border-b border-gray-300 "
                               name="email" value="{{ $email ?? old('email') }}" required autocomplete="email"
                               autofocus>
                    </label>

                    @error('email')
                    <span class="col-span-6 text-red-500 inline-block flex items-center" role="alert">
                            <i class="icon-attention ml-2"></i>
                              <strong>{{ $message }}</strong>
                         </span>
                    @enderror


                    <label for="password" class="col-span-6 mt-2">
                        {{ __('Password') }}
                        <input id="password" type="password"
                               class="focus:outline-none mt-1 appearance-none w-full p-2  border-b border-gray-300 "
                               required autocomplete="new-password" name="password">
                    </label>

                    @error('password')
                    <span class="col-span-6 text-red-500 inline-block flex items-center" role="alert">
                            <i class="icon-attention ml-2"></i>
                              <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                    <label for="password-confirmation" class="col-span-6 mt-2">
                        {{ __('Confirm Password') }}
                        <input id="password" type="password"
                               class="focus:outline-none mt-1 appearance-none w-full p-2  border-b border-gray-300 "
                               required autocomplete="new-password" name="password_confirmation">
                    </label>


                <!-- Submit button -->
                    <button
                        class="col-span-6 bg-yellow-600 text-white mt-8 hover:bg-yellow-700 p-2 rounded-md  border-gray-300 border" type="submit">
                        {{ __('Reset Password') }}
                    </button>

                </form>
@endsection
