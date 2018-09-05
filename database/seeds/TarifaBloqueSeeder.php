<?php

use Illuminate\Database\Seeder;

class TarifaBloqueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $horario = array('08:00','09:00','10:00','11:00','12:00','13:00','14:00','15:00','16:00','17:00','18:00',
            '19:00','20:00','21:00','22:00','23:00','24:00');

        $valores = array(500,1000,1500,2000,250,750,1300,300,800,2500,3000);

        for($i=1;$i<10;$i++){
            for($j=0;$j<count($horario)-1;$j++){
                \App\tarifabloque::create([
                    'valor' => array_random($valores),
                    'hora_ini' => $horario[$j],
                    'hora_ter' => $horario[$j+1],
                    'local_id' => $i
                ]);
            }
        }
    }
}
