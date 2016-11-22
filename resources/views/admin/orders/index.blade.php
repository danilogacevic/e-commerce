@extends('layouts.admin')

@section('fonts')

<link href="../../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

@stop

@section('content')

<table class="table">
    <thead>
      <tr>
        <th>Id</th>
        <th>Amount</th>
        <th>Transaction</th>
        <th>Currency</th>
        <th>Status</th>
      </tr>
    </thead>
    <tbody>

    @foreach($orders as $order)

          <tr>
            <td>{{$order->id}}</td>
            <td>{{$order->order_amount}}</td>
            <td>{{$order->order_transaction}}</td>
            <td>{{$order->order_currency}}</td>
            <td>{{$order->order_status}}</td>
            <td>

                {!! Form::model($order,['method'=>'DELETE','action'=>['AdminOrdersController@destroy',$order->id],'files'=>'true']) !!}
                
                  <div class="form-group">
                    
                    {!!Form::button('<span class="glyphicon glyphicon-remove"></span>', ['type' => 'submit', 'class' => 'btn btn-danger'])!!}

                  </div>
                
                {!! Form::close() !!}

            </td>

          </tr>

    @endforeach
     
    </tbody>
</table>

@stop

