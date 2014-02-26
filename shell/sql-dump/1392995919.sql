-- MySQL dump 10.14  Distrib 5.5.31-MariaDB, for osx10.8 (i386)
--
-- Host: localhost    Database: m
-- ------------------------------------------------------
-- Server version	5.5.31-MariaDB-log

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
-- Table structure for table `customer_entity`
--

DROP TABLE IF EXISTS `customer_entity`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `customer_entity` (
  `entity_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Entity Id',
  `entity_type_id` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT 'Entity Type Id',
  `attribute_set_id` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT 'Attribute Set Id',
  `website_id` smallint(5) unsigned DEFAULT NULL COMMENT 'Website Id',
  `email` varchar(255) DEFAULT NULL COMMENT 'Email',
  `group_id` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT 'Group Id',
  `increment_id` varchar(50) DEFAULT NULL COMMENT 'Increment Id',
  `store_id` smallint(5) unsigned DEFAULT '0' COMMENT 'Store Id',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Created At',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'Updated At',
  `is_active` smallint(5) unsigned NOT NULL DEFAULT '1' COMMENT 'Is Active',
  `disable_auto_group_change` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT 'Disable automatic group change based on VAT ID',
  PRIMARY KEY (`entity_id`),
  KEY `IDX_CUSTOMER_ENTITY_STORE_ID` (`store_id`),
  KEY `IDX_CUSTOMER_ENTITY_ENTITY_TYPE_ID` (`entity_type_id`),
  KEY `IDX_CUSTOMER_ENTITY_EMAIL_WEBSITE_ID` (`email`,`website_id`),
  KEY `IDX_CUSTOMER_ENTITY_WEBSITE_ID` (`website_id`),
  CONSTRAINT `FK_CUSTOMER_ENTITY_STORE_ID_CORE_STORE_STORE_ID` FOREIGN KEY (`store_id`) REFERENCES `core_store` (`store_id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `FK_CUSTOMER_ENTITY_WEBSITE_ID_CORE_WEBSITE_WEBSITE_ID` FOREIGN KEY (`website_id`) REFERENCES `core_website` (`website_id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=133 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='Customer Entity';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customer_entity`
--

LOCK TABLES `customer_entity` WRITE;
/*!40000 ALTER TABLE `customer_entity` DISABLE KEYS */;
INSERT INTO `customer_entity` VALUES (30,1,0,1,'ah@mygassi.com',1,NULL,1,'2013-08-05 20:49:46','2013-08-28 11:02:32',1,0),(34,1,0,1,'tmhrbg@gmail.com',1,NULL,1,'2013-08-06 08:24:13','2013-08-16 11:31:55',1,0),(55,1,0,1,'th@mygassi.com',1,NULL,1,'2013-08-08 10:13:38','2013-08-16 11:31:55',1,0),(57,1,0,1,'tmhrbg@live.de',1,NULL,1,'2013-08-12 09:43:34','2013-08-16 11:31:55',1,0),(59,1,0,1,'alex.holzreiter@braunbuxx.com',1,NULL,1,'2013-08-13 19:28:25','2013-08-16 11:31:55',1,0),(60,1,0,1,'Tiziana.Krueger@karlie.de',1,NULL,1,'2013-08-16 12:24:10','2013-08-16 12:41:55',1,0),(64,1,0,1,'oe@eiler2.com',1,NULL,1,'2013-09-05 09:46:49','2013-09-05 11:00:01',1,0),(77,1,0,1,'lha.wagner@googlemail.com',1,NULL,1,'2013-09-07 00:20:46','2013-10-29 08:16:24',1,0),(79,1,0,1,'daniel.zwigart@gmx.de',1,NULL,1,'2013-09-16 08:15:32','2013-09-16 09:00:01',1,0),(80,1,0,1,'test@sofortueberweisung.de',11,NULL,1,'2013-09-18 14:04:16','2014-01-31 09:56:15',1,0),(81,1,0,1,'oe@columba.de',1,NULL,1,'2013-10-17 06:30:37','2013-10-17 06:30:37',1,0),(82,1,0,1,'andreas@boffin.de',1,NULL,1,'2013-10-30 01:27:10','2013-11-12 03:01:45',1,0),(83,1,0,1,'stefan.veit@me.com',1,NULL,1,'2013-11-04 14:21:37','2013-11-04 15:00:01',1,0),(84,1,0,1,'sabinedoeller@web.de',1,NULL,1,'2013-11-11 08:34:15','2014-01-02 15:39:48',1,0),(85,1,0,1,'silvia.schroettle@gmx.de',1,NULL,1,'2013-11-14 06:52:02','2013-11-30 08:22:19',1,0),(86,1,0,1,'dorisruetz-weber@web.de',1,NULL,1,'2013-11-15 19:16:07','2013-11-15 20:00:01',1,0),(87,1,0,1,'albrecht@email.de',1,NULL,1,'2013-11-18 14:06:29','2013-11-18 15:00:01',1,0),(88,1,0,1,'sanny1109@hotmail.de',1,NULL,1,'2013-12-07 23:11:28','2013-12-08 00:00:01',1,0),(97,1,0,1,'pers.email@test.de',11,NULL,1,'2014-01-28 13:59:47','2014-01-28 14:19:28',1,0),(99,1,0,1,'testagain@web.de',11,NULL,1,'2014-01-28 15:53:06','2014-01-28 15:53:48',1,0),(100,1,0,1,'tim.herbig@me.com',11,NULL,1,'2014-01-28 15:54:28','2014-01-28 15:54:28',1,0),(101,1,0,1,'tom.hebiu3@me3od.com',11,NULL,1,'2014-01-29 13:35:55','2014-01-29 13:35:55',1,0),(107,1,0,1,'jobs@mygassi.com',11,NULL,1,'2014-01-31 15:17:34','2014-01-31 15:22:43',1,0),(114,1,0,1,'vberzsin@gmail.com',1,NULL,1,'2014-02-03 16:41:04','2014-02-20 14:27:47',1,0),(115,1,0,1,'vberzsin59@gmail.com',11,NULL,1,'2014-02-06 14:35:12','2014-02-11 17:51:14',1,0),(116,1,0,1,'vberzsin2@gmail.com',0,NULL,1,'2014-02-19 15:30:47','2014-02-19 15:30:47',1,0),(117,1,0,1,'vberzsin12@gmail.com',0,NULL,1,'2014-02-19 15:30:58','2014-02-19 15:30:58',1,0),(118,1,0,1,'vberzsin112@gmail.com',0,NULL,1,'2014-02-19 15:31:53','2014-02-19 15:31:53',1,0),(119,1,0,1,'vberzsin1112@gmail.com',0,NULL,1,'2014-02-19 15:32:45','2014-02-19 15:32:45',1,0),(120,1,0,1,'vberzsin21112@gmail.com',0,NULL,1,'2014-02-19 15:32:52','2014-02-19 15:32:52',1,0),(121,1,0,1,'vberzsin211112@gmail.com',0,NULL,1,'2014-02-19 15:33:27','2014-02-19 15:33:27',1,0),(122,1,0,1,'vberzsin2121112@gmail.com',0,NULL,1,'2014-02-19 15:33:43','2014-02-19 15:33:43',1,0),(123,1,0,1,'vberzsin21211112@gmail.com',0,NULL,1,'2014-02-19 15:33:59','2014-02-19 15:33:59',1,0),(124,1,0,1,'kakkmakker@yodel.de',0,NULL,1,'2014-02-19 15:39:29','2014-02-19 15:39:29',1,0),(125,1,0,1,'vberzsin6@gmail.com',0,NULL,1,'2014-02-19 16:05:42','2014-02-19 16:05:42',1,0),(126,1,0,1,'vberzsin123@gmail.com',0,NULL,1,'2014-02-19 16:19:47','2014-02-19 16:19:47',1,0),(127,1,0,1,'vberzsin1234@gmail.com',0,NULL,1,'2014-02-19 16:22:16','2014-02-19 16:22:16',1,0),(128,1,0,1,'vberzsin11111@gmail.com',0,NULL,1,'2014-02-19 16:31:47','2014-02-19 17:04:28',1,0),(129,1,0,1,'vberzsin1200@gmail.com',0,NULL,1,'2014-02-20 08:54:57','2014-02-20 08:55:33',1,0),(130,1,0,1,'asdfafdas@adfafd.de',0,NULL,1,'2014-02-20 14:41:02','2014-02-20 14:41:02',1,0),(131,1,0,1,'asdfa@dfadfa.de',0,NULL,1,'2014-02-20 15:18:05','2014-02-20 15:18:05',1,0),(132,1,0,1,'adsfasdfs@asdfd.de',0,NULL,1,'2014-02-20 15:22:14','2014-02-20 15:50:23',1,0);
/*!40000 ALTER TABLE `customer_entity` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-02-21 16:18:39
