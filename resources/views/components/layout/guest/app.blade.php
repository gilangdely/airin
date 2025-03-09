<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="light-style layout-menu-fixed layout-compact"
    dir="ltr" data-style="light">

<head>
    <meta charset="utf-8">
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ !empty($title) ? $title : config('app.name', 'Prabubima Tech') }}</title>

    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/img/favicon/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/img/favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/img/favicon/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('assets/img/favicon/site.webmanifest') }}">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('assets/vendor/fonts/boxicons.css') }}" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/core.css') }}" class="template-customizer-core-css">
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/theme-default.css') }}"
        class="template-customizer-theme-css">
    <link rel="stylesheet" href="{{ asset('assets/css/demo.css') }}">

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}">

    <!-- Page CSS -->
    <!-- Page -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/pages/page-auth.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/aos/aos.css') }}" />

    <!-- AOS CSS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">


    <style media="print">
        .noprint {
            display: none;
        }
    </style>

    @stack('style')

    <style>
        .main-container {
            position: relative;
        }

        .main-bg {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 100%;
            height: 100%;
            object-fit: cover;
            z-index: -1;
        }

        h4.section-title {
            font-size: 32px;
            font-weight: 700;
            margin-bottom: 20px;
            padding-bottom: 20px;
            text-transform: uppercase;
            position: relative;
        }

        h4.section-title:before {
            content: "";
            position: absolute;
            display: block;
            width: 160px;
            height: 2px;
            background: color-mix(in srgb, var(--bs-white), transparent 60%);
            left: 0;
            right: 0;
            bottom: 1px;
            margin: auto;
        }

        h4.section-title::after {
            content: "";
            position: absolute;
            display: block;
            width: 60px;
            height: 3px;
            background: var(--bs-primary);
            left: 0;
            right: 0;
            bottom: 0;
            margin: auto;
        }

        .text-gradient {
            background: linear-gradient(90deg, #007bff, #8a2be2);
            background-clip: text;
            color: transparent;
        }

        .title {
            line-height: 3.8rem;
        }

        .btn-gradient {
            border-radius: 50px;
            padding: 0.75rem 1.5rem;
            font-size: 1rem;
            font-weight: 600;
            background: linear-gradient(90deg, #1e90ff, #9370db);
            color: #fff;
            transition: all 0.3s ease-in-out;
        }

        .btn-gradient:hover {
            background: transparent;
            border: 1.5px solid #1e90ff;
            color: #1e90ff;
        }

        .testimoni-text-gradient {
            background: linear-gradient(90deg, #1e90ff, #9370db);
            background-clip: text;
            color: transparent;
        }

        .feature-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .feature-card:hover {
            transform: translateY(-5px);
        }

        .team-card {
            transition: all 0.3s ease;
            border-radius: 12px;
            overflow: visible;
            border: none;
            margin-bottom: 15px;
        }

        .team-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }

        .team-card .card-body {
            padding: 1.5rem;
            padding-top: 4rem;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .team-card .card-title {
            font-weight: 600;
            margin-top: 40px;
            margin-bottom: 8px;
        }

        .team-card .social-icon i {
            transition: all 0.3s ease;
        }

        .team-card .social-icon:hover i.text-github {
            color: #333 !important;
            transform: scale(1.2);
        }

        .team-card .social-icon:hover i.text-instagram {
            color: #e1306c !important;
            transform: scale(1.2);
        }

        .team-card .social-icon:hover i.text-person {
            color: #0077b5 !important;
            transform: scale(1.2);
        }

        .team-card .social-icon:hover i.text-journals {
            color: #ea4335 !important;
            transform: scale(1.2);
        }

        .team-card .card-text {
            font-size: 0.9rem;
            margin-bottom: 1rem;
        }

        .team-card .rounded-circle {
            border: 4px solid #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 120px;
            height: 120px;
            object-fit: cover;
            transform: scale(1.05);
        }

        .team-card .social-icon {
            transition: color 0.3s ease;
        }

        .team-card .social-icon:hover {
            color: #007bff !important;
        }

        #our-team .row {
            margin: 0 -10px;
        }

        .gilang-card,
        .fauzan-card,
        .dodo-card,
        .auliaHamdi-card,
        .ian-card {
            position: relative;
        }

        .footer {
            position: relative;
        }

        @keyframes ping {
            0% {
                transform: scale(0.8);
                opacity: 0.7;
            }

            100% {
                transform: scale(2.4);
                opacity: 0;
            }
        }

        .animate-ping {
            animation: ping 1.5s cubic-bezier(0, 0, 0.2, 1) infinite;
        }

        .accordion-button {
            font-size: 1.1rem;
            font-weight: 500;
        }

        .accordion-button:not(.collapsed) {
            background-color: #f8f9fa;
            color: #000;
        }

        .accordion-body {
            padding: 1rem 1.25rem;
        }

        .btn-acordion-wa {
            border-radius: 5px;
            padding: 0.5rem 1rem;
            font-size: 14px;
            background: linear-gradient(90deg, #34a853, #0f9d58);
            color: #fff;
            text-decoration: none;
            border: none;
            cursor: pointer;
            transition: all 0.3s ease-in-out;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .btn-acordion-wa:hover {
            background: linear-gradient(90deg, #4caf50, #1db954);
            color: #fff;
        }

        .btn-acordion-gm {
            border-radius: 5px;
            padding: 0.5rem 1rem;
            font-size: 14px;
            background: linear-gradient(90deg, #1e90ff, #9370db);
            color: #fff;
            text-decoration: none;
            border: none;
            cursor: pointer;
            transition: all 0.3s ease-in-out;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .btn-acordion-gm:hover {
            background: linear-gradient(90deg, #4aa8ff, #ab8cff);
            color: #fff;
        }

        .btn-outline-primary {
            border-color: #007bff;
            color: #007bff;
        }

        .btn-outline-primary:hover {
            background-color: #007bff;
            color: #fff;
        }

        .fancy-line {
            border: 0;
            height: 1px;
            background: linear-gradient(to right, #007bff, rgba(0, 0, 0, 0), #8a2be2);
            margin: 20px 0;
            position: relative;
        }

        .fancy-line::before {
            content: '';
            position: absolute;
            left: 50%;
            top: -10px;
            transform: translateX(-50%);
            width: 50px;
            height: 5px;
            background-color: #000;
            border-radius: 5px;
        }

        /* mini Mobile */
        @media (max-width: 575.98px) {
            .title {
                font-size: 2rem;
                line-height: 2.5rem;
            }

            .left-faq {
                text-align: center;
                margin-bottom: 1.2rem;
            }

            .gilang-card {
                top: 40px;
            }

            .fauzan-card {
                top: 80px;
            }

            .dodo-card {
                top: 120px;
            }

            .auliaHamdi-card {
                top: 160px;
            }

            .ian-card {
                top: 200px;
            }

            .team-card .card-body {
                padding: 0.75rem;
            }

            .team-card .rounded-circle {
                width: 80px;
                height: 80px;
            }

            .team-card .card-title {
                font-size: 1.1rem;
            }

            .team-card .card-text {
                font-size: 0.8rem;
            }

            .team-card .social-icon i {
                font-size: 1rem;
            }

            .footer {
                top: 12rem;
                padding-bottom: 10px;
            }
        }

        /* Mobile */
        @media (min-width: 576px) and (max-width: 767.98px) {
            .title {
                font-size: 2rem;
                line-height: 2.5rem;
            }

            .left-faq {
                margin-bottom: 2rem;
            }

            .faq-text {
                text-align: center;
            }

            .gilang-card {
                top: 40px;
            }

            .fauzan-card {
                top: 80px;
            }

            .dodo-card {
                top: 120px;
            }

            .auliaHamdi-card {
                top: 160px;
            }

            .ian-card {
                top: 200px;
            }

            .col {
                margin-top: 2rem !important;
            }

            .team-card .card-body {
                padding: 1rem;
            }

            .team-card .rounded-circle {
                width: 100px;
                height: 100px;
            }

            .team-card .card-title {
                font-size: 1.15rem;
            }

            .team-card .card-text {
                font-size: 0.85rem;
            }

            .btn-acordion-wa {
                display: inline-flex;
                align-items: center;
                gap: 8px;
                padding: 8px 12px;
                margin-top: 8px;
            }

            .btn-acordion-gm {
                display: inline-flex;
                align-items: center;
                gap: 8px;
                padding: 8px 12px;
                margin-top: 8px;
            }

            .footer {
                padding-top: 12rem;
            }

            .footer p {
                font-size: 0.9rem;
            }
        }

        /* mini Tab */
        @media (min-width: 768px) and (max-width: 991.98px) {
            .title {
                font-size: 2rem;
                line-height: 2.5rem;
            }

            .dodo-card,
            .auliaHamdi-card,
            .ian-card {
                top: 30px;
            }

            .col {
                margin-top: 2rem;
            }

            .team-card .card-body {
                padding: 1.25rem;
            }

            .team-card .rounded-circle {
                width: 110px;
                height: 110px;
            }

            .team-card .card-title {
                font-size: 1.2rem;
            }

            .team-card .card-text {
                font-size: 0.9rem;
            }

            .footer {
                padding: 1.5rem 0;
            }
        }

        /* Desktop */
        @media (min-width: 992px) {
            .title {
                font-size: 2rem;
                line-height: 2.5rem;
            }

            .height-hero-features {
                height: 85vh;
            }

            .height-testimonials {
                height: 55vh;
            }

            .height-faq {
                height: 90vh;
            }

             .auliaHamdi-card, .ian-card {
                top: 30px;
            }

            .col {
                margin-top: 2rem;
            }

            .team-card .card-body {
                padding: 1.5rem;
            }

            .team-card .rounded-circle {
                width: 120px;
                height: 120px;
            }

            .team-card .card-title {
                font-size: 1.25rem;
            }

            .team-card .card-text {
                font-size: 0.9rem;
            }

            /* 4 kartu di atas, 2 kartu di bawah */
            #our-team .row {
                display: flex;
                flex-wrap: wrap;
            }

            #our-team .row .col {
                flex: 0 0 25%;
                /* 4 kartu per baris */
                max-width: 25%;
            }

            .footer {
                padding-top: 1.5rem;
            }
        }
    </style>
</head>

<body>
    <div class="layout-wrapper layout-content-navbar layout-without-menu">
        <div class="layout-container">
            <!-- Toast default -->
            @if (isset($withError) ? $withError : false)
                <x-bs-toast />
            @endif

            <!-- Navbar -->
            {{-- <x-navbar-guest /> --}}

            <!-- Konten Utama -->
            <div class="layout-page">
                {{ $slot }}
            </div>
        </div>
    </div>

    <!-- Core JS -->
    <script src="{{ asset('assets/vendor/js/helpers.js') }}"></script>
    <script src="{{ asset('assets/js/config.js') }}"></script>

    <!-- Vendors JS -->
    <script src="{{ asset('assets/vendor/libs/jquery/jquery.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/popper/popper.js') }}"></script>
    <script src="{{ asset('assets/vendor/js/bootstrap.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('assets/vendor/js/menu.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/aos/aos.js') }}"></script>

    <!-- Main JS -->
    <script src="{{ asset('assets/js/main.js') }}"></script>

    <script src="https://unpkg.com/htmx.org@2.0.4"
        integrity="sha384-HGfztofotfshcF7+8n44JQL2oJmowVChPTg48S+jvZoztPfvwD79OC/LTtG6dMp+" crossorigin="anonymous">
    </script>

    <!-- AOS JS -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            once: true
        });
    </script>

    <!-- END: Theme JS-->
    @stack('script')

    @session('noback')
        <script type="text/javascript">
            window.history.pushState(null, null, window.location.href);
            window.onpopstate = function() {
                window.history.pushState(null, null, window.location.href);
            };
        </script>
    @endsession
</body>

</html>
