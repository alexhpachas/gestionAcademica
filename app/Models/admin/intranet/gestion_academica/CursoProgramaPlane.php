<?php

namespace App\Models\admin\intranet\gestion_academica;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CursoProgramaPlane extends Model
{
    use HasFactory;

    protected $fillable = ['curso_id','programa_plane_id','ciclos_id'];

    /* POR VER POR QUE ES UNA TABLA PIVOTE OJO HAY MAS */
    public function programa_plan(){
        return $this->belongsToMany(ProgramaPlan::class);
    }

    public function ciclo(){
        return $this->belongsTo(Ciclo::class);
    }

    public function periodos(){
        return $this->belongsToMany(Periodo::class);
    }

    public function curso_programa_plan_estudio_periodos(){
        return $this->belongsToMany(CursoProgramaPlanEstudioPeriodo::class);
    }
}
