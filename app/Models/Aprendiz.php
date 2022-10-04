<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aprendiz extends Model
{
    use HasFactory;

    public function cursos(){
        return $this->belongsToMany(Curso::class,'aprendiz_cursos','aprendiz_id','curso_id');
    }
}

