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

        // Se iteran los locales
        foreach($locales as $local){
            // Se agrega un marcador por cada local existente
            Mapper::marker($local->coor_x, $local->coor_y, ['symbol' => 'circle',
                                                            'scale' => 1000,
                                                            'title' => $local->direccion
                                                            ]
                            );

        }

        return view('welcome');
    }
}
