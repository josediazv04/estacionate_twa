<?php

namespace App\Http\Controllers;

use App\Estacionamiento;
use App\Local;
use App\TarifaBloque;

use Midnite81\GeoLocation\Contracts\Services\GeoLocation;

use App\Http\Controllers\LocalController;
use Cornford\Googlmapper\MapperServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Mapper;

class MapController extends Controller
{

    public function index(GeoLocation $geo, Request $request)
    {
        // Se obtienen los locales
        $locales = Local::get();

        // x
        $latitud = $request->input('lati');

        // y
        $longitud = $request->input('long');

        // Se obtiene la ubicacion actual del usuario
        Mapper::map(0, 0, ['zoom' => 15, 'locate' => true, 'markers' => ['title' => 'Mi ubicación','animation' => 'DROP']]);

        // Seteo zona horaria Santiago de Chile
        date_default_timezone_set("America/Santiago");

        // Se obtiene la hora actual
        $hra_actual = date('H:i');

        // Variables que contara locales disponibles
        $cant_locales = 0;
        // Se iteran los locales
        foreach($locales as $local) {

            $lat2 = $local->coor_x;
            $lon2 = $local->coor_y;

            // Se calcula la distancia entre dos puntos
            $distancia = $this->distancia_dos_coordenadas($latitud,$longitud,$lat2,$lon2);

            // Si la distancia es menor al km de radio
            if($distancia <= 1){

                // Se aumenta el numero de locales disponibles cerca del usuario
                $cant_locales++;

                // Se forma la leyenda para el titulo del marcador
                $titulo = "Dirección: " . $local->direccion . "\n";

                // Se obtiene el total de estacionamientos de un local
                $total_est = Estacionamiento::where('local_id', $local->id)->get();
                // Se obtiene el total de estacionamientos disponibles de un local
                $total_est_disp = Estacionamiento::where('local_id', $local->id)->where('estado', 0)->get();

                $titulo .= "Cantidad total: " . count($total_est) . "<br>";
                $titulo .= "Cantidad disponible: " . count($total_est_disp) . "<br>";

                // Se pregunta si esta cerrado o abierto
                if ($hra_actual > $local->hora_aten_ini && $hra_actual < $local->hora_aten_ter) {
                    $titulo .= "Se encuentra: ABIERTO" . "<br>";
                } else {
                    $titulo .= "Se encuentra: CERRADO" . "<br>";
                }
                // Se agrega el horario
                $titulo .= "Horario de: " . $local->hora_aten_ini . " a " . $local->hora_aten_ter . "<br>";

                // Se obtienen las tarifas de un local
                $tarifas = TarifaBloque::where('local_id', $local->id)->get();

                // Se agregan las tarifas
                $titulo .= "Tarifas: " . "<br>";

                foreach ($tarifas as $tarifa) {
                    $titulo .= $tarifa->hora_ini . " - ";
                    $titulo .= $tarifa->hora_ter . " valor: $";
                    $titulo .= $tarifa->valor . "<br>";
                }

                // Se agrega un marcador por cada local existente
                Mapper::informationWindow($local->coor_x, $local->coor_y, $titulo, ['open' => false, 'maxWidth' => 200, 'markers' => ['title' => $titulo]]);
            }

        }
        error_log($longitud);
        error_log($latitud);
        return view('welcome', compact('cant_locales'));
    }

    /**
     * Funcion encargada de transformar grados a radianes
     * @param $grados
     * @return valor de los grados en radianes
     */
    function grados_a_radianes($grados) {
        return $grados * pi() / 180;
    }

    /**
     * Funcion encargada de calcular la distancia entre dos coordenadas terrestres obtenidas
     * a partir de la ubicación por GPS
     * @param $lat1 corresponde a la coordenada de la latitud 1
     * @param $lon1 corresponde a la coordenada de la longitud 1
     * @param $lat2 corresponde a la coordenada de la latitud 2
     * @param $lon2 corresponde a la coordenada de la longitud 1
     * @return retorna la distancia calculada en KILOMETROS
     */
    function distancia_dos_coordenadas($lat1, $lon1, $lat2, $lon2) {

        // Se establece el radio de la tierra en KMs
        $radio_tierra = 6371;

        // Se calculan las distancia entre latitudes y longitudes en radianes
        $d_lat = $this->grados_a_radianes($lat2-$lat1);
        $d_lon = $this->grados_a_radianes($lon2-$lon1);

        // Se calculan los radianes para latitud 1 y latitud 2
        $lat1 = $this->grados_a_radianes($lat1);
        $lat2 = $this->grados_a_radianes($lat2);

        $a = sin($d_lat/2) * sin($d_lat/2) +
            sin($d_lon/2) * sin($d_lon/2) * cos($lat1) * cos($lat2);
        $c = 2 * atan2(sqrt($a), sqrt(1-$a));

        return $radio_tierra * $c;
    }
}
