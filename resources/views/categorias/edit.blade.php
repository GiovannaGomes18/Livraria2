<!-- resources/views/categorias/edit.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Categoria</h1>
    <form action="{{ route('categorias.update', $categoria->cat_id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" class="form-control" name="nome" value="{{ $categoria->nome }}" required>
        </div>
        <div class="mb-3">
            <label for="imagem" class="form-label">Imagem</label>
            <input type="file" class="form-control" name="imagem">
            <img src="{{ asset('iamges/' . $categoria->imagem) }}" alt="{{ $categoria->nome }}" width="100" class="mt-2">
        </div>
        <button type="submit" class="btn btn-success">Salvar</button>
        <a href="{{ route('categorias.index') }}" class="btn btn-secondary">Voltar</a>
    </form>
</div>
@endsection
