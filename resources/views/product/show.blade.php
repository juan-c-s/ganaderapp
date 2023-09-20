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
            Image: <img src="{{$viewData["products"]->getImage()}}" class="img-fluid img-thumbnail">
        </h5>
        @if ((Auth::user() && Auth::user()->getRole() == 'admin') || (Auth::user()->getId() == $viewData["products"]->getUserId())) 
          <form class="m-2" method="GET" action="{{ route('product.update', ['id'=> $viewData["products"]->getId()]) }}">
          @csrf
          <input type="hidden" name="id" value="{{$viewData["products"]->getId()}}" />
          <input type="submit" class="btn btn-dark" value="delete" />
          </form>
        @endif

        @if(count($viewData["reviews"])>0)
        <div class="card mt-4">
          <div class="card-body">
            <h5 class="card-title">Reviews</h5>
            @foreach( $viewData["reviews"] as $review)
            <div class="mb-3">
                <h6 class="card-subtitle mb-2 text-muted">Rating: <span id="rating">{{$review->rating}}</span>/5</h6>
                <p class="card-text">{{$review->comment}}</p>
            </div>
            @endforeach
          </div>
        </div>
          
        @endif
        @if($errors->any())
          <ul id="errors" class="alert alert-danger list-unstyled">
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
          </ul>
        @endif
        <form method ="POST" action="{{route('review.save')}}" class="pt-4">
          @csrf
            <label for="comment">Comment</label>
            <textarea class="form-control m-2" name="comment" rows="3"></textarea>
            <label for="rating" >Rating</label>
            <input type="number" name="rating" class="form-control w-25 m-2"/>
            @error('rating')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            <input type="hidden" name="product_id" value="{{$viewData["products"]->getId()}}" />
            <input type="submit" class="btn btn-dark" value="comment"/>
        </form>

  </div>
    </div>
  </div>
</div>
@endsection
