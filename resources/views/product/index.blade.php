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
            class="btn bg-primary text-white">{{ $product->getTitle() }}</a> <br><br>
            
          <a href="{{ route('cart.add',['id'=>$key]) }}" 
            class = "btn bg-primary text-white">Añadir al carrito</a>
          </div>
        </form>
      </div>
    </div>
  @endforeach
</div>
@endsection