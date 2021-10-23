<?php

namespace Database\Seeders;

use App\Models\admin\intranet\gestion_academica\Curso;
use Illuminate\Database\Seeder;

class CursoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //PRIMER CICLO => ENFERMERÍA

        Curso::create([
            'codigo'=>'10A01',
            'nombre'=>'MATEMÁTICA I',
            'horas_teoricas'=>3,
            'horas_practicas'=>2,
            'creditos'=>4,
            'tipo'=>'OBLIGATORIO'            
        ]);

        Curso::create([
            'codigo'=>'10A02',
            'nombre'=>'PENSAMIENTO CRÍTICO',
            'horas_teoricas'=>4,
            'horas_practicas'=>0,
            'creditos'=>4,
            'tipo'=>'OBLIGATORIO'            
        ]);

        Curso::create([
            'codigo'=>'10A03',
            'nombre'=>'FILOSOFÍA Y ÉTICA',
            'horas_teoricas'=>2,
            'horas_practicas'=>2,
            'creditos'=>3,
            'tipo'=>'OBLIGATORIO'            
        ]);

        Curso::create([
            'codigo'=>'10A04',
            'nombre'=>'TALLER DE COMUNICACIÓN ORAL',
            'horas_teoricas'=>3,
            'horas_practicas'=>2,
            'creditos'=>4,
            'tipo'=>'OBLIGATORIO'            
        ]);

        Curso::create([
            'codigo'=>'10A05',
            'nombre'=>'GLOBALIZACIÓN Y REALIDAD NACIONAL',
            'horas_teoricas'=>2,
            'horas_practicas'=>2,
            'creditos'=>3,
            'tipo'=>'OBLIGATORIO'            
        ]);

        Curso::create([
            'codigo'=>'10A06',
            'nombre'=>'CULTURA AMBIENTAL',
            'horas_teoricas'=>2,
            'horas_practicas'=>2,
            'creditos'=>3,
            'tipo'=>'OBLIGATORIO'            
        ]);

        //SEGUNCO CICLO ENFERMERIA

        Curso::create([
            'codigo'=>'10A07',
            'nombre'=>'MATEMÁTICA II',
            'horas_teoricas'=>3,
            'horas_practicas'=>2,
            'creditos'=>4,
            'tipo'=>'OBLIGATORIO'            
        ]);

        Curso::create([
            'codigo'=>'10A08',
            'nombre'=>'METODOLOGÍA DE LA INVESTIGACIÓN',
            'horas_teoricas'=>3,
            'horas_practicas'=>2,
            'creditos'=>4,
            'tipo'=>'OBLIGATORIO'            
        ]);

        Curso::create([
            'codigo'=>'10A09',
            'nombre'=>'EMPRENDIMIENTO',
            'horas_teoricas'=>2,
            'horas_practicas'=>2,
            'creditos'=>3,
            'tipo'=>'OBLIGATORIO'            
        ]);

        Curso::create([
            'codigo'=>'10A10',
            'nombre'=>'TALLER DE COMUNICACIÓN ESCRITA',
            'horas_teoricas'=>3,
            'horas_practicas'=>2,
            'creditos'=>4,
            'tipo'=>'OBLIGATORIO'            
        ]);

        Curso::create([
            'codigo'=>'10A11',
            'nombre'=>'ADMINISTRACIÓN GENERAL',
            'horas_teoricas'=>2,
            'horas_practicas'=>2,
            'creditos'=>3,
            'tipo'=>'OBLIGATORIO'            
        ]);

        Curso::create([
            'codigo'=>'21A01',
            'nombre'=>'ACTIVIDADES DE PROYECCIÓN SOCIAL I',
            'horas_teoricas'=>1,
            'horas_practicas'=>4,
            'creditos'=>3,
            'tipo'=>'OBLIGATORIO'            
        ]);
    }
}
