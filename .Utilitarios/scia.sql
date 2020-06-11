-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 16-Mar-2020 às 19:48
-- Versão do servidor: 5.7.24
-- versão do PHP: 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `scia`
--
CREATE DATABASE IF NOT EXISTS `scia` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `scia`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `sc_aluno`
--

DROP TABLE IF EXISTS `sc_aluno`;
CREATE TABLE IF NOT EXISTS `sc_aluno` (
  `Al_cod` int(11) NOT NULL AUTO_INCREMENT,
  `Al_codUnidade` int(11) NOT NULL,
  `Al_nome` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `Al_sobrenome` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `Al_nascimento` date NOT NULL,
  `Al_CPF` char(14) COLLATE utf8_bin DEFAULT NULL,
  `Al_codResponsavel` int(11) DEFAULT NULL,
  PRIMARY KEY (`Al_cod`),
  UNIQUE KEY `Al_CPF_UNIQUE` (`Al_CPF`),
  KEY `fk_aluno_unidade_idx` (`Al_codUnidade`),
  KEY `fk_aluno_responsavel_idx` (`Al_codResponsavel`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Esta tabela armazenará todos os dados dos alunos registrados na unidade, especificando seu responsável e sua unidade pertencente.';

--
-- Extraindo dados da tabela `sc_aluno`
--

INSERT INTO `sc_aluno` (`Al_cod`, `Al_codUnidade`, `Al_nome`, `Al_sobrenome`, `Al_nascimento`, `Al_CPF`, `Al_codResponsavel`) VALUES
(1, 2, 'undefined', 'MENDES', '2002-09-30', '654.177.453-67', 8),
(2, 1, 'lastenia', 'LIMA', '2003-11-30', '082.392.577-39', 6),
(3, 1, 'licilda', 'LOPES', '2002-09-30', '357.273.202-67', 8),
(4, 2, 'lucineia', 'MENDES', '2003-09-30', '515.764.862-65', 6),
(5, 2, 'undefined', 'MARTINS', '2001-03-30', '529.149.750-58', 7);

-- --------------------------------------------------------

--
-- Estrutura da tabela `sc_bairro`
--

DROP TABLE IF EXISTS `sc_bairro`;
CREATE TABLE IF NOT EXISTS `sc_bairro` (
  `Ba_cod` int(11) NOT NULL AUTO_INCREMENT,
  `Ba_nome` varchar(60) COLLATE utf8_bin DEFAULT NULL,
  `Ba_codCidade` int(11) NOT NULL,
  PRIMARY KEY (`Ba_cod`),
  KEY `fk_bairro_cidade_idx` (`Ba_codCidade`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Esta tabela acumulará os dados dos bairros relacionando com estado.';

--
-- Extraindo dados da tabela `sc_bairro`
--

INSERT INTO `sc_bairro` (`Ba_cod`, `Ba_nome`, `Ba_codCidade`) VALUES
(1, 'Arujá', 1),
(2, 'Aviação', 1),
(3, 'BarroPreto', 1),
(4, 'BomJesus', 1),
(5, 'BonecadoIguaçu', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `sc_cidade`
--

DROP TABLE IF EXISTS `sc_cidade`;
CREATE TABLE IF NOT EXISTS `sc_cidade` (
  `Ci_cod` int(11) NOT NULL AUTO_INCREMENT,
  `Ci_codEstado` int(11) DEFAULT NULL,
  `Ci_nome` varchar(60) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`Ci_cod`),
  KEY `fk_cidade_estado_idx` (`Ci_codEstado`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Esta tabela armazenará os dados das cidades relacionando-as com seu respectivo estado';

--
-- Extraindo dados da tabela `sc_cidade`
--

INSERT INTO `sc_cidade` (`Ci_cod`, `Ci_codEstado`, `Ci_nome`) VALUES
(1, 1, 'São josé dos Pinais');

-- --------------------------------------------------------

--
-- Estrutura da tabela `sc_contato`
--

DROP TABLE IF EXISTS `sc_contato`;
CREATE TABLE IF NOT EXISTS `sc_contato` (
  `Co_cod` int(11) NOT NULL AUTO_INCREMENT,
  `Co_descricao` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `Co_codResponsavel` int(11) NOT NULL,
  `Co_codtpContato` int(11) NOT NULL,
  PRIMARY KEY (`Co_cod`),
  KEY `fk_contato_tipocontato_idx` (`Co_codtpContato`),
  KEY `fk_contato_responsavel_idx` (`Co_codResponsavel`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Esta tabela guardara os dados de contato dos responsável.';

--
-- Extraindo dados da tabela `sc_contato`
--

INSERT INTO `sc_contato` (`Co_cod`, `Co_descricao`, `Co_codResponsavel`, `Co_codtpContato`) VALUES
(2, '(41) 1668-8178', 7, 2),
(3, '(41) 5617-4553', 8, 2),
(4, '(41) 7868-5178', 7, 2),
(5, '(41) 8321-3717', 6, 2),
(6, '(41) 6443-2227', 6, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `sc_estado`
--

DROP TABLE IF EXISTS `sc_estado`;
CREATE TABLE IF NOT EXISTS `sc_estado` (
  `Es_cod` int(11) NOT NULL AUTO_INCREMENT,
  `Es_UF` char(2) COLLATE utf8_bin DEFAULT NULL,
  `Es_nome` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`Es_cod`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Esta tabela sera pouco usada mas seu intuito é relacionar endereços cidades, estados e bairros.';

--
-- Extraindo dados da tabela `sc_estado`
--

INSERT INTO `sc_estado` (`Es_cod`, `Es_UF`, `Es_nome`) VALUES
(1, 'PR', 'PARANA');

-- --------------------------------------------------------

--
-- Estrutura da tabela `sc_funcionario`
--

DROP TABLE IF EXISTS `sc_funcionario`;
CREATE TABLE IF NOT EXISTS `sc_funcionario` (
  `Fu_cod` int(11) NOT NULL AUTO_INCREMENT,
  `Fu_nome` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `Fu_CPF` char(14) COLLATE utf8_bin DEFAULT NULL,
  `Fu_matricula` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `Fu_codUnidade` int(11) DEFAULT NULL,
  `Fu_codtpFuncionario` int(11) NOT NULL,
  PRIMARY KEY (`Fu_cod`),
  UNIQUE KEY `Fun_CPF_UNIQUE` (`Fu_CPF`),
  KEY `fk_funcionario_tipo_idx` (`Fu_codtpFuncionario`),
  KEY `fk_funcionario_unidade_idx` (`Fu_codUnidade`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Esta tabela armazenará os dados dos funcionarios, especificando qual a sua unidade e qual seu tipo(cordenação, monitor, ect..)';

--
-- Extraindo dados da tabela `sc_funcionario`
--

INSERT INTO `sc_funcionario` (`Fu_cod`, `Fu_nome`, `Fu_CPF`, `Fu_matricula`, `Fu_codUnidade`, `Fu_codtpFuncionario`) VALUES
(1, 'horacio', '665.773.705-08', '2432', 2, 3),
(2, 'horishi', '656.485.917-13', '4337', 2, 3),
(3, 'hortensia', '855.134.212-67', '4227', 1, 2),
(4, 'hosana', '485.854.708-60', '2228', 2, 3),
(5, 'hudson', '082.312.133-09', '1434', 1, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `sc_ocorrencia`
--

DROP TABLE IF EXISTS `sc_ocorrencia`;
CREATE TABLE IF NOT EXISTS `sc_ocorrencia` (
  `Oc_cod` int(11) NOT NULL AUTO_INCREMENT,
  `Oc_codFuncionario` int(11) NOT NULL,
  `Oc_codAluno` int(11) NOT NULL,
  `Oc_codtpOcorrencia` int(11) NOT NULL,
  `Oc_observacao` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `Oc_data` date NOT NULL,
  PRIMARY KEY (`Oc_cod`),
  KEY `fk_occoorencia_aluno_idx` (`Oc_codAluno`),
  KEY `forein_tipoocorrencia_ocorrencia_idx` (`Oc_codtpOcorrencia`),
  KEY `fk_ocorrencia_funcionario_idx` (`Oc_codFuncionario`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Esta tabela irá armazenar os dados das ocorrencias registradas pelo funcionario.';

--
-- Extraindo dados da tabela `sc_ocorrencia`
--

INSERT INTO `sc_ocorrencia` (`Oc_cod`, `Oc_codFuncionario`, `Oc_codAluno`, `Oc_codtpOcorrencia`, `Oc_observacao`, `Oc_data`) VALUES
(1, 2, 4, 3, 'Aluno fora de aula no horário da tarde', '2020-03-16'),
(2, 4, 4, 1, 'Aluno Liberado as 17:00', '2020-03-15'),
(3, 3, 2, 2, 'Aluno chegou 10 min depois do intervalo', '2020-03-03'),
(4, 2, 4, 3, 'Aluno fora de sala na aula de programação', '2020-03-02');

-- --------------------------------------------------------

--
-- Estrutura da tabela `sc_responsavel`
--

DROP TABLE IF EXISTS `sc_responsavel`;
CREATE TABLE IF NOT EXISTS `sc_responsavel` (
  `Re_cod` int(11) NOT NULL AUTO_INCREMENT,
  `Re_RG` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `Re_CPF` char(14) COLLATE utf8_bin DEFAULT NULL,
  `Re_nascimento` date NOT NULL,
  `Re_nome` varchar(40) COLLATE utf8_bin NOT NULL,
  `Re_logradouro` varchar(120) COLLATE utf8_bin DEFAULT NULL,
  `Re_codtpLogradouro` int(11) NOT NULL,
  `Re_codBairro` int(11) NOT NULL,
  PRIMARY KEY (`Re_cod`),
  UNIQUE KEY `Res_CPF_UNIQUE` (`Re_CPF`),
  KEY `fk_responsavel_tipolog_idx` (`Re_codtpLogradouro`),
  KEY `fk_responsavel_bairro_idx` (`Re_codBairro`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Esta tabela será usada para armazenar os dados do responsavel no sistema';

--
-- Extraindo dados da tabela `sc_responsavel`
--

INSERT INTO `sc_responsavel` (`Re_cod`, `Re_RG`, `Re_CPF`, `Re_nascimento`, `Re_nome`, `Re_logradouro`, `Re_codtpLogradouro`, `Re_codBairro`) VALUES
(5, '1308116 - 4', '023.153.731-07', '1992-01-30', 'heber', ' ', 1, 1),
(6, '1170313 - 4', '894.476.558-82', '1983-03-30', 'hector', ' ', 1, 2),
(7, '5114180 - 7', '844.482.441-05', '1987-05-30', 'hedila', ' ', 1, 3),
(8, '19241125 - 3', '036.702.136-60', '1968-07-30', 'heidi', ' ', 1, 4),
(9, '8191156 - 5', '714.515.943-05', '1985-07-30', 'heitor', ' ', 1, 5);

-- --------------------------------------------------------

--
-- Estrutura da tabela `sc_tp_contato`
--

DROP TABLE IF EXISTS `sc_tp_contato`;
CREATE TABLE IF NOT EXISTS `sc_tp_contato` (
  `TC_cod` int(11) NOT NULL AUTO_INCREMENT,
  `TC_nome` varchar(40) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`TC_cod`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Esta tabela cumulará os dados dos tipos de contatos possiveis.';

--
-- Extraindo dados da tabela `sc_tp_contato`
--

INSERT INTO `sc_tp_contato` (`TC_cod`, `TC_nome`) VALUES
(1, 'EMAIL'),
(2, 'TELEFONE');

-- --------------------------------------------------------

--
-- Estrutura da tabela `sc_tp_funcionario`
--

DROP TABLE IF EXISTS `sc_tp_funcionario`;
CREATE TABLE IF NOT EXISTS `sc_tp_funcionario` (
  `TF_Cod` int(11) NOT NULL AUTO_INCREMENT,
  `TF_nome` varchar(40) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`TF_Cod`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Esta tabela guarda os tipos de funcionários que podem ser registrados no sistema.';

--
-- Extraindo dados da tabela `sc_tp_funcionario`
--

INSERT INTO `sc_tp_funcionario` (`TF_Cod`, `TF_nome`) VALUES
(1, 'Coordenador'),
(2, 'Monitor'),
(3, 'Gerencia'),
(4, 'Comercial');

-- --------------------------------------------------------

--
-- Estrutura da tabela `sc_tp_logradouro`
--

DROP TABLE IF EXISTS `sc_tp_logradouro`;
CREATE TABLE IF NOT EXISTS `sc_tp_logradouro` (
  `TL_cod` int(11) NOT NULL AUTO_INCREMENT,
  `TL_nome` varchar(40) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`TL_cod`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Esta tabela cumulará todos os tipos de logradouros possiveis.';

--
-- Extraindo dados da tabela `sc_tp_logradouro`
--

INSERT INTO `sc_tp_logradouro` (`TL_cod`, `TL_nome`) VALUES
(1, 'Rua'),
(2, 'Viela');

-- --------------------------------------------------------

--
-- Estrutura da tabela `sc_tp_ocorrencia`
--

DROP TABLE IF EXISTS `sc_tp_ocorrencia`;
CREATE TABLE IF NOT EXISTS `sc_tp_ocorrencia` (
  `TO_cod` int(11) NOT NULL AUTO_INCREMENT,
  `TO_nome` varchar(40) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`TO_cod`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Esta tabela cumulará os tipos possiveis de ocorrencia.';

--
-- Extraindo dados da tabela `sc_tp_ocorrencia`
--

INSERT INTO `sc_tp_ocorrencia` (`TO_cod`, `TO_nome`) VALUES
(1, 'saida antecipada'),
(2, 'Chegada Tardia'),
(3, 'Fora de sala ');

-- --------------------------------------------------------

--
-- Estrutura da tabela `sc_tp_usuario`
--

DROP TABLE IF EXISTS `sc_tp_usuario`;
CREATE TABLE IF NOT EXISTS `sc_tp_usuario` (
  `TU_cod` int(11) NOT NULL AUTO_INCREMENT,
  `TU_nome` varchar(40) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`TU_cod`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='esta tabela guarda todos os tipos de usuarios que podem ser registrados.';

--
-- Extraindo dados da tabela `sc_tp_usuario`
--

INSERT INTO `sc_tp_usuario` (`TU_cod`, `TU_nome`) VALUES
(1, 'Coordenador'),
(2, 'Responsavel'),
(3, 'Orientador'),
(4, 'Monitor'),
(5, 'Comercial');

-- --------------------------------------------------------

--
-- Estrutura da tabela `sc_unidade`
--

DROP TABLE IF EXISTS `sc_unidade`;
CREATE TABLE IF NOT EXISTS `sc_unidade` (
  `Un_cod` int(11) NOT NULL AUTO_INCREMENT,
  `Un_nome` varchar(10) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`Un_cod`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Esta tabela guardará todos os dados da unidade, assim relacionando alunos e funcionários. ';

--
-- Extraindo dados da tabela `sc_unidade`
--

INSERT INTO `sc_unidade` (`Un_cod`, `Un_nome`) VALUES
(1, 'SESI'),
(2, 'SENAI'),
(3, 'AMBOS');

-- --------------------------------------------------------

--
-- Estrutura da tabela `sc_usuario`
--

DROP TABLE IF EXISTS `sc_usuario`;
CREATE TABLE IF NOT EXISTS `sc_usuario` (
  `Us_cod` int(11) NOT NULL AUTO_INCREMENT,
  `Us_login` char(14) COLLATE utf8_bin NOT NULL,
  `Us_senha` varchar(100) COLLATE utf8_bin,
  `Us_codtpUsuario` int(11) NOT NULL,
  `Us_modifiedat` date DEFAULT NULL,
  PRIMARY KEY (`Us_cod`),
  KEY `fk_usuario_tipousuario_idx` (`Us_codtpUsuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Esta tabela é utilizada para guardar usuarios do sistema, seja pai ou funcionário, asssim todos tendo um status e ultima modificação\n';

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `sc_aluno`
--
ALTER TABLE `sc_aluno`
  ADD CONSTRAINT `fk_aluno_responsavel` FOREIGN KEY (`Al_codResponsavel`) REFERENCES `sc_responsavel` (`Re_cod`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_aluno_unidade` FOREIGN KEY (`Al_codUnidade`) REFERENCES `sc_unidade` (`Un_cod`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `sc_bairro`
--
ALTER TABLE `sc_bairro`
  ADD CONSTRAINT `fk_bairro_cidade` FOREIGN KEY (`Ba_codCidade`) REFERENCES `sc_cidade` (`Ci_cod`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `sc_cidade`
--
ALTER TABLE `sc_cidade`
  ADD CONSTRAINT `fk_cidade_estado` FOREIGN KEY (`Ci_codEstado`) REFERENCES `sc_estado` (`Es_cod`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `sc_contato`
--
ALTER TABLE `sc_contato`
  ADD CONSTRAINT `fk_contato_responsavel` FOREIGN KEY (`Co_codResponsavel`) REFERENCES `sc_responsavel` (`Re_cod`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_contato_tipocontato` FOREIGN KEY (`Co_codtpContato`) REFERENCES `sc_tp_contato` (`TC_cod`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `sc_funcionario`
--
ALTER TABLE `sc_funcionario`
  ADD CONSTRAINT `fk_funcionario_tipo` FOREIGN KEY (`Fu_codtpFuncionario`) REFERENCES `sc_tp_funcionario` (`TF_Cod`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_funcionario_unidade` FOREIGN KEY (`Fu_codUnidade`) REFERENCES `sc_unidade` (`Un_cod`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `sc_ocorrencia`
--
ALTER TABLE `sc_ocorrencia`
  ADD CONSTRAINT `fk_ocorrencia_aluno` FOREIGN KEY (`Oc_codAluno`) REFERENCES `sc_aluno` (`Al_cod`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_ocorrencia_funcionario` FOREIGN KEY (`Oc_codFuncionario`) REFERENCES `sc_funcionario` (`Fu_cod`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_ocorrencia_tipoocoorencia` FOREIGN KEY (`Oc_codtpOcorrencia`) REFERENCES `sc_tp_ocorrencia` (`TO_cod`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `sc_responsavel`
--
ALTER TABLE `sc_responsavel`
  ADD CONSTRAINT `fk_responsavel_bairro` FOREIGN KEY (`Re_codBairro`) REFERENCES `sc_bairro` (`Ba_cod`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_responsavel_tipolog` FOREIGN KEY (`Re_codtpLogradouro`) REFERENCES `sc_tp_logradouro` (`TL_cod`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `sc_usuario`
--
ALTER TABLE `sc_usuario`
  ADD CONSTRAINT `fk_usuario_tipousuario` FOREIGN KEY (`Us_codtpUsuario`) REFERENCES `sc_tp_usuario` (`TU_cod`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
