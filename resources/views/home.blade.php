@extends('layouts.app')

@section('content')
@if ($errors->has('noAdmin'))
<div class="alert alert-danger">
   User <strong>{{ Auth::user()->firstName }} {{ Auth::user()->lastName }}</strong> is not an admin
</div>
@endif
<div class="row">
   <div class="col">
      <canvas id="bitcoinChart" height="100"></canvas>
   </div>
</div>
<div class="row">
   <div class="col">
      <canvas id="etheriumChart"></canvas>
   </div>
   <div class="col">
      <canvas id="litecoinChart"></canvas>
   </div>
</div>
@endsection
@section('javascript')
<script src="{{ asset('js/charts.js') }}"></script>
@endsection