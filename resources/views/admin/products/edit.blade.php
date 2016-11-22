@extends('layouts.admin')

@section('fonts')

<link href="../../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

@stop

@section('content')

<div class="col-md-12">


{!! Form::model($product,['method'=>'PATCH','action'=>['AdminProductsController@update',$product->id],'files'=>'true']) !!}


{{ csrf_field() }}

<div class="col-md-8">

    <div class="form-group">

        {!! Form::label('product_title','Product Title') !!}
        {!! Form::text('product_title',null,['class'=>'form-control'])!!}
       
    </div>


    <div class="form-group">

        {!! Form::label('product_description','Product Description') !!}
        {!! Form::textarea('product_description',null,['class'=>'form-control'])!!}

    </div>



    <div class="form-group row">

      <div class="col-xs-3">

        {!! Form::label('product_price','Product Price') !!}
        {!! Form::number('product_price',null,['class'=>'form-control'])!!}

      </div>

    </div>



    <div class="form-group">

        {!! Form::label('short_description','Product Short Description') !!}
        {!! Form::textarea('short_description',null,['class'=>'form-control','rows'=>3])!!}

    </div>




</div><!--Main Content-->


<!-- SIDEBAR-->


<aside id="admin_sidebar" class="col-md-4">

    <div class="row">

             <!-- Product Categories-->

            <div class="form-group">
               
                {!! Form::label('category_id','Category:') !!}
                {!! Form::select('category_id',[''=>'Select Category'] + $categories,null,['class'=>'form-control'])!!}

            </div>

            <!-- Product Brands-->


            <div class="form-group">
          
                {!! Form::label('product_quantity','Product Quantity') !!}
                {!! Form::number('product_quantity',null,['class'=>'form-control'])!!}

            </div>

            <!-- Product Status-->

            <div class="form-group">
               
                {!! Form::label('is_active','Status:') !!}
                {!! Form::select('is_active',[''=>'Status', 1 =>'Publish',0 => 'Draft'],null,['class'=>'form-control'])!!}

            </div>

            <div class="form-group">
              
                {!! Form::submit('Publish',['class'=>'btn btn-primary btn-lg col-sm-4 col-sm-offset-4'])!!}

            </div>

            
 </div>
{!! Form::close() !!}

</aside><!--SIDEBAR-->


 

</div>

<div class="col-md-12">

    
    @include('includes.form_error')
    

</div>

@stop





