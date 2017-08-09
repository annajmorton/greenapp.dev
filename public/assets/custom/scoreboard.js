/***************************************
  
  Vue component creation

***************************************/ 
Vue.component('demo-avg', {
  template: '#avg-template',
  props: {
    averaged: Number
  },
  filters: {
    capitalize: function (data) {
      if (isNaN(data)) {
        return data.charAt(0).toUpperCase() + data.slice(1)
      }
      return data
    },

    numcommasep: function(data){
      data_int = parseInt(data)
      if (!isNaN(data_int)) {
        return (data_int + '').replace(/(\d)(?=(\d{3})+$)/g, '$1,');
      }
      return data
    },

    replaceunderscore: function (str){
      return str = str.replace(/[_-]/g, " "); 
    }
      
  }
});

Vue.component('demo-grid', {
  template: '#grid-template',
  props: {
    data: Array,
    columns: Array,
    filterKey: String
  },
  data: function () {
    var sortOrders = {}
    this.columns.forEach(function (key) {
      sortOrders[key] = 1
    })
    return {
      sortKey: '',
      sortOrders: sortOrders
    }
  },
  computed: {
    filteredData: function () {
      var sortKey = this.sortKey
      var filterKey = this.filterKey && this.filterKey.toLowerCase()
      var order = this.sortOrders[sortKey] || 1
      var data = this.data
      if (filterKey) {
        data = data.filter(function (row) {
          return Object.keys(row).some(function (key) {
            return String(row[key]).toLowerCase().indexOf(filterKey) > -1
          })
        })
      }
      if (sortKey) {
        data = data.slice().sort(function (a, b) {
          a = a[sortKey]
          b = b[sortKey]
          return (a === b ? 0 : a > b ? 1 : -1) * order
        })
      }
      return data
    }
  },
  filters: {
    capitalize: function (data) {
      if (isNaN(data)) {
        return data.charAt(0).toUpperCase() + data.slice(1)
      }
      return data
    },

    numcommasep: function(data){
      data_int = parseInt(data)
      if (!isNaN(data_int)) {
        return (data_int + '').replace(/(\d)(?=(\d{3})+$)/g, '$1,');
      }
      return data
    },

    replaceunderscore: function (str){
      return str = str.replace(/[_-]/g, " "); 
    }
      
  },
  methods: {
    sortBy: function (key) {
      this.sortKey = key
      this.sortOrders[key] = this.sortOrders[key] * -1
    }
  }
});


/***************************************
  
  setup for ajax request back to server

***************************************/ 

var csrf_token = $('meta[name="csrf-token"]').attr('value')
var get_url = $('meta[name="getAPIurl"]').attr('value')
var post_url = $('meta[name="postAPIurl"]').attr('value')


$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': csrf_token
    }
});

function getFromServer(){
  $.ajax({
    url: get_url,
    dataType: "json",
    type:"GET"
  }).fail(function(data){
    alert("the scoreboard can't be loaded at this time")
  }).success(function(data){
    app.ajaxupdate(data);
    app.averageCalc();
  });  
};



function postToServer(data){
  $.ajax({
    url: post_url,
    data: data,
    dataType: "json",
    type:"POST",

  }).fail(function(data){
    console.log(data)
    alert("we were not able to save your score")
  }).success(function(data){
    console.log(data);
  });  
}


/***************************************
  
  Vue object definition

***************************************/ 

var app = new Vue({
  el: '#app',
  data: {
    gridData: [],
    gridColumns: [],
    searchQuery: '',
    average: 0
  },
  methods: {
    ajaxupdate:function(response_data){
      this.gridData = response_data.gridData,
      this.gridColumns = response_data.gridColumns,
      this.searchQuery = response_data.searchQuery
    },
    averageCalc:function(){
      var calval = this.gridData;
      var totalval = 0;
      var i=0
      while(i<calval.length) {
        totalval += calval[i].calculated;
        i++;
      }
      this.average = totalval/i;
    }
  }

});

/***************************************
  
  load data and regular data refresh

***************************************/ 

getFromServer();

setInterval(function(){ 
  
  getFromServer();
  app.averageCalc();

}, 13000);

