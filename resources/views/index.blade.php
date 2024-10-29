<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <!-- Definição do idioma como português do Brasil -->
    <meta charset="UTF-8">
    <!-- Definição de compatibilidade para dispositivos móveis, ajustando o layout para a tela do dispositivo -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Book Club</title>
    <link rel="icon" href="\images\logo.jpg" type="image/png">
    <style>
        /* Estilo geral para o corpo da página */
        body {
            font-family: Arial, sans-serif; /* Definindo a fonte principal */
            margin: 0; /* Remove margens padrão */
            padding: 0; /* Remove padding padrão */
            min-height: 100vh; /* Define altura mínima para a tela cheia */
            display: flex; /* Utiliza layout flexível */
            flex-direction: column; /* Coloca os elementos na página em uma coluna */
            justify-content: space-between; /* Espaçamento entre os itens principais (topo e rodapé) */
        }

        /* Container principal da página que contém o conteúdo central */
        .container {
            flex: 1; /* Permite que o container se expanda para preencher o espaço disponível */
            display: flex; /* Utiliza layout flexível */
            justify-content: center; /* Centraliza os itens horizontalmente */
            align-items: center; /* Centraliza os itens verticalmente */
            gap: 0px; /* Remove o espaçamento entre as colunas */
        }

        /* Estilos para a seção esquerda do layout (logo e botões) */
        .left-content, .right-content {
            flex: 100%; /* Permite que as colunas tenham um tamanho fixo baseado no conteúdo */
            display: flex; /* Define como flexível */
            flex-direction: column; /* Alinha os itens em uma coluna */
            align-items: center; /* Alinha todos os itens no centro horizontalmente */
        }

        /* Estilo para a imagem da logo na seção esquerda */
        .left-content img {
            max-width: %70; /* Mantém a largura da imagem original */
            height: auto; /* Mantém a proporção da imagem */
            margin-bottom: 0px; /* Reduz o espaçamento inferior abaixo da imagem */
        }

        /* Estilos para o grupo de botões (login e cadastro) */
        .button-group {
            display: flex; /* Define o layout flexível para que os botões fiquem lado a lado */
            justify-content: center; /* Centraliza os botões horizontalmente */
            gap: 10px; /* Espaço de 10px entre os botões */
            margin-bottom: 20px; /* Espaçamento inferior de 20px abaixo dos botões */
        }

        /* Estilos comuns para os botões de login e cadastro */
        .left-content .btn-login, .left-content .btn-cadastro {
            padding: 10px 20px; /* Espaçamento interno do botão (vertical e horizontal) */
            font-size: 16px; /* Tamanho da fonte */
            cursor: pointer; /* Altera o cursor ao passar sobre o botão */
        }

        /* Estilos específicos para o botão de login */
        .btn-login {
            background-color: #d27d33; /* Cor de fundo laranja */
            color: white; /* Texto branco */
            border: none; /* Remove borda */
            border-radius: 5px; /* Bordas arredondadas */
        }

        /* Estilos específicos para o botão de cadastro */
        .btn-cadastro {
            background-color: white; /* Cor de fundo branca */
            color: #d27d33; /* Texto na cor laranja */
            border: 2px solid #d27d33; /* Borda laranja */
            border-radius: 5px; /* Bordas arredondadas */
        }

        /* Estilo para os textos abaixo dos botões na seção esquerda */
        .left-content p {
            font-size: 18px; /* Define o tamanho da fonte */
            text-align: center; /* Centraliza o texto */
            margin: 5px 0; /* Define margens superior e inferior de 5px */
        }

        /* Estilo para a imagem da seção direita (ilustração da mulher lendo) */
        .right-content img {
            max-width: 120%; /* Mantém a largura da imagem original */
            height: auto; /* Mantém a proporção da imagem */
            margin-left: -200px; /* Aproxima a imagem da mulher lendo em relação à logo */
        }

        /* Estilo para o rodapé */
        footer {
            text-align: center; /* Centraliza o conteúdo do rodapé */
            width: 100%; /* O rodapé ocupa toda a largura da página */
            padding: 10px; /* Adiciona espaçamento interno de 10px */
            background-color: #d27d33; /* Cor de fundo laranja */
            position: fixed; /* Fixa o rodapé na parte inferior da tela */
            bottom: 0; /* Garante que o rodapé fique no fundo da página */
            left: 0; /* Alinha o rodapé com a borda esquerda */
        }
    </style>
</head>
<body>
    <!-- Container principal que segura a logo, botões, textos e a imagem -->
    <div class="container">
        <!-- Conteúdo do lado esquerdo (logo, botões e textos) -->
        <div class="left-content">
            <!-- Logo do clube de livros -->
            <img src="images/From Our CEO (1).jpg" alt="Logo do clube de livros">
            <!-- Grupo de botões (login e cadastro) -->
            <div class="button-group">
                    <button class="btn-login" onclick="window.location.href='{{ url('/login') }}'">Faça login</button>
                    <button class="btn-cadastro" onclick="window.location.href='{{ url('/criar_conta') }}'">Crie uma nova conta</button>
            </div>
            <!-- Textos abaixo dos botões -->
            <p>Bem-vindo ao nosso clube de livros, onde cada</p>
            <p>página vira uma nova descoberta.</p>
        </div>
        <!-- Conteúdo do lado direito (imagem de uma mulher lendo) -->
        <div class="right-content">
            <img src="images/mulherlendo.jpg" alt="Ilustração de uma mulher lendo">
        </div>
    </div>

    <!-- Rodapé da página -->
    <footer>
        <p>&copy; 2023 The Book Club</p>
    </footer>
</body>
</html>

