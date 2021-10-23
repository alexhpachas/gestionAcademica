<?php

namespace App\Models\admin\intranet\gestion_academica;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plane extends Model
{
    use HasFactory;

    const ACTIVO = 1;
    const INACTIVO = 2;

    protected $fillable = ['codigo','estado'];

    public function programa_plan(){
        return $this->belongsToMany(ProgramaPlan::class);
    }
}
