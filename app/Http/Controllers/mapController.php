<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mapper;

class mapController extends Controller
{

    public function index()
    {

        /*Mapper::map (-23.657271, -70.400490, ['zoom' => 15, 'markers' => ['title' => 'My
        Location','animation' => 'DROP'], 'clusters' => ['size' => 10, 'center' => true, 'zoom'=>20]]);

        $direccionesX = [-23.658243, -23.657457, -23.656631];
        $direccionesY = [-70.400022, -70.399153, -70.399968];
        for($i = 0; $i < 3; $i++){
            Mapper::marker($direccionesX[$i], $direccionesY[$i], ['symbol' => 'circle', 'scale' => 1000]);
        }

        Mapper::marker(-23.657202, -70.401854, ['symbol' => 'circle', 'scale' => 1000]);*/

        Mapper::map(0, 0, ['zoom' => 15, 'locate' => true, 'markers' => ['title' => 'Mi ubicación','animation' => 'DROP']]);

        return view('welcome');
    }
}
