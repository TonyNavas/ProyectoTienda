<div class="table-responsive">
    <table class="table table-hover">

        <thead>
            <tr>
                <th>Imagen</th>
                <th>Categoria</th>
                <th>Producto</th>
                <th class="text-center">Precio</th>
                <th class="text-center">Acciones</th>
            </tr>
            <tr aria-hidden="true" class="mt-3 d-block table-row-hidden"></tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td><img width="60px" height="50px" class="rounded" src="{{ Storage::url($product->image) }}" alt="Image"></td>
                    <td>{{ $product->category->name }}</td>
                    <td>{{ Str::limit($product->name, 10, '...') }}</td>

                    <td class="text-center">
                        <span class="badge text-bg-light rounded-pill">
                            C$:{{ number_format($product->price, 2) }}
                        </span>
                    </td>

                    <td class="text-center">
                        <div class="d-flex justify-content-center">
                            <a href="javascript:void(0)" wire:click="edit({{ $product->id }})"
                                class="btn text-white bg-warning me-1" title="Editar">
                                <i class="fas fa-edit"></i>
                            </a>

                            <a href="javascript:void(0)" onclick="Confirm('{{ $product->id }}')"
                                class="btn btn-danger" title="Eliminar">
                                <i class="fas fa-trash"></i>
                            </a>
                        </div>
                    </td>

                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $products->links() }}
</div>
