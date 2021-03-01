@extends('main.main-layout')

@section('title')لا يوجد معلم@endsection



@section('content')



    <!-- contact-area-start -->
    <div class="contact-area grey-bg pb-100 teacher-area register-area" style="padding-top: 250px">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="section-title text-center mb-60">
                        <span><i class="fal fa-ellipsis-h"></i>نعتذر<i class="fal fa-ellipsis-h"></i></span>
                        <h1 class=" mt-2" style="font-size: 1.5rem">لا يوجد مُعلمين يتطابقوا مع البحث الذي أجريته حاليا</h1>
                        <p class=" mt-2" style="font-size: 1rem">  <span>سيتم تحويلك الآن لصفحة البحث مرة أخرى بعد </span> <span id="number">5</span> <span>ثوانٍ </span> </p>
                    </div>
                </div>

                <div class="col-12 col-md-12">
                    <div class="lg-btn lg-btn-03 text-center">
                        <a href="{{url('/search')}}" class="c-btn" >الرجوع لصفحة البحث<i class="far fa-long-arrow-alt-left"></i></a>
                    </div>
            </div>
        </div>
    </div>


    </div>
    <!-- contact-area-end -->






@endsection


@section('script')

    <script>
        let i = 5
        let number = document.getElementById('number')
        setInterval(function (){
            if (i>0)  number.textContent = i--;
            console.log(i);
        },1000)
        window.setTimeout(function(){

            // Move to a new location or you can do something else
            window.location.href = "{{URL::to('search')}}";

        }, 5000);
    </script>

@endsection



