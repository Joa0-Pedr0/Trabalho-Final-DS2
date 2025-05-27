create database sistema;
use sistema;

create table usuario  (
	id_usuario INT Primary key AUTO_INCREMENT,
    nome_usuario varchar(45),
    email_usuario varchar(100),
    especializacao varchar(45),
    senha varchar(16)
);

create table paciente  (
	id_paciente INT Primary key AUTO_INCREMENT,
    nome_paciente varchar(45),
    data_nasc date,
    motivo_procura varchar(255),
    medicacao_controlada boolean,
    observacoes varchar(255),
    usuario_id int,
    FOREIGN KEY (usuario_id) REFERENCES usuario(id_usuario)
);

create table servico (
	id_servico INT Primary key AUTO_INCREMENT,
    nome_servico varchar(45),
    descricao varchar(255),
    usuario_id int,
    FOREIGN KEY (usuario_id) REFERENCES usuario(id_usuario)
);

create table consulta  (
	id_consulta INT Primary key AUTO_INCREMENT,
    data_consulta DATE,
    valor_consulta DECIMAL (10.2),
    horario TIME,
    duracao TIME,
	usuario_id INT,
    FOREIGN KEY (usuario_id) REFERENCES usuario(id_usuario),
    paciente_id INT,
    FOREIGN KEY (paciente_id) REFERENCES paciente(id_paciente),
    servico_id INT,
    FOREIGN KEY (servico_id) REFERENCES servico(id_servico)
);



	