@extends('main.layout')

@section('title')
تسجيل الدخول
@endsection

@section('content')

<div class="login-container h-screen flex item-center">

    <div class=" lg:w-5/6 xl:w-4/6  flex flex-col items-center justify-center w-full">
        <div class="register lg:w-2/3 p-10 xl:px-0 h-2/3 mt-8 pt-14 w-full">

            @if (session('status'))
                <div class="text-white mb-3 bg-blue-400 shadow-sm py-2 px-5 rounded-md flex item-center" role="alert">
                    <i class="icon-right-ok"></i>
                    <span class="inline-block">{{ session('status') }}</span>
                </div>
            @endif


            <p class="text-center text-gray-400 text-2xl">تسجيل الدخول</p>
            <!-- form register -->
            <form action="{{route('customLog')}}" class="grid grid-cols-6 gap-x-4 gap-y-2 place-content-center" method="post">
                @csrf
                <label for="email" class="col-span-6 mt-5">
                    <input type="email" placeholder="البريد الإلكتروني"
                           class="focus:outline-none shadow-sm appearance-none w-full p-2 rounded-md  border @if($errors->has('email')) border-red-500 @else border-gray-300 @endif "
                           name="email" required>

{{--                    <span class=" bg-red-100 p-2 w-full rounded-md mt-2 mb-1 text-red-500  @if($errors->has('email')) inline-block @else hidden @endif  ">--}}
{{--                        <i class="icon-bell-alt"></i>--}}
{{--                        البريد الإلكتروني خطأ</span>--}}
                </label>

                @error('email')
                <span class="col-span-6 text-red-500 inline-block flex items-center" role="alert">
                            <i class="icon-attention ml-2"></i>
                              <strong>{{ $message }}</strong>
                         </span>
            @enderror

                <!-- Password Input -->
                <label for="password" class="col-span-6 mt-2">
                    كلمة المرور
                    <input type="password" placeholder="********"
                           class="focus:outline-none mt-1 shadow-sm appearance-none w-full p-2 rounded-md border-gray-300 border"
                           name="password" required>

                </label>

                @error('password')
                <span class="col-span-6 text-red-500 inline-block flex items-center" role="alert">
                            <i class="icon-attention ml-2"></i>
                              <strong>{{ $message }}</strong>
                         </span>
                @enderror

                <!-- Submit button -->
                <button class="col-span-6 bg-yellow-600 text-white mt-3 hover:bg-yellow-700 p-2 rounded-md  border-gray-300 border">تسجيل الدخول</button>
                <hr class=" border-gray-300 col-span-6 mt-3">
                <div class="forget-password col-span-6 mt-3 p-2 text-center">
                    <span>هل نسيت كلمة المرور ؟ <a href="{{route('password.request')}}" class="hover:text-gray-500">إضغط هنا</a></span>
                </div>
            </form>


        </div>
    </div>

</div>

@endsection
