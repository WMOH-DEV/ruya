@extends('cp.layout')

@section('title')
    لوحة المراقبة
@endsection

@section('content')
    <div class="container-fluid">

        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">

                        <!-- New orders Number -->
                        <h3>{{$teachersCount}}</h3>

                        <p>إجمالي عدد المعلمين</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-users"></i>
                    </div>
                    <a href="{{url('admincp/teachers')}}" class="small-box-footer">مزيد من المعومات<i class="fas fa-arrow-circle-left mr-3"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3>{{$teachersPending}}</h3>

                        <p>مُعلمين غير مفعلين</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-exclamation-triangle"></i>
                    </div>
                    <a href="{{url('admincp/teachers/pending')}}" class="small-box-footer">مزيد من المعومات<i class="fas fa-arrow-circle-left mr-3"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>{{$maleTeacher}}</h3>

                        <p>مُعلم</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-male"></i>
                    </div>
                    <a href="{{url('admincp/teachers')}}" class="small-box-footer">مزيد من المعومات<i class="fas fa-arrow-circle-left mr-3"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>{{$femaleTeacher}}</h3>

                        <p>مُعلمة</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-female"></i>
                    </div>
                    <a href="{{url('admincp/teachers')}}" class="small-box-footer">مزيد من المعومات<i class="fas fa-arrow-circle-left mr-3"></i></a>
                </div>
            </div>
            <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-3 col-6">
                <!-- info box -->
                <div class="info-box">
                    <span class="info-box-icon bg-info"><i class="far fa-envelope"></i></span>
                    <div class="info-box-content">
                        <a href="{{url('admincp/messages')}}" class="text-decoration-none">
                            <span class="info-box-text">رسائل جديدة</span>
                            <span class="info-box-number">{{$newMsgs}}</span>
                        </a>
                    </div>
                    <!-- /.info-box-content -->
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <!-- info box -->
                <div class="info-box">
                    <span class="info-box-icon bg-success"><i class="far fa-envelope"></i></span>
                    <div class="info-box-content">
                        <a href="{{url('admincp/messages')}}" class="text-decoration-none">
                        <span class="info-box-text">لم يتم الرد</span>
                        <span class="info-box-number">{{$unAnswerMsgs}}</span>
                        </a>
                    </div>
                    <!-- /.info-box-content -->
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <!-- info box -->
                <div class="info-box">
                    <span class="info-box-icon bg-warning"><i class="far fa-envelope"></i></span>
                    <div class="info-box-content">
                        <a href="{{url('admincp/messages')}}" class="text-decoration-none">
                        <span class="info-box-text">تم الرد عليها</span>
                        <span class="info-box-number">{{$answeredMsgs}}</span>
                        </a>
                    </div>
                    <!-- /.info-box-content -->
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- info box -->
                <div class="info-box">
                    <span class="info-box-icon bg-info"><i class="far fa-envelope"></i></span>
                    <div class="info-box-content">
                        <a href="{{url('admincp/messages')}}" class="text-decoration-none">
                            <span class="info-box-text">إجمالي الرسائل</span>
                            <span class="info-box-number">{{$allMsgs}}</span>
                        </a>
                    </div>
                    <!-- /.info-box-content -->
                </div>
            </div>
            <!-- ./col -->
        </div>
        <!-- /.row -->

        <!-- Requests Row -->
        <div class="row">
            <div class="col-lg-3 col-6">
                <!-- info box -->
                <div class="info-box">
                    <span class="info-box-icon bg-info"><i class="far fa-copy"></i></span>
                    <div class="info-box-content">
                        <a href="{{url('admincp/orders')}}" class="text-decoration-none">
                        <span class="info-box-text">الطلبات المفتوحة</span>
                        <span class="info-box-number">{{$openOrders}}</span>
                        </a>
                    </div>
                    <!-- /.info-box-content -->
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <!-- info box -->
                <div class="info-box">
                    <span class="info-box-icon bg-success"><i class="far fa-copy"></i></span>
                    <div class="info-box-content">
                        <a href="{{url('admincp/orders')}}" class="text-decoration-none">
                        <span class="info-box-text">الطلبات المغلقة</span>
                        <span class="info-box-number">{{$closedOrders}}</span>
                        </a>
                    </div>
                    <!-- /.info-box-content -->
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <!-- info box -->
                <div class="info-box">
                    <span class="info-box-icon bg-warning"><i class="far fa-copy"></i></span>
                    <div class="info-box-content">
                        <a href="{{url('admincp/orders')}}" class="text-decoration-none">
                        <span class="info-box-text">الطلبات المرفوضة</span>
                        <span class="info-box-number">{{$refusedOrders}}</span>
                        </a>
                    </div>
                    <!-- /.info-box-content -->
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- info box -->
                <div class="info-box">
                    <span class="info-box-icon bg-info"><i class="far fa-copy"></i></span>
                    <div class="info-box-content">
                        <a href="{{url('admincp/orders')}}" class="text-decoration-none">
                        <span class="info-box-text">إجمالي الطلبات</span>
                        <span class="info-box-number">{{$allOrders}}</span>
                        </a>
                    </div>
                    <!-- /.info-box-content -->
                </div>
            </div>
            <!-- ./col -->
        </div>
        <!-- /.row -->





        <!-- LAst Teacher & last requests -->
        <div class="row">
            <!-- Left col -->
            <section class="col-lg-6 connectedSortable">
                <div class="card lastTeachers">
                    <div class="card-header d-flex p-0">
                        <h3 class="card-title p-3">
                            <i class="fas fa fa-users mr-1"></i>
                            آخر المُعلمين المُسجلين
                        </h3>
                    </div>

                    <div class="card-body">
                        <div class="tab-content p-0">
                            <table class="table table-hover table-responsive w-100 d-block d-md-table">
                                <tr class="border-top-0">
                                    <th class="border-top-0"></th>
                                    <th class="border-top-0">الإسم</th>
                                    <th class="border-top-0">الجنسية</th>
                                    <th class="border-top-0">المؤهل</th>
                                    <th class="border-top-0">الخبرة</th>
                                </tr>
                                @if(isset($lastTeachers))
                                    @foreach($lastTeachers as $teacher)
                                <tr>
                                    <td><img src="{{asset('uploads')}}/{{$teacher->profile_img}}" alt="" style="height:2rem;"></td>
                                    <td>{{$teacher->user->fullname()}}</td>
                                    <td>{{$teacher->user->country->country_name}}</td>
                                    <td>{{$teacher->qualification}}</td>
                                    <td>{{$teacher->experience}} سنوات</td>
                                </tr>
                                    @endforeach
                                @endif
                            </table>
                        </div>
                    </div>
                </div>

            </section>
            <!-- /.Left col -->
            <!-- right col (We are only adding the ID to make the widgets sortable)-->
            <section class="col-lg-6 connectedSortable">
                <div class="card lastTeachers">
                    <div class="card-header d-flex p-0">
                        <h3 class="card-title p-3">
                            <i class="fas fa-envelope-open-text mr-1"></i>
                            آخر طلبات مُقدمة
                        </h3>
                    </div>

                    <div class="card-body">
                        <div class="tab-content p-0">
                            <table class="table table-hover table-responsive w-100 d-block d-md-table">
                                <tr class="border-top-0">
                                    <th class="border-top-0">من الطالب</th>
                                    <th class="border-top-0">إلى المُعلم</th>
                                    <th class="border-top-0">التواصل</th>
                                    <th class="border-top-0">حالة الطلب</th>
                                </tr>
                                @if(isset($lastOrders))
                                    @foreach($lastOrders as $order)
                                        <tr>
                                            <td>{{$order->user->fullName()}}</td>
                                            <td class="align-middle">{{$order->teacher->user->fullName()}}</td>
                                            <td>{{$order->contact_way}}</td>
                                            <td class="align-middle text-center">@if($order->admin_status == 'مفتوح') <span class="badge badge-info">{{$order->admin_status}}</span> @elseif($order->admin_status == 'مرفوض') <span class="badge badge-dark">{{$order->admin_status}}</span> @elseif($order->admin_status == 'تم استلام العمولة') <span class="badge badge-primary">{{$order->admin_status}}</span> @endif</td>
                                        </tr>
                                    @endforeach
                                @endif
                            </table>
                        </div>
                    </div>
                </div>

            </section>
            <!-- right col -->
        </div>

    </div><!-- /.container-fluid -->
@endsection

@section('custom-js')


@endsection
