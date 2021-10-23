<?php

namespace App\Models\admin\intranet\gestion_academica;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CursoPeriodoGrupo extends Model
{
    use HasFactory;
    protected $table = "curso_periodo_grupo";
    protected $fillable = ['curso_periodo_id','grupo_id'];

    public function horarios(){
        return $this->hasMany(Horario::class);
    }
    
    public function docentes(){
        return $this->belongsToMany(Docente::class);
    }
}
