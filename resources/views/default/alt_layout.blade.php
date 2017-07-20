<!DOCTYPE html>
<html>

    <meta name="viewport" content="width=[widest centered div];"/>
    <head>
        <title>Talking Walls</title>
        <link rel="icon" href="images/favicon.png">
        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">

        <script src="{{ URL::asset('assets/jquery/js/jquery.min.js') }}"></script>

        @yield('styles')
    </head>

    <body>
        <div class="container">

            <div class="content">
            @yield('content')

        </div>
    </body>

    @yield('scripts')

</html>
