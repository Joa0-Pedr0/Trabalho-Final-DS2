<?php
require_once('conexao.php');

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    if ($id > 0) {
        $stmt = $conexao->prepare("DELETE FROM paciente WHERE paciente_id = ?");
        $stmt->execute([$id]);
    }
}
header("Location: read_pacientes.php");
exit;
