<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="utf-8">
    <!-- IE Meta-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Mobile Meta-->
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- tailWindcss -->
    <link rel="stylesheet" href="/css/app.css" />
    <!-- font-ello icons library -->
    <link rel="stylesheet" href="{{asset('main')}}/css/fontello-embedded.css">
    <!-- Main Css File -->
    @yield('css')
    <link rel="stylesheet" href="{{asset('main')}}/css/main.css">
    <link rel="stylesheet" type="text/css" href="https://www.fontstatic.com/f=DroidKufi-Regular" />


    <!------- Title-------->

    <title>@yield('title')</title>

    <!-- additional meta -->
    <!-- Primary Meta Tags -->
    <meta name="عنوان الموقع" content="وصف قصير">
    <meta name="description" content="هنا وصف الموقع">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://رابط الموقع">
    <meta property="og:title" content="by WMOH">
    <meta property="og:description" content="وصف الموقع هنا">
    <meta property="og:image" content="الصورة التي ستظهر في الفيسبوك عند المشاركة">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="رابط الموقع">
    <meta property="twitter:title" content="by WMOH">
    <meta property="twitter:description" content="هنا وصف الموقع">
    <meta property="twitter:image" content="هنا رابط الصورة التي ستظهر في تويتر">


    <!-- to open Html5 Elements in Internet Expolrer -->
<!--[if lt IE 9]>
    <script src="{{asset('main')}}/js/html5shiv.min.js"></script>
    <script src="{{asset('main')}}/js/respond.min.js"></script>
    <![endif]-->

</head>


<body class="bg-gray-50">


    <nav class="navbar-top  shadow-sm lg:shadow-none bg-white lg:bg-transparent fixed w-full md:flex md:justify-between md:items-center px-2 lg:px-10 md:py-2">
        <div class=" flex item-center justify-between px-4 py-2 md:p-0">

            <div>
                <a href="/" class="logo">
                    <img class="h-8 md:h-12 lg:h-16" src="{{asset('main')}}/imgs/logo1.png" alt="daleely">
                </a>
            </div>

            <div class="md:hidden">
                <button class="text-blue-500 focus:text-blue-600 focus:outline-none" id="nav-btn">
                    <i class="icon-menu" id="btn-menu"></i>
                </button>
            </div>

        </div>

        <div class="px-4 py-2 text-sm md:text-sm lg:text-base hidden md:flex md:p-0 nav-links">
            <a href="{{route('teachers.list')}}" class="block text-blue-500 px-2 py-2 rounded hover:text-blue-600">قائمة المُعلمين</a>
            <a href="{{route('search')}}" class="block text-blue-500 px-2 py-2 mt-1 md:mt-0 md:mr-1 rounded hover:text-blue-600 ">العثور على
                مُعلم</a>
            <a href="{{url('pages/faq')}}" class="block text-blue-500 px-2 py-2 mt-1 md:mt-0 md:mr-1 rounded hover:text-blue-600  ">أسئلة الشائعة
            <a href="{{url('pages/privacy')}}" class="block
             text-blue-500 px-2 py-2 mt-1 md:mt-0 md:mr-1 rounded hover:text-blue-600  ">الخصوصية</a>
        </div>
        <div class="px-4 py-2 text-sm md:text-sm lg:text-base  hidden md:flex md:p-0 nav-links">
            @guest()
            <a href="{{route('login')}}" class="block text-blue-500 md:text-white md:bg-blue-500 md:rounded-full md:px-4  px-2 py-2 mt-1 md:mt-0 md:mr-1 rounded hover:bg-blue-600">
                <i class="icon-login"></i>
                تسجيل الدخول</a>
            <a href="{{route('register')}}" class="block text-blue-500 px-2 py-2 mt-1 md:mt-0 md:mr-1 rounded hover:text-blue-600">
                <i class="icon-user-plus"></i>
                عضوية جديدة</a>
            @endguest
            @auth
            <span class="mx-1 px-0 lg:px-3 py-2 flex items-center justify-start lg:justify-between">
                <i class="icon-user inline-block rounded py-0.5 px-1 text-sm bg-blue-500 text-white"></i>
                <span class="inline-block mr-1.5 text-blue-500"> {{ Auth::user()->first_name }}</span>
            </span>
            @if(Auth::user()->role_id == 3 OR Auth::user()->role_id == 4)
            <a href="{{url('admincp')}}" class="block text-blue-500 px-2 py-2 mt-1 md:mt-0 md:mr-1 rounded hover:text-blue-600">
                <i class="icon-cog-alt"></i>
                لوحة الإدارة</a>
            @endif
            <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="block text-blue-500 px-2 py-2 mt-1 md:mt-0 md:mr-1 rounded hover:text-blue-600">
                <i class="icon-logout"></i>

                تسجيل خروج</a>
            <!-- Logout Form -->
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                @csrf
            </form>
            @endauth
        </div>
    </nav>


    @yield('content')


    <script src="{{asset('main/js/jquery-3.5.1.js')}}"></script>
    <script>
        $(function() {
            $('#nav-btn').click(function() {
                $('.nav-links').addClass('bg-white shadow-sm').slideToggle();
                $('#btn-menu').toggleClass('icon-menu').toggleClass('icon-cancel');
            })


        });
    </script>

    @yield('script')


</body>
@flasher_render

</html>
