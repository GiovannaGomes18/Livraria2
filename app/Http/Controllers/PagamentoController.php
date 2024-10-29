<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use MercadoPago\SDK;
use MercadoPago\Preference;
use MercadoPago\Item;
use Illuminate\Support\Facades\Session;

class PagamentoController extends Controller
{
    public function checkout()
    {
        // Verifica se a classe SDK existe
        if (!class_exists('MercadoPago\SDK')) {
            return response()->json(['error' => 'Classe SDK do Mercado Pago não encontrada.'], 500);
        }

        // Configura o SDK do Mercado Pago
        SDK::setAccessToken(config('services.mercado_pago.access_token'));

        $cart = Session::get('cart', []);

        if (empty($cart)) {
            return redirect()->back()->with('error', 'Carrinho está vazio');
        }

        // Crie a preferência de pagamento
        $preference = new Preference();

        // Adicione itens do carrinho na preferência de pagamento
        $items = [];
        foreach ($cart as $livro_id => $detalhes) {
            $item = new Item();
            $item->title = $detalhes['name'];
            $item->quantity = $detalhes['quantity'];
            $item->unit_price = $detalhes['price'];
            $items[] = $item;
        }

        $preference->items = $items;
        $preference->back_urls = [
            'success' => route('checkout.success'),
            'failure' => route('checkout.failure'),
            'pending' => route('checkout.pending')
        ];
        $preference->auto_return = 'approved';
        $preference->save();

        return redirect($preference->init_point);
    }

    public function sucesso()
    {
        return view('checkout.success');
    }

    public function erro()
    {
        return view('checkout.failure');
    }
}
