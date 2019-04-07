<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta Section  -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @yield('meta')

    <!-- Title Section  -->
    <title>Litepost | @yield('title')</title>

    <!-- Link Section  -->
    <link rel="stylesheet" href="/admin/css/app.css">
    <script src="/admin/js/app.js"></script>
</head>
<body>

    <div class="wrapper">
        <div class="wrapper__inner-left">
            <!-- Side Navigation -->
            @include('litepost::includes._sidenav')
        </div>

        <div class="wrapper__inner-right">
            <!-- Navigation Bar -->
            @include('litepost::includes._navbar')

            <!-- Main Content -->
            @yield('main')
        </div> 
    </div>

    <!-- Javascript -->
    @yield('javascript')
</body>
</html>