<?php

namespace App\Models\admin\intranet\gestion_academica;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Docente extends Model
{
    use HasFactory;
    protected $fillable = ['curso_plane_periodo_grupo_id','personas_id'];

    public function grupos(){
        return $this->belongsToMany(Grupo::class);
    }

    public function curso_plane_periodo_grupos(){
        return $this->belongsToMany(CursoPlanePeriodoGrupo::class);
    }

    public function docente_tipo_ingreso(){
        return $this->hasOne(DocenteTipoIngreso::class);
    }

    public function persona(){
        return $this->hasOne(Persona::class);
    }

    public function docente_periodos(){
        return $this->hasMany(DocentePeriodo::class);
    }

    public function curso_periodo_docentes(){
        return $this->belongsToMany(CursoPeriodoGrupoDocente::class);
    }
}
