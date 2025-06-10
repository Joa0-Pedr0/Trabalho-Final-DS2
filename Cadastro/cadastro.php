<?php
require_once('conexao.php');

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nome = trim($_POST['nome']);
    $email = trim($_POST['email']);
    $especializacao = trim($_POST['especializacao']);
    $senha = trim($_POST['senha']);
    if (empty($nome)) {
        $error = "Preencha seu nome!";
    } elseif (empty($email)) {
        $error = "Preencha seu email!";
    } elseif (empty($senha)) {
        $error = "Preencha sua senha!";
    } else {
        $stmt = $conexao->prepare("SELECT usuario_id FROM usuario WHERE email_usuario = ?");
        $stmt->execute([$email]);

        if ($stmt->rowCount() > 0) {
            $error = "Este email já está cadastrado!";
        } else {
            $hash = password_hash($senha, PASSWORD_DEFAULT);
            $stmt = $conexao->prepare("INSERT INTO usuario (nome_usuario, email_usuario, especializacao, senha) VALUES (?, ?, ?, ?)");
            $enviar = $stmt->execute([$nome, $email, $especializacao, $hash]);
            if ($enviar) {
                header("Location: ../Login/formula.php");
            } else {
                $error = "Erro ao cadastrar. Tente novamente!";
            }
        }
    }
}
?>