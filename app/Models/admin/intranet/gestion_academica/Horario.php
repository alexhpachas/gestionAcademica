<?php

namespace App\Models\admin\intranet\gestion_academica;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Horario extends Model
{
    use HasFactory;
    const ACTIVO = 1;
    const INACTIVO = 2;

    protected $fillable = ['dia','hora_inicio','hora_fin','estado','curso_plane_periodo_grupo_id'];

    public function curso_periodo_grupo(){
        return $this->belongsTo(CursoPeriodoGrupo::class);
    }
}
