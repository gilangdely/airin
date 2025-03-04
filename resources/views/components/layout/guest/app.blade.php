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
            height: 100vh;
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
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            margin: 0 10px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .team-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
        }

        .team-card .card-body {
            padding: 1.5rem;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .team-card .card-title {
            font-size: 1.25rem;
            font-weight: bold;
        }

        .team-card .card-text {
            font-size: 0.9rem;
        }

        .team-card .rounded-circle {
            border: 4px solid #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 120px;
            height: 120px;
            object-fit: cover;
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
        .ian-card {
            position: relative;
        }

        .footer {
            position: relative;
            padding: 2rem 0;
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

        /* Tombol outline */
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


        /* Atur margin dan posisi card untuk layar kecil (mobile) */
        @media (max-width: 767.98px) {
            .title {
                font-size: 2rem;
                line-height: 2.5rem;
            }

            .gilang-card {
                top: 30px;
            }

            .fauzan-card {
                top: 60px;
            }

            .dodo-card {
                top: 90px;
            }

            .ian-card {
                top: 120px;
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

            /* Gaya dasar untuk tombol */
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
                top: 2rem;
                padding: 1.5rem 0;
            }

            .footer p {
                font-size: 0.9rem;
            }
        }

        /* Atur margin kolom untuk layar medium (tablet) */
        @media (min-width: 768px) and (max-width: 991.98px) {
            .title {
                font-size: 2rem;
                line-height: 2.5rem;
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

            .footer {
                top: 2rem;
            }
        }

        /* Atur margin kolom untuk layar besar (desktop) */
        @media (min-width: 992px) {
            .title {
                font-size: 2rem;
                line-height: 2.5rem;
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

            .footer {
                top: 2rem;
            }
        }

        /* Penyesuaian tambahan untuk layar sangat kecil (mobile kecil) */
        @media (max-width: 576px) {
            .title {
                font-size: 2rem;
                line-height: 2.5rem;
            }

            .team-card .card-body {
                padding: 0.75rem;
            }

            .team-card .rounded-circle {
                width: 90px;
                height: 90px;
            }

            .footer {
                top: 5rem;
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
