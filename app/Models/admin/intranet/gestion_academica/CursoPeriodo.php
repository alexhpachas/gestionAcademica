<?php

namespace App\Models\admin\intranet\gestion_academica;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CursoPeriodo extends Model
{
    use HasFactory;

    protected $table = "curso_programa_plane_periodo";

    protected $fillable = ['periodo_id','curso_programa_plane_id'];

    public function curso_programa_planes(){
        return $this->belongsToMany(CursoProgramaPlane::class);
    }    

    public function grupos(){
        return $this->belongsToMany(Grupo::class);
    }

    public function periodo(){
        return $this->belongsTo(Periodo::class);
    }
}
