<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{ $title ?? 'Dashboard' }}</title>
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link rel="stylesheet" href="{{ asset('assets/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
    @vite('resources/js/app.js')
    @stack('styles')
</head>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
        <x-Navbar />
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">

            <!-- partial:partials/_sidebar.html -->
            <x-Sidebar />
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    @yield('content')
                </div>
                <!-- content-wrapper ends -->
                <!-- partial:partials/_footer.html -->
                <x-Footer />
                <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
        <x-Toast />
    </div>
    <!-- container-scroller -->
    <!-- base:js -->
    <script src="{{ asset('assets') }}/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page-->
    <!-- End plugin js for this page-->
    <!-- inject:js -->
    <script src="{{ asset('assets') }}/js/off-canvas.js"></script>
    <script src="{{ asset('assets') }}/js/hoverable-collapse.js"></script>
    <script src="{{ asset('assets') }}/js/template.js"></script>
    <script src="{{ asset('assets') }}/js/settings.js"></script>
    <script src="{{ asset('assets') }}/js/todolist.js"></script>
    <!-- endinject -->
    <!-- plugin js for this page -->
    <script src="{{ asset('assets') }}/vendors/progressbar.js/progressbar.min.js"></script>
    <script src="{{ asset('assets') }}/vendors/chart.js/Chart.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- Custom js for this page-->
    <script src="{{ asset('assets') }}/js/dashboard.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="{{ asset('assets/sweetalert2/sweetalert2.all.min.js') }}"></script>

    <!-- End custom js for this page-->
    @stack('scripts')
</body>

</html>
