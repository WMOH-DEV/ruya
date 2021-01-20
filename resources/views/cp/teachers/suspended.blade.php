@extends('cp.layout')

@section('title')
    قائمة المُعلمين الموقوفين
@endsection

@section('content')
    <div class="container-fluid">

        @if($errors->any())
            {!! implode('', $errors->all('<div>:message</div>')) !!}
        @endif

        <div class="content-header">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">قائمة الُمعلمين الموقوفين</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item">الرئيسية</li>
                            <li class="breadcrumb-item">المُعلمين</li>
                            <li class="breadcrumb-item active">قائمة المُعلمين الموقوفين</li>
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


                <table class="table table-hover text-center" id="myTable">
                    <thead>
                    <tr class="bg-cyan">
                        <th scope="col">#</th>
                        <th scope="col">الإسم كامل</th>
                        <th scope="col">البريد</th>
                        <th scope="col">الدولة</th>
                        <th scope="col">الجنس</th>
                        <th scope="col">المؤهل</th>
                        <th scope="col">الخبرة</th>
                        <th scope="col">المادة</th>
                        <th scope="col">مواد آخرى</th>
                        <th scope="col">المرفقات</th>
                        <th scope="col">الإجراءات</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($teachers as $teacher)

                        <tr>
                            <td class="align-middle" ><img class="rounded" style="height: 4rem;" src="{{asset('uploads')}}/{{$teacher->profile_img}}" alt=""></td>
                            <td class="align-middle" >
                                <a href="{{url('teachers/show')}}/{{$teacher->id}}" target="_blank">
                                    {{$teacher->user->first_name. ' ' . $teacher->user->last_name}}
                                </a>
                            </td>
                            <td class="align-middle" >{{$teacher->user->email}}</td>
                            <td class="align-middle" >{{$teacher->user->country->country_name}}</td>
                            <td class="align-middle" >@if($teacher->user->gender == 'male') مُعلم@elseif($teacher->user->gender == 'female') معلمة @endif</td>
                            <td class="align-middle" >{{$teacher->qualification}}</td>
                            <td class="align-middle" >{{$teacher->experience}}</td>
                            <td class="align-middle" >@if(isset($teacher->subject->subject_name)) {{$teacher->subject->subject_name}} @else <span class="badge badge-dark">مادة محذوفة</span> @endif</td>
                            <td class="align-middle" >@if($teacher->other_subjects) {{$teacher->other_subjects}} @else <span class="badge badge-light"> لا يُدرس مواد آخرى</span> @endif </td>
                            <td class="align-middle" >
                                <button class="btn btn-info py-1 px-2" data-toggle="tooltip" data-placement="top" title="المؤهل">
                                    <img class="down text-white" style="height: 1rem;" src="{{asset('cp/img/attach.svg')}}" href="{{asset('uploads')}}/{{$teacher->attachment}}" alt="download">
                                </button>
                                @if($teacher->attachment2)
                                    <button class="btn btn-success py-1 px-2" data-toggle="tooltip" data-placement="top" title="شهادة خبرة">

                                        <img class="down text-white" style="height: 1rem;" src="{{asset('cp/img/attach2.svg')}}" href="{{asset('uploads')}}/{{$teacher->attachment}}" alt="download">

                                    </button>
                                @endif
                            </td>
                            <td class="align-middle flex" >


                                <!-- restore Button -->
                                <button class="btn btn-primary py-1 px-2"  data-toggle="modal"
                                        data-target="#restore{{$teacher->id}}" data-bs-toggle="tooltip" data-bs-placement="top" title="إستعادة الُمعلم مرة أخرى">
                                    <i class="fas fa-undo"></i>
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="restore{{$teacher->id}}" tabindex="-1" role="dialog"
                                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-exclamation-triangle"></i>استعادة المُعلم</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form action="{{url('admincp/teachers/restore')}}" method="post">
                                                @csrf
                                                <div class="modal-body">
                                                    <input type="text" hidden value="{{$teacher->id}}" name="teacher_id">

                                                    <p>هل أنت متأكد من إستعادة المعلم ؟</p>


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



                                <!-- Delete Button -->
                                <button class="btn btn-danger  py-1 px-2"  data-toggle="modal"
                                        data-target="#delbtn{{$teacher->id}}">
                                    <i class="fa fa-times-circle"></i>
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="delbtn{{$teacher->id}}" tabindex="-1" role="dialog"
                                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-exclamation-triangle"></i> تحذير.. حذف نهائي</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form action="{{url('admincp/teachers/delete')}}" method="post">
                                                @csrf
                                                <div class="modal-body">
                                                    <input type="text" hidden value="{{$teacher->id}}" name="teacher_id">

                                                    <p>هل أنت متأكد من حذف المعلم نهائيا؟</p>

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

                @if(count($teachers) > 0)
                    {{$teachers->links()}}
                @endif

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
