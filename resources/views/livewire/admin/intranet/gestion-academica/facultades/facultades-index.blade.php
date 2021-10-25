<div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
    <div class="flex mb-3">            
        <div class="ml-auto" wire:click="$set('openCreate',true)">            
            <x-btn-nuevo title="NUEVA FACULTAD" >
                
            </x-btn-nuevo>
        </div>
    </div>

    {{-- TABLA LISTA DE CURSOS --}}
    <x-tabla color="green">
        <x-slot name="head">
            <x-tabla-head class="w-10">Id</x-tabla-head>
            <x-tabla-head class="w-16">Nombre</x-tabla-head>
            <x-tabla-head class="w-16">Codigo</x-tabla-head>
            <x-tabla-head class="w-30">Abreviatura</x-tabla-head>
            <x-tabla-head class="w-42">Entidad</x-tabla-head>            
            <x-tabla-head class="w-32">ACCIONES</x-tabla-head>              
        </x-slot>
                       
        <x-slot  name="body">
            @if ($facultades->count())    
                @foreach ($facultades as $facultade)                
                    <tr class="hover:bg-blue-50 hover:text-blue-600 cursor-pointer border-gray-200 border-b uppercase">
                        <x-tabla-body>
                            {{$facultade->id}}
                        </x-tabla-body>

                        <x-tabla-body>
                            {{$facultade->nombre}}
                        </x-tabla-body>

                        <x-tabla-body>
                            {{$facultade->codigo}}
                        </x-tabla-body>

                        <x-tabla-body>
                            {{$facultade->abreviatura}}
                        </x-tabla-body>

                        <x-tabla-body>
                            {{$facultade->entidade->nombre}}                            
                        </x-tabla-body>
                        
                        <x-tabla-body>
                            <div class="flex">
                                <div wire:click="edit('{{$facultade->id}}')">                                
                                    <x-btn-editar >
                                        
                                    </x-btn-editar>                
                                </div>
                                                            
                                <div wire:click="$emit('deleteFacultade',{{ $facultade->id }})">
                                    <x-btn-eliminar />
                                </div>                              

                            </div>
                        </x-tabla-body>                   
                    </tr>    
                @endforeach                   
            @else
                <tr>
                    <x-tabla-body>                        
                            <p class="font-bold text-red-600">UPS..!!!</p>
                            <p class="text-sm">No se encontraron registros...</p>                        
                    </x-tabla-body>
                </tr>
            @endif                           
        </x-slot>                  
    </x-tabla>
    @if ($facultades->hasPages())
        <div class="px-6 py-4">
            {{$facultades->links()}}
        </div>                
    @endif 
    
    

    {{-- MODAL PARA CREAR FACULTADES --}}
    <x-jet-dialog-modal wire:model="openCreate">
        <x-slot name="title">
            <div class="border-b-2 text-lg font-bold text-center text-gray-700">
                CREAR FACULTAD
            </div>
        </x-slot>

        <x-slot name="content">

            <div class="mb-3">
                <x-jet-label>
                    Nombre
                </x-jet-label>
                
                <x-jet-input wire:model="createForm.nombre" required type="text" class="form-control uppercase focus:border-indigo-500" />

                <x-jet-input-error for="createForm.nombre" />
                 
            </div>

            <div class="mb-3">
                <x-jet-label>
                    Codigo
                </x-jet-label>
                
                <x-jet-input wire:model="createForm.codigo" required type="text" class="form-control uppercase focus:border-indigo-500" />

                <x-jet-input-error for="createForm.codigo" />
                 
            </div>            

            <div class="mb-3">
                <x-jet-label>
                    Abreviatura
                </x-jet-label>
                
                <x-jet-input wire:model="createForm.abreviatura" required type="text" class="form-control uppercase focus:border-indigo-500" />

                <x-jet-input-error for="createForm.abreviatura" />
                 
            </div>

            <div class="mb-3">
                <x-jet-label>
                    Entidad
                </x-jet-label>

                <select wire:model="createForm.entidade_id" class="form-control" name="" id="">
                    <option value="">====== SELECCIONE ======</option>
                    @foreach ($entidades as $entidade)
                        <option value="{{$entidade->id}}">{{$entidade->nombre}}</option>
                    @endforeach
                </select>
                                
                <x-jet-input-error for="createForm.entidade_id" />
                 
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-jet-danger-button wire:loading.attr="disabled" wire:target="save" wire:click="save">
                CREAR
            </x-jet-danger-button>

            <x-jet-secondary-button wire:click="cancelar">
                CANCELAR
            </x-jet-secondary-button>            
        </x-slot>
    </x-jet-dialog-modal>

    {{-- MODAL PARA EDITAR FACULTADES --}}
    <x-jet-dialog-modal wire:model="editForm.open">
        <x-slot name="title">
            <div class="border-b-2 text-lg font-bold text-center text-gray-700">
                EDITAR FACULTAD
            </div>
        </x-slot>

        <x-slot name="content">

            <div class="mb-3">
                <x-jet-label>
                    Nombre
                </x-jet-label>
                
                <x-jet-input wire:model="editForm.nombre" required type="text" class="form-control uppercase focus:border-indigo-500" />

                <x-jet-input-error for="editForm.nombre" />
                 
            </div>

            <div class="mb-3">
                <x-jet-label>
                    Codigo
                </x-jet-label>
                
                <x-jet-input wire:model="editForm.codigo" required type="text" class="form-control uppercase focus:border-indigo-500" />

                <x-jet-input-error for="editForm.codigo" />
                 
            </div>            

            <div class="mb-3">
                <x-jet-label>
                    Abreviatura
                </x-jet-label>
                
                <x-jet-input wire:model="editForm.abreviatura" required type="text" class="form-control uppercase focus:border-indigo-500" />

                <x-jet-input-error for="editForm.abreviatura" />
                 
            </div>

            <div class="mb-3">
                <x-jet-label>
                    Entidad
                </x-jet-label>

                <select wire:model="editForm.entidade_id" class="form-control" name="" id="">
                    <option value="">====== SELECCIONE ======</option>
                    @foreach ($entidades as $entidade)
                        <option value="{{$entidade->id}}">{{$entidade->nombre}}</option>
                    @endforeach
                </select>
                                
                <x-jet-input-error for="editForm.entidade_id" />
                 
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-jet-danger-button wire:loading.attr="disabled" wire:target="update" wire:click="update">
                ACTUALIZAR
            </x-jet-danger-button>

            <x-jet-secondary-button wire:click="cancelar">
                CANCELAR
            </x-jet-secondary-button>            
        </x-slot>
    </x-jet-dialog-modal>

    
          
</div>
