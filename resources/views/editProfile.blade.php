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
            <h1 class="text-white font-weight-bold">Edit Profile</h1>
            <div class="custom-breadcrumbs">
              <a href="#">Home</a> <span class="mx-2 slash">/</span>
              <a href="#">Edit Profile</a> <span class="mx-2 slash">/</span>
              <span class="text-white"><strong>Edit Profile</strong></span>
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
                <h2>Edit Profile</h2>
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
            <form class="p-4 p-md-5 border rounded" action="{{ route('update-user') }}" method="post"
              enctype="multipart/form-data">
              @csrf
              <!-- Include CSRF token for security -->

              <!-- User ID (hidden) -->
              <input type="hidden" name="id" value="{{ $loggedUserInfo->id }}">

              <!-- User Name -->
              <div class="form-group">
                <label for="user-name">Name</label>
                <input type="text" name="name" class="form-control" id="user-name"
                  placeholder="Enter your name" value="{{ $loggedUserInfo->name }}">
              </div>

              <!-- User Email -->
              <div class="form-group">
                <label for="user-email">Email</label>
                <input type="email" disabled name="email" class="form-control" id="user-email"
                  placeholder="Enter your email" value="{{ $loggedUserInfo->email }}">
              </div>

              <!-- User Designation -->
              <div class="form-group">
                <label for="user-designation">Designation</label>
                <input type="text" name="designation" class="form-control" id="user-designation"
                  placeholder="Enter your designation" value="{{ $loggedUserInfo->designation }}">
              </div>

              <!-- User Description -->
              <div class="form-group">
                <label for="user-description">Description</label>
                <textarea name="description" class="form-control" id="user-description" rows="4"
                  placeholder="Enter a brief description">{{ $loggedUserInfo->description }}</textarea>
              </div>

              <!-- User Facebook Profile -->
              <div class="form-group">
                <label for="user-facebook">Facebook</label>
                <input type="url" name="facebook" class="form-control" id="user-facebook"
                  placeholder="Facebook URL" value="{{ $loggedUserInfo->facebook }}">
              </div>

              <!-- User LinkedIn Profile -->
              <div class="form-group">
                <label for="user-linkedin">LinkedIn</label>
                <input type="url" name="linkedin" class="form-control" id="user-linkedin"
                  placeholder="LinkedIn URL" value="{{ $loggedUserInfo->linkedin }}">
              </div>

              <!-- User Twitter Profile -->
              <div class="form-group">
                <label for="user-twitter">Twitter</label>
                <input type="url" name="twitter" class="form-control" id="user-twitter"
                  placeholder="Twitter URL" value="{{ $loggedUserInfo->twitter }}">
              </div>

              <!-- User Profile Picture -->
              <div class="form-group">
                <label for="user-picture">Profile Picture</label>
                <input type="file" name="picture" class="form-control" id="user-picture">
                <small>Leave blank to keep current picture</small>
              </div>

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
