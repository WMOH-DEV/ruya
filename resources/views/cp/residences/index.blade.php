@extends('cp.layout')

@section('title')
    قائمة دول الإقامة
@endsection

@section('content')
    <div class="container-fluid">

        <div class="content-header">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">قائمة دول الإقامة</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">الرئيسية</li>
                        <li class="breadcrumb-item">دول الإقامات</li>
                        <li class="breadcrumb-item active">الإقامات</li>
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

                <form action="{{url('admincp/residences/add')}}" method="post" class="form-row">

                    @csrf

                    <div class="form-group col-12 col-md-4">
                        <input type="text" placeholder="إضافة دول جديدة للقائمة" class="form-control" name="residence_name" autocomplete="off">
                    </div>


                    <div class="col-12 col-md-4">
                        <button type="submit" class="btn btn-primary">إضافة دولة إقامة جديدة</button>
                        @if(session()->has('residenceadded'))
                            <span class="alert"> {{session()->get('residenceadded')}} <i class="fa fa-check"></i></span>
                        @endif
                        @if($errors->has('residence_name'))
                            <span class="alert xalert"> حدث خطأ <i class="fa fa-times"></i></span>
                        @endif
                    </div>


                </form>


                <div class="table-responsive">

                    <table class="table table-hover text-center" id="myTable">
                        <thead>
                        <tr class="bg-cyan">
                            <th scope="col">#</th>
                            <th scope="col">دولة الإقامة</th>
                            <th scope="col">تاريخ الإنشاء</th>
                            <th scope="col">آخر تعديل</th>
                            <th scope="col">الإجراءات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php $i = 0;  @endphp
                        @foreach($residences as $residence)
                            @php $i++; @endphp
                            <tr>
                                <th scope="row">{{$i}}</th>
                                <td>{{$residence->residence_name}}</td>
                                <td>{{$residence->created_at}}</td>
                                <td>{{$residence->updated_at}}</td>
                                <td>
                                    <button class="btn btn-primary" data-toggle="modal"
                                            data-target="#editbtn{{$residence->id}}">
                                        <i class="fa fa-edit"></i>
                                    </button>
                                    <!-- Modal -->
                                    <div class="modal fade" id="editbtn{{$residence->id}}" tabindex="-1" role="dialog"
                                         aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">تعديل دولة إقامة</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form action="{{url('admincp/residences/update')}}" method="post">
                                                    @csrf
                                                    <div class="modal-body">
                                                        <input type="text" hidden value="{{$residence->id}}" name="residence_id">
                                                        <div class="form-group col-12">
                                                            <input type="text" value="{{$residence->residence_name}}"
                                                                   class="form-control" name="residence_name" autocomplete="off">
                                                        </div>

                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-primary">تعديل الدولة
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
                                            data-target="#delbtn{{$residence->id}}">
                                        <i class="fa fa-times-circle"></i>
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="delbtn{{$residence->id}}" tabindex="-1" role="dialog"
                                         aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-exclamation-triangle"></i> إنتبه.. حذف دولة</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form action="{{url('admincp/residences/suspend')}}" method="post">
                                                    @csrf
                                                    <div class="modal-body">
                                                        <input type="text" hidden value="{{$residence->id}}" name="residence_id">

                                                            <p>هل أنت متأكد من حذف هذه الدولة نهائيا ؟</p>
                                                            <p>سيختفي اسم الدولة من بيانات المُعلم والطالب</p>



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
        $(document).ready(function () {
            $('.xalert').click(function () {
                $(this).fadeOut(200);
            })
        })
    </script>
@endsection
