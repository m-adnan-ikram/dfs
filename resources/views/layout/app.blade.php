<!DOCTYPE html>
<html lang="en">


<!-- index.html  21 Nov 2019 03:44:50 GMT -->
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>DFS - Admin Dashboard</title>
    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{ asset('./assets/css/app.min.css') }}">
    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('./assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('./assets/css/components.css') }}">
    <!-- Custom style CSS -->
    <link rel="stylesheet" href="{{ asset('./assets/fav/site.webmanifest') }}">
    <!-- <link rel='shortcut icon' type='image/x-icon' href='assets/img/favicon.ico' /> -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('./assets/fav/android-chrome-192x192.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="" href="{{ asset('./assets/fav/android-chrome-512x512.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('./assets/fav/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="" href="{{ asset('./assets/fav/favicon.ico') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="" href="{{ asset('./assets/fav/favicon-16x16.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="" href="{{ asset('./assets/fav/favicon-32x32.png') }}">
    <link rel="manifest" href="{{ asset('./assets/fav/site.webmanifest') }}">
  
</head>

<body>
    {{-- <div class="loader"></div> --}}
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <div class="navbar-bg"></div>
            <!-- MAIN -->
            @yield('content')
            <!-- END MAIN -->
           

            <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>

            <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
            <script>
                $(document).ready(function () {
                    $('.dropdown').click(function () {
                        $(this).toggleClass('active'); 
                    });
                });
            </script>
    @stack('scripts')
</body>
</html>
