<?php
include_once ('conexao.php');

if(isset($_POST['email']) || isset($_POST['senha'])){
    if(empty($_POST['email'])) {
        echo "Preencha seu e-mail";
    }
    else if(empty($_POST['senha'])) {
        echo "Preencha sua senha";
    }
    else {
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        $sql_code = "SELECT * FROM usuario WHERE email = '$email' AND senha = '$senha'";
        $sql_query = $conexao->query($sql_code) or die("Falha na execução: " . $conexao->error);

        $quantidade = $sql_query->rowCount();

        if ($quantidade == 1) {

            $usuario = $sql_query->fetch(PDO::FETCH_ASSOC); 

            if(!isset($_SESSION)){
                session_start();
            }

            $_SESSION['id'] = $usuario['id'];
            $_SESSION['nome'] = $usuario['nome'];

            header("Location: painel.php");

        } else {
            echo "Falha ao logar! E-mail ou senha erradas";
        }
    }
}
?>
