-- MySQL dump 10.13  Distrib 5.6.27, for Win64 (x86_64)
--
-- Host: localhost    Database: materialplan
-- ------------------------------------------------------
-- Server version	5.6.27-log

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
-- Table structure for table `tbl_materialplan`
--

DROP TABLE IF EXISTS `tbl_materialplan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_materialplan` (
  `ID` int(10) NOT NULL AUTO_INCREMENT,
  `planId` bigint(20) NOT NULL,
  `planType` varchar(255) NOT NULL,
  `planName` varchar(255) NOT NULL,
  `needDepartment` varchar(255) NOT NULL,
  `needPeoName` varchar(255) NOT NULL,
  `planState` varchar(255) NOT NULL,
  `approvalState` varchar(255) NOT NULL,
  `needType` varchar(255) NOT NULL,
  `planMonth` bigint(20) NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `planId` (`planId`)
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_materialplan`
--

LOCK TABLES `tbl_materialplan` WRITE;
/*!40000 ALTER TABLE `tbl_materialplan` DISABLE KEYS */;
INSERT INTO `tbl_materialplan` VALUES (44,1573567068230,'1','1','荷兰优质淡奶，奶香浓而不腻','上海市普陀区真北路','1','4','2',197001),(45,1573567070527,'1','2','荷兰优质淡奶，奶香浓而不腻','上海市普陀区真北路','1','4','2',197001),(46,1573567072192,'1','3','荷兰优质淡奶，奶香浓而不腻','上海市普陀区真北路','1','4','2',197001),(47,1573567073881,'1','4','荷兰优质淡奶，奶香浓而不腻','上海市普陀区真北路','1','4','2',197001),(48,1573567076088,'1','5','荷兰优质淡奶，奶香浓而不腻','上海市普陀区真北路','1','4','2',197001),(49,1573567077658,'1','6','荷兰优质淡奶，奶香浓而不腻','上海市普陀区真北路','1','4','2',197001),(50,1573567079829,'1','7','荷兰优质淡奶，奶香浓而不腻','上海市普陀区真北路','1','4','2',197001),(51,1573567081537,'1','8','荷兰优质淡奶，奶香浓而不腻','上海市普陀区真北路','1','4','2',197001),(52,1573567083109,'1','9','荷兰优质淡奶，奶香浓而不腻','上海市普陀区真北路','1','4','2',197001),(53,1573567086186,'1','10','荷兰优质淡奶，奶香浓而不腻','上海市普陀区真北路','1','4','2',197001);
/*!40000 ALTER TABLE `tbl_materialplan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_materialplanchangestate`
--

DROP TABLE IF EXISTS `tbl_materialplanchangestate`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_materialplanchangestate` (
  `ID` int(10) NOT NULL AUTO_INCREMENT,
  `planId` bigint(20) NOT NULL,
  `revise` varchar(255) NOT NULL,
  `reviseTime` bigint(20) NOT NULL,
  `reviseRemarks` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `planId` (`planId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_materialplanchangestate`
--

LOCK TABLES `tbl_materialplanchangestate` WRITE;
/*!40000 ALTER TABLE `tbl_materialplanchangestate` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_materialplanchangestate` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_materialplanstate`
--

DROP TABLE IF EXISTS `tbl_materialplanstate`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_materialplanstate` (
  `ID` int(10) NOT NULL AUTO_INCREMENT,
  `planId` bigint(20) NOT NULL,
  `create` varchar(255) NOT NULL,
  `createTime` bigint(20) NOT NULL,
  `approvalHead` varchar(255) DEFAULT NULL,
  `approvalHeadTime` bigint(20) DEFAULT NULL,
  `approvalHeadRemarks` varchar(255) DEFAULT NULL,
  `approvalNeed` varchar(255) DEFAULT NULL,
  `approvalNeedTime` bigint(20) DEFAULT NULL,
  `approvalNeedRemarks` varchar(255) DEFAULT NULL,
  `headState` varchar(255) DEFAULT NULL,
  `needState` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `planId` (`planId`)
) ENGINE=InnoDB AUTO_INCREMENT=90 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_materialplanstate`
--

LOCK TABLES `tbl_materialplanstate` WRITE;
/*!40000 ALTER TABLE `tbl_materialplanstate` DISABLE KEYS */;
INSERT INTO `tbl_materialplanstate` VALUES (80,1573567068230,'随机创建人',1573567068230,'部门主管',1573567164929,'成功',NULL,NULL,NULL,'2',NULL),(81,1573567070527,'随机创建人',1573567070527,'部门主管',1573567201070,'成功',NULL,NULL,NULL,'2',NULL),(82,1573567072192,'随机创建人',1573567072192,'部门主管',1573567201070,'成功',NULL,NULL,NULL,'2',NULL),(83,1573567073881,'随机创建人',1573567073881,'部门主管',1573567201070,'成功',NULL,NULL,NULL,'2',NULL),(84,1573567076088,'随机创建人',1573567076088,'部门主管',1573567201071,'成功',NULL,NULL,NULL,'2',NULL),(85,1573567077658,'随机创建人',1573567077658,'部门主管',1573567201071,'成功',NULL,NULL,NULL,'2',NULL),(86,1573567079829,'随机创建人',1573567079829,'部门主管',1573567201071,'成功',NULL,NULL,NULL,'2',NULL),(87,1573567081537,'随机创建人',1573567081537,'部门主管',1573567201071,'成功',NULL,NULL,NULL,'2',NULL),(88,1573567083109,'随机创建人',1573567083109,'部门主管',1573567201071,'成功',NULL,NULL,NULL,'2',NULL),(89,1573567086186,'随机创建人',1573567086186,'部门主管',1573567201071,'成功',NULL,NULL,NULL,'2',NULL);
/*!40000 ALTER TABLE `tbl_materialplanstate` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_metariallist`
--

DROP TABLE IF EXISTS `tbl_metariallist`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_metariallist` (
  `ID` int(10) NOT NULL AUTO_INCREMENT,
  `planId` bigint(20) NOT NULL,
  `materialClassificationCode` varchar(255) NOT NULL,
  `materialClassificationName` varchar(255) NOT NULL,
  `materialCode` bigint(20) NOT NULL,
  `materialName` varchar(255) NOT NULL,
  `specifications` varchar(255) NOT NULL,
  `model` varchar(255) NOT NULL,
  `company` varchar(255) NOT NULL,
  `demandQuantity` bigint(20) NOT NULL,
  `demandMonth` bigint(20) NOT NULL,
  `demandDate` varchar(255) NOT NULL,
  `source` varchar(255) NOT NULL,
  `expectedSupplier` varchar(255) NOT NULL,
  `fixedSupplier` varchar(255) NOT NULL,
  `remarks` varchar(255) NOT NULL,
  `materialTrackingCode` varchar(255) NOT NULL,
  `demandOrganization` varchar(255) NOT NULL,
  `cascader` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_metariallist`
--

LOCK TABLES `tbl_metariallist` WRITE;
/*!40000 ALTER TABLE `tbl_metariallist` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_metariallist` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_procurelist`
--

DROP TABLE IF EXISTS `tbl_procurelist`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_procurelist` (
  `materialCode` bigint(20) DEFAULT NULL,
  `materialTrackingCode` bigint(20) NOT NULL,
  `procureId` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`materialTrackingCode`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_procurelist`
--

LOCK TABLES `tbl_procurelist` WRITE;
/*!40000 ALTER TABLE `tbl_procurelist` DISABLE KEYS */;
INSERT INTO `tbl_procurelist` VALUES (2,1,1573806399319);
/*!40000 ALTER TABLE `tbl_procurelist` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_procureplan`
--

DROP TABLE IF EXISTS `tbl_procureplan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_procureplan` (
  `ID` int(10) NOT NULL AUTO_INCREMENT,
  `procureName` varchar(255) NOT NULL,
  `planType` bigint(20) NOT NULL,
  `procureTime` bigint(20) NOT NULL,
  `procureId` varchar(255) NOT NULL,
  `approvalState` varchar(255) NOT NULL,
  `planState` varchar(255) NOT NULL,
  `createTime` bigint(20) NOT NULL,
  `create` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_procureplan`
--

LOCK TABLES `tbl_procureplan` WRITE;
/*!40000 ALTER TABLE `tbl_procureplan` DISABLE KEYS */;
INSERT INTO `tbl_procureplan` VALUES (14,'计划',1,20191105,'1573806399319','1','4',1573806399319,'创建人');
/*!40000 ALTER TABLE `tbl_procureplan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_procureplanchangestate`
--

DROP TABLE IF EXISTS `tbl_procureplanchangestate`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_procureplanchangestate` (
  `planId` bigint(20) NOT NULL,
  `revise` varchar(255) DEFAULT NULL,
  `reviseTime` bigint(20) DEFAULT NULL,
  `reviseRemarks` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`planId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_procureplanchangestate`
--

LOCK TABLES `tbl_procureplanchangestate` WRITE;
/*!40000 ALTER TABLE `tbl_procureplanchangestate` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_procureplanchangestate` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_procureplanstate`
--

DROP TABLE IF EXISTS `tbl_procureplanstate`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_procureplanstate` (
  `create` varchar(255) DEFAULT NULL,
  `procureId` bigint(20) NOT NULL,
  `createTime` bigint(20) DEFAULT NULL,
  `approvalHead` bigint(20) DEFAULT NULL,
  `approvalHeadTime` bigint(20) DEFAULT NULL,
  `approvalHeadRemarks` varchar(255) DEFAULT NULL,
  `approvalNeed` varchar(255) DEFAULT NULL,
  `approvalNeedTime` bigint(20) DEFAULT NULL,
  `approvalNeedRemarks` varchar(255) DEFAULT NULL,
  `headState` varchar(255) DEFAULT NULL,
  `needState` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`procureId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_procureplanstate`
--

LOCK TABLES `tbl_procureplanstate` WRITE;
/*!40000 ALTER TABLE `tbl_procureplanstate` DISABLE KEYS */;
INSERT INTO `tbl_procureplanstate` VALUES ('创建人',1573803799028,1573803799028,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),('创建人',1573805472464,1573805472464,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),('创建人',1573805623587,1573805623587,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),('创建人',1573805684474,1573805684474,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),('创建人',1573805701024,1573805701023,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),('创建人',1573805884484,1573805884484,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),('创建人',1573806110819,1573806110819,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),('创建人',1573806154005,1573806154005,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),('创建人',1573806202439,1573806202439,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),('创建人',1573806399319,1573806399319,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `tbl_procureplanstate` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_stocklist`
--

DROP TABLE IF EXISTS `tbl_stocklist`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_stocklist` (
  `materialClassificationCode` varchar(255) DEFAULT NULL,
  `materialClassificationName` varchar(255) DEFAULT NULL,
  `materialCode` bigint(20) NOT NULL,
  `materialName` varchar(255) DEFAULT NULL,
  `specifications` varchar(255) DEFAULT NULL,
  `model` varchar(255) DEFAULT NULL,
  `company` varchar(255) DEFAULT NULL,
  `transport` bigint(20) DEFAULT NULL,
  `available` bigint(20) DEFAULT NULL,
  `occupy` bigint(20) DEFAULT NULL,
  `total` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`materialCode`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_stocklist`
--

LOCK TABLES `tbl_stocklist` WRITE;
/*!40000 ALTER TABLE `tbl_stocklist` DISABLE KEYS */;
INSERT INTO `tbl_stocklist` VALUES ('10','生活',1573801609921,'物品','椅子','型号','张',NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `tbl_stocklist` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-11-15 16:33:01
