@extends('layouts.app')
@section('header')

@endsection
@section('content')
{!! Form::open(['action'=>'CategoryController@store','method'=>'POST']) !!}
<div class="form-group">
        {{form::label('Categoryname', 'Categoryname')}}
        {{form::Text('Categoryname','',['class' =>'form-control','placeholder'=>'Categoryname'])}}
    </div>
    
        {{Form::submit('Update Category',['class'=>'btn btn-primary'])}}
            
{!! Form::close() !!}

             
@endsection
