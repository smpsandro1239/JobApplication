<!doctype html>
<html lang="en">
@include('includes.head')
<!-- Include the head.blade.php file -->

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


    @include('includes.header')
    <!-- HOME -->
    <section class="home-section section-hero overlay bg-image"
      style="background-image: url('/frontend/images/hero_1.jpg');" id="home-section">

      <div class="container">
        <div class="row align-items-center justify-content-center">
          <div class="col-md-12">
            <div class="mb-5 text-center">
              <h1 class="text-white font-weight-bold">The Easiest Way To Get Your Dream Job</h1>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate est, consequuntur
                perferendis.</p>
            </div>
            <form method="GET" action="{{ route('home') }}" class="search-jobs-form">
              @csrf
              <div class="row mb-5">
                <div class="col-12 col-sm-6 col-md-6 col-lg-3 mb-4 mb-lg-0">
                  <input type="text" name="search" class="form-control form-control-lg"
                    placeholder="Job title ...">
                </div>
                <div class="col-12 col-sm-6 col-md-6 col-lg-3 mb-4 mb-lg-0">
                  <select name="region" class="selectpicker" data-style="btn-white btn-lg"
                    data-width="100%" data-live-search="true" title="Select Region">
                    <option>Anywhere</option>
                    @foreach($locations as $location)
                    <option value="{{ $location }}">{{ $location }}</option>
                    @endforeach
                  </select>
                </div>
                <div class="col-12 col-sm-6 col-md-6 col-lg-3 mb-4 mb-lg-0">
                  <select name="employment_status" class="selectpicker" data-style="btn-white btn-lg"
                    data-width="100%" data-live-search="true" title="Select Job Type">
                    <option value="Select Job Type" disabled selected>Select Job Type</option>
                    @foreach($employment_status as $status)
                    <option value="{{ $status }}">{{ $status }}</option>
                    @endforeach
                  </select>
                </div>
                <div class="col-12 col-sm-6 col-md-6 col-lg-3 mb-4 mb-lg-0 d-flex align-items-center">
                  <button type="submit"
                    class="btn btn-primary btn-lg btn-block text-white btn-search mr-2">
                    <span class="icon-search icon mr-2"></span>Search
                  </button>
                  <!-- Reset Button -->
                  <button type="button" class="btn btn-secondary btn-lg btn-block text-white"
                    onclick="resetSearchForm()">
                    Reset
                    <!-- Replace this with your desired icon -->
                  </button>

                </div>
              </div>
            </form>
            <!-- JavaScript for Reset Button -->
            <script>
              function resetSearchForm() {
                window.location.href = "{{ route('home') }}";
              }
            </script>

          </div>
        </div>
      </div>

      <a href="#next" class="scroll-button smoothscroll">
        <span class=" icon-keyboard_arrow_down"></span>
      </a>

    </section>

    <section class="py-5 bg-image overlay-primary fixed overlay" id="next"
      style="background-image: url('/frontend/images/hero_1.jpg');">
      <div class="container">
        <div class="row mb-5 justify-content-center">
          <div class="col-md-7 text-center">
            <h2 class="section-title mb-2 text-white">JobBoard Site Stats</h2>
            <p class="lead text-white">Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita
              unde officiis
              recusandae sequi excepturi corrupti.</p>
          </div>
        </div>
        <div class="row pb-0 block__19738 section-counter">

          <div class="col-6 col-md-6 col-lg-3 mb-5 mb-lg-0">
            <div class="d-flex align-items-center justify-content-center mb-2">
              <strong class="number" data-number="{{ $usercount }}">0</strong>
            </div>
            <span class="caption">Candidates</span>
          </div>

          <div class="col-6 col-md-6 col-lg-3 mb-5 mb-lg-0">
            <div class="d-flex align-items-center justify-content-center mb-2">
              <strong class="number" data-number="{{ $jobCount }}">0</strong>
            </div>
            <span class="caption">Jobs Posted</span>
          </div>

          <div class="col-6 col-md-6 col-lg-3 mb-5 mb-lg-0">
            <div class="d-flex align-items-center justify-content-center mb-2">
              <strong class="number" data-number="{{$filledjobscount}}">0</strong>
            </div>
            <span class="caption">Jobs Filled</span>
          </div>

          <div class="col-6 col-md-6 col-lg-3 mb-5 mb-lg-0">
            <div class="d-flex align-items-center justify-content-center mb-2">
              <strong class="number" data-number="{{ $companiesCount }}">0</strong>
            </div>
            <span class="caption">Companies</span>
          </div>


        </div>
      </div>
    </section>



    <section class="site-section">
      <div class="container">

        <div class="row mb-5 justify-content-center">
          <div class="col-md-7 text-center">
            <h2 class="section-title mb-2"> {{ $jobCount }} Job Listed</h2>

          </div>
        </div>

        <ul class="job-listings mb-5">
          @foreach($jobs as $job)
          <li class="job-listing d-block d-sm-flex pb-3 pb-sm-0 align-items-center">
            <a href="{{ route('jobdetail', $job->id) }}"></a>
            <div class="job-listing-logo">
              <img src="{{ asset('storage/' . $job->image) }}" alt="Free Website Template by Free-Template.co"
                class="img-fluid">
            </div>

            <div class="job-listing-about d-sm-flex custom-width w-100 justify-content-between mx-4">
              <div class="job-listing-position custom-width w-50 mb-3 mb-sm-0">
                <h2>{{ $job->title }}</h2>
                <strong>{{ $job->company_name }}</strong>
              </div>
              <div class="job-listing-location mb-3 mb-sm-0 custom-width w-25">
                <span class="icon-room"></span> {{ $job->job_location }}
              </div>
              <div class="job-listing-meta">
                @if($job->employment_status === 'Full-time')
                <span class="badge badge-danger">{{ $job->employment_status }}</span>
                <!-- Green for Full-time -->
                @elseif($job->employment_status === 'Part-time')
                <span class="badge badge-primary">{{ $job->employment_status }}</span>
                <!-- Yellow for Part-time -->
                @else
                <span class="badge badge-secondary">{{ $job->employment_status }}</span>
                <!-- Grey for other statuses -->
                @endif
              </div>
            </div>

          </li>

          @endforeach




        </ul>

        <div class="row">
          <div class="col-md-12">

            {{ $jobs->links('pagination::bootstrap-5') }}
            <!-- This will generate the pagination links -->
          </div>
        </div>


      </div>
    </section>

    <section class="py-5 bg-image overlay-primary fixed overlay"
      style="background-image: url('images/hero_1.jpg');">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-md-8">
            <h2 class="text-white">Looking For A Job?</h2>
            <p class="mb-0 text-white lead">Lorem ipsum dolor sit amet consectetur adipisicing elit tempora
              adipisci
              impedit.</p>
          </div>
          <div class="col-md-3 ml-auto">
            <a href="#" class="btn btn-warning btn-block btn-lg">Sign Up</a>
          </div>
        </div>
      </div>
    </section>


    <section class="site-section py-4">
      <div class="container">

        <div class="row align-items-center">
          <div class="col-12 text-center mt-4 mb-5">
            <div class="row justify-content-center">
              <div class="col-md-7">
                <h2 class="section-title mb-2">Company We've Helped</h2>
                <p class="lead">Porro error reiciendis commodi beatae omnis similique voluptate rerum
                  ipsam fugit
                  mollitia ipsum facilis expedita tempora suscipit iste</p>
              </div>
            </div>

          </div>
          <div class="col-6 col-lg-3 col-md-6 text-center">
            <img src="/frontend/images/logo_mailchimp.svg" alt="Image" class="img-fluid logo-1">
          </div>
          <div class="col-6 col-lg-3 col-md-6 text-center">
            <img src="/frontend/images/logo_paypal.svg" alt="Image" class="img-fluid logo-2">
          </div>
          <div class="col-6 col-lg-3 col-md-6 text-center">
            <img src="/frontend/images/logo_stripe.svg" alt="Image" class="img-fluid logo-3">
          </div>
          <div class="col-6 col-lg-3 col-md-6 text-center">
            <img src="/frontend/images/logo_visa.svg" alt="Image" class="img-fluid logo-4">
          </div>

          <div class="col-6 col-lg-3 col-md-6 text-center">
            <img src="/frontend/images/logo_apple.svg" alt="Image" class="img-fluid logo-5">
          </div>
          <div class="col-6 col-lg-3 col-md-6 text-center">
            <img src="/frontend/images/logo_tinder.svg" alt="Image" class="img-fluid logo-6">
          </div>
          <div class="col-6 col-lg-3 col-md-6 text-center">
            <img src="/frontend/images/logo_sony.svg" alt="Image" class="img-fluid logo-7">
          </div>
          <div class="col-6 col-lg-3 col-md-6 text-center">
            <img src="/frontend/images/logo_airbnb.svg" alt="Image" class="img-fluid logo-8">
          </div>
        </div>
      </div>
    </section>


    <section class="bg-light pt-5 testimony-full">

      <div class="owl-carousel single-carousel">


        <div class="container">
          <div class="row">
            <div class="col-lg-6 align-self-center text-center text-lg-left">
              <blockquote>
                <p>&ldquo;Soluta quasi cum delectus eum facilis recusandae nesciunt molestias
                  accusantium libero dolores
                  repellat id in dolorem laborum ad modi qui at quas dolorum voluptatem voluptatum
                  repudiandae.&rdquo;
                </p>
                <p><cite> &mdash; Corey Woods, @Dribbble</cite></p>
              </blockquote>
            </div>
            <div class="col-lg-6 align-self-end text-center text-lg-right">
              <img src="/frontend/images/person_transparent_2.png" alt="Image" class="img-fluid mb-0">
            </div>
          </div>
        </div>

        <div class="container">
          <div class="row">
            <div class="col-lg-6 align-self-center text-center text-lg-left">
              <blockquote>
                <p>&ldquo;Soluta quasi cum delectus eum facilis recusandae nesciunt molestias
                  accusantium libero dolores
                  repellat id in dolorem laborum ad modi qui at quas dolorum voluptatem voluptatum
                  repudiandae.&rdquo;
                </p>
                <p><cite> &mdash; Chris Peters, @Google</cite></p>
              </blockquote>
            </div>
            <div class="col-lg-6 align-self-end text-center text-lg-right">
              <img src="/frontend/images/person_transparent.png" alt="Image" class="img-fluid mb-0">
            </div>
          </div>
        </div>

      </div>

    </section>

    <section class="pt-5 bg-image overlay-primary fixed overlay"
      style="background-image: url('/frontend/images/hero_1.jpg');">
      <div class="container">
        <div class="row">
          <div class="col-md-6 align-self-center text-center text-md-left mb-5 mb-md-0">
            <h2 class="text-white">Get The Mobile Apps</h2>
            <p class="mb-5 lead text-white">Lorem ipsum dolor sit amet consectetur adipisicing elit tempora
              adipisci
              impedit.</p>
            <p class="mb-0">
              <a href="#" class="btn btn-dark btn-md px-4 border-width-2"><span
                  class="icon-apple mr-3"></span>App
                Store</a>
              <a href="#" class="btn btn-dark btn-md px-4 border-width-2"><span
                  class="icon-android mr-3"></span>Play
                Store</a>
            </p>
          </div>
          <div class="col-md-6 ml-auto align-self-end">
            <img src="/frontend/images/apps.png" alt="Free Website Template by Free-Template.co"
              class="img-fluid">
          </div>
        </div>
      </div>
    </section>


    @include('includes.footer')

  </div>


</body>

</html>
