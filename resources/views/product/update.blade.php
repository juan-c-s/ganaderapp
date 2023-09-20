@extends('layouts.app')
@section("title", $viewData["title"])
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">Update product</div>
          <div class="card-body">
            @if($errors->any())
            <ul id="errors" class="alert alert-danger list-unstyled">
              @foreach($errors->all() as $error)
              <li>{{ $error }}</li>
              @endforeach
            </ul>
            @endif

            <form method="POST" action="{{ route('product.updateProduct') }}">
              @csrf
              <input type="text" class="form-control mb-2" placeholder="Enter title" name="title" value="{{ $viewData["product"]->getTitle() }}" />
              <input type="text" class="form-control mb-2" placeholder="Enter description" name="description" value="{{ $viewData["product"]->getDescription() }}" />
              <input type="text" class="form-control mb-2" placeholder="Enter price" name="price" value="{{ $viewData["product"]->getPrice() }}" />
              <input type="text" class="form-control mb-2" placeholder="Enter rating" name="rating" value="{{ $viewData["product"]->getRating() }}" />
              <input type="text" class="form-control mb-2" placeholder="Enter Breed" name="category" value="{{ $viewData["product"]->getCategory() }}" />
              <input type="text" class="form-control mb-2" placeholder="Enter Supplier" name="supplier" value="{{ $viewData["product"]->getSupplier() }}" />
              <input type="text" class="form-control mb-2" placeholder="Enter image url" name="image" value="{{ $viewData["product"]->getImage() }}" />
              <input type="hidden" name="id" value="{{$viewData["product"]->getId()}}" />
              <input type="submit" class="btn btn-primary" value="Update" />
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
