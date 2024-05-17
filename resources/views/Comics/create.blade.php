@extends('layout.main')

@section('content')
    <h1 class="text-center p-4 ">Nuovo Comic</h1>

    @php
        $status = 'nuovo comic';
        $title = '';
        $description = '';
        $thumb = '';
        $price = '';
        $series = '';
        $sale_date = '';
        $type = '';
        $artists = '';
        $writers = '';
        if ($status === 'test') {
            $title = 'Batman: Three Jokers #1';
            $description =
                'Thirty years after Batman: The Killing Joke changed comics forever, Three Jokers reexamines the myth of who, or what, The Joker is and what is at the heart of his eternal battle with Batman. New York Times bestselling writer Geoff Johns and Jason Fabok, the writer/artist team that waged the “Darkseid War” in the pages of Justice League, reunite to tell the ultimate story of Batman and The Joker! After years of anticipation starting in DC Universe: Rebirth #1, the epic miniseries you’ve been waiting for is here: find out why there are three Jokers, and what that means for the Dark Knight and the Clown Prince of Crime. It’s a mystery unlike any Batman has ever faced!';
            $thumb =
                'https://imgs.search.brave.com/a6fAPUra4t94xMJFlYv6X7Lwm4z_qPmslx7Hiqafbok/rs:fit:600:923:1/g:ce/aHR0cHM6Ly9jZG4u/ZmxpY2tlcmluZ215/dGguY29tL3dwLWNv/bnRlbnQvdXBsb2Fk/cy8yMDIwLzA4L0Jh/dG1hbi1UaHJlZS1K/b2tlcnMtMS02MDB4/OTIzLTEuanBn';
            $price = '$6.99';
            $series = 'Batman: Three Jokers';
            $sale_date = '2020-08-25';
            $type = 'comic book';
            $artists = 'Jason Fabok';
            $writers = 'Geoff Johns';
        }
    @endphp

    <form action="{{ route('comics.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input name="title" type="text" class="form-control" id="title" value="{{ $title }}">
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" class="form-control" id="description">{{ $description }}"</textarea>
        </div>
        <div class="mb-3">
            <label for="thumb" class="form-label">Thumb</label>
            <input name="thumb" type="text" class="form-control" id="thumb" value="{{ $thumb }}">
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input name="price" type="text" class="form-control" id="price" value="{{ $price }}">
        </div>
        <div class="mb-3">
            <label for="series" class="form-label">Series</label>
            <input name="series" type="text" class="form-control" id="series" value="{{ $series }}">
        </div>
        <div class="mb-3">
            <label for="sale_date" class="form-label">Sale_date</label>
            <input name="sale_date" type="text" class="form-control" id="sale_date" value="{{ $sale_date }}">
        </div>
        <div class="mb-3">
            <label for="type" class="form-label">Type</label>
            <input name="type" type="text" class="form-control" id="type" value="{{ $type }}">
        </div>
        <div class="mb-3">
            <label for="artists" class="form-label">Artists</label>
            <input name="artists" type="text" class="form-control" id="artists" value="{{ $artists }}">
        </div>
        <div class="mb-3">
            <label for="writers" class="form-label">Writers</label>
            <input name="writers" type="text" class="form-control" id="writers" value="{{ $writers }}">
        </div>

        <button class="btn btn-success" type="submit">Invia
            nuovo Comic</button>
        <button class="btn btn-warning" type="reset">Reset</button>

    </form>
@endsection
