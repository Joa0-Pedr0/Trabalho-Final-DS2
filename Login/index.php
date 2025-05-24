
<?php
include_once ('login.php');
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../css/login.css">
</head>
<body>

    <form action="" method="post">

        <div class = "login-container">
              <div class="Logo-container">
                    <img src="../css/imagens/logo_sem_fundo_azul.png" alt="Logo" class="Logo-img">
                </div>
            <div class = "login-box">
                <h2>Login</h2>
                <input type="text" name = "email" placeholder = "Email">
                <input type="password" name = "senha" placeholder = "Senha">
                <p class = "signup-text">
                    Não tem uma conta? Crie uma aqui!
                </p>
                <button type ="submit" id = "botao-login" class="login-button">LOGIN</button>
            </div>
    </form>
            
            <div class = "welcome-box">
                <h1><strong>Seja bem vindo</strong> de volta ao seu site de gestão de <br> pacientes!</h1>
                <p>Faça o login para acessar sua conta</p>
                <img src="../css/imagens/tela_login2.png" alt="Ilustração">
            </div>
        </div>

            
       
       
    
</body>
</html>