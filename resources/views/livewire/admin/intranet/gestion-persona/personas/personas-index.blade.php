<div class="{{-- w-full --}}max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
    <div class="flex mb-3">
        <div class="ml-auto" wire:click="$set('openCreate',true)">
            <x-btn-nuevo title="NUEVA PERSONA">

            </x-btn-nuevo>
        </div>
    </div>

    {{-- TABLA LISTA DE ENTIDADES --}}
    <x-tabla color="green">
        <x-slot name="head">
            <x-tabla-head>APELLIDOS Y NOMBRES</x-tabla-head>
            <x-tabla-head>Documento</x-tabla-head>
            <x-tabla-head>Número</x-tabla-head>
            <x-tabla-head>Fecha Nacimiento</x-tabla-head>
            <x-tabla-head>Email</x-tabla-head>
            <x-tabla-head class="w-32">ACCIONES</x-tabla-head>
        </x-slot>

        <x-slot name="body">
            @if ($personas->count())
                @foreach ($personas as $persona)
                    <tr class="hover:bg-blue-50 hover:text-blue-600 cursor-pointer border-gray-200 border-b uppercase">
                        <x-tabla-body>
                            {{ $persona->lastname_paternal . ' ' . $persona->lastname_maternal . ' ' . $persona->firstname }}
                        </x-tabla-body>
                        <x-tabla-body>{{ $persona->document_type }}</x-tabla-body>
                        <x-tabla-body>{{ $persona->document_number }}</x-tabla-body>
                        <x-tabla-body>{{ $persona->birthdate }}</x-tabla-body>
                        <x-tabla-body>{{ $persona->email }}</x-tabla-body>
                        <x-tabla-body>
                            <div class="flex">
                                <div wire:click="edit('{{ $persona->id }}')">
                                    <x-btn-editar>

                                    </x-btn-editar>
                                </div>

                                <div wire:click="$emit('deleteEntidad',{{ $persona->id }})">
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
    <x-jet-dialog-modal wire:model="editForm.open">
        <x-slot name="title">
            <div class="border-b-2 text-lg font-bold text-center text-gray-700">
                EDITAR PERSONA
            </div>
        </x-slot>

        <x-slot name="content">
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <x-jet-label>Apellido Paterno</x-jet-label>
                    <x-jet-input wire:keydown.enter="update" wire:model="editForm.lastname_paternal" type="text"
                        class="form-control uppercase" />
                    <x-jet-input-error for="editForm.lastname_paternal" />
                </div>
                <div>
                    <x-jet-label>Apellido Materno</x-jet-label>
                    <x-jet-input wire:keydown.enter="update" wire:model="editForm.lastname_maternal" type="text"
                        class="form-control uppercase" />
                    <x-jet-input-error for="editForm.lastname_maternal" />
                </div>
                <div>
                    <x-jet-label>Nombres</x-jet-label>
                    <x-jet-input wire:keydown.enter="update" wire:model="editForm.firstname" type="text"
                        class="form-control uppercase" />
                    <x-jet-input-error for="editForm.firstname" />
                </div>
                <div>
                    <x-jet-label>email</x-jet-label>
                    <x-jet-input wire:keydown.enter="update" wire:model="editForm.email" type="text"
                        class="form-control uppercase" />
                    <x-jet-input-error for="editForm.email" />
                </div>
                <div>
                    <x-jet-label>Tipo de Documento</x-jet-label>
                    <select wire:keydown.enter="update" wire:model="editForm.document_type" class="form-control">
                        <option value="">===== SELECCIONE =====</option>
                        <option value="DNI">DNI</option>
                        <option value="PAS">PASAPORTE</option>
                        <option value="CE">CARNET DE EXTRANJERÍA</option>
                        <option value="CI">CEDULA DE IDENTIDAD</option>
                    </select>
                    <x-jet-input-error for="createForm.document_type" />
    
                </div>
                <div>
                    <x-jet-label>Número de Documento</x-jet-label>
                    <input wire:keydown.enter="update" wire:model="editForm.document_number" required type="text" maxlength="{{$typeDocumentLength}}" onKeyPress="return soloNumeros(event)" placeholder="Ejemplo: 47364052" class="form-control uppercase"/><i>(Máximo {{$typeDocumentLength}} dígitos)</i>
                    <x-jet-input-error for="editForm.document_number" />
                </div>
                <div>
                    <x-jet-label>Fecha de Nacimiento</x-jet-label>
                    <x-jet-input wire:keydown.enter="update" wire:model="editForm.birthdate" type="text"
                        class="form-control uppercase" />
                    <x-jet-input-error for="editForm.birthdate" />
                </div>
                <div>
                    <x-jet-label>Genero</x-jet-label>
                    <select wire:keydown.enter="update" wire:model="editForm.gender" class="form-control">
                        <option value="">===== SELECCIONE =====</option>
                        <option value="MASCULINO">MASCULINO</option>
                        <option value="FEMENINO">FEMENINO</option>
                    </select>
                    <x-jet-input-error for="editForm.gender" />
                </div>
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
                CREAR PERSONA
            </div>
        </x-slot>

        <x-slot name="content">
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <x-jet-label>Apellido Paterno</x-jet-label>
                    <x-jet-input wire:keydown.enter="save" wire:model="createForm.lastname_paternal" required type="text" class="form-control uppercase"/>
                    <x-jet-input-error for="createForm.lastname_paternal" />
                     
                </div>
                <div>
                    <x-jet-label>Apellido Materno</x-jet-label>
                    <x-jet-input wire:keydown.enter="save" wire:model="createForm.lastname_maternal" required type="text" class="form-control uppercase"/>
                    <x-jet-input-error for="createForm.lastname_maternal" />
                     
                </div>
                <div>
                    <x-jet-label>Nombres</x-jet-label>
                    <x-jet-input wire:keydown.enter="save" wire:model="createForm.firstname" required type="text" class="form-control uppercase"/>
                    <x-jet-input-error for="createForm.firstname" />
                     
                </div>
                <div>
                    <x-jet-label>Email</x-jet-label>
                    <x-jet-input wire:keydown.enter="save" wire:model="createForm.email" required type="text" class="form-control uppercase"/>
                    <x-jet-input-error for="createForm.email" />
                     
                </div>
                <div>
                    <x-jet-label>Tipo de Documento</x-jet-label>
                    <select  wire:model="createForm.document_type" class="form-control">
                        <option value="">===== SELECCIONE =====</option>
                        <option value="DNI">DNI</option>
                        <option value="PAS">PASAPORTE</option>
                        <option value="CE">CARNET DE EXTRANJERÍA</option>
                        <option value="CI">CEDULA DE IDENTIDAD</option>
                    </select>
                    <x-jet-input-error for="createForm.document_type" />
                     
                </div>
                <div>
                    <x-jet-label>Número de Documento</x-jet-label>
                    <input wire:keydown.enter="save" wire:model="createForm.document_number" required type="text" maxlength="{{$typeDocumentLength}}" onKeyPress="return soloNumeros(event)" placeholder="Ejemplo: 47364052" class="form-control uppercase"/><i>(Máximo {{$typeDocumentLength}} dígitos)</i>
                    <x-jet-input-error for="createForm.document_number" />
                     
                </div>
                <div>
                    <x-jet-label>Fecha de Nacimiento</x-jet-label>
                    <x-jet-input wire:keydown.enter="save" wire:model="createForm.birthdate" required type="date" class="form-control uppercase"/>
                    <x-jet-input-error for="createForm.birthdate" />
                     
                </div>
                <div>
                    <x-jet-label>Genero</x-jet-label>
                    <select  wire:keydown.enter="update" wire:model="createForm.gender" class="form-control">
                        <option value="">===== SELECCIONE =====</option>
                        <option value="MASCULINO">MASCULINO</option>
                        <option value="FEMENINO">FEMENINO</option>
                    </select>
                    <x-jet-input-error for="createForm.gender" />
                     
                </div>
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
