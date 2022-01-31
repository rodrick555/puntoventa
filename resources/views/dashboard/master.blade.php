<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
    <meta name="author" content="Creative Tim">

    <title>Argon Dashboard - Free Dashboard for Bootstrap 4</title>

    <!-- TOASTR -->


    <link rel="icon" href="{{ asset('assets/img/brand/favicon.png') }}" type="image/png">
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
    <!-- Icons -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/nucleo/css/nucleo.css') }}" type="text/css">

    
    <link rel="stylesheet" href="{{ asset('assets/vendor/@fortawesome/fontawesome-free/css/all.min.css') }}"
        type="text/css">
    <!-- Argon CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/argon.css?v=1.2.0') }}" type="text/css">
    <link href="{{ asset('css/toast.style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/reloj.style.css') }}" rel="stylesheet">
    

    @livewireStyles
    @livewireScripts


</head>

<body>
    @include('dashboard.partials.nav')
    <div class="main-content">
        @include('dashboard.partials.cabecera')
        <div class="container-fluid mt--6">
            @yield('content')

        </div>

    </div>



    <script src="{{ asset('argon/vendor/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('argon/vendor/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('argon/vendor/js-cookie/js.cookie.js') }}"></script>
    <script src="{{ asset('argon/vendor/jquery.scrollbar/jquery.scrollbar.min.js') }}"></script>
    <script src="{{ asset('argon/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js') }}"></script>
    <!-- Argon JS -->
    <script src="{{ asset('assets/js/argon.js?v=1.2.0') }}"></script>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="{{ asset('js/toast.script.js') }}"></script>
   
    <script src="{{ asset('assets/js/reloj.script.js') }}"></script>
    <script>
        window.addEventListener('dispararToast', ({
            detail: {
                tipo,
                titulo,
                mensaje
            }
        }) => {

            $.Toast(titulo, mensaje, tipo, {
                has_icon: false,
                has_close_btn: false,
                stack: true,
                fullscreen: false,
                timeout: 5000,
                sticky: false,
                has_progress: true,
                rtl: false,
            });

        })
    </script>

    




</body>


</html>
