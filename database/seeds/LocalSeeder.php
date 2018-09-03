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
            'coor_x' => -23.6494637,
            'coor_y' => -70.3998571,
            'cant_est' => 10,
            'cant_disp' => 5,
            'hora_aten_ini' => '10:00',
            'hora_aten_ter' => '23:00',
            'direccion' => 'direccion de prueba 1'
        ]);

        \App\local::create([
            'coor_x' => -23.680103,
            'coor_y' => -70.4102306,
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

        \App\local::create([
            'coor_x' => -23.6688405,
            'coor_y' => -70.4044434,
            'cant_est' => 20,
            'cant_disp' => 7,
            'hora_aten_ini' => '08:00',
            'hora_aten_ter' => '22:30',
            'direccion' => 'direccion de prueba 4'
        ]);

        \App\local::create([
            'coor_x' => -23.6818139,
            'coor_y' => -70.4105976,
            'cant_est' => 20,
            'cant_disp' => 7,
            'hora_aten_ini' => '08:00',
            'hora_aten_ter' => '22:30',
            'direccion' => 'direccion de prueba 5'
        ]);

        \App\local::create([
            'coor_x' => -23.6833793,
            'coor_y' => -70.4126739,
            'cant_est' => 20,
            'cant_disp' => 7,
            'hora_aten_ini' => '08:00',
            'hora_aten_ter' => '22:30',
            'direccion' => 'direccion de prueba 6'
        ]);

        \App\local::create([
            'coor_x' => -23.6821317,
            'coor_y' => -70.4101993,
            'cant_est' => 20,
            'cant_disp' => 7,
            'hora_aten_ini' => '08:00',
            'hora_aten_ter' => '22:30',
            'direccion' => 'direccion de prueba 7'
        ]);

        \App\local::create([
            'coor_x' => -23.6814012,
            'coor_y' => -70.4133363,
            'cant_est' => 20,
            'cant_disp' => 7,
            'hora_aten_ini' => '08:00',
            'hora_aten_ter' => '22:30',
            'direccion' => 'direccion de prueba 8'
        ]);

        \App\local::create([
            'coor_x' => -23.686551,
            'coor_y' => -70.418518,
            'cant_est' => 20,
            'cant_disp' => 7,
            'hora_aten_ini' => '08:00',
            'hora_aten_ter' => '22:30',
            'direccion' => 'direccion de prueba 9'
        ]);
    }
}
