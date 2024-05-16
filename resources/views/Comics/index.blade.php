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
                            <a href="{{ route('comics.show', $product->id) }}" class="btn btn-success btn-sm "><i
                                    class="fa-solid fa-eye"></i></a>
                            <button class="btn btn-warning btn-sm"><i class="fa-solid fa-pencil"></i></button>
                            <button class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i></button>
                        </div>
                    </div>
                </div>
            @empty
                <h2>Nessun prodotto trovato</h2>
            @endforelse


        </div>
    </div>

    {{-- <div class="container">
        <div class="row">

            @forelse ($products as $product)
                <div class="col-3">
                    <div class="card" style="width: 18rem;">
                        <div class="col mb-3 ">
                            <div class="card">
                                <img src="{{ $product->thumb }}" class="card-img-top" alt="{{ $product->title }}">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $product->title }}</h5>
                                    <h6 class="card-title">{{ $product->series }}</h6>
                                    <p class="card-text">{{ $product->price }}</p>
                                    <p class="card-text">{{ $product->sale_date }}</p>
                                    <button class="btn btn-primary">Dettagli</button>
                                </div>
                            </div>
                        </div>
                </div>
            @empty
                <h2>Nessun prodotto trovato</h2>
            @endforelse
        </div>         --}}


    {{-- <table class="table">
        <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">title</th>
                <th scope="col">description</th>
                <th scope="col">thumb</th>
                <th scope="col">price</th>
                <th scope="col">series</th>
                <th scope="col">sale_date</th>
                <th scope="col">type</th>
                <th scope="col">artists</th>
                <th scope="col">writers</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->title }}</td>
                    <td>{{ $product->description }}</td>
                    <td>{{ $product->thumb }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->series }}</td>
                    <td>{{ $product->sale_date }}</td>
                    <td>{{ $product->type }}</td>
                    <td>{{ $product->artists }}</td>
                    <td>{{ $product->writers }}</td>
                    <td>
                        <button class="btn btn-success "></button>
                        <button class="btn btn-warning "></button>
                        <button class="btn btn-danger "></button>
                    </td>
                </tr>
            @empty
                <h2>Nessun prodotto trovato</h2>
            @endforelse


        </tbody>
    </table> --}}
@endsection
