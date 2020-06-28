-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 28-Jun-2020 às 23:27
-- Versão do servidor: 10.4.11-MariaDB
-- versão do PHP: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `sistema_informatica_pi`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cargos`
--

CREATE TABLE `cargos` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `cargos`
--

INSERT INTO `cargos` (`id`, `nome`) VALUES
(8, 'Admin'),
(9, 'Funcionario');

-- --------------------------------------------------------

--
-- Estrutura da tabela `chamado`
--

CREATE TABLE `chamado` (
  `id` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `id_funcionario` int(11) DEFAULT NULL,
  `status` varchar(155) NOT NULL,
  `equipamento` varchar(115) NOT NULL,
  `descricao` varchar(155) NOT NULL,
  `abertura` datetime(6) NOT NULL,
  `encerramento` datetime(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `chamado`
--

INSERT INTO `chamado` (`id`, `id_cliente`, `id_funcionario`, `status`, `equipamento`, `descricao`, `abertura`, `encerramento`) VALUES
(28, 6, 20, 'Finalizado', 'dawdawdaw', '1231321 ', '2020-06-11 16:27:00.000000', '2020-06-12 14:09:16.000000'),
(31, 6, 20, 'Finalizado', 'dawdawdaw', '21                ', '2020-06-12 13:03:21.000000', '2020-06-12 21:21:08.000000'),
(34, 9, 20, 'Em andamento', 'dwadawd', '123123 ', '2020-06-12 13:37:34.000000', NULL),
(35, 6, 20, 'Em andamento', 'computador', 'teste               ', '2020-06-12 13:44:09.000000', NULL),
(36, 6, 20, 'Em andamento', 'computador2', 'teste        ', '2020-06-12 13:44:23.000000', NULL),
(37, 6, 21, 'Finalizado', 'teste', 'teste                ', '2020-06-12 13:51:45.000000', '2020-06-12 13:55:43.000000'),
(38, 6, 21, 'Finalizado', 'teste', 'teste                ', '2020-06-12 14:00:18.000000', '2020-06-12 14:00:34.000000'),
(39, 6, 21, 'Finalizado', 'teste', 'teste                ', '2020-06-12 14:02:25.000000', '2020-06-12 14:02:36.000000'),
(40, 6, 21, 'Em andamento', 'teste', '213132                ', '2020-06-12 14:07:57.000000', NULL),
(41, 6, 20, 'Finalizado', 'computador', 'o computador não liga            ', '2020-06-12 21:13:34.000000', '2020-06-26 19:48:16.000000'),
(42, 6, NULL, 'Em espera', 'teste', 'teste                    ', '2020-06-27 13:31:49.000000', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE `cliente` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `cpf` int(50) NOT NULL,
  `telefone` int(50) NOT NULL,
  `sexo` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `cep` int(50) NOT NULL,
  `endereco` varchar(150) NOT NULL,
  `created` datetime(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`id`, `nome`, `cpf`, `telefone`, `sexo`, `email`, `cep`, `endereco`, `created`) VALUES
(6, 'Guilherme', 534456, 231321, '', 'dwaD@aswd', 231, 'teste dwadwad dw dwa', '2020-05-14 17:46:21.000000'),
(7, 'dawdaw', 312321, 3213, 'dwad', 'ddawdwa@Dwad', 1231, 'ewae12321546', '2020-05-14 17:46:21.000000'),
(9, 'dawdw', 321321, 3213, 'Masculino', 'lucas@email.com', 213, 'ewae12321546', '2020-05-14 17:46:21.000000'),
(10, 'dawdw', 321321, 3213, 'Masculino', 'lucas@email.com', 213, 'ewae12321546', '2020-05-14 17:47:27.000000'),
(15, 'Cleiton', 11111111, 211111111, 'Masculino', '1111111111', 1111111, '11111111111', '2020-06-05 20:55:52.000000'),
(16, 'joao', 111111111, 123244354, 'Masculino', 'teste@teste', 111111111, '111111111111', '2020-06-23 14:28:28.000000');

-- --------------------------------------------------------

--
-- Estrutura da tabela `controles`
--

CREATE TABLE `controles` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `controles`
--

INSERT INTO `controles` (`id`, `nome`) VALUES
(1, 'cliente'),
(2, 'chamado'),
(3, 'funcionario'),
(4, 'historico_chamado'),
(5, 'permissoes'),
(11, 'chamados_geral');

-- --------------------------------------------------------

--
-- Estrutura da tabela `estados`
--

CREATE TABLE `estados` (
  `id` int(2) UNSIGNED ZEROFILL NOT NULL,
  `uf` varchar(10) NOT NULL DEFAULT '',
  `nome` varchar(20) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `estados`
--

INSERT INTO `estados` (`id`, `uf`, `nome`) VALUES
(01, 'AC', 'Acre'),
(02, 'AL', 'Alagoas'),
(03, 'AM', 'Amazonas'),
(04, 'AP', 'Amapá'),
(05, 'BA', 'Bahia'),
(06, 'CE', 'Ceará'),
(07, 'DF', 'Distrito Federal'),
(08, 'ES', 'Espírito Santo'),
(09, 'GO', 'Goiás'),
(10, 'MA', 'Maranhão'),
(11, 'MG', 'Minas Gerais'),
(12, 'MS', 'Mato Grosso do Sul'),
(13, 'MT', 'Mato Grosso'),
(14, 'PA', 'Pará'),
(15, 'PB', 'Paraíba'),
(16, 'PE', 'Pernambuco'),
(17, 'PI', 'Piauí'),
(18, 'PR', 'Paraná'),
(19, 'RJ', 'Rio de Janeiro'),
(20, 'RN', 'Rio Grande do Norte'),
(21, 'RO', 'Rondônia'),
(22, 'RR', 'Roraima'),
(23, 'RS', 'Rio Grande do Sul'),
(24, 'SC', 'Santa Catarina'),
(25, 'SE', 'Sergipe'),
(26, 'SP', 'São Paulo'),
(27, 'TO', 'Tocantins');

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionario`
--

CREATE TABLE `funcionario` (
  `id` int(11) NOT NULL,
  `nome` varchar(114) NOT NULL,
  `cpf` varchar(115) NOT NULL,
  `rg` int(30) NOT NULL,
  `nascimento` varchar(30) NOT NULL,
  `email` varchar(115) NOT NULL,
  `endereco` varchar(150) NOT NULL,
  `cep` int(50) NOT NULL,
  `estado` varchar(50) NOT NULL,
  `telefone` int(10) NOT NULL,
  `tituloEleitor` varchar(115) NOT NULL,
  `escolaridade` varchar(115) NOT NULL,
  `ctps` varchar(115) NOT NULL,
  `sexo` varchar(30) NOT NULL,
  `senha` varchar(115) NOT NULL,
  `id_cargo` int(11) NOT NULL,
  `created` datetime(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `funcionario`
--

INSERT INTO `funcionario` (`id`, `nome`, `cpf`, `rg`, `nascimento`, `email`, `endereco`, `cep`, `estado`, `telefone`, `tituloEleitor`, `escolaridade`, `ctps`, `sexo`, `senha`, `id_cargo`, `created`) VALUES
(20, 'cleiton', '1111111111', 111111111, '1256-12-05', 'cleiton@email.com', 'dwadw11d21', 111111, 'Espírito Santo', 211111221, '21313', 'MedioIncompleto', '2131231', 'Masculino', '1234', 8, '2020-06-11 15:47:47.000000'),
(21, 'Gisele', '11111111111111', 2147483647, '1188-12-15', 'gisele@email.com', '111111111111', 2147483647, 'Mato Grosso do Sul', 2147483647, '111111111111', 'MedioIncompleto', '11111111111111', 'Masculino', '1234', 9, '2020-06-12 13:51:26.000000'),
(22, 'admin', '11111111111', 111111111, '47577-05-04', '1111dwadaw1111111@dwad', 'jdoksaokdoaskdopa', 231321, 'Sergipe', 999898989, '1684896525', 'Fundamental Incompleto', 'dw31', 'Masculino', '312', 8, '2020-06-25 18:19:59.000000'),
(23, 'funcionario', '11111111', 1111111, '5115-12-15', 'funcionario@email', '1111111111111111', 1111111111, 'Alagoas', 4555555, '111111111', 'FundamentalCompleto', '111111111', 'Não informado', '1234', 9, '2020-06-26 16:23:22.000000'),
(24, 'teste', '11111111111111111', 2147483647, '0310-06-15', 'teste@teste', 'sdawdadwd', 2165156, 'Amapá', 1655461332, '151665', 'MedioIncompleto', '01261695', 'Masculino', '31543351', 9, '2020-06-27 16:09:39.000000');

-- --------------------------------------------------------

--
-- Estrutura da tabela `historico_chamado`
--

CREATE TABLE `historico_chamado` (
  `id` int(11) NOT NULL,
  `id_chamado` int(11) NOT NULL,
  `id_funcionario` int(11) NOT NULL,
  `dt_historico` datetime(6) NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `solucao` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `historico_chamado`
--

INSERT INTO `historico_chamado` (`id`, `id_chamado`, `id_funcionario`, `dt_historico`, `descricao`, `solucao`) VALUES
(4, 34, 20, '2020-06-16 20:29:32.000000', '0000-00-00 00:00:00.000000', 'dwad'),
(5, 34, 20, '2020-06-16 20:31:32.000000', '0000-00-00 00:00:00.000000', 'teste'),
(6, 41, 21, '2020-06-25 18:38:57.000000', '0000-00-00 00:00:00.000000', 'teste'),
(7, 41, 20, '2020-06-25 19:00:50.000000', '0000-00-00 00:00:00.000000', '3123'),
(8, 35, 20, '2020-06-27 16:32:08.000000', '0000-00-00 00:00:00.000000', 'dwada2'),
(9, 28, 20, '2020-06-23 16:59:36.000000', '0000-00-00 00:00:00.000000', 'teste'),
(10, 36, 20, '2020-06-28 17:48:18.000000', '0000-00-00 00:00:00.000000', 'dwad2'),
(11, 34, 20, '2020-06-28 18:13:02.000000', '0000-00-00 00:00:00.000000', 'teste');

-- --------------------------------------------------------

--
-- Estrutura da tabela `permissoes`
--

CREATE TABLE `permissoes` (
  `id` int(11) NOT NULL,
  `id_controle` int(11) NOT NULL,
  `id_cargo` int(11) NOT NULL,
  `ler` int(11) NOT NULL,
  `editar` int(11) NOT NULL,
  `cadastrar` int(11) NOT NULL,
  `deletar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `permissoes`
--

INSERT INTO `permissoes` (`id`, `id_controle`, `id_cargo`, `ler`, `editar`, `cadastrar`, `deletar`) VALUES
(1, 1, 8, 1, 1, 1, 1),
(2, 2, 8, 1, 1, 1, 1),
(3, 1, 9, 1, 1, 1, 0),
(4, 4, 8, 1, 1, 1, 1),
(5, 3, 8, 1, 1, 1, 1),
(7, 2, 9, 1, 1, 1, 1),
(9, 5, 8, 1, 1, 1, 1),
(10, 4, 9, 1, 1, 1, 1),
(11, 11, 8, 1, 1, 1, 1);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `cargos`
--
ALTER TABLE `cargos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `chamado`
--
ALTER TABLE `chamado`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_cliente_fk` (`id_cliente`),
  ADD KEY `id_funcionario_fk` (`id_funcionario`) USING BTREE;

--
-- Índices para tabela `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `controles`
--
ALTER TABLE `controles`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `estados`
--
ALTER TABLE `estados`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `funcionario`
--
ALTER TABLE `funcionario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_cargo` (`id_cargo`) USING BTREE;

--
-- Índices para tabela `historico_chamado`
--
ALTER TABLE `historico_chamado`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_chamado_fk` (`id_chamado`),
  ADD KEY `id_funcionario_fk1` (`id_funcionario`);

--
-- Índices para tabela `permissoes`
--
ALTER TABLE `permissoes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_controle_fk` (`id_controle`),
  ADD KEY `id_cargos_fk` (`id_cargo`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `cargos`
--
ALTER TABLE `cargos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `chamado`
--
ALTER TABLE `chamado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT de tabela `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de tabela `controles`
--
ALTER TABLE `controles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `estados`
--
ALTER TABLE `estados`
  MODIFY `id` int(2) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de tabela `funcionario`
--
ALTER TABLE `funcionario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de tabela `historico_chamado`
--
ALTER TABLE `historico_chamado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `permissoes`
--
ALTER TABLE `permissoes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `chamado`
--
ALTER TABLE `chamado`
  ADD CONSTRAINT `id_cliente_fk` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `id_funcionario_fk` FOREIGN KEY (`id_funcionario`) REFERENCES `funcionario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `funcionario`
--
ALTER TABLE `funcionario`
  ADD CONSTRAINT `id_cargo_fk` FOREIGN KEY (`id_cargo`) REFERENCES `cargos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `historico_chamado`
--
ALTER TABLE `historico_chamado`
  ADD CONSTRAINT `id_chamado_fk` FOREIGN KEY (`id_chamado`) REFERENCES `chamado` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `id_funcionario_fk1` FOREIGN KEY (`id_funcionario`) REFERENCES `funcionario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `permissoes`
--
ALTER TABLE `permissoes`
  ADD CONSTRAINT `id_cargos_fk` FOREIGN KEY (`id_cargo`) REFERENCES `cargos` (`id`),
  ADD CONSTRAINT `id_controle_fk` FOREIGN KEY (`id_controle`) REFERENCES `controles` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
