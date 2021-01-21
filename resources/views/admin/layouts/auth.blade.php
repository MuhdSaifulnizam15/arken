<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('admin.partials.head')
</head>
<body>
    <div id="app">
      <section class="section">
        <div class="container mt-5">
          <div class="row">
            @yield('content')
          </div>
        </div>
      </section>

      @include('admin.partials.js')
    </div>
</body>
</html>