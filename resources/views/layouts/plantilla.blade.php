<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link href="{{asset('css/estilos.css')}}" rel="stylesheet">
</head>

<body class="fondo-principal @yield('body-class')">
    <h1 class="my-3 text-center">@yield('header1')</h1>
    
    @yield('content-other')

    <div class="col-12 col-md-10 offset-md-1 px-5 pt-3 pb-1 contenedor-lista">
        @yield('content-list')
    </div>
    
    <div class="col-12 col-md-10 offset-md-1 d-flex mt-3">
        @yield('content-footer')
    </div>
</body>

</html>
