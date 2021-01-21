<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('admin.partials.head')
</head>
<body>
    <div id="app">
      <div class="main-wrapper">
        @include('admin.partials.navbar')
        @include('admin.partials.sidebar')
      </div>
      
      <div class="main-content">
        @yield('content')
      </div>

      @include('admin.partials.footer')
      @include('admin.partials.js')
    </div>
</body>
</html>