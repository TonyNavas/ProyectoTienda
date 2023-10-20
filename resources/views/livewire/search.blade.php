<form autocomplete="off">
    <div>
        <div class="input-group">
            <span class="input-group-text bg-primary text-white">
                <i class="fa-solid fa-magnifying-glass"></i>
            </span>
            <input type="text" wire:model="search" class="form-control"
                placeholder="Buscar productos...">
        </div>
    </div>

    @if ($search)
    <ul class="list-group position-absolute z-1 ">
        @forelse ($this->results as $result)
            <a class="nav-link-search bg-light"
            href="{{ route('product.show', $result) }}">
                <li class="list-group-item background-nav-search">
                    <figure class="d-flex align-items-center">
                        <img width="40px" height="40px" src="{{ Storage::url($result->image) }}" alt=""
                            class="img-responsive rounded">
                        <small class="p-1 mx-2">{{Str::limit( $result->name, 25, '...') }}</small>
                    </figure>

                    <div class="d-flex justify-content-between">
                        <small>Precio venta:
                            <span class="badge bg-info">C${{ number_format($result->price, 2) }}</span>
                        </small>

                    </div>
                </li>
            </a>
            @empty
            <li class="list-group-item background-nav-search">
                No hay resultados para esta busqueda.
            </li>
        @endforelse
      </ul>
    @endif
</form>

<style>
    .background-nav-search:hover{
        background: rgb(39, 16, 80) !important;
        color: white !important;
    }
    .nav-link-search{
        text-decoration: none !important;
        color: rgb(53, 17, 77) !important;
    }
</style>
