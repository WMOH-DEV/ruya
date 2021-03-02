@extends('main.main-layout')


@section('title')أكاديمية رؤية@endsection



@section('content')

    <!-- hero-area start -->
    <section class="hero-area pos-rel">
        <div class="slider-img d-none d-sm-block">
            <img class="img-fluid" alt="" />
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
                                <div class="home-msgs">
                                    {{--  <!-- For New users --> --}}
                                    @if( session()->has('success'))
                                    <div class="alert alert_info" style="animation-delay: .2s">
                                        <div class="alert--icon">
                                            <i class="fas fa-bell"></i>
                                        </div>
                                        <div class="alert--content">
                                            {{session()->get('success')}}
                                        </div>
                                        <div class="alert--close">
                                            <i class="far fa-times-circle"></i>
                                        </div>
                                    </div>
                                    @endif


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
                                <div class="hero-slider-caption">
											<span data-animation="fadeInUp" data-delay=".5s">
												مرحبا بكم في أكاديمية رؤية
											</span>
                                    <i class="fal fa-ellipsis-h"></i>

                                    <h2
                                        class="mb-45"
                                        data-animation="fadeInUp"
                                        data-delay=".7s"
                                    >
                                        أفضل الدورات، أمهر المُعلمين
                                    </h2>
                                    <form class="slider-search-form" action="{{route('results')}}" method="get">
                                        <input type="text"
                                               name="subject"
                                               class="position-relative"
                                               placeholder="البحث عن مادة.."
                                        />


                                        <label for="stage" class="home--stages">
                                            <select name="stage" id="">
                                                <option data-display="إختر المرحلة">إختر المرحلة</option>
                                                @foreach($stages as $stage)
                                                    <option value="{{$stage->id}}">{{$stage->stage_name}}</option>
                                                @endforeach
                                            </select>
                                        </label>
                                        <button type="submit">
                                            <i class="far fa-search"></i>
                                        </button>
                                    </form>
                                </div>
                                <div class="row support-area align-items-center">
                                    <div class="col-xl-6">
                                        <p style="font-size: 12px">
                                            لا تتردد بالاتصال والاستفسار عن أي مادة أو دورة، متاح
                                            رقم الواتسآب للتواصل دائماً
                                        </p>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="support d-flex align-items-center">
                                            <div class="support-icon">
                                                <!-- <i class="fal fa-user-headset"></i> -->
                                                <i class="flaticon-24-hours"></i>
                                            </div>
                                            <div class="support-text">
                                                <span>تواصل معنا</span>
                                                <h6 class="number_ltr">{{$home->support_whatsapp ?? "000"}}</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- hero-area end -->

    <!-- counter-area-start -->
    <div class="counter-area pb-100">
        <div class="container">
            <div class="counter-bg">
                <div class="row">
                    <div class="col-xl-3 col-lg-3 col-md-6">
                        <div class="counter-wrapper mb-30">
                            <div class="counter-icon f-left">
                                <i class="fal fa-users"></i>
                            </div>
                            <div class="counter-text">
                                <h1><span class="counter">{{$home->trusted_student ?? "00"}}</span>+</h1>
                                <span>طلاب وثقوا بنا</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-6">
                        <div class="counter-wrapper mb-30">
                            <div class="counter-icon f-left">
                                <i class="fal fa-books"></i>
                            </div>
                            <div class="counter-text">
                                <h1><span class="counter">{{$home->courses_student ?? "00"}}</span>+</h1>
                                <span>دورات متاحة</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-6">
                        <div class="counter-wrapper mb-30">
                            <div class="counter-icon f-left">
                                <i class="fal fa-graduation-cap"></i>
                            </div>
                            <div class="counter-text">
                                <h1><span class="counter">{{$home->total_teachers ?? "00"}}</span>+</h1>
                                <span>المُعلمين</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-6">
                        <div class="counter-wrapper mb-30">
                            <div class="counter-icon f-left">
                                <i class="fal fa-laptop-code"></i>
                            </div>
                            <div class="counter-text">
                                <h1><span class="counter">{{$home->total_requests ?? "00"}}</span>+</h1>
                                <span>طلبات الدراسة</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- counter-area-end -->

    <!-- course-cat-area-start -->
    <div class="course-cat-area pb-100">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6 offset-lg-3 offset-xl-3">
                    <div class="section-title text-center mb-60">
								<span
                                ><i class="fal fa-ellipsis-h"></i> آخر التصنيفات
									<i class="fal fa-ellipsis-h"></i
                                    ></span>
                        <h2>تصنيفات الكورسات</h2>
                    </div>
                </div>
            </div>
            <div class="row">

                @foreach($cats as $cat)
                <div class="col-xl-3 col-lg-3 col-md-6">
                    <div class="course-cat-wrapper mb-30">
                        <div class="course-cat-img">
                            <a href="{{url('courses')}}"
                            ><img src="{{asset('uploads')}}/{{$cat->image}}"
                                  style="height: 236px"
                                  alt=""
                                /></a>
                        </div>
                        <div class="course-cat-text">
                            <h4 style="font-size: 18px;">
                                <a href="{{url('courses')}}">{{$cat->name}}</a>
                            </h4>
                            <span style="font-size: 14px;">{{$cat->short_name}}</span>
                            <div class="course-cat-meta">
										<span
                                        ><i class="far fa-users"></i>250</span
                                        >
                                <span
                                ><i class="far fa-book"></i>
											<a href="javascript:void(0);">كورسات</a></span
                                >
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach


            </div>
        </div>
    </div>
    <!-- course-cat-area-end -->

    <!-- course-area-start -->
    <div class="course-area pt-130 pb-100 black-bg">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6 offset-lg-3 offset-xl-3">
                    <div class="section-title section-title-theme text-center mb-75">
								<span
                                ><i class="fal fa-ellipsis-h"></i> كورسات مميزة
									<i class="fal fa-ellipsis-h"></i
                                    ></span>
                        <h2 class="text-white">آخر الكورسات المُضافة</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($courses as $course)
                <div class="col-xl-4 col-lg-4 col-md-6">
                    <div class="course-wrapper white-bg mb-30">
                        <div class="course-inner">
                            <div class="course-img pos-rel mb-25">
                                <a href="{{url('courses')}}/{{$course->id}}"
                                ><img src="{{asset('uploads')}}/{{$course->intro_image}}"
                                      style="height: 15.6rem"
                                      alt=""
                                    /></a>
                                <div
                                    class="course__instructor pos-abl d-flex align-items-center"
                                >
                                    <div class="course__instructor--thumb">
                                        <img src="{{asset('uploads/default.png')}}"
                                             style="height: 50px"
                                             alt="" />
                                        <h5 style="font-size: 0.9rem">{{$course->instructor}}</h5>
                                    </div>
                                    <div class="course__instructor--price-tag">
                                        <span>{{$course->price}}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="course-text">
                                <div
                                    class="course-cat-meta d-flex align-items-center mb-15"
                                >
                                    <span><a href="{{url('courses')}}">{{$course->category->name}}</a></span>
                                    <div class="review-icon">
                                        <a href="javascript:void(0);"><i class="fas fa-star-half-alt"></i></a>
                                        <a href="javascript:void(0);"><i class="fas fa-star"></i></a>
                                        <a href="javascript:void(0);"><i class="fas fa-star"></i></a>
                                        <a href="javascript:void(0);"><i class="fas fa-star"></i></a>
                                        <a href="javascript:void(0);"><i class="fas fa-star"></i></a>
                                    </div>
                                </div>
                                <h4 class="semi-title pb-30 mb-20">
                                    <a href="{{url('courses')}}"
                                    >{{$course->title}}</a
                                    >
                                </h4>
                                <div class="course-meta">
											<span class="number_ltr"
                                            ><i class="far fa-users"></i> <a href="javascript:void(0);">25</a></span
                                            >
                                    <span class="text-sm"
                                    ><i class="fal fa-clock"></i> <a href="javascript:void(0);" style="font-size: 0.7rem">{{$course->duration}} </a></span
                                    >
                                    <span class="text-sm"
                                    ><i class="fal fa-tv"></i> <a href="javascript:void(0);" style="font-size: 0.7rem"> {{$course->lectures ?? "50"}} محاضرة</a></span
                                    >
                                </div>
                            </div>
                        </div>
                        <div class="course-text course-text-02 theme-bg">
                            <div
                                class="course-cat-meta course-cat-meta-02 d-flex align-items-center mb-15"
                            >
                                <span><a href="{{url('courses')}}">{{$course->category->name}}</a></span>
                                <div class="review-icon">
                                    <a href="javascript:void(0);"><i class="fas fa-star-half-alt"></i></a>
                                    <a href="javascript:void(0);"><i class="fas fa-star"></i></a>
                                    <a href="javascript:void(0);"><i class="fas fa-star"></i></a>
                                    <a href="javascript:void(0);"><i class="fas fa-star"></i></a>
                                    <a href="javascript:void(0);"><i class="fas fa-star"></i></a>
                                </div>
                            </div>
                            <h4 class="semi-title mb-30">
                                <a href="{{url('courses')}}"
                                >{{$course->title}}</a
                                >
                            </h4>
                            <div
                                class="course__instructor d-flex align-items-center mb-25"
                            >
                                <div class="course__instructor--thumb">
                                    <img src="{{asset('uploads/default.png')}}" style="height: 50px" alt="" />
                                    <h5 style="font-size: 0.9rem">{{$course->instructor}}</h5>
                                </div>
                                <div class="course__instructor--price-tag">
                                    <span>{{$course->price}}</span>
                                </div>
                            </div>
                            <p>
                                <span>{{substr($course->intro_text, 0, 110)}} ...</span>
                            </p>
                            <a class="c-btn mb-50" href="{{url('courses')}}/{{$course->id}}"
                            >اشترك الآن <i class="far fa-arrow-left"></i
                                ></a>
                            <div class="course-meta">
                                <span><i class="far fa-users"></i> <a href="javascript:void(0);">25</a></span>
                                <span
                                ><i class="fal fa-clock"></i> <a href="javascript:void(0);" style="font-size: 0.7rem">{{$course->duration}}</a></span

                                >
                                <span
                                ><i class="far fa-book"></i> <a href="javascript:void(0);">2.5k</a></span
                                >
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <div class="row">
                <div class="col-xl-12">
                    <div class="course-btn text-center mt-35 mb-30">
                        <a class="c-btn" href="{{url('courses')}}"
                        >مشاهدة المزيد <i class="fal fa-long-arrow-left"></i
                            ></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- course-area-end -->

    <!-- instructor-area-start -->
    <div class="instructor-area grey-bg pt-130 pb-100">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-12 mb-30">
                    <div class="instructor-img">
                        <img class="img-fluid" src="{{asset('main')}}/assets/img/bg/01.png" alt="" />
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-12 mb-30">
                    <div class="instructor-wrapper">
                        <div class="section-title mb-45">
                            <span> إبدأ الآن</span>
                            <h2>وإنضم لنا ..</h2>
                            <p>
                                شاركنا النجاح وإنضم إلينا، اذا كنت مُعلم وتقدم محتوى تعليمي متميز، أو اذا كنت مدرب وتقدم دورات مهمة ومطلوبة، فأنت في المكان المناسب، يسعدنا إنضمامك معنا
                            </p>
                            <p>إذا كنت مؤسسة تعليمية ,وتبحث عن الانتشار والإعلان لدينا نرحب بكم دائما في الخدمات الإعلانية أو الشراكة.</p>
                        </div>
                        <div class="instructor-button mt-15">
                            @auth
                            @if(Auth::user()->role_id != 1 )
                            <a class="c-btn btn-theme f-left mr-15" href="{{url('/update-info')}}"
                            >الإنضمام للمُعلمين </a>
                            @endif
                            @endauth

                            @guest
                            <a class="c-btn btn-theme f-left mr-15" href="{{url('/update-info')}}"
                            >الإنضمام للمُعلمين </a>
                            @endguest
                            <a class="c-btn btn-white" href="{{url('/pages/contact')}}"
                            >إعلن لدينا</a
                            >
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- instructor-area-end -->

    <!-- testimonial-area-start -->
    <div
        class="testimonial-area pt-130 pb-100"
        data-background="{{asset('main')}}/assets/img/bg/01.jpg"
    >
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6 offset-lg-3 offset-xl-3">
                    <div class="section-title text-center section-title-white mb-60">
								<span
                                ><i class="fal fa-ellipsis-h"></i>
                                    ماذا قالوا عنا
									<i class="fal fa-ellipsis-h"></i
                                    ></span>
                        <h2>آراء الطلاب والمعلمين</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-6 col-lg-6">
                    <div class="testimonial-active">
                        @foreach($tests as $test)

                        <div class="testimonial-wrapper mb-30">
                            <div class="testimonial-text">
										<span>
                                            {{$test->full_review}}
                                        </span>
                                <p>
                                    {{$test->short_review}}
                                </p>
                                <div class="clientsay-name">
                                    <div class="client-say-img">
                                        <img src="{{asset('uploads')}}/{{$test->photo}}" alt=""  style="height: 50px; border-radius: 50%; margin-top: 20px"/>
                                    </div>
                                    <div class="client-say-content">
                                        <h4> {{$test->owner}}
                                        </h4>
                                        <span class="owner_title">{{$test->owner_title}}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach

                    </div>
                </div>
                <div class="col-xl-6 col-lg-6">
                    <div class="test-img mb-30">
                        <img src="{{asset('main')}}/assets/img/testimonial/test.png" alt="" />
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- testimonial-area-end -->

    <div class="brand-area theme-bg pb-65 pt-65">
        <div class="container">
            <div class="row brand-active">
                <div class="col-xl-2 text-center">
                    <div class="single-brand text-center">
                        <img src="{{asset('main')}}/assets/img/brand/01.png" alt="" />
                    </div>
                </div>
                <div class="col-xl-2 text-center">
                    <div class="single-brand">
                        <img src="{{asset('main')}}/assets/img/brand/02.png" alt="" />
                    </div>
                </div>
                <div class="col-xl-2 text-center">
                    <div class="single-brand">
                        <img src="{{asset('main')}}/assets/img/brand/03.png" alt="" />
                    </div>
                </div>
                <div class="col-xl-2 text-center">
                    <div class="single-brand">
                        <img src="{{asset('main')}}/assets/img/brand/04.png" alt="" />
                    </div>
                </div>
                <div class="col-xl-2 text-center">
                    <div class="single-brand">
                        <img src="{{asset('main')}}/assets/img/brand/05.png" alt="" />
                    </div>
                </div>
                <div class="col-xl-2 text-center">
                    <div class="single-brand">
                        <img src="{{asset('main')}}/assets/img/brand/01.png" alt="" />
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- brand-area-end -->

    <!-- Breaking news area -->
    <div class="breaking-news-ticker" id="example">
        <div class="bn-label">آخر أخبار الأكاديمية</div>
        <div class="bn-news">
            <ul>
                <li><a href="{{$home->link1 ?? "#"}}">
                        {{$home->new1 ?? "#"}}
                        <span class="bn-seperator" style="background-image: url({{asset('main/assets/img/mini-logo.png')}}); height: 38px;"></span>
                    </a></li>

                <li><a href="{{$home->link2 ?? "#"}}">
                        {{$home->new2 ?? "#"}}
                        <span class="bn-seperator" style="background-image: url({{asset('main/assets/img/mini-logo.png')}}); height: 38px;"></span>
                    </a></li>

                <li><a href="{{$home->link3 ?? "#"}}">
                        {{$home->new3 ?? "#"}}
                        <span class="bn-seperator" style="background-image: url({{asset('main/assets/img/mini-logo.png')}}); height: 38px;"></span>
                    </a></li>

                <li><a href="{{$home->link4 ?? "#"}}">
                        {{$home->new4 ?? "#"}}
                        <span class="bn-seperator" style="background-image: url({{asset('main/assets/img/mini-logo.png')}}); height: 38px;"></span>
                    </a></li>

                <li><a href="{{$home->link5 ?? "#"}}">
                        {{$home->new5 ?? "#"}}
                        <span class="bn-seperator" style="background-image: url({{asset('main/assets/img/mini-logo.png')}}); height: 38px;"></span>
                    </a></li>
            </ul>
        </div>
        <div class="bn-controls">
            <button><span class="bn-arrow bn-prev"></span></button>
            <button><span class="bn-action"></span></button>
            <button><span class="bn-arrow bn-next"></span></button>
        </div>
    </div>


@endsection

@section('css')

    <link rel="stylesheet" href="{{asset('main/assets/css/breaking-news-ticker.css')}}">

@endsection

@section('script')
    <script src="{{asset('main/assets/js/breaking-news-ticker.min.js')}}"></script>
    <script>
        if($("#errorMsg")){
        $("#errorMsg").delay(2000).slideUp(1000);
        }

        $(document).ready(function () {
            $('#example').breakingNews({
                position:"fixed-bottom",
                //effect:'slide-right',
                direction:"rtl",
                // enable autoplay
                play: true,

                // autoplay interval
                delayTimer: 4000,

                // animation speed
                scrollSpeed: 2,

                // pause on hover
                stopOnHover: true,

                //sep
                seperator:'<span class="bn-seperator" style="background-image: url({{asset('main/assets/img/mini-logo.png')}}); height: 38px;"></span>',

            });
        });

    </script>
@endsection


