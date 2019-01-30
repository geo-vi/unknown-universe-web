/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;

-- Dumping database structure for do_system
CREATE DATABASE IF NOT EXISTS `do_system`;
USE `do_system`;

-- Dumping structure for table do_system.server_crons
CREATE TABLE IF NOT EXISTS `server_crons` (
  `ID` int(11) NOT NULL,
  `NAME` varchar(255) NOT NULL,
  `REPEAT` tinyint(1) NOT NULL,
  `TIME` datetime NOT NULL,
  `INTERVAL` int(11) NOT NULL,
  `EXECUTE` text NOT NULL,
  `ACTIVE` tinyint(1) NOT NULL,
  PRIMARY KEY (`ID`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- Dumping structure for table do_system.server_infos
CREATE TABLE IF NOT EXISTS `server_infos` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `REGION` varchar(255) NOT NULL,
  `SHORTCUT` varchar(255) NOT NULL,
  `NAME` varchar(255) NOT NULL,
  `SERVER_IP` varchar(255) NOT NULL,
  `DB_NAME` varchar(255) NOT NULL,
  `OPEN` tinyint(1) NOT NULL,
  `XMAS` tinyint(1) NOT NULL,
  `ONLINE_PLAYERS` int(11) NOT NULL,
  PRIMARY KEY (`ID`) USING BTREE,
  UNIQUE KEY `SHORTCUT` (`SHORTCUT`,`NAME`,`DB_NAME`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- Dumping data for table do_system.server_infos: ~2 rows (approximately)
/*!40000 ALTER TABLE `server_infos` DISABLE KEYS */;
REPLACE INTO `server_infos` (`ID`, `REGION`, `SHORTCUT`, `NAME`, `SERVER_IP`, `DB_NAME`, `OPEN`, `XMAS`, `ONLINE_PLAYERS`) VALUES
	(1, "Europe", "GE1", "Global Europe 1", "127.0.0.1", "do_server_ge1", 1, 0, 0);
/*!40000 ALTER TABLE `server_infos` ENABLE KEYS */;

-- Dumping structure for table do_system.server_invitations
CREATE TABLE IF NOT EXISTS `server_invitations` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `CODE` varchar(255) NOT NULL,
  `USED` tinyint(1) NOT NULL,
  PRIMARY KEY (`ID`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- Dumping structure for table do_system.server_languages
CREATE TABLE IF NOT EXISTS `server_languages` (
  `ID` int(11) NOT NULL,
  `NAME` varchar(255) NOT NULL,
  `LOOT_ID` varchar(255) NOT NULL,
  `SHORTCODE` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- Dumping data for table do_system.server_languages: ~0 rows (approximately)
/*!40000 ALTER TABLE `server_languages` DISABLE KEYS */;
REPLACE INTO `server_languages` (`ID`, `NAME`, `LOOT_ID`, `SHORTCODE`) VALUES
	(1, "English", "translations_en", "en");
/*!40000 ALTER TABLE `server_languages` ENABLE KEYS */;

-- Dumping structure for table do_system.server_verfiy
CREATE TABLE IF NOT EXISTS `server_verfiy` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `USER_ID` int(11) NOT NULL,
  `ACTIVATION_CODE` varchar(255) NOT NULL,
  `SEND_TO` varchar(255) NOT NULL,
  `SEND_DATE` datetime NOT NULL,
  `TIMEOUT` datetime NOT NULL,
  PRIMARY KEY (`ID`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- Dumping structure for table do_system.server_recovery
CREATE TABLE IF NOT EXISTS `server_recovery` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `USER_ID` int(11) NOT NULL,
  `ACTIVATION_CODE` varchar(255) NOT NULL,
  `SEND_TO` varchar(255) NOT NULL,
  `SEND_DATE` datetime NOT NULL,
  `TIMEOUT` datetime NOT NULL,
  PRIMARY KEY (`ID`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- Dumping structure for table do_system.users
CREATE TABLE IF NOT EXISTS `users` (
  `USER_ID` int(11) NOT NULL AUTO_INCREMENT,
  `USERNAME` varchar(255) NOT NULL,
  `EMAIL` varchar(255) NOT NULL,
  `SESSION_ID` varchar(255) NOT NULL,
  `PW_HASH` varchar(255) NOT NULL,
  `LAST_SERVER` tinytext NOT NULL,
  `IP` text NOT NULL,
  `VERFIED` tinyint(1) NOT NULL,
  `ONLINE` tinyint(1) NOT NULL DEFAULT "0",
  `WAS_TESTER` smallint(6) NOT NULL,
  `BANNED` datetime NOT NULL,
  `FIRST_NAME` varchar(255) NOT NULL,
  `LAST_NAME` varchar(255) NOT NULL,
  `COUNTRY_NAME` varchar(255) NOT NULL,
  `GENDER` int(11) NOT NULL,
  `BIRTHDATE` datetime DEFAULT NULL,
  `LANGUAGE` int(11) NOT NULL,
  `DISCORD_ID` int(11) NOT NULL,
  PRIMARY KEY (`USER_ID`,`EMAIL`,`USERNAME`) USING BTREE,
  UNIQUE KEY `USERNAME` (`USERNAME`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
