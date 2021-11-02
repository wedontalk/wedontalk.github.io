@extends('layouts.admin')
@section('main')
<div class="content-wrapper">
    <h2>thống kê lượt xem phim</h2>
    <div id="linechart" style="width: 1000px; height: 500px"></div>


    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        var population = <?php echo $population; ?>;
        console.log(population);
        google.charts.load('current', {
            'packages': ['corechart']
        });
        google.charts.setOnLoadCallback(lineChart);

        function lineChart() {
            var data = google.visualization.arrayToDataTable(population);
            var options = {
                title: 'số lượt xem phim',
                curveType: 'function',
                legend: {
                    position: 'bottom'
                }
            };
            var chart = new google.visualization.LineChart(document.getElementById('linechart'));
            chart.draw(data, options);
        }        
    </script>
</div>
@stop