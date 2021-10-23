<?php

namespace App\Models\admin\intranet\gestion_academica;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facultade extends Model
{
    use HasFactory;
    const ACTIVO = 1;
    const INACTIVO = 2;

    protected $fillable = ['nombre','codigo','abreviatura','estado'];

    /* RELACION UNO A MUCHOS */
    public function entidad(){
        return $this->belongsTo(Entidade::class);
    }

    public function programas(){
        return $this->hasMany(Programa::class);
    }
}
