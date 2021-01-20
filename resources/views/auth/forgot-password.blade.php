@extends('main.layout')

@section('title')
    طلب كلمة مرور
@endsection


@section('content')
<div class="login-container h-screen flex item-center">

    <div class=" lg:w-5/6 xl:w-4/6  flex flex-col items-center justify-center w-full">
        <div class="register md:w-2/3  xl:px-0 h-2/3 md:mt-8  w-full pt-14 px-10">

            @if (session('status'))
                <div class="text-white bg-blue-400 shadow-sm py-2 px-5 rounded-md flex item-center" role="alert">
                   <i class="icon-right-ok"></i>
                    <span class="inline-block">{{ session('status') }}</span>
                </div>
            @endif

            <p class="text-center text-gray-400 md:text-2xl mt-16 text-lg">يرجى إدخال بريدكم الإلكتروني المسجل لدينا</p>
            <!-- form register -->
            <form method="POST" action="{{ route('password.email') }}" class="grid grid-cols-6 gap-x-4 gap-y-2 place-content-center ">
                @csrf
                <label for="email" class="col-span-6 mt-10">
                    <input type="email" placeholder="البريد الإلكتروني"
                           class="focus:outline-none  appearance-none w-full p-2  border-b border-gray-300 "
                           name="email" required autofocus value="{{ old('email') }}">
                </label>


                @error('email')
                <span class="col-span-6 text-red-500 inline-block flex items-center" role="alert">
                            <i class="icon-attention ml-2"></i>
                              <strong>{{ $message }}</strong>
                         </span>
            @enderror

                <!-- Submit button -->
                <button class="col-span-6 bg-yellow-600 text-white mt-8 hover:bg-yellow-700 p-2 rounded-md  border-gray-300 border">إستعادة كلمة السر</button>

            </form>


        </div>
    </div>

</div>

@endsection
