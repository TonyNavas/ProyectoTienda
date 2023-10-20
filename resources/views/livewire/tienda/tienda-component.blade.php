<div class="container py-4">
    <div class="row">

        <div class="col-lg-4 col-md-4 col-sm-12 mb-2">
            <div class="card border-0 shadow">
                <div class="card-body">
                    @include('livewire.tienda.form')
                </div>
            </div>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12">
            @include('livewire.tienda.image-load')
            <div class="card border-0 shadow">
                <div class="card-body">
                    @include('livewire.tienda.table')
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {

        window.livewire.on('tienda-stored', msg => {
            Swal.fire({
                position: 'top-end',
                icon: 'success',
                background: '#191E3A',
                color: '#fff',
                title: 'Guardado correctamente!',
                showConfirmButton: false,
                timer: 1500
            })
        });

        window.livewire.on('tienda-updated', msg => {
            Swal.fire({
                position: 'top-end',
                icon: 'success',
                background: '#191E3A',
                color: '#fff',
                title: 'Modificado correctamente!',
                showConfirmButton: false,
                timer: 1500
            })
        });

        window.livewire.on('tienda-deleted', msg => {
            Swal.fire({
                position: 'top-end',
                icon: 'success',
                background: '#191E3A',
                color: '#fff',
                title: 'Eliminado correctamente!',
                showConfirmButton: false,
                timer: 1500
            })
        });
    });

    function Confirm(id) {
        Swal.fire({
            title: 'Estas seguro?',
            text: "No podras revertir esta acción!",
            icon: 'warning',
            background: '#191E3A',
            color: '#fff',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, eliminar!'
        }).then(function(result) {
            if (result.value) {
                window.livewire.emit('destroy', id)
                Swal.close()
            }
        });
    }
</script>
