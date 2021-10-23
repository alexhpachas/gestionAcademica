<?php

namespace App\Models\admin\intranet\gestion_academica;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegimenDedicacion extends Model
{
    use HasFactory;

    protected $fillable = ['regimen'];

    public function docente_periodo(){
        return $this->belongsTo(DocentePeriodo::class);
    }
}
