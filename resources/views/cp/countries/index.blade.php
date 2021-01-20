@extends('cp.layout')

@section('title')
    قائمة المواد
@endsection

@section('content')
    <div class="container-fluid">

        <div class="content-header">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">قائمة الدول</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">الرئيسية</li>
                        <li class="breadcrumb-item">الدول والجنسيات</li>
                        <li class="breadcrumb-item active">قائمة الدول</li>
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

                <form action="{{url('admincp/countries/add')}}" method="post" class="form-row">

                    @csrf

                    <div class="form-group col-12 col-md-4">
                        <input type="text" placeholder="إضافة دول جديدة للقائمة" class="form-control" name="country_name" autocomplete="off">
                    </div>


                    <div class="col-12 col-md-4">
                        <button type="submit" class="btn btn-primary">إضافة دولة جديدة</button>
                        @if(session()->has('countryadded'))
                            <span class="alert"> {{session()->get('countryadded')}} <i class="fa fa-check"></i></span>
                        @endif
                        @if($errors->has('country_name'))
                            <span class="alert xalert"> حدث خطأ <i class="fa fa-times"></i></span>
                        @endif
                    </div>


                </form>


                <div class="table-responsive">

                    <table class="table table-hover text-center" id="myTable">
                        <thead>
                        <tr class="bg-cyan">
                            <th scope="col">#</th>
                            <th scope="col">إسم الدولة</th>
                            <th scope="col">تاريخ الإنشاء</th>
                            <th scope="col">آخر تعديل</th>
                            <th scope="col">الإجراءات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php $i = 0;  @endphp
                        @foreach($countries as $country)
                            @php $i++; @endphp
                            <tr>
                                <th scope="row">{{$i}}</th>
                                <td>{{$country->country_name}}</td>
                                <td>{{$country->created_at}}</td>
                                <td>{{$country->updated_at}}</td>
                                <td>
                                    <button class="btn btn-primary" data-toggle="modal"
                                            data-target="#editbtn{{$country->id}}">
                                        <i class="fa fa-edit"></i>
                                    </button>
                                    <!-- Modal -->
                                    <div class="modal fade" id="editbtn{{$country->id}}" tabindex="-1" role="dialog"
                                         aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">تعديل إسم الدولة</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form action="{{url('admincp/countries/update')}}" method="post">
                                                    @csrf
                                                    <div class="modal-body">
                                                        <input type="text" hidden value="{{$country->id}}" name="country_id">
                                                        <div class="form-group col-12">
                                                            <input type="text" value="{{$country->country_name}}"
                                                                   class="form-control" name="country_name" autocomplete="off">
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
                                            data-target="#delbtn{{$country->id}}">
                                        <i class="fa fa-times-circle"></i>
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="delbtn{{$country->id}}" tabindex="-1" role="dialog"
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
                                                <form action="{{url('admincp/countries/suspend')}}" method="post">
                                                    @csrf
                                                    <div class="modal-body">
                                                        <input type="text" hidden value="{{$country->id}}" name="country_id">

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
