@extends('cp.layout')

@section('title')
    آراء الطلاب والمعلمين
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
                    <h1 class="m-0 text-dark">آراء الطلاب والمعلمين</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">الرئيسية</li>
                        <li class="breadcrumb-item">الأقسام الإدارية</li>
                        <li class="breadcrumb-item active">آراء الطلاب والمعلمين</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div>


        <div class="card mb-4">

            <div class="card-body">


                <!-- add New testimonials Button -->
                <div class="col-12 col-md-4">
                    <button class="btn btn-primary" data-toggle="modal"
                            data-target="#addNewtestimonial">
                        <i class="fa fa-plus"></i>
                        إضافة رأي جديد
                    </button>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="addNewtestimonial" tabindex="-1" role="dialog"
                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document" style="max-width: 768px;">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title"> إضافة رأي جديد</h5>
                                <button type="button" class="close" data-dismiss="modal"
                                        aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="{{url('admincp/pages/testimonials/store')}}"
                                  enctype="multipart/form-data"
                                  method="post">
                                @csrf
                                <div class="modal-body">
                                    <div class="form-group row">
                                        <div class="col-4">
                                            <label for="owner">اسم صاحب الرأي</label>
                                            <input type="text" class="form-control" name="owner"
                                                   value="{{old('owner')}}">
                                        </div>
                                        <div class="col-4">
                                            <label for="owner_title">المسمى الوظيفي او الصفة</label>
                                            <input type="text" class="form-control" name="owner_title"
                                                   value="{{old('owner_title')}}">
                                            <small class="form-text text-danger">
                                                مثل زائر او مُعلم
                                                أو طالب</small>
                                        </div>
                                        <div class="col-4">
                                            <label for="photo">الصورة الشخصية</label>
                                            <input class="form-control form-control-sm" id="photo" name="photo"
                                                   type="file" style="height: 40px"/>
                                            <small class="form-text text-danger">إضافة الصورة ليس إلزامي</small>
                                        </div>
                                    </div>


                                    <div class="form-group col-12">
                                        <label for="full_review">جملة قصيرة</label>
                                        <textarea name="short_review"
                                                  class="form-control"
                                                  id="short_review"
                                                  rows="2"
                                                  maxlength="100"
                                        >{{old('short_review')}}</textarea>
                                        <small class="form-text text-danger">ليس إلزامي - أقصى عدد 100 حرف</small>
                                    </div>

                                    <div class="form-group col-12">
                                        <label for="full_review">الرأي الاساسي</label>
                                        <textarea name="full_review"
                                                  class="form-control"
                                                  id="full_review"
                                                  rows="4"
                                                  maxlength="200"
                                        >{{old('full_review')}}</textarea>
                                        <small class="form-text text-danger"> * إلزامي - أقصى عدد 200 حرف</small>
                                    </div>


                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-danger">إضافة
                                    </button>
                                    <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">إلغاء
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>


                <div class="table-responsive">

                    <table class="table table-hover text-center " id="myTable">
                        <thead>
                        <tr class="bg-cyan">
                            <th scope="col">#</th>
                            <th scope="col">صاحب التعليق</th>
                            <th scope="col">الصفة</th>
                            <th scope="col">تاريخ الإنشاء</th>
                            <th scope="col">آخر تحديث</th>
                            <th scope="col">الإجراءات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($tests as $test)
                            <tr>
                                <th scope="row"><img src="{{asset('uploads')}}/{{$test->photo}}" alt="piv"
                                                     style="width: 50px"></th>
                                <td>{{$test->owner}}</td>
                                <td>{{$test->owner_title}}</td>
                                <td>{{$test->created_at}}</td>
                                <td>{{$test->updated_at}}</td>
                                <td>

                                    <!-- Edit -->
                                    <button class="btn btn-primary" data-toggle="modal"
                                            data-target="#showbtn{{$test->id}}">
                                        <i class="fa fa-eye"></i>
                                    </button>
                                    <!-- Modal -->
                                    <div class="modal fade" id="showbtn{{$test->id}}" tabindex="-1" role="dialog"
                                         aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document" style="max-width: 768px;">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">مشاهدة الرأي</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>

                                                    <div class="modal-body">
                                                        <div class="form-group row col-12">
                                                            <div class="col-4">
                                                                <label for="owner">اسم صاحب الرأي</label>
                                                                <input type="text" class="form-control" disabled name="owner"
                                                                       value="{{$test->owner}}">
                                                            </div>
                                                            <div class="col-4">
                                                                <label for="owner_title">المسمى الوظيفي او الصفة</label>
                                                                <input type="text" class="form-control" name="owner_title"
                                                                       value="{{$test->owner_title}}"
                                                                       disabled
                                                                >

                                                            </div>
                                                            <div class="col-4">
                                                                <label for="photo">الصورة الشخصية</label>

                                                                <img src="{{asset('uploads')}}/{{$test->photo}}" alt="" style="height: 50px">

                                                            </div>
                                                        </div>


                                                        <div class="form-group col-12">
                                                            <label for="full_review">جملة قصيرة</label>
                                                            <textarea name="short_review"
                                                                      class="form-control"
                                                                      id="short_review"
                                                                      rows="2"
                                                                      maxlength="100"
                                                                      disabled
                                                            >{{$test->short_review}}</textarea>
                                                        </div>

                                                        <div class="form-group col-12">
                                                            <label for="full_review">الرأي الاساسي</label>
                                                            <textarea name="full_review"
                                                                      class="form-control"
                                                                      id="full_review"
                                                                      rows="4"
                                                                      maxlength="200"
                                                                      disabled
                                                            >{{$test->full_review}}</textarea>
                                                        </div>


                                                    </div>

                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">موافق
                                                        </button>
                                                    </div>
                                            </div>
                                        </div>
                                    </div>


                                    <!-- Edit -->
                                    <button class="btn btn-info" data-toggle="modal"
                                            data-target="#editbtn{{$test->id}}">
                                        <i class="fa fa-edit"></i>
                                    </button>
                                    <!-- Modal -->
                                    <div class="modal fade" id="editbtn{{$test->id}}" tabindex="-1" role="dialog"
                                         aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document" style="max-width: 768px;">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">تعديل الرأي</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form action="{{url("admincp/pages/testimonials/update/$test->id")}}"
                                                      method="post"
                                                    enctype="multipart/form-data"
                                                >
                                                    @csrf
                                                    @method('put')
                                                    <div class="modal-body">
                                                        <div class="form-group row">
                                                            <div class="col-4">
                                                                <label for="owner">اسم صاحب الرأي</label>
                                                                <input type="text" class="form-control" name="owner"
                                                                       value="{{$test->owner}}">
                                                            </div>
                                                            <div class="col-4">
                                                                <label for="owner_title">المسمى الوظيفي او الصفة</label>
                                                                <input type="text" class="form-control" name="owner_title"
                                                                       value="{{$test->owner_title}}">
                                                                <small class="form-text text-danger">
                                                                    مثل زائر او مُعلم
                                                                    أو طالب</small>
                                                            </div>
                                                            <div class="col-4">
                                                                <label for="photo">الصورة الشخصية</label>
                                                                <input class="form-control form-control-sm" id="photo" name="photo"
                                                                       type="file" style="height: 40px"/>
                                                                <small class="form-text text-danger">إضافة الصورة ليس إلزامي</small>
                                                            </div>
                                                        </div>


                                                        <div class="form-group col-12">
                                                            <label for="full_review">جملة قصيرة</label>
                                                            <textarea name="short_review"
                                                                      class="form-control"
                                                                      id="short_review"
                                                                      rows="2"
                                                                      maxlength="100"
                                                            >{{$test->short_review}}</textarea>
                                                            <small class="form-text text-danger">ليس إلزامي - أقصى عدد 100 حرف</small>
                                                        </div>

                                                        <div class="form-group col-12">
                                                            <label for="full_review">الرأي الاساسي</label>
                                                            <textarea name="full_review"
                                                                      class="form-control"
                                                                      id="full_review"
                                                                      rows="4"
                                                                      maxlength="200"
                                                            >{{$test->full_review}}</textarea>
                                                            <small class="form-text text-danger"> * إلزامي - أقصى عدد 200 حرف</small>
                                                        </div>


                                                    </div>

                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-primary">تعديل الرأي
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
                                    <button class="btn btn-danger" data-toggle="modal"
                                            data-target="#delbtn{{$test->id}}">
                                        <i class="fa fa-times-circle"></i>
                                    </button>
                                    <!-- Modal -->
                                    <div class="modal fade" id="delbtn{{$test->id}}" tabindex="-1" role="dialog"
                                         aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel"><i
                                                            class="fa fa-exclamation-triangle"></i> إنتبه.. حذف سؤال
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form action="{{url("admincp/pages/testimonials/delete/$test->id")}}"
                                                      method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <div class="modal-body">
                                                        <input type="text" hidden value="{{$test->id}}" name="stage_id">

                                                        <p>هل أنت متأكد من حذف هذا الرأي نهائيا ؟</p>

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


                    {{$tests->links()}}


                </div>
            </div>
        </div>


    </div>
    <!-- /.container-fluid -->
@endsection


@section('adminCSS')


    <link rel="stylesheet" href="{{asset('cp/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">


@endsection


@section('custom-js')


    <script src="{{asset('cp/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('cp/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>

    <script>
        $(function () {
            $('#myTable').DataTable({
                language: {
                    url: 'https://cdn.datatables.net/plug-ins/1.10.22/i18n/Arabic.json'
                },
                "paging": false,
                "lengthChange": false,
                "searching": true,
                "ordering": true,
                "info": false,
                "autoWidth": true,

            });


        });
    </script>
    <script>
        if($("#errorMsg")){
            $("#errorMsg").delay(5000).slideUp(1000);
        }
    </script>

@endsection
