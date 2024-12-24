
<nav class="navbar navbar-expand-lg bg-body-tertiary" style="padding: 15px">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Navbar</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Features</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Pricing</a>
          </li>
          @if (Auth::check())
          <li class="nav-item">
              <a class="nav-link" href="{{route('auth.logout')}}">Logout</a>
          </li>
      @else
          <li class="nav-item">
              <a class="nav-link" href="{{route('auth.login')}}">Login</a>
          </li>
          <li class="nav-item">
              <a class="nav-link" href="{{route('auth.register')}}">Register</a>
          </li>
      @endif
        </ul>
      </div>
    </div>
  </nav>
