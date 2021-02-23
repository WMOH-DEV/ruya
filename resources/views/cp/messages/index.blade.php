@extends('cp.layout')

@section('title')
    قائمة الرسائل
@endsection

@section('content')
    <div class="container-fluid">

        <div class="content-header">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">قائمة الرسائل</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">الرئيسية</li>
                        <li class="breadcrumb-item">الاقسام الادارية</li>
                        <li class="breadcrumb-item active">الرسائل</li>
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

                    <table class="table text-center" id="myTable">
                        <thead>
                        <tr class="bg-cyan">
                            <th scope="col">#</th>
                            <th scope="col">الراسل</th>
                            <th scope="col">عنوان الرسالة</th>
                            <th scope="col">حالة الرسالة</th>
                            <th scope="col">حالة الرد</th>
                            <th scope="col">الإجراءات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php $i = 0;  @endphp
                        @foreach($messages as $message)
                            @php $i++; @endphp
                            <tr @if( $message->status == 1) style="background-color: rgba(0,0,0,.075)" @endif >
                                <th scope="row">{{$i}}</th>
                                <td><a href="{{url("admincp/messages/show/$message->id")}}">{{$message->fullName}}</a></td>
                                <td><a href="{{url("admincp/messages/show/$message->id")}}">{{$message->title}}</a></td>
                                <td class="align-middle">@if($message->status == '0') <span class="badge badge-primary">غير مقروءه</span> @elseif($message->status == '1')
                                        <span class="badge badge-warning"> تمت قراؤتها</span> @endif</td>
                                <td class="align-middle">@if($message->isResponded == '0') <span class="badge badge-primary">لم يتم الرد</span> @elseif($message->status == '1')
                                        <span class="badge badge-info"> تم الرد</span> @endif</td>

                                <td>


                                    <a href="{{url('admincp/messages/show')}}/{{$message->id}}" class="aClick">
                                        <button class="btn btn-primary">
                                            <i class="fa fa-eye"></i>
                                        </button>
                                    </a>
                                    <button class="btn btn-danger" data-toggle="modal"
                                            data-target="#delbtn{{$message->id}}">
                                        <i class="fa fa-trash"></i>
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="delbtn{{$message->id}}" tabindex="-1" role="dialog"
                                         aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel"><i
                                                            class="fa fa-exclamation-triangle"></i> حذف الرسالة</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form action="{{url('admincp/messages/destroy')}}/{{$message->id}}"
                                                      method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <div class="modal-body">
                                                        <input type="text" hidden value="{{$message->id}}"
                                                               name="message_id">

                                                        <p>هل أنت متأكد من حذف هذه الرسالة؟</p>

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

                    @if(count($messages) > 0)
                        {{$messages->links()}}
                    @endif

                </div>
            </div>
        </div>


    </div>
    <!-- /.container-fluid -->
@endsection


@section('adminCSS')

    <link rel="stylesheet" href="{{asset('cp/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <style>
        .aClick:hover {
            text-decoration: none
        }
    </style>
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
