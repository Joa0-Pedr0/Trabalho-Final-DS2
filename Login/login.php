<?php
include_once('conexao.php');

if (isset($_POST['email']) && isset($_POST['senha'])) {
    if (empty($_POST['email'])) {
        $error = "Preencha seu e-mail!";
    } else if (empty($_POST['senha'])) {
        $error =  "Preencha sua senha!";
    } else {
        $email = $_POST['email'];
        $senha = trim($_POST['senha']);
        $stmt = $conexao->prepare("SELECT * FROM usuario WHERE email_usuario = ?");
        $stmt->execute([$email]);

        if ($stmt->rowCount() == 1) {
            $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
            if (!isset($_SESSION)) {
                session_start();
            }
            password_verify($senha, $usuario['senha']);
                $_SESSION['id'] = $usuario['usuario_id'];
                $_SESSION['nome'] = $usuario['usuario_nome'];
                header("Location: ../index.php");
                exit();
        } else {
            $error = "Falha ao logar! E-mail ou senha errados.";
        }
    }
}
