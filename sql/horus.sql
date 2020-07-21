CREATE DATABASE IF NOT EXISTS horus DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE horus;
CREATE TABLE IF NOT EXISTS tb_aluno (
  cd_rmAluno int(11) NOT NULL,
  nm_aluno varchar(150) NOT NULL,
  nr_cpf char(11) NOT NULL,
  ds_statusALuno varchar(45) NOT NULL,
  FK_cd_grupoSala int(11) DEFAULT NULL,
  FK_cd_modulo int(11) NOT NULL,
  PRIMARY KEY (cd_rmAluno),
  KEY FK_cd_modulo (FK_cd_modulo),
  KEY FK_cd_grupoSala (FK_cd_grupoSala)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS tb_campoestagio (
  cd_campoEstagio int(11) NOT NULL AUTO_INCREMENT,
  nm_campoEstagio varchar(100) NOT NULL,
  sg_campoEstagio varchar(45) DEFAULT NULL,
  ds_enderecoEstagio char(8) DEFAULT NULL,
  ds_statusCampoEstagio varchar(45) NOT NULL,
  PRIMARY KEY (cd_campoEstagio)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;


CREATE TABLE IF NOT EXISTS tb_componentecampoestagio (
  cd_componentecampoestagio int(11) NOT NULL AUTO_INCREMENT,
  FK_cd_componente int(11) DEFAULT NULL,
  FK_cd_campoestagio int(11) DEFAULT NULL,
  PRIMARY KEY (cd_componentecampoestagio),
  KEY FK_cd_componente (FK_cd_componente),
  KEY FK_cd_campoestagio (FK_cd_campoestagio)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS tb_componentecampoestagioprofessor (
  cd_componenteCampoEstagioProfessor int(11) NOT NULL AUTO_INCREMENT,
  FK_cd_componentecampoestagio int(11) DEFAULT NULL,
  FK_cd_professor int(11) DEFAULT NULL,
  PRIMARY KEY (cd_componenteCampoEstagioProfessor),
  KEY FK_cd_componentecampoestagio (FK_cd_componentecampoestagio),
  KEY FK_cd_professor (FK_cd_professor)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS tb_componentecampoestagioprofessor_modulo (
  cd_componenteCampoEstagioProfessor_Modulo int(11) NOT NULL AUTO_INCREMENT,
  FK_cd_componenteCampoEstagioProfessor int(11) NOT NULL,
  FK_cd_modulo int(11) NOT NULL,
  PRIMARY KEY (cd_componenteCampoEstagioProfessor_Modulo),
  KEY FK_cd_componenteCampoEstagioProfessor (FK_cd_componenteCampoEstagioProfessor),
  KEY FK_cd_modulo (FK_cd_modulo)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
CREATE TABLE IF NOT EXISTS tb_componentecurricular (
  cd_componente int(11) NOT NULL AUTO_INCREMENT,
  nm_componente varchar(100) NOT NULL,
  ds_duracaoComponente int(11) NOT NULL,
  ds_statusComponente varchar(45) NOT NULL,
  ds_restricaoModulo char(1) NOT NULL,
  PRIMARY KEY (cd_componente)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS tb_cronograma (
  cd_cronograma int(11) NOT NULL AUTO_INCREMENT,
  ds_diretorioArquivo varchar(200) DEFAULT NULL,
  PRIMARY KEY (cd_cronograma)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS tb_datavalidacronograma (
  cd_dataValida int(11) NOT NULL AUTO_INCREMENT,
  dt_inicioData datetime NOT NULL,
  dt_fimData datetime NOT NULL,
  ds_corBloco varchar(20) NOT NULL,
  FK_cd_componentecampoestagioprofessor_modulo int(11) NOT NULL,
  FK_cd_cronograma int(11) NOT NULL,
  FK_cd_grupoSala int(11) NOT NULL,
  PRIMARY KEY (cd_dataValida),
  KEY FK_cd_componentecampoestagioprofessor_modulo (FK_cd_componentecampoestagioprofessor_modulo),
  KEY FK_cd_cronograma (FK_cd_cronograma),
  KEY FK_cd_grupoSala (FK_cd_grupoSala)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS tb_excessaocronograma (
  cd_excessao int(11) NOT NULL AUTO_INCREMENT,
  dt_diaExcessao datetime NOT NULL,
  dt_diaExcessaoFim datetime NOT NULL,
  FK_cd_cronograma int(11) NOT NULL,
  PRIMARY KEY (cd_excessao),
  KEY FK_cd_cronograma (FK_cd_cronograma)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS tb_gruposala (
  cd_grupoSala int(11) NOT NULL AUTO_INCREMENT,
  sg_grupoSala varchar(45) NOT NULL,
  FK_cd_modulo int(11) NOT NULL,
  nm_grupoSala varchar(50) NOT NULL,
  ds_statusGrupo varchar(50) NOT NULL,
  PRIMARY KEY (cd_grupoSala),
  KEY FK_cd_modulo (FK_cd_modulo)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS tb_modulo (
  cd_modulo int(11) NOT NULL AUTO_INCREMENT,
  sg_modulo varchar(45) NOT NULL,
  FK_cd_cronograma int(11) DEFAULT NULL,
  ds_statusModulo varchar(50) NOT NULL,
  ds_numeroModulo char(1) NOT NULL,
  dt_ano varchar(4) NOT NULL,
  ds_semestre char(1) NOT NULL,
  PRIMARY KEY (cd_modulo),
  KEY FK_cd_cronograma (FK_cd_cronograma)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS tb_nivelacesso (
  cd_acesso int(11) NOT NULL AUTO_INCREMENT,
  nm_nivel varchar(100) NOT NULL,
  PRIMARY KEY (cd_acesso)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

 /Esse INSERT é essencial para o Banco de Dados, não excluir/
INSERT INTO tb_nivelacesso (cd_acesso, nm_nivel) VALUES
(1, 'Coordenador'),
(2, 'Professor');
/Esse INSERT é essencial para o Banco de Dados, não excluir/

CREATE TABLE IF NOT EXISTS tb_usuario (
  cd_rmUsuario int(11) NOT NULL,
  nm_usuario varchar(200) NOT NULL,
  nr_cpf char(11) NOT NULL,
  ds_statusUsuario varchar(45) NOT NULL,
  FK_cd_acesso int(11) NOT NULL,
  ds_emailUsuario varchar(250) NOT NULL,
  ds_senha varchar(100) NOT NULL,
  PRIMARY KEY (cd_rmUsuario),
  KEY FK_cd_acesso (FK_cd_acesso)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/Esse INSERT é essencial para o Banco de Dados, não excluir/
INSERT INTO tb_usuario (cd_rmUsuario, nm_usuario, nr_cpf, ds_statusUsuario, FK_cd_acesso, ds_emailUsuario, ds_senha) VALUES
(1111, 'Administrador', '45124715022', 'Ativado', 1, 'admin@admin', MD5('etec123'));
/Esse INSERT é essencial para o Banco de Dados, não excluir/

ALTER TABLE tb_aluno
  ADD CONSTRAINT tb_aluno_ibfk_1 FOREIGN KEY (FK_cd_grupoSala) REFERENCES tb_gruposala (cd_grupoSala),
  ADD CONSTRAINT tb_aluno_ibfk_2 FOREIGN KEY (FK_cd_modulo) REFERENCES tb_modulo (cd_modulo);

ALTER TABLE tb_componentecampoestagio
  ADD CONSTRAINT tb_componentecampoestagio_ibfk_1 FOREIGN KEY (FK_cd_componente) REFERENCES tb_componentecurricular (cd_componente),
  ADD CONSTRAINT tb_componentecampoestagio_ibfk_2 FOREIGN KEY (FK_cd_campoestagio) REFERENCES tb_campoestagio (cd_campoEstagio);

ALTER TABLE tb_componentecampoestagioprofessor
  ADD CONSTRAINT tb_componentecampoestagioprofessor_ibfk_1 FOREIGN KEY (FK_cd_componentecampoestagio) REFERENCES tb_componentecampoestagio (cd_componentecampoestagio),
  ADD CONSTRAINT tb_componentecampoestagioprofessor_ibfk_2 FOREIGN KEY (FK_cd_professor) REFERENCES tb_usuario (cd_rmUsuario);


ALTER TABLE tb_componentecampoestagioprofessor_modulo
  ADD CONSTRAINT tb_componentecampoestagioprofessor_modulo_ibfk_1 FOREIGN KEY (FK_cd_componenteCampoEstagioProfessor) REFERENCES tb_componentecampoestagioprofessor (cd_componenteCampoEstagioProfessor),
  ADD CONSTRAINT tb_componentecampoestagioprofessor_modulo_ibfk_2 FOREIGN KEY (FK_cd_modulo) REFERENCES tb_modulo (cd_modulo);

ALTER TABLE tb_datavalidacronograma
  ADD CONSTRAINT tb_datavalidacronograma_ibfk_1 FOREIGN KEY (FK_cd_componentecampoestagioprofessor_modulo) REFERENCES tb_componentecampoestagioprofessor_modulo (cd_componenteCampoEstagioProfessor_Modulo),
  ADD CONSTRAINT tb_datavalidacronograma_ibfk_2 FOREIGN KEY (FK_cd_cronograma) REFERENCES tb_cronograma (cd_cronograma),
  ADD CONSTRAINT tb_datavalidacronograma_ibfk_3 FOREIGN KEY (FK_cd_grupoSala) REFERENCES tb_gruposala (cd_grupoSala);

ALTER TABLE tb_excessaocronograma
  ADD CONSTRAINT tb_excessaocronograma_ibfk_1 FOREIGN KEY (FK_cd_cronograma) REFERENCES tb_cronograma (cd_cronograma);

ALTER TABLE tb_gruposala
  ADD CONSTRAINT tb_gruposala_ibfk_1 FOREIGN KEY (FK_cd_modulo) REFERENCES tb_modulo (cd_modulo);

ALTER TABLE tb_modulo
  ADD CONSTRAINT tb_modulo_ibfk_1 FOREIGN KEY (FK_cd_cronograma) REFERENCES tb_cronograma (cd_cronograma);
ALTER TABLE tb_usuario
  ADD CONSTRAINT tb_usuario_ibfk_1 FOREIGN KEY (FK_cd_acesso) REFERENCES tb_nivelacesso (cd_acesso);
COMMIT;
