<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">

	<!-- CSRF Token for AJAX calls -->
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<title>{{ config('app.name', 'CAFU Luxembourg') }}</title>

	<link rel="icon" sizes="192x192" href="{{ asset('assets/img/favicon.png') }}">

	@vite(['resources/js/app.js'])
	@stack('assets')
</head>

<body class="@yield('body-class')">

	<div id="app">
		@yield('content')
	</div>

	@yield('modals')

	@stack('scripts')

</body>

</html>
