<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lote extends Model
{
    protected $fillable = [
    	'id',
        'finca_id',
        'tamano',
        'nombre',
        //'foto',
        'area'
    ];
}
