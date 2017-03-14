@extends('default/layout')

@section('styles')
    @parent
    <meta name="viewport" content="width=device-width" />
    <script src="https://use.fontawesome.com/892c4b30ee.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Permanent+Marker" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Inconsolata" rel="stylesheet">
    {{-- <link href="https://fonts.googleapis.com/css?family=Ultra" rel="stylesheet"> --}}
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
            /*font-family: 'Arial';*/
            font-family: 'Inconsolata', monospace;
            /*font-family: 'Ultra', serif;*/
            background-color: black;
            color: white;
        }

        .container {
            padding: 1.5%;
            text-align: center;
            display: table-cell;
            vertical-align: middle;
        }

        .content {
            text-align: center;
            display: inline-block;
        }
        .textblk{
            display: flex;
            justify-content: space-around;
            align-items: center;
            background-color: black;
            width: 100%;
            padding: 5%;
            min-height: 300px;
        }
        .post.lg.title{
            color: black;
            background-color: white;
            width: 25%;
            font-family: 'Permanent Marker', cursive;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);

        }

        .page{
            display: flex;
            justify-content: space-around;
            align-items: center;
            flex-direction: column;
        }

        img#logo{
            background-color: transparent;
            width: 100%;
            box-shadow: none;
        }

        @media only screen and (min-width: 769px) {
            .parallax{
                height: 100%;
                width: 100%;
                background-image: url("images/brick_3background.jpg");
                /*background-size: 412px 247px;*/
                background-size: cover;
                /*background-size: 50%;*/
                background-attachment: fixed;
                background-repeat: no-repeat;
            }
            .section{
                display: flex;
                justify-content: space-around;
                align-items: center;
                margin-top: 5%;
                margin-bottom: 5%;
            }
            .post{
                width: auto;
                height: 100%;
            }
        }
        @media only screen and (max-width: 768px) {
            /* For mobile phones: */
            .parallax{
                background-image: url("images/brick_3background.jpg");
                background-size: 200%;
                /*background-repeat: no-repeat;*/
                /*turn off parallax*/
            }
            .section {
                display: flex;
                align-items: center;
                flex-direction: column;
                margin-top: 5%;
                margin-bottom: 5%;
            }
            .post.lg{
                width: 100%;
                height: auto;
            }
            .post.sm{
                width: 50%;
                height: auto;
            }
            .post.xs{
                width: 25%;
                height: auto;
                margin-top: 10px;
                margin-bottom: 10px;
            }
            .post.lg.title {
                width: auto;
                height: auto;
            }
        }
        .sketch{
            width: 80%;
            height: auto;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        }
        .spacer{
            height: 30px;
            width: 100%; 
        }

        input {
            background-color: black;
            /*border: 2px solid black;*/
            /*border-radius: 5%;*/
            border: none;
            min-width: 25%;
            margin: 5%;
            padding: 5%;
            display: block;
            min-height: 80px; 
            min-width: 300px;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            text-align: center;
            color: yellow;
            font-family: 'Permanent Marker', cursive;
            font-size: 1.5em;
        }

        /*input placeholder font color*/
        ::-webkit-input-placeholder { /* Chrome/Opera/Safari */
          color: #ff72de;
        }
        ::-moz-placeholder { /* Firefox 19+ */
          color: #ff72de;
        }
        :-ms-input-placeholder { /* IE 10+ */
          color: #ff72de;
        }
        :-moz-placeholder { /* Firefox 18- */
          color: #ff72de;
        }

        /* mouse over link */
        input:hover {
            font-weight: bold;
            box-shadow: 0 6px 10px 0 rgba(0, 0, 0, 0.2), 0 8px 22px 0 rgba(0, 0, 0, 0.19);
        }

        /* selected link */
        input:focus {
            box-shadow: 0 6px 10px 0 rgba(0, 0, 0, 0.2), 0 8px 22px 0 rgba(0, 0, 0, 0.19); 
            outline: none;
            border-bottom: solid black 5px;
            background-color: #42f4c5;
            color: #ff72de;
            margin: 5%;
            padding: 5%;
        }

        [type="submit"]:focus {
            border: solid black 5px;
            color: yellow;
        }

        /*hide the placeholder*/
        input:focus::-webkit-input-placeholder { color:transparent; }
        input:focus:-moz-placeholder { color:transparent; } /* FF 4-18 */
        input:focus::-moz-placeholder { color:transparent; } /* FF 19+ */
        input:focus:-ms-input-placeholder { color:transparent; } /* IE 10+ */

        .checkbox-inline{
            color: black;
            font-weight: bold;
            color: black;
            text-shadow:
            -2px -2px 0 #fff,
            2px -2px 0 #fff,
            -2px 2px 0 #fff,
            2px 2px 0 #fff; 
        }
        i{
            color: black;
        }
        .hide{
            display: none;
        }
    </style>
@endsection


@section('content')
    <div class="parallax">
        <div class="page">
                <a name="backtotop"></a>
           <div class="section">
                <img class="post sm title" id="logo" src="images/logo.png">
           </div>
           <div class="section">
                <div class="post lg title"><h1>Welcome to Talking Walls!</h1></div>
                <div class="post lg title"><h3>we are building a feedback loop between the design and implementation of building energy efficiency measures.</h3></div>
                <div class="post lg title"><a class="post lg title" href="#contactus"><h2>click here to contact us!</h2></a><h2>keep scrolling for answers to why, how, and when</h2></div>
           </div>

           <div class="textblk"><h4>why? to fill a knowledge gap between how building energy efficiency measures are designed and how they actually perform. The Investor Confidence Project of the Environmental Defense Fund identified uncertainty about return on investments as one of the 3 main barriers to investment in existing building energy efficiency retrofits. Buildings are responsible for roughly 30% of green-house gas emissions in the US. If we can reduce building energy consumption through investment in effective energy efficiency measures, we can make our society more sustainable.</h4></div>
           <div class="section">
                <div class="post xs"><img class="sketch" src="images/designer.png"></div>
                <div class="post sm"><img class="sketch" src="images/builder.png"></div>
                <div class="post xs"><img class="sketch" src="images/thegap/the.png"></div>
                <div class="post xs"><img class="sketch" src="images/thegap/gap.png"></div>
                <div class="post sm"><img class="sketch" src="images/thegap/user_gap.png"></div>
           </div>
           <div class="textblk"><h4>how? with an online application that connects designers and builders with the building users and systems. </h4></div>
           <div class="section">
                <div class="post lg"><img class="sketch" src="images/theapp.png"></div>
           </div>
           <div class="textblk"><h4>when? we will be launching the first protoype summer 2017. This phase includes uploading design information and utility data to create a compairison feedback loop. </h4></div>
           <div class="section">
                <div class="post lg title"><h2>1 upload design energy model</h2></div>
                <div class="post sm"><img class="sketch" src="images/phase1/designer_p1.png"></div>
                <div class="post xs"><img class="sketch" src="images/phase1/arrow_p1.png"></div>
                <div class="post sm"><img class="sketch" src="images/phase1/app_p1a.png"></div>
           </div>
           <div class="section">
                <div class="post lg title"><h2>2 connect building utility meters</h2></div>
                <div class="post xs"><img class="sketch" src="images/phase1/building_p1b.png"></div>
                <div class="post xs"><img class="sketch" src="images/phase1/arrow_p1b.png"></div>
                <div class="post xs"><img class="sketch" src="images/phase1/app_p1b.png"></div>
           </div>

           <div class="textblk"><h4>interested? share your email and/or checkout out our preliminary, pre-beta prelude platform!</h4></div>
    
            <form method="POST" action="/visitor" class="section">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="email" pattern="[^ @]*@[^ @]*" name="email" value="" placeholder="type email...">

                @foreach ($surveys as $survey)
                    <div>
                        <label class="checkbox-inline">
                            <input name="options[]" type="checkbox" value= {{{$survey->id}}} >{{$survey->survey_question}}
                        </label>
                    </div>
                @endforeach
                
                <input type="submit" value="click me!">
            </form>

            <div>
                <a name="contactus"></a> 
                <a target="_blank" href="https://www.instagram.com/ifawallcouldtalk/?hl=en">    <i class="fa fa-instagram fa-5x" aria-hidden="true"></i>
                </a>
                <i id="emailicon" class="fa fa-envelope-square fa-5x" aria-hidden="true"></i>
                <div id="email" class="hide" style="color:#42f4c5;background-color:black;"><h4>kvarner@ifawallcouldtalk.com</h4></div>
                <a class="post lg title" href="#backtotop">
                    <h2>return to top of page</h2>
                </a>
              
            </div>

        </div>
    </div>
@endsection

@section('scripts')
    @parent

    <script type="text/javascript">
    $('#emailicon').click( 
      function() {
        $( "#emailicon").toggleClass( "hide" );
        $( "#email" ).toggleClass( "hide" );
      }
    );
     $('#email').click( 
      function() {
        $( "#emailicon" ).toggleClass( "hide" );
        $( "#email" ).toggleClass( "hide" );
      }
    );

    </script>
@endsection