<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>OMS DEBIDWAR </title>

  <!-- Bootstrap core CSS -->
  <link href="{{asset('main')}}/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="{{asset('main')}}/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

  <!-- Custom styles for this template -->
  <link href="{{asset('main')}}/css/clean-blog.min.css" rel="stylesheet">

</head>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand" href="/">OMS DEBIDWAR </a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">

          <li class="nav-item">
            <a class="nav-link" href="#">About</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="#">Contact</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Page Header -->
  <header class="masthead" style="background-image: url('{{asset('main')}}/img/rice.jpg')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="site-heading">
            <h2>বায়োমেট্রিক পদ্ধতিতে ওএমএস এর চাল বিক্রয় </h2>
            <a class="btn btn-info" href="dealer">ডিলার লগইন
            </a> &nbsp&nbsp&nbsp
            <a class="btn btn-info"  href="admin">অফিস প্রধান লগইন

            </a>
          </div>
        </div>
      </div>
    </div>
  </header>

  <!-- Main Content -->
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">

    <br>
    মোট উপকারভোগীর সংখ্যা - {{count($taker)}} <br>
    চাল উত্তোলনকারী উপকারভোগীর সংখ্যা - {{count($given)}}    <br>
    মজুদ কৃত চালের মোট পরিমান -


     @php  $total = 0;   $i = 0;  @endphp

         @foreach ($rice as $r)

               @php   $total += $r->amount;  @endphp

          @endforeach

    @php  echo   $total ;   @endphp

    <br>

    আজকের দিনে মোট বিতরণের পরিমাণ -

    @php  $total = 0;   $i = 0;  @endphp

    @foreach ($given as $g)


          @php

            $timestamp =$g->created_at;

            $date = date("d-m-Y");

            $match_date = date('d-m-Y', strtotime($timestamp));
            if($date == $match_date) {

                    $total += $g->amount;
                    $i = $i+1;

                }
        @endphp

     @endforeach

  @php  echo   $total ;   @endphp

    <br>
    আজকের দিনে চাল উত্তোলনকারী উপকারভোগীর সংখ্যা -    @php  echo   $i ;   @endphp  <br>


      </div>
    </div>
  </div>

  <hr>

  <!-- Footer -->
  <footer>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <ul class="list-inline text-center">
            <li class="list-inline-item">
              <a href="#">
                <span class="fa-stack fa-lg">
                  <i class="fas fa-circle fa-stack-2x"></i>
                  <i class="fab fa-twitter fa-stack-1x fa-inverse"></i>
                </span>
              </a>
            </li>
            <li class="list-inline-item">
              <a href="#">
                <span class="fa-stack fa-lg">
                  <i class="fas fa-circle fa-stack-2x"></i>
                  <i class="fab fa-facebook-f fa-stack-1x fa-inverse"></i>
                </span>
              </a>
            </li>
            <li class="list-inline-item">
              <a href="#">
                <span class="fa-stack fa-lg">
                  <i class="fas fa-circle fa-stack-2x"></i>
                  <i class="fab fa-github fa-stack-1x fa-inverse"></i>
                </span>
              </a>
            </li>
          </ul>
          <p class="copyright text-muted">Copyright &copy; www.omsdebidwar.gov.bd
            {{date('Y')}}</p>
        </div>
      </div>
    </div>
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="{{asset('main')}}/vendor/jquery/jquery.min.js"></script>
  <script src="{{asset('main')}}/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Custom scripts for this template -->
  <script src="{{asset('main')}}/js/clean-blog.min.js"></script>

</body>

</html>

