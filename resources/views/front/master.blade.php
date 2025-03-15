<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
	<title>  دوره آنلاین و آموزش</title>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="author" content="">
	<meta name="description" content=" دوره آنلاین و آموزش">
	<link rel="shortcut icon" href='{{asset("front/assets/images/favicon.ico")}}'>
	<link rel="stylesheet" type="text/css" href='{{asset("front/assets/vendor/font-awesome/css/all.min.css")}}'>
	<link rel="stylesheet" type="text/css" href='{{asset("front/assets/vendor/bootstrap-icons/bootstrap-icons.css")}}'>
	<link rel="stylesheet" type="text/css" href='{{asset("front/assets/vendor/tiny-slider/tiny-slider.css")}}'>
	<link rel="stylesheet" type="text/css" href='{{asset("front/assets/vendor/glightbox/css/glightbox.css")}}'>
	<link rel="stylesheet" type="text/css" href='{{asset("front/assets/css/style-rtl.css")}}'>

    @livewireStyles
</head>

<body>

    <livewire:front.header/>

    {{$slot}}
    <livewire:front.footer/>

    <div class="back-top"><i class="bi bi-arrow-up-short position-absolute top-50 start-50 translate-middle"></i></div>
    @livewireScripts
    <script src="{{asset('front/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('front/assets/vendor/tiny-slider/tiny-slider-rtl.js')}}"></script>
    <script src="{{asset('front/assets/vendor/glightbox/js/glightbox.js')}}"></script>
    <script src="{{asset('front/assets/vendor/purecounterjs/dist/purecounter_vanilla.js')}}"></script>
    <script src="{{asset('front/assets/js/functions.js')}}"></script>
    <script src="https://files-de.rtl-theme.com/jsdemos/79df7d11747f944da7628dfc1c76f709661cfe8f.js?pid=257550"></script>

</body>

</html>
