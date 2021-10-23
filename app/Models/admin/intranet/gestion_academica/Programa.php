<?php

namespace App\Models\admin\intranet\gestion_academica;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Programa extends Model
{
    use HasFactory;
    const ACTIVO = 1;
    const INACTIVO = 2;

    protected $fillable = ['nombre','codigo','abreviatura','estado','facultade_id'];

    public function facultad(){
        return $this->belongsTo(Facultade::class);
    }

    public function programa_plan_estudios(){
        return $this->belongsToMany(ProgramaPlanEstudio::class);
    }
}
