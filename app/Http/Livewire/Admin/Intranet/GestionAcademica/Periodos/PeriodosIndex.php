<?php

namespace App\Http\Livewire\Admin\Intranet\GestionAcademica\Periodos;

use App\Models\admin\intranet\gestion_academica\Periodo;
use Exception;
use Livewire\Component;

class PeriodosIndex extends Component
{
    public $periodo;
    public $openCreate = false;   
    
    /*  */
    protected $listeners = 'delete';

    /* REGLAS DE VALIDACIÓN */
    protected $rules = [
        'createForm.nombre' => 'required|unique:periodos,nombre|min:3|max:50'
    ];

    public $createForm = [        
        'nombre' => null
    ];

    public $editForm = [
        'open' => false,
        'nombre' => null,
    ];

    protected $validationAttributes = [
        'createForm.nombre' => 'nombre',
        'editForm.nombre' => 'nombre',                
    ];
    

    public function index(){
        return view('admin.intranet.gestion_academica.periodos.index');
    }

    public function save(){     
        $this->validate();
        
        Periodo::create([
            'nombre' => $this->createForm['nombre']
        ]);
        
        $this->reset('createForm');
        $this->reset('openCreate');
        $this->emit('create','Registro creado correctamente');
        
    }

    public function edit(Periodo $periodo){     
        $this->resetValidation();
        $this->periodo = $periodo;
        $this->editForm['open'] = true;
        $this->editForm['nombre'] = $periodo->nombre;                
    }

    public function update(){        

        $this->validate([
            'editForm.nombre' => 'required|unique:periodos,nombre,'.$this->periodo->id
        ]);
        
        try {
            
            $this->periodo->update($this->editForm);
            $this->reset('editForm');
            $this->emit('update','Registro Actualizado Correctamente');
            
        } catch (Exception $e) {
            
        }        
    }

    public function delete(Periodo $periodo){
        $this->periodo = $periodo;
        $this->periodo->delete();
        $this->emit('borrado','Registro eliminado Correctamente');
    }

    public function cancelar(){
        $this->reset('editForm','openCreate','createForm');
        $this->resetValidation();
    }

    public function updatedEditFormNombre(){
        $this->resetValidation();
    }

    public function updatedCreateFormNombre(){
        $this->resetValidation();
    }


    public function render()
    {
        $periodos = Periodo::query();
        $periodos = $periodos->where('estado',1)->get();
        return view('livewire.admin.intranet.gestion-academica.periodos.periodos-index',compact('periodos'));
    }

    
}
