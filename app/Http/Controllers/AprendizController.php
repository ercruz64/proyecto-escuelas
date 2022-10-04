<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Aprendiz;

class AprendizController extends Controller {

    public function index() {
        $aprendices = Aprendiz::all();
        return view('aprendiz.index',['aprendices'=>$aprendices]);
    }


    public function create()
    {
        //
    }


    public function store(Request $request) {
        $request->validate([
            'nombre' => 'required|max:60',
            'apellido' => 'required|max:60',
            'documento' => 'required',
            'genero' => 'required'
        ]);

        $aprendiz = new Aprendiz;
        $aprendiz->nombreAprendiz = $request->nombre;
        $aprendiz->apellidoAprendiz = $request->apellido;
        $aprendiz->documentoAprendiz = $request->documento;
        $aprendiz->genero = $request->genero;
        $aprendiz->save();

        return redirect()->route('aprendiz.index')->with('success', 'Aprendiz Creado');
    }


    public function show($id) {
        $aprendiz = Aprendiz::find($id);
        return view('aprendiz.show',['aprendiz'=>$aprendiz]);
    }


    public function edit($id)
    {
        $aprendiz = Aprendiz::find($id);
        return view('aprendiz.edit',['aprendiz'=>$aprendiz]);
    }


    public function update(Request $request, $id) {
        $request->validate([
            'nombre' => 'required|max:60',
            'apellido' => 'required|max:60',
            'documento' => 'required',
            'genero' => 'required'
        ]);

        $aprendiz = Aprendiz::find($id);
        $aprendiz->nombreAprendiz = $request->nombre;
        $aprendiz->apellidoAprendiz = $request->apellido;
        $aprendiz->documentoAprendiz = $request->documento;
        $aprendiz->genero = $request->genero;
        $aprendiz->save();

        return redirect()->route('aprendiz.index')->with('success', 'Aprendiz Actualizado');
    }


    public function destroy($id) {
        $aprendiz = Aprendiz::find($id);
        $aprendiz->delete();
        return redirect()->route('aprendiz.index')->with('success','Aprendiz Eliminado');
    }
}
