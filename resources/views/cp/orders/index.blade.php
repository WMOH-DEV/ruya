@extends('cp.layout')

@section('title')
    قائمة الطلبات
@endsection

@section('content')
    <div class="container-fluid">

        <div class="content-header">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">قائمة الطلبات</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">الرئيسية</li>
                        <li class="breadcrumb-item">الطلبات</li>
                        <li class="breadcrumb-item active">قائمة الطلبات</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div>


        <div class="card mb-4">

            <div class="card-body">


                <div class="table-responsive">

                    <table class="table table-hover text-center" id="myTable">
                        <thead>
                        <tr class="bg-cyan">
                            <th scope="col">#</th>
                            <th scope="col">مقدم الطلب</th>
                            <th scope="col">إلى المُعلم</th>
                            <th scope="col">المرحلة المطلوبة</th>
                            <th scope="col">المادة المطلوبة</th>
                            <th scope="col">عدد الساعات</th>
                            <th scope="col">تاريخ إنشاء الطلب</th>
                            <th scope="col">الحالة</th>
                            <th scope="col">الإجراءات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php $i = 0;  @endphp
                        @foreach($orders as $order)
                            @php $i++; @endphp
                            <tr>
                                <td class="align-middle">{{$i}}</td>
                                <td class="align-middle">{{$order->user->fullName()}}</td>
                                <td class="align-middle">{{$order->teacher->user->fullName()}}</td>
                                <td class="align-middle">
                                    @if(isset($order->stage->stage_name)) {{$order->stage->stage_name}} @else المرحلة
                                    محذوفة @endif
                                </td>
                                <td class="align-middle">@if(isset($order->subject_name)) {{$order->subject_name}} @else المادة
                                    محذوفة @endif</td>
                                <td class="align-middle">@if($order->hours < 10 ) {{$order->hours}} ساعات @else {{$order->hours}} ساعة @endif</td>
                                <td class="align-middle">{{$order->created_at}}</td>
                                <td class="align-middle">@if($order->admin_status == 'مفتوح') <span class="badge badge-info">{{$order->admin_status}}</span> @elseif($order->admin_status == 'مرفوض') <span class="badge badge-dark">{{$order->admin_status}}</span> @elseif($order->admin_status == 'تم استلام العمولة') <span class="badge badge-primary">{{$order->admin_status}}</span> @endif</td>

                                <td>
                                    <button class="btn btn-primary py-1 px-2" data-toggle="modal"
                                            data-target="#editbtn{{$order->id}}">
                                        <i class="fa fa-eye"></i>
                                    </button>
                                    <!-- Modal -->
                                    <div class="modal fade" id="editbtn{{$order->id}}" tabindex="-1" role="dialog"
                                         aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document" style="max-width: 768px;">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">تفاصيل الطلب</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form action="{{url('admincp/orders/update')}}" method="post">
                                                    @csrf
                                                    <div class="modal-body">
                                                        <input type="text" hidden value="{{$order->id}}"
                                                               name="order_id">


                                                        <nav>
                                                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                                                <a class="nav-item nav-link active" id="nav-home-tab{{$order->id}}" data-toggle="tab" href="#nav-home{{$order->id}}" role="tab" aria-controls="nav-home{{$order->id}}" aria-selected="true">تفاصيل الطلب</a>
                                                                <a class="nav-item nav-link" id="nav-profile-tab{{$order->id}}" data-toggle="tab" href="#nav-profile{{$order->id}}" role="tab" aria-controls="nav-profile{{$order->id}}" aria-selected="false">معلومات الطالب</a>
                                                                <a class="nav-item nav-link" id="nav-contact-tab{{$order->id}}" data-toggle="tab" href="#nav-contact{{$order->id}}" role="tab" aria-controls="nav-contact{{$order->id}}" aria-selected="false">معلومات الُمعلم</a>
                                                            </div>
                                                        </nav>
                                                        <div class="tab-content" id="nav-tabContent">
                                                            <!-- Order details Table -->
                                                            <div class="tab-pane fade show active" id="nav-home{{$order->id}}" role="tabpanel" aria-labelledby="nav-home-tab{{$order->id}}">
                                                                <table class="table table-hover">
                                                                    <tbody>
                                                                    <tr>
                                                                        <th scope="row">إسم الطالب</th>
                                                                        <td>{{$order->user->fullName()}}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th scope="row">إسم المعلم</th>
                                                                        <td>{{$order->teacher->user->fullName()}}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th scope="row">المــادة</th>
                                                                        <td>{{$order->subject_name}}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th scope="row">عدد الساعات المطلوب</th>
                                                                        <td>{{$order->hours}}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th scope="row">تاريخ البدء المطلوب</th>
                                                                        <td>{{$order->start_date}}</td>

                                                                    </tr>

                                                                    <tr>
                                                                        <th scope="row">طريقة التواصل المفضلة</th>
                                                                        <td>{{$order->contact_way}}</td>

                                                                    </tr>

                                                                    <tr>
                                                                        <th scope="row">ملاحظـــات أخرى</th>
                                                                        <td>{{$order->notes}}</td>

                                                                    </tr>

                                                                    <tr>
                                                                        <th scope="row">تغيير حالة الطلب</th>
                                                                        <td>
                                                                                <select name="admin_status" style="" class="select-right">
                                                                                    <option value="مفتوح" @if($order->admin_status == 'مفتوح') selected @endif>مفتوح</option>
                                                                                    <option value="مرفوض" @if($order->admin_status == 'مرفوض') selected @endif>مرفوض</option>
                                                                                    <option value="تم استلام العمولة" @if($order->admin_status == 'تم استلام العمولة') selected @endif>تم استلام العمولة</option>
                                                                                </select>

                                                                        </td>

                                                                    </tr>

                                                                    </tbody>
                                                                </table>

                                                            </div>

                                                            <!-- Student details Table -->

                                                            <div class="tab-pane fade" id="nav-profile{{$order->id}}" role="tabpanel" aria-labelledby="nav-profile-tab{{$order->id}}">
                                                                <table class="table table-hover">
                                                                    <tbody>
                                                                    <tr>
                                                                        <th scope="row">إسم الطالب</th>
                                                                        <td>{{$order->user->fullName()}}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th scope="row">رقم الواتسآب</th>
                                                                        <td>{{$order->user->whatsapp}}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th scope="row">البريد الإلكتروني</th>
                                                                        <td>{{$order->user->email}}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th scope="row">الدولة</th>
                                                                        <td>{{$order->user->country->country_name}}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th scope="row">الجنس</th>
                                                                        <td>@if($order->user->gender == 'male') طالب @else طالبة @endif</td>
                                                                    </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>

                                                            <!-- Teacher details Table -->
                                                            <div class="tab-pane fade" id="nav-contact{{$order->id}}" role="tabpanel" aria-labelledby="nav-contact-tab{{$order->id}}">
                                                                <table class="table table-hover">
                                                                    <tbody>
                                                                    <tr>
                                                                        <th scope="row">إسم المُعلم</th>
                                                                        <td>{{$order->teacher->user->fullName()}}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th scope="row">رقم الواتسآب</th>
                                                                        <td>{{$order->teacher->user->whatsapp}}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th scope="row">البريد الإلكتروني</th>
                                                                        <td>{{$order->teacher->user->email}}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th scope="row">الدولة</th>
                                                                        <td>{{$order->teacher->user->country->country_name}}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th scope="row">باقي بيانات المعلم</th>
                                                                        <td><a href="{{url('/teacher/show')}}/{{$order->teacher->id}}"> <span class="">الملف الشخصي</span></a></td>
                                                                    </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>


                                                    </div>
                                                    <div class="modal-footer">
                                                           <button type="submit" class="btn btn-primary">حفظ الطلب
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
                                    <button class="btn btn-danger py-1 px-2" data-toggle="modal"
                                            data-target="#delbtn{{$order->id}}">
                                        <i class="fa fa-times-circle"></i>
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="delbtn{{$order->id}}" tabindex="-1" role="dialog"
                                         aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel"><i
                                                            class="fa fa-exclamation-triangle"></i> إنتبه.. حذف طلب
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form action="{{url('admincp/orders/suspend')}}" method="post">
                                                    @csrf
                                                    <div class="modal-body">
                                                        <input type="text" hidden value="{{$order->id}}"
                                                               name="order_id">

                                                        <p>هل أنت متأكد من حذف هذه الطلب ؟</p>
                                                        <p>يفضل تغيير حالته إلى مرفوض حتى تتمكن من الرجوع له مرة أخرى</p>


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

        $(function () {

                $('#myTable').DataTable({

                    language: {
                        url: 'https://cdn.datatables.net/plug-ins/1.10.22/i18n/Arabic.json'
                    },
                    "paging": false,
                    "lengthChange": true,
                    "searching": true,
                    "ordering": true,
                    "info": false,
                    "autoWidth": true,

                });
        })

        $('.xalert').click(function () {
            $(this).fadeOut();
        });
    </script>
@endsection
