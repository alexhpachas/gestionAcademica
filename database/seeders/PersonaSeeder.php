<?php

namespace Database\Seeders;

use App\Models\admin\intranet\gestion_academica\Persona;
use Illuminate\Database\Seeder;

class PersonaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Persona::create([
            'lastname_paternal' => 'Huamán',
            'lastname_maternal' => 'Pachas',
            'firstname' => 'Angemar',
            'document_type' => 'DNI',
            'document_number' => '48256335',
            'birthdate' => '1994/05/24',
            'email' => 'angemar@autonomadeica.edu.pe',
            'gender' => 'M'
        ]);
    }
}
