@extends('layouts.app')
@section('header')

@endsection
@section('content')
{!! Form::open(['action'=>'ProductController@store','method'=>'POST']) !!}
    <div class="form-group">
        {{form::label('Productname', 'Productname')}}
        {{form::Text('Productname','',['class' =>'form-control','placeholder'=>'Productname'])}}
    </div>
    <div class="form-group">
            {{form::label('Description', 'Description')}}
            {{form::Textarea('Description','',['class' =>'form-control','placeholder'=>'Description'])}}
        </div>
    <div class="form-group">
                {{form::label('Categoryid', 'Categoryid')}}
                {{form::select('Categoryid',[1=>'lipstick',2=>'Babydiaper',3=>'Adultdiaper',4=>'moisturiser'],null,['class' =>'form-control','placeholder'=>'Pick a category...'])}}
            </div>
    <div class="form-group">
                {{form::label('Quantity', 'Quantity')}}
                {{form::Number('Quantity','',['class' =>'form-control','placeholder'=>'Quantity'])}}
            </div>
    <div class="form-group">
                    {{form::label('Price', 'Price')}}
                    {{form::number('Price','',['class' =>'form-control','placeholder'=>'Price'])}}
        </div>
        {{Form::submit('Update stock',['class'=>'btn btn-primary'])}}
            
{!! Form::close() !!}

                <a href="/home" class="btn btn-default">Back</a>
@endsection
