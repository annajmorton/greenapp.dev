<!DOCTYPE html>
<html>
    <head>
        <title>Greenapp</title>
        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">

        @yield('pagestyle')
    </head>
    <body>
        <div class="container">

            <div class="content">
            @include('errors.eplus')
            @include('errors.file')
            @yield('content')

        </div>
    </body>
</html>
