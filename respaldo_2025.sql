-- MySQL dump 10.13  Distrib 8.0.37, for Win64 (x86_64)
--
-- Host: localhost    Database: mnemosine_db
-- ------------------------------------------------------
-- Server version	8.0.37

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
-- Table structure for table `amasados`
--

DROP TABLE IF EXISTS `amasados`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `amasados` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tiempo` date DEFAULT NULL,
  `preparacion` decimal(5,3) DEFAULT NULL,
  `orp_id` bigint unsigned DEFAULT NULL,
  `tiempo_amasado1` decimal(5,2) DEFAULT NULL,
  `tiempo_amasado2` decimal(5,2) DEFAULT NULL,
  `temperatura` decimal(5,2) DEFAULT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `responsable` bigint unsigned DEFAULT NULL,
  `observaciones` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `correccion` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `amasados_orp_id_foreign` (`orp_id`),
  KEY `amasados_user_id_foreign` (`user_id`),
  KEY `amasados_responsable_foreign` (`responsable`),
  CONSTRAINT `amasados_orp_id_foreign` FOREIGN KEY (`orp_id`) REFERENCES `orps` (`id`) ON DELETE CASCADE,
  CONSTRAINT `amasados_responsable_foreign` FOREIGN KEY (`responsable`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  CONSTRAINT `amasados_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `amasados`
--

LOCK TABLES `amasados` WRITE;
/*!40000 ALTER TABLE `amasados` DISABLE KEYS */;
INSERT INTO `amasados` VALUES (3,'2024-12-19',1.000,7,20.00,15.00,28.00,1,1,'ninguna','correcion','2024-12-19 12:56:17','2025-01-07 14:55:04'),(4,'2024-12-19',0.500,7,87.00,32.00,196.20,1,1,'ojo','rule','2024-12-19 13:10:30','2024-12-19 13:10:30'),(5,'2024-12-19',2.000,7,80.00,25.00,120.00,1,1,'observaciones','correciones','2024-12-19 13:16:25','2024-12-19 13:16:25'),(6,'2024-12-20',NULL,7,1.00,2.00,3.00,1,1,'mesjb','hbhjes','2024-12-20 16:09:57','2025-01-06 15:46:39'),(7,'2025-01-07',1.000,7,20.00,15.00,28.00,1,1,NULL,NULL,'2025-01-07 14:53:08','2025-01-07 14:53:08');
/*!40000 ALTER TABLE `amasados` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `balances`
--

DROP TABLE IF EXISTS `balances`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `balances` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tiempo` date DEFAULT NULL,
  `orp_id` bigint unsigned DEFAULT NULL,
  `preparacion` decimal(5,3) DEFAULT NULL,
  `cantidad` int DEFAULT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `observaciones` text COLLATE utf8mb4_unicode_ci,
  `correccion` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `balances_orp_id_foreign` (`orp_id`),
  KEY `balances_user_id_foreign` (`user_id`),
  CONSTRAINT `balances_orp_id_foreign` FOREIGN KEY (`orp_id`) REFERENCES `orps` (`id`) ON DELETE CASCADE,
  CONSTRAINT `balances_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `balances`
--

LOCK TABLES `balances` WRITE;
/*!40000 ALTER TABLE `balances` DISABLE KEYS */;
INSERT INTO `balances` VALUES (1,'2025-01-10',7,1.000,20,1,NULL,NULL,'2025-01-10 20:43:02','2025-01-10 20:43:02');
/*!40000 ALTER TABLE `balances` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cache`
--

DROP TABLE IF EXISTS `cache`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache` (
  `key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache`
--

LOCK TABLES `cache` WRITE;
/*!40000 ALTER TABLE `cache` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cache_locks`
--

DROP TABLE IF EXISTS `cache_locks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache_locks` (
  `key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache_locks`
--

LOCK TABLES `cache_locks` WRITE;
/*!40000 ALTER TABLE `cache_locks` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache_locks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cantidad_preparadas`
--

DROP TABLE IF EXISTS `cantidad_preparadas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cantidad_preparadas` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tiempo` date DEFAULT NULL,
  `orp_id` bigint unsigned DEFAULT NULL,
  `preparacion` decimal(5,3) DEFAULT NULL,
  `cantidad_producto_enviado` int DEFAULT NULL,
  `cantidad_producto_recepcionado` int DEFAULT NULL,
  `temperatura_vaciado` decimal(5,2) DEFAULT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `responsable` bigint unsigned DEFAULT NULL,
  `observaciones` text COLLATE utf8mb4_unicode_ci,
  `correccion` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `cantidad_preparadas_orp_id_foreign` (`orp_id`),
  KEY `cantidad_preparadas_user_id_foreign` (`user_id`),
  KEY `cantidad_preparadas_responsable_foreign` (`responsable`),
  CONSTRAINT `cantidad_preparadas_orp_id_foreign` FOREIGN KEY (`orp_id`) REFERENCES `orps` (`id`) ON DELETE CASCADE,
  CONSTRAINT `cantidad_preparadas_responsable_foreign` FOREIGN KEY (`responsable`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  CONSTRAINT `cantidad_preparadas_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cantidad_preparadas`
--

LOCK TABLES `cantidad_preparadas` WRITE;
/*!40000 ALTER TABLE `cantidad_preparadas` DISABLE KEYS */;
INSERT INTO `cantidad_preparadas` VALUES (1,'2025-01-09',7,1.000,20,15,10.00,1,1,'njesnfje','njfknjkse','2025-01-09 12:57:10','2025-01-09 12:57:10');
/*!40000 ALTER TABLE `cantidad_preparadas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cortes`
--

DROP TABLE IF EXISTS `cortes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cortes` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tiempo` date DEFAULT NULL,
  `orp_id` bigint unsigned DEFAULT NULL,
  `preparacion` decimal(5,3) DEFAULT NULL,
  `temperatura_corte` decimal(5,2) DEFAULT NULL,
  `calibracion` tinyint(1) DEFAULT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `responsable` bigint unsigned DEFAULT NULL,
  `observaciones` text COLLATE utf8mb4_unicode_ci,
  `correccion` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `cortes_orp_id_foreign` (`orp_id`),
  KEY `cortes_user_id_foreign` (`user_id`),
  KEY `cortes_responsable_foreign` (`responsable`),
  CONSTRAINT `cortes_orp_id_foreign` FOREIGN KEY (`orp_id`) REFERENCES `orps` (`id`) ON DELETE CASCADE,
  CONSTRAINT `cortes_responsable_foreign` FOREIGN KEY (`responsable`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  CONSTRAINT `cortes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cortes`
--

LOCK TABLES `cortes` WRITE;
/*!40000 ALTER TABLE `cortes` DISABLE KEYS */;
INSERT INTO `cortes` VALUES (1,'2025-01-09',7,1.000,10.00,1,1,1,'nfjafbe','njnfgrd\n','2025-01-09 13:19:23','2025-01-09 13:19:23'),(2,'2025-01-09',7,1.000,36.00,NULL,1,1,'jfs',NULL,'2025-01-09 13:19:40','2025-01-09 13:19:40');
/*!40000 ALTER TABLE `cortes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `decorados`
--

DROP TABLE IF EXISTS `decorados`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `decorados` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `orp_id` bigint unsigned DEFAULT NULL,
  `tiempo` date DEFAULT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `responsable` bigint unsigned DEFAULT NULL,
  `huevo` decimal(8,4) DEFAULT NULL,
  `semilla` decimal(8,4) DEFAULT NULL,
  `polenta` decimal(8,4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `decorados_orp_id_foreign` (`orp_id`),
  KEY `decorados_user_id_foreign` (`user_id`),
  KEY `decorados_responsable_foreign` (`responsable`),
  CONSTRAINT `decorados_orp_id_foreign` FOREIGN KEY (`orp_id`) REFERENCES `orps` (`id`) ON DELETE CASCADE,
  CONSTRAINT `decorados_responsable_foreign` FOREIGN KEY (`responsable`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  CONSTRAINT `decorados_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `decorados`
--

LOCK TABLES `decorados` WRITE;
/*!40000 ALTER TABLE `decorados` DISABLE KEYS */;
INSERT INTO `decorados` VALUES (1,7,'2024-12-20',1,1,0.1250,1.0000,1.8000,'2024-12-20 16:10:37','2024-12-20 16:10:37'),(2,7,'2024-12-20',1,1,11.0000,22.0000,33.0000,'2024-12-20 16:10:38','2025-01-06 16:07:37'),(3,7,'2025-01-06',1,1,4.0000,5.0000,6.0000,'2025-01-06 17:23:45','2025-01-06 17:23:45');
/*!40000 ALTER TABLE `decorados` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dimensions`
--

DROP TABLE IF EXISTS `dimensions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `dimensions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `orp_id` bigint unsigned DEFAULT NULL,
  `preparacion` decimal(5,3) DEFAULT NULL,
  `altura_total` decimal(5,2) DEFAULT NULL,
  `diametro` decimal(5,2) DEFAULT NULL,
  `altura_base` decimal(5,2) DEFAULT NULL,
  `altura_feta_centro` decimal(5,2) DEFAULT NULL,
  `altura_split` decimal(5,2) DEFAULT NULL,
  `ancho_split` decimal(5,2) DEFAULT NULL,
  `peso` decimal(5,2) DEFAULT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `responsable` bigint unsigned DEFAULT NULL,
  `observaciones` text COLLATE utf8mb4_unicode_ci,
  `correccion` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `dimensions_orp_id_foreign` (`orp_id`),
  KEY `dimensions_user_id_foreign` (`user_id`),
  KEY `dimensions_responsable_foreign` (`responsable`),
  CONSTRAINT `dimensions_orp_id_foreign` FOREIGN KEY (`orp_id`) REFERENCES `orps` (`id`) ON DELETE CASCADE,
  CONSTRAINT `dimensions_responsable_foreign` FOREIGN KEY (`responsable`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  CONSTRAINT `dimensions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dimensions`
--

LOCK TABLES `dimensions` WRITE;
/*!40000 ALTER TABLE `dimensions` DISABLE KEYS */;
INSERT INTO `dimensions` VALUES (1,7,1.000,1.00,2.00,3.00,4.00,5.00,6.00,7.00,1,1,'mfejsknfsej','knfjsnfjks','2025-01-09 14:16:06','2025-01-09 14:16:06'),(2,7,2.000,12.00,12.00,12.00,12.00,12.00,12.00,12.00,1,1,'mfesjknj','njng','2025-01-10 15:11:01','2025-01-10 15:11:01');
/*!40000 ALTER TABLE `dimensions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `distribucions`
--

DROP TABLE IF EXISTS `distribucions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `distribucions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tiempo` date DEFAULT NULL,
  `orp_id` bigint unsigned DEFAULT NULL,
  `razon_social` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ubicacion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cantidad` int DEFAULT NULL,
  `observaciones` text COLLATE utf8mb4_unicode_ci,
  `correccion` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `distribucions_orp_id_foreign` (`orp_id`),
  CONSTRAINT `distribucions_orp_id_foreign` FOREIGN KEY (`orp_id`) REFERENCES `orps` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `distribucions`
--

LOCK TABLES `distribucions` WRITE;
/*!40000 ALTER TABLE `distribucions` DISABLE KEYS */;
INSERT INTO `distribucions` VALUES (1,'2025-01-11',7,'BURGER KING - LA PAZ','San Miguel',123,NULL,NULL,'2025-01-11 15:25:10','2025-01-11 15:25:10'),(2,'2025-01-11',7,'BURGER KING - COCHABAMBA','Ballivian',569,NULL,NULL,'2025-01-11 16:04:10','2025-01-11 16:04:10'),(3,'2025-01-11',7,'BURGER KING - LA PAZ','Obrajes',546,NULL,NULL,'2025-01-11 16:04:22','2025-01-11 16:04:22');
/*!40000 ALTER TABLE `distribucions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `division_formado_decorados`
--

DROP TABLE IF EXISTS `division_formado_decorados`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `division_formado_decorados` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tiempo` date DEFAULT NULL,
  `preparacion` decimal(5,3) DEFAULT NULL,
  `orp_id` bigint unsigned DEFAULT NULL,
  `peso_crudo1` decimal(5,2) DEFAULT NULL,
  `peso_crudo2` decimal(5,2) DEFAULT NULL,
  `peso_crudo3` decimal(5,2) DEFAULT NULL,
  `peso_crudo4` decimal(5,2) DEFAULT NULL,
  `peso_ajonjoli1` decimal(5,2) DEFAULT NULL,
  `peso_ajonjoli2` decimal(5,2) DEFAULT NULL,
  `peso_ajonjoli3` decimal(5,2) DEFAULT NULL,
  `peso_ajonjoli4` decimal(5,2) DEFAULT NULL,
  `centreado` tinyint(1) DEFAULT NULL,
  `uniformidad` tinyint(1) DEFAULT NULL,
  `homogeneidad` tinyint(1) DEFAULT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `responsable_pintado` bigint unsigned DEFAULT NULL,
  `responsable_decorado` bigint unsigned DEFAULT NULL,
  `observaciones` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `correccion` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `division_formado_decorados_orp_id_foreign` (`orp_id`),
  KEY `division_formado_decorados_user_id_foreign` (`user_id`),
  KEY `division_formado_decorados_responsable_pintado_foreign` (`responsable_pintado`),
  KEY `division_formado_decorados_responsable_decorado_foreign` (`responsable_decorado`),
  CONSTRAINT `division_formado_decorados_orp_id_foreign` FOREIGN KEY (`orp_id`) REFERENCES `orps` (`id`) ON DELETE CASCADE,
  CONSTRAINT `division_formado_decorados_responsable_decorado_foreign` FOREIGN KEY (`responsable_decorado`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  CONSTRAINT `division_formado_decorados_responsable_pintado_foreign` FOREIGN KEY (`responsable_pintado`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  CONSTRAINT `division_formado_decorados_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `division_formado_decorados`
--

LOCK TABLES `division_formado_decorados` WRITE;
/*!40000 ALTER TABLE `division_formado_decorados` DISABLE KEYS */;
INSERT INTO `division_formado_decorados` VALUES (1,'2024-12-27',1.000,7,10.00,20.00,30.00,40.00,50.00,60.00,70.00,80.00,1,0,1,1,1,1,'Observacionesnhsbjh','Correctivafnjskfnsejkfnesj','2024-12-27 13:46:48','2025-01-06 18:58:53'),(2,'2024-12-27',2.000,7,12.00,11.00,10.00,11.00,15.00,1.00,2.00,12.00,1,1,1,1,1,1,'NIGUNO','ALGUNO','2024-12-27 14:45:40','2024-12-27 14:45:40'),(3,'2024-12-27',1.000,7,1.00,23.00,3.00,5.00,51.00,2.00,5.00,3.00,1,1,1,1,1,1,'NINGUNO','MFSEJNFSEJ','2024-12-27 18:49:31','2024-12-27 18:49:31'),(4,'2024-12-27',1.000,7,2.00,3.00,4.00,5.00,1.00,5.00,3.00,5.00,NULL,1,NULL,1,1,1,'bh','bhj','2024-12-27 18:50:26','2024-12-27 18:50:26');
/*!40000 ALTER TABLE `division_formado_decorados` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `documentacions`
--

DROP TABLE IF EXISTS `documentacions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `documentacions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `codigo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `titulo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `tipo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `version` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha_creacion` datetime NOT NULL,
  `creador_id` bigint unsigned NOT NULL,
  `fecha_revision` datetime DEFAULT NULL,
  `revisor_id` bigint unsigned DEFAULT NULL,
  `fecha_aprobacion` datetime DEFAULT NULL,
  `aprovador_id` bigint unsigned DEFAULT NULL,
  `pdf_path` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `word_path` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `documentacions_creador_id_foreign` (`creador_id`),
  KEY `documentacions_revisor_id_foreign` (`revisor_id`),
  KEY `documentacions_aprovador_id_foreign` (`aprovador_id`),
  CONSTRAINT `documentacions_aprovador_id_foreign` FOREIGN KEY (`aprovador_id`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  CONSTRAINT `documentacions_creador_id_foreign` FOREIGN KEY (`creador_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  CONSTRAINT `documentacions_revisor_id_foreign` FOREIGN KEY (`revisor_id`) REFERENCES `users` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `documentacions`
--

LOCK TABLES `documentacions` WRITE;
/*!40000 ALTER TABLE `documentacions` DISABLE KEYS */;
/*!40000 ALTER TABLE `documentacions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fermentacions`
--

DROP TABLE IF EXISTS `fermentacions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `fermentacions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tiempo` date DEFAULT NULL,
  `preparacion` decimal(5,3) DEFAULT NULL,
  `orp_id` bigint unsigned DEFAULT NULL,
  `ncamara` int DEFAULT NULL,
  `hora_inicio` time DEFAULT NULL,
  `humedad` decimal(5,2) DEFAULT NULL,
  `temperatura` decimal(5,2) DEFAULT NULL,
  `hora_salida` time DEFAULT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `responsable` bigint unsigned DEFAULT NULL,
  `observaciones` text COLLATE utf8mb4_unicode_ci,
  `correccion` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fermentacions_orp_id_foreign` (`orp_id`),
  KEY `fermentacions_user_id_foreign` (`user_id`),
  KEY `fermentacions_responsable_foreign` (`responsable`),
  CONSTRAINT `fermentacions_orp_id_foreign` FOREIGN KEY (`orp_id`) REFERENCES `orps` (`id`) ON DELETE CASCADE,
  CONSTRAINT `fermentacions_responsable_foreign` FOREIGN KEY (`responsable`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  CONSTRAINT `fermentacions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fermentacions`
--

LOCK TABLES `fermentacions` WRITE;
/*!40000 ALTER TABLE `fermentacions` DISABLE KEYS */;
INSERT INTO `fermentacions` VALUES (1,'2024-12-28',1.000,7,10,'10:10:00',10.00,10.00,'10:11:00',1,1,'ninguno123123','otro4564856','2024-12-28 13:58:10','2025-01-06 19:47:01'),(2,'2025-01-06',2.000,7,1,'10:30:00',1.00,2.00,'10:50:00',1,1,'fnejsnfejsnj','njfesnjkfsenk','2025-01-06 19:06:05','2025-01-07 15:16:38'),(3,'2025-01-06',3.000,7,2,'11:20:00',8.00,5.00,'11:50:00',1,1,'bfhsbfehb','bhjsbhfseb','2025-01-06 19:07:12','2025-01-07 15:16:41'),(4,'2025-01-06',2.000,7,9,'10:10:00',11.00,12.00,'13:13:00',1,1,'14141414','1515151515','2025-01-06 19:15:03','2025-01-06 19:15:03'),(5,'2025-01-06',2.000,7,5,'00:00:00',959.00,59.00,'05:00:00',1,1,'59+59+','59+59+','2025-01-06 19:15:46','2025-01-06 19:15:46'),(6,'2025-01-06',3.000,7,1,'05:45:00',15.00,15.00,'15:15:00',1,1,'156156','15615616','2025-01-06 19:24:24','2025-01-06 19:24:24'),(7,'2025-01-06',4.000,7,2,'00:00:00',1.00,2.00,'03:03:00',1,1,'bhsebhjb','hbhjbfhsbfs','2025-01-06 19:24:56','2025-01-06 19:24:56'),(8,'2025-01-07',0.500,7,23,'10:20:00',12.00,11.00,'11:20:00',1,1,'\n',NULL,'2025-01-07 20:53:51','2025-01-07 20:53:51');
/*!40000 ALTER TABLE `fermentacions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `higiene_personals`
--

DROP TABLE IF EXISTS `higiene_personals`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `higiene_personals` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `supervisor_id` bigint unsigned NOT NULL,
  `trabajador_id` bigint unsigned NOT NULL,
  `tiempo` datetime NOT NULL,
  `uniforme` tinyint(1) NOT NULL,
  `higiene` tinyint(1) NOT NULL,
  `salud` tinyint(1) NOT NULL,
  `objetos_extranos` tinyint(1) NOT NULL,
  `observaciones` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `correccion` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `higiene_personals_supervisor_id_foreign` (`supervisor_id`),
  KEY `higiene_personals_trabajador_id_foreign` (`trabajador_id`),
  CONSTRAINT `higiene_personals_supervisor_id_foreign` FOREIGN KEY (`supervisor_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  CONSTRAINT `higiene_personals_trabajador_id_foreign` FOREIGN KEY (`trabajador_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `higiene_personals`
--

LOCK TABLES `higiene_personals` WRITE;
/*!40000 ALTER TABLE `higiene_personals` DISABLE KEYS */;
INSERT INTO `higiene_personals` VALUES (1,1,1,'2024-11-13 20:40:26',1,1,1,0,'fesnjfe','nfjkesnfks','2024-11-14 00:40:26','2024-11-14 00:40:26'),(2,1,1,'2024-11-14 18:25:46',1,1,1,1,NULL,NULL,'2024-11-14 22:25:46','2024-11-14 22:25:46'),(3,1,8,'2024-11-14 18:43:32',1,1,1,1,NULL,NULL,'2024-11-14 22:43:32','2024-11-14 22:43:32'),(4,1,1,'2024-11-14 18:43:47',1,1,1,1,NULL,NULL,'2024-11-14 22:43:47','2024-11-14 22:43:47'),(5,1,1,'2024-11-18 14:02:13',1,1,1,1,NULL,NULL,'2024-11-18 18:02:13','2024-11-18 18:02:13'),(6,1,1,'2024-11-18 10:05:49',1,1,1,1,NULL,NULL,'2024-11-18 14:05:49','2024-11-18 14:05:49'),(7,1,2,'2024-12-16 08:41:26',1,1,1,1,NULL,NULL,'2024-12-16 12:41:26','2024-12-16 12:41:26'),(8,1,1,'2024-12-16 08:41:33',1,1,1,1,NULL,NULL,'2024-12-16 12:41:33','2024-12-16 12:41:33'),(9,1,17,'2024-12-16 08:42:10',1,1,1,1,NULL,NULL,'2024-12-16 12:42:10','2024-12-16 12:42:10'),(10,1,2,'2024-12-16 08:46:04',1,1,1,1,NULL,NULL,'2024-12-16 12:46:04','2024-12-16 12:46:04'),(11,1,4,'2024-12-16 10:22:49',1,0,1,1,'ba├▒atecersd','no mis botones de gomitas','2024-12-16 14:22:49','2024-12-16 14:22:49'),(12,1,6,'2024-12-16 10:24:14',0,1,1,1,'vino en calzones','le dimos falda','2024-12-16 14:24:14','2024-12-16 14:24:14'),(13,1,4,'2024-12-16 10:25:53',1,1,1,0,'se lo encontro con un capibara','lo ba├▒amos y le dimos cafe','2024-12-16 14:25:53','2024-12-16 14:25:53'),(14,1,2,'2024-12-16 10:29:31',1,1,1,1,NULL,NULL,'2024-12-16 14:29:31','2024-12-16 14:29:31'),(15,1,3,'2024-12-16 10:36:44',1,1,1,1,NULL,NULL,'2024-12-16 14:36:44','2024-12-16 14:36:44'),(16,1,16,'2024-12-16 10:37:33',1,1,1,1,NULL,NULL,'2024-12-16 14:37:33','2024-12-16 14:37:33'),(17,1,11,'2024-12-16 10:37:36',1,1,1,1,NULL,NULL,'2024-12-16 14:37:36','2024-12-16 14:37:36'),(18,1,9,'2024-12-16 10:37:39',1,1,1,1,NULL,NULL,'2024-12-16 14:37:39','2024-12-16 14:37:39'),(19,1,7,'2024-12-16 10:37:55',1,1,1,1,NULL,NULL,'2024-12-16 14:37:55','2024-12-16 14:37:55'),(20,1,10,'2024-12-16 10:37:58',1,1,1,1,NULL,NULL,'2024-12-16 14:37:58','2024-12-16 14:37:58'),(21,1,18,'2024-12-16 10:43:37',1,1,0,0,'aaaaaaaaaaa','a','2024-12-16 14:43:37','2024-12-16 14:43:37'),(22,1,78,'2024-12-16 10:44:52',1,1,1,1,NULL,NULL,'2024-12-16 14:44:52','2024-12-16 14:44:52'),(23,1,53,'2024-12-16 10:44:54',1,1,1,1,NULL,NULL,'2024-12-16 14:44:54','2024-12-16 14:44:54'),(24,1,84,'2024-12-16 10:45:03',1,1,1,1,NULL,NULL,'2024-12-16 14:45:03','2024-12-16 14:45:03'),(25,1,23,'2024-12-16 10:45:13',1,1,1,1,NULL,NULL,'2024-12-16 14:45:13','2024-12-16 14:45:13'),(26,1,5,'2024-12-16 10:53:23',1,1,1,1,NULL,NULL,'2024-12-16 14:53:23','2024-12-16 14:53:23'),(27,1,1,'2024-12-16 11:04:51',1,0,1,1,'asd','sda','2024-12-16 15:04:51','2024-12-16 15:04:51');
/*!40000 ALTER TABLE `higiene_personals` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `horneados`
--

DROP TABLE IF EXISTS `horneados`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `horneados` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tiempo` date DEFAULT NULL,
  `preparacion` decimal(5,3) DEFAULT NULL,
  `orp_id` bigint unsigned DEFAULT NULL,
  `verificacion_corte` tinyint(1) DEFAULT NULL,
  `nhorno` int DEFAULT NULL,
  `tiempo_horneado` time DEFAULT NULL,
  `temperatura` decimal(5,2) DEFAULT NULL,
  `temperatura_nucleo` decimal(5,2) DEFAULT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `responsable` bigint unsigned DEFAULT NULL,
  `observaciones` text COLLATE utf8mb4_unicode_ci,
  `correccion` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `horneados_orp_id_foreign` (`orp_id`),
  KEY `horneados_user_id_foreign` (`user_id`),
  KEY `horneados_responsable_foreign` (`responsable`),
  CONSTRAINT `horneados_orp_id_foreign` FOREIGN KEY (`orp_id`) REFERENCES `orps` (`id`) ON DELETE CASCADE,
  CONSTRAINT `horneados_responsable_foreign` FOREIGN KEY (`responsable`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  CONSTRAINT `horneados_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `horneados`
--

LOCK TABLES `horneados` WRITE;
/*!40000 ALTER TABLE `horneados` DISABLE KEYS */;
INSERT INTO `horneados` VALUES (1,'2024-12-28',1.000,7,NULL,6,'22:15:00',110.00,89.30,1,1,'mjeksbfh','bhfsebfhes','2024-12-28 14:26:57','2024-12-28 14:26:57'),(2,'2025-01-06',0.500,7,NULL,1,'10:10:00',2.00,3.00,1,3,'123456','123456','2025-01-06 20:21:29','2025-01-06 20:21:29'),(3,'2025-01-06',2.000,7,1,1,'11:11:00',66.00,66.00,1,3,NULL,'BHJBHJBHJ','2025-01-06 20:24:07','2025-01-06 20:24:07'),(4,'2025-01-06',2.000,7,1,45,'12:12:00',12.00,12.00,1,1,'121212121','21212121213','2025-01-06 20:25:45','2025-01-06 20:25:45'),(5,'2025-01-06',4.000,7,NULL,4,'05:02:00',3.00,2.00,1,1,'456456','156156','2025-01-06 20:27:39','2025-01-06 20:27:39'),(6,'2025-01-10',3.000,7,NULL,5,'10:20:00',0.00,0.00,1,1,NULL,'fesfs','2025-01-10 13:41:03','2025-01-10 13:41:03');
/*!40000 ALTER TABLE `horneados` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `items`
--

DROP TABLE IF EXISTS `items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `items` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `codigo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nombre` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `items`
--

LOCK TABLES `items` WRITE;
/*!40000 ALTER TABLE `items` DISABLE KEYS */;
INSERT INTO `items` VALUES (1,'MP00038','AZUCAR',NULL,NULL),(2,'MP00219','LECHE',NULL,NULL),(3,'MP00166','GLUTEN',NULL,NULL),(4,'MP00213','SAL YODADA',NULL,NULL),(5,'MP00224','PROPIONATO DE CALCIO',NULL,NULL),(6,'MP00143','ESTEAORIL LACTILATO DE SODIO (SSL)',NULL,NULL),(7,'MP00347','ALMIDON',NULL,NULL),(8,'MP00142','LECITINA DE SOYA',NULL,NULL),(9,'MP00170','EXTRACTO DE MALTA',NULL,NULL),(10,'MP00045','MANTECA',NULL,NULL),(11,'MP00148','EMULSIFICANTE',NULL,NULL),(12,'MP00001','HARINA DE TRIGO',NULL,NULL),(13,'MP00052','LEVADURA',NULL,NULL),(14,'MP00000','AGUA',NULL,NULL),(15,'MP00212','HUEVO EN POLVO',NULL,NULL),(16,'MP00021','SEMILLA DE AJONJOLI',NULL,NULL),(17,'MP00427','POLENTA',NULL,NULL);
/*!40000 ALTER TABLE `items` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `job_batches`
--

DROP TABLE IF EXISTS `job_batches`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `job_batches` (
  `id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `job_batches`
--

LOCK TABLES `job_batches` WRITE;
/*!40000 ALTER TABLE `job_batches` DISABLE KEYS */;
/*!40000 ALTER TABLE `job_batches` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint unsigned NOT NULL,
  `reserved_at` int unsigned DEFAULT NULL,
  `available_at` int unsigned NOT NULL,
  `created_at` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jobs`
--

LOCK TABLES `jobs` WRITE;
/*!40000 ALTER TABLE `jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lavado_manos`
--

DROP TABLE IF EXISTS `lavado_manos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `lavado_manos` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tiempo` datetime NOT NULL,
  `user_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `lavado_manos_user_id_foreign` (`user_id`),
  CONSTRAINT `lavado_manos_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lavado_manos`
--

LOCK TABLES `lavado_manos` WRITE;
/*!40000 ALTER TABLE `lavado_manos` DISABLE KEYS */;
INSERT INTO `lavado_manos` VALUES (1,'2024-12-07 09:17:44',1,'2024-12-07 13:17:44','2024-12-07 13:17:44'),(2,'2024-12-18 08:38:39',1,'2024-12-18 12:38:39','2024-12-18 12:38:39'),(3,'2024-12-28 10:56:12',1,'2024-12-28 14:56:12','2024-12-28 14:56:12');
/*!40000 ALTER TABLE `lavado_manos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `maquina_equipos`
--

DROP TABLE IF EXISTS `maquina_equipos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `maquina_equipos` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `codigo_interno` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `codigo_contable` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linea` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tipo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `marca` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `procedencia` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `voltaje` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `frecuencia` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revision_rodamiento_dia` tinyint(1) DEFAULT NULL,
  `verificacion_ruido_dia` tinyint(1) DEFAULT NULL,
  `verificacion_vibracion_dia` tinyint(1) DEFAULT NULL,
  `revision_retenes_dia` tinyint(1) DEFAULT NULL,
  `correas_poleas_cadenas_dia` tinyint(1) DEFAULT NULL,
  `revision_cinta_dia` tinyint(1) DEFAULT NULL,
  `lubricacion_dia` tinyint(1) DEFAULT NULL,
  `revision_motores_dia` tinyint(1) DEFAULT NULL,
  `revision_sensores_dia` tinyint(1) DEFAULT NULL,
  `limpieza_general_dia` tinyint(1) DEFAULT NULL,
  `revision_botoneras_dia` tinyint(1) DEFAULT NULL,
  `revision_parada_emergencia_dia` tinyint(1) DEFAULT NULL,
  `revision_panel_electrico_dia` tinyint(1) DEFAULT NULL,
  `calibracion_dia` tinyint(1) DEFAULT NULL,
  `funcionamiento_dia` tinyint(1) DEFAULT NULL,
  `revision_rodamiento_semestral` tinyint(1) DEFAULT NULL,
  `verificacion_ruido_semestral` tinyint(1) DEFAULT NULL,
  `verificacion_vibracion_semestral` tinyint(1) DEFAULT NULL,
  `revision_retenes_semestral` tinyint(1) DEFAULT NULL,
  `correas_poleas_cadenas_semestral` tinyint(1) DEFAULT NULL,
  `revision_cinta_semestral` tinyint(1) DEFAULT NULL,
  `lubricacion_semestral` tinyint(1) DEFAULT NULL,
  `revision_motores_semestral` tinyint(1) DEFAULT NULL,
  `revision_sensores_semestral` tinyint(1) DEFAULT NULL,
  `limpieza_general_semestral` tinyint(1) DEFAULT NULL,
  `revision_botoneras_semestral` tinyint(1) DEFAULT NULL,
  `revision_parada_emergencia_semestral` tinyint(1) DEFAULT NULL,
  `revision_panel_electrico_semestral` tinyint(1) DEFAULT NULL,
  `calibracion_semestral` tinyint(1) DEFAULT NULL,
  `funcionamiento_semestral` tinyint(1) DEFAULT NULL,
  `revision_rodamiento_anual` tinyint(1) DEFAULT NULL,
  `verificacion_ruido_anual` tinyint(1) DEFAULT NULL,
  `verificacion_vibracion_anual` tinyint(1) DEFAULT NULL,
  `revision_retenes_anual` tinyint(1) DEFAULT NULL,
  `correas_poleas_cadenas_anual` tinyint(1) DEFAULT NULL,
  `revision_cinta_anual` tinyint(1) DEFAULT NULL,
  `lubricacion_anual` tinyint(1) DEFAULT NULL,
  `revision_motores_anual` tinyint(1) DEFAULT NULL,
  `revision_sensores_anual` tinyint(1) DEFAULT NULL,
  `limpieza_general_anual` tinyint(1) DEFAULT NULL,
  `revision_botoneras_anual` tinyint(1) DEFAULT NULL,
  `revision_parada_emergencia_anual` tinyint(1) DEFAULT NULL,
  `revision_panel_electrico_anual` tinyint(1) DEFAULT NULL,
  `calibracion_anual` tinyint(1) DEFAULT NULL,
  `funcionamiento_anual` tinyint(1) DEFAULT NULL,
  `evaluacion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `responsable` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `evidencia` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `maquina_equipos`
--

LOCK TABLES `maquina_equipos` WRITE;
/*!40000 ALTER TABLE `maquina_equipos` DISABLE KEYS */;
INSERT INTO `maquina_equipos` VALUES (1,'PH1','AMQ- 1123','linea hi-line','Hi-LINE 7','Sottoriva','Italia','380V','50/60HZ',0,1,1,0,0,1,0,0,0,0,0,0,0,0,1,0,0,0,1,1,0,1,0,0,0,1,1,0,0,0,1,0,0,0,0,0,0,1,1,1,0,0,1,1,0,'Preventivo','Personal de Mantenimiento','PLP-PRO-610-REG- 01',NULL,NULL),(2,'PH2','AMQ- 1230','linea hi-line','Amasadora','Sottoriva','Italia','380V','50/60HZ',0,1,1,0,0,0,0,0,0,0,0,0,0,0,1,0,0,0,1,1,0,1,0,0,0,1,1,0,0,0,1,0,0,0,0,0,0,1,0,1,0,0,1,1,0,'Preventivo','Personal de Mantenimiento','PLP-PRO-610-REG- 01',NULL,NULL),(3,'PH3','AMQ- 1231','linea hi-line','Amasadora','Sottoriva','Italia','380V','50/60HZ',0,1,1,0,0,0,0,0,0,0,0,0,0,0,1,0,0,0,1,1,0,1,0,0,0,1,1,0,0,0,1,0,0,0,0,0,0,1,0,1,0,0,1,1,0,'Preventivo','Personal de Mantenimiento','PLP-PRO-610-REG- 01',NULL,NULL),(4,'PH4','TELM','linea hi-line','Sobadora','Baropor','Argentina','220/380V','50/60HZ',0,1,1,0,0,1,0,0,0,0,0,0,0,0,1,0,0,0,0,1,0,1,0,0,0,1,0,0,0,0,1,0,0,1,0,0,0,1,0,1,0,0,1,1,0,'Preventivo','Personal de Mantenimiento','PLP-PRO-610-REG- 01',NULL,NULL),(5,'PZ1','AMQ-496','linea zunino','Estampadora','Zunino','Argentina','220V','50/60HZ',0,1,1,0,0,1,0,0,0,0,0,0,0,0,1,0,0,0,0,1,0,1,0,0,0,1,1,0,0,0,1,0,0,1,0,0,0,1,0,1,0,0,1,1,0,'Preventivo','Personal de Mantenimiento','PLP-PRO-610-REG- 01',NULL,NULL),(6,'PZ2','AMQ-041','linea zunino','Amasadora','Argental','Argentina','220V','50/60HZ',0,1,1,0,0,0,0,0,0,0,0,0,0,0,1,0,0,0,1,1,0,1,0,0,0,1,1,0,0,0,1,0,0,0,0,0,0,1,0,1,0,0,1,1,0,'Preventivo','Personal de Mantenimiento','PLP-PRO-610-REG- 01',NULL,NULL),(7,'PZ3','AMQ-183','linea zunino','Amasadora','Argental','Argentina','220V','50/60HZ',0,1,1,0,0,0,0,0,0,0,0,0,0,0,1,0,0,0,1,1,0,1,0,0,0,1,1,0,0,0,1,0,0,0,0,0,0,1,0,1,0,0,1,1,0,'Preventivo','Personal de Mantenimiento','PLP-PRO-610-REG- 01',NULL,NULL),(8,'PZ4','AMQ','linea zunino','Amasadora','Argental','Argentina','220V','50/60HZ',0,1,1,0,0,0,0,0,0,0,0,0,0,0,1,0,0,0,1,1,0,1,0,0,0,1,1,0,0,0,1,0,0,0,0,0,0,1,0,1,0,0,1,1,0,'Preventivo','Personal de Mantenimiento','PLP-PRO-610-REG- 01',NULL,NULL),(9,'PZ5','AMQ-010','linea zunino','Sobadora','Simpa','Brasil','220/380V','50/60HZ',0,1,1,0,0,1,0,0,0,0,0,0,0,0,1,0,0,0,0,1,0,1,0,0,0,1,0,0,0,0,1,0,0,1,0,0,0,1,0,1,0,0,1,1,0,'Preventivo','Personal de Mantenimiento','PLP-PRO-610-REG- 01',NULL,NULL),(10,'PZ6','AMQ-511','linea zunino','Sobadora','Simpa','Brasil','220/380V','50/60HZ',0,1,1,0,0,1,0,0,0,0,0,0,0,0,1,0,0,0,0,1,0,1,0,0,0,1,0,0,0,0,1,0,0,1,0,0,0,1,0,1,0,0,1,1,0,'Preventivo','Personal de Mantenimiento','PLP-PRO-610-REG- 01',NULL,NULL),(11,'PZ7','AMQ-512','linea zunino','Sobadora','Maxipan','Brasil','220/380V','50/60HZ',0,1,1,0,0,1,0,0,0,0,0,0,0,0,1,0,0,0,0,1,0,1,0,0,0,1,0,0,0,0,1,0,0,1,0,0,0,1,0,1,0,0,1,1,0,'Preventivo','Personal de Mantenimiento','PLP-PRO-610-REG- 01',NULL,NULL),(12,'PM1','AMQ- 1171','linea molde','Divisora Volumetrica','Benier','Italia','380V','50/60HZ',0,1,1,0,0,1,0,0,0,0,0,0,0,0,1,0,0,0,0,1,0,1,0,0,0,1,1,0,0,0,1,0,0,1,0,0,0,1,1,1,0,0,1,1,0,'Preventivo','Personal de Mantenimiento','PLP-PRO-610-REG- 01',NULL,NULL),(13,'PM2','AMQ-524','linea molde','Formadora','Baropor','Argentina','220/380V','50/60HZ',0,1,1,0,0,1,0,0,0,0,0,0,0,0,1,0,0,0,0,1,0,1,0,0,0,1,1,0,0,0,1,0,0,1,0,0,0,1,0,1,0,0,1,1,0,'Preventivo','Personal de Mantenimiento','PLP-PRO-610-REG- 01',NULL,NULL),(14,'PM3','AMQ-281','linea molde','Formadora','Paniz','Argentina','220/380V','50/60HZ',0,1,1,0,0,1,0,0,0,0,0,0,0,0,1,0,0,0,0,1,0,1,0,0,0,1,1,0,0,0,1,0,0,1,0,0,0,1,0,1,0,0,1,1,0,'Preventivo','Personal de Mantenimiento','PLP-PRO-610-REG-\n01',NULL,NULL),(15,'PM4','AMQ','linea molde','Amasadora','Argental','Argentina','220V','50/60HZ',0,1,1,0,0,0,0,0,0,0,0,0,0,0,1,0,0,0,1,1,0,1,0,0,0,1,1,0,0,0,1,0,0,0,0,0,0,1,0,1,0,0,1,1,0,'Preventivo','Personal de Mantenimiento','PLP-PRO-610-REG- 01',NULL,NULL),(16,'PM5','AMQ','linea molde','Amasadora','Romco','Argentina','220/380V','50/60HZ',0,1,1,0,0,0,0,0,0,0,0,0,0,0,1,0,0,0,1,1,0,1,0,0,0,1,1,0,0,0,1,0,0,0,0,0,0,1,0,1,0,0,1,1,0,'Preventivo','Personal de Mantenimiento','PLP-PRO-610-REG- 01',NULL,NULL),(17,'PM6','AMQ-515','linea molde','Amasadora','Romco','Argentina','220/380V','50/60HZ',0,1,1,0,0,0,0,0,0,0,0,0,0,0,1,0,0,0,1,1,0,1,0,0,0,1,1,0,0,0,1,0,0,0,0,0,0,1,0,1,0,0,1,1,0,'Preventivo','Personal de Mantenimiento','PLP-PRO-610-REG- 01',NULL,NULL),(18,'PM7','AMQ-516','linea molde','Amasadora','Simpa','Argentina','200V','50/60HZ',0,1,1,0,0,0,0,0,0,0,0,0,0,0,1,0,0,0,1,1,0,1,0,0,0,1,1,0,0,0,1,0,0,0,0,0,0,1,0,1,0,0,1,1,0,'Preventivo','Personal de Mantenimiento','PLP-PRO-610-REG- 01',NULL,NULL),(19,'PHR1','AMQ','linea de horneado','Horno Rotativo','Polin','Italia','220/380V','50/60HZ',0,1,1,0,0,0,0,0,0,0,0,0,0,0,1,0,0,0,1,1,0,1,0,0,0,1,0,0,0,0,1,0,0,0,0,0,0,1,1,1,0,0,1,1,0,'Preventivo','Personal de Mantenimiento','PLP-PRO-610-REG- 01',NULL,NULL),(20,'PHR2','AMQ','linea de horneado','Horno Rotativo','Argental','Argentina','220/380V','50/60HZ',0,1,1,0,0,0,0,0,0,0,0,0,0,0,1,0,0,0,1,1,0,1,0,0,0,1,0,0,0,0,1,0,0,0,0,0,0,1,1,1,0,0,1,1,0,'Preventivo','Personal de Mantenimiento','PLP-PRO-610-REG- 01',NULL,NULL),(21,'PHR3','AMQ','linea de horneado','Horno Rotativo','Argental','Argentina','220/380V','50/60HZ',0,1,1,0,0,0,0,0,0,0,0,0,0,0,1,0,0,0,1,1,0,1,0,0,0,1,0,0,0,0,1,0,0,0,0,0,0,1,1,1,0,0,1,1,0,'Preventivo','Personal de Mantenimiento','PLP-PRO-610-REG- 01',NULL,NULL),(22,'PHR4','AMQ','linea de horneado','Horno Rotativo','Argental','Argentina','220/380V','50/60HZ',0,1,1,0,0,0,0,0,0,0,0,0,0,0,1,0,0,0,1,1,0,1,0,0,0,1,0,0,0,0,1,0,0,0,0,0,0,1,1,1,0,0,1,1,0,'Preventivo','Personal de Mantenimiento','PLP-PRO-610-REG- 01',NULL,NULL),(23,'PHR5','AMQ','linea de horneado','Horno Rotativo','Argental','Argentina','220/380V','50/60HZ',0,1,1,0,0,0,0,0,0,0,0,0,0,0,1,0,0,0,1,1,0,1,0,0,0,1,0,0,0,0,1,0,0,0,0,0,0,1,1,1,0,0,1,1,0,'Preventivo','Personal de Mantenimiento','PLP-PRO-610-REG- 01',NULL,NULL),(24,'PHR6','AMQ','linea de horneado','Horno Rotativo','Argental','Argentina','220/380V','50/60HZ',0,1,1,0,0,0,0,0,0,0,0,0,0,0,1,0,0,0,1,1,0,1,0,0,0,1,0,0,0,0,1,0,0,0,0,0,0,1,1,1,0,0,1,1,0,'Preventivo','Personal de Mantenimiento','PLP-PRO-610-REG- 01',NULL,NULL),(25,'PHR7','AMQ','linea de horneado','Horno Rotativo','Argental','Argentina','220/380V','50/60HZ',0,1,1,0,0,0,0,0,0,0,0,0,0,0,1,0,0,0,1,1,0,1,0,0,0,1,0,0,0,0,1,0,0,0,0,0,0,1,1,1,0,0,1,1,0,'Preventivo','Personal de Mantenimiento','PLP-PRO-610-REG- 01',NULL,NULL),(26,'PHR8','AMQ','linea de horneado','Horno Rotativo','Argental','Argentina','220/380V','50/60HZ',0,1,1,0,0,0,0,0,0,0,0,0,0,0,1,0,0,0,1,1,0,1,0,0,0,1,0,0,0,0,1,0,0,0,0,0,0,1,1,1,0,0,1,1,0,'Preventivo','Personal de Mantenimiento','PLP-PRO-610-REG- 01',NULL,NULL),(27,'PHR9','AMQ','linea de horneado','Horno Rotativo','Argental','Argentina','220/380V','50/60HZ',0,1,1,0,0,0,0,0,0,0,0,0,0,0,1,0,0,0,1,1,0,1,0,0,0,1,0,0,0,0,1,0,0,0,0,0,0,1,1,1,0,0,1,1,0,'Preventivo','Personal de Mantenimiento','PLP-PRO-610-REG- 01',NULL,NULL),(28,'PHR10','AMQ','linea de horneado','Horno Rotativo','Argental','Argentina','220/380V','50/60HZ',0,1,1,0,0,0,0,0,0,0,0,0,0,0,1,0,0,0,1,1,0,1,0,0,0,1,0,0,0,0,1,0,0,0,0,0,0,1,1,1,0,0,1,1,0,'Preventivo','Personal de Mantenimiento','PLP-PRO-610-REG- 01',NULL,NULL),(29,'PHR11','AMQ','linea de horneado','Horno Rotativo','Argental','Argentina','220/380V','50/60HZ',0,1,1,0,0,0,0,0,0,0,0,0,0,0,1,0,0,0,1,1,0,1,0,0,0,1,0,0,0,0,1,0,0,0,0,0,0,1,1,1,0,0,1,1,0,'Preventivo','Personal de Mantenimiento','PLP-PRO-610-REG- 01',NULL,NULL),(30,'PHR12','AMQ','linea de horneado','Horno Rotativo','Argental','Argentina','220/380V','50/60HZ',0,1,1,0,0,0,0,0,0,0,0,0,0,0,1,0,0,0,1,1,0,1,0,0,0,1,0,0,0,0,1,0,0,0,0,0,0,1,1,1,0,0,1,1,0,'Preventivo','Personal de Mantenimiento','PLP-PRO-610-REG- 01',NULL,NULL),(31,'PHR13','AMQ','linea de horneado','Horno Rotativo','Argental','Argentina','220/380V','50/60HZ',0,1,1,0,0,0,0,0,0,0,0,0,0,0,1,0,0,0,1,1,0,1,0,0,0,1,0,0,0,0,1,0,0,0,0,0,0,1,1,1,0,0,1,1,0,'Preventivo','Personal de Mantenimiento','PLP-PRO-610-REG- 01',NULL,NULL),(32,'PHR14','AMQ','linea de horneado','Horno Rotativo','Argental','Argentina','220/380V','50/60HZ',0,1,1,0,0,0,0,0,0,0,0,0,0,0,1,0,0,0,1,1,0,1,0,0,0,1,0,0,0,0,1,0,0,0,0,0,0,1,1,1,0,0,1,1,0,'Preventivo','Personal de Mantenimiento','PLP-PRO-610-REG- 01',NULL,NULL),(33,'PHR15','AMQ','linea de horneado','Horno Rotativo','Argental','Argentina','220/380V','50/60HZ',0,1,1,0,0,0,0,0,0,0,0,0,0,0,1,0,0,0,1,1,0,1,0,0,0,1,0,0,0,0,1,0,0,0,0,0,0,1,1,1,0,0,1,1,0,'Preventivo','Personal de Mantenimiento','PLP-PRO-610-REG- 01',NULL,NULL),(34,'PHR16','AMQ','linea de horneado','Horno Rotativo','Argental','Argentina','220/380V','50/60HZ',0,1,1,0,0,0,0,0,0,0,0,0,0,0,1,0,0,0,1,1,0,1,0,0,0,1,0,0,0,0,1,0,0,0,0,0,0,1,1,1,0,0,1,1,0,'Preventivo','Personal de Mantenimiento','PLP-PRO-610-REG-\n01',NULL,NULL),(35,'PHR17','AMQ','linea de horneado','Horno Rotativo','Argental','Argentina','220/380V','50/60HZ',0,1,1,0,0,0,0,0,0,0,0,0,0,0,1,0,0,0,1,1,0,1,0,0,0,1,0,0,0,0,1,0,0,0,0,0,0,1,1,1,0,0,1,1,0,'Preventivo','Personal de Mantenimiento','PLP-PRO-610-REG- 01',NULL,NULL),(36,'PHR18','AMQ','linea de horneado','Horno Rotativo','Argental','Argentina','220/380V','50/60HZ',0,1,1,0,0,0,0,0,0,0,0,0,0,0,1,0,0,0,1,1,0,1,0,0,0,1,0,0,0,0,1,0,0,0,0,0,0,1,1,1,0,0,1,1,0,'Preventivo','Personal de Mantenimiento','PLP-PRO-610-REG- 01',NULL,NULL),(37,'PHR19','AMQ','linea de horneado','Horno Rotativo','Argental','Argentina','220/380V','50/60HZ',0,1,1,0,0,0,0,0,0,0,0,0,0,0,1,0,0,0,1,1,0,1,0,0,0,1,0,0,0,0,1,0,0,0,0,0,0,1,1,1,0,0,1,1,0,'Preventivo','Personal de Mantenimiento','PLP-PRO-610-REG- 01',NULL,NULL),(38,'PHR20','AMQ','linea de horneado','Horno Rotativo','Argental','Argentina','220/380V','50/60HZ',0,1,1,0,0,0,0,0,0,0,0,0,0,0,1,0,0,0,1,1,0,1,0,0,0,1,0,0,0,0,1,0,0,0,0,0,0,1,1,1,0,0,1,1,0,'Preventivo','Personal de Mantenimiento','PLP-PRO-610-REG- 01',NULL,NULL),(39,'PHR21','AMQ','linea de horneado','Horno Rotativo','Sottoriva','Italia','220/380V','50/60HZ',0,1,1,0,0,0,0,0,0,0,0,0,0,0,1,0,0,0,1,1,0,1,0,0,0,1,0,0,0,0,1,0,0,0,0,0,0,1,1,1,0,0,1,1,0,'Preventivo','Personal de Mantenimiento','PLP-PRO-610-REG- 01',NULL,NULL),(40,'PHR22','AMQ','linea de horneado','Horno Rotativo','Sottoriva','Italia','220/380V','50/60HZ',0,1,1,0,0,0,0,0,0,0,0,0,0,0,1,0,0,0,1,1,0,1,0,0,0,1,0,0,0,0,1,0,0,0,0,0,0,1,1,1,0,0,1,1,0,'Preventivo','Personal de Mantenimiento','PLP-PRO-610-REG- 01',NULL,NULL),(41,'PHR23','AMQ','linea de horneado','Horno Rotativo','Sottoriva','Italia','220/380V','50/60HZ',0,1,1,0,0,0,0,0,0,0,0,0,0,0,1,0,0,0,1,1,0,1,0,0,0,1,0,0,0,0,1,0,0,0,0,0,0,1,1,1,0,0,1,1,0,'Preventivo','Personal de Mantenimiento','PLP-PRO-610-REG- 01',NULL,NULL),(42,'PHR24','AMQ','linea de horneado','Horno Rotativo','Sottoriva','Italia','220/380V','50/60HZ',0,1,1,0,0,0,0,0,0,0,0,0,0,0,1,0,0,0,1,1,0,1,0,0,0,1,0,0,0,0,1,0,0,0,0,0,0,1,1,1,0,0,1,1,0,'Preventivo','Personal de Mantenimiento','PLP-PRO-610-REG- 01',NULL,NULL),(43,'PE1','AMQ- 1040','linea embolsado','Rebanadora','Sigamaq','Brasil','220V','50/60HZ',0,1,1,0,0,1,0,0,0,0,0,0,0,0,1,0,0,0,0,1,0,1,0,0,1,1,1,0,0,0,1,0,0,1,0,0,0,1,0,0,0,0,1,1,0,'Preventivo','Personal de Mantenimiento','PLP-PRO-610-REG- 01',NULL,NULL),(44,'PE2','AMQ- 1284','','Rebanadora','Mac-Pan','Italia','220V','50/60HZ',0,1,1,0,0,1,0,0,0,0,0,0,0,0,1,0,0,0,0,1,0,1,0,0,1,1,1,0,0,0,1,0,0,1,0,0,0,1,0,0,0,0,1,1,0,'Preventivo','Personal de Mantenimiento','PLP-PRO-610-REG- 01',NULL,NULL),(45,'PE3','AMQ- 1279','','Rebanadora','Panier','Argentina','220V','50/60HZ',0,1,1,0,0,1,0,0,0,0,0,0,0,0,1,0,0,0,0,1,0,1,0,0,1,1,1,0,0,0,1,0,0,1,0,0,0,1,0,0,0,0,1,1,0,'Preventivo','Personal de Mantenimiento','PLP-PRO-610-REG- 01',NULL,NULL),(46,'PE4','AMQ','','Empacadora','MultipacK','China','220V','50/60HZ',0,1,1,0,0,1,0,0,0,0,0,0,0,0,1,0,0,0,1,1,0,1,0,0,1,1,1,0,0,0,1,0,0,0,0,0,0,1,1,0,0,0,1,1,0,'Preventivo','Personal de Mantenimiento','PLP-PRO-610-REG- 01',NULL,NULL),(47,'PE5','AMQ-211','','Selladora Manual','Simpa','Bolivia','220V','50/60HZ',0,0,0,0,0,0,0,0,0,0,0,0,0,0,1,0,0,0,0,0,0,0,0,0,1,1,0,1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,1,0,'Preventivo','Personal de Mantenimiento','PLP-PRO-610-REG- 01',NULL,NULL),(48,'PE6','AMQ-556','','Selladora Manual','Simpa','Bolivia','220V','50/60HZ',0,0,0,0,0,0,0,0,0,0,0,0,0,0,1,0,0,0,0,0,0,0,0,0,1,1,0,1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,1,0,'Preventivo','Personal de Mantenimiento','PLP-PRO-610-REG- 01',NULL,NULL),(49,'PE7','AMQ-300','','Selladora Manual','Simpa','Bolivia','220V','50/60HZ',0,0,0,0,0,0,0,0,0,0,0,0,0,0,1,0,0,0,0,0,0,0,0,0,1,1,0,1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,1,0,'Preventivo','Personal de Mantenimiento','PLP-PRO-610-REG- 01',NULL,NULL),(50,'PE8','AMQ-301','','Selladora Manual','Simpa','Bolivia','220V','50/60HZ',0,0,0,0,0,0,0,0,0,0,0,0,0,0,1,0,0,0,0,0,0,0,0,0,1,1,0,1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,1,0,'Preventivo','Personal de Mantenimiento','PLP-PRO-610-REG- 01',NULL,NULL),(51,'PH9','AMU-448','','Freezer','Consul','Brasil','220V','50/60HZ',0,1,0,0,0,0,0,0,0,0,0,0,0,1,1,0,0,1,0,0,0,0,0,0,1,1,0,1,0,0,0,0,0,0,0,0,0,1,1,0,0,0,0,0,0,'Preventivo','Personal de Mantenimiento','PLP-PRO-610-REG- 01',NULL,NULL),(52,'PH10','AMU-449','','Freezer','Consul','Brasil','220V','50/60HZ',0,1,0,0,0,0,0,0,0,0,0,0,0,1,1,0,0,1,0,0,0,0,0,0,1,1,0,1,0,0,0,0,0,0,0,0,0,1,1,0,0,0,0,0,0,'Preventivo','Personal de Mantenimiento','PLP-PRO-610-REG- 01',NULL,NULL);
/*!40000 ALTER TABLE `maquina_equipos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `metals`
--

DROP TABLE IF EXISTS `metals`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `metals` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tiempo` date DEFAULT NULL,
  `orp_id` bigint unsigned DEFAULT NULL,
  `preparacion` decimal(5,3) DEFAULT NULL,
  `ferroso` tinyint(1) DEFAULT NULL,
  `no_ferroso` tinyint(1) DEFAULT NULL,
  `sus_inox` tinyint(1) DEFAULT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `responsable` bigint unsigned DEFAULT NULL,
  `observaciones` text COLLATE utf8mb4_unicode_ci,
  `correccion` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `metals_orp_id_foreign` (`orp_id`),
  KEY `metals_user_id_foreign` (`user_id`),
  KEY `metals_responsable_foreign` (`responsable`),
  CONSTRAINT `metals_orp_id_foreign` FOREIGN KEY (`orp_id`) REFERENCES `orps` (`id`) ON DELETE CASCADE,
  CONSTRAINT `metals_responsable_foreign` FOREIGN KEY (`responsable`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  CONSTRAINT `metals_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `metals`
--

LOCK TABLES `metals` WRITE;
/*!40000 ALTER TABLE `metals` DISABLE KEYS */;
INSERT INTO `metals` VALUES (1,'2025-01-09',7,1.000,1,NULL,1,1,1,'fnsejkfn','nfsjekfse\n','2025-01-09 13:31:04','2025-01-09 13:31:04'),(2,'2025-01-09',7,2.000,NULL,1,NULL,1,1,'fnesj','njfksenjkf','2025-01-09 13:31:31','2025-01-09 13:31:31');
/*!40000 ALTER TABLE `metals` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (11,'0001_01_01_000000_create_users_table',1),(12,'0001_01_01_000001_create_cache_table',1),(13,'0001_01_01_000002_create_jobs_table',1),(14,'2024_11_13_131923_create_higiene_personals_table',2),(19,'2024_11_14_161643_create_lavado_manos_table',3),(20,'2024_11_15_154502_create_documentacions_table',4),(23,'2024_11_18_163022_create_personal_externos_table',5),(24,'2024_11_19_160942_create_sectors_table',6),(25,'2024_11_19_160946_create_ord_lim_des_table',6),(31,'2024_11_19_161300_create_verificacion_ord_lip_des_table',7),(32,'2024_12_05_083135_create_items_table',8),(33,'2024_12_05_085030_create_productos_table',8),(34,'2024_12_05_085050_create_recetas_table',8),(35,'2024_12_05_085117_create_orps_table',8),(40,'2024_12_10_103954_create_premezcla1s_table',9),(41,'2024_12_10_104002_create_premezcla2s_table',9),(42,'2024_12_10_104007_create_premezcla3s_table',9),(43,'2024_12_10_104015_create_preparador_maestros_table',9),(44,'2024_12_11_145629_create_amasados_table',10),(45,'2024_12_19_093531_create_decorados_table',11),(46,'2024_12_23_155046_create_division_formado_decorados_table',12),(49,'2024_12_27_101107_create_fermentacions_table',13),(50,'2024_12_27_101122_create_horneados_table',13),(51,'2025_01_07_145529_create_balances_table',14),(52,'2025_01_07_145548_create_cantidad_preparadas_table',14),(53,'2025_01_07_145629_create_cortes_table',14),(54,'2025_01_07_145719_create_metals_table',14),(55,'2025_01_07_145758_create_dimensions_table',14),(56,'2025_01_07_145827_create_organolepticos_table',14),(57,'2025_01_10_164507_create_seleccion_visuals_table',15),(58,'2025_01_10_164619_create_rendimiento_cantidads_table',15),(59,'2025_01_10_165004_create_distribucions_table',15),(63,'2025_01_13_091946_create_maquina_equipos_table',16),(64,'2025_01_13_092044_create_revision_diaria_maquinas_table',16),(65,'2025_01_13_092052_create_orden_trabajos_table',16);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ord_lim_des`
--

DROP TABLE IF EXISTS `ord_lim_des`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ord_lim_des` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `lunes_lo` tinyint(1) NOT NULL,
  `lunes_des` tinyint(1) NOT NULL,
  `martes_lo` tinyint(1) NOT NULL,
  `martes_des` tinyint(1) NOT NULL,
  `miercoles_lo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `miercoles_des` tinyint(1) NOT NULL,
  `jueves_lo` tinyint(1) NOT NULL,
  `jueves_des` tinyint(1) NOT NULL,
  `viernes_des_pro` tinyint(1) NOT NULL,
  `sabado_lo` tinyint(1) NOT NULL,
  `sabado_des` tinyint(1) NOT NULL,
  `domingo_lo` tinyint(1) NOT NULL,
  `domingo_des` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `sector_id` bigint unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `ord_lim_des_sector_id_foreign` (`sector_id`),
  CONSTRAINT `ord_lim_des_sector_id_foreign` FOREIGN KEY (`sector_id`) REFERENCES `sectors` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=241 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ord_lim_des`
--

LOCK TABLES `ord_lim_des` WRITE;
/*!40000 ALTER TABLE `ord_lim_des` DISABLE KEYS */;
INSERT INTO `ord_lim_des` VALUES (1,'Mesa Inox',1,1,1,1,'1',1,1,1,1,1,1,1,1,NULL,NULL,1),(2,'Gaveta de Materiales',1,1,1,1,'1',1,1,1,1,1,1,1,1,NULL,NULL,1),(3,'Carrito de Masa Cruda',1,1,1,1,'1',1,1,1,1,1,1,1,1,NULL,NULL,1),(4,'Carrito de Materiales',1,1,1,1,'1',1,1,1,1,1,1,1,1,NULL,NULL,1),(5,'Cortinas PVC',1,0,1,0,'1',0,1,0,1,1,0,1,0,NULL,NULL,1),(6,'Gradas Met├ílicas',1,0,1,0,'1',0,1,0,1,1,0,1,0,NULL,NULL,1),(7,'Carrito de balanza',1,0,1,0,'1',0,1,0,1,1,0,1,0,NULL,NULL,1),(8,'Contenedor de Residuos',1,0,1,0,'1',0,1,0,1,1,0,1,0,NULL,NULL,1),(9,'Transpallets',1,0,1,0,'1',0,1,0,1,1,0,1,0,NULL,NULL,1),(10,'Paredes',1,0,1,0,'1',0,1,0,1,1,0,1,0,NULL,NULL,1),(11,'Piso',1,0,1,0,'1',0,1,0,1,1,0,1,0,NULL,NULL,1),(12,'Desag├╝e',1,0,1,0,'1',0,1,0,1,1,0,1,0,NULL,NULL,1),(13,'Pallets',1,0,1,0,'1',0,1,0,1,1,0,1,0,NULL,NULL,1),(14,'Puerta',1,0,1,0,'1',0,1,0,1,1,0,1,0,NULL,NULL,1),(15,'Luminarias            ',1,0,1,0,'1',0,1,0,1,1,0,1,0,NULL,NULL,1),(16,'Mesa Inox',1,1,1,1,'1',1,1,1,1,1,1,1,1,NULL,NULL,2),(17,'Gaveta de Materiales',1,1,1,1,'1',1,1,1,1,1,1,1,1,NULL,NULL,2),(18,'Piso',1,0,1,0,'1',0,1,0,1,1,0,1,0,NULL,NULL,2),(19,'Paredes',1,0,1,0,'1',0,1,0,1,1,0,1,0,NULL,NULL,2),(20,'Contenedor de residuos',1,0,1,0,'1',0,1,0,1,1,0,1,0,NULL,NULL,2),(21,'Luminarias',1,0,1,0,'1',0,1,0,1,1,0,1,0,NULL,NULL,2),(22,'Carro de Material',1,0,1,0,'1',0,1,0,1,1,0,1,0,NULL,NULL,2),(23,'Estante de Canastillos',1,0,1,0,'1',0,1,0,1,1,0,1,0,NULL,NULL,3),(24,'Gaveta de Materiales',1,0,1,0,'1',0,1,0,1,1,0,1,0,NULL,NULL,3),(25,'Carro de Material',1,0,1,0,'1',0,1,0,1,1,0,1,0,NULL,NULL,3),(26,'Canastillo',1,0,1,0,'1',0,1,0,1,1,0,1,0,NULL,NULL,3),(27,'Carritos de Canastillos',1,0,1,0,'1',0,1,0,1,1,0,1,0,NULL,NULL,3),(28,'Estante de bobina',1,0,1,0,'1',0,1,0,1,1,0,1,0,NULL,NULL,3),(29,'Contenedor Residuos',1,0,1,0,'1',0,1,0,1,1,0,1,0,NULL,NULL,3),(30,'Paredes',1,0,1,0,'1',0,1,0,1,1,0,1,0,NULL,NULL,3),(31,'Ventanas (Mallas Milimetricas)',1,0,1,0,'1',0,1,0,1,1,0,1,0,NULL,NULL,3),(32,'Piso',1,0,1,0,'1',0,1,0,1,1,0,1,0,NULL,NULL,3),(33,'Techos',1,0,1,0,'1',0,1,0,1,1,0,1,0,NULL,NULL,3),(34,'Luminarias',1,0,1,0,'1',0,1,0,1,1,0,1,0,NULL,NULL,3),(35,'cerchas',1,0,1,0,'1',0,1,0,1,1,0,1,0,NULL,NULL,3),(36,'Paredes',1,0,1,0,'1',0,1,0,1,1,0,1,0,NULL,NULL,4),(37,'Pisos',1,0,1,0,'1',0,1,0,1,1,0,1,0,NULL,NULL,4),(38,'Gaveta de Insumos de Limpieza',1,0,1,0,'1',0,1,0,1,1,0,1,0,NULL,NULL,4),(39,'Contenedor de Residuos',1,0,1,0,'1',0,1,0,1,1,0,1,0,NULL,NULL,4),(40,'Techo',1,0,1,0,'1',0,1,0,1,1,0,1,0,NULL,NULL,4),(41,'Protectores E├│licos Cerchas',1,0,1,0,'1',0,1,0,1,1,0,1,0,NULL,NULL,4),(42,'Luminarias',1,0,1,0,'1',0,1,0,1,1,0,1,0,NULL,NULL,4),(43,'Bebedero',1,0,1,0,'1',0,1,0,1,1,0,1,0,NULL,NULL,4),(44,'Mesas Inoxidable',1,1,1,1,'1',1,1,1,1,1,1,1,1,NULL,NULL,5),(45,'Carros de embolsado',1,1,1,1,'1',1,1,1,1,1,1,1,1,NULL,NULL,5),(46,'Contenedor de Residuos',1,0,1,0,'1',0,1,0,1,1,0,1,0,NULL,NULL,5),(47,'Cortina PVC',1,0,1,0,'1',0,1,0,1,1,0,1,0,NULL,NULL,5),(48,'Piso',1,0,1,0,'1',0,1,0,1,1,0,1,0,NULL,NULL,5),(49,'Puerta',1,0,1,0,'1',0,1,0,1,1,0,1,0,NULL,NULL,5),(50,'Paredes',1,0,1,0,'1',0,1,0,1,1,0,1,0,NULL,NULL,5),(51,'Carritos moviles',1,0,1,0,'1',0,1,0,1,1,0,1,0,NULL,NULL,5),(52,'Canastillos',1,0,1,0,'1',0,1,0,1,1,0,1,0,NULL,NULL,5),(53,'Techos',1,0,1,0,'1',0,1,0,1,1,0,1,0,NULL,NULL,5),(54,'Cerchas',1,0,1,0,'1',0,1,0,1,1,0,1,0,NULL,NULL,5),(55,'Protectores E├│licos',1,0,1,0,'1',0,1,0,1,1,0,1,0,NULL,NULL,5),(56,'Ventanas (Malla Milim├®trica)',1,0,1,0,'1',0,1,0,1,1,0,1,0,NULL,NULL,5),(57,'Secadores El├®ctricos',1,0,1,0,'1',0,1,0,1,1,0,1,0,NULL,NULL,5),(58,'Lavamanos',1,0,1,0,'1',0,1,0,1,1,0,1,0,NULL,NULL,5),(59,'Dosificadores',1,0,1,0,'1',0,1,0,1,1,0,1,0,NULL,NULL,5),(60,'Bebedero',1,0,1,0,'1',0,1,0,1,1,0,1,0,NULL,NULL,5),(61,'Luminarias',1,0,1,0,'1',0,1,0,1,1,0,1,0,NULL,NULL,5),(62,'Mesas Inoxidable',1,0,1,0,'1',0,1,0,1,1,0,1,0,NULL,NULL,6),(63,'Gaveta de materiales',1,0,1,0,'1',0,1,0,1,1,0,1,0,NULL,NULL,6),(64,'Canastillos',1,0,1,0,'1',0,1,0,1,1,0,1,0,NULL,NULL,6),(65,'Contenedor de Residuos',1,0,1,0,'1',0,1,0,1,1,0,1,0,NULL,NULL,6),(66,'Cortina PVC',1,0,1,0,'1',0,1,0,1,1,0,1,0,NULL,NULL,6),(67,'Piso',1,0,1,0,'1',0,1,0,1,1,0,1,0,NULL,NULL,6),(68,'Puerta',1,0,1,0,'1',0,1,0,1,1,0,1,0,NULL,NULL,6),(69,'Paredes',1,0,1,0,'1',0,1,0,1,1,0,1,0,NULL,NULL,6),(70,'Luminarias',1,0,1,0,'1',0,1,0,1,1,0,1,0,NULL,NULL,6),(71,'Techo',1,0,1,0,'1',0,1,0,1,1,0,1,0,NULL,NULL,6),(72,'Puertas',1,0,1,0,'1',0,1,0,1,1,0,1,0,NULL,NULL,7),(73,'Paredes',1,0,1,0,'1',0,1,0,1,1,0,1,0,NULL,NULL,7),(74,'Piso',1,0,1,0,'1',0,1,0,1,1,0,1,0,NULL,NULL,7),(75,'Techo ',1,0,1,0,'1',0,1,0,1,1,0,1,0,NULL,NULL,7),(76,'Luminarias ',1,0,1,0,'1',0,1,0,1,1,0,1,0,NULL,NULL,7),(77,'Tuber├¡as',1,0,1,0,'1',0,1,0,1,1,0,1,0,NULL,NULL,7),(78,'Protectores internos',1,0,1,0,'1',0,1,0,1,1,0,1,0,NULL,NULL,7),(79,'Desag├╝es',1,0,1,0,'1',0,1,0,1,1,0,1,0,NULL,NULL,7),(80,'Sumideros',1,0,1,0,'1',0,1,0,1,1,0,1,0,NULL,NULL,7),(81,'Contenedor de Residuos',1,0,1,0,'1',0,1,0,1,1,0,1,0,NULL,NULL,8),(82,'Cortina PVC',1,0,1,0,'1',0,1,0,1,1,0,1,0,NULL,NULL,8),(83,'Piso',1,0,1,0,'1',0,1,0,1,1,0,1,0,NULL,NULL,8),(84,'Puerta',1,0,1,0,'1',0,1,0,1,1,0,1,0,NULL,NULL,8),(85,'Paredes',1,0,1,0,'1',0,1,0,1,1,0,1,0,NULL,NULL,8),(86,'Techos',1,0,1,0,'1',0,1,0,1,1,0,1,0,NULL,NULL,8),(87,'Secadores El├®ctricos',1,0,1,0,'1',0,1,0,1,1,0,1,0,NULL,NULL,8),(88,'Lavamanos',1,0,1,0,'1',0,1,0,1,1,0,1,0,NULL,NULL,8),(89,'Dosificadores    ',1,0,1,0,'1',0,1,0,1,1,0,1,0,NULL,NULL,8),(90,'PRF-01 BOWL INOX.  PEQUE├æO',1,0,1,0,'1',0,1,0,1,1,0,1,0,NULL,NULL,9),(91,'PRF-02  BOWL INOX.  PEQUE├æO',1,0,1,0,'1',0,1,0,1,1,0,1,0,NULL,NULL,9),(92,'PRF-03 BOWL INOX.  PEQUE├æO',1,0,1,0,'1',0,1,0,1,1,0,1,0,NULL,NULL,9),(93,'PRF-O4 BOWL INOX.  PEQUE├æO',1,0,1,0,'1',0,1,0,1,1,0,1,0,NULL,NULL,9),(94,'PRF-05 BOWL INOX.  PEQUE├æO',1,0,1,0,'1',0,1,0,1,1,0,1,0,NULL,NULL,9),(95,'PRF-11 BATIDORA MANUAL INOX. MEDIANA',1,0,1,0,'1',0,1,0,1,1,0,1,0,NULL,NULL,9),(96,'PRF-19 BOWL INOX. MEDIANO',1,0,1,0,'1',0,1,0,1,1,0,1,0,NULL,NULL,9),(97,'PRF-20 BOWL INOX. PEQUE├æO',1,0,1,0,'1',0,1,0,1,1,0,1,0,NULL,NULL,9),(98,'PRF-21 BOWL INOX. PEQUE├æO',1,0,1,0,'1',0,1,0,1,1,0,1,0,NULL,NULL,9),(99,'PRF-24 TAMIZADOR INOX. ',1,0,1,0,'1',0,1,0,1,1,0,1,0,NULL,NULL,9),(100,'PRF-26 JARRA INOX. CON BORDE 1L',1,0,1,0,'1',0,1,0,1,1,0,1,0,NULL,NULL,9),(101,'PRF-27 JARRA INOX. CON BORDE 1L',1,0,1,0,'1',0,1,0,1,1,0,1,0,NULL,NULL,9),(102,'PRF-30 EMBUDO METALICO ',1,0,1,0,'1',0,1,0,1,1,0,1,0,NULL,NULL,9),(103,'PRF-32 RASPA METALICA INOX MEDIANO 15 cm',1,0,1,0,'1',0,1,0,1,1,0,1,0,NULL,NULL,9),(104,'PRF-37 BOWL RECTANGULAR INOX. PEQUE├æO',1,0,1,0,'1',0,1,0,1,1,0,1,0,NULL,NULL,9),(105,'PRF-38 BOWL RECTANGULAR INOX. GRANDE',1,0,1,0,'1',0,1,0,1,1,0,1,0,NULL,NULL,9),(106,'PRF-39 BOWL RECTANGULAR INOX. GRANDE',1,0,1,0,'1',0,1,0,1,1,0,1,0,NULL,NULL,9),(107,'PRF-40 BOWL RECTANGULAR INOX. GRANDE',1,0,1,0,'1',0,1,0,1,1,0,1,0,NULL,NULL,9),(108,'PRF-58 CUCHARA DE ACERO INOX.',1,0,1,0,'1',0,1,0,1,1,0,1,0,NULL,NULL,9),(109,'PRF-59 CUCHARA DE ACERO INOX.',1,0,1,0,'1',0,1,0,1,1,0,1,0,NULL,NULL,9),(110,'PRF-60 CUCHARA DE ACERO INOX.',1,0,1,0,'1',0,1,0,1,1,0,1,0,NULL,NULL,9),(111,'PRF-61 CUCHARA DE ACERO INOX.',1,0,1,0,'1',0,1,0,1,1,0,1,0,NULL,NULL,9),(112,'PRF-62 CUCHARA DE ACERO INOX.',1,0,1,0,'1',0,1,0,1,1,0,1,0,NULL,NULL,9),(113,'HF1 FUSLERO DE TEFLON',1,0,1,0,'1',0,1,0,1,1,0,1,0,NULL,NULL,10),(114,'HF2 FUSLERO DE TEFLON',1,0,1,0,'1',0,1,0,1,1,0,1,0,NULL,NULL,10),(115,'HF3 FUSLERO DE TEFLON',1,0,1,0,'1',0,1,0,1,1,0,1,0,NULL,NULL,10),(116,'HC1 CUCHILLO MEDIANO PARA MASA',1,0,1,0,'1',0,1,0,1,1,0,1,0,NULL,NULL,10),(117,'HC2 CUCHILLO MEDIANO PARA MASA',1,0,1,0,'1',0,1,0,1,1,0,1,0,NULL,NULL,10),(118,'HC3 CUCHILLO MEDIANO PARA MASA',1,0,1,0,'1',0,1,0,1,1,0,1,0,NULL,NULL,10),(119,'HC4 CUCHILLO GRANDE DE MANTECA',1,0,1,0,'1',0,1,0,1,1,0,1,0,NULL,NULL,10),(120,'HM1 MANGO GRANDE DE ALUMINIO',1,0,1,0,'1',0,1,0,1,1,0,1,0,NULL,NULL,10),(121,'HM2 MANGO MEDIANO DE ALUMINIO',1,0,1,0,'1',0,1,0,1,1,0,1,0,NULL,NULL,10),(122,'HM3 MANGO MEDIANO DE ALUMINIO',1,0,1,0,'1',0,1,0,1,1,0,1,0,NULL,NULL,10),(123,'HJ1 JARRA DE PLASTICO ',1,0,1,0,'1',0,1,0,1,1,0,1,0,NULL,NULL,10),(124,'HJ2 JARRA DE PLASTICO ',1,0,1,0,'1',0,1,0,1,1,0,1,0,NULL,NULL,10),(125,'HE1 ESPATULA D METAL PARA LA OLLA ',1,0,1,0,'1',0,1,0,1,1,0,1,0,NULL,NULL,10),(126,'MJ1 JARRA SIN TAPA PARA AGUA',1,0,1,0,'1',0,1,0,1,1,0,1,0,NULL,NULL,11),(127,'MJ2 JARRA SIN TAPA PARA AGUA',1,0,1,0,'1',0,1,0,1,1,0,1,0,NULL,NULL,11),(128,'MJ3 JARRA PEQUE├æA',1,0,1,0,'1',0,1,0,1,1,0,1,0,NULL,NULL,11),(129,'MM1 MANGOS DE ALUMINIO ',1,0,1,0,'1',0,1,0,1,1,0,1,0,NULL,NULL,11),(130,'MM2 MANGOS DE ALUMINIO ',1,0,1,0,'1',0,1,0,1,1,0,1,0,NULL,NULL,11),(131,'MM3 MANGO DE ALUMINIO PEQUE├æO',1,0,1,0,'1',0,1,0,1,1,0,1,0,NULL,NULL,11),(132,'MC1  CUCHILLOS PEQUE├æOS PARA MASA',1,0,1,0,'1',0,1,0,1,1,0,1,0,NULL,NULL,11),(133,'MC2 CUCHILLOS PEQUE├æOS PARA MASA',1,0,1,0,'1',0,1,0,1,1,0,1,0,NULL,NULL,11),(134,'MC3 CUCHILLOS PEQUE├æOS PARA MASA',1,0,1,0,'1',0,1,0,1,1,0,1,0,NULL,NULL,11),(135,'MC4 CUCHILLOS PEQUE├æOS PARA MASA',1,0,1,0,'1',0,1,0,1,1,0,1,0,NULL,NULL,11),(136,'MC5 CUCHILLO GRANDE MANTECA',1,0,1,0,'1',0,1,0,1,1,0,1,0,NULL,NULL,11),(137,'ME1 ESPATULAS DE  INOX PARA LIMPIAR MESA Y OLLA',1,0,1,0,'1',0,1,0,1,1,0,1,0,NULL,NULL,11),(138,'ME2 ESPATULAS DE  INOX PARA LIMPIAR MESA Y OLLA',1,0,1,0,'1',0,1,0,1,1,0,1,0,NULL,NULL,11),(139,'ZJ1 JARRA',1,0,1,0,'1',0,1,0,1,1,0,1,0,NULL,NULL,12),(140,'ZJ2 JARRA',1,0,1,0,'1',0,1,0,1,1,0,1,0,NULL,NULL,12),(141,'ZB1 BA├æADOR DE INOX PARA MASA',1,0,1,0,'1',0,1,0,1,1,0,1,0,NULL,NULL,12),(142,'ZB2 BA├æADOR DE INOX PARA PASTA',1,0,1,0,'1',0,1,0,1,1,0,1,0,NULL,NULL,12),(143,'ZM1 MANGOS DE ALUMINIO',1,0,1,0,'1',0,1,0,1,1,0,1,0,NULL,NULL,12),(144,'ZM2 MANGOS DE ALUMINIO',1,0,1,0,'1',0,1,0,1,1,0,1,0,NULL,NULL,12),(145,'ZM3 MANGOS DE ALUMINIO',1,0,1,0,'1',0,1,0,1,1,0,1,0,NULL,NULL,12),(146,'ZM4 MANGOS DE ALUMINIO',1,0,1,0,'1',0,1,0,1,1,0,1,0,NULL,NULL,12),(147,'ZM5 MANGOS DE ALUMINIO',1,0,1,0,'1',0,1,0,1,1,0,1,0,NULL,NULL,12),(148,'ZM6 MANGOS DE ALUMINIO',1,0,1,0,'1',0,1,0,1,1,0,1,0,NULL,NULL,12),(149,'ZC1  CHUCHILLOS MEDIANOS PARA MASA',1,0,1,0,'1',0,1,0,1,1,0,1,0,NULL,NULL,12),(150,'ZC1  CHUCHILLOS MEDIANOS PARA MASA',1,0,1,0,'1',0,1,0,1,1,0,1,0,NULL,NULL,12),(151,'ZC1  CHUCHILLOS MEDIANOS PARA MASA',1,0,1,0,'1',0,1,0,1,1,0,1,0,NULL,NULL,12),(152,'ZC1  CHUCHILLOS MEDIANOS PARA MASA',1,0,1,0,'1',0,1,0,1,1,0,1,0,NULL,NULL,12),(153,'ZC1  CHUCHILLOS MEDIANOS PARA MASA',1,0,1,0,'1',0,1,0,1,1,0,1,0,NULL,NULL,12),(154,'ZE1 ESPATULAS DE METAL PARA LIMPIEZA DE MESA Y OLLAS',1,0,1,0,'1',0,1,0,1,1,0,1,0,NULL,NULL,12),(155,'ZE2 ESPATULAS DE METAL PARA LIMPIEZA DE MESA Y OLLAS',1,0,1,0,'1',0,1,0,1,1,0,1,0,NULL,NULL,12),(156,'ZE3 ESPATULAS DE METAL PARA LIMPIEZA DE MESA Y OLLAS',1,0,1,0,'1',0,1,0,1,1,0,1,0,NULL,NULL,12),(157,'ZF1 FUSLERO DE TEFLON',1,0,1,0,'1',0,1,0,1,1,0,1,0,NULL,NULL,12),(158,'ZF2 FUSLERO DE TEFLON',1,0,1,0,'1',0,1,0,1,1,0,1,0,NULL,NULL,12),(159,'ZF3 FUSLERO DE TEFLON',1,0,1,0,'1',0,1,0,1,1,0,1,0,NULL,NULL,12),(160,'ZF4 FUSLERO DE TEFLON',1,0,1,0,'1',0,1,0,1,1,0,1,0,NULL,NULL,12),(161,'ZF5 USLEROS DE TEFLON',1,0,1,0,'1',0,1,0,1,1,0,1,0,NULL,NULL,12),(162,' BALDES PLASTICOS',1,0,1,0,'1',0,1,0,1,1,0,1,0,NULL,NULL,13),(163,' MANGOS',1,0,1,0,'1',0,1,0,1,1,0,1,0,NULL,NULL,13),(164,' Carros de Horneado (Zorra)',1,0,1,0,'1',0,1,0,1,1,0,1,0,NULL,NULL,14),(165,' Bandejas negras',1,0,1,0,'1',0,1,0,1,1,0,1,0,NULL,NULL,14),(166,' Bandejas Inox',1,0,1,0,'1',0,1,0,1,1,0,1,0,NULL,NULL,14),(167,' Moldes',1,0,1,0,'1',0,1,0,1,1,0,1,0,NULL,NULL,14),(168,'Balanza Hi - Line  - CLEVER1',1,0,1,0,'1',0,1,0,1,1,0,1,0,NULL,NULL,15),(169,'Balanza Hi - Line  - CLEVER2',1,0,1,0,'1',0,1,0,1,1,0,1,0,NULL,NULL,15),(170,'Amasadora Hi - Line - (AH1) - SOTTORIVA',1,0,1,0,'1',0,1,0,1,1,0,1,0,NULL,NULL,15),(171,'Amasadora Hi - Line - (AH2) - SOTTORIVA',1,0,1,0,'1',0,1,0,1,1,0,1,0,NULL,NULL,15),(172,'Hi - Live - SOTTORIVA',1,0,1,0,'1',0,1,0,1,1,0,1,0,NULL,NULL,15),(173,'Balanza de piso CLEVER  Hi - Line',1,0,1,0,'1',0,1,0,1,1,0,1,0,NULL,NULL,15),(174,'Sobadora - BAROPOR',1,0,1,0,'1',0,1,0,1,1,0,1,0,NULL,NULL,15),(175,'Balanza Hi - Line  - OHAUS',1,0,1,0,'1',0,1,0,1,1,0,1,0,NULL,NULL,15),(176,'Amasadora Moldes 2 - (AM2) - ROMCO',1,0,1,0,'1',0,1,0,1,1,0,1,0,NULL,NULL,16),(177,'Amasadora Moldes 3 - (AM1) - SIMPA',1,0,1,0,'1',0,1,0,1,1,0,1,0,NULL,NULL,16),(178,'Amasadora Moldes 4 - (AM4) - ROMBO',1,0,1,0,'1',0,1,0,1,1,0,1,0,NULL,NULL,16),(179,'Amasadora Moldes - ARGENTAL',1,0,1,0,'1',0,1,0,1,1,0,1,0,NULL,NULL,16),(180,'Divisora - BENIER',1,0,1,0,'1',0,1,0,1,1,0,1,0,NULL,NULL,16),(181,'Arrolladora Moldes',1,0,1,0,'1',0,1,0,1,1,0,1,0,NULL,NULL,16),(182,'Cortadora de pan Molde - SIGAMAQ',1,0,1,0,'1',0,1,0,1,1,0,1,0,NULL,NULL,16),(183,'Cortadora de pan Molde - PANIER',1,0,1,0,'1',0,1,0,1,1,0,1,0,NULL,NULL,16),(184,'Cortadora de pan Molde - MAC PAN ',1,0,1,0,'1',0,1,0,1,1,0,1,0,NULL,NULL,16),(185,'Balanza Moldes 1 - OHAUS',1,0,1,0,'1',0,1,0,1,1,0,1,0,NULL,NULL,16),(186,'Balanza Moldes 2 - OHAUS',1,0,1,0,'1',0,1,0,1,1,0,1,0,NULL,NULL,16),(187,'Balanza de piso  Moldes - CLEVER',1,0,1,0,'1',0,1,0,1,1,0,1,0,NULL,NULL,16),(188,'Divisora Cortadora manual MOVA',1,0,1,0,'1',0,1,0,1,1,0,1,0,NULL,NULL,16),(189,'Amasadora Zunino 1 - (AZ1) - ARGENTAL',1,0,1,0,'1',0,1,0,1,1,0,1,0,NULL,NULL,17),(190,'Amasadora Zunino 2 - (AZ2) - ARGENTAL',1,0,1,0,'1',0,1,0,1,1,0,1,0,NULL,NULL,17),(191,'Amasadora Zunino 3 - (AZ3) - ARGENTAL',1,0,1,0,'1',0,1,0,1,1,0,1,0,NULL,NULL,17),(192,'Sobadora Zunino 1 - SIMPA',1,0,1,0,'1',0,1,0,1,1,0,1,0,NULL,NULL,17),(193,'Sobadora Zunino 2 - MAXI PAN',1,0,1,0,'1',0,1,0,1,1,0,1,0,NULL,NULL,17),(194,'Maquina Estampadora Zunino - ZUNINO',1,0,1,0,'1',0,1,0,1,1,0,1,0,NULL,NULL,17),(195,'Balanza Zunino 1 - OHAUS',1,0,1,0,'1',0,1,0,1,1,0,1,0,NULL,NULL,17),(196,'Balanza Zunino 2 - OHAUS',1,0,1,0,'1',0,1,0,1,1,0,1,0,NULL,NULL,17),(197,'Balanza de piso  Zunino - CLEVER',1,0,1,0,'1',0,1,0,1,1,0,1,0,NULL,NULL,17),(198,'Balanza - OHAUS',1,0,1,0,'1',0,1,0,1,1,0,1,0,NULL,NULL,18),(199,'Codificadora MARKEM - IMAJE',1,0,1,0,'1',0,1,0,1,1,0,1,0,NULL,NULL,19),(200,'Horno POLIN ',1,0,1,0,'1',0,1,0,1,1,0,1,0,NULL,NULL,20),(201,'Horno ARGENTAL (1)',1,0,1,0,'1',0,1,0,1,1,0,1,0,NULL,NULL,20),(202,'Horno ARGENTAL (2)',1,0,1,0,'1',0,1,0,1,1,0,1,0,NULL,NULL,20),(203,'Horno ARGENTAL (3)',1,0,1,0,'1',0,1,0,1,1,0,1,0,NULL,NULL,20),(204,'Horno ARGENTAL (4)',1,0,1,0,'1',0,1,0,1,1,0,1,0,NULL,NULL,20),(205,'Horno ARGENTAL (5)',1,0,1,0,'1',0,1,0,1,1,0,1,0,NULL,NULL,20),(206,'Horno ARGENTAL (6)',1,0,1,0,'1',0,1,0,1,1,0,1,0,NULL,NULL,20),(207,'Horno ARGENTAL (7)',1,0,1,0,'1',0,1,0,1,1,0,1,0,NULL,NULL,20),(208,'Horno ARGENTAL (8)',1,0,1,0,'1',0,1,0,1,1,0,1,0,NULL,NULL,20),(209,'Horno ARGENTAL (9)',1,0,1,0,'1',0,1,0,1,1,0,1,0,NULL,NULL,20),(210,'Horno ARGENTAL (10)',1,0,1,0,'1',0,1,0,1,1,0,1,0,NULL,NULL,20),(211,'Horno ARGENTAL (11)',1,0,1,0,'1',0,1,0,1,1,0,1,0,NULL,NULL,20),(212,'Horno ARGENTAL (12)',1,0,1,0,'1',0,1,0,1,1,0,1,0,NULL,NULL,20),(213,'Horno ARGENTAL (13)',1,0,1,0,'1',0,1,0,1,1,0,1,0,NULL,NULL,20),(214,'Horno ARGENTAL (14)',1,0,1,0,'1',0,1,0,1,1,0,1,0,NULL,NULL,20),(215,'Horno ARGENTAL (15)',1,0,1,0,'1',0,1,0,1,1,0,1,0,NULL,NULL,20),(216,'Horno ARGENTAL (16)',1,0,1,0,'1',0,1,0,1,1,0,1,0,NULL,NULL,20),(217,'Horno ARGENTAL (17)',1,0,1,0,'1',0,1,0,1,1,0,1,0,NULL,NULL,20),(218,'Horno ARGENTAL (18)',1,0,1,0,'1',0,1,0,1,1,0,1,0,NULL,NULL,20),(219,'Horno ARGENTAL (19)',1,0,1,0,'1',0,1,0,1,1,0,1,0,NULL,NULL,20),(220,'Horno SOTTORIVA (1)',1,0,1,0,'1',0,1,0,1,1,0,1,0,NULL,NULL,20),(221,'Horno SOTTORIVA (2)',1,0,1,0,'1',0,1,0,1,1,0,1,0,NULL,NULL,20),(222,'Horno SOTTORIVA (3)',1,0,1,0,'1',0,1,0,1,1,0,1,0,NULL,NULL,20),(223,'Horno SOTTORIVA (4)',1,0,1,0,'1',0,1,0,1,1,0,1,0,NULL,NULL,20),(224,'Caldero 1 ',1,0,1,0,'1',0,1,0,1,1,0,1,0,NULL,NULL,20),(225,'Caldero 2',1,0,1,0,'1',0,1,0,1,1,0,1,0,NULL,NULL,20),(226,'Selladora 1 - SIMPACK',1,0,1,0,'1',0,1,0,1,1,0,1,0,NULL,NULL,21),(227,'Selladora 2 - SIMPACK',1,0,1,0,'1',0,1,0,1,1,0,1,0,NULL,NULL,21),(228,'Selladora 3 - SIMPACK',1,0,1,0,'1',0,1,0,1,1,0,1,0,NULL,NULL,21),(229,'Ventiladora 1 ',1,0,1,0,'1',0,1,0,1,1,0,1,0,NULL,NULL,21),(230,'Ventiladora 2 ',1,0,1,0,'1',0,1,0,1,1,0,1,0,NULL,NULL,21),(231,'Ventiladora 3 ',1,0,1,0,'1',0,1,0,1,1,0,1,0,NULL,NULL,21),(232,'Cortadora de Pan Molde 1 - SIGAMAQ',1,0,1,0,'1',0,1,0,1,1,0,1,0,NULL,NULL,22),(233,'Cortadora de Pan Molde 2 - PANIER',1,0,1,0,'1',0,1,0,1,1,0,1,0,NULL,NULL,22),(234,'Cortadora de Pan Molde 3 - MAC PAN',1,0,1,0,'1',0,1,0,1,1,0,1,0,NULL,NULL,22),(235,'Detector de metales -  KINCO',1,0,1,0,'1',0,1,0,1,1,0,1,0,NULL,NULL,23),(236,'Cotador - CI TALSA',1,0,1,0,'1',0,1,0,1,1,0,1,0,NULL,NULL,23),(237,'Selladora - SIMPACK',1,0,1,0,'1',0,1,0,1,1,0,1,0,NULL,NULL,23),(238,'Selladora - SIMPACK',1,0,1,0,'1',0,1,0,1,1,0,1,0,NULL,NULL,23),(239,'Balanza de Piso - CLEVER',1,0,1,0,'1',0,1,0,1,1,0,1,0,NULL,NULL,23),(240,'Freezer dos cuerpos ELECTROLUX',1,0,1,0,'1',0,1,0,1,1,0,1,0,NULL,NULL,23);
/*!40000 ALTER TABLE `ord_lim_des` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orden_trabajos`
--

DROP TABLE IF EXISTS `orden_trabajos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `orden_trabajos` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tiempo_solicitud` datetime DEFAULT NULL,
  `user_solicitante` bigint unsigned DEFAULT NULL,
  `numero_ot` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tipo_ot` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desperfecto` text COLLATE utf8mb4_unicode_ci,
  `maquina_equipo_id` bigint unsigned DEFAULT NULL,
  `estado` text COLLATE utf8mb4_unicode_ci,
  `tiempo_respuesta` datetime DEFAULT NULL,
  `user_tecnico` bigint unsigned DEFAULT NULL,
  `accion` text COLLATE utf8mb4_unicode_ci,
  `user_aprobado` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `orden_trabajos_user_solicitante_foreign` (`user_solicitante`),
  KEY `orden_trabajos_maquina_equipo_id_foreign` (`maquina_equipo_id`),
  KEY `orden_trabajos_user_tecnico_foreign` (`user_tecnico`),
  KEY `orden_trabajos_user_aprobado_foreign` (`user_aprobado`),
  CONSTRAINT `orden_trabajos_maquina_equipo_id_foreign` FOREIGN KEY (`maquina_equipo_id`) REFERENCES `maquina_equipos` (`id`) ON DELETE CASCADE,
  CONSTRAINT `orden_trabajos_user_aprobado_foreign` FOREIGN KEY (`user_aprobado`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  CONSTRAINT `orden_trabajos_user_solicitante_foreign` FOREIGN KEY (`user_solicitante`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  CONSTRAINT `orden_trabajos_user_tecnico_foreign` FOREIGN KEY (`user_tecnico`) REFERENCES `users` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orden_trabajos`
--

LOCK TABLES `orden_trabajos` WRITE;
/*!40000 ALTER TABLE `orden_trabajos` DISABLE KEYS */;
/*!40000 ALTER TABLE `orden_trabajos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `organolepticos`
--

DROP TABLE IF EXISTS `organolepticos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `organolepticos` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tiempo` date DEFAULT NULL,
  `orp_id` bigint unsigned DEFAULT NULL,
  `preparacion` decimal(5,3) DEFAULT NULL,
  `textura` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `olor` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sabor` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `humedad` decimal(5,3) DEFAULT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `responsable` bigint unsigned DEFAULT NULL,
  `observaciones` text COLLATE utf8mb4_unicode_ci,
  `correccion` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `organolepticos_orp_id_foreign` (`orp_id`),
  KEY `organolepticos_user_id_foreign` (`user_id`),
  KEY `organolepticos_responsable_foreign` (`responsable`),
  CONSTRAINT `organolepticos_orp_id_foreign` FOREIGN KEY (`orp_id`) REFERENCES `orps` (`id`) ON DELETE CASCADE,
  CONSTRAINT `organolepticos_responsable_foreign` FOREIGN KEY (`responsable`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  CONSTRAINT `organolepticos_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `organolepticos`
--

LOCK TABLES `organolepticos` WRITE;
/*!40000 ALTER TABLE `organolepticos` DISABLE KEYS */;
INSERT INTO `organolepticos` VALUES (1,'2025-01-09',7,2.000,'Crocante','caracteristico','Dulce',12.200,1,1,'bfsebhf','bfhesbfhs','2025-01-09 14:31:55','2025-01-09 14:31:55');
/*!40000 ALTER TABLE `organolepticos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orps`
--

DROP TABLE IF EXISTS `orps`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `orps` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `codigo` int NOT NULL,
  `producto_id` bigint unsigned NOT NULL,
  `lote` decimal(7,4) DEFAULT NULL,
  `estado` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tiempo_produccion` datetime DEFAULT NULL,
  `tiempo_elaboracion` datetime DEFAULT NULL,
  `fecha_vencimiento1` date DEFAULT NULL,
  `fecha_vencimiento2` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `orps_producto_id_foreign` (`producto_id`),
  CONSTRAINT `orps_producto_id_foreign` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orps`
--

LOCK TABLES `orps` WRITE;
/*!40000 ALTER TABLE `orps` DISABLE KEYS */;
INSERT INTO `orps` VALUES (1,10086963,2,5.1700,'En proceso',NULL,'2024-12-09 09:58:29',NULL,NULL,'2024-12-07 15:49:42','2024-12-09 13:58:29'),(2,10086964,1,5.3800,'Pendiente',NULL,NULL,NULL,NULL,'2024-12-07 15:49:42','2024-12-07 15:49:42'),(3,10086966,3,0.5500,'Pendiente',NULL,NULL,NULL,NULL,'2024-12-07 15:49:42','2024-12-07 15:49:42'),(4,10086968,5,0.3900,'Pendiente',NULL,NULL,NULL,NULL,'2024-12-07 15:49:42','2024-12-07 15:49:42'),(5,10086970,4,0.9200,'Pendiente',NULL,NULL,NULL,NULL,'2024-12-07 15:49:42','2024-12-07 15:49:42'),(6,10087083,1,6.7500,'Completado',NULL,'2024-12-09 10:25:05',NULL,NULL,'2024-12-09 14:24:30','2024-12-09 14:25:09'),(7,10085156,3,4.5000,'Pendiente',NULL,NULL,NULL,NULL,'2024-12-12 18:52:51','2024-12-12 18:52:51');
/*!40000 ALTER TABLE `orps` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_reset_tokens`
--

LOCK TABLES `password_reset_tokens` WRITE;
/*!40000 ALTER TABLE `password_reset_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_reset_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal_externos`
--

DROP TABLE IF EXISTS `personal_externos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `personal_externos` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tiempo` datetime NOT NULL,
  `user_id` bigint unsigned NOT NULL,
  `visita` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `areaInstitucion` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `motivo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `uniforme` tinyint(1) NOT NULL,
  `higiene` tinyint(1) NOT NULL,
  `salud` tinyint(1) NOT NULL,
  `objetos_extranos` tinyint(1) NOT NULL,
  `observaciones` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `correccion` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `personal_externos_user_id_foreign` (`user_id`),
  CONSTRAINT `personal_externos_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal_externos`
--

LOCK TABLES `personal_externos` WRITE;
/*!40000 ALTER TABLE `personal_externos` DISABLE KEYS */;
INSERT INTO `personal_externos` VALUES (1,'2024-11-19 12:31:37',1,'Abel Conde','Lacteos','redes',1,1,0,1,'estornudba mucho','se le dio un barbijo extra y se le llevo a sanidad','2024-11-19 16:31:37','2024-11-19 16:31:37'),(2,'2024-12-06 12:28:41',1,'njndakjn','jnfjkenfjk','fksmkf',1,0,1,1,'fsenjfnh','jnfsekjnfjs','2024-12-06 16:28:41','2024-12-06 16:28:41'),(3,'2024-12-06 15:39:07',1,'abel diaz','fbsehfbh','bhbfhsefbhsebfse',1,1,1,1,NULL,NULL,'2024-12-06 19:39:07','2024-12-06 19:39:07');
/*!40000 ALTER TABLE `personal_externos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `premezcla1s`
--

DROP TABLE IF EXISTS `premezcla1s`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `premezcla1s` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `orp_id` bigint unsigned DEFAULT NULL,
  `tiempo` date DEFAULT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `responsable` bigint unsigned DEFAULT NULL,
  `azucar` decimal(8,4) DEFAULT NULL,
  `leche` decimal(8,4) DEFAULT NULL,
  `gluten` decimal(8,4) DEFAULT NULL,
  `sal_yodada` decimal(8,4) DEFAULT NULL,
  `propionato_calcio` decimal(8,4) DEFAULT NULL,
  `esteaoril_lactilato_sodio` decimal(8,4) DEFAULT NULL,
  `almidon` decimal(8,4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `premezcla1s_orp_id_foreign` (`orp_id`),
  KEY `premezcla1s_user_id_foreign` (`user_id`),
  KEY `premezcla1s_responsable_foreign` (`responsable`),
  CONSTRAINT `premezcla1s_orp_id_foreign` FOREIGN KEY (`orp_id`) REFERENCES `orps` (`id`) ON DELETE CASCADE,
  CONSTRAINT `premezcla1s_responsable_foreign` FOREIGN KEY (`responsable`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  CONSTRAINT `premezcla1s_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `premezcla1s`
--

LOCK TABLES `premezcla1s` WRITE;
/*!40000 ALTER TABLE `premezcla1s` DISABLE KEYS */;
INSERT INTO `premezcla1s` VALUES (1,6,'2024-12-11',1,1,NULL,2.0000,3.0000,NULL,5.0000,NULL,7.0000,'2024-12-11 14:08:44','2024-12-11 14:08:44'),(3,6,'2024-12-11',1,1,1.0000,2.0000,3.0000,4.0000,5.0000,6.0000,7.0000,'2024-12-11 16:15:02','2024-12-11 16:15:02'),(4,7,'2024-12-27',1,NULL,1.0000,2.0000,3.0000,4.0000,5.0000,6.0000,7.0000,'2024-12-27 18:35:00','2025-01-03 20:58:56');
/*!40000 ALTER TABLE `premezcla1s` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `premezcla2s`
--

DROP TABLE IF EXISTS `premezcla2s`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `premezcla2s` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `orp_id` bigint unsigned DEFAULT NULL,
  `tiempo` date DEFAULT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `responsable` bigint unsigned DEFAULT NULL,
  `lecitina_soya` decimal(8,4) DEFAULT NULL,
  `extracto_malta` decimal(8,4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `premezcla2s_orp_id_foreign` (`orp_id`),
  KEY `premezcla2s_user_id_foreign` (`user_id`),
  KEY `premezcla2s_responsable_foreign` (`responsable`),
  CONSTRAINT `premezcla2s_orp_id_foreign` FOREIGN KEY (`orp_id`) REFERENCES `orps` (`id`) ON DELETE CASCADE,
  CONSTRAINT `premezcla2s_responsable_foreign` FOREIGN KEY (`responsable`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  CONSTRAINT `premezcla2s_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `premezcla2s`
--

LOCK TABLES `premezcla2s` WRITE;
/*!40000 ALTER TABLE `premezcla2s` DISABLE KEYS */;
INSERT INTO `premezcla2s` VALUES (1,6,'2024-12-11',1,1,2.0000,2.0000,'2024-12-11 13:52:16','2024-12-11 13:52:16'),(2,7,'2025-01-03',1,1,12.6000,11.6000,'2025-01-03 20:49:05','2025-01-03 20:49:05');
/*!40000 ALTER TABLE `premezcla2s` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `premezcla3s`
--

DROP TABLE IF EXISTS `premezcla3s`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `premezcla3s` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `orp_id` bigint unsigned DEFAULT NULL,
  `tiempo` date DEFAULT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `responsable` bigint unsigned DEFAULT NULL,
  `manteca` decimal(8,4) DEFAULT NULL,
  `emulsificante` decimal(8,4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `premezcla3s_orp_id_foreign` (`orp_id`),
  KEY `premezcla3s_user_id_foreign` (`user_id`),
  KEY `premezcla3s_responsable_foreign` (`responsable`),
  CONSTRAINT `premezcla3s_orp_id_foreign` FOREIGN KEY (`orp_id`) REFERENCES `orps` (`id`) ON DELETE CASCADE,
  CONSTRAINT `premezcla3s_responsable_foreign` FOREIGN KEY (`responsable`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  CONSTRAINT `premezcla3s_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `premezcla3s`
--

LOCK TABLES `premezcla3s` WRITE;
/*!40000 ALTER TABLE `premezcla3s` DISABLE KEYS */;
INSERT INTO `premezcla3s` VALUES (1,6,'2024-12-11',1,1,0.0000,1.0000,'2024-12-11 14:15:38','2024-12-11 14:15:38');
/*!40000 ALTER TABLE `premezcla3s` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `preparador_maestros`
--

DROP TABLE IF EXISTS `preparador_maestros`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `preparador_maestros` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `orp_id` bigint unsigned DEFAULT NULL,
  `tiempo` date DEFAULT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `responsable` bigint unsigned DEFAULT NULL,
  `harina_trigo` decimal(8,4) DEFAULT NULL,
  `levadura` decimal(8,4) DEFAULT NULL,
  `agua` decimal(8,4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `preparador_maestros_orp_id_foreign` (`orp_id`),
  KEY `preparador_maestros_user_id_foreign` (`user_id`),
  KEY `preparador_maestros_responsable_foreign` (`responsable`),
  CONSTRAINT `preparador_maestros_orp_id_foreign` FOREIGN KEY (`orp_id`) REFERENCES `orps` (`id`) ON DELETE CASCADE,
  CONSTRAINT `preparador_maestros_responsable_foreign` FOREIGN KEY (`responsable`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  CONSTRAINT `preparador_maestros_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `preparador_maestros`
--

LOCK TABLES `preparador_maestros` WRITE;
/*!40000 ALTER TABLE `preparador_maestros` DISABLE KEYS */;
INSERT INTO `preparador_maestros` VALUES (1,6,'2024-12-11',1,NULL,2.0000,NULL,2.0000,'2024-12-11 14:12:37','2024-12-11 14:12:37'),(2,7,'2024-12-20',1,NULL,1.0000,2.0000,3.0000,'2024-12-20 15:58:19','2025-01-06 12:38:30'),(3,7,'2025-01-06',1,1,1234.0000,1234.0000,1234.0000,'2025-01-06 17:27:33','2025-01-06 17:27:33');
/*!40000 ALTER TABLE `preparador_maestros` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `productos`
--

DROP TABLE IF EXISTS `productos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `productos` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `codigo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nombre` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `categoria` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `destino` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `productos`
--

LOCK TABLES `productos` WRITE;
/*!40000 ALTER TABLE `productos` DISABLE KEYS */;
INSERT INTO `productos` VALUES (1,'PT01021','PAN HAMBURGUESA CON AJONJOLI 4','Pan hamburguesa','Burguer King',NULL,NULL),(2,'PT01022','PAN HAMBURGUESA CON AJONJOLI 5','Pan hamburguesa','Burguer King',NULL,NULL),(3,'PT01023','PAN HAMBURGUESA STEAKHOUSE BURGER KING','Pan hamburguesa','Burguer King',NULL,NULL),(4,'PT01038','PAN HAMBURGUESA BIG KING','Pan hamburguesa','Burguer King',NULL,NULL),(5,'PT01039','PAN ESPECIAL BURGER KING','Pan hamburguesa','Burguer King',NULL,NULL);
/*!40000 ALTER TABLE `productos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `recetas`
--

DROP TABLE IF EXISTS `recetas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `recetas` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `producto_id` bigint unsigned NOT NULL,
  `item_id` bigint unsigned DEFAULT NULL,
  `cantidad` decimal(8,4) DEFAULT NULL,
  `etapa` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `recetas_producto_id_foreign` (`producto_id`),
  KEY `recetas_item_id_foreign` (`item_id`),
  CONSTRAINT `recetas_item_id_foreign` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`) ON DELETE SET NULL,
  CONSTRAINT `recetas_producto_id_foreign` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=86 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `recetas`
--

LOCK TABLES `recetas` WRITE;
/*!40000 ALTER TABLE `recetas` DISABLE KEYS */;
INSERT INTO `recetas` VALUES (1,1,1,2.5000,'Pre mezcla 1',NULL,NULL),(2,1,2,0.7500,'Pre mezcla 1',NULL,NULL),(3,1,3,0.5000,'Pre mezcla 1',NULL,NULL),(4,1,4,0.5000,'Pre mezcla 1',NULL,NULL),(5,1,5,0.0500,'Pre mezcla 1',NULL,NULL),(6,1,6,0.1000,'Pre mezcla 1',NULL,NULL),(7,1,7,0.5000,'Pre mezcla 1',NULL,NULL),(8,1,8,0.2500,'Pre mezcla 2',NULL,NULL),(9,1,9,0.2500,'Pre mezcla 2',NULL,NULL),(10,1,10,3.0000,'Pre mezcla 3',NULL,NULL),(11,1,11,0.2500,'Pre mezcla 3',NULL,NULL),(12,1,12,25.0000,'Preparado Mestro',NULL,NULL),(13,1,13,0.2500,'Preparado Mestro',NULL,NULL),(14,1,14,12.5000,'Preparado Mestro',NULL,NULL),(15,1,15,0.1250,'Decorado Pintado',NULL,NULL),(16,1,16,10.0000,'Decorado Pintado',NULL,NULL),(17,1,17,0.0000,'Decorado Pintado',NULL,NULL),(18,2,1,2.5000,'Pre mezcla 1',NULL,NULL),(19,2,2,0.7500,'Pre mezcla 1',NULL,NULL),(20,2,3,0.5000,'Pre mezcla 1',NULL,NULL),(21,2,4,0.5000,'Pre mezcla 1',NULL,NULL),(22,2,5,0.0500,'Pre mezcla 1',NULL,NULL),(23,2,6,0.1000,'Pre mezcla 1',NULL,NULL),(24,2,7,0.5000,'Pre mezcla 1',NULL,NULL),(25,2,8,0.2500,'Pre mezcla 2',NULL,NULL),(26,2,9,0.2500,'Pre mezcla 2',NULL,NULL),(27,2,10,3.0000,'Pre mezcla 3',NULL,NULL),(28,2,11,0.2500,'Pre mezcla 3',NULL,NULL),(29,2,12,25.0000,'Preparado Mestro',NULL,NULL),(30,2,13,0.2500,'Preparado Mestro',NULL,NULL),(31,2,14,12.5000,'Preparado Mestro',NULL,NULL),(32,2,15,0.1250,'Decorado Pintado',NULL,NULL),(33,2,16,10.0000,'Decorado Pintado',NULL,NULL),(34,2,17,0.0000,'Decorado Pintado',NULL,NULL),(35,3,1,2.5000,'Pre mezcla 1',NULL,NULL),(36,3,2,0.7500,'Pre mezcla 1',NULL,NULL),(37,3,3,0.5000,'Pre mezcla 1',NULL,NULL),(38,3,4,0.5000,'Pre mezcla 1',NULL,NULL),(39,3,5,0.0500,'Pre mezcla 1',NULL,NULL),(40,3,6,0.1000,'Pre mezcla 1',NULL,NULL),(41,3,7,0.5000,'Pre mezcla 1',NULL,NULL),(42,3,8,0.2500,'Pre mezcla 2',NULL,NULL),(43,3,9,0.2500,'Pre mezcla 2',NULL,NULL),(44,3,10,3.0000,'Pre mezcla 3',NULL,NULL),(45,3,11,0.2500,'Pre mezcla 3',NULL,NULL),(46,3,12,25.0000,'Preparado Mestro',NULL,NULL),(47,3,13,0.2500,'Preparado Mestro',NULL,NULL),(48,3,14,12.5000,'Preparado Mestro',NULL,NULL),(49,3,15,0.1250,'Decorado Pintado',NULL,NULL),(50,3,16,0.0000,'Decorado Pintado',NULL,NULL),(51,3,17,1.8000,'Decorado Pintado',NULL,NULL),(52,4,1,2.5000,'Pre mezcla 1',NULL,NULL),(53,4,2,0.7500,'Pre mezcla 1',NULL,NULL),(54,4,3,0.5000,'Pre mezcla 1',NULL,NULL),(55,4,4,0.5000,'Pre mezcla 1',NULL,NULL),(56,4,5,0.0500,'Pre mezcla 1',NULL,NULL),(57,4,6,0.1000,'Pre mezcla 1',NULL,NULL),(58,4,7,0.5000,'Pre mezcla 1',NULL,NULL),(59,4,8,0.2500,'Pre mezcla 2',NULL,NULL),(60,4,9,0.2500,'Pre mezcla 2',NULL,NULL),(61,4,10,3.0000,'Pre mezcla 3',NULL,NULL),(62,4,11,0.2500,'Pre mezcla 3',NULL,NULL),(63,4,12,25.0000,'Preparado Mestro',NULL,NULL),(64,4,13,0.2500,'Preparado Mestro',NULL,NULL),(65,4,14,12.5000,'Preparado Mestro',NULL,NULL),(66,4,15,0.1250,'Decorado Pintado',NULL,NULL),(67,4,16,10.0000,'Decorado Pintado',NULL,NULL),(68,4,17,0.0000,'Decorado Pintado',NULL,NULL),(69,5,1,2.5000,'Pre mezcla 1',NULL,NULL),(70,5,2,0.7500,'Pre mezcla 1',NULL,NULL),(71,5,3,0.5000,'Pre mezcla 1',NULL,NULL),(72,5,4,0.3500,'Pre mezcla 1',NULL,NULL),(73,5,5,0.0500,'Pre mezcla 1',NULL,NULL),(74,5,6,0.1000,'Pre mezcla 1',NULL,NULL),(75,5,7,0.5000,'Pre mezcla 1',NULL,NULL),(76,5,8,0.2500,'Pre mezcla 2',NULL,NULL),(77,5,9,0.2500,'Pre mezcla 2',NULL,NULL),(78,5,10,3.0000,'Pre mezcla 3',NULL,NULL),(79,5,11,0.2500,'Pre mezcla 3',NULL,NULL),(80,5,12,25.0000,'Preparado Mestro',NULL,NULL),(81,5,13,0.2500,'Preparado Mestro',NULL,NULL),(82,5,14,12.5000,'Preparado Mestro',NULL,NULL),(83,5,15,0.1250,'Decorado Pintado',NULL,NULL),(84,5,16,10.0000,'Decorado Pintado',NULL,NULL),(85,5,17,0.0000,'Decorado Pintado',NULL,NULL);
/*!40000 ALTER TABLE `recetas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rendimiento_cantidads`
--

DROP TABLE IF EXISTS `rendimiento_cantidads`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `rendimiento_cantidads` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tiempo` date DEFAULT NULL,
  `orp_id` bigint unsigned DEFAULT NULL,
  `rendimiento_teorico` decimal(5,3) DEFAULT NULL,
  `rendimiento_real` decimal(5,3) DEFAULT NULL,
  `cantidad_conforme` decimal(5,3) DEFAULT NULL,
  `cantidad_no_conforme` decimal(5,3) DEFAULT NULL,
  `cantidad_pedido` decimal(5,3) DEFAULT NULL,
  `cantidad_contramuestra` decimal(5,3) DEFAULT NULL,
  `muestra_micro` decimal(5,3) DEFAULT NULL,
  `muestra_fisico` decimal(5,3) DEFAULT NULL,
  `canastillo_limpio` decimal(5,3) DEFAULT NULL,
  `cantidad_bolsa` decimal(5,3) DEFAULT NULL,
  `calidad_sellado` decimal(5,3) DEFAULT NULL,
  `cantidad_embalado` decimal(5,3) DEFAULT NULL,
  `calidad_embalado` decimal(5,3) DEFAULT NULL,
  `cantidad_canastillos` decimal(5,3) DEFAULT NULL,
  `total_merma` decimal(5,3) DEFAULT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `user_recepcionado` bigint unsigned DEFAULT NULL,
  `user_entregado` bigint unsigned DEFAULT NULL,
  `observaciones` text COLLATE utf8mb4_unicode_ci,
  `correccion` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `rendimiento_cantidads_orp_id_foreign` (`orp_id`),
  KEY `rendimiento_cantidads_user_id_foreign` (`user_id`),
  KEY `rendimiento_cantidads_user_recepcionado_foreign` (`user_recepcionado`),
  KEY `rendimiento_cantidads_user_entregado_foreign` (`user_entregado`),
  CONSTRAINT `rendimiento_cantidads_orp_id_foreign` FOREIGN KEY (`orp_id`) REFERENCES `orps` (`id`) ON DELETE CASCADE,
  CONSTRAINT `rendimiento_cantidads_user_entregado_foreign` FOREIGN KEY (`user_entregado`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  CONSTRAINT `rendimiento_cantidads_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  CONSTRAINT `rendimiento_cantidads_user_recepcionado_foreign` FOREIGN KEY (`user_recepcionado`) REFERENCES `users` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rendimiento_cantidads`
--

LOCK TABLES `rendimiento_cantidads` WRITE;
/*!40000 ALTER TABLE `rendimiento_cantidads` DISABLE KEYS */;
INSERT INTO `rendimiento_cantidads` VALUES (1,'2025-01-11',7,1.000,2.000,3.000,4.000,5.000,6.000,7.000,8.000,9.000,10.000,11.000,12.000,13.000,14.000,NULL,1,1,1,'16','17','2025-01-11 15:04:52','2025-01-11 15:04:52');
/*!40000 ALTER TABLE `rendimiento_cantidads` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `revision_diaria_maquinas`
--

DROP TABLE IF EXISTS `revision_diaria_maquinas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `revision_diaria_maquinas` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `maquina_equipo_id` bigint unsigned DEFAULT NULL,
  `tiempo` datetime NOT NULL,
  `estado` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `observaciones` text COLLATE utf8mb4_unicode_ci,
  `correccion` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `revision_diaria_maquinas_maquina_equipo_id_foreign` (`maquina_equipo_id`),
  CONSTRAINT `revision_diaria_maquinas_maquina_equipo_id_foreign` FOREIGN KEY (`maquina_equipo_id`) REFERENCES `maquina_equipos` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `revision_diaria_maquinas`
--

LOCK TABLES `revision_diaria_maquinas` WRITE;
/*!40000 ALTER TABLE `revision_diaria_maquinas` DISABLE KEYS */;
/*!40000 ALTER TABLE `revision_diaria_maquinas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sectors`
--

DROP TABLE IF EXISTS `sectors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sectors` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `codigo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sectors`
--

LOCK TABLES `sectors` WRITE;
/*!40000 ALTER TABLE `sectors` DISABLE KEYS */;
INSERT INTO `sectors` VALUES (1,'SUP-001','Superficie BL HL M Z',NULL,NULL),(2,'SUP-002','Superficie Premezcla',NULL,NULL),(3,'SUP-003','Superficie Codificado',NULL,NULL),(4,'SUP-004','Superficie Hornos',NULL,NULL),(5,'SUP-005','Superficie de embolsado PE PM',NULL,NULL),(6,'SUP-006','Superficie Buguer king',NULL,NULL),(7,'SUP-007','Superficie de camara de fermentaci├▓n',NULL,NULL),(8,'SUP-008','Area compartida',NULL,NULL),(9,'UTE-001','Utensillos burguer king',NULL,NULL),(10,'UTE-002','Utensillos Hi Line',NULL,NULL),(11,'UTE-003','Utensillos molde',NULL,NULL),(12,'UTE-004','Utensillos zunino',NULL,NULL),(13,'UTE-005','Utensillos premezcla',NULL,NULL),(14,'UTE-006','Utensillos otros',NULL,NULL),(15,'MAQ-001','Maquinaria BK HL',NULL,NULL),(16,'MAQ-002','Maquinaria molde',NULL,NULL),(17,'MAQ-003','Maquinaria zunino',NULL,NULL),(18,'MAQ-004','Maquinaria premezcla',NULL,NULL),(19,'MAQ-005','Maquinaria de codificado',NULL,NULL),(20,'MAQ-006','Maquinaria de hornos',NULL,NULL),(21,'MAQ-007','Maquinaria de embolsado pan especial',NULL,NULL),(22,'MAQ-008','Maquinaria de embolsado pan molde',NULL,NULL),(23,'MAQ-009','Maquinaria de embolsado burguer king',NULL,NULL);
/*!40000 ALTER TABLE `sectors` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `seleccion_visuals`
--

DROP TABLE IF EXISTS `seleccion_visuals`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `seleccion_visuals` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tiempo` date DEFAULT NULL,
  `orp_id` bigint unsigned DEFAULT NULL,
  `color_corteza` decimal(5,3) DEFAULT NULL,
  `color_base` decimal(5,3) DEFAULT NULL,
  `aspecto_miga` decimal(5,3) DEFAULT NULL,
  `deformidad_corte` decimal(5,3) DEFAULT NULL,
  `agujero_aire` decimal(5,3) DEFAULT NULL,
  `huecos_desgrane` decimal(5,3) DEFAULT NULL,
  `insuficiencia_ajonjoli` decimal(5,3) DEFAULT NULL,
  `exceso_ajonjoli` decimal(5,3) DEFAULT NULL,
  `arrugas_superficie` decimal(5,3) DEFAULT NULL,
  `globos_superficie` decimal(5,3) DEFAULT NULL,
  `harina_base` decimal(5,3) DEFAULT NULL,
  `simetria` decimal(5,3) DEFAULT NULL,
  `hundimiento_base` decimal(5,3) DEFAULT NULL,
  `presencio_beso` decimal(5,3) DEFAULT NULL,
  `total_merma` decimal(5,3) DEFAULT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `responsable` bigint unsigned DEFAULT NULL,
  `observaciones` text COLLATE utf8mb4_unicode_ci,
  `correccion` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `seleccion_visuals_orp_id_foreign` (`orp_id`),
  KEY `seleccion_visuals_user_id_foreign` (`user_id`),
  KEY `seleccion_visuals_responsable_foreign` (`responsable`),
  CONSTRAINT `seleccion_visuals_orp_id_foreign` FOREIGN KEY (`orp_id`) REFERENCES `orps` (`id`) ON DELETE CASCADE,
  CONSTRAINT `seleccion_visuals_responsable_foreign` FOREIGN KEY (`responsable`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  CONSTRAINT `seleccion_visuals_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `seleccion_visuals`
--

LOCK TABLES `seleccion_visuals` WRITE;
/*!40000 ALTER TABLE `seleccion_visuals` DISABLE KEYS */;
INSERT INTO `seleccion_visuals` VALUES (1,'2025-01-11',7,1.000,2.000,3.000,4.000,5.000,6.000,7.000,8.000,9.000,10.000,11.000,12.000,13.000,14.000,NULL,1,1,'15','16','2025-01-11 14:38:48','2025-01-11 14:38:48');
/*!40000 ALTER TABLE `seleccion_visuals` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sessions` (
  `id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `ip_address` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sessions`
--

LOCK TABLES `sessions` WRITE;
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
INSERT INTO `sessions` VALUES ('HWT6kHk8rkoZHHECGuCGyLjCJITRWnvgxnh5xTsk',1,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36 OPR/115.0.0.0','YTo1OntzOjY6Il90b2tlbiI7czo0MDoidmRXalNoRVVqdmxidEc2bHBrRFRXU1QxWDMwam9OTlZaaExOck1EeCI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjI3OiJodHRwOi8vbG9jYWxob3N0OjgwMDAvbG9naW4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO30=',1737032263),('KKqa64uDT67eBESGNCFAYr38etbjUIVQPl0upBSI',1,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36 OPR/115.0.0.0','YTo0OntzOjY6Il90b2tlbiI7czo0MDoiem4xRmx3bldkam1JblJ3V29YR25LTHpHSWpxYmV5SDB1R0oxd0hLMCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTA6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9tYW50ZW5pbWllbnRvL3JldmlzaW9uRGlhcmlhIjt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9',1737039268),('sgEvEQnPW2GuMnu4he4vK4txkaCiNoGhZjyOVbEo',1,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36 OPR/115.0.0.0','YTo1OntzOjY6Il90b2tlbiI7czo0MDoiOGFBQkhZNWphU3pVWjNpY0J6RnNGa2NOSDQ1VGdQU1RvNXlyWGRIZCI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjQ1OiJodHRwOi8vbG9jYWxob3N0OjgwMDAvbWFudGVuaW1pZW50by9tYXF1aW5hLzMiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO30=',1736974643);
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `codigo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rol` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cargo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `turno` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_codigo_unique` (`codigo`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=115 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Jorge','Loza','69965',NULL,NULL,'$2y$12$HGJvOq2RT4Sdl8uhFeiNOO9gFsJcY.TkcshwHvSmS/nHfPfg3Lc/m','admi',NULL,'Turno 2',NULL,NULL,'2024-12-18 13:18:29'),(2,'ARIEL','ANDRADE ARI├æEZ','66459',NULL,NULL,'$2y$12$HGJvOq2RT4Sdl8uhFeiNOO9gFsJcY.TkcshwHvSmS/nHfPfg3Lc/m','jef',NULL,'Central',NULL,NULL,NULL),(3,'KAREN','CANAVIRI VALDEZ','1',NULL,NULL,'$2y$12$HGJvOq2RT4Sdl8uhFeiNOO9gFsJcY.TkcshwHvSmS/nHfPfg3Lc/m','jef',NULL,'Central',NULL,NULL,NULL),(4,'VANESA','CANDIA ESPEJO','2',NULL,NULL,'$2y$12$HGJvOq2RT4Sdl8uhFeiNOO9gFsJcY.TkcshwHvSmS/nHfPfg3Lc/m','jef',NULL,'Central',NULL,NULL,NULL),(5,'SILVIA','CHOQUE MAMANI','3',NULL,NULL,'$2y$12$HGJvOq2RT4Sdl8uhFeiNOO9gFsJcY.TkcshwHvSmS/nHfPfg3Lc/m','jef',NULL,'Central',NULL,NULL,NULL),(6,'RICHARD','CHURA CONDORI','62648',NULL,NULL,'$2y$12$HGJvOq2RT4Sdl8uhFeiNOO9gFsJcY.TkcshwHvSmS/nHfPfg3Lc/m','jef',NULL,'Central',NULL,NULL,NULL),(7,'VANESSA','CONDORI LLANQUE','80183',NULL,NULL,'$2y$12$HGJvOq2RT4Sdl8uhFeiNOO9gFsJcY.TkcshwHvSmS/nHfPfg3Lc/m','jef',NULL,'Central',NULL,NULL,NULL),(8,'CINTHIA','GONZALES TORRICO','80253',NULL,NULL,'$2y$12$HGJvOq2RT4Sdl8uhFeiNOO9gFsJcY.TkcshwHvSmS/nHfPfg3Lc/m','jef',NULL,'Central',NULL,NULL,NULL),(9,'DENNYS','HUMEREZ DEL CARPIO','80437',NULL,NULL,'$2y$12$HGJvOq2RT4Sdl8uhFeiNOO9gFsJcY.TkcshwHvSmS/nHfPfg3Lc/m','jef',NULL,'Central',NULL,NULL,NULL),(10,'ADRIAN','JIMENEZ PINEDO','69422',NULL,NULL,'$2y$12$HGJvOq2RT4Sdl8uhFeiNOO9gFsJcY.TkcshwHvSmS/nHfPfg3Lc/m','jef',NULL,'Central',NULL,NULL,NULL),(11,'MARCELO','MANCILLA QUISBERT','80102',NULL,NULL,'$2y$12$HGJvOq2RT4Sdl8uhFeiNOO9gFsJcY.TkcshwHvSmS/nHfPfg3Lc/m','jef',NULL,'Central',NULL,NULL,NULL),(12,'NELDY','QUINO MONTECINOS','80362',NULL,NULL,'$2y$12$HGJvOq2RT4Sdl8uhFeiNOO9gFsJcY.TkcshwHvSmS/nHfPfg3Lc/m','jef',NULL,'Central',NULL,NULL,NULL),(13,'GABRIELA','QUIROZ MENDOZA','69065',NULL,NULL,'$2y$12$HGJvOq2RT4Sdl8uhFeiNOO9gFsJcY.TkcshwHvSmS/nHfPfg3Lc/m','jef',NULL,'Central',NULL,NULL,NULL),(14,'EDGAR','RIVAS ALI','4',NULL,NULL,'$2y$12$HGJvOq2RT4Sdl8uhFeiNOO9gFsJcY.TkcshwHvSmS/nHfPfg3Lc/m','jef',NULL,'Central',NULL,NULL,NULL),(15,'ANDRES','ROCA ARZE','80249',NULL,NULL,'$2y$12$HGJvOq2RT4Sdl8uhFeiNOO9gFsJcY.TkcshwHvSmS/nHfPfg3Lc/m','jef',NULL,'Central',NULL,NULL,NULL),(16,'SARA','ROMERO FERNANDEZ','68742',NULL,NULL,'$2y$12$HGJvOq2RT4Sdl8uhFeiNOO9gFsJcY.TkcshwHvSmS/nHfPfg3Lc/m','jef',NULL,'Central',NULL,NULL,NULL),(17,'ANTONIO','TORREZ ARRATIA','62059',NULL,NULL,'$2y$12$HGJvOq2RT4Sdl8uhFeiNOO9gFsJcY.TkcshwHvSmS/nHfPfg3Lc/m','jef',NULL,'Central',NULL,NULL,NULL),(18,'LIAN SERGIO','AGUIRRE CHOQUE','80309',NULL,NULL,'$2y$12$HGJvOq2RT4Sdl8uhFeiNOO9gFsJcY.TkcshwHvSmS/nHfPfg3Lc/m','personal',NULL,'Turno 1',NULL,NULL,NULL),(19,'VLADIMIR','ALANOCA ALI','67398',NULL,NULL,'$2y$12$HGJvOq2RT4Sdl8uhFeiNOO9gFsJcY.TkcshwHvSmS/nHfPfg3Lc/m','personal',NULL,'Turno 1',NULL,NULL,NULL),(20,'JOAQUIN','ALVAREZ ALVARO','5',NULL,NULL,'$2y$12$HGJvOq2RT4Sdl8uhFeiNOO9gFsJcY.TkcshwHvSmS/nHfPfg3Lc/m','personal',NULL,'Turno 1',NULL,NULL,NULL),(21,'LUISA','BAUTISTA QUISPE','62883',NULL,NULL,'$2y$12$HGJvOq2RT4Sdl8uhFeiNOO9gFsJcY.TkcshwHvSmS/nHfPfg3Lc/m','personal',NULL,'Turno 1',NULL,NULL,NULL),(22,'JOSE','BAUTISTA SIRPA','69984',NULL,NULL,'$2y$12$HGJvOq2RT4Sdl8uhFeiNOO9gFsJcY.TkcshwHvSmS/nHfPfg3Lc/m','personal',NULL,'Turno 1',NULL,NULL,NULL),(23,'RUDY','CALLISAYA ANTI','69862',NULL,NULL,'$2y$12$HGJvOq2RT4Sdl8uhFeiNOO9gFsJcY.TkcshwHvSmS/nHfPfg3Lc/m','personal',NULL,'Turno 1',NULL,NULL,NULL),(24,'EDSON','CALLIZAYA','69951',NULL,NULL,'$2y$12$HGJvOq2RT4Sdl8uhFeiNOO9gFsJcY.TkcshwHvSmS/nHfPfg3Lc/m','personal',NULL,'Turno 1',NULL,NULL,NULL),(25,'FERNANDO','CANAVIRI CONDORI','67571',NULL,NULL,'$2y$12$HGJvOq2RT4Sdl8uhFeiNOO9gFsJcY.TkcshwHvSmS/nHfPfg3Lc/m','personal',NULL,'Turno 1',NULL,NULL,NULL),(26,'KEVIN','CHOQUE CANAVIRI','69870',NULL,NULL,'$2y$12$HGJvOq2RT4Sdl8uhFeiNOO9gFsJcY.TkcshwHvSmS/nHfPfg3Lc/m','personal',NULL,'Turno 1',NULL,NULL,NULL),(27,'LUIS FERNANDO','CHOQUE CHAMBI','62898',NULL,NULL,'$2y$12$HGJvOq2RT4Sdl8uhFeiNOO9gFsJcY.TkcshwHvSmS/nHfPfg3Lc/m','personal',NULL,'Turno 1',NULL,NULL,NULL),(28,'INOCENCIA','CHOQUE QUISPE','69437',NULL,NULL,'$2y$12$HGJvOq2RT4Sdl8uhFeiNOO9gFsJcY.TkcshwHvSmS/nHfPfg3Lc/m','personal',NULL,'Turno 1',NULL,NULL,NULL),(29,'WILLY','ESPEJO LAURA','62591',NULL,NULL,'$2y$12$HGJvOq2RT4Sdl8uhFeiNOO9gFsJcY.TkcshwHvSmS/nHfPfg3Lc/m','personal',NULL,'Turno 1',NULL,NULL,NULL),(30,'TERESA JULIA','FLORES CASAS','65695',NULL,NULL,'$2y$12$HGJvOq2RT4Sdl8uhFeiNOO9gFsJcY.TkcshwHvSmS/nHfPfg3Lc/m','personal',NULL,'Turno 1',NULL,NULL,NULL),(31,'ALEJO','GONZALO','6',NULL,NULL,'$2y$12$HGJvOq2RT4Sdl8uhFeiNOO9gFsJcY.TkcshwHvSmS/nHfPfg3Lc/m','personal',NULL,'Turno 1',NULL,NULL,NULL),(32,'BETHSABE','HUARCACHO CHOQUEMITA','64525',NULL,NULL,'$2y$12$HGJvOq2RT4Sdl8uhFeiNOO9gFsJcY.TkcshwHvSmS/nHfPfg3Lc/m','personal',NULL,'Turno 1',NULL,NULL,NULL),(33,'JESUS MARCELO','ITURRY CRUZ','80241',NULL,NULL,'$2y$12$HGJvOq2RT4Sdl8uhFeiNOO9gFsJcY.TkcshwHvSmS/nHfPfg3Lc/m','personal',NULL,'Turno 1',NULL,NULL,NULL),(34,'DIANA','LEON','67098',NULL,NULL,'$2y$12$HGJvOq2RT4Sdl8uhFeiNOO9gFsJcY.TkcshwHvSmS/nHfPfg3Lc/m','personal',NULL,'Turno 1',NULL,NULL,NULL),(35,'NELLY ROSMERY','LOZA QUISPE','65122',NULL,NULL,'$2y$12$HGJvOq2RT4Sdl8uhFeiNOO9gFsJcY.TkcshwHvSmS/nHfPfg3Lc/m','personal',NULL,'Turno 1',NULL,NULL,NULL),(36,'ROBERTO CARLOS','LUJAN COCARICO','66782',NULL,NULL,'$2y$12$HGJvOq2RT4Sdl8uhFeiNOO9gFsJcY.TkcshwHvSmS/nHfPfg3Lc/m','personal',NULL,'Turno 1',NULL,NULL,NULL),(37,'MARIBEL CLARA','MAMANI CONDORI','69443',NULL,NULL,'$2y$12$HGJvOq2RT4Sdl8uhFeiNOO9gFsJcY.TkcshwHvSmS/nHfPfg3Lc/m','personal',NULL,'Turno 1',NULL,NULL,NULL),(38,'LIMBERT AMERICO','MAMANI OSCO','69591',NULL,NULL,'$2y$12$HGJvOq2RT4Sdl8uhFeiNOO9gFsJcY.TkcshwHvSmS/nHfPfg3Lc/m','personal',NULL,'Turno 1',NULL,NULL,NULL),(39,'JUAN','MAMANI TANCARA','62998',NULL,NULL,'$2y$12$HGJvOq2RT4Sdl8uhFeiNOO9gFsJcY.TkcshwHvSmS/nHfPfg3Lc/m','personal',NULL,'Turno 1',NULL,NULL,NULL),(40,'DANIEL','MAMANI TANCARA','69120',NULL,NULL,'$2y$12$HGJvOq2RT4Sdl8uhFeiNOO9gFsJcY.TkcshwHvSmS/nHfPfg3Lc/m','personal',NULL,'Turno 1',NULL,NULL,NULL),(41,'RODOLFO','MURILLO ALI','68409',NULL,NULL,'$2y$12$HGJvOq2RT4Sdl8uhFeiNOO9gFsJcY.TkcshwHvSmS/nHfPfg3Lc/m','personal',NULL,'Turno 1',NULL,NULL,NULL),(42,'FAUSTA','NINA','66326',NULL,NULL,'$2y$12$HGJvOq2RT4Sdl8uhFeiNOO9gFsJcY.TkcshwHvSmS/nHfPfg3Lc/m','personal',NULL,'Turno 1',NULL,NULL,NULL),(43,'KEVIN','NINA PAUCARA','80356',NULL,NULL,'$2y$12$HGJvOq2RT4Sdl8uhFeiNOO9gFsJcY.TkcshwHvSmS/nHfPfg3Lc/m','personal',NULL,'Turno 1',NULL,NULL,NULL),(44,'JAQUELINE','PAIRO CORDERO','66133',NULL,NULL,'$2y$12$HGJvOq2RT4Sdl8uhFeiNOO9gFsJcY.TkcshwHvSmS/nHfPfg3Lc/m','personal',NULL,'Turno 1',NULL,NULL,NULL),(45,'GLEYSA YUESSET','PALACIOS QUISBERT','65677',NULL,NULL,'$2y$12$HGJvOq2RT4Sdl8uhFeiNOO9gFsJcY.TkcshwHvSmS/nHfPfg3Lc/m','personal',NULL,'Turno 1',NULL,NULL,NULL),(46,'MISSEL PAOLA','PAREDES CUSI','69440',NULL,NULL,'$2y$12$HGJvOq2RT4Sdl8uhFeiNOO9gFsJcY.TkcshwHvSmS/nHfPfg3Lc/m','personal',NULL,'Turno 1',NULL,NULL,NULL),(47,'HUGO','SILVERA','66924',NULL,NULL,'$2y$12$HGJvOq2RT4Sdl8uhFeiNOO9gFsJcY.TkcshwHvSmS/nHfPfg3Lc/m','personal',NULL,'Turno 1',NULL,NULL,NULL),(48,'SOLYDA YUGAR','SU├æAGUA MAMANI','65596',NULL,NULL,'$2y$12$HGJvOq2RT4Sdl8uhFeiNOO9gFsJcY.TkcshwHvSmS/nHfPfg3Lc/m','personal',NULL,'Turno 1',NULL,NULL,NULL),(49,'ANCELMO ALEJANDRO','TARQUI QUISPE','69501',NULL,NULL,'$2y$12$HGJvOq2RT4Sdl8uhFeiNOO9gFsJcY.TkcshwHvSmS/nHfPfg3Lc/m','personal',NULL,'Turno 1',NULL,NULL,NULL),(50,'GERMAN','TICONA QUISPE','62658',NULL,NULL,'$2y$12$HGJvOq2RT4Sdl8uhFeiNOO9gFsJcY.TkcshwHvSmS/nHfPfg3Lc/m','personal',NULL,'Turno 1',NULL,NULL,NULL),(51,'KAREN','VALDEZ ESPINOZA','65634',NULL,NULL,'$2y$12$HGJvOq2RT4Sdl8uhFeiNOO9gFsJcY.TkcshwHvSmS/nHfPfg3Lc/m','personal',NULL,'Turno 1',NULL,NULL,NULL),(52,'NANCY','VILLAZANTE MARAZA','65144',NULL,NULL,'$2y$12$HGJvOq2RT4Sdl8uhFeiNOO9gFsJcY.TkcshwHvSmS/nHfPfg3Lc/m','personal',NULL,'Turno 1',NULL,NULL,NULL),(53,'PAMELA PILAR','BARRERA MAMANI','64113',NULL,NULL,'$2y$12$HGJvOq2RT4Sdl8uhFeiNOO9gFsJcY.TkcshwHvSmS/nHfPfg3Lc/m','personal',NULL,'Turno 2',NULL,NULL,NULL),(54,'SABINA','CARITA CONDORI','65377',NULL,NULL,'$2y$12$HGJvOq2RT4Sdl8uhFeiNOO9gFsJcY.TkcshwHvSmS/nHfPfg3Lc/m','personal',NULL,'Turno 2',NULL,NULL,NULL),(55,'GABRIEL','CASTILLO AGUILAR','69433',NULL,NULL,'$2y$12$HGJvOq2RT4Sdl8uhFeiNOO9gFsJcY.TkcshwHvSmS/nHfPfg3Lc/m','personal',NULL,'Turno 2',NULL,NULL,NULL),(56,'JUAN VICTOR','CONDORI JUAN','7',NULL,NULL,'$2y$12$HGJvOq2RT4Sdl8uhFeiNOO9gFsJcY.TkcshwHvSmS/nHfPfg3Lc/m','personal',NULL,'Turno 2',NULL,NULL,NULL),(57,'LETICIA','CORIA MENDOZA','64047',NULL,NULL,'$2y$12$HGJvOq2RT4Sdl8uhFeiNOO9gFsJcY.TkcshwHvSmS/nHfPfg3Lc/m','personal',NULL,'Turno 2',NULL,NULL,NULL),(58,'GUIDO','ESCOBAR MENDOZA','69766',NULL,NULL,'$2y$12$HGJvOq2RT4Sdl8uhFeiNOO9gFsJcY.TkcshwHvSmS/nHfPfg3Lc/m','personal',NULL,'Turno 2',NULL,NULL,NULL),(59,'ELOINO','GOMES','66744',NULL,NULL,'$2y$12$HGJvOq2RT4Sdl8uhFeiNOO9gFsJcY.TkcshwHvSmS/nHfPfg3Lc/m','personal',NULL,'Turno 2',NULL,NULL,NULL),(60,'LIMBERT','HUANCA BAUTISTA','80262',NULL,NULL,'$2y$12$HGJvOq2RT4Sdl8uhFeiNOO9gFsJcY.TkcshwHvSmS/nHfPfg3Lc/m','personal',NULL,'Turno 2',NULL,NULL,NULL),(61,'MELIZA','HUANCA CHAVEZ','69729',NULL,NULL,'$2y$12$HGJvOq2RT4Sdl8uhFeiNOO9gFsJcY.TkcshwHvSmS/nHfPfg3Lc/m','personal',NULL,'Turno 2',NULL,NULL,NULL),(62,'YANETH SANDRA','JURADO MOSCOSO','64618',NULL,NULL,'$2y$12$HGJvOq2RT4Sdl8uhFeiNOO9gFsJcY.TkcshwHvSmS/nHfPfg3Lc/m','personal',NULL,'Turno 2',NULL,NULL,NULL),(63,'GERMAN','LIMACHI YUJRA','69441',NULL,NULL,'$2y$12$HGJvOq2RT4Sdl8uhFeiNOO9gFsJcY.TkcshwHvSmS/nHfPfg3Lc/m','personal',NULL,'Turno 2',NULL,NULL,NULL),(64,'ROSA MARIA','LOPEZ GIRONDA','69442',NULL,NULL,'$2y$12$HGJvOq2RT4Sdl8uhFeiNOO9gFsJcY.TkcshwHvSmS/nHfPfg3Lc/m','personal',NULL,'Turno 2',NULL,NULL,NULL),(65,'JESUSA','MAMANI ACHATA','62724',NULL,NULL,'$2y$12$HGJvOq2RT4Sdl8uhFeiNOO9gFsJcY.TkcshwHvSmS/nHfPfg3Lc/m','personal',NULL,'Turno 2',NULL,NULL,NULL),(66,'PATRICIA','MAMANI ALI','62725',NULL,NULL,'$2y$12$HGJvOq2RT4Sdl8uhFeiNOO9gFsJcY.TkcshwHvSmS/nHfPfg3Lc/m','personal',NULL,'Turno 2',NULL,NULL,NULL),(67,'MONICA','MAMANI GUARACHI','64914',NULL,NULL,'$2y$12$HGJvOq2RT4Sdl8uhFeiNOO9gFsJcY.TkcshwHvSmS/nHfPfg3Lc/m','personal',NULL,'Turno 2',NULL,NULL,NULL),(68,'EFRAIN CARLOS','MAMANI OSCO','8',NULL,NULL,'$2y$12$HGJvOq2RT4Sdl8uhFeiNOO9gFsJcY.TkcshwHvSmS/nHfPfg3Lc/m','personal',NULL,'Turno 2',NULL,NULL,NULL),(69,'MARTHA','MAMANI QUISPE','66163',NULL,NULL,'$2y$12$HGJvOq2RT4Sdl8uhFeiNOO9gFsJcY.TkcshwHvSmS/nHfPfg3Lc/m','personal',NULL,'Turno 2',NULL,NULL,NULL),(70,'JOSUE DAVID','MAMANI RIOS','80258',NULL,NULL,'$2y$12$HGJvOq2RT4Sdl8uhFeiNOO9gFsJcY.TkcshwHvSmS/nHfPfg3Lc/m','personal',NULL,'Turno 2',NULL,NULL,NULL),(71,'PAMELA EVELIN','MEZA TINTAYA','69436',NULL,NULL,'$2y$12$HGJvOq2RT4Sdl8uhFeiNOO9gFsJcY.TkcshwHvSmS/nHfPfg3Lc/m','personal',NULL,'Turno 2',NULL,NULL,NULL),(72,'ISMAEL','MUIBA NOZA','65486',NULL,NULL,'$2y$12$HGJvOq2RT4Sdl8uhFeiNOO9gFsJcY.TkcshwHvSmS/nHfPfg3Lc/m','personal',NULL,'Turno 2',NULL,NULL,NULL),(73,'ROSARIO','MURILLO QUISPE','80194',NULL,NULL,'$2y$12$HGJvOq2RT4Sdl8uhFeiNOO9gFsJcY.TkcshwHvSmS/nHfPfg3Lc/m','personal',NULL,'Turno 2',NULL,NULL,NULL),(74,'AGUSTINA','OCHOA CALLE','64770',NULL,NULL,'$2y$12$HGJvOq2RT4Sdl8uhFeiNOO9gFsJcY.TkcshwHvSmS/nHfPfg3Lc/m','personal',NULL,'Turno 2',NULL,NULL,NULL),(75,'DIONES','QUISPE COCHI','69912',NULL,NULL,'$2y$12$HGJvOq2RT4Sdl8uhFeiNOO9gFsJcY.TkcshwHvSmS/nHfPfg3Lc/m','personal',NULL,'Turno 2',NULL,NULL,NULL),(76,'LUIS','SANCHEZ CALLISAYA','9',NULL,NULL,'$2y$12$HGJvOq2RT4Sdl8uhFeiNOO9gFsJcY.TkcshwHvSmS/nHfPfg3Lc/m','personal',NULL,'Turno 2',NULL,NULL,NULL),(77,'EFRAIN','ZANGAR QUISPE','80257',NULL,NULL,'$2y$12$HGJvOq2RT4Sdl8uhFeiNOO9gFsJcY.TkcshwHvSmS/nHfPfg3Lc/m','personal',NULL,'Turno 2',NULL,NULL,NULL),(78,'JAIR RODRIGO','ALIAGA QUISPE','10',NULL,NULL,'$2y$12$HGJvOq2RT4Sdl8uhFeiNOO9gFsJcY.TkcshwHvSmS/nHfPfg3Lc/m','personal',NULL,'Turno 3',NULL,NULL,NULL),(79,'MARCO FELIX','APAZA BELTRAN','69777',NULL,NULL,'$2y$12$HGJvOq2RT4Sdl8uhFeiNOO9gFsJcY.TkcshwHvSmS/nHfPfg3Lc/m','personal',NULL,'Turno 3',NULL,NULL,NULL),(80,'NANCY','CALANI CONDORI','62692',NULL,NULL,'$2y$12$HGJvOq2RT4Sdl8uhFeiNOO9gFsJcY.TkcshwHvSmS/nHfPfg3Lc/m','personal',NULL,'Turno 3',NULL,NULL,NULL),(81,'AJATA','CALLISAYA MAGIN','80359',NULL,NULL,'$2y$12$HGJvOq2RT4Sdl8uhFeiNOO9gFsJcY.TkcshwHvSmS/nHfPfg3Lc/m','personal',NULL,'Turno 3',NULL,NULL,NULL),(82,'CIRILO','CANAVIRI APARICIO','62222',NULL,NULL,'$2y$12$HGJvOq2RT4Sdl8uhFeiNOO9gFsJcY.TkcshwHvSmS/nHfPfg3Lc/m','personal',NULL,'Turno 3',NULL,NULL,NULL),(83,'GONZALO','CATUNTA HUANCA','66821',NULL,NULL,'$2y$12$HGJvOq2RT4Sdl8uhFeiNOO9gFsJcY.TkcshwHvSmS/nHfPfg3Lc/m','personal',NULL,'Turno 3',NULL,NULL,NULL),(84,'JAVIER','CHIPANA CALIZAYA','62208',NULL,NULL,'$2y$12$HGJvOq2RT4Sdl8uhFeiNOO9gFsJcY.TkcshwHvSmS/nHfPfg3Lc/m','personal',NULL,'Turno 3',NULL,NULL,NULL),(85,'MARIANELA','CHOQUE RUEDA','65479',NULL,NULL,'$2y$12$HGJvOq2RT4Sdl8uhFeiNOO9gFsJcY.TkcshwHvSmS/nHfPfg3Lc/m','personal',NULL,'Turno 3',NULL,NULL,NULL),(86,'LEONEL','CHOQUE YUJRA','64136',NULL,NULL,'$2y$12$HGJvOq2RT4Sdl8uhFeiNOO9gFsJcY.TkcshwHvSmS/nHfPfg3Lc/m','personal',NULL,'Turno 3',NULL,NULL,NULL),(87,'JESUS JOSE','CUTILI MANZANEDA','64623',NULL,NULL,'$2y$12$HGJvOq2RT4Sdl8uhFeiNOO9gFsJcY.TkcshwHvSmS/nHfPfg3Lc/m','personal',NULL,'Turno 3',NULL,NULL,NULL),(88,'CELCIO','HUARICOLLO CONDORI','64624',NULL,NULL,'$2y$12$HGJvOq2RT4Sdl8uhFeiNOO9gFsJcY.TkcshwHvSmS/nHfPfg3Lc/m','personal',NULL,'Turno 3',NULL,NULL,NULL),(89,'RICHARD','HUMIRI PAIRUMANI','65603',NULL,NULL,'$2y$12$HGJvOq2RT4Sdl8uhFeiNOO9gFsJcY.TkcshwHvSmS/nHfPfg3Lc/m','personal',NULL,'Turno 3',NULL,NULL,NULL),(90,'ALEX','JARANDILLA CALLE','80358',NULL,NULL,'$2y$12$HGJvOq2RT4Sdl8uhFeiNOO9gFsJcY.TkcshwHvSmS/nHfPfg3Lc/m','personal',NULL,'Turno 3',NULL,NULL,NULL),(91,'MARIO','LAURA NINA','62571',NULL,NULL,'$2y$12$HGJvOq2RT4Sdl8uhFeiNOO9gFsJcY.TkcshwHvSmS/nHfPfg3Lc/m','personal',NULL,'Turno 3',NULL,NULL,NULL),(92,'RENE VICTOR','LIA CRUZ','67317',NULL,NULL,'$2y$12$HGJvOq2RT4Sdl8uhFeiNOO9gFsJcY.TkcshwHvSmS/nHfPfg3Lc/m','personal',NULL,'Turno 3',NULL,NULL,NULL),(93,'EDSON','MAMANI ALEJO','62402',NULL,NULL,'$2y$12$HGJvOq2RT4Sdl8uhFeiNOO9gFsJcY.TkcshwHvSmS/nHfPfg3Lc/m','personal',NULL,'Turno 3',NULL,NULL,NULL),(94,'VIDAL','MAMANI CANAVIRI','11',NULL,NULL,'$2y$12$HGJvOq2RT4Sdl8uhFeiNOO9gFsJcY.TkcshwHvSmS/nHfPfg3Lc/m','personal',NULL,'Turno 3',NULL,NULL,NULL),(95,'WILLY','MAMANI CHOQUE','67610',NULL,NULL,'$2y$12$HGJvOq2RT4Sdl8uhFeiNOO9gFsJcY.TkcshwHvSmS/nHfPfg3Lc/m','personal',NULL,'Turno 3',NULL,NULL,NULL),(96,'PAULINO','MAMANI COPA','62247',NULL,NULL,'$2y$12$HGJvOq2RT4Sdl8uhFeiNOO9gFsJcY.TkcshwHvSmS/nHfPfg3Lc/m','personal',NULL,'Turno 3',NULL,NULL,NULL),(97,'ANGEL ADOLFO','MAMANI HILARI','62209',NULL,NULL,'$2y$12$HGJvOq2RT4Sdl8uhFeiNOO9gFsJcY.TkcshwHvSmS/nHfPfg3Lc/m','personal',NULL,'Turno 3',NULL,NULL,NULL),(98,'EMILIO','MAMANI MALLEA','66180',NULL,NULL,'$2y$12$HGJvOq2RT4Sdl8uhFeiNOO9gFsJcY.TkcshwHvSmS/nHfPfg3Lc/m','personal',NULL,'Turno 3',NULL,NULL,NULL),(99,'HUGO','MAMANI MOLLO','66037',NULL,NULL,'$2y$12$HGJvOq2RT4Sdl8uhFeiNOO9gFsJcY.TkcshwHvSmS/nHfPfg3Lc/m','personal',NULL,'Turno 3',NULL,NULL,NULL),(100,'ROGER','MAMANI QUISPE','62389',NULL,NULL,'$2y$12$HGJvOq2RT4Sdl8uhFeiNOO9gFsJcY.TkcshwHvSmS/nHfPfg3Lc/m','personal',NULL,'Turno 3',NULL,NULL,NULL),(101,'JORGE EDUARDO','MAMANI QUISPE','65920',NULL,NULL,'$2y$12$HGJvOq2RT4Sdl8uhFeiNOO9gFsJcY.TkcshwHvSmS/nHfPfg3Lc/m','personal',NULL,'Turno 3',NULL,NULL,NULL),(102,'JOSE LUIS','MURILLO ALI','12',NULL,NULL,'$2y$12$HGJvOq2RT4Sdl8uhFeiNOO9gFsJcY.TkcshwHvSmS/nHfPfg3Lc/m','personal',NULL,'Turno 3',NULL,NULL,NULL),(103,'WILSON','POMA MAMANI','13',NULL,NULL,'$2y$12$HGJvOq2RT4Sdl8uhFeiNOO9gFsJcY.TkcshwHvSmS/nHfPfg3Lc/m','personal',NULL,'Turno 3',NULL,NULL,NULL),(104,'ELIAS','QUISPE CONDORI','14',NULL,NULL,'$2y$12$HGJvOq2RT4Sdl8uhFeiNOO9gFsJcY.TkcshwHvSmS/nHfPfg3Lc/m','personal',NULL,'Turno 3',NULL,NULL,NULL),(105,'MOISES','QUISPE CONDORI','15',NULL,NULL,'$2y$12$HGJvOq2RT4Sdl8uhFeiNOO9gFsJcY.TkcshwHvSmS/nHfPfg3Lc/m','personal',NULL,'Turno 3',NULL,NULL,NULL),(106,'WALTER','QUISPE QUISPE','62369',NULL,NULL,'$2y$12$HGJvOq2RT4Sdl8uhFeiNOO9gFsJcY.TkcshwHvSmS/nHfPfg3Lc/m','personal',NULL,'Turno 3',NULL,NULL,NULL),(107,'JUAN ROGELIO','QUISPE QUISPE','16',NULL,NULL,'$2y$12$HGJvOq2RT4Sdl8uhFeiNOO9gFsJcY.TkcshwHvSmS/nHfPfg3Lc/m','personal',NULL,'Turno 3',NULL,NULL,NULL),(108,'SANTOS FABIAN','REA ANABAMBA','62575',NULL,NULL,'$2y$12$HGJvOq2RT4Sdl8uhFeiNOO9gFsJcY.TkcshwHvSmS/nHfPfg3Lc/m','personal',NULL,'Turno 3',NULL,NULL,NULL),(109,'PABLO','SU├æAGUA MAMANI','64213',NULL,NULL,'$2y$12$HGJvOq2RT4Sdl8uhFeiNOO9gFsJcY.TkcshwHvSmS/nHfPfg3Lc/m','personal',NULL,'Turno 3',NULL,NULL,NULL),(110,'KEVIN','SUXO','69514',NULL,NULL,'$2y$12$HGJvOq2RT4Sdl8uhFeiNOO9gFsJcY.TkcshwHvSmS/nHfPfg3Lc/m','personal',NULL,'Turno 3',NULL,NULL,NULL),(111,'GREGORIO','TICONA APAZA','62227',NULL,NULL,'$2y$12$HGJvOq2RT4Sdl8uhFeiNOO9gFsJcY.TkcshwHvSmS/nHfPfg3Lc/m','personal',NULL,'Turno 3',NULL,NULL,NULL),(112,'JUAN JOSE','TOLA MAMANI','66737',NULL,NULL,'$2y$12$HGJvOq2RT4Sdl8uhFeiNOO9gFsJcY.TkcshwHvSmS/nHfPfg3Lc/m','personal',NULL,'Turno 3',NULL,NULL,NULL),(113,'ADOLFO','TUMIRI ALAVI','65219',NULL,NULL,'$2y$12$HGJvOq2RT4Sdl8uhFeiNOO9gFsJcY.TkcshwHvSmS/nHfPfg3Lc/m','personal',NULL,'Turno 3',NULL,NULL,NULL),(114,'GONZALO','ZARCO CASTILLO','65531',NULL,NULL,'$2y$12$HGJvOq2RT4Sdl8uhFeiNOO9gFsJcY.TkcshwHvSmS/nHfPfg3Lc/m','personal',NULL,'Turno 3',NULL,NULL,NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `verificacion_ord_lip_des`
--

DROP TABLE IF EXISTS `verificacion_ord_lip_des`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `verificacion_ord_lip_des` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tiempo` datetime NOT NULL,
  `ord_lim_des_id` bigint unsigned DEFAULT NULL,
  `limpieza` tinyint(1) DEFAULT NULL,
  `desinfeccion` tinyint(1) DEFAULT NULL,
  `profunda` tinyint(1) DEFAULT NULL,
  `observaciones` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `correccion` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `user_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `verificacion_ord_lip_des_ord_lim_des_id_foreign` (`ord_lim_des_id`),
  KEY `verificacion_ord_lip_des_user_id_foreign` (`user_id`),
  CONSTRAINT `verificacion_ord_lip_des_ord_lim_des_id_foreign` FOREIGN KEY (`ord_lim_des_id`) REFERENCES `ord_lim_des` (`id`) ON DELETE RESTRICT,
  CONSTRAINT `verificacion_ord_lip_des_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT
) ENGINE=InnoDB AUTO_INCREMENT=486 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `verificacion_ord_lip_des`
--

LOCK TABLES `verificacion_ord_lip_des` WRITE;
/*!40000 ALTER TABLE `verificacion_ord_lip_des` DISABLE KEYS */;
INSERT INTO `verificacion_ord_lip_des` VALUES (337,'2024-11-26 12:39:04',1,1,0,0,NULL,NULL,1,'2024-11-26 16:39:04','2024-11-26 16:39:04'),(338,'2024-11-26 12:39:04',2,0,1,0,NULL,NULL,1,'2024-11-26 16:39:04','2024-11-26 16:39:04'),(339,'2024-11-26 12:39:04',3,0,0,0,NULL,NULL,1,'2024-11-26 16:39:04','2024-11-26 16:39:04'),(340,'2024-11-26 12:39:04',4,0,0,0,NULL,NULL,1,'2024-11-26 16:39:04','2024-11-26 16:39:04'),(341,'2024-11-26 12:39:04',5,1,0,0,NULL,NULL,1,'2024-11-26 16:39:05','2024-11-26 16:39:05'),(342,'2024-11-26 12:39:05',6,0,0,0,NULL,NULL,1,'2024-11-26 16:39:05','2024-11-26 16:39:05'),(343,'2024-11-26 12:39:05',7,0,0,0,NULL,NULL,1,'2024-11-26 16:39:05','2024-11-26 16:39:05'),(344,'2024-11-26 12:39:05',8,0,0,0,NULL,NULL,1,'2024-11-26 16:39:05','2024-11-26 16:39:05'),(345,'2024-11-26 12:39:05',9,0,0,0,NULL,NULL,1,'2024-11-26 16:39:05','2024-11-26 16:39:05'),(346,'2024-11-26 12:39:05',10,1,0,0,NULL,NULL,1,'2024-11-26 16:39:05','2024-11-26 16:39:05'),(347,'2024-11-26 12:39:05',11,0,0,0,NULL,NULL,1,'2024-11-26 16:39:05','2024-11-26 16:39:05'),(348,'2024-11-26 12:39:05',12,0,0,0,NULL,NULL,1,'2024-11-26 16:39:05','2024-11-26 16:39:05'),(349,'2024-11-26 12:39:05',13,0,0,0,NULL,NULL,1,'2024-11-26 16:39:05','2024-11-26 16:39:05'),(350,'2024-11-26 12:39:05',14,0,0,0,NULL,NULL,1,'2024-11-26 16:39:05','2024-11-26 16:39:05'),(351,'2024-11-26 12:39:05',15,1,0,0,NULL,NULL,1,'2024-11-26 16:39:05','2024-11-26 16:39:05'),(352,'2024-11-26 13:25:28',16,1,1,0,NULL,NULL,1,'2024-11-26 17:25:28','2024-11-26 17:25:28'),(353,'2024-11-26 13:25:28',17,1,1,0,NULL,NULL,1,'2024-11-26 17:25:28','2024-11-26 17:25:28'),(354,'2024-11-26 13:25:28',18,1,0,0,NULL,NULL,1,'2024-11-26 17:25:28','2024-11-26 17:25:28'),(355,'2024-11-26 13:25:28',19,1,0,0,NULL,NULL,1,'2024-11-26 17:25:28','2024-11-26 17:25:28'),(356,'2024-11-26 13:25:28',20,0,0,0,NULL,NULL,1,'2024-11-26 17:25:28','2024-11-26 17:25:28'),(357,'2024-11-26 13:25:28',21,1,0,0,NULL,NULL,1,'2024-11-26 17:25:28','2024-11-26 17:25:28'),(358,'2024-11-26 13:25:28',22,1,0,0,NULL,NULL,1,'2024-11-26 17:25:28','2024-11-26 17:25:28'),(359,'2024-11-26 15:12:23',235,1,1,1,NULL,NULL,1,'2024-11-26 19:12:23','2024-11-26 19:12:23'),(360,'2024-11-26 15:12:23',236,1,1,1,NULL,NULL,1,'2024-11-26 19:12:23','2024-11-26 19:12:23'),(361,'2024-11-26 15:12:23',237,0,1,1,NULL,NULL,1,'2024-11-26 19:12:23','2024-11-26 19:12:23'),(362,'2024-11-26 15:12:23',238,1,1,1,NULL,NULL,1,'2024-11-26 19:12:23','2024-11-26 19:12:23'),(363,'2024-11-26 15:12:24',239,1,1,1,NULL,NULL,1,'2024-11-26 19:12:24','2024-11-26 19:12:24'),(364,'2024-11-26 15:12:24',240,1,1,1,NULL,NULL,1,'2024-11-26 19:12:24','2024-11-26 19:12:24'),(365,'2024-11-27 11:32:32',1,1,1,0,NULL,NULL,1,'2024-11-27 15:32:32','2024-11-27 15:32:32'),(366,'2024-11-27 11:32:32',2,1,1,0,NULL,NULL,1,'2024-11-27 15:32:32','2024-11-27 15:32:32'),(367,'2024-11-27 11:32:32',3,0,1,0,NULL,NULL,1,'2024-11-27 15:32:32','2024-11-27 15:32:32'),(368,'2024-11-27 11:32:32',4,1,1,0,NULL,NULL,1,'2024-11-27 15:32:32','2024-11-27 15:32:32'),(369,'2024-11-27 11:32:32',5,1,0,0,NULL,NULL,1,'2024-11-27 15:32:32','2024-11-27 15:32:32'),(370,'2024-11-27 11:32:32',6,1,0,0,NULL,NULL,1,'2024-11-27 15:32:32','2024-11-27 15:32:32'),(371,'2024-11-27 11:32:32',7,1,0,0,NULL,NULL,1,'2024-11-27 15:32:32','2024-11-27 15:32:32'),(372,'2024-11-27 11:32:32',8,1,0,0,NULL,NULL,1,'2024-11-27 15:32:32','2024-11-27 15:32:32'),(373,'2024-11-27 11:32:32',9,1,0,0,NULL,NULL,1,'2024-11-27 15:32:32','2024-11-27 15:32:32'),(374,'2024-11-27 11:32:32',10,0,0,0,NULL,NULL,1,'2024-11-27 15:32:32','2024-11-27 15:32:32'),(375,'2024-11-27 11:32:32',11,1,0,0,NULL,NULL,1,'2024-11-27 15:32:32','2024-11-27 15:32:32'),(376,'2024-11-27 11:32:32',12,0,0,0,NULL,NULL,1,'2024-11-27 15:32:32','2024-11-27 15:32:32'),(377,'2024-11-27 11:32:32',13,0,0,0,NULL,NULL,1,'2024-11-27 15:32:32','2024-11-27 15:32:32'),(378,'2024-11-27 11:32:32',14,0,0,0,NULL,NULL,1,'2024-11-27 15:32:32','2024-11-27 15:32:32'),(379,'2024-11-27 11:32:32',15,0,0,0,NULL,NULL,1,'2024-11-27 15:32:32','2024-11-27 15:32:32'),(380,'2024-11-27 11:37:03',1,1,1,0,NULL,NULL,1,'2024-11-27 15:37:03','2024-11-27 15:37:03'),(381,'2024-11-27 11:37:03',2,1,1,0,NULL,NULL,1,'2024-11-27 15:37:03','2024-11-27 15:37:03'),(382,'2024-11-27 11:37:03',3,1,1,0,NULL,NULL,1,'2024-11-27 15:37:03','2024-11-27 15:37:03'),(383,'2024-11-27 11:37:03',4,1,1,0,NULL,NULL,1,'2024-11-27 15:37:03','2024-11-27 15:37:03'),(384,'2024-11-27 11:37:03',5,1,0,0,NULL,NULL,1,'2024-11-27 15:37:03','2024-11-27 15:37:03'),(385,'2024-11-27 11:37:03',6,1,0,0,NULL,NULL,1,'2024-11-27 15:37:03','2024-11-27 15:37:03'),(386,'2024-11-27 11:37:03',7,1,0,0,NULL,NULL,1,'2024-11-27 15:37:03','2024-11-27 15:37:03'),(387,'2024-11-27 11:37:03',8,1,0,0,NULL,NULL,1,'2024-11-27 15:37:03','2024-11-27 15:37:03'),(388,'2024-11-27 11:37:03',9,1,0,0,NULL,NULL,1,'2024-11-27 15:37:03','2024-11-27 15:37:03'),(389,'2024-11-27 11:37:03',10,1,0,0,NULL,NULL,1,'2024-11-27 15:37:03','2024-11-27 15:37:03'),(390,'2024-11-27 11:37:03',11,1,0,0,NULL,NULL,1,'2024-11-27 15:37:03','2024-11-27 15:37:03'),(391,'2024-11-27 11:37:03',12,1,0,0,NULL,NULL,1,'2024-11-27 15:37:03','2024-11-27 15:37:03'),(392,'2024-11-27 11:37:03',13,1,0,0,NULL,NULL,1,'2024-11-27 15:37:03','2024-11-27 15:37:03'),(393,'2024-11-27 11:37:03',14,1,0,0,NULL,NULL,1,'2024-11-27 15:37:03','2024-11-27 15:37:03'),(394,'2024-11-27 11:37:03',15,1,0,0,NULL,NULL,1,'2024-11-27 15:37:03','2024-11-27 15:37:03'),(395,'2024-11-27 13:04:59',1,1,1,0,NULL,NULL,1,'2024-11-27 17:04:59','2024-11-27 17:04:59'),(396,'2024-11-27 13:04:59',2,1,1,0,NULL,NULL,1,'2024-11-27 17:04:59','2024-11-27 17:04:59'),(397,'2024-11-27 13:04:59',3,1,1,0,NULL,NULL,1,'2024-11-27 17:04:59','2024-11-27 17:04:59'),(398,'2024-11-27 13:04:59',4,1,1,0,NULL,NULL,1,'2024-11-27 17:04:59','2024-11-27 17:04:59'),(399,'2024-11-27 13:04:59',5,1,0,0,NULL,NULL,1,'2024-11-27 17:04:59','2024-11-27 17:04:59'),(400,'2024-11-27 13:04:59',6,1,0,0,NULL,NULL,1,'2024-11-27 17:04:59','2024-11-27 17:04:59'),(401,'2024-11-27 13:04:59',7,1,0,0,NULL,NULL,1,'2024-11-27 17:04:59','2024-11-27 17:04:59'),(402,'2024-11-27 13:04:59',8,1,0,0,NULL,NULL,1,'2024-11-27 17:04:59','2024-11-27 17:04:59'),(403,'2024-11-27 13:04:59',9,1,0,0,NULL,NULL,1,'2024-11-27 17:04:59','2024-11-27 17:04:59'),(404,'2024-11-27 13:04:59',10,1,0,0,NULL,NULL,1,'2024-11-27 17:04:59','2024-11-27 17:04:59'),(405,'2024-11-27 13:04:59',11,1,0,0,NULL,NULL,1,'2024-11-27 17:04:59','2024-11-27 17:04:59'),(406,'2024-11-27 13:04:59',12,1,0,0,NULL,NULL,1,'2024-11-27 17:04:59','2024-11-27 17:04:59'),(407,'2024-11-27 13:04:59',13,1,0,0,NULL,NULL,1,'2024-11-27 17:04:59','2024-11-27 17:04:59'),(408,'2024-11-27 13:04:59',14,1,0,0,NULL,NULL,1,'2024-11-27 17:04:59','2024-11-27 17:04:59'),(409,'2024-11-27 13:04:59',15,0,0,0,NULL,NULL,1,'2024-11-27 17:04:59','2024-11-27 17:04:59'),(410,'2024-11-27 13:35:16',81,1,0,0,NULL,NULL,1,'2024-11-27 17:35:16','2024-11-27 17:35:16'),(411,'2024-11-27 13:35:16',82,1,0,0,NULL,NULL,1,'2024-11-27 17:35:16','2024-11-27 17:35:16'),(412,'2024-11-27 13:35:16',83,1,0,0,NULL,NULL,1,'2024-11-27 17:35:16','2024-11-27 17:35:16'),(413,'2024-11-27 13:35:16',84,1,0,0,NULL,NULL,1,'2024-11-27 17:35:16','2024-11-27 17:35:16'),(414,'2024-11-27 13:35:16',85,1,0,0,NULL,NULL,1,'2024-11-27 17:35:16','2024-11-27 17:35:16'),(415,'2024-11-27 13:35:16',86,1,0,0,NULL,NULL,1,'2024-11-27 17:35:16','2024-11-27 17:35:16'),(416,'2024-11-27 13:35:16',87,1,0,0,NULL,NULL,1,'2024-11-27 17:35:16','2024-11-27 17:35:16'),(417,'2024-11-27 13:35:16',88,0,0,0,NULL,NULL,1,'2024-11-27 17:35:16','2024-11-27 17:35:16'),(418,'2024-11-27 13:35:16',89,0,0,0,NULL,NULL,1,'2024-11-27 17:35:16','2024-11-27 17:35:16'),(419,'2024-11-27 14:39:33',1,1,1,0,NULL,NULL,1,'2024-11-27 18:39:33','2024-11-27 18:39:33'),(420,'2024-11-27 14:39:33',2,1,1,0,NULL,NULL,1,'2024-11-27 18:39:33','2024-11-27 18:39:33'),(421,'2024-11-27 14:39:33',3,1,1,0,NULL,NULL,1,'2024-11-27 18:39:33','2024-11-27 18:39:33'),(422,'2024-11-27 14:39:33',4,1,1,0,NULL,NULL,1,'2024-11-27 18:39:33','2024-11-27 18:39:33'),(423,'2024-11-27 14:39:33',5,1,0,0,NULL,NULL,1,'2024-11-27 18:39:33','2024-11-27 18:39:33'),(424,'2024-11-27 14:39:33',6,1,0,0,NULL,NULL,1,'2024-11-27 18:39:33','2024-11-27 18:39:33'),(425,'2024-11-27 14:39:33',7,1,0,0,NULL,NULL,1,'2024-11-27 18:39:33','2024-11-27 18:39:33'),(426,'2024-11-27 14:39:33',8,1,0,0,NULL,NULL,1,'2024-11-27 18:39:33','2024-11-27 18:39:33'),(427,'2024-11-27 14:39:33',9,1,0,0,NULL,NULL,1,'2024-11-27 18:39:33','2024-11-27 18:39:33'),(428,'2024-11-27 14:39:33',10,1,0,0,NULL,NULL,1,'2024-11-27 18:39:33','2024-11-27 18:39:33'),(429,'2024-11-27 14:39:33',11,1,0,0,NULL,NULL,1,'2024-11-27 18:39:33','2024-11-27 18:39:33'),(430,'2024-11-27 14:39:33',12,1,0,0,NULL,NULL,1,'2024-11-27 18:39:33','2024-11-27 18:39:33'),(431,'2024-11-27 14:39:33',13,1,0,0,NULL,NULL,1,'2024-11-27 18:39:33','2024-11-27 18:39:33'),(432,'2024-11-27 14:39:33',14,1,0,0,NULL,NULL,1,'2024-11-27 18:39:33','2024-11-27 18:39:33'),(433,'2024-11-27 14:39:33',15,0,0,0,NULL,NULL,1,'2024-11-27 18:39:33','2024-11-27 18:39:33'),(434,'2024-11-27 14:44:26',1,0,1,0,'fnejskfnesjfnjseknfjsenfje','fnjsknfeskjnfsekjnfjsek',1,'2024-11-27 18:44:26','2024-11-27 18:44:26'),(435,'2024-11-27 14:44:26',2,1,1,0,NULL,NULL,1,'2024-11-27 18:44:26','2024-11-27 18:44:26'),(436,'2024-11-27 14:44:26',3,1,1,0,NULL,NULL,1,'2024-11-27 18:44:26','2024-11-27 18:44:26'),(437,'2024-11-27 14:44:26',4,1,1,0,NULL,NULL,1,'2024-11-27 18:44:26','2024-11-27 18:44:26'),(438,'2024-11-27 14:44:26',5,1,0,0,NULL,NULL,1,'2024-11-27 18:44:26','2024-11-27 18:44:26'),(439,'2024-11-27 14:44:26',6,1,0,0,NULL,NULL,1,'2024-11-27 18:44:26','2024-11-27 18:44:26'),(440,'2024-11-27 14:44:26',7,1,0,0,NULL,NULL,1,'2024-11-27 18:44:26','2024-11-27 18:44:26'),(441,'2024-11-27 14:44:26',8,1,0,0,NULL,NULL,1,'2024-11-27 18:44:26','2024-11-27 18:44:26'),(442,'2024-11-27 14:44:26',9,1,0,0,NULL,NULL,1,'2024-11-27 18:44:26','2024-11-27 18:44:26'),(443,'2024-11-27 14:44:26',10,1,0,0,NULL,NULL,1,'2024-11-27 18:44:26','2024-11-27 18:44:26'),(444,'2024-11-27 14:44:26',11,1,0,0,NULL,NULL,1,'2024-11-27 18:44:26','2024-11-27 18:44:26'),(445,'2024-11-27 14:44:26',12,1,0,0,NULL,NULL,1,'2024-11-27 18:44:26','2024-11-27 18:44:26'),(446,'2024-11-27 14:44:26',13,1,0,0,NULL,NULL,1,'2024-11-27 18:44:26','2024-11-27 18:44:26'),(447,'2024-11-27 14:44:26',14,1,0,0,NULL,NULL,1,'2024-11-27 18:44:26','2024-11-27 18:44:26'),(448,'2024-11-27 14:44:26',15,1,0,0,NULL,NULL,1,'2024-11-27 18:44:26','2024-11-27 18:44:26'),(449,'2024-12-07 11:08:48',72,1,0,0,NULL,NULL,1,'2024-12-07 15:08:48','2024-12-07 15:08:48'),(450,'2024-12-07 11:08:48',73,1,0,0,NULL,NULL,1,'2024-12-07 15:08:48','2024-12-07 15:08:48'),(451,'2024-12-07 11:08:48',74,1,0,0,NULL,NULL,1,'2024-12-07 15:08:48','2024-12-07 15:08:48'),(452,'2024-12-07 11:08:48',75,1,0,0,NULL,NULL,1,'2024-12-07 15:08:48','2024-12-07 15:08:48'),(453,'2024-12-07 11:08:48',76,1,0,0,NULL,NULL,1,'2024-12-07 15:08:48','2024-12-07 15:08:48'),(454,'2024-12-07 11:08:48',77,1,0,0,NULL,NULL,1,'2024-12-07 15:08:48','2024-12-07 15:08:48'),(455,'2024-12-07 11:08:48',78,1,0,0,NULL,NULL,1,'2024-12-07 15:08:48','2024-12-07 15:08:48'),(456,'2024-12-07 11:08:48',79,1,0,0,NULL,NULL,1,'2024-12-07 15:08:48','2024-12-07 15:08:48'),(457,'2024-12-07 11:08:48',80,1,0,0,NULL,NULL,1,'2024-12-07 15:08:48','2024-12-07 15:08:48'),(458,'2024-12-12 10:20:52',1,1,1,0,NULL,NULL,1,'2024-12-12 14:20:52','2024-12-12 14:20:52'),(459,'2024-12-12 10:20:52',2,1,1,0,NULL,NULL,1,'2024-12-12 14:20:52','2024-12-12 14:20:52'),(460,'2024-12-12 10:20:52',3,1,0,0,'fehfsejn','nfjesnfjksenjfkse',1,'2024-12-12 14:20:52','2024-12-12 14:20:52'),(461,'2024-12-12 10:20:52',4,1,1,0,NULL,NULL,1,'2024-12-12 14:20:52','2024-12-12 14:20:52'),(462,'2024-12-12 10:20:52',5,1,0,0,NULL,NULL,1,'2024-12-12 14:20:52','2024-12-12 14:20:52'),(463,'2024-12-12 10:20:52',6,1,0,0,NULL,NULL,1,'2024-12-12 14:20:52','2024-12-12 14:20:52'),(464,'2024-12-12 10:20:53',7,1,0,0,NULL,NULL,1,'2024-12-12 14:20:53','2024-12-12 14:20:53'),(465,'2024-12-12 10:20:53',8,1,0,0,NULL,NULL,1,'2024-12-12 14:20:53','2024-12-12 14:20:53'),(466,'2024-12-12 10:20:53',9,1,0,0,NULL,NULL,1,'2024-12-12 14:20:53','2024-12-12 14:20:53'),(467,'2024-12-12 10:20:53',10,1,0,0,NULL,NULL,1,'2024-12-12 14:20:53','2024-12-12 14:20:53'),(468,'2024-12-12 10:20:53',11,1,0,0,NULL,NULL,1,'2024-12-12 14:20:53','2024-12-12 14:20:53'),(469,'2024-12-12 10:20:53',12,0,0,0,'fesjfnsj','fnjsenfsjek',1,'2024-12-12 14:20:53','2024-12-12 14:20:53'),(470,'2024-12-12 10:20:53',13,1,0,0,NULL,NULL,1,'2024-12-12 14:20:53','2024-12-12 14:20:53'),(471,'2024-12-12 10:20:53',14,1,0,0,NULL,NULL,1,'2024-12-12 14:20:53','2024-12-12 14:20:53'),(472,'2024-12-12 10:20:53',15,1,0,0,NULL,NULL,1,'2024-12-12 14:20:53','2024-12-12 14:20:53'),(473,'2024-12-12 14:39:42',126,1,0,0,NULL,NULL,1,'2024-12-12 18:39:42','2024-12-12 18:39:42'),(474,'2024-12-12 14:39:42',127,1,0,0,NULL,NULL,1,'2024-12-12 18:39:42','2024-12-12 18:39:42'),(475,'2024-12-12 14:39:42',128,1,0,0,NULL,NULL,1,'2024-12-12 18:39:42','2024-12-12 18:39:42'),(476,'2024-12-12 14:39:42',129,1,0,0,NULL,NULL,1,'2024-12-12 18:39:42','2024-12-12 18:39:42'),(477,'2024-12-12 14:39:42',130,1,0,0,NULL,NULL,1,'2024-12-12 18:39:42','2024-12-12 18:39:42'),(478,'2024-12-12 14:39:42',131,1,0,0,NULL,NULL,1,'2024-12-12 18:39:42','2024-12-12 18:39:42'),(479,'2024-12-12 14:39:42',132,1,0,0,NULL,NULL,1,'2024-12-12 18:39:42','2024-12-12 18:39:42'),(480,'2024-12-12 14:39:42',133,1,0,0,NULL,NULL,1,'2024-12-12 18:39:42','2024-12-12 18:39:42'),(481,'2024-12-12 14:39:42',134,1,0,0,NULL,NULL,1,'2024-12-12 18:39:42','2024-12-12 18:39:42'),(482,'2024-12-12 14:39:42',135,1,0,0,NULL,NULL,1,'2024-12-12 18:39:42','2024-12-12 18:39:42'),(483,'2024-12-12 14:39:42',136,1,0,0,NULL,NULL,1,'2024-12-12 18:39:42','2024-12-12 18:39:42'),(484,'2024-12-12 14:39:42',137,1,0,0,NULL,NULL,1,'2024-12-12 18:39:42','2024-12-12 18:39:42'),(485,'2024-12-12 14:39:42',138,0,0,0,'se encontro desordenado por el anterior turno','se procedio a la limpieza',1,'2024-12-12 18:39:42','2024-12-12 18:39:42');
/*!40000 ALTER TABLE `verificacion_ord_lip_des` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-01-16 10:58:23
