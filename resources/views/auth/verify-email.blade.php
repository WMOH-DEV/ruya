@extends('main.main-layout')

@section('title')
    تفعيل البريد الإلكتروني
@endsection

@section('content')

    <!-- hero-area start -->
    <section class="hero-area pos-rel">
        <div class="slider-img d-none d-sm-block">
        </div>
        <div class="hero-slider">
            <div
                class="single-slider slider-height d-flex align-items-center"
                data-background="{{asset('main')}}/assets/img/slider/01.rtl.jpg"
            >
                <div class="container">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-9">
                            <div class="hero-content mt-80">

                                @if(session('status') == "verification-link-sent")
                                    <div class="alert alert-danger" style="animation-delay: .2s">
                                        <div class="alert--icon">
                                            <i class="fas fa-bell"></i>
                                        </div>
                                        <div class="alert--content">
                                            تم إرسال رابط تحقق جديد إلى عنوان البريد الإلكتروني الذي قمت بالتسجيل به
                                        </div>
                                        <div class="alert--close">
                                            <i class="far fa-times-circle"></i>
                                        </div>
                                    </div>

                                @endif

                                <h6 class="text-center" style="margin-top: -50px;padding-bottom: 30px;">
                                    يرجى تفعيل بريدك الإلكتروني، حتى تتمكن من مواصلة التصفح.
                                </h6>


                                <!-- form register -->
                                <form method="post" action="{{route('verification.send')}}"
                                      class="login-form"
                                >
                                    @csrf

                                    <div class="col-12">
                                        <div class="lg-btn lg-btn-02">
                                            <button class="c-btn w-100" type="submit">إعادة إرسال البريد <i
                                                    class="far fa-long-arrow-alt-left"></i></button>
                                        </div>
                                    </div>
                                </form>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- hero-area end -->




@endsection
