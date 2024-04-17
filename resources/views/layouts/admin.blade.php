<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta -->
    @include('includes.admin.meta')

    <!-- Title -->
    <title>Dashboard | {{ config('app.name') }}</title>

    <!-- Styles -->
    @include('includes.admin.styles')
    @stack('styles')
</head>

<body class="bg-light">
    <div id="db-wrapper">
        <!-- Sidebar -->
        @include('includes.admin.sidebar')

        <!-- Page content -->
        <div id="page-content">
            <div class="header @@classList">

                <!-- Navbar -->
                @include('includes.admin.navbar')
            </div>

            <!-- Content -->
            <div class="container-fluid pt-5 px-5">
                {{ $slot }}
            </div>
        </div>
    </div>

    <!-- Scripts -->
    @include('includes.admin.scripts')
    @stack('scripts')
</body>

</html>
