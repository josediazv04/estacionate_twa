<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>ESTACIONATE</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    </head>
    <body>
    <section class="global">
        <header>
            <div id="logo">
                ¡ESTACIÓNATE APP!
            </div>
        </header>
        <div class="clearfix"></div>
        <section>
            <div class="mx-auto text-center">
                <h2>Se han encontrado {{ $cant_locales }} estacionamientos cerca</h2>
                <h2> Busca el que mas te acomode</h2>
                <br>
                <ul class="lista-sin-punto">
                    <li><a href="/locales" class="btn btn-success"><h3>Lista de Locales</h3></a></li>
                </ul>
            </div>
            <div style="margin-left: auto; margin-right: auto; width: 500px; height: 500px;">
                {!! Mapper::render() !!}
            </div>
        </section>
    </section>
    <footer>
        <p>Esta es solo una versión de prueba y no representa el diseño final de la aplicación.</p>
        <p>José Díaz - John Quiñones</p>
    </footer>
    </body>
</html>
