@extends('layout.main')

@section('content')
    <h1>Elenco prodotti</h1>

    <div class="container">
        <div class="row row-cols-3 ">
            @forelse ($products as $product)
                <div class="col mt-4">
                    <div class="card" style="width: 20rem;">
                        <img src="{{ $product->thumb }}" class="card-img-top" alt="{{ $product->title }}">
                        <div class="card-body">
                            <h5>{{ $product->title }}</h5>
                            <h6>{{ $product->series }}</h6>
                            <h6>{{ $product->price }}</h6>
                            <p class="card-text">{{ $product->writers }}</p>
                            <a href="{{ route('comics.show', $product) }}" class="btn btn-success btn-sm "><i
                                    class="fa-solid fa-eye"></i></a>
                            <a href="{{ route('comics.edit', $product) }}" class="btn btn-warning btn-sm"><i
                                    class="fa-solid fa-pencil"></i></a>
                            <button class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i></button>
                        </div>
                    </div>
                </div>
            @empty
                <h2>Nessun prodotto trovato</h2>
            @endforelse


        </div>
    </div>
@endsection
