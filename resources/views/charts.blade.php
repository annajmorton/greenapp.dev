<!DOCTYPE html>
<html>
    <head>
        <title>Greenapp</title>

        <link href="assets/xcharts/xcharts.css" rel="stylesheet">
        <script src="assets/jquery/js/jquery.min.js"></script>
        <script src="assets/d3.min.js"></script>
        <script src="assets/xcharts/xcharts.min.js"></script>
        <style type="text/css">
            .select-meter {
                margin-bottom: 50px;
            }
        </style>
    </head>
    <body>
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


        <script type="text/javascript">
            var data_graphics = {!! json_encode($eplus_out) !!};

            function changeMeter(select) {
                val = $(select).val();

                if(val != 0) {
                    values = data_graphics[val];
                    data_show = [];

                    limit = 0;
                    $.each(values, function(date, value) {
                        data_show.push({
                            "x": date,
                            "y": value
                        });

                        if(limit == 99) {
                            return false;
                        }

                        limit++;
                    });

                    var data = {
                        "xScale": "ordinal",
                        "yScale": "linear",
                        "main": [
                            {
                              "className": ".meter",
                              "data": data_show
                            }
                        ]
                    };

                    var tt = document.createElement('div'),
                      leftOffset = -(~~$('html').css('padding-left').replace('px', '') + ~~$('body').css('margin-left').replace('px', '')),
                      topOffset = -32;
                    tt.className = 'ex-tooltip';
                    document.body.appendChild(tt);

                    var opts = {
                        //"dataFormatX": function (x) { return d3.time.format('%Y-%m-%d').parse(x); },
                        //"tickFormatX": function (x) { return d3.time.format('%A')(x); },
                        "mouseover": function (d, i) {
                            var pos = $(this).offset();
                            //$(tt).text(d3.time.format('%A')(d.x) + ': ' + d.y)
                            $(tt).text(d.x+': '+d.y)
                                .css({top: topOffset + pos.top, left: pos.left + leftOffset})
                                .show();
                        },
                        "mouseout": function (x) {
                            //$(tt).hide();
                        }
                    };
                    var myChart = new xChart('line-dotted', data, '#graphic', opts);
                }
            }
        </script>

    </body>
</html>
