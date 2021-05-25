<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Light Bootstrap Dashboard - Free Bootstrap 4 Admin Dashboard by Creative Tim</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    @stack('before-font')
    @include('admin.includes.style')
    @stack('after-font')
    <!-- CSS Files -->
    @stack('before-style')
    @include('admin.includes.style')
    @stack('after-style')

</head>

<body>
    <div class="warpper">

        {{-- sidebar --}}
        @include('admin.includes.sidebar')
        {{-- end sidebar --}}

        <div class="main-panel">
            <!-- Navbar -->
            @include('admin.includes.navbar')
            <!-- End Navbar -->

            @yield('content')

            @include('admin.includes.navbar')
        </div>
    </div>

</body>
@stack('before-script')
@include('admin.includes.script')
@stack('after-script')
<!-- Light Bootstrap Dashboard DEMO methods, don't include it in your project! -->
<script src="../assets/js/demo.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        // Javascript method's body can be found in assets/js/demos.js
        demo.initDashboardPageCharts();

        demo.showNotification();

    });
</script>

</html>
