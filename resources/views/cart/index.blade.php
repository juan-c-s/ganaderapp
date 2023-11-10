{{-- SIMON --}}
@extends('layouts.app')
@section('content')
    <div class="container" style="margin-top: 80px">
        @if(session()->has('success_msg'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session()->get('success_msg') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
        @endif
        @if(session()->has('alert_msg'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                {{ session()->get('alert_msg') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
        @endif
        @if(count($errors) > 0)
            @foreach($errors0>all() as $error)
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ $error }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
            @endforeach
        @endif
        <div class="row justify-content-center">
            <div class="col-lg-7">
            
                <br>
                @foreach($viewData["cartProducts"] as $key => $product)
                    <div class="row">
                        <div class="col-lg-3">
                            <img src="{{ $product->getImage() }}" class="img-thumbnail" width="200" height="200">
                        </div>
                        <div class="col-lg-5">
                            <p>
                                <b>{{ $product->getTitle() }}</b><br>
                                <b>Price: </b>${{ $product->getPrice() }}<br>
                            </p>
                        </div>
                        <div class="col-lg-4">
                            <div class="row">
                                <a href="{{ route('cart.remove',['id'=>$key]) }}" 
                                    class="btn btn-dark btn-sm" style="margin-right: 10px;"><i class="fa fa-trash"></i></a>
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
                            <li class="list-group-item"><b>Total: </b>${{ $viewData["totalCart"] }}</li>
                        </ul>
                    </div>
                    <br><a href="{{ route('product.index') }}" class="btn btn-dark">{{__('Continue shopping')}}</a>
                    <a href="/" class="btn btn-success">{{__('Procedure the checkout')}}</a>
                </div>
        </div>
        <br><br>
    </div>
@endsection
