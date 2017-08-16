<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>{{ config('app.name', 'Laravel') }}</title>

    <link href="{{ asset('css/stylesheets.css') }}" rel="stylesheet" type="text/css" />

    <script type='text/javascript' src='{{ asset('js/plugins/jquery/jquery.min.js') }}'></script>
    <script type='text/javascript' src='{{ asset('js/plugins/jquery/jquery-ui.min.js') }}'></script>
    <script type='text/javascript' src='{{ asset('js/plugins/jquery/jquery-migrate.min.js') }}'></script>
    <script type='text/javascript' src='{{ asset('js/plugins/jquery/globalize.js') }}'></script>
    <script type='text/javascript' src='{{ asset('js/plugins/bootstrap/bootstrap.min.js') }}'></script>

    <script type='text/javascript' src='{{  asset('js/plugins/uniform/jquery.uniform.min.js') }}'></script>
    <!-- Scripts -->
    @yield('scripts')

    <script type='text/javascript' src='{{ asset('js/plugins.js') }}'></script>
    <script type='text/javascript' src='{{ asset('js/actions.js') }}'></script>


</head>
<body class="bg-img-num1">
<div class="container">

    @yield('nav')

    @yield('content')

</div>

</body>
</html>