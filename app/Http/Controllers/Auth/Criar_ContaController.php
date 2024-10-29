<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User; 
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class Criar_ContaController extends Controller
{
    public function showRegistrationForm()
    {
        return view('criar_conta'); // Retorna a view do formulário de criação de conta
    }

    public function register(Request $request)
    {
        // Validação dos dados recebidos
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed', // Confirmação de senha
        ]);

        // Se a validação falhar, redireciona com erros
        if ($validator->fails()) {
            return redirect()->route('criar_conta')
                ->withErrors($validator)
                ->withInput();
        }

        // Cria o novo usuário como um usuário normal (sem is_admin)
        User::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'password' => Hash::make($request->password), // Armazena a senha de forma segura
            // 'is_admin' => false // Não é necessário, pois a coluna não é adicionada
        ]);

        // Redireciona para a página de login com uma mensagem de sucesso
        return redirect()->route('login')->with('success', 'Conta criada com sucesso! Faça login.');
    }
}
