<?php

namespace App\Http\Livewire\Admin\Intranet\GestionAcademica\Grupos;

use App\Models\admin\intranet\gestion_academica\Grupo;
use Exception;
use Livewire\Component;

class GruposIndex extends Component
{
    public $grupo;
    public $openCreate = false;

    //REGLA DE VALIDACIÓN
    protected $rules = [
        'createForm.nombre' => 'required|unique:grupos,nombre'
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
        'editForm.nombre' => 'nombre'
    ];

    protected $listeners = 'delete';

    public function render()
    {
        $grupos = Grupo::query();
        $grupos = $grupos->orderBy('id', 'asc')->paginate();
        return view('livewire.admin.intranet.gestion-academica.grupos.grupos-index', compact('grupos'));
    }

    public function index(){
        return view('admin\intranet\gestion_academica\grupos.index');
    }

    //CREAR
    public function save(){
        $this->validate();

        Grupo::create([
            'nombre' => $this->createForm['nombre']
        ]);

        $this->reset('createForm');
        $this->reset('openCreate');
        $this->emit('create', 'Registro Creado Correctamente');
    }

    //ACTUALIZAR
    public function edit(Grupo $grupo){
        $this->resetValidation();
        $this->grupo = $grupo;
        $this->editForm['open'] = true;
        $this->editForm['nombre'] = $grupo->nombre;
    }

    public function update(){
        $this->validate([
            'editForm.nombre' => 'required|unique:grupos,nombre,'.$this->grupo->id
        ]);

        try{
            $this->grupo->update($this->editForm);
            $this->reset('editForm');
            $this->emit('update', 'Registro Actualizado Correctamente');

        } catch (Exception $e){
            
        }
    }

    //ELIMINAR
    public function delete(Grupo $grupo){
        $this->grupo = $grupo;
        $this->grupo->delete();
        $this->emit('borrado', 'Registro Eliminado Correctamente');
    }

    //CANCELAR
    public function cancelar(){
        $this->reset('editForm','openCreate','createForm');
        $this->resetValidation();
    }

    public function updatedCreateFormNombre(){
        $this->resetValidation();
    }
    public function updatedEditFormNombre(){
        $this->resetValidation();
    }
}
