<html lang="pt-br">

<head>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css">
    <title>{{ $titulo }}</title>

</head>

<body>

    <div class="container py-4">
        <div class="row">
            <div class="col">
                @if ($cabecalho != '')
                    <h3 class="text-secondary"><b>{{ $cabecalho }}</b></h3>
                @endif
            </div>
        </div>
        <hr>
        @yield('conteudo')
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>
@yield('script')

</html>
