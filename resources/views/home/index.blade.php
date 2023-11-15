{{-- JUANCAMILO --}}
@extends('layouts.app')
@section('title', 'Home Page - Online Store')
@section('content')
@if(session()->has('success_msg'))
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session()->get('success_msg') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
@endif
@if(session()->has('alert_msg'))
  <div class="alert alert-warning alert-dismissible fade show" role="alert">
    {{ session()->get('alert_msg') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
@endif
<div class="logo">
  <img style="width: 30%; height: 30%;" src="https://github.com/sbetancurb/imagenes/blob/main/_caa92333-94e1-4fc7-9aa0-950d07717d50.jpeg?raw=true">
</div>
  <br>
<div class="desc">
  <p class="text-white">
    {{__('Project Description')}}
  </p>
</div>

@endsection
