<header>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('home') }}">Comics</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('contacts') }}">Contatti</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('comics.index') }}">Prodotti</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('comics.create') }}">Nuovo Comic</a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>
    {{-- <h1>Header</h1> --}}

    {{-- <a href="{{ route('home') }}">Home</a>
    <a href="{{ route('nuova-pagina') }}">Nuova Pagina</a> --}}
</header>
