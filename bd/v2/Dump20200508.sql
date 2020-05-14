CREATE DATABASE  IF NOT EXISTS `service_desk_pi` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `service_desk_pi`;
-- MySQL dump 10.13  Distrib 8.0.17, for Win64 (x86_64)
--
-- Host: localhost    Database: service_desk_pi
-- ------------------------------------------------------
-- Server version	5.7.26

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `chamado`
--

DROP TABLE IF EXISTS `chamado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `chamado` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_id_cliente` int(11) NOT NULL,
  `fk_id_equipamento` int(11) NOT NULL,
  `statusAndamento` varchar(45) CHARACTER SET latin1 NOT NULL,
  `descricao` varchar(255) CHARACTER SET latin1 NOT NULL,
  `dataAbertura` date NOT NULL,
  `dataEncerramento` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `chamado_fk_id_cliente_idx` (`fk_id_cliente`),
  KEY `chamado_fk_id_equipamento_idx` (`fk_id_equipamento`),
  CONSTRAINT `chamado_fk_id_cliente` FOREIGN KEY (`fk_id_cliente`) REFERENCES `controle_intermediario` (`fk_id_cliente`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `chamado_fk_id_equipamento` FOREIGN KEY (`fk_id_equipamento`) REFERENCES `controle_intermediario` (`fk_id_equipamento`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `chamado`
--

LOCK TABLES `chamado` WRITE;
/*!40000 ALTER TABLE `chamado` DISABLE KEYS */;
/*!40000 ALTER TABLE `chamado` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cliente`
--

DROP TABLE IF EXISTS `cliente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cliente` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_id_chamado` int(11) NOT NULL,
  `nome_nomeFantasia` varchar(255) NOT NULL,
  `cpf_cnpj` varchar(25) NOT NULL,
  `sexo` enum('Masculino','Feminino','Não informado') NOT NULL,
  `telefone_telComercial` varchar(45) NOT NULL,
  `celular_celularEmpresarial` varchar(20) NOT NULL,
  `email_emailComercial` varchar(150) NOT NULL,
  `cep` varchar(14) NOT NULL,
  `cidade` varchar(45) NOT NULL,
  `bairro` varchar(45) NOT NULL,
  `imagem` varchar(255) NOT NULL,
  `senha` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cliente`
--

LOCK TABLES `cliente` WRITE;
/*!40000 ALTER TABLE `cliente` DISABLE KEYS */;
/*!40000 ALTER TABLE `cliente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `controle_intermediario`
--

DROP TABLE IF EXISTS `controle_intermediario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `controle_intermediario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_id_chamado` int(11) NOT NULL,
  `fk_id_cliente` int(11) NOT NULL,
  `fk_id_equipamento` int(11) NOT NULL,
  `fk_id_funcionario` int(11) NOT NULL,
  `fk_id_permissao` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_id_chamado_idx` (`fk_id_chamado`),
  KEY `fk_id_cliente_idx` (`fk_id_cliente`),
  KEY `fk_id_equipamento_idx` (`fk_id_equipamento`),
  KEY `fk_id_funcionario_idx` (`fk_id_funcionario`),
  KEY `fk_chamado_idx` (`fk_id_chamado`),
  KEY `fk_cliente_idx` (`fk_id_cliente`),
  KEY `fk_equipamento_idx` (`fk_id_equipamento`),
  KEY `fk_funcionario_idx` (`fk_id_funcionario`),
  KEY `controle_fk_id_permissao_idx` (`fk_id_permissao`),
  CONSTRAINT `controle_fk_id_chamado` FOREIGN KEY (`fk_id_chamado`) REFERENCES `chamado` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `controle_fk_id_cliente` FOREIGN KEY (`fk_id_cliente`) REFERENCES `cliente` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `controle_fk_id_equipamento` FOREIGN KEY (`fk_id_equipamento`) REFERENCES `equipamento` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `controle_fk_id_funcionario` FOREIGN KEY (`fk_id_funcionario`) REFERENCES `funcionario` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `controle_fk_id_permissao` FOREIGN KEY (`fk_id_permissao`) REFERENCES `pemissao` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `controle_intermediario`
--

LOCK TABLES `controle_intermediario` WRITE;
/*!40000 ALTER TABLE `controle_intermediario` DISABLE KEYS */;
/*!40000 ALTER TABLE `controle_intermediario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `equipamento`
--

DROP TABLE IF EXISTS `equipamento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `equipamento` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_id_chamado` int(11) NOT NULL,
  `marca` varchar(45) CHARACTER SET latin1 NOT NULL,
  `modelo` varchar(45) CHARACTER SET latin1 NOT NULL,
  `categoria` varchar(45) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_id_chamado_idx` (`fk_id_chamado`),
  CONSTRAINT `equipamento_fk_id_chamado` FOREIGN KEY (`fk_id_chamado`) REFERENCES `controle_intermediario` (`fk_id_chamado`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `equipamento`
--

LOCK TABLES `equipamento` WRITE;
/*!40000 ALTER TABLE `equipamento` DISABLE KEYS */;
/*!40000 ALTER TABLE `equipamento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `funcionario`
--

DROP TABLE IF EXISTS `funcionario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `funcionario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_id_permissao` int(11) NOT NULL,
  `nome` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `cpf` varchar(14) CHARACTER SET latin1 NOT NULL,
  `rg` varchar(45) CHARACTER SET latin1 DEFAULT NULL,
  `email` varchar(255) CHARACTER SET latin1 NOT NULL,
  `cep` varchar(35) CHARACTER SET latin1 DEFAULT NULL,
  `cargo` varchar(45) CHARACTER SET latin1 DEFAULT NULL,
  `numeroContrato` varchar(45) CHARACTER SET latin1 DEFAULT NULL,
  `tituloEleitor` varchar(45) CHARACTER SET latin1 DEFAULT NULL,
  `historicoEscolar` varchar(45) CHARACTER SET latin1 DEFAULT NULL,
  `ctps` varchar(45) CHARACTER SET latin1 NOT NULL,
  `sexo` varchar(45) CHARACTER SET latin1 DEFAULT NULL,
  `senha` varchar(45) CHARACTER SET latin1 DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `funcionario_fk_id_permissao_idx` (`fk_id_permissao`),
  CONSTRAINT `funcionario_fk_id_permissao` FOREIGN KEY (`fk_id_permissao`) REFERENCES `pemissao` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `funcionario`
--

LOCK TABLES `funcionario` WRITE;
/*!40000 ALTER TABLE `funcionario` DISABLE KEYS */;
/*!40000 ALTER TABLE `funcionario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pemissao`
--

DROP TABLE IF EXISTS `pemissao`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pemissao` (
  `id` int(11) NOT NULL,
  `fk_id_funcionario` int(11) NOT NULL,
  `insert` varchar(45) NOT NULL DEFAULT '0',
  `update` varchar(45) NOT NULL DEFAULT '0',
  `select` varchar(45) NOT NULL DEFAULT '0',
  `delete` varchar(45) NOT NULL DEFAULT '0',
  `show` varchar(45) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `permissao_fk_id_funcionario_idx` (`fk_id_funcionario`),
  CONSTRAINT `permissao_fk_id_funcionario` FOREIGN KEY (`fk_id_funcionario`) REFERENCES `controle_intermediario` (`fk_id_funcionario`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pemissao`
--

LOCK TABLES `pemissao` WRITE;
/*!40000 ALTER TABLE `pemissao` DISABLE KEYS */;
/*!40000 ALTER TABLE `pemissao` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-05-08 17:14:16
