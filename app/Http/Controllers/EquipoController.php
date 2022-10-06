<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Equipo;

class EquipoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $equipos = Equipo::all();
        return view('equipo.index',['equipos'=>$equipos]);
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
        $equipo = new Equipo;
        $request->validate([
            'marca'=>'required',
            'serial'=>'required',
            'descripcion'=>'required',
            'fechaCompra'=>'required',
        ]);
        $equipo->marcaEquipo = $request->marca;
        $equipo->serialEquipo = $request->serial;
        $equipo->descripcionEquipo = $request->descripcion;
        $equipo->fechaCompraEquipo = $request->fechaCompra;
        $equipo->save();
        return redirect()->route('equipo.index')->with('success', 'Equipo Creado');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $equipo = Equipo::find($id);
        return view('equipo.show',['equipo' => $equipo]);
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
        $request->validate([
            'marca'=>'required',
            'serial'=>'required',
            'descripcion'=>'required',
            'fechaCompra'=>'required',
        ]);
        $equipo = Equipo::find($id);
        $equipo->marcaEquipo = $request->marca;
        $equipo->serialEquipo = $request->serial;
        $equipo->descripcionEquipo = $request->descripcion;
        $equipo->fechaCompraEquipo = $request->fechaCompra;
        $equipo->save();
        return redirect()->route('equipo.index')->with('success', 'Equipo Actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $equipo = Equipo::find($id);
        $equipo->delete();
        return redirect()->route('equipo.index')->with('success','Equipo Eliminado');
    }
}
