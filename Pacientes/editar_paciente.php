<?php
require_once ('../Login/protecao.php');
require_once('conexao.php');

if (!isset($_GET['id'])) {
    header("Location: read_pacientes.php");
    exit;
}

$id = intval($_GET['id']);

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nome = trim($_POST['nome']);
    $data = $_POST['data'];
    $procura = trim($_POST['procura']);
    $observacao = trim($_POST['observacao']);
    $med = isset($_POST['med']) ? 1 : 0;

    if (!empty($nome) && !empty($data) && !empty($procura) && !empty($observacao)) {
        $stmt = $conexao->prepare("UPDATE paciente SET nome_paciente = ?, data_nasc = ?, motivo_procura = ?, medicacao_controlada = ?, observacoes = ? WHERE paciente_id = ?");
        $stmt->execute([$nome, $data, $procura, $med, $observacao, $id]);

        header("Location: read_pacientes.php");
        exit;
    } else {
        $error = "Preencha todos os campos obrigatórios!";
    }
}

$stmt = $conexao->prepare("SELECT * FROM paciente WHERE paciente_id = ?");
$stmt->execute([$id]);
$paciente = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$paciente) {
    echo "Paciente não encontrado.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="PT-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Paciente</title>
    <link rel="stylesheet" href="../css/cadastro_pacientes.css">
</head>
<body>
    <div id="Logo-container">
        <img src="../css/imagens/logo_sem_fundo_azul.png" alt="Logo" id="Logo-img">
        <p id="texto">PsiGestor</p>
    </div>
    <div class="form-container">
        <form method="post" class="form-card">
            <h2 class="form-title">Editar paciente</h2>
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
                <input type="text" id="nome" name="nome" value="<?= htmlspecialchars($paciente['nome_paciente']) ?>">
            </div>

            <div class="form-group">
                <label for="data">Data de Nascimento</label>
                <input type="date" name="data" id="data" value="<?= $paciente['data_nasc'] ?>">
            </div>

            <div class="form-group">
                <label for="procura">Motivo da procura</label>
                <input type="text" name="procura" id="procura" value="<?= htmlspecialchars($paciente['motivo_procura']) ?>">
            </div>

            <div class="form-group checkbox-group">
                <label for="med">Usa medicação controlada?</label>
                <div class="checkbox-inline">
                    <input type="checkbox" name="med" id="med" <?= $paciente['medicacao_controlada'] ? 'checked' : '' ?>>
                    <label for="med">Sim</label>
                </div>
            </div>

            <div class="form-group">
                <label for="observacao">Observações adicionais</label>
                <input type="text" id="observacao" name="observacao" value="<?= htmlspecialchars($paciente['observacoes']) ?>">
            </div>

            <div class="button-group">
                <button type="button" onclick="window.location.href='read_pacientes.php'">Cancelar</button>
                <button type="submit">Salvar Alterações</button>
            </div>
        </form>
    </div>
</body>
</html>
