@extends('layouts.app')
@section('header')

@endsection
@section('content')
    {!! Form::open(['action'=>['PurchasesController@update', $purchases->id],'method'=>'POST']) !!}


    <div class="form-group">
       
        {{form::label('product_id', 'product_id')}}
        {{form::select('product_id',$purchases,null,['class' =>'form-control','placeholder'=>'Pick a product...'])}}
    </div>


    <div class="form-group">
        {{form::label('quantity','quantity')}}
        {{form::Number('quantity',$purchases->quantity,['class' =>'form-control','placeholder'=>'quantity'])}}
    </div>
    {{Form::submit('Update Purchase',['class'=>'btn btn-primary'])}}

    {!! Form::close() !!}

    <a href="/home" class="btn btn-default">Back</a>
@endsection
