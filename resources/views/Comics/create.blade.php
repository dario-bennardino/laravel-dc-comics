@extends('layout.main')

@section('content')
    <h1 class="text-center p-4 ">Nuovo Comic</h1>
    <form action="{{ route('comics.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input name="title" type="text" class="form-control" id="title">
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" class="form-control" id="description"></textarea>
        </div>
        <div class="mb-3">
            <label for="thumb" class="form-label">Thumb</label>
            <input name="thumb" type="text" class="form-control" id="thumb">
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input name="price" type="text" class="form-control" id="price">
        </div>
        <div class="mb-3">
            <label for="series" class="form-label">Series</label>
            <input name="series" type="text" class="form-control" id="series">
        </div>
        <div class="mb-3">
            <label for="sale_date" class="form-label">Sale_date</label>
            <input name="sale_date" type="text" class="form-control" id="sale_date">
        </div>
        <div class="mb-3">
            <label for="type" class="form-label">Type</label>
            <input name="type" type="text" class="form-control" id="type">
        </div>
        <div class="mb-3">
            <label for="artists" class="form-label">Artists</label>
            <input name="artists" type="text" class="form-control" id="artists">
        </div>
        <div class="mb-3">
            <label for="writers" class="form-label">Writers</label>
            <input name="writers" type="text" class="form-control" id="writers">
        </div>

        <button class="btn btn-success" type="submit">Invia nuovo Comic</button>
        <button class="btn btn-warning" type="reset">Reset</button>

    </form>
@endsection
