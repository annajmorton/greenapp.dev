@extends('default/layout')

@section('styles')
    @parent

    <link href="assets/xcharts/xcharts.css" rel="stylesheet">
    <style type="text/css">
        .select-meter {
            margin-top: 50px;
            margin-bottom: 50px;
        }
        .color1 rect, .color1 circle, div.color1 {
            fill: #4da944;
        }
        .color0 rect, .color0 circle, div.color0 {
            fill: #3880aa;
        }
        #legend{
            display: flex;
            justify-content: center;
            align-items:center;
        }

    </style>
@endsection

@section('content')
    <article class="example">
        <div class="row guttered">
            <div class="span12 select-meter">
                <select onchange="changeMeter(this)">
                    <option value="0">Select a meter and display results</option>
                    @foreach($eplus_out as $meter => $values)
                        <option value="{{ $meter }}">{{ $meter }}</option>
                    @endforeach
                </select>
            </div>
            <div class="span12">
                <div id="title" style="width: 100%; height: 50px; text-align:center;"></div>
                <figure style="width: 100%; height: 50px;" id="legend"></figure>
                <figure style="width: 100%; height: 500px;" id="graphic"></figure>
            </div>
        </div>
    </article>
@endsection


@section('scripts')
    @parent

    <script src="assets/d3.min.js"></script>
    <script src="assets/xcharts/xcharts.min.js"></script>

    <script type="text/javascript">
        var eplusdata = {!! json_encode($eplus_out) !!};
        var umeter = {!! json_encode($umeter_out) !!};

        function changeMeter(select) {
            val = $(select).val();

            if(val != 0) {
                values_eplus = eplusdata[val];
                values_umeter = umeter[val];
                
                data_show_eplus = [];
                data_show_umeter = [];
           
                limit = 0;
                var sum_eplus = 0;
                $.each(values_eplus, function(date, value) {
                    data_show_eplus.push({
                        "x": parseInt(date),
                        "y": (value/1000)
                    });

                    sum_eplus = sum_eplus + (value/1000);
                    if(limit == 99) {
                        return false;
                    }

                    limit++;
                });

                limit = 0;
                var sum_umeter = 0;
                $.each(values_umeter, function(date, value) {
                    data_show_umeter.push({
                        "x": parseInt(date),
                        "y": (value/1000)
                    });

                    sum_umeter = sum_umeter + (value/1000);
                    if(limit == 99) {
                        return false;
                    }

                    limit++;
                });



                var data = {
                    "xScale": "ordinal",
                    "yScale": "linear",
                    "type" : "bar",
                    "main": [
                        {
                          "className": ".eplus",
                          "data": data_show_eplus
                        },
                        {
                          "className": ".umeter",
                          "data": data_show_umeter
                        }
                    ],
                    "yMin":0,
                    "legend":".eplus' .umeter"
                };

                var tt = document.createElement('div'),
                  leftOffset = -(~~$('html').css('padding-left').replace('px', '') + ~~$('body').css('margin-left').replace('px', '')),
                  topOffset = -32;
                tt.className = 'ex-tooltip';
                document.body.appendChild(tt);

                var opts = {
                    "mouseover": function (d, i) {
                        var pos = $(this).offset();
                        //$(tt).text(d3.time.format('%A')(d.x) + ': ' + d.y)
                        $(tt).text(d.x+': '+d.y)
                            .css({top: topOffset + pos.top, left: pos.left + leftOffset})
                            .show();
                    },
                    "mouseout": function (x) {
                        //$(tt).hide();
                    },
                    "paddingTop":10,
                    "tickHintX":-13    
                };
                
                var myChart = new xChart('line-dotted', data, '#graphic',opts);
                var percent_diff = (sum_umeter - sum_eplus)/((sum_umeter + sum_eplus)/2);
                document.getElementById('title').innerHTML ="<h1>monthly energy consumption kBtu</h1>";
                document.getElementById('legend').innerHTML = "<svg width='40' height='40'><g class=' main umeter bar   color0'><rect x='5' y='5' width='30' height='30'/></g></svg><div><h5>Energy Model</h5></div><svg width='40' height='40'><g class=' main umeter bar   color1'><rect x='5' y='5' width='30' height='30'/></g></svg><div><h5>Utility Meter</h5></div><div style='height:40px;width:40px;'></div><div><h5>Percent Difference: "+ percent_diff.toFixed(2) + "%</h5></div>";

            }
        }
    </script>
@endsection