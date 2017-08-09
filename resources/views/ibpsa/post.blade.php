@extends('default/alt_layout')

@section('styles')
    @parent

   <style type="text/css">
   
    ol>li>ul>li {
        font-size: 0.75em;
    }
    ol.paget{
        font-size: 1.75em;
        padding-left: 10%;
        margin-left: 5%;
        margin-right:5%;
        text-align: left;
    }
    h3{
      font-size: 2em;
    }
   </style>
@endsection


@section('content')
    <a id="backtotop"></a>
    <div class="parallax">
        <div class="page" id="app">

          <div class="section"></div>
           <div class="title" style="border: 5px solid black; background-color:#FBB606;color:black;"><h1>Post your info to the Scoreboard!</h1></div>

           <div class="section"></div>

            <div class="textblk">
                <div class="title-med">
                  <h3>enter your guess in the input below!</h3>
                </div>
              
                <input type="text" placeholder="guess annual CO2" id="guess">
                
          </div>
           
           <div class="section"></div>

            <div class="title">
              <a href="https://www3.epa.gov/carbon-footprint-calculator/" target="_blank">
                  <h2>click this link to open the EPA carbon footprint calculator in new tab!</h2>
              </a>   
            </div>

           <div class="section"></div>
            <div class="textblk">
               <div class="title-med">
                <h3>Instructions for calculating your annual estimated CO2 footprint</h3>
              </div>
              <ol class="paget">
                <li>Click the link above, go to the EPA carbon footprint calculator, and complete the following steps:
                  <ul>
                    <li>Enter number of people in your home and zip code (if outside the US, use 00000 to run the default)</li>
                    <li>Enter your average monthly <strong>HOME</strong> utility data, <strong> TRANSPORTATION</strong> information, and <strong>WASTE</strong> description</li>
                    <li>Click the info icons for suggested defaults.</li>
                    <li>Skip the reduce your emission subsections. We don’t need it for the activity.</li>
                    <li>Click “continue to report” to view your final carbon report!</li>
                  </ul>
                </li>
                <li>Enter “Your Current Total” annual estimated C02 emissions and information in the form below. Post your response. </li>
                <li>Go to the Score page to see submitted footprints on the scoreboard!</li>
              </ol>
            </div>
        
           <div class="section"></div>
           <div class="textblk">
                <div class="title-med">
                  <h3>enter your current total annual estimated C02 emissions and information here to post to the scoreboard!</h3>
                </div>
                <form method="POST" action="/ibpsa17" >
                    <input type="text" placeholder="first name" name="first_name" required>
                    <input type="text" placeholder="last name" name="last_name" required>
                    <input type="email" pattern="[^ @]*@[^ @]*" name="email" required placeholder="type email...">
                    <input id="guessinput" type="text" name="guess" value="0" hidden>
                    <input type="text" placeholder="annual estimated CO2" name="calculated" required>
                    <input type="submit" value="post your score!">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                </form>
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
@section('scripts')
    @parent
    <!-- Vue.js library, for production and dev -->
    @if(env('APP_DEBUG', false))
      <script src="https://unpkg.com/vue"></script>
    @else
      <script src="/assets/vu/vue.min.js"></script>
    @endif 

    <!-- component template -->
      <script type="text/javascript" src="/assets/custom/post.js"></script>
  
@endsection
   