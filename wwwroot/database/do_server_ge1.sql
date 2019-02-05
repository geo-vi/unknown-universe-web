/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;

-- Dumping database structure for do_server_ge1
CREATE DATABASE IF NOT EXISTS `do_server_ge1`;
USE `do_server_ge1`;

-- Dumping structure for table do_server_ge1.admin_panel_ships
CREATE TABLE IF NOT EXISTS `admin_panel_ships` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ship_id` int(11) NOT NULL,
  `ship_type` int(11) NOT NULL,
  PRIMARY KEY (`ID`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=91 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- Dumping data for table do_server_ge1.admin_panel_ships: ~90 rows (approximately)
REPLACE INTO `admin_panel_ships` (`ID`, `ship_id`, `ship_type`) VALUES
	(1, 1, 1),
	(2, 2, 1),
	(3, 3, 1),
	(4, 4, 1),
	(5, 5, 1),
	(6, 6, 1),
	(7, 7, 1),
	(8, 8, 1),
	(9, 9, 1),
	(10, 10, 1),
	(11, 49, 1),
	(12, 69, 1),
	(13, 70, 1),
	(14, 98, 1),
	(15, 23, 2),
	(16, 24, 2),
	(17, 25, 2),
	(18, 26, 2),
	(19, 27, 2),
	(20, 28, 2),
	(21, 29, 2),
	(22, 31, 2),
	(23, 32, 2),
	(24, 33, 2),
	(25, 34, 2),
	(26, 35, 2),
	(27, 42, 2),
	(28, 45, 2),
	(29, 46, 2),
	(30, 48, 2),
	(31, 71, 2),
	(32, 72, 2),
	(33, 73, 2),
	(34, 74, 2),
	(35, 75, 2),
	(36, 76, 2),
	(37, 77, 2),
	(38, 78, 2),
	(39, 79, 2),
	(40, 80, 2),
	(41, 81, 2),
	(42, 82, 2),
	(43, 83, 2),
	(44, 84, 2),
	(45, 85, 2),
	(46, 89, 2),
	(47, 90, 2),
	(48, 91, 2),
	(49, 92, 2),
	(50, 93, 2),
	(51, 94, 2),
	(52, 95, 2),
	(53, 96, 2),
	(54, 97, 2),
	(55, 99, 2),
	(56, 100, 2),
	(57, 101, 2),
	(58, 102, 2),
	(59, 103, 2),
	(60, 104, 2),
	(61, 105, 2),
	(62, 106, 2),
	(63, 107, 2),
	(64, 108, 2),
	(65, 111, 2),
	(66, 112, 2),
	(67, 113, 2),
	(68, 114, 2),
	(69, 115, 2),
	(70, 116, 2),
	(71, 117, 2),
	(72, 118, 2),
	(73, 119, 2),
	(74, 120, 2),
	(75, 121, 2),
	(76, 122, 2),
	(77, 123, 2),
	(78, 124, 2),
	(79, 125, 2),
	(80, 442, 2),
	(81, 443, 2),
	(82, 444, 2),
	(83, 11, 2),
	(84, 20, 2),
	(85, 21, 2),
	(86, 12, 3),
	(87, 13, 3),
	(88, 14, 3),
	(89, 15, 3),
	(90, 22, 3);

-- Dumping structure for table do_server_ge1.player_ammo
CREATE TABLE IF NOT EXISTS `player_ammo` (
  `USER_ID` int(11) NOT NULL,
  `PLAYER_ID` int(11) NOT NULL,
  `LCB_10` int(11) NOT NULL,
  `MCB_25` int(11) NOT NULL,
  `MCB_50` int(11) NOT NULL,
  `SAB_50` int(11) NOT NULL,
  `UCB_100` int(11) NOT NULL,
  `RSB_75` int(11) NOT NULL,
  `JOB_100` int(11) NOT NULL,
  `CBO_100` int(11) NOT NULL,
  `RB_214` int(11) NOT NULL,
  `DCR_250` int(11) NOT NULL,
  `PLD_8` int(11) NOT NULL,
  `HSTRM_01` int(11) NOT NULL,
  `UBR_100` int(11) NOT NULL,
  `SAR_01` int(11) NOT NULL,
  `SAR_02` int(11) NOT NULL,
  `PLT_2021` int(11) NOT NULL,
  `PLT_2026` int(11) NOT NULL,
  `PLT_3030` int(11) NOT NULL,
  `R_310` int(11) NOT NULL,
  `ECO_10` int(11) NOT NULL,
  `BDR_1211` int(11) NOT NULL,
  `WIZ_X` int(11) NOT NULL,
  `CBR` int(11) NOT NULL,
  `ACM_01` int(11) NOT NULL,
  `SL_M01` int(11) NOT NULL,
  `DD_M01` int(11) NOT NULL,
  `SAB_M01` int(11) NOT NULL,
  `EMP_01` int(11) NOT NULL,
  `EMP_M01` int(11) NOT NULL,
  PRIMARY KEY (`USER_ID`,`PLAYER_ID`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- Dumping structure for table do_server_ge1.player_boosters
CREATE TABLE IF NOT EXISTS `player_boosters` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `PLAYER_ID` int(11) NOT NULL,
  `BOOSTER_ID` int(11) NOT NULL,
  `END_TIME` datetime NOT NULL,
  PRIMARY KEY (`ID`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- Dumping structure for table do_server_ge1.player_data
CREATE TABLE IF NOT EXISTS `player_data` (
  `USER_ID` int(11) NOT NULL DEFAULT 0,
  `PLAYER_ID` int(11) NOT NULL AUTO_INCREMENT,
  `SESSION_ID` varchar(255) NOT NULL,
  `PLAYER_NAME` varchar(255) NOT NULL,
  `FACTION_ID` int(11) NOT NULL,
  `TITLE_ID` int(11) NOT NULL,
  `LVL` int(30) NOT NULL DEFAULT 1,
  `EXP` bigint(11) NOT NULL,
  `HONOR` bigint(11) NOT NULL,
  `RANK_POINTS` float NOT NULL,
  `RANK` int(99) NOT NULL DEFAULT 1,
  `URIDIUM` bigint(11) NOT NULL,
  `CREDITS` bigint(11) NOT NULL,
  `PREMIUM` tinyint(1) NOT NULL,
  `PREMIUM_UNTIL` datetime NOT NULL,
  `GG_RINGS` int(11) NOT NULL,
  `JACKPOT` float NOT NULL,
  `CLAN_ID` int(11) NOT NULL,
  `REGISTERED` datetime NOT NULL,
  `RANKING` int(11) NOT NULL,
  `LAST_MODIFIED` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`PLAYER_ID`,`USER_ID`,`SESSION_ID`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=1003 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- Dumping structure for table do_server_ge1.player_deaths
CREATE TABLE IF NOT EXISTS `player_deaths` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `PLAYER_ID` int(11) NOT NULL,
  `KILLER_NAME` varchar(255) NOT NULL,
  `KILLER_LINK` text NOT NULL,
  `DEATH_TYPE` int(11) NOT NULL,
  `ALIAS` varchar(255) NOT NULL,
  `TIME_OF_DEATH` datetime NOT NULL,
  PRIMARY KEY (`ID`,`PLAYER_ID`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- Dumping structure for table do_server_ge1.player_drones
CREATE TABLE IF NOT EXISTS `player_drones` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `USER_ID` int(11) NOT NULL,
  `PLAYER_ID` int(11) NOT NULL,
  `ITEM_ID` int(11) NOT NULL,
  `DRONE_TYPE` int(11) NOT NULL,
  `DAMAGE` varchar(255) NOT NULL COMMENT '(NOT ATTACK DAMAGE)',
  `LEVEL` int(11) NOT NULL DEFAULT 1,
  `EXPERIENCE` int(11) NOT NULL,
  `UPGRADE_LVL` int(11) NOT NULL,
  `DESIGN_1` int(11) NOT NULL DEFAULT 0,
  `DESIGN_2` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`ID`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- Dumping structure for table do_server_ge1.player_equipment
CREATE TABLE IF NOT EXISTS `player_equipment` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `USER_ID` int(11) NOT NULL,
  `PLAYER_ID` int(11) NOT NULL,
  `ITEM_ID` int(11) NOT NULL,
  `ITEM_TYPE` tinyint(4) NOT NULL,
  `ITEM_LVL` tinyint(4) NOT NULL DEFAULT 1,
  `ON_CONFIG_1` varchar(255) NOT NULL DEFAULT "{ 'hangars' : [] }",
  `ON_CONFIG_2` varchar(255) NOT NULL DEFAULT "{ 'hangars' : [] }",
  `ON_DRONE_ID_1` varchar(255) NOT NULL DEFAULT "{ 'hangars' : [], 'droneID':[] }",
  `ON_DRONE_ID_2` varchar(255) NOT NULL DEFAULT "{ 'hangars' : [], 'droneID':[] }",
  `ON_PET_1` varchar(255) NOT NULL DEFAULT "{ 'hangars' : [] }",
  `ON_PET_2` varchar(255) NOT NULL DEFAULT "{ 'hangars' : [] }",
  `ITEM_AMOUNT` int(11) DEFAULT 0,
  PRIMARY KEY (`ID`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=125 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- Dumping structure for table do_server_ge1.player_event_info
CREATE TABLE IF NOT EXISTS `player_event_info` (
  `PLAYER_ID` int(11) NOT NULL,
  `EVENT_ID` int(11) NOT NULL,
  `SCORE` int(11) NOT NULL,
  `DATA` text NOT NULL,
  PRIMARY KEY (`PLAYER_ID`,`EVENT_ID`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- Dumping structure for table do_server_ge1.player_extra_data
CREATE TABLE IF NOT EXISTS `player_extra_data` (
  `USER_ID` int(11) NOT NULL,
  `PLAYER_ID` int(11) NOT NULL,
  `LOGFILES` int(11) NOT NULL DEFAULT 15,
  `RESEARCH_POINTS` int(11) NOT NULL,
  `RESEARCH_LEVEL` int(11) NOT NULL,
  `BOOTY_KEYS` varchar(255) NOT NULL,
  `DRONE_FORMATIONS` varchar(255) NOT NULL,
  `SHIP_DESIGNS` varchar(255) NOT NULL,
  `SETTINGS_GAMEPLAY_OLD` text NOT NULL,
  `SETTINGS_GAMEPLAY_NEW` text NOT NULL,
  `SETTINGS_SLOTBAR_OLD` text NOT NULL,
  `SETTINGS_SLOTBAR_NEW` text NOT NULL,
  `STATS` text NOT NULL,
  `CARGO` text NOT NULL,
  `SKYLAB` text NOT NULL,
  `GATES` text NOT NULL,
  `CLIENT_VERSION` tinyint(1) NOT NULL,
  `ASSETS_VERSION` tinyint(1) NOT NULL,
  PRIMARY KEY (`USER_ID`,`PLAYER_ID`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- Dumping structure for table do_server_ge1.player_hangar
CREATE TABLE IF NOT EXISTS `player_hangar` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `USER_ID` int(11) NOT NULL DEFAULT 0,
  `PLAYER_ID` int(11) NOT NULL,
  `HANGAR_COUNT` smallint(6) NOT NULL DEFAULT 0,
  `ACTIVE` tinyint(1) NOT NULL,
  `SHIP_ID` int(11) NOT NULL,
  `SHIP_DESIGN` int(11) NOT NULL,
  `SHIP_HP` int(11) NOT NULL,
  `SHIP_NANO` int(11) NOT NULL,
  `SHIP_MAP_ID` int(11) NOT NULL DEFAULT 255,
  `SHIP_X` int(11) NOT NULL,
  `SHIP_Y` int(11) NOT NULL,
  `IN_EQUIPMENT_ZONE` tinyint(1) NOT NULL DEFAULT 1,
  `PET_ID` INT(11) NOT NULL,
  PRIMARY KEY (`ID`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- Dumping structure for table do_server_ge1.player_logs
CREATE TABLE IF NOT EXISTS `player_logs` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `USER_ID` int(11) NOT NULL,
  `PLAYER_ID` int(11) NOT NULL,
  `LOG_TYPE` varchar(255) NOT NULL,
  `LOG_DESCRIPTION` varchar(255) NOT NULL,
  `LOG_DATE` datetime NOT NULL,
  PRIMARY KEY (`ID`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- Dumping structure for table do_server_ge1.player_messages
CREATE TABLE IF NOT EXISTS `player_messages` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `USER_ID` int(11) NOT NULL,
  `SENDER` text NOT NULL,
  `DATE` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `NEW` tinyint(1) NOT NULL,
  `HEADER` text NOT NULL,
  `MESSAGE` text NOT NULL,
  `TYPE` int(11) NOT NULL,
  PRIMARY KEY (`ID`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- Dumping structure for table do_server_ge1.player_outbox
CREATE TABLE IF NOT EXISTS `player_outbox` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `USER_ID` int(11) NOT NULL,
  `RECIPIENT` text NOT NULL,
  `DATE` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `HEADER` text NOT NULL,
  `MESSAGE` text NOT NULL,
  `TYPE` int(11) NOT NULL,
  PRIMARY KEY (`ID`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- Dumping structure for table do_server_ge1.player_modules
CREATE TABLE IF NOT EXISTS `player_modules` (
  `ID` int(11) NOT NULL,
  `PLAYER_ID` int(11) NOT NULL,
  `TYPE` int(11) NOT NULL,
  `EQUIPPED` int(11) NOT NULL,
  `CBS_ID` int(11) NOT NULL,
  `POSITION` int(11) NOT NULL,
  `HP` int(11) NOT NULL,
  `SHIELD` int(11) NOT NULL,
  `UPGRADE_LVL` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping structure for table do_server_ge1.player_pet
CREATE TABLE IF NOT EXISTS `player_pet` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `USER_ID` int(11) NOT NULL,
  `PLAYER_ID` int(11) NOT NULL,
  `PET_TYPE` int(11) NOT NULL,
  `ITEM_ID` int(11) NOT NULL,
  `NAME` text NOT NULL,
  `LEVEL` int(11) NOT NULL DEFAULT 1,
  `EXPERIENCE` int(11) NOT NULL,
  `HP` int(11) NOT NULL,
  `FUEL` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`ID`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- Dumping structure for table do_server_ge1.player_pet_config
CREATE TABLE IF NOT EXISTS `player_pet_config` (
  `USER_ID` int(11) NOT NULL DEFAULT 0,
  `PLAYER_ID` int(11) DEFAULT NULL,
  `CONFIG_1_DMG_PET` int(11) NOT NULL DEFAULT 0,
  `CONFIG_2_DMG_PET` int(11) NOT NULL DEFAULT 0,
  `CONFIG_1_SHIELD_PET` int(11) NOT NULL DEFAULT 0,
  `CONFIG_2_SHIELD_PET` int(11) NOT NULL DEFAULT 0,
  `CONFIG_1_GEARS` text NOT NULL,
  `CONFIG_2_GEARS` text NOT NULL,
  `CONFIG_1_PROTOCOLS` text NOT NULL,
  `CONFIG_2_PROTOCOLS` text NOT NULL,
  PRIMARY KEY (`USER_ID`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- Dumping structure for table do_server_ge1.player_profile
CREATE TABLE IF NOT EXISTS `player_profile` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `USER_ID` int(11) NOT NULL,
  `PLAYER_ID` int(11) NOT NULL,
  `AVATAR` varchar(255) NOT NULL,
  `ONLINE` tinyint(1) NOT NULL,
  PRIMARY KEY (`ID`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- Dumping structure for table do_server_ge1.player_quests
CREATE TABLE IF NOT EXISTS `player_quests` (
  `PLAYER_ID` int(11) NOT NULL,
  `QUEST_ID` int(11) NOT NULL,
  `CONDITION_ID` int(11) NOT NULL,
  `STATE` text NOT NULL,
  PRIMARY KEY (`PLAYER_ID`,`QUEST_ID`,`CONDITION_ID`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- Dumping structure for table do_server_ge1.player_ship_config
CREATE TABLE IF NOT EXISTS `player_ship_config` (
  `USER_ID` int(11) NOT NULL DEFAULT 0,
  `PLAYER_ID` int(11) NOT NULL,
  `HANGAR_ID` int(11) NOT NULL,
  `CONFIG_1_DMG` int(11) NOT NULL,
  `CONFIG_2_DMG` int(11) NOT NULL,
  `CONFIG_1_SHIELD` int(11) NOT NULL,
  `CONFIG_2_SHIELD` int(11) NOT NULL,
  `CONFIG_1_SHIELD_LEFT` int(11) NOT NULL,
  `CONFIG_2_SHIELD_LEFT` int(11) NOT NULL,
  `CONFIG_1_SPEED` int(11) NOT NULL,
  `CONFIG_2_SPEED` int(11) NOT NULL,
  `CONFIG_1_EXTRAS` text NOT NULL,
  `CONFIG_2_EXTRAS` text NOT NULL,
  `CONFIG_1_HEAVY` text NOT NULL,
  `CONFIG_2_HEAVY` text NOT NULL,
  `CONFIG_1_SHIELDABSORB` double(10,0) NOT NULL,
  `CONFIG_2_SHIELDABSORB` double(10,0) NOT NULL,
  `CONFIG_1_LASERCOUNT` int(11) NOT NULL,
  `CONFIG_2_LASERCOUNT` int(11) NOT NULL,
  `CONFIG_1_LASER_TYPES` tinyint(1) NOT NULL COMMENT '0-Mixed, 1-all lasers equipped on ship (not drones / pet) are LF1, 2-all lasers.. LF2, 3-all... LF3, 4-all.. LF4',
  `CONFIG_2_LASER_TYPES` tinyint(1) NOT NULL COMMENT '0-Mixed, 1-all lasers equipped on ship (not drones / pet) are LF1, 2-all lasers.. LF2, 3-all... LF3, 4-all.. LF4',
  PRIMARY KEY (`USER_ID`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- Dumping structure for table do_server_ge1.player_skills_max
CREATE TABLE IF NOT EXISTS `player_skills_max` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `SKILL_NAME` text NOT NULL,
  `MAX_POINT` int(11) NOT NULL,
  PRIMARY KEY (`ID`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- Dumping data for table do_server_ge1.player_skills_max
REPLACE INTO `player_skills_max` (`ID`, `SKILL_NAME`, `MAX_POINT`) VALUES
	(1, 'SHIP_HULL', 2),
	(2, 'SHIP_HULL_2', 3),
	(3, 'ENGINEERING', 5),
	(4, 'SHIELD_ENGINEERING', 5),
	(5, 'EVASIVE_MANEUVERS', 2),
	(6, 'EVASIVE_MANEUVERS_2', 3),
	(7, 'SHIELD_MECHANICS', 5),
	(8, 'TACTICS', 5),
	(9, 'LOGISTICS', 5),
	(10, 'LUCK', 2),
	(11, 'LUCK_2', 3),
	(12, 'CRUELTY', 2),
	(13, 'CRUELTY_2', 3),
	(14, 'TRACTOR_BEAM', 5),
	(15, 'TRACTOR_BEAM_2', 5),
	(16, 'GREED', 5),
	(17, 'DETONATION', 2),
	(18, 'DETONATION_2', 3),
	(19, 'EXPLOSIVES', 5),
	(20, 'HEAT_SEEKING_MISSLES', 5),
	(21, 'BOUNTY_HUNTER', 2),
	(22, 'BOUNTY_HUNTER_2', 3),
	(23, 'ROCKET_FUSION', 5),
	(24, 'ALIEN_HUNTER', 5),
	(25, 'ELECTRO_OPTICS', 5);

-- Dumping structure for table do_server_ge1.player_skill_tree
CREATE TABLE IF NOT EXISTS `player_skill_tree` (
  `USER_ID` int(11) NOT NULL,
  `PLAYER_ID` int(11) NOT NULL,
  `SHIP_HULL` tinyint(1) NOT NULL,
  `SHIP_HULL_2` int(11) NOT NULL,
  `ENGINEERING` tinyint(1) NOT NULL,
  `SHIELD_ENGINEERING` tinyint(1) NOT NULL,
  `EVASIVE_MANEUVERS` tinyint(1) NOT NULL,
  `EVASIVE_MANEUVERS_2` int(11) NOT NULL,
  `SHIELD_MECHANICS` tinyint(1) NOT NULL,
  `TACTICS` tinyint(1) NOT NULL,
  `LOGISTICS` tinyint(1) NOT NULL,
  `LUCK` tinyint(1) NOT NULL,
  `LUCK_2` int(11) NOT NULL,
  `CRUELTY` tinyint(1) NOT NULL,
  `CRUELTY_2` int(11) NOT NULL,
  `TRACTOR_BEAM` tinyint(1) NOT NULL,
  `TRACTOR_BEAM_2` int(11) NOT NULL,
  `GREED` tinyint(1) NOT NULL,
  `DETONATION` tinyint(1) NOT NULL,
  `DETONATION_2` int(11) NOT NULL,
  `EXPLOSIVES` tinyint(1) NOT NULL,
  `HEAT_SEEKING_MISSLES` tinyint(1) NOT NULL,
  `BOUNTY_HUNTER` tinyint(1) NOT NULL,
  `BOUNTY_HUNTER_2` int(11) NOT NULL,
  `ROCKET_FUSION` tinyint(1) NOT NULL,
  `ALIEN_HUNTER` tinyint(1) NOT NULL,
  `ELECTRO_OPTICS` tinyint(1) NOT NULL,
  PRIMARY KEY (`USER_ID`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- Dumping structure for table do_server_ge1.player_skylab
CREATE TABLE IF NOT EXISTS `player_skylab` (
  `USER_ID` int(11) NOT NULL,
  `PLAYER_ID` int(11) NOT NULL,
  `COLLECTORS` text NOT NULL,
  `ORES` text NOT NULL,
  `TRANSFER_IN_PROGRESS` tinyint(1) NOT NULL,
  `TRANSFER_END_TIME` datetime NOT NULL,
  `TRANSFER_CONTENT` text NOT NULL,
  PRIMARY KEY (`USER_ID`,`PLAYER_ID`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- Dumping structure for table do_server_ge1.player_voucher_codes
CREATE TABLE IF NOT EXISTS `player_voucher_codes` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `USER_ID` int(11) NOT NULL,
  `CODE_ID` text NOT NULL,
  `USED` int(11) NOT NULL,
  PRIMARY KEY (`ID`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- Dumping structure for table do_server_ge1.server_announcements
CREATE TABLE IF NOT EXISTS `server_announcements` (
  `ID` int(11) NOT NULL,
  `ANNOUNCEMENT` text NOT NULL,
  PRIMARY KEY (`ID`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- Dumping structure for table do_server_ge1.server_auctions
CREATE TABLE IF NOT EXISTS `server_auctions` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ITEMID` int(11) NOT NULL,
  `ITEMNAME` text NOT NULL,
  `ITEMQ` int(11) NOT NULL,
  `ITEM_DESC` text NOT NULL,
  `TYPE` varchar(255) NOT NULL,
  `AUCTION_TYPE` int(11) NOT NULL COMMENT '(1 = hourly, 2 = daily , 3= weekly)',
  `MAX_BID` bigint(20) NOT NULL,
  `BID_USER_ID` int(11) NOT NULL,
  PRIMARY KEY (`ID`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- Dumping structure for table do_server_ge1.server_auctions_settings
CREATE TABLE IF NOT EXISTS `server_auctions_settings` (
  `ID` int(11) NOT NULL,
  `LAST_HOURLY` text NOT NULL,
  `LAST_DAILY` text NOT NULL,
  `LAST_WEEKLY` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- Dumping data for table do_server_ge1.server_auctions_settings: ~0 rows (approximately)
REPLACE INTO `server_auctions_settings` (`ID`, `LAST_HOURLY`, `LAST_DAILY`, `LAST_WEEKLY`) VALUES
	(1, '2017-10-04 18:00:00.000000', '2017-09-30 00:00:00', '2017-09-29 16:00:00');

-- Dumping structure for table do_server_ge1.server_beta_info
CREATE TABLE IF NOT EXISTS `server_beta_info` (
  `PUBLIC_END` datetime NOT NULL,
  `WHITELISTED_PLAYERS` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- Dumping data for table do_server_ge1.server_beta_info: ~0 rows (approximately)
REPLACE INTO `server_beta_info` (`PUBLIC_END`, `WHITELISTED_PLAYERS`) VALUES
	('2017-01-23 23:00:00', '[544,495,498]');

-- Dumping structure for table do_server_ge1.server_calendar
CREATE TABLE IF NOT EXISTS `server_calendar` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Month` varchar(255) NOT NULL,
  `Reward` text NOT NULL,
  PRIMARY KEY (`ID`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- Dumping data for table do_server_ge1.server_calendar: ~0 rows (approximately)
REPLACE INTO `server_calendar` (`ID`, `Month`, `Reward`) VALUES
	(1, 1, "[{'Day':1,'ItemID':'33','Q':'1','Type':'booster'},\r\n{'Day':2,'ItemID':'28','Q':'10000','Type':'ammo'},\r\n{'Day':3,'ItemID':'53','Q':'25','Type':'extra'},\r\n{'Day':4,'ItemID':'54','Q':'10','Type':'extra'},\r\n{'Day':5,'ItemID':'74','Q':'1','Type':'equipment'},\r\n{'Day':6,'ItemID':'92','Q':'250','Type':'ammo'},\r\n{'Day':7,'ItemID':'93','Q':'1000','Type':'ammo'},\r\n{'Day':8,'ItemID':'97','Q':'1000','Type':'fuel'},\r\n{'Day':9,'ItemID':'36','Q':'1','Type':'booster'},\r\n{'Day':10,'ItemID':'29','Q':'5000','Type':'ammo'},\r\n{'Day':11,'ItemID':'21','Q':'2','Type':'equipment'},\r\n{'Day':12,'ItemID':'9','Q':'2','Type':'equipment'},\r\n{'Day':13,'ItemID':'1','Q':'2','Type':'equipment'},\r\n{'Day':14,'ItemID':'27','Q':'800','Type':'ammo'},\r\n{'Day':15,'ItemID':'37','Q':'1','Type':'booster'},\r\n{'Day':16,'ItemID':'54','Q':'12','Type':'extra'},\r\n{'Day':17,'ItemID':'30','Q':'7500','Type':'ammo'},\r\n{'Day':18,'ItemID':'2','Q':'1','Type':'equipment'},\r\n{'Day':19,'ItemID':'90','Q':'500','Type':'ammo'},\r\n{'Day':20,'ItemID':'97','Q':'2500','Type':'fuel'},\r\n{'Day':21,'ItemID':'34','Q':'1','Type':'booster'},\r\n{'Day':22,'ItemID':'39','Q':'1','Type':'booster'},\r\n{'Day':23,'ItemID':'26','Q':'1','Type':'equipment'},\r\n{'Day':24,'ItemID':'31','Q':'10000','Type':'ammo'},\r\n{'Day':25,'ItemID':'29','Q':'5000','Type':'ammo'},\r\n{'Day':26,'ItemID':'53','Q':'25','Type':'extra'},\r\n{'Day':27,'ItemID':'58','Q':'1','Type':'equipment'},\r\n{'Day':28,'ItemID':'37','Q':'1','Type':'booster'},\r\n{'Day':29,'ItemID':'73','Q':'1','Type':'equipment'},\r\n{'Day':30,'ItemID':'92','Q':'200','Type':'ammo'}]\r\n\r\n");

-- Dumping structure for table do_server_ge1.server_chat_bans
CREATE TABLE IF NOT EXISTS `server_chat_bans` (
  `ID` int(11) NOT NULL,
  `PLAYER_ID` int(11) NOT NULL,
  `ISSUED_TIME` datetime NOT NULL,
  `REASON` text NOT NULL,
  `EXPIRE_TIME` datetime NOT NULL,
  `ISSUED_BY` int(11) NOT NULL,
  PRIMARY KEY (`ID`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- Dumping structure for table do_server_ge1.server_chat_login
CREATE TABLE IF NOT EXISTS `server_chat_login` (
  `USER_LOGIN_MSG` text NOT NULL,
  `MODERATOR_LOGIN_MSG` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- Dumping data for table do_server_ge1.server_chat_login: ~0 rows (approximately)
REPLACE INTO `server_chat_login` (`USER_LOGIN_MSG`, `MODERATOR_LOGIN_MSG`) VALUES
	('Welcome', 'Welcome');

-- Dumping structure for table do_server_ge1.server_chat_logs
CREATE TABLE IF NOT EXISTS `server_chat_logs` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `PLAYER_ID` int(11) NOT NULL,
  `ROOM_ID` int(11) NOT NULL,
  `LOG` text NOT NULL,
  `LOG_TYPE` int(2) NOT NULL,
  `LOG_DATE` datetime NOT NULL,
  PRIMARY KEY (`ID`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=311 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- Dumping structure for table do_server_ge1.server_chat_moderators
CREATE TABLE IF NOT EXISTS `server_chat_moderators` (
  `USER_ID` int(11) NOT NULL,
  `PLAYER_ID` int(11) NOT NULL,
  `NAME` varchar(255) NOT NULL,
  `LEVEL` tinyint(1) NOT NULL,
  PRIMARY KEY (`USER_ID`,`PLAYER_ID`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- Dumping structure for table do_server_ge1.server_chat_rooms
CREATE TABLE IF NOT EXISTS `server_chat_rooms` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ROOM_NAME_ID` int(11) NOT NULL,
  `INSTANCE_ID` int(11) NOT NULL,
  `LANGUAGE_ID` int(11) NOT NULL,
  `FACTION_ID` int(11) NOT NULL,
  `TAB_ORDER` int(11) NOT NULL,
  `ROOM_TYPE` int(11) NOT NULL,
  `NEWCOMER_ROOM` tinyint(1) NOT NULL,
  `MULTILANGUAGE_ROOM` tinyint(1) NOT NULL,
  `SECTOR_ID` int(11) NOT NULL,
  `PARENT_ID` int(11) NOT NULL,
  `MAX_USER_PER_CHILD` int(11) NOT NULL,
  `MAX_AVG_ROOM_USER` int(11) NOT NULL,
  PRIMARY KEY (`ID`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- Dumping structure for table do_server_ge1.server_clanbattlestations
CREATE TABLE IF NOT EXISTS `server_clanbattlestations` (
  `ID` int(11) NOT NULL,
  `NAME` varchar(255) NOT NULL,
  `FACTION` tinyint(1) NOT NULL,
  `TYPE` tinyint(1) NOT NULL COMMENT 'Asteroid: 0 / Clan BattleStation: 1',
  `MAP_ID` int(11) NOT NULL,
  `CLAN_ID` int(11) NOT NULL,
  `POSITION` text NOT NULL,
  `HEALTH` int(11) NOT NULL,
  `SHIELD` int(11) NOT NULL,
  `MODULES` text NOT NULL,
  `BUILD_START` datetime NOT NULL,
  `BUILD_END` datetime NOT NULL,
  `DEFLECTOR_END` datetime NOT NULL,
  PRIMARY KEY (`ID`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- Dumping structure for table do_server_ge1.server_clans
CREATE TABLE IF NOT EXISTS `server_clans` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `NAME` varchar(50) NOT NULL,
  `TAG` varchar(4) NOT NULL,
  `DESCRIPTION` varchar(1000) NOT NULL,
  `MEMBERS` longtext NOT NULL,
  `LEADER` int(11) NOT NULL,
  `FACTION` int(1) NOT NULL,
  `IS_ACCEPTING` int(11) NOT NULL DEFAULT 0,
  `CREATED` date NOT NULL,
  `PICTURE` text,
  `RANK` int(11) NOT NULL,
  `NEWS` text NOT NULL,
  `CREDITS` int(11) NOT NULL,
  `RATE` int(11) NOT NULL,
  PRIMARY KEY (`ID`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- Dumping structure for table do_server_ge1.server_clans_applications
CREATE TABLE IF NOT EXISTS `server_clans_applications` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `APPLY_PLAYER_ID` int(11) NOT NULL,
  `CLAN_ID` int(11) NOT NULL,
  `APPLY_DATE` date NOT NULL,
  PRIMARY KEY (`ID`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- Dumping structure for table do_server_ge1.server_clans_diplomacy
CREATE TABLE IF NOT EXISTS `server_clans_diplomacy` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `CLAN_ID` int(11) NOT NULL,
  `DIPLOMACY` int(11) NOT NULL,
  `TARGET_CLAN_ID` int(11) NOT NULL,
  `TARGET_CLAN_TAG` text NOT NULL,
  `TARGET_CLAN_NAME` text NOT NULL,
  `START_DATE` date NOT NULL,
  `END_DATE` date NOT NULL,
  `REASON` text NOT NULL,
  `REQUEST` int(11) NOT NULL,
  `REQUEST_ID` int(11) NOT NULL,
  PRIMARY KEY (`ID`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- Dumping structure for table do_server_ge1.server_clans_members
CREATE TABLE IF NOT EXISTS `server_clans_members` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `CLAN_ID` int(11) NOT NULL,
  `PLAYER_ID` int(11) NOT NULL,
  `JOIN_DATE` date NOT NULL,
  `ROLE` int(11) NOT NULL,
  PRIMARY KEY (`ID`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- Dumping structure for table do_server_ge1.server_collectables
CREATE TABLE IF NOT EXISTS `server_collectables` (
  `ID` int(11) NOT NULL,
  `TYPE` varchar(255) NOT NULL,
  `REWARDS` text NOT NULL,
  `SPAWN_COUNT` int(11) NOT NULL,
  `PVP_SPAWN_COUNT` int(11) NOT NULL,
  PRIMARY KEY (`ID`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- Dumping data for table do_server_ge1.server_collectables: ~0 rows (approximately)
REPLACE INTO `server_collectables` (`ID`, `TYPE`, `REWARDS`, `SPAWN_COUNT`, `PVP_SPAWN_COUNT`) VALUES
	(2, 'BONUS_BOX', "[{'Item1':'credits','Item2':100000},{'Item1':'credits','Item2':20000},{'Item1':'credits','Item2':50000},{'Item1':'uridium','Item2':100},{'Item1':'uridium','Item2':300},{'Item1':'uridium','Item2':500},{'Item1':'ammunition_laser_lcb-10','Item2':10000},{'Item1':'ammunition_laser_lcb-10','Item2':2000},{'Item1':'ammunition_laser_mcb-25','Item2':3000},{'Item1':'ammunition_laser_mcb-50','Item2':1000},{'Item1':'ammunition_rocket_r-310','Item2':8},{'Item1':'ammunition_rocket_r-310','Item2':16},{'Item1':'ammunition_rocket_plt-2026','Item2':4},{'Item1':'ammunition_rocket_plt-2026','Item2':8},{'Item1':'ammunition_laser_ucb-100','Item2':550},{'Item1':'ammunition_laser_rsb-75','Item2':100}]", 150, 300);

-- Dumping structure for table do_server_ge1.server_config
CREATE TABLE IF NOT EXISTS `server_config` (
  `DEFAULT_SHIP` int(11) NOT NULL,
  `DEFAULT_URI` int(11) NOT NULL,
  `DEFAULT_CREDITS` int(11) NOT NULL,
  `DEFAULT_ITEMS` text NOT NULL COMMENT 'JSON-FORMAT',
  `DEFAULT_AMMO` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 MIN_ROWS=1 MAX_ROWS=1 ROW_FORMAT=COMPACT;

-- Dumping data for table do_server_ge1.server_config: ~0 rows (approximately)
REPLACE INTO `server_config` (`DEFAULT_SHIP`, `DEFAULT_URI`, `DEFAULT_CREDITS`, `DEFAULT_ITEMS`, `DEFAULT_AMMO`) VALUES
	(1, 10000, 50000, "{'items':[{'ID':1,'Q':1,'LVL':1},{'ID':6,'Q':1,'LVL':1},{'ID':21,'Q':1,'LVL':0},{'ID':55,'Q':1,'LVL':0}]}\r\n", "{'ammo':[{'NAME':'LCB_10','Q':10000, 'NAME':'R_310', 'Q':150}]}");

-- Dumping structure for table do_server_ge1.server_events
CREATE TABLE IF NOT EXISTS `server_events` (
  `ID` int(11) NOT NULL,
  `NAME` varchar(255) NOT NULL,
  `DESCRIPTION` text NOT NULL,
  `TYPE` int(11) NOT NULL,
  `ACTIVE` tinyint(1) NOT NULL,
  PRIMARY KEY (`ID`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- Dumping data for table do_server_ge1.server_events: ~3 rows (approximately)
REPLACE INTO `server_events` (`ID`, `NAME`, `DESCRIPTION`, `TYPE`, `ACTIVE`) VALUES
	(0, "Scoremageddon", "Whoever strikes the highest score gets the best rewards", 0, 0),
	(1, "Spaceball", "A ball that is moving around 4-4", 1, 0),
	(2, "Wild Santas", "Wild Santas appearing around the universe", 2, 0);

-- Dumping structure for table do_server_ge1.server_galaxy_gates
CREATE TABLE IF NOT EXISTS `server_galaxy_gates` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `NAME` varchar(225) NOT NULL,
  `PART_CNT` int(11) NOT NULL,
  `REWARDS` text NOT NULL,
  PRIMARY KEY (`ID`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- Dumping data for table do_server_ge1.server_galaxy_gates: ~8 rows (approximately)
REPLACE INTO `server_galaxy_gates` (`ID`, `NAME`, `PART_CNT`, `REWARDS`) VALUES
	(1, 'Alpha', 34, ''),
	(2, 'Beta', 48, ''),
	(3, 'Gamma', 82, ''),
	(4, 'Delta', 128, ''),
	(5, 'Epsilon', 99, ''),
	(6, 'Zeta', 111, ''),
	(7, 'Kappa', 120, ''),
	(8, 'Lambda', 45, '');

-- Dumping structure for table do_server_ge1.server_game_bans
CREATE TABLE IF NOT EXISTS `server_game_bans` (
  `ID` int(11) NOT NULL,
  `PLAYER_ID` int(11) NOT NULL,
  `ISSUED_TIME` datetime NOT NULL,
  `REASON` text NOT NULL,
  `EXPIRE_TIME` datetime NOT NULL,
  `ISSUED_BY` int(11) NOT NULL,
  PRIMARY KEY (`ID`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- Dumping structure for table do_server_ge1.server_items
CREATE TABLE IF NOT EXISTS `server_items` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `NAME` varchar(20) NOT NULL,
  `TYPE` int(11) NOT NULL,
  `LOOT_ID` varchar(255) DEFAULT NULL,
  `CATEGORY` varchar(20) NOT NULL,
  `PRICE_U` float NOT NULL,
  `PRICE_C` float NOT NULL,
  `SELLING_CREDITS` int(11) NOT NULL,
  `DAMAGE` int(11) DEFAULT NULL,
  `SHIELD` int(11) DEFAULT NULL,
  `SHIELD_ABSORBATION` int(11) DEFAULT NULL,
  `SPEED` int(11) DEFAULT NULL,
  `SLOTS` int(11) DEFAULT NULL,
  `EFFECT` varchar(255) DEFAULT NULL,
  `USES` int(11) DEFAULT NULL,
  `DESCRIPTION` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`ID`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=101 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- Dumping data for table do_server_ge1.server_items: ~90 rows (approximately)
REPLACE INTO `server_items` (`ID`, `NAME`, `TYPE`, `LOOT_ID`, `CATEGORY`, `PRICE_U`, `PRICE_C`, `SELLING_CREDITS`, `DAMAGE`, `SHIELD`, `SHIELD_ABSORBATION`, `SPEED`, `SLOTS`, `EFFECT`, `USES`, `DESCRIPTION`) VALUES
	(1, 'LF-3', 0, 'equipment_weapon_laser_lf-3', 'laser', 10000, 0, 25000, 150, NULL, NULL, NULL, NULL, NULL, NULL, "Much stronger laser: Causes up to 150 damage points per round"),
	(2, 'LF-4', 0, 'equipment_weapon_laser_lf-4', 'laser', 1, 0, 2500000, 200, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(5, 'SG3N-A01', 2, 'equipment_generator_shield_sg3n-a01', 'generator', 0, 10000, 5000, NULL, 1000, 400, NULL, NULL, NULL, NULL, "1,000 shield strength / 40% less damage"),
	(6, 'SG3N-B02', 2, 'equipment_generator_shield_sg3n-b02', 'generator', 10000, 0, 25000, NULL, 10000, 8000, NULL, NULL, NULL, NULL, "10,000 shield strength / 80% less damage"),
	(7, 'SG3N-A02', 2, 'equipment_generator_shield_sg3n-a02', 'generator', 0, 20000, 10000, NULL, 2000, 1200, NULL, NULL, NULL, NULL, "2,000 shield strength / 50% less damage"),
	(8, 'SG3N-A03', 2, 'equipment_generator_shield_sg3n-a03', 'generator', 0, 256000, 1280000, NULL, 5000, 3500, NULL, NULL, NULL, NULL, "5,000 shield strength / 60% less damage"),
	(9, 'SG3N-B01', 2, 'equipment_generator_shield_sg3n-b01', 'generator', 5000, 0, 0, NULL, 4000, 2800, NULL, NULL, NULL, NULL, "4,000 shield strength / 70% less damage"),
	(13, 'Apis', 24, 'drone_apis', 'drone', 10000, 0, 2500000, NULL, NULL, NULL, NULL, 2, NULL, NULL, "Power drone with two slots"),
	(14, 'Iris', 24, 'drone_iris', 'drone', 15000, 0, 37500, NULL, NULL, NULL, NULL, 2, NULL, NULL, "Power drone with two slots"),
	(15, 'Flax', 24, 'drone_flax', 'drone', 0, 100000, 50000, NULL, NULL, NULL, NULL, 1, NULL, NULL, "Starter drone with one slot"),
	(16, 'G3N-1010', 3, 'equipment_generator_speed_g3n-1010', 'generator', 0, 2000, 1000, NULL, NULL, NULL, 2, NULL, NULL, NULL, "Increases ship speed by 2"),
	(17, 'G3N-2010', 3, 'equipment_generator_speed_g3n-2010', 'generator', 0, 4000, 2000, NULL, NULL, NULL, 3, NULL, NULL, NULL, "Increases ship speed by 3"),
	(18, 'G3N-3210', 3, 'equipment_generator_speed_g3n-3210', 'generator', 0, 8000, 4000, NULL, NULL, NULL, 4, NULL, NULL, NULL, "Increases ship speed by 4"),
	(19, 'G3N-3310', 3, 'equipment_generator_speed_g3n-3310', 'generator', 0, 16000, 8000, NULL, NULL, NULL, 5, NULL, NULL, NULL, "Increases ship speed by 5"),
	(20, 'G3N-6900', 3, 'equipment_generator_speed_g3n-6900', 'generator', 1000, 0, 2500, NULL, NULL, NULL, 7, NULL, NULL, NULL, "Increases ship speed by 7"),
	(21, 'G3N-7900', 3, 'equipment_generator_speed_g3n-7900', 'generator', 2000, 0, 5000, NULL, NULL, NULL, 10, NULL, NULL, NULL, "Increases ship speed by 10"),
	(22, 'LF-2', 0, 'equipment_weapon_laser_lf-2', 'laser', 5000, 0, 12500, 100, NULL, NULL, NULL, NULL, NULL, NULL, "Strong laser: causes up to 100 damage points per round"),
	(23, 'MP-1', 0, 'equipment_weapon_laser_mp-1', 'laser', 0, 50000, 25000, 60, NULL, NULL, NULL, NULL, NULL, NULL, "Average laser: causes up to 60 damage points per round"),
	(24, 'LF-1', 0, 'equipment_weapon_laser_lf-1', 'laser', 0, 10000, 5000, 40, NULL, NULL, NULL, NULL, NULL, NULL, "Small laser: causes up to 40 damage points per round"),
	(25, 'HST-02', 1, 'equipment_weapon_rocketlauncher_hst-2', 'heavy', 15000, 0, 37500, NULL, NULL, NULL, NULL, NULL, NULL, NULL, "The rapid reloader! This upgraded version of the Hellstorm launcher 1 makes it possible to win the battle before it's even begun. One little rocket makes a world of difference on the battlefield - firing up to 5 rocket"),
	(26, 'HST-01', 1, 'equipment_weapon_rocketlauncher_hst-1', 'heavy', 0, 500000, 250000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, "The rapid reloader! This rocket launcher makes it possible to win a battle before it's even begun. One little rocket makes a world of difference on the battlefield - firing up to 3 rockets, this rocket launcher unleashes a broadside of destruction"),
	(27, 'RSB-75', 12, 'ammunition_laser_rsb-75', 'notlisted', 15, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(28, 'UCB-100', 12, 'ammunition_laser_ucb-100', 'notlisted', 15, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(29, 'SAB-50', 12, 'ammunition_laser_sab-50', 'ammo', 0.5, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, "Special ammunition that reinforces your Shield, strengthening it by tapping into enemy shields (Shield Leech)."),
	(30, 'MCB-50', 12, 'ammunition_laser_mcb-50', 'ammo', 1, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, "This is the best standard laser ammo on the market. x3 laser damage per round"),
	(31, 'MCB-25', 12, 'ammunition_laser_mcb-25', 'ammo', 0, 20, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, "More bang for your buck: x2 laser damage per round"),
	(32, 'LCB-10', 12, 'ammunition_laser_lcb-10', 'ammo', 0, 10, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, "Low efficiency for a low price"),
	(33, 'DMG-B01', 6, 'booster_dmg-b01', 'booster', 15000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, "+10% damage for all damage inflicted for 10 h."),
	(34, 'EP-B01', 6, 'booster_ep-b01', 'booster', 15000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, "+10% EP Boost for 10 h."),
	(35, 'HON-B01', 6, 'booster_hon-b01', 'booster', 15000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, "+10% honor for 10 h."),
	(36, 'HP-B01', 6, 'booster_hp-b01', 'booster', 15000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, "+10% ship HP for 10 h."),
	(37, 'REP-B01', 6, 'booster_rep-b01', 'booster', 10000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, "+10% faster ship repairs for 10 h."),
	(38, 'RES-B01', 6, 'booster_res-b01', 'booster', 15000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, "The resource booster increases the number of resources from collected NPC cargo boxes by 25% for 10 h."),
	(39, 'SHD-B01', 6, 'booster_shd-b01', 'booster', 15000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, "+25% shield power for 10 h."),
	(40, 'F-01-TU', 17, 'drone_formation_f-01-tu', 'drone_formation', 0, 1000000, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(41, 'F-02-AR', 17, 'drone_formation_f-02-ar', 'drone_formation', 0, 1000000, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(42, 'F-03-LA', 17, 'drone_formation_f-03-la', 'drone_formation', 0, 2000000, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(43, 'F-04-ST', 17, 'drone_formation_f-04-st', 'drone_formation', 150000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(44, 'F-05-PI', 17, 'drone_formation_f-05-pi', 'drone_formation', 150000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(45, 'F-06-DA', 17, 'drone_formation_f-06-da', 'drone_formation', 150000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(46, 'F-07-DI', 17, 'drone_formation_f-07-di', 'drone_formation', 150000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(47, 'F-08-CH', 17, 'drone_formation_f-08-ch', 'drone_formation', 150000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(48, 'F-09-MO', 17, 'drone_formation_f-09-mo', 'drone_formation', 150000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(49, 'F-10-CR', 17, 'drone_formation_f-10-cr', 'drone_formation', 150000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(50, 'F-11-HE', 17, 'drone_formation_f-11-he', 'drone_formation', 150000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(51, 'F-12-BA', 17, 'drone_formation_f-12-ba', 'drone_formation', 150000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(52, 'F-13-BT', 17, 'drone_formation_f-13-bt', 'drone_formation', 150000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(53, 'LGF', 25, 'resource_logfile', 'extra', 500, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 1, "Log-disks can be exchanged for Research Points."),
	(54, 'BK-100', 25, 'resource_booty_key', 'extra', 1500, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 1, "Used to open pirate booty and collect the valuable treasure contained within."),
	(55, 'REP-1', 10, 'equipment_extra_repbot_rep-1', 'extra', 0, 10000, 5000, NULL, NULL, NULL, NULL, NULL, 0, 1, "This repair bot recovers your ship's hull in 165 seconds"),
	(56, 'REP-2', 10, 'equipment_extra_repbot_rep-2', 'extra', 0, 100000, 50000, NULL, NULL, NULL, NULL, NULL, 0, 1, "This repair bot recovers your ship's hull in 120 seconds"),
	(57, 'REP-3', 10, 'equipment_extra_repbot_rep-3', 'extra', 5000, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, 1, "This repair bot recovers your ship's hull in 105 seconds."),
	(58, 'REP-4', 10, 'equipment_extra_repbot_rep-4', 'extra', 10000, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, 1, "This repair bot recovers your ship's hull in 90 seconds."),
	(59, 'ROK-T01', 30, 'equipment_extra_cpu_rok-t01', 'extra', 10000, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, 1, "Doubles rocket firing speed"),
	(60, 'SLE-01', 9, 'equipment_extra_cpu_sle-01', 'extra', 0, 600000, 0, NULL, NULL, NULL, NULL, 2, "", 1, "+2 new slots for extras"),
	(61, 'SLE-02', 9, 'equipment_extra_cpu_sle-02', 'extra', 75000, 0, 0, NULL, NULL, NULL, NULL, 4, "", 1, "+4 new slots for extras"),
	(62, 'SLE-03', 9, 'equipment_extra_cpu_sle-03', 'extra', 150000, 0, 0, NULL, NULL, NULL, NULL, 6, "", 1, "+6 new slots for extras"),
	(63, 'SLE-04', 9, 'equipment_extra_cpu_sle-04', 'extra', 250000, 0, 0, NULL, NULL, NULL, NULL, 10, "", 1, "+10 new slots for extras"),
	(65, 'ISH-01', 31, 'equipment_extra_cpu_ish-01', 'extra', 50000, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, 1, "3-second protection against enemies; 10 mines and 100 Xenomit used every time"),
	(66, 'SMB-01', 32, 'equipment_extra_cpu_smb-01', 'extra', 50000, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, 1, "Instant bomb made from 10 mines and 100 Xenomit; doesn't cause any damage to your ship"),
	(67, 'RL-LB1', 33, 'equipment_extra_cpu_rllb-x', 'extra', 25000, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, 1, "The rocket-launcher CPU automatically reloads your rocket launcher with a specified rocket type to rain fire on your enemies when you launch a laser attack."),
	(68, 'AIM-01', 34, 'equipment_extra_cpu_aim-01', 'extra', 0, 20000000, 0, NULL, NULL, NULL, NULL, NULL, NULL, 1, "25% less chance that lasers will miss their target; 10 Xenomit used per volley"),
	(69, 'AIM-02', 34, 'equipment_extra_cpu_aim-02', 'extra', 200000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 1, "50% less chance that lasers will miss their target; 10 Xenomit used per volley"),
	(70, 'JP-01', 35, 'equipment_extra_cpu_jp-01', 'extra', 0, 2000000, 0, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL),
	(71, 'JP-02', 35, 'equipment_extra_cpu_jp-02', 'extra', 15000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL),
	(72, 'GEM-XI', 36, 'equipment_extra_cpu_gem-xi', 'extra', 10000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 1, "Doubles cargo space thanks to molecular compression"),
	(73, 'CL04K-XL', 37, 'equipment_extra_cpu_cl04k-xl', 'extra', 22500, 0, 0, NULL, NULL, NULL, NULL, NULL, "", 50, "Cloak your ship 50 times and stay invisible until you launch an attack yourself."),
	(74, 'CL04K', 37, 'equipment_extra_cpu_cl04k-m', 'extra', 5000, 0, 0, NULL, NULL, NULL, NULL, NULL, "", 20, "10 ship cloakings (active until your first attack)"),
	(75, 'CL04K-MOD', 37, 'equipment_extra_cpu_cl04k-xs', 'extra', 500, 0, 0, NULL, NULL, NULL, NULL, NULL, "", 1, "Ship stays cloaked until your first attack"),
	(76, 'AROL-X', 38, 'equipment_extra_cpu_arol-x', 'extra', 25000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 1, "Automatic rocket rapid fire during your laser attacks."),
	(77, 'MIN-T01', 39, 'equipment_extra_cpu_min-t01', 'extra', 0, 5000000, 0, NULL, NULL, NULL, NULL, NULL, NULL, 1, "25% shorter cooldown for mines and items made from mines."),
	(78, 'MIN-T02', 39, 'equipment_extra_cpu_min-t02', 'extra', 25000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 1, "50% shorter cooldown for mines and items made from mines."),
	(79, 'NC-RRB', 40, 'equipment_extra_cpu_nc-rrb', 'extra', 10000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 1, "Auto-activates a repair robot available"),
	(81, 'AJP-01', 41, 'equipment_extra_cpu_ajp-01', 'extra', 75000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 1, "Allows you to jump to any of the valid target maps. May not be used during battle."),
	(84, 'DRO-01', 42, 'equipment_extra_cpu_dr-01', 'extra', 0, 150000, 0, NULL, NULL, NULL, NULL, NULL, NULL, 1, "This CPU automatically repairs your drones when they sustain more than 70% damage upon ship destruction, as long as you have enough Uridium or Credits (depends on the drone type). Good for 8 repairs."),
	(85, 'DRO-02', 42, 'equipment_extra_cpu_dr-02', 'extra', 15000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 1, "This CPU automatically repairs your drones when they have received the maximum damage upon ship destruction, as long as you have enough Uridium or Credits (depends on the drone type). Good for 32 repairs."),
	(86, 'HAVOC', 50, 'drone_designs_havoc', 'drone_design', 10000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(87, 'BK-101', 25, 'resource_booty_key_blue', 'extra', 10000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL),
	(88, 'BK-102', 25, 'resource_booty_key_red', 'extra', 15000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL),
	(89, 'R-310', 12, 'ammunition_rocket_r-310', 'ammo', 0, 100, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, "Short-range rocket: causes up to 1,000 damage points per rocket fired"),
	(90, 'PLT-2026', 12, 'ammunition_rocket_PLT-2026', 'ammo', 0, 500, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, "Mid-range rocket: causes up to 2,000 damage points per rocket fired"),
	(91, 'PLT-2021', 12, 'ammunition_rocket_PLT-2021', 'ammo', 5, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, "Long-range rocket: causes up to 4,000 points per rocket fired"),
	(92, 'PLT-3030', 12, 'ammunition_rocket_PLT-3030', 'ammo', 7, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, "Each rocket inflicts a max. of 6,000 HP of damage, but has a lower accuracy rate due to its impressive firepower. An exceptional weapon when used in combination with the Tech Center's precision targeter."),
	(93, 'ECO-10 ', 12, 'ammunition_rocketlauncher_ECO-10', 'ammo', 0, 1500, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, "The multi-angle damage rocket for smart spenders. Your toughest enemies won't stand a chance against the many broadsides of the ECO Hellstorm."),
	(94, 'Zeus', 24, 'drone_zeus', 'drone', 10000, 0, 750000, NULL, NULL, NULL, NULL, 2, NULL, NULL, "Epic drone with two slots"),
	(95, 'HERCULES', 50, 'drone_designs_hercules', 'drone_design', 10000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(96, 'PET', 26, 'pet_pet10', 'pet', 50000, 0, 0, NULL, NULL, NULL, NULL, 5, NULL, NULL, NULL),
	(97, 'FUEL', 26, 'pet_fuel-100', 'pet_fuel', 15, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(99, 'G-KK1', 99, 'pet_gear_g-kk1', 'gear', 15000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(100, 'AI-LM1', 25, 'pet_protocol_ai-lm1', 'protocols', 15000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- Dumping tructure for table do_server_ge1.server_levels_drone
CREATE TABLE IF NOT EXISTS `server_levels_drone` (
  `ID` int(11) NOT NULL,
  `EXP` bigint(11) NOT NULL COMMENT '(XP needed)',
  `REWARDS` text,
  PRIMARY KEY (`ID`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- Dumping data for table do_server_ge1.server_levels_drone: ~6 rows (approximately)
REPLACE INTO `server_levels_drone` (`ID`, `EXP`, `REWARDS`) VALUES
	(1, 0, NULL),
	(2, 100, NULL),
	(3, 200, NULL),
	(4, 400, NULL),
	(5, 800, NULL),
	(6, 1600, NULL);

-- Dumping structure for table do_server_ge1.server_levels_pet
CREATE TABLE IF NOT EXISTS `server_levels_pet` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `EXP` bigint(11) NOT NULL COMMENT '(XP needed)',
  `REWARDS` text,
  PRIMARY KEY (`ID`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- Dumping data for table do_server_ge1.server_levels_pet: ~15 rows (approximately)
REPLACE INTO `server_levels_pet` (`ID`, `EXP`, `REWARDS`) VALUES
	(1, 160000, NULL),
	(2, 1280000, NULL),
	(3, 4320000, NULL),
	(4, 10240000, NULL),
	(5, 20000000, NULL),
	(6, 34560000, NULL),
	(7, 54880000, NULL),
	(8, 81920000, NULL),
	(9, 116640000, NULL),
	(10, 160000000, NULL),
	(11, 212960000, NULL),
	(12, 276480000, NULL),
	(13, 351520000, NULL),
	(14, 439040000, NULL),
	(15, 540000000, NULL);

-- Dumping structure for table do_server_ge1.server_levels_player
CREATE TABLE IF NOT EXISTS `server_levels_player` (
  `ID` int(20) NOT NULL,
  `EXP` bigint(11) NOT NULL COMMENT '(XP needed)',
  `REWARDS` text,
  PRIMARY KEY (`ID`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- Dumping data for table do_server_ge1.server_levels_player: ~41 rows (approximately)
REPLACE INTO `server_levels_player` (`ID`, `EXP`, `REWARDS`) VALUES
	(0, 0, NULL),
	(1, 5000, NULL),
	(2, 10000, NULL),
	(3, 20000, NULL),
	(4, 40000, NULL),
	(5, 80000, NULL),
	(6, 160000, NULL),
	(7, 320000, NULL),
	(8, 640000, NULL),
	(9, 1280000, NULL),
	(10, 2560000, NULL),
	(11, 5120000, NULL),
	(12, 10240000, NULL),
	(13, 20480000, NULL),
	(14, 40960000, NULL),
	(15, 81920000, NULL),
	(16, 163840000, NULL),
	(17, 327680000, NULL),
	(18, 655360000, NULL),
	(19, 1310720000, NULL),
	(20, 2621440000, NULL),
	(21, 5242880000, NULL),
	(22, 10485760000, NULL),
	(23, 20971520000, NULL),
	(24, 41943040000, NULL),
	(25, 83886080000, NULL),
	(26, 167772160000, NULL),
	(27, 335544320000, NULL),
	(28, 671088640000, NULL),
	(29, 1342177280000, NULL),
	(30, 2684354560000, NULL),
	(31, 5368709120000, NULL),
	(32, 10737418240000, NULL),
	(33, 21474836480000, NULL),
	(34, 42949672960000, NULL),
	(35, 85899345920000, NULL),
	(36, 171798691840000, NULL),
	(37, 343597383680000, NULL),
	(38, 687194767360000, NULL),
	(39, 1374389534720000, NULL),
	(40, 2748779069440000, NULL);

-- Dumping structure for table do_server_ge1.server_maps
CREATE TABLE IF NOT EXISTS `server_maps` (
  `ID` int(4) NOT NULL AUTO_INCREMENT,
  `NAME` varchar(20) NOT NULL DEFAULT '',
  `LIMITS` varchar(20) NOT NULL DEFAULT '128x128',
  `PORTALS` text NOT NULL,
  `NPCS` text NOT NULL,
  `IS_STARTER_MAP` enum(0,1) NOT NULL DEFAULT 0,
  `FACTION_ID` tinyint(1) NOT NULL DEFAULT 0,
  `LEVEL` int(11) NOT NULL,
  `MAP_ASSETS` text CHARACTER SET utf32 NOT NULL,
  `MAP_TYPE` int(11) NOT NULL,
  PRIMARY KEY (`ID`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=94 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- Dumping data for table do_server_ge1.server_maps: 33 rows
REPLACE INTO `server_maps` (`ID`, `NAME`, `LIMITS`, `PORTALS`, `NPCS`, `IS_STARTER_MAP`, `FACTION_ID`, `LEVEL`, `MAP_ASSETS`, `MAP_TYPE`) VALUES
	(2, "1-2", "208x130", "[{'Id':1,'x':'2000','y':'2000','newX':'18500','newY':'11500','Map':1},{'Id':2,'x':'18500','y':'2000','newX':'2000','newY':'11500','Map':3},{'Id':3,'x':'18500','y':'11500','newX':'2000','newY':'2000','Map':4}]", "[{'NpcId':84,'Count':10},{'NpcId':71,'Count':10},{'NpcId':23,'Count':3},{'NpcId':24,'Count':2}]", '1', 1, 0, "", 0),
	(1, "1-1", "208x130", "[{'Id':1,'x':'18500','y':'11500','newX':'2000','newY':'2000','Map':2}]", "[{'NpcId':84,'Count':20}]", '1', 1, 0, "", 0),
	(3, "1-3", "128x128", "[{'Id':1,'x':'2000','y':'11500','newX':'18500','newY':'2000','Map':2},{'Id':2,'x':'18500','y':'2000','newX':'2000','newY':'11500','Map':7},{'Id':3,'x':'18500','y':'11500','newX':'18500','newY':'2000','Map':4}]", "[{'NpcId':71,'Count':10},{'NpcId':72,'Count':8},{'NpcId':75,'Count':8},{'NpcId':73,'Count':5},{'NpcId':26,'Count':1},{'NpcId':25,'Count':3},{'NpcId':31,'Count':1}]", '0', 1, 2, "", 0),
	(4, "1-4", "208x128", "[{'Id':1,'x':'2000','y':'2000','newX':'18500','newY':'11500','Map':2},{'Id':2,'x':'18500','y':'2000','newX':'18500','newY':'11500','Map':3},{'Id':3,'x':'18500','y':'11500','newX':'2000','newY':'2000','Map':12},{'Id':4,'x':'18500','y':'6750','newX':'2000','newY':'6750','Map':13}]", "[{'NpcId':71,'Count':10},{'NpcId':74,'Count':5},{'NpcId':75,'Count':8},{'NpcId':73,'Count':5},{'NpcId':46,'Count':1},{'NpcId':24,'Count':2}]", '0', 1, 2, "", 0),
	(5, "2-1", "208x128", "[{'Id':1,'x':'2000','y':'11500','newX':'18500','newY':'2000','Map':6}]", "[{'NpcId':84,'Count':20}]", '1', 2, 0, "", 0),
	(6, "2-2", "208x128", "[{'Id':1,'x':'18500','y':'2000','newX':'2000','newY':'11500','Map':5},{'Id':2,'x':'2000','y':'11500','newX':'18500','newY':'2000','Map':7},{'Id':3,'x':'18500','y':'11500','newX':'2000','newY':'2000','Map':8}]", "[{'NpcId':84,'Count':10},{'NpcId':71,'Count':10},{'NpcId':23,'Count':3},{'NpcId':24,'Count':2}]", '1', 2, 0, "", 0),
	(7, "2-3", "208x128", "[{'Id':1,'x':'18500','y':'11500','newX':'18500','newY':'2000','Map':8},{'Id':2,'x':'18500','y':'2000','newX':'2000','newY':'11500','Map':6},{'Id':3,'x':'2000','y':'11500','newX':'18500','newY':'2000','Map':3}]", "[{'NpcId':71,'Count':10},{'NpcId':72,'Count':8},{'NpcId':75,'Count':8},{'NpcId':73,'Count':5},{'NpcId':26,'Count':1},{'NpcId':25,'Count':3},{'NpcId':31,'Count':1}]", '0', 2, 2, "", 0),
	(8, "2-4", "208x128", "[{'Id':1,'x':'2000','y':'2000','newX':'18500','newY':'11500','Map':6},{'Id':2,'x':'18500','y':'2000','newX':'18500','newY':'11500','Map':7},{'Id':3,'x':'2000','y':'11500','newX':'2000','newY':'2000','Map':11},{'Id':4,'x':'10250','y':'11500','newX':'10250','newY':'2000','Map':14}]", "[{'NpcId':71,'Count':10},{'NpcId':74,'Count':5},{'NpcId':75,'Count':8},{'NpcId':73,'Count':5},{'NpcId':46,'Count':1},{'NpcId':25,'Count':3},{'NpcId':24,'Count':2}]", '0', 2, 2, "", 0),
	(9, "3-1", "208x128", "[{'Id':1,'x':'2000','y':'2000','newX':'18500','newY':'11500','Map':10}]", "[{'NpcId':84,'Count':20}]", '1', 3, 0, "", 0),
	(10, "3-2", "208x128", "[{'Id':1,'x':'18500','y':'11500','newX':'2000','newY':'2000','Map':9},{'Id':2,'x':'18500','y':'2000','newX':'18500','newY':'11500','Map':11},{'Id':3,'x':'2000','y':'2000','newX':'18500','newY':'11500','Map':12}]", "[{'NpcId':84,'Count':10},{'NpcId':71,'Count':10},{'NpcId':23,'Count':3},{'NpcId':24,'Count':2}]", '1', 3, 0, "", 0),
	(11, "3-3", "208x128", "[{'Id':1,'x':'18500','y':'11500','newX':'18500','newY':'2000','Map':10},{'Id':2,'x':'2000','y':'11500','newX':'18500','newY':'2000','Map':12},{'Id':3,'x':'2000','y':'2000','newX':'2000','newY':'11500','Map':8}]", "[{'NpcId':71,'Count':10},{'NpcId':72,'Count':8},{'NpcId':75,'Count':8},{'NpcId':73,'Count':5},{'NpcId':26,'Count':1},{'NpcId':25,'Count':3},{'NpcId':31,'Count':1}]", '0', 3, 2, "", 0),
	(12, "3-4", "208x128", "[{'Id':1,'x':'18500','y':'11500','newX':'2000','newY':'2000','Map':10},{'Id':2,'x':'18500','y':'2000','newX':'2000','newY':'11500','Map':11},{'Id':3,'x':'2000','y':'2000','newX':'18500','newY':'11500','Map':4},{'Id':4,'x':'10250','y':'2000','newX':'18500','newY':'6750','Map':15}]", "[{'NpcId':71,'Count':10},{'NpcId':74,'Count':5},{'NpcId':75,'Count':8},{'NpcId':73,'Count':5},{'NpcId':46,'Count':1},{'NpcId':25,'Count':3},{'NpcId':24,'Count':2}]", '0', 3, 2, "", 0),
	(13, "4-1", "208x128", "[{'Id':1,'x':'2000','y':'6750','newX':'18500','newY':'6750','Map':4},{'Id':2,'x':'18500','y':'11500','newX':'2000','newY':'11500','Map':15},{'Id':3,'x':'18500','y':'2000','newX':'2000','newY':'11500','Map':14},{'Id':4,'x':'10250','y':'6750','newX':'20000','newY':'13000','Map':16}]", "", '0', 1, 7, "", 0),
	(14, "4-2", "208x128", "[{'Id':1,'x':'10250','y':'2000','newX':'10250','newY':'11500','Map':8},{'Id':2,'x':'2000','y':'11500','newX':'18500','newY':'20 ','Map':13},{'Id':3,'x':'18500','y':'11500','newX':'2000','newY':'2000','Map':15},{'Id':4,'x':'10250','y':'6750','newX':'21500','newY':'12100','Map':16}]", "", '0', 2, 7, "", 0),
	(15, "4-3", "208x128", "[{'Id':1,'x':'18500','y':'6750','newX':'10250','newY':'2000','Map':12},{'Id':2,'x':'2000','y':'2000','newX':'18500','newY':'11500','Map':14},{'Id':3,'x':'2000','y':'11500','newX':'18500','newY':'11500','Map':13},{'Id':4,'x':'10250','y':'6750','newX':'21500','newY':'13900','Map':16}]", "", '0', 3, 7, "", 0),
	(16, "4-4", "208x128", "[{'Id':1,'x':'21500','y':'13900','newX':'10250','newY':'6750','Map':15},{'Id':2,'x':'21500','y':'12100','newX':'10250','newY':'6750','Map':14},{'Id':3,'x':'20000','y':'13000','newX':'10250','newY':'6750','Map':13},{'Id':4,'x':'6000','y':'13000','newX':'18500','newY':'6750','Map':17},{'Id':5,'x':'28000','y':'3000','newX':'2000','newY':'11500','Map':21},{'Id':6,'x':'28000','y':'24000','newX':'2000','newY':'2000','Map':25}]", "", '0', 0, 8, "", 0),
	(17, "1-5", "208x128", "[{'Id':1,'x':'18500','y':'6750','newX':'6000','newY':'13000','Map':16},{'Id':2,'x':'2000','y':'2000','newX':'18500','newY':'11500','Map':18},{'Id':3,'x':'2000','y':'11500','newX':'18500','newY':'2000','Map':19},{'Id':4,'x':'10000','y':'11300','newX':'6000','newY':'13000','Map':29}]", "[{'NpcId':77,'Count':10},{'NpcId':71,'Count':15},{'NpcId':76,'Count':8},{'NpcId':28,'Count':2},{'NpcId':27,'Count':3}]", '0', 1, 10, "", 0),
	(18, "1-6", "208x128", "[{'Id':1,'x':'18500','y':'11500','newX':'2000','newY':'2000','Map':17},{'Id':2,'x':'2000','y':'11500','newX':'18500','newY':'2000','Map':20}]", "[{'NpcId':79,'Count':3},{'NpcId':78,'Count':20},{'NpcId':80,'Count':0},{'NpcId':29,'Count':6},{'NpcId':35,'Count':1}]", '0', 1, 11, "", 0),
	(19, "1-7", "208x128", "[{'Id':1,'x':'2000','y':'2000','newX':'18500','newY':'11500','Map':20},{'Id':2,'x':'18500','y':'2000','newX':'2000','newY':'11500','Map':17}]", "[{'NpcId':79,'Count':8},{'NpcId':78,'Count':12},{'NpcId':29,'Count':2},{'NpcId':35,'Count':2}]", '0', 1, 11, "", 0),
	(20, "1-8", "208x128", "[{'Id':1,'x':'18500','y':'2000','newX':'2000','newY':'11500','Map':18},{'Id':2,'x':'18500','y':'11500','newX':'2000','newY':'2000','Map':19}]", "[{'NpcId':85,'Count':25},{'NpcId':34,'Count':1}]", '0', 1, 12, "", 0),
	(21, "2-5", "208x128", "[{'Id':1,'x':'2000','y':'11500','newX':'28000','newY':'3000','Map':16},{'Id':2,'x':'2000','y':'2000','newX':'2000','newY':'11500','Map':22},{'Id':3,'x':'18500','y':'2000','newX':'2000','newY':'11500','Map':23},{'Id':4,'x':'18500','y':'11300','newX':'28000','newY':'3000','Map':29}]", "[{'NpcId':77,'Count':10},{'NpcId':71,'Count':15},{'NpcId':76,'Count':8},{'NpcId':28,'Count':2},{'NpcId':27,'Count':3}]", '0', 2, 10, "", 0),
	(22, "2-6", "208x128", "[{'Id':1,'x':'2000','y':'11500','newX':'2000','newY':'2000','Map':21},{'Id':2,'x':'18500','y':'2000','newX':'2000','newY':'11500','Map':24}]", "[{'NpcId':79,'Count':3},{'NpcId':78,'Count':20},{'NpcId':80,'Count':0},{'NpcId':29,'Count':6},{'NpcId':35,'Count':1}]", '0', 2, 11, "", 0),
	(23, "2-7", "208x128", "[{'Id':1,'x':'2000','y':'11500','newX':'18500','newY':'2000','Map':21},{'Id':2,'x':'18500','y':'2000','newX':'18500','newY':'11500','Map':24}]", "[{'NpcId':79,'Count':8},{'NpcId':78,'Count':12},{'NpcId':29,'Count':2},{'NpcId':35,'Count':2}]", '0', 2, 11, "", 0),
	(24, "2-8", "208x128", "[{'Id':1,'x':'2000','y':'11500','newX':'18500','newY':'2000','Map':22},{'Id':2,'x':'18500','y':'11500','newX':'18500','newY':'2000','Map':23}]", "[{'NpcId':85,'Count':25},{'NpcId':34,'Count':1}]", '0', 2, 12, "", 0),
	(25, "3-5", "208x128", "[{'Id':1,'x':'2000','y':'2000','newX':'28000','newY':'24000','Map':16},{'Id':2,'x':'2000','y':'11500','newX':'2000','newY':'2000','Map':26},{'Id':3,'x':'18500','y':'11500','newX':'2000','newY':'11300','Map':27},{'Id':4,'x':'17400','y':'2000','newX':'28000','newY':'24000','Map':29}]", "[{'NpcId':77,'Count':10},{'NpcId':71,'Count':15},{'NpcId':76,'Count':8},{'NpcId':28,'Count':2},{'NpcId':27,'Count':3}]", '0', 3, 10, "", 0),
	(26, "3-6", "208x128", "[{'Id':1,'x':'2000','y':'2000','newX':'2000','newY':'11500','Map':25},{'Id':2,'x':'18500','y':'11500','newX':'2000','newY':'11500','Map':28}]", "[{'NpcId':79,'Count':3},{'NpcId':78,'Count':20},{'NpcId':80,'Count':0},{'NpcId':29,'Count':6},{'NpcId':35,'Count':1}]", '0', 3, 11, "", 0),
	(27, "3-7", "208x128", "[{'Id':1,'x':'2000','y':'11300','newX':'18500','newY':'11500','Map':25},{'Id':2,'x':'18500','y':'11500','newX':'2000','newY':'2000','Map':28}]", "[{'NpcId':79,'Count':8},{'NpcId':78,'Count':12},{'NpcId':29,'Count':2},{'NpcId':35,'Count':2}]", '0', 3, 11, "", 0),
	(28, "3-8", "208x128", "[{'Id':1,'x':'2000','y':'2000','newX':'18500','newY':'11500','Map':27},{'Id':2,'x':'2000','y':'11500','newX':'18500','newY':'11500','Map':26}]", "[{'NpcId':85,'Count':25},{'NpcId':34,'Count':1}]", '0', 3, 12, "", 0),
	(29, "4-5", "208x128", "[{'Id':1,'x':'6000','y':'13000','newX':'10000','newY':'11300','Map':17},{'Id':2,'x':'28000','y':'3000','newX':'10000','newY':'11300','Map':21},{'Id':3,'x':'28000','y':'24000','newX':'17400','newY':'2000','Map':25}]", "[{'NpcId':23,'Count':6},{'NpcId':24,'Count':7},{'NpcId':25,'Count':4},{'NpcId':31,'Count':2},{'NpcId':26,'Count':1},{'NpcId':46,'Count':1},{'NpcId':27,'Count':3},{'NpcId':28,'Count':1},{'NpcId':29,'Count':4},{'NpcId':35,'Count':2},{'NpcId':34,'Count':3},{'NpcId':45,'Count':2}]", '0', 0, 10, "", 0),
	(42, "???", "208x128", "", "", '0', 0, 0, "", 0),
	(91, "5-1", "208x128", "", "[{'NpcId':111,'Count':30},{'NpcId':112,'Count':20},{'NpcId':113,'Count':15},{'NpcId':114,'Count':10}]", '0', 0, 0, "", 0),
	(92, "5-2", "208x128", "", "[{'NpcId':111,'Count':30},{'NpcId':112,'Count':20},{'NpcId':113,'Count':15},{'NpcId':114,'Count':10}]", '0', 0, 0, "", 0),
	(93, "5-3", "208x128", "", "[{'NpcId':111,'Count':30},{'NpcId':112,'Count':20},{'NpcId':113,'Count':15},{'NpcId':114,'Count':10}]", '0', 0, 0, "", 0);

-- Dumping structure for table do_server_ge1.server_max_research_point
CREATE TABLE IF NOT EXISTS `server_max_research_point` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `RESEARCH_POINT` int(11) NOT NULL,
  `LOGS_NEEDED` int(11) NOT NULL,
  PRIMARY KEY (`ID`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- Dumping data for table do_server_ge1.server_max_research_point: ~50 rows (approximately)
REPLACE INTO `server_max_research_point` (`ID`, `RESEARCH_POINT`, `LOGS_NEEDED`) VALUES
	(1, 1, 30),
	(2, 2, 33),
	(3, 3, 36),
	(4, 4, 40),
	(5, 5, 44),
	(6, 6, 48),
	(7, 7, 53),
	(8, 8, 58),
	(9, 9, 64),
	(10, 10, 71),
	(11, 11, 78),
	(12, 12, 96),
	(13, 13, 94),
	(14, 14, 104),
	(15, 15, 114),
	(16, 16, 125),
	(17, 17, 138),
	(18, 18, 152),
	(19, 19, 167),
	(20, 20, 183),
	(21, 21, 202),
	(22, 22, 222),
	(23, 23, 244),
	(24, 24, 269),
	(25, 25, 295),
	(26, 26, 325),
	(27, 27, 358),
	(28, 28, 393),
	(29, 29, 433),
	(30, 30, 476),
	(31, 31, 523),
	(32, 32, 576),
	(33, 33, 633),
	(34, 34, 697),
	(35, 35, 766),
	(36, 36, 843),
	(37, 37, 927),
	(38, 38, 1020),
	(39, 39, 1122),
	(40, 40, 1234),
	(41, 41, 1358),
	(42, 42, 1494),
	(43, 43, 1643),
	(44, 44, 1807),
	(45, 45, 1988),
	(46, 46, 2187),
	(47, 47, 2405),
	(48, 48, 2646),
	(49, 49, 2911),
	(50, 50, 3202);

-- Dumping structure for table do_server_ge1.server_modules
CREATE TABLE IF NOT EXISTS `server_modules` (
  `ID` int(11) NOT NULL,
  `NAME` varchar(11) NOT NULL,
  `HP` int(11) NOT NULL DEFAULT 250000,
  `SHIELD` int(11) NOT NULL DEFAULT 500000,
  `ATTACK_RANGE` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table do_server_ge1.server_modules: ~2 rows (approximately)
REPLACE INTO `server_modules` (`ID`, `NAME`, `HP`, `SHIELD`, `ATTACK_RANGE`) VALUES
	(1, 'HULL', 500000, 500000, 0),
	(0, '', 250000, 500000, 0);

-- Dumping structure for table do_server_ge1.server_ore_prices
CREATE TABLE IF NOT EXISTS `server_ore_prices` (
  `ID` int(11) NOT NULL,
  `LOOT_ID` text NOT NULL,
  `SELL_PRICE` int(11) NOT NULL,
  PRIMARY KEY (`ID`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- Dumping data for table do_server_ge1.server_ore_prices: ~9 rows (approximately)
REPLACE INTO `server_ore_prices` (`ID`, `LOOT_ID`, `SELL_PRICE`) VALUES
	(0, 'resource_ore_prometium', 10),
	(1, 'resource_ore_endurium', 15),
	(2, 'resource_ore_terbium', 25),
	(3, 'resource_ore_prometid', 200),
	(4, 'resource_ore_duranium', 300),
	(5, 'resource_ore_promerium', 1000),
	(6, 'resource_ore_xenomit', -1),
	(7, 'resource_ore_seprom', -1),
	(8, 'resource_ore_palladium', -1);

-- Dumping structure for table do_server_ge1.server_payments
CREATE TABLE IF NOT EXISTS `server_payments` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `PLAYER_ID` int(11) NOT NULL,
  `USER_ID` int(11) NOT NULL,
  `PACK_ID` int(11) NOT NULL,
  `STATUS` text NOT NULL,
  `STARTED` text NOT NULL,
  `FINISHED` text,
  `AUTH_KEY` text NOT NULL,
  PRIMARY KEY (`ID`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- Dumping structure for table do_server_ge1.server_premium_packs
CREATE TABLE IF NOT EXISTS `server_premium_packs` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `NAME` text NOT NULL,
  `DESCRIPTION` text NOT NULL,
  `PRICE` float NOT NULL,
  `ITEMS` text NOT NULL,
  PRIMARY KEY (`ID`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- Dumping data for table do_server_ge1.server_premium_packs: ~0 rows (approximately)
REPLACE INTO `server_premium_packs` (`ID`, `NAME`, `DESCRIPTION`, `PRICE`, `ITEMS`) VALUES
	(1, 'PREMIUM 1', '1 Week Premium Access', 3.99, "{'Items':[{'Type':'Premium','Value':1}]}");

-- Dumping structure for table do_server_ge1.server_quests
CREATE TABLE IF NOT EXISTS `server_quests` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `NAME` varchar(255) NOT NULL,
  `DESC` text NOT NULL,
  `ROOT` text NOT NULL,
  `REWARDS` text NOT NULL,
  `TYPE` int(11) NOT NULL DEFAULT 0,
  `ICON` int(11) NOT NULL DEFAULT 0,
  `ACCEPT_LEVEL` int(11) NOT NULL DEFAULT 0,
  `EXPIRY_DATE` datetime DEFAULT CURRENT_TIMESTAMP,
  `DAY_OF_WEEK` smallint(2) DEFAULT 0 COMMENT 'Used for daily quests (0-6)',
  PRIMARY KEY (`ID`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=74 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- Dumping data for table do_server_ge1.server_quests: ~20 rows (approximately)
REPLACE INTO `server_quests` (`ID`, `NAME`, `DESC`, `ROOT`, `REWARDS`, `TYPE`, `ICON`, `ACCEPT_LEVEL`, `EXPIRY_DATE`, `DAY_OF_WEEK`) VALUES
	(43, "First assignment", "Time for your first assignment: Gather 8 Prometium and then destroy 6 Streuners. Try to accomplish this as fast as you can.", "{'Id':43,'Active':false,'Ordered':false,'Mandatory':false,'MandatoryCount':0,'Elements':[{'Case':{'Id':0,'Active':false,'Ordered':false,'Mandatory':false,'MandatoryCount':0,'Elements':[]},'Condition':{'Id':43100,'Type':5,'Matches':[1],'Mandatory':true,'TargetValue':8,'State':{'CurrentValue':0.0,'Active':false,'Completed':false},'SubConditions':[]}},{'Case':{'Id':0,'Active':false,'Ordered':false,'Mandatory':false,'MandatoryCount':0,'Elements':[]},'Condition':{'Id':43200,'Type':27,'Matches':[1,1],'Mandatory':true,'TargetValue':6,'State':{'CurrentValue':0.0,'Active':false,'Completed':false},'SubConditions':[]}}]}", "{'Exp':4000,'Honor':400,'Credits':8000,'Uridium':20,'LootId':null,'Amount':0}", 1, 1, 0, "2019-01-01 00:00:00", 0),
	(46, "Collecting mission", "So, you wanna save the universe .... then start out by collecting 20 Prometium - you know, the little red things found floating around X-1 and X-2. Once you've collected the Prometium, bring it back to the space station to sell.", "{'Id':46,'Active':false,'Ordered':false,'Mandatory':false,'MandatoryCount':0,'Elements':[{'Case':{'Id':0,'Active':false,'Ordered':false,'Mandatory':false,'MandatoryCount':0,'Elements':[]},'Condition':{'Id':46100,'Type':5,'Matches':[1],'Mandatory':true,'TargetValue':20,'State':{'CurrentValue':0.0,'Active':false,'Completed':false},'SubConditions':[]}}]}", "{'Exp':4000,'Honor':0,'Credits':2000,'Uridium':0,'LootId':null,'Amount':0}", 1, 1, 0, "2019-01-01 00:00:00", 0),
	(47, "Collecting mission (2)", "We need more Prometium! Much more ... start looking and collect 40 Prometium for us.", "{'Id':47,'Active':false,'Ordered':false,'Mandatory':false,'MandatoryCount':0,'Elements':[{'Case':{'Id':0,'Active':false,'Ordered':false,'Mandatory':false,'MandatoryCount':0,'Elements':[]},'Condition':{'Id':47100,'Type':5,'Matches':[1],'Mandatory':true,'TargetValue':40,'State':{'CurrentValue':0.0,'Active':false,'Completed':false},'SubConditions':[]}}]}", "{'Exp':8000,'Honor':0,'Credits':8000,'Uridium':20,'LootId':null,'Amount':0}", 1, 1, 0, "2019-01-09 00:00:00", 0),
	(48, "Collecting mission (3)", "If you bring us enough Prometium again, we'll be able to complete the first part of our research. 80 sounds like a lot, but we're in dire need of large quantities.", "{'Id':48,'Active':false,'Ordered':false,'Mandatory':false,'MandatoryCount':0,'Elements':[{'Case':{'Id':0,'Active':false,'Ordered':false,'Mandatory':false,'MandatoryCount':0,'Elements':[]},'Condition':{'Id':48100,'Type':5,'Matches':[1],'Mandatory':true,'TargetValue':40,'State':{'CurrentValue':0.0,'Active':false,'Completed':false},'SubConditions':[]}}]}", "{'Exp':16000,'Honor':0,'Credits':16000,'Uridium':40,'LootId':null,'Amount':0}", 1, 1, 0, "2019-01-09 00:00:00", 0),
	(50, "Ore wanted now", "Make yourself useful and collect 30 Endurium for me. You'll find the small blue rocks floating around X-1 and X-2. Trust me, it'll be worth your time!", "{'Id':50,'Active':false,'Ordered':false,'Mandatory':false,'MandatoryCount':0,'Elements':[{'Case':{'Id':0,'Active':false,'Ordered':false,'Mandatory':false,'MandatoryCount':0,'Elements':[]},'Condition':{'Id':50100,'Type':5,'Matches':[2],'Mandatory':true,'TargetValue':30,'State':{'CurrentValue':0.0,'Active':false,'Completed':false},'SubConditions':[]}}]}", "{'Exp':4000,'Honor':0,'Credits':4000,'Uridium':50,'LootId':null,'Amount':0}", 1, 1, 0, "2019-01-01 00:00:00", 0),
	(51, "Ore wanted now! (2)", "We still don't have enough. You must collect more Endurium so that we can continue our research. 60 Endurium shouldn't be any problem for you.", "{'Id':51,'Active':false,'Ordered':false,'Mandatory':false,'MandatoryCount':0,'Elements':[{'Case':{'Id':0,'Active':false,'Ordered':false,'Mandatory':false,'MandatoryCount':0,'Elements':[]},'Condition':{'Id':51100,'Type':5,'Matches':[2],'Mandatory':true,'TargetValue':60,'State':{'CurrentValue':0.0,'Active':false,'Completed':false},'SubConditions':[]}}]}", "{'Exp':8000,'Honor':0,'Credits':8000,'Uridium':40,'LootId':null,'Amount':0}", 1, 0, 0, "2019-01-09 00:00:00", 0),
	(52, "Ore wanted now! (3)", "Our research finally seems to be paying off. But we we still need more Endurium. Get 120 Endurium for us. We're counting on you!", "{'Id':52,'Active':false,'Ordered':false,'Mandatory':false,'MandatoryCount':0,'Elements':[{'Case':{'Id':0,'Active':false,'Ordered':false,'Mandatory':false,'MandatoryCount':0,'Elements':[]},'Condition':{'Id':52100,'Type':5,'Matches':[2],'Mandatory':true,'TargetValue':120,'State':{'CurrentValue':0.0,'Active':false,'Completed':false},'SubConditions':[]}}]}", "{'Exp':16000,'Honor':0,'Credits':16000,'Uridium':80,'LootId':null,'Amount':0}", 1, 0, 0, "2019-01-09 00:00:00", 0),
	(53, "Terbium wanted now!", "Deep in space, you'll find large quantities of Terbium: a golden ore which can be found floating around X-3 and X-4. We need these space rocks for research purposes. Power up your ship's engines and bring us 40 Terbium quickly. Keep an eye out for Lordakians and Mordons!", "{'Id':53,'Active':false,'Ordered':false,'Mandatory':false,'MandatoryCount':0,'Elements':[{'Case':{'Id':0,'Active':false,'Ordered':false,'Mandatory':false,'MandatoryCount':0,'Elements':[]},'Condition':{'Id':53100,'Type':5,'Matches':[3],'Mandatory':true,'TargetValue':40,'State':{'CurrentValue':0.0,'Active':false,'Completed':false},'SubConditions':[]}}]}", "{'Exp':8000,'Honor':0,'Credits':8000,'Uridium':30,'LootId':null,'Amount':0}", 1, 1, 0, "2019-01-01 00:00:00", 0),
	(54, "Terbium wanted now! (2)", "Terbium has helped speed up our research enormously. However, there are still many mysteries to uncover ... it's a very strange substance. We need more Terbium for research. 80 should be enough.", "{'Id':54,'Active':false,'Ordered':false,'Mandatory':false,'MandatoryCount':0,'Elements':[{'Case':{'Id':0,'Active':false,'Ordered':false,'Mandatory':false,'MandatoryCount':0,'Elements':[]},'Condition':{'Id':54100,'Type':5,'Matches':[3],'Mandatory':true,'TargetValue':80,'State':{'CurrentValue':0.0,'Active':false,'Completed':false},'SubConditions':[]}}]}", "{'Exp':16000,'Honor':0,'Credits':16000,'Uridium':40,'LootId':null,'Amount':0}", 1, 1, 0, "2019-01-09 00:00:00", 0),
	(56, "Show us what you're made of!", "Those pesky Streuners keep interfering with our work. Destroy 5 of them to scare them off. Make sure you're carrying enough laser ammo and rockets on board!", "{'Id':56,'Active':false,'Ordered':false,'Mandatory':false,'MandatoryCount':0,'Elements':[{'Case':{'Id':0,'Active':false,'Ordered':false,'Mandatory':false,'MandatoryCount':0,'Elements':[]},'Condition':{'Id':56100,'Type':27,'Matches':[1,1],'Mandatory':false,'TargetValue':5,'State':{'CurrentValue':0.0,'Active':false,'Completed':false},'SubConditions':[]}}]}", "{'Exp':2000,'Honor':0,'Credits':4000,'Uridium':30,'LootId':null,'Amount':0}", 1, 0, 0, "2019-01-01 00:00:00", 0),
	(57, "Show us what you're made of! (2)", "There are still way too many Streuners ... they're turning into a real pain. Shoot down another 10 of them.", "{'Id':57,'Active':false,'Ordered':false,'Mandatory':false,'MandatoryCount':0,'Elements':[{'Case':{'Id':0,'Active':false,'Ordered':false,'Mandatory':false,'MandatoryCount':0,'Elements':[]},'Condition':{'Id':57100,'Type':27,'Matches':[1,1],'Mandatory':false,'TargetValue':10,'State':{'CurrentValue':0.0,'Active':false,'Completed':false},'SubConditions':[]}}]}", "{'Exp':4000,'Honor':0,'Credits':8000,'Uridium':60,'LootId':null,'Amount':0}", 1, 0, 0, "2019-01-01 00:00:00", 0),
	(58, "Show us what you're made of! (3)", "The Streuners are getting harder to hold back, but we have to keep trying! Destroy 20 of them to keep them at bay. Lucky for us, they haven't been all that aggressive ... yet.", "{'Id':58,'Active':false,'Ordered':false,'Mandatory':false,'MandatoryCount':0,'Elements':[{'Case':{'Id':0,'Active':false,'Ordered':false,'Mandatory':false,'MandatoryCount':0,'Elements':[]},'Condition':{'Id':58100,'Type':27,'Matches':[1,1],'Mandatory':false,'TargetValue':20,'State':{'CurrentValue':0.0,'Active':false,'Completed':false},'SubConditions':[]}}]}", "{'Exp':16000,'Honor':0,'Credits':16000,'Uridium':60,'LootId':null,'Amount':0}", 1, 0, 0, "2019-01-09 00:00:00", 0),
	(59, "Lordakians sighted!", "", "{'Id':59,'Active':false,'Ordered':false,'Mandatory':false,'MandatoryCount':0,'Elements':[{'Case':{'Id':0,'Active':false,'Ordered':false,'Mandatory':false,'MandatoryCount':0,'Elements':[]},'Condition':{'Id':59100,'Type':27,'Matches':[1,2],'Mandatory':false,'TargetValue':10,'State':{'CurrentValue':0.0,'Active':false,'Completed':false},'SubConditions':[]}}]}", "{'Exp':4000,'Honor':100,'Credits':8000,'Uridium':60,'LootId':null,'Amount':0}", 1, 0, 0, "2019-01-01 00:00:00", 0),
	(60, "Lordakians sighted! (2)", "We've analyzed the last pictures taken from our research probe XF3LD. The Lordakians seem to be regrouping. Destroy 20 of them before they cause any further damage in our sectors.", "{'Id':60,'Active':false,'Ordered':false,'Mandatory':false,'MandatoryCount':0,'Elements':[{'Case':{'Id':0,'Active':false,'Ordered':false,'Mandatory':false,'MandatoryCount':0,'Elements':[]},'Condition':{'Id':60100,'Type':27,'Matches':[2,2],'Mandatory':false,'TargetValue':20,'State':{'CurrentValue':0.0,'Active':false,'Completed':false},'SubConditions':[]}}]}", "{'Exp':16000,'Honor':0,'Credits':16000,'Uridium':80,'LootId':null,'Amount':0}", 1, 0, 0, "2019-01-09 00:00:00", 0),
	(61, "Lordakians sighted! (3)", "There's no viable explanation, but the Lordakians have started attacking our sectors. That's bad news for us. Maybe if we launch a counterattack, things will settle down. Destroy 40 Lordakians.", "{'Id':61,'Active':false,'Ordered':false,'Mandatory':false,'MandatoryCount':0,'Elements':[{'Case':{'Id':0,'Active':false,'Ordered':false,'Mandatory':false,'MandatoryCount':0,'Elements':[]},'Condition':{'Id':61100,'Type':27,'Matches':[1,2],'Mandatory':false,'TargetValue':40,'State':{'CurrentValue':0.0,'Active':false,'Completed':false},'SubConditions':[]}}]}", "{'Exp':32000,'Honor':0,'Credits':32000,'Uridium':160,'LootId':null,'Amount':0}", 1, 0, 0, "2019-01-09 00:00:00", 0),
	(62, "Battle of the Mordons!", "For some time now, the sector 2RR0D0G-UV3 around Planet Terra has been under attack by aliens. Our scouts assume the Mordons are behind these attacks. It's time to take action: Destroy 10 Mordons on X-3 or X-4!", "{'Id':62,'Active':false,'Ordered':false,'Mandatory':false,'MandatoryCount':0,'Elements':[{'Case':{'Id':0,'Active':false,'Ordered':false,'Mandatory':false,'MandatoryCount':0,'Elements':[]},'Condition':{'Id':62100,'Type':27,'Matches':[1,4],'Mandatory':false,'TargetValue':10,'State':{'CurrentValue':0.0,'Active':false,'Completed':false},'SubConditions':[]}}]}", "{'Exp':16000,'Honor':0,'Credits':16000,'Uridium':40,'LootId':null,'Amount':0}", 1, 0, 0, "2019-01-09 00:00:00", 0),
	(63, "Battle of the Mordons! (2)", "", "{'Id':63,'Active':false,'Ordered':false,'Mandatory':false,'MandatoryCount':0,'Elements':[{'Case':{'Id':0,'Active':false,'Ordered':false,'Mandatory':false,'MandatoryCount':0,'Elements':[]},'Condition':{'Id':63100,'Type':27,'Matches':[1,4],'Mandatory':false,'TargetValue':20,'State':{'CurrentValue':0.0,'Active':false,'Completed':false},'SubConditions':[]}}]}", "{'Exp':32000,'Honor':0,'Credits':32000,'Uridium':80,'LootId':null,'Amount':0}", 1, 0, 0, "2019-01-09 00:00:00", 0),
	(65, "Devolarian invasion!", "Red alert! Devolarians are attacking the colonies in the X-3 sectors. If you're loyal to your company, then help them eliminate this threat. Search out and destroy 3 Devolarians on the X-3 maps.", "{'Id':65,'Active':false,'Ordered':false,'Mandatory':false,'MandatoryCount':0,'Elements':[{'Case':{'Id':0,'Active':false,'Ordered':false,'Mandatory':false,'MandatoryCount':0,'Elements':[]},'Condition':{'Id':65100,'Type':27,'Matches':[1,3],'Mandatory':false,'TargetValue':3,'State':{'CurrentValue':0.0,'Active':false,'Completed':false},'SubConditions':[]}}]}", "{'Exp':32000,'Honor':0,'Credits':32000,'Uridium':80,'LootId':null,'Amount':0}", 1, 0, 0, "2019-01-09 00:00:00", 0),
	(72, "Wretched Saimonites!", "Saimonites: Bounty hunters of the universe. Wherever there's war and money, the Saimonites are bound to be there. They're very aggressive and fast, but then again, so are you. Aren't you? Destroy 20 Saimonites on the X-3 and X-4 maps!", "{'Id':72,'Active':false,'Ordered':false,'Mandatory':false,'MandatoryCount':0,'Elements':[{'Case':{'Id':0,'Active':false,'Ordered':false,'Mandatory':false,'MandatoryCount':0,'Elements':[]},'Condition':{'Id':72100,'Type':27,'Matches':[1,6],'Mandatory':true,'TargetValue':20,'State':{'CurrentValue':0.0,'Active':false,'Completed':false},'SubConditions':[]}}]}", "{'Exp':16000,'Honor':0,'Credits':16000,'Uridium':40,'LootId':null,'Amount':0}", 1, 0, 0, "2019-01-09 00:00:00", 0),
	(73, "Wretched Saimonites! (2)", "We simply can't allow the Saimonites to keep getting in our way. You've got to do something! As long as there's no Saimonite mothership on our radar, we can still control the situation. Destroy 40 Saimonites!", "{'Id':73,'Active':false,'Ordered':false,'Mandatory':false,'MandatoryCount':0,'Elements':[{'Case':{'Id':0,'Active':false,'Ordered':false,'Mandatory':false,'MandatoryCount':0,'Elements':[]},'Condition':{'Id':73100,'Type':27,'Matches':[1,6],'Mandatory':false,'TargetValue':40,'State':{'CurrentValue':0.0,'Active':false,'Completed':false},'SubConditions':[]}}]}", "{'Exp':32000,'Honor':0,'Credits':32000,'Uridium':80,'LootId':null,'Amount':0}", 1, 0, 0, "2019-01-09 00:00:00", 0);

-- Dumping structure for table do_server_ge1.server_ranks
CREATE TABLE IF NOT EXISTS `server_ranks` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `RANK_NAME` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- Dumping data for table do_server_ge1.server_ranks: ~21 rows (approximately)
REPLACE INTO `server_ranks` (`ID`, `RANK_NAME`) VALUES
	(1, "Basic Space Pilot"),
	(2, "Space Pilot"),
	(3, "Chief Space Pilot"),
	(4, " Basic Sergeant"),
	(5, "Sergeant"),
	(6, "Chief Sergeant"),
	(7, "Basic Lieutenant"),
	(8, "Lieutenant"),
	(9, "Chief Lieutenant"),
	(10, "Basic Captain"),
	(11, "Captain"),
	(12, "Chief Captain"),
	(13, "Basic Major"),
	(14, "Major"),
	(15, "Chief Major"),
	(16, "Basic Colonel"),
	(17, "Colonel"),
	(18, "Chief Colonel"),
	(19, "Basic General"),
	(20, "General"),
	(21, "Administrator");

-- Dumping structure for table do_server_ge1.server_ships
CREATE TABLE IF NOT EXISTS `server_ships` (
  `ship_id` smallint(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL DEFAULT '-=[ ]=-',
  `inShop` tinyint(1) NOT NULL,
  `ship_lootid` varchar(100) NOT NULL DEFAULT '',
  `ship_hp` int(255) NOT NULL DEFAULT 1000,
  `nanohull` bigint(255) NOT NULL,
  `shield` int(255) NOT NULL DEFAULT 0,
  `shieldAbsorb` smallint(11) NOT NULL DEFAULT 20,
  `minDamage` int(255) NOT NULL DEFAULT 0,
  `maxDamage` int(11) NOT NULL DEFAULT 0,
  `base_speed` smallint(11) NOT NULL DEFAULT 150,
  `isNeutral` enum(0,1) NOT NULL DEFAULT 1,
  `laserID` tinyint(1) NOT NULL DEFAULT 0,
  `laser` bigint(255) NOT NULL,
  `heavy` bigint(255) NOT NULL DEFAULT 1,
  `generator` bigint(255) NOT NULL,
  `batteries` bigint(255) NOT NULL,
  `rockets` bigint(255) NOT NULL,
  `extra` int(11) NOT NULL,
  `gear` int(11) NOT NULL,
  `protocols` int(11) NOT NULL,
  `cargo` bigint(255) NOT NULL,
  `experience` int(11) NOT NULL DEFAULT 0,
  `honor` int(11) NOT NULL DEFAULT 0,
  `credits` int(11) NOT NULL DEFAULT 0,
  `uridium` int(11) NOT NULL DEFAULT 0,
  `rankPoints` bigint(20) NOT NULL DEFAULT 0,
  `AI` int(11) NOT NULL DEFAULT 0,
  `price_cre` int(11) NOT NULL,
  `price_uri` int(11) NOT NULL,
  `dropJSON` varchar(255) DEFAULT "",
  PRIMARY KEY (`ship_id`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=445 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- Dumping data for table do_server_ge1.server_ships: 117 rows
REPLACE INTO `server_ships` (`ship_id`, `name`, `inShop`, `ship_lootid`, `ship_hp`, `nanohull`, `shield`, `shieldAbsorb`, `minDamage`, `maxDamage`, `base_speed`, `isNeutral`, `laserID`, `laser`, `heavy`, `generator`, `batteries`, `rockets`, `extra`, `gear`, `protocols`, `cargo`, `experience`, `honor`, `credits`, `uridium`, `rankPoints`, `AI`, `price_cre`, `price_uri`, `dropJSON`) VALUES
	(1, "Phoenix", 1, "ship_phoenix", 4000, 4000, 2000, 50, 100, 150, 320, 1, 1, 1, 1, 1, 2000, 100, 1, 0, 0, 100, 100, 0, 0, 0, 0, 0, 0, 0, ""),
	(2, "Yamato", 1, "ship_yamato", 18000, 18000, 8000, 50, 200, 300, 300, 1, 1, 2, 1, 5, 4000, 200, 1, 0, 0, 200, 200, 2, 0, 0, 0, 0, 16000, 0, ""),
	(3, "Leonov", 1, "ship_leonov", 64000, 64000, 70000, 80, 2000, 2200, 360, 1, 1, 6, 1, 6, 6000, 300, 1, 0, 0, 500, 400, 4, 0, 0, 0, 0, 0, 15000, ""),
	(4, "Defcom", 1, "ship_defcom", 12000, 12000, 5000, 50, 600, 800, 340, 1, 1, 5, 1, 3, 8000, 400, 2, 0, 0, 300, 800, 8, 0, 0, 0, 0, 25000, 0, ""),
	(5, "Liberator", 1, "ship_liberator", 16000, 16000, 7500, 50, 400, 600, 330, 1, 1, 4, 1, 6, 10000, 500, 2, 0, 0, 400, 1600, 16, 0, 0, 0, 0, 40000, 0, ""),
	(6, "Piranha", 1, "ship_piranha", 64000, 64000, 10000, 60, 1000, 1200, 360, 1, 1, 7, 1, 6, 14000, 600, 2, 0, 0, 500, 3200, 32, 0, 0, 0, 0, 80000, 0, ""),
	(7, "Nostromo", 1, "ship_nostromo", 120000, 120000, 20000, 60, 1000, 1200, 340, 1, 1, 7, 1, 8, 16000, 700, 2, 0, 0, 600, 6400, 64, 0, 0, 0, 0, 100000, 0, ""),
	(8, "Vengeance", 1, "ship_vengeance", 180000, 180000, 145000, 90, 24000, 27000, 380, 1, 4, 10, 1, 10, 16000, 800, 2, 0, 0, 1000, 12800, 128, 0, 0, 0, 0, 0, 30000, ""),
	(9, "Bigboy", 1, "ship_bigboy", 180000, 180000, 75000, 70, 1400, 1600, 260, 1, 1, 8, 1, 16, 18000, 900, 3, 0, 0, 900, 25600, 256, 0, 0, 0, 0, 200000, 0, ""),
	(10, "Goliath", 1, "ship_goliath", 256000, 256000, 265000, 90, 42500, 48500, 300, 1, 4, 15, 1, 15, 32000, 1600, 3, 0, 0, 1500, 51200, 512, 0, 0, 0, 0, 0, 80000, ""),
	(11, "-=[demaNer]=-", 0, "", 400000, 0, 300000, 60, 3500, 4000, 300, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, ""),
	(12, "pet", 0, "", 80000, 0, 20, 60, 20, 20, 200, 0, 1, 7, 1, 6, 0, 0, 0, 2, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, ""),
	(13, "pet", 0, "", 120000, 0, 20, 60, 20, 20, 200, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, ""),
	(14, "pet", 0, "", 140000, 0, 20, 60, 20, 20, 200, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, ""),
	(15, "pet", 0, "", 170000, 0, 20, 60, 20, 20, 200, 1, 1, 15, 1, 10, 0, 0, 0, 5, 10, 0, 0, 0, 0, 0, 0, 0, 0, 0, ""),
	(16, "Adept", 0, "ship_vengeance_design_adept", 180000, 180000, 145000, 80, 24000, 25000, 380, 1, 4, 10, 1, 10, 16000, 800, 2, 0, 0, 1000, 12800, 128, 0, 0, 0, 0, 0, 30000, ""),
	(17, "Corsair", 0, "ship_vengeance_design_corsair", 180000, 180000, 145000, 80, 24000, 25000, 380, 1, 4, 10, 1, 10, 16000, 800, 2, 0, 0, 1000, 12800, 128, 0, 0, 0, 0, 0, 30000, ""),
	(18, "Lightning", 0, "ship_vengeance_design_lightning", 180000, 180000, 145000, 80, 24000, 25000, 380, 1, 4, 10, 1, 10, 16000, 800, 2, 0, 0, 1000, 12800, 128, 0, 0, 0, 0, 0, 250000, ""),
	(20, "UFO", 0, "", 3200000, 0, 2400000, 60, 120000, 125000, 250, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, ""),
	(21, "mini UFO", 0, "", 400000, 0, 300000, 60, 4000, 5000, 300, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, ""),
	(22, "pet", 0, "", 20000, 0, 20, 60, 20, 20, 200, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, ""),
	(23, "..::{Boss Streuner}::..", 0, "", 3200, 0, 1600, 60, 100, 120, 270, 1, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 1600, 8, 1600, 4, 2, 0, 0, 0, "{'Prometium':40,'Endurium':40,'Terbium':10,'Prometid':0,'Duranium':0,'Promerium':0,'Xenomit':0,'Seprom':0}"),
	(24, "..::{Boss Lordakia}::..", 0, "", 8000, 0, 8000, 60, 295, 350, 320, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 3200, 16, 3200, 8, 2, 0, 0, 0, "{'Prometium':80,'Endurium':80,'Terbium':80,'Prometid':10,'Duranium':0,'Promerium':0,'Xenomit':1,'Seprom':0}"),
	(25, "..::{Boss Saimon}::..", 0, "", 24000, 0, 12000, 60, 600, 720, 320, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 6400, 32, 6400, 16, 4, 0, 0, 0, "{'Prometium':160,'Endurium':160,'Terbium':160,'Prometid':8,'Duranium':8,'Promerium':1,'Xenomit':2,'Seprom':0}"),
	(26, "..::{Boss Devolarium}::..", 0, "", 400000, 0, 400000, 60, 4100, 4650, 200, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 25600, 128, 204800, 64, 8, 0, 0, 0, "{'Prometium':400,'Endurium':400,'Terbium':400,'Prometid':64,'Duranium':64,'Promerium':8,'Xenomit':8,'Seprom':0}"),
	(27, "..::{Boss Sibelonit}::..", 0, "", 160000, 0, 160000, 60, 3175, 4350, 320, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 12800, 128, 51200, 64, 6, 0, 0, 0, "{'Prometium':400,'Endurium':400,'Terbium':400,'Prometid':32,'Duranium':32,'Promerium':4,'Xenomit':8,'Seprom':0}"),
	(28, "..::{Boss Lordakium}::..", 0, "", 1200000, 0, 800000, 60, 10000, 16000, 230, 1, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 102400, 512, 819200, 256, 12, 0, 0, 0, "{'Prometium':1200,'Endurium':1200,'Terbium':1200,'Prometid':256,'Duranium':256,'Promerium':32,'Xenomit':32,'Seprom':0}"),
	(29, "..::{Boss Kristallin}::..", 0, "", 200000, 0, 160000, 60, 3600, 4700, 320, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 25600, 128, 51200, 64, 6, 0, 0, 0, "{'Prometium':400,'Endurium':400,'Terbium':400,'Prometid':64,'Duranium':64,'Promerium':4,'Xenomit':8,'Seprom':0}"),
	(30, "leonov", 0, "", 160000, 160000, 0, 0, 0, 0, 380, 1, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, ""),
	(31, "..::{Boss Mordon}::..", 0, "", 80000, 0, 40000, 60, 1300, 1500, 125, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 12800, 64, 51200, 32, 4, 0, 0, 0, "{'Prometium':320,'Endurium':320,'Terbium':320,'Prometid':32,'Duranium':32,'Promerium':8,'Xenomit':4,'Seprom':0}"),
	(32, "-=[Santabot]=-", 0, "", 1000, 0, 0, 20, 20, 0, 150, 1, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, ""),
	(33, "-=[Super Ice Metroid]=-", 0, "", 3200000, 0, 2400000, 60, 0, 0, 200, 1, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, ""),
	(34, "..::{Boss StreuneR}::..", 0, "", 80000, 0, 40000, 60, 1500, 2000, 280, 1, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 12800, 64, 51200, 32, 4, 0, 0, 0, "{'Prometium':320,'Endurium':320,'Terbium':320,'Prometid':32,'Duranium':32,'Promerium':0,'Xenomit':4,'Seprom':0}"),
	(35, "..::{Boss Kristallon}::..", 0, "", 1600000, 0, 1200000, 60, 15000, 20000, 250, 1, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 204800, 1024, 1634400, 512, 16, 0, 0, 0, "{'Prometium':1200,'Endurium':1200,'Terbium':1200,'Prometid':512,'Duranium':512,'Promerium':64,'Xenomit':64,'Seprom':0}"),
	(42, "<-o(Uber Kristallin)o->", 0, "", 400000, 0, 320000, 60, 7200, 9400, 250, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 51200, 256, 102400, 128, 12, 0, 0, 0, "{'Prometium':800,'Endurium':800,'Terbium':800,'Prometid':128,'Duranium':128,'Promerium':8,'Xenomit':16,'Seprom':0}"),
	(45, "<-o(Uber Kristallon)o->", 0, "", 3200000, 0, 2400000, 60, 30000, 45000, 200, 1, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 409600, 2048, 3268800, 1024, 32, 0, 0, 0, "{'Prometium':2400,'Endurium':2400,'Terbium':2400,'Prometid':512,'Duranium':512,'Promerium':128,'Xenomit':128,'Seprom':0}"),
	(46, "..::{Boss Sibelon}::..", 0, "", 800000, 0, 800000, 60, 9100, 12350, 100, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 51200, 256, 408600, 128, 10, 0, 0, 0, "{'Prometium':800,'Endurium':800,'Terbium':800,'Prometid':128,'Duranium':128,'Promerium':16,'Xenomit':32,'Seprom':0}"),
	(48, "-=[Carnivalbot]=-", 0, "", 1000, 0, 0, 60, 20, 20, 150, 1, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, ""),
	(49, "Aegis", 1, "ship_aegis", 275000, 275000, 0, 90, 30000, 40000, 300, 1, 0, 10, 1, 15, 15000, 3000, 3, 0, 0, 2000, 0, 0, 0, 0, 0, 0, 0, 250000, ""),
	(50, "Red bigboy", 0, "", 160000, 160000, 0, 0, 0, 0, 260, 1, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, ""),
	(52, "Amber", 0, "ship_goliath_design_amber", 256000, 256000, 265000, 92, 42500, 45000, 300, 1, 4, 15, 1, 15, 32000, 1600, 3, 0, 0, 1500, 51200, 512, 0, 0, 0, 0, 0, 125000, ""),
	(53, "Crismon", 0, "ship_goliath_design_crimson", 256000, 256000, 265000, 92, 42500, 45000, 300, 1, 4, 15, 1, 15, 32000, 1600, 3, 0, 0, 1500, 51200, 512, 0, 0, 0, 0, 0, 50000, ""),
	(54, "Sapphire", 0, "ship_goliath_design_sapphire", 256000, 256000, 265000, 92, 42500, 45000, 300, 1, 4, 15, 1, 15, 32000, 1600, 3, 0, 0, 1500, 51200, 512, 0, 0, 0, 0, 0, 125000, ""),
	(55, "Jade", 0, "ship_goliath_design_jade", 256000, 256000, 265000, 92, 42500, 45000, 300, 1, 4, 15, 1, 15, 32000, 1600, 3, 0, 0, 1500, 51200, 512, 0, 0, 0, 0, 0, 125000, ""),
	(56, "Enforcer", 0, "ship_goliath_design_enforcer", 256000, 256000, 265000, 92, 42500, 45000, 300, 1, 4, 15, 1, 15, 32000, 1600, 3, 0, 0, 1500, 51200, 512, 0, 0, 0, 0, 0, 50000, ""),
	(57, "USA", 0, "ship_goliath_design_independence", 256000, 256000, 265000, 92, 42500, 45000, 300, 1, 4, 15, 1, 15, 32000, 1600, 3, 0, 0, 1500, 51200, 512, 0, 0, 0, 0, 0, 50000, ""),
	(58, "Revenger", 0, "ship_vengeance_design_revenge", 180000, 180000, 145000, 80, 24000, 25000, 380, 1, 4, 10, 1, 10, 16000, 800, 2, 0, 0, 1000, 12800, 128, 0, 0, 0, 0, 0, 50000, ""),
	(59, "Bastion", 0, "ship_goliath_design_bastion", 256000, 256000, 265000, 92, 42500, 45000, 300, 1, 4, 15, 1, 15, 32000, 1600, 3, 0, 0, 1500, 51200, 512, 0, 0, 0, 0, 0, 50000, ""),
	(60, "Avenger", 0, "ship_vengeance_design_avenger", 180000, 180000, 145000, 80, 24000, 25000, 380, 1, 4, 10, 1, 10, 16000, 800, 2, 0, 0, 1000, 12800, 128, 0, 0, 0, 0, 0, 50000, ""),
	(61, "Veteran", 0, "ship_goliath_design_veteran", 256000, 256000, 265000, 92, 42500, 45000, 300, 1, 4, 15, 1, 15, 32000, 1600, 3, 0, 0, 1500, 51200, 512, 0, 0, 0, 0, 0, 50000, ""),
	(62, "Exalted", 0, "ship_goliath_design_exalted", 256000, 256000, 265000, 92, 42500, 45000, 300, 1, 4, 15, 1, 15, 32000, 1600, 3, 0, 0, 1500, 51200, 512, 0, 0, 0, 0, 0, 50000, ""),
	(63, "Solace", 0, "ship_goliath_design_solace", 256000, 256000, 265000, 92, 42500, 45000, 300, 1, 4, 15, 1, 15, 32000, 1600, 3, 0, 0, 1500, 51200, 512, 0, 0, 0, 0, 0, 250000, ""),
	(64, "Diminisher", 0, "ship_goliath_design_diminisher", 256000, 256000, 265000, 92, 42500, 45000, 300, 1, 4, 15, 1, 15, 32000, 1600, 3, 0, 0, 1500, 51200, 512, 0, 0, 0, 0, 0, 250000, ""),
	(65, "Spectrum", 0, "ship_goliath_design_spectrum", 256000, 256000, 265000, 92, 42500, 45000, 300, 1, 4, 15, 1, 15, 32000, 1600, 3, 0, 0, 1500, 51200, 512, 0, 0, 0, 0, 0, 250000, ""),
	(66, "Sentinel", 0, "ship_goliath_design_sentinel", 256000, 256000, 265000, 92, 42500, 45000, 300, 1, 4, 15, 1, 15, 32000, 1600, 3, 0, 0, 1500, 51200, 512, 0, 0, 0, 0, 0, 250000, ""),
	(67, "Venom", 0, "ship_goliath_design_venom", 256000, 256000, 265000, 92, 42500, 45000, 300, 1, 4, 15, 1, 15, 32000, 1600, 3, 0, 0, 1500, 51200, 512, 0, 0, 0, 0, 0, 250000, ""),
	(68, "Ignite", 0, "ship_goliath_design_ignite", 256000, 256000, 265000, 92, 42500, 45000, 300, 1, 4, 15, 1, 15, 32000, 1600, 3, 0, 0, 1500, 51200, 512, 0, 0, 0, 0, 0, 50000, ""),
	(69, "Citadel", 1, "ship_citadel", 550000, 550000, 0, 90, 25000, 35000, 240, 1, 0, 7, 2, 20, 20000, 2000, 5, 0, 0, 4000, 0, 0, 0, 0, 0, 0, 0, 300000, ""),
	(70, "Spearhead", 1, "ship_spearhead", 140000, 140000, 0, 80, 10000, 17000, 380, 1, 0, 7, 1, 12, 5000, 500, 2, 0, 0, 500, 0, 0, 0, 0, 0, 0, 0, 50000, ""),
	(71, "-=[Lordakia]=-", 0, "", 2000, 0, 2000, 60, 80, 100, 320, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 800, 4, 800, 2, 0, 0, 0, 0, "{'Prometium':20,'Endurium':20,'Terbium':20,'Prometid':0,'Duranium':0,'Promerium':0,'Xenomit':0,'Seprom':0}"),
	(72, "-=[Devolarium]=-", 0, "", 100000, 0, 100000, 60, 900, 1200, 200, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 6400, 32, 51200, 16, 4, 0, 0, 0, "{'Prometium':100,'Endurium':100,'Terbium':100,'Prometid':16,'Duranium':16,'Promerium':2,'Xenomit':0,'Seprom':0}"),
	(73, "-=[Mordon]=-", 0, "", 20000, 0, 10000, 60, 300, 400, 125, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 3200, 16, 6400, 8, 2, 0, 0, 0, "{'Prometium':80,'Endurium':80,'Terbium':80,'Prometid':8,'Duranium':8,'Promerium':1,'Xenomit':0,'Seprom':0}"),
	(74, "-=[Sibelon]=-", 0, "", 200000, 0, 200000, 60, 2250, 3000, 100, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 12800, 64, 102400, 32, 5, 0, 0, 0, "{'Prometium':200,'Endurium':200,'Terbium':200,'Prometid':32,'Duranium':32,'Promerium':4,'Xenomit':0,'Seprom':0}"),
	(75, "-=[Saimon]=-", 0, "", 6000, 0, 3000, 60, 150, 200, 320, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 1600, 8, 1600, 4, 2, 0, 0, 0, "{'Prometium':40,'Endurium':40,'Terbium':40,'Prometid':2,'Duranium':2,'Xenomit':0,'Promerium':0,'Seprom':0}"),
	(76, "-=[Sibelonit]=-", 0, "", 40000, 0, 40000, 60, 750, 1000, 320, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 3200, 16, 12800, 12, 3, 0, 0, 0, "{'Prometium':100,'Endurium':100,'Terbium':100,'Prometid':8,'Duranium':8,'Promerium':4,'Xenomit':0,'Seprom':0}"),
	(77, "-=[Lordakium]=-", 0, "", 300000, 0, 200000, 60, 3150, 3600, 230, 1, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 25600, 128, 204800, 64, 6, 0, 0, 0, "{'Prometium':300,'Endurium':300,'Terbium':300,'Prometid':64,'Duranium':64,'Promerium':8,'Xenomit':0,'Seprom':0}"),
	(78, "-=[Kristallin]=-", 0, "", 50000, 0, 40000, 60, 900, 1200, 320, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 6400, 32, 12800, 16, 3, 0, 0, 0, "{'Prometium':100,'Endurium':100,'Terbium':100,'Prometid':16,'Duranium':16,'Promerium':1,'Xenomit':0,'Seprom':0}"),
	(79, "-=[Kristallon]=-", 0, "", 400000, 0, 300000, 60, 3750, 5000, 250, 1, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 51200, 256, 409600, 128, 8, 0, 0, 0, "{'Prometium':300,'Endurium':300,'Terbium':300,'Prometid':128,'Duranium':128,'Promerium':16,'Xenomit':0,'Seprom':0}"),
	(80, "-=[Cubikon]=-", 0, "", 1600000, 0, 1200000, 60, 0, 0, 30, 1, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 512000, 4096, 1638400, 1024, 10, 0, 0, 0, "{'Prometium':1200,'Endurium':1200,'Terbium':1200,'Prometid':512,'Duranium':512,'Promerium':64,'Xenomit':128,'Seprom':0}"),
	(81, "-=[Protegit]=-", 0, "", 50000, 0, 40000, 60, 1125, 1500, 380, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 6400, 32, 12800, 16, 3, 0, 0, 0, "{'Prometium':100,'Endurium':100,'Terbium':100,'Prometid':16,'Duranium':16,'Promerium':2,'Xenomit':0,'Seprom':0}"),
	(82, "<==<Kucurbium>==>", 0, "", 5000000, 0, 5000000, 60, 20000, 25000, 200, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, ""),
	(83, "<==<Boss Kucurbium>==>", 0, "", 20000000, 0, 20000000, 60, 50000, 60000, 200, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, ""),
	(84, "-=[Streuner]=-", 0, "", 800, 0, 400, 60, 10, 20, 270, 1, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 400, 2, 400, 1, 0, 0, 0, 0, "{'Prometium':10,'Endurium':10,'Terbium':0,'Prometid':0,'Duranium':0,'Xenomit':0,'Promerium':0,'Seprom':0}"),
	(85, "-=[StreuneR]=-", 0, "", 20000, 0, 10000, 60, 350, 500, 280, 1, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 3200, 16, 6400, 8, 0, 0, 0, 0, "{'Prometium':80,'Endurium':80,'Terbium':80,'Prometid':8,'Duranium':8,'Promerium':0,'Xenomit':0,'Seprom':0}"),
	(86, "Kick", 0, "ship_goliath_design_kick", 256000, 256000, 265000, 92, 42500, 45000, 300, 1, 4, 15, 1, 15, 32000, 1600, 3, 0, 0, 1500, 51200, 512, 0, 0, 0, 0, 0, 0, ""),
	(87, "Referee", 0, "ship_goliath_design_referee", 256000, 256000, 265000, 92, 42500, 45000, 300, 1, 4, 15, 1, 15, 32000, 1600, 3, 0, 0, 1500, 51200, 512, 0, 0, 0, 0, 0, 0, ""),
	(88, "Goal", 0, "ship_goliath_design_goal", 256000, 256000, 265000, 92, 42500, 45000, 300, 1, 4, 15, 1, 15, 32000, 1600, 3, 0, 0, 1500, 51200, 512, 0, 0, 0, 0, 0, 0, ""),
	(89, "-=[Refreebot]=-", 0, "", 1000, 0, 0, 20, 20, 20, 150, 1, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, ""),
	(90, "-=[Century Falcon]=-", 0, "", 4000000, 0, 3000000, 60, 19000, 25000, 200, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 1000000, 5000, 1000000, 5000, 0, 0, 0, 0, ""),
	(91, "-=[Corsair]=-", 0, "", 200000, 0, 120000, 60, 6000, 8000, 320, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 10000, 32, 12000, 64, 0, 0, 0, 0, ""),
	(92, "-=[Outcast]=-", 0, "", 150000, 0, 80000, 60, 3800, 5000, 320, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 7500, 12, 7500, 24, 0, 0, 0, 0, ""),
	(93, "-=[Marauder]=-", 0, "", 100000, 0, 60000, 60, 3500, 4500, 380, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 4500, 8, 4500, 16, 0, 0, 0, 0, ""),
	(94, "-=[Vagrant]=-", 0, "", 40000, 0, 40000, 60, 1900, 2500, 380, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 2000, 4, 2000, 8, 0, 0, 0, 0, ""),
	(95, "-=[Convict]=-", 0, "", 400000, 0, 200000, 60, 9500, 12000, 340, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 18000, 64, 25000, 128, 0, 0, 0, 0, ""),
	(96, "-=[Hooligan]=-", 0, "", 250000, 0, 200000, 60, 7000, 9000, 340, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 12000, 16, 15000, 32, 0, 0, 0, 0, ""),
	(97, "-=[Ravager]=-", 0, "", 300000, 0, 200000, 60, 8000, 11000, 340, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 15000, 64, 20000, 128, 0, 0, 0, 0, ""),
	(98, "Police", 0, "ship_police", 100000000, 100000000, 1250000, 90, 500000, 525000, 1500, 1, 1, 50, 15, 50, 1000000, 1000000, 10, 0, 0, 2500000, 1000000, 100000, 0, 0, 0, 0, 0, 5000, ""),
	(99, "-=[Scorcher]=-", 0, "", 200000, 0, 200000, 60, 2500, 0, 280, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, ""),
	(100, "-=[Infernal]=-", 0, "", 60000, 0, 50000, 60, 950, 0, 300, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, ""),
	(101, "-=[Ice Meteoroid]=-", 0, "", 1600000, 0, 1200000, 60, 0, 0, 200, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, ""),
	(102, "-=[Melter]=-", 0, "", 1000, 0, 0, 20, 20, 0, 150, 1, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, ""),
	(103, "<=<Icy>=>", 0, "", 100000, 0, 80000, 60, 1500, 0, 450, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, ""),
	(104, "-=[Binarybot]=-", 0, "", 800000, 0, 1200000, 80, 20000, 0, 300, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, ""),
	(105, "-=[Devourer]=-", 0, "", 1000, 0, 0, 20, 20, 0, 150, 1, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, ""),
	(106, "-=[Lordakia]=-", 0, "", 2000, 0, 2000, 60, 80, 0, 320, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 800, 4, 800, 2, 0, 0, 0, 0, "{'Prometium':20,'Endurium':20,'Terbium':0,'Prometid':0,'Duranium':0,'Xenomit':0,'Promerium':0,'Seprom':0}"),
	(107, "-=[Solarburst]=-", 0, "", 1000, 0, 0, 20, 20, 0, 150, 1, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, ""),
	(108, "-=[Havok]=-", 0, "", 50000, 0, 50000, 60, 1400, 0, 300, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 12800, 64, 12800, 32, 0, 0, 0, 0, ""),
	(109, "Saturn", 0, "ship_goliath_design_saturn", 307200, 256000, 265000, 92, 42500, 45000, 300, 1, 4, 15, 1, 15, 32000, 1600, 3, 0, 0, 1500, 51200, 512, 0, 0, 0, 0, 0, 0, ""),
	(110, "Centaur", 0, "ship_goliath_design_centaur", 281600, 256000, 265000, 92, 42500, 45000, 300, 1, 4, 15, 1, 15, 32000, 1600, 3, 0, 0, 1500, 51200, 512, 0, 0, 0, 0, 0, 0, ""),
	(111, "-=[Interceptor]=-", 0, "", 60000, 0, 40000, 60, 350, 500, 450, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 7500, 24, 25000, 20, 1, 0, 0, 0, ""),
	(112, "-=[Barracuda]=-", 0, "", 180000, 0, 100000, 60, 4500, 6000, 430, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 15000, 56, 90000, 25, 2, 0, 0, 0, ""),
	(113, "-=[Saboteur]=-", 0, "", 200000, 0, 150000, 60, 3000, 4000, 430, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 22500, 72, 125000, 45, 2, 0, 0, 0, ""),
	(114, "-=[Annihilator]=-", 0, "", 300000, 0, 200000, 60, 12000, 14000, 350, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 75000, 128, 250000, 65, 6, 0, 0, 0, ""),
	(115, "-=[Battleray]=-", 0, "", 500000, 0, 400000, 60, 7000, 10000, 250, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 125000, 192, 1750000, 175, 8, 0, 0, 0, ""),
	(116, "-=[Hitac 2.0]=-", 0, "", 1000, 0, 0, 20, 20, 0, 150, 1, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, ""),
	(117, "-=[Minion]=-", 0, "", 1000, 0, 0, 20, 20, 0, 150, 1, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, ""),
	(118, "..::{Boss Twist}::..", 0, "", 1000, 0, 0, 20, 20, 0, 150, 1, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, ""),
	(119, "-=[Twist]=-", 0, "", 1000, 0, 0, 20, 20, 0, 150, 1, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, ""),
	(120, "-=[Turkey]=-", 0, "", 1000, 0, 0, 20, 20, 0, 150, 1, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, ""),
	(121, "-=[Snowman]=-", 0, "", 1000, 0, 0, 20, 20, 0, 150, 1, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, ""),
	(122, "-=[Emperor Kristallon]=-", 0, "", 1000, 0, 0, 20, 20, 0, 150, 1, 0, 50, 2, 50, 0, 0, 15, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 100, ""),
	(123, "-=[Emperor Lordakium]=-", 0, "", 1000, 0, 0, 20, 20, 0, 150, 1, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, ""),
	(124, "-=[Emperor Sibelon]=-", 0, "", 1000, 0, 0, 20, 20, 0, 150, 1, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, ""),
	(125, "-=[Mine Car]=-", 0, "", 1000, 0, 0, 20, 20, 0, 150, 1, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, ""),
	(442, "-=[Spaceball]=-", 0, "", 0, 0, 0, 0, 0, 0, 200, 1, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, ""),
	(443, "-=[Spaceball]=-", 0, "", 0, 0, 0, 0, 0, 0, 200, 1, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, ""),
	(444, "-=[Spaceball]=-", 0, "", 0, 0, 0, 0, 0, 0, 200, 1, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, "");

-- Dumping structure for table do_server_ge1.server_ships_designs
CREATE TABLE IF NOT EXISTS `server_ships_designs` (
  `Id` smallint(11) NOT NULL AUTO_INCREMENT,
  `ShipId` smallint(11) NOT NULL,
  `Name` varchar(255) NOT NULL DEFAULT '',
  `type` varchar(255) NOT NULL DEFAULT '',
  `inShop` tinyint(1) NOT NULL,
  `price_cre` int(11) NOT NULL,
  `price_uri` int(11) NOT NULL,
  `desc` varchar(500) NOT NULL,
  PRIMARY KEY (`Id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=111 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- Dumping data for table do_server_ge1.server_ships_designs: ~25 rows (approximately)
REPLACE INTO `server_ships_designs` (`Id`, `ShipId`, `Name`, `type`, `inShop`, `price_cre`, `price_uri`, `desc`) VALUES
	(16, 8, "Vengeance Adept", "ship_vengeance_design_adept", 1, 1000000, 0, "The Adept is an elite design for the Vengeance. It features a black and white color design and gives a passive 10% bonus to all experience points gained."),
	(17, 8, "Vengeance Corsair", "ship_vengeance_design_corsair", 1, 1000000, 0, "The Corsair is an elite design for the Vengeance and features a black and red paint job. The Corsair also comes along with a bonus of 10% more honor."),
	(18, 8, "Vengeance Lightning", "ship_vengeance_design_lightning", 0, 0, 250000, "The Lightning is an elite skill design for the Vengeance (this is the only skill design for the Vengeance). Not only does it give your ship a completely new look, but it also provides a 30% enhancement of your ship's speed with the 'Afterburner' effect. Along with that, you dish out an extra 5% more damage to enemy ships."),
	(52, 10, "Goliath Amber", "ship_goliath_design_amber", 1, 1000000, 0, "The Amber design is an elite design for the Goliath. It features an orange and silver paint job. This design does not have any bonuses. It use to be only obtainable through payment, but now it is obtainable through shop or auction."),
	(53, 10, "Goliath Crimson", "ship_goliath_design_crimson", 0, 1000000, 0, "The Crimson design is an elite design for the Goliath and is the very first design to be released into DarkOrbit. It features a red and black ship design. This design does not have any bonuses."),
	(54, 10, "Goliath Sapphire", "ship_goliath_design_sapphire", 1, 1000000, 0, "The Sapphire design was previously an elite payment bought design for the Goliath ship (see below). Features a blue and silver paint job. This design does not have any boosts."),
	(55, 10, "Goliath Jade", "ship_goliath_design_jade", 1, 1000000, 0, "The Jade design is an elite design for the Goliath. It features a green and silver paint job. This design does not have any bonuses. It use to be only obtainable through payment, but now it is obtainable through shop or auction."),
	(56, 10, "Goliath Enforcer", "ship_goliath_design_enforcer", 1, 1000000, 0, "The Enforcer (realeased sometime after the Crimson design and realeased together with the Bastion) is and elite design that features red flames on a black chromatic design and is one of the first two design to have an extra passive bonus (along with the Bastion). It has a passive bonus of 5% damage dealt to players and aliens."),
	(57, 10, "Goliath Stars and Stripes", "ship_goliath_design_independence", 0, 0, 20000, ""),
	(58, 8, "Vengeance Revenge", "ship_vengeance_design_revenge", 1, 1000000, 0, "The Revenge is an elite design for the Vengeance. It gives a passive bonus of 10% more damage and features a red color design."),
	(59, 10, "Goliath Bastion", "ship_goliath_design_bastion", 1, 1000000, 0, "The Bastion is an Elite Design for the Goliath and features a bright blue and silver paint job and is one of the first two designs to have an extra passive bonus (along with the Enforcer). It also provides a passive bonus of 10% shield strength to your ship."),
	(60, 8, "Vengeance Avenger", "ship_vengeance_design_avenger", 1, 1000000, 0, "The Avenger is an elite design for the Vengeance. It gives a passive bonus of 10% more shield strength and features a blue color design."),
	(61, 10, "Goliath Veteran", "ship_goliath_design_veteran", 1, 1000000, 0, "The Veteran is an elite design for the Goliath. It features a black and white color design, while giving a passive 10% to all experience points gained."),
	(62, 10, "Goliath Exalted", "ship_goliath_design_exalted", 1, 1000000, 0, "The Exalted is a design for the Goliath that gives a bonus of 10% more Honor and features a red and silver design."),
	(63, 10, "Solace", "ship_goliath_design_solace", 0, 0, 250000, "This design not only gives your Goliath Battlecruiser a completely new look but it also lets you repair your ship hull and the hulls of group members immediately with the 'Nano-Cluster Repairer'. It also increases your shield power by 10%."),
	(64, 10, "Diminisher", "ship_goliath_design_diminisher", 0, 0, 250000, "This design doesn't just change the look of your Goliath Battlecruiser. Use its 'Weaken Shield' ability to increase damage to enemy shields by 50%, though your shield's strength will be reduced by 30% once the effect wears off. Not only that, but you'll also do an extra 5% damage."),
	(65, 10, "Spectrum", "ship_goliath_design_spectrum", 0, 0, 250000, "Change the look of your Goliath Battlecruiser and render enemy laser attacks almost useless with this design's 'Prismatic Shielding' capability. It'll also temporarily weaken your enemy's lasers, and give you 10% more shield power in return."),
	(66, 10, "Sentinel", "ship_goliath_design_sentinel", 0, 0, 250000, "Give your Goliath Battlecruiser a futuristic new look with the Sentinel design. Its 'Fortress' capability will give your shields a massive power boost, and you'll also benefit from a 10% shield bonus."),
	(67, 10, "Venom", "ship_goliath_design_venom", 0, 0, 250000, "Breathe life into your Goliath Battlecruiser with this brand-new design. It'll give your ship a 5% damage bonus and its singularity function will give you a massive damage boost temporarily."),
	(68, 10, "Goliath Ignite", "ship_goliath_design_ignite", 0, 2000000, 0, "Ignite is s special design for the Goliath ship, which is currently only achieved by inviting 25 friends to DarkOrbit, through the Friends & Bonuses method. It does not give any bonus and is only decorative."),
	(86, 10, "Goliath Kick", "ship_goliath_design_kick", 0, 0, 150000, "Kick design for the Goliath with a 10% shield bonus. Soccer crazy? Then act now and show off your passion for the beautiful game! In comparison to the Bastion, Sentinel, Solace, and Spectrum, the Kick is only comparable to the Bastion since all other designs are skill designs."),
	(87, 10, "Goliath Referee", "ship_goliath_design_referee", 0, 0, 150000, "Referee design for the Goliath. Exude authority with this design and increase your damage by 5%. In comparison to the Enforcer, Venom, and Diminisher, the Referee is only comparable to the Enforcer since all the other designs are Skill Designs."),
	(88, 10, "Goliath Goal", "ship_goliath_design_goal", 0, 0, 150000, "Goal design for the Goliath with 10% XP bonus. Soccer crazy? Then act now and bring soccer to space. In comparison to the Veteran, the Goal is its equal, but much harder to get."),
	(109, 10, "Goliath Saturn", "ship_goliath_design_saturn", 0, 0, 150000, "The Saturn Design provides a 20% HP bonus when selected."),
	(110, 10, "Goliath Centaur", "ship_goliath_design_centaur", 0, 0, 150000, "The Centaur Design provides a 10% HP bonus when selected.");

-- Dumping structure for table do_server_ge1.server_titles
CREATE TABLE IF NOT EXISTS `server_titles` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `KEY` varchar(255) NOT NULL,
  `TITLE_NAME` varchar(255) NOT NULL,
  `TITLE_COLOR` int(11) NOT NULL,
  `TITLE_COLOR_HEX` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=459 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- Dumping data for table do_server_ge1.server_titles: ~60 rows (approximately)
REPLACE INTO `server_titles` (`ID`, `KEY`, `TITLE_NAME`, `TITLE_COLOR`, `TITLE_COLOR_HEX`) VALUES
	(1, "title_1", "Master of the Orbit", 1, "#FFF"),
	(2, "title_2", "Space Cleaner", 1, "#FFF"),
	(3, "title_3", "Dark Pilot", 1, "#FFF"),
	(4, "title_4", "Emperor", 1, "#FFF"),
	(5, "title_5", "Newbie", 1, "#FFF"),
	(6, "title_6", "Goli Hunter", 1, "#FFF"),
	(7, "title_7", "Boss", 1, "#FFF"),
	(8, "title_8", "Alien Hunter", 1, "#FFF"),
	(9, "title_9", "Sharpshooter", 1, "#FFF"),
	(10, "title_10", "Space Whiz", 1, "#FFF"),
	(11, "title_11", "Orbit King", 1, "#FFF"),
	(12, "title_12", "Phoenix Shock", 1, "#FFF"),
	(13, "title_13", "Chaos Pilot", 1, "#FFF"),
	(14, "title_14", "Most Wanted", 1, "#FFF"),
	(15, "title_15", "Portal Guard", 1, "#FFF"),
	(16, "title_16", "Battle Master", 1, "#FFF"),
	(17, "title_17", "System Lord", 1, "#FFF"),
	(18, "title_18", "The Legend", 1, "#FFF"),
	(19, "title_19", "PvP Hunter of the Day", 1, "#FFF"),
	(20, "title_20", "Pirate Hunter", 1, "#FFF"),
	(21, "title_21", "Spring Fighter MMO 2", 1, "#FFF"),
	(22, "title_22", "Spring Fighter EIC 2", 1, "#FFF"),
	(23, "title_23", "Spring Fighter VRU 2", 1, "#FFF"),
	(100, "title_100", "Spring Fighter MMO", 1, "#FFF"),
	(101, "title_101", "Spring Fighter VRU", 1, "#FFF"),
	(102, "title_102", "Spring Fighter EIC", 1, "#FFF"),
	(104, "title_104", "Spring Fighter MMO 2", 1, "#FFF"),
	(105, "title_105", "Spring Fighter VRU 2", 1, "#FFF"),
	(106, "title_106", "Spring Fighter EIC 2", 1, "#FFF"),
	(107, "title_107", "Spring King MMO", 1, "#FFF"),
	(108, "title_108", "Spring King EIC", 1, "#FFF"),
	(109, "title_109", "Spring King VRU", 1, "#FFF"),
	(200, "title_200", "Pirate-Hunting Champion", 1, "#FFF"),
	(201, "title_201", "Pirate Hunter", 1, "#FFF"),
	(202, "title_202", "Pirate Destroyer", 1, "#FFF"),
	(203, "title_203", "Pirate Annihilator", 1, "#FFF"),
	(204, "title_204", "All-Star", 1, "#FFF"),
	(205, "title_205", "Boss of Bosses", 1, "#FFF"),
	(222, "lord_of_like", "Lord Of Likes", 222, "#3B5998"),
	(299, "title_299", "Time killer", 1, "#FFF"),
	(300, "title_300", "Error in space-time continuum?", 1, "#FFF"),
	(301, "title_301", "Matador", 1, "#FFF"),
	(302, "title_302", "Death-defying", 1, "#FFF"),
	(303, "title_303", "Orbit drifter", 1, "#FFF"),
	(304, "title_304", "Godfather", 1, "#FFF"),
	(305, "title_305", "Enlightened", 1, "#FFF"),
	(306, "title_306", "Honored", 1, "#FFF"),
	(307, "title_307", "Transcendent", 1, "#FFF"),
	(308, "title_308", "Expert", 1, "#FFF"),
	(309, "title_309", "Legend", 1, "#FFF"),
	(310, "title_310", "P.E.T. Animal Trainer", 1, "#FFF"),
	(311, "title_311", "P.E.T. commander", 1, "#FFF"),
	(312, "title_312", "Ninja Master", 1, "#FFF"),
	(363, "title_363", "Immortal", 365, "#CCCCCC"),
	(364, "title_364", "Golden Score Maker / 2018", 364, "#AAAA00"),
	(365, "title_365", "Silver Score Maker / 2018", 365, "#CCCCCC"),
	(366, "title_366", "Bronze Score Maker / 2018", 366, "#CD7F32"),
	(367, "title_367", "Scoring Legend", 1, "#FFF"),
	(410, "title_410", "Football Official", 1, "#FFF"),
	(458, "title_458", "Blizzard", 1, "#FFF");

-- Dumping structure for table do_server_ge1.server_voucher_codes
CREATE TABLE IF NOT EXISTS `server_voucher_codes` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `CODE` varchar(255) NOT NULL,
  `CODE_DESC` varchar(255) NOT NULL,
  `REWARD` varchar(255) NOT NULL,
  `AMOUNT` int(11) NOT NULL,
  PRIMARY KEY (`ID`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- Dumping structure for trigger do_server_ge1.LAST_MODIFIED
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE=`NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION`;
DELIMITER //
CREATE TRIGGER `LAST_MODIFIED` BEFORE UPDATE ON `player_data` FOR EACH ROW

	IF NEW.URIDIUM <> OLD.URIDIUM

    OR NEW.CREDITS <> OLD.CREDITS

    OR NEW.EXP <> OLD.EXP

    OR NEW.LVL <> OLD.LVL

    OR NEW.HONOR <> OLD.HONOR

THEN

	SET NEW.LAST_MODIFIED = NOW();

END IF//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
