<!-- NAVBAR -->
<header class="site-navbar mt-3">
  <div class="container-fluid">
    <div class="row align-items-center">
      <div class="site-logo col-6"><a href="index.html">JobBoard</a></div>

      <nav class="mx-auto site-navigation">
        <ul class="site-menu js-clone-nav d-none d-xl-block ml-0 pl-0">
          <li><a href="/" class="nav-link active">Home</a></li>
          <li><a href="about.html">About</a></li>

          <li><a href="profile.html">Profile</a></li>

          <li><a href="contact.html">Contact</a></li>
          <li class="d-lg-none"><a href="post-job.html"><span class="mr-2">+</span> Post a Job</a>
          </li>
          <li class="d-lg-none"><a href="login.html">Log In</a></li>
        </ul>
      </nav>

      <div class="right-cta-menu text-right d-flex align-items-center col-6">
        <div class="ml-auto">
          @if (session('LoggedUserInfo'))
          <!-- Display user info -->
          <div class="dropdown">
            <button class="btn btn-primary dropdown-toggle" type="button" id="userDropdown"
              data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <img src="{{ asset('storage/' . $loggedUserInfo->picture) }}" alt="User Image" class="rounded-circle" width="30" height="30">

              {{ $loggedUserInfo->name }}
            </button>


            <div class="dropdown-menu" aria-labelledby="userDropdown">
              <a class="dropdown-item" href="{{ route('profile') }}">View Profile</a>
              <a class="dropdown-item" href="{{ route('editProfile') }}">Edit Profile</a>
              <a class="dropdown-item" href="{{ route('uploadCV') }}">Upload CV</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="{{ route('logout') }}">Logout</a>
            </div>
          </div>
          @else
          <a href="{{ route('register') }}" class="btn btn-primary border-width-2 d-none d-lg-inline-block">
            <span class="mr-2 icon-lock_outline"></span>Register
          </a>
          <a href="{{ route('login') }}" class="btn btn-primary border-width-2 d-none d-lg-inline-block">
            <span class="mr-2 icon-lock_outline"></span>Log In
          </a>
          @endif
        </div>
        <a href="#" class="site-menu-toggle js-menu-toggle d-inline-block d-xl-none mt-lg-2 ml-3">
          <span class="icon-menu h3 m-0 p-0 mt-2"></span>
        </a>
      </div>


    </div>
  </div>
</header>
