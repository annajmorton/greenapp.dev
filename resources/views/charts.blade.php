@extends('default/layout')

@section('styles')
    @parent

    <link href="assets/xcharts/xcharts.css" rel="stylesheet">
    <style type="text/css">
        .select-meter {
            margin-bottom: 50px;
        }
    </style>
@endsection

@section('content')
    <article class="example">
        <div class="row guttered">
            <div class="span12 select-meter">
                <select onchange="changeMeter(this)">
                    <option value="0">Select a meter</option>
                    @foreach($eplus_out as $meter => $values)
                        <option value="{{ $meter }}">{{ $meter }}</option>
                    @endforeach
                </select>
            </div>
            <div class="span12">
                <figure style="width: 100%; height: 300px;" id="graphic"></figure>
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
                $.each(values_eplus, function(date, value) {
                    data_show_eplus.push({
                        "x": date,
                        "y": (value/1000)
                    });

                    if(limit == 99) {
                        return false;
                    }

                    limit++;
                });

                limit = 0;
                $.each(values_umeter, function(date, value) {
                    data_show_umeter.push({
                        "x": date,
                        "y": (value/1000)
                    });

                    if(limit == 99) {
                        return false;
                    }

                    limit++;
                });



                var data = {
                    "xScale": "ordinal",
                    "yScale": "ordinal",
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
                    ]
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
                    "sortX" : function (a, b) { return (!a.x && !b.x) ? 0 : (a.x < b.x) ? -1 : 1; 
                    }
                };
                // var myChart = new xChart('line-dotted', data, '#graphic', opts);
                var myChart = new xChart('line-dotted', data, '#graphic',opts);
            }
        }
    </script>
@endsection