@extends('layouts.app')

@section('content')
    <section style="background: rgb(27, 31, 82);" class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <figure>
                        <img style="max-height: 300px; width:100%;" class="img-fluid rounded"
                            src="{{ Storage::url($producto->image) }}" alt="{{ $producto->name }}">
                    </figure>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="text-white">
                        <h2>{{ $producto->name }}</h2>
                        <h3 class="mb-4">{{ $producto->description }}</h3>
                        <p>
                            <span>
                                <i class="fa-solid fa-grip-vertical"></i>
                                Categoria: {{ $producto->category->name }}
                            </span>
                        </p>
                        <p>
                            <span>
                                <i class="fa-solid fa-store"></i>
                                Tienda:
                                {{ $producto->tienda->name }}
                            </span>
                        </p>
                        <p>
                            <span>
                                <i class="fa-solid fa-tag"></i>
                                Precio: C$ {{ number_format($producto->price, 2) }}
                            </span>
                        </p>
                        <p></p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="container py-5">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-12 mb-2">
                <div class="card shadow border-0">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <img
                            style="width: 60px; height: 60px; border-radius: 50%;"
                            src="{{ Storage::url($producto->tienda->image) }}" alt="">

                            <div class="ms-4">
                                <h1 class="fw-bold fs-5 ">Tienda. {{ $producto->tienda->name }}</h1>
                                <a class="nav-link text-primary" href="">{{ '@' . Str::slug($producto->tienda->user->name, '') }}</a>
                            </div>
                        </div>

                        <div class="d-grid">
                            <a class="btn btn-danger mt-4 btn-block"
                            href="{{ route('products.pay', ['product' => $producto->id]) }}">Adquirir este producto</a>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12">
                <aside>
                    <div class="text-center ">
                        <h4 class="fw-bold text-muted mb-4 mt-4">Productos similares</h4>
                    </div>
                    @foreach ($similares as $similar)

                                <article class="d-flex mb-2">
                                    <img
                                    style="width: 150px; height: 150px; "
                                    class="img-fluid rounded" src="{{ Storage::url($similar->image) }}" alt="">

                                    <div class="ms-3">
                                        <p><a class="nav-link fw-bold text-muted fs-6"
                                            href="{{ route('product.show', ['productId' => $similar]) }}">{{ Str::limit($similar->name, 30, '...') }}</a>
                                        </p>

                                        <div class="d-flex align-items-center">
                                            <img style="width: 40px; height: 40px; border-radius: 50%;"
                                        class="img-fluid img-thumbnail shadow"
                                        src="{{ Storage::url($similar->tienda->image) }}" alt="">

                                        <small class="text-muted ms-2">{{ $similar->tienda->user->name }}</small>
                                        </div>

                                        <p class="mt-2">
                                            <span class="badge bg-primary">
                                                <i class="fa-solid fa-tag"></i>
                                            {{ $similar->price }}
                                            </span>
                                        </p>
                                    </div>
                                </article>

                    @endforeach
                </aside>
            </div>
        </div>
    </div>
@endsection
