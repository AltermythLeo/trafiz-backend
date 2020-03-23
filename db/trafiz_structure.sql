-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 23, 2020 at 02:21 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `trafiz`
--

-- --------------------------------------------------------

--
-- Table structure for table `investbuyfish`
--

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
  `idmsuser` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `investcreditpayment`
--

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
  `paidoff` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `investcustomexpense`
--

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
  `idmsuser` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `investcustomincome`
--

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
  `idmsuser` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `investcustomtype`
--

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
  `idmsuser` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `investgivecredit`
--

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
  `idmsuser` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `investpayloan`
--

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
  `idmsuser` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `investsimplesellfish`
--

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
  `idmsuser` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `investsplitfish`
--

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
  `fishOfflineID` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `investtakeloan`
--

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
  `idmsuser` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `kdeindo`
--

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

-- --------------------------------------------------------

--
-- Table structure for table `kdeusaid`
--

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

-- --------------------------------------------------------

--
-- Table structure for table `ltfish`
--

CREATE TABLE `ltfish` (
  `idltfish` int(11) NOT NULL,
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
  `lasttransact` varchar(1) NOT NULL DEFAULT 'C'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ltfishinggear`
--

CREATE TABLE `ltfishinggear` (
  `idltfishinggear` int(11) NOT NULL,
  `api_code` varchar(9) NOT NULL,
  `indonesian_name` varchar(48) NOT NULL,
  `english_name` varchar(64) NOT NULL,
  `abbr` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ltfishinggear_temp`
--

CREATE TABLE `ltfishinggear_temp` (
  `idltfishinggear` int(11) NOT NULL,
  `api_code` varchar(9) NOT NULL,
  `indonesian_name` varchar(48) NOT NULL,
  `english_name` varchar(64) NOT NULL,
  `abbr` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ltgridwpp`
--

CREATE TABLE `ltgridwpp` (
  `idltgridwpp` int(11) NOT NULL,
  `grid` char(3) NOT NULL,
  `wpp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ltusertype`
--

CREATE TABLE `ltusertype` (
  `idltusertype` int(11) NOT NULL,
  `usertypename` varchar(32) DEFAULT NULL,
  `desc` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `msbuyer`
--

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
  `businesslicenseexpireddate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `msfish`
--

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
  `lasttransact` varchar(1) NOT NULL COMMENT 'c: create;u:update;d:delete'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `msfisherman`
--

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
  `country` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `msinfo`
--

CREATE TABLE `msinfo` (
  `idmsinfo` varchar(32) NOT NULL,
  `infodesc` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `msship`
--

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
  `vessel_id` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `mssupplier`
--

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
  `supplieridexpiredlicensedate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `mssupplierofficer`
--

CREATE TABLE `mssupplierofficer` (
  `idmssupplierofficer` varchar(32) CHARACTER SET latin1 NOT NULL,
  `idmssupplier` varchar(32) CHARACTER SET latin1 DEFAULT NULL,
  `idmsuser` varchar(32) CHARACTER SET latin1 DEFAULT NULL,
  `accesspage` varchar(10) DEFAULT NULL,
  `accessrole` varchar(32) DEFAULT NULL,
  `lasttransdate` datetime DEFAULT NULL,
  `lasttransact` varchar(1) CHARACTER SET latin1 DEFAULT 'C'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `mssuppliertemp`
--

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
  `supplieridexpiredlicensedate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `mstypeitemloan`
--

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

-- --------------------------------------------------------

--
-- Table structure for table `msuser`
--

CREATE TABLE `msuser` (
  `idmsuser` varchar(32) CHARACTER SET latin1 NOT NULL,
  `name` varchar(128) CHARACTER SET latin1 DEFAULT NULL,
  `id` int(11) DEFAULT NULL,
  `bod` datetime DEFAULT NULL,
  `idltusertype` int(11) DEFAULT NULL,
  `lasttransdate` datetime DEFAULT NULL,
  `lasttransact` varchar(1) CHARACTER SET latin1 DEFAULT NULL COMMENT 'C: fresh create; U: update; D: Delete',
  `active` int(11) DEFAULT 1 COMMENT '1: active; 0:non-active',
  `defaultlanguage` varchar(2) CHARACTER SET latin1 DEFAULT 'en'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `msuserqrcode`
--

CREATE TABLE `msuserqrcode` (
  `idmsuserqrcode` varchar(32) NOT NULL,
  `uniquecode` varchar(32) DEFAULT NULL,
  `datepost` datetime DEFAULT NULL,
  `statuspost` varchar(1) DEFAULT '0',
  `email` varchar(128) DEFAULT NULL,
  `password` varchar(128) DEFAULT NULL,
  `lasttransdate` datetime DEFAULT NULL,
  `lasttransact` varchar(1) DEFAULT 'C'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `trbatchdeliverysheet`
--

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
  `idmsuserlasttrans` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `trbatchdeliverysheetfishdata`
--

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
  `idmsuserlasttrans` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `trcatch`
--

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
  `fishermanregnumber` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `trdelivery`
--

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
  `idmsuserlasttrans` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `trdeliverysheet`
--

CREATE TABLE `trdeliverysheet` (
  `idtrdeliverysheetno` varchar(32) NOT NULL,
  `deliverysheetofflineid` text DEFAULT NULL,
  `savedtext` longtext DEFAULT NULL,
  `lasttransdate` datetime DEFAULT NULL,
  `lasttransact` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `trfishcatch`
--

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
  `upline` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `trloan`
--

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
  `idbuyeroffline` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `trpayloan`
--

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
  `idbuyeroffline` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `trsession`
--

CREATE TABLE `trsession` (
  `idtrsession` varchar(10) CHARACTER SET latin1 NOT NULL,
  `sessionguid` varchar(64) CHARACTER SET latin1 DEFAULT NULL,
  `idmsuser` varchar(10) CHARACTER SET latin1 DEFAULT NULL,
  `transdate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `trsyncdata`
--

CREATE TABLE `trsyncdata` (
  `idtrssyncdata` varchar(32) NOT NULL,
  `synctype` varchar(7) DEFAULT NULL,
  `functiontype` varchar(20) DEFAULT NULL,
  `functionname` varchar(64) DEFAULT NULL,
  `param` longtext DEFAULT NULL,
  `descdata` longtext DEFAULT NULL,
  `transdate` datetime DEFAULT NULL,
  `idmsuser` varchar(32) DEFAULT NULL,
  `idtrsyncjson` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `trsyncfailed`
--

CREATE TABLE `trsyncfailed` (
  `idtrsyncfailed` varchar(128) NOT NULL,
  `idmsuser` varchar(128) DEFAULT NULL,
  `jsondata` longtext DEFAULT NULL,
  `idtrsyncjson` varchar(128) DEFAULT NULL,
  `functionname` varchar(128) DEFAULT NULL,
  `functionindex` int(11) NOT NULL DEFAULT 0,
  `texterr` longtext DEFAULT NULL,
  `lasttransdate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `trsyncjson`
--

CREATE TABLE `trsyncjson` (
  `idtrsyncjson` varchar(32) NOT NULL,
  `idmsuser` varchar(32) DEFAULT NULL,
  `data` longtext DEFAULT NULL,
  `transdate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phonenumber` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `investbuyfish`
--
ALTER TABLE `investbuyfish`
  ADD PRIMARY KEY (`offlineID`),
  ADD KEY `id` (`id`) USING BTREE;

--
-- Indexes for table `investcreditpayment`
--
ALTER TABLE `investcreditpayment`
  ADD PRIMARY KEY (`offlineID`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `investcustomexpense`
--
ALTER TABLE `investcustomexpense`
  ADD PRIMARY KEY (`offlineID`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `investcustomincome`
--
ALTER TABLE `investcustomincome`
  ADD PRIMARY KEY (`offlineID`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `investcustomtype`
--
ALTER TABLE `investcustomtype`
  ADD PRIMARY KEY (`offlineID`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `investgivecredit`
--
ALTER TABLE `investgivecredit`
  ADD PRIMARY KEY (`offlineID`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `investpayloan`
--
ALTER TABLE `investpayloan`
  ADD PRIMARY KEY (`offlineID`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `investsimplesellfish`
--
ALTER TABLE `investsimplesellfish`
  ADD PRIMARY KEY (`offlineID`),
  ADD KEY `id` (`id`) USING BTREE;

--
-- Indexes for table `investsplitfish`
--
ALTER TABLE `investsplitfish`
  ADD PRIMARY KEY (`offlineID`),
  ADD KEY `id` (`id`) USING BTREE;

--
-- Indexes for table `investtakeloan`
--
ALTER TABLE `investtakeloan`
  ADD PRIMARY KEY (`offlineID`),
  ADD KEY `id` (`id`),
  ADD KEY `id_2` (`id`);

--
-- Indexes for table `ltfish`
--
ALTER TABLE `ltfish`
  ADD PRIMARY KEY (`idltfish`),
  ADD KEY `english_name` (`english_name`);

--
-- Indexes for table `ltfishinggear`
--
ALTER TABLE `ltfishinggear`
  ADD PRIMARY KEY (`idltfishinggear`);

--
-- Indexes for table `ltgridwpp`
--
ALTER TABLE `ltgridwpp`
  ADD PRIMARY KEY (`idltgridwpp`),
  ADD KEY `grid` (`grid`);

--
-- Indexes for table `ltusertype`
--
ALTER TABLE `ltusertype`
  ADD PRIMARY KEY (`idltusertype`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `msbuyer`
--
ALTER TABLE `msbuyer`
  ADD PRIMARY KEY (`idmsbuyer`);

--
-- Indexes for table `msfish`
--
ALTER TABLE `msfish`
  ADD PRIMARY KEY (`idmsfish`);

--
-- Indexes for table `msfisherman`
--
ALTER TABLE `msfisherman`
  ADD PRIMARY KEY (`idmsfisherman`);

--
-- Indexes for table `msinfo`
--
ALTER TABLE `msinfo`
  ADD PRIMARY KEY (`idmsinfo`);

--
-- Indexes for table `msship`
--
ALTER TABLE `msship`
  ADD PRIMARY KEY (`idmsship`);

--
-- Indexes for table `mssupplier`
--
ALTER TABLE `mssupplier`
  ADD PRIMARY KEY (`idmssupplier`);

--
-- Indexes for table `mssupplierofficer`
--
ALTER TABLE `mssupplierofficer`
  ADD PRIMARY KEY (`idmssupplierofficer`);

--
-- Indexes for table `mssuppliertemp`
--
ALTER TABLE `mssuppliertemp`
  ADD PRIMARY KEY (`idmssuppliertemp`);

--
-- Indexes for table `msuser`
--
ALTER TABLE `msuser`
  ADD PRIMARY KEY (`idmsuser`);

--
-- Indexes for table `msuserqrcode`
--
ALTER TABLE `msuserqrcode`
  ADD PRIMARY KEY (`idmsuserqrcode`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `trbatchdeliverysheet`
--
ALTER TABLE `trbatchdeliverysheet`
  ADD PRIMARY KEY (`idtrbatchdeliverysheet`);

--
-- Indexes for table `trbatchdeliverysheetfishdata`
--
ALTER TABLE `trbatchdeliverysheetfishdata`
  ADD PRIMARY KEY (`idtrbatchdeliverysheetfishdata`);

--
-- Indexes for table `trcatch`
--
ALTER TABLE `trcatch`
  ADD PRIMARY KEY (`idtrcatch`);

--
-- Indexes for table `trdelivery`
--
ALTER TABLE `trdelivery`
  ADD PRIMARY KEY (`idtrdelivery`);

--
-- Indexes for table `trdeliverysheet`
--
ALTER TABLE `trdeliverysheet`
  ADD PRIMARY KEY (`idtrdeliverysheetno`);

--
-- Indexes for table `trfishcatch`
--
ALTER TABLE `trfishcatch`
  ADD PRIMARY KEY (`idtrfishcatch`);

--
-- Indexes for table `trloan`
--
ALTER TABLE `trloan`
  ADD PRIMARY KEY (`idtrloan`);

--
-- Indexes for table `trpayloan`
--
ALTER TABLE `trpayloan`
  ADD PRIMARY KEY (`idtrpayloan`);

--
-- Indexes for table `trsession`
--
ALTER TABLE `trsession`
  ADD PRIMARY KEY (`idtrsession`);

--
-- Indexes for table `trsyncdata`
--
ALTER TABLE `trsyncdata`
  ADD PRIMARY KEY (`idtrssyncdata`);

--
-- Indexes for table `trsyncfailed`
--
ALTER TABLE `trsyncfailed`
  ADD PRIMARY KEY (`idtrsyncfailed`);

--
-- Indexes for table `trsyncjson`
--
ALTER TABLE `trsyncjson`
  ADD PRIMARY KEY (`idtrsyncjson`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_phonenumber_unique` (`phonenumber`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ltfish`
--
ALTER TABLE `ltfish`
  MODIFY `idltfish` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ltfishinggear`
--
ALTER TABLE `ltfishinggear`
  MODIFY `idltfishinggear` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ltgridwpp`
--
ALTER TABLE `ltgridwpp`
  MODIFY `idltgridwpp` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
