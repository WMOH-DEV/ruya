<div class="offset-sidebar">
    <div class="offset-widget offset-logo mb-30">
        <a href="/">
            <img src="{{asset('main')}}/assets/img/logo/footer-01-logo.png" alt="logo" />
        </a>
    </div>
    <div class="offset-widget mb-40">
        <div class="info-widget">
            <h4 class="offset-title mb-20">من نحن</h4>
            <p class="mb-30">
                أكاديمية رؤية، هي أكاديمية تسعى للإرتقاء بالمستوى التعليمي بتسهيل التواصل بين الطلاب والمعلمين في كافة المواد وكافة الأنشطة التعليمية.
            </p>
            <div class="d-flex sidebar-buttons">
            <a class="c-btn btn-round-02" href="{{url('pages/contact')}}">تواصل معنا</a>
                @auth
                @if(Auth::user()->role_id != 1 )
                <a class="c-btn btn-round-02" href="{{url('update-info')}}">إنضم للمعلمين</a>
                    @endif
                @endauth
            </div>
        </div>
    </div>
    <div class="offset-widget mb-30 pr-10">
        <div class="info-widget info-widget2">
            <h4 class="offset-title mb-20">معلومات التواصل</h4>

            <p><i class="fal fa-phone"></i><span class="number_ltr  ml-2">{{$home->support_whatsapp}}</span> </p>
            <p><i class="fal fa-whatsapp"></i><span class="number_ltr  ml-2">{{$home->support_whatsapp}}</span> </p>
            <p><i class="fal fa-phone"></i><span class="number_ltr  ml-2">{{$home->support_whatsapp}}</span> </p>
            <p><i class="fal fa-envelope-open"></i> success@ruya.academy</p>
        </div>
    </div>
</div>
