<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Curso;
use App\Models\Aprendiz;

class CursosController extends Controller {
    public function store(Request $request){
        $request->validate([
            'curso' => 'required',
            'cupo' => 'required'
        ]);

        $curso = new Curso;
        $curso->nombreCurso = $request->curso;
        $curso->cupo = $request->cupo;
        $curso->save();

        return redirect()->route('curso')->with('success','Curso Creado');
    }

    public function index(){
        $cursos = Curso::all();
        $aprendices = Aprendiz::all();
        return view('curso.index',['cursos' => $cursos,'aprendices'=>$aprendices]);
    }

    public function edit($id){
        $curso = Curso::find($id);
        return view('curso.show',['curso' => $curso]);
    }

    public function update(Request $request, $id){
        $request->validate([
            'curso' => 'required',
            'cupo' => 'required'
        ]);

        $curso = Curso::find($id);
        $curso->nombreCurso = $request->curso;
        $curso->cupo = $request->cupo;
        $curso->save();

        return redirect()->route('curso')->with('success','Curso Actualizado');
    }

    public function destroy($id){
        $curso = Curso::find($id);
        $curso->delete();
        return redirect()->route('curso')->with('success', 'Curso Eliminado');
    }
}

