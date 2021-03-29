-- MySQL dump 10.13  Distrib 8.0.23, for Win64 (x86_64)
--
-- Host: localhost    Database: sistema_unico
-- ------------------------------------------------------
-- Server version	8.0.23

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
-- Table structure for table `consulta`
--

DROP TABLE IF EXISTS `consulta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `consulta` (
  `consulta_id` int NOT NULL AUTO_INCREMENT,
  `data_consulta` datetime NOT NULL,
  `paciente_cpf` varchar(11) NOT NULL,
  `crm_medico` varchar(6) NOT NULL,
  PRIMARY KEY (`consulta_id`),
  KEY `paciente_cpf` (`paciente_cpf`),
  KEY `crm_medico` (`crm_medico`),
  CONSTRAINT `consulta_ibfk_1` FOREIGN KEY (`paciente_cpf`) REFERENCES `paciente` (`CPF`),
  CONSTRAINT `consulta_ibfk_2` FOREIGN KEY (`crm_medico`) REFERENCES `medico` (`CRM`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `consulta`
--

LOCK TABLES `consulta` WRITE;
/*!40000 ALTER TABLE `consulta` DISABLE KEYS */;
INSERT INTO `consulta` VALUES (12,'2021-02-08 14:44:00','1431234514','5141'),(13,'2021-02-13 02:23:00','14312345145','5141'),(14,'2022-02-01 12:34:00','123545651','4512');
/*!40000 ALTER TABLE `consulta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `especialidade_medico`
--

DROP TABLE IF EXISTS `especialidade_medico`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `especialidade_medico` (
  `especialidade_id` int NOT NULL AUTO_INCREMENT,
  `descricao` varchar(100) NOT NULL,
  PRIMARY KEY (`especialidade_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `especialidade_medico`
--

LOCK TABLES `especialidade_medico` WRITE;
/*!40000 ALTER TABLE `especialidade_medico` DISABLE KEYS */;
INSERT INTO `especialidade_medico` VALUES (1,'Oftalmologista'),(2,'Cardiologista'),(8,'Neurologista'),(9,'Oncologista'),(10,'Pediatra'),(11,'Otorrino'),(12,'Otorrinolaringologista'),(13,'Endocrinologista'),(14,'Gastroenterologia');
/*!40000 ALTER TABLE `especialidade_medico` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `medico`
--

DROP TABLE IF EXISTS `medico`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `medico` (
  `CRM` varchar(6) NOT NULL,
  `nome` varchar(200) NOT NULL,
  `idade` int NOT NULL,
  `especialidade_id` int NOT NULL,
  `id_usuario` int DEFAULT NULL,
  PRIMARY KEY (`CRM`),
  KEY `especialidade_id` (`especialidade_id`),
  KEY `id_usuario` (`id_usuario`),
  CONSTRAINT `medico_ibfk_1` FOREIGN KEY (`especialidade_id`) REFERENCES `especialidade_medico` (`especialidade_id`),
  CONSTRAINT `medico_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `medico`
--

LOCK TABLES `medico` WRITE;
/*!40000 ALTER TABLE `medico` DISABLE KEYS */;
INSERT INTO `medico` VALUES ('4512','Mauro Naves',32,9,27),('5141','Cassia de Castro',65,2,26),('7641','Vinicius Maximo',12,14,29);
/*!40000 ALTER TABLE `medico` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `paciente`
--

DROP TABLE IF EXISTS `paciente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `paciente` (
  `CPF` varchar(11) NOT NULL,
  `nome` varchar(200) NOT NULL,
  `idade` int NOT NULL,
  `contato` varchar(13) NOT NULL,
  `rua` varchar(100) NOT NULL,
  `bairro` varchar(50) NOT NULL,
  `numero` int NOT NULL,
  `id_usuario` int DEFAULT NULL,
  PRIMARY KEY (`CPF`),
  KEY `id_usuario` (`id_usuario`),
  CONSTRAINT `id_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `paciente`
--

LOCK TABLES `paciente` WRITE;
/*!40000 ALTER TABLE `paciente` DISABLE KEYS */;
INSERT INTO `paciente` VALUES ('1231452155','Maria Rosaria',65,'3192354235','jatuaba','Belvs',256,24),('123545651','Hugo de melo',20,'31995871329','Peroba','belvedere',214,25),('1431234514','Milton Neves',45,'31995871329','Sibipuruna','centro',215,23),('14312345145','Fernando Maciel',12,'31995871329','jatuaba','Nova Serrana',214,22);
/*!40000 ALTER TABLE `paciente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `prontuario`
--

DROP TABLE IF EXISTS `prontuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `prontuario` (
  `prontuario_id` int NOT NULL AUTO_INCREMENT,
  `problema` varchar(200) NOT NULL,
  `situacao` varchar(7) NOT NULL,
  `analise` varchar(20) NOT NULL,
  `observacoes` varchar(500) NOT NULL,
  `crm_medico` varchar(6) NOT NULL,
  `paciente_cpf` varchar(11) NOT NULL,
  `id_consulta` int NOT NULL,
  PRIMARY KEY (`prontuario_id`),
  KEY `paciente_cpf` (`paciente_cpf`),
  KEY `crm_medico` (`crm_medico`),
  KEY `id_consulta` (`id_consulta`),
  CONSTRAINT `prontuario_ibfk_1` FOREIGN KEY (`paciente_cpf`) REFERENCES `paciente` (`CPF`),
  CONSTRAINT `prontuario_ibfk_2` FOREIGN KEY (`crm_medico`) REFERENCES `medico` (`CRM`),
  CONSTRAINT `prontuario_ibfk_3` FOREIGN KEY (`id_consulta`) REFERENCES `consulta` (`consulta_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `prontuario`
--

LOCK TABLES `prontuario` WRITE;
/*!40000 ALTER TABLE `prontuario` DISABLE KEYS */;
INSERT INTO `prontuario` VALUES (4,'Internacao por excesso de beleza','ativo','subjetivo','Manter a porta trancada','5141','123545651',14);
/*!40000 ALTER TABLE `prontuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `receita`
--

DROP TABLE IF EXISTS `receita`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `receita` (
  `id` int NOT NULL AUTO_INCREMENT,
  `crm_medico` varchar(6) NOT NULL,
  `cpf_paciente` varchar(11) NOT NULL,
  `periodo` int NOT NULL,
  `posologia` varchar(100) NOT NULL,
  `medicamento` varchar(100) NOT NULL,
  `id_usuario` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `crm_medico` (`crm_medico`),
  KEY `cpf_paciente` (`cpf_paciente`),
  KEY `fk_id_usuario` (`id_usuario`),
  CONSTRAINT `fk_id_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`),
  CONSTRAINT `receita_ibfk_1` FOREIGN KEY (`crm_medico`) REFERENCES `medico` (`CRM`),
  CONSTRAINT `receita_ibfk_2` FOREIGN KEY (`cpf_paciente`) REFERENCES `paciente` (`CPF`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `receita`
--

LOCK TABLES `receita` WRITE;
/*!40000 ALTER TABLE `receita` DISABLE KEYS */;
INSERT INTO `receita` VALUES (19,'4512','14312345145',3,'2 em 2 dias','loratadina',22);
/*!40000 ALTER TABLE `receita` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuarios` (
  `id_usuario` int NOT NULL AUTO_INCREMENT,
  `user` varchar(20) DEFAULT NULL,
  `senha` varchar(100) DEFAULT NULL,
  `prioridade` int DEFAULT NULL,
  `nome` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (20,'adm','b09c600fddc573f117449b3723f23d64',0,'adm'),(22,'fernando','202cb962ac59075b964b07152d234b70',2,'Fernando'),(23,'milton','202cb962ac59075b964b07152d234b70',2,'Milton'),(24,'maria','202cb962ac59075b964b07152d234b70',2,'Maria'),(25,'hugo','202cb962ac59075b964b07152d234b70',2,'Hugo'),(26,'cassia','202cb962ac59075b964b07152d234b70',1,'Cassia'),(27,'mauro','202cb962ac59075b964b07152d234b70',1,'Mauro'),(29,'vinicius','202cb962ac59075b964b07152d234b70',1,'Vinicius');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-03-29 14:23:00
