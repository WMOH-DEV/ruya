@extends('cp.layout')

@section('title')
    قائمة الكورسات
@endsection

@section('content')
    <div class="container-fluid">

        <div class="content-header">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">قائمة الكورسات</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">الرئيسية</li>
                        <li class="breadcrumb-item">الكورسات التعليمية</li>
                        <li class="breadcrumb-item active">قائمة الكورسات</li>
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
                    إضافة كورس جديد
                </button>

                <!-- Add Mod Modal -->
                <div class="modal fade" id="addCat" tabindex="-1" role="dialog"
                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">إضافة كورس</h5>
                                <button type="button" class="close" data-dismiss="modal"
                                        aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="{{url('admincp/courses/add')}}" method="post" enctype="multipart/form-data" >
                                @csrf
                                <div class="modal-body">
                                    <div class="container">
                                        <div class="row">
                                            <div class="form-group col-md-3">
                                                <label for="title">عنوان الكورس</label>
                                                <input type="text" class="form-control"
                                                       name="title"
                                                       value="{{ old('title') }}"
                                                >
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="category_id">التصنيف</label>
                                                <select name="category_id" id="category_id" class="add_select form-group">
                                                    @foreach($cats as $cat)
                                                        <option value="{{$cat->id}}">{{$cat->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label for="duration">مدة الكورس</label>
                                                <input type="text" class="form-control"
                                                       name="duration"
                                                       value="{{ old('duration') }}"
                                                >
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label for="price">ثمن الكورس</label>
                                                <input type="text" class="form-control"
                                                       name="price"
                                                       value="{{ old('price') }}"
                                                >
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label for="lectures">عدد المحاضرات </label>
                                                <input type="number" class="form-control"
                                                       name="lectures"
                                                       value="{{ old('lectures') }}"
                                                >
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-3">
                                                <label for="instructor">إسم المحاضر</label>
                                                <input type="text" class="form-control"
                                                       name="instructor"
                                                       value="{{ old('instructor') }}"
                                                >
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="how">وسيلة الشرح</label>
                                                <input type="text" class="form-control"
                                                       name="how"
                                                       value="{{ old('how') }}"
                                                >
                                                <span class="text-success text-sm">مثل زوم او جوجل ميتنج</span>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="language">اللغة</label>
                                                <input type="text" class="form-control"
                                                       name="language"
                                                       value="{{ old('language') }}"
                                                >
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="intro_image">صورة الكورس</label>
                                                <input type="file" class="form-control"
                                                       name="intro_image"
                                                       value="{{ old('intro_image') }}"
                                                >
                                                <span class="text-success text-sm">ليس إلزامي</span>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <label for="about_instructor">نبذه  عن المحاضر</label>
                                                <textarea type="text" class="form-control"
                                                       name="about_instructor"
                                                    cols="5"
                                                >
                                                    {{ old('about_instructor') }}
                                                </textarea>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="intro_text">مقدمة عن الكورس</label>
                                                <textarea type="text" class="form-control"
                                                          name="intro_text"
                                                          cols="5"
                                                >
                                                    {{ old('intro_text') }}
                                                </textarea>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <label for="content">وصف طويل للكورس</label>
                                                <textarea type="text" class="form-control"
                                                          name="content"
                                                          cols="5"
                                                >{{ old('content') }}</textarea>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-md-4">
                                                <label for="intro_video">فيديو تعريفي</label>
                                                <input type="text" class="form-control"
                                                       name="intro_video"
                                                       value="{{ old('intro_video') }}"
                                                >
                                                <span class="text-success text-sm">رابط من يوتيوب - غير الزامي</span>

                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="for_who">المستفيد</label>
                                                <input type="text" class="form-control"
                                                       name="for_who"
                                                       value="{{ old('for_who') }}"
                                                >
                                                <span class="text-success text-sm">مثال : مبتدئين ، مستوى متوسط</span>

                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="requirements">متطلبات</label>
                                                <input type="text" class="form-control"
                                                       name="requirements"
                                                       value="{{ old('requirements') }}"
                                                >
                                                <span class="text-success text-sm">مثال : معرفة مسبقة بمحتوى معين</span>

                                            </div>
                                        </div>


                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">إضافة
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
                            <th scope="col">عنوان الكورس</th>
                            <th scope="col">السعر</th>
                            <th scope="col">المدة</th>
                            <th scope="col">اسم المحاضر</th>
                            <th scope="col">التصنيف</th>
                            <th scope="col">وسيلة الشرح</th>
                            <th scope="col">الإجراءات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php $i = 0;  @endphp
                        @foreach($courses as $course)
                            @php $i++; @endphp
                            <tr>
                                <th scope="row">{{$i}}</th>
                                <td><img src="{{asset('uploads')}}/{{$course->intro_image}}" style="height: 50px" alt="image"> </td>
                                <td>{{$course->title}}</td>
                                <td>{{$course->price}}</td>
                                <td>{{$course->duration}}</td>
                                <td>{{$course->instructor}}</td>
                                <td>{{$course->category->name}}</td>
                                <td>{{$course->how}}</td>
                                <td>
                                    <button class="btn btn-primary" data-toggle="modal"
                                            data-target="#editbtn{{$course->id}}">
                                        <i class="fa fa-edit"></i>
                                    </button>
                                    <!-- Modal -->
                                    <div class="modal fade" id="editbtn{{$course->id}}" tabindex="-1" role="dialog"
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
                                                <form action="{{url("admincp/categories/update/$course->id")}}"
                                                      enctype="multipart/form-data"
                                                      method="post">
                                                    @csrf
                                                    @method('put')
                                                    <div class="modal-body text-left">
                                                        <input type="text" hidden value="{{$course->id}}" name="id">
                                                            <div class="form-group col-md-12">
                                                                <label for="name">عنوان الكورس</label>
                                                                <input type="text" class="form-control"
                                                                       name="name"
                                                                       autocomplete="off"
                                                                       value="{{$course->title}}"
                                                                >
                                                            </div>
                                                            <div class="form-group col-md-12">
                                                                <label for="short_name">التصنيف</label>
                                                                <input type="text" class="form-control"
                                                                       name="short_name"
                                                                       autocomplete="off"
                                                                       value="{{$course->category->name}}"
                                                                >
                                                            </div>
                                                        <div class="form-group col-12">
                                                            <label for="intro_image">الصورة</label>
                                                            <img src="{{asset('uploads')}}/courses/{{$course->intro_image}}" class="mb-2" style="height: 50px" alt="image">
                                                            <input type="file"
                                                                   class="form-control" name="intro_image" >
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
                                            data-target="#delbtn{{$course->id}}">
                                        <i class="fa fa-times-circle"></i>
                                    </button>

                                    <!-- Delete Modal -->
                                    <div class="modal fade" id="delbtn{{$course->id}}" tabindex="-1" role="dialog"
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
                                                <form action="{{url("admincp/categories/delete/$course->id")}}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <div class="modal-body">
                                                        <input type="text" hidden value="{{$course->id}}" name="cat_id">

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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" integrity="sha256-FdatTf20PQr/rWg+cAKfl6j4/IY3oohFAJ7gVC3M34E=" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@ttskch/select2-bootstrap4-theme@x.x.x/dist/select2-bootstrap4.min.css">

@endsection


@section('custom-js')

    <script src="{{asset('cp/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('cp/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>


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

        $(document).ready(function () {
            $(function () {
                $(".add_select").select2({
                    theme: 'bootstrap4',
                    dir: "rtl",
                    dropdownAutoWidth: true,
                });
            });
        })

    </script>
@endsection
