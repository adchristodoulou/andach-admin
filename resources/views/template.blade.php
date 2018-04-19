  
<!DOCTYPE html>
<html lang="en">

  <head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-108867511-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-108867511-1');
    </script>



    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="@yield('meta-description', 'Andach Admin')">
    <meta name="author" content="">

    <title>@yield('title', 'Andach Admin')</title>

    <!-- Bootstrap core CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/dragula/3.7.2/dragula.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-social/5.1.1/bootstrap-social.min.css" rel="stylesheet"><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.2.5/jquery.fancybox.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/assets/owl.theme.default.min.css">

    <!-- Custom styles for this template -->
    <link href="/css/app.css" rel="stylesheet">
  </head>

  <body>

      <!-- Navigation -->
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
          <div id="navbar-title">
            <a class="navbar-brand" href="/">Andach Admin</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item active">
                <a class="nav-link" href="/">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('company.index') }}">Companies</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('costcode.index') }}">Cost Codes</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('job.index') }}">Jobs</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('jobgrade.index') }}">Job Grades</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('position.index') }}">Positions</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('reportingunit.index') }}">Reporting Units</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('reportingunitarea.index') }}">Reporting Unit Areas</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">Login</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>

    @if (Session::has('success'))
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div class="alert alert-success"><b>Success:</b> {!! Session::get('success') !!}</div>
        </div>
      </div>
    </div>
    @endif

    @if (Session::has('danger'))
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div class="alert alert-danger"><b>Error:</b> {!! Session::get('danger') !!}</div>
        </div>
      </div>
    </div>
    @endif

    @if (isset($errors))
      @if ($errors->any())
      <div class="container" id="errorscontainer">
        <div class="alert alert-danger">
          <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      </div>
      @endif
    @endif

    <!-- Page Content -->
    <div class="container" id="contentcontainer">
      @yield('content')
    </div>

    <!-- Footer -->
    @include('footer')

    <!-- Bootstrap core JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!--If we use the CDN version rather than the self-hosted it doesn't work. Yay programming!-->
    <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.5/esm/popper.min.js"></script>-->
    <script src="/js/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dragula/3.7.2/dragula.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/owl.carousel.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/justgage/1.2.9/justgage.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.2.7/raphael.min.js"></script>

    @yield('javascript')

  </body>

</html>
