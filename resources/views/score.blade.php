@extends('default/alt_layout')

@section('styles')
    @parent
    <meta name="viewport" content="width=device-width" />
    <script src="https://use.fontawesome.com/892c4b30ee.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Permanent+Marker" rel="stylesheet">
   <link href="https://fonts.googleapis.com/css?family=Economica" rel="stylesheet">
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
            font-family: 'Permanent Marker', cursive;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);

        }
        .title{
            font-family: 'Permanent Marker', cursive;
            color:black;
            font-size: 4em;
            background-color:#ff72de;
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
            font-family: 'Permanent Marker', cursive;
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
    </style>
@endsection


@section('content')
    <a id="backtotop"></a>
    <div class="parallax">
        <div class="page">
           <div class="section"></div>
           <div class="title" style="background-color:#FBB606;"><h1>Share Your Carbon Footprint</h1></div>
           <div class="section"></div>

           
           <div class="textblk">
            <div class="title-med">
              <h2>Carbon Scoreboard</h2>
            </div>
            <!-- demo root element -->
            <div id="demo">
              
              <demo-grid class="table"
                v-clearform
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
                    <input type="text" placeholder="first name" v-model="fname" required>
                    <input type="text" placeholder="last name" v-model="lname" required>
                    <input type="email" pattern="[^ @]*@[^ @]*" v-model="email" value="" placeholder="type email..." required>
                    <input type="text" placeholder="carbon score" v-model="lbsCO2" required>
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
    <script src="https://unpkg.com/vue"></script>
  <!-- component template -->
    <script type="text/x-template" id="grid-template">
      <table>
        <thead>
          <tr>
            <th v-for="key in columns"
              @click="sortBy(key)"
              :class="{ active: sortKey == key }">
              @{{ key | capitalize }}
              <span class="arrow" :class="sortOrders[key] > 0 ? 'asc' : 'dsc'">
              </span>
            </th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="entry in filteredData">
            <td v-for="key in columns">
              @{{entry[key]}}
            </td>
          </tr>
        </tbody>
      </table>
    </script>
    <script type="text/javascript">
        // register the grid component
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
            capitalize: function (str) {
              return str.charAt(0).toUpperCase() + str.slice(1)
            }
          },
          methods: {
            sortBy: function (key) {
              this.sortKey = key
              this.sortOrders[key] = this.sortOrders[key] * -1
            }
          }
        })

        // bootstrap the demo
        var demo = new Vue({
          el: '#demo',
          data: {
            searchQuery: '',
            gridColumns: ['fname', 'lname','email','lbsCO2'],
            gridData: [
              { fname: 'Chuck', lname: 'Norris', email: 'chuck@rocks.com',lbsCO2 : 5000 },
              { fname: 'Bruce', lname: 'Lee', email:'whataguy@thebest.com',lbsCO2:9000 },
              { fname: 'Jackie', lname: 'Chan', email:'avoidit@meoh.com', lbsCO2:7000 }
            ]
          }
        })
        var postScoreForm = new Vue({
            el: '#postScoreForm',
            data: {
                fname:'',
                lname:'',
                email:'',
                lbsCO2: ''
            },
            methods: {
              postScore: function(event){
                  
                  if (this.fname&&this.lname&&this.email&&this.lbsCO2) {
                      
                      demo.gridData.push({
                        fname:this.fname,
                        lname:this.lname,
                        email:this.email,
                        lbsCO2:this.lbsCO2
                      });
                     
                  };

              },

              cleardata: function(){
                
                alert('you are on the Carbon Scoreboard! checkit out!');
                this.fname = '';
                this.lname = '';
                this.email = '';
                this.lbsCO2 = '';
              }
          }

        });

        Vue.directive('clearform',{
            componentUpdated: function(el){
               postScoreForm.cleardata();
            }
        })
    </script>
  
@endsection