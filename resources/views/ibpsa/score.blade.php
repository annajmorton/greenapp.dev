@extends('default/alt_layout')

@section('styles')
  @parent
   
   {{-- This is the token Laravel requires for non-GET requests --}}
   <meta id="_token" name="csrf-token" value="{{ csrf_token() }}">
   <meta id="getAPIurl" name="getAPIurl" value="{{ action('Ibpsa17Controller@index')}}"> 
   <meta id="postAPIurl" name="postAPIurl" value="{{ action('Ibpsa17Controller@store')}}"> 

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
              <h2>Carbon Scoreboard lbsCO2e</h2>
            </div>
            <!-- demo root element -->
            <div id="app"> 
               <form id="search" @submit.prevent>
                <input name="query" v-model="searchQuery" placeholder="search the scoreboard">
              </form>      
              <demo-grid class="table"
                :data="gridData"
                :columns="gridColumns"
                :filter-key="searchQuery"
                :averaged = "average">
              </demo-grid>
              <demo-avg
                :averaged = "average">
              </demo-avg>
            </div>
              

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
    <script type="text/x-template" id="avg-template">
      <div class="title-med">
        <h2>Calculated Average lbsC02e: @{{ averaged |numcommasep }}</h2>
      </div>
    </script>
      
    <script type="text/javascript" src="/assets/custom/scoreboard.js"></script>
  
@endsection