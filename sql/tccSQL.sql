CREATE database Horus;
USE  Horus;


-- Tabela de Nivel de Acesso

CREATE TABLE IF NOT EXISTS tb_nivelAcesso(
  cd_acesso INT auto_increment, -- Chave Primaria
  nm_nivel VARCHAR(100) NOT NULL,
  
PRIMARY KEY (cd_acesso));
-- ------------------------------

-- Tabela de Usuario

CREATE TABLE IF NOT EXISTS tb_usuario(
  cd_rmUsuario INT auto_increment, -- Chave Primaria
  nm_usuario VARCHAR(200) NOT NULL,
  nr_cpf CHAR(11) NOT NULL,
  dt_nascimento DATE NOT NULL,
  ds_statusUsuario VARCHAR(45) NOT NULL,
  FK_cd_acesso INT NOT NULL, -- Chave Estrangeira referente a tabela de Nivel de Acesso
  
PRIMARY KEY (cd_rmUsuario),
FOREIGN KEY (FK_cd_acesso) REFERENCES tb_nivelAcesso (cd_acesso));
-- ------------------------------

-- Tabela de Relatorios

CREATE TABLE IF NOT EXISTS tb_relatorio(
  cd_relatorio INT auto_increment, -- Chave Primaria
  ds_relatorio LONGTEXT NOT NULL,
  dt_relatorio CHAR(11) NOT NULL,
  FK_cd_rmUsuario INT NOT NULL, -- Chave Estrangeira referente a tabela de Usuario
  
PRIMARY KEY (cd_relatorio),
FOREIGN KEY (FK_cd_rmUsuario) REFERENCES tb_usuario (cd_rmUsuario));
-- ------------------------------

-- Tabela de Componente Curricular

CREATE TABLE IF NOT EXISTS tb_componenteCurricular(
  cd_componente INT auto_increment, -- Chave Primaria
  nm_componente VARCHAR(100) NOT NULL,
  ds_componente LONGTEXT NOT NULL,
  ds_duracaoComponente INT NOT NULL,
  ds_statusComponente VARCHAR(45) NOT NULL,
  
PRIMARY KEY (cd_componente));
-- ------------------------------

-- Tabela de Campo de Estagio

CREATE TABLE IF NOT EXISTS tb_campoEstagio(
  cd_campoEstagio INT auto_increment, -- Chave Primaria
  nm_campoEstagio VARCHAR(100) NOT NULL,
  sg_campoEstagio VARCHAR(45) NULL,
  ds_enderecoEstagio CHAR(8) NULL,
  ds_statusCampoEstagio VARCHAR(45) NOT NULL,
  
PRIMARY KEY (cd_campoEstagio));
-- ------------------------------

-- Tabela de Cronograma

CREATE TABLE IF NOT EXISTS tb_cronograma(
  cd_cronograma INT auto_increment,
  ds_diretorioArquivo varchar(200) NOT NULL, -- Chave Primaria

PRIMARY KEY (cd_cronograma));
-- ------------------------------

-- Tabela de Excessão do Cronograma

CREATE TABLE IF NOT EXISTS tb_excessaoCronograma(
  cd_excessao INT auto_increment, -- Chave Primaria
  dt_diaExcessao DATE NOT NULL,
  ds_motivoExcessao VARCHAR(200) NOT NULL,
  ds_statusExecessao VARCHAR(45) NOT NULL,
  FK_cd_cronograma INT NOT NULL, -- Chave Estrangeira referente a tabela de Cronograma
  
PRIMARY KEY (cd_excessao),
FOREIGN KEY (FK_cd_cronograma) REFERENCES tb_cronograma (cd_cronograma));
-- ------------------------------

-- Tabela de Modulo

CREATE TABLE IF NOT EXISTS tb_modulo(
  cd_modulo INT auto_increment, -- Chave Primaria
  dt_inicial DATE NOT NULL,
  dt_final DATE NOT NULL,
  sg_modulo VARCHAR(45) NOT NULL,
  FK_cd_cronograma INT NOT NULL, -- Chave Estrangeira referente a tabela de Cronograma
  
PRIMARY KEY (cd_modulo),
FOREIGN KEY (FK_cd_cronograma) REFERENCES tb_cronograma (cd_cronograma));
-- ------------------------------

-- Tabela de Grupos de Sala

CREATE TABLE IF NOT EXISTS tb_grupoSala(
  cd_grupoSala INT auto_increment, -- Chave Primaria
  sg_grupoSala VARCHAR(45) NOT NULL,
  FK_cd_modulo INT NOT NULL, -- Chave Estrangeira referente a tabela de Modulo
  
PRIMARY KEY (cd_grupoSala),
FOREIGN KEY (FK_cd_modulo) REFERENCES tb_Modulo (cd_modulo));
-- ------------------------------

-- Tabela de Alunos

CREATE TABLE IF NOT EXISTS tb_aluno(
  cd_rmAluno INT auto_increment, -- Chave Primaria
  nm_aluno VARCHAR(150) NOT NULL,
  nr_cpf CHAR(11) NOT NULL,
  ds_statusALuno VARCHAR(45) NOT NULL,
  FK_cd_grupoSala INT NOT NULL, -- Chave Estrangeira referente a tabela de Modulo
  
PRIMARY KEY (cd_rmAluno),
FOREIGN KEY (FK_cd_grupoSala) REFERENCES tb_grupoSala (cd_grupoSala));
-- ------------------------------

-- Tabela entre Usuario e Cronograma

CREATE TABLE IF NOT EXISTS tb_usuarioCronograma(
  cd_usuarioCronograma INT auto_increment, -- Chave Primaria
  FK_cd_rmUsuario INT NOT NULL, -- Chave Estrangeira referente a Tabela de Usuario
  FK_cd_cronograma INT NOT NULL, -- Chave Estrangeira referente a Tabela de Cronograma
  
PRIMARY KEY (cd_usuarioCronograma),
FOREIGN KEY (FK_cd_rmUsuario) REFERENCES tb_usuario (cd_rmUsuario),
FOREIGN KEY (FK_cd_cronograma) REFERENCES tb_cronograma (cd_cronograma));
-- ------------------------------

-- Tabela entre Componente Curricular, Campo de Estagio e Cronograma

CREATE TABLE IF NOT EXISTS tb_componenteCampoEstagioCronograma(
  cd_componenteCampoEstagioCronograma INT auto_increment, -- Chave Primaria
  FK_cd_componente INT NOT NULL, -- Chave Estrangeira referente a Tabela de Componentes de Estagio
  FK_cd_campoEstagio INT NOT NULL, -- Chave Estrangeira referente a Tabela de Campo de Estagio
  FK_cd_cronograma INT NOT NULL, -- Chave Estrangeira referente a Tabela de Cronograma
  
PRIMARY KEY (cd_componenteCampoEstagioCronograma),
FOREIGN KEY (FK_cd_componente) REFERENCES tb_componenteCurricular (cd_componente),
FOREIGN KEY (FK_cd_campoEstagio) REFERENCES tb_campoEstagio (cd_campoEstagio),
FOREIGN KEY (FK_cd_cronograma) REFERENCES tb_cronograma (cd_cronograma));




  
  