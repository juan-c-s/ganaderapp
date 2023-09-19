@extends('layouts.app')
@section('title', $viewData["title"])
@section('subtitle', $viewData["subtitle"])
@section('content')
<div class="card mb-3">
  <div class="row g-0">
    <div class="col-md-4">
      
    </div>
    <div class="col-md-8">
        <div class="card-body">
          <h5 class="card-title">
            {{ $viewData["products"]->getTitle() }}
          </h5>
          <p class="card-text"> Description: {{ $viewData["products"]->getDescription() }}</p>
        </div>
        <div class="card-body">
          <h5 class="card-title">
           price :  {{ $viewData["products"]->getPrice()}}
          </h5>
          <h5 class="card-title">
           Seller's rating :  {{ $viewData["products"]->getRating()}}
          </h5>
          <h5 class="card-title">
           Breed :  {{ $viewData["products"]->getCategory() }}
          </h5>
          <h5 class="card-title">
            Supplier :  {{ $viewData["products"]->getSupplier() }}
          </h5>
          <h5 class="card-title">
            Image: <img  src={{$viewData["products"]->getImage()}}>
        </h5>
        <form method="POST" action="{{ route('product.delete') }}">
        @csrf
        <input type="hidden" name="id" value="{{$viewData["products"]->getId()}}" />
        <input type="submit" class="btn btn-primary" value="delete" />
        </form>

  </div>
    </div>
  </div>
</div>
@endsection
