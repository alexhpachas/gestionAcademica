<?php

namespace App\Http\Livewire\Admin\Intranet\GestionAcademica\Periodos;

use Livewire\Component;

class PeriodosIndex extends Component
{
    public function render()
    {
        return view('livewire.admin.intranet.gestion-academica.periodos.periodos-index');
    }

    public function index(){
        return view('admin.intranet.gestion_academica.periodos.index');
    }
}
