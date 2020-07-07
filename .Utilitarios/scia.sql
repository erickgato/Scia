-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 07-Jul-2020 às 20:08
-- Versão do servidor: 10.4.13-MariaDB
-- versão do PHP: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `scia`
--
CREATE DATABASE IF NOT EXISTS `scia` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `scia`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `sc_aluno`
--

CREATE TABLE `sc_aluno` (
  `Al_cod` int(11) NOT NULL,
  `Al_codUnidade` int(11) NOT NULL,
  `Al_nome` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `Al_sobrenome` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `Al_nascimento` date NOT NULL,
  `Al_CPF` char(14) COLLATE utf8_bin DEFAULT NULL,
  `Al_codResponsavel` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Esta tabela armazenará todos os dados dos alunos registrados na unidade, especificando seu responsável e sua unidade pertencente.';

--
-- Extraindo dados da tabela `sc_aluno`
--

INSERT INTO `sc_aluno` (`Al_cod`, `Al_codUnidade`, `Al_nome`, `Al_sobrenome`, `Al_nascimento`, `Al_CPF`, `Al_codResponsavel`) VALUES
(65, 1, 'Marc', 'Neto', '2020-07-03', '031.967.993-21', 32);

-- --------------------------------------------------------

--
-- Estrutura da tabela `sc_bairro`
--

CREATE TABLE `sc_bairro` (
  `Ba_cod` int(11) NOT NULL,
  `Ba_nome` varchar(60) COLLATE utf8_bin DEFAULT NULL,
  `Ba_codCidade` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Esta tabela acumulará os dados dos bairros relacionando com estado.';

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

CREATE TABLE `sc_cidade` (
  `Ci_cod` int(11) NOT NULL,
  `Ci_codEstado` int(11) DEFAULT NULL,
  `Ci_nome` varchar(60) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Esta tabela armazenará os dados das cidades relacionando-as com seu respectivo estado';

--
-- Extraindo dados da tabela `sc_cidade`
--

INSERT INTO `sc_cidade` (`Ci_cod`, `Ci_codEstado`, `Ci_nome`) VALUES
(1, 1, 'São josé dos Pinais');

-- --------------------------------------------------------

--
-- Estrutura da tabela `sc_contato`
--

CREATE TABLE `sc_contato` (
  `Co_cod` int(11) NOT NULL,
  `Co_descricao` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `Co_codResponsavel` int(11) NOT NULL,
  `Co_codtpContato` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Esta tabela guardará os dados de contato dos responsáveis.';

-- --------------------------------------------------------

--
-- Estrutura da tabela `sc_estado`
--

CREATE TABLE `sc_estado` (
  `Es_cod` int(11) NOT NULL,
  `Es_UF` char(2) COLLATE utf8_bin DEFAULT NULL,
  `Es_nome` varchar(50) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Esta tabela será pouco usada mas seu intuito é relacionar endereços cidades, estados e bairros.';

--
-- Extraindo dados da tabela `sc_estado`
--

INSERT INTO `sc_estado` (`Es_cod`, `Es_UF`, `Es_nome`) VALUES
(1, 'PR', 'PARANA');

-- --------------------------------------------------------

--
-- Estrutura da tabela `sc_funcionario`
--

CREATE TABLE `sc_funcionario` (
  `Fu_cod` int(11) NOT NULL,
  `Fu_nome` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `Fu_CPF` char(14) COLLATE utf8_bin DEFAULT NULL,
  `Fu_matricula` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `Fu_codUnidade` int(11) DEFAULT NULL,
  `Fu_codtpFuncionario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Esta tabela armazenará os dados dos funcionarios, especificando qual a sua unidade e qual seu tipo(cordenação, monitor, ect..)';

--
-- Extraindo dados da tabela `sc_funcionario`
--

INSERT INTO `sc_funcionario` (`Fu_cod`, `Fu_nome`, `Fu_CPF`, `Fu_matricula`, `Fu_codUnidade`, `Fu_codtpFuncionario`) VALUES
(6, 'Admin', '031.948.002.05', '12312', 3, 3),
(7, 'Joca biru', '031.948.002-04', '131415', 1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `sc_ocorrencia`
--

CREATE TABLE `sc_ocorrencia` (
  `Oc_cod` int(11) NOT NULL,
  `Oc_codUser` int(11) NOT NULL,
  `Oc_codAluno` int(11) NOT NULL,
  `Oc_codtpOcorrencia` int(11) NOT NULL,
  `Oc_observacao` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `Oc_data` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Esta tabela irá armazenar os dados das ocorrências registradas pelo usuário.';

-- --------------------------------------------------------

--
-- Estrutura da tabela `sc_responsavel`
--

CREATE TABLE `sc_responsavel` (
  `Re_cod` int(11) NOT NULL,
  `Re_RG` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `Re_CPF` char(14) COLLATE utf8_bin DEFAULT NULL,
  `Re_nascimento` date NOT NULL,
  `Re_nome` varchar(40) COLLATE utf8_bin NOT NULL,
  `Re_logradouro` varchar(120) COLLATE utf8_bin DEFAULT NULL,
  `Re_codtpLogradouro` int(11) NOT NULL,
  `Re_codBairro` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Esta tabela será usada para armazenar os dados do responsavel no sistema';

--
-- Extraindo dados da tabela `sc_responsavel`
--

INSERT INTO `sc_responsavel` (`Re_cod`, `Re_RG`, `Re_CPF`, `Re_nascimento`, `Re_nome`, `Re_logradouro`, `Re_codtpLogradouro`, `Re_codBairro`) VALUES
(32, '27', '758.779.570-74', '1987-02-10', 'Bruno Eduardo Nunes', 'Conjunto Habitacional Conceição Gomes Rabelo', 1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `sc_tp_contato`
--

CREATE TABLE `sc_tp_contato` (
  `TC_cod` int(11) NOT NULL,
  `TC_nome` varchar(40) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Esta tabela cumulará os dados dos tipos de contatos possiveis.';

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

CREATE TABLE `sc_tp_funcionario` (
  `TF_Cod` int(11) NOT NULL,
  `TF_nome` varchar(40) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Esta tabela guarda os tipos de funcionários que podem ser registrados no sistema.';

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

CREATE TABLE `sc_tp_logradouro` (
  `TL_cod` int(11) NOT NULL,
  `TL_nome` varchar(40) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Esta tabela cumulará todos os tipos de logradouros.';

--
-- Extraindo dados da tabela `sc_tp_logradouro`
--

INSERT INTO `sc_tp_logradouro` (`TL_cod`, `TL_nome`) VALUES
(1, 'Rua'),
(2, 'Viela'),
(5, ' condomínio');

-- --------------------------------------------------------

--
-- Estrutura da tabela `sc_tp_ocorrencia`
--

CREATE TABLE `sc_tp_ocorrencia` (
  `TO_cod` int(11) NOT NULL,
  `TO_nome` varchar(40) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Esta tabela cumulará os tipos possiveis de ocorrência.';

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

CREATE TABLE `sc_tp_usuario` (
  `TU_cod` int(11) NOT NULL,
  `TU_nome` varchar(40) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Esta tabela guarda todos os tipos de usuários que podem ser registrados.';

--
-- Extraindo dados da tabela `sc_tp_usuario`
--

INSERT INTO `sc_tp_usuario` (`TU_cod`, `TU_nome`) VALUES
(3, 'Funcionário'),
(5, 'Comercial');

-- --------------------------------------------------------

--
-- Estrutura da tabela `sc_unidade`
--

CREATE TABLE `sc_unidade` (
  `Un_cod` int(11) NOT NULL,
  `Un_nome` varchar(10) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Esta tabela guardará todos os dados da unidade, assim relacionando alunos e funcionários. ';

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

CREATE TABLE `sc_usuario` (
  `Us_cod` int(11) NOT NULL,
  `Us_login` char(14) COLLATE utf8_bin NOT NULL,
  `Us_senha` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `Us_codtpUsuario` int(11) NOT NULL,
  `Us_modifiedat` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Esta tabela é utilizada para guardar usuarios do sistema, seja pai ou funcionário, asssim todos tendo um status e ultima modificação\n';

--
-- Extraindo dados da tabela `sc_usuario`
--

INSERT INTO `sc_usuario` (`Us_cod`, `Us_login`, `Us_senha`, `Us_codtpUsuario`, `Us_modifiedat`) VALUES
(26, '031.948.002-05', 'admin', 3, '2020-07-06'),
(27, '031.948.002-04', 'MDMxLjk0OC4wMDItMDQ=', 3, '2020-07-07');

-- --------------------------------------------------------

--
-- Estrutura da tabela `sc_usuario_responsavel`
--

CREATE TABLE `sc_usuario_responsavel` (
  `ur_id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `cpf_resp` char(14) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Tabela para armazenar usuarios e responsaveis correspondentes';

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `sc_aluno`
--
ALTER TABLE `sc_aluno`
  ADD PRIMARY KEY (`Al_cod`),
  ADD UNIQUE KEY `Al_CPF_UNIQUE` (`Al_CPF`),
  ADD KEY `fk_aluno_unidade_idx` (`Al_codUnidade`),
  ADD KEY `fk_aluno_responsavel_idx` (`Al_codResponsavel`);

--
-- Índices para tabela `sc_bairro`
--
ALTER TABLE `sc_bairro`
  ADD PRIMARY KEY (`Ba_cod`),
  ADD KEY `fk_bairro_cidade_idx` (`Ba_codCidade`);

--
-- Índices para tabela `sc_cidade`
--
ALTER TABLE `sc_cidade`
  ADD PRIMARY KEY (`Ci_cod`),
  ADD KEY `fk_cidade_estado_idx` (`Ci_codEstado`);

--
-- Índices para tabela `sc_contato`
--
ALTER TABLE `sc_contato`
  ADD PRIMARY KEY (`Co_cod`),
  ADD KEY `fk_contato_tipocontato_idx` (`Co_codtpContato`),
  ADD KEY `fk_contato_responsavel_idx` (`Co_codResponsavel`);

--
-- Índices para tabela `sc_estado`
--
ALTER TABLE `sc_estado`
  ADD PRIMARY KEY (`Es_cod`);

--
-- Índices para tabela `sc_funcionario`
--
ALTER TABLE `sc_funcionario`
  ADD PRIMARY KEY (`Fu_cod`),
  ADD UNIQUE KEY `Fun_CPF_UNIQUE` (`Fu_CPF`),
  ADD KEY `fk_funcionario_tipo_idx` (`Fu_codtpFuncionario`),
  ADD KEY `fk_funcionario_unidade_idx` (`Fu_codUnidade`);

--
-- Índices para tabela `sc_ocorrencia`
--
ALTER TABLE `sc_ocorrencia`
  ADD PRIMARY KEY (`Oc_cod`),
  ADD KEY `fk_occoorencia_aluno_idx` (`Oc_codAluno`),
  ADD KEY `forein_tipoocorrencia_ocorrencia_idx` (`Oc_codtpOcorrencia`),
  ADD KEY `fk_ocorrencia_funcionario_idx` (`Oc_codUser`);

--
-- Índices para tabela `sc_responsavel`
--
ALTER TABLE `sc_responsavel`
  ADD PRIMARY KEY (`Re_cod`),
  ADD UNIQUE KEY `Res_CPF_UNIQUE` (`Re_CPF`),
  ADD KEY `fk_responsavel_tipolog_idx` (`Re_codtpLogradouro`),
  ADD KEY `fk_responsavel_bairro_idx` (`Re_codBairro`);

--
-- Índices para tabela `sc_tp_contato`
--
ALTER TABLE `sc_tp_contato`
  ADD PRIMARY KEY (`TC_cod`);

--
-- Índices para tabela `sc_tp_funcionario`
--
ALTER TABLE `sc_tp_funcionario`
  ADD PRIMARY KEY (`TF_Cod`);

--
-- Índices para tabela `sc_tp_logradouro`
--
ALTER TABLE `sc_tp_logradouro`
  ADD PRIMARY KEY (`TL_cod`);

--
-- Índices para tabela `sc_tp_ocorrencia`
--
ALTER TABLE `sc_tp_ocorrencia`
  ADD PRIMARY KEY (`TO_cod`);

--
-- Índices para tabela `sc_tp_usuario`
--
ALTER TABLE `sc_tp_usuario`
  ADD PRIMARY KEY (`TU_cod`);

--
-- Índices para tabela `sc_unidade`
--
ALTER TABLE `sc_unidade`
  ADD PRIMARY KEY (`Un_cod`);

--
-- Índices para tabela `sc_usuario`
--
ALTER TABLE `sc_usuario`
  ADD PRIMARY KEY (`Us_cod`),
  ADD KEY `fk_usuario_tipousuario_idx` (`Us_codtpUsuario`);

--
-- Índices para tabela `sc_usuario_responsavel`
--
ALTER TABLE `sc_usuario_responsavel`
  ADD PRIMARY KEY (`ur_id`),
  ADD KEY `fk_user_ur` (`id_user`),
  ADD KEY `fk_resp_ur` (`cpf_resp`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `sc_aluno`
--
ALTER TABLE `sc_aluno`
  MODIFY `Al_cod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT de tabela `sc_bairro`
--
ALTER TABLE `sc_bairro`
  MODIFY `Ba_cod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `sc_cidade`
--
ALTER TABLE `sc_cidade`
  MODIFY `Ci_cod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `sc_contato`
--
ALTER TABLE `sc_contato`
  MODIFY `Co_cod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `sc_estado`
--
ALTER TABLE `sc_estado`
  MODIFY `Es_cod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `sc_funcionario`
--
ALTER TABLE `sc_funcionario`
  MODIFY `Fu_cod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `sc_ocorrencia`
--
ALTER TABLE `sc_ocorrencia`
  MODIFY `Oc_cod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de tabela `sc_responsavel`
--
ALTER TABLE `sc_responsavel`
  MODIFY `Re_cod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de tabela `sc_tp_contato`
--
ALTER TABLE `sc_tp_contato`
  MODIFY `TC_cod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `sc_tp_funcionario`
--
ALTER TABLE `sc_tp_funcionario`
  MODIFY `TF_Cod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `sc_tp_logradouro`
--
ALTER TABLE `sc_tp_logradouro`
  MODIFY `TL_cod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `sc_tp_ocorrencia`
--
ALTER TABLE `sc_tp_ocorrencia`
  MODIFY `TO_cod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `sc_tp_usuario`
--
ALTER TABLE `sc_tp_usuario`
  MODIFY `TU_cod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `sc_unidade`
--
ALTER TABLE `sc_unidade`
  MODIFY `Un_cod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `sc_usuario`
--
ALTER TABLE `sc_usuario`
  MODIFY `Us_cod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de tabela `sc_usuario_responsavel`
--
ALTER TABLE `sc_usuario_responsavel`
  MODIFY `ur_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Restrições para despejos de tabelas
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
  ADD CONSTRAINT `fk_ocorrencia_tipoocoorencia` FOREIGN KEY (`Oc_codtpOcorrencia`) REFERENCES `sc_tp_ocorrencia` (`TO_cod`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_ocorrencia_usuario` FOREIGN KEY (`Oc_codUser`) REFERENCES `sc_usuario` (`Us_cod`) ON DELETE CASCADE ON UPDATE CASCADE;

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

--
-- Limitadores para a tabela `sc_usuario_responsavel`
--
ALTER TABLE `sc_usuario_responsavel`
  ADD CONSTRAINT `fk_resp_ur` FOREIGN KEY (`cpf_resp`) REFERENCES `sc_responsavel` (`Re_CPF`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_user_ur` FOREIGN KEY (`id_user`) REFERENCES `sc_usuario` (`Us_cod`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
