@extends('layout.main')

@section('content')
    <div class="container my-4 ">
        <h1 class="text-center p-4 ">{{ $comic->title }}</h1>
        <div class="row row-cols-1 d-flex justify-content-center ">
            <div class="card mt-4" style="width: 25rem;">
                <div class="col">
                    <img src="{{ $comic->thumb }}" class="card-img-top" alt="{{ $comic->title }}">
                    <p>{{ $comic->description }}</p>
                </div>
            </div>
        </div>
        <a href="{{ route('comics.index') }}" class="btn btn-primary ">Torna all'elenco</a>
    </div>
@endsection
