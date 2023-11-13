{{-- JUANCAMILO --}}
{{-- DONOVAN --}}

@extends('layouts.app')
@section('title', $viewData["title"])
@section('subtitle', $viewData["subtitle"])
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">{{__('Create event')}}</div>
          <div class="card-body">
            @if($errors->any())
            <ul id="errors" class="alert alert-danger list-unstyled">
              @foreach($errors->all() as $error)
              <li>{{ $error }}</li>
              @endforeach
            </ul>
            @endif

            <form method="POST" action="{{ route('event.save') }}" enctype="multipart/form-data">
              @csrf
              <input type="text" class="form-control mb-2" placeholder="{{__('Enter title')}}" name="title" value="{{ old('title') }}" />
              <input type="text" class="form-control mb-2" placeholder="{{__('Enter description')}}" name="description" value="{{ old('description') }}" />
              <input type="date" class="form-control mb-2" placeholder="{{__('Enter date')}}" name="date" value="{{ old('date') }}" />
              <input type="text" class="form-control mb-2" placeholder="{{__('Enter category')}}" name="category" value="{{ old('category') }}" />
              <input type="text" class="form-control mb-2" placeholder="{{__('Enter location')}}" name="location" value="{{ old('location') }}" />
              <input type="number" class="form-control mb-2" placeholder="{{__('Enter Max Capacity')}}" name="maxCapacity" value="{{ old('maxCapacity') }}" />
              <input type="file" accept="image/png, image/jpg, image/jpeg" class="form-control mb-2" placeholder="{{__('Choose an image')}}" name="image" value="{{ old('image') }}" />
              <input type="hidden" name="user_id" value="{{Auth::user()->getId()}}" />
              <input type="submit" class="btn btn-primary" value="{{__('Send')}}" />
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
