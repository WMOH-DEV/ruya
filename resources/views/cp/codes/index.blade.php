@extends('cp.layout')

@section('title')
    أكواد جوجل أدسنس
@endsection

@section('content')
    <div class="container-fluid">

        <div class="content-header">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">اعدادات أدسنس والأرشفة</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">الرئيسية</li>
                        <li class="breadcrumb-item">الأقسام الادارية</li>
                        <li class="breadcrumb-item active">اعدادات أدسنس والأرشفة</li>
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


                <form action="{{url("admincp/home/codes/update/$code->id")}}" method="post">
                    @csrf
                    @method('put')

                    <div class="modal-footer border-top-0">
                        <button type="submit" class="btn btn-primary">حفظ
                        </button>
                    </div>

                    <div class="modal-body">
                        <div class="container">

                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="trusted_student">Facebook</label>
                                    <textarea class="form-control" style="direction: ltr !important"  name="facebook" id="facebook" cols="30">{{$code->facebook}}</textarea>
                                    <span class="text-sm text-danger">غير إلزامي</span>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="trusted_student">Google Console [HTML TAG]</label>
                                    <textarea class="form-control" style="direction: ltr !important" name="google_console" id="google_console" cols="30">{{$code->google_console}}</textarea>
                                    <span class="text-sm text-danger"> تأكد من إختيار وسيلة التأكيد HTML TAG</span>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="trusted_student">كود أدسنس</label>
                                    <textarea class="form-control" style="direction: ltr !important"  name="adsense" id="adsense" cols="30">{{$code->adsense}}</textarea>
                                    <span class="text-sm text-danger">غير إلزامي</span>
                                </div>
                            </div>



                            <div class="row">
                                <div class="alert alert-info alert-dismissible col-12">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    <h5><i class="icon fas fa-info"></i> تنبيه !</h5>
                                    <ul>
                                        <li> يجب أن يبدأ وينتهي أكواد ادسنس بكود اسكربت</li>
                                        <li> يجب أن يبدأ  أكواد جوجل كونسول بكلمة ميتا meta</li>
                                    </ul>
                                </div>
                            </div>


                        </div>
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
