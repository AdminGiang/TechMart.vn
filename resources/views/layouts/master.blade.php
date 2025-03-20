<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="author" content="Untree.co">
  <link rel="shortcut icon" href="favicon.png">

  <meta name="description" content="" />
  <meta name="keywords" content="bootstrap, bootstrap4" />

		<!-- Bootstrap CSS -->
		<link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet">
		<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
		<link href="{{asset('assets/css/tiny-slider.css')}}" rel="stylesheet">
		<link href="{{asset('assets/css/style.css')}}" rel="stylesheet">
		    <!-- BOXICONS -->
			<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
			<!-- CSS -->

			{{-- <link rel="stylesheet" href="{{ asset('assets/css/stylelg.css') }}"> --}}

			<link rel="stylesheet" href="{{ asset('assets/css/stylelg.css') }}">
		<title> TechMart.vn </title>
	</head>

	<body>

		@include('layouts.header') 

		{{-- @include('layouts.section') --}}

		<div class="container">
			@yield('content')
		</div>

		@include('layouts.footer')


		
		<script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
		<script src="{{asset('assets/js/tiny-slider.js')}}"></script>
		<script src="{{asset('assets/js/custom.js')}}"></script>
		{{-- <script src="{{ asset('assets/js/jslogin.js') }}"></script> --}}
	</body>

</html>
