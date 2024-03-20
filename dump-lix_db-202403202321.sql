-- MySQL dump 10.13  Distrib 8.2.0, for macos13 (arm64)
--
-- Host: localhost    Database: lix_db
-- ------------------------------------------------------
-- Server version	8.2.0

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `lix_category`
--

DROP TABLE IF EXISTS `lix_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `lix_category` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(200) DEFAULT NULL,
  `is_delete` tinyint DEFAULT NULL,
  `timecreated` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `timemodified` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lix_category`
--

LOCK TABLES `lix_category` WRITE;
/*!40000 ALTER TABLE `lix_category` DISABLE KEYS */;
INSERT INTO `lix_category` VALUES (1,'Category 2',1,'2024-03-19 18:30:06','2024-03-19 18:30:31');
/*!40000 ALTER TABLE `lix_category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lix_credential`
--

DROP TABLE IF EXISTS `lix_credential`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `lix_credential` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_user` int NOT NULL,
  `general_pass` varchar(225) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lix_credential`
--

LOCK TABLES `lix_credential` WRITE;
/*!40000 ALTER TABLE `lix_credential` DISABLE KEYS */;
INSERT INTO `lix_credential` VALUES (1,1,'123456');
/*!40000 ALTER TABLE `lix_credential` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lix_inventory`
--

DROP TABLE IF EXISTS `lix_inventory`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `lix_inventory` (
  `id` int NOT NULL AUTO_INCREMENT,
  `total` int DEFAULT NULL,
  `subtotal` int DEFAULT NULL,
  `id_user` int DEFAULT NULL,
  `timecreated` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `timemodified` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lix_inventory`
--

LOCK TABLES `lix_inventory` WRITE;
/*!40000 ALTER TABLE `lix_inventory` DISABLE KEYS */;
/*!40000 ALTER TABLE `lix_inventory` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lix_menu`
--

DROP TABLE IF EXISTS `lix_menu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `lix_menu` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `description` text,
  `price` int DEFAULT NULL,
  `is_delete` tinyint DEFAULT NULL,
  `timecreated` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `timemodified` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lix_menu`
--

LOCK TABLES `lix_menu` WRITE;
/*!40000 ALTER TABLE `lix_menu` DISABLE KEYS */;
INSERT INTO `lix_menu` VALUES (1,'Nasi Goreng Jakarta2','2Nasi Goreng khas Jakarta dibuat dengan penuh sukacita.',30000,1,'2024-03-17 10:37:19','2024-03-17 15:19:32'),(2,'Nasi Goreng Jakarta 2','Nasi Goreng khas Jakarta dibuat dengan penuh sukacita.',20000,1,'2024-03-17 15:53:33','2024-03-17 15:53:33'),(3,'Nasi Goreng Jakarta 3','Nasi Goreng khas Jakarta dibuat dengan penuh sukacita.',20000,0,'2024-03-17 15:59:11','2024-03-17 15:59:11'),(4,'Nasi Goreng Jakarta 4','Nasi Goreng khas Jakarta dibuat dengan penuh sukacita.',20000,0,'2024-03-17 15:59:14','2024-03-17 15:59:14'),(5,'Nasi Goreng Jakarta 5','Nasi Goreng khas Jakarta dibuat dengan penuh sukacita.',20000,0,'2024-03-17 15:59:18','2024-03-17 15:59:18'),(6,'Nasi Goreng Jakarta 6','Nasi Goreng khas Jakarta dibuat dengan penuh sukacita.',20000,0,'2024-03-17 15:59:21','2024-03-17 15:59:21'),(7,'Nasi Goreng Jakarta 7','Nasi Goreng khas Jakarta dibuat dengan penuh sukacita.',20000,0,'2024-03-17 15:59:25','2024-03-17 15:59:25'),(8,'Nasi Goreng Jakarta 8','Nasi Goreng khas Jakarta dibuat dengan penuh sukacita.',20000,0,'2024-03-17 15:59:28','2024-03-17 15:59:28'),(9,'Nasi Goreng Jakarta 9','Nasi Goreng khas Jakarta dibuat dengan penuh sukacita.',20000,0,'2024-03-17 15:59:32','2024-03-17 15:59:32'),(10,'Nasi Goreng Jakarta 10','Nasi Goreng khas Jakarta dibuat dengan penuh sukacita.',20000,0,'2024-03-17 15:59:35','2024-03-17 15:59:35'),(11,'Nasi Goreng Jakarta 11','Nasi Goreng khas Jakarta dibuat dengan penuh sukacita.',20000,0,'2024-03-18 16:37:29','2024-03-18 16:37:29');
/*!40000 ALTER TABLE `lix_menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lix_token`
--

DROP TABLE IF EXISTS `lix_token`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `lix_token` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_user` int NOT NULL,
  `access_token` varchar(225) NOT NULL,
  `refresh_token` varchar(225) NOT NULL,
  `timecreated` timestamp NOT NULL,
  `timemodified` timestamp NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lix_token`
--

LOCK TABLES `lix_token` WRITE;
/*!40000 ALTER TABLE `lix_token` DISABLE KEYS */;
/*!40000 ALTER TABLE `lix_token` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lix_transaction`
--

DROP TABLE IF EXISTS `lix_transaction`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `lix_transaction` (
  `id` int NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lix_transaction`
--

LOCK TABLES `lix_transaction` WRITE;
/*!40000 ALTER TABLE `lix_transaction` DISABLE KEYS */;
/*!40000 ALTER TABLE `lix_transaction` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lix_transaction_detail`
--

DROP TABLE IF EXISTS `lix_transaction_detail`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `lix_transaction_detail` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_menu` int DEFAULT NULL,
  `id_transaction` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lix_transaction_detail`
--

LOCK TABLES `lix_transaction_detail` WRITE;
/*!40000 ALTER TABLE `lix_transaction_detail` DISABLE KEYS */;
/*!40000 ALTER TABLE `lix_transaction_detail` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lix_user`
--

DROP TABLE IF EXISTS `lix_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `lix_user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `no_telp` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `role` int NOT NULL,
  `timecreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `timemodified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lix_user`
--

LOCK TABLES `lix_user` WRITE;
/*!40000 ALTER TABLE `lix_user` DISABLE KEYS */;
INSERT INTO `lix_user` VALUES (1,'admin','Administrator',NULL,'admin@gmail.com',1,'2024-02-12 08:46:27','2024-02-12 08:46:27');
/*!40000 ALTER TABLE `lix_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'lix_db'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-03-20 23:21:08
