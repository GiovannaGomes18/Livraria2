<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - The Book Club</title>
    <link rel="icon" href="{{ asset('/images\logo.png') }}" type="image/png">
    <style>
        /* Importa a fonte Montserrat do Google Fonts */
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap');

        /* Estilo geral para o corpo da página */
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

        /* Contêiner principal para o formulário e a imagem */
        .main-container {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 150px;
            width: 80%;
            max-width: 1200px;
            padding: 0 20px;
            margin-bottom: 80px;
        }

        /* Estilo do container de login */
        .login-container {
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            width: 400px;
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
        }

        /* Estilo para a imagem do logo */
        .login-container img {
            max-width: 50%;
            height: auto;
            margin-bottom: 15px;
        }

        /* Estilo para o texto de boas-vindas */
        .login-container p {
            font-weight: bold;
            font-size: 20px;
            margin-bottom: 15px;
        }

        /* Estilo para os campos de entrada */
        input[type="text"],
        input[type="password"] {
            width: 100%;
            max-width: 300px;
            padding: 12px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-family: 'Montserrat', sans-serif;
            font-size: 14px;
        }

        /* Estilo para o botão de login */
        .btn-login {
            width: 100%;
            max-width: 300px;
            padding: 12px;
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

        /* Estilo para a mensagem de erro */
        .error-message {
            color: orange;
            margin-top: 10px;
            font-size: 12px;
        }

        /* Estilo para o link "Não tem conta? Faça uma" */
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

        /* Estilo da imagem ao lado do formulário */
        .side-image {
            max-width: 500px;
            height: auto;
            object-fit: cover;
        }

        /* Estilo para o rodapé */
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
    <!-- Contêiner principal contendo o formulário e a imagem -->
    <div class="main-container">
        <!-- Imagem ao lado do formulário -->
        <img src="{{ asset('images/login.png') }}" alt="mulher lendo" class="side-image">
        <!-- Container de login -->
        <div class="login-container">
            <img src="{{ asset('/images\logo.png') }}" alt="Logo do clube de livros">
            <form action="{{ route('login') }}" method="POST">
                @csrf
                <p>Bem-vindo de volta, sentimos sua falta!</p>
                <!-- Campo de e-mail -->
                <input type="text" name="email" placeholder="E-mail" required>
                <!-- Campo de senha -->
                <input type="password" name="password" placeholder="Senha" required>
                <!-- Botão de login -->
                <button type="submit" class="btn-login">Fazer login</button>
                <!-- Mensagem de erro -->
                <div class="error-message" id="error-message"></div>
            </form>
            <!-- Texto de "não tem conta?" -->
            <div class="signup-link">
                Não tem conta? <a href="{{ url('/criar_conta') }}">Faça uma</a>
            </div>
        </div>
        </div>
    </div>
    <footer>
        <p>&copy; 2023 The Book Club</p>
    </footer>
</body>
</html>
