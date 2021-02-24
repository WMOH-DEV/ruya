
@auth

@if(Auth::user()->role_id == 2)
<div class="header-reg d-none d-md-inline-block">
    <a href="{{url('/update-info')}}"><i class="fal fa-graduation-cap"></i>إنضم كمُعلم</a>

</div>
    @endif
@endauth
@guest()
<div class="header-sing d-none d-md-inline-block">
    <a href="{{url('login')}}">
        <i class="far fa-user-circle"></i>تسجيل دخول</a>
</div>

<div class="header-reg d-none d-md-inline-block ml-1">
    <a href="{{url('register')}}">
        <i class="far fa-user-plus"></i>عضوية جديدة</a
    >
</div>
@endguest

@auth
@if(Auth::user()->role_id == 3 OR Auth::user()->role_id == 4)
<div class="header-reg d-none d-md-inline-block ml-1">
    <a href="{{url('admincp')}}">
        <i class="far fa-users-cog"></i>لوحة التحكم</a>
</div>
    @elseif(Auth::user()->role_id == 2)
    <div class="d-none d-md-inline-block dropdown ml-1">

            <button class="btn profile-btn position-relative" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fad fa-user-circle"></i>
                {{Auth::user()->first_name}}
            </button>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                <a href="{{url('user/student/profile')}}" class="dropdown-item">
                    <i class="far fa-users-cog mx-1"></i>الملف الشخصي</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">
                    <i class="fal fa-cog mx-1"></i>لوحة التحكم</a>


        </div>



    </div>
    @elseif(Auth::user()->role_id == 1)
    <div class="header-reg d-none d-md-inline-block ml-1">
        <a href="{{url('user/teacher/profile')}}">
            <i class="far fa-users-cog"></i>الملف الشخصي</a
        >
    </div>
@endif

<div class="header-icon d-none d-md-inline-block mr-2">
    <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
        <i class="fad fa-sign-out" style="transform: rotateY(180deg)"></i></a>
</div>
<form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
    @csrf
</form>
@endauth

<div class="hamburger-menu menu-bar info-bar">
    <a href="#"><img src="{{asset('main')}}/assets/img/icon/bar.png" alt="" /></a>
</div>
