<?php

namespace App\Http\Livewire\Admin\Intranet\GestionAcademica\Facultades;

use App\Models\admin\intranet\gestion_academica\Entidade;
use App\Models\admin\intranet\gestion_academica\Facultade;
use Exception;
use Livewire\Component;

class FacultadesIndex extends Component
{    
    public $facultade;
    public $openCreate = false;   
    
    /*  */
    protected $listeners = 'delete';

    /* REGLAS DE VALIDACIÓN */
    protected $rules = [
        'createForm.nombre' => 'required|unique:facultades,nombre|min:3|max:50',
        'createForm.codigo' => 'required|unique:facultades,codigo|min:3|max:50',        
        'createForm.abreviatura' => 'required',
        'createForm.entidade_id' => 'required',        
    ];

    public $createForm = [        
        'nombre' => null,     
        'codigo' => null,           
        'abreviatura' => null,
        'entidade_id' => null        
    ];

    public $editForm = [
        'open' => false,
        'nombre' => null,
        'codigo' => null,        
        'abreviatura' => null,
        'entidade_id' => null        
    ];

    protected $validationAttributes = [
        'createForm.nombre' => 'nombre',
        'createForm.codigo' => 'codigo',        
        'createForm.abreviatura' => 'abreviatura',
        'createForm.entidade_id' => 'entidad',   
    ];

    public function index(){
        return view('admin.intranet.gestion_academica.facultades.index');
    }

    public function save(){     
        $this->validate();
        
        Facultade::create([
            'nombre' => $this->createForm['nombre'],
            'codigo' => $this->createForm['codigo'],
            'abreviatura' => $this->createForm['abreviatura'],
            'entidade_id' => $this->createForm['entidade_id'],            
        ]);
        
        $this->reset('createForm');
        $this->reset('openCreate');
        $this->emit('create','Registro creado correctamente');
        
    }

    public function edit(Facultade $facultade){     
        $this->resetValidation();
        $this->facultade = $facultade;
        $this->editForm['open'] = true;
        $this->editForm['codigo'] = $facultade->codigo;
        $this->editForm['nombre'] = $facultade->nombre;
        $this->editForm['abreviatura'] = $facultade->abreviatura;
        $this->editForm['entidade_id'] = $facultade->entidade_id;        
    }

    public function update(){        

        $this->validate([
            'editForm.codigo' => 'required|unique:facultades,codigo,'.$this->facultade->id,
            'editForm.nombre' => 'required|unique:facultades,nombre,'.$this->facultade->id,
            'editForm.abreviatura' => 'required',
            'editForm.entidade_id' => 'required'            
        ]);
        
        try {
            
            $this->facultade->update($this->editForm);
            $this->reset('editForm');
            $this->emit('update','Registro Actualizado Correctamente');
            
        } catch (Exception $e) {
            
        }        
    }

    public function delete(Facultade $facultade){
        $this->facultade = $facultade;
        $this->facultade->delete();
        $this->emit('borrado','Registro eliminado Correctamente');
    }

    public function cancelar(){
        $this->reset('editForm','openCreate','createForm');
        $this->resetValidation();
    }

    public function updatedEditFormNombre(){
        $this->resetValidation();
    }

    public function updatedEditFormCodigo(){
        $this->resetValidation();
    }

    public function updatedEditFormAbreviatura(){
        $this->resetValidation();
    }

    public function updatedEditFormEntidadeId(){
        $this->resetValidation();
    }

    public function updatedCreateFormNombre(){
        $this->resetValidation();
    }

    public function updatedCreateFormCodigo(){
        $this->resetValidation();
    }

    public function updatedCreateFormAbreviatura(){
        $this->resetValidation();
    }

    public function updatedCreateFormEntidadeId(){
        $this->resetValidation();
    }


    public function render()
    {
        $facultades = Facultade::query();
        $facultades = $facultades->where('estado',1)->paginate(10);

        $entidades = Entidade::query();
        $entidades = $entidades->where('estado',1)->get();
        return view('livewire.admin.intranet.gestion-academica.facultades.facultades-index',compact('facultades','entidades'));
    }
}
