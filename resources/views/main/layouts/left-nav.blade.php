
@auth
<div class="header-reg d-none d-md-inline-block">
    <a href="{{url('/user/profile')}}"><i class="fal fa-user-circle"></i>{{Auth::user()->first_name}}</a>

</div>
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
    <div class="header-reg d-none d-md-inline-block ml-1">
        <a href="{{url('user/student/cp')}}">
            <i class="far fa-users-cog"></i>لوحة التحكم</a
        >
    </div>
    @elseif(Auth::user()->role_id == 1)
    <div class="header-reg d-none d-md-inline-block ml-1">
        <a href="{{url('user/teacher/cp')}}">
            <i class="far fa-users-cog"></i>لوحة التحكم</a
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
