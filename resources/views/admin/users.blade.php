@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mt-5">
        <div class="col-md-10 offset-md-1">
           @if ($wallets)
            <div class="card">
                <div class="card-header">Wallets for {{ $user->firstName }} {{ $user->lastName }}
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
                          <h3>{{ $wallet->name }}</h3>
                          <table class="table">
                              <thead>
                              <tr>
                                  <th>Bitcoin</th>
                                  <th>Etherium</th>
                                  <th>Litecoin</th>
                              </tr>
                              </thead>
                              <tbody>
                              <tr>
                                  <td>{{ $wallet->bitcoin }}</td>
                                  <td>{{ $wallet->etherium }}</td>
                                  <td>{{ $wallet->litcoin }}</td>
                              </tr>
                              </tbody>
                          </table>

                       </div>

                       @endforeach
                     </div>

                    @endif
                    @if (!$wallets)
                    <div class="card">
                        <div class="card-header">Dashboard for {{ $user->firstName }} {{ $user->lastName }}</div>

                        <div class="card-body">

                    They have no Wallets
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
