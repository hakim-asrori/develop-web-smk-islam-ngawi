<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>SMK Al-Islam Ngawi</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <link rel="shortcut icon" href="{{ asset('images/logo.png') }}">

    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/app.min.css') }}" rel="stylesheet" type="text/css" id="light-style" />
    <link href="{{ asset('assets/css/app-dark.min.css') }}" rel="stylesheet" type="text/css" id="dark-style" />
    @stack('css')
</head>

<body class="authentication-bg pb-0" data-layout-config='{"darkMode":false}'>

    @yield('auth-content')

    <script src="{{ asset('assets/js/vendor.min.js') }}"></script>
    <script src="{{ asset('assets/js/app.min.js') }}"></script>
    <script src="{{ asset('assets/js/sweetalert/dist/sweetalert2.all.min.js') }}"></script>
    @stack('js')
</body>

</html>
