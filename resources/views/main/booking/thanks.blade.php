@extends('main.main-layout')

@section('title')
    طلب مادة رئيسية
@endsection


@section('css')

    <link rel="stylesheet" href="{{asset('main')}}/css/dropify.css">
    <link rel="stylesheet" href="{{asset('main')}}/css/select2.min.css">

@endsection

@section('content')



    <!-- contact-area-start -->
    <div class="contact-area grey-bg pb-100 teacher-area register-area" style="padding-top: 250px">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="section-title text-center mb-60">
                        <span><i class="fal fa-ellipsis-h"></i>شكراً لك <i class="fal fa-ellipsis-h"></i></span>
                        <h1 class=" mt-2" style="font-size: 1.5rem">تم إرسال طلبك إلى الادارة وسيتم التواصل معك قريب</h1>
                    </div>
                </div>

                <div class="col-12 col-md-12">
                    <div class="lg-btn lg-btn-03 text-center">
                        <a href="{{url('/')}}" class="c-btn" >الرجوع للرئيسية<i class="far fa-long-arrow-alt-left"></i></a>
                    </div>
            </div>
        </div>
    </div>


    </div>
    <!-- contact-area-end -->






@endsection





