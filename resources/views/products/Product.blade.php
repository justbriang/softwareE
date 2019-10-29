@extends('layouts.app')
@section('header')

@endsection
@section('content')
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
                @endif

                <a href="/home" class="btn btn-default"><input type="button" value="Back" class="btn btn-primary"></a>

@endsection
