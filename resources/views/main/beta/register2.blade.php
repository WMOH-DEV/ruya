@extends('main.layout')

@section('title')
    تسجيل عضوية جديدة
@endsection


@section('content')
<div class="login-container h-screen flex item-center">

    <div class=" lg:w-5/6 xl:w-4/6  flex flex-col items-center justify-center w-full">
        <div class="register lg:w-2/3 p-5 md:p-10 xl:px-0 h-2/3 mt-8  w-full">
            <p class="text-center text-gray-400 text-xl md:text-2xl">تسجيل عضوية جديدة</p>


{{--        @if($errors->any())--}}
{{--            {!! implode('', $errors->all('<div>:message</div>')) !!}--}}
{{--        @endif--}}

            <!-- form register -->
            <form action="{{route('register')}}" class="grid grid-cols-6 gap-x-4 gap-y-2 place-content-center " method="post">
                @csrf
                <label for="first_name" class="col-span-6 mt-5 md:col-span-3">

                    <!-- First name inout -->
                    <input type="text" placeholder="الإسم الأول"
                           class="focus:outline-none shadow-sm appearance-none w-full p-2 rounded-md border-gray-300 border"
                           name="first_name" required>
                </label>
                <label for="last_name" class="col-span-6 mt-5 md:col-span-3">

                    <!-- Last name inout -->
                    <input type="text" placeholder="الإسم الأخير"
                           class="focus:outline-none shadow-sm  w-full p-2 rounded-md  border-gray-300 border"
                           name="last_name" required>
                </label>
                <!-- Password Input -->
                <label for="password" class="col-span-3 mt-2">
                    كلمة المرور
                    <input type="password" placeholder="********"
                           class="focus:outline-none mt-1 shadow-sm appearance-none w-full p-2 rounded-md border-gray-300 border"
                           name="password" required>
                </label>
                <label for="password_confirmation" class="col-span-3 mt-2">
                    إعادة كلمة المرور
                    <input type="password" placeholder="********"
                           class="focus:outline-none mt-1 shadow-sm  w-full p-2 rounded-md  border-gray-300 border"
                           name="password_confirmation" required>
                </label>

                <!-- Email Input -->
                <label for="email" class="col-span-6 mt-2">
                    <input type="email" placeholder="البريد الإلكتروني الخاص بكم"
                           class="focus:outline-none mt-1 shadow-sm  w-full p-2 rounded-md  border-gray-300 border"
                           name="email" required>
                    <span class=" bg-red-100 p-2 w-full rounded-md my-1 text-red-500  @if($errors->has('email')) inline-block @else hidden @endif  ">
                        <i class="icon-bell-alt"></i>
                        البريد الإلكتروني خطأ</span>
                </label>

                <!-- Phone Input -->
                <label for="phone_number" class="col-span-3 mt-2">
                    رقم الهاتف
                    <input type="tel" placeholder="+966xxxxxxxxx"
                           class="focus:outline-none mt-1 shadow-sm  w-full p-2 rounded-md  border-gray-300 border"
                           name="phone_number" required>
                    <span class=" bg-red-100 p-2 w-full rounded-md my-1 text-red-500  @if($errors->has('phone_number')) inline-block @else hidden @endif  ">
                        <i class="icon-bell-alt"></i>
                       رقم الهاتف غير صحيح</span>
                </label>
                <!-- Whatsapp Input -->
                <label for="whatsapp" class="col-span-3 mt-2">
                    رقم الواتسآب
                    <input type="tel" placeholder="+966xxxxxxxxx"
                           class="focus:outline-none mt-1 shadow-sm  w-full p-2 rounded-md  border-gray-300 border"
                           name="whatsapp" required>
                    <span class=" bg-red-100 p-2 w-full rounded-md my-1 text-red-500  @if($errors->has('whatsapp')) inline-block @else hidden @endif  ">
                        <i class="icon-bell-alt"></i>
                       رقم الواتسآب غير صحيح</span>
                </label>

                <!-- Gender Input -->
                <label for="gender" class="col-span-2 mt-2">
                    النوع
                    <select
                        class="focus:outline-none mt-1 shadow-sm @if($errors->has('gender')) border-red-700 border-2 @else border-gray-300 border  @endif  w-full p-2 rounded-md  appearance-none"
                        name="gender" required>
                        <option value="male">ذكر</option>
                        <option value="female">أنثى</option>
                    </select>

                </label>

                <!-- Country Input -->
                <label for="country_id" class="col-span-2 mt-2">
                    الجنسية
                    <select
                        class="focus:outline-none mt-1 shadow-sm  w-full p-2 rounded-md  @if($errors->has('country_id')) border-red-700 border-2 @else border-gray-300 border  @endif  appearance-none"
                        name="country_id" required>
                        <option value="1">مصر</option>
                        <option value="2">السعودية</option>
                        <option value="3">الإمارات العربية المتحدة</option>
                        <option value="4">البحرين</option>
                        <option value="5">عمان</option>
                        <option value="6"> قطر</option>
                        <option value="7">الكويت</option>
                        <option value="8">اليمن</option>
                        <option value="9">الجزائر</option>
                        <option value="10">تونس</option>
                        <option value="11">المغرب</option>
                        <option value="12">ليبيا</option>
                        <option value="13">السودان</option>
                        <option value="14">موريتانيا</option>
                        <option value="15">الأردن</option>
                        <option value="16">سوريا</option>
                        <option value="17">العراق</option>
                        <option value="18">لبنان</option>
                        <option value="19">فلسطين</option>
                    </select>

                </label>

                <!-- Role Input -->

                <label for="role" class="col-span-2 mt-2">
                    نوع العضوية
                    <select
                        class="focus:outline-none mt-1 shadow-sm  w-full p-2 rounded-md  @if($errors->has('role_id')) border-red-700 border-2 @else border-gray-300 border  @endif  appearance-none"
                        name="role_id" required>
                        <!--                        <option value="" class="p-2 rounded-t-lg" disabled selected>نوع العضوية</option>-->
                        <option value="2" class="p-2 rounded-t-lg">طالب</option>
                        <option value="1" class="p-2 rounded-b-lg">معلم</option>
                    </select>

                </label>

                <!-- Submit button -->
                <button
                    class="col-span-6 bg-yellow-600 text-white mt-3 hover:bg-yellow-700 p-2 rounded-md  border-gray-300 border">
                    التسجيل
                </button>

            </form>


        </div>
    </div>

</div>


@endsection
