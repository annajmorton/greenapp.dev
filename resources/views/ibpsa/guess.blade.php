@extends('default/alt_layout')

@section('styles')
  @parent
   
   {{-- This is the token Laravel requires for non-GET requests --}}
   <meta id="_token" name="csrf-token" value="{{ csrf_token() }}">
  
   <meta id="putAPIurl" name="putAPIurl" value="{{ action('Ibpsa17Controller@update')}}"> 

   <style type="text/css">
    img {
      width: 75%;
    }

   </style>
@endsection


@section('content')

  <a id="backtotop"></a>
  <div class="parallax">
      <div id="app" class="page">
         <div class="section"></div>
         <div class="title" style="border: 5px solid black; background-color:#FBB606;color:black;"><h1>Guess Our Carbon Footprint</h1></div>
         <div class="section"></div>
         
           <div class="row">
              <img src="/images/anna.png">
              <input required name="anna" v-model.number="guess.anna" placeholder="guess anna's score">
           </div>

           <div class="row">
              <img src="/images/ajit.png">
              <input required name="ajit" v-model.number="guess.ajit" placeholder="guess ajit's score">
           </div>

           <div class="row">
              <img src="/images/scott.png">
              <input required name="scott" v-model.number="guess.scott" placeholder="guess scott's score">
           </div>

           <div class="section"></div>

           <div class="row">  
              <input name="submit" type="submit" v-on:click="updateValue"> 
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
      <script type="text/javascript" src="/assets/custom/guess.js"></script>
  
@endsection