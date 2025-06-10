<?php
require_once('cadastro.php');
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link rel="stylesheet" href="../css/cadastro.css">
</head>

<body>

    <form method="post">

        <div id="caixa-principal">
            <div id="Logo-container">
                <img src="../css/imagens/logo_sem_fundo_azul.png" alt="Logo" id="Logo-img">
            </div>

            <div id="caixa-cadastro">
                <div id="error">
                    <?php
                    if (isset($error)) {
                        if (!empty($error)) {
                            echo $error;
                        }
                    }
                    ?>
                </div>
                <h2>Cadastro</h2>

                <div class="campo">
                    <label for="nome">Digite seu nome:</label>
                    <input type="text" name="nome" id="nome" placeholder="Nome">
                </div>

                <div class="campo">
                    <label for="email">Digite seu email:</label>
                    <input type="email" name="email" id="email" placeholder="Email">
                </div>

                <div class="campo">
                    <label for="especializacao">Escolha sua especialização:</label>
                    <select name="especializacao" id="especializacao">
                        <option value=""></option>
                        <option value="Psicologia Clínica">Psicologia Clínica</option>
                        <option value="Psicanálise">Psicanálise</option>
                        <option value="Psicopedagogia">Psicopedagogia</option>
                        <option value="Psicologia Escolar">Psicologia Escolar</option>
                        <option value="Neuropsicologia">Neuropsicologia</option>
                        <option value="Psicologia Paliativa">Psicologia Paliativa</option>
                        <option value="Não tenho especialização">Não tenho especialização</option>
                    </select>

                </div>

                <div class="campo">
                    <label for="senha">Digite sua senha:</label>
                    <input type="password" name="senha" id="senha" placeholder="Senha">
                    <a href="../Login/formula.php" id="texto-login">
                        Já tem uma conta? Clique aqui!
                    </a>
                </div>

                <button type="submit" id="botao-cadastro">CADASTRAR</button>
            </div>
    </form>

    <div id="caixa-secundaria">
        <h1>
            <strong>Crie sua conta</strong> aqui!
        </h1>
        <p>
            Registre sua conta
        </p>

        <img src="../css/imagens/imagem_cadastro.png" alt="Ilustração">
    </div>
    </div>

</body>

</html>