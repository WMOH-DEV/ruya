<nav class="main-header navbar navbar-expand navbar-white navbar-light">


    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{url('/')}}" class="nav-link">الموقع الرئيسي</a>
        </li>

        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{url('admincp/teachers/pending')}}" class="nav-link">مُعلمين قيد الانتظار</a>
        </li>

        @SuperAdmin
        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{url('admincp/orders')}}" class="nav-link">طلبات الحجز</a>
        </li>
        @endSuperAdmin
    </ul>


    <div class="signout nav-item d-none d-sm-inline-block " style="width: 7% ; margin-right:auto; margin-left:0">
        <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
           class="block text-blue-500 px-2 py-2 mt-1 md:mt-0 md:mr-1 rounded hover:text-blue-600">
            <i class="fas fa-sign-out-alt"></i>

            خروج</a>
        <!-- Logout Form -->
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
            @csrf
        </form>
    </div>
</nav>
