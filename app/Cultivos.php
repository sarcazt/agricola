<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cultivos extends Model
{	

    protected $fillable = [
    	  'id',
        'descripcion',
        'created_at',
        'updated_at'
    ];

}