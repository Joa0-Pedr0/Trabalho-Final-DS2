<?php
require_once('conexao.php');

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    if ($id > 0) {
        $stmt = $conexao->prepare("DELETE FROM paciente WHERE paciente_id = ?");
        $stmt->execute([$id]);
    }
}

// Redireciona de volta pra lista
header("Location: read_pacientes.php");
exit;