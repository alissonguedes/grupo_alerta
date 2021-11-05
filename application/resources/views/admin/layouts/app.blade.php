<!DOCTYPE html>
<!--[if lt IE 8 ]><html class="ie ie7" lang="pt-bt"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="pt-br"> <![endif]-->
<!--[if (gte IE 8)|!(IE)]><!-->
<html lang="{{ !isset($_COOKIE['idioma']) ? get_config('language') : $_COOKIE['idioma'] }}">
	<!--<![endif]-->

	<head>

		<meta charset="utf-8">

		<meta name="description" content="{{ get_config('site_description') }}" />
		<meta name="keywords" content="{{ get_config('site_tags') }}" />
		<meta name="robots" content="index, follow">

		<meta name="theme-color" content="{{ get_config('theme_color') }}">
		<meta name="apple-mobile-web-app-status-bar-style" content="{{ get_config('theme_color') }}">
		<meta name="msapplication-navbutton-color" content="{{ get_config('theme_color') }}">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">

		<title>
			{{ get_config('site_title') }} - @yield('title')
		</title>

		@include('admin.layouts.styles')

	</head>

	<body>

		<div id="body">

			@include('admin.layouts.header')
			@include('admin.layouts.sidebar')

			@section('container')

			<div id="main">

				<div class="row">

					<div class="col s12">

						<div class="container">

							<div class="section vertical-dashboard">
								@yield('content')
							</div>

						</div>

					</div>

				</div>

				<meta name="csrf-token" content="{{ csrf_token() }}">

			</div>

			@include('admin.layouts.footer')

			@show

		</div>

		@include('admin.layouts.scripts')

	</body>

</html>
