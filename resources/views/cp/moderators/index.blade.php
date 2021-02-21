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

                                    div.

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
                                <td>{{$mod->first_name. ' ' . $mod->last_name}}</td>
                                <td>{{$mod->email}}</td>
                                <td>{{$mod->whatsapp}}</td>
                                <td>{{$mod->country->country_name}}</td>
                                <td>@if($mod->gender == 'male') مشرف@elseif($mod->gender == 'female')
                                        مشرفة @endif</td>
                                <td>{{$mod->lastLogin()}}</td>
                                <td>

{{--                                    <button class="btn btn-primary" data-toggle="modal"--}}
{{--                                            data-target="#editbtn{{$mod->id}}">--}}
{{--                                        <i class="fa fa-envelope"></i>--}}
{{--                                    </button>--}}
{{--                                    <!-- Modal -->--}}
{{--                                    <div class="modal fade" id="editbtn{{$mod->id}}" tabindex="-1" role="dialog"--}}
{{--                                         aria-labelledby="exampleModalLabel" aria-hidden="true">--}}
{{--                                        <div class="modal-dialog" role="document">--}}
{{--                                            <div class="modal-content">--}}
{{--                                                <div class="modal-header">--}}
{{--                                                    <h5 class="modal-title" id="exampleModalLabel">إرسال رسالة تذكير</h5>--}}
{{--                                                    <button type="button" class="close" data-dismiss="modal"--}}
{{--                                                            aria-label="Close">--}}
{{--                                                        <span aria-hidden="true">&times;</span>--}}
{{--                                                    </button>--}}
{{--                                                </div>--}}
{{--                                                <form action="{{url('admincp/countries/update')}}" method="post">--}}
{{--                                                    @csrf--}}
{{--                                                    <div class="modal-body">--}}
{{--                                                        <input type="text" hidden value="{{$mod->id}}" name="country_id">--}}
{{--                                                        <div class="form-group col-12">--}}
{{--                                                            هل أنت متأكد من إرسال رسالة تذكير إلى {{$mod->fullName()}} ؟--}}
{{--                                                        </div>--}}

{{--                                                    </div>--}}
{{--                                                    <div class="modal-footer">--}}
{{--                                                        <button type="submit" class="btn btn-primary">--}}
{{--                                                            <i class="fa fa-paper-plane"></i>--}}
{{--                                                            إرسال--}}
{{--                                                        </button>--}}
{{--                                                        <button type="button" class="btn btn-secondary"--}}
{{--                                                                data-dismiss="modal">إلغاء--}}
{{--                                                        </button>--}}
{{--                                                    </div>--}}
{{--                                                </form>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}

                                    <!-- Delete Button -->
                                    <button class="btn btn-danger"  data-toggle="modal"
                                            data-target="#delbtn{{$mod->id}}">
                                        <i class="fa fa-user-alt-slash"></i>
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="delbtn{{$mod->id}}" tabindex="-1" role="dialog"
                                         aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-exclamation-triangle"></i> إنتبه.. حذف طالب</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form action="{{url('admincp/students/suspend')}}" method="post">
                                                    @csrf
                                                    <div class="modal-body">
                                                        <input type="text" hidden value="{{$mod->id}}" name="student_id">

                                                        <p>هل أنت متأكد من حذف هذا الطالب ؟</p>
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
                "autoWidth": false,

            });




        });
    </script>
@endsection
