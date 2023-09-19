@extends('layouts.app')
@section('title', $viewData["title"])
@section('subtitle', $viewData["subtitle"])
@section('content')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="{{asset('js/event/filterByDate.js')}}"></script>
<label for="date">Filter by date:</label>
<input type="date" id="date">
<div id='results' class="row">
  @foreach ($viewData["events"] as $event)
    <div class="col-md-4 col-lg-3 mb-2">
      <div class="card">
        <div class="card-body text-center">
          <h2>{{$event->getTitle()}}</h2>
          <img src="{{$event->getImage()}}" class="img-fluid img-thumbnail" alt="event_image">
          <p>{{$event->getDescription()}}</p>
          <p>{{$event->getDate()}}</p>
        </div>
      </div>
    </div>
  @endforeach
</div>
<div id="csrf-token" data-token="{{ csrf_token() }}"></div>
<div id="events" style="display: none;">'@json($viewData["events"])'</div>
@endsection
