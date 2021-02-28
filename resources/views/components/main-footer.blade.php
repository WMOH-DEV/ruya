<footer
    class="footer-area pt-65 pb-45"
    data-background="{{asset('main')}}/assets/img/bg/fot-01-bg.png"
>
    <div class="container">
        <div class="row mb-55 no-gutters align-items-center">
            <div class="col-xl-4 col-lg-4 col-md-4 col-12">
                <div class="footer-logo">
                    <a href="{{url('/')}}"
                    ><img src="{{asset('main')}}/assets/img/logo/footer-01-logo.png" alt=""
                        /></a>
                </div>
            </div>
            <div class="col-xl-8 col-lg-8 col-md-8 col-12">
                <div class="footer-social-icon text-right pb-70">
                    <a class="fot-fb active pb-70" href="{{URL::to("$social->facebook")}}"
                    ><i class="fab fa-facebook-f"></i> Facebook</a
                    >
                    <a class="fot-twitter pb-70" href="{{$social->twitter}}"
                    ><i class="fab fa-twitter"></i> Twitter</a
                    >
                    <a class="fot-google pb-70" href="{{$social->youtube}}"
                    ><i class="fab fa-youtube"></i> Youtube</a
                    >
                    <a class="fot-insta pb-70" href="{{$social->instagram}}"
                    ><i class="fab fa-instagram"></i> Instagram</a
                    >
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-6 col-lg-5 col-md-5 col-12">
                <div class="footer-widget mb-30">
                    <h4 class="footer-widget-title mb-25">آخر الدورات</h4>
                    <ul class="footer-list footer-font">
                        @foreach($last_courses as $last_course)
                        <li class="footer-font"><a href="{{url('courses')}}/{{$last_course->id}}">{{$last_course->title}}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-xl-3 col-lg-2 col-md-2 col-12">
                <div class="footer-widget widget-center text-center mb-30">
                    <h4 class="footer-widget-title mb-25">موقعنا</h4>
                    <ul class="footer-list footer-02-list">
                        <li><a href="{{url('pages/faq')}}">الأسئلة الشائعة</a></li>
                        <li><a href="{{url('pages/privacy')}}">سياسة الخصوصية</a></li>
                        <li><a href="{{url('pages/terms')}}">شروط الإستخدام</a></li>
                        <li><a href="{{url('pages/about')}}">من نحن</a></li>
                        <li><a href="{{url('pages/contact')}}">إتصل بنا</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-xl-3 col-lg-5 col-md-5 col-12">
                <div class="footer-widget mb-30">
                    <h4 class="footer-widget-title mb-25">المراحل التعليمية</h4>
                    <ul class="footer-list">
                        @foreach($stages as $stage)
                        <li><a href="#">{{$stage->stage_name}}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>

        </div>
        <div class="copyright-area mt-15 text-center pt-20 pb-20">
            <div class="row">
                <div class="col-xl-6">
                    <div class="copyright-text">
                        <!-- MyOwn Line -->
                        <p class="my-0 text-left pl-3">الحقوق محفوظة لأكاديمية رؤية
                            <i class="far fa-copyright"></i>
                        </p>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="copyright-text">
                        <!-- MyOwn Line -->
                        <p class="my-0 text-right pr-3">
                            بكل
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                width="14"
                                height="14"
                                class="heart"
                                viewBox="0 0 24 24"
                            >
                                <path
                                    d="M12 4.435c-1.989-5.399-12-4.597-12 3.568 0 4.068 3.06 9.481 12 14.997 8.94-5.516 12-10.929 12-14.997 0-8.118-10-8.999-12-3.568z"
                                />
                            </svg>
                            تصميم وبرمجة
                            <a href="https://www.fb.com/WaelMohElSaid"  data-toggle="tooltip" title="Wael Mohamed ElSaid">
                                <img src="{{asset('main/assets/img/logo/wael-ar.png')}}" alt="" style="height: 35px">
                            </a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
