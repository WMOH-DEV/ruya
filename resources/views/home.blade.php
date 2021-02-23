@extends('main.main-layout')


@section('title')

أكاديمية رؤية

@endsection



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
                                        <div class=" w-full text-right py-3 px-5 text-white">
                                            <div
                                                class="inline-block py-3 px-3 shadow-sm text-white bg-blue-400 rounded-md flex justify-between item-center w-1/6">
                                                <span class="inline-block">{{session()->get('success')}}</span>
                                                <i class="icon-ok mx-"></i>
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
                                                <h6 class="number_ltr">+12 345 6987</h6>
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
                                <h1><span class="counter">3045</span>+</h1>
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
                                <h1><span class="counter">7852</span>+</h1>
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
                                <h1><span class="counter">9862</span>+</h1>
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
                                <h1><span class="counter">8963</span>+</h1>
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
                                ><i class="fal fa-ellipsis-h"></i> Popular Categories
									<i class="fal fa-ellipsis-h"></i
                                    ></span>
                        <h2>Course Categories</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-3 col-lg-3 col-md-6">
                    <div class="course-cat-wrapper mb-30">
                        <div class="course-cat-img">
                            <a href="courses-details.html"
                            ><img src="{{asset('main')}}/assets/img/course/01.jpg" alt=""
                                /></a>
                        </div>
                        <div class="course-cat-text">
                            <h4>
                                <a href="courses-details.html">Graphics Design (UI)</a>
                            </h4>
                            <span>Web Design Course</span>
                            <div class="course-cat-meta">
										<span
                                        ><i class="far fa-users"></i> <a href="#">250</a></span
                                        >
                                <span
                                ><i class="far fa-book"></i>
											<a href="#">800+ Courses</a></span
                                >
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6">
                    <div class="course-cat-wrapper mb-30">
                        <div class="course-cat-img">
                            <a href="courses-details.html"
                            ><img src="{{asset('main')}}/assets/img/course/02.jpg" alt=""
                                /></a>
                        </div>
                        <div class="course-cat-text">
                            <h4><a href="courses-details.html">Business Studies</a></h4>
                            <span>Finance Business</span>
                            <div class="course-cat-meta">
										<span
                                        ><i class="far fa-users"></i> <a href="#">250</a></span
                                        >
                                <span
                                ><i class="far fa-book"></i>
											<a href="#">700+ Courses</a></span
                                >
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6">
                    <div class="course-cat-wrapper mb-30">
                        <div class="course-cat-img">
                            <a href="courses-details.html"
                            ><img src="{{asset('main')}}/assets/img/course/03.jpg" alt=""
                                /></a>
                        </div>
                        <div class="course-cat-text">
                            <h4><a href="courses-details.html">Web Development</a></h4>
                            <span>Web Design Course</span>
                            <div class="course-cat-meta">
										<span
                                        ><i class="far fa-users"></i> <a href="#">250</a></span
                                        >
                                <span
                                ><i class="far fa-book"></i>
											<a href="#">800+ Courses</a></span
                                >
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6">
                    <div class="course-cat-wrapper mb-30">
                        <div class="course-cat-img">
                            <a href="courses-details.html"
                            ><img src="{{asset('main')}}/assets/img/course/04.jpg" alt=""
                                /></a>
                        </div>
                        <div class="course-cat-text">
                            <h4>
                                <a href="courses-details.html">Product Engineering</a>
                            </h4>
                            <span>Web Design Course</span>
                            <div class="course-cat-meta">
										<span
                                        ><i class="far fa-users"></i> <a href="#">250</a></span
                                        >
                                <span
                                ><i class="far fa-book"></i>
											<a href="#">750+ Courses</a></span
                                >
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6">
                    <div class="course-cat-wrapper mb-30">
                        <div class="course-cat-img">
                            <a href="courses-details.html"
                            ><img src="{{asset('main')}}/assets/img/course/05.jpg" alt=""
                                /></a>
                        </div>
                        <div class="course-cat-text">
                            <h4>
                                <a href="courses-details.html">Graphics Design (UI)</a>
                            </h4>
                            <span>Basic Photography</span>
                            <div class="course-cat-meta">
										<span
                                        ><i class="far fa-users"></i> <a href="#">250</a></span
                                        >
                                <span
                                ><i class="far fa-book"></i>
											<a href="#">800+ Courses</a></span
                                >
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6">
                    <div class="course-cat-wrapper mb-30">
                        <div class="course-cat-img">
                            <a href="courses-details.html"
                            ><img src="{{asset('main')}}/assets/img/course/06.jpg" alt=""
                                /></a>
                        </div>
                        <div class="course-cat-text">
                            <h4><a href="#">Medical & Health</a></h4>
                            <span>Doctors & Nursing</span>
                            <div class="course-cat-meta">
										<span
                                        ><i class="far fa-users"></i> <a href="#">250</a></span
                                        >
                                <span
                                ><i class="far fa-book"></i>
											<a href="#">200+ Courses</a></span
                                >
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6">
                    <div class="course-cat-wrapper mb-30">
                        <div class="course-cat-img">
                            <a href="courses-details.html"
                            ><img src="{{asset('main')}}/assets/img/course/07.jpg" alt=""
                                /></a>
                        </div>
                        <div class="course-cat-text">
                            <h4><a href="courses-details.html">Marketing Strategy</a></h4>
                            <span>Social Media Marketing</span>
                            <div class="course-cat-meta">
										<span
                                        ><i class="far fa-users"></i> <a href="#">250</a></span
                                        >
                                <span
                                ><i class="far fa-book"></i>
											<a href="#">850+ Courses</a></span
                                >
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6">
                    <div class="course-cat-wrapper mb-30">
                        <div class="course-cat-img">
                            <a href="courses-details.html"
                            ><img src="{{asset('main')}}/assets/img/course/08.jpg" alt=""
                                /></a>
                        </div>
                        <div class="course-cat-text">
                            <h4>
                                <a href="courses-details.html">Graphics Design (UI)</a>
                            </h4>
                            <span>Web Design Course</span>
                            <div class="course-cat-meta">
										<span
                                        ><i class="far fa-users"></i> <a href="#">250</a></span
                                        >
                                <span
                                ><i class="far fa-book"></i>
											<a href="#">800+ Courses</a></span
                                >
                            </div>
                        </div>
                    </div>
                </div>
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
                                ><i class="fal fa-ellipsis-h"></i> Popular Courses
									<i class="fal fa-ellipsis-h"></i
                                    ></span>
                        <h2>Available Courses</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-4 col-lg-4 col-md-6">
                    <div class="course-wrapper white-bg mb-30">
                        <div class="course-inner">
                            <div class="course-img pos-rel mb-25">
                                <a href="courses-details.html"
                                ><img src="{{asset('main')}}/assets/img/course/c-01.jpg" alt=""
                                    /></a>
                                <div
                                    class="course__instructor pos-abl d-flex align-items-center"
                                >
                                    <div class="course__instructor--thumb">
                                        <img src="{{asset('main')}}/assets/img/course/instructor1.png" alt="" />
                                        <h5>Warner</h5>
                                    </div>
                                    <div class="course__instructor--price-tag">
                                        <span>$59.95</span>
                                    </div>
                                </div>
                            </div>
                            <div class="course-text">
                                <div
                                    class="course-cat-meta d-flex align-items-center mb-15"
                                >
                                    <span><a href="courses-details.html">english</a></span>
                                    <div class="review-icon">
                                        <a href="#"><i class="fas fa-star"></i></a>
                                        <a href="#"><i class="fas fa-star"></i></a>
                                        <a href="#"><i class="fas fa-star"></i></a>
                                        <a href="#"><i class="fas fa-star"></i></a>
                                        <a href="#"><i class="fas fa-star-half-alt"></i></a>
                                    </div>
                                </div>
                                <h4 class="semi-title pb-30 mb-20">
                                    <a href="courses-details.html"
                                    >Best Courses For Learning English Courses</a
                                    >
                                </h4>
                                <div class="course-meta">
											<span class="number_ltr"
                                            ><i class="far fa-users"></i> <a href="#">25</a></span
                                            >
                                    <span class="number_ltr"
                                    ><i class="far fa-book"></i> <a href="#">36hr</a></span
                                    >
                                    <span class="number_ltr"
                                    ><i class="far fa-book"></i> <a href="#">2.5k</a></span
                                    >
                                </div>
                            </div>
                        </div>
                        <div class="course-text course-text-02 theme-bg">
                            <div
                                class="course-cat-meta course-cat-meta-02 d-flex align-items-center mb-15"
                            >
                                <span><a href="courses-details.html">business</a></span>
                                <div class="review-icon">
                                    <a href="#"><i class="fas fa-star"></i></a>
                                    <a href="#"><i class="fas fa-star"></i></a>
                                    <a href="#"><i class="fas fa-star"></i></a>
                                    <a href="#"><i class="fas fa-star"></i></a>
                                    <a href="#"><i class="fas fa-star-half-alt"></i></a>
                                </div>
                            </div>
                            <h4 class="semi-title mb-30">
                                <a href="courses-details.html"
                                >Best Courses For Learning English Courses</a
                                >
                            </h4>
                            <div
                                class="course__instructor d-flex align-items-center mb-25"
                            >
                                <div class="course__instructor--thumb">
                                    <img src="{{asset('main')}}/assets/img/course/instructor1.png" alt="" />
                                    <h5>Warner</h5>
                                </div>
                                <div class="course__instructor--price-tag">
                                    <span>$59.95</span>
                                </div>
                            </div>
                            <p>
                                Sed ut perspiciatis unde omnis iste natus error sit
                                voluptatem accusantium dolorque laudantium totam rem aperiam
                            </p>
                            <a class="c-btn mb-50" href="courses-details.html"
                            >get enrolled <i class="far fa-arrow-right"></i
                                ></a>
                            <div class="course-meta">
                                <span><i class="far fa-users"></i> <a href="#">25</a></span>
                                <span
                                ><i class="far fa-book"></i> <a href="#">36hr</a></span
                                >
                                <span
                                ><i class="far fa-book"></i> <a href="#">2.5k</a></span
                                >
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6">
                    <div class="course-wrapper white-bg mb-30">
                        <div class="course-inner">
                            <div class="course-img pos-rel mb-25">
                                <a href="courses-details.html"
                                ><img src="{{asset('main')}}/assets/img/course/c-01.jpg" alt=""
                                    /></a>
                                <div
                                    class="course__instructor pos-abl d-flex align-items-center"
                                >
                                    <div class="course__instructor--thumb">
                                        <img src="{{asset('main')}}/assets/img/course/instructor1.png" alt="" />
                                        <h5>Warner</h5>
                                    </div>
                                    <div class="course__instructor--price-tag">
                                        <span>$59.95</span>
                                    </div>
                                </div>
                            </div>
                            <div class="course-text">
                                <div
                                    class="course-cat-meta d-flex align-items-center mb-15"
                                >
                                    <span><a href="courses-details.html">english</a></span>
                                    <div class="review-icon">
                                        <a href="#"><i class="fas fa-star"></i></a>
                                        <a href="#"><i class="fas fa-star"></i></a>
                                        <a href="#"><i class="fas fa-star"></i></a>
                                        <a href="#"><i class="fas fa-star"></i></a>
                                        <a href="#"><i class="fas fa-star-half-alt"></i></a>
                                    </div>
                                </div>
                                <h4 class="semi-title pb-30 mb-20">
                                    <a href="courses-details.html"
                                    >Best Courses For Learning English Courses</a
                                    >
                                </h4>
                                <div class="course-meta">
											<span
                                            ><i class="far fa-users"></i> <a href="#">25</a></span
                                            >
                                    <span
                                    ><i class="far fa-book"></i> <a href="#">36hr</a></span
                                    >
                                    <span
                                    ><i class="far fa-book"></i> <a href="#">2.5k</a></span
                                    >
                                </div>
                            </div>
                        </div>
                        <div class="course-text course-text-02 theme-bg">
                            <div
                                class="course-cat-meta course-cat-meta-02 d-flex align-items-center mb-15"
                            >
                                <span><a href="courses-details.html">business</a></span>
                                <div class="review-icon">
                                    <a href="#"><i class="fas fa-star"></i></a>
                                    <a href="#"><i class="fas fa-star"></i></a>
                                    <a href="#"><i class="fas fa-star"></i></a>
                                    <a href="#"><i class="fas fa-star"></i></a>
                                    <a href="#"><i class="fas fa-star-half-alt"></i></a>
                                </div>
                            </div>
                            <h4 class="semi-title mb-30">
                                <a href="courses-details.html"
                                >Best Courses For Learning English Courses</a
                                >
                            </h4>
                            <div
                                class="course__instructor d-flex align-items-center mb-25"
                            >
                                <div class="course__instructor--thumb">
                                    <img src="{{asset('main')}}/assets/img/course/instructor1.png" alt="" />
                                    <h5>Warner</h5>
                                </div>
                                <div class="course__instructor--price-tag">
                                    <span>$59.95</span>
                                </div>
                            </div>
                            <p>
                                Sed ut perspiciatis unde omnis iste natus error sit
                                voluptatem accusantium dolorque laudantium totam rem aperiam
                            </p>
                            <a class="c-btn mb-50" href="courses-details.html"
                            >get enrolled <i class="far fa-arrow-right"></i
                                ></a>
                            <div class="course-meta">
                                <span><i class="far fa-users"></i> <a href="#">25</a></span>
                                <span
                                ><i class="far fa-book"></i> <a href="#">36hr</a></span
                                >
                                <span
                                ><i class="far fa-book"></i> <a href="#">2.5k</a></span
                                >
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6">
                    <div class="course-wrapper white-bg mb-30">
                        <div class="course-inner">
                            <div class="course-img pos-rel mb-25">
                                <a href="courses-details.html"
                                ><img src="{{asset('main')}}/assets/img/course/c-02.jpg" alt=""
                                    /></a>
                                <div
                                    class="course__instructor pos-abl d-flex align-items-center"
                                >
                                    <div class="course__instructor--thumb">
                                        <img src="{{asset('main')}}/assets/img/course/instructor1.png" alt="" />
                                        <h5>Warner</h5>
                                    </div>
                                    <div class="course__instructor--price-tag">
                                        <span>$59.95</span>
                                    </div>
                                </div>
                            </div>
                            <div class="course-text">
                                <div
                                    class="course-cat-meta d-flex align-items-center mb-15"
                                >
                                    <span><a href="courses-details.html">english</a></span>
                                    <div class="review-icon">
                                        <a href="#"><i class="fas fa-star"></i></a>
                                        <a href="#"><i class="fas fa-star"></i></a>
                                        <a href="#"><i class="fas fa-star"></i></a>
                                        <a href="#"><i class="fas fa-star"></i></a>
                                        <a href="#"><i class="fas fa-star-half-alt"></i></a>
                                    </div>
                                </div>
                                <h4 class="semi-title pb-30 mb-20">
                                    <a href="courses-details.html"
                                    >Best Courses For Learning English Courses</a
                                    >
                                </h4>
                                <div class="course-meta">
											<span
                                            ><i class="far fa-users"></i> <a href="#">25</a></span
                                            >
                                    <span
                                    ><i class="far fa-book"></i> <a href="#">36hr</a></span
                                    >
                                    <span
                                    ><i class="far fa-book"></i> <a href="#">2.5k</a></span
                                    >
                                </div>
                            </div>
                        </div>
                        <div class="course-text course-text-02 theme-bg">
                            <div
                                class="course-cat-meta course-cat-meta-02 d-flex align-items-center mb-15"
                            >
                                <span><a href="courses-details.html">business</a></span>
                                <div class="review-icon">
                                    <a href="#"><i class="fas fa-star"></i></a>
                                    <a href="#"><i class="fas fa-star"></i></a>
                                    <a href="#"><i class="fas fa-star"></i></a>
                                    <a href="#"><i class="fas fa-star"></i></a>
                                    <a href="#"><i class="fas fa-star-half-alt"></i></a>
                                </div>
                            </div>
                            <h4 class="semi-title mb-30">
                                <a href="courses-details.html"
                                >Best Courses For Learning English Courses</a
                                >
                            </h4>
                            <div
                                class="course__instructor d-flex align-items-center mb-25"
                            >
                                <div class="course__instructor--thumb">
                                    <img src="{{asset('main')}}/assets/img/course/instructor1.png" alt="" />
                                    <h5>Warner</h5>
                                </div>
                                <div class="course__instructor--price-tag">
                                    <span>$59.95</span>
                                </div>
                            </div>
                            <p>
                                Sed ut perspiciatis unde omnis iste natus error sit
                                voluptatem accusantium dolorque laudantium totam rem aperiam
                            </p>
                            <a class="c-btn mb-50" href="courses-details.html"
                            >get enrolled <i class="far fa-arrow-right"></i
                                ></a>
                            <div class="course-meta">
                                <span><i class="far fa-users"></i> <a href="#">25</a></span>
                                <span
                                ><i class="far fa-book"></i> <a href="#">36hr</a></span
                                >
                                <span
                                ><i class="far fa-book"></i> <a href="#">2.5k</a></span
                                >
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12">
                    <div class="course-btn text-center mt-35 mb-30">
                        <a class="c-btn" href="courses.html"
                        >view all courses <i class="fal fa-long-arrow-left"></i
                            ></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- course-area-end -->

{{--    <!-- team-area-start -->--}}
{{--    <div class="team-area grey-bg pt-130 pb-100">--}}
{{--        <div class="container">--}}
{{--            <div class="row">--}}
{{--                <div class="col-xl-6 col-lg-6 offset-lg-3 offset-xl-3">--}}
{{--                    <div class="section-title text-center mb-65">--}}
{{--								<span--}}
{{--                                ><i class="fal fa-ellipsis-h"></i> Team Members--}}
{{--									<i class="fal fa-ellipsis-h"></i--}}
{{--                                    ></span>--}}
{{--                        <h2>Expert Instructors</h2>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="row">--}}
{{--                <div class="col-xl-3 col-lg-3 col-md-6">--}}
{{--                    <div class="team-wrapper mb-30">--}}
{{--                        <div class="team-img pos-rel">--}}
{{--                            <div class="fix">--}}
{{--                                <img src="{{asset('main')}}/assets/img/team/01.jpg" alt="" />--}}
{{--                            </div>--}}
{{--                            <div class="team-02-icon">--}}
{{--                                <div class="inner-team-icon pos-rel">--}}
{{--                                    <div class="team-icon">--}}
{{--                                        <a class="twitter" href="#"--}}
{{--                                        ><i class="fab fa-twitter"></i--}}
{{--                                            ></a>--}}
{{--                                        <a class="google" href="#"--}}
{{--                                        ><i class="fab fa-youtube"></i--}}
{{--                                            ></a>--}}
{{--                                        <a class="fb" href="#"--}}
{{--                                        ><i class="fab fa-facebook-f"></i--}}
{{--                                            ></a>--}}
{{--                                    </div>--}}
{{--                                    <a href="#"><i class="fal fa-plus"></i></a>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="team-text">--}}
{{--                            <h4><a href="team-details.html">Somalia D Silva</a></h4>--}}
{{--                            <span>Math Teacher</span>--}}
{{--                            <div class="team-meta">--}}
{{--										<span--}}
{{--                                        ><i class="far fa-book"></i--}}
{{--                                            ><span class="number_ltr"> 750+ </span> دورة تدريبية--}}
{{--										</span>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-xl-3 col-lg-3 col-md-6">--}}
{{--                    <div class="team-wrapper mb-30">--}}
{{--                        <div class="team-img pos-rel">--}}
{{--                            <div class="fix">--}}
{{--                                <img src="{{asset('main')}}/assets/img/team/02.jpg" alt="" />--}}
{{--                            </div>--}}
{{--                            <div class="team-02-icon">--}}
{{--                                <div class="inner-team-icon pos-rel">--}}
{{--                                    <div class="team-icon">--}}
{{--                                        <a class="twitter" href="#"--}}
{{--                                        ><i class="fab fa-twitter"></i--}}
{{--                                            ></a>--}}
{{--                                        <a class="google" href="#"--}}
{{--                                        ><i class="fab fa-youtube"></i--}}
{{--                                            ></a>--}}
{{--                                        <a class="fb" href="#"--}}
{{--                                        ><i class="fab fa-facebook-f"></i--}}
{{--                                            ></a>--}}
{{--                                    </div>--}}
{{--                                    <a href="#"><i class="fal fa-plus"></i></a>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="team-text">--}}
{{--                            <h4><a href="team-details.html">David D Warner</a></h4>--}}
{{--                            <span>English Teacher</span>--}}
{{--                            <div class="team-meta">--}}
{{--                                <span><i class="far fa-book"></i> 3850+ Courses</span>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-xl-3 col-lg-3 col-md-6">--}}
{{--                    <div class="team-wrapper mb-30">--}}
{{--                        <div class="team-img pos-rel">--}}
{{--                            <div class="fix">--}}
{{--                                <img src="{{asset('main')}}/assets/img/team/03.jpg" alt="" />--}}
{{--                            </div>--}}
{{--                            <div class="team-02-icon">--}}
{{--                                <div class="inner-team-icon pos-rel">--}}
{{--                                    <div class="team-icon">--}}
{{--                                        <a class="twitter" href="#"--}}
{{--                                        ><i class="fab fa-twitter"></i--}}
{{--                                            ></a>--}}
{{--                                        <a class="google" href="#"--}}
{{--                                        ><i class="fab fa-youtube"></i--}}
{{--                                            ></a>--}}
{{--                                        <a class="fb" href="#"--}}
{{--                                        ><i class="fab fa-facebook-f"></i--}}
{{--                                            ></a>--}}
{{--                                    </div>--}}
{{--                                    <a href="#"><i class="fal fa-plus"></i></a>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="team-text">--}}
{{--                            <h4><a href="team-details.html">Xavi Toni Crusse</a></h4>--}}
{{--                            <span>Computer Teacher</span>--}}
{{--                            <div class="team-meta">--}}
{{--                                <span><i class="far fa-book"></i> 632+ Courses</span>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-xl-3 col-lg-3 col-md-6">--}}
{{--                    <div class="team-wrapper mb-30">--}}
{{--                        <div class="team-img pos-rel">--}}
{{--                            <div class="fix">--}}
{{--                                <img src="{{asset('main')}}/assets/img/team/04.jpg" alt="" />--}}
{{--                            </div>--}}
{{--                            <div class="team-02-icon">--}}
{{--                                <div class="inner-team-icon pos-rel">--}}
{{--                                    <div class="team-icon">--}}
{{--                                        <a class="twitter" href="#"--}}
{{--                                        ><i class="fab fa-twitter"></i--}}
{{--                                            ></a>--}}
{{--                                        <a class="google" href="#"--}}
{{--                                        ><i class="fab fa-youtube"></i--}}
{{--                                            ></a>--}}
{{--                                        <a class="fb" href="#"--}}
{{--                                        ><i class="fab fa-facebook-f"></i--}}
{{--                                            ></a>--}}
{{--                                    </div>--}}
{{--                                    <a href="#"><i class="fal fa-plus"></i></a>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="team-text">--}}
{{--                            <h4><a href="team-details.html">Shaine Watson</a></h4>--}}
{{--                            <span>Math Teacher</span>--}}
{{--                            <div class="team-meta">--}}
{{--                                <span><i class="far fa-book"></i> 750+ Courses</span>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <!-- team-area-end -->--}}


    <!-- testimonial-area-start -->
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
                            <a class="c-btn btn-theme f-left mr-15" href="{{url('/pages/contact')}}"
                            >الإنضمام للمُعلمين </a>
                            <button class="c-btn btn-white" href="{{url('/pages/contact')}}"
                            >إعلن لدينا</button
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
                                ><i class="fal fa-ellipsis-h"></i> Students Feedback
									<i class="fal fa-ellipsis-h"></i
                                    ></span>
                        <h2>What Our Students Say</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-6 col-lg-6">
                    <div class="testimonial-active">
                        <div class="testimonial-wrapper mb-30">
                            <div class="testimonial-text">
										<span
                                        >Sed ut perspiciatis unde omnis natus error sit voluptatem
											accusa ntium dolore mque lauda enim ad minima veniam quis
											nostrumexe rcitationem ullam corporise</span
                                        >
                                <p>
                                    Rnimad minima veniam quis nostreercit ationem ullam
                                    corporis suscipit laboriosam nisiut
                                </p>
                                <div class="clientsay-name">
                                    <div class="client-say-img">
                                        <img src="{{asset('main')}}/assets/img/testimonial/01.png" alt="" />
                                    </div>
                                    <div class="client-say-content">
                                        <h4>Sousa Fernandes</h4>
                                        <span>CEO & Founder</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="testimonial-wrapper mb-30">
                            <div class="testimonial-text">
										<span
                                        >Sed ut perspiciatis unde omnis natus error sit voluptatem
											accusa ntium dolore mque lauda enim ad minima veniam quis
											nostrumexe rcitationem ullam corporise</span
                                        >
                                <p>
                                    Rnimad minima veniam quis nostreercit ationem ullam
                                    corporis suscipit laboriosam nisiut
                                </p>
                                <div class="clientsay-name">
                                    <div class="client-say-img">
                                        <img src="{{asset('main')}}/assets/img/testimonial/01.png" alt="" />
                                    </div>
                                    <div class="client-say-content">
                                        <h4>Sousa Fernandes</h4>
                                        <span>CEO & Founder</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="testimonial-wrapper mb-30">
                            <div class="testimonial-text">
										<span
                                        >Sed ut perspiciatis unde omnis natus error sit voluptatem
											accusa ntium dolore mque lauda enim ad minima veniam quis
											nostrumexe rcitationem ullam corporise</span
                                        >
                                <p>
                                    Rnimad minima veniam quis nostreercit ationem ullam
                                    corporis suscipit laboriosam nisiut
                                </p>
                                <div class="clientsay-name">
                                    <div class="client-say-img">
                                        <img src="{{asset('main')}}/assets/img/testimonial/01.png" alt="" />
                                    </div>
                                    <div class="client-say-content">
                                        <h4>Sousa Fernandes</h4>
                                        <span>CEO & Founder</span>
                                    </div>
                                </div>
                            </div>
                        </div>
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



{{--    <!-- blog-area-start -->--}}
{{--    <div class="blog-area pt-130 pb-100">--}}
{{--        <div class="container">--}}
{{--            <div class="row">--}}
{{--                <div class="col-xl-6 col-lg-6 offset-lg-3 offset-xl-3">--}}
{{--                    <div class="section-title text-center mb-60">--}}
{{--								<span--}}
{{--                                ><i class="fal fa-ellipsis-h"></i> Artices & Tipes--}}
{{--									<i class="fal fa-ellipsis-h"></i--}}
{{--                                    ></span>--}}
{{--                        <h2>Latest News & Blog</h2>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="row">--}}
{{--                <div class="col-xl-4 col-lg-4 col-md-6">--}}
{{--                    <div class="blog-wrapper mb-30 pos-rel">--}}
{{--                        <div class="blog-img">--}}
{{--                            <a href="blog-details.html"--}}
{{--                            ><img src="{{asset('main')}}/assets/img/blog/01.jpg" alt=""--}}
{{--                                /></a>--}}
{{--                        </div>--}}
{{--                        <div class="blog-text">--}}
{{--                            <div class="blog-meta">--}}
{{--										<span--}}
{{--                                        ><i class="far fa-calendar-alt"></i>--}}
{{--											<a href="blog-details.html">25 Nov 2020</a></span--}}
{{--                                        >--}}
{{--                                <span--}}
{{--                                ><i class="far fa-comments"></i>--}}
{{--											<a href="blog-details.html">Com(30)</a></span--}}
{{--                                >--}}
{{--                            </div>--}}
{{--                            <h4>--}}
{{--                                <a href="blog-details.html"--}}
{{--                                >Learning Resources In Challenec Times Online Workshops</a--}}
{{--                                >--}}
{{--                            </h4>--}}
{{--                            <div class="inner-blog">--}}
{{--                                <div class="blog-2-img f-left">--}}
{{--                                    <img src="{{asset('main')}}/assets/img/blog/01.png" alt="" />--}}
{{--                                </div>--}}
{{--                                <div class="blog-content">--}}
{{--                                    <h5>David Simala</h5>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="blog-button">--}}
{{--                                <a href="blog-details.html"--}}
{{--                                ><i class="far fa-long-arrow-left"></i--}}
{{--                                    ></a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-xl-4 col-lg-4 col-md-6">--}}
{{--                    <div class="blog-wrapper mb-30 pos-rel">--}}
{{--                        <div class="blog-img">--}}
{{--                            <a href="blog-details.html"--}}
{{--                            ><img src="{{asset('main')}}/assets/img/blog/02.jpg" alt=""--}}
{{--                                /></a>--}}
{{--                        </div>--}}
{{--                        <div class="blog-text">--}}
{{--                            <div class="blog-meta">--}}
{{--										<span--}}
{{--                                        ><i class="far fa-calendar-alt"></i>--}}
{{--											<a href="blog-details.html">25 Nov 2020</a></span--}}
{{--                                        >--}}
{{--                                <span--}}
{{--                                ><i class="far fa-comments"></i>--}}
{{--											<a href="blog-details.html">Com(30)</a></span--}}
{{--                                >--}}
{{--                            </div>--}}
{{--                            <h4>--}}
{{--                                <a href="blog-details.html"--}}
{{--                                >Djang Models Admin And Harness Rela Tional Database</a--}}
{{--                                >--}}
{{--                            </h4>--}}
{{--                            <div class="inner-blog">--}}
{{--                                <div class="blog-2-img f-left">--}}
{{--                                    <img src="{{asset('main')}}/assets/img/blog/01.png" alt="" />--}}
{{--                                </div>--}}
{{--                                <div class="blog-content">--}}
{{--                                    <h5>David Simala</h5>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="blog-button">--}}
{{--                                <a href="blog-details.html"--}}
{{--                                ><i class="far fa-long-arrow-left"></i--}}
{{--                                    ></a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-xl-4 col-lg-4 col-md-6">--}}
{{--                    <div class="blog-wrapper mb-30 pos-rel">--}}
{{--                        <div class="blog-img">--}}
{{--                            <a href="blog-details.html"--}}
{{--                            ><img src="{{asset('main')}}/assets/img/blog/03.jpg" alt=""--}}
{{--                                /></a>--}}
{{--                        </div>--}}
{{--                        <div class="blog-text">--}}
{{--                            <div class="blog-meta">--}}
{{--										<span--}}
{{--                                        ><i class="far fa-calendar-alt"></i>--}}
{{--											<a href="blog-details.html">25 Nov 2020</a></span--}}
{{--                                        >--}}
{{--                                <span--}}
{{--                                ><i class="far fa-comments"></i>--}}
{{--											<a href="blog-details.html">Com(30)</a></span--}}
{{--                                >--}}
{{--                            </div>--}}
{{--                            <h4>--}}
{{--                                <a href="blog-details.html"--}}
{{--                                >Smash Podcast With Laura Kalbag What Is Online Privacy</a--}}
{{--                                >--}}
{{--                            </h4>--}}
{{--                            <div class="inner-blog">--}}
{{--                                <div class="blog-2-img f-left">--}}
{{--                                    <img src="{{asset('main')}}/assets/img/blog/01.png" alt="" />--}}
{{--                                </div>--}}
{{--                                <div class="blog-content">--}}
{{--                                    <h5>David Simala</h5>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="blog-button">--}}
{{--                                <a href="blog-details.html"--}}
{{--                                ><i class="far fa-long-arrow-left"></i--}}
{{--                                    ></a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <!-- blog-area-end -->--}}

    <!-- brand-area-start -->
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

@endsection


@section('script')
    <script>
        if($("#errorMsg")){
        $("#errorMsg").delay(2000).slideUp(1000);
        }
    </script>
@endsection


