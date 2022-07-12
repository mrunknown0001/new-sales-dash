<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="keywords" content="Sales Dashboard">
  <meta name="description" content="Sales Dashboard Error">
  <meta name="robots" content="noindex,nofollow">
  <title>@yield('title')</title>
  <!-- <link rel="icon" type="image/png" sizes="16x16" href=""> -->
  <link href="{{ asset('dist/css/style.min.css') }}" rel="stylesheet">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
  <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
  <div class="main-wrapper">
    <div class="preloader">
      <div class="lds-ripple">
        <div class="lds-pos"></div>
        <div class="lds-pos"></div>
      </div>
    </div>
    <div class="error-box">
      <div class="error-body text-center">
        @yield('content')
        <a href="{{ route('login') }}" class="btn btn-danger btn-rounded waves-effect waves-light mb-5 text-white">{{ __('Back to Home') }}</a>
      </div>
    </div>
  </div>
  <script src="{{ asset('assets/libs/jquery/dist/jquery.min.js') }}"></script>
  <script src="{{ asset('assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
  <script>
  $(".preloader").fadeOut();
  </script>
</body>

</html>