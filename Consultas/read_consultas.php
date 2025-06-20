<?php
require_once('conexao.php');
require_once('cadastro_consulta.php');

session_start();
$aviso = '';
if (isset($_SESSION['aviso'])) {

    $aviso = $_SESSION['aviso'];

    unset($_SESSION['aviso']);
}


$stmt = $conexao->query("SELECT id_consulta, paciente_nome, valor_consulta FROM consulta");
$consultas = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="PT-BR">

<head>
    <link rel="stylesheet" href="../css/read_pacientes.css">
    <meta charset="UTF-8">
    <title>Read consultas</title>
    <script src="https://kit.fontawesome.com/e3d86f5f56.js" crossorigin="anonymous"></script>
</head>

<body>

    <div id="Logo-container">
        <img src="../css/imagens/logo_sem_fundo_azul.png" alt="Logo" id="Logo-img">
        <p>PsiGestor</p>
    </div>
    <div class="container">
        <h2 id="texto">Consultas agendadas</h2>
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
        <a href="formulario.php">Nova consulta</a>
        </div>
        <div id="b">
        <i class="fa-solid fa-arrow-left"></i>
        <a href="../index.php">Voltar</a>
        </div>

        <table border="1" cellpadding="5" cellspacing="0">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Paciente da consulta</th>
                    <th>Valor</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($consultas as $consulta): ?>
                    <tr>
                        <td><?= htmlspecialchars($consulta['id_consulta']) ?></td>
                        <td><?= htmlspecialchars($consulta['paciente_nome']) ?></td>
                        <td><?= htmlspecialchars($consulta['valor_consulta']) ?></td>
                        <td>
                            <a href="editar_consulta.php?id=<?= $consulta['id_consulta'] ?>">
                                <button class="btn-editar">Editar</button>
                            </a>
                            <button class="btn-excluir" onclick="confirmarExclusao(<?= $consulta['id_consulta'] ?>)">Excluir</button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

    </div>

    <script>
        function confirmarExclusao(id) {
            if (confirm('Tem certeza que deseja excluir esta consulta?')) {
                window.location.href = 'excluir_consulta.php?id=' + id;
            }
        }
    </script>

</body>

</html>