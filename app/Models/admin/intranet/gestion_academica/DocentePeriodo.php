<?php

namespace App\Models\admin\intranet\gestion_academica;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocentePeriodo extends Model
{
    use HasFactory;
    const JEFE_PRACTICA = 1;
    const DOCENTE = 2;

    protected $guarded = [];

    public function docente(){
        return $this->belongsTo(Docente::class);
    }

    public function docente_tipos(){
        return $this->hasMany(DocenteTipo::class);
    }

    public function docente_grados(){
        return $this->hasMany(DocenteGrado::class);
    }   
    
    public function regimen_dedicacions(){
        return $this->hasMany(RegimenDedicacion::class);
    }   

    public function docente_categorias(){
        return $this->hasMany(docente_categorias::class);
    } 
}
