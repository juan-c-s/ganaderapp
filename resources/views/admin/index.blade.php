@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                <!-- <div class="offcanvas offcanvas-start" data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptions" aria-labelledby="offcanvasWithBothOptionsLabel">
  <div class="offcanvas-header">
    <h5 class="offcanvas-title" id="offcanvasWithBothOptionsLabel">Backdrop with scrolling</h5>
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body">
    <p>Try scrolling the rest of the page to see this option in action.</p>
  </div>
</div> -->
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.deleteEvent') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="event" class="col-md-4 col-form-label text-md-end">{{ __('Event') }}</label>

                            <div class="col-md-6">
                                <input id="event" type="text" class="form-control @error('event') is-invalid @enderror" name="event" value="{{ old('event') }}" required autocomplete="event" autofocus>

                                @error('event')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn bg-primary text-white">
                                    {{ __('Delete Event') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.deleteProduct') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="product" class="col-md-4 col-form-label text-md-end">{{ __('Product') }}</label>

                            <div class="col-md-6">
                                <input id="product" type="text" class="form-control @error('product') is-invalid @enderror" name="product" value="{{ old('product') }}" required autocomplete="product" autofocus>

                                @error('product')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn bg-primary text-white">
                                    {{ __('Delete Product') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
