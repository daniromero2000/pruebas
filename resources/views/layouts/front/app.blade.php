@php
$url = "{$_SERVER['REQUEST_URI']}";
$activeHome = ($_SERVER['REQUEST_URI'] == '/') ? 'activenavlink ' : '' ;
$activeQuienes = ($_SERVER['REQUEST_URI'] == '/front/about') ? 'activenavlink ' : '' ;
$activeAsociarse = ($_SERVER['REQUEST_URI'] == '/front/asociarse') ? 'activenavlink ' : '' ;
$activeBeneficios = ($_SERVER['REQUEST_URI'] == '/front/beneficios') ? 'activenavlink ' : '' ;
$activeTasas = ($_SERVER['REQUEST_URI'] == '/front/tarifas') ? 'activenavlink ' : '' ;
$activeDirectorio = ($_SERVER['REQUEST_URI'] == '/front/directorio') ? 'activenavlink ' : '' ;
$activeLogin = ($_SERVER['REQUEST_URI'] == '/login') ? 'activenavlink ' : '' ;
@endphp

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name') }}</title>
    <link href="http://www.Model.org/" rel="canonical" />
    <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.css" rel="stylesheet"
        type='text/css'>
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Lato" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">
    <!-- Normalize MIT -->
    <link href="{{ asset('css/normalizeMIT.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/front/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/front/front.css') }}" rel="stylesheet">
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
</head>

<body>
    @yield('content')

    @yield('js')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.2/js/tether.min.js"></script>
    <script src="{{ asset('js/jquery-3.4.0.min.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>