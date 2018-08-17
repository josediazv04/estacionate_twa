<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estacionamiento extends Model
{
    public $timestamps = false;
    protected $table = 'Estacionamiento';
    protected $fillable = ['local_id', 'estado'];
}
