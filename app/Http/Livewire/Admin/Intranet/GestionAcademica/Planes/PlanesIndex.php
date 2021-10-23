<?php

namespace App\Http\Livewire\Admin\Intranet\GestionAcademica\Planes;

use App\Models\admin\intranet\gestion_academica\Plane;
use Exception;
use Livewire\Component;

use Livewire\WithPagination;

class PlanesIndex extends Component
{
    use WithPagination;
    public $openCreate = false;
    public $plan;

    protected $listeners = 'delete';

    protected $rules = [
        'createForm.codigo' => 'required|unique:planes,codigo|min:3|max:50'
    ];

    public $createForm = [
        'codigo' => null
    ];

    public $editForm = [
        'open' => false,
        'codigo' => null
    ];

    protected $validationAttributes=[
        'createForm.codigo' => 'codigo',
        'editForm.codigo' => 'codigo',
    ];
  
    public function index(){
        return view('admin\intranet\gestion_academica\planes.index');        
    }

    public function save(){
        $this->validate();
        try {            
            Plane::create([
                'codigo' => $this->createForm['codigo']
            ]);        
            
            $this->reset('openCreate','createForm');        
            $this->emit('create','Registro creado correctamente');
        } catch (Exception $e) {
            
        }        
    }

    public function edit(Plane $plane){
        $this->resetValidation();
        $this->plan = $plane;
        $this->editForm['open'] = true;
        $this->editForm['codigo'] = $plane->codigo;
    }

    public function update(){
        $this->validate([
            'editForm.codigo' => 'required|min:3|max:50|unique:planes,codigo,'.$this->plan->id
        ]); 

        try {
            $this->plan->update($this->editForm);
            $this->reset('editForm');
            $this->emit('update','Registro actualizado correctamente');
        } catch (Exception $e) {
            $this->emit('error',$e);
        }        
    }

    public function delete(Plane $plane){
        $this->plan = $plane;
        $this->plan->delete();
        $this->emit('borrado','Registro eliminado Correctamente');
    }

    public function cancelar(){
        $this->resetValidation();
        $this->reset('openCreate','editForm','createForm');
    }

    public function updatedEditFormCodigo(){
        $this->resetValidation();
    }

    public function updatedCreateFormCodigo(){
        $this->resetValidation();
    }    

    public function render(){

        $planes = Plane::query();
        $planes = $planes->where('estado',1)->orderBy('id','desc')->paginate(10);
        return view('livewire.admin.intranet.gestion-academica.planes.planes-index',compact('planes'));
    }
}
