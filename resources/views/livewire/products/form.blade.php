<div>
    <div class="form-group mb-2">
        <label for="image">Image</label>
        <input type="file" wire:model.lazy="image" id="{{ $identificador }}" class="form-control">
    </div>
    @error('image')
        <span class="text-danger er">{{ $message }}</span>
    @enderror

    <div class="form-group mb-2">
        <label>Categoria:</label>
        <select style="height: 3rem;" wire:model.lazy="category_id" class="form-control">
            <option class="text-center" value="">---Selecciona la categoria---</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label>Nombre del producto:</label>
        <input style="height: 3rem;" type="text" wire:model.lazy="name" class="form-control"
            placeholder="Ejemplo: Desayuno">
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
                <label>Precio:</label>
                <input style="height: 3rem;" type="number" wire:model.lazy="price" class="form-control"
                    placeholder="00.00">
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
