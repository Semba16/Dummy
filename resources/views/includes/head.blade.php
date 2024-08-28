<meta charset="utf-8" />
<title>
  {{ env('APP_NAME') }} | @yield('title')
</title>
<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
<meta content="{{ $metaDescription ?? '' }}" name="description" />
<meta content="{{ $metaAuthor ?? '' }}" name="author" />
<meta name="csrf-token" content="{{ csrf_token() }}">

<!-- ================== BEGIN BASE CSS STYLE ================== -->
<link href="{{ asset('assets/css/vendor.min.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/css/app.min.css') }}" rel="stylesheet" />
<!-- ================== END BASE CSS STYLE ================== -->

@stack('css')
