<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comensal;
use App\Restaurante;
use App\Participantes;
use App\Seguidores;

class ComenController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function get($id){
        return Comensal::where('usuarioId',$id)->get();
    }
    public function gets($id){
        return Restaurante::where('usuarioId',$id)->get();
    }
    public function best(){
        return Comensal::orderBy('victorias','desc')->get();
    }
    public function bestres(){
        $comensal = \DB::table('seguidores')
        ->select(\DB::raw('count(restaurant_id) as i, restaurant_id'))
        ->groupBy('restaurant_id')
        ->orderBy('i','desc');
        $users = \DB::table('restaurante')
        ->joinSub($comensal,'comensal', function($join){
            $join->on('restaurante.id','=','comensal.restaurant_id');
        })->get();

        return $users;
    }
    public function data($id,$id2){
        return Seguidores::where('restaurant_id',$id)->where('usuarioId',$id2)->get();
    }
    public function delet($id,$id2){
        $seguidores = Seguidores::where('restaurant_id',$id)->where('usuarioId',$id2);
        $seguidores->delete();
        return Seguidores::all();
    }

    public function show($id){
        // select retos.*
        //     from mex_retos.retos inner join mex_retos.participantes
        //     on retos.id = participantes.retoId
        //     where participantes.comensalId = 1
        $comensal = \DB::table('retos')
                ->select('retos.*')                                
                ->join('participantes', 'retos.id', '=', 'participantes.retoId')     
                ->where('participantes.comensalId',$id)                               
                ->get();
                // dd($comensal);
                return $comensal;
    }
    
}
