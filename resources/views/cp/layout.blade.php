<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title')</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('cp')}}/plugins/fontawesome-free/css/all.min.css">
    <!-- Fonts -->
    <link rel="stylesheet" type="text/css" href="https://www.fontstatic.com/f=cairo,bein-normal,DroidKufi-Regular"/>
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('cp')}}/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{asset('cp')}}/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <!-- Bootstrap 4 RTL -->
    <link rel="stylesheet" href="https://cdn.rtlcss.com/bootstrap/v4.2.1/css/bootstrap.min.css">
    <!-- Pages CSS -->
    @yield('adminCSS')
    <!-- Custom style for RTL -->
    <link rel="stylesheet" href="{{asset('cp')}}/css/custom.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    <!-- Navbar -->
    <x-admin-sidebar></x-admin-sidebar>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
@include('cp.layouts.sidebar')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">@yield('section-name')</h1>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">

            @yield('content')

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
        <strong>Copyright &copy; 2020-2021 <a href="https://ruya.academy">أكاديمية رؤية</a>.</strong>
        جميع الحقوق محفوظة
        <div class="float-right d-none d-sm-inline-block">
            2021
        </div>
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<!-- jQuery -->
<script src="{{asset('cp/plugins/jquery/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('cp')}}/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 rtl -->
<script src="https://cdn.rtlcss.com/bootstrap/v4.2.1/js/bootstrap.min.js"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('cp')}}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="{{asset('cp')}}/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- App -->
<script src="{{asset('cp')}}/js/adminlte.js"></script>

<!-- custom JS -->

@yield('custom-js')

<script src="{{asset('cp')}}/js/admincp.js"></script>
</body>
@flasher_render
</html>
