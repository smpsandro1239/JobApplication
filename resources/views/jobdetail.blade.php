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
    <section class="section-hero overlay inner-page bg-image"
      style="background-image: url('/frontend/images/hero_1.jpg');" id="home-section">
      <div class="container">
        <div class="row">
          <div class="col-md-7">
            <h1 class="text-white font-weight-bold">Product Designer</h1>
            <div class="custom-breadcrumbs">
              <a href="/">Home</a> <span class="mx-2 slash">/</span>
              <a href="">Job</a> <span class="mx-2 slash">/</span>
              <span class="text-white"><strong>Product Designer</strong></span>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="site-section">
      <div class="container">


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
        <div class="row align-items-center mb-5">
          <div class="col-lg-8 mb-4 mb-lg-0">
            <div class="d-flex align-items-center">
              <div class="border p-2 d-inline-block mr-3 rounded">
                <img src="{{ asset('storage/' . $job->image) }}" alt="Image">
              </div>
              <div>
                <h2>{{ $job->title }}</h2>
                <div>
                  <span class="ml-0 mr-2 mb-2"><span
                      class="icon-briefcase mr-2"></span>{{ $job->company_name }}</span>
                  <span class="m-2"><span class="icon-room mr-2"></span>{{ $job->job_location}}</span>
                  <span class="m-2"><span class="icon-clock-o mr-2"></span><span
                      class="text-primary">{{ $job->employment_status}}</span></span>
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-lg-8">
              <div class="mb-5">
                <br>
                <h3 class="h5 d-flex align-items-center mb-4 text-primary"><span
                    class="icon-align-left mr-3"></span>Job Description</h3>

                <p> {{ $job->job_summary}}!</p>
              </div>

              <div class="row mb-5">
                <div class="col-6">
                  @if($isSaved)
                  <button class="btn btn-block btn-light btn-md" disabled>
                    <i class="icon-heart"></i> Job Already Saved
                  </button>
                  @else
                  <form action="{{ route('savejob') }}" method="POST">
                    @csrf
                    <input type="hidden" name="job_id" value="{{ $job->id }}">
                    <button type="submit" class="btn btn-block btn-light btn-md">
                      <i class="icon-heart"></i> Save Job
                    </button>
                  </form>
                  @endif
                </div>
                <div class="col-6">
                  @if($isApplied)
                  <button class="btn btn-block btn-primary btn-md" disabled>
                    Job Already Applied
                  </button>
                  @else
                  <form action="{{ route('apply') }}" method="POST">
                    @csrf
                    <input type="hidden" name="job_id" value="{{ $job->id }}">
                    <button type="submit" class="btn btn-block btn-primary btn-md">
                      Apply Now
                    </button>
                  </form>
                  @endif
                </div>
              </div>

            </div>
            <div class="col-lg-4">
              <div class="bg-light p-3 border rounded mb-4">
                <h3 class="text-primary  mt-3 h5 pl-3 mb-3 ">Job Summary</h3>
                <ul class="list-unstyled pl-3 mb-0">
                  <li class="mb-2"><strong class="text-black">Published on:</strong>
                    {{ $job->published_on}}
                  </li>
                  <li class="mb-2"><strong class="text-black">Vacancy:</strong> {{ $job->vacancy}}
                  </li>
                  <li class="mb-2"><strong class="text-black">Employment
                      Status:</strong>{{ $job->employment_status}}
                  </li>
                  <li class="mb-2"><strong class="text-black">Experience:</strong>
                    {{ $job->experience}}
                  </li>
                  <li class="mb-2"><strong class="text-black">Job Location:</strong>
                    {{ $job->job_location}}
                  </li>
                  <li class="mb-2"><strong class="text-black">Salary:</strong>{{ $job->salary}}</li>
                  <li class="mb-2"><strong class="text-black">Gender:</strong> {{ $job->gender}}</li>
                  <li class="mb-2"><strong class="text-black">Application Deadline:</strong>
                    {{ $job->application_deadline}}
                  </li>
                </ul>
              </div>



            </div>
          </div>
        </div>
    </section>

    <section class="site-section" id="next">
      <div class="container">

        <div class="row mb-5 justify-content-center">
          <div class="col-md-7 text-center">
            <h2 class="section-title mb-2">{{ $relatedJobCount }} Related Jobs</h2>
          </div>
        </div>

        <ul class="job-listings mb-5">
          @foreach($relatedJobs as $relatedJob)

          <li class="job-listing d-block d-sm-flex pb-3 pb-sm-0 align-items-center">
            <a href="{{ route('jobdetail', $relatedJob->id) }}"></a>
            <div class="job-listing-logo">
              <img src="{{ asset('storage/' . $job->image) }}" alt="Image" class="img-fluid">
            </div>

            <div class="job-listing-about d-sm-flex custom-width w-100 justify-content-between mx-4">
              <div class="job-listing-position custom-width w-50 mb-3 mb-sm-0">
                <h2>{{ $relatedJob->title }}</h2>
                <strong>{{ $relatedJob->company_name }}</strong>
              </div>
              <div class="job-listing-location mb-3 mb-sm-0 custom-width w-25">
                <span class="icon-room"></span>{{ $relatedJob->job_location }}
              </div>
              <div class="job-listing-meta">
                <span class="badge badge-danger">{{ $relatedJob->employment_status }}</span>
              </div>
            </div>

          </li>

          @endforeach



        </ul>



      </div>
    </section>


    <section class="bg-light pt-5 testimony-full">

      <div class="owl-carousel single-carousel">


        <div class="container">
          <div class="row">
            <div class="col-lg-6 align-self-center text-center text-lg-left">
              <blockquote>
                <p>&ldquo;Soluta quasi cum delectus eum facilis recusandae nesciunt molestias
                  accusantium libero dolores repellat id in dolorem laborum ad modi qui at quas
                  dolorum voluptatem voluptatum repudiandae.&rdquo;</p>
                <p><cite> &mdash; Corey Woods, @Dribbble</cite></p>
              </blockquote>
            </div>
            <div class="col-lg-6 align-self-end text-center text-lg-right">
              <img src="images/person_transparent_2.png" alt="Image" class="img-fluid mb-0">
            </div>
          </div>
        </div>

        <div class="container">
          <div class="row">
            <div class="col-lg-6 align-self-center text-center text-lg-left">
              <blockquote>
                <p>&ldquo;Soluta quasi cum delectus eum facilis recusandae nesciunt molestias
                  accusantium libero dolores repellat id in dolorem laborum ad modi qui at quas
                  dolorum voluptatem voluptatum repudiandae.&rdquo;</p>
                <p><cite> &mdash; Chris Peters, @Google</cite></p>
              </blockquote>
            </div>
            <div class="col-lg-6 align-self-end text-center text-lg-right">
              <img src="images/person_transparent.png" alt="Image" class="img-fluid mb-0">
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
