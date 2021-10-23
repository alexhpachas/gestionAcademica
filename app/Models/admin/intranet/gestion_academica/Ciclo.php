<?php

namespace App\Models\admin\intranet\gestion_academica;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ciclo extends Model
{
    use HasFactory;
    protected $fillable = ['nombre'];

    public function curso_programa_plan_estudios(){
        return $this->hasMany(CursoProgramaPlanEstudio::class);
    }
}
