<!-- resources/views/livros/edit.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Livro</h1>
    <form action="{{ route('livros.update', $livro->livro_id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="titulo" class="form-label">Título</label>
            <input type="text" class="form-control" name="titulo" value="{{ $livro->titulo }}" required>
        </div>
        <div class="mb-3">
            <label for="autor" class="form-label">Autor</label>
            <input type="text" class="form-control" name="autor" value="{{ $livro->autor }}" required>
        </div>
        <div class="mb-3">
            <label for="cat_id" class="form-label">Categoria</label>
            <select class="form-control" name="cat_id" required>
                @foreach($categorias as $categoria)
                <option value="{{ $categoria->id }}" {{ $livro->cat_id == $categoria->id ? 'selected' : '' }}>{{ $categoria->nome }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="imagem" class="form-label">Imagem</label>
            <input type="file" class="form-control" name="imagem">
            <img src="{{ asset('images/' . $livro->imagem) }}" alt="{{ $livro->titulo }}" width="100" class="mt-2">
        </div>
        <button type="submit" class="btn btn-success">Salvar</button>
        <a href="{{ route('livros.index') }}" class="btn btn-secondary">Voltar</a>
    </form>
</div>
@endsection
