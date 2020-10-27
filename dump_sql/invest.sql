-- MariaDB dump 10.17  Distrib 10.4.11-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: trafiz
-- ------------------------------------------------------
-- Server version	10.4.11-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `investbuyfish`
--

DROP TABLE IF EXISTS `investbuyfish`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `investbuyfish` (
  `id` varchar(32) NOT NULL,
  `offlineID` varchar(128) NOT NULL,
  `catchOfflineID` varchar(128) NOT NULL,
  `fishOfflineID` varchar(128) NOT NULL,
  `shipOfflineID` varchar(128) NOT NULL,
  `species` text NOT NULL,
  `speciesEng` text NOT NULL,
  `speciesIndo` text NOT NULL,
  `weightBeforeSplit` int(11) NOT NULL,
  `grade` text NOT NULL,
  `fishermanname` text NOT NULL,
  `fishingground` text NOT NULL,
  `shipName` text NOT NULL,
  `shipGear` text NOT NULL,
  `landingDate` text NOT NULL,
  `portName` text NOT NULL,
  `amount` int(11) NOT NULL DEFAULT 0,
  `notes` text NOT NULL,
  `ts` int(11) NOT NULL,
  `synch` int(11) NOT NULL DEFAULT 0,
  `trxoperation` text NOT NULL,
  `trxdate` text NOT NULL,
  `idmssupplier` text NOT NULL,
  `idmsuser` text NOT NULL,
  PRIMARY KEY (`offlineID`),
  KEY `id` (`id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `investcreditpayment`
--

DROP TABLE IF EXISTS `investcreditpayment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `investcreditpayment` (
  `id` varchar(32) NOT NULL,
  `offlineID` varchar(128) NOT NULL,
  `giveCreditOfflineID` text NOT NULL,
  `trafizPayloanOfflineID` text NOT NULL,
  `amount` int(11) NOT NULL DEFAULT 0,
  `notes` text NOT NULL,
  `ts` int(11) NOT NULL,
  `synch` int(11) NOT NULL DEFAULT 0,
  `trxoperation` text NOT NULL,
  `trxdate` text NOT NULL,
  `idmssupplier` text NOT NULL,
  `idmsuser` text NOT NULL,
  `paidoff` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`offlineID`),
  KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `investcustomexpense`
--

DROP TABLE IF EXISTS `investcustomexpense`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `investcustomexpense` (
  `id` varchar(32) NOT NULL,
  `offlineID` varchar(128) NOT NULL,
  `offlineCustomTypeID` text NOT NULL,
  `amount` int(11) NOT NULL,
  `notes` text NOT NULL,
  `ts` int(11) NOT NULL,
  `createddate` text NOT NULL,
  `createdhour` text NOT NULL,
  `synch` int(11) NOT NULL,
  `trxoperation` text NOT NULL,
  `trxdate` text NOT NULL,
  `idmssupplier` text NOT NULL,
  `idmsuser` text NOT NULL,
  PRIMARY KEY (`offlineID`),
  KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `investcustomincome`
--

DROP TABLE IF EXISTS `investcustomincome`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `investcustomincome` (
  `id` varchar(32) NOT NULL,
  `offlineID` varchar(128) NOT NULL,
  `offlineCustomTypeID` text NOT NULL,
  `amount` int(11) NOT NULL,
  `notes` text NOT NULL,
  `ts` int(11) NOT NULL,
  `createddate` text NOT NULL,
  `createdhour` text NOT NULL,
  `synch` int(11) NOT NULL,
  `trxoperation` text NOT NULL,
  `trxdate` text NOT NULL,
  `idmssupplier` text NOT NULL,
  `idmsuser` text NOT NULL,
  PRIMARY KEY (`offlineID`),
  KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `investcustomtype`
--

DROP TABLE IF EXISTS `investcustomtype`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `investcustomtype` (
  `id` varchar(32) NOT NULL,
  `offlineID` varchar(128) NOT NULL,
  `label` text NOT NULL,
  `incomeorexpense` text NOT NULL,
  `ts` int(11) NOT NULL,
  `createddate` text NOT NULL,
  `createdhour` text NOT NULL,
  `synch` int(11) NOT NULL,
  `trxoperation` text NOT NULL,
  `trxdate` text NOT NULL,
  `idmssupplier` text NOT NULL,
  `idmsuser` text NOT NULL,
  PRIMARY KEY (`offlineID`),
  KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `investgivecredit`
--

DROP TABLE IF EXISTS `investgivecredit`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `investgivecredit` (
  `id` varchar(32) NOT NULL,
  `offlineID` varchar(128) NOT NULL,
  `trafizLoanOfflineID` text NOT NULL,
  `name` text NOT NULL,
  `amount` int(11) NOT NULL DEFAULT 0,
  `notes` text NOT NULL,
  `ts` int(11) NOT NULL,
  `synch` int(11) NOT NULL DEFAULT 0,
  `trxoperation` text NOT NULL,
  `trxdate` text NOT NULL,
  `idmssupplier` text NOT NULL,
  `idmsuser` text NOT NULL,
  PRIMARY KEY (`offlineID`),
  KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `investpayloan`
--

DROP TABLE IF EXISTS `investpayloan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `investpayloan` (
  `id` varchar(32) NOT NULL,
  `offlineID` varchar(128) NOT NULL,
  `takeLoanOfflineID` text NOT NULL,
  `amount` int(11) NOT NULL DEFAULT 0,
  `notes` text NOT NULL,
  `paidoff` tinyint(1) NOT NULL DEFAULT 0,
  `ts` int(11) NOT NULL,
  `synch` int(11) NOT NULL DEFAULT 0,
  `trxoperation` text NOT NULL,
  `trxdate` text NOT NULL,
  `idmssupplier` text NOT NULL,
  `idmsuser` text NOT NULL,
  PRIMARY KEY (`offlineID`),
  KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `investsimplesellfish`
--

DROP TABLE IF EXISTS `investsimplesellfish`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `investsimplesellfish` (
  `id` varchar(32) NOT NULL,
  `offlineID` varchar(128) NOT NULL,
  `fishOfflineID` varchar(128) NOT NULL,
  `grade` text NOT NULL,
  `weight` int(11) NOT NULL DEFAULT 0,
  `amount` int(11) NOT NULL DEFAULT 0,
  `notes` text NOT NULL,
  `ts` int(11) NOT NULL,
  `synch` int(11) NOT NULL DEFAULT 0,
  `trxoperation` text NOT NULL,
  `trxdate` text NOT NULL,
  `idmssupplier` text NOT NULL,
  `idmsuser` text NOT NULL,
  PRIMARY KEY (`offlineID`),
  KEY `id` (`id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `investsplitfish`
--

DROP TABLE IF EXISTS `investsplitfish`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `investsplitfish` (
  `id` varchar(32) NOT NULL,
  `offlineID` varchar(128) NOT NULL,
  `deliveryOfflineID` varchar(128) NOT NULL,
  `buyFishOfflineID` varchar(128) NOT NULL,
  `sellUnitName` text NOT NULL,
  `numUnit` int(11) NOT NULL DEFAULT 1,
  `sellUnitPrice` int(11) NOT NULL DEFAULT 0,
  `amount` int(11) NOT NULL DEFAULT 0,
  `notes` text NOT NULL,
  `ts` int(11) NOT NULL,
  `synch` int(11) NOT NULL DEFAULT 0,
  `trxoperation` text NOT NULL,
  `trxdate` text NOT NULL,
  `idmssupplier` text NOT NULL,
  `idmsuser` text NOT NULL,
  `weightOnSplit` int(11) NOT NULL DEFAULT 0,
  `sold` int(11) NOT NULL DEFAULT 0,
  `fishOfflineID` varchar(128) NOT NULL,
  PRIMARY KEY (`offlineID`),
  KEY `id` (`id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `investtakeloan`
--

DROP TABLE IF EXISTS `investtakeloan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `investtakeloan` (
  `id` varchar(32) NOT NULL,
  `offlineID` varchar(128) NOT NULL,
  `creditor` text NOT NULL,
  `tenor` int(11) NOT NULL,
  `installment` int(11) NOT NULL,
  `payperiod` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `notes` text NOT NULL,
  `ts` int(11) NOT NULL,
  `synch` int(11) NOT NULL DEFAULT 0,
  `trxoperation` text NOT NULL,
  `trxdate` text NOT NULL,
  `idmssupplier` text NOT NULL,
  `idmsuser` text NOT NULL,
  PRIMARY KEY (`offlineID`),
  KEY `id` (`id`),
  KEY `id_2` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `kdeindo`
--

DROP TABLE IF EXISTS `kdeindo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kdeindo` (
  `idtrkdeindo` varchar(32) NOT NULL,
  `idtrcatch` varchar(32) NOT NULL,
  `company_org_name` varchar(50) DEFAULT NULL,
  `company_owner_name` varchar(50) DEFAULT NULL,
  `company_owner_sex` varchar(1) DEFAULT NULL,
  `company_license_id` varchar(20) DEFAULT NULL,
  `company_license_expiration_date` date DEFAULT NULL,
  `company_address` varchar(100) DEFAULT NULL,
  `company_phone` varchar(20) DEFAULT NULL,
  `consignee` varchar(50) DEFAULT NULL,
  `sex` varchar(1) DEFAULT NULL,
  `vessel_name` varchar(50) DEFAULT NULL,
  `vessel_size` varchar(10) DEFAULT NULL,
  `vessel_length` varchar(10) DEFAULT NULL,
  `vessel_flag` varchar(50) DEFAULT NULL,
  `vessel_transmitter_id` varchar(50) DEFAULT NULL,
  `vessel_register_id` varchar(50) DEFAULT NULL,
  `vessel_radio_register_id` varchar(50) DEFAULT NULL,
  `catch_or_farm` varchar(1) DEFAULT NULL,
  `by_catch` varchar(1) DEFAULT NULL,
  `catch_id` varchar(20) DEFAULT NULL,
  `species_caught` varchar(50) DEFAULT NULL,
  `scientific_name` varchar(50) DEFAULT NULL,
  `asfis_or_product_code` varchar(3) DEFAULT NULL,
  `batch_or_lot_smallint` varchar(50) DEFAULT NULL,
  `total_weight_of_batch` smallint(6) DEFAULT NULL,
  `product_form_at_landing` varchar(50) DEFAULT NULL,
  `quantity` smallint(6) DEFAULT NULL,
  `total_weight_of_species` smallint(6) DEFAULT NULL,
  `catch_date` date DEFAULT NULL,
  `number_of_trip` smallint(6) DEFAULT NULL,
  `catch_time` time DEFAULT NULL,
  `year_of_departure` date DEFAULT NULL,
  `date_of_departure` date DEFAULT NULL,
  `time_of_departure` time DEFAULT NULL,
  `date_of_return` date DEFAULT NULL,
  `time_of_return` time DEFAULT NULL,
  `fishing_gear_start_setting_time` time DEFAULT NULL,
  `fishing_gear_end_setting_time` time DEFAULT NULL,
  `hook_setting_time` time DEFAULT NULL,
  `number_of_hook` smallint(6) DEFAULT NULL,
  `distance_between_hook` varchar(9) DEFAULT NULL,
  `vessel_port_of_departure` varchar(50) DEFAULT NULL,
  `point_of_catch` varchar(30) DEFAULT NULL,
  `product_destination` varchar(50) DEFAULT NULL,
  `vessel_landing_port` varchar(50) DEFAULT NULL,
  `gear_type` varchar(50) DEFAULT NULL,
  `indonesia_wpp_catch_area` varchar(10) DEFAULT NULL,
  `indonesia_local_sea_name` varchar(50) DEFAULT NULL,
  `catch_area_fad_used` varchar(10) DEFAULT NULL,
  `lead_document_type` varchar(20) DEFAULT NULL,
  `lead_document_id` varchar(20) DEFAULT NULL,
  `captain_name` varchar(50) DEFAULT NULL,
  `captain_sex` varchar(1) DEFAULT NULL,
  `captain_personal_identification` varchar(20) DEFAULT NULL,
  `captain_nationality` varchar(50) DEFAULT NULL,
  `crew_name` varchar(50) DEFAULT NULL,
  `crew_sex` varchar(1) DEFAULT NULL,
  `crew_personal_id` varchar(50) DEFAULT NULL,
  `crew_job` varchar(50) DEFAULT NULL,
  `crew_nationality` varchar(50) DEFAULT NULL,
  `crew_date_of_birth` date DEFAULT NULL,
  `total_indonesia_crew` smallint(6) DEFAULT NULL,
  `total_foreign_crew` smallint(6) DEFAULT NULL,
  `captain_node` varchar(1028) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `kdeusaid`
--

DROP TABLE IF EXISTS `kdeusaid`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kdeusaid` (
  `idtrkde` varchar(32) NOT NULL,
  `idtrcatch` varchar(32) NOT NULL,
  `event_owner` varchar(50) DEFAULT NULL,
  `owner_name` varchar(50) DEFAULT NULL,
  `owner_sex` varchar(1) DEFAULT NULL,
  `owner_id` varchar(20) DEFAULT NULL,
  `owner_id_expiry_date` date DEFAULT NULL,
  `owner_address` varchar(100) DEFAULT NULL,
  `owner_phone` varchar(20) DEFAULT NULL,
  `trading_partner` varchar(50) DEFAULT NULL,
  `trading_partner_sex` varchar(1) DEFAULT NULL,
  `vessel_name` varchar(50) DEFAULT NULL,
  `vessel_size` varchar(10) DEFAULT NULL,
  `vessel_flag` varchar(50) DEFAULT NULL,
  `vessel_id` varchar(50) DEFAULT NULL,
  `event_type` varchar(50) DEFAULT NULL,
  `event_number` varchar(50) DEFAULT NULL,
  `item_type` varchar(50) DEFAULT NULL,
  `item_code` varchar(50) DEFAULT NULL,
  `item_number` varchar(50) DEFAULT NULL,
  `bycatch` varchar(1) DEFAULT NULL,
  `batch_or_lot_number` varchar(50) DEFAULT NULL,
  `quantity` smallint(6) DEFAULT NULL,
  `weight_item` smallint(6) DEFAULT NULL,
  `weight_batch_lot` smallint(6) DEFAULT NULL,
  `product_form_at_landing` varchar(50) DEFAULT NULL,
  `event_date` date DEFAULT NULL,
  `event_time` time DEFAULT NULL,
  `first_freeze_date` date DEFAULT NULL,
  `date_of_departure` date DEFAULT NULL,
  `time_of_departure` time DEFAULT NULL,
  `date_of_return` date DEFAULT NULL,
  `time_of_return` time DEFAULT NULL,
  `origin` varchar(50) DEFAULT NULL,
  `event_location` varchar(50) DEFAULT NULL,
  `product_destination` varchar(50) DEFAULT NULL,
  `vessel_home_port` varchar(50) DEFAULT NULL,
  `event_method` varchar(50) DEFAULT NULL,
  `fad_use` varchar(50) DEFAULT NULL,
  `fad_location` varchar(50) DEFAULT NULL,
  `activity_type` varchar(50) DEFAULT NULL,
  `activity_id` varchar(50) DEFAULT NULL,
  `captain_name` varchar(50) DEFAULT NULL,
  `captain_sex` varchar(1) DEFAULT NULL,
  `captain_id` varchar(50) DEFAULT NULL,
  `captain_nationality` varchar(50) DEFAULT NULL,
  `contract_id` varchar(50) DEFAULT NULL,
  `crew_worker_name` varchar(50) DEFAULT NULL,
  `crew_worker_sex` varchar(1) DEFAULT NULL,
  `crew_worker_id` varchar(50) DEFAULT NULL,
  `crew_worker_nationality` varchar(50) DEFAULT NULL,
  `crew_worker_dob` date DEFAULT NULL,
  `crew_worker_job` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `ltfish`
--

DROP TABLE IF EXISTS `ltfish`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ltfish` (
  `idltfish` int(11) NOT NULL AUTO_INCREMENT,
  `isscaap` tinyint(4) NOT NULL,
  `taxocode` varchar(13) NOT NULL,
  `threea_code` char(3) NOT NULL,
  `scientific_name` varchar(38) NOT NULL,
  `indonesian_name` varchar(32) NOT NULL,
  `english_name` varchar(30) NOT NULL,
  `french_name` varchar(30) NOT NULL,
  `spanish_name` varchar(30) NOT NULL,
  `author` varchar(55) NOT NULL,
  `family` varchar(20) NOT NULL,
  `bio_order` varchar(30) NOT NULL,
  `stats_data` tinyint(1) NOT NULL,
  `lasttransdate` datetime DEFAULT NULL,
  `lasttransact` varchar(1) NOT NULL DEFAULT 'C',
  PRIMARY KEY (`idltfish`),
  KEY `english_name` (`english_name`)
) ENGINE=InnoDB AUTO_INCREMENT=10315 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `ltfishinggear`
--

DROP TABLE IF EXISTS `ltfishinggear`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ltfishinggear` (
  `idltfishinggear` int(11) NOT NULL AUTO_INCREMENT,
  `api_code` varchar(9) NOT NULL,
  `indonesian_name` varchar(48) NOT NULL,
  `english_name` varchar(64) NOT NULL,
  `abbr` varchar(4) NOT NULL,
  PRIMARY KEY (`idltfishinggear`)
) ENGINE=InnoDB AUTO_INCREMENT=75 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `ltfishinggear_temp`
--

DROP TABLE IF EXISTS `ltfishinggear_temp`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ltfishinggear_temp` (
  `idltfishinggear` int(11) NOT NULL,
  `api_code` varchar(9) NOT NULL,
  `indonesian_name` varchar(48) NOT NULL,
  `english_name` varchar(64) NOT NULL,
  `abbr` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `ltgridwpp`
--

DROP TABLE IF EXISTS `ltgridwpp`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ltgridwpp` (
  `idltgridwpp` int(11) NOT NULL AUTO_INCREMENT,
  `grid` char(3) NOT NULL,
  `wpp` int(11) NOT NULL,
  PRIMARY KEY (`idltgridwpp`),
  KEY `grid` (`grid`)
) ENGINE=InnoDB AUTO_INCREMENT=704 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `ltusertype`
--

DROP TABLE IF EXISTS `ltusertype`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ltusertype` (
  `idltusertype` int(11) NOT NULL,
  `usertypename` varchar(32) DEFAULT NULL,
  `desc` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`idltusertype`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `msbuyer`
--

DROP TABLE IF EXISTS `msbuyer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `msbuyer` (
  `idmsbuyer` varchar(32) NOT NULL,
  `idbuyeroffline` varchar(128) DEFAULT NULL,
  `idmssupplier` varchar(32) DEFAULT NULL,
  `name_param` varchar(128) NOT NULL,
  `id_param` varchar(32) DEFAULT NULL,
  `businesslicense_param` varchar(32) DEFAULT NULL,
  `contact_param` varchar(32) DEFAULT NULL,
  `phonenumber_param` varchar(20) NOT NULL,
  `address_param` text DEFAULT NULL,
  `idltusertype` int(11) DEFAULT NULL,
  `sex_param` varchar(1) DEFAULT '1',
  `nationalcode_param` varchar(16) DEFAULT NULL,
  `country_param` varchar(2) DEFAULT NULL,
  `province_param` varchar(32) DEFAULT NULL,
  `city_param` varchar(32) DEFAULT NULL,
  `district_param` varchar(32) DEFAULT NULL,
  `completestreetaddress_param` text DEFAULT NULL,
  `lasttransdate` datetime DEFAULT NULL,
  `lasttransact` varchar(1) DEFAULT 'C',
  `companyname` varchar(64) DEFAULT NULL,
  `businesslicenseexpireddate` date DEFAULT NULL,
  PRIMARY KEY (`idmsbuyer`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `msfish`
--

DROP TABLE IF EXISTS `msfish`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `msfish` (
  `idmsfish` varchar(32) NOT NULL,
  `idfishoffline` varchar(128) NOT NULL,
  `idltfish` int(11) NOT NULL,
  `indname` varchar(128) NOT NULL,
  `localname` varchar(256) DEFAULT NULL,
  `photo` varchar(128) DEFAULT NULL,
  `idmssupplier` varchar(32) NOT NULL,
  `price` double DEFAULT 0,
  `lasttransdate` datetime NOT NULL,
  `lasttransact` varchar(1) NOT NULL COMMENT 'c: create;u:update;d:delete',
  PRIMARY KEY (`idmsfish`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `msfisherman`
--

DROP TABLE IF EXISTS `msfisherman`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `msfisherman` (
  `idmsfisherman` varchar(32) NOT NULL,
  `idfishermanoffline` varchar(128) DEFAULT NULL,
  `id_param` varchar(32) DEFAULT NULL COMMENT 'KTP',
  `sex_param` varchar(1) DEFAULT '0' COMMENT '0:female;1:male;',
  `nat_param` varchar(2) DEFAULT NULL COMMENT 'ex:ID:indonesia;SG:singapore',
  `address_param` text DEFAULT NULL,
  `phone_param` varchar(20) NOT NULL DEFAULT '0',
  `jobtitle_param` varchar(32) DEFAULT NULL,
  `idmssupplier` varchar(32) DEFAULT NULL,
  `idmsuser` varchar(32) DEFAULT NULL,
  `lasttransdate` datetime DEFAULT NULL,
  `lasttransact` varchar(1) DEFAULT 'C',
  `province` varchar(64) DEFAULT NULL,
  `district` varchar(64) DEFAULT NULL,
  `city` varchar(64) DEFAULT NULL,
  `fishermanregnumber` varchar(64) DEFAULT NULL,
  `country` varchar(64) DEFAULT NULL,
  PRIMARY KEY (`idmsfisherman`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `msinfo`
--

DROP TABLE IF EXISTS `msinfo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `msinfo` (
  `idmsinfo` varchar(32) NOT NULL,
  `infodesc` text DEFAULT NULL,
  PRIMARY KEY (`idmsinfo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `msship`
--

DROP TABLE IF EXISTS `msship`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `msship` (
  `idmsship` varchar(32) NOT NULL,
  `idshipoffline` varchar(128) DEFAULT NULL,
  `vesselname_param` varchar(64) NOT NULL,
  `vessellicensenumber_param` varchar(32) DEFAULT NULL,
  `vessellicenseexpiredate_param` date DEFAULT NULL,
  `fishinglicensenumber_param` varchar(32) DEFAULT NULL,
  `fishinglicenseexpiredate_param` date DEFAULT NULL,
  `vesselsize_param` int(11) DEFAULT NULL,
  `vesselflag_param` varchar(2) DEFAULT NULL,
  `vesselgeartype_param` varchar(128) DEFAULT NULL,
  `vesseldatemade_param` date DEFAULT NULL,
  `vesselownername_param` varchar(128) DEFAULT NULL,
  `vesselownerid_param` varchar(32) DEFAULT NULL,
  `vesselownerphone_param` varchar(20) DEFAULT NULL,
  `vesselownersex_param` varchar(1) DEFAULT NULL,
  `vesselownerdob_param` date DEFAULT NULL,
  `vesselowneraddress_param` text DEFAULT NULL,
  `idmsuserparam` varchar(32) DEFAULT NULL,
  `lasttransdate` datetime DEFAULT NULL,
  `lasttransact` varchar(1) DEFAULT NULL,
  `vesselownerprovince_param` varchar(32) DEFAULT NULL,
  `vesselownerdistrict_param` varchar(32) DEFAULT NULL,
  `vesselownercity_param` varchar(32) DEFAULT NULL,
  `vesselownercountry_param` varchar(32) DEFAULT NULL,
  `vessel_id` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`idmsship`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `mssupplier`
--

DROP TABLE IF EXISTS `mssupplier`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mssupplier` (
  `idmssupplier` varchar(32) CHARACTER SET latin1 NOT NULL,
  `idmsuser` varchar(128) CHARACTER SET latin1 DEFAULT NULL,
  `suppliernatid` varchar(3) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Kode Negara: ID, SG',
  `supplierid` varchar(128) DEFAULT NULL COMMENT 'supplier id',
  `lasttransdate` datetime DEFAULT NULL,
  `lasttransact` varchar(1) CHARACTER SET latin1 DEFAULT NULL,
  `genre` varchar(1) DEFAULT NULL,
  `address` varchar(128) DEFAULT NULL,
  `businesslicense` varchar(128) DEFAULT NULL,
  `personalidcard` varchar(64) DEFAULT NULL COMMENT 'KTP',
  `province` varchar(64) DEFAULT NULL,
  `city` varchar(64) DEFAULT NULL,
  `district` varchar(64) DEFAULT NULL,
  `supplieridexpiredlicensedate` date DEFAULT NULL,
  PRIMARY KEY (`idmssupplier`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `mssupplierofficer`
--

DROP TABLE IF EXISTS `mssupplierofficer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mssupplierofficer` (
  `idmssupplierofficer` varchar(32) CHARACTER SET latin1 NOT NULL,
  `idmssupplier` varchar(32) CHARACTER SET latin1 DEFAULT NULL,
  `idmsuser` varchar(32) CHARACTER SET latin1 DEFAULT NULL,
  `accesspage` varchar(10) DEFAULT NULL,
  `accessrole` varchar(32) DEFAULT NULL,
  `lasttransdate` datetime DEFAULT NULL,
  `lasttransact` varchar(1) CHARACTER SET latin1 DEFAULT 'C',
  PRIMARY KEY (`idmssupplierofficer`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `mssuppliertemp`
--

DROP TABLE IF EXISTS `mssuppliertemp`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mssuppliertemp` (
  `idmssuppliertemp` varchar(32) NOT NULL,
  `name` varchar(128) DEFAULT NULL,
  `username` varchar(128) DEFAULT NULL,
  `email` varchar(128) DEFAULT NULL,
  `phonenumber` varchar(16) DEFAULT NULL,
  `supplierid` varchar(10) DEFAULT NULL,
  `password` varchar(128) DEFAULT NULL,
  `natidtype` varchar(2) DEFAULT NULL,
  `lang` varchar(2) DEFAULT NULL,
  `lasttransdate` datetime DEFAULT NULL,
  `lasttransact` varchar(1) DEFAULT 'C',
  `acceptdate` datetime DEFAULT NULL,
  `genre` varchar(1) DEFAULT '0',
  `address` varchar(128) DEFAULT NULL,
  `city` varchar(64) DEFAULT NULL,
  `district` varchar(64) DEFAULT NULL,
  `province` varchar(64) DEFAULT NULL,
  `businesslicense` varchar(64) DEFAULT NULL,
  `personalidcard` varchar(64) DEFAULT NULL,
  `supplieridexpiredlicensedate` date DEFAULT NULL,
  PRIMARY KEY (`idmssuppliertemp`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `mstypeitemloan`
--

DROP TABLE IF EXISTS `mstypeitemloan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mstypeitemloan` (
  `idmstypeitemloan` varchar(32) DEFAULT NULL,
  `idmstypeitemloanoffline` varchar(128) DEFAULT NULL,
  `typename` varchar(32) DEFAULT NULL,
  `unit` varchar(32) DEFAULT NULL,
  `priceperunit` float DEFAULT NULL,
  `idmssupplier` varchar(32) DEFAULT NULL,
  `lasttransdate` datetime DEFAULT NULL,
  `lasttransact` varchar(1) DEFAULT 'C',
  `idmsusercreator` varchar(32) DEFAULT NULL,
  `idmsuserlasttrans` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `msuser`
--

DROP TABLE IF EXISTS `msuser`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `msuser` (
  `idmsuser` varchar(32) CHARACTER SET latin1 NOT NULL,
  `name` varchar(128) CHARACTER SET latin1 DEFAULT NULL,
  `id` int(11) DEFAULT NULL,
  `bod` datetime DEFAULT NULL,
  `idltusertype` int(11) DEFAULT NULL,
  `lasttransdate` datetime DEFAULT NULL,
  `lasttransact` varchar(1) CHARACTER SET latin1 DEFAULT NULL COMMENT 'C: fresh create; U: update; D: Delete',
  `active` int(11) DEFAULT 1 COMMENT '1: active; 0:non-active',
  `defaultlanguage` varchar(2) CHARACTER SET latin1 DEFAULT 'en',
  PRIMARY KEY (`idmsuser`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `msuserqrcode`
--

DROP TABLE IF EXISTS `msuserqrcode`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `msuserqrcode` (
  `idmsuserqrcode` varchar(32) NOT NULL,
  `uniquecode` varchar(32) DEFAULT NULL,
  `datepost` datetime DEFAULT NULL,
  `statuspost` varchar(1) DEFAULT '0',
  `email` varchar(128) DEFAULT NULL,
  `password` varchar(128) DEFAULT NULL,
  `lasttransdate` datetime DEFAULT NULL,
  `lasttransact` varchar(1) DEFAULT 'C',
  PRIMARY KEY (`idmsuserqrcode`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `trbatchdeliverysheet`
--

DROP TABLE IF EXISTS `trbatchdeliverysheet`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `trbatchdeliverysheet` (
  `idtrbatchdeliverysheet` varchar(32) NOT NULL,
  `deliverysheetno` varchar(128) DEFAULT NULL,
  `nationalregistrationsuppliercode` varchar(32) DEFAULT NULL,
  `suppliername` varchar(64) DEFAULT NULL,
  `idmssupplier` varchar(32) DEFAULT NULL,
  `deliverydate` date DEFAULT NULL,
  `numberoffishorloin` int(11) DEFAULT NULL,
  `totalweight` float DEFAULT NULL,
  `sellprice` float DEFAULT NULL,
  `notes` text DEFAULT NULL,
  `buyerid` varchar(128) DEFAULT NULL,
  `buyername` varchar(128) DEFAULT NULL,
  `lasttransdate` datetime DEFAULT NULL,
  `lasttransact` varchar(1) DEFAULT 'C',
  `idmsusercreator` varchar(32) DEFAULT NULL,
  `idmsuserlasttrans` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`idtrbatchdeliverysheet`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `trbatchdeliverysheetfishdata`
--

DROP TABLE IF EXISTS `trbatchdeliverysheetfishdata`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `trbatchdeliverysheetfishdata` (
  `idtrbatchdeliverysheetfishdata` varchar(32) NOT NULL,
  `deliverysheetno` varchar(32) DEFAULT NULL,
  `idtrfishcatch` varchar(32) DEFAULT NULL,
  `idtrfishcatchoffline` varchar(64) DEFAULT NULL,
  `amount` float DEFAULT NULL,
  `grade` varchar(32) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `idfish` varchar(32) DEFAULT NULL,
  `idtrcatchoffline` varchar(128) DEFAULT NULL,
  `fishnameeng` varchar(64) DEFAULT NULL,
  `fishnameind` varchar(64) DEFAULT NULL,
  `unitname` varchar(32) DEFAULT NULL,
  `species` varchar(64) DEFAULT NULL,
  `vesselname` varchar(32) DEFAULT NULL,
  `vesselsize` float DEFAULT NULL,
  `vesselregistrationno` varchar(32) DEFAULT NULL,
  `expireddate` date DEFAULT NULL,
  `vesselflag` varchar(3) DEFAULT NULL,
  `fishingground` varchar(32) DEFAULT NULL,
  `landingsite` varchar(32) DEFAULT NULL,
  `geartype` varchar(64) DEFAULT NULL,
  `catchdate` date DEFAULT NULL,
  `fishermanname` varchar(64) DEFAULT NULL,
  `landingdate` date DEFAULT NULL,
  `fadused` varchar(32) DEFAULT NULL,
  `sellprice` float DEFAULT NULL,
  `lasttransdate` datetime DEFAULT NULL,
  `lasttransact` varchar(1) DEFAULT NULL,
  `idmsusercreator` varchar(32) DEFAULT NULL,
  `idmsuserlasttrans` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`idtrbatchdeliverysheetfishdata`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `trcatch`
--

DROP TABLE IF EXISTS `trcatch`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `trcatch` (
  `idtrcatch` varchar(32) NOT NULL,
  `idtrcatchoffline` varchar(128) DEFAULT NULL,
  `idmssupplier` varchar(32) DEFAULT NULL,
  `idmsfisherman` varchar(32) DEFAULT NULL,
  `idmsbuyersupplier` varchar(32) DEFAULT NULL,
  `idmsship` varchar(32) DEFAULT NULL,
  `idmsfish` varchar(32) NOT NULL,
  `purchasedate` date NOT NULL,
  `purchasetime` time DEFAULT NULL,
  `catchorfarmed` varchar(10) NOT NULL DEFAULT 'catch',
  `bycatch` varchar(1) NOT NULL DEFAULT '0',
  `fadused` varchar(1) DEFAULT '0',
  `purchaseuniqueno` varchar(32) DEFAULT NULL,
  `productformatlanding` varchar(10) NOT NULL DEFAULT 'whole',
  `unitmeasurement` varchar(10) DEFAULT 'whole',
  `quantity` float NOT NULL,
  `weight` float NOT NULL,
  `fishinggroundarea` varchar(10) NOT NULL,
  `purchaselocation` varchar(32) DEFAULT NULL,
  `uniquetripid` varchar(32) DEFAULT NULL,
  `datetimevesseldeparture` datetime NOT NULL,
  `datetimevesselreturn` datetime NOT NULL,
  `portname` varchar(32) DEFAULT NULL,
  `priceperkg` double DEFAULT NULL,
  `totalprice` double DEFAULT NULL,
  `loanexpense` double DEFAULT NULL,
  `otherexpense` double DEFAULT NULL,
  `postdate` datetime DEFAULT NULL,
  `sendtobuyerdate` datetime DEFAULT NULL,
  `lasttransdate` datetime DEFAULT NULL,
  `lasttransact` varchar(1) DEFAULT 'C',
  `idfishermanoffline` varchar(128) DEFAULT NULL,
  `idbuyeroffline` varchar(128) DEFAULT NULL,
  `idshipoffline` varchar(128) DEFAULT NULL,
  `idfishoffline` varchar(128) DEFAULT NULL,
  `closeparam` varchar(1) NOT NULL DEFAULT '0' COMMENT '0: not Close;1:Close',
  `idmsusercreator` varchar(32) DEFAULT NULL,
  `idmsuserlasttrans` varchar(32) DEFAULT NULL,
  `idltfishinggear` int(11) DEFAULT NULL,
  `notes` text DEFAULT NULL,
  `fishermanname2` varchar(191) DEFAULT NULL,
  `fishermanid` varchar(64) DEFAULT NULL,
  `fishermanregnumber` varchar(64) DEFAULT NULL,
  PRIMARY KEY (`idtrcatch`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `trdelivery`
--

DROP TABLE IF EXISTS `trdelivery`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `trdelivery` (
  `idtrdelivery` varchar(32) NOT NULL,
  `iddeliveryoffline` varchar(128) DEFAULT NULL,
  `idtrcatch` varchar(128) DEFAULT NULL,
  `idtrfishcatch` varchar(32) DEFAULT NULL,
  `idmsbuyer` varchar(32) DEFAULT NULL,
  `totalprice` double DEFAULT NULL,
  `deliverydate` datetime NOT NULL,
  `transportby` varchar(10) DEFAULT NULL,
  `transportnameid` varchar(128) DEFAULT NULL,
  `transportreceipt` varchar(64) DEFAULT NULL,
  `descparam` text DEFAULT NULL,
  `idmssupplier` varchar(32) DEFAULT NULL,
  `deliverysheetofflineid` text DEFAULT NULL,
  `lasttransdate` datetime DEFAULT NULL,
  `lasttransact` varchar(1) DEFAULT 'C',
  `idmsusercreator` varchar(32) DEFAULT NULL,
  `idmsuserlasttrans` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`idtrdelivery`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `trdeliverysheet`
--

DROP TABLE IF EXISTS `trdeliverysheet`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `trdeliverysheet` (
  `idtrdeliverysheetno` varchar(32) NOT NULL,
  `deliverysheetofflineid` text DEFAULT NULL,
  `savedtext` longtext DEFAULT NULL,
  `lasttransdate` datetime DEFAULT NULL,
  `lasttransact` varchar(1) DEFAULT NULL,
  PRIMARY KEY (`idtrdeliverysheetno`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `trfishcatch`
--

DROP TABLE IF EXISTS `trfishcatch`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `trfishcatch` (
  `idtrfishcatch` varchar(32) NOT NULL,
  `idtrcatchoffline` varchar(128) DEFAULT NULL,
  `idtrfishcatchoffline` varchar(128) DEFAULT NULL,
  `amount` float DEFAULT NULL,
  `grade` varchar(5) DEFAULT NULL,
  `description` varchar(128) DEFAULT NULL,
  `idfish` varchar(32) DEFAULT NULL,
  `iddeliveryoffline` varchar(128) DEFAULT NULL,
  `sendtobuyerdate` datetime DEFAULT NULL,
  `lasttransdate` datetime DEFAULT NULL,
  `lasttransact` varchar(1) DEFAULT 'C',
  `idmsusercreator` varchar(32) DEFAULT NULL,
  `idmsuserlasttrans` varchar(32) DEFAULT NULL,
  `upline` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`idtrfishcatch`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `trloan`
--

DROP TABLE IF EXISTS `trloan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `trloan` (
  `idtrloan` varchar(32) NOT NULL,
  `idloanoffline` varchar(128) DEFAULT NULL,
  `descloan` text DEFAULT NULL,
  `loaninrp` double DEFAULT NULL,
  `idmsuserloan` varchar(32) DEFAULT NULL,
  `idmsbuyerloan` varchar(32) DEFAULT NULL,
  `idmssupplier` varchar(32) DEFAULT NULL,
  `loandate` datetime DEFAULT NULL,
  `loaneridmsuserofficer` varchar(32) DEFAULT NULL,
  `paidoffdate` datetime DEFAULT NULL,
  `paidoffidmsuserofficer` varchar(32) DEFAULT NULL,
  `lasttransdate` datetime DEFAULT NULL,
  `lasttransact` varchar(1) DEFAULT 'C',
  `idmsusercreator` varchar(32) DEFAULT NULL,
  `idmsuserlasttrans` varchar(32) DEFAULT NULL,
  `idmstypeitemloanoffline` varchar(128) DEFAULT NULL,
  `unit` varchar(32) DEFAULT NULL,
  `priceperunit` float DEFAULT NULL,
  `idfishermanoffline` varchar(128) DEFAULT NULL,
  `idbuyeroffline` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`idtrloan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `trpayloan`
--

DROP TABLE IF EXISTS `trpayloan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `trpayloan` (
  `idtrpayloan` varchar(32) NOT NULL,
  `idpayloanoffline` varchar(128) DEFAULT NULL,
  `idmsuserloan` varchar(32) DEFAULT NULL,
  `idmsbuyerloan` varchar(32) DEFAULT NULL,
  `idmssupplier` varchar(32) DEFAULT NULL,
  `idtrloan` varchar(32) DEFAULT NULL,
  `descloan` text DEFAULT NULL,
  `loaninrp` double DEFAULT NULL,
  `paidoffdate` datetime DEFAULT NULL,
  `paidoffidmsuserofficer` varchar(32) DEFAULT NULL,
  `lasttransdate` datetime DEFAULT NULL,
  `lasttransact` varchar(1) DEFAULT 'C',
  `idmsusercreator` varchar(32) DEFAULT NULL,
  `idmsuserlasttrans` varchar(32) DEFAULT NULL,
  `idfishermanoffline` varchar(128) DEFAULT NULL,
  `idbuyeroffline` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`idtrpayloan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `trsession`
--

DROP TABLE IF EXISTS `trsession`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `trsession` (
  `idtrsession` varchar(10) CHARACTER SET latin1 NOT NULL,
  `sessionguid` varchar(64) CHARACTER SET latin1 DEFAULT NULL,
  `idmsuser` varchar(10) CHARACTER SET latin1 DEFAULT NULL,
  `transdate` datetime DEFAULT NULL,
  PRIMARY KEY (`idtrsession`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `trsyncdata`
--

DROP TABLE IF EXISTS `trsyncdata`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `trsyncdata` (
  `idtrssyncdata` varchar(32) NOT NULL,
  `synctype` varchar(7) DEFAULT NULL,
  `functiontype` varchar(20) DEFAULT NULL,
  `functionname` varchar(64) DEFAULT NULL,
  `param` longtext DEFAULT NULL,
  `descdata` longtext DEFAULT NULL,
  `transdate` datetime DEFAULT NULL,
  `idmsuser` varchar(32) DEFAULT NULL,
  `idtrsyncjson` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`idtrssyncdata`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `trsyncfailed`
--

DROP TABLE IF EXISTS `trsyncfailed`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `trsyncfailed` (
  `idtrsyncfailed` varchar(128) NOT NULL,
  `idmsuser` varchar(128) DEFAULT NULL,
  `jsondata` longtext DEFAULT NULL,
  `idtrsyncjson` varchar(128) DEFAULT NULL,
  `functionname` varchar(128) DEFAULT NULL,
  `functionindex` int(11) NOT NULL DEFAULT 0,
  `texterr` longtext DEFAULT NULL,
  `lasttransdate` datetime DEFAULT NULL,
  PRIMARY KEY (`idtrsyncfailed`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `trsyncjson`
--

DROP TABLE IF EXISTS `trsyncjson`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `trsyncjson` (
  `idtrsyncjson` varchar(32) NOT NULL,
  `idmsuser` varchar(32) DEFAULT NULL,
  `data` longtext DEFAULT NULL,
  `transdate` datetime DEFAULT NULL,
  PRIMARY KEY (`idtrsyncjson`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) CHARACTER SET utf8mb4 NOT NULL,
  `email` varchar(191) CHARACTER SET utf8mb4 NOT NULL,
  `username` varchar(191) CHARACTER SET utf8mb4 NOT NULL,
  `phonenumber` varchar(191) CHARACTER SET utf8mb4 NOT NULL,
  `password` varchar(191) CHARACTER SET utf8mb4 NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  UNIQUE KEY `users_username_unique` (`username`),
  UNIQUE KEY `users_phonenumber_unique` (`phonenumber`)
) ENGINE=InnoDB AUTO_INCREMENT=180 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping routines for database 'trafiz'
--
/*!50003 DROP FUNCTION IF EXISTS `createidfish` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` FUNCTION `createidfish`(`juliandate` VARCHAR(7), `idtrcatchofflineparam` VARCHAR(128)) RETURNS varchar(24) CHARSET utf8
BEGIN
	DECLARE returnValue VARCHAR(24);

	declare countcatch varchar(3);
	DECLARE countfishcatch VARCHAR(3);
	DECLARE randomCode VARCHAR(3);
	
	DECLARE idmssupplierparam VARCHAR(32);
	DECLARE supplieridparam VARCHAR(6);
	
	set idmssupplierparam = (SELECT idmssupplier
					FROM trcatch
					WHERE idtrcatchoffline = idtrcatchofflineparam
					limit 1);
	SET supplieridparam = (SELECT supplierid
					FROM mssupplier
					WHERE idmssupplier = idmssupplierparam
					limit 1);
	
	set countcatch = (SELECT COUNT(idtrcatch) + 1
				FROM trcatch
				WHERE idmssupplier = idmssupplierparam);
	SET countfishcatch = (SELECT 	COUNT(idtrfishcatch) + 1
					FROM trfishcatch
					WHERE idtrcatchoffline = idtrcatchofflineparam);
	set randomCode = (SELECT CONCAT(SUBSTRING('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789', RAND()*62+1, 1),
				      SUBSTRING('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789', RAND()*62+1, 1),
				      SUBSTRING('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789', RAND()*62+1, 1)
				     ));
	set countcatch = (select right( concat('00', countcatch), 2));
	SET countfishcatch = (SELECT RIGHT( CONCAT('00', countfishcatch), 2));
	SET returnValue = (select concat(coalesce(supplieridparam, ''), '-',
					COALESCE(juliandate, ''), '-',
					COALESCE(countcatch, ''), '-',
					COALESCE(countfishcatch, ''),  '-',
					COALESCE(randomCode, ''))
			);
	RETURN (returnValue);
    END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP FUNCTION IF EXISTS `createidfishv2` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` FUNCTION `createidfishv2`() RETURNS varchar(24) CHARSET latin1
BEGIN
	DECLARE returnValue VARCHAR(24);
	SET returnValue = (SELECT (CONV(ROUND(UNIX_TIMESTAMP(NOW(2)) * 10), 10, 36)));
	SET returnValue = (SELECT (CONCAT("000", returnValue)));
	SET returnValue = (SELECT (RIGHT(returnValue, 8)));
	RETURN (returnValue);
    END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP FUNCTION IF EXISTS `getdeliverysheetbyiddelivery` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` FUNCTION `getdeliverysheetbyiddelivery`(idparam VARCHAR(32)) RETURNS text CHARSET latin1
BEGIN
	DECLARE returnValue TEXT;
	SET returnValue = (SELECT	CONCAT(COALESCE(a.idtrdelivery,''), ';', COALESCE(supplierid, ''), ';', COALESCE(DATE_FORMAT(deliverydate, "%y-%m-%d"), ''), '#',
					COALESCE(threea_code, ''), ';', COALESCE(quantity, ''), ' ', COALESCE(productformatlanding, ''), ';', COALESCE(weight, ''), '#',
					COALESCE(vesselname_param, ''), ';', COALESCE(vesselsize_param, ''), ';', COALESCE(vessellicensenumber_param, ''), ';', 
					COALESCE(DATE_FORMAT(vessellicenseexpiredate_param, "%y-%m-%d"), ''), ';', COALESCE(vesselflag_param, ''), ';', COALESCE(fishinggroundarea, ''),';', COALESCE(portname, ''), ';', 
					COALESCE(vesselgeartype_param, ''), ';', COALESCE(DATE_FORMAT(b.postdate, "%y-%m-%d"), ''), ';')
					FROM
					(SELECT	*,
						CASE WHEN a.idtrcatch IS NOT NULL THEN a.idtrcatch
						WHEN a.idtrfishcatch IS NOT NULL THEN getidtrcatchbyidtrfishcatch(a.idtrfishcatch) END AS idtrcatch1
						FROM trdelivery a
						WHERE idtrdelivery = idparam
					) a
					JOIN trcatch b
						ON a.idtrcatch1 = b.idtrcatch
					JOIN msfish c
						ON b.idmsfish = c.idmsfish
					JOIN ltfish d
						ON c.idltfish = d.idltfish
					JOIN msship e
						ON b.idmsship = e.idmsship
					JOIN mssupplier f
						ON a.idmssupplier = f.idmssupplier
			);
	RETURN (returnValue);
    END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP FUNCTION IF EXISTS `getfishnamebyidtrcatch` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` FUNCTION `getfishnamebyidtrcatch`(idparam VARCHAR(32)) RETURNS varchar(128) CHARSET utf8
BEGIN
	DECLARE returnValue VARCHAR(128);
	SET returnValue = (SELECT CONCAT(b.indname, '-', c.english_name, '-', c.threea_code) AS namefish
				FROM trcatch a
				JOIN msfish b
					ON a.idmsfish = b.idmsfish
				JOIN ltfish c
					ON b.idltfish = c.idltfish
				WHERE idtrcatch = idparam);
	RETURN (returnValue);
    END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP FUNCTION IF EXISTS `getfishnamebyidtrfishcatch` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` FUNCTION `getfishnamebyidtrfishcatch`(idparam VARCHAR(32)) RETURNS varchar(128) CHARSET utf8
BEGIN
	DECLARE returnValue VARCHAR(128);
	SET returnValue = (SELECT CONCAT(b.indname, '-', c.english_name, '-', c.threea_code) AS namefish
				FROM trfishcatch a
				JOIN trcatch a1
					ON a.idtrcatchoffline = a1.idtrcatchoffline
				JOIN msfish b
					ON a1.idmsfish = b.idmsfish
				JOIN ltfish c
					ON b.idltfish = c.idltfish
				WHERE idtrfishcatch = idparam);
	RETURN (returnValue);
    END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP FUNCTION IF EXISTS `getidmsuserfisherman` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` FUNCTION `getidmsuserfisherman`(idparam varchar(32)) RETURNS varchar(128) CHARSET latin1
BEGIN
	DECLARE returnValue VARCHAR(32);
	SET returnValue = (SELECT 	a.idmsuser
					FROM msfisherman a
					WHERE a.idmsfisherman = idparam);
	RETURN (returnValue);
    END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP FUNCTION IF EXISTS `getidsupplierbossbyidmsuser` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` FUNCTION `getidsupplierbossbyidmsuser`(idparam varchar(32)) RETURNS varchar(32) CHARSET latin1
BEGIN
	DECLARE returnValue VARCHAR(32);
	SET returnValue = (SELECT 	d.idmsuser
				FROM	
				(
					SELECT 	idmssupplier, idmsuser
						FROM mssupplier a
						WHERE idmsuser = idparam
					UNION
					SELECT idmssupplier, idmsuser
						FROM mssupplierofficer b
						WHERE idmsuser = idparam
				) c
				join mssupplier d
				on c.idmssupplier = d.idmssupplier
				limit 1
			);
	RETURN (returnValue);
    END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP FUNCTION IF EXISTS `getidtrcatchbyidtrfishcatch` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` FUNCTION `getidtrcatchbyidtrfishcatch`(idparam VARCHAR(32)) RETURNS varchar(128) CHARSET utf8
BEGIN
	DECLARE returnValue VARCHAR(128);
	SET returnValue = (SELECT a1.idtrcatch
				FROM trfishcatch a
				JOIN trcatch a1
					ON a.idtrcatchoffline = a1.idtrcatchoffline
				WHERE idtrfishcatch = idparam);
	RETURN (returnValue);
    END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP FUNCTION IF EXISTS `getkdereqeunull` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` FUNCTION `getkdereqeunull`(idparam varchar(32)) RETURNS int(11)
BEGIN
	DECLARE returnValue int;
	SET returnValue = (SELECT ISNULL(owner_id) + ISNULL(owner_phone) + ISNULL(vessel_name) +
				ISNULL(vessel_flag) + ISNULL(vessel_id) + ISNULL(item_type) +
				ISNULL(item_code) + ISNULL(bycatch) + ISNULL(quantity) +
				ISNULL(event_date) + ISNULL(event_location) + ISNULL(fad_use) +
				ISNULL(fad_location) + ISNULL(captain_name) + ISNULL(captain_id) AS counter
				FROM kdeusaid
				WHERE idtrcatch = idparam);
	if(returnValue is null) then
		set returnValue = 99;
	end if;
	RETURN (returnValue);
    END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP FUNCTION IF EXISTS `getkdereqidnull` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` FUNCTION `getkdereqidnull`(idparam varchar(32)) RETURNS int(11)
BEGIN
	DECLARE returnValue int;
	SET returnValue = (SELECT ISNULL(company_org_name) + ISNULL(company_owner_name) +
				ISNULL(company_owner_sex) + ISNULL(company_license_id) + ISNULL(company_license_expiration_date) +
				ISNULL(company_address) + ISNULL(company_phone) + ISNULL(consignee) +
				ISNULL(sex) + ISNULL(vessel_name) + ISNULL(vessel_size) +
				ISNULL(vessel_length) + ISNULL(vessel_flag) + ISNULL(vessel_transmitter_id) +
				ISNULL(vessel_register_id) + ISNULL(vessel_radio_register_id) + ISNULL(catch_or_farm) +
				ISNULL(by_catch) + ISNULL(catch_id) + ISNULL(species_caught) +
				ISNULL(scientific_name) + ISNULL(asfis_or_product_code) + ISNULL(batch_or_lot_smallint) +
				ISNULL(total_weight_of_batch) + ISNULL(product_form_at_landing) + ISNULL(quantity) +
				ISNULL(total_weight_of_species) + ISNULL(catch_date) + ISNULL(number_of_trip) +
				ISNULL(catch_time) + ISNULL(year_of_departure) + ISNULL(date_of_departure) +
				ISNULL(time_of_departure) + ISNULL(date_of_return) + ISNULL(time_of_return) +
				ISNULL(fishing_gear_start_setting_time) + ISNULL(fishing_gear_end_setting_time) + ISNULL(hook_setting_time) +
				ISNULL(number_of_hook) + ISNULL(distance_between_hook) + ISNULL(vessel_port_of_departure) +
				ISNULL(point_of_catch) + ISNULL(product_destination) + ISNULL(vessel_landing_port) +
				ISNULL(gear_type) + ISNULL(indonesia_wpp_catch_area) + ISNULL(indonesia_local_sea_name) +
				ISNULL(catch_area_fad_used) + ISNULL(lead_document_type) + ISNULL(lead_document_id) +
				ISNULL(captain_name) + ISNULL(captain_sex) + ISNULL(captain_personal_identification) +
				ISNULL(captain_nationality) + ISNULL(crew_name) + ISNULL(crew_sex) +
				ISNULL(crew_personal_id) + ISNULL(crew_job) + ISNULL(crew_nationality) +
				ISNULL(crew_date_of_birth) + ISNULL(total_indonesia_crew) + ISNULL(total_foreign_crew) +
				ISNULL(captain_node) AS counter
				FROM kdeindo
				WHERE idtrcatch = idparam);
	if(returnValue is null) then
		set returnValue = 99;
	end if;
	RETURN (returnValue);
    END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP FUNCTION IF EXISTS `getkderequsaidnull` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` FUNCTION `getkderequsaidnull`(idparam varchar(32)) RETURNS int(11)
BEGIN
	DECLARE returnValue int;
	SET returnValue = (SELECT ISNULL(event_owner) + ISNULL(owner_name) + ISNULL(owner_sex) +
				ISNULL(owner_id) + ISNULL(owner_address) + ISNULL(owner_phone) +
				ISNULL(trading_partner) + ISNULL(trading_partner_sex) + ISNULL(vessel_name) +
				ISNULL(vessel_flag) + ISNULL(vessel_id) + ISNULL(event_type) +
				ISNULL(item_type) + ISNULL(item_code) + ISNULL(bycatch) +
				ISNULL(batch_or_lot_number) + ISNULL(quantity) + ISNULL(weight_item) +
				ISNULL(weight_batch_lot) + ISNULL(event_date) + ISNULL(event_time) +
				ISNULL(first_freeze_date) + ISNULL(date_of_departure) + ISNULL(time_of_departure) +
				ISNULL(date_of_return) + ISNULL(time_of_return) + ISNULL(origin) +
				ISNULL(event_location) + ISNULL(product_destination) + ISNULL(vessel_home_port) +
				ISNULL(event_method) + ISNULL(fad_use) + ISNULL(fad_location) +
				ISNULL(activity_type) + ISNULL(activity_id) + ISNULL(captain_name) +
				ISNULL(captain_sex) + ISNULL(captain_id) + ISNULL(captain_nationality) +
				ISNULL(contract_id) + ISNULL(crew_worker_name) + ISNULL(crew_worker_sex) +
				ISNULL(crew_worker_id) + ISNULL(crew_worker_nationality) + ISNULL(crew_worker_dob) +
				ISNULL(crew_worker_job) AS counter
				FROM kdeusaid
				WHERE idtrcatch = idparam);
	IF(returnValue IS NULL) THEN
		SET returnValue = 99;
	END IF;
	RETURN (returnValue);
    END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP FUNCTION IF EXISTS `getkderequsnull` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` FUNCTION `getkderequsnull`(idparam varchar(32)) RETURNS int(11)
BEGIN
	DECLARE returnValue int;
	SET returnValue = (SELECT ISNULL(owner_id) + ISNULL(owner_address) + ISNULL(vessel_name) +
				ISNULL(vessel_flag) + ISNULL(vessel_id) + ISNULL(event_type) +
				ISNULL(event_number) + ISNULL(item_type) + ISNULL(item_code) +
				ISNULL(item_number) + ISNULL(quantity) + ISNULL(product_form_at_landing) +
				ISNULL(date_of_return) + ISNULL(event_location) + ISNULL(product_destination) +
				ISNULL(event_method) AS counter
				FROM kdeusaid
				WHERE idtrcatch = idparam);
	IF(returnValue IS NULL) THEN
		SET returnValue = 99;
	END IF;
	RETURN (returnValue);
    END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP FUNCTION IF EXISTS `getloanbyidmssuppliernidmsbuyer` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` FUNCTION `getloanbyidmssuppliernidmsbuyer`(idmssupplierparam varchar(32), idmsbuyerparam varchar(32)) RETURNS double
BEGIN
	DECLARE returnValue DOUBLE;
	SET returnValue = (SELECT SUM(loaninrp)
				FROM trloan
				WHERE idmssupplier = idmssupplierparam AND
				idmsbuyerloan = idmsbuyerparam and lasttransact <> 'D');
	if(returnValue is null) then
		set returnValue = 0;
	end if;
	RETURN (returnValue);
    END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP FUNCTION IF EXISTS `getloanbyidmssuppliernidmsuser` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` FUNCTION `getloanbyidmssuppliernidmsuser`(idmssupplierparam varchar(32), idmsuserparam varchar(32)) RETURNS double
BEGIN
	DECLARE returnValue DOUBLE;
	SET returnValue = (SELECT SUM(loaninrp)
				FROM trloan
				WHERE idmssupplier = idmssupplierparam AND
				idmsuserloan = idmsuserparam and lasttransact <> 'D');
	if(returnValue is null) then
		set returnValue = 0;
	end if;
	RETURN (returnValue);
    END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP FUNCTION IF EXISTS `getnamebuyer` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` FUNCTION `getnamebuyer`(idparam varchar(32)) RETURNS varchar(128) CHARSET latin1
BEGIN
	DECLARE returnValue VARCHAR(128);
	SET returnValue = (SELECT 	a.name_param
					from msbuyer a
					WHERE a.idmsbuyer = idparam);
	RETURN (returnValue);
    END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP FUNCTION IF EXISTS `getnamebuyeroffline` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` FUNCTION `getnamebuyeroffline`(idparam VARCHAR(128)) RETURNS varchar(128) CHARSET latin1
BEGIN
	DECLARE returnValue VARCHAR(128);
	SET returnValue = (SELECT 	a.name_param
					FROM msbuyer a
					WHERE a.idbuyeroffline = idparam);
	RETURN (returnValue);
    END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP FUNCTION IF EXISTS `getnamefisherman` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` FUNCTION `getnamefisherman`(idparam varchar(32)) RETURNS varchar(128) CHARSET latin1
BEGIN
	DECLARE returnValue VARCHAR(128);
	SET returnValue = (SELECT 	b.name
					FROM msfisherman a
					LEFT JOIN msuser b
					ON a.idmsuser = b.idmsuser
					WHERE a.idmsfisherman = idparam);
	RETURN (returnValue);
    END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP FUNCTION IF EXISTS `getnamefishermanoffline` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` FUNCTION `getnamefishermanoffline`(`idparam` VARCHAR(128)) RETURNS varchar(128) CHARSET utf8
BEGIN
	DECLARE returnValue VARCHAR(128);
	SET returnValue = (SELECT 	b.name
					FROM msfisherman a
					LEFT JOIN msuser b
					ON a.idmsuser = b.idmsuser
					WHERE a.idfishermanoffline = idparam and a.lasttransact <> 'D' and b.lasttransact <> 'D' limit 1);
	RETURN (returnValue);
    END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP FUNCTION IF EXISTS `getnameship` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` FUNCTION `getnameship`(idparam VARCHAR(32)) RETURNS varchar(128) CHARSET latin1
BEGIN
	DECLARE returnValue VARCHAR(128);
	SET returnValue = (SELECT 	a.vesselname_param
					FROM msship a
					WHERE a.idmsship = idparam);
	RETURN (returnValue);
    END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP FUNCTION IF EXISTS `getnamesupplier` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` FUNCTION `getnamesupplier`(idparam varchar(32)) RETURNS varchar(128) CHARSET latin1
BEGIN
	DECLARE returnValue VARCHAR(128);
	SET returnValue = (SELECT 	b.name
					FROM mssupplier a
					LEFT JOIN msuser b
					ON a.idmsuser = b.idmsuser
					WHERE a.idmssupplier = idparam);
	RETURN (returnValue);
    END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP FUNCTION IF EXISTS `getnameuser` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` FUNCTION `getnameuser`(idparam varchar(32)) RETURNS varchar(128) CHARSET latin1
BEGIN
	DECLARE returnValue VARCHAR(128);
	SET returnValue = (SELECT 	a.name
					from msuser a
					WHERE a.idmsuser = idparam);
	RETURN (returnValue);
    END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP FUNCTION IF EXISTS `getnewidmssupplier` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` FUNCTION `getnewidmssupplier`() RETURNS varchar(10) CHARSET latin1
BEGIN
	DECLARE returnValue VARCHAR(10);
	DECLARE counter INT;
	DECLARE yearmonth VARCHAR(4);
	SET yearmonth = (SELECT 	CONCAT (RIGHT(YEAR(NOW()), 2),
						RIGHT(CONCAT ('0', MONTH(NOW())), 2)
						)
			);
	SET counter = (SELECT COUNT(*) FROM mssupplier WHERE idmssupplier LIKE CONCAT(yearmonth,"%"));
	IF(counter = 0) THEN
	SET returnValue = (SELECT 	CONCAT (yearmonth, 
					'000001') 
					);
	ELSE 
	SET returnValue = (SELECT 	CONCAT (yearmonth, 
						RIGHT(CONCAT('00000', RIGHT(idmssupplier, 6) + 1), 6)
			) 
					FROM mssupplier
					ORDER BY idmssupplier DESC
					LIMIT 1);
	END IF ;
	RETURN (returnValue);
    END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP FUNCTION IF EXISTS `getnewidmsuser` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` FUNCTION `getnewidmsuser`() RETURNS varchar(10) CHARSET latin1
BEGIN
	DECLARE returnValue VARCHAR(10);
	DECLARE counter INT;
	DECLARE yearmonth VARCHAR(4);
	SET yearmonth = (SELECT 	CONCAT (RIGHT(YEAR(NOW()), 2),
						RIGHT(CONCAT ('0', MONTH(NOW())), 2)
						)
			);
	SET counter = (SELECT COUNT(*) FROM msuser WHERE idmsuser LIKE CONCAT(yearmonth,"%"));
	IF(counter = 0) THEN
	SET returnValue = (SELECT 	CONCAT (yearmonth, 
					'000001') 
					);
	ELSE 
	SET returnValue = (SELECT 	CONCAT (yearmonth, 
						RIGHT(CONCAT('00000', RIGHT(idmsuser, 6) + 1), 6)
			) 
					FROM msuser
					ORDER BY idmsuser DESC
					LIMIT 1);
	END IF ;
	RETURN (returnValue);
    END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP FUNCTION IF EXISTS `getpayloanbyidmssuppliernidmsbuyer` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` FUNCTION `getpayloanbyidmssuppliernidmsbuyer`(idmssupplierparam varchar(32), idmsbuyeraram varchar(32)) RETURNS double
BEGIN
	DECLARE returnValue DOUBLE;
	SET returnValue = (SELECT SUM(loaninrp)
				FROM trpayloan
				WHERE idmssupplier = idmssupplierparam AND
				idmsbuyerloan = idmsbuyeraram and lasttransact <> 'D');
	if(returnValue is null) then
		set returnValue = 0;
	end if;
	RETURN (returnValue);
    END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP FUNCTION IF EXISTS `getpayloanbyidmssuppliernidmsuser` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` FUNCTION `getpayloanbyidmssuppliernidmsuser`(idmssupplierparam varchar(32), idmsuserparam varchar(32)) RETURNS double
BEGIN
	DECLARE returnValue DOUBLE;
	SET returnValue = (SELECT SUM(loaninrp)
				FROM trpayloan
				WHERE idmssupplier = idmssupplierparam AND
				idmsuserloan = idmsuserparam and lasttransact <> 'D');
	if(returnValue is null) then
		set returnValue = 0;
	end if;
	RETURN (returnValue);
    END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP FUNCTION IF EXISTS `gettypebuyer` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` FUNCTION `gettypebuyer`(idparam varchar(32)) RETURNS varchar(128) CHARSET latin1
BEGIN
	DECLARE returnValue VARCHAR(128);
	SET returnValue = (SELECT 	a.idltusertype
					from msbuyer a
					WHERE a.idmsbuyer = idparam);
	RETURN (returnValue);
    END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP FUNCTION IF EXISTS `gettypeuser` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` FUNCTION `gettypeuser`(idparam varchar(32)) RETURNS varchar(128) CHARSET latin1
BEGIN
	DECLARE returnValue VARCHAR(128);
	SET returnValue = (SELECT 	a.idltusertype
					from msuser a
					WHERE a.idmsuser = idparam);
	RETURN (returnValue);
    END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP FUNCTION IF EXISTS `getuuid` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` FUNCTION `getuuid`() RETURNS varchar(32) CHARSET latin1
BEGIN
	DECLARE returnValue VARCHAR(32);
	set returnValue = (SELECT REPLACE(UUID(), '-', ''));
	RETURN (returnValue);
    END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `acceptnewsupplier` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `acceptnewsupplier`(IN idmssuppliertempparam VARCHAR(32), IN idparam INT)
BEGIN
	DECLARE iduserparam VARCHAR(32);
	SET iduserparam = (SELECT getuuid());
	INSERT INTO msuser (idmsuser, NAME, id, bod,
			idltusertype, lasttransdate, lasttransact, defaultlanguage, active)
		SELECT 	iduserparam, NAME, idparam, NULL, 
			1, NOW(), 'C', COALESCE(lang, 'ID'), 1
			FROM mssuppliertemp
			WHERE idmssuppliertemp = idmssuppliertempparam;
	INSERT INTO mssupplier (idmssupplier, idmsuser, suppliernatid, supplierid,
				lasttransdate, lasttransact,
				genre, address,
				businesslicense, personalidcard,
				province, city, district,
				supplieridexpiredlicensedate)
			SELECT 	getuuid(), iduserparam, COALESCE(natidtype, 'ID'), COALESCE(supplierid, LEFT(getuuid(), 6)),
				NOW(), 'C',
				genre, address,
				businesslicense, personalidcard,
				province, city, district,
				supplieridexpiredlicensedate
				FROM mssuppliertemp
				WHERE idmssuppliertemp = idmssuppliertempparam;
	UPDATE mssuppliertemp
		SET acceptdate = NOW(),
		lasttransdate = NOW(),
		lasttransact = 'U'
		WHERE idmssuppliertemp = idmssuppliertempparam;
    END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `addcatch` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `addcatch`(IN idtrcatchofflineparam VARCHAR(128),
	IN idmssupplierparam VARCHAR(32),
	IN idmsfishermanparam VARCHAR(32), IN idmsbuyersupplierparam VARCHAR(32),
	IN idmsshipparam VARCHAR(32), IN idmsfishparam VARCHAR(32),
	IN purchasedateparam DATE, IN purchasetimeparam TIME,
	IN catchorfarmedparam VARCHAR(10), IN bycatchparam VARCHAR(1), IN fadusedparam VARCHAR(1),
	IN purchaseuniquenoparam VARCHAR(32), IN productformatlandingparam VARCHAR(10), IN unitmeasurementparam VARCHAR(10),
	IN quantityparam FLOAT, IN weightparam FLOAT, IN fishinggroundareaparam VARCHAR(10),
	IN purchaselocationparam VARCHAR(32), IN uniquetripidparam VARCHAR(32),
	IN datetimevesseldepartureparam DATETIME, IN datetimevesselreturnparam DATETIME,
	IN portnameparam VARCHAR(32), IN priceperkgparam DOUBLE,
	IN totalpriceparam DOUBLE, IN loanexpenseparam DOUBLE, IN otherexpenseparam DOUBLE,
	IN postdateparam DATETIME)
BEGIN
	DECLARE idvar VARCHAR(32);
	SET idvar = (SELECT getuuid());
	
	INSERT INTO trcatch 
		(idtrcatch, idtrcatchoffline,
		idmssupplier, idmsfisherman, 
		idmsbuyersupplier, idmsship, 
		idmsfish, 
		purchasedate, purchasetime, 
		catchorfarmed, bycatch, fadused, 
		purchaseuniqueno, productformatlanding, unitmeasurement, 
		
		fishinggroundarea, 
		purchaselocation, uniquetripid, datetimevesseldeparture, 
		datetimevesselreturn, portname, priceperkg, 
		totalprice, loanexpense, otherexpense, 
		postdate, lasttransdate, lasttransact)
	VALUES
		(idvar, idtrcatchofflineparam,
		idmssupplierparam, idmsfishermanparam, 
		idmsbuyersupplierparam, idmsshipparam, 
		idmsfishparam, 
		purchasedateparam, purchasetimeparam, 
		catchorfarmedparam, bycatchparam, fadusedparam, 
		purchaseuniquenoparam, productformatlandingparam, unitmeasurementparam, 
		
		fishinggroundareaparam, 
		purchaselocationparam, uniquetripidparam, datetimevesseldepartureparam, 
		datetimevesselreturnparam, portnameparam, priceperkgparam, 
		totalpriceparam, loanexpenseparam, otherexpenseparam, 
		postdateparam, NOW(), 'C');
	SELECT idvar AS id;
    END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `addcatchsupplier` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `addcatchsupplier`(in idtrcatchpostparam varchar(32), in idmssupplierparam varchar(32), in idmssuppliersellparam varchar(32),
	IN idmsshipparam VARCHAR(32),
	in idmsfishparam varchar(32), in varianceparam VARCHAR(32), 
	in dispatchnotephotoparam VARCHAR(32), 
	in priceperkgparam double, in totalpriceparam double,
	in locationparam VARCHAR(32), in saildateparam datetime,
	in postdateparam datetime)
BEGIN
	declare idvar varchar(32);
	set idvar = (select getuuid());
	
	INSERT INTO trcatch 
		(idtrcatch, idtrcatchpost,
		idmssupplier, idmssuppliersell, idmsship, 
		idmsfish, VARIANCE, 
		dispatchnotephoto, 
		location, saildate,
		priceperkg, totalprice,
		postdate,
		lasttransdate, lasttransact)
	VALUES
		(idvar, idtrcatchpostparam,
		idmssupplierparam, idmssuppliersellparam, idmsshipparam, 
		idmsfishparam, varianceparam, 
		dispatchnotephotoparam,
		locationparam, saildateparam, 
		priceperkgparam, totalpriceparam,
		postdateparam,
		now(), 'C');
	select idvar as id;
    END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `addcatchv2` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `addcatchv2`(IN `idtrcatchofflineparam` VARCHAR(128), IN `idmssupplierparam` VARCHAR(32), IN `idfishermanofflineparam` VARCHAR(128), IN `idbuyerofflineparam` VARCHAR(128), IN `idshipofflineparam` VARCHAR(128), IN `idfishofflineparam` VARCHAR(128), IN `purchasedateparam` DATE, IN `purchasetimeparam` TIME, IN `catchorfarmedparam` VARCHAR(10), IN `bycatchparam` VARCHAR(1), IN `fadusedparam` VARCHAR(1), IN `purchaseuniquenoparam` VARCHAR(32), IN `productformatlandingparam` VARCHAR(10), IN `unitmeasurementparam` VARCHAR(10), IN `quantityparam` FLOAT, IN `weightparam` FLOAT, IN `fishinggroundareaparam` VARCHAR(10), IN `purchaselocationparam` VARCHAR(32), IN `uniquetripidparam` VARCHAR(32), IN `datetimevesseldepartureparam` DATETIME, IN `datetimevesselreturnparam` DATETIME, IN `portnameparam` VARCHAR(32), IN `priceperkgparam` DOUBLE, IN `totalpriceparam` DOUBLE, IN `loanexpenseparam` DOUBLE, IN `otherexpenseparam` DOUBLE, IN `postdateparam` DATETIME)
BEGIN
	DECLARE idvar VARCHAR(32);
	SET idvar = (SELECT getuuid());
	
	INSERT INTO trcatch 
		(idtrcatch, idtrcatchoffline,
		idmssupplier, 
		idfishermanoffline, idbuyeroffline, idshipoffline, idfishoffline, 
		purchasedate, purchasetime, 
		catchorfarmed, bycatch, fadused, 
		purchaseuniqueno, productformatlanding, unitmeasurement, 
		fishinggroundarea, 
		purchaselocation, uniquetripid, datetimevesseldeparture, 
		datetimevesselreturn, portname, priceperkg, 
		totalprice, loanexpense, otherexpense, 
		postdate, lasttransdate, lasttransact)
	VALUES
		(idvar, idtrcatchofflineparam,
		idmssupplierparam, 
		idfishermanofflineparam, idbuyerofflineparam, idshipofflineparam, idfishofflineparam, 
		purchasedateparam, purchasetimeparam, 
		catchorfarmedparam, bycatchparam, fadusedparam, 
		purchaseuniquenoparam, productformatlandingparam, unitmeasurementparam, 
		
		fishinggroundareaparam, 
		purchaselocationparam, uniquetripidparam, datetimevesseldepartureparam, 
		datetimevesselreturnparam, portnameparam, priceperkgparam, 
		totalpriceparam, loanexpenseparam, otherexpenseparam, 
		postdateparam, NOW(), 'C');
	SELECT idvar AS id;
    END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `addcatchv3` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `addcatchv3`(IN `idtrcatchofflineparam` VARCHAR(128), IN `idmssupplierparam` VARCHAR(32), 
IN `idfishermanofflineparam` VARCHAR(128), IN `idbuyerofflineparam` VARCHAR(128), 
IN `idshipofflineparam` VARCHAR(128), IN `idfishofflineparam` VARCHAR(128), 
IN `purchasedateparam` DATE, IN `purchasetimeparam` TIME, 
IN `catchorfarmedparam` VARCHAR(10), IN `bycatchparam` VARCHAR(1), 
IN `fadusedparam` VARCHAR(1), IN `purchaseuniquenoparam` VARCHAR(32), 
IN `productformatlandingparam` VARCHAR(10), IN `unitmeasurementparam` VARCHAR(10), 
IN `quantityparam` FLOAT, IN `weightparam` FLOAT, IN `fishinggroundareaparam` VARCHAR(10), 
IN `purchaselocationparam` VARCHAR(32), IN `uniquetripidparam` VARCHAR(32), 
IN `datetimevesseldepartureparam` DATETIME, IN `datetimevesselreturnparam` DATETIME, 
IN `portnameparam` VARCHAR(32), IN `priceperkgparam` DOUBLE, IN `totalpriceparam` DOUBLE, 
IN `loanexpenseparam` DOUBLE, IN `otherexpenseparam` DOUBLE, IN `postdateparam` DATETIME,
IN idmsusercreatorparam VARCHAR(32))
BEGIN
	DECLARE idvar VARCHAR(32);
	IF NOT EXISTS(SELECT * FROM trcatch WHERE idtrcatchoffline = idtrcatchofflineparam) THEN
		SET idvar = (SELECT getuuid());
	
		INSERT INTO trcatch 
			(idtrcatch, idtrcatchoffline,
			idmssupplier, 
			idfishermanoffline, idbuyeroffline, idshipoffline, idfishoffline, 
			purchasedate, purchasetime, 
			catchorfarmed, bycatch, fadused, 
			purchaseuniqueno, productformatlanding, unitmeasurement, 
			fishinggroundarea, 
			purchaselocation, uniquetripid, datetimevesseldeparture, 
			datetimevesselreturn, portname, priceperkg, 
			totalprice, loanexpense, otherexpense, 
			postdate, lasttransdate, lasttransact, idmsusercreator)
		VALUES
			(idvar, idtrcatchofflineparam,
			idmssupplierparam, 
			idfishermanofflineparam, idbuyerofflineparam, idshipofflineparam, idfishofflineparam, 
			purchasedateparam, purchasetimeparam, 
			catchorfarmedparam, bycatchparam, fadusedparam, 
			purchaseuniquenoparam, productformatlandingparam, unitmeasurementparam, 
			
			fishinggroundareaparam, 
			purchaselocationparam, uniquetripidparam, datetimevesseldepartureparam, 
			datetimevesselreturnparam, portnameparam, priceperkgparam, 
			totalpriceparam, loanexpenseparam, otherexpenseparam, 
			postdateparam, NOW(), 'C', idmsusercreatorparam);
		SELECT idvar AS id;
	ELSE
		SELECT 'exists' AS err, NULL AS id;
	END IF;
    END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `addcatchv4` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `addcatchv4`(IN `idtrcatchofflineparam` VARCHAR(128), IN `idmssupplierparam` VARCHAR(32), 
IN `idfishermanofflineparam` VARCHAR(128), IN `idbuyerofflineparam` VARCHAR(128), 
IN `idshipofflineparam` VARCHAR(128), IN `idfishofflineparam` VARCHAR(128), 
IN `purchasedateparam` DATE, IN `purchasetimeparam` TIME, 
IN `catchorfarmedparam` VARCHAR(10), IN `bycatchparam` VARCHAR(1), 
IN `fadusedparam` VARCHAR(1), IN `purchaseuniquenoparam` VARCHAR(32), 
IN `productformatlandingparam` VARCHAR(10), IN `unitmeasurementparam` VARCHAR(10), 
IN `quantityparam` FLOAT, IN `weightparam` FLOAT, IN `fishinggroundareaparam` VARCHAR(10), 
IN `purchaselocationparam` VARCHAR(32), IN `uniquetripidparam` VARCHAR(32), 
IN `datetimevesseldepartureparam` DATETIME, IN `datetimevesselreturnparam` DATETIME, 
IN `portnameparam` VARCHAR(32), IN `priceperkgparam` DOUBLE, IN `totalpriceparam` DOUBLE, 
IN `loanexpenseparam` DOUBLE, IN `otherexpenseparam` DOUBLE, IN `postdateparam` DATETIME,
IN idmsusercreatorparam VARCHAR(32), IN notesparam TEXT
)
BEGIN
	DECLARE idvar VARCHAR(32);
	IF NOT EXISTS(SELECT * FROM trcatch WHERE idtrcatchoffline = idtrcatchofflineparam) THEN
		SET idvar = (SELECT getuuid());
		INSERT INTO trcatch 
			(idtrcatch, idtrcatchoffline,
			idmssupplier, 
			idfishermanoffline, idbuyeroffline, idshipoffline, idfishoffline, 
			purchasedate, purchasetime, 
			catchorfarmed, bycatch, fadused, 
			purchaseuniqueno, productformatlanding, unitmeasurement, 
			fishinggroundarea, 
			purchaselocation, uniquetripid, datetimevesseldeparture, 
			datetimevesselreturn, portname, priceperkg, 
			totalprice, loanexpense, otherexpense, 
			postdate, lasttransdate, lasttransact, idmsusercreator,
			notes)
		VALUES
			(idvar, idtrcatchofflineparam,
			idmssupplierparam, 
			idfishermanofflineparam, idbuyerofflineparam, idshipofflineparam, idfishofflineparam, 
			purchasedateparam, purchasetimeparam, 
			catchorfarmedparam, bycatchparam, fadusedparam, 
			purchaseuniquenoparam, productformatlandingparam, unitmeasurementparam, 
			
			fishinggroundareaparam, 
			purchaselocationparam, uniquetripidparam, datetimevesseldepartureparam, 
			datetimevesselreturnparam, portnameparam, priceperkgparam, 
			totalpriceparam, loanexpenseparam, otherexpenseparam, 
			postdateparam, NOW(), 'C', idmsusercreatorparam, 
			notesparam);
		SELECT idvar AS id;
	ELSE
		SELECT 'exists' AS err, NULL AS id;
	END IF;
    END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `addcatchv5` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `addcatchv5`(IN `idtrcatchofflineparam` VARCHAR(128), IN `idmssupplierparam` VARCHAR(32), IN `idfishermanofflineparam` VARCHAR(128), IN `idbuyerofflineparam` VARCHAR(128), IN `idshipofflineparam` VARCHAR(128), IN `idfishofflineparam` VARCHAR(128), IN `purchasedateparam` DATE, IN `purchasetimeparam` TIME, IN `catchorfarmedparam` VARCHAR(10), IN `bycatchparam` VARCHAR(1), IN `fadusedparam` VARCHAR(1), IN `purchaseuniquenoparam` VARCHAR(32), IN `productformatlandingparam` VARCHAR(10), IN `unitmeasurementparam` VARCHAR(10), IN `quantityparam` FLOAT, IN `weightparam` FLOAT, IN `fishinggroundareaparam` VARCHAR(10), IN `purchaselocationparam` VARCHAR(32), IN `uniquetripidparam` VARCHAR(32), IN `datetimevesseldepartureparam` DATETIME, IN `datetimevesselreturnparam` DATETIME, IN `portnameparam` VARCHAR(32), IN `priceperkgparam` DOUBLE, IN `totalpriceparam` DOUBLE, IN `loanexpenseparam` DOUBLE, IN `otherexpenseparam` DOUBLE, IN `postdateparam` DATETIME, IN `idmsusercreatorparam` VARCHAR(32), IN `fishermannameparam` VARCHAR(191), IN `fishermanidparam` VARCHAR(64), IN `fishermanregnumberparam` VARCHAR(64), IN `closeparamparam` VARCHAR(1))
BEGIN
	DECLARE idvar VARCHAR(32);
	IF NOT EXISTS(SELECT * FROM trcatch WHERE idtrcatchoffline = idtrcatchofflineparam) THEN
		SET idvar = (SELECT getuuid());
	
		INSERT INTO trcatch 
			(idtrcatch, idtrcatchoffline,
			idmssupplier, 
			idfishermanoffline, idbuyeroffline, idshipoffline, idfishoffline, 
			purchasedate, purchasetime, 
			catchorfarmed, bycatch, fadused, 
			purchaseuniqueno, productformatlanding, unitmeasurement, 
			fishinggroundarea, 
			purchaselocation, uniquetripid, datetimevesseldeparture, 
			datetimevesselreturn, portname, priceperkg, 
			totalprice, loanexpense, otherexpense, 
			postdate, fishermanname2, fishermanid, fishermanregnumber, closeparam, lasttransdate, lasttransact, idmsusercreator)
		VALUES
			(idvar, idtrcatchofflineparam,
			idmssupplierparam, 
			idfishermanofflineparam, idbuyerofflineparam, idshipofflineparam, idfishofflineparam, 
			purchasedateparam, purchasetimeparam, 
			catchorfarmedparam, bycatchparam, fadusedparam, 
			purchaseuniquenoparam, productformatlandingparam, unitmeasurementparam, 
			
			fishinggroundareaparam, 
			purchaselocationparam, uniquetripidparam, datetimevesseldepartureparam, 
			datetimevesselreturnparam, portnameparam, priceperkgparam, 
			totalpriceparam, loanexpenseparam, otherexpenseparam, 
			postdateparam, fishermannameparam, fishermanidparam, fishermanregnumberparam, closeparamparam, NOW(), 'C', idmsusercreatorparam);
		SELECT idvar AS id;
	ELSE
		SELECT 'exists' AS err, NULL AS id;
	END IF;
    END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `addfishcatch` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `addfishcatch`(IN `idtrcatchofflineparam` VARCHAR(128), IN `idtrfishcatchofflineparam` VARCHAR(128), IN `amountparam` FLOAT, IN `gradeparam` VARCHAR(5), IN `descparam` VARCHAR(128), IN `juliandateparam` VARCHAR(7))
BEGIN
	DECLARE idvar VARCHAR(32);
	DECLARE totalWeight INT;
	DECLARE totalQuantity INT;
	
	SET idvar = (SELECT getuuid());
	INSERT INTO trfishcatch 
		(idtrfishcatch, idtrcatchoffline, idtrfishcatchoffline, 
		amount, grade, 
		description, idfish,
		lasttransdate, lasttransact)
		VALUES
		(idvar, idtrcatchofflineparam, idtrfishcatchofflineparam, 
		amountparam, gradeparam, 
		descparam, 
        
        createidfishv2(),
		NOW(), 'C');
	SET totalWeight = (SELECT SUM(amount)
				FROM trfishcatch
				WHERE idtrcatchoffline = idtrcatchofflineparam);
	SET totalQuantity = (SELECT COUNT(amount)
				FROM trfishcatch
				WHERE idtrcatchoffline = idtrcatchofflineparam);
	UPDATE trcatch
		SET quantity = totalQuantity,
		weight = totalWeight
		WHERE idtrcatchoffline = idtrcatchofflineparam;
	SELECT idvar AS id;
    END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `addfishcatchv2` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `addfishcatchv2`(IN `idtrcatchofflineparam` VARCHAR(128), IN `idtrfishcatchofflineparam` VARCHAR(128), IN `amountparam` FLOAT, IN `gradeparam` VARCHAR(5), IN `descparam` VARCHAR(128), IN `idfishparam` VARCHAR(32))
BEGIN
	DECLARE idvar VARCHAR(32);
	DECLARE totalWeight INT;
	DECLARE totalQuantity INT;
	
	SET idvar = (SELECT getuuid());
	INSERT INTO trfishcatch 
		(idtrfishcatch, idtrcatchoffline, idtrfishcatchoffline, 
		amount, grade, 
		description, idfish,
		lasttransdate, lasttransact)
		VALUES
		(idvar, idtrcatchofflineparam, idtrfishcatchofflineparam, 
		amountparam, gradeparam, 
		descparam, idfishparam,
		NOW(), 'C');
	SET totalWeight = (SELECT SUM(amount)
				FROM trfishcatch
				WHERE idtrcatchoffline = idtrcatchofflineparam);
	SET totalQuantity = (SELECT COUNT(amount)
				FROM trfishcatch
				WHERE idtrcatchoffline = idtrcatchofflineparam);
	UPDATE trcatch
		SET quantity = totalQuantity,
		weight = totalWeight
		WHERE idtrcatchoffline = idtrcatchofflineparam;
	SELECT idvar AS id;
    END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `addfishcatchv3` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `addfishcatchv3`(IN `idtrcatchofflineparam` VARCHAR(128), IN `idtrfishcatchofflineparam` VARCHAR(128),
IN `amountparam` FLOAT, IN `gradeparam` VARCHAR(5), IN `descparam` VARCHAR(128), IN `idfishparam` VARCHAR(32), 
IN idmsusercreatorparam VARCHAR(32))
BEGIN
	DECLARE idvar VARCHAR(32);
	DECLARE totalWeight INT;
	DECLARE totalQuantity INT;
	
	IF NOT EXISTS(SELECT * FROM trfishcatch WHERE idtrfishcatchoffline = idtrfishcatchofflineparam) THEN
		SET idvar = (SELECT getuuid());
		INSERT INTO trfishcatch 
			(idtrfishcatch, idtrcatchoffline, idtrfishcatchoffline, 
			amount, grade, 
			description, idfish,
			lasttransdate, lasttransact, idmsusercreator)
			VALUES
			(idvar, idtrcatchofflineparam, idtrfishcatchofflineparam, 
			amountparam, gradeparam, 
			descparam, idfishparam,
			NOW(), 'C', idmsusercreatorparam
			);
		SET totalWeight = (SELECT SUM(amount)
					FROM trfishcatch
					WHERE idtrcatchoffline = idtrcatchofflineparam);
		SET totalQuantity = (SELECT COUNT(amount)
					FROM trfishcatch
					WHERE idtrcatchoffline = idtrcatchofflineparam);
		UPDATE trcatch
			SET quantity = totalQuantity,
			weight = totalWeight,
			idmsuserlasttrans = idmsusercreatorparam
			WHERE idtrcatchoffline = idtrcatchofflineparam;
		SELECT idvar AS id;
	ELSE
		SELECT 'exists' AS err, NULL AS id;
	END IF;
    END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `addfishcatchv4` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `addfishcatchv4`(IN `idtrcatchofflineparam` VARCHAR(128), IN `idtrfishcatchofflineparam` VARCHAR(128), IN `amountparam` FLOAT, IN `gradeparam` VARCHAR(5), IN `descparam` VARCHAR(128), IN `idfishparam` VARCHAR(32), IN `idmsusercreatorparam` VARCHAR(32), IN `uplineparam` VARCHAR(128))
BEGIN
	DECLARE idvar VARCHAR(32);
	DECLARE totalWeight INT;
	DECLARE totalQuantity INT;
	
	IF NOT EXISTS(SELECT * FROM trfishcatch WHERE idtrfishcatchoffline = idtrfishcatchofflineparam) THEN
		SET idvar = (SELECT getuuid());
		INSERT INTO trfishcatch 
			(idtrfishcatch, idtrcatchoffline, idtrfishcatchoffline, 
			amount, grade, 
			description, idfish, upline,
			lasttransdate, lasttransact, idmsusercreator)
			VALUES
			(idvar, idtrcatchofflineparam, idtrfishcatchofflineparam, 
			amountparam, gradeparam, 
			descparam, idfishparam, uplineparam,
			NOW(), 'C', idmsusercreatorparam
			);
		SET totalWeight = (SELECT SUM(amount)
					FROM trfishcatch
					WHERE idtrcatchoffline = idtrcatchofflineparam);
		SET totalQuantity = (SELECT COUNT(amount)
					FROM trfishcatch
					WHERE idtrcatchoffline = idtrcatchofflineparam);
		UPDATE trcatch
			SET quantity = totalQuantity,
			weight = totalWeight,
			idmsuserlasttrans = idmsusercreatorparam
			WHERE idtrcatchoffline = idtrcatchofflineparam;
		SELECT idvar AS id;
	ELSE
		SELECT 'exists' AS err, NULL AS id;
	END IF;
    END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `addfishconfig` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `addfishconfig`(in idmssupplierparam varchar(32),
		IN nameparam VARCHAR(64), IN idmsfishparam VARCHAR(32),IN gradeparam VARCHAR(10), 
		IN unitparam varchar(10), IN handlingparam VARCHAR(10))
BEGIN
	DECLARE idvar VARCHAR(32);
	SET idvar = (SELECT getuuid());
	INSERT INTO trfishconfig 
		(idtrfishconfig, idmssupplier, 
		NAME, idmsfish, grade, 
		unit, handling, lasttransdate, lasttransact)
		VALUES
		(idvar, idmssupplierparam, 
		nameparam, idmsfishparam, gradeparam, 
		unitparam, handlingparam, now(), 'C');
	SELECT idvar AS id;
    END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `addfishpriceconfig` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `addfishpriceconfig`(in idtrfishconfigparam varchar(32),
		IN idtrcatchparam VARCHAR(32))
BEGIN
	DECLARE idvar VARCHAR(32);
	SET idvar = (SELECT getuuid());
	INSERT INTO trfishpriceconfig 
		(idtrfishpriceconfig, 
		idtrfishconfig, idtrcatch,
		lasttransdate, lasttransact)
		VALUES
		(idvar, 
		idtrfishconfigparam, idtrcatchparam,
		now(), 'C');
	SELECT idvar AS id;
    END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `addkdeindo` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `addkdeindo`(
in idtrcatch_param varchar(32),
in company_org_name_param varchar(50), 
in company_owner_name_param varchar(50),
in company_owner_sex_param varchar(1),
in company_license_id_param varchar(20),
in company_license_expiration_date_param date,
in company_address_param varchar(100),
in company_phone_param varchar(20),
in consignee_param varchar(50),
in sex_param varchar(1),
in vessel_name_param varchar(50),
in vessel_size_param varchar(10),
in vessel_length_param varchar(10),
in vessel_flag_param varchar(50),
in vessel_transmitter_id_param varchar(50),
in vessel_register_id_param varchar(50),
in vessel_radio_register_id_param varchar(50),
in catch_or_farm_param varchar(1),
in by_catch_param varchar(1),
in catch_id_param varchar(20),
in species_caught_param varchar(50),
in scientific_name_param varchar(50),
in asfis_or_product_code_param varchar(3),
in batch_or_lot_smallint_param varchar(50),
in total_weight_of_batch_param smallint,
in product_form_at_landing_param varchar(50),
in quantity_param smallint,
in total_weight_of_species_param smallint,
in catch_date_param date,
in number_of_trip_param smallint,
in catch_time_param time,
in year_of_departure_param date,
in date_of_departure_param date,
in time_of_departure_param time,
in date_of_return_param date,
in time_of_return_param time,
in fishing_gear_start_setting_time_param time,
in fishing_gear_end_setting_time_param time,
in hook_setting_time_param time,
in number_of_hook_param smallint,
in distance_between_hook_param varchar(9),
in vessel_port_of_departure_param varchar(50),
in point_of_catch_param varchar(30),
in product_destination_param varchar(50),
in vessel_landing_port_param varchar(50),
in gear_type_param varchar(50),
in indonesia_wpp_catch_area_param varchar(10),
in indonesia_local_sea_name_param varchar(50),
in catch_area_fad_used_param varchar(10),
in lead_document_type_param varchar(20),
in lead_document_id_param varchar(20),
in captain_name_param varchar(50),
in captain_sex_param varchar(1),
in captain_personal_identification_param varchar(20),
in captain_nationality_param varchar(50),
in crew_name_param varchar(50),
in crew_sex_param varchar(1),
in crew_personal_id_param varchar(50),
in crew_job_param varchar(50),
in crew_nationality_param varchar(50),
in crew_date_of_birth_param date,
in total_indonesia_crew_param smallint,
in total_foreign_crew_param smallint,
in captain_node_param varchar(1028)
)
BEGIN
	INSERT INTO kdeindo 
		(idtrkdeindo, 
		idtrcatch, 
		company_org_name, 
		company_owner_name, 
		company_owner_sex, 
		company_license_id, 
		company_license_expiration_date, 
		company_address, 
		company_phone, 
		consignee, 
		sex, 
		vessel_name, 
		vessel_size, 
		vessel_length, 
		vessel_flag, 
		vessel_transmitter_id, 
		vessel_register_id, 
		vessel_radio_register_id, 
		catch_or_farm, 
		by_catch, 
		catch_id, 
		species_caught, 
		scientific_name, 
		asfis_or_product_code, 
		batch_or_lot_smallint, 
		total_weight_of_batch, 
		product_form_at_landing, 
		quantity, 
		total_weight_of_species, 
		catch_date, 
		number_of_trip, 
		catch_time, 
		year_of_departure, 
		date_of_departure, 
		time_of_departure, 
		date_of_return, 
		time_of_return, 
		fishing_gear_start_setting_time, 
		fishing_gear_end_setting_time, 
		hook_setting_time, 
		number_of_hook, 
		distance_between_hook, 
		vessel_port_of_departure, 
		point_of_catch, 
		product_destination, 
		vessel_landing_port, 
		gear_type, 
		indonesia_wpp_catch_area, 
		indonesia_local_sea_name, 
		catch_area_fad_used, 
		lead_document_type, 
		lead_document_id, 
		captain_name, 
		captain_sex, 
		captain_personal_identification, 
		captain_nationality, 
		crew_name, 
		crew_sex, 
		crew_personal_id, 
		crew_job, 
		crew_nationality, 
		crew_date_of_birth, 
		total_indonesia_crew, 
		total_foreign_crew, 
		captain_node
		)
		VALUES
		(getuuid(), 
		idtrcatch_param, 
		company_org_name_param, 
		company_owner_name_param, 
		company_owner_sex_param, 
		company_license_id_param, 
		company_license_expiration_date_param, 
		company_address_param, 
		company_phone_param, 
		consignee_param, 
		sex_param, 
		vessel_name_param, 
		vessel_size_param, 
		vessel_length_param, 
		vessel_flag_param, 
		vessel_transmitter_id_param, 
		vessel_register_id_param, 
		vessel_radio_register_id_param, 
		catch_or_farm_param, 
		by_catch_param, 
		catch_id_param, 
		species_caught_param, 
		scientific_name_param, 
		asfis_or_product_code_param, 
		batch_or_lot_smallint_param, 
		total_weight_of_batch_param, 
		product_form_at_landing_param, 
		quantity_param, 
		total_weight_of_species_param, 
		catch_date_param, 
		number_of_trip_param, 
		catch_time_param, 
		year_of_departure_param, 
		date_of_departure_param, 
		time_of_departure_param, 
		date_of_return_param, 
		time_of_return_param, 
		fishing_gear_start_setting_time_param, 
		fishing_gear_end_setting_time_param, 
		hook_setting_time_param, 
		number_of_hook_param, 
		distance_between_hook_param, 
		vessel_port_of_departure_param, 
		point_of_catch_param, 
		product_destination_param, 
		vessel_landing_port_param, 
		gear_type_param, 
		indonesia_wpp_catch_area_param, 
		indonesia_local_sea_name_param, 
		catch_area_fad_used_param, 
		lead_document_type_param, 
		lead_document_id_param, 
		captain_name_param, 
		captain_sex_param, 
		captain_personal_identification_param, 
		captain_nationality_param, 
		crew_name_param, 
		crew_sex_param, 
		crew_personal_id_param, 
		crew_job_param, 
		crew_nationality_param, 
		crew_date_of_birth_param, 
		total_indonesia_crew_param, 
		total_foreign_crew_param, 
		captain_node_param
		);
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `addkdeusaid` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `addkdeusaid`(
	in idtrcatch varchar(32),
	in event_owner varchar(50),
	in owner_name varchar(50),
	in owner_sex varchar(1),
	in owner_id varchar(20),
	in owner_id_expiry_date date,
	in owner_address varchar(100),
	in owner_phone varchar(20),
	in trading_partner varchar(50),
	in trading_partner_sex varchar(1),
	in vessel_name varchar(50),
	in vessel_size varchar(10),
	in vessel_flag varchar(50),
	in vessel_id varchar(50),
	in event_type varchar(50),
	in event_number varchar(50),
	in item_type varchar(50),
	in item_code varchar(50),
	in item_number varchar(50),
	in bycatch varchar(1),
	in batch_or_lot_number varchar(50),
	in quantity smallint(6),
	in weight_item smallint(6),
	in weight_batch_lot smallint(6),
	in product_form_at_landing varchar(50),
	in event_date date,
	in event_time time,
	in first_freeze_date date,
	in date_of_departure date,
	in time_of_departure time,
	in date_of_return date,
	in time_of_return time,
	in origin varchar(50),
	in event_location varchar(50),
	in product_destination varchar(50),
	in vessel_home_port varchar(50),
	in event_method varchar(50),
	in fad_use varchar(50),
	in fad_location varchar(50),
	in activity_type varchar(50),
	in activity_id varchar(50),
	in captain_name varchar(50),
	in captain_sex varchar(1),
	in captain_id varchar(50),
	in captain_nationality varchar(50),
	in contract_id varchar(50),
	in crew_worker_name varchar(50),
	in crew_worker_sex varchar(1),
	in crew_worker_id varchar(50),
	in crew_worker_nationality varchar(50),
	in crew_worker_dob date,
	in crew_worker_job varchar(50)
)
BEGIN
INSERT INTO kdeusaid 
	(idtrkde, 
	idtrcatch, 
	event_owner, 
	owner_name, 
	owner_sex, 
	owner_id, 
	owner_id_expiry_date, 
	owner_address, 
	owner_phone, 
	trading_partner, 
	trading_partner_sex, 
	vessel_name, 
	vessel_size, 
	vessel_flag, 
	vessel_id, 
	event_type, 
	event_number, 
	item_type, 
	item_code, 
	item_number, 
	bycatch, 
	batch_or_lot_number, 
	quantity, 
	weight_item, 
	weight_batch_lot, 
	product_form_at_landing, 
	event_date, 
	event_time, 
	first_freeze_date, 
	date_of_departure, 
	time_of_departure, 
	date_of_return, 
	time_of_return, 
	origin, 
	event_location, 
	product_destination, 
	vessel_home_port, 
	event_method, 
	fad_use, 
	fad_location, 
	activity_type, 
	activity_id, 
	captain_name, 
	captain_sex, 
	captain_id, 
	captain_nationality, 
	contract_id, 
	crew_worker_name, 
	crew_worker_sex, 
	crew_worker_id, 
	crew_worker_nationality, 
	crew_worker_dob, 
	crew_worker_job
	)
	VALUES
	(getuuid(), 
	idtrcatch_param, 
	event_owner_param, 
	owner_name_param, 
	owner_sex_param, 
	owner_id_param, 
	owner_id_expiry_date_param, 
	owner_address_param, 
	owner_phone_param, 
	trading_partner_param, 
	trading_partner_sex_param, 
	vessel_name_param, 
	vessel_size_param, 
	vessel_flag_param, 
	vessel_id_param, 
	event_type_param, 
	event_number_param, 
	item_type_param, 
	item_code_param, 
	item_number_param, 
	bycatch_param, 
	batch_or_lot_number_param, 
	quantity_param, 
	weight_item_param, 
	weight_batch_lot_param, 
	product_form_at_landing_param, 
	event_date_param, 
	event_time_param, 
	first_freeze_date_param, 
	date_of_departure_param, 
	time_of_departure_param, 
	date_of_return_param, 
	time_of_return_param, 
	origin_param, 
	event_location_param, 
	product_destination_param, 
	vessel_home_port_param, 
	event_method_param, 
	fad_use_param, 
	fad_location_param, 
	activity_type_param, 
	activity_id_param, 
	captain_name_param, 
	captain_sex_param, 
	captain_id_param, 
	captain_nationality_param, 
	contract_id_param, 
	crew_worker_name_param, 
	crew_worker_sex_param, 
	crew_worker_id_param, 
	crew_worker_nationality_param, 
	crew_worker_dob_param, 
	crew_worker_job_param
	);
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `addloginsuserqrcode` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `addloginsuserqrcode`(IN uniquecodeparam VARCHAR(32))
BEGIN
	DECLARE idvar varchar(32);
	SET idvar = (SELECT getuuid());
	
	INSERT INTO msuserqrcode 
		(idmsuserqrcode, uniquecode, 
		datepost, lasttransdate, lasttransact)
		VALUES
		(idvar, uniquecodeparam,
		now(), now(),'C');
	select idvar;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `addnewbuyer` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `addnewbuyer`(
	in idbuyerofflineparam varchar(128),
	IN idmssupplierparam VARCHAR(32), IN name_paramparam VARCHAR(128),
	IN id_paramparam VARCHAR(32), IN businesslicense_paramparam VARCHAR(32),
	IN contact_paramparam VARCHAR(32), IN phonenumber_paramparam VARCHAR(20),
	IN address_paramparam text, IN idltusertypeparam int,
	IN sex_paramparam int, IN nationalcode_paramparam VARCHAR(16),
	IN country_paramparam VARCHAR(2), IN province_paramparam VARCHAR(32),
	IN city_paramparam VARCHAR(32), IN district_paramparam VARCHAR(32), IN completestreetaddress_paramparam text)
BEGIN
	
	INSERT INTO msbuyer
	(idmsbuyer, idbuyeroffline,
	idmssupplier, name_param,
	id_param, businesslicense_param,
	contact_param, phonenumber_param,
	address_param, idltusertype,
	sex_param, nationalcode_param,
	country_param, province_param,
	city_param, district_param, completestreetaddress_param,
	lasttransdate, lasttransact)
	VALUES
	(getuuid(), idbuyerofflineparam,
	idmssupplierparam, name_paramparam,
	id_paramparam, businesslicense_paramparam,
	contact_paramparam, phonenumber_paramparam,
	address_paramparam, idltusertypeparam,
	sex_paramparam, nationalcode_paramparam,
	country_paramparam, province_paramparam,
	city_paramparam, district_paramparam, completestreetaddress_paramparam,
	NOW(), 'C');
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `addnewbuyerv3` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `addnewbuyerv3`(
	IN idbuyerofflineparam VARCHAR(128),
	IN idmssupplierparam VARCHAR(32), IN name_paramparam VARCHAR(128),
	IN id_paramparam VARCHAR(32), IN businesslicense_paramparam VARCHAR(32),
	IN contact_paramparam VARCHAR(32), IN phonenumber_paramparam VARCHAR(20),
	IN address_paramparam TEXT, IN idltusertypeparam INT,
	IN sex_paramparam INT, IN nationalcode_paramparam VARCHAR(16),
	IN country_paramparam VARCHAR(2), IN province_paramparam VARCHAR(32),
	IN city_paramparam VARCHAR(32), IN district_paramparam VARCHAR(32), IN completestreetaddress_paramparam TEXT,
	IN companynameparam VARCHAR(64), IN businesslicenseexpireddateparam DATETIME)
BEGIN
	
	IF NOT EXISTS(SELECT * FROM msbuyer WHERE idbuyeroffline = idbuyerofflineparam) THEN
		INSERT INTO msbuyer
			(idmsbuyer, idbuyeroffline,
			idmssupplier, name_param,
			id_param, businesslicense_param,
			contact_param, phonenumber_param,
			address_param, idltusertype,
			sex_param, nationalcode_param,
			country_param, province_param,
			city_param, district_param, completestreetaddress_param,
			lasttransdate, lasttransact,
			companyname, businesslicenseexpireddate)
		VALUES
			(getuuid(), idbuyerofflineparam,
			idmssupplierparam, name_paramparam,
			id_paramparam, businesslicense_paramparam,
			contact_paramparam, phonenumber_paramparam,
			address_paramparam, idltusertypeparam,
			sex_paramparam, nationalcode_paramparam,
			country_paramparam, province_paramparam,
			city_paramparam, district_paramparam, completestreetaddress_paramparam,
			NOW(), 'C',
			companynameparam, businesslicenseexpireddateparam);
	ELSE
		SELECT 'exists' AS err;
	END IF;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `addnewdelivery` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `addnewdelivery`(IN `iddeliveryofflineparam` VARCHAR(128), IN `idtrfishcatchpostparam` VARCHAR(32), IN `totalpriceparam` DOUBLE, IN `descparamparam` TEXT, IN `settobuyerdateparam` DATETIME)
BEGIN
	declare idtrfishcatchparam varchar(32);
	DECLARE idmsbuyerparam VARCHAR(32);
	set idtrfishcatchparam = (select idtrfishcatch from trfishcatch where idtrfishcatchpost = idtrfishcatchpostparam);
	SET idmsbuyerparam = (SELECT idmsbuyerflag FROM trfishcatch WHERE idtrfishcatchpost = idtrfishcatchpostparam);
	INSERT INTO trdelivery 
		(idtrdelivery, iddeliveryoffline, idtrfishcatch, 
		idmsbuyer, totalprice, descparam, 
		lasttransdate, lasttransact)
		VALUES
		(getuuid(), iddeliveryofflineparam, idtrfishcatchparam,
		idmsbuyerparam, totalpriceparam, descparamparam,
		now(), 'C');
	update trfishcatch
		set sendtobuyerdate = settobuyerdateparam,
		lasttransdate = NOW(),
		lasttransact = 'U'
		WHERE idtrfishcatch = idtrfishcatchparam;
    END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `addnewdeliverybatchv2` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `addnewdeliverybatchv2`(IN `iddeliveryofflineparam` VARCHAR(128), IN `idtrcatchofflineparam` VARCHAR(128), IN `totalpriceparam` DOUBLE, IN `descparamparam` TEXT, IN `sendtobuyerdateparam` DATETIME, IN `deliverydateparam` DATETIME, IN `transportbyparam` VARCHAR(10), IN `transportnameidparam` VARCHAR(128), IN `transportreceiptparam` VARCHAR(64), IN `idmsbuyerparam` VARCHAR(32), IN `idmssupplierparam` VARCHAR(32), IN `deliverysheetofflineidparam` TEXT)
BEGIN
	DECLARE idtrcatchparam VARCHAR(32);
	
	SET idtrcatchparam = (SELECT idtrcatch FROM trcatch WHERE idtrfishcatchoffline = idtrcatchofflineparam);
	
	INSERT INTO trdelivery 
		(idtrdelivery, iddeliveryoffline, idtrcatch, 
		idmsbuyer, totalprice, descparam, 
		deliverydate, transportby, transportnameid, transportreceipt,
		idmssupplier, deliverysheetofflineid,
		lasttransdate, lasttransact)
		VALUES
		(getuuid(), iddeliveryofflineparam, idtrcatchparam,
		idmsbuyerparam, totalpriceparam, descparamparam,
		deliverydateparam, transportbyparam, transportnameidparam, transportreceiptparam,
		idmssupplierparam, deliverysheetofflineidparam,
		NOW(), 'C');
	UPDATE trcatch
		SET
		sendtobuyerdate = sendtobuyerdateparam,
		lasttransdate = NOW(),
		lasttransact = 'U'
		WHERE idtrcatch = idtrcatchparam;
    END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `addnewdeliveryv2` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `addnewdeliveryv2`(IN `iddeliveryofflineparam` VARCHAR(128), IN `idtrfishcatchofflineparam` VARCHAR(128), IN `totalpriceparam` DOUBLE, IN `descparamparam` TEXT, IN `sendtobuyerdateparam` DATETIME, IN `deliverydateparam` DATETIME, IN `transportbyparam` VARCHAR(10), IN `transportnameidparam` VARCHAR(128), IN `transportreceiptparam` VARCHAR(64), IN `idmsbuyerparam` VARCHAR(32), IN `idmssupplierparam` VARCHAR(32), IN `deliverysheetofflineidparam` TEXT)
BEGIN
	DECLARE idtrfishcatchparam VARCHAR(32);
	
	IF NOT EXISTS(SELECT * FROM trdelivery WHERE iddeliveryoffline = iddeliveryofflineparam) THEN
		SET idtrfishcatchparam = (SELECT idtrfishcatch FROM trfishcatch WHERE idtrfishcatchoffline = idtrfishcatchofflineparam LIMIT 1);
		
		INSERT INTO trdelivery 
			(idtrdelivery, iddeliveryoffline, idtrfishcatch, 
			idmsbuyer, totalprice, descparam, 
			deliverydate, transportby, transportnameid, transportreceipt,
			idmssupplier, deliverysheetofflineid,
			lasttransdate, lasttransact)
			VALUES
			(getuuid(), iddeliveryofflineparam, idtrfishcatchparam,
			idmsbuyerparam, totalpriceparam, descparamparam,
			deliverydateparam, transportbyparam, transportnameidparam, transportreceiptparam,
			idmssupplierparam, deliverysheetofflineidparam,
			NOW(), 'C');
		UPDATE trfishcatch
			SET
			
			sendtobuyerdate = sendtobuyerdateparam,
			lasttransdate = NOW(),
			lasttransact = 'U'
			WHERE idtrfishcatch = idtrfishcatchparam;
	ELSE
		SELECT 'exists' AS err;
	END IF;
    END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `addnewdeliveryv3` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `addnewdeliveryv3`(IN `iddeliveryofflineparam` VARCHAR(128), IN `idtrfishcatchofflineparam` VARCHAR(128), 
IN `totalpriceparam` DOUBLE, IN `descparamparam` TEXT, IN `sendtobuyerdateparam` DATETIME, 
IN `deliverydateparam` DATETIME, IN `transportbyparam` VARCHAR(10), IN `transportnameidparam` VARCHAR(128), 
IN `transportreceiptparam` VARCHAR(64), IN `idmsbuyerparam` VARCHAR(32), IN `idmssupplierparam` VARCHAR(32), 
IN `deliverysheetofflineidparam` TEXT, IN idmsusercreatorparam VARCHAR(32))
BEGIN
	DECLARE idtrfishcatchparam VARCHAR(32);
	
	IF NOT EXISTS(SELECT * FROM trdelivery WHERE iddeliveryoffline = iddeliveryofflineparam) THEN
		SET idtrfishcatchparam = (SELECT idtrfishcatch FROM trfishcatch WHERE idtrfishcatchoffline = idtrfishcatchofflineparam LIMIT 1);
		
		INSERT INTO trdelivery 
			(idtrdelivery, iddeliveryoffline, idtrfishcatch, 
			idmsbuyer, totalprice, descparam, 
			deliverydate, transportby, transportnameid, transportreceipt,
			idmssupplier, deliverysheetofflineid,
			lasttransdate, lasttransact, idmsusercreator)
			VALUES
			(getuuid(), iddeliveryofflineparam, idtrfishcatchparam,
			idmsbuyerparam, totalpriceparam, descparamparam,
			deliverydateparam, transportbyparam, transportnameidparam, transportreceiptparam,
			idmssupplierparam, deliverysheetofflineidparam,
			NOW(), 'C', idmsusercreatorparam);
		UPDATE trfishcatch
			SET
			sendtobuyerdate = sendtobuyerdateparam,
			lasttransdate = NOW(),
			lasttransact = 'U',
			idmsuserlasttrans = idmsusercreatorparam
			WHERE idtrfishcatcoffline = idtrfishcatchofflineparam;
	ELSE
		SELECT 'exists' AS err;
	END IF;
    END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `addnewfish` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `addnewfish`(IN `idfishofflineparam` VARCHAR(128), IN `idltfishparam` VARCHAR(32), IN `indnameparam` VARCHAR(128), IN `localnameparam` VARCHAR(256), IN `photoparam` VARCHAR(256), IN `idmssupplierparam` VARCHAR(32), IN `priceparam` DOUBLE)
BEGIN
	IF NOT EXISTS(SELECT * FROM msfish WHERE idfishoffline = idfishofflineparam) THEN
		
		
		IF NOT EXISTS(SELECT idmsfish FROM msfish WHERE idltfish = -1 AND idmssupplier = idmssupplierparam) THEN
			INSERT INTO msfish 
				(idmsfish, idfishoffline, 
				idltfish, indname, localname, photo, idmssupplier, price, 
				lasttransdate, lasttransact
				)
			SELECT 	getuuid() AS idmsfish, getuuid() AS idfishoffline,
				-1 AS idltfish, 'Campur' AS indname, 'Mix' AS localname, '' AS photo, idmssupplierparam AS idmssupplier, 0 AS price, 
				NOW() AS lasttransdate, 'C' AS lasttransact;
		END IF;
		
		INSERT INTO msfish 
			(idmsfish, idfishoffline, idltfish,
			indname, localname, photo, price,
			idmssupplier, lasttransdate, lasttransact)
		VALUES
			(getuuid(),
			CASE WHEN idfishofflineparam IS NULL THEN getuuid()
			WHEN idfishofflineparam = "" THEN getuuid()
			WHEN idfishofflineparam = " " THEN getuuid()
			ELSE idfishofflineparam END,
			idltfishparam,
			indnameparam, localnameparam, photoparam, priceparam,
			idmssupplierparam, NOW(), 'C');
	ELSE
		SELECT 'exists' AS err;
	END IF;
    END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `addnewfisherman` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `addnewfisherman`(
		IN idfishermanofflineparam VARCHAR(128),
		IN nameparam VARCHAR(128), IN bodparam DATETIME,
		IN id_paramparam VARCHAR(16), IN sex_paramparam VARCHAR(1), IN nat_paramparam VARCHAR(2),
		IN address_paramparam TEXT, IN phone_paramparam VARCHAR(20), IN jobtitle_paramparam VARCHAR(32),
		IN idmssupplierparam VARCHAR(32))
BEGIN
	DECLARE idmsuserparam VARCHAR(32);
	SET idmsuserparam = (SELECT getuuid());
	INSERT INTO msuser (idmsuser, NAME, id, bod, idltusertype, lasttransdate, lasttransact)
			VALUES(idmsuserparam, nameparam, 0, bodparam, 3, NOW(), 'C');
			
	INSERT INTO msfisherman
		(idmsfisherman, idfishermanoffline,
		id_param, sex_param, nat_param,
		address_param, phone_param,
		jobtitle_param, idmssupplier, idmsuser,
		lasttransdate, lasttransact)
		VALUES
		(getuuid(), idfishermanofflineparam,
		id_paramparam, sex_paramparam, nat_paramparam,
		address_paramparam, phone_paramparam,
		jobtitle_paramparam, idmssupplierparam, idmsuserparam,
		NOW(), 'C');
    END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `addnewfishermanv2` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `addnewfishermanv2`(
		IN idfishermanofflineparam VARCHAR(128),
		IN nameparam VARCHAR(128), IN bodparam DATETIME,
		IN id_paramparam VARCHAR(16), IN sex_paramparam VARCHAR(1), IN nat_paramparam VARCHAR(2),
		IN address_paramparam TEXT, IN phone_paramparam VARCHAR(20), IN jobtitle_paramparam VARCHAR(32),
		IN idmssupplierparam VARCHAR(32),
		IN provinceparam VARCHAR(64),IN districtparam VARCHAR(64),IN cityparam VARCHAR(64))
BEGIN
	DECLARE idmsuserparam VARCHAR(32);
	SET idmsuserparam = (SELECT getuuid());
	INSERT INTO msuser (idmsuser, NAME, id, bod, idltusertype, lasttransdate, lasttransact)
			VALUES(idmsuserparam, nameparam, 0, bodparam, 3, NOW(), 'C');
			
	INSERT INTO msfisherman
		(idmsfisherman, idfishermanoffline,
		id_param, sex_param, nat_param,
		address_param, phone_param,
		jobtitle_param, idmssupplier, idmsuser,
		lasttransdate, lasttransact,
		province, district, city)
		VALUES
		(getuuid(), idfishermanofflineparam,
		id_paramparam, sex_paramparam, nat_paramparam,
		address_paramparam, phone_paramparam,
		jobtitle_paramparam, idmssupplierparam, idmsuserparam,
		NOW(), 'C',
		provinceparam, districtparam, cityparam);
    END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `addnewfishermanv3` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `addnewfishermanv3`(
		IN idfishermanofflineparam VARCHAR(128),
		IN nameparam VARCHAR(128), IN bodparam DATETIME,
		IN id_paramparam VARCHAR(32), IN sex_paramparam VARCHAR(1), IN nat_paramparam VARCHAR(2),
		IN address_paramparam TEXT, IN phone_paramparam VARCHAR(20), IN jobtitle_paramparam VARCHAR(32),
		IN idmssupplierparam VARCHAR(32),
		IN provinceparam VARCHAR(64),IN districtparam VARCHAR(64),IN cityparam VARCHAR(64),
		IN fishermanregnumberparam VARCHAR(64), IN countryparam VARCHAR(64))
BEGIN
	DECLARE idmsuserparam VARCHAR(32);
	
	IF NOT EXISTS(SELECT * FROM msfisherman WHERE idfishermanoffline = idfishermanofflineparam) THEN
		SET idmsuserparam = (SELECT getuuid());
		INSERT INTO msuser (idmsuser, NAME, id, bod, idltusertype, lasttransdate, lasttransact)
				VALUES(idmsuserparam, nameparam, 0, bodparam, 3, NOW(), 'C');
				
		INSERT INTO msfisherman
			(idmsfisherman, idfishermanoffline,
			id_param, sex_param, nat_param,
			address_param, phone_param,
			jobtitle_param, idmssupplier, idmsuser,
			lasttransdate, lasttransact,
			province, district, city, fishermanregnumber, country)
			VALUES
			(getuuid(), idfishermanofflineparam,
			id_paramparam, sex_paramparam, nat_paramparam,
			address_paramparam, phone_paramparam,
			jobtitle_paramparam, idmssupplierparam, idmsuserparam,
			NOW(), 'C',
			provinceparam, districtparam, cityparam, fishermanregnumberparam, countryparam);
	ELSE
		SELECT 'exists' AS err;
	END IF;
    END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `addnewloan` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `addnewloan`(in descloanparam text, in loaninrpparam double,
	in idmsuserloanparam varchar(32), in idmsbuyerloanparam varchar(32), IN idmssupplierparam VARCHAR(32),
	IN loandateparam datetime, in loaneridmsuserofficerparam varchar(32))
BEGIN
	INSERT INTO trloan 
	(idtrloan, descloan, loaninrp, 
	idmsuserloan, idmsbuyerloan, idmssupplier, 
	loandate, loaneridmsuserofficer,
	lasttransdate, lasttransact)
	VALUES
	(getuuid(), descloanparam, loaninrpparam, 
	idmsuserloanparam, idmsbuyerloanparam, idmssupplierparam, 
	loandateparam, loaneridmsuserofficerparam,
	NOW(), 'C');
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `addnewloanv2` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `addnewloanv2`(in idloanofflineparam varchar(128), in descloanparam text, in loaninrpparam double,
	in idmsuserloanparam varchar(32), in idmsbuyerloanparam varchar(32), IN idmssupplierparam VARCHAR(32),
	IN loandateparam datetime, in loaneridmsuserofficerparam varchar(32))
BEGIN
	INSERT INTO trloan 
	(idtrloan, idloanoffline, descloan, loaninrp, 
	idmsuserloan, idmsbuyerloan, idmssupplier, 
	loandate, loaneridmsuserofficer,
	lasttransdate, lasttransact)
	VALUES
	(getuuid(), idloanofflineparam, descloanparam, loaninrpparam, 
	idmsuserloanparam, idmsbuyerloanparam, idmssupplierparam, 
	loandateparam, loaneridmsuserofficerparam,
	NOW(), 'C');
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `addnewloanv3` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `addnewloanv3`(IN idloanofflineparam VARCHAR(128), IN descloanparam TEXT, IN loaninrpparam DOUBLE,
	IN idmsuserloanparam VARCHAR(32), IN idmsbuyerloanparam VARCHAR(32), IN idmssupplierparam VARCHAR(32),
	IN loandateparam DATETIME, IN loaneridmsuserofficerparam VARCHAR(32), IN idmsusercreatorparam VARCHAR(32))
BEGIN
	INSERT INTO trloan 
	(idtrloan, idloanoffline, descloan, loaninrp, 
	idmsuserloan, idmsbuyerloan, idmssupplier, 
	loandate, loaneridmsuserofficer,
	lasttransdate, lasttransact, idmsusercreator)
	VALUES
	(getuuid(), idloanofflineparam, descloanparam, loaninrpparam, 
	idmsuserloanparam, idmsbuyerloanparam, idmssupplierparam, 
	loandateparam, loaneridmsuserofficerparam,
	NOW(), 'C', idmsusercreatorparam);
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `addnewloanv4` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `addnewloanv4`(IN idloanofflineparam VARCHAR(128), IN descloanparam TEXT,
	IN loaninrpparam DOUBLE, IN idmsuserloanparam VARCHAR(32), IN idmsbuyerloanparam VARCHAR(32), IN idmssupplierparam VARCHAR(32),
	IN loandateparam DATETIME, IN loaneridmsuserofficerparam VARCHAR(32), IN idmsusercreatorparam VARCHAR(32),
	IN idmstypeitemloanofflineparam VARCHAR(128), IN unitparam VARCHAR(32), IN priceperunitparam FLOAT)
BEGIN
	DECLARE idfishermanofflineparam VARCHAR(128);
	DECLARE idbuyerofflineparam VARCHAR(128);
	
	IF NOT EXISTS(SELECT * FROM trloan WHERE idloanoffline = idloanofflineparam) THEN
		SET idfishermanofflineparam = (SELECT idfishermanoffline FROM msfisherman WHERE idmsuser = idmsuserloanparam LIMIT 1);
		SET idbuyerofflineparam = (SELECT idbuyeroffline FROM msbuyer WHERE idmsbuyer = idmsbuyerloanparam LIMIT 1);
		
		INSERT INTO trloan 
			(idtrloan, idloanoffline, descloan, loaninrp, 
			idmsuserloan, idmsbuyerloan, idmssupplier, 
			loandate, loaneridmsuserofficer,
			lasttransdate, lasttransact, idmsusercreator, idmstypeitemloanoffline,
			unit, priceperunit,
			idfishermanoffline, idbuyeroffline)
		VALUES
			(getuuid(), idloanofflineparam, descloanparam, loaninrpparam, 
			idmsuserloanparam, idmsbuyerloanparam, idmssupplierparam, 
			loandateparam, loaneridmsuserofficerparam,
			NOW(), 'C', idmsusercreatorparam, idmstypeitemloanofflineparam,
			unitparam, priceperunitparam,
			idfishermanofflineparam, idbuyerofflineparam);
	ELSE
		SELECT 'exists' AS err;
	END IF;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `addnewloanv5` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `addnewloanv5`(
	IN idloanofflineparam VARCHAR(128), IN descloanparam TEXT,
	IN loaninrpparam DOUBLE, IN idmsuserloanparam VARCHAR(32), IN idmsbuyerloanparam VARCHAR(32), IN idmssupplierparam VARCHAR(32),
	IN loandateparam DATETIME, IN loaneridmsuserofficerparam VARCHAR(32), IN idmsusercreatorparam VARCHAR(32),
	IN idmstypeitemloanofflineparam VARCHAR(128), IN unitparam VARCHAR(32), IN priceperunitparam FLOAT,
	IN idfishermanofflineparam VARCHAR(128), IN idbuyerofflineparam VARCHAR(128))
BEGIN
	IF NOT EXISTS(SELECT * FROM trloan WHERE idloanoffline = idloanofflineparam) THEN
	
		INSERT INTO trloan 
			(idtrloan, idloanoffline, descloan, loaninrp, 
			idmsuserloan, idmsbuyerloan, idmssupplier, 
			loandate, loaneridmsuserofficer,
			lasttransdate, lasttransact, idmsusercreator, idmstypeitemloanoffline,
			unit, priceperunit,
			idfishermanoffline, idbuyeroffline)
		VALUES
			(getuuid(), idloanofflineparam, descloanparam, loaninrpparam, 
			idmsuserloanparam, idmsbuyerloanparam, idmssupplierparam, 
			loandateparam, loaneridmsuserofficerparam,
			NOW(), 'C', idmsusercreatorparam, idmstypeitemloanofflineparam,
			unitparam, priceperunitparam,
			idfishermanofflineparam, idbuyerofflineparam);
	ELSE
		SELECT 'exists' AS err;
	END IF;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `addnewltfish` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `addnewltfish`(
	IN isscaapparam TINYINT(4), IN taxocodeparam VARCHAR(13),
	IN threea_codeparam CHAR(3), IN scientific_nameparam VARCHAR(38), IN english_nameparam VARCHAR(30),
	IN french_nameparam VARCHAR(30), IN spanish_nameparam VARCHAR(30), IN authorparam VARCHAR(55),
	IN familyparam VARCHAR(20), IN bio_orderparam VARCHAR(30), IN stats_dataparam TINYINT(1))
BEGIN
	INSERT INTO ltfish 
		(isscaap, taxocode, 
		threea_code, scientific_name, english_name, 
		french_name, spanish_name, author, 
		family, bio_order, stats_data,
		lasttransdate, lasttransact)
		VALUES
		(isscaapparam, taxocodeparam, 
		threea_codeparam, scientific_nameparam, english_nameparam, 
		french_nameparam, spanish_nameparam, authorparam, 
		familyparam, bio_orderparam, stats_dataparam,
		NOW(), 'C');
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `addnewsail` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `addnewsail`(in idmsshipparam varchar(32), 
		in sailpositionparam varchar(32), in sailingdateparam datetime, 
		in idmslandingsiteparam varchar(32), in idmsfishermanparam varchar(32),
		IN idmssupplierparam VARCHAR(32))
BEGIN
	DECLARE idvar VARCHAR(32);
	SET idvar = (SELECT getuuid());
	INSERT INTO trsail 
		(idtrsail, idmsship, 
		sailposition, sailingdate, 
		idmslandingsite, idmsfisherman, idmssupplier, 
		lasttransdate, lasttransact)
		VALUES
		(idvar, idmsshipparam, 
		sailpositionparam, sailingdateparam, 
		idmslandingsiteparam, idmsfishermanparam, idmssupplierparam,
		NOW(), 'C');
	SELECT idvar AS id;
    END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `addnewship` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `addnewship`(IN `idshipofflineparam` VARCHAR(128), IN `vesselname_paramparam` VARCHAR(64), IN `vessellicensenumber_paramparam` VARCHAR(32), IN `vessellicenseexpiredate_paramparam` DATE, IN `fishinglicensenumber_paramparam` VARCHAR(32), IN `fishinglicenseexpiredate_paramparam` DATE, IN `vesselsize_paramparam` INT, IN `vesselflag_paramparam` VARCHAR(2), IN `vesselgeartype_paramparam` VARCHAR(128), IN `vesseldatemade_paramparam` DATE, IN `vesselownername_paramparam` VARCHAR(128), IN `vesselownerid_paramparam` VARCHAR(32), IN `vesselownerphone_paramparam` VARCHAR(20), IN `vesselownersex_paramparam` VARCHAR(1), IN `vesselownerdob_paramparam` DATE, IN `vesselowneraddress_paramparam` TEXT, IN `idmsuserparamparam` VARCHAR(32))
BEGIN
	INSERT INTO msship 
		(idmsship, idshipoffline, 
		vesselname_param, vessellicensenumber_param, 
		vessellicenseexpiredate_param, fishinglicensenumber_param, 
		fishinglicenseexpiredate_param, 
		vesselsize_param, vesselflag_param, 
		vesselgeartype_param, vesseldatemade_param, 
		vesselownername_param, vesselownerid_param, 
		vesselownerphone_param,	vesselownersex_param, 
		vesselownerdob_param, vesselowneraddress_param, 
		idmsuserparam, 
		lasttransdate, lasttransact
		)
		VALUES
		(getuuid(), idshipofflineparam, 
		vesselname_paramparam, vessellicensenumber_paramparam, 
		vessellicenseexpiredate_paramparam, fishinglicensenumber_paramparam, 
		fishinglicenseexpiredate_paramparam, 
		vesselsize_paramparam, vesselflag_paramparam, 
		vesselgeartype_paramparam, vesseldatemade_paramparam, 
		vesselownername_paramparam, vesselownerid_paramparam, 
		vesselownerphone_paramparam, vesselownersex_paramparam, 
		vesselownerdob_paramparam, vesselowneraddress_paramparam, 
		getidsupplierbossbyidmsuser(idmsuserparamparam), 
		NOW(), 'C');
    END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `addnewshipv3` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `addnewshipv3`(IN `idshipofflineparam` VARCHAR(128), IN `vesselname_paramparam` VARCHAR(64), 
IN `vessellicensenumber_paramparam` VARCHAR(32), IN `vessellicenseexpiredate_paramparam` DATE, 
IN `fishinglicensenumber_paramparam` VARCHAR(32), IN `fishinglicenseexpiredate_paramparam` DATE, 
IN `vesselsize_paramparam` INT, IN `vesselflag_paramparam` VARCHAR(2), 
IN `vesselgeartype_paramparam` VARCHAR(128), IN `vesseldatemade_paramparam` DATE, 
IN `vesselownername_paramparam` VARCHAR(128), IN `vesselownerid_paramparam` VARCHAR(32), 
IN `vesselownerphone_paramparam` VARCHAR(20), IN `vesselownersex_paramparam` VARCHAR(1), 
IN `vesselownerdob_paramparam` DATE, IN `vesselowneraddress_paramparam` TEXT, 
IN `idmsuserparamparam` VARCHAR(32),
IN vesselownerprovince_paramparam VARCHAR(32), IN vesselownerdistrict_paramparam VARCHAR(32),
IN vesselownercity_paramparam VARCHAR(32), IN vesselownercountry_paramparam VARCHAR(32), IN vessel_idparam VARCHAR(128)
)
BEGIN
	IF NOT EXISTS(SELECT * FROM msship WHERE idshipoffline = idshipofflineparam) THEN
		INSERT INTO msship 
			(idmsship, idshipoffline, 
			vesselname_param, vessellicensenumber_param, 
			vessellicenseexpiredate_param, fishinglicensenumber_param, 
			fishinglicenseexpiredate_param, 
			vesselsize_param, vesselflag_param, 
			vesselgeartype_param, vesseldatemade_param, 
			vesselownername_param, vesselownerid_param, 
			vesselownerphone_param,	vesselownersex_param, 
			vesselownerdob_param, vesselowneraddress_param, 
			idmsuserparam, 
			lasttransdate, lasttransact,
			vesselownerprovince_param, vesselownerdistrict_param,
			vesselownercity_param, vesselownercountry_param, vessel_id
			)
			VALUES
			(getuuid(), idshipofflineparam, 
			vesselname_paramparam, vessellicensenumber_paramparam, 
			vessellicenseexpiredate_paramparam, fishinglicensenumber_paramparam, 
			fishinglicenseexpiredate_paramparam, 
			vesselsize_paramparam, vesselflag_paramparam, 
			vesselgeartype_paramparam, vesseldatemade_paramparam, 
			vesselownername_paramparam, vesselownerid_paramparam, 
			vesselownerphone_paramparam, vesselownersex_paramparam, 
			vesselownerdob_paramparam, vesselowneraddress_paramparam, 
			getidsupplierbossbyidmsuser(idmsuserparamparam), 
			NOW(), 'C',
			vesselownerprovince_paramparam, vesselownerdistrict_paramparam,
			vesselownercity_paramparam, vesselownercountry_paramparam, vessel_idparam);
	ELSE
		SELECT 'exists' AS err;
	END IF;
    END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `addnewsupplier` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `addnewsupplier`(IN idparam VARCHAR(32), IN nameparam VARCHAR(191),
							IN idltusertypeparam INT, IN langparam VARCHAR(2), IN activeparam INT, 
							IN natidparam VARCHAR(2), IN supplieridparam VARCHAR(128),
							IN genreparam VARCHAR(1), IN addressparam VARCHAR(128),
							IN provinceparam VARCHAR(64), IN cityparam VARCHAR(64), IN districtparam VARCHAR(64),
							IN businesslicenseparam VARCHAR(128), IN personalidcardparam VARCHAR(64),
							IN supplieridexpiredlicensedateparam DATE
							)
BEGIN
	DECLARE iduserparam VARCHAR(32);
	
	
	SET iduserparam = (SELECT getuuid());	
				     
	INSERT INTO msuser (idmsuser, NAME, id,
			idltusertype, lasttransdate, lasttransact, defaultlanguage, active)
		VALUES (iduserparam, nameparam, idparam,
			idltusertypeparam, NOW(), 'C', langparam, activeparam);

	INSERT INTO mssupplier (idmssupplier, idmsuser, suppliernatid, 
				supplierid, lasttransdate, lasttransact, 
				genre, address, businesslicense, 
				personalidcard, province, city, 
				district, supplieridexpiredlicensedate)
			VALUES (getuuid(), iduserparam, natidparam, 
				supplieridparam, NOW(), 'C', 
				genreparam, addressparam, businesslicenseparam, 
				personalidcardparam, provinceparam, cityparam, 
				districtparam, supplieridexpiredlicensedateparam);
    END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `addnewsupplierofficer` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `addnewsupplierofficer`(IN idmssupplierparam VARCHAR(32), IN nameparam VARCHAR(128),
IN cityparam VARCHAR(32), IN addressparam VARCHAR(32), IN idparam INT, IN bodparam DATETIME,
IN idltusertypeparam INT, IN langparam VARCHAR(2), IN accessparam VARCHAR(10), IN accessroleparam VARCHAR(32))
BEGIN
	DECLARE iduserparam VARCHAR(32);
	SET iduserparam = (SELECT getuuid());
	INSERT INTO msuser (idmsuser, NAME, id, bod, idltusertype, lasttransdate, lasttransact, defaultlanguage)
		VALUES (iduserparam, nameparam, idparam, bodparam, idltusertypeparam, NOW(), 'C', langparam);
	INSERT INTO mssupplierofficer (idmssupplierofficer, idmssupplier, idmsuser, lasttransdate, lasttransact, accesspage, accessrole)
		VALUES (getuuid(), idmssupplierparam, iduserparam, NOW(), 'C', accessparam, accessroleparam);
    END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `addnewsuppliertemp` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `addnewsuppliertemp`(
	IN nameparam VARCHAR(128), IN usernameparam VARCHAR(128),
	IN emailparam VARCHAR(128), IN phonenumberparam VARCHAR(16),
	IN supplieridparam VARCHAR(10), IN passwordparam VARCHAR(128),
	IN natidparamparam VARCHAR(2), IN langparam VARCHAR(2), IN genreparam VARCHAR(1),
	IN addressparam VARCHAR(128), IN cityparam VARCHAR(64), IN districtparam VARCHAR(64),
	IN provinceparam VARCHAR(64), IN businesslicenseparam VARCHAR(64), IN personalidcardparam VARCHAR(64),
	IN supplieridexpiredlicensedateparam DATE)
BEGIN
	INSERT INTO trafiz.mssuppliertemp 
		(idmssuppliertemp, 
		NAME, username, 
		email, phonenumber, 
		supplierid, PASSWORD, 
		natidtype, lang, 
		lasttransdate, lasttransact, 
		genre, 
		address, city, 
		district, province, 
		businesslicense, personalidcard,
		supplieridexpiredlicensedate
		)
		VALUES
		(getuuid(),
		nameparam, usernameparam,
		emailparam, phonenumberparam,
		supplieridparam, passwordparam, 
		natidparamparam, langparam, 
		NOW(), 'C',
		genreparam, 
		addressparam, cityparam, 
		districtparam, provinceparam, 
		businesslicenseparam, personalidcardparam,
		supplieridexpiredlicensedateparam
		);
    END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `addnewtrbatchdeliverysheet` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `addnewtrbatchdeliverysheet`(
	IN deliverysheetnoparam VARCHAR(128),
	IN nationalregistrationsuppliercodeparam VARCHAR(32),
	IN suppliernameparam VARCHAR(64),
	IN idmssupplierparam VARCHAR(32),
	IN deliverydateparam DATE,
	IN numberoffishorloinparam INT(11),
	IN totalweightparam FLOAT,
	IN sellpriceparam FLOAT,
	IN notesparam TEXT,
	IN idmsusercreatorparam VARCHAR(32),
	IN buyeridparam VARCHAR(128),
	IN buyernameparam VARCHAR(128))
BEGIN
	IF NOT EXISTS(SELECT * FROM trbatchdeliverysheet WHERE deliverysheetno = deliverysheetnoparam) THEN
		INSERT INTO trbatchdeliverysheet 
			(idtrbatchdeliverysheet, 
			deliverysheetno, nationalregistrationsuppliercode, 
			suppliername, idmssupplier, 
			deliverydate, numberoffishorloin, 
			totalweight, sellprice, notes, 
			lasttransdate, lasttransact, 
			idmsusercreator, buyerid, buyername
			)
			VALUES
			(getuuid(), 
			deliverysheetnoparam, nationalregistrationsuppliercodeparam, 
			suppliernameparam, idmssupplierparam, 
			deliverydateparam, numberoffishorloinparam, 
			totalweightparam, sellpriceparam, 
			notesparam, 
			NOW(), 'C', 
			idmsusercreatorparam,
			buyeridparam, buyernameparam);
	ELSE
		SELECT 'exists' AS err;
	END IF;
    END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `addnewtrbatchdeliverysheetfishdata` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `addnewtrbatchdeliverysheetfishdata`(
IN deliverysheetnoparam VARCHAR(32),
IN idtrfishcatchparam VARCHAR(32),
IN idtrfishcatchofflineparam VARCHAR(64),
IN amountparam FLOAT,
IN gradeparam VARCHAR(32),
IN descriptionparam TEXT,
IN idfishparam VARCHAR(32),
IN idtrcatchofflineparam VARCHAR(128),
IN fishnameengparam VARCHAR(64),
IN fishnameindparam VARCHAR(64),
IN unitnameparam VARCHAR(32),
IN speciesparam VARCHAR(64),
IN vesselnameparam VARCHAR(32),
IN vesselsizeparam FLOAT,
IN vesselregistrationnoparam VARCHAR(32),
IN expireddateparam DATE,
IN vesselflagparam VARCHAR(3),
IN fishinggroundparam VARCHAR(32),
IN landingsiteparam VARCHAR(32),
IN geartypeparam VARCHAR(64),
IN catchdateparam DATE,
IN fishermannameparam VARCHAR(64),
IN landingdateparam DATE,
IN fadusedparam VARCHAR(32),
IN sellpriceparam FLOAT,
IN idmsusercreatorparam VARCHAR(32)
    )
BEGIN
	IF NOT EXISTS(SELECT 	*
				FROM trbatchdeliverysheetfishdata
				WHERE deliverysheetno = deliverysheetnoparam AND
				idtrfishcatchoffline = idtrfishcatchofflineparam AND
				idtrcatchoffline = idtrcatchofflineparam) THEN
		INSERT INTO trbatchdeliverysheetfishdata 
			(idtrbatchdeliverysheetfishdata, 
			deliverysheetno, 
			idtrfishcatch, idtrfishcatchoffline, 
			amount, grade, description, 
			idfish, idtrcatchoffline, 
			fishnameeng, fishnameind, 
			unitname, species, 
			vesselname, vesselsize, 
			vesselregistrationno, expireddate,
			vesselflag, fishingground, 
			landingsite, geartype, 
			catchdate, fishermanname, 
			landingdate, fadused, sellprice, 
			lasttransdate, lasttransact, 
			idmsusercreator)
			VALUES
			(getuuid(), 
			deliverysheetnoparam, 
			idtrfishcatchparam, idtrfishcatchofflineparam, 
			amountparam, gradeparam, descriptionparam, 
			idfishparam, idtrcatchofflineparam, 
			fishnameengparam, fishnameindparam, 
			unitnameparam, speciesparam, 
			vesselnameparam, vesselsizeparam, 
			vesselregistrationnoparam, expireddateparam, 
			vesselflagparam, fishinggroundparam, 
			landingsiteparam, geartypeparam, 
			catchdateparam, fishermannameparam, 
			landingdateparam, fadusedparam, sellpriceparam, 
			NOW(), 'C', 
			idmsusercreator);
	ELSE
		SELECT 'exists' AS err;
	END IF;
    END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `addnewtypeitemloan` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `addnewtypeitemloan`(IN idmstypeitemloanofflineparam VARCHAR(128), IN typenameparam VARCHAR(32), 
	IN unitparam VARCHAR(32), IN priceperunitparam FLOAT, IN idmssupplierparam VARCHAR(32), IN idmsuserparam VARCHAR(32))
BEGIN
	IF NOT EXISTS(SELECT * FROM mstypeitemloan WHERE idmstypeitemloanoffline = idmstypeitemloanofflineparam) THEN
		INSERT INTO mstypeitemloan 
			(idmstypeitemloan, idmstypeitemloanoffline, 
			typename, unit, 
			priceperunit, idmssupplier,
			lasttransdate, lasttransact, idmsusercreator, idmsuserlasttrans)
			VALUES
			(getuuid(), 
			idmstypeitemloanofflineparam, 
			typenameparam, unitparam, 
			priceperunitparam, idmssupplierparam,
			NOW(), 'C', idmsuserparam, idmsuserparam);
	ELSE
		SELECT 'exists' AS err;
	END IF;
    END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `addnewuser` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `addnewuser`(IN nameparam VARCHAR(128), IN cityparam VARCHAR(32), IN addressparam VARCHAR(32), IN idparam INT, IN bodparam DATETIME, IN idltusertypeparam INT, IN langparam VARCHAR(2))
BEGIN
	INSERT INTO msuser (idmsuser, NAME, id, bod, idltusertype, lasttransdate, lasttransact, defaultlanguage)
		VALUES (getuuid(), nameparam, idparam, bodparam, idltusertypeparam, NOW(), 'C', langparam);
    END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `addpayloan` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `addpayloan`(in idmsuserloanparam varchar(32), IN idmsbuyerloanparam VARCHAR(32),
	IN idmssupplierparam VARCHAR(32), in descparam text, in rpparam double,
	IN paiddateparam datetime, IN paidoffidmsuserofficerparam VARCHAR(32))
BEGIN
	INSERT INTO trpayloan 
		(idtrpayloan, idmsuserloan, idmsbuyerloan, idmssupplier, descloan, loaninrp, 
		paidoffdate, paidoffidmsuserofficer, 
		lasttransdate, lasttransact)
	VALUES
		(getuuid(), idmsuserloanparam, idmsbuyerloanparam, idmssupplierparam, descparam, rpparam, 
		paiddateparam, paidoffidmsuserofficerparam,
		now(), 'C');
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `addpayloanv2` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `addpayloanv2`(in idpayloanofflineparam varchar(128), in idmsuserloanparam varchar(32),
	IN idmsbuyerloanparam VARCHAR(32),
	IN idmssupplierparam VARCHAR(32), in descparam text, in rpparam double,
	IN paiddateparam datetime, IN paidoffidmsuserofficerparam VARCHAR(32))
BEGIN
	INSERT INTO trpayloan 
		(idtrpayloan, idpayloanoffline, idmsuserloan, idmsbuyerloan, idmssupplier, descloan, loaninrp, 
		paidoffdate, paidoffidmsuserofficer, 
		lasttransdate, lasttransact)
	VALUES
		(getuuid(), idpayloanofflineparam, idmsuserloanparam, idmsbuyerloanparam, idmssupplierparam, descparam, rpparam, 
		paiddateparam, paidoffidmsuserofficerparam,
		now(), 'C');
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `addpayloanv3` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `addpayloanv3`(IN idpayloanofflineparam VARCHAR(128), IN idmsuserloanparam VARCHAR(32),
	IN idmsbuyerloanparam VARCHAR(32),
	IN idmssupplierparam VARCHAR(32), IN descparam TEXT, IN rpparam DOUBLE,
	IN paiddateparam DATETIME, IN paidoffidmsuserofficerparam VARCHAR(32), IN idmsusercreatorparam VARCHAR(32))
BEGIN
	IF NOT EXISTS(SELECT * FROM trpayloan WHERE idpayloanoffline = idpayloanofflineparam) THEN
		INSERT INTO trpayloan 
			(idtrpayloan, idpayloanoffline, idmsuserloan, idmsbuyerloan, idmssupplier, descloan, loaninrp, 
			paidoffdate, paidoffidmsuserofficer, 
			lasttransdate, lasttransact, idmsusercreator)
		VALUES
			(getuuid(), idpayloanofflineparam, idmsuserloanparam, idmsbuyerloanparam, idmssupplierparam, descparam, rpparam, 
			paiddateparam, paidoffidmsuserofficerparam,
			NOW(), 'C', idmsusercreatorparam);
	ELSE
		SELECT 'exists' AS err;
	END IF;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `addpayloanv4` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `addpayloanv4`(IN idpayloanofflineparam VARCHAR(128), IN idmsuserloanparam VARCHAR(32),
	IN idmsbuyerloanparam VARCHAR(32),
	IN idmssupplierparam VARCHAR(32), IN descparam TEXT, IN rpparam DOUBLE,
	IN paiddateparam DATETIME, IN paidoffidmsuserofficerparam VARCHAR(32), IN idmsusercreatorparam VARCHAR(32),
	IN idfishermanofflineparam VARCHAR(128), IN idbuyerofflineparam VARCHAR(128))
BEGIN
	IF NOT EXISTS(SELECT * FROM trpayloan WHERE idpayloanoffline = idpayloanofflineparam) THEN
		INSERT INTO trpayloan 
			(idtrpayloan, idpayloanoffline, idmsuserloan, idmsbuyerloan, idmssupplier, descloan, loaninrp, 
			paidoffdate, paidoffidmsuserofficer, 
			lasttransdate, lasttransact, idmsusercreator, idfishermanoffline, idbuyeroffline)
		VALUES
			(getuuid(), idpayloanofflineparam, idmsuserloanparam, idmsbuyerloanparam, idmssupplierparam, descparam, rpparam, 
			paiddateparam, paidoffidmsuserofficerparam,
			NOW(), 'C', idmsusercreatorparam, idfishermanofflineparam, idbuyerofflineparam);
	ELSE
		SELECT 'exists' AS err;
	END IF;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `addshipcrew` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `addshipcrew`(in idmsfishermanparam varchar(32), in idtrsailparam varchar(32))
BEGIN
	DECLARE idvar VARCHAR(32);
	SET idvar = (SELECT getuuid());
	INSERT INTO trshipcrew 
		(idtrshipcrew, idmsfisherman, idtrsail)
		VALUES
		(idvar, idmsfishermanparam, idtrsailparam);
	SELECT idvar AS id;
    END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `addsyncdata` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `addsyncdata`(IN `synctypeparam` VARCHAR(7), IN `functiontypeparam` VARCHAR(20), IN `functionnameparam` VARCHAR(64), IN `paramparam` LONGTEXT, IN `descdataparam` LONGTEXT, IN `transdateparam` DATETIME, IN `idmsuserparam` VARCHAR(32), IN `idtrjsonparam` VARCHAR(32))
BEGIN
	INSERT INTO trsyncdata (idtrssyncdata, synctype,
				functiontype, functionname, param,
				descdata, transdate, idmsuser, idtrsyncjson)
			VALUES (getuuid(), synctypeparam, 
				functiontypeparam, functionnameparam, paramparam, 
				descdataparam, transdateparam, idmsuserparam, idtrjsonparam);
    END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `addsyncjson` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `addsyncjson`(IN `idmsuserparam` VARCHAR(32), IN `dataparam` LONGTEXT)
BEGIN
	declare idvar varchar(32);
	set idvar = (select getuuid());
	INSERT INTO trsyncjson (idtrsyncjson, idmsuser, DATA, transdate)
			VALUES (idvar, idmsuserparam, dataparam, NOW());
	select idvar as id;
    END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `addtrsyncfailed` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `addtrsyncfailed`(IN `idmsuserparam` VARCHAR(128), IN `jsonparam` LONGTEXT, IN `idtrsyncjsonparam` VARCHAR(128), IN `functionnameparam` VARCHAR(128), IN `texterrparam` LONGTEXT, IN `functionindexparam` INT)
BEGIN
	INSERT INTO trsyncfailed 
		(idtrsyncfailed, idmsuser, 
		jsondata, idtrsyncjson,
		functionname, texterr, functionindex,
		lasttransdate)
		VALUES
		(getuuid(), idmsuserparam, 
		jsonparam, idtrsyncjsonparam,
		functionnameparam, texterrparam, functionindexparam,
		NOW());
    END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `cancelpayloan` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `cancelpayloan`(in idtrloanparam varchar(32))
BEGIN
	update trloan
		set paidoffdate = null,
		paidoffidmsuserofficer = null,
		lasttransdate = now(),
		lasttransact = 'U'
		where idtrloan = idtrloanparam;
    END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `cancelpayloanv2` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `cancelpayloanv2`(in idloanofflineparam varchar(128))
BEGIN
	update trloan
		set paidoffdate = null,
		paidoffidmsuserofficer = null,
		lasttransdate = now(),
		lasttransact = 'U'
		where idloanoffline = idloanofflineparam;
    END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `cancelpayloanv3` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `cancelpayloanv3`(IN idloanofflineparam VARCHAR(128), IN idmsusertrans VARCHAR(32))
BEGIN
	UPDATE trloan
		SET paidoffdate = NULL,
		paidoffidmsuserofficer = NULL,
		lasttransdate = NOW(),
		lasttransact = 'U',
		idmsuserlasttrans = idmsusertrans
		WHERE idloanoffline = idloanofflineparam;
    END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `createdeliverysheet` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `createdeliverysheet`(
	IN deliverysheetofflineidparam TEXT, IN savedtextparam TEXT)
BEGIN
	IF NOT EXISTS(SELECT * FROM trdeliverysheet WHERE deliverysheetofflineid = deliverysheetofflineidparam) THEN
		INSERT INTO trdeliverysheet 
			(idtrdeliverysheetno, 
			deliverysheetofflineid, savedtext, 
			lasttransdate, lasttransact
			)
			VALUES
			(getuuid(), 
			deliverysheetofflineidparam, savedtextparam, 
			NOW(), 'C');
	ELSE
		SELECT 'exists' AS err;
	END IF;
    END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `deletebuyer` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `deletebuyer`(in idbuyerofflineparam varchar(128))
BEGIN
	update msbuyer 
		set lasttransdate = now(),
		lasttransact = 'D'
		WHERE idbuyeroffline = idbuyerofflineparam;
    END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `deletecatch` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `deletecatch`(IN idtrcatchparam VARCHAR(128))
BEGIN
	UPDATE trcatch 
		SET
		lasttransdate = NOW(), 
		lasttransact = 'D'
		WHERE
		idtrcatchoffline = idtrcatchofflineparam AND closeparam = 0;
    END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `deletecatchv3` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `deletecatchv3`(IN idtrcatchofflineparam VARCHAR(128), IN idmsusercreatorparam VARCHAR(32))
BEGIN
	UPDATE trcatch 
		SET
		lasttransdate = NOW(), 
		lasttransact = 'D',
		idmsuserlasttrans = idmsusercreatorparam
		WHERE
		idtrcatchoffline = idtrcatchofflineparam AND closeparam = 0;
    END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `deletedelivery` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `deletedelivery`(IN iddeliveryofflineparam VARCHAR(128))
BEGIN
	DECLARE idtrfishcatchparam VARCHAR(32);
	SET idtrfishcatchparam = (SELECT idtrfishcatch FROM trdelivery WHERE idtrdelivery = iddeliveryofflineparam);
	
	UPDATE 	trdelivery 
		SET
		lasttransdate = NOW(), 
		lasttransact = 'D'
		WHERE
		iddeliveryoffline = iddeliveryofflineparam;
	UPDATE trfishcatch
		SET sendtobuyerdate = NULL,
		lasttransdate = NOW(),
		lasttransact = 'U'
		WHERE idtrfishcatch = idtrfishcatchparam;
    END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `deletedeliverysheet` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `deletedeliverysheet`(
	IN deliverysheetofflineidparam TEXT)
BEGIN
	UPDATE trdeliverysheet 
		SET
		lasttransdate = now(), 
		lasttransact = 'D'
		WHERE
		deliverysheetofflineid = deliverysheetofflineidparam;
    END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `deletedeliveryv3` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `deletedeliveryv3`(IN iddeliveryofflineparam VARCHAR(128), IN idmsusercreatorparam VARCHAR(32))
BEGIN
	DECLARE idtrfishcatchparam VARCHAR(32);
	SET idtrfishcatchparam = (SELECT idtrfishcatch FROM trdelivery WHERE idtrdelivery = iddeliveryofflineparam);
	
	UPDATE 	trdelivery 
		SET
		lasttransdate = NOW(), 
		lasttransact = 'D',
		idmsuserlasttrans = idmsusercreatorparam
		WHERE
		iddeliveryoffline = iddeliveryofflineparam;
	UPDATE trfishcatch
		SET sendtobuyerdate = NULL,
		lasttransdate = NOW(),
		lasttransact = 'U',
		idmsuserlasttrans = idmsusercreatorparam
		WHERE idtrfishcatch = idtrfishcatchparam;
    END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `deletefish` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `deletefish`(IN idfishofflineparam VARCHAR(128))
BEGIN
	UPDATE msfish 
		SET lasttransdate = NOW(),
		lasttransact = 'D'
		WHERE idfishoffline = idfishofflineparam;
    END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `deletefishcatch` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `deletefishcatch`(IN idtrfishcatchofflineparam VARCHAR(128))
BEGIN
	UPDATE trfishcatch 
		SET
		lasttransdate = NOW(), 
		lasttransact = 'D'
		WHERE
		idtrfishcatchoffline = idtrfishcatchofflineparam;
    END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `deletefishcatchv3` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `deletefishcatchv3`(IN idtrfishcatchofflineparam VARCHAR(128), IN idmsusercreatorparam VARCHAR(32))
BEGIN
	UPDATE trfishcatch 
		SET
		lasttransdate = NOW(), 
		lasttransact = 'D',
		idmsuserlasttrans = idmsusercreatorparam
		WHERE
		idtrfishcatchoffline = idtrfishcatchofflineparam;
    END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `deletefishconfig` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `deletefishconfig`(in idtrfishconfigparam varchar(32))
BEGIN
	UPDATE trfishconfig 
		SET
		lasttransact = 'D'
		WHERE
		idtrfishconfig = idtrfishconfigparam;
    END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `deletefisherman` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `deletefisherman`(IN idfishermanofflineparam VARCHAR(128))
BEGIN
	DECLARE idmsuserparam VARCHAR(32);
	SET idmsuserparam = (SELECT idmsuser FROM msfisherman WHERE idfishermanoffline = idfishermanofflineparam);
	
	update msfisherman
		set
		lasttransdate = now(),
		lasttransact = 'D'
		WHERE idfishermanoffline = idfishermanofflineparam;
	update msuser
		set
		lasttransdate = NOW(),
		lasttransact = 'D'
		WHERE idmsuser = idmsuserparam;
    END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `deletefishpriceconfig` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `deletefishpriceconfig`(in idtrfishpriceconfigparam varchar(32))
BEGIN
	UPDATE trfishpriceconfig 
		SET
		lasttransdate = now(),
		lasttransact = 'D'
		WHERE
		idtrfishpriceconfig = idtrfishpriceconfigparam;
    END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `deleteloan` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `deleteloan`(in idparam varchar(32))
BEGIN
	update trloan
		set
		lasttransdate = now(),
		lasttransact = 'D'
		where idtrloan = idparam;
    END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `deleteloanv2` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `deleteloanv2`(in idparam varchar(128))
BEGIN
	update trloan
		set
		lasttransdate = now(),
		lasttransact = 'D'
		where idloanoffline = idparam;
    END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `deleteloanv3` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `deleteloanv3`(IN idparam VARCHAR(128), IN idmsusertrans VARCHAR(32))
BEGIN
	UPDATE trloan
		SET
		lasttransdate = NOW(),
		lasttransact = 'D',
		idmsuserlasttrans = idmsusertrans
		WHERE idloanoffline = idparam;
    END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `deleteltfish` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `deleteltfish`(IN idltfishparam INT)
BEGIN
	UPDATE ltfish 
		SET lasttransdate = NOW(),
		lasttransact = 'D'
		WHERE idltfish = idltfishparam ;
    END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `deleteofficer` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `deleteofficer`(in idparam VARCHAR(32))
BEGIN
	declare idvar int;
	UPDATE msuser
		SET lasttransdate = NOW(),
		lasttransact = 'D'
		WHERE idmsuser = idparam;
	set idvar = (select id from msuser where idmsuser = idparam);
	DELETE FROM users WHERE id = idvar;
    END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `deletepayloan` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `deletepayloan`(in idparam varchar(32))
BEGIN
	update trpayloan
		set
		lasttransdate = now(),
		lasttransact = 'D'
		where idtrpayloan = idparam;
    END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `deletepayloanv2` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `deletepayloanv2`(in idparam varchar(128))
BEGIN
	update trpayloan
		set
		lasttransdate = now(),
		lasttransact = 'D'
		where idpayloanoffline = idparam;
    END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `deletepayloanv3` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `deletepayloanv3`(IN idparam VARCHAR(128), IN idmsusertrans VARCHAR(32))
BEGIN
	UPDATE trpayloan
		SET
		lasttransdate = NOW(),
		lasttransact = 'D',
		idmsuserlasttrans = idmsusertrans
		WHERE idpayloanoffline = idparam;
    END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `deletesail` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `deletesail`(in idtrsailparam varchar(32))
BEGIN
	update trsail 
		set lasttransdate = now(),
		lasttransact = 'D'
		WHERE
		idtrsail = idtrsailparam;
    END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `deleteship` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `deleteship`(in idshipofflineparam varchar(128))
BEGIN
	update msship
		set
		lasttransdate = now(),
		lasttransact = 'D'
		WHERE idshipoffline = idshipofflineparam;
    END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `deleteshipcrew` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `deleteshipcrew`(IN idtrshipcrewparam VARCHAR(32))
BEGIN
	update trshipcrew
		set 
		lasttransdate = now(),
		lasttransact = 'D'
		WHERE
		idtrshipcrew = idtrshipcrewparam;
    END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `deletesupplier` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `deletesupplier`(IN idparam VARCHAR(32))
BEGIN
	DECLARE idmsuserparam VARCHAR(32);
	SET idmsuserparam = (SELECT idmsuser FROM msuser WHERE id = idparam);
	
	UPDATE msuser
		SET lasttransdate = NOW(),
		lasttransact = 'D'
		WHERE idmsuser = idmsuserparam;
	UPDATE mssupplier
		SET lasttransdate = NOW(),
		lasttransact = 'D'
		WHERE idmsuser = idmsuserparam;
	
	DELETE FROM users WHERE id = idparam;
    END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `deletesupplierofficer` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `deletesupplierofficer`(in idparam VARCHAR(32))
BEGIN
	declare idvar int;
	UPDATE msuser
		SET lasttransdate = NOW(),
		lasttransact = 'D'
		WHERE idmsuser = idparam;
	UPDATE mssupplierofficer
		SET lasttransdate = NOW(),
		lasttransact = 'D'
		WHERE idmsuser = idparam;
	set idvar = (select id from msuser where idmsuser = idparam);
	DELETE FROM users WHERE id = idvar;
    END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `deletetrbatchdeliverysheet` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `deletetrbatchdeliverysheet`(IN idmsuserparam VARCHAR(32), IN deliverysheetnoparam VARCHAR(32))
BEGIN
	UPDATE 	trbatchdeliverysheet
		SET lasttransact = 'D',
		lasttransdate = NOW(),
		idmsuserlasttrans = idmsuserparam
	WHERE deliverysheetno = deliverysheetnoparam;
    END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `deletetrbatchdeliverysheetfishdata` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`phpmyadmin`@`localhost` PROCEDURE `deletetrbatchdeliverysheetfishdata`(IN idmsuserparam VARCHAR(32), IN deliverysheetnoparam VARCHAR(32))
BEGIN
	UPDATE 	trbatchdeliverysheetfishdata 
	SET lasttransact = 'U',
	lasttransdate = NOW(),
	idmsuserlasttrans = idmsuserparam
	WHERE deliverysheetno = deliverysheetnoparam;
    END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `deletetypeitemloan` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `deletetypeitemloan`(IN idmstypeitemloanofflineparam VARCHAR(128), IN idmsuserparam VARCHAR(32))
BEGIN
	UPDATE 	mstypeitemloan
	SET lasttransdate = NOW(), 
		lasttransact = 'D', 
		idmsuserlasttrans = idmsuserparam
	WHERE
		idmstypeitemloanoffline = idmstypeitemloanofflineparam;
    END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `getactivemsuser` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `getactivemsuser`(IN `idparam` INT)
BEGIN
	DECLARE idVar VARCHAR(32);
	DECLARE idsupplierVar VARCHAR(32);
	DECLARE idsupplierofficerVar VARCHAR(32);
	DECLARE supplieridVar VARCHAR(128);
	DECLARE accesspageVar VARCHAR(10);
	DECLARE accessRoleVar VARCHAR(10);
	DECLARE defLang VARCHAR(2);
	
	SET idVar = (SELECT idmsuser FROM msuser WHERE id = idparam AND active = 1 AND lasttransact <> 'D' LIMIT 1); 
	SET defLang = (SELECT defaultlanguage FROM msuser WHERE id = idparam AND lasttransact <> 'D' LIMIT 1); 
	IF (idVar IS NOT NULL) THEN 
		SET idsupplierVar = (SELECT idmssupplier FROM mssupplier WHERE idmsuser = idVar AND lasttransact <> 'D' LIMIT 1);
		SET idsupplierofficerVar = (SELECT idmssupplierofficer FROM mssupplierofficer WHERE idmsuser = idVar AND lasttransact <> 'D' LIMIT 1);
		SET supplieridVar = (SELECT supplierid FROM mssupplier WHERE idmsuser = idVar AND lasttransact <> 'D' LIMIT 1);
        
		IF (idsupplierVar IS NOT NULL) THEN 
			SET accesspageVar = (SELECT '1;2;3');
			SET accessRoleVar = (SELECT 1);
		ELSE
        	SET supplieridVar = (SELECT b.supplierid FROM mssupplierofficer a LEFT JOIN mssupplier b ON a.idmssupplier = b.idmssupplier WHERE a.idmsuser = idVar AND a.lasttransact <> 'D' AND b.lasttransact <> 'D' LIMIT 1);
            
			SET idsupplierVar = (SELECT idmssupplier FROM mssupplierofficer WHERE idmsuser = idVar AND lasttransact <> 'D' LIMIT 1);
			SET accesspageVar = (SELECT accesspage FROM mssupplierofficer WHERE idmsuser = idVar AND lasttransact <> 'D' LIMIT 1);
			SET accessRoleVar = (SELECT accessrole FROM mssupplierofficer WHERE idmsuser = idVar AND lasttransact <> 'D' LIMIT 1);
            
		END IF;

		SELECT 	idmsuser, idltusertype, NULL AS sessionid, 'ok' AS err,
			defaultlanguage AS lang,
			idsupplierVar AS idmssupplier,
			idsupplierofficerVar AS idmssupplierofficer,
			accesspageVar AS accesspage,
			supplieridVar AS supplierid,
			accessRoleVar AS accessrole
			FROM msuser
			WHERE id = idparam
			LIMIT 1;
	ELSE
		SELECT NULL AS idmsuser, NULL AS idltusertype, NULL AS sessionid, 'nope' AS err,
			defLang AS lang,
			'' AS idmssupplier,
			'' AS idmssupplierofficer,
			'' AS accesspage,
			'' AS accessrole,
			'' AS supplierid;
	END IF;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `getactivemsuserqrcode` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `getactivemsuserqrcode`(in idparam int, in qrcodeid varchar(32))
BEGIN
	DECLARE idVar varchar(32);
	DECLARE idsupplierVar VARCHAR(32);
	DECLARE idsupplierofficerVar VARCHAR(32);
	DECLARE accesspageVar VARCHAR(10);
	DECLARE validQrCode VARCHAR(32);
	
	set validQrCode = (select idmsuserqrcode from msuserqrcode where idmsuserqrcode = qrcodeid and statuspost = '1');
	
	if(validQrCode is not null) then
		UPDATE msuserqrcode
			SET statuspost = '2',
			lasttransdate = NOW(),
			lasttransact = 'U'
			WHERE idmsuserqrcode = qrcodeid;
			
		SET idVar = (SELECT idmsuser FROM msuser WHERE id = idparam AND active = 1 AND lasttransact <> 'D' limit 1); 
		IF (idVar IS NOT NULL) THEN 
			SET idsupplierVar = (SELECT idmssupplier FROM mssupplier WHERE idmsuser = idVar AND lasttransact <> 'D' LIMIT 1);
			SET idsupplierofficerVar = (SELECT idmssupplierofficer FROM mssupplierofficer WHERE idmsuser = idVar AND lasttransact <> 'D' LIMIT 1);
			
			IF (idsupplierVar IS NOT NULL) THEN 
				SET accesspageVar = (select '1;2;3');
			ELSE
				SET idsupplierVar = (SELECT idmssupplier FROM mssupplierofficer WHERE idmsuser = idVar AND lasttransact <> 'D' LIMIT 1);
				SET accesspageVar = (SELECT accesspage FROM mssupplierofficer WHERE idmsuser = idVar AND lasttransact <> 'D' LIMIT 1);
			END IF;
			
			SELECT 	idmsuser, idltusertype, NULL AS sessionid, 'ok' AS err,
				defaultlanguage AS lang,
				idsupplierVar AS idmssupplier,
				idsupplierofficerVar AS idmssupplierofficer,
				accesspageVar AS accesspage
				FROM msuser
				WHERE id = idparam
				LIMIT 1;
		ELSE
			SELECT NULL AS idmsuser, NULL AS idltusertype, NULL AS sessionid, 'nope' AS err,
				'en' AS lang,
				'' AS idmssupplier,
				'' AS idmssupplierofficer,
				'' AS accesspage;
		END IF;
	else
		SELECT NULL AS idmsuser, NULL AS idltusertype, NULL AS sessionid, 'nq' AS err,
				'en' AS lang,
				'' AS idmssupplier,
				'' AS idmssupplierofficer,
				'' AS accesspage;
	END IF;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `getactiveqrcode` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `getactiveqrcode`(in idparam varchar(32))
BEGIN
	SELECT email, PASSWORD FROM msuserqrcode WHERE idmsuserqrcode = idparam AND statuspost = '1';
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `getallbuyer` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `getallbuyer`()
BEGIN
	SELECT 	a.idmsbuyer, namebuyer, c.usertypename
	FROM msbuyer a
	JOIN mssupplier b
		ON a.idmssupplier = b.idmssupplier
	JOIN ltusertype c
		ON a.idltusertype = c.idltusertype
	WHERE a.lasttransact <> 'D';
    END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `getallfish` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `getallfish`()
BEGIN
SELECT	a.idmsfish, a.idfishoffline, b.*,
		a.indname, a.localname, a.photo,
		a.idmssupplier,
		getnamesupplier(a.idmssupplier) AS namesupplier, a.price
		FROM msfish a
		JOIN ltfish b
			ON a.idltfish = b.idltfish
		WHERE a.lasttransact <> 'D';
    END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `getallfisherman` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `getallfisherman`()
BEGIN
SELECT 	a.*, b.*,
		getnamesupplier(idmssupplier) AS suppliername
		FROM msfisherman a
		JOIN msuser b
			ON a.idmsuser = b.idmsuser
		WHERE a.lasttransact <> 'D';
    END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `getallship` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `getallship`()
BEGIN
	SELECT 	a.*, b.name, c.indonesian_name, c.english_name, c.abbr
		FROM msship a
		JOIN msuser b
			ON a.idmsuserparam = b.idmsuser
		LEFT JOIN ltfishinggear c
			ON a.vesselgeartype_param = c.api_code
		WHERE a.lasttransact <> 'D'
        ORDER BY a.vesselname_param;
    END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `getbuyerlistbyidmsuser` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `getbuyerlistbyidmsuser`(IN `idparam` VARCHAR(32))
BEGIN
	SELECT 	
    a.idmsbuyer, a.idbuyeroffline,
	a.idmssupplier, a.name_param,
    a.id_param, a.businesslicense_param,
    a.contact_param, a.phonenumber_param,
    a.address_param, a.idltusertype,
    a.sex_param, a.nationalcode_param,
    a.country_param, a.province_param,
    a.city_param, a.district_param,
    a.completestreetaddress_param, c.usertypename
	FROM msbuyer a
	JOIN mssupplier b
		ON a.idmssupplier = b.idmssupplier
	JOIN ltusertype c
		ON a.idltusertype = c.idltusertype
	WHERE b.idmsuser = getidsupplierbossbyidmsuser(idparam) AND a.lasttransact <> 'D';
    END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `getbuyerlistbyidmsuserv2` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `getbuyerlistbyidmsuserv2`(IN `idparam` VARCHAR(32))
BEGIN
	SELECT 	
    a.*, c.usertypename
	FROM msbuyer a
	JOIN mssupplier b
		ON a.idmssupplier = b.idmssupplier
	JOIN ltusertype c
		ON a.idltusertype = c.idltusertype
	WHERE b.idmsuser = getidsupplierbossbyidmsuser(idparam);
    END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `getbuyerlistbyidmsuserv3` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `getbuyerlistbyidmsuserv3`(IN `idparam` VARCHAR(32))
BEGIN
	SELECT 	a.*, c.usertypename
	FROM msbuyer a
	JOIN mssupplier b
		ON a.idmssupplier = b.idmssupplier
	JOIN ltusertype c
		ON a.idltusertype = c.idltusertype
	WHERE b.idmsuser = getidsupplierbossbyidmsuser(idparam); 
    END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `getcatch` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `getcatch`(IN `monthparam` INT, IN `yearparam` INT)
BEGIN
	SELECT 	a.*,
		getnamesupplier(a.idmssupplier) AS suppliername,
		getnamefisherman(e.idmsfisherman) AS fishermanname,
		getidmsuserfisherman(e.idmsfisherman) AS idmsuserfisherman,
		getnameship(g.idmsship) AS shipname,
		b.idtrfishcatch, b.idtrfishcatchoffline,
		b.amount, b.grade, b.description, b.idfish,
		d.indonesian_name AS indname, d.threea_code, d.scientific_name, d.english_name,
		e.idfishermanoffline, f.idbuyeroffline, c.idfishoffline, g.idshipoffline,
		99 AS requsnull,
		99 AS reqeunull,
		99 AS requsaidnull,
		99 AS reqidnull
		FROM trcatch a
		LEFT JOIN trfishcatch b
			ON a.idtrcatchoffline = b.idtrfishcatchoffline
		JOIN msfish c
			ON a.idfishoffline = c.idfishoffline
		JOIN ltfish d
			ON c.idltfish = d.idltfish
		LEFT JOIN msfisherman e
			ON a.idfishermanoffline = e.idfishermanoffline
		LEFT JOIN msbuyer f
			ON a.idbuyeroffline = f.idbuyeroffline
		LEFT JOIN msship g
			ON a.idshipoffline = g.idshipoffline
		WHERE 	a.lasttransact <> 'D' 
			
			AND (YEAR(a.purchasedate) = yearparam AND MONTH(a.purchasedate) = monthparam)
		ORDER BY a.idtrcatch;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `getcatchbyidmssupplier` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `getcatchbyidmssupplier`(IN idmssupplierparam VARCHAR(32), IN monthparam INT, IN yearparam INT)
BEGIN
	SELECT 	a.*,
		getnamesupplier(a.idmssupplier) AS suppliername,
		getnamefisherman(a.idmsfisherman) AS fishermanname,
		getidmsuserfisherman(a.idmsfisherman) AS idmsuserfisherman,
		getnameship(a.idmsship) AS shipname,
		b.indname, c.threea_code, c.scientific_name, c.english_name, 
		d.idtrfishcatch, d.idtrfishcatchoffline,
		d.amount, d.grade, d.description, d.idfish,
		99 AS requsnull,
		99 AS reqeunull,
		99 AS requsaidnull,
		99 AS reqidnull
		
		FROM trcatch a
		JOIN msfish b
			ON a.idmsfish = b.idmsfish
		JOIN ltfish c
			ON b.idltfish = c.idltfish
		LEFT JOIN trfishcatch d
			ON a.idtrcatchoffline = d.idtrcatchoffline AND d.lasttransact <> 'D'
		WHERE 	a.lasttransact <> 'D' AND a.idmssupplier = idmssupplierparam AND
			((YEAR(a.purchasedate) = CASE WHEN yearparam < 0 THEN YEAR(a.purchasedate) 
						ELSE yearparam END
			AND
			MONTH(a.purchasedate) = CASE WHEN monthparam < 0 THEN MONTH(a.purchasedate)
						ELSE monthparam END) OR a.purchasedate IS NULL)
		ORDER BY a.idtrcatch;
    END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `getcatchbyidmssupplierv2` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `getcatchbyidmssupplierv2`(IN `idmssupplierparam` VARCHAR(32), IN `dayparam` INT, 
IN `monthparam` INT, IN `yearparam` INT)
BEGIN
	SELECT 	a.*,
		getnamesupplier(a.idmssupplier) AS suppliername,
		getnamefisherman(e.idmsfisherman) AS fishermanname,
		getidmsuserfisherman(e.idmsfisherman) AS idmsuserfisherman,
		f.idmsbuyer AS idbuyersupplier,
		f.name_param AS buyersuppliername,
		getnameship(g.idmsship) AS shipname,
		h.indonesian_name AS fishinggearindo, h.english_name AS fishinggearenglish, 
		b.idtrfishcatch, b.idtrfishcatchoffline,
		b.amount, b.grade, b.description, b.idfish,
		d.indonesian_name AS indname, d.threea_code, d.scientific_name, d.english_name,
		e.idfishermanoffline, f.idbuyeroffline, c.idfishoffline, g.idshipoffline,
		99 AS requsnull,
		99 AS reqeunull,
		99 AS requsaidnull,
		99 AS reqidnull,
		a.lasttransact,
		getnameuser(a.idmsusercreator) AS namecreator, getnameuser(a.idmsuserlasttrans) AS namelasttrans,
		getnameuser(b.idmsusercreator) AS namecreatorfishcatch, getnameuser(b.idmsuserlasttrans) AS namelasttransfishcatch
		FROM trcatch a
		LEFT JOIN trfishcatch b
			ON a.idtrcatchoffline = b.idtrcatchoffline AND b.lasttransact <> 'D'
		LEFT JOIN msfish c
			ON a.idfishoffline = c.idfishoffline AND c.lasttransact <> 'D'
		LEFT JOIN ltfish d
			ON c.idltfish = d.idltfish AND d.lasttransact <> 'D'
		LEFT JOIN msfisherman e
			ON a.idfishermanoffline = e.idfishermanoffline AND e.lasttransact <> 'D'
		LEFT JOIN msbuyer f
			ON a.idbuyeroffline = f.idbuyeroffline AND f.lasttransact <> 'D'
		LEFT JOIN msship g
			ON a.idshipoffline = g.idshipoffline AND g.lasttransact <> 'D'
		LEFT JOIN ltfishinggear h
			ON g.vesselgeartype_param = h.api_code
		WHERE 	a.lasttransact <> 'D' AND
			(a.idmssupplier = CASE WHEN idmssupplierparam = "-1" THEN a.idmssupplier ELSE idmssupplierparam END) AND
			(
				(YEAR(a.purchasedate) = CASE WHEN yearparam < 0 THEN YEAR(a.purchasedate) 
						ELSE yearparam END
				AND
				MONTH(a.purchasedate) = CASE WHEN monthparam < 0 THEN MONTH(a.purchasedate)
						ELSE monthparam END
				AND
				DAY(a.purchasedate) = CASE WHEN dayparam < 0 THEN DAY(a.purchasedate)
						ELSE dayparam END
				) OR a.purchasedate IS NULL
			)
		ORDER BY a.idtrcatch;
    END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `getcatchbyidmssupplierv3` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `getcatchbyidmssupplierv3`(IN `idmssupplierparam` VARCHAR(32), IN `dayparam` INT, IN `monthparam` INT, IN `yearparam` INT)
BEGIN
	SELECT 	a.*,
		getnamesupplier(a.idmssupplier) AS suppliername,
		getnamefisherman(e.idmsfisherman) AS fishermanname,
		getidmsuserfisherman(e.idmsfisherman) AS idmsuserfisherman,
		f.idmsbuyer AS idbuyersupplier,
		f.name_param AS buyersuppliername,
		getnameship(g.idmsship) AS shipname,
		b.idtrfishcatch, b.idtrfishcatchoffline,
		COALESCE(b.amount, '') AS amount, COALESCE(b.grade, '') AS grade, b.description, b.idfish,
		d.indonesian_name AS indname, d.threea_code, d.scientific_name, d.english_name,
		e.idfishermanoffline, f.idbuyeroffline, c.idfishoffline, g.idshipoffline,
		99 AS requsnull,
		99 AS reqeunull,
		99 AS requsaidnull,
		99 AS reqidnull,
		a.lasttransact,
		getnameuser(a.idmsusercreator) AS namecreator, getnameuser(a.idmsuserlasttrans) AS namelasttrans,
		getnameuser(b.idmsusercreator) AS namecreatorfishcatch, getnameuser(b.idmsuserlasttrans) AS namelasttransfishcatch
		FROM trcatch a
		LEFT JOIN trfishcatch b
			ON a.idtrcatchoffline = b.idtrcatchoffline AND b.lasttransact <> 'D'
		JOIN msfish c
			ON a.idfishoffline = c.idfishoffline 
		JOIN ltfish d
			ON c.idltfish = d.idltfish 
		LEFT JOIN msfisherman e
			ON a.idfishermanoffline = e.idfishermanoffline 
		LEFT JOIN msbuyer f
			ON a.idbuyeroffline = f.idbuyeroffline 
		LEFT JOIN msship g
			ON a.idshipoffline = g.idshipoffline 
		WHERE 	
			(a.idmssupplier = CASE WHEN idmssupplierparam = "-1" THEN a.idmssupplier ELSE idmssupplierparam END) AND
			(
				(YEAR(a.purchasedate) = CASE WHEN yearparam < 0 THEN YEAR(a.purchasedate) 
						ELSE yearparam END
				AND
				MONTH(a.purchasedate) = CASE WHEN monthparam < 0 THEN MONTH(a.purchasedate)
						ELSE monthparam END
				AND
				DAY(a.purchasedate) = CASE WHEN dayparam < 0 THEN DAY(a.purchasedate)
						ELSE dayparam END
				) OR a.purchasedate IS NULL
			)
		ORDER BY a.idtrcatch;
    END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `getcatchbyidmssupplierv4` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `getcatchbyidmssupplierv4`(IN `idmssupplierparam` VARCHAR(32), IN `dayparam` INT, IN `monthparam` INT, IN `yearparam` INT)
BEGIN
	SELECT 	a.*,
		getnamesupplier(a.idmssupplier) AS suppliername,
		getnamefisherman(e.idmsfisherman) AS fishermanname,
		getidmsuserfisherman(e.idmsfisherman) AS idmsuserfisherman,
		f.idmsbuyer AS idbuyersupplier,
		f.name_param AS buyersuppliername,
		getnameship(g.idmsship) AS shipname,
		b.idtrfishcatch, b.idtrfishcatchoffline,
		COALESCE(b.amount, '') AS amount, COALESCE(b.grade, '') AS grade, b.description, b.idfish,
		c.indname AS indname, d.threea_code, d.scientific_name, d.english_name,
		e.idfishermanoffline, f.idbuyeroffline, c.idfishoffline, g.idshipoffline,
		99 AS requsnull,
		99 AS reqeunull,
		99 AS requsaidnull,
		99 AS reqidnull,
		a.lasttransact,
		getnameuser(a.idmsusercreator) AS namecreator, getnameuser(a.idmsuserlasttrans) AS namelasttrans,
		getnameuser(b.idmsusercreator) AS namecreatorfishcatch, getnameuser(b.idmsuserlasttrans) AS namelasttransfishcatch,
        b.upline AS upline
		FROM trcatch a
		LEFT JOIN trfishcatch b
			ON a.idtrcatchoffline = b.idtrcatchoffline AND b.lasttransact <> 'D'
		JOIN msfish c
			ON a.idfishoffline = c.idfishoffline 
		JOIN ltfish d
			ON c.idltfish = d.idltfish 
		LEFT JOIN msfisherman e
			ON a.idfishermanoffline = e.idfishermanoffline 
		LEFT JOIN msbuyer f
			ON a.idbuyeroffline = f.idbuyeroffline 
		LEFT JOIN msship g
			ON a.idshipoffline = g.idshipoffline 
		WHERE 	
			(a.idmssupplier = CASE WHEN idmssupplierparam = "-1" THEN a.idmssupplier ELSE idmssupplierparam END) AND
			(
				(YEAR(a.purchasedate) = CASE WHEN yearparam < 0 THEN YEAR(a.purchasedate) 
						ELSE yearparam END
				AND
				MONTH(a.purchasedate) = CASE WHEN monthparam < 0 THEN MONTH(a.purchasedate)
						ELSE monthparam END
				AND
				DAY(a.purchasedate) = CASE WHEN dayparam < 0 THEN DAY(a.purchasedate)
						ELSE dayparam END
				) OR a.purchasedate IS NULL
			)
		ORDER BY a.idtrcatch;
    END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `getcatchbyidmssupplierv6` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `getcatchbyidmssupplierv6`(IN `idmssupplierparam` VARCHAR(32), IN `monthparam1` INT, IN `yearparam1` INT, IN `monthparam2` INT, IN `yearparam2` INT)
BEGIN
	SELECT 	a.*,
		getnamesupplier(a.idmssupplier) AS suppliername,
		getnamefisherman(e.idmsfisherman) AS fishermanname,
		getidmsuserfisherman(e.idmsfisherman) AS idmsuserfisherman,
		f.idmsbuyer AS idbuyersupplier,
		f.name_param AS buyersuppliername,
		getnameship(g.idmsship) AS shipname,
		b.idtrfishcatch, b.idtrfishcatchoffline,
		COALESCE(b.amount, '') AS amount, COALESCE(b.grade, '') AS grade, b.description, b.idfish,
		c.indname AS indname, d.threea_code, d.scientific_name, d.english_name,
		e.idfishermanoffline, f.idbuyeroffline, c.idfishoffline, g.idshipoffline,
		99 AS requsnull,
		99 AS reqeunull,
		99 AS requsaidnull,
		99 AS reqidnull,
		a.lasttransact,
		getnameuser(a.idmsusercreator) AS namecreator, getnameuser(a.idmsuserlasttrans) AS namelasttrans,
		getnameuser(b.idmsusercreator) AS namecreatorfishcatch, getnameuser(b.idmsuserlasttrans) AS namelasttransfishcatch,
        b.upline AS upline
		FROM trcatch a
		LEFT JOIN trfishcatch b
			ON a.idtrcatchoffline = b.idtrcatchoffline AND b.lasttransact <> 'D'
		JOIN msfish c
			ON a.idfishoffline = c.idfishoffline 
		JOIN ltfish d
			ON c.idltfish = d.idltfish 
		LEFT JOIN msfisherman e
			ON a.idfishermanoffline = e.idfishermanoffline 
		LEFT JOIN msbuyer f
			ON a.idbuyeroffline = f.idbuyeroffline 
		LEFT JOIN msship g
			ON a.idshipoffline = g.idshipoffline 
		WHERE 	
			(a.idmssupplier = CASE WHEN idmssupplierparam = "-1" THEN a.idmssupplier ELSE idmssupplierparam END) AND
			(
				( YEAR(a.purchasedate) = yearparam1 AND MONTH(a.purchasedate) = monthparam1 ) OR 
        ( YEAR(a.purchasedate) = yearparam2 AND MONTH(a.purchasedate) = monthparam2 ) OR 
        a.purchasedate IS NULL
			)
		ORDER BY a.idtrcatch;
    END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `getcatchv2` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `getcatchv2`(IN `monthparam` INT, IN `yearparam` INT)
BEGIN
	SELECT 	a.*,
		getnamesupplier(a.idmssupplier) AS suppliername,
		getnamefisherman(a.idmsfisherman) AS fishermanname,
		getidmsuserfisherman(a.idmsfisherman) AS idmsuserfisherman,
		getnameship(a.idmsship) AS shipname,
		b.idtrfishcatch, b.idtrfishcatchoffline,
		b.amount, b.grade, b.description, b.idfish,
		d.indonesian_name, d.threea_code, d.scientific_name, d.english_name,
		e.idfishermanoffline, f.idbuyeroffline, c.idfishoffline, g.idshipoffline,
		99 AS requsnull,
		99 AS reqeunull,
		99 AS requsaidnull,
		99 AS reqidnull
		FROM trcatch a
		LEFT JOIN trfishcatch b
			ON a.idtrcatchoffline = b.idtrcatchoffline
		JOIN msfish c
			ON a.idmsfish = c.idmsfish
		JOIN ltfish d
			ON c.idltfish = d.idltfish
		LEFT JOIN msfisherman e
			ON a.idmsfisherman = e.idmsfisherman
		LEFT JOIN msbuyer f
			ON a.idmsbuyersupplier = f.idmsbuyer
		LEFT JOIN msship g
			ON a.idmsship = g.idmsship
		WHERE 	a.lasttransact <> 'D' AND b.lasttransact <> 'D' and
			c.lasttransact <> 'D' AND d.lasttransact <> 'D' and
			e.lasttransact <> 'D' AND f.lasttransact <> 'D'
			AND (YEAR(a.purchasedate) = yearparam AND MONTH(a.purchasedate) = monthparam)
		ORDER BY a.idtrcatch;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `getdashboarddata` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `getdashboarddata`(IN `idmssupplierparam` VARCHAR(32))
BEGIN
	DECLARE countsupplier INT;
	DECLARE countcatch INT;
	DECLARE countloan INT;
	DECLARE countpayloan INT;
	DECLARE countdelivery INT;
	SET countsupplier = (SELECT COUNT(*) FROM mssuppliertemp WHERE acceptdate IS NULL AND lasttransact <> 'D');
	SET countcatch = (SELECT COUNT(*) FROM trcatch WHERE idmssupplier = COALESCE(idmssupplierparam, idmssupplier) AND MONTH(purchasedate) = MONTH(NOW()) AND lasttransact <> 'D');
	
	SET countloan = (SELECT COUNT(*) FROM trloan WHERE idmssupplier = COALESCE(idmssupplierparam, idmssupplier) AND MONTH(loandate) = MONTH(NOW()) AND lasttransact <> 'D');
	SET countpayloan = (SELECT COUNT(*) FROM trpayloan WHERE idmssupplier = COALESCE(idmssupplierparam, idmssupplier) AND MONTH(paidoffdate) = MONTH(NOW()) AND lasttransact <> 'D');
	SET countdelivery = (SELECT COUNT(*) FROM trbatchdeliverysheet WHERE idmssupplier = COALESCE(idmssupplierparam, idmssupplier) AND MONTH(deliverydate) = MONTH(NOW()) AND lasttransact <> 'D');
	
	SELECT 	countsupplier, countcatch,
		countloan, countcatch+countloan+countpayloan+countdelivery AS counttransaction;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `getdeliverybyidmssupplier` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `getdeliverybyidmssupplier`(IN idmssuplierparam VARCHAR(32))
BEGIN
	SELECT 	a.idtrdelivery, a.iddeliveryoffline, 
		a.idtrcatch, a.idtrfishcatch,
		a.idmsbuyer, getnamebuyer(a.idmsbuyer) AS namebuyer,
		a.totalprice, a.deliverydate, 
		a.transportby, a.transportnameid, 
		a.transportreceipt, a.descparam,
		CASE WHEN a.idtrcatch IS NOT NULL THEN getfishnamebyidtrcatch(a.idtrcatch)
		WHEN a.idtrfishcatch IS NOT NULL THEN getfishnamebyidtrfishcatch(a.idtrfishcatch) END AS fishname,
		CASE WHEN a.idtrcatch IS NOT NULL THEN b.sendtobuyerdate
		WHEN a.idtrfishcatch IS NOT NULL THEN c.sendtobuyerdate END AS sendtobuyerdate,
		CASE WHEN a.idtrcatch IS NOT NULL THEN b.weight
		WHEN a.idtrfishcatch IS NOT NULL THEN c.amount END AS weight,
		getdeliverysheetbyiddelivery(a.idtrdelivery) AS deliverysheet,
		deliverysheetofflineid
		FROM trdelivery a
		LEFT JOIN trcatch b
			ON a.idtrcatch = b.idtrcatch
		LEFT JOIN trfishcatch c
			ON a.idtrfishcatch = c.idtrfishcatch
		WHERE a.idmssupplier = idmssuplierparam AND a.lasttransact <> 'D';
	
    END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `getdeliverybyidmssupplierv3` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `getdeliverybyidmssupplierv3`(IN idmssuplierparam VARCHAR(32))
BEGIN
	SELECT 	a.idtrdelivery, a.iddeliveryoffline, 
		a.idtrcatch, a.idtrfishcatch,
		a.idmsbuyer, getnamebuyer(a.idmsbuyer) AS namebuyer,
		a.totalprice, a.deliverydate, 
		a.transportby, a.transportnameid, 
		a.transportreceipt, a.descparam,
		CASE WHEN a.idtrcatch IS NOT NULL THEN getfishnamebyidtrcatch(a.idtrcatch)
		WHEN a.idtrfishcatch IS NOT NULL THEN getfishnamebyidtrfishcatch(a.idtrfishcatch) END AS fishname,
		CASE WHEN a.idtrcatch IS NOT NULL THEN b.sendtobuyerdate
		WHEN a.idtrfishcatch IS NOT NULL THEN c.sendtobuyerdate END AS sendtobuyerdate,
		CASE WHEN a.idtrcatch IS NOT NULL THEN b.weight
		WHEN a.idtrfishcatch IS NOT NULL THEN c.amount END AS weight,
		getdeliverysheetbyiddelivery(a.idtrdelivery) AS deliverysheet,
		deliverysheetofflineid,
		a.lasttransact,
		getnameuser(a.idmsusercreator) AS namecreator, getnameuser(a.idmsuserlasttrans) AS namelasttrans
		FROM trdelivery a
		LEFT JOIN trcatch b
			ON a.idtrcatch = b.idtrcatch
		LEFT JOIN trfishcatch c
			ON a.idtrfishcatch = c.idtrfishcatch
		WHERE a.idmssupplier = idmssuplierparam 
		ORDER BY deliverysheetofflineid;
	
    END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `getdeliverysheet` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `getdeliverysheet`(
	IN deliverysheetofflineidparam TEXT)
BEGIN
	SELECT 	* 
		FROM trdeliverysheet 
		WHERE deliverysheetofflineid = deliverysheetofflineidparam AND lasttransact <> 'D';
    END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `getdeliverysheetbyiddelivery` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `getdeliverysheetbyiddelivery`(IN iddeliveryparam VARCHAR(32))
BEGIN
	SELECT getdeliverysheetbyiddelivery(iddeliveryparam) AS deliverysheet;
    END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `getdeliverysheetbyiddeliveryv2` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `getdeliverysheetbyiddeliveryv2`(IN iddeliveryparam VARCHAR(32))
BEGIN
	SELECT savedtext FROM trdeliverysheet WHERE deliverysheetofflineid = iddeliveryparam;
    END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `getdeliverysheetbyidmssupplier` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `getdeliverysheetbyidmssupplier`(IN idmssupplierparam VARCHAR(32))
BEGIN
	SELECT 	a.*
		FROM trdeliverysheet a
		JOIN
		(SELECT DISTINCT
			idmssupplier, deliverysheetofflineid
			FROM trdelivery
			WHERE (idmssupplier = CASE WHEN idmssupplierparam = "-1" THEN idmssupplier ELSE idmssupplierparam END) AND
				lasttransact <> 'D'
		) b
			ON a.deliverysheetofflineid = b.deliverysheetofflineid
		WHERE a.lasttransact <> 'D';
    END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `getdeliverysheetbyidmssupplierv6` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `getdeliverysheetbyidmssupplierv6`(IN idmssupplierparam VARCHAR(32), IN `monthparam1` INT, IN `yearparam1` INT, IN `monthparam2` INT, IN `yearparam2` INT)
BEGIN
	SELECT 	a.*
		FROM trdeliverysheet a
		JOIN
		(SELECT DISTINCT
			idmssupplier, deliverysheetofflineid
			FROM trdelivery
			WHERE (idmssupplier = CASE WHEN idmssupplierparam = "-1" THEN idmssupplier ELSE idmssupplierparam END) AND
				lasttransact <> 'D'
		) b
			ON a.deliverysheetofflineid = b.deliverysheetofflineid
		WHERE a.lasttransact <> 'D'
    AND
			(
				( YEAR(a.lasttransdate) = yearparam1 AND MONTH(a.lasttransdate) = monthparam1 ) OR 
        ( YEAR(a.lasttransdate) = yearparam2 AND MONTH(a.lasttransdate) = monthparam2 ) 
			)
    ;
    END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `getfishbyidmsuser` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `getfishbyidmsuser`(IN idparam VARCHAR(32))
BEGIN
	SELECT 	a.idmsfish, a.idfishoffline,
		a.indname, a.localname,
		b.*, a.photo, a.price
		FROM msfish a
		JOIN ltfish b
			ON a.idltfish = b.idltfish
		JOIN mssupplier c
			ON a.idmssupplier = c.idmssupplier
		WHERE c.idmsuser = getidsupplierbossbyidmsuser(idparam) AND a.lasttransact <> 'D';
    END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `getfishbyidmsuserv2` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `getfishbyidmsuserv2`(IN idparam VARCHAR(32))
BEGIN
	SELECT 	a.idmsfish, a.idfishoffline,
		a.indname, a.localname, a.lasttransact,
		b.idltfish, b.isscaap, b.taxocode,
		b.threea_code, b.scientific_name, b.indonesian_name,
		b.english_name, b.french_name, b.spanish_name,
		b.author, b.family, b.bio_order,
		b.stats_data,
		a.photo, a.price
		FROM msfish a
		JOIN ltfish b
			ON a.idltfish = b.idltfish
		JOIN mssupplier c
			ON a.idmssupplier = c.idmssupplier
		WHERE c.idmsuser = getidsupplierbossbyidmsuser(idparam);
    END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `getfishbyidsupplier` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `getfishbyidsupplier`(in idmssupplierparam varchar(32))
BEGIN
	SELECT 	a.idmsfish,
		a.indname, a.localname,
		b.*, a.photo
		FROM msfish a
		JOIN ltfish b
		ON a.idltfish = b.idltfish
		WHERE idmssupplier = idmssupplierparam AND a.lasttransact <> 'D';
    END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `getfishbyidsupplierv2` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `getfishbyidsupplierv2`(IN idmssupplierparam VARCHAR(32))
BEGIN
	SELECT 	a.idmsfish,
		a.indname, a.localname,
		b.*, a.photo
		FROM msfish a
		JOIN ltfish b
		ON a.idltfish = b.idltfish
		WHERE idmssupplier = idmssupplierparam;
    END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `getfishcatchdata` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `getfishcatchdata`(IN `idfish` VARCHAR(32))
BEGIN
SELECT b.idfish, 
    b.amount,
    b.grade,
    b.description,
    b.upline,
    getnamesupplier(a.idmssupplier) AS suppliername,
		getnamefisherman(e.idmsfisherman) AS fishermanname,
		f.name_param AS buyersuppliername,
		g.vesselname_param AS shipname,
    c.indname AS speciesindname, 
    d.english_name AS speciesengname,
    d.threea_code,
    a.purchasedate,
    a.purchasetime,
    a.catchorfarmed,
    a.bycatch,
    a.fadused,
    a.purchaseuniqueno,
    a.productformatlanding,
    a.unitmeasurement,
    a.fishinggroundarea,
    a.purchaselocation,
    a.uniquetripid,
    a.datetimevesseldeparture,
    a.datetimevesselreturn,
    a.portname,
    a.notes,
    a.fishermanname2,
    a.fishermanid AS fishermanid2,
    a.fishermanregnumber AS fishermanregnumber2,
    e.id_param AS fishermanid,
    e.fishermanregnumber,
    g.vesselsize_param,
    g.vessellicensenumber_param,
    g.fishinglicenseexpiredate_param,
    g.vesselflag_param,
    h.english_name AS gearEnglish,
    h.indonesian_name AS gearIndo
		FROM trfishcatch b
		LEFT JOIN trcatch a
			ON a.idtrcatchoffline = b.idtrcatchoffline
	  JOIN msfish c
			ON a.idfishoffline = c.idfishoffline 
		JOIN ltfish d
			ON c.idltfish = d.idltfish 
		LEFT JOIN msfisherman e
			ON a.idfishermanoffline = e.idfishermanoffline 
		LEFT JOIN msbuyer f
			ON a.idbuyeroffline = f.idbuyeroffline 
		LEFT JOIN msship g
			ON a.idshipoffline = g.idshipoffline 
    LEFT JOIN ltfishinggear h
    	ON g.vesselgeartype_param = h.api_code 
		WHERE b.idfish = idfish;
  END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `getfishcatchreport` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `getfishcatchreport`(IN `idmssupplierparam` VARCHAR(32), IN `dayparam` INT, IN `monthparam` INT, IN `yearparam` INT)
BEGIN
    SELECT a.purchasedate AS PurchaseDate,
      j.name AS SupplierName,
      b.idfish AS FishId,
      d.threea_code AS Species,
      COALESCE(b.grade, '') AS Grade,
      a.unitmeasurement AS Unit,
      COALESCE(b.amount, '') AS Weight,
      g.vesselname_param AS VesselName,
      COALESCE(g.vesselsize_param, '') AS VesselSize,
      COALESCE(g.vessellicensenumber_param, '') AS VesselRegNum,
      COALESCE(g.vessellicenseexpiredate_param, '') AS VesselExpired,
      g.vesselflag_param AS VesselFlag,
      COALESCE(h.english_name, '') AS VesselGearType,
      a.fishinggroundarea AS FishingGround,
      COALESCE(a.portname, '') AS LandingSite,
      a.datetimevesselreturn AS LandingDate,
      getnamefisherman(e.idmsfisherman) AS FishermanName,
      f.name_param AS SourceSupplierName
    FROM trfishcatch b
    LEFT JOIN trcatch a
      ON a.idtrcatchoffline = b.idtrcatchoffline AND b.lasttransact <> 'D'
    LEFT JOIN msfish c
      ON a.idfishoffline = c.idfishoffline 
    LEFT JOIN ltfish d
      ON c.idltfish = d.idltfish 
    LEFT JOIN msfisherman e
      ON a.idfishermanoffline = e.idfishermanoffline 
    LEFT JOIN msbuyer f
      ON a.idbuyeroffline = f.idbuyeroffline 
    LEFT JOIN msship g
      ON a.idshipoffline = g.idshipoffline 
    LEFT JOIN ltfishinggear h
      ON g.vesselgeartype_param = h.api_code
    LEFT JOIN mssupplier i
      ON a.idmssupplier = i.idmssupplier
    LEFT JOIN msuser j
      ON i.idmsuser = j.idmsuser
    WHERE
      (a.lasttransact <> 'D') AND
      (a.idmssupplier = CASE WHEN idmssupplierparam = "-1" THEN a.idmssupplier ELSE idmssupplierparam END) AND
      (
        (YEAR(a.purchasedate) = CASE WHEN yearparam < 0 THEN YEAR(a.purchasedate) 
            ELSE yearparam END
        AND
        MONTH(a.purchasedate) = CASE WHEN monthparam < 0 THEN MONTH(a.purchasedate)
            ELSE monthparam END
        AND
        DAY(a.purchasedate) = CASE WHEN dayparam < 0 THEN DAY(a.purchasedate)
            ELSE dayparam END
        ) OR a.purchasedate IS NULL
      )
    ORDER BY b.idtrfishcatch;
    END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `getfishermanbyidmsuser` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `getfishermanbyidmsuser`(in idparam varchar(32))
BEGIN
	SELECT 	a.idmsfisherman, a.idfishermanoffline, a.idmsuser,
		b.name, b.bod,
		a.id_param, sex_param, nat_param, 
		a.address_param, phone_param, jobtitle_param
		FROM msfisherman a
		JOIN msuser b
			ON a.idmsuser = b.idmsuser
		join mssupplier c
			on a.idmssupplier = c.idmssupplier
		where c.idmsuser = getidsupplierbossbyidmsuser(idparam) AND a.lasttransact <> 'D';
    END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `getfishermanbyidmsuserv2` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `getfishermanbyidmsuserv2`(IN idparam VARCHAR(32))
BEGIN
	SELECT 	a.*,
		b.name, b.bod
		FROM msfisherman a
		JOIN msuser b
			ON a.idmsuser = b.idmsuser
		JOIN mssupplier c
			ON a.idmssupplier = c.idmssupplier
		WHERE c.idmsuser = getidsupplierbossbyidmsuser(idparam);
    END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `getfishermanbyidsupplier` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `getfishermanbyidsupplier`(in idmssupplierparam varchar(32))
BEGIN
	SELECT 	a.idmsfisherman, a.idmsuser, b.name, b.city, b.address, b.bod, b.defaultlanguage,
		a.photo, a.fishermannatid, a.groupfishing, a.positioninship
		FROM msfisherman a
		JOIN msuser b
		ON a.idmsuser = b.idmsuser
		where a.idmssupplier = idmssupplierparam AND a.lasttransact <> 'D';
    END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `getinvestbuyfishbyidmsuser` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `getinvestbuyfishbyidmsuser`(IN `uid` VARCHAR(32), IN `date` INT, IN `month` INT, IN `year` INT)
    NO SQL
SELECT * FROM `investbuyfish` 
	WHERE idmsuser = uid AND
    (DAY(trxdate) = date OR date = 0) AND 
    (MONTH(trxdate) = month OR month = 0) AND 
    (YEAR(trxdate) = year OR year = 0) ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `getinvestcreditpaymentlistbyidmsuser` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `getinvestcreditpaymentlistbyidmsuser`(IN `uid` VARCHAR(32), IN `date` INT, IN `month` INT, IN `year` INT)
    NO SQL
SELECT * FROM `investcreditpayment` 
	WHERE idmsuser = uid AND
    (DAY(trxdate) = date OR date = 0) AND 
    (MONTH(trxdate) = month OR month = 0) AND 
    (YEAR(trxdate) = year OR year = 0) ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `getinvestcustomexpenselistbyidmsuser` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `getinvestcustomexpenselistbyidmsuser`(IN `uid` VARCHAR(32), IN `date` INT, IN `month` INT, IN `year` INT)
    NO SQL
SELECT * FROM `investcustomexpense` 
	WHERE idmsuser = uid AND
    (DAY(trxdate) = date OR date = 0) AND 
    (MONTH(trxdate) = month OR month = 0) AND 
    (YEAR(trxdate) = year OR year = 0) ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `getinvestcustomincomelistbyidmsuser` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `getinvestcustomincomelistbyidmsuser`(IN `uid` VARCHAR(32), IN `date` INT, IN `month` INT, IN `year` INT)
    NO SQL
SELECT * FROM `investcustomincome` 
	WHERE idmsuser = uid AND
    (DAY(trxdate) = date OR date = 0) AND 
    (MONTH(trxdate) = month OR month = 0) AND 
    (YEAR(trxdate) = year OR year = 0) ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `getinvestcustomtypelistbyidmsuser` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_unicode_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `getinvestcustomtypelistbyidmsuser`(IN `uid` VARCHAR(32), IN `date` INT, IN `month` INT, IN `year` INT)
    NO SQL
SELECT * FROM `investcustomtype` 
	WHERE idmsuser = uid ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `getinvestgivecreditlistbyidmsuser` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `getinvestgivecreditlistbyidmsuser`(IN `uid` VARCHAR(32), IN `date` INT, IN `month` INT, IN `year` INT)
    NO SQL
SELECT * FROM `investgivecredit` 
	WHERE idmsuser = uid AND
    (DAY(trxdate) = date OR date = 0) AND 
    (MONTH(trxdate) = month OR month = 0) AND 
    (YEAR(trxdate) = year OR year = 0) ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `getinvestloanlistbyidmsuser` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `getinvestloanlistbyidmsuser`(IN `uid` VARCHAR(32), IN `date` INT, IN `month` INT, IN `year` INT)
    NO SQL
SELECT * FROM `investtakeloan` 
	WHERE idmsuser = uid AND
    (DAY(trxdate) = date OR date = 0) AND 
    (MONTH(trxdate) = month OR month = 0) AND 
    (YEAR(trxdate) = year OR year = 0) ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `getinvestpayloanlistbyidmsuser` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `getinvestpayloanlistbyidmsuser`(IN `uid` VARCHAR(32), IN `date` INT, IN `month` INT, IN `year` INT)
    NO SQL
SELECT * FROM `investpayloan` 
	WHERE idmsuser = uid AND
    (DAY(trxdate) = date OR date = 0) AND 
    (MONTH(trxdate) = month OR month = 0) AND 
    (YEAR(trxdate) = year OR year = 0) ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `getinvestsimplesellfishbyidmsuser` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `getinvestsimplesellfishbyidmsuser`(IN `uid` VARCHAR(32), IN `date` INT, IN `month` INT, IN `year` INT)
    NO SQL
SELECT * FROM `investsimplesellfish` 
	WHERE idmsuser = uid AND
    (DAY(trxdate) = date OR date = 0) AND 
    (MONTH(trxdate) = month OR month = 0) AND 
    (YEAR(trxdate) = year OR year = 0) ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `getinvestsplitfishbyidmsuser` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `getinvestsplitfishbyidmsuser`(IN `uid` VARCHAR(32), IN `date` INT, IN `month` INT, IN `year` INT)
    NO SQL
SELECT * FROM `investsplitfish` 
	WHERE idmsuser = uid AND
    (DAY(trxdate) = date OR date = 0) AND 
    (MONTH(trxdate) = month OR month = 0) AND 
    (YEAR(trxdate) = year OR year = 0) ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `getkdedetailfromiddeliverysheet` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `getkdedetailfromiddeliverysheet`(IN iddeliverysheetparam VARCHAR(128))
BEGIN
	SELECT 	a.deliverysheetno, a.nationalregistrationsuppliercode, a.deliverydate, 
		b.vesselname, b.vesselsize, b.vesselregistrationno, b.vesselflag, b.fishingground, b.geartype,
		b.landingsite, b.landingdate, b.fishermanname,
		b.idfish, b.species, b.grade, b.unitname, b.amount
	FROM trbatchdeliverysheet a
	JOIN trbatchdeliverysheetfishdata b
		ON a.deliverysheetno = b.deliverysheetno
	WHERE a.deliverysheetno = iddeliverysheetparam
	ORDER BY b.vesselname;
    END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `getkdedetailfromidfish` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `getkdedetailfromidfish`(IN idfishparam VARCHAR(128))
BEGIN
	SELECT 	a.idfish, b3.photo,
		c1.idtrdeliverysheetno, b1.supplierid,
		b31.scientific_name, b31.threea_code,
		a.amount, a.grade,
		b2.vesselname_param, b2.vesselsize_param,
		b2.vessellicensenumber_param, b2.vessellicenseexpiredate_param,
		b2.vesselflag_param, b.fishinggroundarea, b.portname,
		b2.vesselgeartype_param, b.purchasedate
		FROM trfishcatch a
		JOIN trcatch b
			ON a.idtrcatchoffline = b.idtrcatchoffline
		JOIN mssupplier b1
			ON b.idmssupplier = b1.idmssupplier
		JOIN msship b2
			ON b.idmsship = b2.idmsship
		JOIN msfish b3
			ON b.idmsfish = b3.idmsfish
		JOIN ltfish b31
			ON b3.idltfish = b31.idltfish
		LEFT JOIN trdelivery c
			ON a.iddeliveryoffline = c.iddeliveryoffline
		LEFT JOIN trdeliverysheet c1
			ON c.deliverysheetofflineid = c1.deliverysheetofflineid
		WHERE idfish = idfishparam;
    END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `getloanernloanbyidmssupplier` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `getloanernloanbyidmssupplier`(in idmssupplierparam varchar(32))
BEGIN
	SELECT 	distinct
		a.idmsuserloan, a.idmsbuyerloan,
		CASE WHEN a.idmsuserloan IS NOT NULL THEN getnameuser(a.idmsuserloan)
			ELSE getnamebuyer(a.idmsbuyerloan)
		END AS nameloaner,
		CASE WHEN a.idmsuserloan IS NOT NULL THEN getloanbyidmssuppliernidmsuser(idmssupplier, idmsuserloan)
			ELSE getloanbyidmssuppliernidmsbuyer(idmssupplier, idmsbuyerloan)
		END AS loanTotal,
		CASE WHEN a.idmsuserloan IS NOT NULL THEN getpayloanbyidmssuppliernidmsuser(idmssupplier, idmsuserloan)
			ELSE getpayloanbyidmssuppliernidmsbuyer(idmssupplier, idmsbuyerloan)
		END AS payloanTotal
		FROM trloan a
		WHERE idmssupplier = idmssupplierparam
			and lasttransact <> 'D';
    END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `getloanlist` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `getloanlist`(IN monthparam INT, IN yearparam INT)
BEGIN
	SELECT	a.idtrloan, a.descloan, a.loaninrp,
		a.idmsuserloan, concat(getnameuser(a.idmsuserloan), " (Fisherman)") as nameloan,
		a.idmsbuyerloan, concat(getnamebuyer(a.idmsbuyerloan), " (Buyer)") AS nameloanbuyer,
		a.idmssupplier, getnamesupplier(a.idmssupplier) as namesupplier,
		a.loandate,
		a.loaneridmsuserofficer, getnameuser(a.loaneridmsuserofficer) as nameloanerofficer,
		a.paidoffdate, getnameuser(a.paidoffidmsuserofficer) as namepaidoffofficer
		FROM trloan a
		WHERE 	a.lasttransact <> 'D' and
			(year(a.loandate) = yearparam and month(a.loandate) = monthparam);
	
    END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `getloanlistbyidmssupplier` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `getloanlistbyidmssupplier`(IN idmssupplierparam VARCHAR(32), IN dayparam INT, IN monthparam INT, IN yearparam INT)
BEGIN
	SELECT	a.idtrloan, a.idloanoffline, a.descloan, a.loaninrp,
		
		
		a.idmsuserloan, getnameuser(a.idmsuserloan) AS nameloan,
		a.idmsbuyerloan,getnamebuyer(a.idmsbuyerloan) AS nameloanbuyer,
		CASE WHEN a.idmsuserloan IS NOT NULL THEN gettypeuser(a.idmsuserloan)
			ELSE gettypebuyer(a.idmsbuyerloan)
		END AS idltusertype,
		a.idmssupplier, getnamesupplier(a.idmssupplier) AS namesupplier,
		a.loandate, a.loaneridmsuserofficer, getnameuser(a.loaneridmsuserofficer) AS nameloanerofficer,
		a.paidoffdate, a.paidoffidmsuserofficer, getnameuser(a.paidoffidmsuserofficer) AS namepaidoffofficer,
		getnameuser(a.idmsusercreator) AS namecreator, getnameuser(a.idmsuserlasttrans) AS namelasttrans,
		idmstypeitemloanoffline, unit, priceperunit,
		idfishermanoffline, idbuyeroffline
		FROM trloan a
		WHERE 	a.lasttransact <> 'D' AND 
			(idmssupplier = CASE WHEN idmssupplierparam = "-1" THEN idmssupplier ELSE idmssupplierparam END) AND
			(YEAR(a.loandate) = CASE WHEN yearparam < 0 THEN YEAR(a.loandate) ELSE yearparam END AND
			MONTH(a.loandate) = CASE WHEN monthparam < 0 THEN MONTH(a.loandate) ELSE monthparam END AND
			DAY(a.loandate) = CASE WHEN dayparam < 0 THEN DAY(a.loandate) ELSE dayparam END)
		ORDER BY idmsuserloan DESC, idmsbuyerloan DESC, loandate ASC;
    END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `getloanlistbyidmssupplierv2` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `getloanlistbyidmssupplierv2`(
IN idmssupplierparam VARCHAR(32), IN dayparam INT, IN monthparam INT, IN yearparam INT)
BEGIN
	SELECT	a.idtrloan, a.idloanoffline, a.descloan, a.loaninrp,
		COALESCE(a.idfishermanoffline, a.idbuyeroffline, a.idmsuserloan, a.idmsbuyerloan) AS iduserloan,
		a.idmsuserloan, getnameuser(a.idmsuserloan) AS nameloan,
		a.idmsbuyerloan, getnamebuyer(a.idmsbuyerloan) AS nameloanbuyer,
		a.idfishermanoffline, getnamefishermanoffline(a.idfishermanoffline) AS nameloanoffline,
		a.idbuyeroffline, getnamebuyeroffline(a.idbuyeroffline) AS nameloanbuyeroffline,
		CASE WHEN a.idmsuserloan IS NOT NULL OR idfishermanoffline IS NOT NULL THEN 'fisherman'
			ELSE 'buyer'
		END AS idltusertype,
		a.idmssupplier, getnamesupplier(a.idmssupplier) AS namesupplier,
		a.loandate, 
		a.loaneridmsuserofficer, getnameuser(a.loaneridmsuserofficer) AS nameloanerofficer,
		a.paidoffdate, 
		a.paidoffidmsuserofficer, getnameuser(a.paidoffidmsuserofficer) AS namepaidoffofficer,
		getnameuser(a.idmsusercreator) AS namecreator, getnameuser(a.idmsuserlasttrans) AS namelasttrans,
		idmstypeitemloanoffline, unit, priceperunit
		FROM trloan a
		WHERE 	a.lasttransact <> 'D' AND 
			(idmssupplier = CASE WHEN idmssupplierparam = "-1" THEN idmssupplier ELSE idmssupplierparam END) AND
			(YEAR(a.loandate) = CASE WHEN yearparam < 0 THEN YEAR(a.loandate) ELSE yearparam END AND
			MONTH(a.loandate) = CASE WHEN monthparam < 0 THEN MONTH(a.loandate) ELSE monthparam END AND
			DAY(a.loandate) = CASE WHEN dayparam < 0 THEN DAY(a.loandate) ELSE dayparam END)
		ORDER BY idfishermanoffline DESC, idbuyeroffline DESC, idmsuserloan DESC, idmsbuyerloan DESC,
			loandate ASC;
    END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `getltfish` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `getltfish`()
BEGIN
	SELECT * FROM ltfish
		WHERE lasttransact <> 'D';
    END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `getmsinfo` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `getmsinfo`(IN supportinfoparam VARCHAR(32))
BEGIN
	SELECT 	* 
		FROM msinfo 
		WHERE idmsinfo = supportinfoparam;
    END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `getofficer` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `getofficer`()
BEGIN
	SELECT 	a.*, b.usertypename, c.email, c.username, c.phonenumber, c.created_at,
		case when a.active = 0 then "No" else "Yes" end as activename,
		a.defaultlanguage as lang
		FROM msuser a
		JOIN ltusertype b
			ON a.idltusertype = b.idltusertype AND b.idltusertype < 0 AND a.lasttransact <> 'D'
		JOIN users c
			ON a.id = c.id;
    END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `getpayloanlist` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `getpayloanlist`(in monthparam int, in yearparam int)
BEGIN
	SELECT	a.idtrpayloan, a.descloan, a.loaninrp,
		a.idmsuserloan, CONCAT(getnameuser(a.idmsuserloan), " (Fisherman)") AS nameloan,
		a.idmsbuyerloan, CONCAT(getnamebuyer(a.idmsbuyerloan), " (Buyer)") AS nameloanbuyer,
		a.idmssupplier, getnamesupplier(a.idmssupplier) as namesupplier,
		a.paidoffdate, getnameuser(a.paidoffidmsuserofficer) AS namepaidoffofficer
		FROM trpayloan a
		WHERE 	a.lasttransact <> 'D' AND
			(YEAR(a.paidoffdate) = yearparam AND MONTH(a.paidoffdate) = monthparam);
	
    END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `getpayloanlistbyidmssupplier` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `getpayloanlistbyidmssupplier`(IN idmssupplierparam VARCHAR(32), IN dayparam INT, IN monthparam INT, IN yearparam INT)
BEGIN
	SELECT	*, COALESCE(nameloanfishermanoffline, nameloanbuyeroffline, nameloanfisherman, nameloanbuyer) AS nameloan
		FROM
		(SELECT	a.idtrpayloan, a.descloan, a.loaninrp,
			a.idmsuserloan, getnameuser(a.idmsuserloan) AS nameloanfisherman,
			a.idmsbuyerloan, getnamebuyer(a.idmsbuyerloan) AS nameloanbuyer,
			a.idfishermanoffline, getnamefishermanoffline(a.idfishermanoffline) AS nameloanfishermanoffline,
			a.idbuyeroffline, getnamebuyeroffline(a.idbuyeroffline) AS nameloanbuyeroffline,
			a.idmssupplier, getnamesupplier(a.idmssupplier) AS namesupplier,
			a.paidoffdate, getnameuser(a.paidoffidmsuserofficer) AS namepaidoffofficer
			FROM trpayloan a
			WHERE 	a.lasttransact <> 'D' AND
				(a.idmssupplier = CASE WHEN idmssupplierparam = "-1" THEN a.idmssupplier ELSE idmssupplierparam END) AND
				(YEAR(a.paidoffdate) = CASE WHEN yearparam < 0 THEN YEAR(a.paidoffdate) ELSE yearparam END AND
				MONTH(a.paidoffdate) = CASE WHEN monthparam < 0 THEN MONTH(a.paidoffdate) ELSE monthparam END AND
				DAY(a.paidoffdate) = CASE WHEN dayparam < 0 THEN DAY(a.paidoffdate) ELSE dayparam END)
		) a;
	
    END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `getpayloanlistbyidmsusersupplier` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `getpayloanlistbyidmsusersupplier`(IN idmsusersupplierparam VARCHAR(32), IN monthparam INT, IN yearparam INT)
BEGIN
	SELECT	a.idtrpayloan, a.descloan, a.loaninrp,
		a.idmsuserloan, b.name AS nameloan,
		a.paidoffdate
		FROM trpayloan a
		JOIN msuser b
			ON a.idmsuserloan = b.idmsuser
		WHERE 	a.lasttransact <> 'D' AND b.lasttransact <> 'D' AND
			a.idmssupplier = getidsupplierbossbyidmsuser(idmsusersupplierparam) AND
			(YEAR(a.paidoffdate) = yearparam AND MONTH(a.paidoffdate) = monthparam);
	
    END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `getprofilesupplierbyidmsuser` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`phpmyadmin`@`localhost` PROCEDURE `getprofilesupplierbyidmsuser`(IN `idmsuserparam` VARCHAR(32))
BEGIN
	SELECT 	a.idmsuser, 
		b.id, b.name, b.username, b.email, b.phonenumber, a.defaultlanguage,
		CASE WHEN a.active = 0 THEN "No" ELSE "Yes" END AS activename,
		d.idmssupplierofficer,
		c.idmssupplier, c.supplierid, c.suppliernatid, c.genre, 
		c.address, c.province, c.district, c.city,
		c.businesslicense, c.personalidcard, c.supplieridexpiredlicensedate
		FROM msuser a
		LEFT JOIN users b
			ON a.id = b.id
		LEFT JOIN mssupplier c
			ON a.idmsuser = c.idmsuser
		LEFT JOIN mssupplierofficer d
			ON a.idmsuser = d.idmsuser
		WHERE a.idmsuser = idmsuserparam;
    END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `getreportcatch` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `getreportcatch`(IN `idmssupplierparam` VARCHAR(32), IN `dayparam` INT, IN `monthparam` INT, IN `yearparam` INT)
BEGIN
	SELECT 	idtrcatch,
		COALESCE(idfishermanoffline, idbuyeroffline) AS idseller,
		CASE
			WHEN idfishermanoffline IS NOT NULL THEN CONCAT(getnamefishermanoffline(idfishermanoffline), " (Fisherman)")
			WHEN idbuyeroffline IS NOT NULL THEN CONCAT(getnamebuyeroffline(idbuyeroffline), " (Supplier)")
			ELSE ''
		END AS nameseller,
		totalprice, postdate, weight, quantity
		FROM trcatch
		WHERE 	(idmssupplier = CASE WHEN idmssupplierparam = "-1" THEN idmssupplier ELSE idmssupplierparam END) AND
			(YEAR(purchasedate) = CASE WHEN yearparam < 0 THEN YEAR(purchasedate) ELSE yearparam END AND
			MONTH(purchasedate) = CASE WHEN monthparam < 0 THEN MONTH(purchasedate) ELSE monthparam END AND
			DAY(purchasedate) = CASE WHEN dayparam < 0 THEN DAY(purchasedate) ELSE dayparam END)
			AND lasttransact <> 'D'
		ORDER BY postdate;
    END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `getreportcatchv2` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `getreportcatchv2`(IN `idmssupplierparam` VARCHAR(32), IN `dayparam` INT, IN `monthparam` INT, IN `yearparam` INT)
BEGIN
	SELECT 	idtrcatch,
		COALESCE(idfishermanoffline, idbuyeroffline) AS idseller,
		CASE
			WHEN idfishermanoffline IS NOT NULL THEN CONCAT(getnamefishermanoffline(idfishermanoffline), " (Fisherman)")
			WHEN idbuyeroffline IS NOT NULL THEN CONCAT(getnamebuyeroffline(idbuyeroffline), " (Supplier)")
			ELSE ''
		END AS nameseller,
		totalprice, postdate, purchasedate, weight, quantity
		FROM trcatch
		WHERE 	(idmssupplier = CASE WHEN idmssupplierparam = "-1" THEN idmssupplier ELSE idmssupplierparam END) AND
			(YEAR(purchasedate) = CASE WHEN yearparam < 0 THEN YEAR(purchasedate) ELSE yearparam END AND
			MONTH(purchasedate) = CASE WHEN monthparam < 0 THEN MONTH(purchasedate) ELSE monthparam END AND
			DAY(purchasedate) = CASE WHEN dayparam < 0 THEN DAY(purchasedate) ELSE dayparam END)
			AND lasttransact <> 'D'
		ORDER BY postdate;
    END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `getreportdelivery` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `getreportdelivery`(IN idmssupplierparam VARCHAR(32), IN dayparam INT, IN monthparam INT, IN yearparam INT)
BEGIN
	SELECT 	deliverysheetno,
		deliverydate,
		numberoffishorloin, totalweight,
		sellprice AS totalprice
		FROM trbatchdeliverysheet a
		WHERE 	(a.idmssupplier = CASE WHEN idmssupplierparam = "-1" THEN a.idmssupplier ELSE idmssupplierparam END) AND
			(YEAR(deliverydate) = CASE WHEN yearparam < 0 THEN YEAR(deliverydate) ELSE yearparam END AND
			MONTH(deliverydate) = CASE WHEN monthparam < 0 THEN MONTH(deliverydate) ELSE monthparam END AND
			DAY(deliverydate) = CASE WHEN dayparam < 0 THEN DAY(deliverydate) ELSE dayparam END) AND lasttransact <> 'D'
		ORDER BY deliverydate;
    END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `getreportloan` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `getreportloan`(IN idmssupplierparam VARCHAR(32), IN dayparam INT, IN monthparam INT, IN yearparam INT)
BEGIN
	SELECT 	idtrloan,
		idfishermanoffline, CONCAT(getnamefishermanoffline(idfishermanoffline), " (Fisherman)") AS nameloan,
		idbuyeroffline, CONCAT(getnamebuyeroffline(idbuyeroffline), " (Buyer)") AS nameloanbuyer,
		loaninrp, loandate
		FROM trloan a
		WHERE (idmssupplier = CASE WHEN idmssupplierparam = "-1" THEN idmssupplier ELSE idmssupplierparam END) AND
			(YEAR(a.loandate) = CASE WHEN yearparam < 0 THEN YEAR(a.loandate) ELSE yearparam END AND
			MONTH(a.loandate) = CASE WHEN monthparam < 0 THEN MONTH(a.loandate) ELSE monthparam END AND
			DAY(a.loandate) = CASE WHEN dayparam < 0 THEN DAY(a.loandate) ELSE dayparam END)
			AND lasttransact <> 'D'
		ORDER BY loandate;
    END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `getreportlog` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `getreportlog`(IN idmssupplierparam VARCHAR(32), IN dayparam INT, IN monthparam INT, IN yearparam INT)
BEGIN
	SELECT 	a.functiontype, a.functionname, a.descdata, a.transdate,
		b.idmsuser, c.name AS username, b.transdate AS submitdate,
		d.idmssupplierofficer, e.idmssupplier
		FROM trsyncdata a
		JOIN trsyncjson b
			ON a.idtrsyncjson = b.idtrsyncjson
		JOIN msuser c
			ON b.idmsuser = c.idmsuser
		LEFT JOIN mssupplierofficer d
			ON b.idmsuser = d.idmsuser
		LEFT JOIN mssupplier e
			ON b.idmsuser = e.idmsuser
		WHERE 	((d.idmssupplier = CASE WHEN idmssupplierparam = "-1" THEN d.idmssupplier ELSE idmssupplierparam END) OR
			(e.idmssupplier = CASE WHEN idmssupplierparam = "-1" THEN e.idmssupplier ELSE idmssupplierparam END)) AND
			(YEAR(a.transdate) = CASE WHEN yearparam < 0 THEN YEAR(a.transdate) ELSE yearparam END AND
			MONTH(a.transdate) = CASE WHEN monthparam < 0 THEN MONTH(a.transdate) ELSE monthparam END AND
			DAY(a.transdate) = CASE WHEN dayparam < 0 THEN DAY(a.transdate) ELSE dayparam END);
    END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `getreportpayloan` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `getreportpayloan`(IN idmssupplierparam VARCHAR(32), IN dayparam INT, IN monthparam INT, IN yearparam INT)
BEGIN
	SELECT 	b.idtrpayloan,
		COALESCE(idfishermanoffline, idbuyeroffline) AS idloaner,
		CASE
			WHEN idfishermanoffline IS NOT NULL THEN CONCAT(getnamefishermanoffline(idfishermanoffline), " (Fisherman)")
			WHEN idbuyeroffline IS NOT NULL THEN CONCAT(getnamebuyeroffline(idbuyeroffline), " (Supplier)")
			ELSE ''
		END AS namepayer,
		b.loaninrp, b.paidoffdate
		FROM trpayloan b
		WHERE 	(idmssupplier = CASE WHEN idmssupplierparam = "-1" THEN idmssupplier ELSE idmssupplierparam END) AND
			(YEAR(b.paidoffdate) = CASE WHEN yearparam < 0 THEN YEAR(b.paidoffdate) ELSE yearparam END AND
			MONTH(b.paidoffdate) = CASE WHEN monthparam < 0 THEN MONTH(b.paidoffdate) ELSE monthparam END AND
			DAY(b.paidoffdate) = CASE WHEN dayparam < 0 THEN DAY(b.paidoffdate) ELSE dayparam END)
		ORDER BY paidoffdate;
    END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `getsailbymssupplier` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `getsailbymssupplier`(in idmssupplierparam varchar(32))
BEGIN
	SELECT 	idtrsail,
		a.idmsship, b.shipname,
		sailposition, sailingdate,
		idmslandingsite,
		a.idmsfisherman, getnamefisherman(a.idmsfisherman) AS fishermanname
		FROM trsail a
		JOIN msship b
			ON a.idmsship = b.idmsship
		WHERE a.lasttransact <> 'D' AND idmssupplier = idmssupplierparam;
    END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `getshipbyidmsuser` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `getshipbyidmsuser`(IN `idparam` VARCHAR(32))
BEGIN
	SELECT	idmsship, idshipoffline, 
	vesselname_param, vessellicensenumber_param, 
	vessellicenseexpiredate_param, fishinglicensenumber_param, 
	fishinglicenseexpiredate_param, vesselsize_param, 
	vesselflag_param, vesselgeartype_param, 
	vesseldatemade_param, vesselownername_param, 
	vesselownerid_param, vesselownerphone_param, 
	vesselownersex_param, vesselownerdob_param, 
	vesselowneraddress_param
	FROM msship a
	WHERE idmsuserparam = getidsupplierbossbyidmsuser(idparam) AND lasttransact <> 'D'
    ORDER BY vesselname_param;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `getshipbyidmsuserv2` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `getshipbyidmsuserv2`(IN `idparam` VARCHAR(32))
BEGIN
	SELECT	*,
		b.indonesian_name AS fishinggear_indonesia, b.english_name AS fishinggear_english, b.abbr AS fishinggear_abbr
		FROM msship a
		left JOIN ltfishinggear b
		ON a.vesselgeartype_param = b.api_code
	WHERE idmsuserparam = getidsupplierbossbyidmsuser(idparam)
	ORDER BY vesselname_param;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `getsupplier` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `getsupplier`()
BEGIN
	SELECT 	a.idmssupplier, a.suppliernatid, a.supplierid,
		a.genre, a.address, a.businesslicense, a.personalidcard, a.province, a.city, a.district,
		b.*, c.usertypename, d.email, d.username, d.phonenumber, d.created_at,
		CASE WHEN b.active = 0 THEN "No" ELSE "Yes" END AS activename, b.defaultlanguage AS lang,
		a.supplieridexpiredlicensedate
		FROM mssupplier a
		LEFT JOIN msuser b
			ON a.idmsuser = b.idmsuser AND b.lasttransact <> 'D' AND a.lasttransact <> 'D'
		LEFT JOIN ltusertype c
			ON b.idltusertype = c.idltusertype
		JOIN users d
			ON b.id = d.id
        ORDER BY b.name;
    END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `getsupplieraccept` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `getsupplieraccept`(IN idparam VARCHAR(32))
BEGIN
	SELECT 	*
		FROM mssuppliertemp
		WHERE (lasttransact <> 'D' AND acceptdate IS NULL) AND
		idmssuppliertemp = CASE WHEN idparam IS NULL THEN idmssuppliertemp ELSE idparam END;
    END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `getsupplierbyidmsuser` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `getsupplierbyidmsuser`(IN `idmsuserparam` VARCHAR(32))
BEGIN
	SELECT 	a.idmssupplier, a.suppliernatid, a.supplierid,
		a.genre, a.address, a.businesslicense, a.personalidcard AS suppliernatcode, a.province, a.city, a.district,
		b.*, c.usertypename, d.email, d.username, d.phonenumber, d.created_at,
		CASE WHEN b.active = 0 THEN "No" ELSE "Yes" END AS activename, b.defaultlanguage AS lang,
		a.supplieridexpiredlicensedate
		FROM mssupplier a
		LEFT JOIN msuser b
			ON a.idmsuser = b.idmsuser AND b.lasttransact <> 'D' AND a.lasttransact <> 'D'
		LEFT JOIN ltusertype c
			ON b.idltusertype = c.idltusertype
		JOIN users d
			ON b.id = d.id
		WHERE a.idmsuser = idmsuserparam
        ORDER BY b.name;
    END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `getsupplierofficer` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `getsupplierofficer`()
BEGIN
	SELECT 	a.idmsuser,
		b.name, b.idltusertype,
		c.email, c.username, c.phonenumber, c.created_at,
		b.active, CASE WHEN b.active = 0 THEN "No" ELSE "Yes" END AS activename,
		a.idmssupplier, getnamesupplier(a.idmssupplier) AS suppliername, b.defaultlanguage AS lang,
		accesspage, accessrole
		FROM mssupplierofficer a
		LEFT JOIN msuser b
			ON a.idmsuser = b.idmsuser AND idltusertype = 2
		LEFT JOIN users c
			ON b.id = c.id
		WHERE a.lasttransact <> 'D' AND b.lasttransact <> 'D'
        ORDER BY b.name;
    END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `getsupplierofficerbyidmssupplier` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `getsupplierofficerbyidmssupplier`(IN `idmssupplierparam` VARCHAR(32))
BEGIN
	SELECT 	a.idmsuser,
		b.name, b.idltusertype,
		c.email, c.username, c.phonenumber, c.created_at,
		b.active, CASE WHEN b.active = 0 THEN "No" ELSE "Yes" END AS activename,
		a.idmssupplier, getnamesupplier(a.idmssupplier) AS suppliername, b.defaultlanguage AS lang,
		accesspage, accessrole
		FROM mssupplierofficer a
		LEFT JOIN msuser b
			ON a.idmsuser = b.idmsuser AND idltusertype = 2 AND b.lasttransact <> 'D'
		LEFT JOIN users c
			ON b.id = c.id
		WHERE 	a.idmssupplier = idmssupplierparam AND
			a.lasttransact <> 'D'
        ORDER BY b.name;
    END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `gettypeitemloan` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`phpmyadmin`@`localhost` PROCEDURE `gettypeitemloan`(IN idmssupplierparam VARCHAR(32))
BEGIN
	SELECT 	*
		FROM mstypeitemloan 
		WHERE idmssupplier = idmssupplierparam;
    END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `getvalidusername` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `getvalidusername`(in idparam varchar(191))
BEGIN
	SELECT * FROM users WHERE email = idparam OR username = idparam OR phonenumber = idparam;
    END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `investgetsupplier` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_unicode_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `investgetsupplier`()
BEGIN
	SELECT 	a.idmsuser, a.idmssupplier, a.suppliernatid, a.supplierid,
		a.genre, a.address, a.businesslicense, a.personalidcard, a.province, a.city, a.district,
		b.*, c.usertypename, d.email, d.username, d.phonenumber, d.created_at,
		CASE WHEN b.active = 0 THEN "No" ELSE "Yes" END AS activename, b.defaultlanguage AS lang,
		a.supplieridexpiredlicensedate
		FROM mssupplier a
		LEFT JOIN msuser b
			ON a.idmsuser = b.idmsuser AND b.lasttransact <> 'D' AND a.lasttransact <> 'D'
		LEFT JOIN ltusertype c
			ON b.idltusertype = c.idltusertype
		JOIN users d
			ON b.id = d.id
            WHERE b.name <> ''
        ORDER BY b.name;
    END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `investreport` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_unicode_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `investreport`(IN `idmsuserparam` VARCHAR(32))
    NO SQL
SELECT sourceTable.dateVal as date, userTable.name as name, sourceTable.category, sourceTable.income, sourceTable.expense  FROM (
    SELECT 'Buy Fish' AS category, idmsuser, 0 AS income, amount AS expense, substr(trxdate,1,10) AS dateVal FROM investbuyfish WHERE trxoperation <> 'D'
    UNION ALL
    SELECT 'Split Fish' AS category, idmsuser, amount AS income, 0 AS expense, substr(trxdate,1,10) AS dateVal FROM investsplitfish WHERE trxoperation <> 'D'
    UNION ALL
    SELECT 'Sell Fish' AS category, idmsuser, amount AS income, 0 AS expense, substr(trxdate,1,10) AS dateVal FROM investsimplesellfish WHERE trxoperation <> 'D'
    UNION ALL
    SELECT 'Credit Payment' AS category, idmsuser, amount AS income, 0 AS expense, substr(trxdate,1,10) AS dateVal FROM investcreditpayment WHERE trxoperation <> 'D'
    UNION ALL
    SELECT 'Give Credit' AS category, idmsuser, 0 AS income, amount AS expense, substr(trxdate,1,10) AS dateVal FROM investgivecredit WHERE trxoperation <> 'D'
    UNION ALL
    SELECT 'Pay Loan' AS category, idmsuser, 0 AS income, amount AS expense, substr(trxdate,1,10) AS dateVal FROM investpayloan WHERE trxoperation <> 'D'
    UNION ALL
    SELECT 'Take Loan' AS category, idmsuser, amount AS income, 0 AS expense, substr(trxdate,1,10) AS dateVal FROM investtakeloan WHERE trxoperation <> 'D'
    UNION ALL
    SELECT ct.label AS category, ci.idmsuser, ci.amount AS income, 0 AS expense, substr(ci.trxdate,1,10) AS dateVal FROM investcustomincome AS ci LEFT JOIN investcustomtype AS ct ON ct.offlineID = ci.offlineCustomTypeID WHERE ci.trxoperation <> 'D'
    UNION ALL
    SELECT ct.label AS category, ce.idmsuser, 0 AS income, ce.amount AS expense, substr(ce.trxdate,1,10) AS dateVal FROM investcustomexpense AS ce LEFT JOIN investcustomtype AS ct ON ct.offlineID = ce.offlineCustomTypeID WHERE ce.trxoperation <> 'D'
) AS sourceTable 
LEFT JOIN msuser userTable
    ON sourceTable.idmsuser = userTable.idmsuser
WHERE (
    CASE
    	WHEN idmsuserparam <> '-1' THEN sourceTable.idmsuser = idmsuserparam ELSE true
    END
) ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `investreportbetweendate` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_unicode_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `investreportbetweendate`(IN `idmsuserparam` VARCHAR(32), IN `startdate` VARCHAR(32), IN `enddate` VARCHAR(32), IN `catfilter` TEXT, IN `cityparam` VARCHAR(128))
    NO SQL
SELECT str_to_date(sourceTable.dateVal,'%Y-%m-%d') as date, userTable.name as name, supplierTable.city, sourceTable.category, sourceTable.income, sourceTable.expense FROM (
    SELECT 'Buy Fish' AS category, idmsuser, 0 AS income, amount AS expense, substr(trxdate,1,10) AS dateVal FROM investbuyfish WHERE trxoperation <> 'D'
    UNION ALL
    SELECT 'Sell Fish' AS category, idmsuser, amount AS income, 0 AS expense, substr(trxdate,1,10) AS dateVal FROM investsplitfish WHERE trxoperation <> 'D' AND sold <> 0
    UNION ALL
    SELECT 'Sell Fish' AS category, idmsuser, amount AS income, 0 AS expense, substr(trxdate,1,10) AS dateVal FROM investsimplesellfish WHERE trxoperation <> 'D'
    UNION ALL
    SELECT 'Credit Payment' AS category, idmsuser, amount AS income, 0 AS expense, substr(trxdate,1,10) AS dateVal FROM investcreditpayment WHERE trxoperation <> 'D'
    UNION ALL
    SELECT 'Give Credit' AS category, idmsuser, 0 AS income, amount AS expense, substr(trxdate,1,10) AS dateVal FROM investgivecredit WHERE trxoperation <> 'D'
    UNION ALL
    SELECT 'Pay Loan' AS category, idmsuser, 0 AS income, amount AS expense, substr(trxdate,1,10) AS dateVal FROM investpayloan WHERE trxoperation <> 'D'
    UNION ALL
    SELECT 'Take Loan' AS category, idmsuser, amount AS income, 0 AS expense, substr(trxdate,1,10) AS dateVal FROM investtakeloan WHERE trxoperation <> 'D'
    UNION ALL
    SELECT ct.label AS category, ci.idmsuser, ci.amount AS income, 0 AS expense, substr(ci.trxdate,1,10) AS dateVal FROM investcustomincome AS ci LEFT JOIN investcustomtype AS ct ON ct.offlineID = ci.offlineCustomTypeID WHERE ci.trxoperation <> 'D'
    UNION ALL
    SELECT ct.label AS category, ce.idmsuser, 0 AS income, ce.amount AS expense, substr(ce.trxdate,1,10) AS dateVal FROM investcustomexpense AS ce LEFT JOIN investcustomtype AS ct ON ct.offlineID = ce.offlineCustomTypeID WHERE ce.trxoperation <> 'D'
) AS sourceTable 
LEFT JOIN msuser userTable
    ON sourceTable.idmsuser = userTable.idmsuser
LEFT JOIN mssupplier supplierTable
	ON sourceTable.idmsuser = supplierTable.idmsuser
WHERE (
        CASE
            WHEN startdate <> '-1' AND enddate <> '-1' THEN date(sourceTable.dateVal) BETWEEN date(startdate) AND date(enddate) 
            ELSE true
        END
    AND
        CASE
            WHEN idmsuserparam <> '-1' THEN sourceTable.idmsuser = idmsuserparam 
            ELSE true
        END 
    AND
        CASE
            WHEN cityparam <> '-1' THEN supplierTable.city LIKE cityparam 
            ELSE true
        END 
    AND
        CASE
    	    WHEN catfilter <> '-1' THEN FIND_IN_SET(sourceTable.category,catfilter) > 0 ELSE true
        END
)
ORDER BY date DESC ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `investreportbetweendatev2` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_unicode_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `investreportbetweendatev2`(IN `idmsuserparam` VARCHAR(32), IN `startdate` VARCHAR(32), IN `enddate` VARCHAR(32), IN `catfilter` TEXT, IN `cityparam` VARCHAR(128))
    NO SQL
SELECT str_to_date(sourceTable.dateVal,'%Y-%m-%d') as date, userTable.name as name, supplierTable.city, sourceTable.category, sourceTable.income, sourceTable.expense FROM (
    SELECT 'Buy Fish' AS category, idmsuser, 0 AS income, amount AS expense, substr(from_unixtime(ts),1,10) AS dateVal FROM investbuyfish WHERE trxoperation <> 'D'
    UNION ALL
    SELECT 'Sell Fish' AS category, idmsuser, amount AS income, 0 AS expense, substr(from_unixtime(ts),1,10) AS dateVal FROM investsplitfish WHERE trxoperation <> 'D' AND sold <> 0
    UNION ALL
    SELECT 'Sell Fish' AS category, idmsuser, amount AS income, 0 AS expense, substr(from_unixtime(ts),1,10) AS dateVal FROM investsimplesellfish WHERE trxoperation <> 'D'
    UNION ALL
    SELECT 'Credit Payment' AS category, idmsuser, amount AS income, 0 AS expense, substr(from_unixtime(ts),1,10) AS dateVal FROM investcreditpayment WHERE trxoperation <> 'D'
    UNION ALL
    SELECT 'Give Credit' AS category, idmsuser, 0 AS income, amount AS expense, substr(from_unixtime(ts),1,10) AS dateVal FROM investgivecredit WHERE trxoperation <> 'D'
    UNION ALL
    SELECT 'Pay Loan' AS category, idmsuser, 0 AS income, amount AS expense, substr(from_unixtime(ts),1,10) AS dateVal FROM investpayloan WHERE trxoperation <> 'D'
    UNION ALL
    SELECT 'Take Loan' AS category, idmsuser, amount AS income, 0 AS expense, substr(from_unixtime(ts),1,10) AS dateVal FROM investtakeloan WHERE trxoperation <> 'D'
    UNION ALL
    SELECT ct.label AS category, ci.idmsuser, ci.amount AS income, 0 AS expense, substr(from_unixtime(ci.ts),1,10) AS dateVal FROM investcustomincome AS ci LEFT JOIN investcustomtype AS ct ON ct.offlineID = ci.offlineCustomTypeID WHERE ci.trxoperation <> 'D'
    UNION ALL
    SELECT ct.label AS category, ce.idmsuser, 0 AS income, ce.amount AS expense, substr(from_unixtime(ce.ts),1,10) AS dateVal FROM investcustomexpense AS ce LEFT JOIN investcustomtype AS ct ON ct.offlineID = ce.offlineCustomTypeID WHERE ce.trxoperation <> 'D'
) AS sourceTable 
LEFT JOIN msuser userTable
    ON sourceTable.idmsuser = userTable.idmsuser
LEFT JOIN mssupplier supplierTable
	ON sourceTable.idmsuser = supplierTable.idmsuser
WHERE (
        CASE
            WHEN startdate <> '-1' AND enddate <> '-1' THEN date(sourceTable.dateVal) BETWEEN date(startdate) AND date(enddate) 
            ELSE true
        END
    AND
        CASE
            WHEN idmsuserparam <> '-1' THEN sourceTable.idmsuser = idmsuserparam 
            ELSE true
        END 
    AND
        CASE
            WHEN cityparam <> '-1' THEN supplierTable.city LIKE cityparam 
            ELSE true
        END 
    AND
        CASE
    	    WHEN catfilter <> '-1' THEN FIND_IN_SET(sourceTable.category,catfilter) > 0 ELSE true
        END
)
ORDER BY date DESC ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `investreportcategory` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_unicode_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `investreportcategory`(IN `idmsuserparam` VARCHAR(32))
    NO SQL
SELECT DISTINCT sourceTable.category FROM (
    SELECT 'Buy Fish' AS category, idmsuser, 0 AS income, amount AS expense, substr(trxdate,1,10) AS dateVal FROM investbuyfish WHERE trxoperation <> 'D'
    UNION ALL
    SELECT 'Sell Fish' AS category, idmsuser, amount AS income, 0 AS expense, substr(trxdate,1,10) AS dateVal FROM investsplitfish WHERE trxoperation <> 'D'
    UNION ALL
    SELECT 'Sell Fish' AS category, idmsuser, amount AS income, 0 AS expense, substr(trxdate,1,10) AS dateVal FROM investsimplesellfish WHERE trxoperation <> 'D'
    UNION ALL
    SELECT 'Credit Payment' AS category, idmsuser, amount AS income, 0 AS expense, substr(trxdate,1,10) AS dateVal FROM investcreditpayment WHERE trxoperation <> 'D'
    UNION ALL
    SELECT 'Give Credit' AS category, idmsuser, 0 AS income, amount AS expense, substr(trxdate,1,10) AS dateVal FROM investgivecredit WHERE trxoperation <> 'D'
    UNION ALL
    SELECT 'Pay Loan' AS category, idmsuser, 0 AS income, amount AS expense, substr(trxdate,1,10) AS dateVal FROM investpayloan WHERE trxoperation <> 'D'
    UNION ALL
    SELECT 'Take Loan' AS category, idmsuser, amount AS income, 0 AS expense, substr(trxdate,1,10) AS dateVal FROM investtakeloan WHERE trxoperation <> 'D'
    UNION ALL
    SELECT ct.label AS category, ci.idmsuser, ci.amount AS income, 0 AS expense, substr(ci.trxdate,1,10) AS dateVal FROM investcustomincome AS ci LEFT JOIN investcustomtype AS ct ON ct.offlineID = ci.offlineCustomTypeID WHERE ci.trxoperation <> 'D'
    UNION ALL
    SELECT ct.label AS category, ce.idmsuser, 0 AS income, ce.amount AS expense, substr(ce.trxdate,1,10) AS dateVal FROM investcustomexpense AS ce LEFT JOIN investcustomtype AS ct ON ct.offlineID = ce.offlineCustomTypeID WHERE ce.trxoperation <> 'D'
) AS sourceTable 
LEFT JOIN msuser userTable
    ON sourceTable.idmsuser = userTable.idmsuser
WHERE (
    LENGTH(sourceTable.category) > 0 AND
        CASE
            WHEN idmsuserparam <> '-1' THEN sourceTable.idmsuser = idmsuserparam 
            ELSE true
        END 
) ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `investreportdumpdata` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_unicode_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `investreportdumpdata`(IN `idmsuserparam` VARCHAR(32), IN `startdate` VARCHAR(32), IN `enddate` VARCHAR(32), IN `catfilter` TEXT, IN `cityparam` VARCHAR(128))
    NO SQL
SELECT date,name,city,category,income,expense,data1,data2,data3,data4,data5,data6,data7,data8,data9,data10,data11 FROM (

SELECT
  st.idmsuser,
  str_to_date(substr(st.trxdate,1,10),'%Y-%m-%d') as date, 
  ut.name as name, 
  spt.city, 
  'Buy Fish' AS category, 
  0 AS income, 
  st.amount AS expense,
  str_to_date(substr(st.trxdate,1,10),'%Y-%m-%d') AS data1,
  st.amount AS data2,
  st.species AS data3,
  st.weightBeforeSplit AS data4,
  st.grade AS data5,
  st.notes AS data6,
  st.fishermanname AS data7,
  st.fishingground AS data8,
  st.shipName AS data9,
  st.landingDate AS data10,
  st.portName AS data11
FROM investbuyfish AS st
LEFT JOIN msuser ut
  ON st.idmsuser = ut.idmsuser
LEFT JOIN mssupplier spt
  ON st.idmsuser = spt.idmsuser
WHERE trxoperation <> 'D'

UNION ALL

SELECT
  st.idmsuser,
  str_to_date(substr(st.trxdate,1,10),'%Y-%m-%d') as date, 
  ut.name as name, 
  spt.city, 
  'Sell Fish' AS category,
  st.amount AS income, 
  0 AS expense,
  str_to_date(substr(st.trxdate,1,10),'%Y-%m-%d') as data1,
  st.amount AS data2,
  ibf.species AS data3,
  st.weightOnSplit AS data4,
  ibf.grade AS data5,
  st.notes AS data6,
  '' AS data7,
  '' AS data8,
  '' AS data9,
  '' AS data10,
  '' AS data11
FROM investsplitfish AS st 
LEFT JOIN investbuyfish ibf
  ON st.buyFishOfflineID = ibf.offlineID
LEFT JOIN msuser ut
  ON st.idmsuser = ut.idmsuser
LEFT JOIN mssupplier spt
  ON st.idmsuser = spt.idmsuser
WHERE st.trxoperation <> 'D' AND sold <> 0 

    UNION ALL

SELECT
  st.idmsuser,
  str_to_date(substr(st.trxdate,1,10),'%Y-%m-%d') as date, 
  ut.name as name, 
  spt.city, 
  'Sell Fish' AS category,
  st.amount AS income, 
  0 AS expense,
  str_to_date(substr(st.trxdate,1,10),'%Y-%m-%d') as data1,
  st.amount AS data2,
  ltf.threea_code AS data3,
  st.weight AS data4,
  st.grade AS data5,
  st.notes AS data6,
  '' AS data7,
  '' AS data8,
  '' AS data9,
  '' AS data10,
  '' AS data11
FROM investsimplesellfish AS st 
LEFT JOIN msfish msf
  ON st.fishOfflineID = msf.idfishoffline
LEFT JOIN ltfish ltf
  ON msf.idltfish = ltf.idltfish
LEFT JOIN msuser ut
  ON st.idmsuser = ut.idmsuser
LEFT JOIN mssupplier spt
  ON st.idmsuser = spt.idmsuser
WHERE st.trxoperation <> 'D'

UNION ALL

SELECT
  st.idmsuser,
  str_to_date(substr(st.trxdate,1,10),'%Y-%m-%d') as date, 
  ut.name as name, 
  spt.city, 
  'Give Credit' AS category, 
  0 AS income, 
  st.amount AS expense, 
  str_to_date(substr(st.trxdate,1,10),'%Y-%m-%d') as data1,
  st.amount AS data2,
  st.name AS data3,
  st.notes AS data4,
  '' AS data5,
  '' AS data6,
  '' AS data7,
  '' AS data8,
  '' AS data9,
  '' AS data10,
  '' AS data11
FROM investgivecredit AS st 
LEFT JOIN msuser ut
  ON st.idmsuser = ut.idmsuser
LEFT JOIN mssupplier spt
  ON st.idmsuser = spt.idmsuser
WHERE st.trxoperation <> 'D'

UNION ALL

SELECT
  st.idmsuser,
  str_to_date(substr(st.trxdate,1,10),'%Y-%m-%d') as date, 
  ut.name as name, 
  spt.city, 
  'Credit Payment' AS category, 
  st.amount AS income, 
  0 AS expense, 
  str_to_date(substr(st.trxdate,1,10),'%Y-%m-%d') as data1,
  st.amount AS data2,
  st.notes AS data3,
  (CASE st.paidoff WHEN 0 THEN 'not paid' ELSE 'paid off' END) AS data4,
  '' AS data5,
  '' AS data6,
  '' AS data7,
  '' AS data8,
  '' AS data9,
  '' AS data10,
  '' AS data11
FROM investcreditpayment AS st 
LEFT JOIN msuser ut
  ON st.idmsuser = ut.idmsuser
LEFT JOIN mssupplier spt
  ON st.idmsuser = spt.idmsuser
WHERE st.trxoperation <> 'D'

UNION ALL

SELECT
  st.idmsuser,
  str_to_date(substr(st.trxdate,1,10),'%Y-%m-%d') as date, 
  ut.name as name, 
  spt.city, 
  'Take Loan' AS category, 
  st.amount AS income, 
  0 AS expense, 
  str_to_date(substr(st.trxdate,1,10),'%Y-%m-%d') as data1,
  st.amount AS data2,
  st.creditor AS data3,
  st.tenor AS data4,
  st.installment AS data5,
  (CASE st.payperiod WHEN 0 THEN 'daily' WHEN 1 THEN 'weekly' ELSE 'monthly' END) AS data6,
  st.notes AS data7,
  '' AS data8,
  '' AS data9,
  '' AS data10,
  '' AS data11
FROM investtakeloan AS st 
LEFT JOIN msuser ut
  ON st.idmsuser = ut.idmsuser
LEFT JOIN mssupplier spt
  ON st.idmsuser = spt.idmsuser
WHERE st.trxoperation <> 'D'

UNION ALL

SELECT
  st.idmsuser,
  str_to_date(substr(st.trxdate,1,10),'%Y-%m-%d') as date, 
  ut.name as name, 
  spt.city, 
  'Pay Loan' AS category, 
  0 AS income, 
  st.amount AS expense, 
  str_to_date(substr(st.trxdate,1,10),'%Y-%m-%d') as data1,
  st.amount AS data2,
  st.notes AS data3,
  (CASE st.paidoff WHEN 0 THEN 'not paid' ELSE 'paid off' END) AS data4,
  '' AS data5,
  '' AS data6,
  '' AS data7,
  '' AS data8,
  '' AS data9,
  '' AS data10,
  '' AS data11
FROM investpayloan AS st 
LEFT JOIN msuser ut
  ON st.idmsuser = ut.idmsuser
LEFT JOIN mssupplier spt
  ON st.idmsuser = spt.idmsuser
WHERE st.trxoperation <> 'D'

UNION ALL

SELECT
  st.idmsuser,
  str_to_date(substr(st.trxdate,1,10),'%Y-%m-%d') as date, 
  ut.name as name, 
  spt.city, 
  ct.label AS category, 
  st.amount AS income, 
  0 AS expense,
  str_to_date(substr(st.trxdate,1,10),'%Y-%m-%d') as data1,
  st.amount AS data2,
  st.notes AS data3,
  '' AS data4,
  '' AS data5,
  '' AS data6,
  '' AS data7,
  '' AS data8,
  '' AS data9,
  '' AS data10,
  '' AS data11
FROM investcustomincome st 
LEFT JOIN investcustomtype ct 
  ON ct.offlineID = st.offlineCustomTypeID 
LEFT JOIN msuser ut
  ON st.idmsuser = ut.idmsuser
LEFT JOIN mssupplier spt
  ON st.idmsuser = spt.idmsuser
WHERE st.trxoperation <> 'D'

UNION ALL

SELECT
  st.idmsuser,
  str_to_date(substr(st.trxdate,1,10),'%Y-%m-%d') as date, 
  ut.name as name, 
  spt.city, 
  ct.label AS category, 
  0 AS income,
  st.amount AS expense, 
  str_to_date(substr(st.trxdate,1,10),'%Y-%m-%d') as data1,
  st.amount AS data2,
  st.notes AS data3,
  '' AS data4,
  '' AS data5,
  '' AS data6,
  '' AS data7,
  '' AS data8,
  '' AS data9,
  '' AS data10,
  '' AS data11
FROM investcustomexpense st 
LEFT JOIN investcustomtype ct 
  ON ct.offlineID = st.offlineCustomTypeID 
LEFT JOIN msuser ut
  ON st.idmsuser = ut.idmsuser
LEFT JOIN mssupplier spt
  ON st.idmsuser = spt.idmsuser
WHERE st.trxoperation <> 'D'

) AS sourceTable 
WHERE (
		CASE
			WHEN startdate <> '-1' AND enddate <> '-1' THEN date(sourceTable.date) BETWEEN date(startdate) AND date(enddate) 
			ELSE true
		END
	AND
		CASE
			WHEN idmsuserparam <> '-1' THEN sourceTable.idmsuser = idmsuserparam 
			ELSE true
		END 
	AND
		CASE
			WHEN cityparam <> '-1' THEN sourceTable.city LIKE cityparam 
			ELSE true
		END 
	AND
		CASE
			WHEN catfilter <> '-1' THEN FIND_IN_SET(sourceTable.category,catfilter) > 0 ELSE true
		END
)
ORDER BY date DESC ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `investreportdumpdatav2` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_unicode_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `investreportdumpdatav2`(IN `idmsuserparam` VARCHAR(32), IN `startdate` VARCHAR(32), IN `enddate` VARCHAR(32), IN `catfilter` TEXT, IN `cityparam` VARCHAR(128))
    NO SQL
SELECT date,name,city,category,income,expense,data1,data2,data3,data4,data5,data6,data7,data8,data9,data10,data11 FROM (

SELECT
  st.idmsuser,
  str_to_date(substr(from_unixtime(st.ts),1,10),'%Y-%m-%d') as date, 
  ut.name as name, 
  spt.city, 
  'Buy Fish' AS category, 
  0 AS income, 
  st.amount AS expense,
  str_to_date(substr(from_unixtime(st.ts),1,10),'%Y-%m-%d') AS data1,
  st.amount AS data2,
  st.species AS data3,
  st.weightBeforeSplit AS data4,
  st.grade AS data5,
  st.notes AS data6,
  st.fishermanname AS data7,
  st.fishingground AS data8,
  st.shipName AS data9,
  st.landingDate AS data10,
  st.portName AS data11
FROM investbuyfish AS st
LEFT JOIN msuser ut
  ON st.idmsuser = ut.idmsuser
LEFT JOIN mssupplier spt
  ON st.idmsuser = spt.idmsuser
WHERE trxoperation <> 'D'

UNION ALL

SELECT
  st.idmsuser,
  str_to_date(substr(from_unixtime(st.ts),1,10),'%Y-%m-%d') as date, 
  ut.name as name, 
  spt.city, 
  'Sell Fish' AS category,
  st.amount AS income, 
  0 AS expense,
  str_to_date(substr(from_unixtime(st.ts),1,10),'%Y-%m-%d') as data1,
  st.amount AS data2,
  ibf.species AS data3,
  st.weightOnSplit AS data4,
  ibf.grade AS data5,
  st.notes AS data6,
  '' AS data7,
  '' AS data8,
  '' AS data9,
  '' AS data10,
  '' AS data11
FROM investsplitfish AS st 
LEFT JOIN investbuyfish ibf
  ON st.buyFishOfflineID = ibf.offlineID
LEFT JOIN msuser ut
  ON st.idmsuser = ut.idmsuser
LEFT JOIN mssupplier spt
  ON st.idmsuser = spt.idmsuser
WHERE st.trxoperation <> 'D' AND sold <> 0 

    UNION ALL

SELECT
  st.idmsuser,
  str_to_date(substr(from_unixtime(st.ts),1,10),'%Y-%m-%d') as date, 
  ut.name as name, 
  spt.city, 
  'Sell Fish' AS category,
  st.amount AS income, 
  0 AS expense,
  str_to_date(substr(from_unixtime(st.ts),1,10),'%Y-%m-%d') as data1,
  st.amount AS data2,
  ltf.threea_code AS data3,
  st.weight AS data4,
  st.grade AS data5,
  st.notes AS data6,
  '' AS data7,
  '' AS data8,
  '' AS data9,
  '' AS data10,
  '' AS data11
FROM investsimplesellfish AS st 
LEFT JOIN msfish msf
  ON st.fishOfflineID = msf.idfishoffline
LEFT JOIN ltfish ltf
  ON msf.idltfish = ltf.idltfish
LEFT JOIN msuser ut
  ON st.idmsuser = ut.idmsuser
LEFT JOIN mssupplier spt
  ON st.idmsuser = spt.idmsuser
WHERE st.trxoperation <> 'D'

UNION ALL

SELECT
  st.idmsuser,
  str_to_date(substr(from_unixtime(st.ts),1,10),'%Y-%m-%d') as date, 
  ut.name as name, 
  spt.city, 
  'Give Credit' AS category, 
  0 AS income, 
  st.amount AS expense, 
  str_to_date(substr(from_unixtime(st.ts),1,10),'%Y-%m-%d') as data1,
  st.amount AS data2,
  st.name AS data3,
  st.notes AS data4,
  '' AS data5,
  '' AS data6,
  '' AS data7,
  '' AS data8,
  '' AS data9,
  '' AS data10,
  '' AS data11
FROM investgivecredit AS st 
LEFT JOIN msuser ut
  ON st.idmsuser = ut.idmsuser
LEFT JOIN mssupplier spt
  ON st.idmsuser = spt.idmsuser
WHERE st.trxoperation <> 'D'

UNION ALL

SELECT
  st.idmsuser,
  str_to_date(substr(from_unixtime(st.ts),1,10),'%Y-%m-%d') as date, 
  ut.name as name, 
  spt.city, 
  'Credit Payment' AS category, 
  st.amount AS income, 
  0 AS expense, 
  str_to_date(substr(from_unixtime(st.ts),1,10),'%Y-%m-%d') as data1,
  st.amount AS data2,
  st.notes AS data3,
  (CASE st.paidoff WHEN 0 THEN 'not paid' ELSE 'paid off' END) AS data4,
  '' AS data5,
  '' AS data6,
  '' AS data7,
  '' AS data8,
  '' AS data9,
  '' AS data10,
  '' AS data11
FROM investcreditpayment AS st 
LEFT JOIN msuser ut
  ON st.idmsuser = ut.idmsuser
LEFT JOIN mssupplier spt
  ON st.idmsuser = spt.idmsuser
WHERE st.trxoperation <> 'D'

UNION ALL

SELECT
  st.idmsuser,
  str_to_date(substr(from_unixtime(st.ts),1,10),'%Y-%m-%d') as date, 
  ut.name as name, 
  spt.city, 
  'Take Loan' AS category, 
  st.amount AS income, 
  0 AS expense, 
  str_to_date(substr(from_unixtime(st.ts),1,10),'%Y-%m-%d') as data1,
  st.amount AS data2,
  st.creditor AS data3,
  st.tenor AS data4,
  st.installment AS data5,
  (CASE st.payperiod WHEN 0 THEN 'daily' WHEN 1 THEN 'weekly' ELSE 'monthly' END) AS data6,
  st.notes AS data7,
  '' AS data8,
  '' AS data9,
  '' AS data10,
  '' AS data11
FROM investtakeloan AS st 
LEFT JOIN msuser ut
  ON st.idmsuser = ut.idmsuser
LEFT JOIN mssupplier spt
  ON st.idmsuser = spt.idmsuser
WHERE st.trxoperation <> 'D'

UNION ALL

SELECT
  st.idmsuser,
  str_to_date(substr(from_unixtime(st.ts),1,10),'%Y-%m-%d') as date, 
  ut.name as name, 
  spt.city, 
  'Pay Loan' AS category, 
  0 AS income, 
  st.amount AS expense, 
  str_to_date(substr(from_unixtime(st.ts),1,10),'%Y-%m-%d') as data1,
  st.amount AS data2,
  st.notes AS data3,
  (CASE st.paidoff WHEN 0 THEN 'not paid' ELSE 'paid off' END) AS data4,
  '' AS data5,
  '' AS data6,
  '' AS data7,
  '' AS data8,
  '' AS data9,
  '' AS data10,
  '' AS data11
FROM investpayloan AS st 
LEFT JOIN msuser ut
  ON st.idmsuser = ut.idmsuser
LEFT JOIN mssupplier spt
  ON st.idmsuser = spt.idmsuser
WHERE st.trxoperation <> 'D'

UNION ALL

SELECT
  st.idmsuser,
  str_to_date(substr(from_unixtime(st.ts),1,10),'%Y-%m-%d') as date, 
  ut.name as name, 
  spt.city, 
  ct.label AS category, 
  st.amount AS income, 
  0 AS expense,
  str_to_date(substr(from_unixtime(st.ts),1,10),'%Y-%m-%d') as data1,
  st.amount AS data2,
  st.notes AS data3,
  '' AS data4,
  '' AS data5,
  '' AS data6,
  '' AS data7,
  '' AS data8,
  '' AS data9,
  '' AS data10,
  '' AS data11
FROM investcustomincome st 
LEFT JOIN investcustomtype ct 
  ON ct.offlineID = st.offlineCustomTypeID 
LEFT JOIN msuser ut
  ON st.idmsuser = ut.idmsuser
LEFT JOIN mssupplier spt
  ON st.idmsuser = spt.idmsuser
WHERE st.trxoperation <> 'D'

UNION ALL

SELECT
  st.idmsuser,
  str_to_date(substr(from_unixtime(st.ts),1,10),'%Y-%m-%d') as date, 
  ut.name as name, 
  spt.city, 
  ct.label AS category, 
  0 AS income,
  st.amount AS expense, 
  str_to_date(substr(from_unixtime(st.ts),1,10),'%Y-%m-%d') as data1,
  st.amount AS data2,
  st.notes AS data3,
  '' AS data4,
  '' AS data5,
  '' AS data6,
  '' AS data7,
  '' AS data8,
  '' AS data9,
  '' AS data10,
  '' AS data11
FROM investcustomexpense st 
LEFT JOIN investcustomtype ct 
  ON ct.offlineID = st.offlineCustomTypeID 
LEFT JOIN msuser ut
  ON st.idmsuser = ut.idmsuser
LEFT JOIN mssupplier spt
  ON st.idmsuser = spt.idmsuser
WHERE st.trxoperation <> 'D'

) AS sourceTable 
WHERE (
		CASE
			WHEN startdate <> '-1' AND enddate <> '-1' THEN date(sourceTable.date) BETWEEN date(startdate) AND date(enddate) 
			ELSE true
		END
	AND
		CASE
			WHEN idmsuserparam <> '-1' THEN sourceTable.idmsuser = idmsuserparam 
			ELSE true
		END 
	AND
		CASE
			WHEN cityparam <> '-1' THEN sourceTable.city LIKE cityparam 
			ELSE true
		END 
	AND
		CASE
			WHEN catfilter <> '-1' THEN FIND_IN_SET(sourceTable.category,catfilter) > 0 ELSE true
		END
)
ORDER BY date DESC ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `investreporttotal` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_unicode_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `investreporttotal`(IN `idmsuserparam` VARCHAR(32), IN `startdate` VARCHAR(32), IN `enddate` VARCHAR(32), IN `catfilter` TEXT, IN `cityparam` VARCHAR(128))
    NO SQL
SELECT  SUM(sourceTable.income) AS totalincome, SUM(sourceTable.expense) AS totalexpense FROM (
    SELECT 'Buy Fish' AS category, idmsuser, 0 AS income, amount AS expense, substr(trxdate,1,10) AS dateVal FROM investbuyfish WHERE trxoperation <> 'D'
    UNION ALL
    SELECT 'Sell Fish' AS category, idmsuser, amount AS income, 0 AS expense, substr(trxdate,1,10) AS dateVal FROM investsplitfish WHERE trxoperation <> 'D' AND sold <> 0 
    UNION ALL
    SELECT 'Sell Fish' AS category, idmsuser, amount AS income, 0 AS expense, substr(trxdate,1,10) AS dateVal FROM investsimplesellfish WHERE trxoperation <> 'D'
    UNION ALL
    SELECT 'Credit Payment' AS category, idmsuser, amount AS income, 0 AS expense, substr(trxdate,1,10) AS dateVal FROM investcreditpayment WHERE trxoperation <> 'D'
    UNION ALL
    SELECT 'Give Credit' AS category, idmsuser, 0 AS income, amount AS expense, substr(trxdate,1,10) AS dateVal FROM investgivecredit WHERE trxoperation <> 'D'
    UNION ALL
    SELECT 'Pay Loan' AS category, idmsuser, 0 AS income, amount AS expense, substr(trxdate,1,10) AS dateVal FROM investpayloan WHERE trxoperation <> 'D'
    UNION ALL
    SELECT 'Take Loan' AS category, idmsuser, amount AS income, 0 AS expense, substr(trxdate,1,10) AS dateVal FROM investtakeloan WHERE trxoperation <> 'D'
    UNION ALL
    SELECT ct.label AS category, ci.idmsuser, ci.amount AS income, 0 AS expense, substr(ci.trxdate,1,10) AS dateVal FROM investcustomincome AS ci LEFT JOIN investcustomtype AS ct ON ct.offlineID = ci.offlineCustomTypeID WHERE ci.trxoperation <> 'D'
    UNION ALL
    SELECT ct.label AS category, ce.idmsuser, 0 AS income, ce.amount AS expense, substr(ce.trxdate,1,10) AS dateVal FROM investcustomexpense AS ce LEFT JOIN investcustomtype AS ct ON ct.offlineID = ce.offlineCustomTypeID WHERE ce.trxoperation <> 'D'
) AS sourceTable 
LEFT JOIN msuser userTable
    ON sourceTable.idmsuser = userTable.idmsuser
LEFT JOIN mssupplier supplierTable
	ON sourceTable.idmsuser = supplierTable.idmsuser
WHERE (
        CASE
            WHEN startdate <> '-1' AND enddate <> '-1' THEN date(sourceTable.dateVal) BETWEEN date(startdate) AND date(enddate) 
            ELSE true
        END
    AND
        CASE
            WHEN idmsuserparam <> '-1' THEN sourceTable.idmsuser = idmsuserparam 
            ELSE true
        END 
    AND
        CASE
            WHEN cityparam <> '-1' THEN supplierTable.city LIKE cityparam 
            ELSE true
        END 
    AND
        CASE
    	    WHEN catfilter <> '-1' THEN FIND_IN_SET(sourceTable.category,catfilter) > 0 ELSE true
        END
) ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `investreporttotalv2` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_unicode_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `investreporttotalv2`(IN `idmsuserparam` VARCHAR(32), IN `startdate` VARCHAR(32), IN `enddate` VARCHAR(32), IN `catfilter` TEXT, IN `cityparam` VARCHAR(128))
    NO SQL
SELECT  SUM(sourceTable.income) AS totalincome, SUM(sourceTable.expense) AS totalexpense FROM (
    SELECT 'Buy Fish' AS category, idmsuser, 0 AS income, amount AS expense, substr(from_unixtime(ts),1,10) AS dateVal FROM investbuyfish WHERE trxoperation <> 'D'
    UNION ALL
    SELECT 'Sell Fish' AS category, idmsuser, amount AS income, 0 AS expense, substr(from_unixtime(ts),1,10) AS dateVal FROM investsplitfish WHERE trxoperation <> 'D' AND sold <> 0 
    UNION ALL
    SELECT 'Sell Fish' AS category, idmsuser, amount AS income, 0 AS expense, substr(from_unixtime(ts),1,10) AS dateVal FROM investsimplesellfish WHERE trxoperation <> 'D'
    UNION ALL
    SELECT 'Credit Payment' AS category, idmsuser, amount AS income, 0 AS expense, substr(from_unixtime(ts),1,10) AS dateVal FROM investcreditpayment WHERE trxoperation <> 'D'
    UNION ALL
    SELECT 'Give Credit' AS category, idmsuser, 0 AS income, amount AS expense, substr(from_unixtime(ts),1,10) AS dateVal FROM investgivecredit WHERE trxoperation <> 'D'
    UNION ALL
    SELECT 'Pay Loan' AS category, idmsuser, 0 AS income, amount AS expense, substr(from_unixtime(ts),1,10) AS dateVal FROM investpayloan WHERE trxoperation <> 'D'
    UNION ALL
    SELECT 'Take Loan' AS category, idmsuser, amount AS income, 0 AS expense, substr(from_unixtime(ts),1,10) AS dateVal FROM investtakeloan WHERE trxoperation <> 'D'
    UNION ALL
    SELECT ct.label AS category, ci.idmsuser, ci.amount AS income, 0 AS expense, substr(from_unixtime(ci.ts),1,10) AS dateVal FROM investcustomincome AS ci LEFT JOIN investcustomtype AS ct ON ct.offlineID = ci.offlineCustomTypeID WHERE ci.trxoperation <> 'D'
    UNION ALL
    SELECT ct.label AS category, ce.idmsuser, 0 AS income, ce.amount AS expense, substr(from_unixtime(ce.ts),1,10) AS dateVal FROM investcustomexpense AS ce LEFT JOIN investcustomtype AS ct ON ct.offlineID = ce.offlineCustomTypeID WHERE ce.trxoperation <> 'D'
) AS sourceTable 
LEFT JOIN msuser userTable
    ON sourceTable.idmsuser = userTable.idmsuser
LEFT JOIN mssupplier supplierTable
	ON sourceTable.idmsuser = supplierTable.idmsuser
WHERE (
        CASE
            WHEN startdate <> '-1' AND enddate <> '-1' THEN date(sourceTable.dateVal) BETWEEN date(startdate) AND date(enddate) 
            ELSE true
        END
    AND
        CASE
            WHEN idmsuserparam <> '-1' THEN sourceTable.idmsuser = idmsuserparam 
            ELSE true
        END 
    AND
        CASE
            WHEN cityparam <> '-1' THEN supplierTable.city LIKE cityparam 
            ELSE true
        END 
    AND
        CASE
    	    WHEN catfilter <> '-1' THEN FIND_IN_SET(sourceTable.category,catfilter) > 0 ELSE true
        END
) ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `loginsupplier` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `loginsupplier`(in param varchar(191), in passwordparam varchar(191))
BEGIN
	SELECT 	a.idmsuser
		FROM msuser a
		JOIN users b
		ON a.idltusertype > 0 AND a.id = b.id
		WHERE (username = param OR email = param OR phonenumber = param) and password = passwordparam;
    END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `payloan` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `payloan`(in idtrloanparam varchar(32), in paidoffdateparam datetime, in paidoffidmsuserofficerparam varchar(32))
BEGIN
	update trloan
		set paidoffdate = paidoffdateparam,
		paidoffidmsuserofficer = paidoffidmsuserofficerparam,
		lasttransdate = now(),
		lasttransact = 'U'
		where idtrloan = idtrloanparam;
    END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `payloanv2` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `payloanv2`(in idloanofflineparam varchar(128), in paidoffdateparam datetime,
	in paidoffidmsuserofficerparam varchar(32))
BEGIN
	update trloan
		set paidoffdate = paidoffdateparam,
		paidoffidmsuserofficer = paidoffidmsuserofficerparam,
		lasttransdate = now(),
		lasttransact = 'U'
		where idloanoffline = idloanofflineparam;
    END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `payloanv3` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `payloanv3`(IN idloanofflineparam VARCHAR(128), IN paidoffdateparam DATETIME,
	IN paidoffidmsuserofficerparam VARCHAR(32), IN idmsusertransparam VARCHAR(32))
BEGIN
	UPDATE trloan
		SET paidoffdate = paidoffdateparam,
		paidoffidmsuserofficer = paidoffidmsuserofficerparam,
		lasttransdate = NOW(),
		lasttransact = 'U',
		idmsuserlasttrans = idmsusertransparam
		WHERE idloanoffline = idloanofflineparam;
    END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `rejectnewsupplier` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `rejectnewsupplier`(IN idmssuppliertempparam VARCHAR(32))
BEGIN
	UPDATE mssuppliertemp
		SET
		lasttransdate = NOW(),
		lasttransact = 'D'
		WHERE idmssuppliertemp = idmssuppliertempparam;
    END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `setbuyertofishcatch` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `setbuyertofishcatch`(in idtrfishcatchpostparam varchar(32), in idmsbuyerparam varchar(32))
BEGIN
	UPDATE trfishcatch
	SET idmsbuyerflag = idmsbuyerparam,
	lasttransdate = NOW(),
	lasttransact = 'U'
	WHERE idtrfishcatchpost = idtrfishcatchpostparam;
    END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `tryloginqrcode` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `tryloginqrcode`(
in qrcodeid varchar(32),
in emailparam varchar(128), IN passparam VARCHAR(128))
BEGIN
	DECLARE validQrCode VARCHAR(32);
	
	set validQrCode = (select idmsuserqrcode from msuserqrcode where idmsuserqrcode = qrcodeid and statuspost = '0');
	if(validQrCode is not null) then
		update msuserqrcode
			set statuspost = '1',
			email = emailparam,
			password = passparam,
			lasttransdate = now(),
			lasttransact = 'U'
			where idmsuserqrcode = qrcodeid;
		select 'ok';
	else 
		SELECT 'nope';
	END IF;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `updatebuyer` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `updatebuyer`(
	IN idbuyerofflineparam VARCHAR(128),
	IN idmssupplierparam VARCHAR(32), IN name_paramparam VARCHAR(128),
	IN id_paramparam VARCHAR(32), IN businesslicense_paramparam VARCHAR(32),
	IN contact_paramparam VARCHAR(32), IN phonenumber_paramparam VARCHAR(20),
	IN address_paramparam TEXT, IN idltusertypeparam INT,
	IN sex_paramparam INT, IN nationalcode_paramparam VARCHAR(16),
	IN country_paramparam VARCHAR(2), IN province_paramparam VARCHAR(32),
	IN city_paramparam VARCHAR(32), IN district_paramparam VARCHAR(32), IN completestreetaddress_paramparam TEXT)
BEGIN
	UPDATE 	msbuyer 
		SET
		name_param = name_paramparam, 
		id_param = id_paramparam, 
		businesslicense_param = businesslicense_paramparam, 
		contact_param = contact_paramparam, 
		phonenumber_param = phonenumber_paramparam, 
		address_param = address_paramparam, 
		idltusertype = idltusertypeparam, 
		sex_param = sex_paramparam, 
		nationalcode_param = nationalcode_paramparam, 
		country_param = country_paramparam, 
		province_param = province_paramparam, 
		city_param = city_paramparam, 
		district_param = district_paramparam, 
		completestreetaddress_param = completestreetaddress_paramparam, 
		lasttransdate = now(), 
		lasttransact = 'U'
		WHERE
		idbuyeroffline = idbuyerofflineparam;
    END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `updatebuyerv3` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `updatebuyerv3`(
	IN idbuyerofflineparam VARCHAR(128),
	IN idmssupplierparam VARCHAR(32), IN name_paramparam VARCHAR(128),
	IN id_paramparam VARCHAR(32), IN businesslicense_paramparam VARCHAR(32),
	IN contact_paramparam VARCHAR(32), IN phonenumber_paramparam VARCHAR(20),
	IN address_paramparam TEXT, IN idltusertypeparam INT,
	IN sex_paramparam INT, IN nationalcode_paramparam VARCHAR(16),
	IN country_paramparam VARCHAR(2), IN province_paramparam VARCHAR(32),
	IN city_paramparam VARCHAR(32), IN district_paramparam VARCHAR(32), IN completestreetaddress_paramparam TEXT,
	IN companynameparam VARCHAR(64), IN businesslicenseexpireddateparam DATETIME)
BEGIN
	UPDATE 	msbuyer 
		SET
		name_param = name_paramparam, 
		id_param = id_paramparam, 
		businesslicense_param = businesslicense_paramparam, 
		contact_param = contact_paramparam, 
		phonenumber_param = phonenumber_paramparam, 
		address_param = address_paramparam, 
		idltusertype = idltusertypeparam, 
		sex_param = sex_paramparam, 
		nationalcode_param = nationalcode_paramparam, 
		country_param = country_paramparam, 
		province_param = province_paramparam, 
		city_param = city_paramparam, 
		district_param = district_paramparam, 
		completestreetaddress_param = completestreetaddress_paramparam, 
		lasttransdate = NOW(), 
		lasttransact = 'U',
		companyname = companynameparam, 
		businesslicenseexpireddate = businesslicenseexpireddateparam
		WHERE
		idbuyeroffline = idbuyerofflineparam;
    END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `updatecatch` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `updatecatch`(
	IN idtrcatchofflineparam VARCHAR(128),
	IN idmssupplierparam VARCHAR(32),
	IN idfishermanofflineparam VARCHAR(128), IN idbuyerofflineparam VARCHAR(128),
	IN idshipofflineparam VARCHAR(128), IN idfishofflineparam VARCHAR(128),
	IN purchasedateparam DATE, IN purchasetimeparam TIME,
	IN catchorfarmedparam VARCHAR(10), IN bycatchparam VARCHAR(1), IN fadusedparam VARCHAR(1),
	IN purchaseuniquenoparam VARCHAR(32), IN productformatlandingparam VARCHAR(10), IN unitmeasurementparam VARCHAR(10),
	IN quantityparam FLOAT, IN weightparam FLOAT, IN fishinggroundareaparam VARCHAR(10),
	IN purchaselocationparam VARCHAR(32), IN uniquetripidparam VARCHAR(32),
	IN datetimevesseldepartureparam DATETIME, IN datetimevesselreturnparam DATETIME,
	IN portnameparam VARCHAR(32), IN priceperkgparam DOUBLE,
	IN totalpriceparam DOUBLE, IN loanexpenseparam DOUBLE, IN otherexpenseparam DOUBLE,
	IN postdateparam DATETIME, IN closeparams VARCHAR(1))
BEGIN
	UPDATE trcatch 
	SET 	
		idmssupplier = idmssupplierparam, 
		idfishermanoffline = idfishermanofflineparam, 
		idbuyeroffline = idbuyerofflineparam, 
		idshipoffline = idshipofflineparam, 
		idfishoffline = idfishofflineparam, 
		purchasedate = purchasedateparam, 
		purchasetime = purchasetimeparam, 
		catchorfarmed = catchorfarmedparam, 
		bycatch = bycatchparam, 
		fadused = fadusedparam, 
		purchaseuniqueno = purchaseuniquenoparam, 
		productformatlanding = productformatlandingparam, 
		unitmeasurement = unitmeasurementparam, 
		quantity = quantityparam, 
		weight = weightparam, 
		fishinggroundarea = fishinggroundareaparam, 
		purchaselocation = purchaselocationparam, 
		uniquetripid = uniquetripidparam, 
		datetimevesseldeparture = datetimevesseldepartureparam, 
		datetimevesselreturn = datetimevesselreturnparam, 
		portname = portnameparam, 
		priceperkg = priceperkgparam, 
		totalprice = totalpriceparam, 
		loanexpense = loanexpenseparam, 
		otherexpense = otherexpenseparam, 
		postdate = postdateparam, 
		closeparam = closeparams,
		lasttransdate = NOW(), 
		lasttransact = 'U'
	WHERE
		idtrcatchoffline = idtrcatchofflineparam;
    END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `updatecatchsupplier` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `updatecatchsupplier`(in idtrcatchparam varchar(32), 
	IN idtrcatchpostparam VARCHAR(32), in idmssupplierparam varchar(32),
	in idmssuppliersellparam varchar(32), IN idmsshipparam VARCHAR(32),
	IN idmsfishparam VARCHAR(32), IN varianceparam VARCHAR(32), 
	IN dispatchnotephotoparam VARCHAR(32), 
	IN priceperkgparam DOUBLE, IN totalpriceparam DOUBLE,
	IN locationparam VARCHAR(32), IN saildateparam DATETIME,
	IN postdateparam DATETIME)
BEGIN
	UPDATE trcatch 
		SET
		idtrcatchpost = idtrcatchpostparam ,
		idmssupplier = idmssupplierparam ,
		idmssuppliersell = idmssuppliersellparam,
		idmsship = idmsshipparam, 
		idmsfish = idmsfishparam, 
		VARIANCE = varianceparam, 
		dispatchnotephoto = dispatchnotephotoparam, 
		priceperkg = priceperkgparam, 
		totalprice = totalpriceparam, 
		location = locationparam, 
		saildate = saildateparam, 
		postdate = postdateparam, 
		lasttransdate = NOW(), 
		lasttransact = 'U'
		WHERE
		idtrcatch = idtrcatchparam ;
    END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `updatecatchv2` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `updatecatchv2`(
	IN idtrcatchofflineparam VARCHAR(128),
	IN idmssupplierparam VARCHAR(32),
	IN idfishermanofflineparam VARCHAR(128), IN idbuyerofflineparam VARCHAR(128),
	IN idshipofflineparam VARCHAR(128), IN idfishofflineparam VARCHAR(128),
	IN purchasedateparam DATE, IN purchasetimeparam TIME,
	IN catchorfarmedparam VARCHAR(10), IN bycatchparam VARCHAR(1), IN fadusedparam VARCHAR(1),
	IN purchaseuniquenoparam VARCHAR(32), IN productformatlandingparam VARCHAR(10), IN unitmeasurementparam VARCHAR(10),
	IN quantityparam FLOAT, IN weightparam FLOAT, IN fishinggroundareaparam VARCHAR(10),
	IN purchaselocationparam VARCHAR(32), IN uniquetripidparam VARCHAR(32),
	IN datetimevesseldepartureparam DATETIME, IN datetimevesselreturnparam DATETIME,
	IN portnameparam VARCHAR(32), IN priceperkgparam DOUBLE,
	IN totalpriceparam DOUBLE, IN loanexpenseparam DOUBLE, IN otherexpenseparam DOUBLE,
	IN postdateparam DATETIME, IN closeparams VARCHAR(1))
BEGIN
	UPDATE trcatch 
	SET 	
		idmssupplier = idmssupplierparam, 
		idfishermanoffline = idfishermanofflineparam, 
		idbuyeroffline = idbuyerofflineparam, 
		idshipoffline = idshipofflineparam, 
		idfishoffline = idfishofflineparam, 
		purchasedate = purchasedateparam, 
		purchasetime = purchasetimeparam, 
		catchorfarmed = catchorfarmedparam, 
		bycatch = bycatchparam, 
		fadused = fadusedparam, 
		purchaseuniqueno = purchaseuniquenoparam, 
		productformatlanding = productformatlandingparam, 
		unitmeasurement = unitmeasurementparam, 
		quantity = quantityparam, 
		weight = weightparam, 
		fishinggroundarea = fishinggroundareaparam, 
		purchaselocation = purchaselocationparam, 
		uniquetripid = uniquetripidparam, 
		datetimevesseldeparture = datetimevesseldepartureparam, 
		datetimevesselreturn = datetimevesselreturnparam, 
		portname = portnameparam, 
		priceperkg = priceperkgparam, 
		totalprice = totalpriceparam, 
		loanexpense = loanexpenseparam, 
		otherexpense = otherexpenseparam, 
		postdate = postdateparam, 
		closeparam = closeparams,
		lasttransdate = NOW(), 
		lasttransact = 'U'
	WHERE
		idtrcatchoffline = idtrcatchofflineparam;
    END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `updatecatchv3` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `updatecatchv3`(
	IN idtrcatchofflineparam VARCHAR(128),
	IN idmssupplierparam VARCHAR(32),
	IN idfishermanofflineparam VARCHAR(128), IN idbuyerofflineparam VARCHAR(128),
	IN idshipofflineparam VARCHAR(128), IN idfishofflineparam VARCHAR(128),
	IN purchasedateparam DATE, IN purchasetimeparam TIME,
	IN catchorfarmedparam VARCHAR(10), IN bycatchparam VARCHAR(1), IN fadusedparam VARCHAR(1),
	IN purchaseuniquenoparam VARCHAR(32), IN productformatlandingparam VARCHAR(10), IN unitmeasurementparam VARCHAR(10),
	IN quantityparam FLOAT, IN weightparam FLOAT, IN fishinggroundareaparam VARCHAR(10),
	IN purchaselocationparam VARCHAR(32), IN uniquetripidparam VARCHAR(32),
	IN datetimevesseldepartureparam DATETIME, IN datetimevesselreturnparam DATETIME,
	IN portnameparam VARCHAR(32), IN priceperkgparam DOUBLE,
	IN totalpriceparam DOUBLE, IN loanexpenseparam DOUBLE, IN otherexpenseparam DOUBLE,
	IN postdateparam DATETIME, IN closeparams VARCHAR(1),
	IN idmsusercreatorparam VARCHAR(32))
BEGIN
	UPDATE trcatch 
	SET 	
		idmssupplier = idmssupplierparam, 
		idfishermanoffline = idfishermanofflineparam, 
		idbuyeroffline = idbuyerofflineparam, 
		idshipoffline = idshipofflineparam, 
		idfishoffline = idfishofflineparam, 
		purchasedate = purchasedateparam, 
		purchasetime = purchasetimeparam, 
		catchorfarmed = catchorfarmedparam, 
		bycatch = bycatchparam, 
		fadused = fadusedparam, 
		purchaseuniqueno = purchaseuniquenoparam, 
		productformatlanding = productformatlandingparam, 
		unitmeasurement = unitmeasurementparam, 
		quantity = quantityparam, 
		weight = weightparam, 
		fishinggroundarea = fishinggroundareaparam, 
		purchaselocation = purchaselocationparam, 
		uniquetripid = uniquetripidparam, 
		datetimevesseldeparture = datetimevesseldepartureparam, 
		datetimevesselreturn = datetimevesselreturnparam, 
		portname = portnameparam, 
		priceperkg = priceperkgparam, 
		totalprice = totalpriceparam, 
		loanexpense = loanexpenseparam, 
		otherexpense = otherexpenseparam, 
		postdate = postdateparam, 
		closeparam = closeparams,
		lasttransdate = NOW(), 
		lasttransact = 'U',
		idmsuserlasttrans = idmsusercreatorparam
	WHERE
		idtrcatchoffline = idtrcatchofflineparam;
    END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `updatecatchv4` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `updatecatchv4`(
	IN idtrcatchofflineparam VARCHAR(128),
	IN idmssupplierparam VARCHAR(32),
	IN idfishermanofflineparam VARCHAR(128), IN idbuyerofflineparam VARCHAR(128),
	IN idshipofflineparam VARCHAR(128), IN idfishofflineparam VARCHAR(128),
	IN purchasedateparam DATE, IN purchasetimeparam TIME,
	IN catchorfarmedparam VARCHAR(10), IN bycatchparam VARCHAR(1), IN fadusedparam VARCHAR(1),
	IN purchaseuniquenoparam VARCHAR(32), IN productformatlandingparam VARCHAR(10), IN unitmeasurementparam VARCHAR(10),
	IN quantityparam FLOAT, IN weightparam FLOAT, IN fishinggroundareaparam VARCHAR(10),
	IN purchaselocationparam VARCHAR(32), IN uniquetripidparam VARCHAR(32),
	IN datetimevesseldepartureparam DATETIME, IN datetimevesselreturnparam DATETIME,
	IN portnameparam VARCHAR(32), IN priceperkgparam DOUBLE,
	IN totalpriceparam DOUBLE, IN loanexpenseparam DOUBLE, IN otherexpenseparam DOUBLE,
	IN postdateparam DATETIME, IN closeparams VARCHAR(1),
	IN idmsusercreatorparam VARCHAR(32), IN notesparam TEXT)
BEGIN
	UPDATE trcatch 
	SET 	
		idmssupplier = idmssupplierparam, 
		idfishermanoffline = idfishermanofflineparam, 
		idbuyeroffline = idbuyerofflineparam, 
		idshipoffline = idshipofflineparam, 
		idfishoffline = idfishofflineparam, 
		purchasedate = purchasedateparam, 
		purchasetime = purchasetimeparam, 
		catchorfarmed = catchorfarmedparam, 
		bycatch = bycatchparam, 
		fadused = fadusedparam, 
		purchaseuniqueno = purchaseuniquenoparam, 
		productformatlanding = productformatlandingparam, 
		unitmeasurement = unitmeasurementparam, 
		quantity = quantityparam, 
		weight = weightparam, 
		fishinggroundarea = fishinggroundareaparam, 
		purchaselocation = purchaselocationparam, 
		uniquetripid = uniquetripidparam, 
		datetimevesseldeparture = datetimevesseldepartureparam, 
		datetimevesselreturn = datetimevesselreturnparam, 
		portname = portnameparam, 
		priceperkg = priceperkgparam, 
		totalprice = totalpriceparam, 
		loanexpense = loanexpenseparam, 
		otherexpense = otherexpenseparam, 
		postdate = postdateparam, 
		closeparam = closeparams,
		lasttransdate = NOW(), 
		lasttransact = 'U',
		idmsuserlasttrans = idmsusercreatorparam,
		notes = notesparam
	WHERE
		idtrcatchoffline = idtrcatchofflineparam;
    END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `updatecatchv5` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `updatecatchv5`(IN `idtrcatchofflineparam` VARCHAR(128), IN `idmssupplierparam` VARCHAR(32), IN `idfishermanofflineparam` VARCHAR(128), IN `idbuyerofflineparam` VARCHAR(128), IN `idshipofflineparam` VARCHAR(128), IN `idfishofflineparam` VARCHAR(128), IN `purchasedateparam` DATE, IN `purchasetimeparam` TIME, IN `catchorfarmedparam` VARCHAR(10), IN `bycatchparam` VARCHAR(1), IN `fadusedparam` VARCHAR(1), IN `purchaseuniquenoparam` VARCHAR(32), IN `productformatlandingparam` VARCHAR(10), IN `unitmeasurementparam` VARCHAR(10), IN `quantityparam` FLOAT, IN `weightparam` FLOAT, IN `fishinggroundareaparam` VARCHAR(10), IN `purchaselocationparam` VARCHAR(32), IN `uniquetripidparam` VARCHAR(32), IN `datetimevesseldepartureparam` DATETIME, IN `datetimevesselreturnparam` DATETIME, IN `portnameparam` VARCHAR(32), IN `priceperkgparam` DOUBLE, IN `totalpriceparam` DOUBLE, IN `loanexpenseparam` DOUBLE, IN `otherexpenseparam` DOUBLE, IN `postdateparam` DATETIME, IN `closeparams` VARCHAR(1), IN `idmsusercreatorparam` VARCHAR(32), IN `fishermannameparam` VARCHAR(191), IN `fishermanidparam` VARCHAR(64), IN `fishermanregnumberparam` VARCHAR(64))
BEGIN
	UPDATE trcatch 
	SET 	
		idmssupplier = idmssupplierparam, 
		idfishermanoffline = idfishermanofflineparam, 
		idbuyeroffline = idbuyerofflineparam, 
		idshipoffline = idshipofflineparam, 
		idfishoffline = idfishofflineparam, 
		purchasedate = purchasedateparam, 
		purchasetime = purchasetimeparam, 
		catchorfarmed = catchorfarmedparam, 
		bycatch = bycatchparam, 
		fadused = fadusedparam, 
		purchaseuniqueno = purchaseuniquenoparam, 
		productformatlanding = productformatlandingparam, 
		unitmeasurement = unitmeasurementparam, 
		quantity = quantityparam, 
		weight = weightparam, 
		fishinggroundarea = fishinggroundareaparam, 
		purchaselocation = purchaselocationparam, 
		uniquetripid = uniquetripidparam, 
		datetimevesseldeparture = datetimevesseldepartureparam, 
		datetimevesselreturn = datetimevesselreturnparam, 
		portname = portnameparam, 
		priceperkg = priceperkgparam, 
		totalprice = totalpriceparam, 
		loanexpense = loanexpenseparam, 
		otherexpense = otherexpenseparam, 
		postdate = postdateparam, 
		closeparam = closeparams,
        fishermanname2 = fishermannameparam,
        fishermanid = fishermanidparam,
        fishermanregnumber = fishermanregnumberparam,
		lasttransdate = NOW(), 
		lasttransact = 'U',
		idmsuserlasttrans = idmsusercreatorparam
	WHERE
		idtrcatchoffline = idtrcatchofflineparam;
    END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `updatedelivery` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `updatedelivery`(IN `iddeliveryofflineparam` VARCHAR(128), IN `totalpriceparam` DOUBLE, IN `descparamparam` TEXT, IN `settobuyerdateparam` DATETIME)
BEGIN
	DECLARE idtrfishcatchparam VARCHAR(32);
	SET idtrfishcatchparam = (SELECT idtrfishcatch FROM trdelivery WHERE idtrdelivery = iddeliveryofflineparam);
	
	UPDATE 	trdelivery 
		SET
		totalprice = totalpriceparam, 
		descparam = descparamparam, 
		lasttransdate = now(), 
		lasttransact = 'U'
		WHERE
		iddeliveryoffline = iddeliveryofflineparam;
	UPDATE trfishcatch
		SET sendtobuyerdate = settobuyerdateparam,
		lasttransdate = NOW(),
		lasttransact = 'U'
		WHERE idtrfishcatch = idtrfishcatchparam;
    END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `updatedeliverybatchv2` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `updatedeliverybatchv2`(IN `iddeliveryofflineparam` VARCHAR(128), IN `idtrcatchofflineparam` VARCHAR(128), IN `totalpriceparam` DOUBLE, IN `descparamparam` TEXT, IN `sendtobuyerdateparam` DATETIME, IN `deliverydateparam` DATETIME, IN `transportbyparam` VARCHAR(10), IN `transportnameidparam` VARCHAR(128), IN `transportreceiptparam` VARCHAR(64), IN `idmsbuyerparam` VARCHAR(32), IN `deliverysheetofflineidparam` TEXT)
BEGIN
	DECLARE idtrcatchparam VARCHAR(32);
	SET idtrcatchparam = (SELECT idtrcatch FROM trcatch WHERE idtrfishcatchoffline = idtrcatchofflineparam);
	
	UPDATE 	trdelivery 
		SET
		idtrcatch = idtrcatchparam,
		idmsbuyer = idmsbuyerparam,
		totalprice = totalpriceparam, 
		descparam = descparamparam,
		deliverydate = deliverydateparam,
		transportby = transportbyparam,
		transportnameid = transportnameidparam,
		transportreceipt = transportreceiptparam,
		deliverysheetofflineid = deliverysheetofflineidparam,
		lasttransdate = NOW(), 
		lasttransact = 'U'
		WHERE
		iddeliveryoffline = iddeliveryofflineparam;
		
	UPDATE trcatch
		SET
		sendtobuyerdate = sendtobuyerdateparam,
		lasttransdate = NOW(),
		lasttransact = 'U'
		WHERE idtrcatch = idtrcatchparam;
    END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `updatedeliveryprice` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `updatedeliveryprice`(IN `iddeliveryofflineparam` VARCHAR(128), IN `totalpriceparam` DOUBLE)
BEGIN
	UPDATE trdelivery 
		SET totalprice = totalpriceparam,
		lasttransdate = NOW(),
		lasttransact = 'U'
		WHERE iddeliveryoffline = iddeliveryofflineparam;
    END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `updatedeliverypricev3` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `updatedeliverypricev3`(IN `iddeliveryofflineparam` VARCHAR(128), 
IN `totalpriceparam` DOUBLE, IN idmsusercreatorparam VARCHAR(32))
BEGIN
	UPDATE trdelivery 
		SET totalprice = totalpriceparam,
		lasttransdate = NOW(),
		lasttransact = 'U',
		idmsuserlasttrans = idmsusercreatorparam
		WHERE iddeliveryoffline = iddeliveryofflineparam;
    END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `updatedeliverysheet` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `updatedeliverysheet`(IN `deliverysheetofflineidparam` TEXT, IN `savedtextparam` LONGTEXT)
BEGIN
	UPDATE trdeliverysheet 
		SET
		savedtext = savedtextparam, 
		lasttransdate = now(), 
		lasttransact = 'U'
		WHERE
		deliverysheetofflineid = deliverysheetofflineidparam;
    END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `updatedeliveryv2` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `updatedeliveryv2`(IN `iddeliveryofflineparam` VARCHAR(128), IN `idtrfishcatchofflineparam` VARCHAR(128), IN `totalpriceparam` DOUBLE, IN `descparamparam` TEXT, IN `sendtobuyerdateparam` DATETIME, IN `deliverydateparam` DATETIME, IN `transportbyparam` VARCHAR(10), IN `transportnameidparam` VARCHAR(128), IN `transportreceiptparam` VARCHAR(64), IN `idmsbuyerparam` VARCHAR(32), IN `deliverysheetofflineidparam` TEXT)
BEGIN
	DECLARE idtrfishcatchparam VARCHAR(32);
	
	SET idtrfishcatchparam = (SELECT idtrfishcatch FROM trfishcatch WHERE idtrfishcatchoffline = idtrfishcatchofflineparam);
	
	
	UPDATE 	trdelivery 
		SET
		idtrfishcatch = idtrfishcatchparam,
		idmsbuyer = idmsbuyerparam,
		totalprice = totalpriceparam, 
		descparam = descparamparam,
		deliverydate = deliverydateparam,
		transportby = transportbyparam,
		transportnameid = transportnameidparam,
		transportreceipt = transportreceiptparam,
		deliverysheetofflineid = deliverysheetofflineidparam,
		lasttransdate = NOW(), 
		lasttransact = 'U'
		WHERE
		iddeliveryoffline = iddeliveryofflineparam;
		
	UPDATE trfishcatch
		SET
		sendtobuyerdate = settobuyerdateparam,
		lasttransdate = NOW(),
		lasttransact = 'U'
		WHERE idtrfishcatch = idtrfishcatchparam;
    END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `updatedeliveryv3` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `updatedeliveryv3`(IN `iddeliveryofflineparam` VARCHAR(128), IN `totalpriceparam` DOUBLE, 
IN `descparamparam` TEXT, IN `settobuyerdateparam` DATETIME, IN idmsusercreatorparam VARCHAR(32))
BEGIN
	DECLARE idtrfishcatchparam VARCHAR(32);
	SET idtrfishcatchparam = (SELECT idtrfishcatch FROM trdelivery WHERE idtrdelivery = iddeliveryofflineparam);
	
	UPDATE 	trdelivery 
		SET
		totalprice = totalpriceparam, 
		descparam = descparamparam, 
		lasttransdate = NOW(), 
		lasttransact = 'U',
		idmsuserlasttrans = idmsusercreatorparam
		WHERE
		iddeliveryoffline = iddeliveryofflineparam;
	UPDATE trfishcatch
		SET sendtobuyerdate = settobuyerdateparam,
		lasttransdate = NOW(),
		lasttransact = 'U',
		idmsuserlasttrans = idmsusercreatorparam
		WHERE idtrfishcatch = idtrfishcatchparam;
    END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `updatefish` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `updatefish`(
	in idfishofflineparam varchar(128), iN idltfishparam VARCHAR(32),
	IN indnameparam VARCHAR(128), IN localnameparam VARCHAR(256), IN photoparam VARCHAR(256),
	IN idmssupplierparam VARCHAR(32), in priceparam double)
BEGIN
	UPDATE msfish 
		SET
		idltfish = idltfishparam , 
		indname = indnameparam , 
		localname = localnameparam , 
		photo = case when photoparam is null then photo else photoparam end ,
		idmssupplier = idmssupplierparam , 
		price = priceparam,
		lasttransdate = now() , 
		lasttransact = 'U'		
		WHERE
		idfishoffline = idfishofflineparam ;
    END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `updatefishcatch` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `updatefishcatch`(IN `idtrfishcatchofflineparam` VARCHAR(128), IN `amountparam` FLOAT, IN `gradeparam` VARCHAR(5), IN `descparam` VARCHAR(128))
BEGIN
	DECLARE totalWeight INT;
	DECLARE totalQuantity INT;
	DECLARE idtrcatchofflineparam VARCHAR(128);
	
	SET idtrcatchofflineparam = (SELECT idtrcatchofflineparam FROM trfishcatch WHERE idtrfishcatchoffline = idtrfishcatchofflineparam);
	
	UPDATE trfishcatch 
		SET
		amount = amountparam, 
		grade = gradeparam, 
		description = descparam, 
		lasttransdate = NOW(), 
		lasttransact = 'U'
		WHERE
		idtrfishcatchoffline = idtrfishcatchofflineparam;
		
	SET totalWeight = (SELECT SUM(amount)
				FROM trfishcatch
				WHERE idtrcatchoffline = idtrcatchofflineparam);
	SET totalQuantity = (SELECT COUNT(amount)
				FROM trfishcatch
				WHERE idtrcatchoffline = idtrcatchofflineparam);
	UPDATE trcatch
		SET quantity = totalQuantity,
		weight = totalWeight
		WHERE idtrcatchoffline = idtrcatchofflineparam;
    END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `updatefishcatchv3` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `updatefishcatchv3`(IN `idtrfishcatchofflineparam` VARCHAR(128), IN `amountparam` FLOAT, IN `gradeparam` VARCHAR(5), IN `descparam` VARCHAR(128), IN `idmsusercreatorparam` VARCHAR(32))
BEGIN
	DECLARE totalWeight INT;
	DECLARE totalQuantity INT;
	DECLARE idtrcatchofflineparam VARCHAR(128);
	
	SET idtrcatchofflineparam = (SELECT idtrcatchofflineparam FROM trfishcatch WHERE idtrfishcatchoffline = idtrfishcatchofflineparam limit 1);
	
	UPDATE trfishcatch 
		SET
		amount = amountparam, 
		grade = gradeparam, 
		description = descparam, 
		lasttransdate = NOW(), 
		lasttransact = 'U',
		idmsuserlasttrans = idmsusercreatorparam
		WHERE
		idtrfishcatchoffline = idtrfishcatchofflineparam;
		
	SET totalWeight = (SELECT SUM(amount)
				FROM trfishcatch
				WHERE idtrcatchoffline = idtrcatchofflineparam);
	SET totalQuantity = (SELECT COUNT(amount)
				FROM trfishcatch
				WHERE idtrcatchoffline = idtrcatchofflineparam);
	UPDATE trcatch
		SET quantity = totalQuantity,
		weight = totalWeight,
		idmsuserlasttrans = idmsusercreatorparam
		WHERE idtrcatchoffline = idtrcatchofflineparam;
    END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `updatefishconfig` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `updatefishconfig`(in idtrfishconfigparam varchar(32), IN idmssupplierparam VARCHAR(32),
		IN nameparam VARCHAR(64), IN idmsfishparam VARCHAR(32),IN gradeparam VARCHAR(10), 
		IN unitparam VARCHAR(10), IN handlingparam VARCHAR(10))
BEGIN
	UPDATE trfishconfig 
		SET
		idmssupplier = idmssupplierparam, 
		NAME = nameparam, 
		idmsfish = idmsfishparam, 
		grade = gradeparam, 
		unit = unitparam, 
		handling = handlingparam,
		lasttransdate = NOW(),
		lasttransact = 'U'
		WHERE
		idtrfishconfig = idtrfishconfigparam;
    END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `updatefisherman` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `updatefisherman`(
		IN idfishermanofflineparam VARCHAR(128),
		IN nameparam VARCHAR(128), IN bodparam DATETIME,
		IN id_paramparam VARCHAR(16), IN sex_paramparam VARCHAR(1), IN nat_paramparam VARCHAR(2),
		IN address_paramparam TEXT, IN phone_paramparam VARCHAR(20), IN jobtitle_paramparam VARCHAR(32),
		IN idmssupplierparam VARCHAR(32))
BEGIN
	DECLARE idmsuserparam VARCHAR(32);
	SET idmsuserparam = (SELECT idmsuser FROM msfisherman WHERE idfishermanoffline = idfishermanofflineparam);
	
	UPDATE msfisherman
		SET 
		id_param = id_paramparam,
		sex_param = sex_paramparam,
		nat_param = nat_paramparam,
		address_param = address_paramparam,
		phone_param = phone_paramparam,
		jobtitle_param = jobtitle_paramparam,
		idmssupplier = idmssupplierparam,
		lasttransdate = NOW(),
		lasttransact = 'U'
		WHERE idfishermanoffline = idfishermanofflineparam;
		
	UPDATE msuser
		SET NAME = nameparam,
		bod = bodparam,
		lasttransdate = NOW(),
		lasttransact = 'U'
		WHERE idmsuser = idmsuserparam;
    END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `updatefishermanv2` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `updatefishermanv2`(
		IN idfishermanofflineparam VARCHAR(128),
		IN nameparam VARCHAR(128), IN bodparam DATETIME,
		IN id_paramparam VARCHAR(16), IN sex_paramparam VARCHAR(1), IN nat_paramparam VARCHAR(2),
		IN address_paramparam TEXT, IN phone_paramparam VARCHAR(20), IN jobtitle_paramparam VARCHAR(32),
		IN idmssupplierparam VARCHAR(32),
		IN provinceparam VARCHAR(64),IN districtparam VARCHAR(64),IN cityparam VARCHAR(64))
BEGIN
	DECLARE idmsuserparam VARCHAR(32);
	SET idmsuserparam = (SELECT idmsuser FROM msfisherman WHERE idfishermanoffline = idfishermanofflineparam);
	
	UPDATE msfisherman
		SET 
		id_param = id_paramparam,
		sex_param = sex_paramparam,
		nat_param = nat_paramparam,
		address_param = address_paramparam,
		phone_param = phone_paramparam,
		jobtitle_param = jobtitle_paramparam,
		idmssupplier = idmssupplierparam,
		lasttransdate = NOW(),
		lasttransact = 'U',
		province = provinceparam,
		district = districtparam,
		city = cityparam
		WHERE idfishermanoffline = idfishermanofflineparam;
		
	UPDATE msuser
		SET NAME = nameparam,
		bod = bodparam,
		lasttransdate = NOW(),
		lasttransact = 'U'
		WHERE idmsuser = idmsuserparam;
    END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `updatefishermanv3` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `updatefishermanv3`(
		IN idfishermanofflineparam VARCHAR(128),
		IN nameparam VARCHAR(128), IN bodparam DATETIME,
		IN id_paramparam VARCHAR(16), IN sex_paramparam VARCHAR(1), IN nat_paramparam VARCHAR(2),
		IN address_paramparam TEXT, IN phone_paramparam VARCHAR(20), IN jobtitle_paramparam VARCHAR(32),
		IN idmssupplierparam VARCHAR(32),
		IN provinceparam VARCHAR(64),IN districtparam VARCHAR(64),IN cityparam VARCHAR(64),
		IN fishermanregnumberparam VARCHAR(64), IN countryparam VARCHAR(64))
BEGIN
	DECLARE idmsuserparam VARCHAR(32);
	SET idmsuserparam = (SELECT idmsuser FROM msfisherman WHERE idfishermanoffline = idfishermanofflineparam);
	
	UPDATE msfisherman
		SET 
		id_param = id_paramparam,
		sex_param = sex_paramparam,
		nat_param = nat_paramparam,
		address_param = address_paramparam,
		phone_param = phone_paramparam,
		jobtitle_param = jobtitle_paramparam,
		idmssupplier = idmssupplierparam,
		lasttransdate = NOW(),
		lasttransact = 'U',
		province = provinceparam,
		district = districtparam,
		city = cityparam,
		fishermanregnumber = fishermanregnumberparam,
		country = countryparam
		WHERE idfishermanoffline = idfishermanofflineparam;
		
	UPDATE msuser
		SET NAME = nameparam,
		bod = bodparam,
		lasttransdate = NOW(),
		lasttransact = 'U'
		WHERE idmsuser = idmsuserparam;
    END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `updatefishpriceconfig` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `updatefishpriceconfig`(in idtrfishpriceconfigparam varchar(32), in idtrfishconfigparam varchar(32),
		IN idtrcatchparam VARCHAR(32))
BEGIN
	UPDATE trfishpriceconfig 
		SET
		idtrfishconfig = idtrfishconfigparam, 
		idtrcatch = idtrcatchparam,
		lasttransdate = now(),
		lasttransact = 'U'
		WHERE
		idtrfishpriceconfig = idtrfishpriceconfigparam;
    END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `updateloan` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `updateloan`(in idtrloanparam varchar(32), IN descloanparam TEXT, IN loaninrpparam DOUBLE,
	IN idmsuserloanparam VARCHAR(32), IN idmsbuyerloanparam VARCHAR(32), IN idmssupplierparam VARCHAR(32),
	IN loandateparam DATETIME, IN loaneridmsuserofficerparam VARCHAR(32))
BEGIN
	UPDATE 	trloan 
		SET
		descloan = descloanparam, 
		loaninrp = loaninrpparam, 
		idmsuserloan = idmsuserloanparam, 
		idmsbuyerloan = idmsbuyerloanparam, 
		idmsupplier = idmssupplierparam, 
		loandate = loandateparam,
		lasttransdate = NOW(), 
		lasttransact = 'U',
		loaneridmsuserofficer = loaneridmsuserofficerparam
		WHERE
		idtrloan = idtrloanparam;
    END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `updateloanv2` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `updateloanv2`(IN `idloanofflineparam` VARCHAR(128), IN `descloanparam` TEXT, IN `loaninrpparam` DOUBLE, IN `idmsuserloanparam` VARCHAR(32), IN `idmsbuyerloanparam` VARCHAR(32), IN `idmssupplierparam` VARCHAR(32), IN `loandateparam` DATETIME, IN `loaneridmsuserofficerparam` VARCHAR(32))
BEGIN
	UPDATE 	trloan 
		SET
		descloan = descloanparam, 
		loaninrp = loaninrpparam, 
		idmsuserloan = idmsuserloanparam, 
		idmsbuyerloan = idmsbuyerloanparam, 
		idmssupplier = idmssupplierparam, 
		loandate = loandateparam,
		lasttransdate = NOW(), 
		lasttransact = 'U',
		loaneridmsuserofficer = loaneridmsuserofficerparam
		WHERE
		idloanoffline = idloanofflineparam;
    END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `updateloanv3` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `updateloanv3`(IN idloanofflineparam VARCHAR(128), IN descloanparam TEXT, IN loaninrpparam DOUBLE,
	IN idmsuserloanparam VARCHAR(32), IN idmsbuyerloanparam VARCHAR(32), IN idmssupplierparam VARCHAR(32),
	IN loandateparam DATETIME, IN loaneridmsuserofficerparam VARCHAR(32), IN idmsusercreatorparam VARCHAR(32))
BEGIN
	UPDATE 	trloan 
		SET
		descloan = descloanparam, 
		loaninrp = loaninrpparam, 
		idmsuserloan = idmsuserloanparam, 
		idmsbuyerloan = idmsbuyerloanparam, 
		idmssupplier = idmssupplierparam, 
		loandate = loandateparam,
		lasttransdate = NOW(), 
		lasttransact = 'U',
		loaneridmsuserofficer = loaneridmsuserofficerparam,
		idmsuserlasttrans = idmsusercreatorparam
		WHERE
		idloanoffline = idloanofflineparam;
    END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `updateloanv4` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `updateloanv4`(IN idloanofflineparam VARCHAR(128), IN descloanparam TEXT, IN loaninrpparam DOUBLE,
	IN idmsuserloanparam VARCHAR(32), IN idmsbuyerloanparam VARCHAR(32), IN idmssupplierparam VARCHAR(32),
	IN loandateparam DATETIME, IN loaneridmsuserofficerparam VARCHAR(32), IN idmsusercreatorparam VARCHAR(32),
	IN idmstypeitemloanofflineparam VARCHAR(128), IN unitparam VARCHAR(32), IN priceperunitparam FLOAT)
BEGIN
	UPDATE 	trloan 
		SET
		descloan = descloanparam, 
		loaninrp = loaninrpparam, 
		idmsuserloan = idmsuserloanparam, 
		idmsbuyerloan = idmsbuyerloanparam, 
		idmssupplier = idmssupplierparam, 
		loandate = loandateparam,
		lasttransdate = NOW(), 
		lasttransact = 'U',
		loaneridmsuserofficer = loaneridmsuserofficerparam,
		idmsuserlasttrans = idmsusercreatorparam,
		idmstypeitemloanoffline = idmstypeitemloanofflineparam,
		unit = unitparam,
		priceperunit = priceperunitparam
		WHERE
		idloanoffline = idloanofflineparam;
    END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `updateloanv5` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `updateloanv5`(IN idloanofflineparam VARCHAR(128), IN descloanparam TEXT, IN loaninrpparam DOUBLE,
	IN idmsuserloanparam VARCHAR(32), IN idmsbuyerloanparam VARCHAR(32), IN idmssupplierparam VARCHAR(32),
	IN loandateparam DATETIME, IN loaneridmsuserofficerparam VARCHAR(32), IN idmsusercreatorparam VARCHAR(32),
	IN idmstypeitemloanofflineparam VARCHAR(128), IN unitparam VARCHAR(32), IN priceperunitparam FLOAT,
	IN idfishermanofflineparam VARCHAR(128), IN idbuyerofflineparam VARCHAR(128))
BEGIN
	UPDATE 	trloan 
		SET
		descloan = descloanparam, 
		loaninrp = loaninrpparam, 
		idmsuserloan = idmsuserloanparam, 
		idmsbuyerloan = idmsbuyerloanparam, 
		idmssupplier = idmssupplierparam, 
		loandate = loandateparam,
		lasttransdate = NOW(), 
		lasttransact = 'U',
		loaneridmsuserofficer = loaneridmsuserofficerparam,
		idmsuserlasttrans = idmsusercreatorparam,
		idmstypeitemloanoffline = idmstypeitemloanofflineparam,
		unit = unitparam,
		priceperunit = priceperunitparam,
		idfishermanoffline = idfishermanofflineparam,
		idbuyeroffline = idbuyerofflineparam
		WHERE
		idloanoffline = idloanofflineparam;
    END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `updateltfish` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `updateltfish`(
IN idltfishparam INT(11), IN isscaapparam TINYINT(4), IN taxocodeparam VARCHAR(13),
IN threea_codeparam CHAR(3), IN scientific_nameparam VARCHAR(38), IN english_nameparam VARCHAR(30),
IN french_nameparam VARCHAR(30), IN spanish_nameparam VARCHAR(30), IN authorparam VARCHAR(55),
IN familyparam VARCHAR(20), IN bio_orderparam VARCHAR(30), IN stats_dataparam TINYINT(1))
BEGIN
	UPDATE ltfish 
		SET
		isscaap = isscaapparam, 
		taxocode = taxocodeparam, 
		threea_code = threea_codeparam, 
		scientific_name = scientific_nameparam, 
		english_name = english_nameparam, 
		french_name = french_nameparam, 
		spanish_name = spanish_nameparam, 
		author = authorparam, 
		family = familyparam, 
		bio_order = bio_orderparam, 
		stats_data = stats_dataparam,
		lasttransdate = NOW(),
		lasttransact = 'U'
		WHERE idltfish = idltfishparam;
    END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `updatemsinfo` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `updatemsinfo`( IN supportinfoparam VARCHAR(32), IN infodescparam TEXT)
BEGIN
	DECLARE test VARCHAR(32);
	SET test = (SELECT idmsinfo FROM msinfo WHERE idmsinfo = supportinfoparam);
	IF (test = supportinfoparam) THEN
		UPDATE msinfo 
			SET infodesc = infodescparam
			WHERE idmsinfo = supportinfoparam;
	ELSE
		INSERT INTO msinfo (idmsinfo, infodesc)
		 	VALUES	(supportinfoparam, infodescparam);
	END IF;
    END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `updateofficer` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `updateofficer`(in idparam varchar(32), IN `nameparam` varchar(191), IN `usernameparam` VARCHAR(191),
							IN `emailparam` VARCHAR(191), IN `phonenumberparam` VARCHAR(191),
							in passwordparam varchar(191), in isadmintypeparam int, in activeparam int,
							in langparam varchar(2))
BEGIN
	DECLARE idvar INT;
	SET idvar = (SELECT id FROM msuser WHERE idmsuser = idparam);
	
	UPDATE 	users
		SET name = nameparam,
		username = usernameparam,
		email = CASE WHEN emailparam = '' THEN (SELECT getuuid()) ELSE emailparam END,
		phonenumber = phonenumberparam,
		password = case when passwordparam = '' then password else passwordparam end,
		updated_at = now()
		WHERE ID = idvar;
	update msuser 
		set name = nameparam,
		idltusertype = isadmintypeparam,
		active = activeparam,
		lasttransdate = now(),
		lasttransact = 'U',
		defaultlanguage = langparam
		where idmsuser = idparam;
    END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `updatepayloan` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `updatepayloan`(in idtrpayloanparam varchar(32),
		in idmsuserloanparam varchar(32), IN idmsbuyerloanparam VARCHAR(32), IN idmssupplierparam VARCHAR(32), 
		in descloanparam text, IN loaninrpparam double, in paidoffdateparam varchar(32), in paidoffidmsuserofficerparam varchar(32))
BEGIN
	UPDATE 	trpayloan 
		SET
		idmsuserloan = idmsuserloanparam,
		idmsbuyerloan = idmsbuyerloanparam,
		idmssupplier = idmssupplierparam,
		descloan = descloanparam, 
		loaninrp = loaninrpparam, 
		paidoffdate = paidoffdateparam,
		paidoffidmsuserofficer = paidoffidmsuserofficerparam,
		lasttransdate = NOW(), 
		lasttransact = 'U'
		WHERE
		idtrpayloan = idtrpayloanparam;
    END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `updatepayloanv2` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `updatepayloanv2`(in idpayloanofflineparam varchar(128),
		in idmsuserloanparam varchar(32), IN idmsbuyerloanparam VARCHAR(32), IN idmssupplierparam VARCHAR(32), 
		in descloanparam text, IN loaninrpparam double, in paidoffdateparam varchar(32), in paidoffidmsuserofficerparam varchar(32))
BEGIN
	UPDATE 	trpayloan 
		SET
		idmsuserloan = idmsuserloanparam,
		idmsbuyerloan = idmsbuyerloanparam,
		idmssupplier = idmssupplierparam,
		descloan = descloanparam, 
		loaninrp = loaninrpparam, 
		paidoffdate = paidoffdateparam,
		paidoffidmsuserofficer = paidoffidmsuserofficerparam,
		lasttransdate = NOW(), 
		lasttransact = 'U'
		WHERE
		idpayloanoffline = idpayloanofflineparam;
    END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `updatepayloanv3` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `updatepayloanv3`(IN idpayloanofflineparam VARCHAR(128),
		IN idmsuserloanparam VARCHAR(32), IN idmsbuyerloanparam VARCHAR(32), IN idmssupplierparam VARCHAR(32), 
		IN descloanparam TEXT, IN loaninrpparam DOUBLE, IN paidoffdateparam VARCHAR(32), IN paidoffidmsuserofficerparam VARCHAR(32),
		IN idmsusertrans VARCHAR(32))
BEGIN
	UPDATE 	trpayloan 
		SET
		idmsuserloan = idmsuserloanparam,
		idmsbuyerloan = idmsbuyerloanparam,
		idmssupplier = idmssupplierparam,
		descloan = descloanparam, 
		loaninrp = loaninrpparam, 
		paidoffdate = paidoffdateparam,
		paidoffidmsuserofficer = paidoffidmsuserofficerparam,
		lasttransdate = NOW(), 
		lasttransact = 'U',
		idmsuserlasttrans = idmsusertrans
		WHERE
		idpayloanoffline = idpayloanofflineparam;
    END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `updatepayloanv4` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `updatepayloanv4`(IN idpayloanofflineparam VARCHAR(128),
		IN idmsuserloanparam VARCHAR(32), IN idmsbuyerloanparam VARCHAR(32), IN idmssupplierparam VARCHAR(32), 
		IN descloanparam TEXT, IN loaninrpparam DOUBLE, IN paidoffdateparam VARCHAR(32),
		IN paidoffidmsuserofficerparam VARCHAR(32), IN idmsusertrans VARCHAR(32),
		IN idfishermanofflineparam VARCHAR(128), IN idbuyerofflineparam VARCHAR(128))
BEGIN
	UPDATE 	trpayloan 
		SET
		idmsuserloan = idmsuserloanparam,
		idmsbuyerloan = idmsbuyerloanparam,
		idmssupplier = idmssupplierparam,
		descloan = descloanparam, 
		loaninrp = loaninrpparam, 
		paidoffdate = paidoffdateparam,
		paidoffidmsuserofficer = paidoffidmsuserofficerparam,
		lasttransdate = NOW(), 
		lasttransact = 'U',
		idmsuserlasttrans = idmsusertrans,
		idfishermanoffline = idfishermanofflineparam,
		idbuyeroffline = idbuyerofflineparam
		WHERE
		idpayloanoffline = idpayloanofflineparam;
    END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `updatesail` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `updatesail`(in idtrsailparam varchar(32), IN idmsshipparam VARCHAR(32), 
		IN sailpositionparam VARCHAR(32), IN sailingdateparam DATETIME, 
		IN idmslandingsiteparam VARCHAR(32), IN idmsfishermanparam VARCHAR(32), IN idmssupplierparam VARCHAR(32))
BEGIN
	UPDATE trsail 
		SET
		idmsship = idmsshipparam, 
		sailposition = sailpositionparam, 
		sailingdate = sailingdateparam, 
		idmslandingsite =idmslandingsiteparam, 
		idmsfisherman = idmsfishermanparam, 
		idmssupplier = idmssupplierparam,
		lasttransdate = now(), 
		lasttransact = 'U'
		WHERE
		idtrsail = idtrsailparam;
    END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `updateship` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `updateship`(IN `idshipofflineparam` VARCHAR(128), IN `vesselname_paramparam` VARCHAR(64), IN `vessellicensenumber_paramparam` VARCHAR(32), IN `vessellicenseexpiredate_paramparam` DATE, IN `fishinglicensenumber_paramparam` VARCHAR(32), IN `fishinglicenseexpiredate_paramparam` DATE, IN `vesselsize_paramparam` INT, IN `vesselflag_paramparam` VARCHAR(2), IN `vesselgeartype_paramparam` VARCHAR(128), IN `vesseldatemade_paramparam` DATE, IN `vesselownername_paramparam` VARCHAR(128), IN `vesselownerid_paramparam` VARCHAR(32), IN `vesselownerphone_paramparam` VARCHAR(20), IN `vesselownersex_paramparam` VARCHAR(1), IN `vesselownerdob_paramparam` DATE, IN `vesselowneraddress_paramparam` TEXT, IN `idmsuserparamparam` VARCHAR(32))
BEGIN
	UPDATE msship 
		SET
		idshipoffline = idshipofflineparam,
		vesselname_param = vesselname_paramparam,
		vessellicensenumber_param = vessellicensenumber_paramparam,
		vessellicenseexpiredate_param = fishinglicenseexpiredate_paramparam,
		fishinglicensenumber_param = fishinglicensenumber_paramparam,
		fishinglicenseexpiredate_param = fishinglicenseexpiredate_paramparam,
		vesselsize_param = vesselsize_paramparam, 
		vesselflag_param = vesselflag_paramparam, 
		vesselgeartype_param = vesselgeartype_paramparam, 
		vesseldatemade_param = vesseldatemade_paramparam, 
		vesselownername_param = vesselownername_paramparam, 
		vesselownerid_param = vesselownerid_paramparam, 
		vesselownerphone_param = vesselownerphone_paramparam, 
		vesselownersex_param = vesselownersex_paramparam, 
		vesselownerdob_param = vesselownerdob_paramparam, 
		vesselowneraddress_param = vesselowneraddress_paramparam, 
		idmsuserparam = idmsuserparamparam, 
		lasttransdate = NOW(),
		lasttransact = 'U'
		WHERE idshipoffline = idshipofflineparam;
    END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `updateshipcrew` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `updateshipcrew`(in idtrshipcrewparam varchar(32), IN idmsfishermanparam VARCHAR(32), IN idtrsailparam VARCHAR(32))
BEGIN
	UPDATE trshipcrew 
		SET
		idmsfisherman = idmsfishermanparam, 
		idtrsail = idtrsailparam
		WHERE
		idtrshipcrew = idtrshipcrewparam;
    END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `updateshipv3` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `updateshipv3`(IN `idshipofflineparam` VARCHAR(128), IN `vesselname_paramparam` VARCHAR(64), 
IN `vessellicensenumber_paramparam` VARCHAR(32), IN `vessellicenseexpiredate_paramparam` DATE, 
IN `fishinglicensenumber_paramparam` VARCHAR(32), IN `fishinglicenseexpiredate_paramparam` DATE, 
IN `vesselsize_paramparam` INT, IN `vesselflag_paramparam` VARCHAR(2), IN `vesselgeartype_paramparam` VARCHAR(128), 
IN `vesseldatemade_paramparam` DATE, IN `vesselownername_paramparam` VARCHAR(128), IN `vesselownerid_paramparam` VARCHAR(32), 
IN `vesselownerphone_paramparam` VARCHAR(20), IN `vesselownersex_paramparam` VARCHAR(1), 
IN `vesselownerdob_paramparam` DATE, IN `vesselowneraddress_paramparam` TEXT, IN `idmsuserparamparam` VARCHAR(32),
IN vesselownerprovince_paramparam VARCHAR(32), IN vesselownerdistrict_paramparam VARCHAR(32),
IN vesselownercity_paramparam VARCHAR(32), IN vesselownercountry_paramparam VARCHAR(32), IN vessel_idparam VARCHAR(128))
BEGIN
	UPDATE msship 
		SET
		idshipoffline = idshipofflineparam,
		vesselname_param = vesselname_paramparam,
		vessellicensenumber_param = vessellicensenumber_paramparam,
		vessellicenseexpiredate_param = vessellicenseexpiredate_paramparam,
		fishinglicensenumber_param = fishinglicensenumber_paramparam,
		fishinglicenseexpiredate_param = fishinglicenseexpiredate_paramparam,
		vesselsize_param = vesselsize_paramparam, 
		vesselflag_param = vesselflag_paramparam, 
		vesselgeartype_param = vesselgeartype_paramparam, 
		vesseldatemade_param = vesseldatemade_paramparam, 
		vesselownername_param = vesselownername_paramparam, 
		vesselownerid_param = vesselownerid_paramparam, 
		vesselownerphone_param = vesselownerphone_paramparam, 
		vesselownersex_param = vesselownersex_paramparam, 
		vesselownerdob_param = vesselownerdob_paramparam, 
		vesselowneraddress_param = vesselowneraddress_paramparam, 
		idmsuserparam = idmsuserparamparam, 
		lasttransdate = NOW(),
		lasttransact = 'U',
		vesselownerprovince_param = vesselownerprovince_paramparam, 
		vesselownerdistrict_param = vesselownerdistrict_paramparam, 
		vesselownercity_param = vesselownercity_paramparam,
		vesselownercountry_param = vesselownercountry_paramparam,
		vessel_id = vessel_idparam
		WHERE idshipoffline = idshipofflineparam;
    END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `updatesupplier` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_unicode_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `updatesupplier`(IN `idparam` INT, IN `nameparam` VARCHAR(191), IN `usernameparam` VARCHAR(191), IN `emailparam` VARCHAR(191), IN `phonenumberparam` VARCHAR(191), IN `passwordparam` VARCHAR(191), IN `idltusertypeparam` INT, IN `langparam` VARCHAR(2), IN `activeparam` INT, IN `natidparam` VARCHAR(2), IN `supplieridparam` VARCHAR(128), IN `genreparam` VARCHAR(1), IN `addressparam` VARCHAR(128), IN `provinceparam` VARCHAR(64), IN `cityparam` VARCHAR(64), IN `districtparam` VARCHAR(64), IN `businesslicenseparam` VARCHAR(128), IN `personalidcardparam` VARCHAR(64), IN `supplieridexpiredlicensedateparam` DATE)
BEGIN
	DECLARE idmsuservar VARCHAR(32);
	DECLARE namecheck VARCHAR(191);
	DECLARE emailcheck VARCHAR(191);
	DECLARE usernamecheck VARCHAR(191);
	DECLARE phonenumbercheck VARCHAR(191);
	DECLARE textcheck VARCHAR(191);
	
	SET idmsuservar = (SELECT idmsuser FROM msuser WHERE id = idparam);
	
	SET namecheck = (SELECT NAME FROM users WHERE NAME = nameparam AND id <> idparam LIMIT 1);
	SET usernamecheck = (SELECT username FROM users WHERE username = usernameparam AND id <> idparam LIMIT 1);
	SET emailcheck = (SELECT email FROM users WHERE email = emailparam AND id <> idparam LIMIT 1);
	SET phonenumbercheck = (SELECT phonenumber FROM users WHERE phonenumber = phonenumberparam AND id <> idparam LIMIT 1);
	
	IF(namecheck IS NOT NULL OR usernamecheck IS NOT NULL OR emailcheck IS NOT NULL OR phonenumbercheck IS NOT NULL) THEN
		SET textcheck = (SELECT CONCAT(
					CASE WHEN namecheck IS NULL THEN 'Name, ' END,
					CASE WHEN usernamecheck IS NULL THEN 'Username, ' END,
					CASE WHEN emailcheck IS NULL THEN 'Email, ' END,
					CASE WHEN phonenumbercheck IS NULL THEN 'Phone Number, ' END));
		SET textcheck = LEFT(textcheck, length(textcheck - 2));
		SELECT textcheck;
	ELSE
		UPDATE 	users
			SET NAME = nameparam,
			username = usernameparam,
			email = CASE WHEN emailparam = '' THEN (SELECT getuuid()) ELSE emailparam END,
			phonenumber = phonenumberparam,
			PASSWORD = CASE WHEN passwordparam = '' THEN PASSWORD ELSE passwordparam END,
			updated_at = NOW()
			WHERE ID = idparam;
		UPDATE msuser 
			SET NAME = nameparam,
			idltusertype = idltusertypeparam,
			active = activeparam,
			lasttransdate = NOW(),
			lasttransact = 'U',
			defaultlanguage = langparam
			WHERE idmsuser = idmsuservar;
		UPDATE mssupplier
			SET suppliernatid = natidparam,
			supplierid = supplieridparam,
			lasttransdate = NOW(),
			lasttransact = 'U',
			genre = genreparam,
			address = addressparam, 
			province = provinceparam, 
			city = cityparam, 
			district = districtparam, 
			businesslicense = businesslicenseparam,
			personalidcard = personalidcardparam,
			supplieridexpiredlicensedate = supplieridexpiredlicensedateparam
			WHERE idmsuser = idmsuservar;
		
	END IF;
    END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `updatesupplierofficer` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `updatesupplierofficer`(IN idmssupplierparam VARCHAR(32), IN idparam VARCHAR(32), IN `nameparam` VARCHAR(191), IN `usernameparam` VARCHAR(191),
							IN `emailparam` VARCHAR(191), IN `phonenumberparam` VARCHAR(191),
							IN passwordparam VARCHAR(191), IN isadmintypeparam INT, IN activeparam INT,
							IN langparam VARCHAR(2), IN accessparam VARCHAR(10), IN accessroleparam VARCHAR(32))
BEGIN
	DECLARE idvar INT;
	SET idvar = (SELECT id FROM msuser WHERE idmsuser = idparam);
	
	UPDATE 	users
		SET NAME = nameparam,
		username = usernameparam,
		email = CASE WHEN emailparam = '' THEN (SELECT getuuid()) ELSE emailparam END,
		phonenumber = phonenumberparam,
		PASSWORD = CASE WHEN passwordparam = '' THEN PASSWORD ELSE passwordparam END,
		updated_at = NOW()
		WHERE ID = idvar;
	UPDATE msuser 
		SET NAME = nameparam,
		idltusertype = isadmintypeparam,
		active = activeparam,
		lasttransdate = NOW(),
		lasttransact = 'U',
		defaultlanguage = langparam
		WHERE idmsuser = idparam;
	UPDATE mssupplierofficer
		SET idmssupplier = idmssupplierparam,
		accesspage = accessparam,
		accessrole = accessroleparam,
		lasttransdate = NOW(),
		lasttransact = 'U'
		WHERE idmsuser = idparam;
    END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `updatetypeitemloan` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `updatetypeitemloan`(IN idmstypeitemloanofflineparam VARCHAR(128), IN typenameparam VARCHAR(32), 
	IN unitparam VARCHAR(32), IN priceperunitparam FLOAT, IN idmssupplierparam VARCHAR(32), IN idmsuserparam VARCHAR(32))
BEGIN
	UPDATE 	mstypeitemloan 
	SET
		typename = typenameparam, 
		unit = unitparam, 
		priceperunit = priceperunitparam, 
		idmssupplier = idmssupplierparam, 
		lasttransdate = NOW(), 
		lasttransact = 'U', 
		idmsuserlasttrans = idmsuserparam
	WHERE
		idmstypeitemloanoffline = idmstypeitemloanofflineparam;
    END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `updateuserspassword` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `updateuserspassword`(IN idparam INT, IN passwordparam VARCHAR(191))
BEGIN
	UPDATE 	users
		SET PASSWORD = CASE WHEN passwordparam = '' THEN PASSWORD ELSE passwordparam END,
		updated_at = NOW()
		WHERE id = idparam;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `upsertinvestbuyfish` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `upsertinvestbuyfish`(IN `offlineIDparam` VARCHAR(128), IN `catchOfflineIDparam` VARCHAR(128), IN `fishOfflineIDparam` VARCHAR(128), IN `shipOfflineIDparam` VARCHAR(128), IN `speciesparam` TEXT, IN `speciesEngparam` TEXT, IN `speciesIndoparam` TEXT, IN `weightBeforeSplitparam` INT, IN `gradeparam` TEXT, IN `fishermannameparam` TEXT, IN `fishinggroundparam` TEXT, IN `shipNameparam` TEXT, IN `shipGearparam` TEXT, IN `landingDateparam` TEXT, IN `portNameparam` TEXT, IN `amountparam` INT, IN `notesparam` TEXT, IN `tsparam` INT, IN `synchparam` INT, IN `trxoperationparam` TEXT, IN `trxdateparam` TEXT, IN `idmssupplierparam` TEXT, IN `idmsuserparam` TEXT)
BEGIN
	INSERT INTO investbuyfish ( 
    id,
    offlineID,  
    catchOfflineID,  
    fishOfflineID,  
    shipOfflineID,  
    species,  
    speciesEng,  
    speciesIndo,  
    weightBeforeSplit,  
    grade,  
    fishermanname,  
    fishingground,  
    shipName,  
    shipGear,  
    landingDate,  
    portName,  
    amount,  
    notes,  
    ts,  
    synch,  
    trxoperation,  
    trxdate,  
    idmssupplier,  
    idmsuser
  )
	VALUES( 
    getuuid(),
    offlineIDparam, 
    catchOfflineIDparam, 
    fishOfflineIDparam, 
    shipOfflineIDparam, 
    speciesparam, 
    speciesEngparam, 
    speciesIndoparam, 
    weightBeforeSplitparam, 
    gradeparam, 
    fishermannameparam, 
    fishinggroundparam, 
    shipNameparam, 
    shipGearparam, 
    landingDateparam, 
    portNameparam, 
    amountparam, 
    notesparam, 
    tsparam, 
    synchparam, 
    trxoperationparam, 
    NOW(), 
    idmssupplierparam, 
    idmsuserparam
  )
	ON DUPLICATE KEY 
    UPDATE
      catchOfflineID = catchOfflineIDparam,
      fishOfflineID = fishOfflineIDparam,
      shipOfflineID = shipOfflineIDparam,
      species = speciesparam,
      speciesEng = speciesEngparam,
      speciesIndo = speciesIndoparam,
      weightBeforeSplit = weightBeforeSplitparam,
      grade = gradeparam,
      fishermanname = fishermannameparam,
      fishingground = fishinggroundparam,
      shipName = shipNameparam,
      shipGear = shipGearparam,
      landingDate = landingDateparam,
      portName = portNameparam,
      amount = amountparam,
      notes = notesparam,
      ts = tsparam,
      synch= synchparam,
      trxoperation = trxoperationparam,
      trxdate = trxdateparam,
      idmssupplier = idmssupplierparam,
      idmsuser = idmsuserparam;
  END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `upsertinvestcreditpayment` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `upsertinvestcreditpayment`(IN `offlineIDparam` VARCHAR(128), IN `giveCreditOfflineIDparam` TEXT, IN `trafizPayloanOfflineIDparam` TEXT, IN `amountparam` INT, IN `notesparam` TEXT, IN `tsparam` INT, IN `synchparam` INT, IN `trxoperationparam` TEXT, IN `idmssupplierparam` TEXT, IN `idmsuserparam` TEXT, IN `paidoffparam` BOOLEAN)
BEGIN
	INSERT INTO investcreditpayment 
		(id, offlineID, giveCreditOfflineID, trafizPayloanOfflineID, amount, notes, ts, synch, trxoperation, trxdate, idmssupplier,	idmsuser, paidoff)
	VALUES
		(getuuid(), offlineIDparam, giveCreditOfflineIDparam, trafizPayloanOfflineIDparam, amountparam, notesparam, tsparam, synchparam, trxoperationparam, NOW(), idmssupplierparam, idmsuserparam, paidoffparam)
	ON DUPLICATE KEY 
    UPDATE
    	giveCreditOfflineID = giveCreditOfflineIDparam,
        trafizPayloanOfflineID = trafizPayloanOfflineIDparam,
        amount = amountparam, 
        notes = notesparam, 
        ts = tsparam, 
        synch = synchparam, 
        trxoperation = trxoperationparam, 
        trxdate = NOW(), 
        idmssupplier = idmssupplierparam,	
        idmsuser = idmsuserparam,
        paidoff=paidoffparam;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `upsertinvestcustomexpense` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `upsertinvestcustomexpense`(IN `offlineIDparam` VARCHAR(128), IN `offlineCustomTypeIDparam` TEXT, IN `amountparam` INT, IN `notesparam` TEXT, IN `tsparam` INT, IN `createddateparam` TEXT, IN `createdhourparam` TEXT, IN `synchparam` INT, IN `trxoperationparam` TEXT, IN `idmssupplierparam` TEXT, IN `idmsuserparam` TEXT)
BEGIN
	INSERT INTO investcustomexpense
		(id, offlineID, offlineCustomTypeID, amount, notes, ts, createddate, createdhour, synch, trxoperation, trxdate, idmssupplier,	idmsuser)
	VALUES
		(getuuid(), offlineIDparam, offlineCustomTypeIDparam, amountparam, notesparam, tsparam, createddateparam, createdhourparam, synchparam, trxoperationparam, NOW(), idmssupplierparam,	idmsuserparam)
	ON DUPLICATE KEY 
    UPDATE
    	offlineCustomTypeID=offlineCustomTypeIDparam,
        amount = amountparam, 
        notes = notesparam, 
        ts = tsparam, 
        createddate = createddateparam, 
        createdhour = createdhourparam, 
        synch = synchparam, 
        trxoperation = trxoperationparam, 
        trxdate = NOW(), 
        idmssupplier = idmssupplierparam,	
        idmsuser = idmsuserparam;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `upsertinvestcustomincome` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `upsertinvestcustomincome`(IN `offlineIDparam` VARCHAR(128), IN `offlineCustomTypeIDparam` TEXT, IN `amountparam` INT, IN `notesparam` TEXT, IN `tsparam` INT, IN `createddateparam` TEXT, IN `createdhourparam` TEXT, IN `synchparam` INT, IN `trxoperationparam` TEXT, IN `idmssupplierparam` TEXT, IN `idmsuserparam` TEXT)
BEGIN
	INSERT INTO investcustomincome(id, offlineID, offlineCustomTypeID, amount, notes, ts, createddate, createdhour, synch, trxoperation, trxdate, idmssupplier,	idmsuser)
	VALUES
		(getuuid(), offlineIDparam, offlineCustomTypeIDparam, amountparam, notesparam, tsparam, createddateparam, createdhourparam, synchparam, trxoperationparam, NOW(), idmssupplierparam,	idmsuserparam)
	ON DUPLICATE KEY 
    UPDATE
    	offlineCustomTypeID=offlineCustomTypeIDparam,
        amount = amountparam, 
        notes = notesparam, 
        ts = tsparam, 
        createddate = createddateparam, 
        createdhour = createdhourparam, 
        synch = synchparam, 
        trxoperation = trxoperationparam, 
        trxdate = NOW(), 
        idmssupplier = idmssupplierparam,	
        idmsuser = idmsuserparam;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `upsertinvestcustomtype` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `upsertinvestcustomtype`(IN `offlineIDparam` VARCHAR(128), IN `labelparam` TEXT, IN `incomeorexpenseparam` TEXT, IN `tsparam` INT, IN `createddateparam` TEXT, IN `createdhourparam` TEXT, IN `synchparam` INT, IN `trxoperationparam` TEXT, IN `idmssupplierparam` TEXT, IN `idmsuserparam` TEXT)
BEGIN
	INSERT INTO investcustomtype
		(id, offlineID, label, incomeorexpense, ts, createddate, createdhour, synch, trxoperation, trxdate, idmssupplier,	idmsuser)
	VALUES
		(getuuid(), offlineIDparam, labelparam, incomeorexpenseparam, tsparam, createddateparam, createdhourparam, synchparam, trxoperationparam, NOW(), idmssupplierparam,	idmsuserparam)
	ON DUPLICATE KEY 
    UPDATE
        label = labelparam, 
        incomeorexpense= incomeorexpenseparam, 
        ts = tsparam, 
        createddate = createddateparam, 
        createdhour = createdhourparam, 
        synch = synchparam, 
        trxoperation = trxoperationparam, 
        trxdate = NOW(), 
        idmssupplier = idmssupplierparam,	
        idmsuser = idmsuserparam;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `upsertinvestgivecredit` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `upsertinvestgivecredit`(IN `offlineIDparam` VARCHAR(128), IN `trafizLoanOfflineIDparam` TEXT, IN `nameparam` TEXT, IN `amountparam` INT, IN `notesparam` TEXT, IN `tsparam` INT, IN `synchparam` INT, IN `trxoperationparam` TEXT, IN `idmssupplierparam` TEXT, IN `idmsuserparam` TEXT)
BEGIN
	INSERT INTO investgivecredit 
		(id, offlineID, trafizLoanOfflineID, name, amount, notes, ts, synch, trxoperation, trxdate, idmssupplier,	idmsuser)
	VALUES
		(getuuid(), offlineIDparam, trafizLoanOfflineIDparam, nameparam, amountparam, notesparam, tsparam, synchparam, trxoperationparam, NOW(), idmssupplierparam, idmsuserparam)
	ON DUPLICATE KEY 
    UPDATE
    	trafizLoanOfflineID = trafizLoanOfflineIDparam,
        name = nameparam,
        amount = amountparam, 
        notes = notesparam, 
        ts = tsparam, 
        synch = synchparam, 
        trxoperation = trxoperationparam, 
        trxdate = NOW(), 
        idmssupplier = idmssupplierparam,	
        idmsuser = idmsuserparam;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `upsertinvestloan` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `upsertinvestloan`(IN `offlineIDparam` VARCHAR(128), IN `creditorparam` TEXT, IN `tenorparam` INT, IN `installmentparam` INT, IN `payperiodparam` INT, IN `amountparam` INT, IN `notesparam` TEXT, IN `tsparam` INT, IN `synchparam` INT, IN `trxoperationparam` TEXT, IN `idmssupplierparam` TEXT, IN `idmsuserparam` TEXT)
BEGIN
	INSERT INTO investtakeloan 
		(id, offlineID, creditor, tenor, installment, payperiod, amount, notes, ts, synch, trxoperation, trxdate, idmssupplier,	idmsuser)
	VALUES
		(getuuid(), offlineIDparam, creditorparam, tenorparam, installmentparam, payperiodparam, amountparam, notesparam, tsparam, synchparam, trxoperationparam, NOW(), idmssupplierparam, idmsuserparam)
	ON DUPLICATE KEY 
    UPDATE
        creditor = creditorparam,
        tenor = tenorparam, 
        installment = installmentparam, 
        payperiod = payperiodparam, 
        amount = amountparam, 
        notes = notesparam, 
        ts = tsparam, 
        synch = synchparam, 
        trxoperation = trxoperationparam, 
        trxdate = NOW(), 
        idmssupplier = idmssupplierparam,	
        idmsuser = idmsuserparam;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `upsertinvestpayloan` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `upsertinvestpayloan`(IN `offlineIDparam` VARCHAR(128), IN `takeloanOfflineIDparam` TEXT, IN `amountparam` INT, IN `notesparam` TEXT, IN `paidoffparam` BOOLEAN, IN `tsparam` INT, IN `synchparam` INT, IN `trxoperationparam` TEXT, IN `idmssupplierparam` TEXT, IN `idmsuserparam` TEXT)
BEGIN
	INSERT INTO investpayloan 
		(id, offlineID, takeLoanOfflineID, amount, notes, paidoff, ts, synch, trxoperation, trxdate, idmssupplier,	idmsuser)
	VALUES
		(getuuid(), offlineIDparam, takeloanOfflineIDparam, amountparam, notesparam, paidoffparam, tsparam, synchparam, trxoperationparam, NOW(), idmssupplierparam, idmsuserparam)
	ON DUPLICATE KEY 
    UPDATE
    	takeLoanOfflineID=takeloanOfflineIDparam,
        amount = amountparam, 
        notes = notesparam, 
        paidoff=paidoffparam,
        ts = tsparam, 
        synch = synchparam, 
        trxoperation = trxoperationparam, 
        trxdate = NOW(), 
        idmssupplier = idmssupplierparam,	
        idmsuser = idmsuserparam;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `upsertinvestsimplesellfish` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `upsertinvestsimplesellfish`(IN `offlineIDparam` VARCHAR(128), IN `fishOfflineIDparam` VARCHAR(128), IN `gradeparam` TEXT, IN `weightparam` INT, IN `amountparam` INT, IN `notesparam` TEXT, IN `tsparam` INT, IN `synchparam` INT, IN `trxoperationparam` TEXT, IN `trxdateparam` TEXT, IN `idmssupplierparam` TEXT, IN `idmsuserparam` TEXT)
BEGIN
	INSERT INTO investsimplesellfish ( 
    id,
    offlineID,
    fishOfflineID,
    grade,
    weight,
    amount,
    notes,
    ts,
    synch,
    trxoperation,
    trxdate,
    idmssupplier,
    idmsuser
  )
	VALUES( 
    getuuid(),
    offlineIDparam,
    fishOfflineIDparam,
    gradeparam,
    weightparam,
    amountparam,
    notesparam,
    tsparam,
    synchparam,
    trxoperationparam,
    NOW(),
    idmssupplierparam,
    idmsuserparam
  )
	ON DUPLICATE KEY 
    UPDATE
      offlineID = offlineIDparam,
      fishOfflineID = fishOfflineIDparam,
      grade = gradeparam,
      weight = weightparam,
      amount = amountparam,
      notes = notesparam,
      ts = tsparam,
      synch = synchparam,
      trxoperation = trxoperationparam,
      trxdate = trxdateparam,
      idmssupplier = idmssupplierparam,
      idmsuser = idmsuserparam;
  END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `upsertinvestsplitfish` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `upsertinvestsplitfish`(IN `offlineIDparam` VARCHAR(128), IN `deliveryOfflineIDparam` VARCHAR(128), IN `buyFishOfflineIDparam` VARCHAR(128), IN `sellUnitNameparam` TEXT, IN `numUnitparam` INT, IN `sellUnitPriceparam` INT, IN `amountparam` INT, IN `notesparam` TEXT, IN `tsparam` INT, IN `synchparam` INT, IN `trxoperationparam` TEXT, IN `trxdateparam` TEXT, IN `idmssupplierparam` TEXT, IN `idmsuserparam` TEXT, IN `weightOnSplitparam` INT, IN `soldparam` INT, IN `fishOfflineIDparam` TEXT)
BEGIN
	INSERT INTO investsplitfish ( 
    id,
    offlineID,
    deliveryOfflineID,
    buyFishOfflineID,
    sellUnitName,
    numUnit,
    sellUnitPrice,
    amount,
    notes,
    ts,
    synch,
    trxoperation,
    trxdate,
    idmssupplier,
    idmsuser,
    weightOnSplit,
    sold,
    fishOfflineID
  )
	VALUES( 
    getuuid(),
    offlineIDparam,
    deliveryOfflineIDparam,
    buyFishOfflineIDparam,
    sellUnitNameparam,
    numUnitparam,
    sellUnitPriceparam,
    amountparam,
    notesparam,
    tsparam,
    synchparam,
    trxoperationparam,
    NOW(),
    idmssupplierparam,
    idmsuserparam,
    weightOnSplitparam,
    soldparam,
    fishOfflineIDparam
  )
	ON DUPLICATE KEY 
    UPDATE
      offlineID = offlineIDparam,
      deliveryOfflineID = deliveryOfflineIDparam,
      buyFishOfflineID = buyFishOfflineIDparam,
      sellUnitName = sellUnitNameparam,
      numUnit = numUnitparam,
      sellUnitPrice = sellUnitPriceparam,
      amount = amountparam,
      notes = notesparam,
      ts = tsparam,
      synch = synchparam,
      trxoperation = trxoperationparam,
      trxdate = trxdateparam,
      idmssupplier = idmssupplierparam,
      idmsuser = idmsuserparam,
      weightOnSplit = weightOnSplitparam,
      sold = soldparam,
      fishOfflineID = fishOfflineIDparam;
  END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-10-27 12:49:36
