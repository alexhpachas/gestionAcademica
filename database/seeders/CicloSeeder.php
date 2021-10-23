<?php

namespace Database\Seeders;

use App\Models\admin\intranet\gestion_academica\Ciclo;
use Illuminate\Database\Seeder;

class CicloSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Ciclo::create([            
            'nombre'=>1            
        ]);

        Ciclo::create([            
            'nombre'=>2            
        ]);

        Ciclo::create([            
            'nombre'=>3            
        ]);

        Ciclo::create([            
            'nombre'=>4            
        ]);

        Ciclo::create([            
            'nombre'=>5            
        ]);

        Ciclo::create([            
            'nombre'=>6            
        ]);

        Ciclo::create([            
            'nombre'=>7            
        ]);

        Ciclo::create([            
            'nombre'=>8            
        ]);

        Ciclo::create([            
            'nombre'=>9            
        ]);

        Ciclo::create([            
            'nombre'=>10            
        ]);

        Ciclo::create([            
            'nombre'=>11            
        ]);

        Ciclo::create([            
            'nombre'=>12            
        ]);
    }
}
