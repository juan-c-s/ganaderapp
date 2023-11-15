
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
  @if (Auth::user() && Auth::user()->getRole() == 'admin')
  @include('layouts.sidebar') 
  @endif
  <nav class="navbar navbar-expand-lg navbar-dark bg-secondary py-4">
    @if (Auth::user() && Auth::user()->getRole() == 'admin')
    
      <i class=" fa-bars btn text-white mx-4 px-2 fw-lighter fs-2"   type="button"  data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBothOptions" aria-controls="offcanvasWithBothOptions"></i>
    @endif
    <div class="container">
        <a class="navbar-brand" href="{{ route('home.index') }}">{{__('Ganaderapp')}}</a>

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
        aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav ms-auto">
          
        @auth
          @if(Auth::user()->getRole() == 'user')
            <a class="nav-link active" href="{{ route('home.toggleLang') }}">{{__('Change Language')}}</a>
            <a class="nav-link active" href="{{ route('home.index') }}">{{__('Home')}}</a>
            <div class="dropdown">
                <p class="dropbtn nav-link active" onclick="myFunction('myDropdown')">{{__('Product')}}</p>
                <div class="dropdown-content" id="myDropdown">
                  <a class="nav-link active" href="{{ route('product.index') }}">{{__('Marketplace')}}</a>
                  <a class="nav-link active" href="{{ route('product.create') }}">{{__('Create a Product')}}</a>
                </div>
            </div>
            <div class="dropdown">
                <p class="dropbtn nav-link active" onclick="myFunction('myDropdown2')">{{__('Event')}}</p>
                <div class="dropdown-content" id="myDropdown2">
                  <a class="nav-link active" href="{{ route('event.index') }}">{{__('All Events')}}</a>
                  <a class="nav-link active" href="{{ route('event.create') }}">{{__('Create an Event')}}</a>
                </div>
            </div>
            <a class="nav-link active" href="{{ route('cart.index') }}">{{__('Cart')}}</a>
            @endif
          @endauth

          <div class="vr bg-white mx-2 d-none d-lg-block"></div>
          @guest
          <a class="nav-link active" href="{{ route('login') }}">{{__('Login')}}</a>
          <a class="nav-link active" href="{{ route('register') }}">{{__('Register')}}</a>
          @else
          <div class="dropdown">
              <i class="dropbtn nav-link active fa fa-user fa-lg" onclick="myFunction('myDropdown3')"></i>
              <div class="dropdown-content" id="myDropdown3">
                <a class="nav-link active" href="{{ route('user.profile')}}"><b>Profile</b></a>
                <form id="logout" action="{{ route('logout') }}" method="POST"> 
                  <a role="button" class="nav-link active" onclick="document.getElementById('logout').submit();">{{__('Logout')}}</a>
                  @csrf
                </form>
              </div>
            </div>
          @endguest
        </div>
      </div>
    </div>
  </nav>

  <header class="masthead bg-primary text-white text-center py-4">
    <div class="container d-flex align-items-center flex-column">
      <h2>@yield('subtitle', __('WELCOME TO OUR APP'))</h2>
    </div>
  </header>
  <!-- header -->

  <div class="clearfix my-5">
    @yield('content')
  </div>

  <!-- footer -->
  <footer class="footer text-center text-white">
    Welcome to the application. Select the needed route placed in the navbar
  </footer>
  <!-- footer -->

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
  <script>
    function myFunction(id) {
      if (id == 'myDropdown'){
        document.getElementById("myDropdown").classList.add("show");
        document.getElementById("myDropdown2").classList.remove("show");
        document.getElementById("myDropdown3").classList.remove("show");
      }
      else if (id == 'myDropdown2'){
        document.getElementById("myDropdown2").classList.add("show");
        document.getElementById("myDropdown").classList.remove("show");
        document.getElementById("myDropdown3").classList.remove("show");
      }
      else{
        document.getElementById("myDropdown3").classList.add("show");
        document.getElementById("myDropdown").classList.remove("show");
        document.getElementById("myDropdown2").classList.remove("show");
      }
    }

    window.onclick = function(event) {
      if (!event.target.matches('.dropbtn')) {
        var dropdowns = document.getElementsByClassName("dropdown-content");
        var i;
        for (i = 0; i < dropdowns.length; i++) {
          var openDropdown = dropdowns[i];
          if (openDropdown.classList.contains('show')) {
            openDropdown.classList.remove('show');
          }
        }
      }
    }
  </script>
</body>
</html>
