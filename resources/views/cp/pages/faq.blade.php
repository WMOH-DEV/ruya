@extends('cp.layout')

@section('title')
    الأسئلة الشائعة
@endsection

@section('content')
    <div class="container-fluid">

        <div class="content-header">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">الأسئلة الشائعة</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">الرئيسية</li>
                        <li class="breadcrumb-item">الأقسام الإدارية</li>
                        <li class="breadcrumb-item active">الأسئلة الشائعة</li>
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



                <!-- add New Faq Button -->
                <div class="col-12 col-md-4">
                <button class="btn btn-primary"  data-toggle="modal"
                        data-target="#addNewFaq">
                    <i class="fa fa-plus"></i>
                    إضافة سؤال جديد
                </button>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="addNewFaq" tabindex="-1" role="dialog"
                     aria-labelledby="exampleModalLabel" aria-hidden="true"">
                <div class="modal-dialog" role="document" style="max-width: 768px;">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title"> إضافة سؤال شائع جديد</h5>
                                <button type="button" class="close" data-dismiss="modal"
                                        aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="{{url('admincp/pages/faq/store')}}" method="post">
                                @csrf
                                <div class="modal-body">
                                <div class="form-group">
                                    <label for="ques">السؤال</label>
                                    <input type="text" class="form-control" name="ques" value="{{old('ques')}}">
                                </div>
                                    <div class="form-group">
                                        <label for="ques">الإجابة</label>
                                        <textarea name="answer" id="answer" rows="10" class="form-control">{{old('answer')}}</textarea>
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
                            <th scope="col">السؤال</th>
                            <th scope="col">تاريخ الإنشاء</th>
                            <th scope="col">آخر تعديل</th>
                            <th scope="col">الإجراءات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php $i = 0;  @endphp
                        @foreach($faqs as $faq)
                            @php $i++; @endphp
                            <tr>
                                <th scope="row">{{$i}}</th>
                                <td>{{$faq->ques}}</td>
                                <td>{{$faq->created_at}}</td>
                                <td>{{$faq->updated_at}}</td>
                                <td>
                                    <button class="btn btn-primary" data-toggle="modal"
                                            data-target="#editbtn{{$faq->id}}">
                                        <i class="fa fa-edit"></i>
                                    </button>
                                    <!-- Modal -->
                                    <div class="modal fade" id="editbtn{{$faq->id}}" tabindex="-1" role="dialog"
                                         aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document" style="max-width: 768px;">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">تعديل السؤال</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form action="{{url("admincp/pages/faq/update/$faq->id")}}" method="post">
                                                    @csrf
                                                    @method('put')
                                                    <div class="modal-body">
                                                        <input type="text" hidden value="{{$faq->id}}" name="faq_id">
                                                        <div class="form-group col-12">
                                                            <input type="text" value="{{$faq->ques}}"
                                                                   class="form-control" name="ques" autocomplete="off">
                                                        </div>

                                                        <div class="form-group col-12">
                                                            <textarea name="answer"
                                                                      class="form-control"
                                                                      id="answer"
                                                                      rows="10">{{$faq->answer}}</textarea>
                                                        </div>



                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-primary">تعديل السؤال
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
                                            data-target="#delbtn{{$faq->id}}">
                                        <i class="fa fa-times-circle"></i>
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="delbtn{{$faq->id}}" tabindex="-1" role="dialog"
                                         aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-exclamation-triangle"></i> إنتبه.. حذف سؤال</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form action="{{url("admincp/pages/faq/delete/$faq->id")}}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <div class="modal-body">
                                                        <input type="text" hidden value="{{$faq->id}}" name="stage_id">

                                                        <p>هل أنت متأكد من حذف هذا السؤال نهائيا ؟</p>

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


                        {{$faqs->links()}}


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
@endsection
