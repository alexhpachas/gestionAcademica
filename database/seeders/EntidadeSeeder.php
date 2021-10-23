<?php

namespace Database\Seeders;

use App\Models\admin\intranet\gestion_academica\Entidade;
use Illuminate\Database\Seeder;

class EntidadeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Entidade::create([
            'nombre'=>'UNIVERSIDAD AUTÓNOMA DE ICA',
            'estado'=>1
        ]);
    }
}
