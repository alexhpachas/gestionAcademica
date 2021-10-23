<?php

namespace App\Models\admin\intranet\gestion_academica;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocenteTipoIngreso extends Model
{
    use HasFactory;

    protected $fillable = ['tipo'];

    public function docente(){
        return $this->hasOne(Docente::class);
    }
}
