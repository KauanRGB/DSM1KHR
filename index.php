<?php
session_start();

// Inicializa a sessão de usuários cadastrados se não existir
if (!isset($_SESSION['usuarios'])) {
    $_SESSION['usuarios'] = [];
}

// Processa o formulário quando enviado via POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $acao = $_POST['acao'] ?? '';

    if ($acao === 'cadastro') {
        $novoUsuario = [
            'nome' => htmlspecialchars($_POST['nome']),
            'telefone' => htmlspecialchars($_POST['telefone']),
            'email' => htmlspecialchars($_POST['email']),
            'tipo' => 'Cadastro'
        ];
        // Adiciona o novo usuário na lista da sessão
        $_SESSION['usuarios'][] = $novoUsuario;
    } elseif ($acao === 'login') {
        // Apenas para exemplo de feedback no login
        $_SESSION['ultimo_login'] = htmlspecialchars($_POST['nome']);
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="stylessenha.css">
    <title>Formulário de Cadastro</title>
    <style>
        /* Estilo simples para exibir os dados na tela caso não tenha no CSS */
        .info-box { margin-top: 20px; padding: 15px; border: 1px solid #28075e; background: #f9f9f9; }
    </style>
</head>
<body>

    <h2>Formulário de Cadastro</h2>
    
    <button onclick="document.getElementById('modalLogin').style.display='block'" style="width:auto;">Acessar / Entrar</button>
    <button onclick="document.getElementById('modalCadastro').style.display='block'" style="width:auto;">Criar Conta</button>

    <!-- Área para exibir os dados cadastrados na página -->
    <div class="info-box">
        <h3>Usuários Cadastrados nesta Sessão:</h3>
        <?php if (!empty($_SESSION['usuarios'])): ?>
            <ul>
                <?php foreach ($_SESSION['usuarios'] as $user): ?>
                    <li><strong>Nome:</strong> <?= $user['nome'] ?> | <strong>E-mail:</strong> <?= $user['email'] ?> | <strong>Telefone:</strong> <?= $user['telefone'] ?></li>
                <?php endforeach; ?>
            </ul>
        <?php else: ?>
            <p>Nenhum cadastro realizado ainda.</p>
        <?php endif; ?>
        
        <?php if (isset($_SESSION['ultimo_login'])): ?>
            <p style="color: green;">Último acesso realizado por: <strong><?= $_SESSION['ultimo_login'] ?></strong></p>
        <?php endif; ?>
    </div>

    <!-- Modal Login -->
    <div id="modalLogin" class="modal" style="display:none;">
        <span onclick="document.getElementById('modalLogin').style.display='none'" class="close" title="Fechar">&times;</span>
        <form method="POST" action="" class="modal-content">
            <input type="hidden" name="acao" value="login">
            <div class="container">
                <h1>Acessar</h1>
                <p>Preencha os campos abaixo para acessar.</p>
                <hr>
                <label for="loginNome"><b>Nome</b></label>
                <input type="text" placeholder="Digite seu nome" id="loginNome" name="nome" required>

                <label for="loginTelefone"><b>Telefone</b></label>
                <input type="text" placeholder="Digite seu telefone" id="loginTelefone" name="telefone" required>

                <label for="loginEmail"><b>E-mail</b></label>
                <input type="email" placeholder="Digite seu e-mail" id="loginEmail" name="email" required>

                <label for="loginPsw"><b>Senha</b></label>
                <input type="password" placeholder="Digite sua senha" id="loginPsw" name="psw" required>

                <label>
                    <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Lembrar de mim
                </label>

                <div class="clearfix">
                    <button type="button" onclick="document.getElementById('modalLogin').style.display='none'" class="cancelbtn">Cancelar</button>
                    <button type="submit" class="signupbtn">Entrar</button>
                </div>
            </div>
        </form>
    </div>

    <!-- Modal Cadastro -->
    <div id="modalCadastro" class="modal" style="display:none;">
        <span onclick="document.getElementById('modalCadastro').style.display='none'" class="close" title="Fechar">&times;</span>
        <form method="POST" action="" class="modal-content">
            <input type="hidden" name="acao" value="cadastro">
            <div class="container">
                <h1>Criar Conta</h1>
                <p>Preencha os campos abaixo para criar sua conta.</p>
                <hr>
                <label for="cadNome"><b>Nome</b></label>
                <input type="text" placeholder="Digite seu nome" id="cadNome" name="nome" required>

                <label for="cadTelefone"><b>Telefone</b></label>
                <input type="text" placeholder="Digite seu telefone" id="cadTelefone" name="telefone" required>

                <label for="cadEmail"><b>E-mail</b></label>
                <input type="text" placeholder="Digite seu e-mail" id="cadEmail" name="email" required>

                <label for="cadPsw"><b>Senha</b></label>
                <input type="password" placeholder="Digite sua senha" id="cadPsw" name="psw" required>

                <label>
                    <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Lembrar de mim
                </label>

                <div class="clearfix">
                    <button type="button" onclick="document.getElementById('modalCadastro').style.display='none'" class="cancelbtn">Cancelar</button>
                    <button type="submit" class="signupbtn">Cadastrar</button>
                </div>
            </div>
        </form>
    </div>

</body>
</html>
