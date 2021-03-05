@extends('main.main-layout')

@section('title')
الملف الشخصي - {{$teacher->user->fullName()}}
@endsection


@section('content')

    <!--page-title-area start-->
    <div class="teacher-profile-main">
    <section class="page-title-area teacher-profile">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 offset-xl-2">
                    <div class="page-title text-center">
                        <h1 style="font-size: 2rem">الملف الشخصي - {{$teacher->user->fullName()}}</h1>
                        <div class="breadcrumb">
                            <ul class="breadcrumb-list text-sm" >
                                <li><a href="/"   style="font-family: 'Droid Arabic Kufi', serif;">الرئيسية <i class="far fa-chevron-left"></i></a></li>
                                <li><a href="#"  style="font-family: 'Droid Arabic Kufi', serif;">صفحة المعلم الشخصية <i class="far fa-chevron-left"></i></a></li>
                                <li><a class="active" href="#"  style="font-family: 'Droid Arabic Kufi', serif;">{{$teacher->user->fullName()}}</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    </div>
    <!--page-title-area end-->


    <!-- team-details-area-start -->
    <section class="team-details-area grey-bg pt-130">
        <div class="container">
            <div class="row">
                <div class="col-xl-5 col-lg-5">
                    <div class="authors-area mb-30">
                        <div class="team-img">
                            <img src="{{ asset('uploads') }}/{{$teacher->profile_img}}" alt="">
                        </div>
                        <div class="team-content white-bg d-flex">
                            <div class="team-text"  style="width: 65%">
                                <h4>{{$teacher->user->fullName()}}</h4>
                                <span> مُعلم {{$teacher->subject->subject_name}}</span>
                                <div class="team-meta overflow-hidden">
                                    <span><i class="far fa-book"></i> {{$teacher->other_subjects ?? "ليس هناك مواد إضافية"}}</span>
                                </div>
                            </div>
                            <div class="team-media white-bg">
                                <div class="team-social">
                                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                                    <a href="#"><i class="fab fa-twitter"></i></a>
                                </div>
                                @if(Auth::check() AND Auth::user()->role_id !== 1)
                                    <a href="{{url('booking/teacher')}}/{{$teacher->id}}"
                                    style="width: 175px"
                                    >
                                        <button class="btn btn-primary px-4 mt-2" style="border-radius: 100px">التواصل</button>
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-7 col-lg-7">
                    <div class="author-about-content white-bg mb-30 d-flex flex-column justify-content-between" style="height: 95%">
                       <div class="d-flex flex-column justify-content-between">
                            <div class="about mb-5">
                                <h4>عن المُعلم</h4>
                                <p>{{$teacher->brief}}</p>

                            </div>
                            <div class="exp">
                                <h4>الخبرة الوظيفية</h4>
                                <p class="text-gray-500">يعمل في مجال التعليم لمدة تتراوح من <span>{{$teacher->experience}}</span> سنوات</p>
                            </div>
                       </div>
                        <div class="row">
                            <div class="institute-area mb-30 col-12">
                                <h4 class="mb-3">معلومات إضافية</h4>
                                <ul class="institute-list d-flex justify-content-between row">
                                    <li class="col-6">
                                        <div class="college-name d-flex">
                                            <div class="col-icon">
                                                <i class="fal fa-coins"></i>
                                            </div>
                                            <div class="col-name">
                                                <h6>ساعة التدريس</h6>
                                                <p>{{$teacher->pphour}} <span>ر.س/ساعة </span></p>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="col-6">
                                        <div class="college-name d-flex">
                                            <div class="col-icon">
                                                <i class="fal fa-graduation-cap"></i>
                                            </div>
                                            <div class="col-name">
                                                <h6>المؤهل الدراسي</h6>
                                                <p>{{$teacher->qualification}}</p>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="col-6">
                                        <div class="college-name d-flex">
                                            <div class="col-icon">
                                                <i class="fal fa-globe-stand"></i>                                            </div>
                                            <div class="col-name">
                                                <h6>دولة الإقامة</h6>
                                                <p>{{$teacher->user->residence->residence_name}}</p>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="col-6">
                                        <div class="college-name d-flex">
                                            <div class="col-icon">
                                                <i class="fal fa-flag-alt"></i>                                            </div>
                                            <div class="col-name">
                                                <h6>الجنسية</h6>
                                                <p>{{$teacher->user->country->country_name}}</p>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12">
                    <div id="disqus_thread"></div>
                </div>
            </div>
        </div>
    </section>




@endsection





@section('script')
    <script id="dsq-count-scr" src="//ruya-2.disqus.com/count.js" async></script>

    <script>

        (function() { // DON'T EDIT BELOW THIS LINE
            var d = document, s = d.createElement('script');
            s.src = 'https://ruya-2.disqus.com/embed.js';
            s.setAttribute('data-timestamp', +new Date());
            (d.head || d.body).appendChild(s);
        })();
    </script>
    <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>

    <script>

            setTimeout(function(){
                console.log('started')
                $('.disqus-footer').hide()
            }, 5000);


    </script>

@endsection
