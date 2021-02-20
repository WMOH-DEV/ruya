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


                <p class="text-center text-gray-400 text-2xl">تحديث بياناتك</p>
                <!-- form register -->
                <form action="{{route('user-profile-information.update')}}" class="grid grid-cols-6 gap-x-4 gap-y-2 place-content-center" method="post">
                    @csrf
                    @method('put')
                    <label for="email" class="col-span-6 mt-5">
                        <input type="email" placeholder="البريد الإلكتروني"
                               class="focus:outline-none shadow-sm appearance-none w-full p-2 rounded-md  border @if($errors->has('email')) border-red-500 @else border-gray-300 @endif "
                               name="email" required value="{{ old('email') ?? auth()->user()->email }}">
                    </label>

                    @error('email')
                    <span class="col-span-6 text-red-500 flex items-center" role="alert">
                            <i class="icon-attention ml-2"></i>
                              <strong>{{ $message }}</strong>
                         </span>
                    @enderror


                    <label for="first_name" class="col-span-6 mt-5">
                        <input type="text" placeholder="الإسم الأول"
                               class="focus:outline-none shadow-sm appearance-none w-full p-2 rounded-md  border @if($errors->has('first_name')) border-red-500 @else border-gray-300 @endif "
                               name="first_name" required value="{{ old('email') ?? auth()->user()->first_name }}">
                    </label>

                    <label for="last_name" class="col-span-6 mt-5">
                        <input type="text" placeholder="الإسم الأخير"
                               class="focus:outline-none shadow-sm appearance-none w-full p-2 rounded-md  border @if($errors->has('last_name')) border-red-500 @else border-gray-300 @endif "
                               name="last_name" required value="{{ old('email') ?? auth()->user()->last_name }}">
                    </label>


                <!-- Submit button -->
                    <button class="col-span-6 bg-yellow-600 text-white mt-3 hover:bg-yellow-700 p-2 rounded-md  border-gray-300 border">{{ __('تحديث البيانات') }}</button>

                </form>


            </div>
        </div>

    </div>

@endsection
