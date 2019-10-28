@extends('layouts.app')
@section('header')

@endsection
@section('content')
{!! Form::open(['action'=>['PaymentController@update',$payments->id],'method'=>'POST']) !!}
    <div class="form-group">
        {{form::label('Payment Type', 'Payment Type')}}
        {{form::Text('Payment',$payments->Payment,['class' =>'form-control','placeholder'=>'Payment Type'])}}
    </div>

        {{Form::hidden('_method','PUT')}}
        {{Form::submit('Update Payment Type',['class'=>'btn btn-primary'])}}

{!! Form::close() !!}

                <a href="/home" class="btn btn-prim">Back</a>
@endsection
