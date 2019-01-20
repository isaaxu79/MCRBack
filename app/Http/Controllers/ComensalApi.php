<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comensal;

class ComensalApi extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Comensal::all();
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
        $comensal = new Comensal();

        $comensal->nombre= $request->nombre;
        $comensal->apellidos= $request->apellidos;
        $comensal->sexo= $request->sexo;
        $comensal->estado= $request->estado;
        $comensal->victorias= $request->victorias;
        $comensal->usuarioId= $request->usuarioId;
        
        $comensal->save();
        return $comensal;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $comensal = \DB::table('comensal')
        ->select('comensal.*')                                
            ->join('users', 'users.id', '=', 'comensal.usuarioId')     
            ->where('users.id',$id)                               
            ->get();
            return $comensal;
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
        $comensal = Comensal::find($id);
        $comensal->nombre = $request->nombre;
        $comensal->apellidos = $request->apellidos;
        $comensal->sexo = $request->sexo;
        $comensal->estado = $request->estado;
        $comensal->update();

        return $comensal;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comensal=Comensal::find($id);
        $comensal->delete();

        return Comensal::all();
    }
}
