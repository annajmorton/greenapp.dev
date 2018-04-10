@extends('default/layout')

@section('styles')
    @parent
    
   
@endsection


@section('content')
    <div class="parallax">
        <div class="page">
              <a name="backtotop"></a>

           <div class="section">
                
                <div class="title">
                  <h1>Welcome to Talking Walls!</h1>
                  <h3> We are creating a smart platform that compares the energy models of building designs to real-world usage data.</h3>
                </div>
                <div class="title">
                  <h2>Keep scrolling to find out more...</h2>
                </div>
                
           </div>

           <div class="bkgrnopac">

             <div class="thumbnail">
                  <div class="textblk caption">
                    <h3>Buildings are responsible for roughly 40% of greenhouse gas emissions in the US, but efforts to reduce their energy consumption rely on models and not measured energy performance.</h3>
                  </div>
                  <img class="sketch" src="images/1_40percent.png">
             </div>

             <div class="thumbnail">
                  <div class="textblk caption">
                    <h3>Why? There is a knowledge gap between models and measured energy consumption.</h3>
                  </div>
                  <img class="sketch" src="images/2_temp.png">
             </div>
             <div class="thumbnail">
                  <div class="textblk caption">
                    <h3>Collecting energy data takes time, buildings are complex and unique, and energy data isn't granular. if your energy bills are higher than you expected, how do you fix it?).</h3>
                  </div>
                  <img class="sketch" src="images/3_ballnchain.png">
             </div>
             <div class="thumbnail">
                  <div class="textblk caption">
                    <h3>What if there were an application that automated data collection, simplified model comparison, and suggested ways to improve performance?</h3>
                  </div>
                  <img class="sketch" src="images/4_theapp.png">
             </div>
             
             <div class="textblk"><h3>We want Talking Walls to be that application! Contact us and check out our alpha prototype below!</h3></div>

          </div>
    

            <div class="section">
                <form method="POST" action="/visitor">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="email" pattern="[^ @]*@[^ @]*" name="email" value="" placeholder="type email...">
                    
                    <input type="submit" value="demo alpha">
                </form>
                <div>
                  <a name="contactus"></a> 
                  <a target="_blank" href="https://www.instagram.com/ifawallcouldtalk/?hl=en">    <i class="fa fa-instagram fa-5x" aria-hidden="true"></i>
                  </a>
                  <i id="emailicon" class="fa fa-envelope-square fa-5x" aria-hidden="true"></i>
                  <div id="email" class="hide" style="color:#42f4c5;background-color:black;"><h2>annajmorton@gmail.com</h2></div>
                </div>
                <a class="post lg title" href="#backtotop">
                    <h2>return to top</h2>
                </a>
              
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