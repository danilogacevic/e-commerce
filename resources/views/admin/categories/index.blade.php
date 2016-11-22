@extends('layouts.admin')

@section('fonts')

<link href="../../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

@stop


@section('content')

<div class="row">

<div class="col-sm-3">

	{!! Form::open(['method'=>'POST','action'=>'AdminCategoriesController@store','files'=>'true']) !!}
	
	<div class="form-group">
		
		{!! Form::label('cat_title','Name:') !!}
		{!! Form::text('cat_title',null,['class'=>'form-control'])!!}

	</div>
	
	<div class="form-group">
		
		{!! Form::submit('Add Categorie',['class'=>'btn btn-primary'])!!}

	</div>
	
		{!! Form::close() !!}
	
</div>

	<div class="col-sm-6 col-sm-offset-3">

			<table class="table">
			    <thead>
			      <tr>
			      	<th>Id</th>
			        <th>Name</th>
			       
			      </tr>
			    </thead>
			    
			    <tbody>

				@foreach($categories as $categorie)

						      <tr>
						        <td>{{$categorie->id}}</td>
						        <th><a href="{{route('categories.update',$categorie->id)}}">{{$categorie->cat_title}}</a></th>

						            <td>

							          {!! Form::model($categorie,['method'=>'DELETE','action'=>['AdminCategoriesController@destroy',$categorie->id],'files'=>'true']) !!}
							            
							              <div class="form-group">
							                
							                {!!Form::button('<span class="glyphicon glyphicon-remove"></span>', ['type' => 'submit', 'class' => 'btn btn-danger'])!!}

							              </div>
							            
							          {!! Form::close() !!}

									</td>
							  </tr>

				@endforeach
			     
			    </tbody>
		    </table>

	</div>
	
	
</div>


@stop