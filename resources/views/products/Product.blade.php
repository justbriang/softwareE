@extends('layouts.app')
@section('header')

@endsection
@section('content')
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        var visitor = <?php echo $visitor; ?>;
        console.log(visitor);
        google.charts.load('current', {'packages':['bar']});
        google.charts.setOnLoadCallback(drawChart);
        function drawChart() {
            var data = google.visualization.arrayToDataTable(visitor);
            var options = {
                chart:{
                title: 'Bar Graph Showing the stock available ',},
                // curveType: 'function',
                // legend: { position: 'bottom' }
                bars:'vertical'
            };
            var chart = new google.charts.Bar(document.getElementById('linechart'));
            chart.draw(data, options);
        }
    </script>



    <a href="/Product/create"> <input type="button" value="Update Stock" class="btn btn-primary"></a>
<br><br>
@if(count($product)>0)
                <table class="table table-dark" id="dataTable" width="100%" cellspacing="0">
                    <th>Product Name</th>
                    <th>Product Description</th>
                    <th>Category</th>
                    <th>Price</th>

                    <th>Quantity</th>
                    <th>Date updated</th>


                    @foreach ($product as $product)
                    <tr>
                    <td>{{$product->Productname}}</td>
                    <td>{{$product->Description}}</td>
                    <td>{{$categories[$product->category_id]}}</td>
                    <td>{{$product->Price}}</td>
                    <td>{{$product->Quantity}}</td>
                     <td>{{$product->updated_at}}</td>
                        <td><a href="/Product/{{$product->id}}/edit" class="btn btn-info">Edit</a></td>
                       <td>{!!Form::open(['action'=>['ProductController@destroy',$product->id],'method'=>'POST','class'=>'pull-right'])!!}
                           {{Form::hidden('_method','DELETE')}}
                           {{Form::Submit('Delete',['class'=>'btn btn-danger'])}}
                           {!!Form::close()!!}</td>
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
