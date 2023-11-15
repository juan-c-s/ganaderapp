{{-- DONOVAN --}}

@extends('layouts.app')
@section('title', $viewData["title"])
@section('subtitle', $viewData["subtitle"])
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
<script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
<script src="{{asset('js/event/filterByDate.js')}}"></script>
<div>
  <input type="date" id="date" placeholder="Search it by date">
</div>
<div id='results' class="row">
  @foreach ($viewData["events"] as $event)
    <div class="col-md-4 col-lg-3 mb-2">
      <div class="card">
        <div class="card-body text-center">
          <img src="{{$event->getImage()}}" class="img-fluid img-thumbnail" alt="event_image">
          <h2>{{$event->getTitle()}}</h2>
          <h3>{{$event->getLocation()}}</h3>
          <p>{{$event->getDescription()}}</p>
          <p>{{$event->getDate()}}</p>
          <p>{{__('Current Weather')}} {{$event->getWeather()}}°C</p>
        </div>
      </div>
    </div>
  @endforeach
</div>
<div id="events" style="display: none;">'@json($viewData["events"])'</div>
@endsection
