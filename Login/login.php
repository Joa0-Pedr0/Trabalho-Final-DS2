<?php
include_once ('conexao.php');

if(isset($_POST['email']) && isset($_POST['senha'])){
    if(empty($_POST['email'])) {
        $error = "Preencha seu e-mail!";
    }
    else if(empty($_POST['senha'])) {
        $error =   "Preencha sua senha!";
    }
    else {
        $email = $_POST['email'];
        $senha = trim($_POST['senha']);

        $sql_code = "SELECT * FROM usuario WHERE email = '$email' AND senha = '$senha'";
        try {
                $sql_query = $conexao->query($sql_code);
            } catch (PDOException $e) {
                die("Falha na execução: " . $e->getMessage());
            }

        $quantidade = $sql_query->rowCount();

        if ($quantidade == 1) {

            $usuario = $sql_query->fetch(PDO::FETCH_ASSOC); 

            if(!isset($_SESSION)){
                session_start();
            }

            $_SESSION['id'] = $usuario['id'];
            $_SESSION['nome'] = $usuario['nome'];

            header("Location: ../index.php");

        } else {
            $error = "Falha ao logar! E-mail ou senha erradas";
        }
    }
}
?>
