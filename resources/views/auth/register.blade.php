@extends('main.main-layout')

@section('title')
    تسجيل عضوية جديدة
@endsection


@section('content')



    <!-- contact-area-start -->
    <div class="contact-area grey-bg pb-100 register-area">
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
                        <span><i class="fal fa-ellipsis-h"></i>الإنضمام لنا <i class="fal fa-ellipsis-h"></i></span>
                        <h1>تسجيل عضوية</h1>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12">
                    <div class="contact-form-area">
                        <form action="{{route('register')}}" class="subscribe contact-post-form contact-form" method="post">
                            @csrf
                            <div class="row">

                                <!-- first Name -->
                                <div class="col-xl-6">
                                    <div class="input-text">
                                        <input type="text" placeholder="الإسم الأول"
                                               class="form-control"
                                               value="{{old('first_name')}}"
                                               name="first_name" required>
                                    </div>
                                </div>
                                <!-- last Name -->
                                <div class="col-xl-6">
                                    <div class="input-text">
                                        <input type="text" placeholder="الإسم الأخير"
                                               class="form-control"
                                               value="{{old('last_name')}}"
                                               name="last_name" required>
                                    </div>
                                </div>

                                <!-- password -->
                                <div class="col-xl-6 password">
                                    <div class="input-text">
                                        <input type="password" placeholder="كلمة المرور"
                                               class="form-control"
                                               name="password" required>
                                        <small id="emailHelp" class="form-text text-danger">يجب ألا تقل عن 8 حروف أو أرقام</small>

                                    </div>
                                </div>

                                <!-- password Confirmation -->
                                <div class="col-xl-6 password">
                                    <div class="input-text">
                                        <input type="password" placeholder="تأكيد كلمة المرور"
                                               class="form-control"
                                               name="password_confirmation" required>
                                    </div>
                                </div>

                                <!-- Email -->
                                <div class="col-xl-12 email">
                                    <div class="input-text email-text">
                                        <input class="form-control"
                                               type="email"
                                               placeholder="البريد الإلكتروني"
                                               value="{{old('email')}}"
                                               required
                                               name="email">
                                        <small id="emailHelp2" class="form-text text-danger">العضوية تتطلب تفعيل البريد الإلكتروني، احرص على كتابة بريد صحيح</small>

                                    </div>
                                </div>

                                <!-- phone number -->
                                <div class="col-xl-4 phone">
                                    <div class="input-text phone-text">
                                        <input class="form-control number_ltr"
                                               type="tel"
                                               placeholder="رقم الهاتف"
                                               value="{{old('phone')}}"
                                               name="phone_number">
                                    </div>
                                </div>

                                <!-- whatsapp-->
                                <div class="col-xl-4 whatsapp">
                                    <div class="input-text phone-text">
                                        <input class="form-control number_ltr"
                                               type="tel"
                                               placeholder="رقم الواتسآب"
                                               value="{{old('whatsapp')}}"
                                               name="whatsapp">
                                    </div>
                                </div>

                                <!-- Gender -->
                                <div class="col-xl-4 gender">
                                    <div class="input-text phone-text">
                                        <select
                                            class="form-control @if($errors->has('gender')) is-invalid @endif text-right"
                                            name="gender" required>
                                            <option data-display="النوع">النوع</option>
                                            <option value="male">ذكر</option>
                                            <option value="female">أنثى</option>
                                        </select>
                                    </div>
                                </div>

                                <!-- country -->
                                <div class="col-xl-6 country">
                                    <div class="input-text phone-text">
                                        <select
                                            class="form-control @if($errors->has('country_id')) is-invalid @endif text-right"
                                            name="country_id" required>
                                            <option data-display="الجنسية">الجنسية</option>
                                            @foreach($countries as $country)
                                                <option value="{{$country->id}}">{{$country->country_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <!-- residence -->
                                <div class="col-xl-6 residence">
                                    <div class="input-text phone-text">
                                        <select
                                            class="form-control @if($errors->has('residence_id')) is-invalid @endif text-right"
                                            name="residence_id" required>
                                            <option data-display="دولة الإقامة">دولة الإقامة</option>
                                            @foreach($residences as $residence)
                                            <option value="{{$residence->id}}">{{$residence->residence_name}}</option>
                                                @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-12 col-md-6 mb-3 d-flex justify-content-center">
                                    <div class="mx-auto">
                                        {!! NoCaptcha::display() !!}
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="lg-btn lg-btn-03 text-center">
                                        <button class="c-btn" type="submit">تسجيل<i class="far fa-long-arrow-alt-left"></i></button>
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
        if($("#errorMsg")){
            $("#errorMsg").delay(5000).slideUp(1000);
        }
    </script>
@endsection
