@extends('layouts.app')
@section('title', $viewData["title"])
@section('subtitle', $viewData["subtitle"])
@section('content')
<div class="card mb-3">
  <div class="row g-0">
    <div class="col-md-4">
      <img src="https://laravel.com/img/logotype.min.svg" class="img-fluid rounded-start">
    </div>
    <div class="col-md-8">
        <div class="card-body">
          <h5 class="card-title">
            {{ $viewData["product"]["title"] }}
          </h5>
          <p class="card-text"> Description: {{ $viewData["product"]["description"] }}</p>
        </div>
        <div class="card-body">
          <h5 class="card-title">
           price :  {{ $viewData["product"]["price"] }}
          </h5>
          <h5 class="card-title">
           Seller's rating :  {{ $viewData["product"]["rating"] }}
          </h5>
          <h5 class="card-title">
           Breed :  {{ $viewData["product"]["category"] }}
          </h5>
          <h5 class="card-title">
            Supplier :  {{ $viewData["product"]["supplier"] }}
          </h5>
          <h5 class="card-title">
            Image: <img  src={{$viewData["product"]["image"]}}>
        </h5>
  </div>
    </div>
  </div>
</div>
@endsection
