@extends('layouts.app')
@section('header')

@endsection
@section('content')
<a href="/Payments/create" class="btn btn-primary">Create Payment Type</a>
<br><br>


@if(count($payment)>0)
                <table class="table table-dark" id="dataTable" width="100%" cellspacing="0">
                    <th>Payment Type</th>
                    <th>Date updated</th>
                    

                    @foreach ($payment as $payment)
                    <tr>
                    <td>{{$payment->Payment}}</td>
                    <td>{{$payment->updated_at}}</td>
                    <td><a href="/Payments/{{$payment->id}}/edit" class="btn btn-info">Edit</a></td>
                    <td> {!!Form::open(['action'=>['PaymentController@destroy',$payment->id],'method'=>'POST','class'=>'pull-right'])!!}
                           {{Form::hidden('_method','DELETE')}}
                           {{Form::Submit('Delete',['class'=>'btn btn-danger'])}}
                        {!!Form::close()!!}</td>
                    </tr>

                    @endforeach
                </table>
                @endif

                <a href="/home" class="btn btn-primary">Back</a>

@endsection
