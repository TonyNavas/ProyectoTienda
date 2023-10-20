<div class="container py-4">
    <div class="row">
        <div class="col-lg-5 col-md-5 col-sm-12 mb-2">

            <div class="card border-0 shadow">
                <div class="card-body">
                    @include('livewire.categories_products.form')
                </div>
            </div>
        </div>
        <div class="col-lg-7 col-md-7 col-sm-12">
            <div class="input-group flex-nowrap mb-3 ">
                <span class="input-group-text bg-primary text-white">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </span>
                <input style="height: 3rem;" type="text" wire:model="search" class="form-control"
                placeholder="Buscar en categorias...">
              </div>
            <div class="card border-0 shadow">
                <div class="card-body">
                    @include('livewire.categories_products.table')
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {

        window.livewire.on('category-stored', category => {
            Swal.fire({
                position: 'top-end',
                icon: 'success',
                background: '#191E3A',
                color: '#fff',
                title: 'Guardado correctamente!',
                text: 'Categoria:' + category.name,
                showConfirmButton: false,
                timer: 1500
            })
        });

        window.livewire.on('category-updated', msg => {
            Swal.fire({
                position: 'top-end',
                icon: 'success',
                background: '#191E3A',
                color: '#fff',
                title: 'Actualizado correctamente!',
                showConfirmButton: false,
                timer: 1500
            })
        });

        window.livewire.on('category-deleted', msg => {
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
                swal.close()
            }
        });
    }
</script>
