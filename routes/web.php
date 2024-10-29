<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\Criar_ContaController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\LivroController;
use App\Http\Controllers\PagamentoController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\FileController;

Route::get('/', function () {
    return view('index'); // Retorna a view index diretamente
})->name('index');

Route::get('/cart', [CartController::class, 'index'])->name('cart.index');

// Rota para upload de arquivos
Route::post('/upload', [FileController::class, 'upload'])->name('file.upload');

// Rotas do carrinho
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add/{livro_id}', [CartController::class, 'add'])->name('cart.add');
Route::delete('/cart/remove/{productId}', [CartController::class, 'remove'])->name('cart.remove');
Route::post('/cart/clear', [CartController::class, 'clear'])->name('cart.clear');

// Rotas de checkout
Route::get('/checkout', [PagamentoController::class, 'checkout'])->name('checkout');
Route::get('/pagamento/sucesso', [PagamentoController::class, 'sucesso']);
Route::get('/pagamento/falha', [PagamentoController::class, 'falha']);
Route::get('/pagamento/pendente', [PagamentoController::class, 'pendente']);

// Rotas da página inicial

Route::get('/home', [LivroController::class, 'home'])->name('home')->middleware('auth');

// Autenticação
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Rotas para criar conta
Route::get('/criar_conta', [Criar_ContaController::class, 'showRegistrationForm'])->name('criar_conta');
Route::post('/criar_conta', [Criar_ContaController::class, 'register'])->name('criar_conta.submit');

// Recursos para categorias e livros
Route::middleware('auth')->group(function () {
    // Rota para mostrar uma categoria específica
    Route::get('/categorias/{categoria}', [CategoriaController::class, 'show'])->name('categorias.show');

    Route::get('/categorias', function () {
        if (auth()->user()->is_admin) {
            return app(CategoriaController::class)->index();
        }
        return redirect('/')->with('error', 'Acesso negado');
    })->name('categorias.index');

    Route::get('/categorias/create', function () {
        if (auth()->user()->is_admin) {
            return app(CategoriaController::class)->create();
        }
        return redirect('/')->with('error', 'Acesso negado');
    })->name('categorias.create');

    Route::post('/categorias', function () {
        if (auth()->user()->is_admin) {
            return app(CategoriaController::class)->store(request()->all());
        }
        return redirect('/')->with('error', 'Acesso negado');
    })->name('categorias.store');

    // Outras rotas de categorias (edit, update, destroy)
    Route::get('/categorias/{categoria}/edit', function ($categoria) {
        if (auth()->user()->is_admin) {
            return app(CategoriaController::class)->edit($categoria);
        }
        return redirect('/')->with('error', 'Acesso negado');
    })->name('categorias.edit');

    Route::put('/categorias/{categoria}', function ($categoria) {
        if (auth()->user()->is_admin) {
            return app(CategoriaController::class)->update($categoria, request()->all());
        }
        return redirect('/')->with('error', 'Acesso negado');
    })->name('categorias.update');

    Route::delete('/categorias/{categoria}', function ($categoria) {
        if (auth()->user()->is_admin) {
            return app(CategoriaController::class)->destroy($categoria);
        }
        return redirect('/')->with('error', 'Acesso negado');
    })->name('categorias.destroy');

    Route::resource('livros', LivroController::class);
});

// Rota para mostrar um livro específico
Route::get('/livros/{livro}', [LivroController::class, 'show'])->name('livros.show');
