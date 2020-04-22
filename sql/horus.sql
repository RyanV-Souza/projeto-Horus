-- phpMyAdmin SQL Dump
-- version 4.7.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 22-Abr-2020 às 15:08
-- Versão do servidor: 5.6.34
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `horus`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_aluno`
--

CREATE TABLE `tb_aluno` (
  `cd_rmAluno` int(11) NOT NULL,
  `nm_aluno` varchar(150) NOT NULL,
  `nr_cpf` char(11) NOT NULL,
  `ds_statusALuno` varchar(45) NOT NULL,
  `FK_cd_grupoSala` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_campoestagio`
--

CREATE TABLE `tb_campoestagio` (
  `cd_campoEstagio` int(11) NOT NULL,
  `nm_campoEstagio` varchar(100) NOT NULL,
  `sg_campoEstagio` varchar(45) DEFAULT NULL,
  `ds_enderecoEstagio` char(8) DEFAULT NULL,
  `ds_statusCampoEstagio` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_componentecampoestagiocronograma`
--

CREATE TABLE `tb_componentecampoestagiocronograma` (
  `cd_componenteCampoEstagioCronograma` int(11) NOT NULL,
  `FK_cd_componente` int(11) NOT NULL,
  `FK_cd_campoEstagio` int(11) NOT NULL,
  `FK_cd_cronograma` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_componentecurricular`
--

CREATE TABLE `tb_componentecurricular` (
  `cd_componente` int(11) NOT NULL,
  `nm_componente` varchar(100) NOT NULL,
  `ds_componente` longtext NOT NULL,
  `ds_duracaoComponente` int(11) NOT NULL,
  `ds_statusComponente` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_cronograma`
--

CREATE TABLE `tb_cronograma` (
  `cd_cronograma` int(11) NOT NULL,
  `ds_diretorioArquivo` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_excessaocronograma`
--

CREATE TABLE `tb_excessaocronograma` (
  `cd_excessao` int(11) NOT NULL,
  `dt_diaExcessao` date NOT NULL,
  `ds_motivoExcessao` varchar(200) NOT NULL,
  `ds_statusExecessao` varchar(45) NOT NULL,
  `FK_cd_cronograma` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_gruposala`
--

CREATE TABLE `tb_gruposala` (
  `cd_grupoSala` int(11) NOT NULL,
  `sg_grupoSala` varchar(45) NOT NULL,
  `FK_cd_modulo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_modulo`
--

CREATE TABLE `tb_modulo` (
  `cd_modulo` int(11) NOT NULL,
  `dt_inicial` date NOT NULL,
  `dt_final` date NOT NULL,
  `sg_modulo` varchar(45) NOT NULL,
  `FK_cd_cronograma` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_nivelacesso`
--

CREATE TABLE `tb_nivelacesso` (
  `cd_acesso` int(11) NOT NULL,
  `nm_nivel` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_nivelacesso`
--

INSERT INTO `tb_nivelacesso` (`cd_acesso`, `nm_nivel`) VALUES
(1, 'Coordenador'),
(2, 'Professor');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_relatorio`
--

CREATE TABLE `tb_relatorio` (
  `cd_relatorio` int(11) NOT NULL,
  `ds_relatorio` longtext NOT NULL,
  `dt_relatorio` char(11) NOT NULL,
  `FK_cd_rmUsuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_usuario`
--

CREATE TABLE `tb_usuario` (
  `cd_rmUsuario` int(11) NOT NULL,
  `nm_usuario` varchar(200) NOT NULL,
  `nr_cpf` char(11) NOT NULL,
  `dt_nascimento` date NOT NULL,
  `ds_statusUsuario` varchar(45) NOT NULL,
  `FK_cd_acesso` int(11) NOT NULL,
  `ds_emailUsuario` varchar(250) NOT NULL,
  `nr_telefoneUsuario` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_usuario`
--

INSERT INTO `tb_usuario` (`cd_rmUsuario`, `nm_usuario`, `nr_cpf`, `dt_nascimento`, `ds_statusUsuario`, `FK_cd_acesso`, `ds_emailUsuario`, `nr_telefoneUsuario`) VALUES
(12, 'Ryan', '111', '0000-00-00', 'Ativado', 1, 'teste@teste', '111'),
(1111, 'Ryan', '111', '0000-00-00', 'Ativado', 1, 'teste@teste', '111');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_usuariocronograma`
--

CREATE TABLE `tb_usuariocronograma` (
  `cd_usuarioCronograma` int(11) NOT NULL,
  `FK_cd_rmUsuario` int(11) NOT NULL,
  `FK_cd_cronograma` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_aluno`
--
ALTER TABLE `tb_aluno`
  ADD PRIMARY KEY (`cd_rmAluno`),
  ADD KEY `FK_cd_grupoSala` (`FK_cd_grupoSala`);

--
-- Indexes for table `tb_campoestagio`
--
ALTER TABLE `tb_campoestagio`
  ADD PRIMARY KEY (`cd_campoEstagio`);

--
-- Indexes for table `tb_componentecampoestagiocronograma`
--
ALTER TABLE `tb_componentecampoestagiocronograma`
  ADD PRIMARY KEY (`cd_componenteCampoEstagioCronograma`),
  ADD KEY `FK_cd_componente` (`FK_cd_componente`),
  ADD KEY `FK_cd_campoEstagio` (`FK_cd_campoEstagio`),
  ADD KEY `FK_cd_cronograma` (`FK_cd_cronograma`);

--
-- Indexes for table `tb_componentecurricular`
--
ALTER TABLE `tb_componentecurricular`
  ADD PRIMARY KEY (`cd_componente`);

--
-- Indexes for table `tb_cronograma`
--
ALTER TABLE `tb_cronograma`
  ADD PRIMARY KEY (`cd_cronograma`);

--
-- Indexes for table `tb_excessaocronograma`
--
ALTER TABLE `tb_excessaocronograma`
  ADD PRIMARY KEY (`cd_excessao`),
  ADD KEY `FK_cd_cronograma` (`FK_cd_cronograma`);

--
-- Indexes for table `tb_gruposala`
--
ALTER TABLE `tb_gruposala`
  ADD PRIMARY KEY (`cd_grupoSala`),
  ADD KEY `FK_cd_modulo` (`FK_cd_modulo`);

--
-- Indexes for table `tb_modulo`
--
ALTER TABLE `tb_modulo`
  ADD PRIMARY KEY (`cd_modulo`),
  ADD KEY `FK_cd_cronograma` (`FK_cd_cronograma`);

--
-- Indexes for table `tb_nivelacesso`
--
ALTER TABLE `tb_nivelacesso`
  ADD PRIMARY KEY (`cd_acesso`);

--
-- Indexes for table `tb_relatorio`
--
ALTER TABLE `tb_relatorio`
  ADD PRIMARY KEY (`cd_relatorio`),
  ADD KEY `FK_cd_rmUsuario` (`FK_cd_rmUsuario`);

--
-- Indexes for table `tb_usuario`
--
ALTER TABLE `tb_usuario`
  ADD PRIMARY KEY (`cd_rmUsuario`),
  ADD KEY `FK_cd_acesso` (`FK_cd_acesso`);

--
-- Indexes for table `tb_usuariocronograma`
--
ALTER TABLE `tb_usuariocronograma`
  ADD PRIMARY KEY (`cd_usuarioCronograma`),
  ADD KEY `FK_cd_rmUsuario` (`FK_cd_rmUsuario`),
  ADD KEY `FK_cd_cronograma` (`FK_cd_cronograma`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_campoestagio`
--
ALTER TABLE `tb_campoestagio`
  MODIFY `cd_campoEstagio` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_componentecampoestagiocronograma`
--
ALTER TABLE `tb_componentecampoestagiocronograma`
  MODIFY `cd_componenteCampoEstagioCronograma` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_componentecurricular`
--
ALTER TABLE `tb_componentecurricular`
  MODIFY `cd_componente` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_cronograma`
--
ALTER TABLE `tb_cronograma`
  MODIFY `cd_cronograma` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_excessaocronograma`
--
ALTER TABLE `tb_excessaocronograma`
  MODIFY `cd_excessao` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_gruposala`
--
ALTER TABLE `tb_gruposala`
  MODIFY `cd_grupoSala` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_modulo`
--
ALTER TABLE `tb_modulo`
  MODIFY `cd_modulo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_nivelacesso`
--
ALTER TABLE `tb_nivelacesso`
  MODIFY `cd_acesso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_relatorio`
--
ALTER TABLE `tb_relatorio`
  MODIFY `cd_relatorio` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_usuariocronograma`
--
ALTER TABLE `tb_usuariocronograma`
  MODIFY `cd_usuarioCronograma` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `tb_aluno`
--
ALTER TABLE `tb_aluno`
  ADD CONSTRAINT `tb_aluno_ibfk_1` FOREIGN KEY (`FK_cd_grupoSala`) REFERENCES `tb_gruposala` (`cd_grupoSala`);

--
-- Limitadores para a tabela `tb_componentecampoestagiocronograma`
--
ALTER TABLE `tb_componentecampoestagiocronograma`
  ADD CONSTRAINT `tb_componentecampoestagiocronograma_ibfk_1` FOREIGN KEY (`FK_cd_componente`) REFERENCES `tb_componentecurricular` (`cd_componente`),
  ADD CONSTRAINT `tb_componentecampoestagiocronograma_ibfk_2` FOREIGN KEY (`FK_cd_campoEstagio`) REFERENCES `tb_campoestagio` (`cd_campoEstagio`),
  ADD CONSTRAINT `tb_componentecampoestagiocronograma_ibfk_3` FOREIGN KEY (`FK_cd_cronograma`) REFERENCES `tb_cronograma` (`cd_cronograma`);

--
-- Limitadores para a tabela `tb_excessaocronograma`
--
ALTER TABLE `tb_excessaocronograma`
  ADD CONSTRAINT `tb_excessaocronograma_ibfk_1` FOREIGN KEY (`FK_cd_cronograma`) REFERENCES `tb_cronograma` (`cd_cronograma`);

--
-- Limitadores para a tabela `tb_gruposala`
--
ALTER TABLE `tb_gruposala`
  ADD CONSTRAINT `tb_gruposala_ibfk_1` FOREIGN KEY (`FK_cd_modulo`) REFERENCES `tb_modulo` (`cd_modulo`);

--
-- Limitadores para a tabela `tb_modulo`
--
ALTER TABLE `tb_modulo`
  ADD CONSTRAINT `tb_modulo_ibfk_1` FOREIGN KEY (`FK_cd_cronograma`) REFERENCES `tb_cronograma` (`cd_cronograma`);

--
-- Limitadores para a tabela `tb_relatorio`
--
ALTER TABLE `tb_relatorio`
  ADD CONSTRAINT `tb_relatorio_ibfk_1` FOREIGN KEY (`FK_cd_rmUsuario`) REFERENCES `tb_usuario` (`cd_rmUsuario`);

--
-- Limitadores para a tabela `tb_usuario`
--
ALTER TABLE `tb_usuario`
  ADD CONSTRAINT `tb_usuario_ibfk_1` FOREIGN KEY (`FK_cd_acesso`) REFERENCES `tb_nivelacesso` (`cd_acesso`);

--
-- Limitadores para a tabela `tb_usuariocronograma`
--
ALTER TABLE `tb_usuariocronograma`
  ADD CONSTRAINT `tb_usuariocronograma_ibfk_1` FOREIGN KEY (`FK_cd_rmUsuario`) REFERENCES `tb_usuario` (`cd_rmUsuario`),
  ADD CONSTRAINT `tb_usuariocronograma_ibfk_2` FOREIGN KEY (`FK_cd_cronograma`) REFERENCES `tb_cronograma` (`cd_cronograma`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
