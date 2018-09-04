<?php

namespace App\Http\Controllers;

use App\Http\Controllers\LocalController;
use App\Local;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Mapper;

class MapController extends Controller
{

    public function index()
    {
        // Se obtienen los locales
        $locales = Local::get();

        // Se obtiene la ubicacion actual del usuario
        Mapper::map(0, 0, ['zoom' => 15, 'locate' => true, 'markers' => ['title' => 'Mi ubicación','animation' => 'DROP']]);

        date_default_timezone_set("America/Santiago");

        $hra_actual = date('H:i');

        // Se iteran los locales
        foreach($locales as $local){

            // Se forma la leyenda para el titulo del marcador
            $titulo = "Dirección: ". $local->direccion . "\n";

            $titulo.= "Cantidad total: " . $local->cant_est ."\n";
            $titulo.= "Cantidad disponible: " . $local->cant_disp ."\n";

            // Se pregunta si esta cerrado o abierto
            if($hra_actual>$local->hora_aten_ini && $hra_actual<$local->hora_aten_ter){
                $titulo.= "Se encuentra: ABIERTO \n";
            }else{
                $titulo.= "Se encuentra: CERRADO \n";
            }
            // Se agrega el horario
            $titulo.= "Horario de: " . $local->hora_aten_ini  . " a " . $local->hora_aten_ter . "\n";

            // Se agrega un marcador por cada local existente
            Mapper::marker($local->coor_x, $local->coor_y, ['symbol' => 'circle',
                                                            'scale' => 1000,
                                                            'title' => $titulo
                                                            ]
                            );
        }

        return view('welcome');
    }
}
