<!DOCTYPE html>

<html lang="{{ !isset($_COOKIE['idioma']) ? get_config('language') : $_COOKIE['idioma'] }}">

<head>

	<meta charset="utf-8">
	<meta name="Organização Atos" content="Organização Atos">
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<meta name="robots" content="index, follow">

	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
	<meta name="theme-color" content="{{ config('theme_color') }}">
	<meta name="apple-mobile-web-app-status-bar-style" content="{{ config('theme_color') }}">
	<meta name="msapplication-navbutton-color" content="{{ config('theme_color') }}">

	<title>{{ get_config('site_title') }} - @yield('title')</title>

	@include('main.layouts.styles')

	<style>
		nav {
			background-color: transparent !important;
			box-shadow: none !important;
		}

		.site-content.container:not(#content) {
			max-width: inherit;
			padding: 0;
		}

	</style>
</head>

<body class="home page-template-default page page-id-12263 dsvy-sidebar-no elementor-default elementor-kit-12597 elementor-page elementor-page-12263">

	<div id="page" class="site dsvy-parent-header-style-2">
		@include('main.layouts.header')

		@section('main')

			@yield('container')

		@show

		@include('main.layouts.footer')

		<meta name="csrf-token" content="{{ csrf_token() }}">
	</div>

	@include('main.layouts.scripts')

</body>

</html>
