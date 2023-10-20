<div class="table-responsive ">

    <table class="table table-hover rounded overflow-hidden">

        <thead class="table-primary">
            <tr>
                <th scope="col">Nombre</th>
                <th scope="col">Descripción</th>
                <th class="text-center">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
                <tr>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->description }}</td>

                    <td class="text-center">
                        <div class="d-flex justify-content-center">
                            <a href="javascript:void(0)" wire:click="edit({{ $category->id }})"
                                class="btn text-primary me-1" title="Editar">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="javascript:void(0)" onclick="Confirm('{{ $category->id }}')"
                                class="btn text-danger" title="Eliminar">
                                <i class="fas fa-trash"></i>
                            </a>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $categories->links() }}
</div>
