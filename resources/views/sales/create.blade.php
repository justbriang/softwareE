<!--This create blade is for recording the actual sale made-->
@extends('layouts.app')
@section('header')

@endsection
@section('content')
{!! Form::open(['action'=>'SalesController@store', 'method'=>'POST']) !!}



    <div class="form-group">
        <!--This is for the category of products being sold-->
        {{form::label('Product Name', 'Product Name')}}
        {{form::select('product_id',$product,null,['class' =>'form-control','placeholder'=>'Pick a product...'])}}
    </div>


    <div class="form-group">
        <!--This is for the number of products being sold-->
        {{form::label('quantity','quantity')}}
        {{form::Number('quantity','',['class' =>'form-control','placeholder'=>'quantity'])}}
    </div>


    <div class="form-group">
        <!--This is for the type of sale in question. Whether cash or credit-->

            {{form::label('Sales Type', 'Sales Type')}}
            {{form::select('salesType',$payments,null,['class'=>'form-control','placeholder'=>'Pick a sale type'])}}

    </div>
{{Form::submit('Create Sale',['class'=>'btn btn-primary'])}}

{!! Form::close() !!}

<a href="/home" class="btn btn-default">Back</a>
@endsection
