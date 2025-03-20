<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="rtl">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="author" content="">
        <meta name="description" content="Eduport - قالب HTML دوره آنلاین و آموزش">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="shortcut icon" href="{{asset('front/assets/images/favicon.ico')}}">

        <!-- Plugins CSS -->
        <link rel="stylesheet" type="text/css" href="{{asset('front/assets/vendor/font-awesome/css/all.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('front/assets/vendor/bootstrap-icons/bootstrap-icons.css')}}">

        <!-- Theme CSS -->
        <link rel="stylesheet" type="text/css" href="{{asset('front/assets/css/style-rtl.css')}}">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <main>
            <section class="p-0 d-flex align-items-center position-relative overflow-hidden">

                <div class="container-fluid">
                    <div class="row">
                        <!-- left -->
                        <div class="col-12 col-lg-6 d-md-flex align-items-center justify-content-center bg-primary bg-opacity-10 vh-lg-100">
                            <div class="p-3 p-lg-5">
                                <!-- Title -->
                                <div class="text-center">
                                    <h2 class="fw-bold fs-3">به بزرگترین انجمن ما خوش آمدید</h2>
                                    <p class="mb-0 h6 fw-light">بیایید امروز چیز جدیدی یاد بگیریم!</p>
                                </div>
                                <!-- SVG Image -->
                                <img src="{{asset('front/assets/images/element/02.svg')}}" class="mt-5" alt="">
                                <!-- Info -->
                                <div class="d-sm-flex mt-5 align-items-center justify-content-center">
                                    <!-- Avatar group -->
                                    <ul class="avatar-group mb-2 mb-sm-0">
                                        <li class="avatar avatar-sm">
                                            <img class="avatar-img rounded-circle" src="{{asset('front/assets/images/avatar/01.jpg')}}" alt="avatar">
                                        </li>
                                        <li class="avatar avatar-sm">
                                            <img class="avatar-img rounded-circle" src="{{asset('front/assets/images/avatar/02.jpg')}}" alt="avatar">
                                        </li>
                                        <li class="avatar avatar-sm">
                                            <img class="avatar-img rounded-circle" src="{{asset('front/assets/images/avatar/03.jpg')}}" alt="avatar">
                                        </li>
                                        <li class="avatar avatar-sm">
                                            <img class="avatar-img rounded-circle" src="{{asset('front/assets/images/avatar/04.jpg')}}" alt="avatar">
                                        </li>
                                    </ul>
                                    <!-- Content -->
                                    <p class="mb-0 h6 fw-light ms-0 ms-sm-3"> بیش از 100 دانشجو به ما پیوستند، حالا نوبت شماست.</p>
                                </div>
                            </div>
                        </div>

                {{ $slot }}
            </div> <!-- Row END -->
		</div>
	</section>
</main>
<!-- **************** MAIN CONTENT END **************** -->

<!-- Back to top -->
<div class="back-top"><i class="bi bi-arrow-up-short position-absolute top-50 start-50 translate-middle"></i></div>

<!-- Bootstrap JS -->
<script src="{{asset('front/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>

<!-- Template Functions -->
<script src="{{asset('front/assets/js/functions.js')}}"></script>

</body>

</html>
