@extends('default/alt_layout')

@section('styles')
    @parent
    <meta name="viewport" content="width=device-width" />
    <script src="https://use.fontawesome.com/892c4b30ee.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Permanent+Marker" rel="stylesheet">
   <link href="https://fonts.googleapis.com/css?family=Economica" rel="stylesheet">
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
            font-family: 'Economica', sans-serif;
            
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
            width: 50%;
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
        .title{
            font-family: 'Permanent Marker', cursive;
            color:black;
            font-size: 5em;
            margin-top: none;
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
                /*height: 100%;*/
                /*width: 100%;*/
                background-image: url("images/cork_board.jpeg");
                /*background-size: 412px 247px;*/
                /*background-size: cover;*/
                /*background-size: 50%;*/
                background-attachment: fixed;
                /*background-repeat: no-repeat;*/
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
                background-image: url("images/cork_board.jpeg");
                background-attachment: fixed;
                /*background-size: 200%;*/
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
    <a id="backtotop"></a>
    <div class="parallax">
        <div class="page">
           <div class="section"></div>
           <div class="title">Energy Data ... </div>
           <div style="padding:2%;color:black;background-color:white;"><h2>Are we afraid to share? a graphic novel</h2></div>

           <div class="section"></div>
           <div class="textblk"><h2>Anna's phone call with an architect</h2></div>
           <div class="section">
                <div class="post lg"><img class="sketch" src="images/novel/arch_1.png"></div>
                <div class="post lg"><img class="sketch" src="images/novel/arch_2.png"></div>
            </div>
            <div class="section">
                <div class="post lg"><img class="sketch" src="images/novel/arch_3.png"></div>
                <div class="post lg"><img class="sketch" src="images/novel/arch_4.png"></div>
            </div>
            <div class="section">
                <div class="post lg"><img class="sketch" src="images/novel/arch_5.png"></div>
           </div>
           <div class="textblk"><h2>Scott's coffee with the director of a 2030 District</h2></div>
           <div class="section">
                <div class="post lg"><img class="sketch" src="images/novel/prog_1.png"></div>
                <div class="post lg"><img class="sketch" src="images/novel/prog_2.png"></div>
            </div>
            <div class="section">
                <div class="post lg"><img class="sketch" src="images/novel/prog_3.png"></div>
           </div>
    
            <div>
                <a class="post lg title" href="#backtotop">
                    <h2>return to top of page</h2>
                </a>
              
            </div>

        </div>
    </div>
@endsection

@section('scripts')
    @parent

  
@endsection