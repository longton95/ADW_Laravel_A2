@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row mt-5">
      <div class="col-md-10 offset-md-1">
         <div class="card">
            <div class="card-header">Admin Portal for {{ Auth::user()->firstName }} {{ Auth::user()->lastName }}</div>

            <div class="card-body">

               <p>Users</p>
               <table class="table">
                   <thead>
                   <tr>
                       <th>Id</th>
                       <th>Firstname</th>
                       <th>Lastname</th>
                       <th>Email</th>
                       <th>Role</th>
                       <th></th>
                       <th></th>
                   </tr>
                   </thead>
                   <tbody>
                     @foreach ($users as $user)
                   <tr>
                       <td>{{ $user->id }}</td>
                       <td>{{ $user->firstName }}</td>
                       <td>{{ $user->lastName }}</td>
                       <td>{{ $user->email }}</td>
                       <td>{{ $user->role }}</td>
                       <td><a href="/admin/{{$user->id}}">Show</a></td>
                       <td><a href="/admin/delete/{{$user->id}}">Delete</a></td>
                   </tr>
                      @endforeach
                   </tbody>
               </table>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection