<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>
     {{ config('app.name', 'Task') }}
    </title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Fonts -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Styles -->
    <link href="{{ asset("/admin/css/bootstrap.min.css") }}" rel="stylesheet" type="text/css" />

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset("/admin/css/paper-dashboard.css") }}" rel="stylesheet" />
    @yield('css')

</head>
<body>
<div class="wrapper ">
    <!-- Sidebar -->
    @include('layouts.sidebar')
        <!-- Main Header -->
    @include('layouts.header')
    @yield('content')
    <!-- /.content-wrapper -->
    <!-- Footer -->
    @include('layouts.footer')
    </div>

        <!-- Scripts -->
        <script src="{{ asset("admin/js/core/jquery.min.js") }}"></script>
        <script src="{{ asset("admin/js/core/popper.min.js") }}"></script>
        <script src="{{ asset("admin/js/core/bootstrap.min.js") }}"></script>
        <script src="{{ asset("admin/js/plugins/perfect-scrollbar.jquery.min.js") }}"></script>
        <!--  Google Maps Plugin    -->
        <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
        <!-- Chart JS -->
        <script src="{{ asset("admin/js/plugins/chartjs.min.js") }}"></script>
        <!--  Notifications Plugin    -->
        <script src="{{ asset("admin/js/plugins/bootstrap-notify.js") }}"></script>
        <script src="{{ asset("admin/js/paper-dashboard.min.js?v=2.0.0") }}" type="text/javascript"></script>
        <script src="{{ asset("admin/demo/demo.js") }}"></script>
        <script>
            $(document).ready(function() {
                demo.initChartsPages();
            });
        </script>
        <script src="{{ asset('js/app.js') }}" defer></script>

</body>
</html>
