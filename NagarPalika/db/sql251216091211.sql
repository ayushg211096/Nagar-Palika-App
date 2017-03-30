-- MySQL dump 10.16  Distrib 10.1.13-MariaDB, for Win32 (AMD64)
--
-- Host: localhost    Database: sobhagya
-- ------------------------------------------------------
-- Server version	10.1.13-MariaDB

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
-- Table structure for table `accounts`
--

DROP TABLE IF EXISTS `accounts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `accounts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `slipno` int(11) NOT NULL,
  `dealer` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `fathername` varchar(100) NOT NULL,
  `address` varchar(500) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `smobile` varchar(20) NOT NULL,
  `gift` varchar(200) NOT NULL,
  `LED` varchar(100) NOT NULL,
  `AccType` int(11) NOT NULL,
  `remarks` varchar(500) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `accounts`
--

LOCK TABLES `accounts` WRITE;
/*!40000 ALTER TABLE `accounts` DISABLE KEYS */;
INSERT INTO `accounts` VALUES (13,987,3,'jbhg','kjhgh','kjghvhg fd, hdf','9876543456','','','',3,'','2016-12-19 06:22:18'),(14,345,2,'Aman Laxkar','Xys dy','jgjfkfg, ,fgdgdok','8637324763','','Maruti Suzuki Given','32&quot; Given',2,'','2016-12-22 03:47:06'),(15,47,1,'hg','hhvhg','hvv','9993217438','','Inverter 11/12/2016','32&quot; 22/12/2016',1,'','2016-12-23 15:13:08'),(16,456,1,'jhf','jhg','jhghkjh','8765323653','','','',1,'','2016-12-20 13:06:20'),(17,809,1,'kunal','Vishnu datt sharma','NayamandirKayasth Mohalla','7810232109','','','',1,'','2016-12-20 18:57:31'),(18,810,1,'kwunal','Vishnu datt sharma','NayamandirKayasth Mohalla','7810232109','','','',1,'','2016-12-20 18:57:41'),(19,888,1,'Golo','molu','jjm  nlkjjn; kj','9876543210','8765432109','','',1,'gcj','2016-12-20 18:59:34'),(20,882,1,'Golo','molu','jjm  nlkjjn; kj','9876543210','','','',1,'gcj','2016-12-20 18:59:45'),(21,329,3,'Hanuman','Ram','kjhjgjk','7737424578','9876543210','','',3,'','2016-12-23 12:15:45'),(22,989,3,'Hanuman','kjhb','khn gngkh g','1234567806','','','',1,'','2016-12-23 12:45:50'),(23,6899,2,'hjhjblkk','hjbjkghj','bh gjmlnj','5437891234','','','',1,'','2016-12-23 12:53:19'),(24,8765,4,'jkbhkgk jf ','j hgvgk',' khg, ,hljh b','1234567890','','','',3,'b','2016-12-23 15:10:19'),(25,88,4,'mjh,khn ','h gjl',' ghklj ','0987654321','1234567890','','',1,'jhghk','2016-12-23 15:10:56');
/*!40000 ALTER TABLE `accounts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `acctype`
--

DROP TABLE IF EXISTS `acctype`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `acctype` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(30) NOT NULL,
  `FMI` double NOT NULL,
  `OMI` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `acctype`
--

LOCK TABLES `acctype` WRITE;
/*!40000 ALTER TABLE `acctype` DISABLE KEYS */;
INSERT INTO `acctype` VALUES (1,'32 inch',3000,1500),(2,'32 inch',3500,1500),(3,'40 inch',3500,1500);
/*!40000 ALTER TABLE `acctype` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `agent`
--

DROP TABLE IF EXISTS `agent`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `agent` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(100) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `city` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `agent`
--

LOCK TABLES `agent` WRITE;
/*!40000 ALTER TABLE `agent` DISABLE KEYS */;
INSERT INTO `agent` VALUES (1,'Vishal','7737421817','newai'),(2,'Vishal Sharma','7737421817','Newai'),(3,'hgh','8765323653','njbhv'),(4,'Aman Laxkar','8976543456','kja');
/*!40000 ALTER TABLE `agent` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `installments`
--

DROP TABLE IF EXISTS `installments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `installments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `accid` int(11) NOT NULL,
  `month` varchar(50) NOT NULL,
  `value` double NOT NULL,
  `status` varchar(50) NOT NULL,
  `remarks` varchar(500) NOT NULL,
  `logs` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=169 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `installments`
--

LOCK TABLES `installments` WRITE;
/*!40000 ALTER TABLE `installments` DISABLE KEYS */;
INSERT INTO `installments` VALUES (1,12,'Dec 16',3000,'unpaid','','<br /> 2016/12/23 09:41:53am : Status : paid & remarks : <br /> 2016/12/23 09:42:56am : Status : unpaid & remarks : ','2016-12-23 04:12:56'),(2,12,'Jan 17',1500,'paid','','<br /> 2016/12/23 09:43:35am : Status : paid & remarks : ','2016-12-23 04:13:35'),(3,12,'Feb 17',1500,'unpaid','','','2016-12-19 05:00:34'),(4,12,'Mar 17',1500,'unpaid','','','2016-12-19 05:00:34'),(5,12,'Apr 17',1500,'unpaid','','','2016-12-19 05:00:34'),(6,12,'May 17',1500,'unpaid','','','2016-12-19 05:00:34'),(7,12,'Jun 17',1500,'unpaid','','','2016-12-19 05:00:34'),(8,12,'Jul 17',1500,'unpaid','','','2016-12-19 05:00:34'),(9,12,'Aug 17',1500,'unpaid','','','2016-12-19 05:00:34'),(10,12,'Sep 17',1500,'unpaid','','','2016-12-19 05:00:34'),(11,12,'Oct 17',1500,'unpaid','','','2016-12-19 05:00:34'),(12,12,'Nov 17',1500,'unpaid','','','2016-12-19 05:00:34'),(13,13,'Dec 16',3500,'unpaid','','','2016-12-19 06:22:18'),(14,13,'Jan 17',1500,'unpaid','','','2016-12-19 06:22:18'),(15,13,'Feb 17',1500,'unpaid','','','2016-12-19 06:22:18'),(16,13,'Mar 17',1500,'unpaid','','','2016-12-19 06:22:18'),(17,13,'Apr 17',1500,'unpaid','','','2016-12-19 06:22:18'),(18,13,'May 17',1500,'unpaid','','','2016-12-19 06:22:18'),(19,13,'Jun 17',1500,'unpaid','','','2016-12-19 06:22:18'),(20,13,'Jul 17',1500,'unpaid','','','2016-12-19 06:22:18'),(21,13,'Aug 17',1500,'unpaid','','','2016-12-19 06:22:18'),(22,13,'Sep 17',1500,'unpaid','','','2016-12-19 06:22:18'),(23,13,'Oct 17',1500,'unpaid','','','2016-12-19 06:22:19'),(24,13,'Nov 17',1500,'unpaid','','','2016-12-19 06:22:19'),(25,14,'Dec 16',3500,'unpaid','','<br /> 2016/12/22 12:00:41pm : Status : paid & remarks : j<br /> 2016/12/22 12:02:33pm : Status : paid & remarks : <br /> 2016/12/22 12:02:44pm : Status : unpaid & remarks : ','2016-12-22 06:32:44'),(26,14,'Jan 17',1500,'unpaid','500 Paid\r\n1000 unpaidyour extra html','','2016-12-22 06:08:59'),(27,14,'Feb 17',1500,'unpaid','','','2016-12-19 11:37:22'),(28,14,'Mar 17',1500,'unpaid','','','2016-12-19 11:37:22'),(29,14,'Apr 17',1500,'unpaid','','','2016-12-19 11:37:22'),(30,14,'May 17',1500,'unpaid','','','2016-12-19 11:37:22'),(31,14,'Jun 17',1500,'unpaid','','','2016-12-19 11:37:22'),(32,14,'Jul 17',1500,'unpaid','','','2016-12-19 11:37:22'),(33,14,'Aug 17',1500,'unpaid','','','2016-12-19 11:37:22'),(34,14,'Sep 17',1500,'unpaid','','','2016-12-19 11:37:22'),(35,14,'Oct 17',1500,'unpaid','','','2016-12-19 11:37:22'),(36,14,'Nov 17',1500,'unpaid','','','2016-12-19 11:37:22'),(37,15,'Dec 16',3000,'paid','','<br /> 2016/12/23 06:51:07pm : Status : paid & remarks : ','2016-12-23 13:21:07'),(38,15,'Jan 17',1500,'unpaid','','','2016-12-20 09:05:54'),(39,15,'Feb 17',1500,'unpaid','','','2016-12-20 09:05:54'),(40,15,'Mar 17',1500,'unpaid','','','2016-12-20 09:05:54'),(41,15,'Apr 17',1500,'unpaid','','','2016-12-20 09:05:54'),(42,15,'May 17',1500,'unpaid','','','2016-12-20 09:05:54'),(43,15,'Jun 17',1500,'unpaid','','','2016-12-20 09:05:54'),(44,15,'Jul 17',1500,'unpaid','','','2016-12-20 09:05:54'),(45,15,'Aug 17',1500,'unpaid','','','2016-12-20 09:05:54'),(46,15,'Sep 17',1500,'unpaid','','','2016-12-20 09:05:55'),(47,15,'Oct 17',1500,'unpaid','','','2016-12-20 09:05:55'),(48,15,'Nov 17',1500,'unpaid','','','2016-12-20 09:05:55'),(49,16,'Dec 16',3000,'unpaid','','','2016-12-20 13:06:20'),(50,16,'Jan 17',1500,'unpaid','','','2016-12-20 13:06:20'),(51,16,'Feb 17',1500,'unpaid','','','2016-12-20 13:06:20'),(52,16,'Mar 17',1500,'unpaid','','','2016-12-20 13:06:20'),(53,16,'Apr 17',1500,'unpaid','','','2016-12-20 13:06:20'),(54,16,'May 17',1500,'unpaid','','','2016-12-20 13:06:20'),(55,16,'Jun 17',1500,'unpaid','','','2016-12-20 13:06:20'),(56,16,'Jul 17',1500,'unpaid','','','2016-12-20 13:06:20'),(57,16,'Aug 17',1500,'unpaid','','','2016-12-20 13:06:20'),(58,16,'Sep 17',1500,'unpaid','','','2016-12-20 13:06:20'),(59,16,'Oct 17',1500,'unpaid','','','2016-12-20 13:06:20'),(60,16,'Nov 17',1500,'unpaid','','','2016-12-20 13:06:21'),(61,17,'Dec 16',3000,'unpaid','','','2016-12-20 18:57:31'),(62,17,'Jan 17',1500,'unpaid','','','2016-12-20 18:57:31'),(63,17,'Feb 17',1500,'unpaid','','','2016-12-20 18:57:31'),(64,17,'Mar 17',1500,'unpaid','','','2016-12-20 18:57:31'),(65,17,'Apr 17',1500,'unpaid','','','2016-12-20 18:57:31'),(66,17,'May 17',1500,'unpaid','','','2016-12-20 18:57:31'),(67,17,'Jun 17',1500,'unpaid','','','2016-12-20 18:57:31'),(68,17,'Jul 17',1500,'unpaid','','','2016-12-20 18:57:31'),(69,17,'Aug 17',1500,'unpaid','','','2016-12-20 18:57:31'),(70,17,'Sep 17',1500,'unpaid','','','2016-12-20 18:57:31'),(71,17,'Oct 17',1500,'unpaid','','','2016-12-20 18:57:31'),(72,17,'Nov 17',1500,'unpaid','','','2016-12-20 18:57:31'),(73,18,'Dec 16',3000,'unpaid','','','2016-12-20 18:57:42'),(74,18,'Jan 17',1500,'unpaid','','','2016-12-20 18:57:42'),(75,18,'Feb 17',1500,'unpaid','','','2016-12-20 18:57:42'),(76,18,'Mar 17',1500,'unpaid','','','2016-12-20 18:57:42'),(77,18,'Apr 17',1500,'unpaid','','','2016-12-20 18:57:42'),(78,18,'May 17',1500,'unpaid','','','2016-12-20 18:57:42'),(79,18,'Jun 17',1500,'unpaid','','','2016-12-20 18:57:42'),(80,18,'Jul 17',1500,'unpaid','','','2016-12-20 18:57:42'),(81,18,'Aug 17',1500,'unpaid','','','2016-12-20 18:57:42'),(82,18,'Sep 17',1500,'unpaid','','','2016-12-20 18:57:42'),(83,18,'Oct 17',1500,'unpaid','','','2016-12-20 18:57:42'),(84,18,'Nov 17',1500,'unpaid','','','2016-12-20 18:57:42'),(85,19,'Dec 16',3000,'unpaid','','','2016-12-20 18:59:34'),(86,19,'Jan 17',1500,'unpaid','','','2016-12-20 18:59:34'),(87,19,'Feb 17',1500,'unpaid','','','2016-12-20 18:59:34'),(88,19,'Mar 17',1500,'unpaid','','','2016-12-20 18:59:34'),(89,19,'Apr 17',1500,'unpaid','','','2016-12-20 18:59:34'),(90,19,'May 17',1500,'unpaid','','','2016-12-20 18:59:34'),(91,19,'Jun 17',1500,'unpaid','','','2016-12-20 18:59:34'),(92,19,'Jul 17',1500,'unpaid','','','2016-12-20 18:59:34'),(93,19,'Aug 17',1500,'unpaid','','','2016-12-20 18:59:35'),(94,19,'Sep 17',1500,'unpaid','','','2016-12-20 18:59:35'),(95,19,'Oct 17',1500,'unpaid','','','2016-12-20 18:59:35'),(96,19,'Nov 17',1500,'unpaid','','','2016-12-20 18:59:35'),(97,20,'Dec 16',3000,'unpaid','','','2016-12-20 18:59:45'),(98,20,'Jan 17',1500,'unpaid','','','2016-12-20 18:59:45'),(99,20,'Feb 17',1500,'unpaid','','','2016-12-20 18:59:45'),(100,20,'Mar 17',1500,'unpaid','','','2016-12-20 18:59:46'),(101,20,'Apr 17',1500,'unpaid','','','2016-12-20 18:59:46'),(102,20,'May 17',1500,'unpaid','','','2016-12-20 18:59:46'),(103,20,'Jun 17',1500,'unpaid','','','2016-12-20 18:59:46'),(104,20,'Jul 17',1500,'unpaid','','','2016-12-20 18:59:46'),(105,20,'Aug 17',1500,'unpaid','','','2016-12-20 18:59:46'),(106,20,'Sep 17',1500,'unpaid','','','2016-12-20 18:59:46'),(107,20,'Oct 17',1500,'unpaid','','','2016-12-20 18:59:46'),(108,20,'Nov 17',1500,'unpaid','','','2016-12-20 18:59:46'),(109,21,'Dec 16',3500,'paid','','<br /> 2016/12/23 08:42:03pm : Status : paid & remarks : ','2016-12-23 15:12:03'),(110,21,'Jan 17',1500,'unpaid','','','2016-12-23 12:15:45'),(111,21,'Feb 17',1500,'unpaid','','','2016-12-23 12:15:45'),(112,21,'Mar 17',1500,'unpaid','','','2016-12-23 12:15:45'),(113,21,'Apr 17',1500,'unpaid','','','2016-12-23 12:15:45'),(114,21,'May 17',1500,'unpaid','','','2016-12-23 12:15:45'),(115,21,'Jun 17',1500,'unpaid','','','2016-12-23 12:15:45'),(116,21,'Jul 17',1500,'unpaid','','','2016-12-23 12:15:45'),(117,21,'Aug 17',1500,'unpaid','','','2016-12-23 12:15:45'),(118,21,'Sep 17',1500,'unpaid','','','2016-12-23 12:15:45'),(119,21,'Oct 17',1500,'unpaid','','','2016-12-23 12:15:45'),(120,21,'Nov 17',1500,'unpaid','','','2016-12-23 12:15:45'),(121,22,'Dec 16',3000,'unpaid','','','2016-12-23 12:45:51'),(122,22,'Jan 17',1500,'unpaid','','','2016-12-23 12:45:51'),(123,22,'Feb 17',1500,'unpaid','','','2016-12-23 12:45:51'),(124,22,'Mar 17',1500,'unpaid','','','2016-12-23 12:45:51'),(125,22,'Apr 17',1500,'unpaid','','','2016-12-23 12:45:51'),(126,22,'May 17',1500,'unpaid','','','2016-12-23 12:45:51'),(127,22,'Jun 17',1500,'unpaid','','','2016-12-23 12:45:51'),(128,22,'Jul 17',1500,'unpaid','','','2016-12-23 12:45:51'),(129,22,'Aug 17',1500,'unpaid','','','2016-12-23 12:45:51'),(130,22,'Sep 17',1500,'unpaid','','','2016-12-23 12:45:51'),(131,22,'Oct 17',1500,'unpaid','','','2016-12-23 12:45:51'),(132,22,'Nov 17',1500,'unpaid','','','2016-12-23 12:45:51'),(133,23,'Dec 16',3000,'unpaid','','','2016-12-23 12:53:19'),(134,23,'Jan 17',1500,'unpaid','','','2016-12-23 12:53:19'),(135,23,'Feb 17',1500,'unpaid','','','2016-12-23 12:53:19'),(136,23,'Mar 17',1500,'unpaid','','','2016-12-23 12:53:19'),(137,23,'Apr 17',1500,'unpaid','','','2016-12-23 12:53:19'),(138,23,'May 17',1500,'unpaid','','','2016-12-23 12:53:19'),(139,23,'Jun 17',1500,'unpaid','','','2016-12-23 12:53:19'),(140,23,'Jul 17',1500,'unpaid','','','2016-12-23 12:53:19'),(141,23,'Aug 17',1500,'unpaid','','','2016-12-23 12:53:19'),(142,23,'Sep 17',1500,'unpaid','','','2016-12-23 12:53:19'),(143,23,'Oct 17',1500,'unpaid','','','2016-12-23 12:53:19'),(144,23,'Nov 17',1500,'unpaid','','','2016-12-23 12:53:19'),(145,24,'Dec 16',3500,'unpaid','','','2016-12-23 15:10:19'),(146,24,'Jan 17',1500,'unpaid','','','2016-12-23 15:10:19'),(147,24,'Feb 17',1500,'unpaid','','','2016-12-23 15:10:19'),(148,24,'Mar 17',1500,'unpaid','','','2016-12-23 15:10:19'),(149,24,'Apr 17',1500,'unpaid','','','2016-12-23 15:10:19'),(150,24,'May 17',1500,'unpaid','','','2016-12-23 15:10:19'),(151,24,'Jun 17',1500,'unpaid','','','2016-12-23 15:10:19'),(152,24,'Jul 17',1500,'unpaid','','','2016-12-23 15:10:19'),(153,24,'Aug 17',1500,'unpaid','','','2016-12-23 15:10:19'),(154,24,'Sep 17',1500,'unpaid','','','2016-12-23 15:10:19'),(155,24,'Oct 17',1500,'unpaid','','','2016-12-23 15:10:19'),(156,24,'Nov 17',1500,'unpaid','','','2016-12-23 15:10:19'),(157,25,'Dec 16',3000,'paid','','<br /> 2016/12/23 08:41:53pm : Status : paid & remarks : ','2016-12-23 15:11:53'),(158,25,'Jan 17',1500,'unpaid','','','2016-12-23 15:10:56'),(159,25,'Feb 17',1500,'unpaid','','','2016-12-23 15:10:56'),(160,25,'Mar 17',1500,'unpaid','','','2016-12-23 15:10:56'),(161,25,'Apr 17',1500,'unpaid','','','2016-12-23 15:10:56'),(162,25,'May 17',1500,'unpaid','','','2016-12-23 15:10:56'),(163,25,'Jun 17',1500,'unpaid','','','2016-12-23 15:10:56'),(164,25,'Jul 17',1500,'unpaid','','','2016-12-23 15:10:56'),(165,25,'Aug 17',1500,'unpaid','','','2016-12-23 15:10:56'),(166,25,'Sep 17',1500,'unpaid','','','2016-12-23 15:10:56'),(167,25,'Oct 17',1500,'unpaid','','','2016-12-23 15:10:56'),(168,25,'Nov 17',1500,'unpaid','','','2016-12-23 15:10:57');
/*!40000 ALTER TABLE `installments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `managers`
--

DROP TABLE IF EXISTS `managers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `managers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `AcType` varchar(50) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `managers`
--

LOCK TABLES `managers` WRITE;
/*!40000 ALTER TABLE `managers` DISABLE KEYS */;
/*!40000 ALTER TABLE `managers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `stockdispatched`
--

DROP TABLE IF EXISTS `stockdispatched`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `stockdispatched` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Product` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `quantity` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `stockdispatched`
--

LOCK TABLES `stockdispatched` WRITE;
/*!40000 ALTER TABLE `stockdispatched` DISABLE KEYS */;
/*!40000 ALTER TABLE `stockdispatched` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `stockrecive`
--

DROP TABLE IF EXISTS `stockrecive`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `stockrecive` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `quntity` int(11) NOT NULL,
  `dealer` varchar(200) NOT NULL,
  `remarks` varchar(500) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `stockrecive`
--

LOCK TABLES `stockrecive` WRITE;
/*!40000 ALTER TABLE `stockrecive` DISABLE KEYS */;
/*!40000 ALTER TABLE `stockrecive` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(500) NOT NULL,
  `password` varchar(500) NOT NULL,
  `name` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'vishal@newai.in','vishal@ijmd','Vishal Sharma');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-12-25 14:26:11
