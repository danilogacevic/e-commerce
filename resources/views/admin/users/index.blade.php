@extends('layouts.admin')

@section('fonts')

<link href="../../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

@stop

@section('content')



  <p class="bg-danger text-center"></p>



<h1 class="">Users</h1>

<table class="table">
    <thead>
      <tr>
        <th>Id</th>
        <th>Photo</th>
        <th>Name</th>
        <th>Email</th>
        <th>Role</th>
        <th>Status</th>
        <th>Created</th>
        <th>Updated</th>
      </tr>
    </thead>

    <tbody>
      

    @foreach($users as $user)

        	<tr>
                <td>{{$user->id}}</td>
                <td><img src="{{$user->gravatar}}" alt="" height="50"></td>
                <td><a href="{{route('users.edit',$user->id)}}">{{$user->name}}</a></td>
                <td>{{$user->email}}</td>
                <td>{{$user->role_id}}</td>
                <td>{{$user->is_active}}</td>
                <td>{{$user->created_at->diffForHumans()}}</td>
                <td>{{$user->updated_at->diffForHumans()}}</td>
            </tr>
    
    @endforeach

    </tbody>

</table>


@stop