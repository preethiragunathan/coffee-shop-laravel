<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<title>The Coffee Shop</title>
<!-- Bootstrap core CSS -->
<link href="{{ static_asset('user/assets/css/bootstrap.min.css') }}" rel="stylesheet">
<style>
  .bd-placeholder-img {
    font-size: 1.125rem;
    text-anchor: middle;
    -webkit-user-select: none;
    -moz-user-select: none;
    user-select: none;
  }

  @media (min-width: 768px) {
    .bd-placeholder-img-lg {
      font-size: 3.5rem;
    }
  }
</style>
<!-- Custom styles for this template -->
<link href="{{ static_asset('user/assets/css/product.css') }}" rel="stylesheet">
<link href="{{ static_asset('user/assets/css/signin.css') }}" rel="stylesheet">
<link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
</head>
<body>
	@include('user.inc.header')

  @yield('main')

	@yield('body')

	@include('user.inc.footer')
<script src="{{ static_asset('user/assets/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ static_asset('user/assets/js/jquery.min.js') }}"></script>
	@yield('script')
</body>
</html>