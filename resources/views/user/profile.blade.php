@extends('layouts.app')
@section('title', $viewData["title"])
@section('subtitle', $viewData["subtitle"])
@section('content')
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
<div class="container" style="align-items: center; display: flex; justify-content: center;">
    <div class="card " style="width: 20rem; ">
        <img src="https://definicion.de/wp-content/uploads/2019/07/perfil-de-usuario.png" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">{{ $viewData["user"]->getName() }}</h5>
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item">Email: {{ $viewData["user"]->getEmail() }}</li>
            <li class="list-group-item">Wallet: ${{ $viewData["user"]->getWallet() }}</li>
            <li class="list-group-item">Address: {{ $viewData["user"]->getAddress() }}</li>
        </ul>
        <div class="card-body" style="align-items: center; display: flex; justify-content: center;">
            <a class="card-link btn btn-dark" type="button" data-bs-toggle="modal" data-bs-target="#infoModal{{$viewData['user']->getId()}}">Add Cash</a>
            <form class ="m-2" method="POST" action="{{ route('user.delete') }}">
                @csrf
                <input type="hidden" name="id" value="{{$viewData['user']->getId()}}" />
                <input type="submit" class="btn btn-dark" value="Delete User" />
          </form>
        </div>
    </div>
    @extends('user.addCash')
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.min.js" integrity="sha384-heAjqF+bCxXpCWLa6Zhcp4fu20XoNIA98ecBC1YkdXhszjoejr5y9Q77hIrv8R9i" crossorigin="anonymous"></script>
{% endblock %}
@endsection