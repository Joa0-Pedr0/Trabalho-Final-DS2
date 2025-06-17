<?php
require_once('conexao.php');

// Busca os pacientes
$stmt = $conexao->query("SELECT paciente_id, nome_paciente FROM paciente");
$pacientes = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="PT-BR">
<head>
    <meta charset="UTF-8">
    <title>Pacientes</title>
    <script>
        function confirmarExclusao(id) {
            if (confirm('Tem certeza que deseja excluir este paciente?')) {
                window.location.href = 'excluir_pacientes.php?id=' + id;
            }
        }
    </script>
</head>
<body>

    <h2>Pacientes Cadastrados</h2>

    <table border="1" cellpadding="5" cellspacing="0">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($pacientes as $paciente): ?>
                <tr>
                    <td><?= htmlspecialchars($paciente['paciente_id']) ?></td>
                    <td><?= htmlspecialchars($paciente['nome_paciente']) ?></td>
                    <td>
                        <button onclick="confirmarExclusao(<?= $paciente['paciente_id'] ?>)">Excluir</button>
                        <button>Editar</button>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</body>
</html>
