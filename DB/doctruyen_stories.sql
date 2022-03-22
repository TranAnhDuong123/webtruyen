-- MySQL dump 10.13  Distrib 8.0.25, for Linux (x86_64)
--
-- Host: 127.0.0.1    Database: doctruyen
-- ------------------------------------------------------
-- Server version	5.7.37

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
-- Table structure for table `stories`
--

DROP TABLE IF EXISTS `stories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `stories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `category_id` int(11) NOT NULL DEFAULT '1',
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `view` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `stories`
--

LOCK TABLES `stories` WRITE;
/*!40000 ALTER TABLE `stories` DISABLE KEYS */;
INSERT INTO `stories` VALUES (1,'One piece','Truyên tranh',3,'2017-04-18 04:04:03','2017-04-18 04:04:03',1,0),(3,'Arifureta','Arifureta',5,'2017-04-18 04:17:00','2017-04-18 04:17:00',1,0),(4,'Truyện siscom','siscom',4,'2022-03-17 07:57:03','2022-03-17 07:57:03',1,0),(5,'4','Siscom',4,'2022-03-17 08:37:24','2022-03-17 09:23:42',1,0),(6,'Truyện siscom (wanda)','wanda',4,'2022-03-17 09:24:40','2022-03-17 09:24:40',1,0),(7,'Attack On Titan','Attack On Titan',6,'2017-05-31 03:07:35','2017-05-31 03:07:35',1,0),(8,'Fairy Tail','Fairy Tail',3,'2017-05-31 03:09:01','2017-05-31 03:09:01',1,3),(9,'Người trong giang hồ','Người trong giang hồ',1,'2017-05-31 03:09:35','2017-05-31 03:09:35',1,4),(10,'Danchi Majo','Danchi Majo',1,'2017-05-31 03:12:01','2017-05-31 03:12:01',1,0),(11,'Danh Sách Yêu Quái','Danh Sách Yêu Quái',2,'2017-05-31 03:13:02','2017-05-31 03:13:02',1,0),(12,'Lady Justice','Lady Justice',2,'2017-05-31 03:13:52','2017-05-31 03:13:52',1,4),(13,'Legend 2','Legend 2',1,'2017-05-31 03:14:49','2017-05-31 03:14:49',1,5),(14,'Hajimete No Gal','Hajimete No Gal',4,'2017-05-31 03:15:35','2017-05-31 03:15:35',1,3),(15,'Bokura No Fushidara','Bokura No Fushidara',5,'2017-05-31 03:16:45','2017-05-31 03:16:45',1,10),(16,'One Pice2','truyenej nha',3,'2017-04-18 04:04:03','2017-05-31 11:37:50',1,6),(17,'Hiệp Khách Giang Hồ2','Hiệp Khách Giang Hồ',4,'2017-04-18 04:16:24','2017-05-31 03:05:08',1,19),(18,'Hôn Trộm 55 Lần2','',5,'2017-04-18 04:17:00','2017-05-31 03:04:29',1,1),(19,'Go!2','Go!',1,'2017-05-31 03:05:52','2017-05-31 03:05:52',1,2),(20,'Attack On Titan2','Attack On Titan',6,'2017-05-31 03:07:35','2017-05-31 03:07:35',1,0),(21,'Fairy Tail2','Fairy Tail',3,'2017-05-31 03:09:01','2017-05-31 03:09:01',1,3),(22,'Người trong giang hồ2','Người trong giang hồ',1,'2017-05-31 03:09:35','2017-05-31 03:09:35',1,4),(23,'Danchi Majo2','Danchi Majo',1,'2017-05-31 03:12:01','2017-05-31 03:12:01',1,0),(24,'Danh Sách Yêu Quái2','Danh Sách Yêu Quái',2,'2017-05-31 03:13:02','2017-05-31 03:13:02',1,0),(25,'Lady Justice2','Lady Justice',2,'2017-05-31 03:13:52','2017-05-31 03:13:52',1,4),(26,'Legend 22','Legend 2',1,'2017-05-31 03:14:49','2017-05-31 03:14:49',1,5),(27,'Hajimete No Gal2','Hajimete No Gal',4,'2017-05-31 03:15:35','2017-05-31 03:15:35',1,3),(28,'Bokura No Fushidara2','Bokura No Fushidara',5,'2017-05-31 03:16:45','2017-05-31 03:16:45',1,10);
/*!40000 ALTER TABLE `stories` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-03-22 10:05:50
