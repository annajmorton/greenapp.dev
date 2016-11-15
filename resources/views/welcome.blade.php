@extends('master')

@section('pagestyle')
    <style>
        html, body {
            height: 100%;
        }

        body {
            margin: 0;
            padding: 0;
            width: 100%;
            display: table;
            font-weight: 100;
            font-family: 'Lato';
        }

        .container {
            text-align: center;
            display: table-cell;
            vertical-align: middle;
        }

        .content {
            text-align: center;
            display: inline-block;
        }

        .title {
            font-size: 96px;
        }
    </style>
@endsection


@section('content')
    <div class="title">Green app</div>

        <form action="" method="POST" enctype="multipart/form-data">

            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            Upload idf file: <input type="file" name="idf">

            <br>

            Upload weather file: <input type="file" name="weather">

            <br>

            <button type="submit">Submit</button>

        </form>
    </div>
@endsection
