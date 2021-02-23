@extends('cp.layout')

@section('title')
    قراءة الرسالة
@endsection

@section('content')
    <div class="container-fluid">

        @if ($errors->any())
            <div class="container">
            <div class=" py-3" id="errorMsg">
                <ul class="inline-block py-3 px-3 text-danger rounded-md">
                    @foreach ($errors->all() as $error)
                        <li><i class="far fa-exclamation-circle"></i> {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            </div>
        @endif

        <div class="content-header">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">قراءة الرسالة</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">الرئيسية</li>
                        <li class="breadcrumb-item">الاقسام الادارية</li>
                         <li class="breadcrumb-item"><a href="{{url('admincp/messages')}}">
                             الرسائل
                             </a>
                         </li>
                        <li class="breadcrumb-item active">قراءة الرسالة</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div>


        <div class="card mb-4">
            <div class="card-body">
                <div class="container">
                    <div class="mailbox-read-info">
                        <h5 class="my-2">{{$message->title}}</h5>
                        <h6 class="my-2">
                            <span>رقم واتسآب التواصل: </span>
                            <span>{{$message->whatsapp ?? 'لم يسجل رقم واتسآب'}}</span>
                        </h6>
                        <h6>البريد الإلكتروني : {{$message->email}}
                            <span class="mailbox-read-time float-right">{{$message->created_at}}</span></h6>
                    </div>
                    <div class="mt-4 px-5">
                        {{$message->message}}
                    </div>

                </div>

            </div>

            <!-- response-->
            <div class="card-footer mt-5">
                <div class="container">
                    <div class="mailbox-read-info">
                        <h5 class="my-2">الرد على الرسالة</h5>
                    </div>
                    <div class="mt-4 px-5">
                        <form action="{{url("admincp/messages/response/$message->id")}}" method="post">
                            @csrf
                        <div class="form-group">
                            <label for="title">عنوان الرسالة</label>
                            <input type="text" class="form-control" name="title" value="{{ old('title') }}">
                        </div>
                        <div class="form-group">
                            <label for="message_body">محتوى الرسالة</label>
                            <textarea name="message_body" id="message_body" rows="10" class="form-control" value="{{ old('message_body') }}"></textarea>
                        </div>

                            <a class="btn btn-danger my-3 float-right w-25 mx-2" href="{{url()->previous()}}">
                                <i class="fa fa-backward"></i>
                                الرجوع
                            </a>


                            <button class="btn btn-primary my-3 float-right w-25" type="submit">
                            <i class="fa fa-paper-plane"></i>
                            إرسال
                        </button>
                        </form>

                    </div>

                </div>

            </div>

        </div>


    </div>
    <!-- /.container-fluid -->
@endsection


@section('adminCSS')

    <style>
        .aClick:hover{
            text-decoration:none
        }
    </style>
@endsection


@section('custom-js')


    <script>
        if($("#errorMsg")){
            $("#errorMsg").delay(5000).slideUp(1000);
        }
    </script>
@endsection
