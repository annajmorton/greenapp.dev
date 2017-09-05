<!DOCTYPE html>
<html>

    <meta name="viewport" content="width=[widest centered div];"/>
    <head>
        <title>Talking Walls</title>
        <link rel="icon" href="images/favicon.png">
        
        <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">

        <script src="{{ URL::asset('assets/jquery/js/jquery.min.js') }}"></script>
        <script type="text/javascript" src="/assets/bootstrap/js/bootstrap.min.js"></script>

        <link rel="stylesheet" type="text/css" href="/assets/custom/default.css">

        <meta name="viewport" content="width=device-width" />
        
        {{-- fonts for the style sheet default.css --}}
        <script src="https://use.fontawesome.com/892c4b30ee.js"></script>
        <link href="https://fonts.googleapis.com/css?family=Economica" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Raleway:800" rel="stylesheet">


        @include('nav/analytics')
        @include('nav/navstyle')
        @yield('styles')
    </head>

    <body>
        <div class="container">
            @include('nav/nav')
            @include('errors.eplus')
            @include('errors.file')
            @yield('content')
        </div>
    </body>

    @yield('scripts')

</html>
