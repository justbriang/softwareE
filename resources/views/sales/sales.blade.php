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
                title: 'Line Chart Showing Quantity sold for various products ',
                curveType: 'function',
                legend: { position: 'bottom' }
            };
            var chart = new google.visualization.LineChart(document.getElementById('linechart'));
            chart.draw(data, options);
        }
    </script>

{{--This button should be updated after the create sale page has been finished--}}
<a href="/Sales/create"><input type="button" value="Record Sale" class="btn btn-primary"> </a>

@if(count($sales)>0)
        <table class="table-bordered" id="dataTable" width="100%" cellspacing="0">
            <th>Sale No.</th>
            <th>Quantity</th>
            <th>Sale Type</th>
            <th>Client Name</th>
            <th>Edit</th>

            @foreach($sales as $sale)
            <tr>
                <td>{{$sale->id}}</td>
                <td>{{$sale->quantity}}</td>
                <td>{{$sale->salesType}}</td>
                <td>{{$sale->clientName}}</td>
                <td>{{$sale->created_at}}</td>
                <td>{{$sale->updated_at}}</td>
                {{--Be careful at this point. Pick up from here--}}
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
