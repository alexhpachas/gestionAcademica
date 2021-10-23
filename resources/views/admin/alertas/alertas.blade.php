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
</script>
