<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    @stack('prepend-style')
    @include('includes.frontend.style')
    
</head>

<body>
    <!-- navbar -->
    @include('includes.frontend.navbar-alternate')

    <!-- Main -->
        @yield('content')
    <!-- akhir main -->

    <!-- footer -->
    @include('includes.frontend.footer')

    @include('includes.frontend.scripts')

    @stack('addon-script')
</body>

</html>