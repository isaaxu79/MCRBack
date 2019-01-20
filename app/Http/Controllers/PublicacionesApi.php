<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Publicaciones;

class PublicacionesApi extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Publicaciones::all();
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
        $publicaciones = new Publicaciones();

        $publicaciones->publicacion= $request->publicacion;
        $publicaciones->restaurant_id= $request->restaurant_id;
        $publicaciones->numLikes= $request->numLikes;

        $publicaciones->save();
        return $publicaciones;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $publicaciones = \DB::table('publicaciones')
        ->select('publicaciones.*')                                             
            ->where('restaurant_id',$id)                               
            ->get();            
            return $publicaciones;
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
        $publicacion = Publicaciones::find($id);

        $publicacion->publicacion= $request->publicacion;
        $publicacion->numLikes= $request->numLikes;
        
        $publicacion->save();
        return $publicacion;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $publicacion=Publicaciones::find($id);
        $publicacion->delete();

        return Comensal::all();
    }
}
