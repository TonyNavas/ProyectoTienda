@extends('layouts.app')

@section('content')
    <div style="padding-top: 5rem; padding-bottom: 5rem;" class="container">
        <div class="row">
            <div class="col-lg-7">
                <article>
                    <div class="card shadow border-0">
                        <div class="card-body">
                            <div class="d-flex">
                                <img style="width: 150px; height: 100px;" class="img-fluid rounde"
                                    src="{{ Storage::url($product->image) }}" alt="">

                                <div class="ms-4 d-flex w-100  justify-content-between">
                                    <h1 class="fw-bold fs-5 text-uppercase">{{ $product->name }}</h1>
                                    <p class="fw-semibold">{{ $product->price }} USD</p>
                                </div>
                            </div>
                            <hr class=" my-4">
                            <small>*Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloremque asperiores reiciendis sit, ullam corrupti voluptatum obcaecati nisi! <a class="text-primary text-decoration-none fw-bold" href="">Terminos y condiciones</a>
                            </small>
                        </div>
                    </div>
                </article>
            </div>
            <div class="col-lg-5">
                @livewire('product-pay', ['product' => $product])
            </div>
        </div>
    </div>
@endsection
