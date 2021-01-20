@extends('cp.layout')

@section('title')
    قائمة المواد
@endsection

@section('content')
    <div class="container-fluid">

        <div class="content-header">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">قائمة المواد</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">الرئيسية</li>
                        <li class="breadcrumb-item">المُواد المُضافة</li>
                        <li class="breadcrumb-item active">قائمة المواد</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div>


        <div class="card mb-4">
            <div class="card-body">

                <form action="{{url('admincp/subjects/add')}}" method="post" class="form-row">

                    @csrf

                    <div class="form-group col-12 col-md-4">
                        <input type="text" placeholder="إسم المادة" class="form-control" name="subject_name">
                    </div>

                    <div class="form-group col-12 col-md-4">
                        <select name="stage_id" id="stage_id" class="form-control select2-right pr-3 py-1" dir="rtl">
                            <option value disabled selected>المرحلة التعليمية</option>
                            @foreach($stages as $stage)
                                <option value="{{$stage->id}}">{{$stage->stage_name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-12 col-md-4">
                        <button type="submit" class="btn btn-primary">إضافة مادة جديدة</button>
                        @if(session()->has('subjectadded'))
                            <span class="alert"> {{session()->get('subjectadded')}} <i class="fa fa-check"></i></span>
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
                            <th scope="col">إسم المادة</th>
                            <th scope="col">المرحلة التابعة لها</th>
                            <th scope="col">تاريخ الإنشاء</th>
                            <th scope="col">آخر تعديل</th>
                            <th scope="col">الإجراءات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php $i = 0;  @endphp
                        @foreach($subjects as $subject)
                            @php $i++; @endphp
                            <tr>
                                <th scope="row">{{$i}}</th>
                                <td>{{$subject->subject_name}}</td>
                                <td> @if(isset($subject->stage->stage_name)) {{$subject->stage->stage_name}} @else <span class="badge badge-dark">مرحلة محذوفة</span> @endif</td>
                                <td>{{$subject->created_at}}</td>
                                <td>{{$subject->updated_at}}</td>
                                <td>
                                    <button class="btn btn-primary" data-toggle="modal"
                                            data-target="#editbtn{{$subject->id}}">
                                        <i class="fa fa-edit"></i>
                                    </button>
                                    <!-- Modal -->
                                    <div class="modal fade" id="editbtn{{$subject->id}}" tabindex="-1" role="dialog"
                                         aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">تعديل مادة</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form action="{{url('admincp/subjects/update')}}" method="post">
                                                    @csrf
                                                    <div class="modal-body">
                                                        <input type="text" hidden value="{{$subject->id}}" name="subject_id">
                                                        <div class="form-group col-12">
                                                            <input type="text" value="{{$subject->subject_name}}"
                                                                   class="form-control" name="subject_name">
                                                        </div>

                                                        <div class="form-group col-12">
                                                            <select name="stage_id" id="stage_id" class="select2-right form-control py-1 pr-3" >
                                                                @foreach($stages as $stage)
                                                                    <option
                                                                        value="{{$stage->id}}" @if(isset($subject->stage->id) &&  $stage->id == $subject->stage->id) selected @endif>{{$stage->stage_name}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>



                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-primary">تعديل المادة
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
                                            data-target="#delbtn{{$subject->id}}">
                                        <i class="fa fa-times-circle"></i>
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="delbtn{{$subject->id}}" tabindex="-1" role="dialog"
                                         aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-exclamation-triangle"></i> إنتبه.. حذف مادة</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form action="{{url('admincp/subjects/suspend')}}" method="post">
                                                    @csrf
                                                    <div class="modal-body">
                                                        <input type="text" hidden value="{{$subject->id}}" name="subject_id">

                                                            <p>هل أنت متأكد من حذف هذه المادة ؟</p>



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



                    {{$subjects->links()}}


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
