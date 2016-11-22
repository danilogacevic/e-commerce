@extends('layouts.admin')

@section('content')

<h1>Edit User</h1>

<div class="row">
		<div class="col-sm-3">
			
			<img src="{{$user->photo ? $user->gravatar : 'http://placehold.it/400x400'}}" alt="" class="img-responsive img-rounded">


		</div>


		<div class="col-sm-9">

					{!! Form::model($user,['method'=>'PATCH','action'=>['AdminUsersController@update',$user->id],'files'=>'true']) !!}

					<div class="form-group">
						
						{!! Form::label('name','Name:') !!}
						{!! Form::text('name',null,['class'=>'form-control'])!!}
					</div>

					<div class="form-group">
						
						{!! Form::label('email','Email:') !!}
						{!! Form::email('email',null,['class'=>'form-control'])!!}
					</div>

					<div class="form-group">
						
						{!! Form::label('role_id','Role:') !!}
						{!! Form::select('role_id',[''=>'Choose options'] + $roles,null,['class'=>'form-control'])!!}

					</div>

					<div class="form-group">
						
						{!! Form::label('is_active','Status:') !!}
						{!! Form::select('is_active',array(1=>'Active',0=>'Not active'),null,['class'=>'form-control'])!!}

					</div>

					<div class="form-group">
						
						{!! Form::label('photo_id','Upload Image:') !!}
						{!! Form::file('photo_id',null,['class'=>'form-control'])!!}

					</div>

					<div class="form-group">
						
						{!! Form::label('password','Password:') !!}
						{!! Form::password('password',['class'=>'form-control'])!!}

					</div>

					<div class="form-group">
						
						{!! Form::submit('Update user',['class'=>'btn btn-primary col-sm-3'])!!}
					</div>

						{!! Form::close() !!}




					{!! Form::model($user,['method'=>'DELETE','action'=>['AdminUsersController@destroy',$user->id],'files'=>'true']) !!}


						<div class="form-group">
							
							{!! Form::submit('Delete user',['class'=>'btn btn-danger col-sm-3 col-sm-offset-6'])!!}
						</div>

					{!! Form::close() !!}



			</div>
	</div>

	<div class="row">
		
		@include('includes.form_error')

	</div>




@stop


