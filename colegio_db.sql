-- MariaDB dump 10.19  Distrib 10.4.21-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: colegio
-- ------------------------------------------------------
-- Server version	10.4.21-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `aula`
--

DROP TABLE IF EXISTS `aula`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `aula` (
  `cod_aula` varchar(5) NOT NULL,
  `nombre_aula` varchar(20) NOT NULL,
  PRIMARY KEY (`cod_aula`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `aula`
--

LOCK TABLES `aula` WRITE;
/*!40000 ALTER TABLE `aula` DISABLE KEYS */;
INSERT INTO `aula` VALUES ('A-1','inicial-a'),('A-10','prim-4b'),('A-11','prim-5a'),('A-12','prim-5b'),('A-13','prim-6a'),('A-14','prim-6b'),('A-15','sec-1a'),('A-16','sec-1b'),('A-17','sec-2a'),('A-18','sec-2b'),('A-19','sec-3a'),('A-2','inicial-b'),('A-20','sec-3b'),('A-21','sec-4a'),('A-22','sec-4b'),('A-23','sec-5a'),('A-24','sec-5b'),('A-25','sec-6a'),('A-26','sec-6b'),('A-27','Gastronomia'),('A-28','Sala audio-visual'),('A-29','Biblioteca'),('A-3','prim-1a'),('A-4','prim-1b'),('A-5','prim-2a'),('A-6','prim-2b'),('A-7','prim-3a'),('A-8','prim-3b'),('A-9','prim-4a');
/*!40000 ALTER TABLE `aula` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `calificacion`
--

DROP TABLE IF EXISTS `calificacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `calificacion` (
  `cod_ev` varchar(5) NOT NULL,
  `cod_mat` varchar(8) NOT NULL,
  `ci_est` varchar(10) NOT NULL,
  `tipo_ev` varchar(15) NOT NULL,
  `nota` int(3) NOT NULL,
  `fecha` date NOT NULL,
  PRIMARY KEY (`cod_ev`),
  KEY `cod_mat` (`cod_mat`),
  KEY `ci_est` (`ci_est`),
  CONSTRAINT `calificacion_ibfk_1` FOREIGN KEY (`cod_mat`) REFERENCES `materia` (`cod_mat`),
  CONSTRAINT `calificacion_ibfk_2` FOREIGN KEY (`ci_est`) REFERENCES `estudiante` (`ci_est`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `calificacion`
--

LOCK TABLES `calificacion` WRITE;
/*!40000 ALTER TABLE `calificacion` DISABLE KEYS */;
INSERT INTO `calificacion` VALUES ('ev-1','m-mat','4679132','Practica 1',71,'2021-03-21');
/*!40000 ALTER TABLE `calificacion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `curso`
--

DROP TABLE IF EXISTS `curso`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `curso` (
  `cod_curso` varchar(5) NOT NULL,
  `cod_nivel` varchar(5) NOT NULL,
  `cod_aula` varchar(5) NOT NULL,
  `nombre_par` varchar(1) NOT NULL,
  `nro_curso` int(1) NOT NULL,
  PRIMARY KEY (`cod_curso`),
  KEY `cod_aula` (`cod_aula`),
  KEY `nombre_par` (`nombre_par`),
  KEY `cod_nivel` (`cod_nivel`),
  KEY `nro_curso` (`nro_curso`),
  CONSTRAINT `curso_ibfk_2` FOREIGN KEY (`cod_aula`) REFERENCES `aula` (`cod_aula`),
  CONSTRAINT `curso_ibfk_3` FOREIGN KEY (`nombre_par`) REFERENCES `paralelo` (`nombre_par`),
  CONSTRAINT `curso_ibfk_4` FOREIGN KEY (`cod_nivel`) REFERENCES `nivel` (`cod_nivel`),
  CONSTRAINT `curso_ibfk_5` FOREIGN KEY (`nro_curso`) REFERENCES `nro_curso` (`nro`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `curso`
--

LOCK TABLES `curso` WRITE;
/*!40000 ALTER TABLE `curso` DISABLE KEYS */;
INSERT INTO `curso` VALUES ('c-na','n-in','A-1','A',0),('c-nb','n-in','A-2','B',0),('c-p1a','n-pri','A-3','A',1),('c-p1b','n-pri','A-4','B',1),('c-p2a','n-pri','A-5','A',2),('c-p2b','n-pri','A-6','B',2),('c-p3a','n-pri','A-7','A',3),('c-p3b','n-pri','A-8','B',3),('c-p4a','n-pri','A-9','A',4),('c-p4b','n-pri','A-10','B',4),('c-p5a','n-pri','A-11','A',5),('c-p5b','n-pri','A-12','B',5),('c-p6a','n-pri','A-13','A',6),('c-p6b','n-pri','A-14','B',6),('c-s1a','n-sec','A-15','A',1),('c-s1b','n-sec','A-16','B',1),('c-s2a','n-sec','A-17','A',2),('c-s2b','n-sec','A-18','B',2),('c-s3a','n-sec','A-19','A',3),('c-s3b','n-sec','A-20','B',3),('c-s4a','n-sec','A-21','A',4),('c-s4b','n-sec','A-22','B',4),('c-s5a','n-sec','A-23','A',5),('c-s5b','n-sec','A-24','B',5),('c-s6a','n-sec','A-25','A',6),('c-s6b','n-sec','A-26','B',6);
/*!40000 ALTER TABLE `curso` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dicta`
--

DROP TABLE IF EXISTS `dicta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dicta` (
  `cod_mat` varchar(8) NOT NULL,
  `ci_prof` varchar(10) NOT NULL,
  KEY `cod_mat` (`cod_mat`),
  KEY `ci_prof` (`ci_prof`),
  CONSTRAINT `dicta_ibfk_1` FOREIGN KEY (`cod_mat`) REFERENCES `materia` (`cod_mat`),
  CONSTRAINT `dicta_ibfk_2` FOREIGN KEY (`ci_prof`) REFERENCES `profesor` (`ci_prof`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dicta`
--

LOCK TABLES `dicta` WRITE;
/*!40000 ALTER TABLE `dicta` DISABLE KEYS */;
/*!40000 ALTER TABLE `dicta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estudiante`
--

DROP TABLE IF EXISTS `estudiante`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `estudiante` (
  `ci_est` varchar(10) NOT NULL,
  `cod_curso` varchar(5) NOT NULL,
  `nombre_est` varchar(20) NOT NULL,
  `apellido_pat_est` varchar(15) NOT NULL,
  `apellido_mat_est` varchar(15) NOT NULL,
  `telefono_padre` int(8) NOT NULL,
  PRIMARY KEY (`ci_est`),
  KEY `cod_curso` (`cod_curso`),
  CONSTRAINT `estudiante_ibfk_1` FOREIGN KEY (`cod_curso`) REFERENCES `curso` (`cod_curso`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estudiante`
--

LOCK TABLES `estudiante` WRITE;
/*!40000 ALTER TABLE `estudiante` DISABLE KEYS */;
INSERT INTO `estudiante` VALUES ('10031566','c-p3b','Ruben','Clark','Duncan',79856413),('12345678','c-p4a','Joel','Tola','Quispe',74598132),('13131524','c-p4a','Sara','Conde','Smith',71234560),('13258965','c-p3a','Pedro','Alimas','Vazquez',66564585),('1346597','c-p1b','Maria Ester','Lima','Blanco',74003326),('15324655','c-p6a','Fernanda','Lopez','Weir',76464646),('15953575','c-p1a','Adrian','Quenta','Lissen',76534219),('20025165','c-p2b','Ismael','Valverde','Huanca',77558565),('23568965','c-p5a','Ovidio','Franz','Tapia',75241630),('25361485','c-p2b','Emily','Hernandez','Cuentes',79413855),('25859575','c-nb','Alejandra','Valensuela','Quispe',77556996),('28391746','c-p1b','Mario','Bros','Smith',76677665),('36251485','c-p1a','Felicia','Huanca','de la Cruz',61342585),('4132597','c-p6a','Amilcar','Sillerico','Mamani',76543210),('41346582','c-p6b','Tomas','Jones','Smith',62154310),('44613225','c-s3b','Melisa','Bustamante','Loza',65876545),('44665855','c-p6a','William','Adams','Gorecki',74444652),('4466997','c-p6a','Benito','Gutierres','De la Cruz',71234560),('4598735','c-p6a','Juan Jose','Reyes','Blanco',61227167),('46513598','c-p5b','Valentina','Alfonzo','Mendez',76641330),('46567813','c-na','Valery','Mamani','Quispe',65879463),('46567913','c-p3a','Avigail','Avila','Fetzer',65958568),('46646655','c-p4b','Miguel','Fernandez','Barreras',66644531),('4665556','c-s6a','Damian','Fernadez','Robles',77665544),('4669422','c-s3a','Pamela','Lima','Blanco',71425360),('4679132','c-s3b','Fermando','Limachi','Huanca',76543210),('46791328','c-nb','Alejandro','Ramirez','Lopez',69143785),('4685279','c-p4b','Ronald Jheyson','Lima','Blanco',74003326),('4916783','c-na','Luz Maribel','Striker','Melendez',76665413),('4978135','c-p4b','Franz','Tola','Apaza',76598452),('55996660','c-p4b','Sofia','Romaniole','Ruiz',67342105),('7465133','c-p5a','Julio','Vergara','No se',74958132),('76431324','c-na','Johnson','Vazquez','Valdez',70134652),('76461532','c-p2a','Eva','Martinez','Holmes',64456519),('77884665','c-p6b','Antonella','Nickerson','Gonzales',73264105),('79468522','c-p3b','Mia','Owens','Hasrt',60022366),('79488665','c-p1b','David','Cepeda','Albarada',75319741),('798132','c-nb','Alejandro','Melendez','Lopes',76543210),('79985566','c-p4a','Paula','Velazques','Boyd',78985698),('86898986','c-p2a','Martin','Alvarez','Perez',60626366),('88558664','c-p5b','Santiago','Avila','Weiner',76451333),('9254419','c-na','Cristhian','Lima','Blanco',72514337),('94852634','c-p5a','Maria','Ruiz','Palacios',76666412);
/*!40000 ALTER TABLE `estudiante` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `materia`
--

DROP TABLE IF EXISTS `materia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `materia` (
  `cod_mat` varchar(8) NOT NULL,
  `nombre_mat` varchar(30) NOT NULL,
  PRIMARY KEY (`cod_mat`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `materia`
--

LOCK TABLES `materia` WRITE;
/*!40000 ALTER TABLE `materia` DISABLE KEYS */;
INSERT INTO `materia` VALUES ('m-ap','Artes Plasticas'),('m-aym','Aymara'),('m-bio','Geo-Biologia'),('m-cn','Ciencias Naturales'),('m-cs','Ciencias Sociales'),('m-ef','Educiacion Fisica'),('m-fil','Filosofia'),('m-fis','Fisica'),('m-gas','Gastronomia'),('m-ing','Ingles'),('m-len','Lenguaje y Comunicaciones'),('m-mat','Matematicas'),('m-mu','Musica'),('m-psi','Psicologia'),('m-qui','Quimica'),('m-rel','Religion'),('m-tec','Tecnica Tecnologia');
/*!40000 ALTER TABLE `materia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `nivel`
--

DROP TABLE IF EXISTS `nivel`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `nivel` (
  `nombre_nivel` varchar(10) NOT NULL,
  `cod_nivel` varchar(5) NOT NULL,
  PRIMARY KEY (`cod_nivel`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `nivel`
--

LOCK TABLES `nivel` WRITE;
/*!40000 ALTER TABLE `nivel` DISABLE KEYS */;
INSERT INTO `nivel` VALUES ('inicial','n-in'),('primaria','n-pri'),('secundaria','n-sec');
/*!40000 ALTER TABLE `nivel` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `nro_curso`
--

DROP TABLE IF EXISTS `nro_curso`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `nro_curso` (
  `nro` int(1) NOT NULL,
  `nombre` varchar(7) NOT NULL,
  PRIMARY KEY (`nro`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `nro_curso`
--

LOCK TABLES `nro_curso` WRITE;
/*!40000 ALTER TABLE `nro_curso` DISABLE KEYS */;
INSERT INTO `nro_curso` VALUES (0,'Inicial'),(1,'Primero'),(2,'Segundo'),(3,'Tercero'),(4,'Cuarto'),(5,'Quinto'),(6,'Sexto');
/*!40000 ALTER TABLE `nro_curso` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `paralelo`
--

DROP TABLE IF EXISTS `paralelo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `paralelo` (
  `nombre_par` varchar(1) NOT NULL,
  PRIMARY KEY (`nombre_par`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `paralelo`
--

LOCK TABLES `paralelo` WRITE;
/*!40000 ALTER TABLE `paralelo` DISABLE KEYS */;
INSERT INTO `paralelo` VALUES ('A'),('B'),('C');
/*!40000 ALTER TABLE `paralelo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `profesor`
--

DROP TABLE IF EXISTS `profesor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `profesor` (
  `ci_prof` varchar(10) NOT NULL,
  `nombre_prof` varchar(20) NOT NULL,
  `apellido_pat_prof` varchar(15) NOT NULL,
  `apellido_mat_prof` varchar(15) NOT NULL,
  `telefono_prof` int(8) NOT NULL,
  PRIMARY KEY (`ci_prof`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `profesor`
--

LOCK TABLES `profesor` WRITE;
/*!40000 ALTER TABLE `profesor` DISABLE KEYS */;
/*!40000 ALTER TABLE `profesor` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-11-25 23:33:56
