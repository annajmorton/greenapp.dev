@extends('default/layout')

@section('styles')
    @parent

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

    <div class="title">Talking Walls</div>

    <div class="alert alert-info" id="msginfo" hidden>
    </div>

    <div id="uploads">
        <form id="formid" action="" method="POST" enctype="multipart/form-data">

            <input type="hidden" name="_token" value="{{ csrf_token() }}" required>

            Upload idf file: <input type="file" name="idf">
            <em>file must be version 8.5 or later</em>

            <br>

            Upload weather file: <input type="file" name="weather" required>

            <br>

            Upload utility data file: <input type="file" name="data" required>

            <br>

            <button type="submit">Submit</button>

        </form>
    </div>

@endsection

@section('scripts')
    @parent

    <script type="text/javascript">

        $('#formid').on('submit', function(event) {
            $('.alert').hide();
            $('#uploads').hide();
            $('#msginfo').html("Please wait while we process your request. This may take several minutes...");
            $('#msginfo').show();
        })

    </script>
@endsection