<?php

namespace App\Http\Livewire\Admin\Intranet\GestionAcademica\Ciclos;

use App\Models\admin\intranet\gestion_academica\Ciclo;
use Exception;
use Livewire\Component;

class CiclosIndex extends Component
{
    public $ciclo;
    public $openCreate = false;

    //REGLAS DE VALIDACIÓN
    protected $rules = [
        'createForm.nombre' => 'required|unique:ciclos,nombre'
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
        $ciclos = Ciclo::query();
        $ciclos = $ciclos->orderBy('id', 'asc')->paginate();

        return view('livewire.admin.intranet.gestion-academica.ciclos.ciclos-index', compact('ciclos'));
    }

    public function index(){
        return view('admin\intranet\gestion_academica\ciclos.index');
    }


   //CREAR
   public function save(){
       $this->validate();

       Ciclo::create([
           'nombre' => $this->createForm['nombre']
       ]);

       $this->reset('createForm');
       $this->reset('openCreate');
       $this->emit('create', 'Registro Creado Correctamente');
   }
   
   //ACTUALIZAR
   public function edit(Ciclo $ciclo){
    $this->resetValidation();
    $this->ciclo = $ciclo;
    $this->editForm['open'] = true;
    $this->editForm['nombre'] = $ciclo->nombre;
   }

   public function update(){
       $this->validate([
           'editForm.nombre' => 'required|unique:ciclos,nombre,'.$this->ciclo->id
       ]);

       try{

        $this->ciclo->update($this->editForm);
        $this->reset('editForm');
        $this->emit('update', 'Registro Actualizado Correctamente');

       } catch (Exception $e){

       }

   }

   //ELIMINAR
   public function delete(Ciclo $ciclo){
       $this->ciclo = $ciclo;
       $this->ciclo->delete();
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
