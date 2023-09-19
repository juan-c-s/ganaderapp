@extends('layouts.app')
@section('title', $viewData["title"])
@section('subtitle', 'Product List')
@section('content')
<div class="row">
  <div class="col-lg-7">
    <h4>Productos</h4>
  </div>
</div>
<hr>
<div class="row">
  @foreach($viewData["products"] as $key => $product)
    <div class="col-lg-3">
      <div class="card" style="margin-bottom: 20px; height: auto;">
        <img src="{{ $product->getImage() }}" alt="">
        <div class="card-body">
          <h6 class="card-title">{{ $product->getTitle() }}</h6>
          <p>${{ $product->getPrice() }}</p>
          <a href="{{ route('product.show', ['id'=> $product->getId()]) }}"
            class="btn bg-primary text-white">{{ $product->getTitle() }}</a>
          <form action="{{ route('cart.add') }}" method="POST">
          {{ csrf_field() }}
          <input type="hidden" value="{{ $product->id }}" id='id' name='id'>
          <input type="hidden" value="{{ $product->title }}" id='title' name='title'>
          <input type="hidden" value="{{ $product->price }}" id='price' name='price'>
          <input type="hidden" value="1" id="quantity" name="quantity">
          <div class="card-footer" style="background-color: white;">
            <div class="row">
              <button class="btn btn-secondary btn-sm" class="tooltip-test" title="add to cart">
                <i class="fa fa-shopping-cart"></i> agregar al carrito
              </button>
            </div>
          </div>
          </div>
        </form>
      </div>
    </div>
  @endforeach
</div>
@endsection