{{-- JUANCAMILO --}}
{{-- SIMON --}}
{{-- DONOVAN --}}

@extends('layouts.app')
@section('title', $viewData["title"])
@section('subtitle', 'Product List')
@section('content')
<script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
<script src="{{asset('js/product/filterBySupplier.js')}}"> </script>
<label for="supplier">{{__('Filter by supplier:')}} </label>
<input type="text" id="supplier">
<div id='results' class="row">
  @foreach ($viewData["products"]  as $key => $product)
    <div class="col-md-4 col-lg-3 mb-2">
      <div class="card">
        <img src="{{$product->getImage()}}" class="card-img-top img-card">
        <div class="card-body text-center">
          <a href="{{ route('product.show', ['id'=> $product->getId()]) }}"
            class="btn bg-primary text-white">{{ $product->getTitle() }}</a>
            <br><br>
          <a href="{{ route('cart.add', ['id' => $key]) }}"
            class="btn bg-primary text-white">{{__('Add To Cart')}}</a>
        </div>
      </div>
    </div>
  @endforeach
</div>
<div id="products" style="display: none;">'@json($viewData["products"])'</div>
@endsection