<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>HAU-CICT @yield('title')</title>
    <meta name="description" content="Official website of the CICT - HAU."> <!--description-->
    <meta name="keywords" content="Holy Angel University, CICT, College of Information and Communications Technology, HAU, CICT Portal, IT, Computer Science, Network Administration, Animation, Web Development, Foxes, For the foxes, comsci, netad, webdev"> <!--keywords-->
    <link rel="icon" href="assets/imgs/logo/cict-logo.png" type="image/png" sizes="16x16">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Unica+One" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
        @yield('orgs-stylesheets')
        @yield('main-stylesheets')
        <link rel="stylesheet" href="css/footer.css" type="text/css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
         <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>
         <!-- Scripts -->   
    <script src="js/skel.min.js"></script>
    <script src="js/util.js"></script>
    <script src="js/orgs.js"></script>
        <script src="js/main.js"></script>
        <script>
              new WOW().init();
        </script>
        @yield('stylesheets')
    
</head>
<body>
                @include('inc.messages')
                @yield('content')
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'article-ckeditor' );
    </script>
</body>
</html>
