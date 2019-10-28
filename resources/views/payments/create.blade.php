@extends('layouts.app')
@section('header')

@endsection
@section('content')
{!! Form::open(['action'=>'PaymentController@store','method'=>'POST']) !!}
<div class="form-group">
        {{form::label('Payment Type', 'Payment Type')}}
        {{form::Text('Payment','',['class' =>'form-control','placeholder'=>'Payment Type'])}}
    </div>
    
        {{Form::submit('Update Payment Type',['class'=>'btn btn-primary'])}}
            
{!! Form::close() !!}

             
@endsection
