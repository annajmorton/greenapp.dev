/***************************************
  
  setup for ajax server request 

***************************************/ 

var csrf_token = $('meta[name="csrf-token"]').attr('value')
var get_url = $('meta[name="getAPIurl"]').attr('value')
var put_url = $('meta[name="putAPIurl"]').attr('value')


$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': csrf_token,
        'Content-Type': 'application/json'
    }
});



function postToServer(data){
  $.ajax({
    url: put_url,
    data: data,
    type:"PUT",

  }).fail(function(data){
    console.log(data)
    alert("we were not able to save your score")
  }).success(function(data){
    console.log(data);
    alert("your guess is posted!");
    var user = confirm("go to the exercise instructions?");

    if(user){
      window.location.href = "/instructions";
    }

  });  
}


/***************************************
  
  Vue object definition

***************************************/ 

var app = new Vue({
  el:'#app',
  data: {
   guess: {
    anna: '', 
    ajit: '', 
    scott: ''
   }
  },
  methods: {
    updateValue: function(data){
      if (this.guess.anna&&this.guess.ajit&&this.guess.scott) {
        if(this.notNumeric(this.guess.anna)){
          return
        }
        if(this.notNumeric(this.guess.ajit)){
          return
        }
        if(this.notNumeric(this.guess.scott)){
          return
        }
        data = JSON.stringify(this.guess);
        postToServer(data);
        this.cleardata();
        return;
      }
      alert("you are missing a guess!")

    },
    cleardata: function(){ 
      this.guess.anna.guess = '';
      this.guess.ajit.guess = '';
      this.guess.scott.guess = '';
    },
    notNumeric: function(data){
      var check = jQuery.isNumeric(data);
      if(!check){
        alert("one of your guesses is not a number");
        return true;
      }
      return false;
    }
  }
});

