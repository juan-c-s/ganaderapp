<!-- {/*JUANCAMILO*/} -->
@extends('layouts.app')
@section('title', $viewData["title"])
@section('subtitle', 'Product List')
@section('content')
<div class="row">
  @foreach ($viewData["products"]  as $key => $product)
    <div class="col-md-4 col-lg-3 mb-2">
      <div class="card">
        <img src="{{$product->getImage()}}" class="card-img-top img-card">
        <div class="card-body text-center">
          <a href="{{ route('product.show', ['id'=> $product->getId()]) }}"
            class="btn bg-primary text-white">{{ $product->getTitle() }}</a>
            <br><br>
          <a href="{{ route('cart.add', ['id' => $key]) }}"
            class="btn bg-primary text-white">agregar a carrito</a>
        </div>
      </div>
    </div>
  @endforeach
</div>
<div id="products" style="display: none;">'@json($viewData["products"])'</div>
@endsection