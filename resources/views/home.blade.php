@extends('layouts.app')

@section('content')
    <div class="container py-4">
        <div class="row">
            <div class="col-lg-4">
                <div class="card shadow border-0">
                    <div class="text-center p-2">
                        <img style="width: 100px; border-radius: 50%;"
                            src="https://media.istockphoto.com/id/587805078/vector/profile-picture-vector-illustration.jpg?s=612x612&w=0&k=20&c=sUCdx-Likqe7eBEcbn1FT8ybOQQHXDgBKLsJc99MtCA=" class="card-img-top"
                            alt="...">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">{{ Auth::user()->name }}</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                            card's content.</p>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">An item</li>
                        <li class="list-group-item">A second item</li>
                        <li class="list-group-item">A third item</li>
                    </ul>
                    <div class="card-body">
                        <a href="#" class="card-link">Card link</a>
                        <a href="#" class="card-link">Another link</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-8">
                <a href="{{ route('tienda.create') }}" class="btn btn-primary mb-2">Crear mi tienda</a>
                <h3 class="fw-semibold text-muted text-center">Mis tiendas</h3>

                @foreach ($tiendas as $tienda)
                    <div class="card shadow border-0 ">
                        <a href="{{ route('tienda.home', ['tienda' => Str::slug($tienda->name)]) }}">
                            <div class="card-body d-inline-flex w-100">
                                <ul class="list-group list-group-flush w-100">
                                    <li class="list-group-item">
                                        <span>
                                            Propietario: {{ $tienda->user->name }}
                                        </span>
                                    </li>
                                    <li class="list-group-item">
                                        <span>
                                            Nombre de la tienda: {{ $tienda->name }}
                                        </span>
                                    </li>
                                    <li class="list-group-item">
                                        <span>
                                            Descripción: {{ $tienda->description }}
                                        </span>
                                    </li>
                                    <li class="list-group-item">
                                        <span>
                                            Dirección: {{ $tienda->address }}
                                        </span>
                                    </li>
                                </ul>
                            </div>
                        </a>
                    </div>
                @endforeach

                <div class="card my-4">
                    <div class="card-body">
                        @livewire('mis-compras')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
