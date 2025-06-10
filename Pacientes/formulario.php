<?php
include_once 'paciente_cadastro.php';
?>

<!DOCTYPE html>
<html lang="PT-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pacientes</title>
</head>

<body>
    <form method="post">
        <label for="nome">Nome completo</label>
        <input type="text" id="nome" name="nome" placeholder="Nome do paciente">
        <label for="data">Data de Nascimento</label>
        <input type="date" name="data" id="data">
        <label for="procura">Motivo da procura</label>
        <input type="text" name="procura" id="procura" placeholder="Motivo">
        <label for="med">Usa medicação controlada?</label>
        <input type="checkbox" name="med" id="med"> Sim
        <label for="observacao">Observações adicionais</label>
        <input type="text" id="observacao" name="observacao" placeholder="Observações">
        <button>ENVIAR</button>
    </form>
</body>

</html>