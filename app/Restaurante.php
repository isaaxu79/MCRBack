<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Restaurante extends Model
{
    protected $table= 'restaurante';
    
    protected $filiable=[
        'nombre','horario','calle','nExterior','colonia','cp','delegacion', 'estado', 'usuarioId'
    ];
}
