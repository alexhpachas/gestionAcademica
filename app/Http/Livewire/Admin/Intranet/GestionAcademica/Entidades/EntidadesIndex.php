<?php

namespace App\Http\Livewire\Admin\Intranet\GestionAcademica\Entidades;

use App\Models\admin\intranet\gestion_academica\Entidade;
use Exception;
use Livewire\Component;

class EntidadesIndex extends Component
{    
    public $entidad;
    public $openCreate = false;   
    
    /*  */
    protected $listeners = 'delete';

    /* REGLAS DE VALIDACIÓN */
    protected $rules = [
        'createForm.nombre' => 'required|unique:entidades,nombre|min:3|max:50'
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
        return view('admin\intranet\gestion_academica\entidades.index');
    }

    public function save(){     
        $this->validate();
        
        Entidade::create([
            'nombre' => $this->createForm['nombre']
        ]);
        
        $this->reset('createForm');
        $this->reset('openCreate');
        $this->emit('create','Registro creado correctamente');
        
    }

    public function edit(Entidade $entidade){     
        $this->resetValidation();
        $this->entidad = $entidade;
        $this->editForm['open'] = true;
        $this->editForm['nombre'] = $entidade->nombre;                
    }

    public function update(){        

        $this->validate([
            'editForm.nombre' => 'required|unique:entidades,nombre,'.$this->entidad->id
        ]);
        
        try {
            
            $this->entidad->update($this->editForm);
            $this->reset('editForm');
            $this->emit('update','Registro Actualizado Correctamente');
            
        } catch (Exception $e) {
            
        }        
    }

    public function delete(Entidade $entidade){
        $this->entidad = $entidade;
        $this->entidad->delete();
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
        $entidades = Entidade::query();        
        $entidades = $entidades->where('estado',1)->orderBy('id','desc')->paginate();
        return view('livewire.admin.intranet.gestion-academica.entidades.entidades-index',compact('entidades'));
    }
}
