<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // Exibe o formulário de login
    public function showLoginForm()
    {
        return view('login'); // Certifique-se de que a view 'login.blade.php' exista
    }

    // Processa a autenticação
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        // Tente autenticar o usuário
        if (Auth::attempt($credentials)) {
            // Autenticação bem-sucedida
            return redirect()->intended('/home'); // Redirecionar para a página desejada após o login
        }

        // Se falhar, redirecionar de volta com uma mensagem de erro
        return back()->withErrors([
            'email' => 'As credenciais fornecidas estão incorretas.',
        ]);
    }

    // Log out do usuário
    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/login'); // Redirecionar para a página de login
    }

    // Redirecionar após a autenticação (opcional)
    protected function authenticated(Request $request, $user)
    {
        return redirect()->route('home');
    }
}
