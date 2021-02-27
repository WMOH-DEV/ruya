@extends('main.main-layout')

@section('title')
    {{$course->title}}
@endsection


@section('content')

    <!--page-title-area start-->
    <section class="page-title-area" style="background-image: url({{url(asset('main/assets/img/bg/page-title-bg-01.jpg'))}});">
        <div class="container">
            <div class="row">
                <div class="col-xl-10 offset-xl-1">
                    <div class="page-title text-center">
                        <h1 style="font-size: 2rem">استعراض دورة</h1>
                        <div class="breadcrumb">
                            <ul class="breadcrumb-list">
                                <li><a href="/">الرئيسية <i class="far fa-chevron-left"></i></a></li>
                                <li><a class="active" href="{{url("courses/$course->id")}}">{{$course->title}}</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--page-title-area end-->

    <!-- course-area-start -->
    <section class="course-curriculumn-area pt-130 pb-100">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 col-lg-8 col-md-12">
                    <div class="course-left-area">
                        <div class="improve-skill-area mb-50">
                            <div class="video-learn-area pos-rel mb-30">
                                <div class="skill-thumb pos-rel">
                                    <img src="{{asset("uploads/$course->intro_image")}}" style="height: 26.25rem" alt="">
                                </div>
                                <div class="video-area">
                                    <a class="popup-video" href="{{$course->intro_video ?? "javascript:void(0);"}}"><i class="fas fa-play"></i></a>
                                </div>
                            </div>
                            <div class="review-icon">
                                <a href="javascript:void(0);"><i class="fas fa-star"></i></a>
                                <a href="javascript:void(0);"><i class="fas fa-star"></i></a>
                                <a href="javascript:void(0);"><i class="fas fa-star"></i></a>
                                <a href="javascript:void(0);"><i class="fas fa-star"></i></a>
                                <a href="javascript:void(0);"><i class="fas fa-star-half-alt"></i></a>
                            </div>
                            <h3 class="course-title-03 mb-25">مقدمة عن {{$course->title}}</h3>
                            <p class="text-justify">{{$course->intro_text}}</p>
                        </div>
                        <div class="curriculumn-area mb-65">
                            <h3 class="course-title-03 mb-20">محتويات الدورة</h3>
                            <p class="mb-25 text-justify">{{$course->content}}</p>


                            <h5 style="font-size: 1.2rem" class="course-title-03 mb-20">نبذة عن المحاضر</h5>
                            <p class="mb-100 text-justify">{{$course->about_instructor}}</p>

                            <ul class="curriculumn-list">
                                <li><a href="javascript:void(0);">لمن هذه الدورة ؟ <span class="f-right">{{$course->for_who}}</span> </a></li>
                                <li><a href="javascript:void(0);">متطلبات الحضور <span class="f-right"> {{$course->requirements ?? " لا يوجد متطلبات مُحددة في هذه الدورة"}}</span> </a></li>
                            </ul>

                        </div>

                        <div class="mb-65">
                            <div id="disqus_thread"></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-12">
                    <div class="course-right-area">
                        <div class="widget mb-40">
                            <ul class="widget-course-list">
                                <li><a href="javascript:void(0);"><i class="far fa-usd-circle"></i> ثمن الدورة<span class="f-right">{{$course->price}}</span></a></li>
                                <li><a href="javascript:void(0);"><i class="fal fa-user-circle"></i> المحاضر <span class="f-right">{{$course->instructor}}</span></a></li>
                                <li><a href="javascript:void(0);"><i class="fal fa-clock"></i> المــدة <span class="f-right">{{$course->duration}}</span></a></li>
                                <li><a href="javascript:void(0);"><i class="fal fa-book"></i> المحاضرات <span class="f-right">{{$course->lectures ?? '-'}} درس/محاضرة</span></a></li>
                                <li><a href="javascript:void(0);"><i class="fal fa-users"></i> الحضور <span class="f-right">{{$course->how}}</span></a></li>
                                <li><a href="javascript:void(0);"><i class="fal fa-flag"></i> اللغة <span class="f-right">{{$course->language ?? "-"}}</span></a></li>
                            </ul>
                            <div class="enroll-btn mb-40 text-center"><a class="c-btn btn-round-02" href="{{url('pages/contact')}}">إشترك الآن <i class="far fa-long-arrow-alt-left"></i></a>
                            </div>
                        </div>
{{--                        <div class="widget">--}}
{{--                            <div class="widget-advertisement2" style="display: block !important; width: 100%">--}}
{{--                                <img src="{{asset('main')}}/assets/img/course/add-01.jpg" alt="">--}}
{{--                            </div>--}}
{{--                        </div>--}}
                    </div>
                </div>


            </div>
        </div>
    </section>
    <!-- course-area-end -->


@endsection


@section('script')
    <script id="dsq-count-scr" src="//ruya-2.disqus.com/count.js" async></script>

    <script>

        (function() {
            var d = document, s = d.createElement('script');
            s.src = 'https://ruya-2.disqus.com/embed.js';
            s.setAttribute('data-timestamp', +new Date());
            (d.head || d.body).appendChild(s);
        })();
    </script>
    <noscript>من فضلك يجب تفعيل الجافاسكربت <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>

    <script>


    </script>

@endsection


