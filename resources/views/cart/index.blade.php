{{-- SIMON --}}
@extends('layouts.app')
@section('content')
    <div class="container" style="margin-top: 80px">
        @if(session()->has('success_msg'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session()->get('success_msg') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if(session()->has('alert_msg'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                {{ session()->get('alert_msg') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if(count($errors) > 0)
            @foreach($errors0>all() as $error)
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ $error }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endforeach
        @endif
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <br>
                @foreach($viewData["cartProducts"] as $product)
                    <div class="row">
                        <div class="col-lg-3">
                            <img src="{{ $product->getImage() }}" class="img-thumbnail" width="200" height="200">
                        </div>
                        <div class="col-lg-5">
                            <p>
                                <b class="text-white">{{ $product->getTitle() }}</b><br>
                                <b class="text-white">Price: ${{ $product->getPrice() }}</b><br>
                                <b class="text-white">Quantity: {{ $product->getQuantity() }}</b><br>
                            </p>
                        </div>
                        <div class="col-lg-1">
                            <div class="row">
                                <a href="{{ route('cart.remove',['id'=>$product->getId()]) }}" 
                                    class="btn btn-dark btn-sm" style="margin-right: 10px;"><i class="fa fa-trash"></i></a>
                                <a href="{{ route('cart.sum',['id'=>$product->getId()]) }}" 
                                    class="btn btn-dark btn-sm" style="margin-right: 10px;"><i class="fa fa-plus"></i></a>
                                <a href="{{ route('cart.res',['id'=>$product->getId()]) }}" 
                                    class="btn btn-dark btn-sm" style="margin-right: 10px;"><i class="fa fa-minus"></i></a>
                            </div>
                        </div>
                    </div>
                    <hr>
                @endforeach
                <a href="{{ route('cart.clear') }}"
                    class="btn bg-primary text-white">{{__('Delete Cart')}}</a>
            </div>
                <div class="col-lg-5">
                    <div class="card">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><b>{{__('Total')}}: </b>${{ $viewData["totalCart"] }}</li>
                        </ul>
                    </div>
                    <br><a href="{{ route('product.index') }}" class="btn btn-dark">{{__('Continue shopping')}}</a>
                    <form method="POST" action="{{ route('cart.checkout') }}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="user_id" value="{{Auth::user()->getId()}}" />
                        <input type="submit" class="btn btn-success" value="{{__('Procedure the checkout')}}"/>
                    </form>
                </div>
        </div>
        <br><br>
    </div>
@endsection