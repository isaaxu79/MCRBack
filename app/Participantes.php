<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Participantes extends Model
{
    protected $table= 'participantes';
    
    protected $filiable=[
        'retoId','comensalId'
    ];
}
