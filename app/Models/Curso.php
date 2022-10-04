<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    use HasFactory;

    public function aprendices(){
        return $this->belongsToMany(Aprendiz::class,'aprendiz_cursos','curso_id','aprendiz_id')->withTimestamps();
    }
}

