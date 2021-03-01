@extends('main.main-layout')

@section('title')
    الملف الشخصي - {{$user->fullName()}}
@endsection


@section('content')

    <!-- team-details-area-start -->
    <section class="team-details-area grey-bg pt-200 pb-150">
        <div class="container">

            <div class="row">
                <div class="col-xl-6 col-lg-6 offset-lg-3 offset-xl-3">
                    <div class="section-title text-center mb-20">
                        <span><i class="fal fa-ellipsis-h"></i> لوحة تحكم المستخدم <i
                                class="fal fa-ellipsis-h"></i></span>
                        <h2>{{$user->fullName()}}</h2>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-12">

                    <div class="author-about-content mb-40 d-flex flex-column justify-content-between"
                         style="height: 95%">
                        <div class="section-title text-center">
                         <span><i class="fal fa-ellipsis-h"></i> تغيير كلمة المرور <i
                                 class="fal fa-ellipsis-h"></i></span>
                        </div>

                        @if(session('status') == 'password-updated')
                            <div class="alert alert_info" style="animation-delay: .2s">
                                <div class="alert--icon">
                                    <i class="fas fa-bell"></i>
                                </div>
                                <div class="alert--content">
                                    تم تغيير كلمة  المرور الخاصة بكم بنجاح
                                </div>
                                <div class="alert--close">
                                    <i class="far fa-times-circle"></i>
                                </div>
                            </div>
                            @endif
                        <form action="{{route('user-password.update')}}" method="post"
                              class="subscribe contact-post-form contact-form"
                        >
                            @csrf
                            @method('put')

                            <div class="row">
                                <div class="col-xl-3 login-form">
                                    <div class="input-text password">
                                        <input class="form-control"
                                               type="password"
                                               placeholder="كلمة المرور الحالية"
                                               name="current_password"
                                               required>
                                    </div>
                                    @error('current_password', 'updatePassword')
                                    <span class="invalid-feedback d-block" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-xl-3 login-form">
                                    <div class="input-text password">
                                        <input class="form-control"
                                               type="password"
                                               placeholder="كلمة المرور الجديدة"
                                               autocomplete="off"
                                               name="password">
                                    </div>
                                    @error('password', 'updatePassword')
                                    <span class="invalid-feedback d-block" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-xl-3 login-form">
                                    <div class="input-text password">
                                        <input class="form-control"
                                               type="password"
                                               placeholder="تأكيد كلمة المرور"
                                               autocomplete="off"
                                               name="password_confirmation">
                                    </div>
                                    @error('password_confirmation', 'updatePassword')
                                    <span class="invalid-feedback d-block" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-xl-3">
                                    <div class="lg-btn lg-btn-03 text-center">
                                        <button class="c-btn" type="submit"
                                                style="width: 100%;padding: 27px 47px;">
                                            حفظ
                                            <i class="far fa-long-arrow-alt-left"></i></button>
                                    </div>
                                </div>
                            </div>


                        </form>

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12">

                    @if(Auth::user()->role_id === 1 or Auth::user()->role_id === 2)
                        <div class="author-about-content white-bg mb-30 d-flex flex-column justify-content-between"
                             style="height: 95%;    padding-bottom: 100px;">
                            <h5 class="text-center mb-40 py-5" style="background: #e5e5e5">مشاهدة الطلبات الخاصة بكم</h5>
                            <div class="row">
                                <div class="col-3">
                                    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist"
                                         aria-orientation="vertical">
                                        <a class="nav-link active" id="v-waiting-requests-tab" data-toggle="pill"
                                           href="#v-waiting-requests" role="tab" aria-controls="v-waiting-requests"
                                           aria-selected="true">طلبات قيد الإنتظار</a>
                                        <a class="nav-link" id="v-accepted-requests-tab" data-toggle="pill"
                                           href="#v-accepted-requests" role="tab" aria-controls="v-accepted-requests"
                                           aria-selected="false">طلبات مقبولة</a>
                                        <a class="nav-link" id="v-onProgress-requests-tab" data-toggle="pill"
                                           href="#v-onProgress-requests" role="tab"
                                           aria-controls="v-onProgress-requests" aria-selected="false"> طلبات مازالت
                                            جارية </a>
                                        <a class="nav-link" id="v-completed-requests-tab" data-toggle="pill"
                                           href="#v-completed-requests" role="tab" aria-controls="v-completed-requests"
                                           aria-selected="false">طلبات مكتملة</a>
                                    </div>
                                </div>
                                <div class="col-9">

                                    <div class="tab-content" id="v-pills-tabContent">
                                    @if(Auth::user()->role_id === 2)
                                        <!-- On waiting Requests -->
                                            <div class="tab-pane fade show active" id="v-waiting-requests"
                                                 role="tabpanel" aria-labelledby="v-waiting-requests-tab">
                                                <table class="table table-hover res-table  " style="font-size: 0.8rem">
                                                    <thead>
                                                    <tr>
                                                        <th scope="col">#</th>
                                                        <th scope="col">اسم المادة</th>
                                                        <th scope="col">اسم المعلم</th>
                                                        <th scope="col">تاريخ الطلب</th>
                                                        <th scope="col">عدد الساعات</th>
                                                        <th scope="col">وسيلة التواصل</th>
                                                        <th scope="col">حالة الطلب</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($waitingOrders as $index => $order)
                                                        <tr>
                                                            <th scope="row">{{$index + 1}}</th>
                                                            <td>{{$order->subject_name}}</td>
                                                            <td>{{$order->teacher->user->fullname()}}</td>
                                                            <td>{{$order->created_at->format('Y-m-d')}}</td>
                                                            <td>{{$order->hours}}</td>
                                                            <td>{{$order->contact_way}}</td>
                                                            <td>{{$order->admin_status}}</td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                                {{$waitingOrders->links()}}
                                            </div>
                                            <!-- / End -->

                                            <!-- accepted requests -->
                                            <div class="tab-pane fade show" id="v-accepted-requests" role="tabpanel"
                                                 aria-labelledby="v-accepted-requests-tab">
                                                <table class="table table-hover res-table  " style="font-size: 0.8rem">
                                                    <thead>
                                                    <tr>
                                                        <th scope="col">#</th>
                                                        <th scope="col">اسم المادة</th>
                                                        <th scope="col">اسم المعلم</th>
                                                        <th scope="col">تاريخ الطلب</th>
                                                        <th scope="col">عدد الساعات</th>
                                                        <th scope="col">وسيلة التواصل</th>
                                                        <th scope="col">حالة الطلب</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($acceptOrders as $index => $order)
                                                        <tr>
                                                            <th scope="row">{{$index + 1}}</th>
                                                            <td>{{$order->subject_name}}</td>
                                                            <td>{{$order->teacher->user->fullname()}}</td>
                                                            <td>{{$order->created_at->format('Y-m-d')}}</td>
                                                            <td>{{$order->hours}}</td>
                                                            <td>{{$order->contact_way}}</td>
                                                            <td>{{$order->admin_status}}</td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                                {{$acceptOrders->links()}}
                                            </div>
                                            <!-- / End -->

                                            <!-- On progress Requests -->
                                            <div class="tab-pane fade show" id="v-onProgress-requests" role="tabpanel"
                                                 aria-labelledby="v-onProgress-requests-tab">
                                                <table class="table table-hover res-table  " style="font-size: 0.8rem">
                                                    <thead>
                                                    <tr>
                                                        <th scope="col">#</th>
                                                        <th scope="col">اسم المادة</th>
                                                        <th scope="col">اسم المعلم</th>
                                                        <th scope="col">تاريخ الطلب</th>
                                                        <th scope="col">عدد الساعات</th>
                                                        <th scope="col">وسيلة التواصل</th>
                                                        <th scope="col">حالة الطلب</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($onProgressOrders as $index => $order)
                                                        <tr>
                                                            <th scope="row">{{$index + 1}}</th>
                                                            <td>{{$order->subject_name}}</td>
                                                            <td>{{$order->teacher->user->fullname()}}</td>
                                                            <td>{{$order->created_at->format('Y-m-d')}}</td>
                                                            <td>{{$order->hours}}</td>
                                                            <td>{{$order->contact_way}}</td>
                                                            <td>{{$order->admin_status}}</td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                                {{$onProgressOrders->links()}}
                                            </div>
                                            <!-- / End -->

                                            <!-- On completed Requests -->
                                            <div class="tab-pane fade show" id="v-completed-requests" role="tabpanel"
                                                 aria-labelledby="v-completed-requests-tab">
                                                <table class="table table-hover res-table  " style="font-size: 0.8rem">
                                                    <thead>
                                                    <tr>
                                                        <th scope="col">#</th>
                                                        <th scope="col">اسم المادة</th>
                                                        <th scope="col">اسم المعلم</th>
                                                        <th scope="col">تاريخ الطلب</th>
                                                        <th scope="col">عدد الساعات</th>
                                                        <th scope="col">وسيلة التواصل</th>
                                                        <th scope="col">حالة الطلب</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($completedOrders as $index => $order)
                                                        <tr>
                                                            <th scope="row">{{$index + 1}}</th>
                                                            <td>{{$order->subject_name}}</td>
                                                            <td>{{$order->teacher->user->fullname()}}</td>
                                                            <td>{{$order->created_at->format('Y-m-d')}}</td>
                                                            <td>{{$order->hours}}</td>
                                                            <td>{{$order->contact_way}}</td>
                                                            <td>{{$order->admin_status}}</td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                                {{$completedOrders->links()}}
                                            </div>
                                            <!-- / End -->

                                    @endif

                                    @if(Auth::user()->role_id === 1)
                                        <!-- On waiting Requests -->
                                            <div class="tab-pane fade show active" id="v-waiting-requests"
                                                 role="tabpanel" aria-labelledby="v-waiting-requests-tab">
                                                <table class="table table-hover res-table  " style="font-size: 0.8rem">
                                                    <thead>
                                                    <tr>
                                                        <th scope="col">#</th>
                                                        <th scope="col">اسم المادة</th>
                                                        <th scope="col">تاريخ الطلب</th>
                                                        <th scope="col">عدد الساعات</th>
                                                        <th scope="col">حالة الطلب</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($waitingOrders as $index => $order)
                                                        <tr>
                                                            <th scope="row">{{$index + 1}}</th>
                                                            <td>{{$order->subject_name}}</td>
                                                            <td>{{$order->created_at->format('Y-m-d')}}</td>
                                                            <td>{{$order->hours}}</td>
                                                            <td>{{$order->admin_status}}</td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                                {{$waitingOrders->links()}}
                                            </div>
                                            <!-- / End -->

                                            <!-- accepted requests -->
                                            <div class="tab-pane fade show" id="v-accepted-requests" role="tabpanel"
                                                 aria-labelledby="v-accepted-requests-tab">
                                                <table class="table table-hover res-table  " style="font-size: 0.8rem">
                                                    <thead>
                                                    <tr>
                                                        <th scope="col">#</th>
                                                        <th scope="col">اسم المادة</th>
                                                        <th scope="col">تاريخ الطلب</th>
                                                        <th scope="col">عدد الساعات</th>
                                                        <th scope="col">حالة الطلب</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($acceptOrders as $index => $order)
                                                        <tr>
                                                            <th scope="row">{{$index + 1}}</th>
                                                            <td>{{$order->subject_name}}</td>
                                                            <td>{{$order->created_at->format('Y-m-d')}}</td>
                                                            <td>{{$order->hours}}</td>
                                                            <td>{{$order->admin_status}}</td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                                {{$acceptOrders->links()}}
                                            </div>
                                            <!-- / End -->

                                            <!-- On progress Requests -->
                                            <div class="tab-pane fade show" id="v-onProgress-requests" role="tabpanel"
                                                 aria-labelledby="v-onProgress-requests-tab">
                                                <table class="table table-hover res-table  " style="font-size: 0.8rem">
                                                    <thead>
                                                    <tr>
                                                        <th scope="col">#</th>
                                                        <th scope="col">اسم المادة</th>
                                                        <th scope="col">تاريخ الطلب</th>
                                                        <th scope="col">عدد الساعات</th>
                                                        <th scope="col">حالة الطلب</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($onProgressOrders as $index => $order)
                                                        <tr>
                                                            <th scope="row">{{$index + 1}}</th>
                                                            <td>{{$order->subject_name}}</td>
                                                            <td>{{$order->created_at->format('Y-m-d')}}</td>
                                                            <td>{{$order->hours}}</td>
                                                            <td>{{$order->admin_status}}</td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                                {{$onProgressOrders->links()}}
                                            </div>
                                            <!-- / End -->

                                            <!-- On completed Requests -->
                                            <div class="tab-pane fade show" id="v-completed-requests" role="tabpanel"
                                                 aria-labelledby="v-completed-requests-tab">
                                                <table class="table table-hover res-table" style="font-size: 0.8rem">
                                                    <thead>
                                                    <tr>
                                                        <th scope="col">#</th>
                                                        <th scope="col">اسم المادة</th>
                                                        <th scope="col">تاريخ الطلب</th>
                                                        <th scope="col">عدد الساعات</th>
                                                        <th scope="col">حالة الطلب</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($completedOrders as $index => $order)
                                                        <tr>
                                                            <th scope="row">{{$index + 1}}</th>
                                                            <td>{{$order->subject_name}}</td>
                                                            <td>{{$order->created_at->format('Y-m-d')}}</td>
                                                            <td>{{$order->hours}}</td>
                                                            <td>{{$order->admin_status}}</td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                                {{$completedOrders->links()}}
                                            </div>
                                            <!-- / End -->

                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>

                    @elseif(Auth::user()->role_id === 3 or Auth::user()->role_id === 4)
                        <div class="lg-btn lg-btn-03 text-center">
                            <a href="{{url('/admincp')}}" class="c-btn">لوحة تحكم الإدارة<i
                                    class="far fa-long-arrow-alt-left"></i></a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>




@endsection


@section('script')

    <script>
        if ($("#errorMsg")) {
            $("#errorMsg").delay(5000).slideUp(1000);
        }
    </script>

@endsection
