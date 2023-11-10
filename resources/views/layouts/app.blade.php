{{-- JUANCAMILO --}}
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous" />
  <link href="{{ asset('/css/app.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

  <title>@yield('title', 'Ganaderapp')</title>
</head>
<body>
  <!-- header -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-secondary py-4">
    <div class="container">
      <a class="navbar-brand" href="{{ route('home.index') }}">{{__('Ganaderapp')}}</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
        aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav ms-auto">
          
          @auth
          <a class="nav-link active" href="{{ route('home.index') }}">{{__('Home')}}</a>
          <a class="nav-link active" href="{{ route('product.index') }}">{{__('Marketplace')}}</a>
          <a class="nav-link active" href="{{ route('product.create') }}">{{__('Create Product')}}</a>
          <a class="nav-link active" href="{{ route('event.index') }}">{{__('Events')}}</a>
          <a class="nav-link active" href="{{ route('event.create') }}">{{__('Create Event')}}</a>
          <a class="nav-link active" href="{{ route('cart.index') }}">{{__('Cart')}}</a>
          @endauth

          @if (Auth::user() && Auth::user()->getRole() == 'admin')
            <a class="nav-link active" href="{{ route('admin.index') }}">{{__('Admin')}}</a>
          @endif

          <div class="vr bg-white mx-2 d-none d-lg-block"></div>
          @guest
          <a class="nav-link active" href="{{ route('login') }}">{{__('Login')}}</a>
          <a class="nav-link active" href="{{ route('register') }}">{{__('Register')}}</a>
          @else
          <form id="logout" action="{{ route('logout') }}" method="POST"> 
            <a role="button" class="nav-link active" onclick="document.getElementById('logout').submit();">{{__('Logout')}}</a>
            @csrf
          </form>
          @endguest
        </div>
      </div>
    </div>
  </nav>

  <header class="masthead bg-primary text-white text-center py-4">
    <div class="container d-flex align-items-center flex-column">
      <h2>@yield('subtitle', 'Welcome')</h2>
    </div>
  </header>
  <!-- header -->

  <div class="container my-4">
    @yield('content')
  </div>

  <!-- footer -->
  <div class="copyright py-4 text-center text-white">
    <div class="container">
    </div>
  </div>
  <!-- footer -->

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>
</html>
