<!doctype html>
<html lang="en">

<head>
  @include('includes.head')

</head>

<body id="top">

  <div id="overlayer"></div>
  <div class="loader">
    <div class="spinner-border text-primary" role="status">
      <span class="sr-only">Loading...</span>
    </div>
  </div>


  <div class="site-wrap">

    <div class="site-mobile-menu site-navbar-target">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div> <!-- .site-mobile-menu -->


    <!-- NAVBAR -->
    @include('includes.header')


    <!-- HOME -->
    <section class="section-hero overlay inner-page bg-image"
      style="background-image: url('/frontend/images/hero_1.jpg');" id="home-section">
      <div class="container">
        <div class="row">
          <div class="col-md-7">
            <h1 class="text-white font-weight-bold">Upload CV</h1>
            <div class="custom-breadcrumbs">
              <a href="#">Home</a> <span class="mx-2 slash">/</span>
              <a href="#">Upload CV </a> <span class="mx-2 slash">/</span>
              <span class="text-white"><strong>Upload CV</strong></span>
            </div>
          </div>
        </div>
      </div>
    </section>


    <section class="site-section">
      <div class="container">

        <div class="row align-items-center mb-5">
          <div class="col-lg-8 mb-4 mb-lg-0">
            <div class="d-flex align-items-center">
              <div>
                <h2>Upload CV</h2>
              </div>
            </div>
          </div>

        </div>
        <div class="row mb-5">
          <div class="col-lg-12">

            @if(session('success'))
            <div class="alert alert-success">
              {{ session('success') }}
            </div>
            @endif


            @if ($errors->any())
            <div class="alert alert-danger">
              <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
            @endif
            <form class="p-4 p-md-5 border rounded" action="{{ route('update-cv') }}" method="post"
              enctype="multipart/form-data">
              @csrf
              <!-- Include CSRF token for security -->

              <!-- User ID (hidden) -->
              <input type="hidden" name="id" value="{{ $loggedUserInfo->id }}">

              <!-- User CV Upload -->
              <div class="form-group">
                <label for="user-cv">CV (PDF Only)</label>
                <input type="file" name="cv" class="form-control" id="user-cv" accept=".pdf">
                <small>Leave blank to keep the current CV</small>
              </div>
              @if($loggedUserInfo->cv)
              <div class="form-group">
                <label for="current-cv">Current CV:</label>
                <a href="{{ asset('storage/' . $loggedUserInfo->cv) }}" target="_blank"
                  class="btn btn-link">
                  Download Current CV
                </a>
              </div>
              @else
              <div class="form-group">
                <label>No CV uploaded yet.</label>
              </div>
              @endif

              <div class="col-lg-4 ml-auto">
                <div class="row">
                  <div class="col-6">
                    <input type="submit" name="submit" class="btn btn-block btn-primary btn-md"
                      style="margin-left: 200px;" value="Update Info">
                  </div>
                </div>
              </div>
            </form>


          </div>


        </div>

      </div>
    </section>


    @include('includes.footer')


  </div>




</body>

</html>
