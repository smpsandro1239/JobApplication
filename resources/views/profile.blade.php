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

    <section class="section-hero overlay inner-page bg-image" style="background-image: url('/frontend/images/hero_1.jpg');"
      id="home-section">
      <div class="container">
        <div class="row d-flex justify-content-center">
          <div class="col-md-7">
            <div class="card p-3 py-4">

              <div class="text-center">
                <img src="{{ asset('storage/' . $loggedUserInfo->picture) }}" width="100"
                  class="rounded-circle">
              </div>

              <div class="text-center mt-3">
                <!-- <span class="bg-secondary p-1 px-4 rounded text-white">Pro</span> -->
                <h5 class="mt-2 mb-0">{{ $loggedUserInfo ? $loggedUserInfo->name : 'Guest User' }} </h5>
                <span>{{ $loggedUserInfo ? $loggedUserInfo->designation : 'Guest User' }} </span>

                <div class="px-4 mt-1">
                  <p class="fonts">{{ $loggedUserInfo ? $loggedUserInfo->description : 'Guest User' }}
                  </p>

                </div>

                <div class="px-3">
                  @if($loggedUserInfo)
                  <a href="{{ $loggedUserInfo->facebook }}" target="_blank"
                    class="pt-3 pb-3 pr-3 pl-0 underline-none">
                    <span class="icon-facebook"></span>
                  </a>
                  <a href="{{ $loggedUserInfo->twitter }}" target="_blank"
                    class="pt-3 pb-3 pr-3 pl-0">
                    <span class="icon-twitter"></span>
                  </a>
                  <a href="{{ $loggedUserInfo->linkedin }}" target="_blank"
                    class="pt-3 pb-3 pr-3 pl-0">
                    <span class="icon-linkedin"></span>
                  </a>
                  @else
                  <p>Please log in to see your social media links.</p>
                  @endif
                </div>

                <!-- Display Saved Jobs -->
                <div class="row mt-5">
                  <div class="col-md-12">
                    <h5>Saved Jobs</h5>
                    <ul class="list-group">
                      @if($savedJobs->isEmpty())
                      <li class="list-group-item">No saved jobs.</li>
                      @else
                      @foreach($savedJobs as $savedJob)
                      <li class="list-group-item">{{ $savedJob->job->title }} -
                        {{ $savedJob->saved_on }}
                      </li>
                      @endforeach
                      @endif
                    </ul>
                  </div>
                </div>

                <!-- Display Applied Jobs -->
                <div class="row mt-5">
                  <div class="col-md-12">
                    <h5>Applied Jobs</h5>
                    <ul class="list-group">
                      @if($appliedJobs->isEmpty())
                      <li class="list-group-item">No applied jobs.</li>
                      @else
                      @foreach($appliedJobs as $appliedJob)
                      <li class="list-group-item">{{ $appliedJob->job->title }} -
                        {{ $appliedJob->applied_on }}
                      </li>
                      <span class="badge badge-info">{{ $appliedJob->status }}</span>

                      @endforeach
                      @endif
                    </ul>
                  </div>
                </div>

              </div>




            </div>
          </div>
        </div>


      </div>
    </section>


    @include('includes.footer')

  </div>


</body>

</html>
