<div class="chart_{{ $uid }}"  style="display: inline-block">
    <canvas id="pieChart_{{ $uid }}" height="{{ $height }}" width="{{ $width }}"></canvas>
</div>

<script>
    jQuery(function () {
        var pieChartCanvas = jQuery("#pieChart_{{ $uid }}").get(0).getContext("2d");
        var pieChart = new Chart(pieChartCanvas);
        var pieChartData = {!! $data !!};
        var pieChartOptions = {
            //Boolean - Whether we should show a stroke on each segment
            segmentShowStroke : {{ $pie->isStroke() ? 'true' : 'false' }},
            //String - The colour of each segment stroke
            segmentStrokeColor : "#fff",
            //Number - The width of each segment stroke
            segmentStrokeWidth : 2,
            //Number - The percentage of the chart that we cut out of the middle
            percentageInnerCutout : {{ $pie->getInnercut() }}, // This is 0 for Pie charts
            //Number - Amount of animation steps
            animationSteps : 100,
            //String - Animation easing effect
            animationEasing : "easeOutBounce",
            //Boolean - Whether we animate the rotation of the Doughnut
            animateRotate : true,
            //Boolean - Whether we animate scaling the Doughnut from the centre
            animateScale : true,
            //String - A legend template
            legendTemplate : "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<segments.length; i++){%><li><span style=\"background-color:<%=segments[i].fillColor%>\"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>"
            @if(!$pie->isTooltips())
            ,customTooltips: function(t) {
                return false;
            }
            @endif
        };
        pieChart.Pie(pieChartData, pieChartOptions);
    });
</script>