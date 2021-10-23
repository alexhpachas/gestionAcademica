<?php

namespace App\Models\admin\intranet\gestion_academica;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramaPlane extends Model
{
    use HasFactory;

    
    protected $fillable = ['programa_id','plane_id'];

    public function programas(){
        return $this->belongsToMany(Programa::class);
    }

    public function planes(){
        return $this->belongsToMany(Plane::class);
    }

    public function curso_programa_plan(){
        return $this->belongsToMany(CursoProgramaPlanEstudio::class);
    }

    public function cursos(){
        return $this->belongsToMany(Curso::class);
    }
}
