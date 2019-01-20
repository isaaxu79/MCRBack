<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comensal extends Model
{
    protected $table= 'comensal';
    
    protected $filiable=[
        'nombre','apellidos','sexo','estado','victorias','usuarioId'
    ];
    protected $hidden = [
        'usuarioId',
    ];
}
