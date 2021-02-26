@extends('main.layout')

@section('title')
    تفعيل البريد الالكتروني
@endsection


@section('content')
<div class="login-container h-screen flex item-center">

    <div class=" lg:w-5/6 xl:w-4/6  flex flex-col items-center justify-center w-full">
        <div class="register md:w-2/3  xl:px-0 h-2/3 md:mt-8  w-full pt-14 px-10">
            @if(session('status') == "verification-link-sent")
                <div class="alert text-sm text-red-500">
                    تم إرسال رابط تحقق جديد إلى عنوان البريد الإلكتروني الذي قمت بالتسجيل به
                </div>
            @endif
            <p class="text-center text-gray-400 md:text-2xl mt-16 text-lg">لقد تم ارسال رسالة تأكيد على بريدكم، يرجى تفعيل بريدكم الإلكتروني لمواصلة تصفح الموقع</p>
            <!-- form register -->

            <form method="post"  action="{{route('verification.send')}}" class="grid grid-cols-6 gap-x-4 gap-y-2 place-content-center ">
               @csrf

                <!-- Submit button -->
                <button id="emailBtn--js" disabled class="col-span-6 bg-yellow-600 text-white mt-8 hover:bg-yellow-700 p-2 rounded-md  border-gray-300 border">إعادة إرسال البريد</button>
                <div class="text-sm text-red col-span-6 " id="button-text"></div>
            </form>


        </div>
    </div>

</div>

@endsection

@section('script')

    <script>
        $(function() {
            setTimeout(function(){ $('#emailBtn--js').attr("disabled", false); }, 10000);
        });
    </script>


@endsection
