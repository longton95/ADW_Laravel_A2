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
                       <form class="form-horizontal" method="POST" action="/wallet/{{ $wallet->id }}">
                          {{method_field('PATCH')}}
                           {{ csrf_field() }}

                           <div class="form-group row">
                              <label for="name" class="col-lg-4 col-form-label text-lg-right">Name</label>

                              <div class="col-lg-6">
                                  <input
                                           id="name"
                                           type="text"
                                           step="any"
                                           min="0"
                                           class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                           name="name"
                                           value="{{ $wallet->name }}"
                                           required
                                           autofocus
                                  >

                                  @if ($errors->has('name'))
                                       <div class="invalid-feedback">
                                           <strong>{{ $errors->first('name') }}</strong>
                                       </div>
                                  @endif
                              </div>
                           </div>

                           <div class="form-group row">
                              <label for="bitcoin" class="col-lg-4 col-form-label text-lg-right">Bitcoin</label>

                              <div class="col-lg-6">
                                  <input
                                           id="bitcoin"
                                           type="number"
                                           step="any"
                                           min="0"
                                           class="form-control{{ $errors->has('bitcoin') ? ' is-invalid' : '' }}"
                                           name="bitcoin"
                                           value="{{ $wallet->bitcoin }}"
                                           required
                                           autofocus
                                  >

                                  @if ($errors->has('bitcoin'))
                                       <div class="invalid-feedback">
                                           <strong>{{ $errors->first('bitcoin') }}</strong>
                                       </div>
                                  @endif
                              </div>
                           </div>

                           <div class="form-group row">
                              <label for="etherium" class="col-lg-4 col-form-label text-lg-right">Etherium</label>

                              <div class="col-lg-6">
                                  <input
                                           id="etherium"
                                           type="number"
                                           step="any"
                                           min="0"
                                           class="form-control{{ $errors->has('etherium') ? ' is-invalid' : '' }}"
                                           name="etherium"
                                           value="{{ $wallet->etherium }}"
                                           required
                                           autofocus
                                  >

                                  @if ($errors->has('etherium'))
                                       <div class="invalid-feedback">
                                           <strong>{{ $errors->first('etherium') }}</strong>
                                       </div>
                                  @endif
                              </div>
                           </div>

                           <div class="form-group row">
                              <label for="litcoin" class="col-lg-4 col-form-label text-lg-right">Litecoin</label>

                              <div class="col-lg-6">
                                  <input
                                           id="litcoin"
                                           type="number"
                                           step="any"
                                           min="0"
                                           class="form-control{{ $errors->has('litcoin') ? ' is-invalid' : '' }}"
                                           name="litcoin"
                                           value="{{ $wallet->litcoin }}"
                                           required
                                           autofocus
                                  >

                                  @if ($errors->has('litcoin'))
                                       <div class="invalid-feedback">
                                           <strong>{{ $errors->first('litcoin') }}</strong>
                                       </div>
                                  @endif
                              </div>
                           </div>

                           <div class="form-group row">
                              <div class="col-lg-8 offset-lg-4">
                                  <button type="submit" class="btn btn-primary">
                                       Submit
                                  </button>
                              </div>
                           </div>
                       </form>

                     </div>
                     @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
