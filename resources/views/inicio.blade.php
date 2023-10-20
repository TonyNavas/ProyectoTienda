
@extends('layouts.app')

@section('content')
    <div class="cover-image">
        <img src="https://i0.wp.com/www.cclm.cl/wp-content/uploads/2021/08/artesanias-de-chile-2021.jpg?resize=2100%2C900&ssl=1" alt="Imagen de Portada" class="img-fluid">
        <div class="overlay-text">
            <h1>Bienvenido a NIXELART</h1>
            <h5>En esta pagina podras encontrar variedad de tiendas y productos que ofrecen artesanias.</h5>
        </div>
    </div>

    <div class="container py-5">

        <a class="btn fw-bold btn-outline-primary" href="{{ route('tienda.create') }}">
            Conviertete en vendedor y crea tu propia tienda
        </a>
        <a class="btn fw-bold btn-outline-primary" href="{{ route('home') }}">
            Ir a mi perfil
        </a>
        <a class="btn fw-bold btn-outline-primary" href="{{ route('tienda.all') }}">
            Ver todas las tiendas
        </a>

        <h1 class="fs-3 fw-bold text-muted text-center py-4">Navega entre todas las tiendas de artesanias.</h1>
        <div class="row">
            @foreach ($tiendas as $tienda)
                <div class="col-lg-4">
                    <div class="card shadow border-0 bg-light">

                        <a href="{{ route('tienda.show', ['tiendaId' => $tienda->id]) }}">
                            <img style="width: 100%; max-height:200px;" src="{{ Storage::url($tienda->image) }}" class="card-img-top"
                                alt="...">
                        </a>
                        <div class="card-body">
                            <h5 class="card-title fw-semibold">
                                <i class="fa-solid fa-store text-primary"></i>
                                {{ $tienda->name }}
                            </h5>
                            <p class="card-title">
                                <i class="fa-solid fa-user-tag text-success"></i>
                                {{ $tienda->user->name }}
                            </p>
                            <p class="card-text">
                                <i class="fa-solid fa-quote-right"></i>
                                {{ $tienda->description }}
                            </p>
                        </div>
                        <ul class="list-group list-group-flush pb-4">
                            <li class="list-group-item">
                                <i class="fa-solid fa-location-dot text-danger"></i>
                                {{ $tienda->address }}
                            </li>
                        </ul>
                    </div>
                </div>
            @endforeach
        </div>
        <h1 class="fs-3 fw-bold text-muted text-center py-4">Explora todos los productos...</h1>
        <div class="row">
            @foreach ($products as $product)
                <div class="col-lg-4 col-md-6 col-sm-12 mb-2 position-relative">
                    <div class="card shadow-sm border-0">
                        <span style="top: 10px; left: 10px;" class="badge bg-danger position-absolute p-2">
                            USD:{{ number_format($product->price, 2) }}
                        </span>
                        <a href="{{ route('products.pay', ['product' => $product->id]) }}">
                            <span style="top: 10px; right: 10px;" class="badge bg-primary position-absolute p-2">
                                Comprar
                            </span>
                        </a>
                        <a href="{{ route('product.show', ['productId' => $product->id]) }}">
                            <img style="width: 100%; height: 200px;" src="{{ Storage::url($product->image) }}"
                                class="card-img-top object-fit-cover rounded" alt="...">
                        </a>
                        <div class="card-body">
                            <h5 class="card-title fw-bold">{{ $product->name }}</h5>

                            <div class="d-flex justify-content-between">
                                <p class="text-primary fw-bold">
                                    <i class="fa-solid fa-store"></i>
                                    {{ $product->tienda->name }}
                                </p>
                                <p class="text-primary fw-bold">
                                    <i class="fa-solid fa-user-tag"></i>
                                    {{ '@' . $product->tienda->user->name }}
                                </p>
                            </div>

                            <p class="card-text">
                                <i class="fa-solid fa-quote-right"></i>
                                {{ Str::limit($product->description, 150, '...') }}
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach

            {{ $products->links() }}
        </div>
    </div>
@endsection

