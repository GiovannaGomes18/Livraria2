@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Categorias</h1>

    <!-- Exibição de mensagem de sucesso fora da tabela -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
            @if(session('file'))
                <br>
                <strong>Arquivo salvo:</strong> {{ session('file') }}
            @endif
        </div>
    @endif

    <a href="{{ route('categorias.create') }}" class="btn btn-primary">Adicionar Nova Categoria</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Imagem</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categorias as $categoria)
            <tr>
                <td>{{ $categoria->cat_id }}</td>
                <td>{{ $categoria->nome }}</td>
                <td><img src="{{ asset('images/' . $categoria->imagem) }}" alt="{{ $categoria->nome }}" width="100"></td>
                <td>
                    <a href="{{ route('categorias.edit', $categoria->cat_id) }}" class="btn btn-warning">Editar</a>
                    <form action="{{ route('categorias.destroy', $categoria->cat_id) }}" method="POST" style="display:inline;">
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
