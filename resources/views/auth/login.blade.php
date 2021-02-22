@extends('main.main-layout')

@section('title')
    تسجيل الدخول
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
                                <h3 style="
    margin-top: -50px;
    padding-bottom: 30px;
">تسجيل الدخول</h3>
                                <!-- form register -->
                                <form action="{{route('customLog')}}"
                                      method="post"
                                      class="login-form"
                                >
                                    @csrf
                                    <div class="form-group input-text email-text position-relative">
                                        <input type="email" class="form-control"
                                               aria-describedby="emailHelp"
                                               placeholder="البريد الإلكتروني"
                                        name="email">
                                        @error('email')
                                        <div class="col-span-6 text-danger mt-1"
                                              role="alert"
                                                style="font-size: 12px"
                                        >
                                                            <i class="fal fa-exclamation-triangle"></i>
                                                              <strong>{{ $message }}</strong>
                                                         </div>
                                        @enderror
                                    </div>
                                    <div class="form-group input-text password ">
                                        <input type="password" class="form-control position-relative"

                                               name="password"
                                               placeholder="كلمة المرور"

                                        >
                                        @error('password')
                                        <div class="col-span-6 text-danger mt-1"
                                             role="alert"
                                             style="font-size: 12px"
                                        >
                                            <i class="fal fa-exclamation-triangle"></i>
                                            <strong>{{ $message }}</strong>
                                        </div>
                                        @enderror

                                    </div>


                                    <div class="col-12">
                                        <div class="lg-btn lg-btn-02">
                                            <button class="c-btn" type="submit">تسجيل الدخول <i class="far fa-long-arrow-alt-left"></i></button>
                                        </div>
                                    </div>
                                </form>

                                <div class="forget-password col-span-6 mt-3 p-2 text-center">
                                        <span>هل نسيت كلمة المرور ؟ <a href="{{route('password.request')}}"
                                                                       class="hover:text-gray-500">إضغط هنا</a></span>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- hero-area end -->




@endsection
