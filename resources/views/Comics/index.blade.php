@extends('layout.main')

@section('content')
    <h1>Elenco prodotti</h1>

    {{-- se esiste una variabile di sessione denominata delated la stampo nell'alert --}}
    @if (session('deleted'))
        <div class="alert alert-success" role="alert">{{ session('deleted') }}</div>
    @endif


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
                            <div class="d-flex">
                                <a href="{{ route('comics.show', $product) }}" class="btn btn-success btn-sm me-2"><i
                                        class="fa-solid fa-eye"></i></a>
                                <a href="{{ route('comics.edit', $product) }}" class="btn btn-warning btn-sm me-2"><i
                                        class="fa-solid fa-pencil"></i></a>
                                {{-- Per il destroy devo usare un form perchè occorre il metodo http DELETE, con un link ottengo solo GET --}}
                                <form action="{{ route('comics.destroy', $product) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm me-2"><i
                                            class="fa-solid fa-trash"></i></button>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            @empty
                <h2>Nessun prodotto trovato</h2>
            @endforelse


        </div>
    </div>
@endsection
