<?php

namespace App\Models\admin\intranet\gestion_academica;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    use HasFactory;

    const OBLIGATORIO = 1;
    const ELECTIVO = 2;
    
    protected $fillable = ['codigo','nombre','horas_teoricas','horas_practicas','creditos','tipo'];    

    public function programa_plan(){
        return $this->belongsToMany(ProgramaPlan::class);
    }
}
