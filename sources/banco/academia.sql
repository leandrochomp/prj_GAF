CREATE DATABASE  IF NOT EXISTS `academia` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `academia`;
-- MySQL dump 10.13  Distrib 5.6.13, for Win32 (x86)
--
-- Host: 127.0.0.1    Database: academia
-- ------------------------------------------------------
-- Server version	5.6.14

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `administrador`
--

DROP TABLE IF EXISTS `administrador`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `administrador` (
  `idAdministrador` int(11) NOT NULL AUTO_INCREMENT,
  `idPESSOA` int(11) NOT NULL,
  PRIMARY KEY (`idAdministrador`),
  KEY `fk_administrador_PESSOA1_idx` (`idPESSOA`),
  CONSTRAINT `fk_administrador_PESSOA1` FOREIGN KEY (`idPESSOA`) REFERENCES `pessoa` (`idPESSOA`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `administrador`
--

LOCK TABLES `administrador` WRITE;
/*!40000 ALTER TABLE `administrador` DISABLE KEYS */;
/*!40000 ALTER TABLE `administrador` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `aluno`
--

DROP TABLE IF EXISTS `aluno`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `aluno` (
  `idALUNO` int(11) NOT NULL AUTO_INCREMENT,
  `idPESSOA` int(11) NOT NULL,
  `idCATEGORIA` int(11) NOT NULL,
  `peso` double DEFAULT NULL,
  `altura` double DEFAULT NULL,
  `peito` double DEFAULT NULL,
  `cintura` double DEFAULT NULL,
  `quadril` double DEFAULT NULL,
  `braco` double DEFAULT NULL,
  `coxa` double DEFAULT NULL,
  `matricula` int(11) DEFAULT NULL,
  PRIMARY KEY (`idALUNO`),
  KEY `fk_ALUNO_USER_idx` (`idPESSOA`),
  KEY `fk_ALUNO_CATEGORIA-ALUNO1_idx` (`idCATEGORIA`),
  CONSTRAINT `fk_ALUNO_CATEGORIA-ALUNO1` FOREIGN KEY (`idCATEGORIA`) REFERENCES `categoria_aluno` (`idCATEGORIA`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_ALUNO_USER` FOREIGN KEY (`idPESSOA`) REFERENCES `pessoa` (`idPESSOA`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=120 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `aluno`
--

LOCK TABLES `aluno` WRITE;
/*!40000 ALTER TABLE `aluno` DISABLE KEYS */;
INSERT INTO `aluno` VALUES (94,120,1,100,110,NULL,130,140,150,160,1111),(95,123,1,100,110,NULL,130,140,150,160,1111),(96,123,1,100,110,NULL,130,140,150,160,1111),(97,124,1,100,110,NULL,130,140,150,160,1111),(98,125,1,100,110,120,130,140,150,160,1111),(99,126,1,100,110,120,130,140,150,160,1111),(100,127,1,100,110,120,130,140,150,160,1111),(101,128,1,100,110,120,130,140,150,160,1111),(102,129,1,100,110,120,130,140,150,160,1111),(103,130,1,100,110,120,130,140,150,160,1111),(104,131,1,100,110,120,130,140,150,160,1111),(105,132,1,0,0,0,0,0,0,0,1111),(106,133,1,0,0,0,0,0,0,0,1111),(107,134,1,0,0,0,0,0,0,0,1111),(108,135,1,0,0,0,0,0,0,0,1111),(109,136,1,100,110,120,130,140,150,160,1111),(110,137,1,0,0,0,0,0,0,0,1111),(111,138,1,0,0,0,0,0,0,0,1111),(112,139,1,100,110,120,130,140,150,160,1111),(113,140,1,100,110,120,130,140,150,160,1111),(114,141,1,100,110,120,130,140,150,160,1111),(115,142,1,100,110,120,130,140,150,160,1111),(116,143,1,0,0,0,0,0,0,0,1111),(117,144,1,100,110,120,130,140,150,160,1111),(118,145,1,100,110,120,130,140,150,160,1111),(119,146,1,100,110,120,130,140,150,160,1111);
/*!40000 ALTER TABLE `aluno` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `atividade`
--

DROP TABLE IF EXISTS `atividade`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `atividade` (
  `idATIVIDADE` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) DEFAULT NULL,
  `idCATEGORIA` int(11) NOT NULL,
  `serie` int(11) DEFAULT NULL,
  `carga` int(11) DEFAULT NULL,
  `repeticao` int(11) DEFAULT NULL,
  `tempo` time DEFAULT NULL,
  PRIMARY KEY (`idATIVIDADE`),
  KEY `fk_ATIVIDADE_CATEGORIA1_idx` (`idCATEGORIA`),
  CONSTRAINT `fk_ATIVIDADE_CATEGORIA1` FOREIGN KEY (`idCATEGORIA`) REFERENCES `categoria` (`idCATEGORIA`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `atividade`
--

LOCK TABLES `atividade` WRITE;
/*!40000 ALTER TABLE `atividade` DISABLE KEYS */;
/*!40000 ALTER TABLE `atividade` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categoria`
--

DROP TABLE IF EXISTS `categoria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categoria` (
  `idCATEGORIA` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idCATEGORIA`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categoria`
--

LOCK TABLES `categoria` WRITE;
/*!40000 ALTER TABLE `categoria` DISABLE KEYS */;
/*!40000 ALTER TABLE `categoria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categoria_aluno`
--

DROP TABLE IF EXISTS `categoria_aluno`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categoria_aluno` (
  `idCATEGORIA` int(11) NOT NULL,
  `nome` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idCATEGORIA`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categoria_aluno`
--

LOCK TABLES `categoria_aluno` WRITE;
/*!40000 ALTER TABLE `categoria_aluno` DISABLE KEYS */;
INSERT INTO `categoria_aluno` VALUES (1,'LEVE'),(2,'NORMAL'),(3,'PESADO');
/*!40000 ALTER TABLE `categoria_aluno` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `log`
--

DROP TABLE IF EXISTS `log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `log` (
  `idLOG` int(11) NOT NULL,
  `idPESSOA` int(11) NOT NULL,
  `idTREINO` int(11) NOT NULL,
  `datadeAlterecao` date NOT NULL,
  PRIMARY KEY (`idLOG`),
  KEY `fk_LOG_PESSOA1_idx` (`idPESSOA`),
  KEY `fk_LOG_TREINO1_idx` (`idTREINO`),
  CONSTRAINT `fk_LOG_PESSOA1` FOREIGN KEY (`idPESSOA`) REFERENCES `pessoa` (`idPESSOA`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_LOG_TREINO1` FOREIGN KEY (`idTREINO`) REFERENCES `treino` (`idTREINO`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `log`
--

LOCK TABLES `log` WRITE;
/*!40000 ALTER TABLE `log` DISABLE KEYS */;
/*!40000 ALTER TABLE `log` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `perfil`
--

DROP TABLE IF EXISTS `perfil`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `perfil` (
  `idPERFIL` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_pefil` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idPERFIL`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `perfil`
--

LOCK TABLES `perfil` WRITE;
/*!40000 ALTER TABLE `perfil` DISABLE KEYS */;
INSERT INTO `perfil` VALUES (1,'ADMINISTRADOR'),(2,'PROFESSOR'),(3,'RECEPCIONISTA'),(4,'ALUNO');
/*!40000 ALTER TABLE `perfil` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pessoa`
--

DROP TABLE IF EXISTS `pessoa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pessoa` (
  `idPESSOA` int(11) NOT NULL AUTO_INCREMENT,
  `idPERFIL` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `CPF` varchar(14) NOT NULL,
  `email` varchar(45) NOT NULL,
  `telefone` varchar(11) NOT NULL,
  `celular` varchar(11) NOT NULL,
  `sexo` varchar(9) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `dtNascimento` date DEFAULT NULL,
  `login` varchar(25) DEFAULT NULL,
  `senha` varchar(20) DEFAULT NULL,
  `foto` varchar(100) DEFAULT NULL,
  `dtCadastro` datetime DEFAULT NULL,
  PRIMARY KEY (`idPESSOA`),
  KEY `fk_USER_PERFIL1_idx` (`idPERFIL`),
  CONSTRAINT `fk_USER_PERFIL1` FOREIGN KEY (`idPERFIL`) REFERENCES `perfil` (`idPERFIL`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=148 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pessoa`
--

LOCK TABLES `pessoa` WRITE;
/*!40000 ALTER TABLE `pessoa` DISABLE KEYS */;
INSERT INTO `pessoa` VALUES (97,2,'TESTANDO AGORA','410.7432222','EMAIL@GMAIL.COM','322441111','2334343','M',1,'1993-12-09','LOGIN1','senhalegal','imagens/padrao.png','2014-04-25 00:00:00'),(114,4,'TESTANDO AGORA','410.7432222','EMAIL@GMAIL.COM','322441111','2334343','M',1,'1993-12-09','LOGIN1','senha3','imagens/padrao.png','2014-04-25 00:00:00'),(115,4,'TESTANDO AGORA','410.7432222','EMAIL@GMAIL.COM','322441111','2334343','M',1,'1993-12-09','LOGIN1','senha3','imagens/padrao.png','2014-04-25 00:00:00'),(116,4,'TESTANDO AGORA','410.7432222','EMAIL@GMAIL.COM','322441111','2334343','M',1,'1993-12-09','LOGIN1','senha3','imagens/padrao.png','2014-04-25 00:00:00'),(117,4,'TESTANDO AGORA','410.7432222','EMAIL@GMAIL.COM','322441111','2334343','M',1,'1993-12-09','LOGIN1','senha3','imagens/padrao.png','2014-04-25 00:00:00'),(118,4,'TESTANDO AGORA','410.7432222','EMAIL@GMAIL.COM','322441111','2334343','M',1,'1993-12-09','LOGIN1','senha3','imagens/padrao.png','2014-04-25 00:00:00'),(119,4,'TESTANDO AGORA','410.7432222','EMAIL@GMAIL.COM','322441111','2334343','M',1,'1993-12-09','LOGIN1','senha3','imagens/padrao.png','2014-04-25 00:00:00'),(120,4,'TESTANDO AGORA','410.7432222','EMAIL@GMAIL.COM','322441111','2334343','M',1,'1993-12-09','LOGIN1','senha3','imagens/padrao.png','2014-04-25 00:00:00'),(121,4,'TESTANDO AGORA','410.7432222','EMAIL@GMAIL.COM','322441111','2334343','M',1,'1993-12-09','LOGIN1','senha3','imagens/padrao.png','2014-04-25 00:00:00'),(122,4,'TESTANDO AGORA','410.7432222','EMAIL@GMAIL.COM','322441111','2334343','M',1,'1993-12-09','LOGIN1','senha3','imagens/padrao.png','2014-04-25 00:00:00'),(123,4,'TESTANDO AGORA','410.7432222','EMAIL@GMAIL.COM','322441111','2334343','M',1,'1993-12-09','LOGIN1','senha3','imagens/padrao.png','2014-04-25 00:00:00'),(124,4,'TESTANDO AGORA','410.7432222','EMAIL@GMAIL.COM','322441111','2334343','M',1,'1993-12-09','LOGIN1','senha3','imagens/padrao.png','2014-04-25 00:00:00'),(125,4,'TESTANDO AGORA','410.7432222','EMAIL@GMAIL.COM','322441111','2334343','M',1,'1993-12-09','LOGIN1','senha3','imagens/padrao.png','2014-04-25 00:00:00'),(126,4,'TESTANDO AGORA','410.7432222','EMAIL@GMAIL.COM','322441111','2334343','M',1,'1993-12-09','LOGIN1','senha3','imagens/padrao.png','2014-04-25 00:00:00'),(127,4,'TESTANDO AGORA','410.7432222','EMAIL@GMAIL.COM','322441111','2334343','M',1,'1993-12-09','LOGIN1','senha3','imagens/padrao.png','2014-04-25 00:00:00'),(128,4,'TESTANDO AGORA','410.7432222','EMAIL@GMAIL.COM','322441111','2334343','M',1,'1993-12-09','LOGIN1','senha3','imagens/padrao.png','2014-04-25 00:00:00'),(129,4,'TESTANDO AGORA','410.7432222','EMAIL@GMAIL.COM','322441111','2334343','M',1,'1993-12-09','LOGIN1','senha3','imagens/padrao.png','2014-04-25 00:00:00'),(130,4,'TESTANDO AGORA','410.7432222','EMAIL@GMAIL.COM','322441111','2334343','M',1,'1993-12-09','LOGIN1','senha3','imagens/padrao.png','2014-04-25 00:00:00'),(131,4,'TESTANDO AGORA','410.7432222','EMAIL@GMAIL.COM','322441111','2334343','M',1,'1993-12-09','LOGIN1','senha3','imagens/padrao.png','2014-04-25 00:00:00'),(132,4,'TESTANDO AGORA','410.7432222','EMAIL@GMAIL.COM','322441111','2334343','M',1,'1993-12-09','LOGIN1','senha3','imagens/padrao.png','2014-04-25 00:00:00'),(145,4,'Punheta','410.7432222','EMAIL@GMAIL.COM','322441111','2334343','M',1,'1993-12-09','LOGIN1','','imagens/padrao.png','2014-04-25 00:00:00'),(146,4,'Punheta','410.7432222','EMAIL@GMAIL.COM','322441111','2334343','M',1,'1993-12-09','LOGIN1','','imagens/padrao.png','2014-04-25 00:00:00'),(147,4,'Punheta','410.7432222','EMAIL@GMAIL.COM','322441111','2334343','M',1,'1993-12-09','LOGIN1','','imagens/padrao.png','2014-04-25 00:00:00');
/*!40000 ALTER TABLE `pessoa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `professor`
--

DROP TABLE IF EXISTS `professor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `professor` (
  `idPROFESSOR` int(11) NOT NULL AUTO_INCREMENT,
  `idPESSOA` int(11) NOT NULL,
  `nivel` varchar(15) NOT NULL,
  PRIMARY KEY (`idPROFESSOR`),
  KEY `fk_PROFESSOR_PESSOA1_idx` (`idPESSOA`),
  CONSTRAINT `fk_PROFESSOR_PESSOA1` FOREIGN KEY (`idPESSOA`) REFERENCES `pessoa` (`idPESSOA`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `professor`
--

LOCK TABLES `professor` WRITE;
/*!40000 ALTER TABLE `professor` DISABLE KEYS */;
INSERT INTO `professor` VALUES (1,97,'0');
/*!40000 ALTER TABLE `professor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `recepcionista`
--

DROP TABLE IF EXISTS `recepcionista`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `recepcionista` (
  `idRECEPCIONISTA` int(11) NOT NULL AUTO_INCREMENT,
  `idPESSOA` int(11) NOT NULL,
  PRIMARY KEY (`idRECEPCIONISTA`),
  KEY `fk_RECEPCIONISTA_PESSOA1_idx` (`idPESSOA`),
  CONSTRAINT `fk_RECEPCIONISTA_PESSOA1` FOREIGN KEY (`idPESSOA`) REFERENCES `pessoa` (`idPESSOA`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `recepcionista`
--

LOCK TABLES `recepcionista` WRITE;
/*!40000 ALTER TABLE `recepcionista` DISABLE KEYS */;
/*!40000 ALTER TABLE `recepcionista` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `treino`
--

DROP TABLE IF EXISTS `treino`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `treino` (
  `idTREINO` int(11) NOT NULL AUTO_INCREMENT,
  `idATIVIDADE` int(11) NOT NULL,
  `idCOORDENADOR` int(11) NOT NULL,
  `CATEGORIA-ALUNO_idCATEGORIA` int(11) NOT NULL,
  `nome` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idTREINO`),
  KEY `fk_TREINO_ATIVIDADE1_idx` (`idATIVIDADE`),
  KEY `fk_TREINO_CATEGORIA-ALUNO1_idx` (`CATEGORIA-ALUNO_idCATEGORIA`),
  CONSTRAINT `fk_TREINO_ATIVIDADE1` FOREIGN KEY (`idATIVIDADE`) REFERENCES `atividade` (`idATIVIDADE`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_TREINO_CATEGORIA-ALUNO1` FOREIGN KEY (`CATEGORIA-ALUNO_idCATEGORIA`) REFERENCES `categoria_aluno` (`idCATEGORIA`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `treino`
--

LOCK TABLES `treino` WRITE;
/*!40000 ALTER TABLE `treino` DISABLE KEYS */;
/*!40000 ALTER TABLE `treino` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `treino_has_aluno`
--

DROP TABLE IF EXISTS `treino_has_aluno`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `treino_has_aluno` (
  `TREINO_idTREINO` int(11) NOT NULL,
  `ALUNO_idALUNO` int(11) NOT NULL,
  `dtTreino` datetime DEFAULT NULL,
  PRIMARY KEY (`TREINO_idTREINO`,`ALUNO_idALUNO`),
  KEY `fk_TREINO_has_ALUNO_ALUNO1_idx` (`ALUNO_idALUNO`),
  KEY `fk_TREINO_has_ALUNO_TREINO1_idx` (`TREINO_idTREINO`),
  CONSTRAINT `fk_TREINO_has_ALUNO_ALUNO1` FOREIGN KEY (`ALUNO_idALUNO`) REFERENCES `aluno` (`idALUNO`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_TREINO_has_ALUNO_TREINO1` FOREIGN KEY (`TREINO_idTREINO`) REFERENCES `treino` (`idTREINO`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `treino_has_aluno`
--

LOCK TABLES `treino_has_aluno` WRITE;
/*!40000 ALTER TABLE `treino_has_aluno` DISABLE KEYS */;
/*!40000 ALTER TABLE `treino_has_aluno` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-05-17 12:03:43
