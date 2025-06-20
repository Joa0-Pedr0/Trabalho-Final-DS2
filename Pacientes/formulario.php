<?php
require_once ('../Login/protecao.php');
include_once 'paciente_cadastro.php';
?>

<!DOCTYPE html>
<html lang="PT-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pacientes</title>
    <link rel="stylesheet" href="../css/cadastro_pacientes.css">
</head>

<body>
    <div id="Logo-container">
        <img src="../css/imagens/logo_sem_fundo_azul.png" alt="Logo" id="Logo-img">
        <p id="texto">PsiGestor</p>
    </div>
    <div class="form-container">
        <form method="post" class="form-card">
            <h2 class="form-title">Cadastrar paciente</h2>
            <div id="erro">
            <?php 
            if(isset($error)) {
                if(!empty($error)) {
                    echo $error;
                }
            }
            ?>
            </div>
            <div class="form-group">
                <label for="nome">Nome completo</label>
                <input type="text" id="nome" name="nome" placeholder="Nome do paciente">
            </div>

            <div class="form-group">
                <label for="data">Data de Nascimento</label>
                <input type="date" name="data" id="data">
            </div>

            <div class="form-group">
                <label for="procura">Motivo da procura</label>
                <input type="text" name="procura" id="procura" placeholder="Motivo">
            </div>

            <div class="form-group checkbox-group">
                <label for="med">Usa medicação controlada?</label>
                <div class="checkbox-inline">
                    <input type="checkbox" name="med" id="med">
                    <label for="med">Sim</label>
                </div>
            </div>

            <div class="form-group">
                <label for="observacao">Observações adicionais</label>
                <input type="text" id="observacao" name="observacao" placeholder="Observações">
            </div>

            <div class="button-group">
                <button type="reset" onclick="window.location.href='read_pacientes.php'">Cancelar</button>
                <button type="submit">Cadastrar</button>
            </div>
        </form>
    </div>
</body>

</html>
