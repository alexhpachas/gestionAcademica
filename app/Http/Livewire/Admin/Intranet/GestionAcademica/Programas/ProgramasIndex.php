<?php

namespace App\Http\Livewire\Admin\Intranet\GestionAcademica\Programas;

use App\Models\admin\intranet\gestion_academica\Facultade;
use App\Models\admin\intranet\gestion_academica\Programa;
use Exception;
use Livewire\Component;
use Livewire\WithPagination;

class ProgramasIndex extends Component
{
    use WithPagination;

    public $programa;
    public $openCreate = false;   
    
    /*  */
    protected $listeners = 'delete';

    /* REGLAS DE VALIDACIÓN */
    protected $rules = [
        'createForm.nombre' => 'required|unique:facultades,nombre|min:3|max:50',
        'createForm.codigo' => 'required|unique:facultades,codigo|min:3|max:50',        
        'createForm.abreviatura' => 'required',
        'createForm.facultade_id' => 'required',        
    ];

    public $createForm = [        
        'nombre' => null,     
        'codigo' => null,           
        'abreviatura' => null,
        'facultade_id' => null        
    ];

    public $editForm = [
        'open' => false,
        'nombre' => null,
        'codigo' => null,        
        'abreviatura' => null,
        'facultade_id' => null        
    ];

    protected $validationAttributes = [
        'createForm.nombre' => 'nombre',
        'createForm.codigo' => 'codigo',        
        'createForm.abreviatura' => 'abreviatura',
        'createForm.facultade_id' => 'facultad',   
    ];

    public function index(){
        return view('admin.intranet.gestion_academica.programas.index');
    }

    public function save(){     
        $this->validate();
        
        Programa::create([
            'nombre' => $this->createForm['nombre'],
            'codigo' => $this->createForm['codigo'],
            'abreviatura' => $this->createForm['abreviatura'],
            'facultade_id' => $this->createForm['facultade_id'],            
        ]);
        
        $this->reset('createForm');
        $this->reset('openCreate');
        $this->emit('create','Registro creado correctamente');
        
    }

    public function edit(Programa $programa){     
        $this->resetValidation();
        $this->programa = $programa;
        $this->editForm['open'] = true;
        $this->editForm['codigo'] = $programa->codigo;
        $this->editForm['nombre'] = $programa->nombre;
        $this->editForm['abreviatura'] = $programa->abreviatura;
        $this->editForm['facultade_id'] = $programa->facultade_id;        
    }

    public function update(){        

        $this->validate([
            'editForm.codigo' => 'required|unique:programas,codigo,'.$this->programa->id,
            'editForm.nombre' => 'required|unique:programas,nombre,'.$this->programa->id,
            'editForm.abreviatura' => 'required',
            'editForm.facultade_id' => 'required'            
        ]);
        
        try {
            
            $this->programa->update($this->editForm);
            $this->reset('editForm');
            $this->emit('update','Registro Actualizado Correctamente');
            
        } catch (Exception $e) {
            
        }        
    }

    public function delete(Programa $programa){
        $this->programa = $programa;
        $this->programa->delete();
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
        $programas = Programa::query();
        $programas = $programas->where('estado',1)->orderBy('id','desc')->paginate(10);

        $facultades = Facultade::query();
        $facultades = $facultades->where('estado',1)->get();
        return view('livewire.admin.intranet.gestion-academica.programas.programas-index',compact('programas','facultades'));
    }
}
