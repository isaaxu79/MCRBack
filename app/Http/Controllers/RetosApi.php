<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Retos;

class RetosApi extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Retos::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $reto = new Retos();

        $reto->nombre= $request->nombre;
        $reto->descripcion= $request->descripcion;
        $reto->hora= $request->hora;
        $reto->fecha= $request->fecha;
        $reto->cupo= $request->cupo;
        $reto->estatus= $request->estatus;
        $reto->numLikes= $request->numLikes;
        $reto->restauranteId= $request->restauranteId;
        
        $reto->save();
        return $reto;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $reto = \DB::table('retos')
        ->select('retos.*')                                
            ->join('restaurante', 'restaurante.id', '=', 'retos.restauranteId')     
            ->where('retos.id',$id)                               
            ->get();
            // dd($comensal);
            return $reto;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $reto= Retos::find($id);

        $reto->nombre= $request->nombre;
        $reto->descripcion= $request->descripcion;
        $reto->hora= $request->hora;
        $reto->fecha= $request->fecha;
        $reto->cupo= $request->cupo;
        $reto->estatus= $request->estatus;
        
        $reto->update();
        return $reto;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $reto= Retos::find($id);
        $reto->delete();
        return Retos::all();
    }
}
