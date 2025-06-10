<?php 
include_once 'Login/protecao.php';
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Painel do Psicólogo</title>
  <link rel="stylesheet" href="css/tela_inicial.css" />
</head>
<body>
  <div class="container">
    <div class="dashboard">
      <header class="top-bar">
        <div class="logo">🧠 PsiGestor</div>
        <nav>Painel do Psicólogo</nav>
      </header>

      <div class="welcome">
        <h1>👋 Olá, Dr. Eduardo!</h1>
        <p class="date">Hoje é terça-feira, 14 de abril.</p>
        <p class="summary">Aqui está um resumo do seu dia:</p>
      </div>

      <div class="main-content">
        <div class="left-panel">
          <div class="consultas-box">
            <h3>Consultas de hoje</h3>
            <div class="consulta">
              <span class="hora">09:00</span>
              <div>
                <strong>Pedro Oliveira</strong><br />
                <span>Terapia individual</span>
              </div>
            </div>
            <div class="consulta">
              <span class="hora">11:30</span>
              <div>
                <strong>João Pedro</strong><br />
                <span>Terapia on-line</span>
              </div>
            </div>
            <div class="consulta">
              <span class="hora">14:00</span>
              <div>
                <strong>Diego Souza</strong><br />
                <span>Terapia individual</span>
              </div>
            </div>
            <a href="#" class="ver-agenda">Ver agenda completa</a>
          </div>
        </div>

        <div class="right-panel">
          <div class="botoes">
            <button onclick="window.location.href='Pacientes/formulario.php'">➕<br/>Novo Paciente</button>
            <button>📋<br/>Nova consulta</button>
            <button>🎁<br/>Novo serviço</button>
            <button>📂<br/>Ver todos os pacientes</button>
            <button>📅<br/>Ver agenda completa</button>
            <button onclick="window.location.href='Login/logout.php'">➡️<br/>Sair da conta</button>
          </div>
          <div class="resumos">
            <div class="resumo-box">
              <div class="icon">👥</div>
              <div>
                <h2>13</h2>
                <p>Pacientes ativos</p>
              </div>
            </div>
            <div class="resumo-box">
              <div class="icon">📄</div>
              <div>
                <h2>8</h2>
                <p>Consultas na semana</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
