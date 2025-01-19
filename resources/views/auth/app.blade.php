<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title')</title>
    <!-- base:css -->
    <link rel="stylesheet" href="{{ asset('assets') }}/vendors/typicons.font/font/typicons.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('assets') }}/css/vertical-layout-light/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="{{ asset('assets') }}/images/favicon.png" />
    @vite('resources/js/app.js')
</head>

<body>

    @yield('content')
    <!-- container-scroller -->
    <!-- base:js -->
    <script src="{{ asset('assets') }}/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- inject:js -->
    <script src="{{ asset('assets') }}/js/off-canvas.js"></script>
    <script src="{{ asset('assets') }}/js/hoverable-collapse.js"></script>
    <script src="{{ asset('assets') }}/js/template.js"></script>
    <script src="{{ asset('assets') }}/js/settings.js"></script>
    <script src="{{ asset('assets') }}/js/todolist.js"></script>
    <!-- endinject -->
</body>

</html>
