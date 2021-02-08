<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('site.partials.head')
</head>
<body>
    <div id="app">
      <div class="main-wrapper">
        @include('site.partials.header')
      </div>
      
      <div class="main-content">
        @yield('content')
      </div>

      @include('site.partials.footer')
      @include('site.partials.js')
    </div>
</body>
</html>