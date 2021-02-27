<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{url('admincp')}}" class="brand-link">
        <img src="{{asset('cp')}}/img/AdminLTELogo.png" alt="RUYA"
             class="brand-image"
             style="opacity: .8">
        <span class="brand-text font-weight-light" style="font-family: 'cairo', sans-serif;">{{env('app_name')}}</span>
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
                                <i class="fas fa-arrow-circle-left nav-icon"></i>
                                <p>قائمة الطلاب</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{url('admincp/students/inactive')}}" class="nav-link">
                                <i class="fas fa-arrow-circle-left nav-icon"></i>
                                <p>طلاب خاملين</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{url('admincp/students/suspended')}}" class="nav-link">
                                <i class="fas fa-arrow-circle-left nav-icon"></i>
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
                                <i class="fas fa-arrow-circle-left nav-icon"></i>
                                <p>قائمة المعلمين</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{url('admincp/teachers/pending')}}" class="nav-link">
                                <i class="fas fa-arrow-circle-left nav-icon"></i>
                                <p>في إنتظار الموافقة</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{url('admincp/teachers/suspended')}}" class="nav-link">
                                <i class="fas fa-arrow-circle-left nav-icon"></i>
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

                <!-- courses -->
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-graduation-cap"></i>
                        <p>
                           الكورسات التعليمية
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>

                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{url('admincp/categories')}}" class="nav-link">
                                <i class="fas fa-arrow-circle-left nav-icon"></i>
                                <p>تصنيفات الكورسات</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{url('admincp/courses')}}" class="nav-link">
                                <i class="fas fa-arrow-circle-left nav-icon"></i>
                                <p>قائمة الكورسات</p>
                            </a>
                        </li>
                    </ul>
                </li>


                <!-- Countries -->

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-flag"></i>
                        <p>
                           الإقامة والجنسية
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>

                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{url('admincp/countries')}}" class="nav-link">
                                <i class="fas fa-arrow-circle-left nav-icon"></i>
                                <p>
                                    دول الجنسيات
                                </p>
                            </a>
                        </li>

                        <!-- Residences -->
                        <li class="nav-item">
                            <a href="{{url('admincp/residences')}}" class="nav-link">
                                <i class="fas fa-arrow-circle-left nav-icon"></i>
                                <p>
                                    دول الإقامة
                                </p>
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- Orders -->
                <li class="nav-item">
                    <a href="{{url('admincp/orders')}}" class="nav-link">
                        <i class="nav-icon fas fa-envelope-open-text"></i>
                        <p>
                            الطلبات
                            <i class="fas fa-angle-left right"></i>
                            @if($newOrders >= 1)
                            <span class="badge badge-info right">{{$newOrders}}</span>
                            @endif
                        </p>
                    </a>
                </li>

                <li class="nav-header">الأقسام الإدارية</li>
                <!-- Messages -->
                <li class="nav-item">
                    <a href="{{url('admincp/messages')}}" class="nav-link">
                        <i class="fas fa-envelope nav-icon"></i>
                        <p>الرسائل
                            <i class="fas fa-angle-left right"></i>
                            @if($newMsgs >= 1)
                                <span class="badge badge-info right">{{$newMsgs}}</span>
                            @endif
                        </p>
                    </a>
                </li>

                <!-- Mods -->
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="fas fa-user nav-icon"></i>
                        <p>المشرفين
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <!-- Mods List-->
                        <li class="nav-item">
                            <a href="{{url('admincp/moderators')}}" class="nav-link">
                                <i class="fas fa-arrow-circle-left nav-icon"></i>
                                <p>قائمة المشرفين</p>
                            </a>
                        </li>
                        <!-- banned Mods-->
                        <li class="nav-item">
                            <a href="{{url('admincp/moderators/suspended')}}" class="nav-link">
                                <i class="fas fa-arrow-circle-left nav-icon"></i>
                                <p>مشرفين موقوفين</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- Pages -->
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link" >
                        <i class="nav-icon fa fa-link"></i>
                        <p>
                            صفحات الموقع
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">

                        <!-- About us -->
                        <li class="nav-item">
                            <a href="{{url('admincp/pages/home')}}" class="nav-link">
                                <i class="fas fa-arrow-circle-left nav-icon"></i>
                                <p>صفحة البداية</p>
                            </a>
                        </li>

                        <!-- About us -->
                        <li class="nav-item">
                            <a href="{{url('admincp/pages/about')}}" class="nav-link">
                                <i class="fas fa-arrow-circle-left nav-icon"></i>
                                <p>من نحن</p>
                            </a>
                        </li>

                        <!-- Privacy -->
                        <li class="nav-item">
                            <a href="{{url('admincp/pages/privacy')}}" class="nav-link">
                                <i class="fas fa-arrow-circle-left nav-icon"></i>
                                <p>سياسة الخصوصية</p>
                            </a>
                        </li>

                        <!-- Terms -->
                        <li class="nav-item">
                            <a href="{{url('admincp/pages/terms')}}" class="nav-link">
                                <i class="fas fa-arrow-circle-left nav-icon"></i>
                                <p>الشروط والأحكام</p>
                            </a>
                        </li>

                        <!-- Faq -->
                        <li class="nav-item">
                            <a href="{{url('admincp/pages/faq')}}" class="nav-link">
                                <i class="fas fa-arrow-circle-left nav-icon"></i>
                                <p>الأسئلة الشائعة</p>
                            </a>
                        </li>

                        <!-- Testimonial -->
                        <li class="nav-item">
                            <a href="{{url('admincp/pages/testimonials')}}" class="nav-link">
                                <i class="fas fa-arrow-circle-left nav-icon"></i>
                                <p>آراء الزوار</p>
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
