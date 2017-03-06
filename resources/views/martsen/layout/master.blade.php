<!DOCTYPE html>
<html lang="pt-br">
<head>
    <!-- TODO TITULO PAGINA, DESCRIÇÃO E KEYWORDS -->
    <title>MyCopy</title>
    <meta name="description" content="Six Revisions is a blog that shares useful information about web development and design, dedicated to people who build websites." />
    <meta name="keywords" content="web design, web development" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSS BASE -->
    <link rel="stylesheet" href="{{  URL::asset('assets/bootstrap/css/bootstrap.css') }}">
    <!-- cSS BASE -->

    @yield('css')

</head>
<body>
    <div class="col-md-12">
        @yield('content')
    </div>

    <!-- Load JS -->
    <script src="{{  URL::asset('assets/jquery/jquery-3.1.1.min.js') }}"></script>
    <script src="{{  URL::asset('assets/bootstrap/js/tether.min.js') }}"></script>
    <script src="{{  URL::asset('assets/bootstrap/js/bootstrap.min.js') }}"></script>
    <!-- load js -->

    @yield('js')

</body>
</html>