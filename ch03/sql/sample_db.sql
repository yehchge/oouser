-- --------------------------------------------------------
-- 主機:                           127.0.0.1
-- 服務器版本:                        8.0.12 - MySQL Community Server - GPL
-- 服務器操作系統:                      Linux
-- HeidiSQL 版本:                  9.3.0.4984
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- 導出 sample_db 的資料庫結構
CREATE DATABASE IF NOT EXISTS `sample_db` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */;
USE `sample_db`;


-- 導出  表 sample_db.entities 結構
CREATE TABLE IF NOT EXISTS `entities` (
  `entityid` int(11) NOT NULL AUTO_INCREMENT,
  `name1` varchar(100) NOT NULL,
  `name2` varchar(100) NOT NULL,
  `type` char(1) NOT NULL,
  PRIMARY KEY (`entityid`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- 正在導出表  sample_db.entities 的資料：~2 rows (大約)
/*!40000 ALTER TABLE `entities` DISABLE KEYS */;
INSERT INTO `entities` (`entityid`, `name1`, `name2`, `type`) VALUES
	(1, 'Baz Corp.', '', 'O'),
	(2, 'Bob ', 'Smith', 'I'),
	(3, 'Jane', 'Johnson', 'I');
/*!40000 ALTER TABLE `entities` ENABLE KEYS */;


-- 導出  表 sample_db.entityaddress 結構
CREATE TABLE IF NOT EXISTS `entityaddress` (
  `addressid` int(11) NOT NULL AUTO_INCREMENT,
  `entityid` int(11) NOT NULL,
  `saddress1` varchar(255) DEFAULT NULL,
  `saddress2` varchar(255) DEFAULT NULL,
  `scity` varchar(255) DEFAULT NULL,
  `cstate` char(2) DEFAULT NULL,
  `spostalcode` varchar(10) DEFAULT NULL,
  `stype` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`addressid`),
  KEY `FK_entityaddress_entities` (`entityid`),
  CONSTRAINT `FK_entityaddress_entities` FOREIGN KEY (`entityid`) REFERENCES `entities` (`entityid`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- 正在導出表  sample_db.entityaddress 的資料：~2 rows (大約)
/*!40000 ALTER TABLE `entityaddress` DISABLE KEYS */;
INSERT INTO `entityaddress` (`addressid`, `entityid`, `saddress1`, `saddress2`, `scity`, `cstate`, `spostalcode`, `stype`) VALUES
	(1, 2, '123 Main St.', NULL, 'Footown', 'PA', '12345-3134', NULL),
	(2, 2, '123 Elm St.', 'Suite 456', 'Footown', 'PA', '12345-2718', NULL);
/*!40000 ALTER TABLE `entityaddress` ENABLE KEYS */;


-- 導出  表 sample_db.entityemail 結構
CREATE TABLE IF NOT EXISTS `entityemail` (
  `emailid` int(11) NOT NULL AUTO_INCREMENT,
  `entityid` int(11) NOT NULL,
  `semail` varchar(255) DEFAULT NULL,
  `stype` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`emailid`),
  KEY `FK_entityemail_entities` (`entityid`),
  CONSTRAINT `FK_entityemail_entities` FOREIGN KEY (`entityid`) REFERENCES `entities` (`entityid`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- 正在導出表  sample_db.entityemail 的資料：~1 rows (大約)
/*!40000 ALTER TABLE `entityemail` DISABLE KEYS */;
INSERT INTO `entityemail` (`emailid`, `entityid`, `semail`, `stype`) VALUES
	(1, 2, 'bob@bazcorp.com', NULL);
/*!40000 ALTER TABLE `entityemail` ENABLE KEYS */;


-- 導出  表 sample_db.entityemployee 結構
CREATE TABLE IF NOT EXISTS `entityemployee` (
  `individualid` int(11) NOT NULL,
  `organizationid` int(11) NOT NULL,
  KEY `FK_entityemployee_entities` (`individualid`),
  KEY `FK_entityemployee_entities_2` (`organizationid`),
  CONSTRAINT `FK_entityemployee_entities` FOREIGN KEY (`individualid`) REFERENCES `entities` (`entityid`),
  CONSTRAINT `FK_entityemployee_entities_2` FOREIGN KEY (`organizationid`) REFERENCES `entities` (`entityid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- 正在導出表  sample_db.entityemployee 的資料：~0 rows (大約)
/*!40000 ALTER TABLE `entityemployee` DISABLE KEYS */;
INSERT INTO `entityemployee` (`individualid`, `organizationid`) VALUES
	(3, 1),
	(2, 1);
/*!40000 ALTER TABLE `entityemployee` ENABLE KEYS */;


-- 導出  表 sample_db.entityphone 結構
CREATE TABLE IF NOT EXISTS `entityphone` (
  `phoneid` int(11) NOT NULL AUTO_INCREMENT,
  `entityid` int(11) NOT NULL,
  `snumber` varchar(20) DEFAULT NULL,
  `sextension` varchar(20) DEFAULT NULL,
  `stype` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`phoneid`),
  KEY `FK_entityphone_entities` (`entityid`),
  CONSTRAINT `FK_entityphone_entities` FOREIGN KEY (`entityid`) REFERENCES `entities` (`entityid`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- 正在導出表  sample_db.entityphone 的資料：~2 rows (大約)
/*!40000 ALTER TABLE `entityphone` DISABLE KEYS */;
INSERT INTO `entityphone` (`phoneid`, `entityid`, `snumber`, `sextension`, `stype`) VALUES
	(1, 1, '(314)159-2653', NULL, NULL),
	(2, 2, '(271)828-1828', '459', NULL);
/*!40000 ALTER TABLE `entityphone` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;


CREATE USER 'phpuser'@'localhost' IDENTIFIED BY 'phppass';
GRANT ALL ON sample_db.* TO 'phpuser'@'localhost';
ALTER USER 'phpuser'@'localhost' IDENTIFIED WITH mysql_native_password BY 'phppass';