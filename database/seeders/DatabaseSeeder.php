<?php

namespace Database\Seeders;

use App\Models\admin\intranet\gestion_academica\Plane;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(EntidadeSeeder::class);
        $this->call(FacultadeSeeder::class);
        $this->call(ProgramaSeeder::class);
        $this->call(CicloSeeder::class);
        $this->call(CursoSeeder::class);                
        $this->call(GrupoSeeder::class);
        $this->call(PeriodoSeeder::class);
        $this->call(PlaneSeeder::class);
        $this->call(UserSeeder::class);
        
    }
}
