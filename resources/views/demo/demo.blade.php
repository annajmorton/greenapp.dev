@extends('default/layout')

@section('styles')
    @parent

@endsection


@section('content')
    <div class="parallax">
        <div class="title">Talking Walls</div>

        <div class="alert alert-info" id="msginfo" hidden>
        </div>
        <div id='default'>
            <form class="formid" action="/eplus" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <label><h1>don't have the files below? click the red default button to run the default files...</h1></label>
                <br>
                <button style="background-color:red;color:white;"type="submit">default</button> 
            </form>
        </div>

        <br>
        <br>
        <br>

        <div id="uploads">
            <form class="formid" action="/eplus" method="POST" enctype="multipart/form-data">

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
    </div>

@endsection

@section('scripts')
    @parent

    <script type="text/javascript">

        $('.formid').on('submit', function(event) {
            $('.alert').hide();
            $('#uploads').hide();
            $('#default').hide();
            $('#msginfo').html("Please wait while we process your request. This may take several minutes...");
            $('#msginfo').show();
        })

    </script>
@endsection