@extends('layouts.app')
@section('header')

@endsection
@section('content')
{!! Form::open(['action'=>['ProductController@update',$product->id],'method'=>'POST']) !!}
    <div class="form-group">
        {{form::label('Productname', 'Productname')}}
        {{form::Text('Productname',$product->Productname,['class' =>'form-control','placeholder'=>'Productname'])}}
    </div>
    <div class="form-group">
            {{form::label('Description', 'Description')}}
            {{form::Textarea('Description',$product->Description,['class' =>'form-control','placeholder'=>'Description'])}}
        </div>
    <div class="form-group">
                {{form::label('category_id', 'category_id')}}
        {{form::select('category_id',$categories,null,['class' =>'form-control','placeholder'=>'Pick a category...'])}}
            </div>
    <div class="form-group">
                {{form::label('Quantity', 'Quantity')}}
                {{form::Number('Quantity',$product->Quantity,['class' =>'form-control','placeholder'=>'Quantity'])}}
            </div>
    <div class="form-group">
                    {{form::label('Price', 'Price')}}
                    {{form::number('Price',$product->Price,['class' =>'form-control','placeholder'=>'Price'])}}
        </div>
        {{Form::hidden('_method','PUT')}}
        {{Form::submit('Update stock',['class'=>'btn btn-primary'])}}

{!! Form::close() !!}

                <a href="/home" class="btn btn-default">Back</a>
@endsection
