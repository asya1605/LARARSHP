@extends('layouts.main')
@section('title', 'Dashboard Perawat')

@section('content')
<div class="container" style="text-align:center; padding: 3rem;">
  <h2>💉 Dashboard Perawat RSHP</h2>
  <p>Halo, {{ session('email') }}!</p>
  <p>Anda login sebagai <strong>Perawat</strong>.</p>
  <a href="{{ route('logout') }}" class="btn btn-danger">Logout</a>
</div>
@endsection
