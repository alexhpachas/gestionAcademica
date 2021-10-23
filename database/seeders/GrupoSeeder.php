<?php

namespace Database\Seeders;

use App\Models\admin\intranet\gestion_academica\Grupo;
use Illuminate\Database\Seeder;

class GrupoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Grupo::create([
            'nombre'=>'A'            
        ]);

        Grupo::create([
            'nombre'=>'B'            
        ]);

        Grupo::create([
            'nombre'=>'C'            
        ]);

        Grupo::create([
            'nombre'=>'D'            
        ]);

        Grupo::create([
            'nombre'=>'E'            
        ]);

        Grupo::create([
            'nombre'=>'F'            
        ]);
    }
}
