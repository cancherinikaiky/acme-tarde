CREATE DATABASE  IF NOT EXISTS `bd-mocitec-manha-tarde` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `bd-mocitec-manha-tarde`;
-- MySQL dump 10.13  Distrib 5.7.38, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: bd-mocitec-manha-tarde
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.24-MariaDB

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
-- Table structure for table `addresses`
--

DROP TABLE IF EXISTS `addresses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `addresses` (
                             `id` int(11) NOT NULL AUTO_INCREMENT,
                             `street` varchar(45) NOT NULL,
                             `number` varchar(45) NOT NULL,
                             `complement` varchar(45) NOT NULL,
                             `city` varchar(45) NOT NULL,
                             `state` varchar(45) NOT NULL,
                             `zipCode` varchar(45) NOT NULL,
                             `idUser` int(11) NOT NULL,
                             `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
                             `udated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
                             PRIMARY KEY (`id`),
                             KEY `fk_addresses_users_idx` (`idUser`),
                             CONSTRAINT `fk_addresses_users` FOREIGN KEY (`idUser`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `addresses`
--

LOCK TABLES `addresses` WRITE;
/*!40000 ALTER TABLE `addresses` DISABLE KEYS */;
/*!40000 ALTER TABLE `addresses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `authors`
--

DROP TABLE IF EXISTS `authors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `authors` (
                           `id` int(11) NOT NULL AUTO_INCREMENT,
                           `school` varchar(255) NOT NULL,
                           `idUser` int(11) NOT NULL,
                           PRIMARY KEY (`id`),
                           KEY `fk_authors_users1_idx` (`idUser`),
                           CONSTRAINT `fk_authors_users1` FOREIGN KEY (`idUser`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `authors`
--

LOCK TABLES `authors` WRITE;
/*!40000 ALTER TABLE `authors` DISABLE KEYS */;
INSERT INTO `authors` VALUES (1,'Charqueadas',2);
/*!40000 ALTER TABLE `authors` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `evaluates_project`
--

DROP TABLE IF EXISTS `evaluates_project`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `evaluates_project` (
                                     `id` int(11) NOT NULL AUTO_INCREMENT,
                                     `idEvaluators` int(11) NOT NULL,
                                     `idProjects` int(11) NOT NULL,
                                     PRIMARY KEY (`id`),
                                     KEY `fk_evaluators_has_projects_projects1_idx` (`idProjects`),
                                     KEY `fk_evaluators_has_projects_evaluators1_idx` (`idEvaluators`),
                                     CONSTRAINT `fk_evaluators_has_projects_evaluators1` FOREIGN KEY (`idEvaluators`) REFERENCES `evaluators` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
                                     CONSTRAINT `fk_evaluators_has_projects_projects1` FOREIGN KEY (`idProjects`) REFERENCES `projects` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `evaluates_project`
--

LOCK TABLES `evaluates_project` WRITE;
/*!40000 ALTER TABLE `evaluates_project` DISABLE KEYS */;
/*!40000 ALTER TABLE `evaluates_project` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `evaluators`
--

DROP TABLE IF EXISTS `evaluators`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `evaluators` (
                              `id` int(11) NOT NULL AUTO_INCREMENT,
                              `linkLattes` varchar(255) NOT NULL,
                              `idUser` int(11) NOT NULL,
                              PRIMARY KEY (`id`),
                              KEY `fk_evaluators_users1_idx` (`idUser`),
                              CONSTRAINT `fk_evaluators_users1` FOREIGN KEY (`idUser`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `evaluators`
--

LOCK TABLES `evaluators` WRITE;
/*!40000 ALTER TABLE `evaluators` DISABLE KEYS */;
INSERT INTO `evaluators` VALUES (1,'lLink lattes',3);
/*!40000 ALTER TABLE `evaluators` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `faq`
--

DROP TABLE IF EXISTS `faq`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `faq` (
                       `id` int(11) NOT NULL AUTO_INCREMENT,
                       `question` text NOT NULL,
                       `response` text NOT NULL,
                       `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
                       `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
                       PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `faq`
--

LOCK TABLES `faq` WRITE;
/*!40000 ALTER TABLE `faq` DISABLE KEYS */;
/*!40000 ALTER TABLE `faq` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `projects`
--

DROP TABLE IF EXISTS `projects`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `projects` (
                            `id` int(11) NOT NULL AUTO_INCREMENT,
                            `title` varchar(255) NOT NULL,
                            `abstract` varchar(255) NOT NULL,
                            `text` varchar(255) NOT NULL,
                            `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
                            `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
                            PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `projects`
--

LOCK TABLES `projects` WRITE;
/*!40000 ALTER TABLE `projects` DISABLE KEYS */;
INSERT INTO `projects` VALUES (13,'Título','Resumo','Texto','2022-08-09 20:02:16',NULL),(14,'Título 2','Resumo 2','Texto 2','2022-08-09 20:10:39',NULL);
/*!40000 ALTER TABLE `projects` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
                         `id` int(11) NOT NULL AUTO_INCREMENT,
                         `name` varchar(45) NOT NULL,
                         `email` varchar(45) NOT NULL,
                         `password` varchar(255) NOT NULL,
                         `document` varchar(45) DEFAULT NULL,
                         `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
                         `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
                         PRIMARY KEY (`id`),
                         UNIQUE KEY `email_UNIQUE` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Fábio','fabio@gmail.com','sfsdfsdfsdf','3454363','2022-07-15 11:50:25',NULL),(2,'Aluno01','aluno@gmail.com','1234567','12345','2022-07-25 11:36:46',NULL),(3,'Avaliador01','avaliador@gmail.com','1234','1234','2022-07-25 12:01:15',NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `write_project`
--

DROP TABLE IF EXISTS `write_project`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `write_project` (
                                 `id` int(11) NOT NULL AUTO_INCREMENT,
                                 `idAuthors` int(11) NOT NULL,
                                 `idProjects` int(11) NOT NULL,
                                 PRIMARY KEY (`id`),
                                 KEY `fk_authors_has_projects_projects1_idx` (`idProjects`),
                                 KEY `fk_authors_has_projects_authors1_idx` (`idAuthors`),
                                 CONSTRAINT `fk_authors_has_projects_authors1` FOREIGN KEY (`idAuthors`) REFERENCES `authors` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
                                 CONSTRAINT `fk_authors_has_projects_projects1` FOREIGN KEY (`idProjects`) REFERENCES `projects` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `write_project`
--

LOCK TABLES `write_project` WRITE;
/*!40000 ALTER TABLE `write_project` DISABLE KEYS */;
/*!40000 ALTER TABLE `write_project` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'bd-mocitec-manha-tarde'
--

--
-- Dumping routines for database 'bd-mocitec-manha-tarde'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-08-26  8:34:56