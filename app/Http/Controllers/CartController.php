<?php

namespace App\Http\Controllers;

use App\Models\Livro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    // Exibir todos os produtos no carrinho
    public function index()
    {
        $cart = Session::get('cart', []);
        return view('cart.index', compact('cart'));
    }

    // Adicionar item ao carrinho com JSON response para AJAX
    public function add(Request $request, $livro_id)
    {
        // Buscar o livro no banco de dados
        $livro = Livro::find($livro_id);
        
        if (!$livro) {
            return response()->json(['success' => false, 'message' => 'Livro não encontrado.'], 404);
        }

        $cart = Session::get('cart', []);
        $quantity = $request->input('quantity', 1);

        // Se o livro já estiver no carrinho, aumenta a quantidade
        if (isset($cart[$livro_id])) {
            $cart[$livro_id]['quantity'] += $quantity;
        } else {
            // Caso contrário, adiciona o livro ao carrinho com detalhes
            $cart[$livro_id] = [
                'quantity' => $quantity,
                'price' => $livro->preco,  // Usando o preço do banco de dados
                'name' => $livro->titulo,  // Usando o título do banco de dados
            ];
        }

        // Salvar o carrinho na sessão
        Session::put('cart', $cart);

        return response()->json(['success' => true, 'message' => 'Produto adicionado ao carrinho!']);
    }

    // Remover item do carrinho
    public function remove($productId)
    {
        $cart = Session::get('cart', []);

        if (isset($cart[$productId])) {
            unset($cart[$productId]);
            Session::put('cart', $cart);
        }

        return redirect()->back()->with('success', 'Produto removido do carrinho!');
    }

    // Limpar o carrinho
    public function clear()
    {
        Session::forget('cart');
        return redirect()->route('cart.index')->with('success', 'Carrinho limpo com sucesso!');
    }
}
