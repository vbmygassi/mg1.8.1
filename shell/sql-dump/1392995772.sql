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
-- Table structure for table `customer_entity_varchar`
--

DROP TABLE IF EXISTS `customer_entity_varchar`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `customer_entity_varchar` (
  `value_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Value Id',
  `entity_type_id` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT 'Entity Type Id',
  `attribute_id` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT 'Attribute Id',
  `entity_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT 'Entity Id',
  `value` varchar(255) DEFAULT NULL COMMENT 'Value',
  PRIMARY KEY (`value_id`),
  UNIQUE KEY `UNQ_CUSTOMER_ENTITY_VARCHAR_ENTITY_ID_ATTRIBUTE_ID` (`entity_id`,`attribute_id`),
  KEY `IDX_CUSTOMER_ENTITY_VARCHAR_ENTITY_TYPE_ID` (`entity_type_id`),
  KEY `IDX_CUSTOMER_ENTITY_VARCHAR_ATTRIBUTE_ID` (`attribute_id`),
  KEY `IDX_CUSTOMER_ENTITY_VARCHAR_ENTITY_ID` (`entity_id`),
  KEY `IDX_CUSTOMER_ENTITY_VARCHAR_ENTITY_ID_ATTRIBUTE_ID_VALUE` (`entity_id`,`attribute_id`,`value`),
  CONSTRAINT `FK_CSTR_ENTT_VCHR_ATTR_ID_EAV_ATTR_ATTR_ID` FOREIGN KEY (`attribute_id`) REFERENCES `eav_attribute` (`attribute_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_CSTR_ENTT_VCHR_ENTT_TYPE_ID_EAV_ENTT_TYPE_ENTT_TYPE_ID` FOREIGN KEY (`entity_type_id`) REFERENCES `eav_entity_type` (`entity_type_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_CUSTOMER_ENTITY_VARCHAR_ENTITY_ID_CUSTOMER_ENTITY_ENTITY_ID` FOREIGN KEY (`entity_id`) REFERENCES `customer_entity` (`entity_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=687 DEFAULT CHARSET=utf8 COMMENT='Customer Entity Varchar';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customer_entity_varchar`
--

LOCK TABLES `customer_entity_varchar` WRITE;
/*!40000 ALTER TABLE `customer_entity_varchar` DISABLE KEYS */;
INSERT INTO `customer_entity_varchar` VALUES (205,1,1,30,'Alex'),(206,1,2,30,'Holzreiter'),(207,1,4,30,'15198fee722742a9bdd1723bea2a8757:UL'),(208,1,477,30,'Default Store View'),(213,1,1,34,'Tim'),(214,1,2,34,'Herbig'),(215,1,4,34,'a798e65f2a6bd374e3b96c7cf88a8d4d:1r'),(216,1,477,34,'Default Store View'),(279,1,1,55,'Tim'),(280,1,2,55,'Herbig'),(281,1,4,55,'e44237924dfb0c37a01853fbadb45e9c:8X'),(282,1,477,55,'Default Store View'),(332,1,927,34,'65c1b8128cd8e190f21d591d061377fc'),(336,1,1,57,'Tim'),(337,1,2,57,'Herbi'),(338,1,4,57,'0728c45f41b09183bc68776060ecd714:pv'),(339,1,477,57,'Default Store View'),(344,1,1,59,'Alex'),(345,1,2,59,'Holzreiter'),(346,1,4,59,'1bf070475d70e3fa6569151471e49289:8l'),(347,1,477,59,'Default Store View'),(357,1,1,60,'Tiziana'),(359,1,2,60,'Krüger'),(361,1,4,60,'3ede8d08a3887be84859b3b26f4778a3:C4'),(362,1,477,60,'Default Store View'),(402,1,1,64,'oliver'),(403,1,2,64,'Eiler'),(404,1,4,64,'3c2b3f2cc023341c43d943e01bafc363:aP'),(405,1,477,64,'Default Store View'),(455,1,1,77,'Hendrikje '),(456,1,2,77,'Wagner'),(457,1,4,77,'e42eb0664e5ce58a43ac92d7d0c536b8:sP'),(458,1,477,77,'Default Store View'),(463,1,1,79,'daniel'),(464,1,2,79,'zwigart'),(465,1,4,79,'8db1c4b514a04fe1297c813d28f863c4:Zd'),(466,1,477,79,'Default Store View'),(467,1,1,80,'Test'),(468,1,2,80,'Sofortüberweisung'),(469,1,4,80,'3c794fc3956f9ac1581b3fbc533be47b'),(470,1,477,80,'Default Store View'),(471,1,1,81,'Oliver'),(472,1,2,81,'Eiler'),(473,1,4,81,'35e35b8db0c279e2d90a6e699c425b22:v6'),(474,1,477,81,'Default Store View'),(475,1,927,55,'4287141b4152dcfd7ae5b8bf768011ec'),(476,1,1,82,'Andreas'),(477,1,2,82,'Boffin'),(478,1,4,82,'26803db2e42023033cf7417181290a01:Fj'),(479,1,477,82,'Default Store View'),(480,1,1,83,'Stefan'),(481,1,2,83,'Veit'),(482,1,4,83,'e59beeaa8be78f74a1f68c2aec5fd2a6:Ss'),(483,1,477,83,'Default Store View'),(484,1,1,84,'Sabine'),(485,1,2,84,'Klein'),(486,1,4,84,'ff4d78a0485102ea2149b1cfb09902b2:KT'),(487,1,477,84,'Default Store View'),(488,1,1,85,'Silvia'),(489,1,2,85,'Schröttle'),(490,1,4,85,'659f180c162deab26d843fa11a354e42:40'),(491,1,477,85,'Default Store View'),(492,1,1,86,'Doris'),(493,1,2,86,'Rütz-Weber'),(494,1,4,86,'cf5f802f18e30f16bf50993d8dc834b5:2W'),(495,1,477,86,'Default Store View'),(496,1,1,87,'Peter'),(497,1,2,87,'Albrecht'),(498,1,4,87,'ff86458fc8d114e9632cb2a29dc4a21b:Sq'),(499,1,477,87,'Default Store View'),(500,1,1,88,'Susanne '),(501,1,2,88,'Schewe'),(502,1,4,88,'3acfd2ec9d09421b77593c51c4197287:or'),(503,1,477,88,'Default Store View'),(536,1,1,97,'Pers'),(537,1,2,97,'Name'),(538,1,4,97,'3c794fc3956f9ac1581b3fbc533be47b'),(539,1,477,97,'Default Store View'),(544,1,1,99,'test'),(545,1,2,99,'again'),(546,1,4,99,'3c794fc3956f9ac1581b3fbc533be47b'),(547,1,477,99,'Default Store View'),(548,1,1,100,'Tim'),(549,1,2,100,'Herbig'),(550,1,4,100,'3c794fc3956f9ac1581b3fbc533be47b'),(551,1,477,100,'Default Store View'),(552,1,1,101,'Tim'),(553,1,2,101,'Herbig'),(554,1,4,101,'3c794fc3956f9ac1581b3fbc533be47b'),(555,1,477,101,'Default Store View'),(579,1,1,107,'Tim'),(580,1,2,107,'herbig'),(581,1,4,107,'3c794fc3956f9ac1581b3fbc533be47b'),(582,1,477,107,'Default Store View'),(607,1,1,114,'Test'),(608,1,2,114,'Viktor Berzsinszky'),(609,1,4,114,'ea9ba27fc3babdcf7996dd92a784824c:dE'),(610,1,477,114,'Default Store View'),(611,1,1,115,'Viktor'),(612,1,2,115,'Berzsinszky'),(613,1,4,115,'3997d7a5d3679512f338532dfd254f73'),(614,1,477,115,'Default Store View'),(615,1,1,116,'Vorname'),(616,1,2,116,'Nachname'),(617,1,4,116,'336311a016184326ddbdd61edd4eeb52'),(618,1,477,116,'Default Store View'),(619,1,1,117,'Vorname'),(620,1,2,117,'Nachname'),(621,1,4,117,'336311a016184326ddbdd61edd4eeb52'),(622,1,477,117,'Default Store View'),(623,1,1,118,'Vorname'),(624,1,2,118,'Nachname'),(625,1,4,118,'336311a016184326ddbdd61edd4eeb52'),(626,1,477,118,'Default Store View'),(627,1,1,119,'Vorname'),(628,1,2,119,'Nachname'),(629,1,4,119,'336311a016184326ddbdd61edd4eeb52'),(630,1,477,119,'Default Store View'),(631,1,1,120,'Vorname'),(632,1,2,120,'Nachname'),(633,1,4,120,'336311a016184326ddbdd61edd4eeb52'),(634,1,477,120,'Default Store View'),(635,1,1,121,'Vorname'),(636,1,2,121,'Nachname'),(637,1,4,121,'336311a016184326ddbdd61edd4eeb52'),(638,1,477,121,'Default Store View'),(639,1,1,122,'Vorname'),(640,1,2,122,'Nachname'),(641,1,4,122,'336311a016184326ddbdd61edd4eeb52'),(642,1,477,122,'Default Store View'),(643,1,1,123,'Vorname'),(644,1,2,123,'Nachname'),(645,1,4,123,'ef775988943825d2871e1cfa75473ec0'),(646,1,477,123,'Default Store View'),(647,1,1,124,'Vorname'),(648,1,2,124,'Nachname'),(649,1,4,124,'8ddcff3a80f4189ca1c9d4d902c3c909'),(650,1,477,124,'Default Store View'),(651,1,1,125,'James D. Brown'),(652,1,2,125,'Some Nachname'),(653,1,4,125,'c2b3cef720f119a3377c48b035e585b4'),(654,1,477,125,'Default Store View'),(655,1,1,126,'Vorname'),(656,1,2,126,'Nachname'),(657,1,4,126,'25d55ad283aa400af464c76d713c07ad'),(658,1,477,126,'Default Store View'),(659,1,1,127,'Vorname'),(660,1,2,127,'Nachname'),(661,1,4,127,'ef775988943825d2871e1cfa75473ec0'),(662,1,477,127,'Default Store View'),(663,1,1,128,'Vorname'),(664,1,2,128,'Nachname'),(665,1,4,128,'4c93008615c2d041e33ebac605d14b5b'),(666,1,477,128,'Default Store View'),(667,1,1,129,'Johnson'),(668,1,2,129,'McDepperd'),(669,1,4,129,'980424837405a361bb7ccc146566d712'),(670,1,477,129,'Default Store View'),(675,1,1,130,'Micheal Singapore Mike'),(676,1,2,130,'Nachname'),(677,1,4,130,'DcKhcr2RpsR4FECshX.dD6uQPj.U!gr6'),(678,1,477,130,'Default Store View'),(679,1,1,131,'Vorname'),(680,1,2,131,'Nachname'),(681,1,4,131,'25d55ad283aa400af464c76d713c07ad'),(682,1,477,131,'Default Store View'),(683,1,1,132,'Vorname'),(684,1,2,132,'Nachname'),(685,1,4,132,'v8ycvTyrHhwZYjzeyc-n2H5XkDK.Wq6b'),(686,1,477,132,'Default Store View');
/*!40000 ALTER TABLE `customer_entity_varchar` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-02-21 16:16:12
