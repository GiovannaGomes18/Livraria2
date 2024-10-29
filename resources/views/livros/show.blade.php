<!-- resources/views/livros/show.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container my-5">
    <div class="row">
        <div class="col-md-6">
            @if($livro->imagem)
                <img src="{{ asset('images/' . $livro->imagem) }}" class="img-fluid rounded shadow-sm" alt="{{ $livro->titulo }}">
            @else
                <img src="{{ asset('images/placeholder.png') }}" class="img-fluid rounded shadow-sm" alt="Imagem não disponível">
            @endif
        </div>
        <div class="col-md-6">
            <h1 class="fw-bold">{{ $livro->titulo }}</h1>
            <p class="text-muted">Por: {{ $livro->autor }}</p>
            <p>Categoria: {{ $livro->categoria->nome }}</p>
            <p class="text-primary fw-bold fs-4">Preço: R$ {{ number_format($livro->preco, 2, ',', '.') }}</p>

            <div class="mt-4">
                <a href="#" class="btn btn-primary">Adicionar ao Carrinho</a>
                <a href="{{ route('livros.index') }}" class="btn btn-secondary">Voltar para a Lista de Livros</a>
            </div>
        </div>
    </div>
</div>
@endsection
