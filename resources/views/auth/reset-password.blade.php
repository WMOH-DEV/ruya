@extends('main.main-layout')

@section('title')
   تغيير كلمة المرور
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
                    <div class="row mb-100">
                        <div class="col-xl-6">
                            @if ($errors->any())
                                <div class=" py-3" id="errorMsg">
                                    <ul class="inline-block py-3 px-3 text-danger rounded-md">
                                        @foreach ($errors->all() as $error)
                                            <li><i class="far fa-exclamation-circle"></i> {{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        </div>
                    </div>
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
                                <h3 style="
    margin-top: -50px;
    padding-bottom: 30px;
">استعادة كلمة المرور</h3>
                                <!-- form register -->
                                <form method="POST" action="{{ route('password.update') }}"
                                      class="login-form"
                                >
                                    @csrf
                                    <input type="hidden" name="token" value="{{ request()->token }}">

                                    <div class="form-group input-text email-text position-relative">
                                        <input type="email" class="form-control"
                                               aria-describedby="emailHelp"
                                               placeholder="البريد الإلكتروني"
                                               value="{{ $email ?? old('email') }}"
                                               name="email"
                                               required
                                        >
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
                                    <div class="form-group input-text password  position-relative ">
                                        <input type="password" class="form-control"

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

                                    <div class="form-group input-text password  position-relative ">
                                        <input type="password" class="form-control"

                                               name="password_confirmation"
                                               placeholder=" تأكيد كلمة المرور">
                                    </div>

                                    <div class="col-12">
                                        <div class="lg-btn lg-btn-02">
                                            <button class="c-btn" type="submit">إستعادة كلمة المرور<i class="far fa-long-arrow-alt-left"></i></button>
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
@section('script')
    <script>
        if($("#errorMsg")){
            $("#errorMsg").delay(2000).slideUp(1000);
        }
    </script>
@endsection
