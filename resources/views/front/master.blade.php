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

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .checkout-container {
            max-width: 700px;
            background: #ffffff;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            padding: 30px;
            margin-top: 50px;
        }
        .form-control {
            border-radius: 8px;
        }
        .btn-primary {
            background-color: #066ac9;
            border: none;
            border-radius: 8px;
            transition: 0.3s;
            padding: 12px;
            font-size: 18px;
        }
        .btn-primary:hover {
            background-color: #0559a6;
        }
        .card-title {
            font-weight: bold;
            font-size: 22px;
        }
    </style>
    
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
