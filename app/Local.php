<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Local extends Model
{
    public $timestamps = false;
    protected $table = 'Local';
    protected $fillable = ['coor_x','coor_y','cant_est','cant_disp','hora_aten_ini','hora_aten_ter','direccion'];

    public function estacionamientos()
    {
        return $this->hasMany(
            Estacionamiento::class,
            'local_id'
        );
    }

    public function tarifasBloques()
    {
        return $this->hasMany(
            TarifaBloque::class,
            'local_id'
        );
    }
}
