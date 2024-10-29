<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro - The Book Club</title>
    <!-- Adiciona um ícone na aba do navegador -->
    <link rel="icon" href="images/logo.png" type="image/png">

    <style>
        /* Seu CSS permanece aqui */
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap');

        body {
            font-family: 'Montserrat', sans-serif;
            margin: 0;
            padding: 0;
            height: 100vh;
            display: flex;
            justify-content: center; 
            align-items: center; 
            background-color: #f7e8d5; 
            text-align: center;
        }

        .main-container {
            display: flex;
            justify-content: space-around; 
            align-items: center;
            gap: 60px; 
            width: 75%; 
            max-width: 1100px; 
            padding: 0 40px; 
            margin-bottom: 80px; 
        }

        .login-container {
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            width: 300px; 
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
        }

        .login-container img {
            max-width: 50%; 
            height: auto;
            margin-bottom: 15px;
        }

        .login-container p {
            text-align: center;
            font-weight: bold;
            font-size: 18px;
            margin-bottom: 15px;
        }

        input[type="text"],
        input[type="password"],
        input[type="email"],
        input[type="tel"] {
            width: 100%;
            max-width: 280px;
            padding: 10px;
            margin: 8px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-family: 'Montserrat', sans-serif;
            font-size: 14px;
        }

        .btn-login {
            width: 100%;
            max-width: 280px;
            padding: 10px;
            background-color: #d27d33;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            margin-top: 10px;
            font-family: 'Montserrat', sans-serif;
            font-weight: bold;
        }

        .btn-login:hover {
            background-color: #b56624;
        }

        .error-message {
            color: orange;
            margin-top: 10px;
            font-size: 12px;
        }

        .signup-link {
            margin-top: 15px;
            font-size: 14px;
            color: #333;
        }

        .signup-link a {
            color: #d27d33;
            text-decoration: none;
        }

        .signup-link a:hover {
            text-decoration: underline;
        }

        .side-image {
            max-width: 450px; 
            height: auto;
            display: block; 
            object-fit: cover; 
        }

        footer {
            text-align: center;
            width: 100%;
            padding: 10px;
            background-color: #d27d33;
            position: fixed;
            bottom: 0;
            left: 0;
        }
    </style>
</head>
<body>
    <div class="main-container">
        <img src="images/criar_conta.png" alt="Imagem de um livro aberto" class="side-image">

        <div class="login-container">
            <img src="/images/logo.jpg" alt="Logo do clube de livros">
            <form method="POST" action="{{ route('criar_conta') }}">
                @csrf
                <p>Bem-vindo, estamos felizes de ter você com a gente!</p>
                <!-- Campo de nome -->
                <input type="text" name="name" placeholder="Nome completo" required>
                <!-- Campo de telefone -->
                <input type="tel" name="phone" placeholder="Telefone" required>
                <!-- Campo de e-mail -->
                <input type="email" name="email" placeholder="E-mail" required>
                <!-- Campo de senha -->
                <input type="password" name="password" placeholder="Senha" required>
                <!-- Campo de confirmação de senha -->
                <input type="password" name="password_confirmation" placeholder="Confirmar Senha" required>
                <!-- Botão de cadastro -->
                <button type="submit" class="btn-login">Cadastrar</button>
                <!-- Mensagem de erro -->
                @if ($errors->any())
                    <div class="error-message">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </form>
            <div class="signup-link">
                Já tem conta? <a href="{{ route('login') }}">Faça login</a>
            </div>
        </div>
    </div>
    <footer>
        <p>&copy; 2023 The Book Club</p>
    </footer>
</body>
</html>
