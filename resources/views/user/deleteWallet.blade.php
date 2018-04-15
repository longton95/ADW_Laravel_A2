@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mt-5">
        <div class="col-md-10 offset-md-1">
            <div class="card">
               <div class="card-header">Dashboard for {{ Auth::user()->firstName }} {{ Auth::user()->lastName }} <span class="float-right">
                  <a href="/createWallet">Create</a>
                   /
                  <a href="/editWallet">Edit</a>
                  /
                 <a href="/deleteWallet">Delete</a>
               </span>
               </div>
                <div class="card-body">


                    <ul class="nav nav-tabs" id="nav-tab" role="tablist">
                    @foreach ($wallets as $wallet)

                      <li class="nav-item">
                        <a class="nav-link "  id="nav-{{ $wallet->id }}-tab" data-toggle="tab" href="#{{ $wallet->id }}" role="tab" aria-controls="nav-{{ $wallet->name }}" aria-selected="true" >{{ $wallet->name }}</a>
                      </li>

                      @endforeach
                      </ul>


                      <div class="tab-content" id="nav-tabContent">

                      @foreach ($wallets as $wallet)
                       <div class="tab-pane fade" id="{{ $wallet->id }}" role="tabpanel" aria-labelledby="{{ $wallet->name }}-tab">
                       </br>
                       <a class="btn btn-danger btn-lg btn-block" href="/wallet/delete/{{$wallet->id}}">DELETE</a>
                     </div>
                     @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
