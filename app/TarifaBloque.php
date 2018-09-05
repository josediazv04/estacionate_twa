<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TarifaBloque extends Model
{
    public $timestamps = false;
    protected $table = 'tarifa_bloque';
    protected $fillable = ['local_id', 'valor','hora_ini','hora_ter'];
}
