<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Restaurante;

class RestauranteApi extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Restaurante::all();
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
        $restaurante = new Restaurante();
         
        $restaurante->nombre = $request->nombre;
        $restaurante->horario = $request->horario;
        $restaurante->calle = $request->calle;
        $restaurante->nExterior = $request->nExterior;
        $restaurante->colonia = $request->colonia;
        $restaurante->cp = $request->cp;
        $restaurante->delegacion = $request->delegacion;
        $restaurante->estado = $request->estado;
        $restaurante->usuarioId = $request->usuarioId;

        $restaurante->save();
        return $restaurante;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $restaurante = \DB::table('restaurante')
        ->select('restaurante.*')                                
            ->join('users', 'users.id', '=', 'restaurante.usuarioId')     
            ->where('users.id',$id)                               
            ->get();
            //dd($restaurante);
            return $restaurante;
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
        $restaurante = Restaurante::find($id);

        $restaurante->nombre = $request->nombre;
        $restaurante->horario = $request->horario;
        $restaurante->calle = $request->calle;
        $restaurante->nExterior = $request->nExterior;
        $restaurante->colonia = $request->colonia;
        $restaurante->cp = $request->cp;
        $restaurante->delegacion = $request->delegacion;
        $restaurante->estado = $request->estado;
        
        $restaurante->update();
        return $restaurante;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $restaurante = Restaurante::find($id);
        $restaurante->delete();
        return $restaurante;
    }
}
