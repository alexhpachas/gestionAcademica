<div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
    <div class="flex mb-3">            
        <div class="ml-auto" wire:click="$set('openCreate',true)">            
            <x-btn-nuevo title="NUEVO PLAN DE ESTUDIOS" >
                
            </x-btn-nuevo>
        </div>
    </div>

    {{-- TABLA LISTA DE PLANES --}}
    <x-tabla color="green">
        <x-slot name="head">
            <x-tabla-head class="w-32">Codigo</x-tabla-head>
            <x-tabla-head>Plan de estudios</x-tabla-head>
            <x-tabla-head class="w-32">ACCIONES</x-tabla-head>              
        </x-slot>
                       
        <x-slot  name="body">
            @if ($planes->count())    
                @foreach ($planes as $plane)                
                    <tr class="hover:bg-blue-50 hover:text-blue-600 cursor-pointer border-gray-200 border-b uppercase">
                        <x-tabla-body>
                            {{$plane->id}}
                        </x-tabla-body>

                        <x-tabla-body>
                            {{$plane->codigo}}
                        </x-tabla-body>

                        <x-tabla-body>
                            <div class="flex">
                                <div wire:click="edit('{{$plane->id}}')">                                
                                    <x-btn-editar >
                                        
                                    </x-btn-editar>                
                                </div>
                                                            
                                <div wire:click="$emit('deletePlan',{{ $plane->id }})">
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
    @if ($planes->hasPages())
        <div class="px-6 py-4">
            {{$planes->links()}}
        </div>                
    @endif 
    

    {{-- MODAL PARA CREAR PLANES --}}
    <x-jet-dialog-modal wire:model="openCreate">
        <x-slot name="title">
            <div class="border-b-2 text-lg font-bold text-center text-gray-700">
                CREAR PLAN DE ESTUDIOS
            </div>
        </x-slot>

        <x-slot name="content">
            <div>
                <x-jet-label>
                    Codigo
                </x-jet-label>
                
                <x-jet-input wire:keydown.enter="save" wire:model="createForm.codigo" required type="text" class="form-control uppercase focus:border-indigo-500" />

                <x-jet-input-error for="createForm.codigo" />
                 
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

    {{-- MODAL PARA EDITAR PLANES --}}
    <x-jet-dialog-modal wire:model="editForm.open">
        <x-slot name="title">
            <div class="border-b-2 text-lg font-bold text-center text-gray-700">
                EDITAR PLAN DE ESTUDIOS
            </div>
        </x-slot>

        <x-slot name="content">
            <div>
                <x-jet-label>
                    Codigo
                </x-jet-label>
                
                <x-jet-input wire:keydown.enter="update" wire:model="editForm.codigo" required type="text" class="form-control uppercase focus:border-indigo-500" />

                <x-jet-input-error for="editForm.codigo" />
                 
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
