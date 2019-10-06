@extends('layouts.app')
@section('header')

@endsection
@section('content') 
{!! Form::open(['action'=>['CategoryController@update',$category->id],'method'=>'POST']) !!}
    <div class="form-group">
        {{form::label('Categoryname', 'Categoryname')}}
        {{form::Text('Categoryname',$category->Categoryname,['class' =>'form-control','placeholder'=>'Categoryname'])}}
    </div>
    
        {{Form::hidden('_method','PUT')}}
        {{Form::submit('Update Category',['class'=>'btn btn-primary'])}}
            
{!! Form::close() !!}

                <a href="/home" class="btn btn-pdefault">Home</a>
@endsection
