<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="">

<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">

<title>@yield('title') &dash; {{ config('app.name', 'Laravel') }}</title>
<meta name="csrf-token" content="{{ csrf_token() }}">

<!-- Styles -->
<link rel="shortcut icon" type="image/x-icon" href="{{ asset('frontend/images/favicon.ico') }}">
<link href="{{ asset('frontend/css/bootstrap.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('frontend/fonts/fontawesome/css/fontawesome-all.min.css') }}" type="text/css" rel="stylesheet">
<link href="{{ asset('frontend/plugins/fancybox/fancybox.min.css') }}" type="text/css" rel="stylesheet">
<link href="{{ asset('frontend/plugins/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
<link href="{{ asset('frontend/plugins/owlcarousel/assets/owl.theme.default.css') }}" rel="stylesheet">
<link href="{{ asset('frontend/css/ui.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('frontend/css/responsive.css') }}" rel="stylesheet" media="only screen and (max-width: 1200px)" />
@stack('stylesheet')

<!-- Additional CSS Libraries -->
@yield('additional_css')