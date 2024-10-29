<!-- resources/views/livros/index.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Livros</h1>
    <a href="{{ route('livros.create') }}" class="btn btn-primary">Adicionar Novo Livro</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Título</th>
                <th>Autor</th>
                <th>Categoria</th>
                <th>Imagem</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($livros as $livro)
            <tr>
                <td>{{ $livro->livro_id }}</td>
                <td>{{ $livro->titulo }}</td>
                <td>{{ $livro->autor }}</td>
                <td>{{ $livro->categoria ? $livro->categoria->nome : 'Sem Categoria' }}</td>
                <td><img src="{{ asset('images/' . $livro->imagem) }}" alt="{{ $livro->titulo }}" width="100"></td>
                <td>
                    <a href="{{ route('livros.edit', $livro->livro_id) }}" class="btn btn-warning">Editar</a>
                    <form action="{{ route('livros.destroy', $livro->livro_id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Deletar</button>
                    </form>
                </td>
            </tr>
            @endforeach
            
        </tbody>
    </table>
</div>
@endsection
