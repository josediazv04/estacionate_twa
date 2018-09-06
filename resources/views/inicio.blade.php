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
            <h2>¿De qué trata la aplicación?</h2>
            <br>
            <img src="img/estacionamiento.jpg" alt="" width="80%" height="80%">
            </br>
            <br>
            <h3> La aplicación sirve para encontrar los locales de estacionamientos cercanos y para revisar la disponibilidad
            de estacionamientos que tienen, mostrando también sus tarifas por bloque y si se encuentra abierto o cerrado en
            este mismo momento. ¡Prueba ingresando al mapa por el botón que encuentras aquí abajo!</h3>
            <br>
            <form name="formulario" action="/mapa" role="form">
                <input name="long" id="posi" type="hidden" value="xx2" onload="getLocation()">
                <input name="lati" id="posi2" type="hidden" value="xx2">
                <button type="submit" class="btn btn-success"><b><h4>¡Ingresa al Mapa!</h4></b></button>
            </form>
            <br>
            {{--<button type="hidden" class="btn btn-primary" onload="getLocation()"><b><h4>¡Obten tu posición!</h4></b></button>--}}
        </div>
    </section>
</section>
<footer>
    <p>Esta es solo una versión de prueba y no representa el diseño final de la aplicación.</p>
    <p>José Díaz - John Quiñones</p>
</footer>

<script>
    var x = document.getElementById("posi");
    var y = document.getElementById("posi2");

    function getLocation() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showPosition);
        } else {
            x.innerHTML = "Geolocation is not supported by this browser.";
        }
    }

    function showPosition(position) {
        x.value = position.coords.longitude;
        y.value = position.coords.latitude;
    }
</script>

</body>
</html>

