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
-- Table structure for table `customer_form_attribute`
--

DROP TABLE IF EXISTS `customer_form_attribute`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `customer_form_attribute` (
  `form_code` varchar(32) NOT NULL COMMENT 'Form Code',
  `attribute_id` smallint(5) unsigned NOT NULL COMMENT 'Attribute Id',
  PRIMARY KEY (`form_code`,`attribute_id`),
  KEY `IDX_CUSTOMER_FORM_ATTRIBUTE_ATTRIBUTE_ID` (`attribute_id`),
  CONSTRAINT `FK_CSTR_FORM_ATTR_ATTR_ID_EAV_ATTR_ATTR_ID` FOREIGN KEY (`attribute_id`) REFERENCES `eav_attribute` (`attribute_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Customer Form Attribute';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customer_form_attribute`
--

LOCK TABLES `customer_form_attribute` WRITE;
/*!40000 ALTER TABLE `customer_form_attribute` DISABLE KEYS */;
INSERT INTO `customer_form_attribute` VALUES ('adminhtml_checkout',3),('adminhtml_checkout',532),('adminhtml_checkout',829),('adminhtml_checkout',830),('adminhtml_checkout',925),('adminhtml_customer',1),('adminhtml_customer',2),('adminhtml_customer',3),('adminhtml_customer',477),('adminhtml_customer',532),('adminhtml_customer',700),('adminhtml_customer',826),('adminhtml_customer',827),('adminhtml_customer',828),('adminhtml_customer',829),('adminhtml_customer',830),('adminhtml_customer',925),('adminhtml_customer',954),('adminhtml_customer_address',9),('adminhtml_customer_address',10),('adminhtml_customer_address',11),('adminhtml_customer_address',12),('adminhtml_customer_address',13),('adminhtml_customer_address',14),('adminhtml_customer_address',15),('adminhtml_customer_address',16),('adminhtml_customer_address',17),('adminhtml_customer_address',18),('adminhtml_customer_address',95),('adminhtml_customer_address',832),('adminhtml_customer_address',833),('adminhtml_customer_address',834),('adminhtml_customer_address',955),('checkout_register',1),('checkout_register',2),('checkout_register',3),('checkout_register',826),('checkout_register',827),('checkout_register',828),('checkout_register',829),('checkout_register',830),('checkout_register',925),('customer_account_create',1),('customer_account_create',2),('customer_account_create',3),('customer_account_create',826),('customer_account_create',827),('customer_account_create',828),('customer_account_create',829),('customer_account_create',830),('customer_account_create',925),('customer_account_edit',1),('customer_account_edit',2),('customer_account_edit',3),('customer_account_edit',826),('customer_account_edit',827),('customer_account_edit',828),('customer_account_edit',829),('customer_account_edit',830),('customer_account_edit',925),('customer_address_edit',9),('customer_address_edit',10),('customer_address_edit',11),('customer_address_edit',12),('customer_address_edit',13),('customer_address_edit',14),('customer_address_edit',15),('customer_address_edit',16),('customer_address_edit',17),('customer_address_edit',18),('customer_address_edit',95),('customer_address_edit',832),('customer_address_edit',833),('customer_address_edit',834),('customer_address_edit',955),('customer_register_address',9),('customer_register_address',10),('customer_register_address',11),('customer_register_address',12),('customer_register_address',13),('customer_register_address',14),('customer_register_address',15),('customer_register_address',16),('customer_register_address',17),('customer_register_address',18),('customer_register_address',95),('customer_register_address',832),('customer_register_address',833),('customer_register_address',834),('customer_register_address',955);
/*!40000 ALTER TABLE `customer_form_attribute` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-02-21 16:18:41
