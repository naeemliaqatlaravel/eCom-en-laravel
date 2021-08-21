<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>@yield('title')</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">

  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" >
</head>
<body>
	{{View::make('header')}}
@yield('content')
{{View::make('footer')}}
  <script src="{{asset('assets/js/jquery.js')}}"></script>
  <script src="{{asset('assets/js/popper.js')}}"></script>
  <script src="{{asset('assets/js/popper.js.map')}}"></script>
  <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
  <script src="{{asset('assets/js/bootstrap.min.js.map')}}"></script>
</body>
</html>