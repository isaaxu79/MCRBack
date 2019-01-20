<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Retos extends Model
{
    protected $table= 'retos';
    
    protected $filiable=[
        'nombre','descripcion','hora','fecha','cupo','estatus','numLikes','restauranteId'
    ];
}
