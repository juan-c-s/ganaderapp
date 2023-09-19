@extends('layouts.app')
@section("title", $viewData["title"])
@section("subtitle", $viewData["subtitle"])
@section('content')

    <div class="container" style="margin-top: 80px">
        <div class="row justify-content-center">
            <div class="col-lg-12">
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
                                <img src="{{ $product->image }}" alt="">
                                <div class="card-body">
                                    <a href=""><h6 class="card-title">{{ $product->title }}</h6></a>
                                    <p>${{ $product->price }}</p>
                                    <a href="{{ route('cart.add', ['id'=> $key]) }}">Add to cart</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="row justify-content-center">
              <div class="col-md-12">
              <h1>Products in cart</h1>
                <ul>
                  @foreach($viewData["cartProducts"] as $key => $product)
                    <li>
                      Id: {{ $key }} - 
                      Name: {{ $product["title"] }} -
                      Price: {{ $product["price"] }}
                    </li>
                  @endforeach
                </ul>
                <a href="{{ route('cart.removeAll') }}">Remove all products from cart</a>
              </div>
            </div>
          </div>
        </div>
    </div>
@endsection