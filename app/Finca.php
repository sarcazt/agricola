<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Finca extends Model
{	

    protected $fillable = [
    	'id',
        'departamento_id',
        'ciudad_id',
        'direccion',
        'telefono'
    ];

}
