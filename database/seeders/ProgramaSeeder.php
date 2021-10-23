<?php

namespace Database\Seeders;

use App\Models\admin\intranet\gestion_academica\Programa;
use Illuminate\Database\Seeder;

class ProgramaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Programa::create([
            'nombre'=>'ENFERMERÍA',
            'codigo'=>'P01',
            'abreviatura'=>'ENF',            
            'estado'=>2,
            'facultade_id'=>1 //FACULTAD FCS
        ]);

        Programa::create([
            'nombre'=>'PSICOLOGÍA',
            'codigo'=>'P02',
            'abreviatura'=>'PSI',            
            'estado'=>2,
            'facultade_id'=>1 //FACULTAD FCS
        ]);

        Programa::create([
            'nombre'=>'OBSTETRICIA',
            'codigo'=>'P03',
            'abreviatura'=>'OBS',            
            'estado'=>2,
            'facultade_id'=>1 //FACULTAD FCS
        ]);

        Programa::create([
            'nombre'=>'ADMINISTRACIÓN Y FINANZAS',
            'codigo'=>'P04',
            'abreviatura'=>'ADF',            
            'estado'=>2,
            'facultade_id'=>2 //FACULTAD FICA
        ]);

        Programa::create([
            'nombre'=>'INGENIERÍA DE SISTEMAS',
            'codigo'=>'P05',
            'abreviatura'=>'SIS',            
            'estado'=>2,
            'facultade_id'=>2 //FACULTAD FICA
        ]);

        Programa::create([
            'nombre'=>'INGENIERÍA EN INDUSTRIAS ALIMENTARIAS',
            'codigo'=>'P06',
            'abreviatura'=>'IIA',            
            'estado'=>2,
            'facultade_id'=>2 //FACULTAD FICA
        ]);

        Programa::create([
            'nombre'=>'INGENIERÍA INDUSTRIAL',
            'codigo'=>'P07',
            'abreviatura'=>'IND',            
            'estado'=>2,
            'facultade_id'=>2 //FACULTAD FICA
        ]);

        Programa::create([
            'nombre'=>'CONTABILIDAD',
            'codigo'=>'P08',
            'abreviatura'=>'CONT',            
            'estado'=>2,
            'facultade_id'=>2 //FACULTAD FICA
        ]);

        Programa::create([
            'nombre'=>'DERECHO',
            'codigo'=>'P09',
            'abreviatura'=>'DER',            
            'estado'=>2,
            'facultade_id'=>2 //FACULTAD FICA
        ]);
    }
}
