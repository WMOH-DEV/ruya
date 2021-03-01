@extends('main.main-layout')

@section('title')
    تواصل معنا
@endsection


@section('content')

    <!--page-title-area start-->
    <section class="page-title-area"
             style="background-image: url({{url(asset('main/assets/img/bg/page-title-bg-01.jpg'))}});">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 offset-xl-2">
                    <div class="page-title text-center">
                        <h1>الإتصال بنا</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--page-title-area end-->


    <!-- contact-area-start -->
    <div class="contact-area grey-bg pb-100">
        <div class="container">
            @if ($errors->any())
                <div class=" py-3" id="errorMsg">
                    <ul class="inline-block py-3 px-3 text-danger rounded-md">
                        @foreach ($errors->all() as $error)
                            <li><i class="far fa-exclamation-circle"></i> {{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="row">
                <div class="col-xl-6 col-lg-6 offset-lg-3 offset-xl-3">
                    <div class="section-title text-center mb-60">
                        <span><i class="fal fa-ellipsis-h"></i> إبقى دائما على إتصال <i
                                class="fal fa-ellipsis-h"></i></span>
                        <h2>إرسال رسالة إلى الإدارة</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12">
                    <div class="contact-form-area">
                        <form action="{{url('pages/contact/send')}}" class="subscribe contact-post-form contact-form"
                              method="post">
                            @csrf
                            <div class="row">
                                <div class="col-xl-4">
                                    <div class="input-text">
                                        <input class="form-control" type="text" placeholder="الإسم كامل" name="fullName"
                                               required>
                                    </div>
                                </div>
                                <div class="col-xl-4">
                                    <div class="input-text email-text">
                                        <input class="form-control"
                                               type="email"
                                               placeholder="البريد الإلكتروني"
                                               value="{{old('email')}}"
                                               required
                                               name="email">
                                    </div>
                                </div>
                                <div class="col-xl-4">
                                    <div class="input-text phone-text">
                                        <input class="form-control"
                                               type="text"
                                               placeholder="رقم الواتسآب"
                                               value="{{old('whatsapp')}}"
                                               name="whatsapp">
                                    </div>
                                </div>
                                <div class="col-xl-12">
                                    <div class="input-text message-text">
                                        <input class="form-control"
                                               type="text"
                                               placeholder="عنوان الرسالة"
                                               value="{{old('title')}}"
                                               name="title">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="input-text message-text">
                                        <textarea name="message"
                                                  cols="30"
                                                  rows="10"
                                                  placeholder="محتوى الرسالة">@if(old('message')) {{old('message')}} @endif</textarea>
                                    </div>
                                </div>

                                <div class="col-12 col-md-6 offset-md-3 mb-3 d-flex justify-content-center ">
                                    <div class="mx-auto">
                                        {!! NoCaptcha::display() !!}
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="lg-btn lg-btn-03 text-center">
                                        <button class="c-btn" type="submit">إرسال<i
                                                class="far fa-long-arrow-alt-left"></i></button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- contact-area-end -->





@endsection





@section('script')
    {!! NoCaptcha::renderJs('ar') !!}

    <script>
        if ($("#errorMsg")) {
            $("#errorMsg").delay(5000).slideUp(1000);
        }
    </script>
@endsection
