<!-- resources/views/categorias/create.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Adicionar Categoria</h1>
    <form action="{{ route('categorias.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" class="form-control" name="nome" required>
        </div>
        <div class="mb-3">
            <label for="imagem" class="form-label">Imagem</label>
            <input type="file" class="form-control" name="imagem" required>
        </div>
        <button type="submit" class="btn btn-success">Salvar</button>
        <a href="{{ route('categorias.index') }}" class="btn btn-secondary">Voltar</a>
    </form>
</div>
@endsection
