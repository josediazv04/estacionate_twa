<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

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
            <div>
                <div>
                    <br>
                    <h2>Lista de Locales</h2>
                    <hr/>
                    <table class="table table-bordered">
                        <tr>
                            <th>Coordenada X</th>
                            <th>Coordenada Y</th>
                            <th>Nº Estacionamientos</th>
                            <th>Nº Est. Disponibles</th>
                            <th>Hora Apertura</th>
                            <th>Hora Cierre</th>
                            <th>Dirección</th>
                        </tr>
                        @foreach($locales as $item)
                        <tr>
                            <td>{{$item['coor_x']}}</td>
                            <td>{{$item['coor_y']}}</td>
                            <td>{{$item['cant_est']}}</td>
                            <td>{{$item['cant_disp']}}</td>
                            <td>{{$item['hora_aten_ini']}}</td>
                            <td>{{$item['hora_aten_ter']}}</td>
                            <td>{{$item['direccion']}}</td>
                        </tr>
                        @endforeach
                    </table>
                    <br>
                    <a href="/" class="btn btn-danger">Volver a Página Principal</a>
                </div>
            </div>
        </section>
    </section>
    <footer>
        <p>Esta es solo una versión de prueba y no representa el diseño final de la aplicación.</p>
        <p>José Díaz - John Quiñones</p>
    </footer>
    </body>
</html>
