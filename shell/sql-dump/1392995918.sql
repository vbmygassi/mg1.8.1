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
-- Table structure for table `customer_address_entity_text`
--

DROP TABLE IF EXISTS `customer_address_entity_text`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `customer_address_entity_text` (
  `value_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Value Id',
  `entity_type_id` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT 'Entity Type Id',
  `attribute_id` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT 'Attribute Id',
  `entity_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT 'Entity Id',
  `value` text NOT NULL COMMENT 'Value',
  PRIMARY KEY (`value_id`),
  UNIQUE KEY `UNQ_CUSTOMER_ADDRESS_ENTITY_TEXT_ENTITY_ID_ATTRIBUTE_ID` (`entity_id`,`attribute_id`),
  KEY `IDX_CUSTOMER_ADDRESS_ENTITY_TEXT_ENTITY_TYPE_ID` (`entity_type_id`),
  KEY `IDX_CUSTOMER_ADDRESS_ENTITY_TEXT_ATTRIBUTE_ID` (`attribute_id`),
  KEY `IDX_CUSTOMER_ADDRESS_ENTITY_TEXT_ENTITY_ID` (`entity_id`),
  CONSTRAINT `FK_CSTR_ADDR_ENTT_TEXT_ATTR_ID_EAV_ATTR_ATTR_ID` FOREIGN KEY (`attribute_id`) REFERENCES `eav_attribute` (`attribute_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_CSTR_ADDR_ENTT_TEXT_ENTT_ID_CSTR_ADDR_ENTT_ENTT_ID` FOREIGN KEY (`entity_id`) REFERENCES `customer_address_entity` (`entity_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_CSTR_ADDR_ENTT_TEXT_ENTT_TYPE_ID_EAV_ENTT_TYPE_ENTT_TYPE_ID` FOREIGN KEY (`entity_type_id`) REFERENCES `eav_entity_type` (`entity_type_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=178 DEFAULT CHARSET=utf8 COMMENT='Customer Address Entity Text';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customer_address_entity_text`
--

LOCK TABLES `customer_address_entity_text` WRITE;
/*!40000 ALTER TABLE `customer_address_entity_text` DISABLE KEYS */;
INSERT INTO `customer_address_entity_text` VALUES (26,2,16,25,'Nymphenburgerstr.86'),(27,2,16,26,'Großhadernerstr.48'),(28,2,16,27,'Fuhlsbüttler Str. 733'),(37,2,16,36,'Theodorstrasse 42-90'),(38,2,16,37,'Hohe Weide 33'),(39,2,16,38,'Großhadernerstr.48'),(41,2,16,39,'Charentoner Straße 13'),(47,2,16,44,'Ritterstrasse 3'),(60,2,16,57,'Grosshaderner Str.48'),(62,2,16,59,'grünbergerstr 17'),(63,2,16,60,'No Adress\nNo Adress'),(64,2,16,61,'Ritterstrasse 3'),(65,2,16,62,'von Coels Straße 2'),(66,2,16,63,'Görlitzer Straße 18'),(67,2,16,64,'Neuhausweg 45'),(68,2,16,65,'Gailenbacher Weg 2'),(69,2,16,66,'Freiligrathstrasse 15'),(70,2,16,67,'Siegesstr. 14'),(71,2,16,68,'Am Bürgergarten 16'),(82,2,16,79,'Pers\nStraße ´´´´´´'),(83,2,16,80,'Pers\nStraße ´´´´´´'),(84,2,16,81,'Pers\nStraße ´´´´´´'),(85,2,16,82,'Pers\nStraße ´´´´´´'),(86,2,16,83,'Pers\nStraße ´´´´´´'),(87,2,16,84,'Pers\nStraße ´´´´´´'),(90,2,16,87,'Strasse\nTest'),(91,2,16,88,'Strasse\nTest'),(92,2,16,89,'Strasse\nTest'),(93,2,16,90,'Strasse\nTest'),(94,2,16,91,'Strasse\nTest'),(95,2,16,92,'Strasse\nTest'),(96,2,16,93,'Theodorstraße\n42'),(97,2,16,94,'Theodorstraße\n42'),(98,2,16,95,'Fuhlsbüttler\nStr. 733'),(99,2,16,96,'Fuhlsbüttler\nStr. 733'),(114,2,16,111,'0000000000000'),(115,2,16,112,'0000000000000'),(116,2,16,113,'Test\nStrasse'),(117,2,16,114,'Test\nStrasse'),(118,2,16,115,'Test\nStrasse'),(119,2,16,116,'Test\nStrasse'),(120,2,16,117,'Test\nStrasse'),(121,2,16,118,'Test\nStrasse'),(122,2,16,119,'Test\nStrasse'),(123,2,16,120,'Test\nStrasse'),(142,2,16,139,'Fuhlsbüttler\nStr. 733'),(143,2,16,140,'Fuhlsbüttler\nStr. 733'),(144,2,16,141,'Fuhlsbüttler\nStr. 733'),(145,2,16,142,'Fuhlsbüttler\nStr. 733'),(165,2,16,162,'Some\nStrasse'),(166,2,16,163,'Some\nStrasse'),(167,2,16,164,'And and the D\nand the the than the no Ron'),(168,2,16,165,'Eine\nStrasse'),(169,2,16,166,'Eine\nStrasse'),(170,2,16,167,'Some Strasse\n12'),(171,2,16,168,'Strasse\nHausnummer'),(172,2,16,169,'Strasse\nHausnummer'),(173,2,16,170,'Strasse\nHausnummer'),(174,2,16,171,'Herzogstrasse \n12'),(175,2,16,172,'Strasse\nHausnummer'),(176,2,16,173,'Strasse\nHausnummer'),(177,2,16,174,'Strasse\nHausnummer');
/*!40000 ALTER TABLE `customer_address_entity_text` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-02-21 16:18:38
