<?php

namespace App\Http\Livewire\Admin\Intranet\GestionPersona\Personas;

use App\Models\admin\intranet\gestion_academica\Persona;
use Exception;
use League\CommonMark\Node\Block\Document;
use Livewire\Component;

class PersonasIndex extends Component
{

    public $persona;
    public $openCreate = false;
    public $typeDocumentLength = 8;

    //ESCUCHAR EVENTO
    protected $listeners = 'delete';

    //FORM CREATE
    public $createForm = [
        'lastname_paternal' => null,
        'lastname_maternal' =>  null,
        'firstname' => null,
        'document_type' => null,
        'document_number' => null,
        'birthdate' => null,
        'email' => null,
        'gender' => null
    ];

    //FORM EDIT
    public $editForm = [
        'lastname_paternal' => null,
        'lastname_maternal' =>  null,
        'firstname' => null,
        'document_type' => null,
        'document_number' => null,
        'birthdate' => null,
        'email' => null,
        'gender' => null,
        'open' => false
    ];

    //REGLAS DE VALIDACIÓN
    protected $rules = [
        'createForm.lastname_paternal' => 'required',
        'createForm.lastname_maternal' =>  'required',
        'createForm.firstname' => 'required',
        'createForm.document_type' => 'required',
        'createForm.document_number' => 'required|unique:personas,document_number|numeric',
        'createForm.birthdate' => 'required',
        'createForm.email' => 'required|email',
        'createForm.gender' => 'required'
    ];

    protected $validationAttributes = [
        'createForm.lastname_paternal' => 'lastname_paternal',
        'createForm.lastname_maternal' =>  'lastname_maternal',
        'createForm.firstname' => 'firstname',
        'createForm.document_type' => 'document_type',
        'createForm.document_number' => 'document_number',
        'createForm.birthdate' => 'birthdate',
        'createForm.email' => 'email',
        'createForm.gender' => 'gender',
        'editForm.lastname_paternal' => 'lastname_paternal',
        'editForm.lastname_maternal' =>  'lastname_maternal',
        'editForm.firstname' => 'firstname',
        'editForm.document_type' => 'document_type',
        'editForm.document_number' => 'document_number',
        'editForm.birthdate' => 'birthdate',
        'editForm.email' => 'email',
        'editForm.gender' => 'gender'
    ];

    //INDEX
    public function index(){
        return view('admin\intranet\gestion_persona\personas\index');
    }


    //CREATE
    public function save(){
        $this->validate();

        Persona::create([
            'lastname_paternal' => $this->createForm['lastname_paternal'],
            'lastname_maternal' =>  $this->createForm['lastname_maternal'],
            'firstname' => $this->createForm['firstname'],
            'document_type' => $this->createForm['document_type'],
            'document_number' => $this->createForm['document_number'],
            'birthdate' => $this->createForm['birthdate'],
            'email' => $this->createForm['email'],
            'gender' => $this->createForm['gender']
        ]);

        $this->reset('createForm');
        $this->reset('openCreate');
        $this->emit('create', 'Registro Creado Correctamente');
    }

    //EDIT
    public function edit(Persona $persona){
        $this->resetValidation();
        $this->persona = $persona;
        $this->editForm['open'] = true;
        $this->editForm['lastname_paternal'] = $persona->lastname_paternal;
        $this->editForm['lastname_maternal'] =  $persona->lastname_maternal;
        $this->editForm['firstname'] = $persona->firstname;
        $this->editForm['document_type'] = $persona->document_type;
        $this->editForm['document_number'] = $persona->document_number;
        $this->editForm['birthdate'] = $persona->birthdate;
        $this->editForm['email'] = $persona->email;
        $this->editForm['gender'] = $persona->gender;
    }

    //UPDATE
    public function update(){
        $this->validate([
            'editForm.lastname_paternal' => 'required',
            'editForm.lastname_maternal' =>  'required',
            'editForm.firstname' => 'required',
            'editForm.document_type' => 'required',
            'editForm.document_number' => 'required|numeric|unique:personas,document_number,'.$this->persona->id,
            'editForm.birthdate' => 'required',
            'editForm.email' => 'required|email',
            'editForm.gender' => 'required'
        ]);

        try{

            $this->persona->update($this->editForm);
            $this->reset('editForm');
            $this->emit('update', 'Registro Actualizado Correctamente');

        } catch (Exception $e){

        }
    }

    //DELETE
    public function delete(Persona $persona){
        $this->persona = $persona;
        $this->persona->delete();
        $this->emit('borrado', 'Registro Eliminado Correctamente');
    }

    //CANCELAR MODAL
    public function cancelar(){
        $this->reset('editForm', 'openCreate', 'createForm');
        $this->resetValidation();
    }

    //RESETEAR VALIDACIÓN EDIT
    public function updatedEditFormLastnamePaternal(){
        $this->resetValidation();
    }
    public function updatedEditFormLastnameMaternal(){
        $this->resetValidation();
    }
    public function updatedEditFormFirstname(){
        $this->resetValidation();
    }
    public function updatedEditFormDocumentType($value){
        $this->resetValidation();
        if($value=='DNI'){
            $this->typeDocumentLength = 8;
        } else if($value =='PAS'){
            $this->typeDocumentLength = 9;
        } else if($value == 'CE'){
            $this->typeDocumentLength = 7;
        } else if($value == "CI"){
            $this->typeDocumentLength = 10;
        }else{
            $this->typeDocumentLength = 0;
        }
        $this->editForm['document_number'] = '';
    }
    public function updatedEditFormDocumentNumber(){
        $this->resetValidation();
    }
    public function updatedEditFormBirthdate(){
        $this->resetValidation();
    }
    public function updatedEditFormEmail(){
        $this->resetValidation();
    }
    public function updatedEditFormGender(){
        $this->resetValidation();
    }

    //RESETEAR VALIDACIÓN CREATE
    public function updatedCreateFormLastnamePaternal(){
        $this->resetValidation();
    }
    public function updatedCreateFormLastnameMaternal(){
        $this->resetValidation();
    }
    public function updatedCreateFormFirstname(){
        $this->resetValidation();
    }
    public function updatedCreateFormDocumentType($value){
        $this->resetValidation();
        if($value=='DNI'){
            $this->typeDocumentLength = 8;
        } else if($value =='PAS'){
            $this->typeDocumentLength = 9;
        } else if($value == 'CE'){
            $this->typeDocumentLength = 7;
        } else if($value == "CI"){
            $this->typeDocumentLength = 10;
        }else{
            $this->typeDocumentLength = 0;
        }
        $this->createForm['document_number'] = '';
    }
    public function updatedCreateFormDocumentNumber(){
        $this->resetValidation();
    }
    public function updatedCreateFormBirthdate(){
        $this->resetValidation();
    }
    public function updatedCreateFormEmail(){
        $this->resetValidation();
    }
    public function updatedCreateFormGender(){
        $this->resetValidation();
    }

    public function render()
    {
        $personas = Persona::query();
        $personas = $personas->where('status', 1)->orderBy('id', 'asc')->paginate();
        return view('livewire.admin.intranet.gestion-persona.personas.personas-index', compact('personas'));
    }
}
