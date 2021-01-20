<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{url('admincp')}}" class="brand-link">
        <img src="{{asset('cp')}}/img/AdminLTELogo.png" alt="AdminLTE Logo"
             class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light" style="font-family: 'cairo', sans-serif;">دليل الطالب</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3  px-2 mb-3 d-flex">
            <div class="image">
            </div>
            <div class="info text-white">
                <span>مرحبا :  </span><span>{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</span>
            </div>
        </div>


        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{url('admincp')}}" class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            لوحة المراقبة
                        </p>
                    </a>
                </li>


                <li class="nav-header">الأقسام الرئيسية</li>
            {{--                    <li class="nav-item">--}}
            {{--                        <a href="pages/calendar.html" class="nav-link">--}}
            {{--                            <i class="nav-icon far fa-calendar-alt"></i>--}}
            {{--                            <p>--}}
            {{--                                Calendar--}}
            {{--                                <span class="badge badge-info right">2</span>--}}
            {{--                            </p>--}}
            {{--                        </a>--}}
            {{--                    </li>--}}

            <!-- Students -->
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="fas fa-user-graduate nav-icon"></i>
                        <p>الطلاب
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{url('admincp/students')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>قائمة الطلاب</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{url('admincp/students/inactive')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>طلاب خاملين</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{url('admincp/students/suspended')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>طلاب موقوفين</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- Teachers -->
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-users"></i>
                        <p>
                            المُعلمين
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{url('admincp/teachers')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>قائمة المعلمين</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{url('admincp/teachers/pending')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>في إنتظار الموافقة</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{url('admincp/teachers/suspended')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>مُعلمين موقوفين</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- Stages -->
                <li class="nav-item">
                    <a href="{{url('admincp/stages')}}" class="nav-link">
                        <i class="nav-icon fas fa-book-reader"></i>
                        <p>
                            المراحل التعليمية
                        </p>
                    </a>
                </li>


                <!-- subjects -->
                <li class="nav-item">
                    <a href="{{url('admincp/subjects')}}" class="nav-link">
                        <i class="nav-icon fa fa-book"></i>
                        <p>
                            المواد التعليمية
                        </p>
                    </a>
                </li>

                <!-- Countries -->
                <li class="nav-item">
                    <a href="{{url('admincp/countries')}}" class="nav-link">
                        <i class="nav-icon fa fa-flag"></i>
                        <p>
                            الدول والجنسيات
                        </p>
                    </a>
                </li>

                <!-- Orders -->
                <li class="nav-item">
                    <a href="{{url('admincp/orders')}}" class="nav-link">
                        <i class="nav-icon fas fa-envelope-open-text"></i>
                        <p>
                           الطلبات
                        </p>
                    </a>
                </li>

                <li class="nav-header">الأقسام الإدارية</li>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link" >
                        <i class="nav-icon fa fa-link"></i>
                        <p>
                            صفحات الموقع
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{url('admincp/pages/privacy')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>سياسة الخصوصية</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{url('admincp/pages/faq')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>الأسئلة الشائعة</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{url('admincp/pages/social')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>الصفحات الاجتماعية</p>
                            </a>
                        </li>


                    </ul>
                </li>



            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
