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
    
    <div class="alert alert-info" id="msginfo" hidden>
    </div>
    <div class="title">Greenapp</div>
    <div id="uploads">
        <form id="formid" action="" method="POST" enctype="multipart/form-data">

            <input type="hidden" name="_token" value="{{ csrf_token() }}" required>

            Upload idf file: <input type="file" name="idf">

            <br>

            Upload weather file: <input type="file" name="weather" required>

            <br>

            Upload utility data file: <input type="file" name="data" required>

            <br>

            <button id="subb" type="submit">Submit</button>

        </form>
    </div>
@endsection
@section('script')
    <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){

            $('#subb').click(function(event){
                event.preventDefault();
                $('.alert').hide();
                $('#uploads').hide();
                $('#msginfo').show();
                $('#msginfo').html("please wait while we process your request");
                $('#formid').submit();
            })

        })
    </script>
@endsection