<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Ubicacion;

class UbicacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ubicaciones = Ubicacion::all();
        return view('ubicacion.index',['ubicaciones'=>$ubicaciones]);
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
        $request->validate([
            'ubicacion'=>'required',
            'capacidad' => 'required'
        ]);
        $ubicacion = new Ubicacion;
        $ubicacion->nombreUbicacion = $request->ubicacion;
        $ubicacion->capacidadUbicacion = $request->capacidad;
        $ubicacion->save();
        return redirect()->route('ubicacion.index')->with('success','Ubicacion Creado');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ubicacion = Ubicacion::find($id);
        return view('ubicacion.show',['ubicacion' => $ubicacion]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ubicacion = Ubicacion::find($id);
        return view('ubicacion.edit',['ubicacion' => $ubicacion]);
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
        $request->validate([
            'ubicacion'=>'required',
            'capacidad' => 'required'
        ]);
        $ubicacion = Ubicacion::find($id);
        $ubicacion->nombreUbicacion = $request->ubicacion;
        $ubicacion->capacidadUbicacion = $request->capacidad;
        $ubicacion->save();
        return redirect()->route('ubicacion.index')->with('success','Ubicacion Creado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ubicacion = Ubicacion::find($id);
        $ubicacion->delete();
        return redirect()->route('ubicacion.index')->with('success','Ubicacion Eliminado');
    }
}
