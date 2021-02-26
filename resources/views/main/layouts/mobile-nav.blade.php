<nav class="side-mobile-menu">
    <ul id="mobile-menu-active">
        <li>
            <a href="{{url(asset('/'))}}">الرئيسية</a>

        </li>
        <li class="has-dropdown">
            <a href="#">الدورات</a>
            <ul class="sub-menu">
                <li><a href="courses.html">Course</a></li>
                <li><a href="courses -2.html">Course List</a></li>
                <li><a href="courses-details.html">Course Details</a></li>
            </ul>
        </li>
        <li>
            <a href="{{url('teachers')}}">قائمة المعلمين </a>
        </li>
        <li>
            <a href="{{url('search')}}">البحث عن مُعلم</a>
        </li>
        <li>
            <a href="{{url('pages/faq')}}">الأسئلة الشائعة </a>
        </li>

        @auth
            <li>
                <a href="{{url('/user/profile')}}"><i class="fal fa-user-circle mr-2"></i>{{Auth::user()->first_name}}</a>
            </li>

        @if(Auth::user()->role_id == 1)
            <li>
                <a href="{{url('user/teacher/cp')}}"><i class="fal fa-users-cog mr-2"></i>لوحة التحكم</a>
            </li>
            @endif

            @if(Auth::user()->role_id == 2)
                <li>
                    <a href="{{url('user/student/cp')}}"><i class="fal fa-users-cog mr-2"></i>لوحة التحكم</a>
                </li>
            @endif
            @if(Auth::user()->role_id == 3 OR Auth::user()->role_id == 4)
                <li>
                    <a href="{{url('admincp')}}"><i class="fal fa-users-cog mr-2"></i>لوحة التحكم</a>
                </li>
            @endif

            <li>
                <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form-mobile').submit();">
                    <i class="fad fa-sign-out mr-2" style="transform: rotateY(180deg)"></i>تسجيل الخروج</a>
            </li>
            <form id="logout-form-mobile" action="{{ route('logout') }}" method="POST" class="hidden">
                @csrf
            </form>

        @endauth

        @guest()

        <li><a href="{{url('login')}}">
                <i class="fas fa-sign-in mr-2"></i>
                تسجيل الدخول
            </a></li>

        <li><a href="{{url('register')}}">
                <i class="fas fa-user-plus mr-2"></i>
                عضوية جديدة</a></li>
        @endguest


    </ul>
</nav>
