@extends('cp.layout')

@section('title')
    إحصائيات الصفحة الرئيسية
@endsection

@section('content')
    <div class="container-fluid">

        <div class="content-header">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">اعدادات الرئيسية</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">الرئيسية</li>
                        <li class="breadcrumb-item">الأقسام الادارية</li>
                        <li class="breadcrumb-item active">إعدادات الرئيسية</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div>

        @if ($errors->any())
            <div class=" py-3" id="errorMsg">
                <ul class="inline-block py-3 px-3 text-danger rounded-md">
                    @foreach ($errors->all() as $error)
                        <li><i class="far fa-exclamation-circle"></i> {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="card mb-4">

            <div class="card-body">


                <form action="{{url("admincp/pages/home/update/$home->id")}}" method="post">
                    @csrf
                    @method('put')
                    <div class="modal-body">
                        <div class="container">

                            <div class="row">
                                <div class="form-group col-md-2">
                                    <label for="trusted_student">الطلاب</label>
                                    <input type="number" class="form-control"
                                           name="trusted_student"
                                           value="{{$home->trusted_student}}"
                                    >
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="courses_student">الكورسات</label>
                                    <input type="number" class="form-control"
                                           name="courses_student"
                                           value="{{$home->courses_student}}"
                                    >
                                </div>

                                <div class="form-group col-md-2">
                                    <label for="total_teachers">المعلمين</label>
                                    <input type="number" class="form-control"
                                           name="total_teachers"
                                           value="{{$home->total_teachers}}"
                                    >
                                </div>

                                <div class="form-group col-md-2">
                                    <label for="total_requests">الطلبات</label>
                                    <input type="number" class="form-control"
                                           name="total_requests"
                                           value="{{$home->total_requests}}"
                                    >
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="support_whatsapp">رقم الواتسآب للتواصل</label>
                                    <input type="tel" class="form-control"
                                           name="support_whatsapp"
                                           value="{{$home->support_whatsapp}}"
                                    >
                                </div>

                            </div>

                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="facebook">الفيسبوك</label>
                                    <input type="text" class="form-control"
                                           name="facebook"
                                           value="{{$home->facebook}}"
                                    >
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="youtube">اليوتيوب</label>
                                    <input type="text" class="form-control"
                                           name="youtube"
                                           value="{{$home->youtube}}"
                                    >
                                </div>
                            </div>


                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="twitter">تويتر</label>
                                    <input type="text" class="form-control"
                                           name="twitter"
                                           value="{{$home->twitter}}"
                                    >
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="instagram">انستقرام</label>
                                    <input type="text" class="form-control"
                                           name="instagram"
                                           value="{{$home->instagram}}"
                                    >
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                   <div class="form-group">
                                       <label for="new1">الخبر الأول</label>
                                       <input type="text" class="form-control"
                                              name="new1"
                                              value="{{$home->new1}}"
                                       >
                                   </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="link1">رابط#1</label>
                                        <input type="text" class="form-control"
                                               name="link1"
                                               value="{{$home->link1}}"
                                        >
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="new2">الخبر الثاني</label>
                                        <input type="text" class="form-control"
                                               name="new2"
                                               value="{{$home->new2}}"
                                        >
                                    </div>
                                </div>
                                <div class="col-md-6">
                                   <div class="form-group">
                                       <label for="link2">الرابط#2</label>
                                       <input type="text" class="form-control"
                                              name="link2"
                                              value="{{$home->link2}}"
                                       >
                                   </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                   <div class="form-group">
                                       <label for="new3">الخبر الثالث</label>
                                       <input type="text" class="form-control"
                                              name="new3"
                                              value="{{$home->new3}}"
                                       >
                                   </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="link3">الرابط#3</label>
                                        <input type="text" class="form-control"
                                               name="link3"
                                               value="{{$home->link3}}"
                                        >
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                  <div class="form-group">
                                      <label for="new4">الخبر الرابع</label>
                                      <input type="text" class="form-control"
                                             name="new4"
                                             value="{{$home->new4}}"
                                      >
                                  </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="link4">رابط#4</label>
                                        <input type="text" class="form-control"
                                               name="link4"
                                               value="{{$home->link4}}"
                                        >
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                   <div class="form-group">
                                       <label for="new5">الخبر الخامس</label>
                                       <input type="text" class="form-control"
                                              name="new5"
                                              value="{{$home->new5}}"
                                       >
                                   </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="form-group">
                                      <label for="link5">رابط#5</label>
                                      <input type="text" class="form-control"
                                             name="link5"
                                             value="{{$home->link5}}"
                                      >
                                  </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="alert alert-info alert-dismissible col-12">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    <h5><i class="icon fas fa-info"></i> تنبيه !</h5>
                                    يجب ان تبدأ كل الروابط بـ http او https
                                </div>
                            </div>


                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">حفظ
                        </button>
                    </div>
                </form>


            </div>
        </div>


    </div>
    <!-- /.container-fluid -->
@endsection


@section('adminCSS')

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" integrity="sha256-FdatTf20PQr/rWg+cAKfl6j4/IY3oohFAJ7gVC3M34E=" crossorigin="anonymous">
@endsection


@section('custom-js')

    <s
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>


    <script>


            if($("#errorMsg")){
                $("#errorMsg").delay(5000).slideUp(1000);
            }

            $(function () {
                $(".add_select").select2({
                    theme: 'bootstrap4',
                    dir: "rtl",
                    dropdownAutoWidth: true,
                });
                // $(".edit_select").select2({
                //     theme: 'bootstrap4',
                //     dir: "rtl",
                //     dropdownAutoWidth: true,
                // });
            });



    </script>
@endsection
