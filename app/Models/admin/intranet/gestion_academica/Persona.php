<?php

namespace App\Models\admin\intranet\gestion_academica;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    use HasFactory;
    const ACTIVO = 1;
    const INACTIVO = 2;
    
    protected $fillable = ['nombre','apellidos','dni','fecha_nacimiento','email','genero','estado'];

    public function docente(){
        return $this->hasOne(Docente::class);
    }
}
