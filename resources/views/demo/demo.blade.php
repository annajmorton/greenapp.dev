@extends('default/demo_layout')

@section('styles')
    @parent

@endsection


@section('content')
    <div class="parallax">
        <div class="alert alert-info" id="msginfo" hidden>
        </div>
        <div id='default'>
            <form class="formid title section" action="/eplus" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <label><h2>don't have the files below? click the red default button to run the default files...</h2></label>
                <br>
                <input type="submit"style="background-color:red;color:white;" value="run default">
            </form>
        </div>

        <br>
        <br>
        <br>

        <div id="uploads">
            <form class="formid title section" action="/eplus" method="POST" enctype="multipart/form-data">

                <input type="hidden" name="_token" value="{{ csrf_token() }}" required>

                <h2>Upload idf file (<em>file must be version 8.5 or later</em>):</h2> <input type="file" name="idf">
                

                <br>

                <h2>Upload weather file:</h2> <input type="file" name="weather" required>

                <br>

                <h2>Upload utility data file:</h2> <input type="file" name="data" required>

                <br>
                <input type="submit"style="background-color:red;color:white;" value="run my uploads"> 
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