-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 15-Maio-2020 às 21:48
-- Versão do servidor: 10.4.11-MariaDB
-- versão do PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
-- Estrutura da tabela `chamado`
--

CREATE TABLE `chamado` (
  `id` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `status` varchar(155) NOT NULL,
  `descricao` varchar(155) NOT NULL,
  `abertura` varchar(155) NOT NULL,
  `encerramento` varchar(155) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `chamado`
--

INSERT INTO `chamado` (`id`, `id_cliente`, `status`, `descricao`, `abertura`, `encerramento`) VALUES
(4, 7, 'teste', 'teste365', '2020-05-15 16:35:24', NULL),
(5, 10, 'testechamado', 'bthth', '2020-05-15 16:41:26', NULL);

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
  `created` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`id`, `nome`, `cpf`, `telefone`, `sexo`, `email`, `cep`, `endereco`, `created`) VALUES
(6, 'Guilherme', 534456, 231321, 'wadwa', 'dwaD@aswd', 231, 'teste dwadwad dw dwa', NULL),
(7, 'dawdaw', 312321, 3213, 'dwad', 'ddawdwa@Dwad', 1231, 'ewae12321546', NULL),
(9, 'dawdw', 321321, 3213, 'Masculino', 'lucas@email.com', 213, 'ewae12321546', '2020-05-14 17:46:21'),
(10, 'dawdw', 321321, 3213, 'Masculino', 'lucas@email.com', 213, 'ewae12321546', '2020-05-14 17:47:27');

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionario`
--

CREATE TABLE `funcionario` (
  `id` int(11) NOT NULL,
  `nome` varchar(114) NOT NULL,
  `cpf` varchar(115) NOT NULL,
  `rg` int(30) NOT NULL,
  `email` varchar(115) NOT NULL,
  `cep` int(50) NOT NULL,
  `cargo` varchar(115) NOT NULL,
  `telefone` int(10) NOT NULL,
  `tituloEleitor` varchar(115) NOT NULL,
  `historicoEscolar` varchar(115) NOT NULL,
  `ctps` varchar(115) NOT NULL,
  `sexo` varchar(30) NOT NULL,
  `senha` varchar(115) NOT NULL,
  `created` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `funcionario`
--

INSERT INTO `funcionario` (`id`, `nome`, `cpf`, `rg`, `email`, `cep`, `cargo`, `telefone`, `tituloEleitor`, `historicoEscolar`, `ctps`, `sexo`, `senha`, `created`) VALUES
(2, 'Guilhermeteste', '1111111111', 132546, 'guilherme@email.com', 2147483647, 'sei la ', 2147483647, '16510263', 'sim', 'dwad', 'Masculino', 'teste', NULL),
(5, 'trsdwad', '231321', 3123, 'dwad@Dawd', 321321, 'wadad', 3213123, '3213', 'dawda', '32dw', 'dadw', '321321', '2020-05-14 17:53:21');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `chamado`
--
ALTER TABLE `chamado`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_cliente_fk` (`id_cliente`);

--
-- Índices para tabela `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `funcionario`
--
ALTER TABLE `funcionario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `chamado`
--
ALTER TABLE `chamado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `funcionario`
--
ALTER TABLE `funcionario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `chamado`
--
ALTER TABLE `chamado`
  ADD CONSTRAINT `id_cliente_fk` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
