@extends('main.main-layout')

@section('title')
    طلب كلمة مرور
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

                        @if(session('status'))
                            <div class="alert alert_success" style="
                                animation-delay: .2s;
                                position: absolute;
                                top: 0;
                                z-index: 999;
                                width: 50%;
                                left: 50%;
                                transform: translateX(-50%);
                                height: 100px;

">
                                <div class="alert--icon">
                                    <i class="fas fa-bell"></i>
                                </div>
                                <div class="alert--content">
                                    {{ session('status') }}
                                </div>
                                <div class="alert--close">
                                    <i class="far fa-times-circle"></i>
                                </div>
                            </div>

                        @endif

                        <div class="col-xl-6 col-lg-6 col-md-9">
                            <div class="hero-content mt-80">
                                <h5 style="
    margin-top: -50px;
    padding-bottom: 30px;
">يرجى إدخال بريدكم الإلكتروني المسجل لدينا</h5>
                                <!-- form register -->
                                <form method="POST" action="{{ route('password.email') }}"
                                      class="login-form"
                                >
                                    @csrf
                                    <div class="form-group input-text email-text position-relative">
                                        <input type="email" class="form-control"
                                               aria-describedby="emailHelp"
                                               placeholder="البريد الإلكتروني"
                                               value="{{ old('email') }}"
                                               autofocus
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
                                    <div class="col-12">
                                        <div class="lg-btn lg-btn-02">
                                            <button class="c-btn" type="submit">إستعادة كلمة السر <i
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
