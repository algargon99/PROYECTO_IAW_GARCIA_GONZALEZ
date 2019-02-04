DROP DATABASE IF EXISTS proyecto;
CREATE DATABASE proyecto;
USE proyecto;
-- MySQL dump 10.13  Distrib 5.7.24, for Linux (x86_64)
--
-- Host: 127.0.0.1    Database: proyecto
-- ------------------------------------------------------
-- Server version	5.5.41-0ubuntu0.14.04.1

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
-- Table structure for table `Usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `correo` varchar(45) NOT NULL,
  `fecha_alta` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Empleados`
--

DROP TABLE IF EXISTS `empleados`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `empleados` (
  `codempleado` int(11) NOT NULL AUTO_INCREMENT,
  `dni` char(9) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `apellidos` varchar(45) NOT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `telefono` char(9) DEFAULT NULL,
  `fechacontratacion` date DEFAULT NULL,
  PRIMARY KEY (`codempleado`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Empleados`
--

LOCK TABLES `empleados` WRITE;
/*!40000 ALTER TABLE `empleados` DISABLE KEYS */;
/*!40000 ALTER TABLE `empleados` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Libros`
--

DROP TABLE IF EXISTS `libros`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `libros` (
  `isbn` int(13) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(45) NOT NULL,
  `autor` varchar(45) NOT NULL,
  `editorial` varchar(45) NOT NULL,
  `numpag` int(11) DEFAULT NULL,
  `encuadernacion` varchar(45) DEFAULT NULL,
  `precio` int(11) NOT NULL,
  PRIMARY KEY (`isbn`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Libros`
--

LOCK TABLES `libros` WRITE;
/*!40000 ALTER TABLE `libros` DISABLE KEYS */;
/*!40000 ALTER TABLE `libros` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Pedidos`
--

DROP TABLE IF EXISTS `pedidos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pedidos` (
  `codpedido` int(11) NOT NULL AUTO_INCREMENT,
  `fechaentrega` varchar(45) NOT NULL,
  `id` int(11) DEFAULT NULL,
  `codempleado` int(11) DEFAULT NULL,
  PRIMARY KEY (`codpedido`),
  KEY `fk_Pedidos_1_idx` (`id`),
  KEY `fk_Pedidos_2_idx` (`codempleado`),
  CONSTRAINT `fk_Pedidos_1` FOREIGN KEY (`id`) REFERENCES `usuarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Pedidos_2` FOREIGN KEY (`codempleado`) REFERENCES `empleados` (`codempleado`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Pedidos`
--

LOCK TABLES `pedidos` WRITE;
/*!40000 ALTER TABLE `pedidos` DISABLE KEYS */;
/*!40000 ALTER TABLE `pedidos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Tienen`
--

DROP TABLE IF EXISTS `tienen`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tienen` (
  `cantidad` int(11) NOT NULL,
  `codpedido` int(11) NOT NULL,
  `isbn` int(13) NOT NULL,
  KEY `fk_Tienen_1_idx` (`isbn`),
  KEY `fk_Tienen_2_idx` (`codpedido`),
  CONSTRAINT `fk_Tienen_1` FOREIGN KEY (`isbn`) REFERENCES `libros` (`isbn`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Tienen_2` FOREIGN KEY (`codpedido`) REFERENCES `pedidos` (`codpedido`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Tienen`
--

LOCK TABLES `tienen` WRITE;
/*!40000 ALTER TABLE `tienen` DISABLE KEYS */;
/*!40000 ALTER TABLE `tienen` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-01-14 10:18:14
INSERT INTO usuarios VALUES(1,"admin",md5("admin"),"Admin","admin@admin.com",curdate());

alter table libros auto_increment=1;
alter table empleados auto_increment=1;
alter table pedidos auto_increment=1;

insert into empleados (dni,nombre,apellidos,direccion,telefono,fechacontratacion) values("12345678M","Alejandro","Román Caballero","c/ Pocillo de Gilván, Sevilla", 123456789,"03/03/2003");
insert into empleados (dni,nombre,apellidos,direccion,telefono,fechacontratacion) values("12345679M","Alex","Román","c/ Pocillo de Gilván", 123456788,"03/03/2005");
insert into empleados (dni,nombre,apellidos,direccion,telefono,fechacontratacion) values("12345678A","Alexa","Romana","c/ Pocillo", 123456768,"2003/03/05");
