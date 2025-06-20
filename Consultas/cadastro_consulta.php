<?php
require_once('conexao.php');
$aviso = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $paciente_id = $_POST['paciente'];
    $servico = $_POST['servico'];
    $data = trim($_POST['data']);
    $horario = trim($_POST['horario']);
    $valor = trim($_POST['valor']);
    $duracao = trim($_POST['duracao']);

    if (empty($paciente_id)) {
        $error = "Escolha o paciente!";
    } elseif (empty($servico)) {
        $error = "Escolha o tipo de serviço!";
    } elseif (empty($data)) {
        $error = "Preencha a data da consulta!";
    } elseif (empty($horario)) {
        $error = "Preencha o horário da consulta!";
    } elseif (empty($valor)) {
        $error = "Preencha o valor da consulta!";
    } elseif (empty($duracao)) {
        $error = "Preencha a duração da consulta!";
    } else {

        $stmtNome = $conexao->prepare("SELECT nome_paciente FROM paciente WHERE paciente_id = ?");
        $stmtNome->execute([$paciente_id]);
        $paciente = $stmtNome->fetch();

        if ($paciente) {
            $paciente_nome = $paciente['nome_paciente'];
            $stmt = $conexao->prepare("INSERT INTO consulta (paciente_nome, servico, data_consulta, horario, valor_consulta, duracao) VALUES (?, ?, ?, ?, ?, ?)");
            $enviar = $stmt->execute([$paciente_nome, $servico, $data, $horario, $valor, $duracao]);

            if ($enviar) {
                header("Location: read_consultas.php");
                $_SESSION['aviso'] = "Consulta cadastrada com sucesso!";
                exit;
            } else {
                $error = "Erro ao agendar a consulta. Tente novamente!";
            }
        } else {
            $error = "Paciente não encontrado no banco de dados.";
        }
    }
}
