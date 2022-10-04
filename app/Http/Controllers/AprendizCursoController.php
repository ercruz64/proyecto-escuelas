<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Aprendiz;
use App\Models\AprendizCurso;
use App\Models\Curso;

class AprendizCursoController extends Controller
{

    public function index()
    {
        $cursos = Curso::all();
        $aprendices = Aprendiz::all();
        $aprendizCursos = AprendizCurso::cursosAsignadosAprendices();
        return view('aprendizcurso.index',['cursos'=>$cursos,'aprendices'=>$aprendices,'aprendizCursos'=>$aprendizCursos]);
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $curso = Curso::find($request->curso_id);
        $curso->aprendices()->sync($request->input('aprendiz_id', []));
        return redirect()->route('aprendizcurso.index')->with('success','Aprendices Asignados');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $curso = Curso::find($id);
        $aprendices = AprendizCurso::cursosAsignadosAprendicesById($id);
        return view('aprendizcurso.edit',['curso'=>$curso,'aprendices'=>$aprendices]);
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        $aprendizCurso = AprendizCurso::find($id);
        $aprendizCurso->delete();
        return redirect()->route('aprendizcurso.edit',['aprendizcurso'=>$aprendizCurso->curso_id])->with('success','Aprendiz Desvinculado');
    }
}

