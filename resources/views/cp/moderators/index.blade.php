@extends('cp.layout')

@section('title')
    قائمة المشرفين
@endsection

@section('content')
    <div class="container-fluid">

        <div class="content-header">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">قائمة المشرفين</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">الرئيسية</li>
                        <li class="breadcrumb-item">الأقسام الادارية</li>
                        <li class="breadcrumb-item">المشرفين</li>
                        <li class="breadcrumb-item active">قائمة المشرفين</li>
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
            {{--            <div class="card-header">--}}
            {{--                <i class="fas fa-table mr-1"></i>--}}
            {{--                القائمة--}}
            {{--            </div>--}}
            <div class="card-body">

                <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#addMod">
                    <i class="fa fa-plus"></i>
                    إضافة مشرف جديد
                </button>

                <!-- Add Mod Modal -->
                <div class="modal fade" id="addMod" tabindex="-1" role="dialog"
                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document" style="max-width: 768px;">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">إضافة مشرف</h5>
                                <button type="button" class="close" data-dismiss="modal"
                                        aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="{{url('admincp/moderators/add')}}" method="post">
                                @csrf
                                <div class="modal-body">
                                    <div class="container">

                                        <div class="row">
                                                <div class="form-group col-md-6">
                                                    <label for="firstName">الإسم الأول</label>
                                                    <input type="text" class="form-control"
                                                           name="firstName"
                                                           value="{{ old('firstName') }}"
                                                    >
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="lastName">الإسم الأخير</label>
                                                    <input type="text" class="form-control"
                                                           name="lastName"
                                                           value="{{ old('lastName') }}"
                                                    >
                                                </div>
                                            </div>

                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <label for="email">البريد الإلكتروني</label>
                                                <input type="email" class="form-control"
                                                       name="email"
                                                       value="{{ old('email') }}"
                                                >
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="password">كلمة المرور</label>
                                                <input type="password" class="form-control"
                                                       name="password"
                                                       value="{{ old('password') }}"
                                                >
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <label for="phone_number">الهاتف الشخصي</label>
                                                <input type="text" class="form-control"
                                                       name="phone_number">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="whatsapp">رقم الواتسآب</label>
                                                <input type="text" class="form-control"
                                                       name="whatsapp"
                                                       value="{{ old('whatsapp') }}"
                                                >
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-md-4">
                                                <label for="country_id">الجنسية</label>
                                                <select class="form-control add_select"
                                                       name="country_id"
                                                        style="appearance: none"
                                                >
                                                    @foreach($countries as $country)
                                                    <option value="{{$country->id}}">{{$country->country_name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="residence_id">بلد الإقامة</label>
                                                <select class="form-control add_select"
                                                        name="residence_id"
                                                        style="appearance: none"
                                                >
                                                    @foreach($residences as $residence)
                                                        <option value="{{$residence->id}}">{{$residence->residence_name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="gender">الجنس</label>
                                                <select class="form-control"
                                                        name="gender"
                                                        style="appearance: none"
                                                >
                                                        <option value="male">مشرف</option>
                                                        <option value="female">مشرفة</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group form-check">
                                                <input type="checkbox" class="form-check-input" name="verified">
                                                <label class="form-check-label" for="verified">يتطلب تفعيل عبر
                                                    البريد؟</label>
                                            </div>

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
                            <th scope="col">الإسم كامل</th>
                            <th scope="col">البريد</th>
                            <th scope="col">الواتسآب</th>
                            <th scope="col">الدولة</th>
                            <th scope="col">الجنس</th>
                            <th scope="col">آخر دخول</th>
                            <th scope="col">الإجراءات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php $i = 0;  @endphp
                        @foreach($mods as $mod)
                            @php $i++; @endphp
                            <tr>
                                <th scope="row">{{$i}}</th>
                                <td>{{$mod->fullName()}}</td>
                                <td>{{$mod->email}}</td>
                                <td>{{$mod->whatsapp}}</td>
                                <td>{{$mod->country->country_name}}</td>
                                <td>@if($mod->gender == 'male') مشرف@elseif($mod->gender == 'female')
                                        مشرفة @endif</td>
                                <td>{{$mod->lastLogin()}}</td>
                                <td>

                                <button class="btn btn-primary" data-toggle="modal"
                                        data-target="#editbtn{{$mod->id}}">
                                    <i class="fa fa-pen"></i>
                                </button>
                                <!-- Edit Modal -->

                                <div class="modal fade" id="editbtn{{$mod->id}}" tabindex="-1" role="dialog"
                                         aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document" style="max-width: 768px; text-align: right">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">تعديل بيانات المشرف</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form action="{{url("admincp/moderators/update/$mod->id")}}" method="post">
                                                    @csrf
                                                    @method('put')
                                                    <div class="modal-body">
                                                        <div class="container">

                                                            <div class="row">
                                                                <div class="form-group col-md-6">
                                                                    <label for="firstName">الإسم الأول</label>
                                                                    <input type="text" class="form-control"
                                                                           name="firstName"
                                                                           value="{{$mod->first_name}}"
                                                                    >
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <label for="lastName">الإسم الأخير</label>
                                                                    <input type="text" class="form-control"
                                                                           name="lastName"
                                                                           value="{{$mod->last_name}}"
                                                                    >
                                                                </div>
                                                            </div>

                                                            <div class="row">
                                                                <div class="form-group col-md-6">
                                                                    <label for="email">البريد الإلكتروني</label>
                                                                    <input type="email" class="form-control"
                                                                           name="email"
                                                                           value="{{$mod->email}}"
                                                                    >
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <label for="password">كلمة المرور</label>
                                                                    <input type="password" class="form-control"
                                                                           name="password"

                                                                    >
                                                                </div>
                                                            </div>

                                                            <div class="row">
                                                                <div class="form-group col-md-6">
                                                                    <label for="phone_number">الهاتف الشخصي</label>
                                                                    <input type="text" class="form-control"
                                                                           name="phone_number"
                                                                           value="{{$mod->phone_number}}"
                                                                    >
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <label for="whatsapp">رقم الواتسآب</label>
                                                                    <input type="text" class="form-control"
                                                                           name="whatsapp"
                                                                           value="{{$mod->whatsapp}}"
                                                                    >
                                                                </div>
                                                            </div>

                                                            <div class="row">
                                                                <div class="form-group col-md-4">
                                                                    <label for="country_id">الجنسية</label>
                                                                    <select class="form-control edit_select"
                                                                            name="country_id"
                                                                            style="appearance: none"
                                                                    >
                                                                        @foreach($countries as $country)
                                                                            <option value="{{$country->id}}"
                                                                            @if($mod->country_id == $country->id)
                                                                                selected
                                                                                @endif
                                                                            >{{$country->country_name}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                                <div class="form-group col-md-4">
                                                                    <label for="residence_id">بلد الإقامة</label>
                                                                    <select class="form-control edit_select"
                                                                            name="residence_id"
                                                                            style="appearance: none"
                                                                    >
                                                                        @foreach($residences as $residence)
                                                                            <option value="{{$residence->id}}"
                                                                                @if($mod->residence_id == $residence->id)
                                                                                    selected
                                                                                @endif
                                                                            >{{$residence->residence_name}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                                <div class="form-group col-md-4">
                                                                    <label for="gender">الجنس</label>
                                                                    <select class="form-control"
                                                                            name="gender"
                                                                            style="appearance: none"
                                                                    >
                                                                        <option value="male"
                                                                        @if($mod->gender == "male")
                                                                            selected
                                                                            @endif
                                                                        >مشرف</option>
                                                                        <option value="female"
                                                                                @if($mod->gender == "female")
                                                                                selected
                                                                            @endif
                                                                        >مشرفة</option>
                                                                    </select>
                                                                </div>
                                                            </div>

                                                            <div class="form-group form-check">
                                                                <input type="checkbox" class="form-check-input"
                                                                       @if($mod->email_verified_at !== null)
                                                                       checked
                                                                       @endif
                                                                       name="email_verified_at">
                                                                <label class="form-check-label" for="email_verified_at">
                                                                   مفعل مسبقاً
                                                                </label>
                                                            </div>

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

                                    <!-- Delete Button -->
                                    <button class="btn btn-danger" data-toggle="modal"
                                            data-target="#delbtn{{$mod->id}}">
                                        <i class="fa fa-user-alt-slash"></i>
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="delbtn{{$mod->id}}" tabindex="-1" role="dialog"
                                         aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel"><i
                                                            class="fa fa-exclamation-triangle"></i> إنتبه.. حذف مشرف
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form action="{{url('admincp/moderators/suspend')}}" method="post">
                                                    @csrf
                                                    <div class="modal-body">
                                                        <input type="text" hidden value="{{$mod->id}}"
                                                               name="mod_id">

                                                        <p>هل أنت متأكد من حذف هذا المشرف ؟</p>
                                                        <span class="badge badge-light">يمكنك التراجع عن هذا الإجراء لاحقاً</span>


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

                    @if(count($mods) > 0)
                        {{$mods->links()}}
                    @endif

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
{{--    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/i18n/ar.min.js" </script>--}}


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
                "autoWidth": false,

            });

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


        });
    </script>
@endsection
