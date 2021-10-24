<div class="{{-- w-full --}}max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
    <div class="flex mb-3">            
        <div class="ml-auto" wire:click="$set('openCreate',true)">            
            <x-btn-nuevo title="NUEVO CICLO" >
                
            </x-btn-nuevo>
        </div>
    </div>    

    {{-- TABLA LISTA DE ENTIDADES --}}
    <x-tabla color="green">
        <x-slot name="head">
            <x-tabla-head class="w-32">Codigo</x-tabla-head>
            <x-tabla-head>Ciclo</x-tabla-head>
            <x-tabla-head class="w-32">ACCIONES</x-tabla-head>            
        </x-slot>
                       
        <x-slot  name="body">
            @if ($ciclos->count())    
                @foreach ($ciclos as $ciclo)                
                    <tr class="hover:bg-blue-50 hover:text-blue-600 cursor-pointer border-gray-200 border-b uppercase">
                        <x-tabla-body>
                            {{$ciclo->id}}
                        </x-tabla-body>

                        <x-tabla-body>
                            {{$ciclo->nombre}}
                        </x-tabla-body>

                        <x-tabla-body>
                            <div class="flex">
                                <div wire:click="edit('{{$ciclo->id}}')">                                
                                    <x-btn-editar >
                                        
                                    </x-btn-editar>                
                                </div>
                                                            
                                <div wire:click="$emit('deleteCiclo',{{ $ciclo->id }})">
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
          

    {{-- MODAL PARA EDITAR ENTIDADES --}}
    <x-jet-dialog-modal wire:model="editForm.open" >
        <x-slot name="title">
            <div class="border-b-2 text-lg font-bold text-center text-gray-700">
                EDITAR CICLO
            </div>
        </x-slot>

        <x-slot name="content">
            <div>
                <x-jet-label>
                    Nombre
                </x-jet-label>

                <x-jet-input wire:model="editForm.nombre" type="text" class="form-control uppercase" />

                <x-jet-input-error for="editForm.nombre" />
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

    {{-- MODAL PARA CREAR ENTIDADES --}}
    <x-jet-dialog-modal wire:model="openCreate">
        <x-slot name="title">
            <div class="border-b-2 text-lg font-bold text-center text-gray-700">
                CREAR ENTIDAD
            </div>
        </x-slot>

        <x-slot name="content">
            <div>
                <x-jet-label>
                    Nombre
                </x-jet-label>
                
                <x-jet-input wire:model="createForm.nombre" required type="text" class="form-control uppercase focus:border-indigo-500" />

                <x-jet-input-error for="createForm.nombre" />
                 
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
   
</div>


