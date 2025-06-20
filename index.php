<?php
include_once 'Login/protecao.php';
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Tela inicial</title>
  <link rel="stylesheet" href="css/tela_inicial.css" />
</head>

<body>
  <h1>Seja bem vindo a tela principal!</h1>
  <div id="link">
    <div id="link1">
      <a href="Pacientes/read_pacientes.php">Crud pacientes</a>
    </div>
    <div id="link2">
      <a href="Consultas/read_consultas.php">Crud consultas</a>
    </div>
    <div id="link3">
      <a href="Login/logout.php">sair da conta</a>
    </div>


  </div>

</body>

</html>