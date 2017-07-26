<!DOCTYPE html>
<html>

    <meta name="viewport" content="width=[widest centered div];"/>
    <head>
        <title>Talking Walls</title>
        <link rel="icon" href="images/favicon.png">

        <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">

        <script src="{{ URL::asset('assets/jquery/js/jquery.min.js') }}"></script>
        <script type="text/javascript" src="/assets/bootstrap/js/bootstrap.min.js"></script>
        @include('nav/alt_navstyle')
        @yield('styles')
    </head>

    <body>
        <div class="container">
            @include('nav/alt_nav')
            <div class="content">
                @yield('content')
            </div>
        </div>
    </body>

    @yield('scripts')

</html>
