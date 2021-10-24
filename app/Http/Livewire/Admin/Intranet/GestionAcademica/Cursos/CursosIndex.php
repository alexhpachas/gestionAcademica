<?php

namespace App\Http\Livewire\Admin\Intranet\GestionAcademica\Cursos;

use App\Models\admin\intranet\gestion_academica\Curso;
use Exception;
use Livewire\Component;
use Livewire\WithPagination;

class CursosIndex extends Component
{
    use WithPagination;

    public $curso;
    public $openCreate = false;   
    
    /*  */
    protected $listeners = 'delete';

    /* REGLAS DE VALIDACIÓN */
    protected $rules = [
        'createForm.codigo' => 'required|unique:cursos,codigo|min:3|max:50',
        'createForm.nombre' => 'required|unique:cursos,nombre|min:3|max:50',
        'createForm.horas_Teoricas' => 'required|numeric',
        'createForm.horas_Practicas' => 'required|numeric',
        'createForm.creditos' => 'required|numeric',
        'createForm.tipo' => 'required|numeric'
    ];

    public $createForm = [        
        'codigo' => null,
        'nombre' => null,        
        'horas_Teoricas' => null,
        'horas_Practicas' => null,
        'creditos' => null,
        'tipo' => null
    ];

    public $editForm = [
        'open' => false,
        'codigo' => null,
        'nombre' => null,        
        'horas_Teoricas' => null,
        'horas_Practicas' => null,
        'creditos' => null,
        'tipo' => null
    ];

    protected $validationAttributes = [
        'createForm.codigo' => 'codigo',
        'createForm.nombre' => 'nombre',
        'createForm.horas_Teoricas' => 'Horas Teoricas',
        'createForm.horas_Practicas' => 'Horas Practicas',
        'createForm.creditos' => 'Creditos',
        'createForm.tipo' => 'Tipo'
    ];
        
    public function index(){
        return view('admin.intranet.gestion_academica.cursos.index');
    }

    public function save(){     
        $this->validate();
        
        Curso::create([
            'codigo' => $this->createForm['codigo'],
            'nombre' => $this->createForm['nombre'],
            'horas_teoricas' => $this->createForm['horas_Teoricas'],
            'horas_practicas' => $this->createForm['horas_Practicas'],
            'creditos' => $this->createForm['creditos'],
            'tipo' => $this->createForm['tipo']
        ]);
        
        $this->reset('createForm');
        $this->reset('openCreate');
        $this->emit('create','Registro creado correctamente');
        
    }

    public function edit(Curso $curso){     
        $this->resetValidation();
        $this->curso = $curso;
        $this->editForm['open'] = true;
        $this->editForm['codigo'] = $curso->codigo;
        $this->editForm['nombre'] = $curso->nombre;
        $this->editForm['horas_Teoricas'] = $curso->horas_teoricas;
        $this->editForm['horas_Practicas'] = $curso->horas_practicas;
        $this->editForm['creditos'] = $curso->creditos;
        $this->editForm['tipo'] = $curso->tipo;
    }

    public function update(){        

        $this->validate([
            'editForm.codigo' => 'required|unique:cursos,codigo,'.$this->curso->id,
            'editForm.nombre' => 'required|unique:cursos,nombre,'.$this->curso->id,
            'editForm.horas_Teoricas' => 'required|numeric',
            'editForm.horas_Practicas' => 'required|numeric',
            'editForm.creditos' => 'required|numeric',
            'editForm.tipo' => 'required|numeric'
        ]);
        
        try {
            
            $this->curso->update($this->editForm);
            $this->reset('editForm');
            $this->emit('update','Registro Actualizado Correctamente');
            
        } catch (Exception $e) {
            
        }        
    }

    public function delete(Curso $curso){
        $this->curso = $curso;
        $this->curso->delete();
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
        $cursos = Curso::query();
        $cursos = $cursos->orderBy('id','desc')->paginate(10);
        return view('livewire.admin.intranet.gestion-academica.cursos.cursos-index',compact('cursos'));
    }
}
