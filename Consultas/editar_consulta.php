<?php
require_once ('../Login/protecao.php');
require_once('conexao.php');
$aviso = "";

if (!isset($_GET['id'])) {
    header("Location: read_consultas.php");
    exit;
}

$id = intval($_GET['id']);

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $paciente_nome = trim($_POST['paciente_nome']);
    $servico = $_POST['servico'];
    $data = $_POST['data'];
    $horario = $_POST['horario'];
    $valor = $_POST['valor'];
    $duracao = $_POST['duracao'];

    if (!empty($paciente_nome) && !empty($servico) && !empty($data) && !empty($horario) && !empty($valor) && !empty($duracao)) {
        $stmt = $conexao->prepare("UPDATE consulta SET paciente_nome = ?, servico = ?, data_consulta = ?, horario = ?, valor_consulta = ?, duracao = ? WHERE id_consulta = ?");
        $stmt->execute([$paciente_nome, $servico, $data, $horario, $valor, $duracao, $id]);
        header("Location: read_consultas.php");
        $_SESSION['aviso'] = "Consulta editada com sucesso!";
        exit;
    } else {
        $error = "Todos os campos são obrigatórios.";
    }
}

$stmt = $conexao->prepare("SELECT * FROM consulta WHERE id_consulta = ?");
$stmt->execute([$id]);
$consulta = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$consulta) {
    echo "Consulta não encontrada.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="PT-BR">
<head>
    <meta charset="UTF-8">
    <title>Editar Consulta</title>
    <link rel="stylesheet" href="../css/cadastro_consulta.css">
</head>
<body>
    <div id="Logo-container">
        <img src="../css/imagens/logo_sem_fundo_azul.png" alt="Logo" id="Logo-img">
        <p id="texto">PsiGestor</p>
    </div>
    <div class="form-container">
        <form method="post" class="form-card">
            <h2 class="form-title">Editar Consulta</h2>
            <div id="erro">
            <?php 
            if(isset($error)) {
                if(!empty($error)) {
                    echo $error;
                }
            }
            ?>
            </div>

            <div class="form-grid">
            <div class="form-group">
                <label for="paciente_nome">Nome do paciente</label>
                <input type="text" id="paciente_nome" name="paciente_nome" placeholder="Digite o nome do paciente" value="<?= htmlspecialchars($consulta['paciente_nome']) ?>">
            </div>

            <div class="form-group">
                <label for="servico">Tipo de serviço</label>
                <select name="servico" id="servico" required>
                    <option value="Terapia online" <?= $consulta['servico'] === 'Terapia online' ? 'selected' : '' ?>>Terapia online</option>
                    <option value="Terapia individual" <?= $consulta['servico'] === 'Terapia individual' ? 'selected' : '' ?>>Terapia individual</option>
                    <option value="Terapia de Casal" <?= $consulta['servico'] === 'Terapia de Casal' ? 'selected' : '' ?>>Terapia de Casal</option>
                    <option value="Terapia Familiar" <?= $consulta['servico'] === 'Terapia Familiar' ? 'selected' : '' ?>>Terapia Familiar</option>
                    <option value="Orientação Vocacional" <?= $consulta['servico'] === 'Orientação Vocacional' ? 'selected' : '' ?>>Orientação Vocacional</option>
                    <option value="Psicoterapia Infantil" <?= $consulta['servico'] === 'Psicoterapia Infantil' ? 'selected' : '' ?>>Psicoterapia Infantil</option>
                </select>
            </div>

            <div class="form-group">
                <label for="data">Data</label>
                <input type="date" name="data" id="data" value="<?= $consulta['data_consulta'] ?>">
            </div>

            <div class="form-group">
                <label for="horario">Horário</label>
                <input type="time" name="horario" id="horario" value="<?= $consulta['horario'] ?>">
            </div>

            <div class="form-group">
                <label for="valor">Valor da consulta</label>
                <input type="number" name="valor" id="valor" step="0.01" value="<?= $consulta['valor_consulta'] ?>">
            </div>

            <div class="form-group">
                <label for="duracao">Duração</label>
                <input type="time" name="duracao" id="duracao" value="<?= $consulta['duracao'] ?>">
            </div>
    </div>    

            <div class="button-group">
                <button type="button" onclick="window.location.href='read_consultas.php'">Cancelar</button>
                <button type="submit">Salvar Alterações</button>
            </div>
        </form>

</body>
</html>
