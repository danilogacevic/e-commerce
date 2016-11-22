@extends('layouts.admin')

@section('fonts')

<link href="../../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

@stop

@section('content')

<table class="table">
    <thead>
      <tr>
        <th>Id</th>
        <th>Product Id</th>
        <th>Order Id</th>
        <th>Price</th>
        <th>Product title</th>
        <th>Product quantity</th>
      </tr>
    </thead>
    <tbody>

@foreach($reports as $report)

      <tr>
        <td>{{$report->id}}</td>
        <td>{{$report->product_id}}</td>
        <td>{{$report->order_id}}</td>
        <td>{{$report->product_price}}</td>
        <td>{{$report->product_title}}</td>
        <td>{{$report->product_quantity}}</td>
        <td>
          
           {!! Form::model($report,['method'=>'DELETE','action'=>['AdminReportsController@destroy',$report->id],'files'=>'true']) !!}
            
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