@extends('layouts.app')

@section('content')

<!-- resources/views/your_view.blade.php -->

<div class="row">
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{__('Products')}}</h5>
                <p class="card-text">{{__('Total Products')}}: {{$viewData['productCount']}}</p>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{__('Events')}}</h5>
                <p class="card-text">{{__('Total events')}}: {{$viewData['eventCount']}}</p>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{__('Users')}}</h5>
                <p class="card-text">{{__('Total users')}}: {{$viewData['userCount']}}</p>
            </div>
        </div>
    </div>
</div>

<div class="container mt-4">
    <table class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>{{__('Name')}}</th>
                <th>{{__('Address')}}</th>
                <th>{{__('Email')}}</th>
                <th>{{__('Role')}}</th>
                <th>{{__('Wallet')}}</th>
            </tr>
        </thead>
        <tbody>
        @foreach($viewData["users"] as $user)
                <tr>
                    <td>{{ $user->getName() }}</td>
                    <td>{{ $user->getAddress() }}</td>
                    <td>{{ $user->getEmail() }}</td>
                    <td>{{ $user->getRole() }}</td>
                    <td>{{ $user->getWallet() }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection