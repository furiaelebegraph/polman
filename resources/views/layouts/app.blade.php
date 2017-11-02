<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Polman') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-1.9.1.min.js"
  integrity="sha256-wS9gmOZBqsqWxgIVgA8Y9WcQOa7PgSIX+rPA0VL2rbQ="
  crossorigin="anonymous"></script>
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="{{asset('css/bulma.css')}}">
        @yield('cssgaleria')
        <link rel="stylesheet" href="{{asset('css/general.css')}}">
</head>
<body>
    <div id="app">
        <nav class="navbar is-black">
          <div class="navbar-brand">
            <a class="navbar-item" href="{{url('/')}}">
              
                <img src="{{asset('img/logo_polman_blanco.png')}}" alt="Polman" >
              
            </a>
            <div class="navbar-burger burger" data-target="navMenuColorblack-example">
              <span></span>
              <span></span>
              <span></span>
            </div>
          </div>

          <div id="navMenuColorblack-example" class="navbar-menu">
            <div class="navbar-start">
              <a class="navbar-item" href="{{url('/')}}">
                Inicio
              </a>{{-- 
              <div class="navbar-item has-dropdown is-hoverable">
                <a class="navbar-link" href="/documentation/overview/start/">
                  Productos
                </a>
                <div class="navbar-dropdown">
                  <a class="navbar-item" href="/documentation/overview/start/">
                    Overview
                  </a>
                  <a class="navbar-item" href="https://bulma.io/documentation/modifiers/syntax/">
                    Modifiers
                  </a>
                  <a class="navbar-item" href="https://bulma.io/documentation/columns/basics/">
                    Columns
                  </a>
                  <a class="navbar-item" href="https://bulma.io/documentation/layout/container/">
                    Layout
                  </a>
                  <a class="navbar-item" href="https://bulma.io/documentation/form/general/">
                    Form
                  </a>
                  <hr class="navbar-divider">
                  <a class="navbar-item" href="https://bulma.io/documentation/elements/box/">
                    Elements
                  </a>
                  <a class="navbar-item is-active" href="https://bulma.io/documentation/components/breadcrumb/">
                    Components
                  </a>
                </div>
              </div> --}}
            </div>

            <div class="navbar-end">
              <div class="navbar-item">
                <div class="field is-grouped">
                  <p class="control">
                    <a class="bd-tw-button button is-black" data-social-network="Twitter" data-social-action="tweet" data-social-target="http://localhost:4000" target="_blank" href="https://www.facebook.com/">
                      <span class="icon">
                        <i class="fa fa-facebook"></i>
                      </span>
                    </a>
                  </p>
                  <p class="control">
                    <a class="bd-tw-button button is-black" data-social-network="Twitter" data-social-action="tweet" data-social-target="http://localhost:4000" target="_blank" href="https://www.instagram.com/">
                      <span class="icon">
                        <i class="fa fa-instagram"></i>
                      </span>
                    </a>
                  </p>
                </div>
              </div>
            </div>
          </div>
        </nav>

        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    @yield('jsgaleria')
    <script src='{{asset('js/general.js')}}'></script>

</body>
</html>
