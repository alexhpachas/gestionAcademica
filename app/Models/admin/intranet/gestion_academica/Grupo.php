<?php

namespace App\Models\admin\intranet\gestion_academica;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grupo extends Model
{
    use HasFactory;
    protected $fillable = ['nombre'];

    public function curso_periodos(){
        return $this->belongsToMany(CursoPeriodo::class);
    }

    public function docentes(){
        return $this->belongsToMany(Docente::class);
    }
}
