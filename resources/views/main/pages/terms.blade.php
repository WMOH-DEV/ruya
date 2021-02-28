@extends('main.main-layout')

@section('title')
    شروط الإستخدام
@endsection


@section('content')

    <!--page-title-area start-->
    <section class="page-title-area" style="background-image: url({{url(asset('main/assets/img/bg/page-title-bg-01.jpg'))}});">
        <div class="container">
            <div class="row">
                <div class="col-xl-10 offset-xl-1">
                    <div class="page-title text-center">
                        <h1 style="font-size: 2rem">شروط الإستخدام</h1>
                        <div class="breadcrumb">
                            <ul class="breadcrumb-list">
                                <li><a href="/">الرئيسية <i class="far fa-chevron-left"></i></a></li>
                                <li><a class="active" href="{{url('pages/privacy')}}">شروط الإستخدام</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--page-title-area end-->
    <!--faq-area start-->
    <section class="faq-area grey-bg pt-100 pb-100">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="faq-details-area white-bg mb-30">
                        <h4 class="text-center mb-5">شروط الإستخدام لمنصة أكاديمية رؤية</h4>
                        <div id="accordion">
                            {!! $terms !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection




