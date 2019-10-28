@extends('layouts.app')
@section('header')

@endsection
@section('content')

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        var visitor = <?php echo $visitor; ?>;
        console.log(visitor);
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);
        function drawChart() {
            var data = google.visualization.arrayToDataTable(visitor);
            var options = {
                title: 'Line Chart Showing Quantity Sold for various products ',
                curveType: 'function',
                legend: { position: 'bottom' }
            };
            var chart = new google.visualization.LineChart(document.getElementById('linechart'));
            chart.draw(data, options);
        }
    </script>

<a href="/Sales/create"><input type="button" value="Record Sale" class="btn btn-primary"> </a>

@if(count($sales)>0)
        <table class="table table-dark" id="dataTable" width="100%" cellspacing="0">
            <th>Sale Name</th>
            <th>Quantity</th>
            <th>Sale Type</th>
            <th>Client Name</th>
            

            @foreach($sales as $sale)
            <tr>
                <td>{{$product[$sale->id]}}</td>
                <td>{{$sale->quantity}}</td>
                <td>{{$payment[$sale->Payment]}}</td>
                <td>{{$sale->created_at}}</td>
                <td>{{$sale->updated_at}}</td>
                
                <td><a href="/Sales/{{$sale->id}}/edit" class="btn btn-info">Edit</a> </td>
                <td>
                    {!!Form::open(['action'=>['SalesController@destroy',$sale->id],'method'=>'POST','class'=>'pull-right'])!!}
                    {{Form::hidden('_method','DELETE')}}
                    {{Form::Submit('Delete',['class'=>'btn btn-danger'])}}
                    {!!Form::close()!!}

                </td>
            </tr>
            @endforeach
        </table>

        <div class="card mb-3">
            <div class="card-header">
                <i class="fas fa-chart-area"></i>
                Chart </div>
            <div class="card-body">
                <div id="linechart" style="width: 900px; height: 500px">
                </div>

            </div>


        </div>

    @endif

<a href="/home" class="btn btn-default"><input type="button" value="Back" class="btn btn-primary"></a>

@endsection
