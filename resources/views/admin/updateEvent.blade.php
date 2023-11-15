{{-- JUANCAMILO --}}
@extends('layouts.app')
@section('title', $viewData["title"])
@section('subtitle', $viewData["subtitle"])
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">{{__('Update Event')}}</div>
          <div class="card-body">
            @if($errors->any())
            <ul id="errors" class="alert alert-danger list-unstyled">
              @foreach($errors->all() as $error)
              <li>{{ $error }}</li>
              @endforeach
            </ul>
            @endif


            <form method="POST" action="{{ route('admin.updateEventDB') }}">
              @csrf
                <input type="text" class="form-control mb-2" placeholder="Enter title" name="title" value="{{ $viewData["event"]->getTitle() }}" />
                <input type="text" class="form-control mb-2" placeholder="Enter max capacity" name="maxCapacity" value="{{ $viewData["event"]->getMaxCapacity() }}" />
                <input type="text" class="form-control mb-2" placeholder="Enter category" name="category" value="{{ $viewData["event"]->getCategory() }}" />
                <input type="date" class="form-control mb-2" placeholder="Enter date" name="date" value="{{ $viewData["event"]->getDate() }}" />
                <input type="text" class="form-control mb-2" placeholder="Enter description" name="description" value="{{ $viewData["event"]->getDescription() }}" />
                <input type="text" class="form-control mb-2" placeholder="Enter location" name="location" value="{{ $viewData["event"]->getLocation() }}" />
                <input type="hidden" name="id" value="{{$viewData["event"]->getId()}}" />
                <input type="hidden" name="user_id" value="{{$viewData["event"]->getUserId()}}" />

                <input type="submit" class="btn btn-primary" value="{{__('Update')}}" />


            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
