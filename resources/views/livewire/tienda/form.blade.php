<div>
    <div class="form-group mb-2">
        <label for="image">Image</label>
        <input type="file" wire:model.lazy="image" id="{{ $identificador }}" class="form-control">
    </div>
    @error('image')
        <span class="text-danger er">{{ $message }}</span>
    @enderror

    <div class="form-group">
        <label>Nombre de la tienda:</label>
        <input style="height: 3rem;" type="text" wire:model.lazy="name" class="form-control"
            placeholder="Ejemplo: Artesanias Juan">
        @error('name')
            {{ $message }}
        @enderror
    </div>


    <div class="form-group mb-2">
        <label>Descripción:</label>
        <input style="height: 3rem;" type="text" wire:model.lazy="description" class="form-control"
            placeholder="Ingrese una descripción">
    </div>

    <div class="row">
        <div class="col-12">
            <div class="form-group mb-2">
                <label>Dirección:</label>
                <input style="height: 3rem;" type="text" wire:model.lazy="address" class="form-control"
                    placeholder="Ingresa la dirección de tu tienda">
            </div>
        </div>
    </div>

    @if ($selected_id < 1)
        <div class="row mt-3">
            <div class="col-6">
                <button type="button" wire:click.prevent="store()" class="btn btn-primary w-100">
                    <span><i class="fas fa-plus"></i> Guardar
                    </span>
                </button>
            </div>
            <div class="col-6">
                <button type="button" wire:click.prevent="resetUI()" class="btn btn-success w-100">
                    <span><i class="fas fa-broom"></i> Limpiar
                    </span>
                </button>
            </div>
        </div>
    @else
        <button type="button" wire:click.prevent="update()" class="btn btn-warning">
            <span><i class="fas fa-pencil-alt"></i> Editar</span>
        </button>
    @endif
</div>
