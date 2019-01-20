<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Publicaciones extends Model
{
    protected $table='publicaciones';

    protected $filiable=[
        'publicacion','restaurant_id','numLikes'
    ];
}
