<?php
require_once ('protecao.php');
require_once('conexao.php');
require_once('cadastro_consulta.php');


$stmt = $conexao->query("SELECT paciente_id, nome_paciente FROM paciente");
$pacientes = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agendar Consulta</title>
    <link rel="stylesheet" href="../css/cadastro_consulta.css">
</head>
<body>
    <div id="Logo-container">
        <img src="../css/imagens/logo_sem_fundo_azul.png" alt="Logo" id="Logo-img">
        <p id="texto">PsiGestor</p>
    </div>
    <div class="form-container">
        <form method="post">
            <h2 class="form-title">Agendar Consulta</h2>
            <div id="erro">
            <?php 
            if(isset($error)) {
                if(!empty($error)) {
                    echo $error;
                }
            }
            ?>
            </div>

            <div class="form-grid">
                <div class="form-group">
                    <label for="paciente">Paciente</label>
                    <select name="paciente" id="paciente">
                        <option value="">Selecione um paciente</option>
                        <?php foreach ($pacientes as $paciente): ?>
                            <option value="<?= $paciente['paciente_id'] ?>">
                                <?= htmlspecialchars($paciente['nome_paciente']) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="servico">Tipo de serviço</label>
                    <select name="servico" id="servico">
                        <option value="">Selecione um serviço</option>
                        <option value="Terapia online">Terapia online</option>
                        <option value="Terapia individual">Terapia individual</option>
                        <option value="Terapia de Casal">Terapia de Casal</option>
                        <option value="Terapia Familiar">Terapia Familiar</option>
                        <option value="Orientação Vocacional">Orientação Vocacional</option>
                        <option value="Psicoterapia Infantil">Psicoterapia Infantil</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="data">Data</label>
                    <input type="date" id="data" name="data">
                </div>

                <div class="form-group">
                    <label for="horario">Horário</label>
                    <input type="time" id="horario" name="horario">
                </div>

                <div class="form-group">
                    <label for="valor">Valor da consulta</label>
                    <input type="number" id="valor" name="valor" placeholder="R$" step="0.01">
                </div>

                <div class="form-group">
                    <label for="duracao">Duração</label>
                    <input type="time" name="duracao" id="duracao">
                </div>
            </div>

            <div class="button-group">
                <button type="button" onclick="window.location.href='read_consultas.php'">Cancelar</button>
                <button type="submit">Agendar</button>
            </div>
        </form>
    </div>

</body>
</html>
