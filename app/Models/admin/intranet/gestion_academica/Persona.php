<?php

namespace App\Models\admin\intranet\gestion_academica;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    use HasFactory;
    const ACTIVO = 1;
    const INACTIVO = 2;
    
    protected $guarded = ['created_at','updated_at', 'open'];

    public function docente(){
        return $this->hasOne(Docente::class);
    }
}
