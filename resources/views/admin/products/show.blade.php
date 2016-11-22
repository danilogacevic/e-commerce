@extends('layouts.admin')

@section('fonts')

<link href="../../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

@stop

@section('content')

<table class="table table-hover">
    <thead>
      <tr>
        <th>Id</th>
        <th>Title</th>
        <th>Status</th>
        <th>Category</th>
        <th>Price</th>
        <th>Quantity</th>
      </tr>
    </thead>
    <tbody>

@foreach ($products as $product)

      <tr>
        <td>{{$product->id}}</td>
        <td>{{$product->product_title}}<br>
          <a href="{{route('products.edit',$product->id)}}"><img width='100' height='50' src="{{$product->photos()->orderBy('id','desc')->first()->name}}" alt=""></a>
        </td>

        @if($product->is_active == 1)
            <td>Published</td>
        @else
            <td>Draft</td>
        @endif
        
        <td>{{$product->category->cat_title}}</td>
        <td>{{$product->product_price}}</td>
        <td>{{$product->product_quantity}}</td>
        <td>

          {!! Form::model($product,['method'=>'DELETE','action'=>['AdminProductsController@destroy',$product->id],'files'=>'true']) !!}
            
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