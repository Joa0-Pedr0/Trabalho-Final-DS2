<?php
require_once('conexao.php');

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nome = trim($_POST['nome']);
    $data = trim($_POST['data']);
    $procura = trim($_POST['procura']);
    $med = $_POST['med'];
    $observacao = trim($_POST['observacao']);
    if (empty($nome)) {
        $error = "Preencha o nome do paciente!";
    } elseif (empty($data)) {
        $error = "Preencha a data de nascimento!";
    } elseif (empty($procura)) {
        $error = "Preencha a procura do paciente!"; 
    }  else {
            $stmt = $conexao->prepare("INSERT INTO paciente (nome_paciente, data_nasc, motivo_procura, medicacao_controlada, observacoes) VALUES (?, ?, ?, ?, ?)");
            $enviar = $stmt->execute([$nome, $data, $procura, $med, $observacao]);
            if ($enviar) {
                header("Location: read_pacientes.php");
            } else {
                $error = "Erro ao cadastrar o paciente. Tente novamente!";
            }
        }
    }
?>