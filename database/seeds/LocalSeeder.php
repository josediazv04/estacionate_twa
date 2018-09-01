<?php

use Illuminate\Database\Seeder;

class LocalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\local::truncate();

        \App\local::create([
            'coor_x' => -22.081373,
            'coor_y' => -70.0188886,
            'cant_est' => 10,
            'cant_disp' => 5,
            'hora_aten_ini' => '10:00',
            'hora_aten_ter' => '23:00',
            'direccion' => 'direccion de prueba 1'
        ]);

        \App\local::create([
            'coor_x' => -20.581350,
            'coor_y' => -75.1188860,
            'cant_est' => 25,
            'cant_disp' => 14,
            'hora_aten_ini' => '08:00',
            'hora_aten_ter' => '21:00',
            'direccion' => 'direccion de prueba 2'
        ]);

        \App\local::create([
            'coor_x' => -21.081310,
            'coor_y' => -71.0288852,
            'cant_est' => 20,
            'cant_disp' => 7,
            'hora_aten_ini' => '08:00',
            'hora_aten_ter' => '22:30',
            'direccion' => 'direccion de prueba 3'
        ]);
    }
}
