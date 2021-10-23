<?php

namespace App\Models\admin\intranet\gestion_academica;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Periodo extends Model
{
    use HasFactory;
    const ACTIVO = 1;
    const INACTIVO = 2;

    protected $fillable = ['nombre','estado'];

    public function curso_periodos(){
        return $this->hasMany(CursoPeriodo::class);
    }
}
