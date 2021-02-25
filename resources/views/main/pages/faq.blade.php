@extends('main.main-layout')

@section('title')
    الأسئلة الشائعة
@endsection


@section('content')

    <!--page-title-area start-->
    <section class="page-title-area" style="background-image: url({{url(asset('main/assets/img/bg/page-title-bg-01.jpg'))}});">
        <div class="container">
            <div class="row">
                <div class="col-xl-10 offset-xl-1">
                    <div class="page-title text-center">
                        <h1>الأسئلة الشائعة</h1>
                        <div class="breadcrumb">
                            <ul class="breadcrumb-list">
                                <li><a href="/">الرئيسية <i class="far fa-chevron-left"></i></a></li>
                                <li><a class="active" href="{{url('pages/faq')}}">الأسئلة الشائعة</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--page-title-area end-->
    <!--faq-area start-->
    <section class="faq-area grey-bg pt-130 pb-100">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="faq-details-area white-bg mb-30">
                        <h4 class="text-center mb-5">أهلا بك في أكاديمية رؤية، هذه الصفحة للإجابة على الأسئلة المتكررة</h4>
                        <div id="accordion">
                            @foreach($faqs as $faq)
                            <div class="card card-02">
                                <div class="card-header" id="headingTwo{{$faq->id}}">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link collapsed" data-toggle="collapse"
                                                data-target="#collapseTwo{{$faq->id}}" aria-expanded="false"
                                                aria-controls="collapseTwo{{$faq->id}}">
                                            {{$faq->ques}}
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapseTwo{{$faq->id}}" class="collapse" aria-labelledby="headingTwo{{$faq->id}}"
                                     data-parent="#accordion">
                                    <div class="card-body">
                                        <p class="mt-15" style="padding-right: 30px;">
                                            {{$faq->answer}}
                                        </p>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection




