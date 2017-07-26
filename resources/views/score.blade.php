@extends('default/alt_layout')

@section('styles')
  @parent
   <meta name="viewport" content="width=device-width" />
   {{-- This is the token Laravel requires for non-GET requests --}}
   <meta id="_token" name="csrf-token" value="{{ csrf_token() }}">
   <meta id="getAPIurl" name="getAPIurl" value="{{ action('Ibpsa17Controller@index')}}"> 
   <meta id="postAPIurl" name="postAPIurl" value="{{ action('Ibpsa17Controller@store')}}"> 


   <script src="https://use.fontawesome.com/892c4b30ee.js"></script>

   <link href="https://fonts.googleapis.com/css?family=Economica" rel="stylesheet">
   <link href="https://fonts.googleapis.com/css?family=Raleway:800" rel="stylesheet">
   <link rel="stylesheet" type="text/css" href="/assets/custom/alt_default.css">   
@endsection


@section('content')

    <a id="backtotop"></a>
    <div class="parallax">
        <div class="page">
           <div class="section"></div>
           <div class="title" style="border: 5px solid black; background-color:#FBB606;color:black;"><h1>Share Your Carbon Footprint</h1></div>
           <div class="section"></div>

           
           <div class="textblk">
            <div class="title-med">
              <h2>Carbon Scoreboard</h2>
            </div>
            <!-- demo root element -->
            <div id="app"> 
               <form id="search" @submit.prevent>
                <input name="query" v-model="searchQuery" placeholder="search the scoreboard">
              </form>      
              <demo-grid class="table"
                :data="gridData"
                :columns="gridColumns"
                :filter-key="searchQuery">
              </demo-grid>
            </div>
              

           </div>
           <div class="section"></div>

          <div class="title">
                <a href="https://www3.epa.gov/carbon-footprint-calculator/" target="_blank">
                    <h2>click this link to calculate your footprint!</h2>
                </a>   
           </div>

           <div class="section"></div>
           <div class="textblk">
                <div class="title-med">
                  <h2>input your data and post to the scoreboard!</h2>
                </div>
                <form id="postScoreForm" v-on:submit.prevent="onSubmit">
                    <input type="text" placeholder="first name" v-model="first_name" required>
                    <input type="text" placeholder="last name" v-model="last_name" required>
                    <input type="email" pattern="[^ @]*@[^ @]*" v-model="email" value="" placeholder="type email..." required>
                    <input type="text" placeholder="guess carbon score" v-model="guess" required>
                    <input type="text" placeholder="calculated carbon score" v-model="calculated" required>
                    <input type="submit" value="click to post!" v-on:click.stop="postScore">
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
    <script type="text/x-template" id="grid-template">
      <table>
        <thead>
          <tr>
            <th v-for="key in columns"
              @click="sortBy(key)"
              :class="{ active: sortKey == key }">
              @{{ key | capitalize | replaceunderscore}}
              <span class="arrow" :class="sortOrders[key] > 0 ? 'asc' : 'dsc'">
              </span>
            </th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="entry in filteredData">
            <td v-for="key in columns">
              @{{ entry[key] | capitalize |numcommasep}}    
            </td>
          </tr>
        </tbody>
      </table>
    </script>
    <script type="text/javascript" src="/assets/custom/scoreboard.js"></script>
  
@endsection