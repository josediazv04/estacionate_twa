<?php

use Illuminate\Database\Seeder;

class EstacionamientoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Estacionamiento::class, 100)->create();
    }
}
