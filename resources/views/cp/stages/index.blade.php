@extends('cp.layout')

@section('title')
    قائمة المراحل
@endsection

@section('content')
    <div class="container-fluid">

        <div class="content-header">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">قائمة المراحل</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">الرئيسية</li>
                        <li class="breadcrumb-item">المراحل التعليمية</li>
                        <li class="breadcrumb-item active">قائمة المراحل</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div>


        <div class="card mb-4">
{{--                        <div class="card-header">--}}
{{--                            <i class="fas fa-table mr-1"></i>--}}
{{--                            القائمة--}}
{{--                        </div>--}}
            <div class="card-body">

                <form action="{{url('admincp/stages/add')}}" method="post" class="form-row">

                    @csrf

                    <div class="form-group col-12 col-md-4">
                        <input type="text" placeholder="إسم المرحلة" class="form-control" name="stage_name" autocomplete="off">
                    </div>

                    <div class="col-12 col-md-4">
                        <button type="submit" class="btn btn-primary">إضافة مرحلة جديدة</button>
                        @if(session()->has('stageadded'))
                            <span class="alert xalert"> {{session()->get('stageadded')}} <i class="fa fa-check"></i></span>
                        @endif
                        @if($errors->any())
                            <span class="alert xalert"> حدث خطأ <i class="fa fa-times"></i></span>
                        @endif
                    </div>


                </form>


                <div class="table-responsive">

                    <table class="table table-hover text-center" id="myTable">
                        <thead>
                        <tr class="bg-cyan">
                            <th scope="col">#</th>
                            <th scope="col">إسم المرحلة</th>
                            <th scope="col">تاريخ الإنشاء</th>
                            <th scope="col">آخر تعديل</th>
                            <th scope="col">الإجراءات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php $i = 0;  @endphp
                        @foreach($stages as $stage)
                            @php $i++; @endphp
                            <tr>
                                <th scope="row">{{$i}}</th>
                                <td>{{$stage->stage_name}}</td>
                                <td>{{$stage->created_at}}</td>
                                <td>{{$stage->updated_at}}</td>
                                <td>
                                    <button class="btn btn-primary" data-toggle="modal"
                                            data-target="#editbtn{{$stage->id}}">
                                        <i class="fa fa-edit"></i>
                                    </button>
                                    <!-- Modal -->
                                    <div class="modal fade" id="editbtn{{$stage->id}}" tabindex="-1" role="dialog"
                                         aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">تعديل المرحلة</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form action="{{url('admincp/stages/update')}}" method="post">
                                                    @csrf
                                                    <div class="modal-body">
                                                        <input type="text" hidden value="{{$stage->id}}" name="stage_id">
                                                        <div class="form-group col-12">
                                                            <input type="text" value="{{$stage->stage_name}}"
                                                                   class="form-control" name="stage_name" autocomplete="off">
                                                        </div>


                                                        <div class="col-12">
                                                            @if($errors->has('stage_name'))
                                                                <span class="alert" class="xalert"> حدث خطأ <i class="fa fa-times"></i></span>
                                                            @endif
                                                        </div>


                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-primary">تعديل المرحلة
                                                        </button>
                                                        <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">إلغاء
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Delete Button -->
                                    <button class="btn btn-danger"  data-toggle="modal"
                                            data-target="#delbtn{{$stage->id}}">
                                        <i class="fa fa-times-circle"></i>
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="delbtn{{$stage->id}}" tabindex="-1" role="dialog"
                                         aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-exclamation-triangle"></i> إنتبه.. حذف مرحلة</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form action="{{url('admincp/stages/suspend')}}" method="post">
                                                    @csrf
                                                    <div class="modal-body">
                                                        <input type="text" hidden value="{{$stage->id}}" name="stage_id">

                                                            <p>هل أنت متأكد من حذف هذه المرحلة نهائيا ؟</p>
                                                            <p> سيتسبب ذلك في <strong>حذف جميع المواد</strong> المندرجة أسفل هذه المرحلة  </p>



                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-danger">نعم
                                                        </button>
                                                        <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">إلغاء
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                </td>

                            </tr>
                        @endforeach

                        </tbody>
                    </table>





                </div>
            </div>
        </div>


    </div>
    <!-- /.container-fluid -->
@endsection


@section('adminCSS')

@endsection


@section('custom-js')



    <script>

        $('.xalert').click(function (){
            $(this).fadeOut();
        });
    </script>
@endsection
