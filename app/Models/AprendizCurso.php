<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class AprendizCurso extends Model
{
    use HasFactory;

    public static function cursosAsignadosAprendices()
    {
        return DB::table('aprendiz_cursos_vista')->select('curso_id','nombreCurso')->distinct('curso_id')->get();
    }


    public static function cursosAsignadosAprendicesById($id)
    {
        return DB::table('aprendiz_cursos_vista')->where('curso_id','=',$id)->get();
    }
}
