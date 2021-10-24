<div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
    <div class="flex mb-3">            
        <div class="ml-auto" wire:click="$set('openCreate',true)">            
            <x-btn-nuevo title="NUEVO CURSO" >
                
            </x-btn-nuevo>
        </div>
    </div>

    {{-- TABLA LISTA DE CURSOS --}}
    <x-tabla color="green">
        <x-slot name="head">
            <x-tabla-head class="w-10">Id</x-tabla-head>
            <x-tabla-head class="w-16">Codigo</x-tabla-head>
            <x-tabla-head class="w-30">Nombre del Curso</x-tabla-head>
            <x-tabla-head class="w-42">H Teoricas</x-tabla-head>
            <x-tabla-head class="w-42">H Practicas</x-tabla-head>
            <x-tabla-head class="w-20">Creditos</x-tabla-head>
            <x-tabla-head>Tipo</x-tabla-head>
            <x-tabla-head class="w-32">ACCIONES</x-tabla-head>              
        </x-slot>
                       
        <x-slot  name="body">
            @if ($cursos->count())    
                @foreach ($cursos as $curso)                
                    <tr class="hover:bg-blue-50 hover:text-blue-600 cursor-pointer border-gray-200 border-b uppercase">
                        <x-tabla-body>
                            {{$curso->id}}
                        </x-tabla-body>

                        <x-tabla-body>
                            {{$curso->codigo}}
                        </x-tabla-body>

                        <x-tabla-body>
                            {{$curso->nombre}}
                        </x-tabla-body>

                        <x-tabla-body>
                            {{$curso->horas_teoricas}}
                        </x-tabla-body>

                        <x-tabla-body>
                            {{$curso->horas_practicas}}
                        </x-tabla-body>

                        <x-tabla-body>
                            {{$curso->creditos}}
                        </x-tabla-body>

                        <x-tabla-body>
                            @if ($curso->tipo == 1)
                                <span>OBLIGATORIO</span>
                            @else
                                <span>ELECTIVO</span>
                            @endif
                        </x-tabla-body>

                        <x-tabla-body>
                            <div class="flex">
                                <div wire:click="edit('{{$curso->id}}')">                                
                                    <x-btn-editar >
                                        
                                    </x-btn-editar>                
                                </div>
                                                            
                                <div wire:click="$emit('deleteCurso',{{ $curso->id }})">
                                    <x-btn-eliminar />
                                </div>
                                @php
                                    $hola = 'hola';
                                @endphp

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
    @if ($cursos->hasPages())
        <div class="px-6 py-4">
            {{$cursos->links()}}
        </div>                
    @endif 
    

    {{-- MODAL PARA CREAR CURSOS --}}
    <x-jet-dialog-modal wire:model="openCreate">
        <x-slot name="title">
            <div class="border-b-2 text-lg font-bold text-center text-gray-700">
                CREAR CURSOS
            </div>
        </x-slot>

        <x-slot name="content">
            <div class="mb-3">
                <x-jet-label>
                    Codigo
                </x-jet-label>
                
                <x-jet-input wire:model="createForm.codigo" required type="text" class="form-control uppercase focus:border-indigo-500" />

                <x-jet-input-error for="createForm.codigo" />
                 
            </div>

            <div class="mb-3">
                <x-jet-label>
                    Nombre
                </x-jet-label>
                
                <x-jet-input wire:model="createForm.nombre" required type="text" class="form-control uppercase focus:border-indigo-500" />

                <x-jet-input-error for="createForm.nombre" />
                 
            </div>

            <div class="mb-3">
                <x-jet-label>
                    Horas Teoricas
                </x-jet-label>
                
                <x-jet-input wire:model="createForm.horas_Teoricas" required type="text" class="form-control uppercase focus:border-indigo-500" />

                <x-jet-input-error for="createForm.horas_Teoricas" />
                 
            </div>

            <div class="mb-3">
                <x-jet-label>
                    Horas Practicas
                </x-jet-label>
                
                <x-jet-input wire:model="createForm.horas_Practicas" required type="text" class="form-control uppercase focus:border-indigo-500" />

                <x-jet-input-error for="createForm.horas_Practicas" />
                 
            </div>

            <div class="mb-3">
                <x-jet-label>
                    Creditos
                </x-jet-label>
                
                <x-jet-input wire:model="createForm.creditos" required type="text" class="form-control uppercase focus:border-indigo-500" />

                <x-jet-input-error for="createForm.creditos" />
                 
            </div>

            <div class="mb-3">
                <x-jet-label>
                    Tipo
                </x-jet-label>

                <select wire:model="createForm.tipo" class="form-control" name="" id="">
                    <option value="">====== SELECCIONE ======</option>
                    <option value="1">OBLIGATORIO</option>
                    <option value="2">ELECTIVO</option>
                </select>
                                
                <x-jet-input-error for="createForm.tipo" />
                 
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

    {{-- MODAL PARA EDITAR CURSOS --}}
    <x-jet-dialog-modal wire:model="editForm.open">
        <x-slot name="title">
            <div class="border-b-2 text-lg font-bold text-center text-gray-700">
                CREAR CURSOS
            </div>
        </x-slot>

        <x-slot name="content">
            <div>
                <x-jet-label>
                    Codigo
                </x-jet-label>
                
                <x-jet-input wire:model="editForm.codigo" required type="text" class="form-control uppercase focus:border-indigo-500" />

                <x-jet-input-error for="editForm.codigo" />
                 
            </div>

            <div>
                <x-jet-label>
                    Nombre
                </x-jet-label>
                
                <x-jet-input wire:model="editForm.nombre" required type="text" class="form-control uppercase focus:border-indigo-500" />

                <x-jet-input-error for="editForm.nombre" />
                 
            </div>

            <div>
                <x-jet-label>
                    Horas Teoricas
                </x-jet-label>
                
                <x-jet-input wire:model="editForm.horas_Teoricas" required type="text" class="form-control uppercase focus:border-indigo-500" />

                <x-jet-input-error for="editForm.horas_Teoricas" />
                 
            </div>

            <div>
                <x-jet-label>
                    Horas Practicas
                </x-jet-label>
                
                <x-jet-input wire:model="editForm.horas_Practicas" required type="text" class="form-control uppercase focus:border-indigo-500" />

                <x-jet-input-error for="editForm.horas_Practicas" />
                 
            </div>

            <div>
                <x-jet-label>
                    Creditos
                </x-jet-label>
                
                <x-jet-input wire:model="editForm.creditos" required type="text" class="form-control uppercase focus:border-indigo-500" />

                <x-jet-input-error for="editForm.creditos" />
                 
            </div>

            <div>
                <x-jet-label>
                    Tipo
                </x-jet-label>

                <select wire:model="editForm.tipo" class="form-control" name="" id="">
                    <option value="">====== SELECCIONE ======</option>
                    <option value="1">OBLIGATORIO</option>
                    <option value="2">ELECTIVO</option>
                </select>
                                
                <x-jet-input-error for="editForm.tipo" />
                 
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
