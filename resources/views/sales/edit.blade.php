<!--This create blade is for recording the actual sale made-->
@extends('layouts.app')
@section('header')

@endsection
@section('content')
    {!! Form::open(['action'=>['SalesController@update', $sales->id],'method'=>'POST']) !!}
    {{--    <div class="form-group">--}}
    {{--        <!--This is for the name of the product being sold-->--}}
    {{--        {{form::label()}}--}}

    {{--    </div>--}}


    <div class="form-group">
        <!--This is for the category of products being sold-->
        {{form::label('product_id', 'product_id')}}
        {{form::select('product_id',$product,null,['class' =>'form-control','placeholder'=>'Pick a product...'])}}
    </div>


    <div class="form-group">
        <!--This is for the number of products being sold-->
        {{form::label('quantity','quantity')}}
        {{form::Number('quantity',$sales->quantity,['class' =>'form-control','placeholder'=>'quantity'])}}
    </div>


    <div class="form-group">
        <!--This is for the type of sale in question. Whether cash or credit-->

        {{form::label('Sales Type', 'Sales Type')}}
        {{form::select('salesType',[1=>'Cash/Cheque', 2=>'Credit'],null,['class'=>'form-control','placeholder'=>'Pick a sale type'])}}

    </div>
    {{Form::submit('Update Sale',['class'=>'btn btn-primary'])}}

    {!! Form::close() !!}

    <a href="/home" class="btn btn-default">Back</a>
@endsection
