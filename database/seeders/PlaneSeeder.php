<?php

namespace Database\Seeders;

use App\Models\admin\intranet\gestion_academica\Plane;
use Illuminate\Database\Seeder;

class PlaneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Plane::create([
            'codigo'=>'2019',
            'estado'=>2,
            
        ]);

        Plane::create([
            'codigo'=>'2020',
            'estado'=>2,            
        ]);

        

    }
}
