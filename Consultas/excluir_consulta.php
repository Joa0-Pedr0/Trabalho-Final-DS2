<?php
require_once('conexao.php');

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    if ($id > 0) {
        $stmt = $conexao->prepare("DELETE FROM consulta WHERE id_consulta = ?");
        $stmt->execute([$id]);
    }
}
header("Location: read_consultas.php");
exit;
