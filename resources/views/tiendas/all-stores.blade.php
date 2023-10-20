@extends('layouts.app')

@section('content')

    <div class="container py-5">

        <div class="row">

        @foreach ($tiendas as $tienda)
            <div class="col-lg-4">
                <div class="card shadow border-0 bg-light">

                    <a href="{{ route('tienda.show', ['tiendaId' => $tienda->id]) }}">
                        <img style="width: 100%; max-height:200px;" src="{{ Storage::url($tienda->image) }}" class="card-img-top" alt="...">
                    </a>
                        <div class="card-body">
                          <h5 class="card-title">{{ $tienda->name }}</h5>
                          <p class="card-text">{{ $tienda->description }}</p>
                        </div>
                        <ul class="list-group list-group-flush">
                          <li class="list-group-item">{{ $tienda->address }}</li>
                        </ul>
                        <div class="card-body">
                          <a href="#" class="card-link">Card link</a>
                          <a href="#" class="card-link">Another link</a>
                        </div>

                  </div>
            </div>
        @endforeach
    </div>
    </div>
@endsection
