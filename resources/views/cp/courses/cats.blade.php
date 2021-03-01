@extends('cp.layout')

@section('title')
    تصنيفات الكورسات
@endsection

@section('content')
    <div class="container-fluid">

        <div class="content-header">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">تصنيفات الكورسات</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">الرئيسية</li>
                        <li class="breadcrumb-item">الكورسات التعليمية</li>
                        <li class="breadcrumb-item active">تصنيفات الكورسات</li>
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

                <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#addCat">
                    <i class="fa fa-plus"></i>
                    إضافة تصنيف جديد
                </button>

                <!-- Add Mod Modal -->
                <div class="modal fade" id="addCat" tabindex="-1" role="dialog"
                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document" style="max-width: 768px;">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">إضافة تصنيف</h5>
                                <button type="button" class="close" data-dismiss="modal"
                                        aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="{{url('admincp/categories/add')}}" method="post"
                            enctype="multipart/form-data"
                            >
                                @csrf
                                <div class="modal-body">

                                    <div class="form-group col-md-12">
                                        <label for="name">الإسم الرئيسي</label>
                                        <input type="text" class="form-control"
                                               name="name"
                                               autocomplete="off"
                                               value="{{old('name')}}"
                                        >
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label for="short_name">إسم قصير</label>
                                        <input type="text" class="form-control"
                                               name="short_name"
                                               autocomplete="off"
                                               value="{{old('short_name')}}"
                                        >
                                    </div>


                                    <div class="form-group col-12">
                                        <label for="image">الصورة</label>
                                        <input type="file"
                                               class="form-control" name="image" autocomplete="off">
                                    </div>


                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">تأكيد
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

                    <table class="table table-hover text-center" id="myTable">
                        <thead>
                        <tr class="bg-cyan">
                            <th scope="col">#</th>
                            <th scope="col">الصورة</th>
                            <th scope="col">إسم التصنيف</th>
                            <th scope="col">وصف قصير</th>
                            <th scope="col">تاريخ الإنشاء</th>
                            <th scope="col">آخر تعديل</th>
                            <th scope="col">الإجراءات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php $i = 0;  @endphp
                        @foreach($cats as $cat)
                            @php $i++; @endphp
                            <tr>
                                <th scope="row">{{$i}}</th>
                                <td><img src="{{asset('uploads')}}/{{$cat->image}}" style="height: 50px" alt="image"> </td>
                                <td>{{$cat->name}}</td>
                                <td>{{$cat->short_name}}</td>
                                <td>{{$cat->created_at}}</td>
                                <td>{{$cat->updated_at}}</td>
                                <td>
                                    <button class="btn btn-primary" data-toggle="modal"
                                            data-target="#editbtn{{$cat->id}}">
                                        <i class="fa fa-edit"></i>
                                    </button>
                                    <!-- Modal -->
                                    <div class="modal fade" id="editbtn{{$cat->id}}" tabindex="-1" role="dialog"
                                         aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">تعديل التصنيف</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form action="{{url("admincp/categories/update/$cat->id")}}"
                                                      enctype="multipart/form-data"
                                                      method="post">
                                                    @csrf
                                                    @method('put')
                                                    <div class="modal-body text-left">
                                                        <input type="text" hidden value="{{$cat->id}}" name="id">

                                                            <div class="form-group col-md-12">
                                                                <label for="name">الإسم الرئيسي</label>
                                                                <input type="text" class="form-control"
                                                                       name="name"
                                                                       autocomplete="off"
                                                                       value="{{$cat->name}}"
                                                                >
                                                            </div>

                                                            <div class="form-group col-md-12">
                                                                <label for="short_name">إسم قصير</label>
                                                                <input type="text" class="form-control"
                                                                       name="short_name"
                                                                       autocomplete="off"
                                                                       value="{{$cat->short_name}}"
                                                                >
                                                            </div>


                                                        <div class="form-group col-12">
                                                            <label for="image">الصورة</label>
                                                            <img src="{{asset('uploads')}}/{{$cat->image}}" class="mb-2" style="height: 50px" alt="image">
                                                            <input type="file"
                                                                   class="form-control" name="image" >
                                                        </div>





                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-primary">تعديل التصنيف
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
                                            data-target="#delbtn{{$cat->id}}">
                                        <i class="fa fa-times-circle"></i>
                                    </button>

                                    <!-- Delete Modal -->
                                    <div class="modal fade" id="delbtn{{$cat->id}}" tabindex="-1" role="dialog"
                                         aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-exclamation-triangle"></i> إنتبه.. حذف تصنيف</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form action="{{url("admincp/categories/delete/$cat->id")}}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <div class="modal-body">
                                                        <input type="text" hidden value="{{$cat->id}}" name="cat_id">

                                                            <p>هل أنت متأكد من حذف هذه التصنيف نهائيا ؟</p>

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
    <link rel="stylesheet" href="{{asset('cp/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">

@endsection


@section('custom-js')

    <script src="{{asset('cp/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('cp/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>

    <script>
        $('#myTable').DataTable({
            language: {
                url: 'https://cdn.datatables.net/plug-ins/1.10.22/i18n/Arabic.json'
            },
            "paging": false,
            "lengthChange": false,
            "searching": true,
            "ordering": true,
            "info": false,
            "autoWidth": false,


        });

        if($("#errorMsg")){
            $("#errorMsg").delay(5000).slideUp(1000);
        }

    </script>
@endsection
