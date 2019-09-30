@extends('layouts.app')
@section('header')

@endsection
@section('content')
<a href="/Category/create">update stock</a>
@if(count($category)>0)
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <th>Categoryname</th>
                    <th>Date updated</th>
                    <th>Edit</th>
                
                    @foreach ($category as $category)
                    <tr> 
                    <td>{{$category->Categoryname}}</td>
                    <td>{{$category->updated_at}}</td>
                    <td><a href="/Category/{{$category->id}}/edit" class="btn btn-default">Edit</a></td>
                    <td> {!!Form::open(['action'=>['CategoryController@destroy',$category->id],'method'=>'POST','class'=>'pull-right'])!!}
                           {{Form::hidden('_method','DELETE')}}
                           {{Form::Submit('Delete',['class'=>'btn btn-danger'])}}
                        {!!Form::close()!!}</td>
                    </tr>
                        
                    @endforeach
                </table>
                @endif

                <a href="/home" class="btn btn-default">Back</a>
            
@endsection
