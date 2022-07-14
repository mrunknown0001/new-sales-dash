<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="author" content="adam">
    <meta name="robots" content="noindex,nofollow">
    <title>@yield('title') - {{ config('app.name', 'Laravel') }}</title>
    {{-- Fonts --}}
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
    <link href="{{ asset('dist/css/style.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    {{-- Styles --}}
    @yield('styles')
    @include('includes.assets.fontawesome')
    @livewireStyles
  </head>
  <body class="font-sans antialiased">
    <div class="preloader">
      <div class="lds-ripple">
        <div class="lds-pos"></div>
        <div class="lds-pos"></div>
      </div>
    </div>
    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full"
        data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
      @include('includes.topbar')
      @include('includes.sidebar')
      <div class="page-wrapper">
        @include('includes.breadcrumb')
        <div class="container-fluid">
          @yield('content')
        </div>
        @include('includes.footer')
      </div>
    </div>
    @livewireScripts
    <script src="{{ asset('assets/libs/jquery/dist/jquery.min.js') }}"></script>
    @yield('scripts')
    <script src="{{ asset('assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js') }}"></script>
    <script src="{{ asset('dist/js/waves.js') }}"></script>
    <script src="{{ asset('dist/js/sidebarmenu.js') }}"></script>
    <script src="{{ asset('dist/js/custom.min.js') }}"></script>
    @if(Auth::check())
      <script>
        $.ajax({
          type: "GET",
          url: "{{ config('app.root_domain') . config('app.user_details_slug') . \Crypt::encryptString(Auth::user()->id) }}",
          dataType: 'json',
          success: function(response){
            $("#profile_photo").attr("src",response['profile_photo_url']);
          }
        });

        $("#farm_selector").change(function() {
          if(this.value == '') {
            this.value = "{{ session()->get('farm') }}"
            return false;
          }
          var selector_url = "{{ route('selector') }}";
          window.location.replace(selector_url + "/" + this.value);
        });
      </script>
    @endif
  </body>
</html>
