<?php
require_once('conexao.php');

$stmt = $conexao->query("SELECT paciente_id, nome_paciente FROM paciente");
$pacientes = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="PT-BR">
<head>
    <link rel="stylesheet" href="../css/read_pacientes.css">
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
<div class="container">
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
                        <button  class="btn-editar">Editar</button>
                        <button  class="btn-excluir" onclick="confirmarExclusao(<?= $paciente['paciente_id'] ?>)">Excluir</button>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
    

</body>
</html>
