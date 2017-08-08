@extends('default/alt_layout')

@section('styles')
    @parent

   <style type="text/css">
   
    ol>li>ul>li {
        font-size: 0.75em;
    }
    ol.textblk{
        font-size: 1.75em;
        padding-left: 10%;
        margin-left: 5%;
        margin-right:5%;
        text-align: left;
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
            <ol class="textblk">
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
              <li>Once complete, view your report and post your data to the scoreboard by launching this URL: http://ifawallcouldtalk.com/score</li>
            </ol>

          </div>

          <div class="section"></div>

        </div>
    </div>
@endsection
   