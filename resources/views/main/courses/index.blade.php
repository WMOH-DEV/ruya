@extends('main.main-layout')

@section('title')
    تصنيفات الدورات
@endsection


@section('content')

    <!--page-title-area start-->
    <section class="page-title-area" style="background-image: url({{url(asset('main/assets/img/bg/page-title-bg-01.jpg'))}});">
        <div class="container">
            <div class="row">
                <div class="col-xl-10 offset-xl-1">
                    <div class="page-title text-center">
                        <h1 style="font-size: 2rem">تصنيفات الدورات</h1>
                        <div class="breadcrumb">
                            <ul class="breadcrumb-list">
                                <li><a href="/">الرئيسية <i class="far fa-chevron-left"></i></a></li>
                                <li><a class="active" href="{{url("courses")}}">تصنيفات الدورات</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--page-title-area end-->


    <!-- course-area-start -->
    <div class="course-area course-area-02 pt-130 pb-100">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="portfolio-menu portfolio-menu-02 pr-menu-03 text-center mb-30">
                        <button class="active" data-filter="*">عرض الكل</button>
                       @foreach($cats as $cat)
                        <button data-filter=".{{$cat->id}}" class="">{{$cat->name}}</button>
                        @endforeach
                    </div>
                </div>
            </div>
            <div id="portfolio-grid" class="row row-portfolio">


                @foreach($courses as $course)
                    <div class="col-xl-4 col-lg-4 col-md-6 grid-item {{$course->category->id}}">
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
                                            <a href="javascript:void(0);"><i class="fas fa-star"></i></a>
                                            <a href="javascript:void(0);"><i class="fas fa-star"></i></a>
                                            <a href="javascript:void(0);"><i class="fas fa-star"></i></a>
                                            <a href="javascript:void(0);"><i class="fas fa-star"></i></a>
                                            <a href="javascript:void(0);"><i class="fas fa-star-half-alt"></i></a>
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
                                        <a href="javascript:void(0);"><i class="fas fa-star"></i></a>
                                        <a href="javascript:void(0);"><i class="fas fa-star"></i></a>
                                        <a href="javascript:void(0);"><i class="fas fa-star"></i></a>
                                        <a href="javascript:void(0);"><i class="fas fa-star"></i></a>
                                        <a href="javascript:void(0);"><i class="fas fa-star-half-alt"></i></a>
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

        </div>
    </div>
    <!-- course-area-end -->


@endsection




