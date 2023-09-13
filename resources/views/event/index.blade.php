@extends('layouts.app')
@section('title', $viewData["title"])
@section('subtitle', $viewData["subtitle"])
@section('content')
<div class="row">
  @foreach ($viewData["events"] as $event)
    <div class="col-md-4 col-lg-3 mb-2">
      <div class="card">
        <div class="card-body text-center">
            <h1>{{$event->getTitle()}} </h1>
          <!-- <a href="{{ route('event.show', ['id'=> $product->getId()]) }}"
            class="btn bg-primary text-white">{{ $event->getTitle() }}</a> -->
        </div>
      </div>
    </div>
  @endforeach
</div>
@endsection
