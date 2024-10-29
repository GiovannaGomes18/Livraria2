@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Seu Carrinho</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    @if(empty($cart))
        <p>Seu carrinho está vazio.</p>
    @else
        <ul class="list-group mb-3">
            @php $total = 0; @endphp
            @foreach($cart as $productId => $item)
                @php $total += $item['price'] * $item['quantity']; @endphp
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <div>
                        <h6>{{ $item['name'] }}</h6>
                        <p>Preço: R$ {{ number_format($item['price'], 2, ',', '.') }} (Quantidade: {{ $item['quantity'] }})</p>
                    </div>
                    <form action="{{ route('cart.remove', $productId) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Remover</button>
                    </form>
                </li>
            @endforeach
        </ul>
        
        <div class="mb-3">
            <h5>Total: R$ {{ number_format($total, 2, ',', '.') }}</h5>
        </div>

        <form action="{{ route('cart.clear') }}" method="POST" class="mt-3">
            @csrf
            <button type="submit" class="btn btn-warning">Limpar Carrinho</button>
        </form>

        <a href="{{ route('checkout') }}" class="btn btn-primary mt-3">Finalizar Compra com Mercado Pago</a>
    @endif
</div>
@endsection
