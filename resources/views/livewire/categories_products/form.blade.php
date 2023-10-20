<form>
    <div class="mb-3">
        <label class="form-label">Nombre de la categoria:</label>
        <input style="height: 3rem;" type="text" wire:model.lazy="name" class="form-control"
            placeholder="Ejemplo: Eléctronicos">
    </div>
    <div class="mb-3">
        <label class="form-label">Descripción</label>
        <input style="height: 3rem;" type="text" wire:model.lazy="description" class="form-control"
            placeholder="Ingresa una descripción de la categoria">
    </div>

    <div>
        @if ($selected_id < 1) <button type="button" wire:click.prevent="store()" class="btn btn-primary">
            <span><i class="fas fa-plus"></i> Guardar
            </span>
            </button>

            <button type="button" wire:click.prevent="resetUI()" class="btn btn-success">
                <span><i class="fas fa-broom"></i> Limpiar
                </span>
            </button>
            @else
            <button type="button" wire:click.prevent="update()" class="btn btn-warning">
                <span><i class="fas fa-pencil-alt"></i> Editar</span>
            </button>

            <button type="button" wire:click.prevent="resetUI" class="btn btn-danger">
                <span><i class="fa-solid fa-ban"></i> Cancelar</span>
            </button>
            @endif
    </div>
</form>
