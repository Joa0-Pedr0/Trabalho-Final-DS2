<?php
include_once('login.php');
?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../css/login.css">
</head>

<body>

    <form method="post">

        <div id="caixa-principal">
            <div id="Logo-container">
                <img src="../css/imagens/logo_sem_fundo_azul.png" alt="Logo" id="Logo-img">
            </div>

            <div id="caixa-login">
                <div id="error">
                    <?php
                    if (isset($error)) {
                        if (!empty($error)) {
                            echo $error;
                        }
                    }
                    ?>
                </div>
                <h2>Login</h2>

                <div class="campo">
                    <label for="email">Digite seu email:</label>
                    <input type="email" name="email" id="email" placeholder="Email">
                </div>

                <div class="campo">
                    <label for="senha">Digite sua senha:</label>
                    <input type="password" name="senha" id="senha" placeholder="Senha">
                    <a href="../Cadastro/formulario.php" id="texto-cadastro">
                        Não tem uma conta? Crie uma aqui!
                    </a>
                </div>


                <button type="submit" id="botao-login">LOGIN</button>
            </div>
    </form>

    <div id="caixa-secundaria">
        <h1>
            <strong>Seja bem vindo</strong> de volta ao seu site de gestão de <br> pacientes!
        </h1>
        <p>
            Faça o login para acessar sua conta
        </p>

        <img src="../css/imagens/tela_login2.png" alt="Ilustração">
    </div>
    </div>

</body>

</html>