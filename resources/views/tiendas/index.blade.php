@extends('layouts.app')

@section('content')
    <!-- Contenedor de la imagen y su superposición -->
    <div class="position-relative">
        @foreach ($tiendas as $t)
        <figure>
            <img style="width:100%; height: 450px; object-fit:cover;" src="{{ Storage::url($t->image) }}"
                alt="Banner del usuario" style="max-width: 100%;" />
        </figure>

                <!-- Título y descripción superpuestos en la imagen -->
                <div class="position-absolute top-0 start-0 p-4 text-light">
                    <h1>{{ $t->name }}</h1>
                    <p>{{ $t->description }}</p>
                </div>
        @endforeach




    </div>

    <div class="container py-5">
        <h2 class="text-center fw-semibold text-muted">New products</h2>

        <div>
            <ul class="d-flex justify-content-center text-center nav-item">
                @foreach ($categorias as $categoria)
                    <li class="nav-link ms-2">
                        <a style="border-radius: 20px;" class="btn btn-outline-danger" href="">
                            {{ $categoria->name }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>

        <div class="row">
            @foreach ($productos as $product)
                <div class="col-lg-3">
                    <div class="card shadow-sm mb-3 border-0">
                        <div class="card-body">
                            <div class="rounded">
                                <figure>
                                    <img style="height: 200px; object-fit:cover;" class="w-100 img-fluid rounded"
                                        src="{{ Storage::url($product->image) }}" alt="{{ $product->name }}">
                                </figure>
                                <h5 class="fw-semibold" style="color: #1b2a4e">
                                    {{ $product->name }}
                                </h5>
                                <div class="mb-2">
                                    <p>{{ Str::limit($product->description, 30, '...') }}</p>
                                    <small>C$:{{ number_format($product->price, 2) }}</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
