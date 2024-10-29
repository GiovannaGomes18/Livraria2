@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Adicionar Livro</h1>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('livros.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="titulo" class="form-label">Título</label>
            <input type="text" class="form-control" name="titulo" id="titulo" required> <!-- Adicione o id aqui -->
        </div>
        <div class="mb-3">
            <label for="autor" class="form-label">Autor</label>
            <input type="text" class="form-control" name="autor" id="autor" required> <!-- Adicione o id aqui -->
        </div>
        <div class="mb-3">
            <label for="cat_id" class="form-label">Categoria</label>
            <select class="form-control" name="cat_id" id="cat_id" required> <!-- Adicione o id aqui -->
                @foreach($categorias as $categoria)
                <option value="{{ $categoria->cat_id }}">{{ $categoria->nome }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="imagem" class="form-label">Imagem</label>
            <input type="file" class="form-control" name="imagem" id="imagem"> <!-- Adicione o id aqui -->
        </div>
        <button type="submit" class="btn btn-success">Salvar</button>
        <a href="{{ route('livros.index') }}" class="btn btn-secondary">Voltar</a>
    </form>
</div>
@endsection
