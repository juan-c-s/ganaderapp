@extends('layouts.app')
@section('title', $viewData["title"])
@section('subtitle', $viewData["subtitle"])
@section('content')
<script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
<script src="{{asset('js/event/filterByDate.js')}}"></script>
<label for="date">Filter by date:</label>
<input type="date" id="date">
<div id='results' class="row">
  @foreach ($viewData["events"] as $event)
    <div class="col-md-4 col-lg-3 mb-2">
      <div class="card">
        <div class="card-body text-center">
          <img src="{{$event->getImage()}}" class="img-fluid img-thumbnail" alt="event_image">
          <h2>{{$event->getTitle()}}</h2>
          <p>{{$event->getDescription()}}</p>
          <p>{{$event->getDate()}}</p>
        </div>
      </div>
    </div>
  @endforeach
</div>
<div id="events" style="display: none;">'@json($viewData["events"])'</div>
@endsection
