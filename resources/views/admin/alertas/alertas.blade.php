<script>
    Livewire.on('create', mensaje => {

        const Toast = Swal.mixin({
            toast: true,
            position: 'center',
            showConfirmButton: false,
            timer: 2000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })
        Toast.fire({
            icon: 'success',
            title: mensaje,
        })
    })

    Livewire.on('update', mensaje => {

        const Toast = Swal.mixin({
            toast: true,
            position: 'center',
            showConfirmButton: false,
            timer: 2000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })
        Toast.fire({
            icon: 'success',
            title: mensaje,
        })
    })

    Livewire.on('borrado', mensaje => {

        const Toast = Swal.mixin({
            toast: true,
            position: 'center',
            showConfirmButton: false,
            timer: 2000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })
        Toast.fire({
            icon: 'success',
            title: mensaje,
        })
    })

    Livewire.on('error', mensaje => {

        const Toast = Swal.mixin({
            toast: true,
            position: 'center',
            showConfirmButton: false,
            timer: 2000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })
        Toast.fire({
            icon: 'error',
            title: mensaje,
        })
    })


    /* ALERTAS PARA ELIMINAR REGISTROS */
    Livewire.on('deleteEntidad', entidadeId => {
        Swal.fire({
            title: 'Desea Eliminar la Entidad?',
            text: "No podra recuperar el registro!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: 'Cancelar',
            confirmButtonText: 'Si, Eliminar!'
        }).then((result) => {
            if (result.isConfirmed) {
                Livewire.emitTo('admin.intranet.gestion-academica.entidades.entidades-index', 'delete',
                    entidadeId)
            }
        })
    })

    Livewire.on('deletePlan', planId => {
        Swal.fire({
            title: 'Desea Eliminar el Plan de Estudios?',
            text: "No podra recuperar el registro!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: 'Cancelar',
            confirmButtonText: 'Si, Eliminar!'
        }).then((result) => {
            if (result.isConfirmed) {
                Livewire.emitTo('admin.intranet.gestion-academica.planes.planes-index', 'delete',
                    planId)
            }
        })
    })

    Livewire.on('deletePeriodo', periodoId => {
        Swal.fire({
            title: 'Desea Eliminar el Periodo?',
            text: "No podra recuperar el registro!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: 'Cancelar',
            confirmButtonText: 'Si, Eliminar!'
        }).then((result) => {
            if (result.isConfirmed) {
                Livewire.emitTo('admin.intranet.gestion-academica.periodos.periodos-index', 'delete',
                periodoId)
            }
        })
    })

    Livewire.on('deleteCurso', cursoId => {
        Swal.fire({
            title: 'Desea Eliminar el Curso?',
            text: "No podra recuperar el registro!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: 'Cancelar',
            confirmButtonText: 'Si, Eliminar!'
        }).then((result) => {
            if (result.isConfirmed) {
                Livewire.emitTo('admin.intranet.gestion-academica.cursos.cursos-index', 'delete',
                cursoId)
            }
        })
    })

    //CICLOS
    Livewire.on('deleteCiclo', cicloId => {
        Swal.fire({
            title: 'Desea Eliminar el Ciclo?',
            text: "No podra recuperar el registro!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: 'Cancelar',
            confirmButtonText: 'Si, Eliminar!'
        }).then((result) => {
            if (result.isConfirmed) {
                Livewire.emitTo('admin.intranet.gestion-academica.ciclos.ciclos-index', 'delete',
                    cicloId)
            }
        })
    })

    //GRUPOS
    Livewire.on('deleteGrupo', grupoId => {
        Swal.fire({
            title: 'Desea Eliminar el Grupo?',
            text: "No podra recuperar el registro!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: 'Cancelar',
            confirmButtonText: 'Si, Eliminar!'
        }).then((result) => {
            if (result.isConfirmed) {
                Livewire.emitTo('admin.intranet.gestion-academica.grupos.grupos-index', 'delete',
                    grupoId)
            }
        })
    })

    Livewire.on('deleteFacultade', facultadeId => {
        Swal.fire({
            title: 'Desea Eliminar la Facultad?',
            text: "No podra recuperar el registro!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: 'Cancelar',
            confirmButtonText: 'Si, Eliminar!'
        }).then((result) => {
            if (result.isConfirmed) {
                Livewire.emitTo('admin.intranet.gestion-academica.facultades.facultades-index', 'delete',facultadeId)
            }
        })
    })

    Livewire.on('deletePrograma', programaId => {
        Swal.fire({
            title: 'Desea Eliminar el Programa?',
            text: "No podra recuperar el registro!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: 'Cancelar',
            confirmButtonText: 'Si, Eliminar!'
        }).then((result) => {
            if (result.isConfirmed) {
                Livewire.emitTo('admin.intranet.gestion-academica.programas.programas-index', 'delete',programaId)
            }
        })
    })
</script>
