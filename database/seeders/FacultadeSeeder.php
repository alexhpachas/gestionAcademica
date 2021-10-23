<?php

namespace Database\Seeders;

use App\Models\admin\intranet\gestion_academica\Facultade;
use Illuminate\Database\Seeder;

class FacultadeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Facultade::create([
            'nombre'=>'CIENCIAS DE LA SALUD',
            'codigo'=>'F01',
            'abreviatura'=>'FCS',
            'estado'=>2,
            'entidade_id'=>1
            
        ]);
        
        Facultade::create([
            'nombre'=>'INGENIERÍA, CIENCIAS Y ADMINISTRACIÓN',
            'codigo'=>'F02',
            'abreviatura'=>'FICA',
            'estado'=>2,
            'entidade_id'=>1
            
        ]);
    }
}
