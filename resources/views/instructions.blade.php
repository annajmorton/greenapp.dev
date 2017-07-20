@extends('default/alt_layout')

@section('styles')
    @parent
    <meta name="viewport" content="width=device-width" />
    <script src="https://use.fontawesome.com/892c4b30ee.js"></script>
   <link href="https://fonts.googleapis.com/css?family=Economica" rel="stylesheet">
   <link href="https://fonts.googleapis.com/css?family=Raleway:800" rel="stylesheet">
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
            /*display: flex;
            justify-content: space-around;
            align-items: center;*/
            text-align: center;
            background-color: white;
            padding: 5%;
            color: black;
            text-decoration: bold;
        }
        .post.lg.title{
            color: black;
            background-color: white;
            width: 25%;
            font-family: 'Raleway', sans-serif;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);

        }
        .title{
            font-family: 'Raleway', sans-serif;
            color:black;
            color: #ff72de;
            font-size: 4em;
            /*background-color:#ff72de;*/
            background-color: black;
            margin-top: none;
            margin-left:2%; 
            margin-right:2%;
            padding-left: 2%; 
            padding-right:2%;
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
                background-attachment: fixed;
            
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
            margin: auto;
            margin-bottom: 5%;
            padding: 5%;
            display: block;
            min-height: 80px; 
            min-width: 300px;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            text-align: center;
            color: #FBB606;
            font-family: 'Raleway', sans-serif;
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
            color: #FBB606;
            margin: 5%;
            padding: 5%;
        }

        [type="submit"]:focus {
            border: solid black 5px;
            color: yellow;
        }

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
        .title-med{
          background-color: #42f4dc;
          margin-bottom: 10%;
        }
        a {
          color: #42f4dc;
        }
        a:visited { 
            color: #ff72de;
        }
    </style>
@endsection


@section('content')
    <a id="backtotop"></a>
    <div class="parallax">
        <div class="page">
           <div class="section"></div>
           <div class="title" style="border: 5px solid black; background-color:#FBB606;color:black;"><h1>Instructions!</h1></div>

           <div class="section"></div>
           <div class="textblk">
            <ul>
              <li>Enter in your HOME utility data.  If you have access to your utility data online, feel free to use that.  If not, please estimate your monthly averages or use the US national averages provided:
                <ul>
                  <li>$23/month natural gas</li>
                  <li>$44/month electricty</li>
                  <li>$72/month fuel oil</li>
                  <li>$37/month propane</li>
                </ul>
              </li>
              <li>If you have home efficiencies measures in place, or planned, please fill them in as applicable (programmable thermostat, lighting, power settings, washer/dryer, ENERGY STAR products)</li>
              <li>Continue on to the TRANSPORTATION section.  Fill in the number of vehicles you have in your household, how often you maintain them, the estimated miles traveled per year, and miles per gallon your vehicle gets.  If you do not know this information, please use the US national averages provided:
                <ul>
                  <li>12,480 miles/year</li>
                  <li>21.4 miles/gallon</li>
                </ul>
          
              </li>
              <li> Continue on to the WASTE section.  Fill in products you recycled at home.  If you plan to recycle additional materials, please check those boxes in the following section.</li>
              <li>View your final carbon report.  If you have planned new actions moving forward, see what kind of savings those actions offer.</li>
              <li>Once complete, view your report and post your data to the scoreboard by launching this URL: http://greenappy.info/score</li>
            </ul>

          </div>


          <div class="section"></div>
            <div class="title">
                <a href="#backtotop">
                    <h2>return to top of page</h2>
                </a>
            </div>
          <div class="section"></div>

        </div>
    </div>
@endsection
   