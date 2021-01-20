@extends('cp.layout')

@section('title')
    الطلاب الخاملين
@endsection

@section('content')
    <div class="container-fluid">

        <div class="content-header">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">قائمة الطلاب الخاملين</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item">الرئيسية</li>
                            <li class="breadcrumb-item">الطلاب</li>
                            <li class="breadcrumb-item active">قائمة الطلاب الخاملين</li>
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
                <div class="table-responsive">

                    <table class="table table-hover text-center" id="myTable">
                        <thead>
                        <tr class="bg-cyan">
                            <th scope="col">#</th>
                            <th scope="col">الإسم كامل</th>
                            <th scope="col">البريد</th>
                            <th scope="col">الدولة</th>
                            <th scope="col">الجنس</th>
                            <th scope="col">آخر دخول منذ</th>
                            <th scope="col">الإجراءات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php $i = 0;  @endphp
                        @foreach($students as $student)
                            @php $i++; @endphp
                        <tr>
                            <th scope="row">{{$i}}</th>
                            <td>{{$student->first_name. ' ' . $student->last_name}}</td>
                            <td>{{$student->email}}</td>
                            <td>{{$student->country->country_name}}</td>
                            <td>@if($student->gender == 'male') طالب@elseif($student->gender == 'female') طالبة @endif</td>
                            <td>{{$student->lastLogin()}}</td>
                            <td>

                                <button class="btn btn-primary" data-toggle="modal"
                                        data-target="#editbtn{{$student->id}}">
                                    <i class="fa fa-envelope"></i>
                                </button>
                                <!-- Modal -->
                                <div class="modal fade" id="editbtn{{$student->id}}" tabindex="-1" role="dialog"
                                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">إرسال رسالة تذكير</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form action="{{url('admincp/students/send')}}" method="post">
                                                @csrf
                                                <div class="modal-body">
                                                    <input type="text" hidden value="{{$student->id}}" name="student_id">
                                                    <div class="form-group col-12">
                                                        هل أنت متأكد من إرسال رسالة تذكير إلى {{$student->fullName()}} ؟
                                                    </div>

                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-primary">
                                                        <i class="fa fa-paper-plane"></i>
                                                        إرسال
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
                                        data-target="#delbtn{{$student->id}}">
                                    <i class="fa fa-user-alt-slash"></i>
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="delbtn{{$student->id}}" tabindex="-1" role="dialog"
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
                                                    <input type="text" hidden value="{{$student->id}}" name="student_id">

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

                    @if(count($students) > 0)
                        {{$students->links()}}
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
