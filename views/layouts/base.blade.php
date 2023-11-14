<!DOCTYPE html>
@include('elements.base')
@php
    $colorMap = [
        'red' => '#c0392b',
        'blue' => '#007bff',
        'green' => '#00db12',
        'purple' => '#9500ff',
        'orange' => '#ffa600',
        'yellow' => '#fff700',
        'aqua' => '#00fbff',
        'pink' => '#ff00cc',
    ];

    $theme = theme_config('color', 'blue');
    $themeColor = $colorMap[$theme] ?? $theme;
@endphp
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="format-detection" content="telephone=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="@yield('description', setting('description', ''))">
    <meta name="theme-color" content="{{ $themeColor }}">
    <meta name="author" content="Yuketsu">

    <meta property="og:title" content="@yield('title')">
    <meta property="og:type" content="@yield('type', 'website')">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:image" content="{{ favicon() }}">
    <meta property="og:description" content="@yield('description', setting('description', ''))">
    <meta property="og:site_name" content="{{ site_name() }}">

    <meta property="twitter:title" content="@yield('title')">
    <meta property="twitter:url" content="{{ url()->current() }}">
    <meta property="twitter:image" content="{{ favicon() }}">
    <meta property="twitter:description" content="@yield('description', setting('description', ''))">
    <meta property="twitter:site_name" content="{{ site_name() }}">
    @stack('meta')

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ favicon() }}">

    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}" defer></script>
    <script src="{{ asset('vendor/axios/axios.min.js') }}" defer></script>
    <script src="{{ asset('js/script.js') }}" defer></script>
    <script src="{{ theme_asset('js/rx-lazy.js') }}" defer></script>
    <script src="{{ theme_asset('js/scripts.js') }}" defer></script>
    <script src="{{ theme_asset('js/slick.min.js') }}" defer></script>
    <script src="{{ theme_asset('js/clipboard.js') }}" defer></script>
    <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
	<script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js" defer></script>
	<script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.lazy/1.7.9/jquery.lazy.min.js" defer></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.lazy/1.7.9/jquery.lazy.plugins.min.js" defer></script>
    @stack('scripts')

    <link href="{{ asset('vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/base.css') }}" rel="stylesheet">
    <link href="{{ theme_asset('css/critical.css') }}" rel="stylesheet">
    <link href="{{ theme_asset('css/main.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ theme_asset('css/slick.min.css') }}">
    <link rel="stylesheet" href="{{ theme_asset('css/bootstrap-grid.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />
    @stack('styles')
    @include('elements.theme-color', ['color' => $themeColor])
</head>
<body id="home" class="home preloader-active" style="background-image: url({{ theme_asset('images/bg-body.svg') }});" x-data="body">
@include('elements.navbar')
<div id="app" class="containers">
	<div class="preloader-cover">
		<div class="preloader">
			<div class="ajax-loader">
				<div class="ajax-loader-logo">
					<div class="ajax-loader-circle">
						<svg class="ajax-loader-circle-spinner" viewBox="0 0 500 500" xml:space="preserve">
							<circle cx="250" cy="250" r="239" />
						</svg>
					</div>
					<div class="ajax-loader-letters"><img src="{{ site_logo() }}"></div>
				</div>
			</div>
		</div>
	</div>
    @yield('app')
</div>
<footer>
    @include('elements.footer')
</footer>
<a class="to-top" href="#home">
    <i class="bi bi-chevron-up" aria-hidden="true"></i>
    <span><img src="{{ site_logo() }}" alt=""></span>
</a>

@stack('footer-scripts')

</body>
</html>