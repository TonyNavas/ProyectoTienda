<div class="table-responsive">
    <table class="table table-hover">

        <thead>
            <tr>
                <th>Imagen</th>
                <th>Tienda</th>
                <th>Descripción</th>
                <th class="text-center">Dirección</th>
                <th class="text-center">Acciones</th>
            </tr>
            <tr aria-hidden="true" class="mt-3 d-block table-row-hidden"></tr>
        </thead>
        <tbody>
            @foreach ($tiendas as $tienda)
                <tr>
                    <td><img width="60px" height="50px" class="rounded" src="{{ Storage::url($tienda->image) }}" alt="Image"></td>
                    <td>{{ $tienda->name }}</td>
                    <td>{{ Str::limit($tienda->description, 10, '...') }}</td>
                    <td>{{ Str::limit($tienda->address, 10, '...') }}</td>


                    <td class="text-center">
                        <div class="d-flex justify-content-center">
                            <a href="javascript:void(0)" wire:click="edit({{ $tienda->id }})"
                                class="btn text-white bg-warning me-1" title="Editar">
                                <i class="fas fa-edit"></i>
                            </a>

                            <a href="javascript:void(0)" onclick="Confirm('{{ $tienda->id }}')"
                                class="btn btn-danger" title="Eliminar">
                                <i class="fas fa-trash"></i>
                            </a>
                        </div>
                    </td>

                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $tiendas->links() }}
</div>
