<?php
include_once ('protecao.php');
require_once('conexao.php');
include_once('paciente_cadastro.php');

$aviso = '';
if (isset($_SESSION['aviso'])) {

    $aviso = $_SESSION['aviso'];

    unset($_SESSION['aviso']);
}


$stmt = $conexao->query("SELECT paciente_id, nome_paciente FROM paciente");
$pacientes = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="PT-BR">

<head>
    <link rel="stylesheet" href="../css/read_pacientes.css">
    <meta charset="UTF-8">
    <title>Pacientes</title>
    <script src="https://kit.fontawesome.com/e3d86f5f56.js" crossorigin="anonymous"></script>
</head>

<body>

    <div id="Logo-container">
        <img src="../css/imagens/logo_sem_fundo_azul.png" alt="Logo" id="Logo-img">
        <p>PsiGestor</p>
    </div>
    <div class="container">
        <h2 id="texto">Pacientes Cadastrados</h2>
        <div id="aviso">
            <?php
            if (isset($aviso)) {
                if (!empty($aviso)) {
                    echo $aviso;
                }
            }
            ?>
        </div>
        <div id="a">
            <i class="fa-solid fa-plus"></i>
            <a href="formulario.php">Novo paciente</a>
        </div>
        <div id="b">
            <i class="fa-solid fa-arrow-left"></i>
            <a href="../index.php">Voltar</a>
        </div>


        <table border="1" cellpadding="5" cellspacing="0">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome do paciente</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($pacientes as $paciente): ?>
                    <tr>
                        <td><?= htmlspecialchars($paciente['paciente_id']) ?></td>
                        <td><?= htmlspecialchars($paciente['nome_paciente']) ?></td>
                        <td>
                            <a href="editar_paciente.php?id=<?= $paciente['paciente_id'] ?>">
                                <button class="btn-editar">Editar</button>
                            </a>
                            <button class="btn-excluir" onclick="confirmarExclusao(<?= $paciente['paciente_id'] ?>)">Excluir</button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

    </div>

    <script>
        function confirmarExclusao(id) {
            if (confirm('Tem certeza que deseja excluir este paciente?')) {
                window.location.href = 'excluir_pacientes.php?id=' + id;
            }
        }
    </script>

</body>

</html>