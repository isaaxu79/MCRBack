<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seguidores extends Model
{
    protected $table='seguidores';

    protected $filiable=[
        'usuarioId','restaurant_id'
    ];
}
