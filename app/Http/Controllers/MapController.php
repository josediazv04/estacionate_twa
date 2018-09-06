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
        $longitud = $request->input('long');
        $latitud = $request->input('lati');
        // Se obtiene la ubicacion actual del usuario
        Mapper::map(0, 0, ['zoom' => 15, 'locate' => true, 'markers' => ['title' => 'Mi ubicación','animation' => 'DROP']]);

        date_default_timezone_set("America/Santiago");

        $hra_actual = date('H:i');

        // Se iteran los locales
        foreach($locales as $local) {

            // Se forma la leyenda para el titulo del marcador
            $titulo = "Dirección: " . $local->direccion . "\n";

            $total_est = Estacionamiento::where('local_id', $local->id)->get();
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
        error_log($longitud);
        error_log($latitud);
        return view('welcome');
    }
}
