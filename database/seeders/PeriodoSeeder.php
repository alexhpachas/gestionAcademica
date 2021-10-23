<?php

namespace Database\Seeders;

use App\Models\admin\intranet\gestion_academica\Periodo;
use Illuminate\Database\Seeder;

class PeriodoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Periodo::create([
            'nombre'=>'2021-1',
            'estado'=>1
        ]);
    }
}
