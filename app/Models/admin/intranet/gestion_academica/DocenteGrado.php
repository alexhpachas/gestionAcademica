<?php

namespace App\Models\admin\intranet\gestion_academica;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocenteGrado extends Model
{
    use HasFactory;

    protected $fillable = ['grado'];


    public function docente_periodo(){
        return $this->belongsTo(DocentePeriodo::class);
    }
}
