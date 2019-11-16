<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sembrados extends Model
{
    protected $fillable = [
    	'id',
        'lote_id',
        'cultivo_id',
        'semilla_id',
        'cantidad_semilla',
        'trabajador_id',
        'foto',
        'descripcion_labor',
        'estado_id',
        'condicion_metereologica_id',
        'created_at',
        'updated_at'
    ];
}
