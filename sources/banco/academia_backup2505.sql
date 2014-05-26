CREATE DATABASE  IF NOT EXISTS `academia` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `academia`;
-- MySQL dump 10.13  Distrib 5.6.13, for Win32 (x86)
--
-- Host: 127.0.0.1    Database: academia
-- ------------------------------------------------------
-- Server version	5.6.16

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
-- Table structure for table `adm`
--

DROP TABLE IF EXISTS `adm`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `adm` (
  `idADM` int(11) NOT NULL AUTO_INCREMENT,
  `idPESSOA` int(11) NOT NULL,
  PRIMARY KEY (`idADM`),
  KEY `fk_ADM_PESSOA1_idx` (`idPESSOA`),
  CONSTRAINT `fk_ADM_PESSOA1` FOREIGN KEY (`idPESSOA`) REFERENCES `pessoa` (`idPESSOA`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `adm`
--

LOCK TABLES `adm` WRITE;
/*!40000 ALTER TABLE `adm` DISABLE KEYS */;
/*!40000 ALTER TABLE `adm` ENABLE KEYS */;
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
  `matricula` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`idALUNO`),
  KEY `fk_ALUNO_PESSOA1_idx` (`idPESSOA`),
  KEY `fk_ALUNO_CATEGORIA_ALUNO1_idx` (`idCATEGORIA`),
  CONSTRAINT `fk_ALUNO_PESSOA1` FOREIGN KEY (`idPESSOA`) REFERENCES `pessoa` (`idPESSOA`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_ALUNO_CATEGORIA_ALUNO1` FOREIGN KEY (`idCATEGORIA`) REFERENCES `categoria_aluno` (`idCATEGORIA`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `aluno`
--

LOCK TABLES `aluno` WRITE;
/*!40000 ALTER TABLE `aluno` DISABLE KEYS */;
INSERT INTO `aluno` VALUES (6,5,1,0,0,0,0,0,0,0,500005);
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
  `idCATEGORIA` int(11) NOT NULL,
  `nome` varchar(45) DEFAULT NULL,
  `serie` int(11) DEFAULT NULL,
  `carga` int(11) DEFAULT NULL,
  `repeticao` int(11) DEFAULT NULL,
  `tempo` time DEFAULT NULL,
  PRIMARY KEY (`idATIVIDADE`),
  KEY `fk_ATIVIDADE_CATEGORIA1_idx` (`idCATEGORIA`),
  CONSTRAINT `fk_ATIVIDADE_CATEGORIA1` FOREIGN KEY (`idCATEGORIA`) REFERENCES `categoria` (`idCATEGORIA`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `atividade`
--

LOCK TABLES `atividade` WRITE;
/*!40000 ALTER TABLE `atividade` DISABLE KEYS */;
INSERT INTO `atividade` VALUES (1,1,'SUPINO A',12,12,12,'00:00:00'),(2,2,'asdasd',11,11,11,'00:00:01'),(3,1,'FSD',11,11,11,'00:00:11'),(4,1,'11',111,111,111,'00:01:11'),(5,2,'1',111111,11,1,'00:00:01'),(6,2,'111',1,1,1,'00:00:01'),(7,1,'FDSFSD',11,1,11,'00:00:01'),(8,3,'elevação frontal',4,10,8,'00:00:45'),(9,3,'desenvolvimento',4,20,8,'00:00:45');
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categoria`
--

LOCK TABLES `categoria` WRITE;
/*!40000 ALTER TABLE `categoria` DISABLE KEYS */;
INSERT INTO `categoria` VALUES (1,'PEITO'),(2,'COSTAS'),(3,'OMBRO');
/*!40000 ALTER TABLE `categoria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categoria_aluno`
--

DROP TABLE IF EXISTS `categoria_aluno`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categoria_aluno` (
  `idCATEGORIA` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idCATEGORIA`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categoria_aluno`
--

LOCK TABLES `categoria_aluno` WRITE;
/*!40000 ALTER TABLE `categoria_aluno` DISABLE KEYS */;
INSERT INTO `categoria_aluno` VALUES (1,'NOVO');
/*!40000 ALTER TABLE `categoria_aluno` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `perfil`
--

DROP TABLE IF EXISTS `perfil`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `perfil` (
  `idPERFIL` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_perfil` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idPERFIL`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `perfil`
--

LOCK TABLES `perfil` WRITE;
/*!40000 ALTER TABLE `perfil` DISABLE KEYS */;
INSERT INTO `perfil` VALUES (1,'ADM'),(2,'PROFESSOR'),(3,'RECEPCIONISTA'),(4,'ALUNO');
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
  `nome` varchar(45) DEFAULT NULL,
  `CPF` varchar(14) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `telefone` varchar(11) DEFAULT NULL,
  `celular` varchar(11) DEFAULT NULL,
  `sexo` varchar(10) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `dtNascimento` date DEFAULT NULL,
  `login` varchar(25) DEFAULT NULL,
  `senha` varchar(20) DEFAULT NULL,
  `dtCadastro` date DEFAULT NULL,
  PRIMARY KEY (`idPESSOA`),
  KEY `fk_PESSOA_PERFIL_idx` (`idPERFIL`),
  CONSTRAINT `fk_PESSOA_PERFIL` FOREIGN KEY (`idPERFIL`) REFERENCES `perfil` (`idPERFIL`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pessoa`
--

LOCK TABLES `pessoa` WRITE;
/*!40000 ALTER TABLE `pessoa` DISABLE KEYS */;
INSERT INTO `pessoa` VALUES (4,4,'oi','','','','','Femino',1,'2014-12-31','oi','oi','2014-05-26'),(5,4,'eu','1324','eu.com','1234','1234','Masculino',1,'2014-12-31','eu','eu','2014-05-26'),(6,3,'recepcionista','123456789','recepcionista@gmail.com','12345','12345','Femino',1,'2014-05-25','LOGIN3','3','2014-05-26'),(7,2,'professor','51115980300','professor@gmail.com','12345','12345','Femino',1,'2014-05-25','LOGIN2','2','2014-05-26');
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
  `nivel` varchar(15) DEFAULT NULL,
  `PROFESSORcol` varchar(45) DEFAULT NULL,
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
INSERT INTO `professor` VALUES (1,7,'Professor',NULL);
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `recepcionista`
--

LOCK TABLES `recepcionista` WRITE;
/*!40000 ALTER TABLE `recepcionista` DISABLE KEYS */;
INSERT INTO `recepcionista` VALUES (1,6);
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
  `nome` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idTREINO`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `treino`
--

LOCK TABLES `treino` WRITE;
/*!40000 ALTER TABLE `treino` DISABLE KEYS */;
INSERT INTO `treino` VALUES (1,'TESTE'),(2,'234u67'),(3,'23456uddd'),(4,'HORA DA VERDADE'),(5,'dsa'),(6,'TESTE TREINO'),(7,'Treino Ombro');
/*!40000 ALTER TABLE `treino` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `treino_aluno`
--

DROP TABLE IF EXISTS `treino_aluno`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `treino_aluno` (
  `TREINO_idTREINO` int(11) NOT NULL,
  `ALUNO_idALUNO` int(11) NOT NULL,
  `dtTreino` date DEFAULT NULL,
  PRIMARY KEY (`TREINO_idTREINO`,`ALUNO_idALUNO`),
  KEY `fk_TREINO_has_ALUNO_ALUNO1_idx` (`ALUNO_idALUNO`),
  KEY `fk_TREINO_has_ALUNO_TREINO1_idx` (`TREINO_idTREINO`),
  CONSTRAINT `fk_TREINO_has_ALUNO_TREINO1` FOREIGN KEY (`TREINO_idTREINO`) REFERENCES `treino` (`idTREINO`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_TREINO_has_ALUNO_ALUNO1` FOREIGN KEY (`ALUNO_idALUNO`) REFERENCES `aluno` (`idALUNO`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `treino_aluno`
--

LOCK TABLES `treino_aluno` WRITE;
/*!40000 ALTER TABLE `treino_aluno` DISABLE KEYS */;
/*!40000 ALTER TABLE `treino_aluno` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `treino_atividade`
--

DROP TABLE IF EXISTS `treino_atividade`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `treino_atividade` (
  `idtreino_atv` int(11) NOT NULL AUTO_INCREMENT,
  `idTREINO` int(11) NOT NULL,
  `idATIVIDADE` int(11) NOT NULL,
  PRIMARY KEY (`idtreino_atv`),
  KEY `fk_treino_atividade_TREINO1_idx` (`idTREINO`),
  KEY `fk_treino_atividade_ATIVIDADE1_idx` (`idATIVIDADE`),
  CONSTRAINT `fk_treino_atividade_TREINO1` FOREIGN KEY (`idTREINO`) REFERENCES `treino` (`idTREINO`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_treino_atividade_ATIVIDADE1` FOREIGN KEY (`idATIVIDADE`) REFERENCES `atividade` (`idATIVIDADE`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `treino_atividade`
--

LOCK TABLES `treino_atividade` WRITE;
/*!40000 ALTER TABLE `treino_atividade` DISABLE KEYS */;
INSERT INTO `treino_atividade` VALUES (1,2,1),(2,2,2),(3,3,1),(4,3,3),(5,3,5),(6,3,6),(7,4,1),(8,4,3),(9,5,5),(10,5,6),(11,6,8),(12,6,9);
/*!40000 ALTER TABLE `treino_atividade` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-05-25 21:57:26
