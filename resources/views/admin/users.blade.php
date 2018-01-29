@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row mt-5">
      <div class="col-md-10 offset-md-1">
         <div class="card">
            <div class="card-header">Dashboard for {{ Auth::user()->firstName }} {{ Auth::user()->lastName }}</div>

            <div class="card-body">
               <h1>{{ $user->firstName }}</h1>
            </div>

         </div>
      </div>
   </div>
</div>
@endsection