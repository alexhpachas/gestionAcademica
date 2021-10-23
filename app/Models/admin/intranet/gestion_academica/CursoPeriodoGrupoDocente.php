<?php

namespace App\Models\admin\intranet\gestion_academica;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CursoPeriodoGrupoDocente extends Model
{
    use HasFactory;
    protected $table = "curso_periodo_grupo_docente";

    protected $fillable = ['curso_periodo_grupo_id','docente_id'];
    public function docentes(){
        return $this->belongsToMany(Docente::class);
    }

}
