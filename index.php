<?php
$nome = '';
$telefone = '';
$email = '';
$exibir_notificacao = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = htmlspecialchars($_POST['nome'] ?? '');
    $telefone = htmlspecialchars($_POST['telefone'] ?? '');
    $email = htmlspecialchars($_POST['email'] ?? '');

    if (!empty($email)) {
        $exibir_notificacao = true;
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="stylessenha.css">
    <title>Formulário de Cadastro</title>
</head>
<body>

    <h2>Formulário de Cadastro</h2>

    <button onclick="document.getElementById('modalLogin').style.display='block'" style="width:auto;">Acessar / Entrar</button>
    <button onclick="document.getElementById('modalCadastro').style.display='block'" style="width:auto;">Criar Conta</button>


    <div id="modalLogin" class="modal" style="display:none;">
        <span onclick="document.getElementById('modalLogin').style.display='none'" class="close" title="Fechar">&times;</span>
        <form class="modal-content" onsubmit="validarLogin(event)">
            <div class="container">
                <h1>Acessar</h1>
                <p>Preencha os campos abaixo para acessar.</p>
                <hr>
                <label for="loginNome"><b>Nome</b></label>
                <input type="text" placeholder="Digite seu nome" id="loginNome" name="nome" required>

                <label for="loginTelefone"><b>Telefone</b></label>
                <input type="text" placeholder="Digite seu telefone" id="loginTelefone" name="telefone" required>

                <label for="loginEmail"><b>E-mail</b></label>
                <input type="text" placeholder="Digite seu e-mail" id="loginEmail" name="email" required>

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

    <div id="modalCadastro" class="modal" style="display:none;">
        <span onclick="document.getElementById('modalCadastro').style.display='none'" class="close" title="Fechar">&times;</span>
        <form method="POST" action="" class="modal-content" onsubmit="validarCadastro(event)">
            <div class="container">
                <h1>Criar Conta</h1>
                <p>Preencha os campos abaixo para acessar.</p>
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

    <?php if ($exibir_notificacao): ?>
        <div class='notificacao-php'>
            <h4>Atualização Dados</h4>
            <p><b>Nome:</b> <?php echo $nome; ?></p>
            <p><b>Telefone:</b> <?php echo $telefone; ?></p>
            <p><b>E-mail:</b> <?php echo $email; ?></p>
        </div>
    <?php endif; ?>

</body>
</html>
