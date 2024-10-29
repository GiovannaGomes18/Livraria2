{{-- categorias/show.blade.php --}}

<!DOCTYPE html>
<html>
<head>
    <title>{{ $categoria->nome }}</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <h1>{{ $categoria->nome }}</h1>
    <img src="{{ asset('images/' . $categoria->imagem) }}" alt="{{ $categoria->nome }}" />

    <h2>Livros na Categoria:</h2>
    <ul>
        @forelse($livros as $livro)
            <li>
                <a href="{{ route('livros.show', $livro->id) }}">{{ $livro->titulo }}</a>
            </li>
        @empty
            <li>Nenhum livro disponível nesta categoria.</li>
        @endforelse
    </ul>

    <a href="{{ route('categorias.index') }}">Voltar para as categorias</a>
</body>
</html>
