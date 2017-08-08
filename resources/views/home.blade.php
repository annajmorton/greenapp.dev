@extends('default/layout')

@section('styles')
    @parent
    
   
@endsection


@section('content')
    <div class="parallax">
        <div class="page">
                <a name="backtotop"></a>
        {{--    <div class="section">
                <img class="post sm title" id="logo" src="images/logo.png">
           </div> --}}

           <div class="section">
                
                <div class="post lg title"><h2>welcome to talking walls!</h2><h3> we are building a smart platform to check building energy efficiency.</h3></div>
                  <div class="post lg title"><h2>keep scrolling to find out more!</h2></div>
                <div class="post lg title"><a class="post lg title" href="#contactus"><h2>click here to contact us!</h2></a></div>
           </div>

           <div class="section bkgrnopac" style="height:300px;"></div>
           <div class="textblk"><h4>Buildings are responsible for roughly 40% of greenhouse gas emissions in the US. There is major movement in the construction industry towards energy efficiency, but these efforts are largely based on modeled energy savings or prescriptive measures. There is a knowledge gap between these designed efficiencies and actual energy consumption in implementation.</h4></div>
           <div class="section bkgrnopac">
                <div class="post xs"><img class="sketch" src="images/designer.png"></div>
                <div class="post sm"><img class="sketch" src="images/builder.png"></div>
                <div class="post xs"><img class="sketch" src="images/thegap/the.png"></div>
                <div class="post xs"><img class="sketch" src="images/thegap/gap.png"></div>
                <div class="post sm"><img class="sketch" src="images/thegap/user_gap.png"></div>
           </div>
           <div class="textblk"><h4>Talking walls closes this gap by helping project teams see if energy saving goals measure up. It helps designers and builders improve future projects through feedback, helps operators and owners recoup efficiency investments, and influences user behavior. </h4></div>
           <div class="section bkgrnopac">
                <div class="post lg"><img class="sketch" src="images/theapp.png"></div>
           </div>
           <div class="textblk"><h4>We will be launching the first beta prototype in 2017. This phase includes uploading design information and utility data to create a comparison feedback loop. </h4></div>
           <div class="section bkgrnopac">
                <div class="post lg title"><h2>1 upload energy goals</h2></div>
                <div class="post sm"><img class="sketch" src="images/phase1/designer_p1.png"></div>
                <div class="post xs"><img class="sketch" src="images/phase1/arrow_p1.png"></div>
                <div class="post sm"><img class="sketch" src="images/phase1/app_p1a.png"></div>
           </div>
           <div class="section bkgrnopac">
                <div class="post lg title"><h2>2 connect building utility meters</h2></div>
                <div class="post xs"><img class="sketch" src="images/phase1/building_p1b.png"></div>
                <div class="post xs"><img class="sketch" src="images/phase1/arrow_p1b.png"></div>
                <div class="post xs"><img class="sketch" src="images/phase1/app_p1b.png"></div>
           </div>

           <div class="textblk"><h4>interested? share your email and/or checkout out our preliminary, alpha prototype below!</h4></div>
    
            <form method="POST" action="/visitor" class="section bkgrnopac">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="email" pattern="[^ @]*@[^ @]*" name="email" value="" placeholder="type email...">
                
                <input type="submit" value="demo alpha">
            </form>

            <div class="section bkgrnopac">
                <a name="contactus"></a> 
                <a target="_blank" href="https://www.instagram.com/ifawallcouldtalk/?hl=en">    <i class="fa fa-instagram fa-5x" aria-hidden="true"></i>
                </a>
                <i id="emailicon" class="fa fa-envelope-square fa-5x" aria-hidden="true"></i>
                <div id="email" class="hide" style="color:#42f4c5;background-color:black;"><h4>annajmorton@gmail.com</h4></div>
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