-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 05, 2018 at 11:14 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `do_server_ge1`
--

-- --------------------------------------------------------

--
-- Table structure for table `player_ammo`
--

CREATE TABLE `player_ammo` (
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
  `EMP_M01` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `player_ammo`
--

INSERT INTO `player_ammo` (`USER_ID`, `PLAYER_ID`, `LCB_10`, `MCB_25`, `MCB_50`, `SAB_50`, `UCB_100`, `RSB_75`, `JOB_100`, `CBO_100`, `RB_214`, `DCR_250`, `PLD_8`, `HSTRM_01`, `UBR_100`, `SAR_01`, `SAR_02`, `PLT_2021`, `PLT_2026`, `PLT_3030`, `R_310`, `ECO_10`, `BDR_1211`, `WIZ_X`, `CBR`, `ACM_01`, `SL_M01`, `DD_M01`, `SAB_M01`, `EMP_01`, `EMP_M01`) VALUES
(1, 1000, 245760, 60000, 21160, 0, 8840, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 196, 0, 581, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `player_data`
--

CREATE TABLE `player_data` (
  `USER_ID` int(11) NOT NULL DEFAULT '0',
  `PLAYER_ID` int(11) NOT NULL,
  `SESSION_ID` varchar(255) NOT NULL,
  `PLAYER_NAME` varchar(255) NOT NULL,
  `FACTION_ID` int(11) NOT NULL,
  `TITLE_ID` int(11) NOT NULL,
  `LVL` int(30) NOT NULL DEFAULT '1',
  `EXP` int(11) NOT NULL,
  `HONOR` int(11) NOT NULL,
  `RANK_POINTS` float NOT NULL,
  `RANK` int(99) NOT NULL DEFAULT '1',
  `URIDIUM` float(11,1) NOT NULL,
  `CREDITS` float(11,1) NOT NULL,
  `PREMIUM` tinyint(1) NOT NULL,
  `PREMIUM_UNTIL` datetime NOT NULL,
  `GG_RINGS` int(11) NOT NULL,
  `JACKPOT` float NOT NULL,
  `CLAN_ID` int(11) NOT NULL,
  `REGISTERED` datetime NOT NULL,
  `RANKING` int(11) NOT NULL,
  `LAST_MODIFIED` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `player_data`
--

INSERT INTO `player_data` (`USER_ID`, `PLAYER_ID`, `SESSION_ID`, `PLAYER_NAME`, `FACTION_ID`, `TITLE_ID`, `LVL`, `EXP`, `HONOR`, `RANK_POINTS`, `RANK`, `URIDIUM`, `CREDITS`, `PREMIUM`, `PREMIUM_UNTIL`, `GG_RINGS`, `JACKPOT`, `CLAN_ID`, `REGISTERED`, `RANKING`, `LAST_MODIFIED`) VALUES
(1, 1000, '98915450nvlr3e8s28nsi05d3d', 'general_Rejection', 1, 0, 17, 3832800, 28380, 0, 1, 429446.0, 13816400.0, 0, '0000-00-00 00:00:00', 0, 0, 0, '2018-08-28 00:18:43', 99999, '2018-10-04 12:09:55');

--
-- Triggers `player_data`
--
DELIMITER $$
CREATE TRIGGER `LAST_MODIFIED` BEFORE UPDATE ON `player_data` FOR EACH ROW IF NEW.URIDIUM <> OLD.URIDIUM 

    OR NEW.CREDITS <> OLD.CREDITS

    OR NEW.EXP <> OLD.EXP

    OR NEW.LVL <> OLD.LVL

    OR NEW.HONOR <> OLD.HONOR

THEN

	SET NEW.LAST_MODIFIED = NOW();

END IF
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `player_deaths`
--

CREATE TABLE `player_deaths` (
  `ID` int(11) NOT NULL,
  `PLAYER_ID` int(11) NOT NULL,
  `KILLER_NAME` varchar(255) NOT NULL,
  `KILLER_LINK` text NOT NULL,
  `DEATH_TYPE` int(11) NOT NULL,
  `ALIAS` varchar(255) NOT NULL,
  `TIME_OF_DEATH` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `player_deaths`
--

INSERT INTO `player_deaths` (`ID`, `PLAYER_ID`, `KILLER_NAME`, `KILLER_LINK`, `DEATH_TYPE`, `ALIAS`, `TIME_OF_DEATH`) VALUES
(1, 1000, 'Unknown', 'null', 2, 'MISC', '2018-09-29 01:18:18'),
(2, 1000, '..::{Boss Lordakia}::..', 'null', 1, 'MISC', '2018-10-02 19:02:38');

-- --------------------------------------------------------

--
-- Table structure for table `player_drones`
--

CREATE TABLE `player_drones` (
  `ID` int(11) NOT NULL,
  `USER_ID` int(11) NOT NULL,
  `PLAYER_ID` int(11) NOT NULL,
  `ITEM_ID` int(11) NOT NULL,
  `DRONE_TYPE` int(11) NOT NULL,
  `DAMAGE` varchar(255) NOT NULL COMMENT '(NOT ATTACK DAMAGE)',
  `LEVEL` int(11) NOT NULL DEFAULT '1',
  `EXPERIENCE` int(11) NOT NULL,
  `UPGRADE_LVL` int(11) NOT NULL,
  `DESIGN_1` int(11) NOT NULL DEFAULT '0',
  `DESIGN_2` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `player_drones`
--

INSERT INTO `player_drones` (`ID`, `USER_ID`, `PLAYER_ID`, `ITEM_ID`, `DRONE_TYPE`, `DAMAGE`, `LEVEL`, `EXPERIENCE`, `UPGRADE_LVL`, `DESIGN_1`, `DESIGN_2`) VALUES
(1, 1, 1000, 14, 1, '0%', 1, 0, 1, 0, 0),
(2, 1, 1000, 14, 1, '0%', 1, 0, 1, 0, 0),
(3, 1, 1000, 14, 1, '0%', 1, 0, 1, 0, 0),
(4, 1, 1000, 14, 1, '0%', 1, 0, 1, 0, 0),
(5, 1, 1000, 14, 1, '0%', 1, 0, 1, 0, 0),
(6, 1, 1000, 14, 1, '0%', 1, 0, 1, 0, 0),
(7, 1, 1000, 14, 1, '0%', 1, 0, 1, 0, 0),
(8, 1, 1000, 14, 1, '0%', 1, 0, 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `player_equipment`
--

CREATE TABLE `player_equipment` (
  `ID` int(11) NOT NULL,
  `USER_ID` int(11) NOT NULL,
  `PLAYER_ID` int(11) NOT NULL,
  `ITEM_ID` int(11) NOT NULL,
  `ITEM_TYPE` tinyint(4) NOT NULL,
  `ITEM_LVL` tinyint(4) NOT NULL DEFAULT '1',
  `ON_CONFIG_1` varchar(255) NOT NULL DEFAULT '{ "hangars" : [] }',
  `ON_CONFIG_2` varchar(255) NOT NULL DEFAULT '{ "hangars" : [] }',
  `ON_DRONE_ID_1` varchar(255) NOT NULL DEFAULT '{ "hangars" : [],"droneID":[] }',
  `ON_DRONE_ID_2` varchar(255) NOT NULL DEFAULT '{ "hangars" : [],"droneID":[] }',
  `ON_PET_1` varchar(255) NOT NULL DEFAULT '{ "hangars" : [] }',
  `ON_PET_2` varchar(255) NOT NULL DEFAULT '{ "hangars" : [] }',
  `ITEM_AMOUNT` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `player_equipment`
--

INSERT INTO `player_equipment` (`ID`, `USER_ID`, `PLAYER_ID`, `ITEM_ID`, `ITEM_TYPE`, `ITEM_LVL`, `ON_CONFIG_1`, `ON_CONFIG_2`, `ON_DRONE_ID_1`, `ON_DRONE_ID_2`, `ON_PET_1`, `ON_PET_2`, `ITEM_AMOUNT`) VALUES
(1, 1, 1000, 1, 0, 1, '{\"hangars\":[\"2\"]}', '{ \"hangars\" : [] }', '{ \"hangars\" : [],\"droneID\":[] }', '{ \"hangars\" : [],\"droneID\":[] }', '{ \"hangars\" : [] }', '{ \"hangars\" : [] }', 0),
(2, 1, 1000, 6, 2, 1, '{ \"hangars\" : [] }', '{ \"hangars\" : [] }', '{\"hangars\":[\"2\"],\"droneID\":[\"1\"]}', '{\"hangars\":[\"2\"],\"droneID\":[\"8\"]}', '{ \"hangars\" : [] }', '{ \"hangars\" : [] }', 0),
(3, 1, 1000, 21, 3, 0, '{ \"hangars\" : [] }', '{ \"hangars\" : [] }', '{ \"hangars\" : [],\"droneID\":[] }', '{ \"hangars\" : [],\"droneID\":[] }', '{ \"hangars\" : [] }', '{ \"hangars\" : [] }', 0),
(4, 1, 1000, 55, 10, 0, '{\"hangars\":[\"2\"]}', '{\"hangars\":[\"2\"]}', '{ \"hangars\" : [],\"droneID\":[] }', '{ \"hangars\" : [],\"droneID\":[] }', '{ \"hangars\" : [] }', '{ \"hangars\" : [] }', 0),
(5, 1, 1000, 21, 3, 1, '{\"hangars\":[]}', '{\"hangars\":[\"2\"]}', '{ \"hangars\" : [],\"droneID\":[] }', '{ \"hangars\" : [],\"droneID\":[] }', '{ \"hangars\" : [] }', '{ \"hangars\" : [] }', NULL),
(6, 1, 1000, 21, 3, 1, '{\"hangars\":[]}', '{\"hangars\":[\"2\"]}', '{ \"hangars\" : [],\"droneID\":[] }', '{ \"hangars\" : [],\"droneID\":[] }', '{ \"hangars\" : [] }', '{ \"hangars\" : [] }', NULL),
(7, 1, 1000, 21, 3, 1, '{\"hangars\":[]}', '{\"hangars\":[\"2\"]}', '{ \"hangars\" : [],\"droneID\":[] }', '{ \"hangars\" : [],\"droneID\":[] }', '{ \"hangars\" : [] }', '{ \"hangars\" : [] }', NULL),
(8, 1, 1000, 21, 3, 1, '{\"hangars\":[]}', '{\"hangars\":[\"2\"]}', '{ \"hangars\" : [],\"droneID\":[] }', '{ \"hangars\" : [],\"droneID\":[] }', '{ \"hangars\" : [] }', '{ \"hangars\" : [] }', NULL),
(9, 1, 1000, 21, 3, 1, '{\"hangars\":[]}', '{\"hangars\":[\"2\"]}', '{ \"hangars\" : [],\"droneID\":[] }', '{ \"hangars\" : [],\"droneID\":[] }', '{ \"hangars\" : [] }', '{ \"hangars\" : [] }', NULL),
(10, 1, 1000, 21, 3, 1, '{\"hangars\":[]}', '{\"hangars\":[\"2\"]}', '{ \"hangars\" : [],\"droneID\":[] }', '{ \"hangars\" : [],\"droneID\":[] }', '{ \"hangars\" : [] }', '{ \"hangars\" : [] }', NULL),
(11, 1, 1000, 21, 3, 1, '{\"hangars\":[]}', '{\"hangars\":[\"2\"]}', '{ \"hangars\" : [],\"droneID\":[] }', '{ \"hangars\" : [],\"droneID\":[] }', '{ \"hangars\" : [] }', '{ \"hangars\" : [] }', NULL),
(12, 1, 1000, 21, 3, 1, '{\"hangars\":[]}', '{\"hangars\":[\"2\"]}', '{ \"hangars\" : [],\"droneID\":[] }', '{ \"hangars\" : [],\"droneID\":[] }', '{ \"hangars\" : [] }', '{ \"hangars\" : [] }', NULL),
(13, 1, 1000, 21, 3, 1, '{\"hangars\":[]}', '{\"hangars\":[\"2\"]}', '{ \"hangars\" : [],\"droneID\":[] }', '{ \"hangars\" : [],\"droneID\":[] }', '{ \"hangars\" : [] }', '{ \"hangars\" : [] }', NULL),
(14, 1, 1000, 21, 3, 1, '{\"hangars\":[]}', '{\"hangars\":[\"2\"]}', '{ \"hangars\" : [],\"droneID\":[] }', '{ \"hangars\" : [],\"droneID\":[] }', '{ \"hangars\" : [] }', '{ \"hangars\" : [] }', NULL),
(15, 1, 1000, 21, 3, 1, '{\"hangars\":[]}', '{\"hangars\":[\"2\"]}', '{ \"hangars\" : [],\"droneID\":[] }', '{ \"hangars\" : [],\"droneID\":[] }', '{ \"hangars\" : [] }', '{ \"hangars\" : [] }', NULL),
(16, 1, 1000, 21, 3, 1, '{\"hangars\":[]}', '{\"hangars\":[\"2\"]}', '{ \"hangars\" : [],\"droneID\":[] }', '{ \"hangars\" : [],\"droneID\":[] }', '{ \"hangars\" : [] }', '{ \"hangars\" : [] }', NULL),
(17, 1, 1000, 21, 3, 1, '{\"hangars\":[]}', '{\"hangars\":[\"2\"]}', '{ \"hangars\" : [],\"droneID\":[] }', '{ \"hangars\" : [],\"droneID\":[] }', '{ \"hangars\" : [] }', '{ \"hangars\" : [] }', NULL),
(18, 1, 1000, 21, 3, 1, '{\"hangars\":[]}', '{\"hangars\":[\"2\"]}', '{ \"hangars\" : [],\"droneID\":[] }', '{ \"hangars\" : [],\"droneID\":[] }', '{ \"hangars\" : [] }', '{ \"hangars\" : [] }', NULL),
(19, 1, 1000, 21, 3, 1, '{\"hangars\":[]}', '{\"hangars\":[\"2\"]}', '{ \"hangars\" : [],\"droneID\":[] }', '{ \"hangars\" : [],\"droneID\":[] }', '{ \"hangars\" : [] }', '{ \"hangars\" : [] }', NULL),
(20, 1, 1000, 1, 0, 1, '{\"hangars\":[\"2\"]}', '{\"hangars\":[\"2\"]}', '{ \"hangars\" : [],\"droneID\":[] }', '{ \"hangars\" : [],\"droneID\":[] }', '{ \"hangars\" : [] }', '{ \"hangars\" : [] }', NULL),
(21, 1, 1000, 1, 0, 1, '{ \"hangars\" : [] }', '{ \"hangars\" : [] }', '{\"hangars\":[\"2\"],\"droneID\":[\"3\"]}', '{\"hangars\":[\"2\"],\"droneID\":[\"6\"]}', '{ \"hangars\" : [] }', '{ \"hangars\" : [] }', NULL),
(22, 1, 1000, 1, 0, 1, '{\"hangars\":[\"2\"]}', '{ \"hangars\" : [] }', '{ \"hangars\" : [],\"droneID\":[] }', '{\"hangars\":[\"2\"],\"droneID\":[\"1\"]}', '{ \"hangars\" : [] }', '{ \"hangars\" : [] }', NULL),
(23, 1, 1000, 1, 0, 1, '{ \"hangars\" : [] }', '{\"hangars\":[\"2\"]}', '{\"hangars\":[\"2\"],\"droneID\":[\"8\"]}', '{ \"hangars\" : [],\"droneID\":[] }', '{ \"hangars\" : [] }', '{ \"hangars\" : [] }', NULL),
(24, 1, 1000, 1, 0, 1, '{ \"hangars\" : [] }', '{ \"hangars\" : [] }', '{\"hangars\":[\"2\"],\"droneID\":[\"1\"]}', '{\"hangars\":[\"2\"],\"droneID\":[\"4\"]}', '{ \"hangars\" : [] }', '{ \"hangars\" : [] }', NULL),
(25, 1, 1000, 1, 0, 1, '{\"hangars\":[\"2\"]}', '{ \"hangars\" : [] }', '{ \"hangars\" : [],\"droneID\":[] }', '{\"hangars\":[\"2\"],\"droneID\":[\"3\"]}', '{ \"hangars\" : [] }', '{ \"hangars\" : [] }', NULL),
(26, 1, 1000, 1, 0, 1, '{ \"hangars\" : [] }', '{\"hangars\":[\"2\"]}', '{\"hangars\":[\"2\"],\"droneID\":[\"7\"]}', '{ \"hangars\" : [],\"droneID\":[] }', '{ \"hangars\" : [] }', '{ \"hangars\" : [] }', NULL),
(27, 1, 1000, 1, 0, 1, '{ \"hangars\" : [] }', '{ \"hangars\" : [] }', '{\"hangars\":[\"2\"],\"droneID\":[\"5\"]}', '{\"hangars\":[\"2\"],\"droneID\":[\"4\"]}', '{ \"hangars\" : [] }', '{ \"hangars\" : [] }', NULL),
(28, 1, 1000, 1, 0, 1, '{\"hangars\":[\"2\"]}', '{\"hangars\":[\"2\"]}', '{ \"hangars\" : [],\"droneID\":[] }', '{ \"hangars\" : [],\"droneID\":[] }', '{ \"hangars\" : [] }', '{ \"hangars\" : [] }', NULL),
(29, 1, 1000, 1, 0, 1, '{ \"hangars\" : [] }', '{\"hangars\":[\"2\"]}', '{ \"hangars\" : [],\"droneID\":[] }', '{ \"hangars\" : [],\"droneID\":[] }', '{ \"hangars\" : [] }', '{ \"hangars\" : [] }', NULL),
(30, 1, 1000, 1, 0, 1, '{\"hangars\":[\"2\"]}', '{ \"hangars\" : [] }', '{ \"hangars\" : [],\"droneID\":[] }', '{\"hangars\":[\"2\"],\"droneID\":[\"2\"]}', '{ \"hangars\" : [] }', '{ \"hangars\" : [] }', NULL),
(31, 1, 1000, 1, 0, 1, '{\"hangars\":[\"2\"]}', '{\"hangars\":[\"2\"]}', '{ \"hangars\" : [],\"droneID\":[] }', '{ \"hangars\" : [],\"droneID\":[] }', '{ \"hangars\" : [] }', '{ \"hangars\" : [] }', NULL),
(32, 1, 1000, 1, 0, 1, '{ \"hangars\" : [] }', '{ \"hangars\" : [] }', '{\"hangars\":[\"2\"],\"droneID\":[\"2\"]}', '{\"hangars\":[\"2\"],\"droneID\":[\"5\"]}', '{ \"hangars\" : [] }', '{ \"hangars\" : [] }', NULL),
(33, 1, 1000, 1, 0, 1, '{\"hangars\":[\"2\"]}', '{ \"hangars\" : [] }', '{ \"hangars\" : [],\"droneID\":[] }', '{\"hangars\":[\"2\"],\"droneID\":[\"6\"]}', '{ \"hangars\" : [] }', '{ \"hangars\" : [] }', NULL),
(34, 1, 1000, 1, 0, 1, '{ \"hangars\" : [] }', '{\"hangars\":[\"2\"]}', '{\"hangars\":[\"2\"],\"droneID\":[\"6\"]}', '{ \"hangars\" : [],\"droneID\":[] }', '{ \"hangars\" : [] }', '{ \"hangars\" : [] }', NULL),
(35, 1, 1000, 1, 0, 1, '{ \"hangars\" : [] }', '{ \"hangars\" : [] }', '{\"hangars\":[\"2\"],\"droneID\":[\"4\"]}', '{\"hangars\":[\"2\"],\"droneID\":[\"7\"]}', '{ \"hangars\" : [] }', '{ \"hangars\" : [] }', NULL),
(36, 1, 1000, 1, 0, 1, '{\"hangars\":[\"2\"]}', '{\"hangars\":[\"2\"]}', '{ \"hangars\" : [],\"droneID\":[] }', '{ \"hangars\" : [],\"droneID\":[] }', '{ \"hangars\" : [] }', '{ \"hangars\" : [] }', NULL),
(37, 1, 1000, 1, 0, 1, '{ \"hangars\" : [] }', '{\"hangars\":[\"2\"]}', '{\"hangars\":[\"2\"],\"droneID\":[\"3\"]}', '{ \"hangars\" : [],\"droneID\":[] }', '{ \"hangars\" : [] }', '{ \"hangars\" : [] }', NULL),
(38, 1, 1000, 1, 0, 1, '{\"hangars\":[]}', '{ \"hangars\" : [] }', '{ \"hangars\" : [],\"droneID\":[] }', '{\"hangars\":[\"2\"],\"droneID\":[\"3\"]}', '{ \"hangars\" : [] }', '{ \"hangars\" : [] }', NULL),
(39, 1, 1000, 1, 0, 1, '{ \"hangars\" : [] }', '{\"hangars\":[\"2\"]}', '{\"hangars\":[\"2\"],\"droneID\":[\"8\"]}', '{ \"hangars\" : [],\"droneID\":[] }', '{ \"hangars\" : [] }', '{ \"hangars\" : [] }', NULL),
(40, 1, 1000, 1, 0, 1, '{ \"hangars\" : [] }', '{ \"hangars\" : [] }', '{\"hangars\":[\"2\"],\"droneID\":[\"2\"]}', '{\"hangars\":[\"2\"],\"droneID\":[\"2\"]}', '{ \"hangars\" : [] }', '{ \"hangars\" : [] }', NULL),
(41, 1, 1000, 1, 0, 1, '{\"hangars\":[\"2\"]}', '{ \"hangars\" : [] }', '{ \"hangars\" : [],\"droneID\":[] }', '{ \"hangars\" : [],\"droneID\":[] }', '{ \"hangars\" : [] }', '{ \"hangars\" : [] }', NULL),
(42, 1, 1000, 1, 0, 1, '{ \"hangars\" : [] }', '{\"hangars\":[\"2\"]}', '{\"hangars\":[\"2\"],\"droneID\":[\"6\"]}', '{ \"hangars\" : [],\"droneID\":[] }', '{ \"hangars\" : [] }', '{ \"hangars\" : [] }', NULL),
(43, 1, 1000, 1, 0, 1, '{ \"hangars\" : [] }', '{ \"hangars\" : [] }', '{\"hangars\":[\"2\"],\"droneID\":[\"4\"]}', '{\"hangars\":[\"2\"],\"droneID\":[\"7\"]}', '{ \"hangars\" : [] }', '{ \"hangars\" : [] }', NULL),
(44, 1, 1000, 1, 0, 1, '{\"hangars\":[\"2\"]}', '{\"hangars\":[\"2\"]}', '{ \"hangars\" : [],\"droneID\":[] }', '{ \"hangars\" : [],\"droneID\":[] }', '{ \"hangars\" : [] }', '{ \"hangars\" : [] }', NULL),
(45, 1, 1000, 1, 0, 1, '{\"hangars\":[\"2\"]}', '{\"hangars\":[\"2\"]}', '{ \"hangars\" : [],\"droneID\":[] }', '{ \"hangars\" : [],\"droneID\":[] }', '{ \"hangars\" : [] }', '{ \"hangars\" : [] }', NULL),
(46, 1, 1000, 1, 0, 1, '{\"hangars\":[\"2\"]}', '{ \"hangars\" : [] }', '{ \"hangars\" : [],\"droneID\":[] }', '{\"hangars\":[\"2\"],\"droneID\":[\"1\"]}', '{ \"hangars\" : [] }', '{ \"hangars\" : [] }', NULL),
(47, 1, 1000, 1, 0, 1, '{\"hangars\":[\"2\"]}', '{\"hangars\":[\"2\"]}', '{ \"hangars\" : [],\"droneID\":[] }', '{ \"hangars\" : [],\"droneID\":[] }', '{ \"hangars\" : [] }', '{ \"hangars\" : [] }', NULL),
(48, 1, 1000, 1, 0, 1, '{ \"hangars\" : [] }', '{ \"hangars\" : [] }', '{\"hangars\":[\"2\"],\"droneID\":[\"5\"]}', '{\"hangars\":[\"2\"],\"droneID\":[\"5\"]}', '{ \"hangars\" : [] }', '{ \"hangars\" : [] }', NULL),
(49, 1, 1000, 1, 0, 1, '{\"hangars\":[\"2\"]}', '{ \"hangars\" : [] }', '{ \"hangars\" : [],\"droneID\":[] }', '{\"hangars\":[\"2\"],\"droneID\":[\"8\"]}', '{ \"hangars\" : [] }', '{ \"hangars\" : [] }', NULL),
(50, 1, 1000, 1, 0, 1, '{ \"hangars\" : [] }', '{\"hangars\":[\"2\"]}', '{\"hangars\":[\"2\"],\"droneID\":[\"7\"]}', '{ \"hangars\" : [],\"droneID\":[] }', '{ \"hangars\" : [] }', '{ \"hangars\" : [] }', NULL),
(51, 1, 1000, 6, 2, 1, '{\"hangars\":[\"2\"]}', '{\"hangars\":[]}', '{ \"hangars\" : [],\"droneID\":[] }', '{ \"hangars\" : [],\"droneID\":[] }', '{ \"hangars\" : [] }', '{ \"hangars\" : [] }', NULL),
(52, 1, 1000, 6, 2, 1, '{\"hangars\":[\"2\"]}', '{\"hangars\":[]}', '{ \"hangars\" : [],\"droneID\":[] }', '{ \"hangars\" : [],\"droneID\":[] }', '{ \"hangars\" : [] }', '{ \"hangars\" : [] }', NULL),
(53, 1, 1000, 6, 2, 1, '{\"hangars\":[\"2\"]}', '{\"hangars\":[]}', '{ \"hangars\" : [],\"droneID\":[] }', '{ \"hangars\" : [],\"droneID\":[] }', '{ \"hangars\" : [] }', '{ \"hangars\" : [] }', NULL),
(54, 1, 1000, 6, 2, 1, '{\"hangars\":[\"2\"]}', '{\"hangars\":[]}', '{ \"hangars\" : [],\"droneID\":[] }', '{ \"hangars\" : [],\"droneID\":[] }', '{ \"hangars\" : [] }', '{ \"hangars\" : [] }', NULL),
(55, 1, 1000, 6, 2, 1, '{\"hangars\":[\"2\"]}', '{\"hangars\":[]}', '{ \"hangars\" : [],\"droneID\":[] }', '{ \"hangars\" : [],\"droneID\":[] }', '{ \"hangars\" : [] }', '{ \"hangars\" : [] }', NULL),
(56, 1, 1000, 6, 2, 1, '{\"hangars\":[\"2\"]}', '{\"hangars\":[]}', '{ \"hangars\" : [],\"droneID\":[] }', '{ \"hangars\" : [],\"droneID\":[] }', '{ \"hangars\" : [] }', '{ \"hangars\" : [] }', NULL),
(57, 1, 1000, 6, 2, 1, '{\"hangars\":[\"2\"]}', '{\"hangars\":[]}', '{ \"hangars\" : [],\"droneID\":[] }', '{ \"hangars\" : [],\"droneID\":[] }', '{ \"hangars\" : [] }', '{ \"hangars\" : [] }', NULL),
(58, 1, 1000, 6, 2, 1, '{\"hangars\":[\"2\"]}', '{\"hangars\":[]}', '{ \"hangars\" : [],\"droneID\":[] }', '{ \"hangars\" : [],\"droneID\":[] }', '{ \"hangars\" : [] }', '{ \"hangars\" : [] }', NULL),
(59, 1, 1000, 6, 2, 1, '{\"hangars\":[\"2\"]}', '{\"hangars\":[]}', '{ \"hangars\" : [],\"droneID\":[] }', '{ \"hangars\" : [],\"droneID\":[] }', '{ \"hangars\" : [] }', '{ \"hangars\" : [] }', NULL),
(60, 1, 1000, 6, 2, 1, '{\"hangars\":[\"2\"]}', '{\"hangars\":[]}', '{ \"hangars\" : [],\"droneID\":[] }', '{ \"hangars\" : [],\"droneID\":[] }', '{ \"hangars\" : [] }', '{ \"hangars\" : [] }', NULL),
(61, 1, 1000, 6, 2, 1, '{\"hangars\":[\"2\"]}', '{\"hangars\":[]}', '{ \"hangars\" : [],\"droneID\":[] }', '{ \"hangars\" : [],\"droneID\":[] }', '{ \"hangars\" : [] }', '{ \"hangars\" : [] }', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `player_event_info`
--

CREATE TABLE `player_event_info` (
  `PLAYER_ID` int(11) NOT NULL,
  `EVENT_ID` int(11) NOT NULL,
  `SCORE` int(11) NOT NULL,
  `DATA` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `player_extra_data`
--

CREATE TABLE `player_extra_data` (
  `USER_ID` int(11) NOT NULL,
  `PLAYER_ID` int(11) NOT NULL,
  `LOGFILES` int(11) NOT NULL DEFAULT '15',
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
  `ASSETS_VERSION` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `player_extra_data`
--

INSERT INTO `player_extra_data` (`USER_ID`, `PLAYER_ID`, `LOGFILES`, `BOOTY_KEYS`, `DRONE_FORMATIONS`, `SHIP_DESIGNS`, `SETTINGS_GAMEPLAY_OLD`, `SETTINGS_GAMEPLAY_NEW`, `SETTINGS_SLOTBAR_OLD`, `SETTINGS_SLOTBAR_NEW`, `STATS`, `CARGO`, `SKYLAB`, `GATES`, `CLIENT_VERSION`, `ASSETS_VERSION`) VALUES
(1, 1000, 15, '', '', '', '{\"QualitySettingsModule\":{\"notSet\":false,\"qualityAttack\":3,\"qualityBackground\":3,\"qualityPresetting\":3,\"qualityCustomized\":true,\"qualityPOIzone\":3,\"qualityShip\":3,\"qualityEngine\":3,\"qualityExplosion\":3,\"qualityCollectables\":3,\"qualityEffect\":3},\"DisplaySettingsModule\":{\"notSet\":false,\"displayPlayerName\":true,\"displayResources\":true,\"displayBoxes\":true,\"displayHitpointBubbles\":true,\"displayChat\":true,\"displayDrones\":false,\"displayCargoboxes\":true,\"displayPenaltyCargoboxes\":true,\"displayWindowBackground\":true,\"displayNotifications\":true,\"preloadUserShips\":true,\"alwaysDraggableWindows\":true,\"shipHovering\":true,\"showSecondQuickslotBar\":true,\"useAutoQuality\":true},\"AudioSettingsModule\":{\"notSet\":false,\"sound\":false,\"music\":false},\"WindowSettingsModule\":{\"notSet\":false,\"clientResolutionId\":0,\"windowSettings\":\"0,469,2,0,1,687,0,1,3,848,474,1,5,-1,0,0,10,92,307,1,13,306,96,0,20,7,482,1,23,1058,131,0,24,445,105,0,36,93,401,0\",\"resizableWindows\":\"5,240,150,20,300,150,36,260,130,\",\"minmapScale\":11,\"mainmenuPosition\":\"304,479\",\"barStatus\":\"100,0,23,0,24,1,25,1,26,0,27,0\",\"slotmenuPosition\":\"304,450\",\"slotMenuOrder\":\"0\",\"slotmenuPremiumPosition\":\"304,499\",\"slotMenuPremiumOrder\":\"0\"},\"GameplaySettingsModule\":{\"notSet\":false,\"autoBoost\":true,\"autoRefinement\":true,\"quickslotStopAttack\":true,\"doubleclickAttack\":true,\"autoChangeAmmo\":true,\"autoStart\":true,\"autoBuyGreenBootyKeys\":true}}', '', '{\"quickbarSlots\":\"\",\"quickbarSlotsPremium\":\"\",\"selectedLaser\":0,\"selectedRocket\":0,\"selectedHellstormRocket\":0,\"activeCpus\":[]}', '', '', '{\"UsedSpace\":1139,\"TotalSpace\":2500000,\"Prometium\":290,\"Endurium\":590,\"Terbium\":240,\"Prometid\":8,\"Duranium\":10,\"Xenomit\":10,\"Promerium\":1,\"Seprom\":0}', '{\"LaserUpgrades\":{\"Ore\":7,\"Amount\":498200},\"RocketUpgrades\":{\"Ore\":4,\"Amount\":1097},\"GeneratorsUpgrades\":null,\"ShieldUpgrades\":null}', '', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `player_hangar`
--

CREATE TABLE `player_hangar` (
  `ID` int(11) NOT NULL,
  `USER_ID` int(11) NOT NULL DEFAULT '0',
  `PLAYER_ID` int(11) NOT NULL,
  `HANGAR_COUNT` smallint(6) NOT NULL DEFAULT '0',
  `ACTIVE` tinyint(1) NOT NULL,
  `SHIP_ID` int(11) NOT NULL,
  `SHIP_DESIGN` int(11) NOT NULL,
  `SHIP_HP` int(11) NOT NULL,
  `SHIP_NANO` int(11) NOT NULL,
  `SHIP_MAP_ID` int(11) NOT NULL DEFAULT '255',
  `SHIP_X` int(11) NOT NULL,
  `SHIP_Y` int(11) NOT NULL,
  `IN_EQUIPMENT_ZONE` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `player_hangar`
--

INSERT INTO `player_hangar` (`ID`, `USER_ID`, `PLAYER_ID`, `HANGAR_COUNT`, `ACTIVE`, `SHIP_ID`, `SHIP_DESIGN`, `SHIP_HP`, `SHIP_NANO`, `SHIP_MAP_ID`, `SHIP_X`, `SHIP_Y`, `IN_EQUIPMENT_ZONE`) VALUES
(1, 1, 1000, 0, 0, 1, 1, 532, 0, 1, 18492, 11415, 1),
(2, 1, 1000, 1, 1, 10, 10, 100000000, 0, 3, 2077, 6082, 1);

-- --------------------------------------------------------

--
-- Table structure for table `player_logs`
--

CREATE TABLE `player_logs` (
  `ID` int(11) NOT NULL,
  `USER_ID` int(11) NOT NULL,
  `PLAYER_ID` int(11) NOT NULL,
  `LOG_TYPE` varchar(255) NOT NULL,
  `LOG_DESCRIPTION` varchar(255) NOT NULL,
  `LOG_DATE` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `player_logs`
--

INSERT INTO `player_logs` (`ID`, `USER_ID`, `PLAYER_ID`, `LOG_TYPE`, `LOG_DESCRIPTION`, `LOG_DATE`) VALUES
(1, 1, 1000, '2', 'Route: internalStart Request: /internalStart', '2018-08-28 00:18:44'),
(2, 1, 1000, '2', 'Route: internalStart Request: /internalStart', '2018-08-28 00:18:44'),
(3, 1, 1000, '2', 'Route: internalCompanyChoose Request: /internalCompanyChoose', '2018-08-28 00:18:44'),
(4, 1, 1000, '2', 'Route: internalCompanyChoose Request: /internalCompanyChoose', '2018-08-28 00:18:45'),
(5, 1, 1000, '3', 'You successfully joined mmo!', '2018-08-28 00:22:49'),
(6, 1, 1000, '2', 'Route: internalStart Request: /internalStart', '2018-08-28 00:22:49'),
(7, 1, 1000, '2', 'Route: internalStart Request: /internalStart', '2018-08-28 00:22:50'),
(8, 1, 1000, '2', 'Route: internalMapRevolution Request: /internalMapRevolution', '2018-08-28 00:23:03'),
(9, 1, 1000, '2', 'Route: internalMapRevolution Request: /internalMapRevolution', '2018-08-28 00:23:03'),
(10, 1, 1000, '2', 'Route: internalMapRevolution Request: /internalMapRevolution', '2018-08-28 00:23:51'),
(11, 1, 1000, '2', 'Route: internalMapRevolution Request: /internalMapRevolution', '2018-08-28 00:23:52'),
(12, 1, 1000, '2', 'Route: gamechatas3cfgbase_89.xml Request: /gamechat/as3/cfg/base_89.xml', '2018-08-28 00:24:17'),
(13, 1, 1000, '2', 'Route: gamechatas3cfgbase_89.xml Request: /gamechat/as3/cfg/base_89.xml', '2018-08-28 00:24:18'),
(14, 1, 1000, '2', 'Route: gamechatas3cfgbase_89.xml Request: /gamechat/as3/cfg/base_89.xml', '2018-08-28 00:24:18'),
(15, 1, 1000, '2', 'Route:  Request: /login.php', '2018-08-30 10:09:23'),
(16, 1, 1000, '2', 'Route:  Request: /login.php', '2018-08-30 10:09:24'),
(17, 1, 1000, '2', 'Route: internalStart Request: /internalStart', '2018-08-30 10:09:24'),
(18, 1, 1000, '2', 'Route: internalStart Request: /internalStart', '2018-08-30 10:09:24'),
(19, 1, 1000, '2', 'Route:  Request: /login.php', '2018-08-30 10:36:15'),
(20, 1, 1000, '2', 'Route:  Request: /login.php', '2018-08-30 10:36:15'),
(21, 1, 1000, '2', 'Route: internalStart Request: /internalStart', '2018-08-30 10:36:16'),
(22, 1, 1000, '2', 'Route: internalStart Request: /internalStart', '2018-08-30 10:36:16'),
(23, 1, 1000, '2', 'Route: internalMapRevolution Request: /internalMapRevolution', '2018-08-30 10:36:17'),
(24, 1, 1000, '2', 'Route: internalMapRevolution Request: /internalMapRevolution', '2018-08-30 10:36:17'),
(25, 1, 1000, '2', 'Route: gamechatas3cfgbase_89.xml Request: /gamechat/as3/cfg/base_89.xml', '2018-08-30 10:36:45'),
(26, 1, 1000, '2', 'Route: gamechatas3cfgbase_89.xml Request: /gamechat/as3/cfg/base_89.xml', '2018-08-30 10:36:45'),
(27, 1, 1000, '2', 'Route: gamechatas3cfgbase_89.xml Request: /gamechat/as3/cfg/base_89.xml', '2018-08-30 10:36:45'),
(28, 1, 1000, '2', 'Route: internalStart Request: /internalStart', '2018-08-30 10:40:08'),
(29, 1, 1000, '2', 'Route: internalStart Request: /internalStart', '2018-08-30 10:40:08'),
(30, 1, 1000, '2', 'Route: internalClan Request: /internalClan', '2018-08-30 10:40:14'),
(31, 1, 1000, '2', 'Route: internalClan Request: /internalClan', '2018-08-30 10:40:14'),
(32, 1, 1000, '2', 'Route: internalShop Request: /internalShop', '2018-08-30 10:40:18'),
(33, 1, 1000, '2', 'Route: internalShop Request: /internalShop', '2018-08-30 10:40:18'),
(34, 1, 1000, '2', 'Route: internalStart Request: /internalStart', '2018-08-30 10:40:24'),
(35, 1, 1000, '2', 'Route: internalStart Request: /internalStart', '2018-08-30 10:40:24'),
(36, 1, 1000, '2', 'Route:  Request: /login.php', '2018-09-20 15:03:01'),
(37, 1, 1000, '2', 'Route:  Request: /login.php', '2018-09-20 15:03:01'),
(38, 1, 1000, '2', 'Route: internalStart Request: /internalStart', '2018-09-20 15:03:01'),
(39, 1, 1000, '2', 'Route: internalStart Request: /internalStart', '2018-09-20 15:03:01'),
(40, 1, 1000, '2', 'Route: internalMapRevolution Request: /internalMapRevolution', '2018-09-20 15:03:04'),
(41, 1, 1000, '2', 'Route: internalMapRevolution Request: /internalMapRevolution', '2018-09-20 15:03:05'),
(42, 1, 1000, '2', 'Route: internalMapRevolution Request: /internalMapRevolution', '2018-09-20 15:03:07'),
(43, 1, 1000, '2', 'Route: internalMapRevolution Request: /internalMapRevolution', '2018-09-20 15:03:07'),
(44, 1, 1000, '2', 'Route: internalShop Request: /internalShop', '2018-09-20 15:03:10'),
(45, 1, 1000, '2', 'Route: internalShop Request: /internalShop', '2018-09-20 15:03:10'),
(46, 1, 1000, '2', 'Route: internalHangar Request: /internalHangar', '2018-09-20 15:03:39'),
(47, 1, 1000, '2', 'Route: internalHangar Request: /internalHangar', '2018-09-20 15:03:40'),
(48, 1, 1000, '2', 'Route: internalHangar Request: /internalHangar', '2018-09-20 15:04:04'),
(49, 1, 1000, '2', 'Route: internalHangar Request: /internalHangar', '2018-09-20 15:04:04'),
(50, 1, 1000, '2', 'Route: internalShop Request: /internalShop', '2018-09-20 15:04:06'),
(51, 1, 1000, '2', 'Route: internalShop Request: /internalShop', '2018-09-20 15:04:06'),
(52, 1, 1000, '2', 'Route: internalHangar Request: /internalHangar', '2018-09-20 15:05:23'),
(53, 1, 1000, '2', 'Route: internalHangar Request: /internalHangar', '2018-09-20 15:05:23'),
(54, 1, 1000, '2', 'Route: internalStart Request: /internalStart', '2018-09-20 15:05:56'),
(55, 1, 1000, '2', 'Route: internalStart Request: /internalStart', '2018-09-20 15:05:56'),
(56, 1, 1000, '2', 'Route: internalShop Request: /internalShop', '2018-09-20 15:05:57'),
(57, 1, 1000, '2', 'Route: internalShop Request: /internalShop', '2018-09-20 15:05:57'),
(58, 1, 1000, '2', 'Route: internalStart Request: /internalStart', '2018-09-20 15:05:59'),
(59, 1, 1000, '2', 'Route: internalStart Request: /internalStart', '2018-09-20 15:05:59'),
(60, 1, 1000, '2', 'Route: internalMapRevolution Request: /internalMapRevolution', '2018-09-20 15:06:12'),
(61, 1, 1000, '2', 'Route: internalMapRevolution Request: /internalMapRevolution', '2018-09-20 15:06:13'),
(62, 1, 1000, '2', 'Route:  Request: /login.php', '2018-09-20 15:19:12'),
(63, 1, 1000, '2', 'Route:  Request: /login.php', '2018-09-20 15:19:19'),
(64, 1, 1000, '2', 'Route:  Request: /login.php', '2018-09-20 15:19:19'),
(65, 1, 1000, '2', 'Route:  Request: /login.php', '2018-09-20 15:19:19'),
(66, 1, 1000, '3', 'You successfully logged in! From: 127.0.0.1', '2018-09-20 15:19:19'),
(67, 1, 1000, '2', 'Route:  Request: /login.php', '2018-09-20 15:19:20'),
(68, 1, 1000, '3', 'You successfully logged in! From: 127.0.0.1', '2018-09-20 15:19:20'),
(69, 1, 1000, '2', 'Route: internalStart Request: /internalStart', '2018-09-20 15:19:20'),
(70, 1, 1000, '2', 'Route: internalStart Request: /internalStart', '2018-09-20 15:19:20'),
(71, 1, 1000, '2', 'Route: internalMapRevolution Request: /internalMapRevolution', '2018-09-20 15:19:23'),
(72, 1, 1000, '2', 'Route: internalMapRevolution Request: /internalMapRevolution', '2018-09-20 15:19:23'),
(73, 1, 1000, '2', 'Route: internalMapRevolution Request: /internalMapRevolution', '2018-09-20 15:19:36'),
(74, 1, 1000, '2', 'Route: internalMapRevolution Request: /internalMapRevolution', '2018-09-20 15:19:37'),
(75, 1, 1000, '2', 'Route: internalMapRevolution Request: /internalMapRevolution', '2018-09-20 15:19:48'),
(76, 1, 1000, '2', 'Route: internalMapRevolution Request: /internalMapRevolution', '2018-09-20 15:19:48'),
(77, 1, 1000, '2', 'Route:  Request: /', '2018-09-20 15:24:32'),
(78, 1, 1000, '2', 'Route:  Request: /', '2018-09-20 15:24:32'),
(79, 1, 1000, '2', 'Route:  Request: /login.php', '2018-09-20 15:24:37'),
(80, 1, 1000, '2', 'Route:  Request: /login.php', '2018-09-20 15:24:37'),
(81, 1, 1000, '2', 'Route: internalStart Request: /internalStart', '2018-09-20 15:24:37'),
(82, 1, 1000, '2', 'Route: internalStart Request: /internalStart', '2018-09-20 15:24:38'),
(83, 1, 1000, '2', 'Route: internalMapRevolution Request: /internalMapRevolution', '2018-09-20 15:24:41'),
(84, 1, 1000, '2', 'Route: internalMapRevolution Request: /internalMapRevolution', '2018-09-20 15:24:41'),
(85, 1, 1000, '2', 'Route: internalMapRevolution Request: /internalMapRevolution', '2018-09-20 15:26:37'),
(86, 1, 1000, '2', 'Route: internalMapRevolution Request: /internalMapRevolution', '2018-09-20 15:26:37'),
(87, 1, 1000, '2', 'Route: internalShop Request: /internalShop', '2018-09-20 15:27:12'),
(88, 1, 1000, '2', 'Route: internalShop Request: /internalShop', '2018-09-20 15:27:12'),
(89, 1, 1000, '2', 'Route:  Request: /', '2018-09-20 15:28:08'),
(90, 1, 1000, '2', 'Route:  Request: /', '2018-09-20 15:28:09'),
(91, 1, 1000, '2', 'Route:  Request: /login.php', '2018-09-20 15:28:12'),
(92, 1, 1000, '2', 'Route:  Request: /', '2018-09-20 15:32:34'),
(93, 1, 1000, '2', 'Route:  Request: /', '2018-09-20 15:32:34'),
(94, 1, 1000, '2', 'Route:  Request: /login.php', '2018-09-20 15:33:19'),
(95, 1, 1000, '2', 'Route:  Request: /login.php', '2018-09-20 15:33:20'),
(96, 1, 1000, '2', 'Route: internalStart Request: /internalStart', '2018-09-20 15:33:20'),
(97, 1, 1000, '2', 'Route: internalStart Request: /internalStart', '2018-09-20 15:33:20'),
(98, 1, 1000, '2', 'Route: internalMapRevolution Request: /internalMapRevolution', '2018-09-20 15:33:21'),
(99, 1, 1000, '2', 'Route: internalMapRevolution Request: /internalMapRevolution', '2018-09-20 15:33:21'),
(100, 1, 1000, '2', 'Route: internalMapRevolution Request: /internalMapRevolution', '2018-09-20 15:33:23'),
(101, 1, 1000, '2', 'Route: internalMapRevolution Request: /internalMapRevolution', '2018-09-20 15:33:24'),
(102, 1, 1000, '2', 'Route: internalMapRevolution Request: /internalMapRevolution', '2018-09-20 15:34:26'),
(103, 1, 1000, '2', 'Route: internalMapRevolution Request: /internalMapRevolution', '2018-09-20 15:34:26'),
(104, 1, 1000, '2', 'Route: internalShop Request: /internalShop', '2018-09-20 15:34:28'),
(105, 1, 1000, '2', 'Route: internalShop Request: /internalShop', '2018-09-20 15:34:28'),
(106, 1, 1000, '3', 'You successfully bought an Goliath!', '2018-09-20 15:34:32'),
(107, 1, 1000, '3', 'You successfully bought  15x G3N-7900!', '2018-09-20 15:34:45'),
(108, 1, 1000, '3', 'You successfully bought  31x LF-3!', '2018-09-20 15:34:55'),
(109, 1, 1000, '3', 'You successfully bought an Iris!', '2018-09-20 15:35:00'),
(110, 1, 1000, '3', 'You successfully bought an Iris!', '2018-09-20 15:35:13'),
(111, 1, 1000, '3', 'You successfully bought an Iris!', '2018-09-20 15:35:16'),
(112, 1, 1000, '3', 'You successfully bought an Iris!', '2018-09-20 15:35:18'),
(113, 1, 1000, '3', 'You successfully bought an Iris!', '2018-09-20 15:35:20'),
(114, 1, 1000, '3', 'You successfully bought an Iris!', '2018-09-20 15:35:22'),
(115, 1, 1000, '3', 'You successfully bought an Iris!', '2018-09-20 15:35:25'),
(116, 1, 1000, '3', 'You successfully bought an Iris!', '2018-09-20 15:35:27'),
(117, 1, 1000, '2', 'Route: internalHangar Request: /internalHangar', '2018-09-20 15:35:29'),
(118, 1, 1000, '2', 'Route: internalHangar Request: /internalHangar', '2018-09-20 15:35:29'),
(119, 1, 1000, '2', 'Route: internalStart Request: /internalStart', '2018-09-20 15:38:01'),
(120, 1, 1000, '2', 'Route: internalStart Request: /internalStart', '2018-09-20 15:38:01'),
(121, 1, 1000, '2', 'Route: internalMapRevolution Request: /internalMapRevolution', '2018-09-20 15:38:02'),
(122, 1, 1000, '2', 'Route: internalMapRevolution Request: /internalMapRevolution', '2018-09-20 15:38:02'),
(123, 1, 1000, '2', 'Route:  Request: /login.php', '2018-09-27 16:34:30'),
(124, 1, 1000, '2', 'Route:  Request: /login.php', '2018-09-27 16:34:30'),
(125, 1, 1000, '2', 'Route: internalStart Request: /internalStart', '2018-09-27 16:34:30'),
(126, 1, 1000, '2', 'Route: internalStart Request: /internalStart', '2018-09-27 16:34:31'),
(127, 1, 1000, '2', 'Route: internalMapRevolution Request: /internalMapRevolution', '2018-09-27 16:34:32'),
(128, 1, 1000, '2', 'Route: internalMapRevolution Request: /internalMapRevolution', '2018-09-27 16:34:32'),
(129, 1, 1000, '2', 'Route: internalMapRevolution Request: /internalMapRevolution', '2018-09-27 16:34:35'),
(130, 1, 1000, '2', 'Route: internalMapRevolution Request: /internalMapRevolution', '2018-09-27 16:34:35'),
(131, 1, 1000, '2', 'Route: internalHangar Request: /internalHangar', '2018-09-27 16:58:47'),
(132, 1, 1000, '2', 'Route: internalHangar Request: /internalHangar', '2018-09-27 16:58:47'),
(133, 1, 1000, '2', 'Route: internalMapRevolution Request: /internalMapRevolution', '2018-09-27 17:13:00'),
(134, 1, 1000, '2', 'Route: internalMapRevolution Request: /internalMapRevolution', '2018-09-27 17:13:00'),
(135, 1, 1000, '2', 'Route: internalMapRevolution Request: /internalMapRevolution', '2018-09-27 17:13:30'),
(136, 1, 1000, '2', 'Route: internalMapRevolution Request: /internalMapRevolution', '2018-09-27 17:13:30'),
(137, 1, 1000, '2', 'Route: internalStart Request: /internalStart', '2018-09-27 17:15:21'),
(138, 1, 1000, '2', 'Route: internalStart Request: /internalStart', '2018-09-27 17:15:21'),
(139, 1, 1000, '2', 'Route: internalMapRevolution Request: /internalMapRevolution', '2018-09-27 17:15:23'),
(140, 1, 1000, '2', 'Route: internalMapRevolution Request: /internalMapRevolution', '2018-09-27 17:15:23'),
(141, 1, 1000, '2', 'Route: gamechatas3cfgbase_89.xml Request: /gamechat/as3/cfg/base_89.xml', '2018-09-27 17:15:45'),
(142, 1, 1000, '2', 'Route: gamechatas3cfgbase_89.xml Request: /gamechat/as3/cfg/base_89.xml', '2018-09-27 17:15:46'),
(143, 1, 1000, '2', 'Route: gamechatas3cfgbase_89.xml Request: /gamechat/as3/cfg/base_89.xml', '2018-09-27 17:15:46'),
(144, 1, 1000, '2', 'Route: internalHangar Request: /internalHangar', '2018-09-27 17:15:53'),
(145, 1, 1000, '2', 'Route: internalHangar Request: /internalHangar', '2018-09-27 17:15:53'),
(146, 1, 1000, '2', 'Route: internalMapRevolution Request: /internalMapRevolution', '2018-09-27 17:17:14'),
(147, 1, 1000, '2', 'Route: internalMapRevolution Request: /internalMapRevolution', '2018-09-27 17:17:14'),
(148, 1, 1000, '2', 'Route: internalMapRevolution Request: /internalMapRevolution', '2018-09-27 17:19:01'),
(149, 1, 1000, '2', 'Route: internalMapRevolution Request: /internalMapRevolution', '2018-09-27 17:19:01'),
(150, 1, 1000, '2', 'Route: resourcescssbootstrapbootstrap.min.css.map Request: /resources/css/bootstrap/bootstrap.min.css.map', '2018-09-27 17:19:20'),
(151, 1, 1000, '2', 'Route: resourcescssbootstrapbootstrap.min.css.map Request: /resources/css/bootstrap/bootstrap.min.css.map', '2018-09-27 17:19:20'),
(152, 1, 1000, '2', 'Route: internalMapRevolution Request: /internalMapRevolution', '2018-09-27 17:21:24'),
(153, 1, 1000, '2', 'Route: internalMapRevolution Request: /internalMapRevolution', '2018-09-27 17:21:24'),
(154, 1, 1000, '2', 'Route: resourcescssbootstrapbootstrap.min.css.map Request: /resources/css/bootstrap/bootstrap.min.css.map', '2018-09-27 17:21:25'),
(155, 1, 1000, '2', 'Route: resourcescssbootstrapbootstrap.min.css.map Request: /resources/css/bootstrap/bootstrap.min.css.map', '2018-09-27 17:21:25'),
(156, 1, 1000, '2', 'Route: internalMapRevolution Request: /internalMapRevolution', '2018-09-27 17:21:32'),
(157, 1, 1000, '2', 'Route: internalMapRevolution Request: /internalMapRevolution', '2018-09-27 17:21:32'),
(158, 1, 1000, '2', 'Route: resourcescssbootstrapbootstrap.min.css.map Request: /resources/css/bootstrap/bootstrap.min.css.map', '2018-09-27 17:21:33'),
(159, 1, 1000, '2', 'Route: resourcescssbootstrapbootstrap.min.css.map Request: /resources/css/bootstrap/bootstrap.min.css.map', '2018-09-27 17:21:33'),
(160, 1, 1000, '2', 'Route: internalMapRevolution Request: /internalMapRevolution', '2018-09-27 17:21:43'),
(161, 1, 1000, '2', 'Route: internalMapRevolution Request: /internalMapRevolution', '2018-09-27 17:21:43'),
(162, 1, 1000, '2', 'Route: resourcescssbootstrapbootstrap.min.css.map Request: /resources/css/bootstrap/bootstrap.min.css.map', '2018-09-27 17:21:44'),
(163, 1, 1000, '2', 'Route: resourcescssbootstrapbootstrap.min.css.map Request: /resources/css/bootstrap/bootstrap.min.css.map', '2018-09-27 17:21:44'),
(164, 1, 1000, '2', 'Route: internalMapRevolution Request: /internalMapRevolution', '2018-09-27 17:22:49'),
(165, 1, 1000, '2', 'Route: internalMapRevolution Request: /internalMapRevolution', '2018-09-27 17:22:49'),
(166, 1, 1000, '2', 'Route: resourcescssbootstrapbootstrap.min.css.map Request: /resources/css/bootstrap/bootstrap.min.css.map', '2018-09-27 17:22:53'),
(167, 1, 1000, '2', 'Route: resourcescssbootstrapbootstrap.min.css.map Request: /resources/css/bootstrap/bootstrap.min.css.map', '2018-09-27 17:22:53'),
(168, 1, 1000, '2', 'Route: internalMapRevolution Request: /internalMapRevolution', '2018-09-27 17:23:07'),
(169, 1, 1000, '2', 'Route: internalMapRevolution Request: /internalMapRevolution', '2018-09-27 17:23:07'),
(170, 1, 1000, '2', 'Route: resourcescssbootstrapbootstrap.min.css.map Request: /resources/css/bootstrap/bootstrap.min.css.map', '2018-09-27 17:23:08'),
(171, 1, 1000, '2', 'Route: resourcescssbootstrapbootstrap.min.css.map Request: /resources/css/bootstrap/bootstrap.min.css.map', '2018-09-27 17:23:08'),
(172, 1, 1000, '2', 'Route: internalMapRevolution Request: /internalMapRevolution', '2018-09-27 17:23:43'),
(173, 1, 1000, '2', 'Route: internalMapRevolution Request: /internalMapRevolution', '2018-09-27 17:23:43'),
(174, 1, 1000, '2', 'Route: resourcescssbootstrapbootstrap.min.css.map Request: /resources/css/bootstrap/bootstrap.min.css.map', '2018-09-27 17:23:44'),
(175, 1, 1000, '2', 'Route: resourcescssbootstrapbootstrap.min.css.map Request: /resources/css/bootstrap/bootstrap.min.css.map', '2018-09-27 17:23:44'),
(176, 1, 1000, '2', 'Route: internalMapRevolution Request: /internalMapRevolution', '2018-09-27 17:23:57'),
(177, 1, 1000, '2', 'Route: internalMapRevolution Request: /internalMapRevolution', '2018-09-27 17:23:57'),
(178, 1, 1000, '2', 'Route: gamechatas3cfgbase_89.xml Request: /gamechat/as3/cfg/base_89.xml', '2018-09-27 17:24:15'),
(179, 1, 1000, '2', 'Route: gamechatas3cfgbase_89.xml Request: /gamechat/as3/cfg/base_89.xml', '2018-09-27 17:24:16'),
(180, 1, 1000, '2', 'Route: gamechatas3cfgbase_89.xml Request: /gamechat/as3/cfg/base_89.xml', '2018-09-27 17:24:16'),
(181, 1, 1000, '2', 'Route: internalMapRevolution Request: /internalMapRevolution', '2018-09-27 17:24:45'),
(182, 1, 1000, '2', 'Route: internalMapRevolution Request: /internalMapRevolution', '2018-09-27 17:24:45'),
(183, 1, 1000, '2', 'Route: internalMapRevolution Request: /internalMapRevolution', '2018-09-27 17:27:08'),
(184, 1, 1000, '2', 'Route: internalMapRevolution Request: /internalMapRevolution', '2018-09-27 17:27:08'),
(185, 1, 1000, '2', 'Route: gamechatas3cfgbase_89.xml Request: /gamechat/as3/cfg/base_89.xml', '2018-09-27 17:27:21'),
(186, 1, 1000, '2', 'Route: gamechatas3cfgbase_89.xml Request: /gamechat/as3/cfg/base_89.xml', '2018-09-27 17:27:21'),
(187, 1, 1000, '2', 'Route: gamechatas3cfgbase_89.xml Request: /gamechat/as3/cfg/base_89.xml', '2018-09-27 17:27:21'),
(188, 1, 1000, '2', 'Route: internalMapRevolution Request: /internalMapRevolution', '2018-09-27 17:28:32'),
(189, 1, 1000, '2', 'Route: internalMapRevolution Request: /internalMapRevolution', '2018-09-27 17:28:32'),
(190, 1, 1000, '2', 'Route: gamechatas3cfgbase_89.xml Request: /gamechat/as3/cfg/base_89.xml', '2018-09-27 17:28:45'),
(191, 1, 1000, '2', 'Route: gamechatas3cfgbase_89.xml Request: /gamechat/as3/cfg/base_89.xml', '2018-09-27 17:28:45'),
(192, 1, 1000, '2', 'Route: gamechatas3cfgbase_89.xml Request: /gamechat/as3/cfg/base_89.xml', '2018-09-27 17:28:45'),
(193, 1, 1000, '2', 'Route: internalMapRevolution Request: /internalMapRevolution', '2018-09-27 17:29:16'),
(194, 1, 1000, '2', 'Route: internalMapRevolution Request: /internalMapRevolution', '2018-09-27 17:29:16'),
(195, 1, 1000, '2', 'Route:  Request: /login.php', '2018-09-27 17:29:54'),
(196, 1, 1000, '2', 'Route:  Request: /login.php', '2018-09-27 17:29:54'),
(197, 1, 1000, '2', 'Route: internalStart Request: /internalStart', '2018-09-27 17:29:54'),
(198, 1, 1000, '2', 'Route: internalStart Request: /internalStart', '2018-09-27 17:29:54'),
(199, 1, 1000, '2', 'Route: internalMapRevolution Request: /internalMapRevolution', '2018-09-27 17:29:55'),
(200, 1, 1000, '2', 'Route: internalMapRevolution Request: /internalMapRevolution', '2018-09-27 17:29:55'),
(201, 1, 1000, '2', 'Route: internalMapRevolution Request: /internalMapRevolution', '2018-09-27 17:29:58'),
(202, 1, 1000, '2', 'Route: internalMapRevolution Request: /internalMapRevolution', '2018-09-27 17:29:58'),
(203, 1, 1000, '2', 'Route: internalHangar Request: /internalHangar', '2018-09-27 17:30:20'),
(204, 1, 1000, '2', 'Route: internalHangar Request: /internalHangar', '2018-09-27 17:30:20'),
(205, 1, 1000, '2', 'Route: internalMapRevolution Request: /internalMapRevolution', '2018-09-27 17:32:24'),
(206, 1, 1000, '2', 'Route: internalMapRevolution Request: /internalMapRevolution', '2018-09-27 17:32:24'),
(207, 1, 1000, '2', 'Route: internalHangar Request: /internalHangar', '2018-09-27 17:32:32'),
(208, 1, 1000, '2', 'Route: internalHangar Request: /internalHangar', '2018-09-27 17:32:32'),
(209, 1, 1000, '2', 'Route: internalHangar Request: /internalHangar', '2018-09-27 17:32:39'),
(210, 1, 1000, '2', 'Route: internalHangar Request: /internalHangar', '2018-09-27 17:32:39'),
(211, 1, 1000, '2', 'Route: internalMapRevolution Request: /internalMapRevolution', '2018-09-27 17:37:00'),
(212, 1, 1000, '2', 'Route: internalMapRevolution Request: /internalMapRevolution', '2018-09-27 17:37:00'),
(213, 1, 1000, '2', 'Route: internalMapRevolution Request: /internalMapRevolution', '2018-09-27 17:37:23'),
(214, 1, 1000, '2', 'Route: internalMapRevolution Request: /internalMapRevolution', '2018-09-27 17:37:23'),
(215, 1, 1000, '2', 'Route: internalMapRevolution Request: /internalMapRevolution', '2018-09-27 17:40:25'),
(216, 1, 1000, '2', 'Route: internalMapRevolution Request: /internalMapRevolution', '2018-09-27 17:40:25'),
(217, 1, 1000, '2', 'Route: internalMapRevolution Request: /internalMapRevolution', '2018-09-27 17:40:41'),
(218, 1, 1000, '2', 'Route: internalMapRevolution Request: /internalMapRevolution', '2018-09-27 17:40:41'),
(219, 1, 1000, '2', 'Route: internalMapRevolution Request: /internalMapRevolution', '2018-09-27 17:42:07'),
(220, 1, 1000, '2', 'Route: internalMapRevolution Request: /internalMapRevolution', '2018-09-27 17:42:07'),
(221, 1, 1000, '2', 'Route: internalShop Request: /internalShop', '2018-09-27 17:43:27'),
(222, 1, 1000, '2', 'Route: internalShop Request: /internalShop', '2018-09-27 17:43:28'),
(223, 1, 1000, '2', 'Route: internalShop Request: /internalShop', '2018-09-27 17:43:31'),
(224, 1, 1000, '2', 'Route: internalShop Request: /internalShop', '2018-09-27 17:43:31'),
(225, 1, 1000, '2', 'Route: internalShop Request: /internalShop', '2018-09-27 17:43:34'),
(226, 1, 1000, '2', 'Route: internalShop Request: /internalShop', '2018-09-27 17:43:34'),
(227, 1, 1000, '2', 'Route: internalShop Request: /internalShop', '2018-09-27 17:43:36'),
(228, 1, 1000, '2', 'Route: internalShop Request: /internalShop', '2018-09-27 17:43:36'),
(229, 1, 1000, '2', 'Route: internalShop Request: /internalShop', '2018-09-27 17:43:37'),
(230, 1, 1000, '2', 'Route: internalShop Request: /internalShop', '2018-09-27 17:43:37'),
(231, 1, 1000, '2', 'Route: internalShop Request: /internalShop', '2018-09-27 17:43:37'),
(232, 1, 1000, '2', 'Route: internalShop Request: /internalShop', '2018-09-27 17:43:37'),
(233, 1, 1000, '2', 'Route: internalShop Request: /internalShop', '2018-09-27 17:43:37'),
(234, 1, 1000, '2', 'Route: internalShop Request: /internalShop', '2018-09-27 17:43:38'),
(235, 1, 1000, '2', 'Route: internalShop Request: /internalShop', '2018-09-27 17:43:38'),
(236, 1, 1000, '2', 'Route: internalShop Request: /internalShop', '2018-09-27 17:43:38'),
(237, 1, 1000, '2', 'Route: internalShop Request: /internalShop', '2018-09-27 17:43:38'),
(238, 1, 1000, '2', 'Route: internalShop Request: /internalShop', '2018-09-27 17:43:38'),
(239, 1, 1000, '2', 'Route: internalShop Request: /internalShop', '2018-09-27 17:43:38'),
(240, 1, 1000, '2', 'Route: internalShop Request: /internalShop', '2018-09-27 17:43:39'),
(241, 1, 1000, '2', 'Route: internalShop Request: /internalShop', '2018-09-27 17:43:39'),
(242, 1, 1000, '2', 'Route: internalShop Request: /internalShop', '2018-09-27 17:43:39'),
(243, 1, 1000, '3', 'You successfully bought  11x SG3N-B02!', '2018-09-27 17:43:49'),
(244, 1, 1000, '2', 'Route: internalHangar Request: /internalHangar', '2018-09-27 17:43:51'),
(245, 1, 1000, '2', 'Route: internalHangar Request: /internalHangar', '2018-09-27 17:43:51'),
(246, 1, 1000, '2', 'Route: internalHangar Request: /internalHangar', '2018-09-27 17:43:56'),
(247, 1, 1000, '2', 'Route: internalHangar Request: /internalHangar', '2018-09-27 17:43:56'),
(248, 1, 1000, '2', 'Route: internalHangar Request: /internalHangar', '2018-09-27 17:44:03'),
(249, 1, 1000, '2', 'Route: internalHangar Request: /internalHangar', '2018-09-27 17:44:03'),
(250, 1, 1000, '2', 'Route: internalHangar Request: /internalHangar', '2018-09-27 17:44:05'),
(251, 1, 1000, '2', 'Route: internalHangar Request: /internalHangar', '2018-09-27 17:44:05'),
(252, 1, 1000, '2', 'Route: internalHangar Request: /internalHangar', '2018-09-27 17:48:50'),
(253, 1, 1000, '2', 'Route: internalHangar Request: /internalHangar', '2018-09-27 17:48:50'),
(254, 1, 1000, '2', 'Route: internalMapRevolution Request: /internalMapRevolution', '2018-09-27 17:56:29'),
(255, 1, 1000, '2', 'Route: internalMapRevolution Request: /internalMapRevolution', '2018-09-27 17:56:29'),
(256, 1, 1000, '2', 'Route: internalMapRevolution Request: /internalMapRevolution', '2018-09-27 18:09:35'),
(257, 1, 1000, '2', 'Route: internalMapRevolution Request: /internalMapRevolution', '2018-09-27 18:09:36'),
(258, 1, 1000, '2', 'Route: internalMapRevolution Request: /internalMapRevolution', '2018-09-27 18:22:58'),
(259, 1, 1000, '2', 'Route: internalMapRevolution Request: /internalMapRevolution', '2018-09-27 18:22:58'),
(260, 1, 1000, '2', 'Route:  Request: /login.php', '2018-09-28 22:31:38'),
(261, 1, 1000, '2', 'Route:  Request: /login.php', '2018-09-28 22:31:38'),
(262, 1, 1000, '2', 'Route: internalStart Request: /internalStart', '2018-09-28 22:31:39'),
(263, 1, 1000, '2', 'Route: internalStart Request: /internalStart', '2018-09-28 22:31:40'),
(264, 1, 1000, '2', 'Route: internalMapRevolution Request: /internalMapRevolution', '2018-09-28 22:35:23'),
(265, 1, 1000, '2', 'Route: internalMapRevolution Request: /internalMapRevolution', '2018-09-28 22:35:23'),
(266, 1, 1000, '2', 'Route: internalMapRevolution Request: /internalMapRevolution', '2018-09-28 22:35:31'),
(267, 1, 1000, '2', 'Route: internalMapRevolution Request: /internalMapRevolution', '2018-09-28 22:35:32'),
(268, 1, 1000, '2', 'Route: internalMapRevolution Request: /internalMapRevolution', '2018-09-28 22:36:36'),
(269, 1, 1000, '2', 'Route: internalMapRevolution Request: /internalMapRevolution', '2018-09-28 22:36:36'),
(270, 1, 1000, '2', 'Route:  Request: /login.php', '2018-09-29 00:05:42'),
(271, 1, 1000, '2', 'Route:  Request: /login.php', '2018-09-29 00:05:42'),
(272, 1, 1000, '2', 'Route: internalStart Request: /internalStart', '2018-09-29 00:05:43'),
(273, 1, 1000, '2', 'Route: internalStart Request: /internalStart', '2018-09-29 00:05:43'),
(274, 1, 1000, '2', 'Route: internalMapRevolution Request: /internalMapRevolution', '2018-09-29 00:05:56'),
(275, 1, 1000, '2', 'Route: internalMapRevolution Request: /internalMapRevolution', '2018-09-29 00:05:56'),
(276, 1, 1000, '2', 'Route: internalMapRevolution Request: /internalMapRevolution', '2018-09-29 00:05:59'),
(277, 1, 1000, '2', 'Route: internalMapRevolution Request: /internalMapRevolution', '2018-09-29 00:05:59'),
(278, 1, 1000, '2', 'Route: internalMapRevolution Request: /internalMapRevolution', '2018-09-29 00:10:32'),
(279, 1, 1000, '2', 'Route: internalMapRevolution Request: /internalMapRevolution', '2018-09-29 00:10:32'),
(280, 1, 1000, '2', 'Route: internalMapRevolution Request: /internalMapRevolution', '2018-09-29 00:31:53'),
(281, 1, 1000, '2', 'Route: internalMapRevolution Request: /internalMapRevolution', '2018-09-29 00:31:53'),
(282, 1, 1000, '2', 'Route: internalMapRevolution Request: /internalMapRevolution', '2018-09-29 00:36:36'),
(283, 1, 1000, '2', 'Route: internalMapRevolution Request: /internalMapRevolution', '2018-09-29 00:36:36'),
(284, 1, 1000, '2', 'Route: internalMapRevolution Request: /internalMapRevolution', '2018-09-29 00:41:12'),
(285, 1, 1000, '2', 'Route: internalMapRevolution Request: /internalMapRevolution', '2018-09-29 00:41:12'),
(286, 1, 1000, '2', 'Route:  Request: /login.php', '2018-09-29 13:45:45'),
(287, 1, 1000, '2', 'Route:  Request: /login.php', '2018-09-29 13:45:46'),
(288, 1, 1000, '2', 'Route: internalStart Request: /internalStart', '2018-09-29 13:45:46'),
(289, 1, 1000, '2', 'Route: internalStart Request: /internalStart', '2018-09-29 13:45:46'),
(290, 1, 1000, '2', 'Route: internalMapRevolution Request: /internalMapRevolution', '2018-09-29 13:45:47'),
(291, 1, 1000, '2', 'Route: internalMapRevolution Request: /internalMapRevolution', '2018-09-29 13:45:47'),
(292, 1, 1000, '2', 'Route: internalMapRevolution Request: /internalMapRevolution', '2018-09-29 13:45:50'),
(293, 1, 1000, '2', 'Route: internalMapRevolution Request: /internalMapRevolution', '2018-09-29 13:45:50'),
(294, 1, 1000, '2', 'Route: internalMapRevolution Request: /internalMapRevolution', '2018-09-29 13:51:24'),
(295, 1, 1000, '2', 'Route: internalMapRevolution Request: /internalMapRevolution', '2018-09-29 13:51:24'),
(296, 1, 1000, '2', 'Route: internalMapRevolution Request: /internalMapRevolution', '2018-09-29 13:53:30'),
(297, 1, 1000, '2', 'Route: internalMapRevolution Request: /internalMapRevolution', '2018-09-29 13:53:30'),
(298, 1, 1000, '2', 'Route: internalMapRevolution Request: /internalMapRevolution', '2018-09-29 13:58:37'),
(299, 1, 1000, '2', 'Route: internalMapRevolution Request: /internalMapRevolution', '2018-09-29 13:58:38'),
(300, 1, 1000, '2', 'Route: internalMapRevolution Request: /internalMapRevolution', '2018-09-29 14:01:47'),
(301, 1, 1000, '2', 'Route: internalMapRevolution Request: /internalMapRevolution', '2018-09-29 14:01:47'),
(302, 1, 1000, '2', 'Route: internalMapRevolution Request: /internalMapRevolution', '2018-09-29 14:12:52'),
(303, 1, 1000, '2', 'Route: internalMapRevolution Request: /internalMapRevolution', '2018-09-29 14:12:52'),
(304, 1, 1000, '2', 'Route: internalMapRevolution Request: /internalMapRevolution', '2018-09-29 14:14:55'),
(305, 1, 1000, '2', 'Route: internalMapRevolution Request: /internalMapRevolution', '2018-09-29 14:14:55'),
(306, 1, 1000, '2', 'Route: internalMapRevolution Request: /internalMapRevolution', '2018-09-29 14:19:47'),
(307, 1, 1000, '2', 'Route: internalMapRevolution Request: /internalMapRevolution', '2018-09-29 14:19:47'),
(308, 1, 1000, '2', 'Route: internalMapRevolution Request: /internalMapRevolution', '2018-09-29 14:22:46'),
(309, 1, 1000, '2', 'Route: internalMapRevolution Request: /internalMapRevolution', '2018-09-29 14:22:46'),
(310, 1, 1000, '2', 'Route: internalMapRevolution Request: /internalMapRevolution', '2018-09-29 14:24:03'),
(311, 1, 1000, '2', 'Route: internalMapRevolution Request: /internalMapRevolution', '2018-09-29 14:24:04'),
(312, 1, 1000, '2', 'Route: internalMapRevolution Request: /internalMapRevolution', '2018-09-29 14:24:31'),
(313, 1, 1000, '2', 'Route: internalMapRevolution Request: /internalMapRevolution', '2018-09-29 14:24:31'),
(314, 1, 1000, '2', 'Route: internalMapRevolution Request: /internalMapRevolution', '2018-09-29 14:30:22'),
(315, 1, 1000, '2', 'Route: internalMapRevolution Request: /internalMapRevolution', '2018-09-29 14:30:22'),
(316, 1, 1000, '2', 'Route: internalMapRevolution Request: /internalMapRevolution', '2018-09-29 14:34:13'),
(317, 1, 1000, '2', 'Route: internalMapRevolution Request: /internalMapRevolution', '2018-09-29 14:34:13'),
(318, 1, 1000, '2', 'Route: internalMapRevolution Request: /internalMapRevolution', '2018-09-29 14:36:18'),
(319, 1, 1000, '2', 'Route: internalMapRevolution Request: /internalMapRevolution', '2018-09-29 14:36:18'),
(320, 1, 1000, '2', 'Route: internalMapRevolution Request: /internalMapRevolution', '2018-09-29 14:37:05'),
(321, 1, 1000, '2', 'Route: internalMapRevolution Request: /internalMapRevolution', '2018-09-29 14:37:05'),
(322, 1, 1000, '2', 'Route: internalMapRevolution Request: /internalMapRevolution', '2018-09-29 14:39:08'),
(323, 1, 1000, '2', 'Route: internalMapRevolution Request: /internalMapRevolution', '2018-09-29 14:39:08'),
(324, 1, 1000, '2', 'Route: internalMapRevolution Request: /internalMapRevolution', '2018-09-29 14:39:54'),
(325, 1, 1000, '2', 'Route: internalMapRevolution Request: /internalMapRevolution', '2018-09-29 14:39:54'),
(326, 1, 1000, '2', 'Route: internalMapRevolution Request: /internalMapRevolution', '2018-09-29 14:40:49'),
(327, 1, 1000, '2', 'Route: internalMapRevolution Request: /internalMapRevolution', '2018-09-29 14:40:50'),
(328, 1, 1000, '2', 'Route: internalMapRevolution Request: /internalMapRevolution', '2018-09-29 14:43:52'),
(329, 1, 1000, '2', 'Route: internalMapRevolution Request: /internalMapRevolution', '2018-09-29 14:43:52'),
(330, 1, 1000, '2', 'Route: internalMapRevolution Request: /internalMapRevolution', '2018-09-29 14:54:08'),
(331, 1, 1000, '2', 'Route: internalMapRevolution Request: /internalMapRevolution', '2018-09-29 14:54:08'),
(332, 1, 1000, '2', 'Route: internalMapRevolution Request: /internalMapRevolution', '2018-09-29 14:55:03'),
(333, 1, 1000, '2', 'Route: internalMapRevolution Request: /internalMapRevolution', '2018-09-29 14:55:03'),
(334, 1, 1000, '2', 'Route: internalMapRevolution Request: /internalMapRevolution', '2018-09-29 14:56:09'),
(335, 1, 1000, '2', 'Route: internalMapRevolution Request: /internalMapRevolution', '2018-09-29 14:56:10'),
(336, 1, 1000, '2', 'Route: internalMapRevolution Request: /internalMapRevolution', '2018-09-29 15:03:47'),
(337, 1, 1000, '2', 'Route: internalMapRevolution Request: /internalMapRevolution', '2018-09-29 15:03:47'),
(338, 1, 1000, '2', 'Route: internalMapRevolution Request: /internalMapRevolution', '2018-09-29 15:06:13'),
(339, 1, 1000, '2', 'Route: internalMapRevolution Request: /internalMapRevolution', '2018-09-29 15:06:13'),
(340, 1, 1000, '2', 'Route: internalMapRevolution Request: /internalMapRevolution', '2018-09-29 15:09:11'),
(341, 1, 1000, '2', 'Route: internalMapRevolution Request: /internalMapRevolution', '2018-09-29 15:09:11'),
(342, 1, 1000, '2', 'Route: internalMapRevolution Request: /internalMapRevolution', '2018-09-29 15:21:13'),
(343, 1, 1000, '2', 'Route: internalMapRevolution Request: /internalMapRevolution', '2018-09-29 15:21:14'),
(344, 1, 1000, '2', 'Route: internalMapRevolution Request: /internalMapRevolution', '2018-09-29 15:21:36'),
(345, 1, 1000, '2', 'Route: internalMapRevolution Request: /internalMapRevolution', '2018-09-29 15:21:36'),
(346, 1, 1000, '2', 'Route:  Request: /login.php', '2018-10-02 17:39:30'),
(347, 1, 1000, '2', 'Route:  Request: /login.php', '2018-10-02 17:39:31'),
(348, 1, 1000, '2', 'Route: internalStart Request: /internalStart', '2018-10-02 17:39:31'),
(349, 1, 1000, '2', 'Route: internalStart Request: /internalStart', '2018-10-02 17:39:31'),
(350, 1, 1000, '2', 'Route: internalMapRevolution Request: /internalMapRevolution', '2018-10-02 17:54:23'),
(351, 1, 1000, '2', 'Route: internalMapRevolution Request: /internalMapRevolution', '2018-10-02 17:54:24'),
(352, 1, 1000, '2', 'Route: internalMapRevolution Request: /internalMapRevolution', '2018-10-02 17:54:27'),
(353, 1, 1000, '2', 'Route: internalMapRevolution Request: /internalMapRevolution', '2018-10-02 17:54:27'),
(354, 1, 1000, '2', 'Route: internalMapRevolution Request: /internalMapRevolution', '2018-10-02 17:54:51'),
(355, 1, 1000, '2', 'Route: internalMapRevolution Request: /internalMapRevolution', '2018-10-02 17:54:51'),
(356, 1, 1000, '2', 'Route: internalMapRevolution Request: /internalMapRevolution', '2018-10-02 17:56:07'),
(357, 1, 1000, '2', 'Route: internalMapRevolution Request: /internalMapRevolution', '2018-10-02 17:56:07'),
(358, 1, 1000, '2', 'Route: internalMapRevolution Request: /internalMapRevolution', '2018-10-02 18:25:06'),
(359, 1, 1000, '2', 'Route: internalMapRevolution Request: /internalMapRevolution', '2018-10-02 18:25:06'),
(360, 1, 1000, '2', 'Route: internalShop Request: /internalShop', '2018-10-02 18:25:27'),
(361, 1, 1000, '2', 'Route: internalShop Request: /internalShop', '2018-10-02 18:25:27'),
(362, 1, 1000, '2', 'Route: internalHangar Request: /internalHangar', '2018-10-02 18:25:33'),
(363, 1, 1000, '2', 'Route: internalHangar Request: /internalHangar', '2018-10-02 18:25:33'),
(364, 1, 1000, '2', 'Route: internalMapRevolution Request: /internalMapRevolution', '2018-10-02 18:37:45'),
(365, 1, 1000, '2', 'Route: internalMapRevolution Request: /internalMapRevolution', '2018-10-02 18:37:45'),
(366, 1, 1000, '2', 'Route: internalMapRevolution Request: /internalMapRevolution', '2018-10-02 20:21:33'),
(367, 1, 1000, '2', 'Route: internalMapRevolution Request: /internalMapRevolution', '2018-10-02 20:21:34'),
(368, 1, 1000, '2', 'Route: gamechatas3cfgbase_89.xml Request: /gamechat/as3/cfg/base_89.xml', '2018-10-02 20:22:03'),
(369, 1, 1000, '2', 'Route: gamechatas3cfgbase_89.xml Request: /gamechat/as3/cfg/base_89.xml', '2018-10-02 20:22:03'),
(370, 1, 1000, '2', 'Route: gamechatas3cfgbase_89.xml Request: /gamechat/as3/cfg/base_89.xml', '2018-10-02 20:22:04'),
(371, 1, 1000, '2', 'Route: internalMapRevolution Request: /internalMapRevolution', '2018-10-02 20:22:25'),
(372, 1, 1000, '2', 'Route: internalMapRevolution Request: /internalMapRevolution', '2018-10-02 20:22:25'),
(373, 1, 1000, '2', 'Route: internalMapRevolution Request: /internalMapRevolution', '2018-10-02 20:23:31'),
(374, 1, 1000, '2', 'Route: internalMapRevolution Request: /internalMapRevolution', '2018-10-02 20:23:31'),
(375, 1, 1000, '2', 'Route: gamechatas3cfgbase_89.xml Request: /gamechat/as3/cfg/base_89.xml', '2018-10-02 20:23:49'),
(376, 1, 1000, '2', 'Route: gamechatas3cfgbase_89.xml Request: /gamechat/as3/cfg/base_89.xml', '2018-10-02 20:23:49'),
(377, 1, 1000, '2', 'Route: gamechatas3cfgbase_89.xml Request: /gamechat/as3/cfg/base_89.xml', '2018-10-02 20:23:50'),
(378, 1, 1000, '2', 'Route: internalMapRevolution Request: /internalMapRevolution', '2018-10-03 12:01:13'),
(379, 1, 1000, '2', 'Route: internalMapRevolution Request: /internalMapRevolution', '2018-10-03 12:01:14'),
(380, 1, 1000, '2', 'Route: internalMapRevolution Request: /internalMapRevolution', '2018-10-03 12:19:47'),
(381, 1, 1000, '2', 'Route: internalMapRevolution Request: /internalMapRevolution', '2018-10-03 12:19:47'),
(382, 1, 1000, '2', 'Route: internalMapRevolution Request: /internalMapRevolution', '2018-10-03 12:52:12'),
(383, 1, 1000, '2', 'Route: internalMapRevolution Request: /internalMapRevolution', '2018-10-03 12:52:12'),
(384, 1, 1000, '2', 'Route: internalMapRevolution Request: /internalMapRevolution', '2018-10-03 12:54:00'),
(385, 1, 1000, '2', 'Route: internalMapRevolution Request: /internalMapRevolution', '2018-10-03 12:54:00'),
(386, 1, 1000, '2', 'Route: internalMapRevolution Request: /internalMapRevolution', '2018-10-03 13:08:51'),
(387, 1, 1000, '2', 'Route: internalMapRevolution Request: /internalMapRevolution', '2018-10-03 13:08:51'),
(388, 1, 1000, '2', 'Route: internalMapRevolution Request: /internalMapRevolution', '2018-10-03 13:10:04'),
(389, 1, 1000, '2', 'Route: internalMapRevolution Request: /internalMapRevolution', '2018-10-03 13:10:04'),
(390, 1, 1000, '2', 'Route: internalMapRevolution Request: /internalMapRevolution', '2018-10-03 13:53:29'),
(391, 1, 1000, '2', 'Route: internalMapRevolution Request: /internalMapRevolution', '2018-10-03 13:53:29'),
(392, 1, 1000, '2', 'Route: internalMapRevolution Request: /internalMapRevolution', '2018-10-03 13:55:02'),
(393, 1, 1000, '2', 'Route: internalMapRevolution Request: /internalMapRevolution', '2018-10-03 13:55:03'),
(394, 1, 1000, '2', 'Route: internalMapRevolution Request: /internalMapRevolution', '2018-10-03 14:03:30'),
(395, 1, 1000, '2', 'Route: internalMapRevolution Request: /internalMapRevolution', '2018-10-03 14:03:30'),
(396, 1, 1000, '2', 'Route: internalMapRevolution Request: /internalMapRevolution?helpLink', '2018-10-03 14:08:35'),
(397, 1, 1000, '2', 'Route: internalMapRevolution Request: /internalMapRevolution?helpLink', '2018-10-03 14:08:35'),
(398, 1, 1000, '2', 'Route:  Request: /login.php', '2018-10-03 22:56:04'),
(399, 1, 1000, '2', 'Route:  Request: /login.php', '2018-10-03 22:56:04'),
(400, 1, 1000, '2', 'Route: internalStart Request: /internalStart', '2018-10-03 22:56:04'),
(401, 1, 1000, '2', 'Route: internalStart Request: /internalStart', '2018-10-03 22:56:05'),
(402, 1, 1000, '2', 'Route: internalMapRevolution Request: /internalMapRevolution', '2018-10-03 22:56:07'),
(403, 1, 1000, '2', 'Route: internalMapRevolution Request: /internalMapRevolution', '2018-10-03 22:56:07'),
(404, 1, 1000, '2', 'Route: internalMapRevolution Request: /internalMapRevolution', '2018-10-03 22:56:10'),
(405, 1, 1000, '2', 'Route: internalMapRevolution Request: /internalMapRevolution', '2018-10-03 22:56:10'),
(406, 1, 1000, '2', 'Route: internalMapRevolution Request: /internalMapRevolution', '2018-10-03 23:02:59'),
(407, 1, 1000, '2', 'Route: internalMapRevolution Request: /internalMapRevolution', '2018-10-03 23:02:59'),
(408, 1, 1000, '2', 'Route: gamechatas3cfgbase_89.xml Request: /gamechat/as3/cfg/base_89.xml', '2018-10-03 23:03:20'),
(409, 1, 1000, '2', 'Route: gamechatas3cfgbase_89.xml Request: /gamechat/as3/cfg/base_89.xml', '2018-10-03 23:03:20'),
(410, 1, 1000, '2', 'Route: gamechatas3cfgbase_89.xml Request: /gamechat/as3/cfg/base_89.xml', '2018-10-03 23:03:20'),
(411, 1, 1000, '2', 'Route: internalMapRevolution Request: /internalMapRevolution', '2018-10-03 23:04:53'),
(412, 1, 1000, '2', 'Route: internalMapRevolution Request: /internalMapRevolution', '2018-10-03 23:04:53'),
(413, 1, 1000, '2', 'Route: gamechatas3cfgbase_89.xml Request: /gamechat/as3/cfg/base_89.xml', '2018-10-03 23:05:10'),
(414, 1, 1000, '2', 'Route: gamechatas3cfgbase_89.xml Request: /gamechat/as3/cfg/base_89.xml', '2018-10-03 23:05:11'),
(415, 1, 1000, '2', 'Route: gamechatas3cfgbase_89.xml Request: /gamechat/as3/cfg/base_89.xml', '2018-10-03 23:05:11'),
(416, 1, 1000, '2', 'Route: internalMapRevolution Request: /internalMapRevolution', '2018-10-03 23:05:32'),
(417, 1, 1000, '2', 'Route: internalMapRevolution Request: /internalMapRevolution', '2018-10-03 23:05:32'),
(418, 1, 1000, '2', 'Route: internalHangar Request: /internalHangar', '2018-10-03 23:07:57'),
(419, 1, 1000, '2', 'Route: internalHangar Request: /internalHangar', '2018-10-03 23:07:58'),
(420, 1, 1000, '2', 'Route:  Request: /', '2018-10-03 23:19:18'),
(421, 1, 1000, '2', 'Route: internalMapRevolution Request: /internalMapRevolution', '2018-10-03 23:31:35'),
(422, 1, 1000, '2', 'Route: internalMapRevolution Request: /internalMapRevolution', '2018-10-03 23:31:35'),
(423, 1, 1000, '2', 'Route: internalAuction Request: /internalAuction', '2018-10-03 23:43:49'),
(424, 1, 1000, '2', 'Route: internalAuction Request: /internalAuction', '2018-10-03 23:43:50'),
(425, 1, 1000, '2', 'Route: internalShop Request: /internalShop', '2018-10-03 23:44:05'),
(426, 1, 1000, '2', 'Route: internalShop Request: /internalShop', '2018-10-03 23:44:05'),
(427, 1, 1000, '2', 'Route: internalClan Request: /internalClan', '2018-10-03 23:44:09'),
(428, 1, 1000, '2', 'Route: internalClan Request: /internalClan', '2018-10-03 23:44:09'),
(429, 1, 1000, '2', 'Route:  Request: /login.php', '2018-10-04 12:18:10'),
(430, 1, 1000, '2', 'Route:  Request: /login.php', '2018-10-04 12:18:11'),
(431, 1, 1000, '2', 'Route: internalStart Request: /internalStart', '2018-10-04 12:18:11'),
(432, 1, 1000, '2', 'Route: internalStart Request: /internalStart', '2018-10-04 12:18:12'),
(433, 1, 1000, '2', 'Route: internalMapRevolution Request: /internalMapRevolution', '2018-10-04 12:18:15'),
(434, 1, 1000, '2', 'Route: internalMapRevolution Request: /internalMapRevolution', '2018-10-04 12:18:15'),
(435, 1, 1000, '2', 'Route: internalMapRevolution Request: /internalMapRevolution', '2018-10-04 12:18:23'),
(436, 1, 1000, '2', 'Route: internalMapRevolution Request: /internalMapRevolution', '2018-10-04 12:18:23'),
(437, 1, 1000, '2', 'Route: internalMapRevolution Request: /internalMapRevolution', '2018-10-04 12:22:14'),
(438, 1, 1000, '2', 'Route: internalMapRevolution Request: /internalMapRevolution', '2018-10-04 12:22:14'),
(439, 1, 1000, '2', 'Route: spacemapgraphicslocaleenhintshint_buyPet.png Request: /spacemap/graphics/locale/en/hints/hint_buyPet.png?__cv=6336b2cc18b1011034f9564b6b0bf100', '2018-10-04 12:22:27'),
(440, 1, 1000, '2', 'Route: spacemapgraphicslocaleenhintshint_buyPet.png Request: /spacemap/graphics/locale/en/hints/hint_buyPet.png?__cv=6336b2cc18b1011034f9564b6b0bf100', '2018-10-04 12:22:27'),
(441, 1, 1000, '2', 'Route:  Request: /', '2018-10-04 12:32:02'),
(442, 1, 1000, '2', 'Route: internalHangar Request: /internalHangar', '2018-10-04 12:46:37'),
(443, 1, 1000, '2', 'Route: internalHangar Request: /internalHangar', '2018-10-04 12:46:38'),
(444, 1, 1000, '2', 'Route: resourcescssbootstrapbootstrap.min.css.map Request: /resources/css/bootstrap/bootstrap.min.css.map', '2018-10-04 12:46:46'),
(445, 1, 1000, '2', 'Route: resourcescssbootstrapbootstrap.min.css.map Request: /resources/css/bootstrap/bootstrap.min.css.map', '2018-10-04 12:46:47'),
(446, 1, 1000, '2', 'Route: internalHangar Request: /internalHangar', '2018-10-04 12:48:43'),
(447, 1, 1000, '2', 'Route: internalHangar Request: /internalHangar', '2018-10-04 12:48:43'),
(448, 1, 1000, '2', 'Route: resourcescssbootstrapbootstrap.min.css.map Request: /resources/css/bootstrap/bootstrap.min.css.map', '2018-10-04 12:48:43'),
(449, 1, 1000, '2', 'Route: resourcescssbootstrapbootstrap.min.css.map Request: /resources/css/bootstrap/bootstrap.min.css.map', '2018-10-04 12:48:44'),
(450, 1, 1000, '2', 'Route: internalHangar Request: /internalHangar', '2018-10-04 12:50:00'),
(451, 1, 1000, '2', 'Route: internalHangar Request: /internalHangar', '2018-10-04 12:50:00'),
(452, 1, 1000, '2', 'Route: internalHangar Request: /internalHangar', '2018-10-04 12:50:11'),
(453, 1, 1000, '2', 'Route: internalHangar Request: /internalHangar', '2018-10-04 12:50:11'),
(454, 1, 1000, '2', 'Route: internalHangar Request: /internalHangar', '2018-10-04 12:54:19'),
(455, 1, 1000, '2', 'Route: internalHangar Request: /internalHangar', '2018-10-04 12:54:19'),
(456, 1, 1000, '2', 'Route: internalShop Request: /internalShop', '2018-10-04 13:49:47'),
(457, 1, 1000, '2', 'Route: internalShop Request: /internalShop', '2018-10-04 13:49:47'),
(458, 1, 1000, '2', 'Route: internalHangar Request: /internalHangar', '2018-10-04 13:51:22'),
(459, 1, 1000, '2', 'Route: internalHangar Request: /internalHangar', '2018-10-04 13:51:22'),
(460, 1, 1000, '2', 'Route: internalShop Request: /internalShop', '2018-10-04 13:52:38'),
(461, 1, 1000, '2', 'Route: internalShop Request: /internalShop', '2018-10-04 13:52:38'),
(462, 1, 1000, '2', 'Route: internalStart Request: /internalStart', '2018-10-04 13:52:43'),
(463, 1, 1000, '2', 'Route: internalStart Request: /internalStart', '2018-10-04 13:52:43'),
(464, 1, 1000, '2', 'Route: internalAuction Request: /internalAuction', '2018-10-04 13:53:11'),
(465, 1, 1000, '2', 'Route: internalAuction Request: /internalAuction', '2018-10-04 13:53:11'),
(466, 1, 1000, '2', 'Route: internalSkylab Request: /internalSkylab', '2018-10-04 13:53:35'),
(467, 1, 1000, '2', 'Route: internalSkylab Request: /internalSkylab', '2018-10-04 13:53:35'),
(468, 1, 1000, '2', 'Route: resourcesimagesskylabmodul4.png Request: /resources/images/skylab/modul4.png', '2018-10-04 13:53:35'),
(469, 1, 1000, '2', 'Route: resourcesimagesskylabmodul3.png Request: /resources/images/skylab/modul3.png', '2018-10-04 13:53:36'),
(470, 1, 1000, '2', 'Route: resourcesimagesskylabmodul5.png Request: /resources/images/skylab/modul5.png', '2018-10-04 13:53:36'),
(471, 1, 1000, '2', 'Route: resourcesimagesskylabmodul1.png Request: /resources/images/skylab/modul1.png', '2018-10-04 13:53:36'),
(472, 1, 1000, '2', 'Route: resourcesimagesskylabmodul4.png Request: /resources/images/skylab/modul4.png', '2018-10-04 13:53:36'),
(473, 1, 1000, '2', 'Route: resourcesimagesskylabmodul2.png Request: /resources/images/skylab/modul2.png', '2018-10-04 13:53:36'),
(474, 1, 1000, '2', 'Route: resourcesimagesskylabmodul3.png Request: /resources/images/skylab/modul3.png', '2018-10-04 13:53:36'),
(475, 1, 1000, '2', 'Route: resourcesimagesskylabmodul5.png Request: /resources/images/skylab/modul5.png', '2018-10-04 13:53:36'),
(476, 1, 1000, '2', 'Route: resourcesimagesskylabmodul7.png Request: /resources/images/skylab/modul7.png', '2018-10-04 13:53:36'),
(477, 1, 1000, '2', 'Route: resourcesimagesskylabmodul2.png Request: /resources/images/skylab/modul2.png', '2018-10-04 13:53:36'),
(478, 1, 1000, '2', 'Route: resourcesimagesskylabmodul1.png Request: /resources/images/skylab/modul1.png', '2018-10-04 13:53:36'),
(479, 1, 1000, '2', 'Route: resourcesimagesskylabmodul9.png Request: /resources/images/skylab/modul9.png', '2018-10-04 13:53:36'),
(480, 1, 1000, '2', 'Route: resourcesimagesskylabmodul7.png Request: /resources/images/skylab/modul7.png', '2018-10-04 13:53:36'),
(481, 1, 1000, '2', 'Route: resourcesimagesskylabmodul8.png Request: /resources/images/skylab/modul8.png', '2018-10-04 13:53:36'),
(482, 1, 1000, '2', 'Route: resourcesimagesskylabmodul6.png Request: /resources/images/skylab/modul6.png', '2018-10-04 13:53:36'),
(483, 1, 1000, '2', 'Route: resourcesimagesskylabmodul9.png Request: /resources/images/skylab/modul9.png', '2018-10-04 13:53:36'),
(484, 1, 1000, '2', 'Route: resourcesimagesskylabmodul8.png Request: /resources/images/skylab/modul8.png', '2018-10-04 13:53:36'),
(485, 1, 1000, '2', 'Route: resourcesimagesskylabmodul6.png Request: /resources/images/skylab/modul6.png', '2018-10-04 13:53:37'),
(486, 1, 1000, '2', 'Route: internalAuction Request: /internalAuction', '2018-10-04 13:53:45'),
(487, 1, 1000, '2', 'Route: internalAuction Request: /internalAuction', '2018-10-04 13:53:45'),
(488, 1, 1000, '2', 'Route: internalSkylab Request: /internalSkylab', '2018-10-04 13:53:49'),
(489, 1, 1000, '2', 'Route: resourcesimagesskylabmodul3.png Request: /resources/images/skylab/modul3.png', '2018-10-04 13:53:49'),
(490, 1, 1000, '2', 'Route: internalSkylab Request: /internalSkylab', '2018-10-04 13:53:49'),
(491, 1, 1000, '2', 'Route: resourcesimagesskylabmodul4.png Request: /resources/images/skylab/modul4.png', '2018-10-04 13:53:49'),
(492, 1, 1000, '2', 'Route: resourcesimagesskylabmodul2.png Request: /resources/images/skylab/modul2.png', '2018-10-04 13:53:49');
INSERT INTO `player_logs` (`ID`, `USER_ID`, `PLAYER_ID`, `LOG_TYPE`, `LOG_DESCRIPTION`, `LOG_DATE`) VALUES
(493, 1, 1000, '2', 'Route: resourcesimagesskylabmodul5.png Request: /resources/images/skylab/modul5.png', '2018-10-04 13:53:49'),
(494, 1, 1000, '2', 'Route: resourcesimagesskylabmodul3.png Request: /resources/images/skylab/modul3.png', '2018-10-04 13:53:50'),
(495, 1, 1000, '2', 'Route: resourcesimagesskylabmodul1.png Request: /resources/images/skylab/modul1.png', '2018-10-04 13:53:50'),
(496, 1, 1000, '2', 'Route: resourcesimagesskylabmodul4.png Request: /resources/images/skylab/modul4.png', '2018-10-04 13:53:50'),
(497, 1, 1000, '2', 'Route: resourcesimagesskylabmodul7.png Request: /resources/images/skylab/modul7.png', '2018-10-04 13:53:50'),
(498, 1, 1000, '2', 'Route: resourcesimagesskylabmodul2.png Request: /resources/images/skylab/modul2.png', '2018-10-04 13:53:50'),
(499, 1, 1000, '2', 'Route: resourcesimagesskylabmodul5.png Request: /resources/images/skylab/modul5.png', '2018-10-04 13:53:50'),
(500, 1, 1000, '2', 'Route: resourcesimagesskylabmodul1.png Request: /resources/images/skylab/modul1.png', '2018-10-04 13:53:50'),
(501, 1, 1000, '2', 'Route: resourcesimagesskylabmodul9.png Request: /resources/images/skylab/modul9.png', '2018-10-04 13:53:50'),
(502, 1, 1000, '2', 'Route: resourcesimagesskylabmodul8.png Request: /resources/images/skylab/modul8.png', '2018-10-04 13:53:50'),
(503, 1, 1000, '2', 'Route: resourcesimagesskylabmodul7.png Request: /resources/images/skylab/modul7.png', '2018-10-04 13:53:50'),
(504, 1, 1000, '2', 'Route: resourcesimagesskylabmodul6.png Request: /resources/images/skylab/modul6.png', '2018-10-04 13:53:50'),
(505, 1, 1000, '2', 'Route: resourcesimagesskylabmodul9.png Request: /resources/images/skylab/modul9.png', '2018-10-04 13:53:50'),
(506, 1, 1000, '2', 'Route: resourcesimagesskylabmodul8.png Request: /resources/images/skylab/modul8.png', '2018-10-04 13:53:50'),
(507, 1, 1000, '2', 'Route: resourcesimagesskylabmodul6.png Request: /resources/images/skylab/modul6.png', '2018-10-04 13:53:50'),
(508, 1, 1000, '2', 'Route: internalStart Request: /internalStart', '2018-10-04 13:55:40'),
(509, 1, 1000, '2', 'Route: internalStart Request: /internalStart', '2018-10-04 13:55:40'),
(510, 1, 1000, '2', 'Route: internalMapRevolution Request: /internalMapRevolution', '2018-10-04 13:59:51'),
(511, 1, 1000, '2', 'Route: internalMapRevolution Request: /internalMapRevolution', '2018-10-04 13:59:51'),
(512, 1, 1000, '2', 'Route: spacemapgraphicslocaleenhintshint_buyPet.png Request: /spacemap/graphics/locale/en/hints/hint_buyPet.png?__cv=6336b2cc18b1011034f9564b6b0bf100', '2018-10-04 14:00:06'),
(513, 1, 1000, '2', 'Route: spacemapgraphicslocaleenhintshint_buyPet.png Request: /spacemap/graphics/locale/en/hints/hint_buyPet.png?__cv=6336b2cc18b1011034f9564b6b0bf100', '2018-10-04 14:00:06');

-- --------------------------------------------------------

--
-- Table structure for table `player_pet`
--

CREATE TABLE `player_pet` (
  `USER_ID` int(11) NOT NULL DEFAULT '0',
  `PLAYER_ID` int(11) NOT NULL,
  `PET_NAME` varchar(255) NOT NULL,
  `PET_LVL` int(11) NOT NULL,
  `PET_EXP` int(11) NOT NULL,
  `PET_HP` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `player_pet`
--

INSERT INTO `player_pet` (`USER_ID`, `PLAYER_ID`, `PET_NAME`, `PET_LVL`, `PET_EXP`, `PET_HP`) VALUES
(1, 1000, 'nigro', 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `player_pet_config`
--

CREATE TABLE `player_pet_config` (
  `USER_ID` int(11) NOT NULL DEFAULT '0',
  `PLAYER_ID` int(11) DEFAULT NULL,
  `CONFIG_1_DMG` int(11) DEFAULT NULL,
  `CONFIG_2_DMG` int(11) DEFAULT NULL,
  `CONFIG_1_SHIELD` int(11) DEFAULT NULL,
  `CONFIG_2_SHIELD` int(11) DEFAULT NULL,
  `CONFIG_1_GEARS` text,
  `CONFIG_2_GEARS` text,
  `CONFIG_1_PROTOCOLLS` text,
  `CONFIG_2_PROTOCOLLS` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `player_pet_config`
--

INSERT INTO `player_pet_config` (`USER_ID`, `PLAYER_ID`, `CONFIG_1_DMG`, `CONFIG_2_DMG`, `CONFIG_1_SHIELD`, `CONFIG_2_SHIELD`, `CONFIG_1_GEARS`, `CONFIG_2_GEARS`, `CONFIG_1_PROTOCOLLS`, `CONFIG_2_PROTOCOLLS`) VALUES
(1, 1000, 0, 0, 0, 0, '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `player_queststats`
--

CREATE TABLE `player_queststats` (
  `USER_ID` int(11) NOT NULL,
  `PLAYER_ID` int(11) NOT NULL,
  `QUEST_0` text,
  `QUEST_1` text,
  `QUEST_2` text,
  `QUEST_3` text,
  `QUEST_4` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `player_queststats`
--

INSERT INTO `player_queststats` (`USER_ID`, `PLAYER_ID`, `QUEST_0`, `QUEST_1`, `QUEST_2`, `QUEST_3`, `QUEST_4`) VALUES
(1, 1000, 'null', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `player_ship_config`
--

CREATE TABLE `player_ship_config` (
  `USER_ID` int(11) NOT NULL DEFAULT '0',
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
  `CONFIG_2_LASER_TYPES` tinyint(1) NOT NULL COMMENT '0-Mixed, 1-all lasers equipped on ship (not drones / pet) are LF1, 2-all lasers.. LF2, 3-all... LF3, 4-all.. LF4'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `player_ship_config`
--

INSERT INTO `player_ship_config` (`USER_ID`, `PLAYER_ID`, `HANGAR_ID`, `CONFIG_1_DMG`, `CONFIG_2_DMG`, `CONFIG_1_SHIELD`, `CONFIG_2_SHIELD`, `CONFIG_1_SHIELD_LEFT`, `CONFIG_2_SHIELD_LEFT`, `CONFIG_1_SPEED`, `CONFIG_2_SPEED`, `CONFIG_1_EXTRAS`, `CONFIG_2_EXTRAS`, `CONFIG_1_HEAVY`, `CONFIG_2_HEAVY`, `CONFIG_1_SHIELDABSORB`, `CONFIG_2_SHIELDABSORB`, `CONFIG_1_LASERCOUNT`, `CONFIG_2_LASERCOUNT`, `CONFIG_1_LASER_TYPES`, `CONFIG_2_LASER_TYPES`) VALUES
(1, 1000, 2, 4500, 4500, 120000, 10000, 120000, 10000, 300, 450, '[{\"Id\":4,\"Amount\":0,\"LootId\":\"equipment_extra_repbot_rep-1\"}]', '[{\"Id\":4,\"Amount\":0,\"LootId\":\"equipment_extra_repbot_rep-1\"}]', '[]', '[]', 96000, 8000, 15, 15, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `player_skill_tree`
--

CREATE TABLE `player_skill_tree` (
  `USER_ID` int(11) NOT NULL,
  `PLAYER_ID` int(11) NOT NULL,
  `SHIP_HULL` tinyint(1) NOT NULL,
  `ENGINEERING` tinyint(1) NOT NULL,
  `SHIELD_ENGINEERING` tinyint(1) NOT NULL,
  `EVASIVE_MANEUVERS` tinyint(1) NOT NULL,
  `SHIELD_MECHANICS` tinyint(1) NOT NULL,
  `TACTICS` tinyint(1) NOT NULL,
  `LOGISTICS` tinyint(1) NOT NULL,
  `LUCK` tinyint(1) NOT NULL,
  `CRUELTY` tinyint(1) NOT NULL,
  `TRACTOR_BEAM` tinyint(1) NOT NULL,
  `GREED` tinyint(1) NOT NULL,
  `DETONATION` tinyint(1) NOT NULL,
  `EXPLOSIVES` tinyint(1) NOT NULL,
  `HEAT_SEEKING_MISSLES` tinyint(1) NOT NULL,
  `BOUNTY_HUNTER` tinyint(1) NOT NULL,
  `ROCKET_FUSION` tinyint(1) NOT NULL,
  `ALIEN_HUNTER` tinyint(1) NOT NULL,
  `ELECTRO_OPTICS` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `player_skill_tree`
--

INSERT INTO `player_skill_tree` (`USER_ID`, `PLAYER_ID`, `SHIP_HULL`, `ENGINEERING`, `SHIELD_ENGINEERING`, `EVASIVE_MANEUVERS`, `SHIELD_MECHANICS`, `TACTICS`, `LOGISTICS`, `LUCK`, `CRUELTY`, `TRACTOR_BEAM`, `GREED`, `DETONATION`, `EXPLOSIVES`, `HEAT_SEEKING_MISSLES`, `BOUNTY_HUNTER`, `ROCKET_FUSION`, `ALIEN_HUNTER`, `ELECTRO_OPTICS`) VALUES
(1, 1000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `player_skylab`
--

CREATE TABLE `player_skylab` (
  `USER_ID` int(11) NOT NULL,
  `PLAYER_ID` int(11) NOT NULL,
  `COLLECTORS` text NOT NULL,
  `ORES` text NOT NULL,
  `TRANSFER_IN_PROGRESS` tinyint(1) NOT NULL,
  `TRANSFER_END_TIME` datetime NOT NULL,
  `TRANSFER_CONTENT` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `server_announcements`
--

CREATE TABLE `server_announcements` (
  `ID` int(11) NOT NULL,
  `ANNOUNCEMENT` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `server_announcements`
--

INSERT INTO `server_announcements` (`ID`, `ANNOUNCEMENT`) VALUES
(0, 'Test anouncement'),
(1, '2ndOne');

-- --------------------------------------------------------

--
-- Table structure for table `server_auctions`
--

CREATE TABLE `server_auctions` (
  `ID` int(11) NOT NULL,
  `ITEM_ID` int(11) NOT NULL,
  `ITEM_Q` int(11) NOT NULL,
  `ITEM_TYPE` varchar(255) NOT NULL,
  `AUCTION_TYPE` int(11) NOT NULL COMMENT '(1 = hourly, 2 = daily , 3= weekly)',
  `MAX_BID` bigint(20) NOT NULL,
  `BID_USER_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `server_auctions`
--

INSERT INTO `server_auctions` (`ID`, `ITEM_ID`, `ITEM_Q`, `ITEM_TYPE`, `AUCTION_TYPE`, `MAX_BID`, `BID_USER_ID`) VALUES
(65, 31, 10000, 'item', 1, 0, 0),
(66, 29, 10000, 'item', 1, 0, 0),
(67, 30, 10000, 'item', 1, 0, 0),
(68, 9, 1, 'item', 1, 0, 0),
(69, 6, 1, 'item', 1, 20000, 690),
(70, 20, 1, 'item', 1, 0, 0),
(71, 21, 1, 'item', 1, 0, 0),
(72, 56, 1, 'item', 1, 0, 0),
(73, 57, 1, 'item', 1, 0, 0),
(74, 58, 1, 'item', 1, 0, 0),
(75, 75, 1, 'item', 1, 0, 0),
(76, 74, 1, 'item', 1, 0, 0),
(77, 73, 1, 'item', 1, 10000, 689),
(78, 59, 1, 'item', 1, 0, 0),
(79, 61, 1, 'item', 1, 0, 0),
(80, 62, 1, 'item', 1, 0, 0),
(81, 63, 1, 'item', 1, 10000, 689),
(82, 65, 1, 'item', 1, 10000, 689),
(83, 66, 1, 'item', 1, 10000, 689),
(84, 69, 1, 'item', 1, 0, 0),
(85, 71, 1, 'item', 1, 0, 0),
(86, 72, 1, 'item', 1, 0, 0),
(87, 81, 1, 'item', 1, 0, 0),
(88, 22, 1, 'item', 1, 0, 0),
(89, 1, 1, 'item', 1, 0, 0),
(90, 14, 1, 'item', 1, 0, 0),
(91, 25, 1, 'item', 1, 0, 0),
(92, 3, 1, 'ship', 1, 10000, 684),
(93, 8, 1, 'ship', 1, 10000, 684),
(94, 10, 1, 'ship', 1, 20000, 687),
(95, 16, 1, 'ship_design', 1, 0, 0),
(96, 17, 1, 'ship_design', 1, 0, 0),
(97, 58, 1, 'ship_design', 1, 0, 0),
(98, 60, 1, 'ship_design', 1, 0, 0),
(99, 56, 1, 'ship_design', 1, 0, 0),
(100, 59, 1, 'ship_design', 1, 0, 0),
(101, 61, 1, 'ship_design', 1, 0, 0),
(102, 62, 1, 'ship_design', 1, 0, 0),
(103, 63, 1, 'ship_design', 2, 0, 0),
(104, 64, 1, 'ship_design', 2, 10000, 687),
(105, 65, 1, 'ship_design', 2, 0, 0),
(106, 66, 1, 'ship_design', 2, 0, 0),
(107, 67, 1, 'ship_design', 2, 10000, 684),
(108, 18, 1, 'ship_design', 2, 10000, 684);

-- --------------------------------------------------------

--
-- Table structure for table `server_auctions_settings`
--

CREATE TABLE `server_auctions_settings` (
  `LAST_HOURLY` text NOT NULL,
  `LAST_DAILY` text NOT NULL,
  `LAST_WEEKLY` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `server_auctions_settings`
--

INSERT INTO `server_auctions_settings` (`LAST_HOURLY`, `LAST_DAILY`, `LAST_WEEKLY`) VALUES
('2017-09-30 19:00:00', '2017-09-30 00:00:00', '2017-09-29 16:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `server_beta_info`
--

CREATE TABLE `server_beta_info` (
  `PUBLIC_END` datetime NOT NULL,
  `WHITELISTED_PLAYERS` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `server_beta_info`
--

INSERT INTO `server_beta_info` (`PUBLIC_END`, `WHITELISTED_PLAYERS`) VALUES
('2017-01-23 23:00:00', '[544,495,498]');

-- --------------------------------------------------------

--
-- Table structure for table `server_chat_bans`
--

CREATE TABLE `server_chat_bans` (
  `ID` int(11) NOT NULL,
  `PLAYER_ID` int(11) NOT NULL,
  `ISSUED_TIME` datetime NOT NULL,
  `REASON` text NOT NULL,
  `EXPIRE_TIME` datetime NOT NULL,
  `ISSUED_BY` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `server_chat_login`
--

CREATE TABLE `server_chat_login` (
  `USER_LOGIN_MSG` text NOT NULL,
  `MODERATOR_LOGIN_MSG` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `server_chat_login`
--

INSERT INTO `server_chat_login` (`USER_LOGIN_MSG`, `MODERATOR_LOGIN_MSG`) VALUES
('Welcome', 'Welcome');

-- --------------------------------------------------------

--
-- Table structure for table `server_chat_moderators`
--

CREATE TABLE `server_chat_moderators` (
  `USER_ID` int(11) NOT NULL,
  `PLAYER_ID` int(11) NOT NULL,
  `NAME` varchar(255) NOT NULL,
  `LEVEL` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `server_chat_moderators`
--

INSERT INTO `server_chat_moderators` (`USER_ID`, `PLAYER_ID`, `NAME`, `LEVEL`) VALUES
(678, 5036, 'general_Rejection', 2);

-- --------------------------------------------------------

--
-- Table structure for table `server_chat_rooms`
--

CREATE TABLE `server_chat_rooms` (
  `ID` int(11) NOT NULL,
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
  `MAX_AVG_ROOM_USER` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `server_clanbattlestations`
--

CREATE TABLE `server_clanbattlestations` (
  `ID` int(11) NOT NULL,
  `NAME` varchar(255) NOT NULL,
  `FACTION` tinyint(1) NOT NULL,
  `TYPE` tinyint(1) NOT NULL COMMENT 'Asteroid: 0 / Clan BattleStation: 1',
  `MAP_ID` int(11) NOT NULL,
  `CLAN_ID` int(11) NOT NULL,
  `POSITION` text NOT NULL,
  `MODULES` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `server_clans`
--

CREATE TABLE `server_clans` (
  `ID` int(11) NOT NULL,
  `NAME` varchar(50) NOT NULL,
  `TAG` varchar(4) NOT NULL,
  `DESCRIPTION` varchar(1000) NOT NULL,
  `MEMBERS` longtext NOT NULL,
  `LEADER` int(11) NOT NULL,
  `FACTION` int(1) NOT NULL,
  `IS_ACCEPTING` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `server_collectables`
--

CREATE TABLE `server_collectables` (
  `ID` int(11) NOT NULL,
  `TYPE` varchar(255) NOT NULL,
  `REWARDS` text NOT NULL,
  `SPAWN_COUNT` int(11) NOT NULL,
  `PVP_SPAWN_COUNT` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `server_collectables`
--

INSERT INTO `server_collectables` (`ID`, `TYPE`, `REWARDS`, `SPAWN_COUNT`, `PVP_SPAWN_COUNT`) VALUES
(2, 'BONUS_BOX', '[{\"Item1\":\"credits\",\"Item2\":100000},{\"Item1\":\"credits\",\"Item2\":20000},{\"Item1\":\"credits\",\"Item2\":50000},{\"Item1\":\"uridium\",\"Item2\":100},{\"Item1\":\"uridium\",\"Item2\":300},{\"Item1\":\"uridium\",\"Item2\":500},{\"Item1\":\"ammunition_laser_lcb-10\",\"Item2\":10000},{\"Item1\":\"ammunition_laser_lcb-10\",\"Item2\":2000},{\"Item1\":\"ammunition_laser_mcb-25\",\"Item2\":3000},{\"Item1\":\"ammunition_laser_mcb-50\",\"Item2\":1000},{\"Item1\":\"ammunition_rocket_r-310\",\"Item2\":8},{\"Item1\":\"ammunition_rocket_r-310\",\"Item2\":16},{\"Item1\":\"ammunition_rocket_plt-2026\",\"Item2\":4},{\"Item1\":\"ammunition_rocket_plt-2026\",\"Item2\":8},{\"Item1\":\"ammunition_laser_ucb-100\",\"Item2\":550},{\"Item1\":\"ammunition_laser_rsb-75\",\"Item2\":100}]', 150, 300);

-- --------------------------------------------------------

--
-- Table structure for table `server_config`
--

CREATE TABLE `server_config` (
  `DEFAULT_SHIP` int(11) NOT NULL,
  `DEFAULT_URI` int(11) NOT NULL,
  `DEFAULT_CREDITS` int(11) NOT NULL,
  `DEFAULT_ITEMS` text NOT NULL COMMENT 'JSON-FORMAT',
  `DEFAULT_AMMO` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 MAX_ROWS=1 MIN_ROWS=1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `server_config`
--

INSERT INTO `server_config` (`DEFAULT_SHIP`, `DEFAULT_URI`, `DEFAULT_CREDITS`, `DEFAULT_ITEMS`, `DEFAULT_AMMO`) VALUES
(1, 10000, 50000, '{\"items\":[{\"ID\":1,\"Q\":1,\"LVL\":1},{\"ID\":6,\"Q\":1,\"LVL\":1},{\"ID\":21,\"Q\":1,\"LVL\":0},{\"ID\":55,\"Q\":1,\"LVL\":0}]}\r\n', '{\"ammo\":[{\"NAME\":\"LCB_10\",\"Q\":10000, \"NAME\":\"R_310\", \"Q\":150}]}');

-- --------------------------------------------------------

--
-- Table structure for table `server_events`
--

CREATE TABLE `server_events` (
  `ID` int(11) NOT NULL,
  `NAME` varchar(255) NOT NULL,
  `DESCRIPTION` text NOT NULL,
  `TYPE` int(11) NOT NULL,
  `ACTIVE` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `server_events`
--

INSERT INTO `server_events` (`ID`, `NAME`, `DESCRIPTION`, `TYPE`, `ACTIVE`) VALUES
(0, 'Scoremageddon', 'Whoever strikes the highest score gets the best reward.', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `server_galaxy_gates`
--

CREATE TABLE `server_galaxy_gates` (
  `ID` int(11) NOT NULL,
  `NAME` varchar(225) NOT NULL,
  `PART_CNT` int(11) NOT NULL,
  `REWARDS` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `server_galaxy_gates`
--

INSERT INTO `server_galaxy_gates` (`ID`, `NAME`, `PART_CNT`, `REWARDS`) VALUES
(1, 'Alpha', 34, ''),
(2, 'Beta', 48, ''),
(3, 'Gamma', 82, ''),
(4, 'Delta', 128, '');

-- --------------------------------------------------------

--
-- Table structure for table `server_game_bans`
--

CREATE TABLE `server_game_bans` (
  `ID` int(11) NOT NULL,
  `PLAYER_ID` int(11) NOT NULL,
  `ISSUED_TIME` datetime NOT NULL,
  `REASON` text NOT NULL,
  `EXPIRE_TIME` datetime NOT NULL,
  `ISSUED_BY` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `server_items`
--

CREATE TABLE `server_items` (
  `ID` int(11) NOT NULL,
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
  `DESCRIPTION` varchar(255) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `server_items`
--

INSERT INTO `server_items` (`ID`, `NAME`, `TYPE`, `LOOT_ID`, `CATEGORY`, `PRICE_U`, `PRICE_C`, `SELLING_CREDITS`, `DAMAGE`, `SHIELD`, `SHIELD_ABSORBATION`, `SPEED`, `SLOTS`, `EFFECT`, `USES`, `DESCRIPTION`) VALUES
(1, 'LF-3', 0, 'equipment_weapon_laser_lf-3', 'laser', 10000, 0, 25000, 150, NULL, NULL, NULL, NULL, NULL, NULL, 'Much stronger laser: Causes up to 150 damage points per round'),
(2, 'LF-4', 0, '', 'laser', 5000000, 0, 2500000, 200, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 'SG3N-A01', 2, 'equipment_generator_shield_sg3n-a01', 'generator', 0, 10000, 5000, NULL, 1000, 400, NULL, NULL, NULL, NULL, '1,000 shield strength / 40% less damage'),
(6, 'SG3N-B02', 2, 'equipment_generator_shield_sg3n-b02', 'generator', 10000, 0, 25000, NULL, 10000, 8000, NULL, NULL, NULL, NULL, '10,000 shield strength / 80% less damage'),
(7, 'SG3N-A02', 2, 'equipment_generator_shield_sg3n-a02', 'generator', 0, 20000, 10000, NULL, 2000, 1200, NULL, NULL, NULL, NULL, '2,000 shield strength / 50% less damage'),
(8, 'SG3N-A03', 2, 'equipment_generator_shield_sg3n-a03', 'generator', 0, 256000, 1280000, NULL, 5000, 3500, NULL, NULL, NULL, NULL, '5,000 shield strength / 60% less damage'),
(9, 'SG3N-B01', 2, 'equipment_generator_shield_sg3n-b01', 'generator', 5000, 0, 0, NULL, 4000, 2800, NULL, NULL, NULL, NULL, '4,000 shield strength / 70% less damage'),
(13, 'Apis', 24, 'drone_apis', 'drone', 1000000, 0, 2500000, NULL, NULL, NULL, NULL, 2, NULL, NULL, 'Power drone with two slots'),
(14, 'Iris', 24, 'drone_iris', 'drone', 15000, 0, 37500, NULL, NULL, NULL, NULL, 2, NULL, NULL, 'Power drone with two slots'),
(15, 'Flax', 24, 'drone_flax', 'drone', 0, 100000, 50000, NULL, NULL, NULL, NULL, 1, NULL, NULL, 'Starter drone with one slot'),
(16, 'G3N-1010', 3, 'equipment_generator_speed_g3n-1010', 'generator', 0, 2000, 1000, NULL, NULL, NULL, 2, NULL, NULL, NULL, 'Increases ship speed by 2'),
(17, 'G3N-2010', 3, 'equipment_generator_speed_g3n-2010', 'generator', 0, 4000, 2000, NULL, NULL, NULL, 3, NULL, NULL, NULL, 'Increases ship speed by 3'),
(18, 'G3N-3210', 3, 'equipment_generator_speed_g3n-3210', 'generator', 0, 8000, 4000, NULL, NULL, NULL, 4, NULL, NULL, NULL, 'Increases ship speed by 4'),
(19, 'G3N-3310', 3, 'equipment_generator_speed_g3n-3310', 'generator', 0, 16000, 8000, NULL, NULL, NULL, 5, NULL, NULL, NULL, 'Increases ship speed by 5'),
(20, 'G3N-6900', 3, 'equipment_generator_speed_g3n-6900', 'generator', 1000, 0, 2500, NULL, NULL, NULL, 7, NULL, NULL, NULL, 'Increases ship speed by 7'),
(21, 'G3N-7900', 3, 'equipment_generator_speed_g3n-7900', 'generator', 2000, 0, 5000, NULL, NULL, NULL, 10, NULL, NULL, NULL, 'Increases ship speed by 10'),
(22, 'LF-2', 0, 'equipment_weapon_laser_lf-2', 'laser', 5000, 0, 12500, 100, NULL, NULL, NULL, NULL, NULL, NULL, 'Strong laser: causes up to 100 damage points per round'),
(23, 'MP-1', 0, 'equipment_weapon_laser_mp-1', 'laser', 0, 50000, 25000, 60, NULL, NULL, NULL, NULL, NULL, NULL, 'Average laser: causes up to 60 damage points per round'),
(24, 'LF-1', 0, 'equipment_weapon_laser_lf-1', 'laser', 0, 10000, 5000, 40, NULL, NULL, NULL, NULL, NULL, NULL, 'Small laser: causes up to 40 damage points per round'),
(25, 'HST-02', 1, 'equipment_weapon_rocketlauncher_hst-2', 'heavy', 15000, 0, 37500, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'The rapid reloader! This upgraded version of the Hellstorm launcher 1 makes it possible to win the battle before it\'s even begun. One little rocket makes a world of difference on the battlefield - firing up to 5 rocket'),
(26, 'HST-01', 1, 'equipment_weapon_rocketlauncher_hst-1', 'heavy', 0, 500000, 250000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'The rapid reloader! This rocket launcher makes it possible to win a battle before it\'s even begun. One little rocket makes a world of difference on the battlefield - firing up to 3 rockets, this rocket launcher unleashes a broadside of destruction'),
(27, 'RSB-75', 12, 'ammunition_laser_rsb-75', 'notlisted', 15, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(28, 'UCB-100', 12, 'ammunition_laser_ucb-100', 'notlisted', 15, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(29, 'SAB-50', 12, 'ammunition_laser_sab-50', 'ammo', 0.5, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Special ammunition that reinforces your Shield, strengthening it by tapping into enemy shields (Shield Leech).'),
(30, 'MCB-50', 12, 'ammunition_laser_mcb-50', 'ammo', 1, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'This is the best standard laser ammo on the market. x3 laser damage per round'),
(31, 'MCB-25', 12, 'ammunition_laser_mcb-25', 'ammo', 0, 20, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'More bang for your buck: x2 laser damage per round'),
(32, 'LCB-10', 12, 'ammunition_laser_lcb-10', 'ammo', 0, 10, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Low efficiency for a low price'),
(33, 'DMG-B01', 6, 'booster_dmg-b01', 'booster', 15000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '+10% damage for all damage inflicted for 10 h.'),
(34, 'EP-B01', 6, 'booster_ep-b01', 'booster', 15000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '+10% EP Boost for 10 h.'),
(35, 'HON-B01', 6, 'booster_hon-b01', 'booster', 15000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '+10% honor for 10 h.'),
(36, 'HP-B01', 6, 'booster_hp-b01', 'booster', 15000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '+10% ship HP for 10 h.'),
(37, 'REP-B01', 6, 'booster_rep-b01', 'booster', 10000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '+10% faster ship repairs for 10 h.'),
(38, 'RES-B01', 6, 'booster_res-b01', 'booster', 15000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'The resource booster increases the number of resources from collected NPC cargo boxes by 25% for 10 h.'),
(39, 'SHD-B01', 6, 'booster_shd-b01', 'booster', 15000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '+25% shield power for 10 h.'),
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
(53, 'LGF', 25, 'resource_logfile', 'extra', 500, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 1, 'Log-disks can be exchanged for Research Points.'),
(54, 'BK-100', 25, 'resource_booty-key', 'extra', 1500, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 1, 'Used to open pirate booty and collect the valuable treasure contained within.'),
(55, 'REP-1', 10, 'equipment_extra_repbot_rep-1', 'extra', 0, 10000, 5000, NULL, NULL, NULL, NULL, NULL, '0', 1, 'This repair bot recovers your ship\'s hull in 165 seconds'),
(56, 'REP-2', 10, 'equipment_extra_repbot_rep-2', 'extra', 0, 100000, 50000, NULL, NULL, NULL, NULL, NULL, '0', 1, 'This repair bot recovers your ship\'s hull in 120 seconds#'),
(57, 'REP-3', 10, 'equipment_extra_repbot_rep-3', 'extra', 5000, 0, 0, NULL, NULL, NULL, NULL, NULL, '0', 1, 'This repair bot recovers your ship\'s hull in 105 seconds.'),
(58, 'REP-4', 10, 'equipment_extra_repbot_rep-4', 'extra', 10000, 0, 0, NULL, NULL, NULL, NULL, NULL, '0', 1, 'This repair bot recovers your ship\'s hull in 90 seconds.'),
(59, 'ROK-T01', 30, 'equipment_extra_cpu_rok-t01', 'extra', 10000, 0, 0, NULL, NULL, NULL, NULL, NULL, '0', 1, 'Doubles rocket firing speed'),
(60, 'SLE-01', 9, 'equipment_extra_cpu_sle-01', 'extra', 0, 600000, 0, NULL, NULL, NULL, NULL, 2, '', 1, '+2 new slots for extras'),
(61, 'SLE-02', 9, 'equipment_extra_cpu_sle-02', 'extra', 75000, 0, 0, NULL, NULL, NULL, NULL, 4, '', 1, '+4 new slots for extras'),
(62, 'SLE-03', 9, 'equipment_extra_cpu_sle-03', 'extra', 150000, 0, 0, NULL, NULL, NULL, NULL, 6, '', 1, '+6 new slots for extras'),
(63, 'SLE-04', 9, 'equipment_extra_cpu_sle-04', 'extra', 250000, 0, 0, NULL, NULL, NULL, NULL, 10, '', 1, '+10 new slots for extras'),
(65, 'ISH-01', 31, 'equipment_extra_cpu_ish-01', 'extra', 50000, 0, 0, NULL, NULL, NULL, NULL, NULL, '0', 1, '3-second protection against enemies; 10 mines and 100 Xenomit used every time'),
(66, 'SMB-01', 32, 'equipment_extra_cpu_smb-01', 'extra', 50000, 0, 0, NULL, NULL, NULL, NULL, NULL, '0', 1, 'Instant bomb made from 10 mines and 100 Xenomit; doesn\'t cause any damage to your ship'),
(67, 'RL-LB1', 33, 'equipment_extra_cpu_rllb-x', 'extra', 25000, 0, 0, NULL, NULL, NULL, NULL, NULL, '0', 1, 'The rocket-launcher CPU automatically reloads your rocket launcher with a specified rocket type to rain fire on your enemies when you launch a laser attack.'),
(68, 'AIM-01', 34, 'equipment_extra_cpu_aim-01', 'extra', 0, 20000000, 0, NULL, NULL, NULL, NULL, NULL, NULL, 1, '25% less chance that lasers will miss their target; 10 Xenomit used per volley'),
(69, 'AIM-02', 34, 'equipment_extra_cpu_aim-02', 'extra', 200000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 1, '50% less chance that lasers will miss their target; 10 Xenomit used per volley'),
(70, 'JP-01', 35, 'equipment_extra_cpu_jp-01', 'extra', 0, 2000000, 0, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL),
(71, 'JP-02', 35, 'equipment_extra_cpu_jp-02', 'extra', 15000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL),
(72, 'GEM-XI', 36, 'equipment_extra_cpu_g3x-crgo-x', 'extra', 10000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 1, 'Doubles cargo space thanks to molecular compression'),
(73, 'CL04K-XL', 37, 'equipment_extra_cpu_cl04k-xl', 'extra', 22500, 0, 0, NULL, NULL, NULL, NULL, NULL, '', 50, 'Cloak your ship 50 times and stay invisible until you launch an attack yourself.'),
(74, 'CL04K', 37, 'equipment_extra_cpu_cl04k-m', 'extra', 5000, 0, 0, NULL, NULL, NULL, NULL, NULL, '', 20, '10 ship cloakings (active until your first attack)'),
(75, 'CL04K-MOD', 37, 'equipment_extra_cpu_cl04k-xs', 'extra', 500, 0, 0, NULL, NULL, NULL, NULL, NULL, '', 1, 'Ship stays cloaked until your first attack'),
(76, 'AROL-X', 38, 'equipment_extra_cpu_arol-x', 'extra', 25000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 1, 'Automatic rocket rapid fire during your laser attacks.'),
(77, 'MIN-T01', 39, 'equipment_extra_cpu_min-t01', 'extra', 0, 5000000, 0, NULL, NULL, NULL, NULL, NULL, NULL, 1, '25% shorter cooldown for mines and items made from mines.'),
(78, 'MIN-T02', 39, 'equipment_extra_cpu_min-t02', 'extra', 25000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 1, '50% shorter cooldown for mines and items made from mines.'),
(79, 'NC-RRB', 40, 'equipment_extra_cpu_nc-rrb-x', 'extra', 10000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 1, 'Auto-activates a repair robot available'),
(81, 'AJP-01', 41, 'equipment_extra_cpu_ajp-01', 'extra', 75000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 1, 'Allows you to jump to any of the valid target maps. May not be used during battle.'),
(84, 'DRO-01', 42, 'equipment_extra_cpu_dr-01', 'extra', 0, 150000, 0, NULL, NULL, NULL, NULL, NULL, NULL, 1, 'This CPU automatically repairs your drones when they sustain more than 70% damage upon ship destruction, as long as you have enough Uridium or Credits (depends on the drone type). Good for 8 repairs.'),
(85, 'DRO-02', 42, 'equipment_extra_cpu_dr-02', 'extra', 15000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 1, 'This CPU automatically repairs your drones when they have received the maximum damage upon ship destruction, as long as you have enough Uridium or Credits (depends on the drone type). Good for 32 repairs.'),
(86, 'HAVOC', 50, 'drone_design_havoc', 'drone_design', 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(87, 'BK-101', 25, '', 'extra', 10000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL),
(88, 'BK-102', 25, '', 'extra', 15000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL),
(89, 'R-310', 12, 'ammunition_rocket_r-310', 'ammo', 0, 100, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Short-range rocket: causes up to 1,000 damage points per rocket fired'),
(90, 'PLT-2026', 12, 'ammunition_rocket_PLT-2026', 'ammo', 0, 500, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Mid-range rocket: causes up to 2,000 damage points per rocket fired'),
(91, 'PLT-2021', 12, 'ammunition_rocket_PLT-2021', 'ammo', 5, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Long-range rocket: causes up to 4,000 points per rocket fired'),
(92, 'PLT-3030', 12, 'ammunition_rocket_PLT-3030', 'ammo', 7, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Each rocket inflicts a max. of 6,000 HP of damage, but has a lower accuracy rate due to its impressive firepower. An exceptional weapon when used in combination with the Tech Center\'s precision targeter.'),
(93, 'ECO-10 ', 12, 'ammunition_rocketlauncher_ECO-10', 'ammo', 0, 1500, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'The multi-angle damage rocket for smart spenders. Your toughest enemies won\'t stand a chance against the many broadsides of the ECO Hellstorm.'),
(94, 'Zeus', 24, 'drone_zeus', 'drone', 1000000, 0, 750000, NULL, NULL, NULL, NULL, 2, NULL, NULL, 'Epic drone with two slots'),
(95, 'HERCULES', 50, 'drone_design_hercules', 'drone_design', 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(96, 'PET', 26, 'pet_pet10', 'pet', 50000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(97, 'FUEL', 26, 'pet_fuel-100', 'pet_fuel', 15, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `server_levels_drone`
--

CREATE TABLE `server_levels_drone` (
  `ID` int(11) NOT NULL,
  `EXP` bigint(11) NOT NULL COMMENT '(xp needed)',
  `REWARDS` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `server_levels_drone`
--

INSERT INTO `server_levels_drone` (`ID`, `EXP`, `REWARDS`) VALUES
(1, 0, NULL),
(2, 100, NULL),
(3, 200, NULL),
(4, 400, NULL),
(5, 800, NULL),
(6, 1600, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `server_levels_pet`
--

CREATE TABLE `server_levels_pet` (
  `ID` int(11) NOT NULL,
  `EXP` bigint(11) NOT NULL COMMENT '(xp needed)',
  `REWARDS` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `server_levels_pet`
--

INSERT INTO `server_levels_pet` (`ID`, `EXP`, `REWARDS`) VALUES
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

-- --------------------------------------------------------

--
-- Table structure for table `server_levels_player`
--

CREATE TABLE `server_levels_player` (
  `ID` int(20) NOT NULL,
  `EXP` bigint(11) NOT NULL COMMENT '(xp needed)',
  `REWARDS` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `server_levels_player`
--

INSERT INTO `server_levels_player` (`ID`, `EXP`, `REWARDS`) VALUES
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

-- --------------------------------------------------------

--
-- Table structure for table `server_maps`
--

CREATE TABLE `server_maps` (
  `ID` int(4) NOT NULL,
  `NAME` varchar(20) NOT NULL DEFAULT '',
  `LIMITS` varchar(20) NOT NULL DEFAULT '128x128',
  `PORTALS` text NOT NULL,
  `NPCS` text NOT NULL,
  `IS_STARTER_MAP` enum('0','1') NOT NULL DEFAULT '0',
  `FACTION_ID` tinyint(1) NOT NULL DEFAULT '0',
  `LEVEL` int(11) NOT NULL,
  `MAP_ASSETS` text CHARACTER SET utf32 NOT NULL,
  `MAP_TYPE` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `server_maps`
--

INSERT INTO `server_maps` (`ID`, `NAME`, `LIMITS`, `PORTALS`, `NPCS`, `IS_STARTER_MAP`, `FACTION_ID`, `LEVEL`, `MAP_ASSETS`, `MAP_TYPE`) VALUES
(26, '3-6', '208x128', '[{\"Id\":1,\"x\":\"2000\",\"y\":\"2000\",\"newX\":\"2000\",\"newY\":\"11500\",\"Map\":25},{\"Id\":2,\"x\":\"18500\",\"y\":\"11500\",\"newX\":\"2000\",\"newY\":\"11500\",\"Map\":28}]', '[{\"NpcId\":79,\"Count\":3},{\"NpcId\":78,\"Count\":20},{\"NpcId\":80,\"Count\":0},{\"NpcId\":29,\"Count\":6},{\"NpcId\":35,\"Count\":1}]', '0', 3, 11, '', 0),
(27, '3-7', '208x128', '[{\"Id\":1,\"x\":\"2000\",\"y\":\"11300\",\"newX\":\"18500\",\"newY\":\"11500\",\"Map\":25},{\"Id\":2,\"x\":\"18500\",\"y\":\"11500\",\"newX\":\"2000\",\"newY\":\"2000\",\"Map\":28}]', '[{\"NpcId\":79,\"Count\":8},{\"NpcId\":78,\"Count\":12},{\"NpcId\":29,\"Count\":2},{\"NpcId\":35,\"Count\":2}]', '0', 3, 11, '', 0),
(2, '1-2', '208x130', '[{\"Id\":1,\"x\":\"2000\",\"y\":\"2000\",\"newX\":\"18500\",\"newY\":\"11500\",\"Map\":1},{\"Id\":2,\"x\":\"18500\",\"y\":\"2000\",\"newX\":\"2000\",\"newY\":\"11500\",\"Map\":3},{\"Id\":3,\"x\":\"18500\",\"y\":\"11500\",\"newX\":\"2000\",\"newY\":\"2000\",\"Map\":4}]', '[{\"NpcId\":84,\"Count\":10},{\"NpcId\":71,\"Count\":10},{\"NpcId\":23,\"Count\":3},{\"NpcId\":24,\"Count\":2}]', '1', 1, 0, '', 0),
(1, '1-1', '208x130', '[{\"Id\":1,\"x\":\"18500\",\"y\":\"11500\",\"newX\":\"2000\",\"newY\":\"2000\",\"Map\":2}]', '[{\"NpcId\":84,\"Count\":20}]', '1', 1, 0, '', 0),
(3, '1-3', '128x128', '[{\"Id\":1,\"x\":\"2000\",\"y\":\"11500\",\"newX\":\"18500\",\"newY\":\"2000\",\"Map\":2},{\"Id\":2,\"x\":\"18500\",\"y\":\"2000\",\"newX\":\"2000\",\"newY\":\"11500\",\"Map\":7},{\"Id\":3,\"x\":\"18500\",\"y\":\"11500\",\"newX\":\"18500\",\"newY\":\"2000\",\"Map\":4}]', '[{\"NpcId\":71,\"Count\":10},{\"NpcId\":72,\"Count\":8},{\"NpcId\":75,\"Count\":8},{\"NpcId\":73,\"Count\":5},{\"NpcId\":26,\"Count\":1},{\"NpcId\":25,\"Count\":3},{\"NpcId\":31,\"Count\":1}]', '0', 1, 2, '', 0),
(4, '1-4', '208x128', '[{\"Id\":1,\"x\":\"2000\",\"y\":\"2000\",\"newX\":\"18500\",\"newY\":\"11500\",\"Map\":2},{\"Id\":2,\"x\":\"18500\",\"y\":\"2000\",\"newX\":\"18500\",\"newY\":\"11500\",\"Map\":3},{\"Id\":3,\"x\":\"18500\",\"y\":\"11500\",\"newX\":\"2000\",\"newY\":\"2000\",\"Map\":12},{\"Id\":4,\"x\":\"18500\",\"y\":\"6750\",\"newX\":\"2000\",\"newY\":\"6750\",\"Map\":13}]', '[{\"NpcId\":71,\"Count\":10},{\"NpcId\":74,\"Count\":5},{\"NpcId\":75,\"Count\":8},{\"NpcId\":73,\"Count\":5},{\"NpcId\":46,\"Count\":1},{\"NpcId\":24,\"Count\":2}]', '0', 1, 2, '', 0),
(5, '2-1', '208x128', '[{\"Id\":1,\"x\":\"2000\",\"y\":\"11500\",\"newX\":\"18500\",\"newY\":\"2000\",\"Map\":6}]', '[{\"NpcId\":84,\"Count\":20}]', '1', 2, 0, '', 0),
(6, '2-2', '208x128', '[{\"Id\":1,\"x\":\"18500\",\"y\":\"2000\",\"newX\":\"2000\",\"newY\":\"11500\",\"Map\":5},{\"Id\":2,\"x\":\"2000\",\"y\":\"11500\",\"newX\":\"18500\",\"newY\":\"2000\",\"Map\":7},{\"Id\":3,\"x\":\"18500\",\"y\":\"11500\",\"newX\":\"2000\",\"newY\":\"2000\",\"Map\":8}]', '[{\"NpcId\":84,\"Count\":10},{\"NpcId\":71,\"Count\":10},{\"NpcId\":23,\"Count\":3},{\"NpcId\":24,\"Count\":2}]', '1', 2, 0, '', 0),
(7, '2-3', '208x128', '[{\"Id\":1,\"x\":\"18500\",\"y\":\"11500\",\"newX\":\"18500\",\"newY\":\"2000\",\"Map\":8},{\"Id\":2,\"x\":\"18500\",\"y\":\"2000\",\"newX\":\"2000\",\"newY\":\"11500\",\"Map\":6},{\"Id\":3,\"x\":\"2000\",\"y\":\"11500\",\"newX\":\"18500\",\"newY\":\"2000\",\"Map\":3}]', '[{\"NpcId\":71,\"Count\":10},{\"NpcId\":72,\"Count\":8},{\"NpcId\":75,\"Count\":8},{\"NpcId\":73,\"Count\":5},{\"NpcId\":26,\"Count\":1},{\"NpcId\":25,\"Count\":3},{\"NpcId\":31,\"Count\":1}]', '0', 2, 2, '', 0),
(8, '2-4', '208x128', '[{\"Id\":1,\"x\":\"2000\",\"y\":\"2000\",\"newX\":\"18500\",\"newY\":\"11500\",\"Map\":6},{\"Id\":2,\"x\":\"18500\",\"y\":\"2000\",\"newX\":\"18500\",\"newY\":\"11500\",\"Map\":7},{\"Id\":3,\"x\":\"2000\",\"y\":\"11500\",\"newX\":\"2000\",\"newY\":\"2000\",\"Map\":11},{\"Id\":4,\"x\":\"10250\",\"y\":\"11500\",\"newX\":\"10250\",\"newY\":\"2000\",\"Map\":14}]', '[{\"NpcId\":71,\"Count\":10},{\"NpcId\":74,\"Count\":5},{\"NpcId\":75,\"Count\":8},{\"NpcId\":73,\"Count\":5},{\"NpcId\":46,\"Count\":1},{\"NpcId\":25,\"Count\":3},{\"NpcId\":24,\"Count\":2}]', '0', 2, 2, '', 0),
(9, '3-1', '208x128', '[{\"Id\":1,\"x\":\"2000\",\"y\":\"2000\",\"newX\":\"18500\",\"newY\":\"11500\",\"Map\":10}]', '[{\"NpcId\":84,\"Count\":20}]', '1', 3, 0, '', 0),
(10, '3-2', '208x128', '[{\"Id\":1,\"x\":\"18500\",\"y\":\"11500\",\"newX\":\"2000\",\"newY\":\"2000\",\"Map\":9},{\"Id\":2,\"x\":\"18500\",\"y\":\"2000\",\"newX\":\"18500\",\"newY\":\"11500\",\"Map\":11},{\"Id\":3,\"x\":\"2000\",\"y\":\"2000\",\"newX\":\"18500\",\"newY\":\"11500\",\"Map\":12}]', '[{\"NpcId\":84,\"Count\":10},{\"NpcId\":71,\"Count\":10},{\"NpcId\":23,\"Count\":3},{\"NpcId\":24,\"Count\":2}]', '1', 3, 0, '', 0),
(11, '3-3', '208x128', '[{\"Id\":1,\"x\":\"18500\",\"y\":\"11500\",\"newX\":\"18500\",\"newY\":\"2000\",\"Map\":10},{\"Id\":2,\"x\":\"2000\",\"y\":\"11500\",\"newX\":\"18500\",\"newY\":\"2000\",\"Map\":12},{\"Id\":3,\"x\":\"2000\",\"y\":\"2000\",\"newX\":\"2000\",\"newY\":\"11500\",\"Map\":8}]', '[{\"NpcId\":71,\"Count\":10},{\"NpcId\":72,\"Count\":8},{\"NpcId\":75,\"Count\":8},{\"NpcId\":73,\"Count\":5},{\"NpcId\":26,\"Count\":1},{\"NpcId\":25,\"Count\":3},{\"NpcId\":31,\"Count\":1}]', '0', 3, 2, '', 0),
(12, '3-4', '208x128', '[{\"Id\":1,\"x\":\"18500\",\"y\":\"11500\",\"newX\":\"2000\",\"newY\":\"2000\",\"Map\":10},{\"Id\":2,\"x\":\"18500\",\"y\":\"2000\",\"newX\":\"2000\",\"newY\":\"11500\",\"Map\":11},{\"Id\":3,\"x\":\"2000\",\"y\":\"2000\",\"newX\":\"18500\",\"newY\":\"11500\",\"Map\":4},{\"Id\":4,\"x\":\"10250\",\"y\":\"2000\",\"newX\":\"18500\",\"newY\":\"6750\",\"Map\":15}]', '[{\"NpcId\":71,\"Count\":10},{\"NpcId\":74,\"Count\":5},{\"NpcId\":75,\"Count\":8},{\"NpcId\":73,\"Count\":5},{\"NpcId\":46,\"Count\":1},{\"NpcId\":25,\"Count\":3},{\"NpcId\":24,\"Count\":2}]', '0', 3, 2, '', 0),
(13, '4-1', '208x128', '[{\"Id\":1,\"x\":\"2000\",\"y\":\"6750\",\"newX\":\"18500\",\"newY\":\"6750\",\"Map\":4},{\"Id\":2,\"x\":\"18500\",\"y\":\"11500\",\"newX\":\"2000\",\"newY\":\"11500\",\"Map\":15},{\"Id\":3,\"x\":\"18500\",\"y\":\"2000\",\"newX\":\"2000\",\"newY\":\"11500\",\"Map\":14},{\"Id\":4,\"x\":\"10250\",\"y\":\"6750\",\"newX\":\"20000\",\"newY\":\"13000\",\"Map\":16}]', '[{\"NpcId\":80,\"Count\":0}]', '0', 1, 7, '', 0),
(14, '4-2', '208x128', '[{\"Id\":1,\"x\":\"10250\",\"y\":\"2000\",\"newX\":\"10250\",\"newY\":\"11500\",\"Map\":8},{\"Id\":2,\"x\":\"2000\",\"y\":\"11500\",\"newX\":\"18500\",\"newY\":\"20 \",\"Map\":13},{\"Id\":3,\"x\":\"18500\",\"y\":\"11500\",\"newX\":\"2000\",\"newY\":\"2000\",\"Map\":15},{\"Id\":4,\"x\":\"10250\",\"y\":\"6750\",\"newX\":\"21500\",\"newY\":\"12100\",\"Map\":16}]', '[{\"NpcId\":80,\"Count\":0}]', '0', 2, 7, '', 0),
(15, '4-3', '208x128', '[{\"Id\":1,\"x\":\"18500\",\"y\":\"6750\",\"newX\":\"10250\",\"newY\":\"2000\",\"Map\":12},{\"Id\":2,\"x\":\"2000\",\"y\":\"2000\",\"newX\":\"18500\",\"newY\":\"11500\",\"Map\":14},{\"Id\":3,\"x\":\"2000\",\"y\":\"11500\",\"newX\":\"18500\",\"newY\":\"11500\",\"Map\":13},{\"Id\":4,\"x\":\"10250\",\"y\":\"6750\",\"newX\":\"21500\",\"newY\":\"13900\",\"Map\":16}]', '[{\"NpcId\":80,\"Count\":0}]', '0', 3, 7, '', 0),
(16, '4-4', '208x128', '[{\"Id\":1,\"x\":\"21500\",\"y\":\"13900\",\"newX\":\"10250\",\"newY\":\"6750\",\"Map\":15},{\"Id\":2,\"x\":\"21500\",\"y\":\"12100\",\"newX\":\"10250\",\"newY\":\"6750\",\"Map\":14},{\"Id\":3,\"x\":\"20000\",\"y\":\"13000\",\"newX\":\"10250\",\"newY\":\"6750\",\"Map\":13},{\"Id\":4,\"x\":\"6000\",\"y\":\"13000\",\"newX\":\"18500\",\"newY\":\"6750\",\"Map\":17},{\"Id\":5,\"x\":\"28000\",\"y\":\"3000\",\"newX\":\"2000\",\"newY\":\"11500\",\"Map\":21},{\"Id\":6,\"x\":\"28000\",\"y\":\"24000\",\"newX\":\"2000\",\"newY\":\"2000\",\"Map\":25}]', '[{\"NpcId\":67,\"Count\":20}]', '0', 0, 8, '', 0),
(17, '1-5', '208x128', '[{\"Id\":1,\"x\":\"18500\",\"y\":\"6750\",\"newX\":\"6000\",\"newY\":\"13000\",\"Map\":16},{\"Id\":2,\"x\":\"2000\",\"y\":\"2000\",\"newX\":\"18500\",\"newY\":\"11500\",\"Map\":18},{\"Id\":3,\"x\":\"2000\",\"y\":\"11500\",\"newX\":\"18500\",\"newY\":\"2000\",\"Map\":19},{\"Id\":4,\"x\":\"10000\",\"y\":\"11300\",\"newX\":\"6000\",\"newY\":\"13000\",\"Map\":29}]', '[{\"NpcId\":77,\"Count\":10},{\"NpcId\":71,\"Count\":15},{\"NpcId\":76,\"Count\":8},{\"NpcId\":28,\"Count\":2},{\"NpcId\":27,\"Count\":3}]', '0', 1, 10, '', 0),
(18, '1-6', '208x128', '[{\"Id\":1,\"x\":\"18500\",\"y\":\"11500\",\"newX\":\"2000\",\"newY\":\"2000\",\"Map\":17},{\"Id\":2,\"x\":\"2000\",\"y\":\"11500\",\"newX\":\"18500\",\"newY\":\"2000\",\"Map\":20}]', '[{\"NpcId\":79,\"Count\":3},{\"NpcId\":78,\"Count\":20},{\"NpcId\":80,\"Count\":0},{\"NpcId\":29,\"Count\":6},{\"NpcId\":35,\"Count\":1}]', '0', 1, 11, '', 0),
(19, '1-7', '208x128', '[{\"Id\":1,\"x\":\"2000\",\"y\":\"2000\",\"newX\":\"18500\",\"newY\":\"11500\",\"Map\":20},{\"Id\":2,\"x\":\"18500\",\"y\":\"2000\",\"newX\":\"2000\",\"newY\":\"11500\",\"Map\":17}]', '[{\"NpcId\":79,\"Count\":8},{\"NpcId\":78,\"Count\":12},{\"NpcId\":29,\"Count\":2},{\"NpcId\":35,\"Count\":2}]', '0', 1, 11, '', 0),
(20, '1-8', '208x128', '[{\"Id\":1,\"x\":\"18500\",\"y\":\"2000\",\"newX\":\"2000\",\"newY\":\"11500\",\"Map\":18},{\"Id\":2,\"x\":\"18500\",\"y\":\"11500\",\"newX\":\"2000\",\"newY\":\"2000\",\"Map\":19}]', '[{\"NpcId\":85,\"Count\":25},{\"NpcId\":34,\"Count\":1}]', '0', 1, 12, '', 0),
(21, '2-5', '208x128', '[{\"Id\":1,\"x\":\"2000\",\"y\":\"11500\",\"newX\":\"28000\",\"newY\":\"3000\",\"Map\":16},{\"Id\":2,\"x\":\"2000\",\"y\":\"2000\",\"newX\":\"2000\",\"newY\":\"11500\",\"Map\":22},{\"Id\":3,\"x\":\"18500\",\"y\":\"2000\",\"newX\":\"2000\",\"newY\":\"11500\",\"Map\":23},{\"Id\":4,\"x\":\"10000\",\"y\":\"11300\",\"newX\":\"28000\",\"newY\":\"3000\",\"Map\":29}]', '[{\"NpcId\":77,\"Count\":10},{\"NpcId\":71,\"Count\":15},{\"NpcId\":76,\"Count\":8},{\"NpcId\":28,\"Count\":2},{\"NpcId\":27,\"Count\":3}]', '0', 2, 10, '', 0),
(22, '2-6', '208x128', '[{\"Id\":1,\"x\":\"2000\",\"y\":\"11500\",\"newX\":\"2000\",\"newY\":\"2000\",\"Map\":21},{\"Id\":2,\"x\":\"18500\",\"y\":\"2000\",\"newX\":\"2000\",\"newY\":\"11500\",\"Map\":24}]', '[{\"NpcId\":79,\"Count\":3},{\"NpcId\":78,\"Count\":20},{\"NpcId\":80,\"Count\":0},{\"NpcId\":29,\"Count\":6},{\"NpcId\":35,\"Count\":1}]', '0', 2, 11, '', 0),
(23, '2-7', '208x128', '[{\"Id\":1,\"x\":\"2000\",\"y\":\"11500\",\"newX\":\"18500\",\"newY\":\"2000\",\"Map\":21},{\"Id\":2,\"x\":\"18500\",\"y\":\"2000\",\"newX\":\"18500\",\"newY\":\"11500\",\"Map\":24}]', '[{\"NpcId\":79,\"Count\":8},{\"NpcId\":78,\"Count\":12},{\"NpcId\":29,\"Count\":2},{\"NpcId\":35,\"Count\":2}]', '0', 2, 11, '', 0),
(24, '2-8', '208x128', '[{\"Id\":1,\"x\":\"2000\",\"y\":\"11500\",\"newX\":\"18500\",\"newY\":\"2000\",\"Map\":22},{\"Id\":2,\"x\":\"18500\",\"y\":\"11500\",\"newX\":\"18500\",\"newY\":\"2000\",\"Map\":23}]', '[{\"NpcId\":85,\"Count\":25},{\"NpcId\":34,\"Count\":1}]', '0', 2, 12, '', 0),
(25, '3-5', '208x128', '[{\"Id\":1,\"x\":\"2000\",\"y\":\"2000\",\"newX\":\"28000\",\"newY\":\"24000\",\"Map\":16},{\"Id\":2,\"x\":\"2000\",\"y\":\"11500\",\"newX\":\"2000\",\"newY\":\"2000\",\"Map\":26},{\"Id\":3,\"x\":\"18500\",\"y\":\"11500\",\"newX\":\"2000\",\"newY\":\"11300\",\"Map\":27},{\"Id\":4,\"x\":\"17400\",\"y\":\"2000\",\"newX\":\"28000\",\"newY\":\"24000\",\"Map\":29}]', '[{\"NpcId\":77,\"Count\":10},{\"NpcId\":71,\"Count\":15},{\"NpcId\":76,\"Count\":8},{\"NpcId\":28,\"Count\":2},{\"NpcId\":27,\"Count\":3}]', '0', 3, 10, '', 0),
(28, '3-8', '208x128', '[{\"Id\":1,\"x\":\"2000\",\"y\":\"2000\",\"newX\":\"18500\",\"newY\":\"11500\",\"Map\":27},{\"Id\":2,\"x\":\"2000\",\"y\":\"11500\",\"newX\":\"18500\",\"newY\":\"11500\",\"Map\":26}]', '[{\"NpcId\":85,\"Count\":25},{\"NpcId\":34,\"Count\":1}]', '0', 3, 12, '', 0),
(29, '4-5', '208x128', '[{\"Id\":1,\"x\":\"6000\",\"y\":\"13000\",\"newX\":\"10000\",\"newY\":\"11300\",\"Map\":17},{\"Id\":2,\"x\":\"28000\",\"y\":\"3000\",\"newX\":\"10000\",\"newY\":\"11300\",\"Map\":21},{\"Id\":3,\"x\":\"28000\",\"y\":\"24000\",\"newX\":\"17400\",\"newY\":\"2000\",\"Map\":25}]', '[{\"NpcId\":23,\"Count\":6},{\"NpcId\":24,\"Count\":7},{\"NpcId\":25,\"Count\":4},{\"NpcId\":31,\"Count\":2},{\"NpcId\":26,\"Count\":1},{\"NpcId\":46,\"Count\":1},{\"NpcId\":27,\"Count\":3},{\"NpcId\":28,\"Count\":1},{\"NpcId\":29,\"Count\":4},{\"NpcId\":35,\"Count\":2},{\"NpcId\":34,\"Count\":3},{\"NpcId\":111,\"Count\":35},{\"NpcId\":112,\"Count\":7},{\"NpcId\":45,\"Count\":2}]', '0', 0, 10, '', 0),
(42, '???', '208x128', '', '', '0', 0, 0, '', 0),
(91, '5-1', '208x128', '', '[{\"NpcId\":85,\"Count\":85},{\"NpcId\":34,\"Count\":10},{\"NpcId\":80,\"Count\":10}]', '0', 0, 0, '', 0),
(92, '5-2', '208x128', '', '', '0', 0, 0, '', 0),
(93, '5-3', '208x128', '', '', '0', 0, 0, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `server_ore_prices`
--

CREATE TABLE `server_ore_prices` (
  `ID` int(11) NOT NULL,
  `LOOT_ID` text NOT NULL,
  `SELL_PRICE` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `server_ore_prices`
--

INSERT INTO `server_ore_prices` (`ID`, `LOOT_ID`, `SELL_PRICE`) VALUES
(0, 'resource_ore_prometium', 10),
(1, 'resource_ore_endurium', 15),
(2, 'resource_ore_terbium', 25),
(3, 'resource_ore_prometid', 200),
(4, 'resource_ore_duranium', 300),
(5, 'resource_ore_promerium', 1000),
(6, 'resource_ore_xenomit', -1),
(7, 'resource_ore_seprom', -1),
(8, 'resource_ore_palladium', -1);

-- --------------------------------------------------------

--
-- Table structure for table `server_payments`
--

CREATE TABLE `server_payments` (
  `ID` int(11) NOT NULL,
  `PLAYER_ID` int(11) NOT NULL,
  `USER_ID` int(11) NOT NULL,
  `PACK_ID` int(11) NOT NULL,
  `STATUS` text NOT NULL,
  `STARTED` text NOT NULL,
  `FINISHED` text,
  `AUTH_KEY` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `server_payments`
--

INSERT INTO `server_payments` (`ID`, `PLAYER_ID`, `USER_ID`, `PACK_ID`, `STATUS`, `STARTED`, `FINISHED`, `AUTH_KEY`) VALUES
(1, 39, 17, 1, 'OPEN', '2016-12-10 03:54:36', NULL, '94490b152af15e719da7caa4421bd6fd'),
(2, 39, 17, 1, 'OPEN', '2016-12-10 03:55:49', NULL, '0d7b5e061825652e6ed4ce290dc1049b'),
(3, 39, 17, 1, 'OPEN', '2016-12-10 03:57:52', NULL, 'fb6e5bd9af3fade58c930bcd323909d3'),
(4, 39, 17, 1, 'OPEN', '2016-12-10 12:42:24', NULL, 'c3920004146d90fac4cf61aff06bd811'),
(5, 39, 17, 1, 'OPEN', '2016-12-10 12:57:04', NULL, 'e60229f4eb6af6081cddeb489c32d34d'),
(6, 39, 17, 1, 'OPEN', '2016-12-10 13:01:15', NULL, 'fd1b2935c7c65b66921277f6848443cc'),
(7, 39, 17, 1, 'FAILED', '2016-12-10 15:17:45', '2016-12-10 15:18:21', '9a7d0e463efe8013d810fcf8bc418230'),
(9, 39, 17, 1, 'FAILED', '2016-12-10 15:25:00', '2016-12-10 15:25:17', '48e87fbf30696391d5c8e5ef80ce5ace'),
(10, 39, 17, 1, 'FAILED', '2016-12-10 15:26:11', '2016-12-10 15:26:27', '185082630e9e6932168a4479ff30303b'),
(11, 39, 17, 1, 'COMPLETED', '2016-12-10 15:34:02', '2016-12-10 15:34:28', '26be9f21363be5c04b684481d570f55e'),
(12, 44, 33, 1, 'COMPLETED', '2016-12-10 15:37:49', '2016-12-10 15:38:07', '39718138db539cfd7e8b2f9a408cd523'),
(13, 44, 33, 1, 'COMPLETED', '2016-12-10 15:55:26', '2016-12-10 15:57:20', '2326f9858a207e2a4549ef51dc9e5521'),
(14, 44, 33, 1, 'COMPLETED', '2016-12-10 16:00:19', '2016-12-10 16:01:58', 'fecc37e78ee0e28da650d386820e3589'),
(15, 44, 33, 1, 'COMPLETED', '2016-12-10 16:02:52', '2016-12-10 16:03:11', '685dbb8cc2ed1356d1f3d4575458aa4a'),
(16, 44, 33, 1, 'COMPLETED', '2016-12-10 16:05:19', '2016-12-10 16:05:38', 'f34b489b70578f030b712f8711678212'),
(17, 44, 33, 1, 'COMPLETED', '2016-12-10 16:06:29', '2016-12-10 16:06:59', 'dfa715f2f1c16b46177f66e1685d9bac'),
(18, 44, 33, 1, 'COMPLETED', '2016-12-10 16:07:33', '2016-12-10 16:07:54', 'fe3c17145d2e3263b58651a65af3ef40'),
(19, 40, 30, 1, 'OPEN', '2016-12-10 20:37:25', NULL, '649eaed74019b4689a14fd1e8b4fe3c8'),
(20, 40, 30, 1, 'OPEN', '2016-12-10 20:37:26', NULL, 'd3153e49773ed06a8c78c43adcd3f050'),
(21, 40, 30, 1, 'OPEN', '2016-12-10 20:37:28', NULL, 'f19d75d08ecf440948dd200cf9b2320c'),
(22, 42, 19, 1, 'OPEN', '2016-12-12 23:34:36', NULL, 'db423c03369b0e5c4103322d10d3a3e6'),
(23, 39, 17, 1, 'COMPLETED', '2016-12-12 23:35:01', '2016-12-12 23:35:51', '3aca5ad39150386b333c509621786ec2');

-- --------------------------------------------------------

--
-- Table structure for table `server_premium_packs`
--

CREATE TABLE `server_premium_packs` (
  `ID` int(11) NOT NULL,
  `NAME` text NOT NULL,
  `DESCRIPTION` text NOT NULL,
  `PRICE` float NOT NULL,
  `ITEMS` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `server_premium_packs`
--

INSERT INTO `server_premium_packs` (`ID`, `NAME`, `DESCRIPTION`, `PRICE`, `ITEMS`) VALUES
(1, 'PREMIUM 1', '1 Week Premium Access', 3.99, '{\"Items\":[{\"Type\":\"Premium\",\"Value\":1}]}');

-- --------------------------------------------------------

--
-- Table structure for table `server_quests`
--

CREATE TABLE `server_quests` (
  `ID` int(11) NOT NULL,
  `NAME` varchar(255) NOT NULL,
  `DESC` text NOT NULL,
  `QUEST` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `server_ranks`
--

CREATE TABLE `server_ranks` (
  `ID` int(11) NOT NULL,
  `RANK_NAME` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `server_ranks`
--

INSERT INTO `server_ranks` (`ID`, `RANK_NAME`) VALUES
(1, 'Basic Space Pilot'),
(2, 'Space Pilot'),
(3, 'Chief Space Pilot'),
(4, ' Basic Sergeant'),
(5, 'Sergeant '),
(6, 'Chief Sergeant'),
(7, 'Basic Lieutenant '),
(8, 'Lieutenant '),
(9, 'Chief Lieutenant '),
(10, 'Basic Captain'),
(11, 'Captain '),
(12, 'Chief Captain'),
(13, 'Basic Major'),
(14, 'Major '),
(15, 'Chief Major '),
(16, 'Basic Colonel '),
(17, 'Colonel '),
(18, 'Chief Colonel '),
(19, 'Basic General '),
(20, 'General '),
(21, 'Administrator');

-- --------------------------------------------------------

--
-- Table structure for table `server_ships`
--

CREATE TABLE `server_ships` (
  `ship_id` smallint(11) NOT NULL,
  `name` varchar(255) NOT NULL DEFAULT '-=[ ]=-',
  `inShop` tinyint(1) NOT NULL,
  `ship_lootid` varchar(100) NOT NULL DEFAULT '',
  `ship_hp` int(255) NOT NULL DEFAULT '1000',
  `nanohull` bigint(255) NOT NULL,
  `shield` int(255) NOT NULL DEFAULT '0',
  `shieldAbsorb` smallint(11) NOT NULL DEFAULT '20',
  `minDamage` int(255) NOT NULL DEFAULT '0',
  `maxDamage` int(11) NOT NULL DEFAULT '0',
  `base_speed` smallint(11) NOT NULL DEFAULT '150',
  `isNeutral` enum('0','1') NOT NULL DEFAULT '1',
  `laserID` tinyint(1) NOT NULL DEFAULT '0',
  `laser` bigint(255) NOT NULL,
  `heavy` bigint(255) NOT NULL DEFAULT '1',
  `generator` bigint(255) NOT NULL,
  `batteries` bigint(255) NOT NULL,
  `rockets` bigint(255) NOT NULL,
  `extra` int(11) NOT NULL,
  `cargo` bigint(255) NOT NULL,
  `experience` int(11) NOT NULL DEFAULT '0',
  `honor` int(11) NOT NULL DEFAULT '0',
  `credits` int(11) NOT NULL DEFAULT '0',
  `uridium` int(11) NOT NULL DEFAULT '0',
  `rankPoints` bigint(20) NOT NULL DEFAULT '0',
  `AI` int(11) NOT NULL DEFAULT '0',
  `price_cre` int(11) NOT NULL,
  `price_uri` int(11) NOT NULL,
  `dropJSON` varchar(255) DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `server_ships`
--

INSERT INTO `server_ships` (`ship_id`, `name`, `inShop`, `ship_lootid`, `ship_hp`, `nanohull`, `shield`, `shieldAbsorb`, `minDamage`, `maxDamage`, `base_speed`, `isNeutral`, `laserID`, `laser`, `heavy`, `generator`, `batteries`, `rockets`, `extra`, `cargo`, `experience`, `honor`, `credits`, `uridium`, `rankPoints`, `AI`, `price_cre`, `price_uri`, `dropJSON`) VALUES
(1, 'Phoenix', 1, 'ship_phoenix', 4000, 4000, 2000, 20, 100, 150, 320, '1', 1, 1, 1, 1, 2000, 100, 1, 100, 100, 0, 0, 0, 0, 0, 0, 0, ''),
(2, 'Yamato', 1, 'ship_yamato', 8000, 8000, 2500, 25, 200, 300, 340, '1', 1, 2, 1, 2, 4000, 200, 1, 200, 200, 2, 0, 0, 0, 0, 16000, 0, ''),
(3, 'Leonov', 1, 'ship_leonov', 64000, 64000, 70000, 80, 900, 1800, 360, '1', 1, 6, 1, 6, 6000, 300, 1, 500, 400, 4, 0, 0, 0, 0, 0, 15000, ''),
(4, 'Defcom', 1, 'ship_defcom', 12000, 12000, 5000, 40, 350, 450, 280, '1', 1, 3, 1, 5, 8000, 400, 2, 300, 800, 8, 0, 0, 0, 0, 25000, 0, ''),
(5, 'Liberator', 1, 'ship_liberator', 16000, 16000, 7500, 40, 400, 600, 300, '1', 1, 4, 1, 6, 10000, 500, 2, 400, 1600, 16, 0, 0, 0, 0, 40000, 0, ''),
(6, 'Piranha', 1, 'ship_piranha', 64000, 64000, 10000, 50, 550, 750, 360, '1', 1, 5, 1, 7, 14000, 600, 2, 500, 3200, 32, 0, 0, 0, 0, 80000, 0, ''),
(7, 'Nostromo', 1, 'ship_nostromo', 120000, 120000, 20000, 60, 1000, 1200, 340, '1', 1, 6, 1, 8, 16000, 700, 2, 600, 6400, 64, 0, 0, 0, 0, 100000, 0, ''),
(8, 'Vengeance', 1, 'ship_vengeance', 180000, 180000, 145000, 80, 24000, 25000, 380, '1', 4, 10, 1, 10, 16000, 800, 2, 1000, 12800, 128, 0, 0, 0, 0, 0, 30000, ''),
(9, 'Bigboy', 1, 'ship_bigboy', 160000, 160000, 55000, 80, 1300, 1400, 260, '1', 1, 8, 1, 15, 18000, 900, 3, 700, 25600, 256, 0, 0, 0, 0, 200000, 0, ''),
(10, 'Goliath', 1, 'ship_goliath', 256000, 256000, 265000, 92, 42500, 45000, 300, '1', 4, 15, 1, 15, 32000, 1600, 3, 1500, 51200, 512, 0, 0, 0, 0, 0, 80000, ''),
(11, '-=[demaNer]=-', 0, '', 400000, 0, 300000, 60, 3500, 4000, 300, '0', 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, ''),
(12, 'pet', 0, '', 80000, 0, 20, 60, 20, 20, 200, '0', 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, ''),
(13, 'pet', 0, '', 120000, 0, 20, 60, 20, 20, 200, '0', 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, ''),
(14, 'pet', 0, '', 140000, 0, 20, 60, 20, 20, 200, '0', 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, ''),
(15, 'pet', 0, '', 170000, 0, 20, 60, 20, 20, 200, '1', 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, ''),
(16, 'Adept', 0, 'ship_vengeance_design_adept', 180000, 180000, 145000, 80, 24000, 25000, 380, '1', 4, 10, 1, 10, 16000, 800, 2, 1000, 12800, 128, 0, 0, 0, 0, 0, 30000, ''),
(17, 'Corsair', 0, 'ship_vengeance_design_corsair', 180000, 180000, 145000, 80, 24000, 25000, 380, '1', 4, 10, 1, 10, 16000, 800, 2, 1000, 12800, 128, 0, 0, 0, 0, 0, 30000, ''),
(18, 'Lightning', 0, 'ship_vengeance_design_lightning', 180000, 180000, 145000, 80, 24000, 25000, 380, '1', 4, 10, 1, 10, 16000, 800, 2, 1000, 12800, 128, 0, 0, 0, 0, 0, 250000, ''),
(20, 'UFO', 0, '', 3200000, 0, 2400000, 60, 120000, 125000, 250, '0', 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, ''),
(21, 'mini UFO', 0, '', 400000, 0, 300000, 60, 4000, 5000, 300, '0', 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, ''),
(22, 'pet', 0, '', 20000, 0, 20, 60, 20, 20, 200, '0', 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, ''),
(23, '..::{Boss Streuner}::..', 0, '', 3200, 0, 1600, 60, 100, 120, 270, '1', 0, 0, 1, 0, 0, 0, 0, 0, 1600, 8, 1600, 4, 2, 0, 0, 0, '{\"Prometium\":40,\"Endurium\":40,\"Terbium\":10,\"Prometid\":0,\"Duranium\":0,\"Promerium\":0,\"Xenomit\":0,\"Seprom\":0}'),
(24, '..::{Boss Lordakia}::..', 0, '', 8000, 0, 8000, 60, 295, 350, 320, '0', 0, 0, 1, 0, 0, 0, 0, 0, 3200, 16, 3200, 8, 2, 0, 0, 0, '{\"Prometium\":80,\"Endurium\":80,\"Terbium\":80,\"Prometid\":10,\"Duranium\":0,\"Promerium\":0,\"Xenomit\":1,\"Seprom\":0}'),
(25, '..::{Boss Saimon}::..', 0, '', 24000, 0, 12000, 60, 600, 720, 320, '0', 0, 0, 1, 0, 0, 0, 0, 0, 6400, 32, 6400, 16, 4, 0, 0, 0, '{\"Prometium\":160,\"Endurium\":160,\"Terbium\":160,\"Prometid\":8,\"Duranium\":8,\"Promerium\":1,\"Xenomit\":2,\"Seprom\":0}'),
(26, '..::{Boss Devolarium}::..', 0, '', 400000, 0, 400000, 60, 4100, 4650, 200, '0', 0, 0, 1, 0, 0, 0, 0, 0, 25600, 128, 204800, 64, 8, 0, 0, 0, '{\"Prometium\":400,\"Endurium\":400,\"Terbium\":400,\"Prometid\":64,\"Duranium\":64,\"Promerium\":8,\"Xenomit\":8,\"Seprom\":0}'),
(27, '..::{Boss Sibelonit}::..', 0, '', 160000, 0, 160000, 60, 3175, 4350, 320, '0', 0, 0, 1, 0, 0, 0, 0, 0, 12800, 128, 51200, 64, 6, 0, 0, 0, '{\"Prometium\":400,\"Endurium\":400,\"Terbium\":400,\"Prometid\":32,\"Duranium\":32,\"Promerium\":4,\"Xenomit\":8,\"Seprom\":0}'),
(28, '..::{Boss Lordakium}::..', 0, '', 1200000, 0, 800000, 60, 10000, 16000, 230, '1', 0, 0, 1, 0, 0, 0, 0, 0, 102400, 512, 819200, 256, 12, 0, 0, 0, '{\"Prometium\":1200,\"Endurium\":1200,\"Terbium\":1200,\"Prometid\":256,\"Duranium\":256,\"Promerium\":32,\"Xenomit\":32,\"Seprom\":0}'),
(29, '..::{Boss Kristallin}::..', 0, '', 200000, 0, 160000, 60, 3600, 4700, 320, '0', 0, 0, 1, 0, 0, 0, 0, 0, 25600, 128, 51200, 64, 6, 0, 0, 0, '{\"Prometium\":400,\"Endurium\":400,\"Terbium\":400,\"Prometid\":64,\"Duranium\":64,\"Promerium\":4,\"Xenomit\":8,\"Seprom\":0}'),
(30, 'leonov', 0, '', 160000, 160000, 0, 0, 0, 0, 380, '1', 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, ''),
(31, '..::{Boss Mordon}::..', 0, '', 80000, 0, 40000, 60, 1300, 1500, 125, '0', 0, 0, 1, 0, 0, 0, 0, 0, 12800, 64, 51200, 32, 4, 0, 0, 0, '{\"Prometium\":320,\"Endurium\":320,\"Terbium\":320,\"Prometid\":32,\"Duranium\":32,\"Promerium\":8,\"Xenomit\":4,\"Seprom\":0}'),
(32, '-=[Santabot]=-', 0, '', 1000, 0, 0, 20, 20, 0, 150, '1', 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, ''),
(33, '-=[Super Ice Metroid]=-', 0, '', 3200000, 0, 2400000, 60, 0, 0, 200, '1', 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, ''),
(34, '..::{Boss StreuneR}::..', 0, '', 80000, 0, 40000, 60, 1500, 2000, 280, '1', 0, 0, 1, 0, 0, 0, 0, 0, 12800, 64, 51200, 32, 4, 0, 0, 0, '{\"Prometium\":320,\"Endurium\":320,\"Terbium\":320,\"Prometid\":32,\"Duranium\":32,\"Promerium\":0,\"Xenomit\":4,\"Seprom\":0}'),
(35, '..::{Boss Kristallon}::..', 0, '', 1600000, 0, 1200000, 60, 15000, 20000, 250, '1', 0, 0, 1, 0, 0, 0, 0, 0, 204800, 1024, 1634400, 512, 16, 0, 0, 0, '{\"Prometium\":1200,\"Endurium\":1200,\"Terbium\":1200,\"Prometid\":512,\"Duranium\":512,\"Promerium\":64,\"Xenomit\":64,\"Seprom\":0}'),
(42, '<-o(Uber Kristallin)o->', 0, '', 400000, 0, 320000, 60, 7200, 9400, 250, '0', 0, 0, 1, 0, 0, 0, 0, 0, 51200, 256, 102400, 128, 12, 0, 0, 0, '{\"Prometium\":800,\"Endurium\":800,\"Terbium\":800,\"Prometid\":128,\"Duranium\":128,\"Promerium\":8,\"Xenomit\":16,\"Seprom\":0}'),
(45, '<-o(Uber Kristallon)o->', 0, '', 3200000, 0, 2400000, 60, 30000, 45000, 200, '1', 0, 0, 1, 0, 0, 0, 0, 0, 409600, 2048, 3268800, 1024, 32, 0, 0, 0, '{\"Prometium\":2400,\"Endurium\":2400,\"Terbium\":2400,\"Prometid\":512,\"Duranium\":512,\"Promerium\":128,\"Xenomit\":128,\"Seprom\":0}'),
(46, '..::{Boss Sibelon}::..', 0, '', 800000, 0, 800000, 60, 9100, 12350, 100, '0', 0, 0, 1, 0, 0, 0, 0, 0, 51200, 256, 408600, 128, 10, 0, 0, 0, '{\"Prometium\":800,\"Endurium\":800,\"Terbium\":800,\"Prometid\":128,\"Duranium\":128,\"Promerium\":16,\"Xenomit\":32,\"Seprom\":0}'),
(48, '-=[Carnivalbot]=-', 0, '', 1000, 0, 0, 60, 20, 20, 150, '1', 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, ''),
(49, 'Aegis', 1, 'ship_aegis', 275000, 275000, 0, 0, 30000, 40000, 300, '1', 0, 10, 1, 15, 15000, 3000, 3, 2000, 0, 0, 0, 0, 0, 0, 0, 250000, ''),
(50, 'Red bigboy', 0, '', 160000, 160000, 0, 0, 0, 0, 260, '1', 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, ''),
(52, 'Amber', 0, 'ship_goliath_design_amber', 256000, 256000, 265000, 92, 42500, 45000, 300, '1', 4, 15, 1, 15, 32000, 1600, 3, 1500, 51200, 512, 0, 0, 0, 0, 0, 125000, ''),
(53, 'Crismon', 0, 'ship_goliath_design_crimson', 256000, 256000, 265000, 92, 42500, 45000, 300, '1', 4, 15, 1, 15, 32000, 1600, 3, 1500, 51200, 512, 0, 0, 0, 0, 0, 50000, ''),
(54, 'Sapphire', 0, 'ship_goliath_design_sapphire', 256000, 256000, 265000, 92, 42500, 45000, 300, '1', 4, 15, 1, 15, 32000, 1600, 3, 1500, 51200, 512, 0, 0, 0, 0, 0, 125000, ''),
(55, 'Jade', 0, 'ship_goliath_design_jade', 256000, 256000, 265000, 92, 42500, 45000, 300, '1', 4, 15, 1, 15, 32000, 1600, 3, 1500, 51200, 512, 0, 0, 0, 0, 0, 125000, ''),
(56, 'Enforcer', 0, 'ship_goliath_design_enforcer', 256000, 256000, 265000, 92, 42500, 45000, 300, '1', 4, 15, 1, 15, 32000, 1600, 3, 1500, 51200, 512, 0, 0, 0, 0, 0, 50000, ''),
(57, 'USA', 0, 'ship_goliath_design_independence', 256000, 256000, 265000, 92, 42500, 45000, 300, '1', 4, 15, 1, 15, 32000, 1600, 3, 1500, 51200, 512, 0, 0, 0, 0, 0, 50000, ''),
(58, 'Revenger', 0, 'ship_vengeance_design_revenge', 180000, 180000, 145000, 80, 24000, 25000, 380, '1', 4, 10, 1, 10, 16000, 800, 2, 1000, 12800, 128, 0, 0, 0, 0, 0, 50000, ''),
(59, 'Bastion', 0, 'ship_goliath_design_bastion', 256000, 256000, 265000, 92, 42500, 45000, 300, '1', 4, 15, 1, 15, 32000, 1600, 3, 1500, 51200, 512, 0, 0, 0, 0, 0, 50000, ''),
(60, 'Avenger', 0, 'ship_vengeance_design_avenger', 180000, 180000, 145000, 80, 24000, 25000, 380, '1', 4, 10, 1, 10, 16000, 800, 2, 1000, 12800, 128, 0, 0, 0, 0, 0, 50000, ''),
(61, 'Veteran', 0, 'ship_goliath_design_veteran', 256000, 256000, 265000, 92, 42500, 45000, 300, '1', 4, 15, 1, 15, 32000, 1600, 3, 1500, 51200, 512, 0, 0, 0, 0, 0, 50000, ''),
(62, 'Exalted', 0, 'ship_goliath_design_exalted', 256000, 256000, 265000, 92, 42500, 45000, 300, '1', 4, 15, 1, 15, 32000, 1600, 3, 1500, 51200, 512, 0, 0, 0, 0, 0, 50000, ''),
(63, 'Solace', 0, 'ship_goliath_design_solace', 256000, 256000, 265000, 92, 42500, 45000, 300, '1', 4, 15, 1, 15, 32000, 1600, 3, 1500, 51200, 512, 0, 0, 0, 0, 0, 250000, ''),
(64, 'Diminisher', 0, 'ship_goliath_design_diminisher', 256000, 256000, 265000, 92, 42500, 45000, 300, '1', 4, 15, 1, 15, 32000, 1600, 3, 1500, 51200, 512, 0, 0, 0, 0, 0, 250000, ''),
(65, 'Spectrum', 0, 'ship_goliath_design_spectrum', 256000, 256000, 265000, 92, 42500, 45000, 300, '1', 4, 15, 1, 15, 32000, 1600, 3, 1500, 51200, 512, 0, 0, 0, 0, 0, 250000, ''),
(66, 'Sentinel', 0, 'ship_goliath_design_sentinel', 256000, 256000, 265000, 92, 42500, 45000, 300, '1', 4, 15, 1, 15, 32000, 1600, 3, 1500, 51200, 512, 0, 0, 0, 0, 0, 250000, ''),
(67, 'Venom', 0, 'ship_goliath_design_venom', 256000, 256000, 265000, 92, 42500, 45000, 300, '1', 4, 15, 1, 15, 32000, 1600, 3, 1500, 51200, 512, 0, 0, 0, 0, 0, 250000, ''),
(68, 'Ignite', 0, 'ship_goliath_design_ignite', 256000, 256000, 265000, 92, 42500, 45000, 300, '1', 4, 15, 1, 15, 32000, 1600, 3, 1500, 51200, 512, 0, 0, 0, 0, 0, 50000, ''),
(69, 'Citadel', 1, 'ship_citadel', 550000, 550000, 0, 0, 25000, 30000, 240, '1', 0, 7, 2, 20, 20000, 2000, 5, 4000, 0, 0, 0, 0, 0, 0, 0, 500000, ''),
(70, 'Spearhead', 1, 'ship_spearhead', 100000, 100000, 0, 0, 3000, 4500, 370, '1', 0, 5, 1, 12, 5000, 500, 2, 500, 0, 0, 0, 0, 0, 0, 0, 45000, ''),
(71, '-=[Lordakia]=-', 0, '', 2000, 0, 2000, 60, 80, 100, 320, '0', 0, 0, 1, 0, 0, 0, 0, 0, 800, 4, 800, 2, 0, 0, 0, 0, ''),
(72, '-=[Devolarium]=-', 0, '', 100000, 0, 100000, 60, 900, 1200, 200, '0', 0, 0, 1, 0, 0, 0, 0, 0, 6400, 32, 51200, 16, 4, 0, 0, 0, '{\"Prometium\":100,\"Endurium\":100,\"Terbium\":100,\"Prometid\":16,\"Duranium\":16,\"Promerium\":2,\"Xenomit\":0,\"Seprom\":0}'),
(73, '-=[Mordon]=-', 0, '', 20000, 0, 10000, 60, 300, 400, 125, '0', 0, 0, 1, 0, 0, 0, 0, 0, 3200, 16, 6400, 8, 2, 0, 0, 0, '{\"Prometium\":80,\"Endurium\":80,\"Terbium\":80,\"Prometid\":8,\"Duranium\":8,\"Promerium\":1,\"Xenomit\":0,\"Seprom\":0}'),
(74, '-=[Sibelon]=-', 0, '', 200000, 0, 200000, 60, 2250, 3000, 100, '0', 0, 0, 1, 0, 0, 0, 0, 0, 12800, 64, 102400, 32, 5, 0, 0, 0, '{\"Prometium\":200,\"Endurium\":200,\"Terbium\":200,\"Prometid\":32,\"Duranium\":32,\"Promerium\":4,\"Xenomit\":0,\"Seprom\":0}'),
(75, '-=[Saimon]=-', 0, '', 6000, 0, 3000, 60, 150, 200, 320, '0', 0, 0, 1, 0, 0, 0, 0, 0, 1600, 8, 1600, 4, 2, 0, 0, 0, '{\"Prometium\":40,\"Endurium\":40,\"Terbium\":40,\"Prometid\":2,\"Duranium\":2,\"Xenomit\":0,\"Promerium\":0,\"Seprom\":0}'),
(76, '-=[Sibelonit]=-', 0, '', 40000, 0, 40000, 60, 750, 1000, 320, '0', 0, 0, 1, 0, 0, 0, 0, 0, 3200, 16, 12800, 12, 3, 0, 0, 0, '{\"Prometium\":100,\"Endurium\":100,\"Terbium\":100,\"Prometid\":8,\"Duranium\":8,\"Promerium\":4,\"Xenomit\":0,\"Seprom\":0}'),
(77, '-=[Lordakium]=-', 0, '', 300000, 0, 200000, 60, 3150, 3600, 230, '0', 0, 0, 1, 0, 0, 0, 0, 0, 25600, 128, 204800, 64, 6, 0, 0, 0, '{\"Prometium\":300,\"Endurium\":300,\"Terbium\":300,\"Prometid\":64,\"Duranium\":64,\"Promerium\":8,\"Xenomit\":0,\"Seprom\":0}'),
(78, '-=[Kristallin]=-', 0, '', 50000, 0, 40000, 60, 900, 1200, 320, '0', 0, 0, 1, 0, 0, 0, 0, 0, 6400, 32, 12800, 16, 3, 0, 0, 0, '{\"Prometium\":100,\"Endurium\":100,\"Terbium\":100,\"Prometid\":16,\"Duranium\":16,\"Promerium\":1,\"Xenomit\":0,\"Seprom\":0}'),
(79, '-=[Kristallon]=-', 0, '', 400000, 0, 300000, 60, 3750, 5000, 250, '1', 0, 0, 1, 0, 0, 0, 0, 0, 51200, 256, 409600, 128, 8, 0, 0, 0, '{\"Prometium\":300,\"Endurium\":300,\"Terbium\":300,\"Prometid\":128,\"Duranium\":128,\"Promerium\":16,\"Xenomit\":0,\"Seprom\":0}'),
(80, '-=[Cubikon]=-', 0, '', 1600000, 0, 1200000, 60, 0, 0, 30, '1', 0, 0, 1, 0, 0, 0, 0, 0, 512000, 4096, 1638400, 1024, 10, 0, 0, 0, '{\"Prometium\":1200,\"Endurium\":1200,\"Terbium\":1200,\"Prometid\":512,\"Duranium\":512,\"Promerium\":64,\"Xenomit\":128,\"Seprom\":0}'),
(81, '-=[Protegit]=-', 0, '', 50000, 0, 40000, 60, 1125, 1500, 380, '0', 0, 0, 1, 0, 0, 0, 0, 0, 6400, 32, 12800, 16, 3, 0, 0, 0, '{\"Prometium\":100,\"Endurium\":100,\"Terbium\":100,\"Prometid\":16,\"Duranium\":16,\"Promerium\":2,\"Xenomit\":0,\"Seprom\":0}'),
(82, '<==<Kucurbium>==>', 0, '', 5000000, 0, 5000000, 60, 20000, 25000, 200, '0', 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, ''),
(83, '<==<Boss Kucurbium>==>', 0, '', 20000000, 0, 20000000, 60, 50000, 60000, 200, '0', 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, ''),
(84, '-=[Streuner]=-', 0, '', 800, 0, 400, 60, 10, 20, 270, '1', 0, 0, 1, 0, 0, 0, 0, 0, 400, 2, 400, 1, 0, 0, 0, 0, '{\"Prometium\":10,\"Endurium\":10,\"Terbium\":0,\"Prometid\":0,\"Duranium\":0,\"Xenomit\":0,\"Promerium\":0,\"Seprom\":0}'),
(85, '-=[StreuneR]=-', 0, '', 20000, 0, 10000, 60, 350, 500, 280, '1', 0, 0, 1, 0, 0, 0, 0, 0, 3200, 16, 6400, 8, 0, 0, 0, 0, '{\"Prometium\":80,\"Endurium\":80,\"Terbium\":80,\"Prometid\":8,\"Duranium\":8,\"Promerium\":0,\"Xenomit\":0,\"Seprom\":0}'),
(86, 'Kick', 0, 'ship_goliath_design_kick', 256000, 256000, 265000, 92, 42500, 45000, 300, '1', 4, 15, 1, 15, 32000, 1600, 3, 1500, 51200, 512, 0, 0, 0, 0, 0, 0, ''),
(87, 'Referee', 0, 'ship_goliath_design_referee', 256000, 256000, 265000, 92, 42500, 45000, 300, '1', 4, 15, 1, 15, 32000, 1600, 3, 1500, 51200, 512, 0, 0, 0, 0, 0, 0, ''),
(88, 'Goal', 0, 'ship_goliath_design_goal', 256000, 256000, 265000, 92, 42500, 45000, 300, '1', 4, 15, 1, 15, 32000, 1600, 3, 1500, 51200, 512, 0, 0, 0, 0, 0, 0, ''),
(89, '-=[Refreebot]=-', 0, '', 1000, 0, 0, 20, 20, 20, 150, '1', 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, ''),
(90, '-=[Century Falcon]=-', 0, '', 4000000, 0, 3000000, 60, 19000, 25000, 200, '0', 0, 0, 1, 0, 0, 0, 0, 0, 1000000, 5000, 1000000, 5000, 0, 0, 0, 0, ''),
(91, '-=[Corsair]=-', 0, '', 200000, 0, 120000, 60, 6000, 8000, 320, '0', 0, 0, 1, 0, 0, 0, 0, 0, 10000, 32, 12000, 64, 0, 0, 0, 0, ''),
(92, '-=[Outcast]=-', 0, '', 150000, 0, 80000, 60, 3800, 5000, 320, '0', 0, 0, 1, 0, 0, 0, 0, 0, 7500, 12, 7500, 24, 0, 0, 0, 0, ''),
(93, '-=[Marauder]=-', 0, '', 100000, 0, 60000, 60, 3500, 4500, 380, '0', 0, 0, 1, 0, 0, 0, 0, 0, 4500, 8, 4500, 16, 0, 0, 0, 0, ''),
(94, '-=[Vagrant]=-', 0, '', 40000, 0, 40000, 60, 1900, 2500, 380, '0', 0, 0, 1, 0, 0, 0, 0, 0, 2000, 4, 2000, 8, 0, 0, 0, 0, ''),
(95, '-=[Convict]=-', 0, '', 400000, 0, 200000, 60, 9500, 12000, 340, '0', 0, 0, 1, 0, 0, 0, 0, 0, 18000, 64, 25000, 128, 0, 0, 0, 0, ''),
(96, '-=[Hooligan]=-', 0, '', 250000, 0, 200000, 60, 7000, 9000, 340, '0', 0, 0, 1, 0, 0, 0, 0, 0, 12000, 16, 15000, 32, 0, 0, 0, 0, ''),
(97, '-=[Ravager]=-', 0, '', 300000, 0, 200000, 60, 8000, 11000, 340, '0', 0, 0, 1, 0, 0, 0, 0, 0, 15000, 64, 20000, 128, 0, 0, 0, 0, ''),
(98, 'Police', 0, 'ship_police', 100000000, 100000000, 1250000, 90, 500000, 525000, 700, '1', 1, 50, 15, 50, 1000000, 1000000, 10, 2500000, 1000000, 100000, 0, 0, 0, 0, 0, 0, ''),
(99, '-=[Scorcher]=-', 0, '', 200000, 0, 200000, 60, 2500, 0, 280, '0', 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, ''),
(100, '-=[Infernal]=-', 0, '', 60000, 0, 50000, 60, 950, 0, 300, '0', 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, ''),
(101, '-=[Ice Meteoroid]=-', 0, '', 1600000, 0, 1200000, 60, 0, 0, 200, '0', 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, ''),
(102, '-=[Melter]=-', 0, '', 1000, 0, 0, 20, 20, 0, 150, '1', 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, ''),
(103, '<=<Icy>=>', 0, '', 100000, 0, 80000, 60, 1500, 0, 450, '0', 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, ''),
(104, '-=[Binarybot]=-', 0, '', 800000, 0, 1200000, 80, 20000, 0, 300, '0', 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, ''),
(105, '-=[Devourer]=-', 0, '', 1000, 0, 0, 20, 20, 0, 150, '1', 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, ''),
(106, '-=[Lordakia]=-', 0, '', 2000, 0, 2000, 60, 80, 0, 320, '0', 0, 0, 1, 0, 0, 0, 0, 0, 800, 4, 800, 2, 0, 0, 0, 0, '{\"Prometium\":20,\"Endurium\":20,\"Terbium\":0,\"Prometid\":0,\"Duranium\":0,\"Xenomit\":0,\"Promerium\":0,\"Seprom\":0}'),
(107, '-=[Solarburst]=-', 0, '', 1000, 0, 0, 20, 20, 0, 150, '1', 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, ''),
(108, '-=[Havok]=-', 0, '', 50000, 0, 50000, 60, 1400, 0, 300, '0', 0, 0, 1, 0, 0, 0, 0, 0, 12800, 64, 12800, 32, 0, 0, 0, 0, ''),
(109, 'Saturn', 0, 'ship_goliath_design_saturn', 307200, 256000, 265000, 92, 42500, 45000, 300, '1', 4, 15, 1, 15, 32000, 1600, 3, 1500, 51200, 512, 0, 0, 0, 0, 0, 0, ''),
(110, 'Centaur', 0, 'ship_goliath_design_centaur', 281600, 256000, 265000, 92, 42500, 45000, 300, '1', 4, 15, 1, 15, 32000, 1600, 3, 1500, 51200, 512, 0, 0, 0, 0, 0, 0, ''),
(111, '-=[Interceptor]=-', 0, '', 60000, 0, 40000, 60, 350, 500, 450, '0', 0, 0, 1, 0, 0, 0, 0, 0, 7500, 24, 25000, 20, 1, 0, 0, 0, ''),
(112, '-=[Barracuda]=-', 0, '', 180000, 0, 100000, 60, 4500, 6000, 430, '0', 0, 0, 1, 0, 0, 0, 0, 0, 15000, 56, 90000, 25, 2, 0, 0, 0, ''),
(113, '-=[Saboteur]=-', 0, '', 200000, 0, 150000, 60, 3000, 4000, 430, '0', 0, 0, 1, 0, 0, 0, 0, 0, 22500, 72, 125000, 45, 2, 0, 0, 0, ''),
(114, '-=[Annihilator]=-', 0, '', 300000, 0, 200000, 60, 12000, 14000, 350, '0', 0, 0, 1, 0, 0, 0, 0, 0, 75000, 128, 250000, 65, 6, 0, 0, 0, ''),
(115, '-=[Battleray]=-', 0, '', 500000, 0, 400000, 60, 7000, 10000, 250, '0', 0, 0, 1, 0, 0, 0, 0, 0, 125000, 192, 1750000, 175, 8, 0, 0, 0, ''),
(116, '-=[Hitac 2.0]=-', 0, '', 1000, 0, 0, 20, 20, 0, 150, '1', 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, ''),
(117, '-=[Minion]=-', 0, '', 1000, 0, 0, 20, 20, 0, 150, '1', 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, ''),
(118, '..::{Boss Twist}::..', 0, '', 1000, 0, 0, 20, 20, 0, 150, '1', 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, ''),
(119, '-=[Twist]=-', 0, '', 1000, 0, 0, 20, 20, 0, 150, '1', 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, ''),
(120, '-=[Turkey]=-', 0, '', 1000, 0, 0, 20, 20, 0, 150, '1', 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, ''),
(121, '-=[Snowman]=-', 0, '', 1000, 0, 0, 20, 20, 0, 150, '1', 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, ''),
(122, '-=[Emperor Kristallon]=-', 0, '', 1000, 0, 0, 20, 20, 0, 150, '1', 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, ''),
(123, '-=[Emperor Lordakium]=-', 0, '', 1000, 0, 0, 20, 20, 0, 150, '1', 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, ''),
(124, '-=[Emperor Sibelon]=-', 0, '', 1000, 0, 0, 20, 20, 0, 150, '1', 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, ''),
(125, '-=[Mine Car]=-', 0, '', 1000, 0, 0, 20, 20, 0, 150, '1', 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, ''),
(442, '-=[Spaceball]=-', 0, '', 0, 0, 0, 0, 0, 0, 200, '1', 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, ''),
(443, '-=[Spaceball]=-', 0, '', 0, 0, 0, 0, 0, 0, 200, '1', 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, ''),
(444, '-=[Spaceball]=-', 0, '', 0, 0, 0, 0, 0, 0, 200, '1', 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `server_ships_designs`
--

CREATE TABLE `server_ships_designs` (
  `Id` smallint(11) NOT NULL,
  `ShipId` smallint(11) NOT NULL,
  `Name` varchar(255) NOT NULL DEFAULT '',
  `type` varchar(255) NOT NULL DEFAULT '',
  `inShop` tinyint(1) NOT NULL,
  `price_cre` int(11) NOT NULL,
  `price_uri` int(11) NOT NULL,
  `desc` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `server_ships_designs`
--

INSERT INTO `server_ships_designs` (`Id`, `ShipId`, `Name`, `type`, `inShop`, `price_cre`, `price_uri`, `desc`) VALUES
(16, 8, 'Vengeance Adept', 'ship_vengeance_design_adept', 1, 1000000, 0, 'The Adept is an elite design for the Vengeance. It features a black and white color design and gives a passive 10% bonus to all experience points gained.'),
(17, 8, 'Vengeance Corsair', 'ship_vengeance_design_corsair', 1, 1000000, 0, 'The Corsair is an elite design for the Vengeance and features a black and red paint job. The Corsair also comes along with a bonus of 10% more honor.'),
(18, 8, 'Vengeance Lightning', 'ship_vengeance_design_lightning', 0, 0, 250000, 'The Lightning is an elite skill design for the Vengeance (this is the only skill design for the Vengeance). Not only does it give your ship a completely new look, but it also provides a 30% enhancement of your ship\'s speed with the \'Afterburner\' effect. Along with that, you dish out an extra 5% more damage to enemy ships.'),
(52, 10, 'Goliath Amber', 'ship_goliath_design_amber', 1, 1000000, 0, 'The Amber design is an elite design for the Goliath. It features an orange and silver paint job. This design does not have any bonuses. It use to be only obtainable through payment, but now it is obtainable through shop or auction.'),
(53, 10, 'Goliath Crimson', 'ship_goliath_design_crimson', 0, 1000000, 0, 'The Crimson design is an elite design for the Goliath and is the very first design to be released into DarkOrbit. It features a red and black ship design. This design does not have any bonuses.'),
(54, 10, 'Goliath Sapphire', 'ship_goliath_design_sapphire', 1, 1000000, 0, 'The Sapphire design was previously an elite payment bought design for the Goliath ship (see below). Features a blue and silver paint job. This design does not have any boosts.'),
(55, 10, 'Goliath Jade', 'ship_goliath_design_jade', 1, 1000000, 0, 'The Jade design is an elite design for the Goliath. It features a green and silver paint job. This design does not have any bonuses. It use to be only obtainable through payment, but now it is obtainable through shop or auction.'),
(56, 10, 'Goliath Enforcer', 'ship_goliath_design_enforcer', 1, 1000000, 0, 'The Enforcer (realeased sometime after the Crimson design and realeased together with the Bastion) is and elite design that features red flames on a black chromatic design and is one of the first two design to have an extra passive bonus (along with the Bastion). It has a passive bonus of 5% damage dealt to players and aliens.'),
(57, 10, 'Goliath Stars and Stripes', 'ship_goliath_design_independence', 0, 0, 20000, ''),
(58, 8, 'Vengeance Revenge', 'ship_vengeance_design_revenge', 1, 1000000, 0, 'The Revenge is an elite design for the Vengeance. It gives a passive bonus of 10% more damage and features a red color design.'),
(59, 10, 'Goliath Bastion', 'ship_goliath_design_bastion', 1, 1000000, 0, 'The Bastion is an Elite Design for the Goliath and features a bright blue and silver paint job and is one of the first two designs to have an extra passive bonus (along with the Enforcer). It also provides a passive bonus of 10% shield strength to your ship.'),
(60, 8, 'Vengeance Avenger', 'ship_vengeance_design_avenger', 1, 1000000, 0, 'The Avenger is an elite design for the Vengeance. It gives a passive bonus of 10% more shield strength and features a blue color design.'),
(61, 10, 'Goliath Veteran', 'ship_goliath_design_veteran', 1, 1000000, 0, 'The Veteran is an elite design for the Goliath. It features a black and white color design, while giving a passive 10% to all experience points gained.'),
(62, 10, 'Goliath Exalted', 'ship_goliath_design_exalted', 1, 1000000, 0, 'The Exalted is a design for the Goliath that gives a bonus of 10% more Honor and features a red and silver design.'),
(63, 10, 'Goliath Solace', 'ship_goliath_design_solace', 0, 0, 250000, 'This design not only gives your Goliath Battlecruiser a completely new look but it also lets you repair your ship hull and the hulls of group members immediately with the \'Nano-Cluster Repairer\'. It also increases your shield power by 10%.'),
(64, 10, 'Goliath Diminisher', 'ship_goliath_design_diminisher', 0, 0, 250000, 'This design doesn\'t just change the look of your Goliath Battlecruiser. Use its \'Weaken Shield\' ability to increase damage to enemy shields by 50%, though your shield\'s strength will be reduced by 30% once the effect wears off. Not only that, but you\'ll also do an extra 5% damage.'),
(65, 10, 'Goliath  Spectrum', 'ship_goliath_design_spectrum', 0, 0, 250000, 'Change the look of your Goliath Battlecruiser and render enemy laser attacks almost useless with this design\'s \'Prismatic Shielding\' capability. It\'ll also temporarily weaken your enemy\'s lasers, and give you 10% more shield power in return.'),
(66, 10, 'Goliath Sentinel', 'ship_goliath_design_sentinel', 0, 0, 250000, 'Give your Goliath Battlecruiser a futuristic new look with the Sentinel design. Its \'Fortress\' capability will give your shields a massive power boost, and you\'ll also benefit from a 10% shield bonus.'),
(67, 10, 'Goliath Venom', 'ship_goliath_design_venom', 0, 0, 250000, 'Breathe life into your Goliath Battlecruiser with this brand-new design. It\'ll give your ship a 5% damage bonus and its singularity function will give you a massive damage boost temporarily.'),
(68, 10, 'Goliath Ignite', 'ship_goliath_design_ignite', 0, 2000000, 0, 'Ignite is s special design for the Goliath ship, which is currently only achieved by inviting 25 friends to DarkOrbit, through the Friends & Bonuses method. It does not give any bonus and is only decorative.'),
(86, 10, 'Goliath Kick', 'ship_goliath_design_kick', 0, 0, 150000, 'Kick design for the Goliath with a 10% shield bonus. Soccer crazy? Then act now and show off your passion for the beautiful game! In comparison to the Bastion, Sentinel, Solace, and Spectrum, the Kick is only comparable to the Bastion since all other designs are skill designs.'),
(87, 10, 'Goliath Referee', 'ship_goliath_design_referee', 0, 0, 150000, 'Referee design for the Goliath. Exude authority with this design and increase your damage by 5%. In comparison to the Enforcer, Venom, and Diminisher, the Referee is only comparable to the Enforcer since all the other designs are Skill Designs.'),
(88, 10, 'Goliath Goal', 'ship_goliath_design_goal', 0, 0, 150000, 'Goal design for the Goliath with 10% XP bonus. Soccer crazy? Then act now and bring soccer to space. In comparison to the Veteran, the Goal is its equal, but much harder to get.'),
(109, 10, 'Goliath Saturn', 'ship_goliath_design_saturn', 0, 0, 150000, 'The Saturn Design provides a 20% HP bonus when selected.'),
(110, 10, 'Goliath Centaur', 'ship_goliath_design_centaur', 0, 0, 150000, 'The Centaur Design provides a 10% HP bonus when selected.');

-- --------------------------------------------------------

--
-- Table structure for table `server_titles`
--

CREATE TABLE `server_titles` (
  `ID` int(11) NOT NULL,
  `KEY` varchar(255) NOT NULL,
  `TITLE_NAME` varchar(255) NOT NULL,
  `TITLE_COLOR` int(11) NOT NULL,
  `TITLE_COLOR_HEX` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `server_titles`
--

INSERT INTO `server_titles` (`ID`, `KEY`, `TITLE_NAME`, `TITLE_COLOR`, `TITLE_COLOR_HEX`) VALUES
(1, 'title_1', 'Master of the Orbit', 1, '#FFF'),
(2, 'title_2', 'Space Cleaner', 1, '#FFF'),
(3, 'title_3', 'Dark Pilot', 1, '#FFF'),
(4, 'title_4', 'Emperor', 1, '#FFF'),
(5, 'title_5', 'Newbie', 1, '#FFF'),
(6, 'title_6', 'Goli Hunter', 1, '#FFF'),
(7, 'title_7', 'Boss', 1, '#FFF'),
(8, 'title_8', 'Alien Hunter', 1, '#FFF'),
(9, 'title_9', 'Sharpshooter', 1, '#FFF'),
(10, 'title_10', 'Space Whiz', 1, '#FFF'),
(11, 'title_11', 'Orbit King', 1, '#FFF'),
(12, 'title_12', 'Phoenix Shock', 1, '#FFF'),
(13, 'title_13', 'Chaos Pilot', 1, '#FFF'),
(14, 'title_14', 'Most Wanted', 1, '#FFF'),
(15, 'title_15', 'Portal Guard', 1, '#FFF'),
(16, 'title_16', 'Battle Master', 1, '#FFF'),
(17, 'title_17', 'System Lord', 1, '#FFF'),
(18, 'title_18', 'The Legend', 1, '#FFF'),
(19, 'title_19', 'PvP Hunter of the Day', 1, '#FFF'),
(20, 'title_20', 'Pirate Hunter', 1, '#FFF'),
(21, 'title_21', 'Spring Fighter MMO 2', 1, '#FFF'),
(22, 'title_22', 'Spring Fighter EIC 2', 1, '#FFF'),
(23, 'title_23', 'Spring Fighter VRU 2', 1, '#FFF'),
(100, 'title_100', 'Spring Fighter MMO', 1, '#FFF'),
(101, 'title_101', 'Spring Fighter VRU', 1, '#FFF'),
(102, 'title_102', 'Spring Fighter EIC', 1, '#FFF'),
(104, 'title_104', 'Spring Fighter MMO 2', 1, '#FFF'),
(105, 'title_105', 'Spring Fighter VRU 2', 1, '#FFF'),
(106, 'title_106', 'Spring Fighter EIC 2', 1, '#FFF'),
(107, 'title_107', 'Spring King MMO', 1, '#FFF'),
(108, 'title_108', 'Spring King EIC', 1, '#FFF'),
(109, 'title_109', 'Spring King VRU', 1, '#FFF'),
(200, 'title_200', 'Pirate-Hunting Champion', 1, '#FFF'),
(201, 'title_201', 'Pirate Hunter', 1, '#FFF'),
(202, 'title_202', 'Pirate Destroyer', 1, '#FFF'),
(203, 'title_203', 'Pirate Annihilator', 1, '#FFF'),
(204, 'title_204', 'All-Star', 1, '#FFF'),
(205, 'title_205', 'Boss of Bosses', 1, '#FFF'),
(222, 'lord_of_like', 'Lord Of Likes', 222, '#3B5998'),
(299, 'title_299', 'Time killer', 1, '#FFF'),
(300, 'title_300', 'Error in space-time continuum?', 1, '#FFF'),
(301, 'title_301', 'Matador', 1, '#FFF'),
(302, 'title_302', 'Death-defying', 1, '#FFF'),
(303, 'title_303', 'Orbit drifter', 1, '#FFF'),
(304, 'title_304', 'Godfather', 1, '#FFF'),
(305, 'title_305', 'Enlightened', 1, '#FFF'),
(306, 'title_306', 'Honored', 1, '#FFF'),
(307, 'title_307', 'Transcendent', 1, '#FFF'),
(308, 'title_308', 'Expert', 1, '#FFF'),
(309, 'title_309', 'Legend', 1, '#FFF'),
(310, 'title_310', 'P.E.T. Animal Trainer', 1, '#FFF'),
(311, 'title_311', 'P.E.T. commander', 1, '#FFF'),
(312, 'title_312', 'Ninja Master', 1, '#FFF'),
(363, 'title_363', 'Immortal', 365, '#CCCCCC'),
(364, 'title_364', 'Golden Score Maker / 2018', 364, '#AAAA00'),
(365, 'title_365', 'Silver Score Maker / 2018', 365, '#CCCCCC'),
(366, 'title_366', 'Bronze Score Maker / 2018', 366, '#CD7F32'),
(367, 'title_367', 'Scoring Legend', 1, '#FFF'),
(410, 'title_410', 'Football Official', 1, '#FFF'),
(458, 'title_458', 'Blizzard', 1, '#FFF');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `player_ammo`
--
ALTER TABLE `player_ammo`
  ADD PRIMARY KEY (`USER_ID`,`PLAYER_ID`) USING BTREE;

--
-- Indexes for table `player_data`
--
ALTER TABLE `player_data`
  ADD PRIMARY KEY (`PLAYER_ID`,`USER_ID`,`SESSION_ID`) USING BTREE;

--
-- Indexes for table `player_deaths`
--
ALTER TABLE `player_deaths`
  ADD PRIMARY KEY (`ID`,`PLAYER_ID`) USING BTREE;

--
-- Indexes for table `player_drones`
--
ALTER TABLE `player_drones`
  ADD PRIMARY KEY (`ID`) USING BTREE;

--
-- Indexes for table `player_equipment`
--
ALTER TABLE `player_equipment`
  ADD PRIMARY KEY (`ID`) USING BTREE;

--
-- Indexes for table `player_event_info`
--
ALTER TABLE `player_event_info`
  ADD PRIMARY KEY (`PLAYER_ID`,`EVENT_ID`) USING BTREE;

--
-- Indexes for table `player_extra_data`
--
ALTER TABLE `player_extra_data`
  ADD PRIMARY KEY (`USER_ID`,`PLAYER_ID`) USING BTREE;

--
-- Indexes for table `player_hangar`
--
ALTER TABLE `player_hangar`
  ADD PRIMARY KEY (`ID`) USING BTREE;

--
-- Indexes for table `player_logs`
--
ALTER TABLE `player_logs`
  ADD PRIMARY KEY (`ID`) USING BTREE;

--
-- Indexes for table `player_pet`
--
ALTER TABLE `player_pet`
  ADD PRIMARY KEY (`USER_ID`) USING BTREE;

--
-- Indexes for table `player_pet_config`
--
ALTER TABLE `player_pet_config`
  ADD PRIMARY KEY (`USER_ID`) USING BTREE;

--
-- Indexes for table `player_queststats`
--
ALTER TABLE `player_queststats`
  ADD PRIMARY KEY (`USER_ID`,`PLAYER_ID`) USING BTREE;

--
-- Indexes for table `player_ship_config`
--
ALTER TABLE `player_ship_config`
  ADD PRIMARY KEY (`USER_ID`) USING BTREE;

--
-- Indexes for table `player_skill_tree`
--
ALTER TABLE `player_skill_tree`
  ADD PRIMARY KEY (`USER_ID`) USING BTREE;

--
-- Indexes for table `player_skylab`
--
ALTER TABLE `player_skylab`
  ADD PRIMARY KEY (`USER_ID`,`PLAYER_ID`) USING BTREE;

--
-- Indexes for table `server_announcements`
--
ALTER TABLE `server_announcements`
  ADD PRIMARY KEY (`ID`) USING BTREE;

--
-- Indexes for table `server_auctions`
--
ALTER TABLE `server_auctions`
  ADD PRIMARY KEY (`ID`) USING BTREE;

--
-- Indexes for table `server_chat_bans`
--
ALTER TABLE `server_chat_bans`
  ADD PRIMARY KEY (`ID`) USING BTREE;

--
-- Indexes for table `server_chat_moderators`
--
ALTER TABLE `server_chat_moderators`
  ADD PRIMARY KEY (`USER_ID`,`PLAYER_ID`) USING BTREE;

--
-- Indexes for table `server_chat_rooms`
--
ALTER TABLE `server_chat_rooms`
  ADD PRIMARY KEY (`ID`) USING BTREE;

--
-- Indexes for table `server_clanbattlestations`
--
ALTER TABLE `server_clanbattlestations`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `server_clans`
--
ALTER TABLE `server_clans`
  ADD PRIMARY KEY (`ID`) USING BTREE;

--
-- Indexes for table `server_collectables`
--
ALTER TABLE `server_collectables`
  ADD PRIMARY KEY (`ID`) USING BTREE;

--
-- Indexes for table `server_events`
--
ALTER TABLE `server_events`
  ADD PRIMARY KEY (`ID`) USING BTREE;

--
-- Indexes for table `server_galaxy_gates`
--
ALTER TABLE `server_galaxy_gates`
  ADD PRIMARY KEY (`ID`) USING BTREE;

--
-- Indexes for table `server_game_bans`
--
ALTER TABLE `server_game_bans`
  ADD PRIMARY KEY (`ID`) USING BTREE;

--
-- Indexes for table `server_items`
--
ALTER TABLE `server_items`
  ADD PRIMARY KEY (`ID`) USING BTREE;

--
-- Indexes for table `server_levels_drone`
--
ALTER TABLE `server_levels_drone`
  ADD PRIMARY KEY (`ID`) USING BTREE;

--
-- Indexes for table `server_levels_pet`
--
ALTER TABLE `server_levels_pet`
  ADD PRIMARY KEY (`ID`) USING BTREE;

--
-- Indexes for table `server_levels_player`
--
ALTER TABLE `server_levels_player`
  ADD PRIMARY KEY (`ID`) USING BTREE;

--
-- Indexes for table `server_maps`
--
ALTER TABLE `server_maps`
  ADD PRIMARY KEY (`ID`) USING BTREE;

--
-- Indexes for table `server_ore_prices`
--
ALTER TABLE `server_ore_prices`
  ADD PRIMARY KEY (`ID`) USING BTREE;

--
-- Indexes for table `server_payments`
--
ALTER TABLE `server_payments`
  ADD PRIMARY KEY (`ID`) USING BTREE;

--
-- Indexes for table `server_premium_packs`
--
ALTER TABLE `server_premium_packs`
  ADD PRIMARY KEY (`ID`) USING BTREE;

--
-- Indexes for table `server_quests`
--
ALTER TABLE `server_quests`
  ADD PRIMARY KEY (`ID`) USING BTREE;

--
-- Indexes for table `server_ranks`
--
ALTER TABLE `server_ranks`
  ADD PRIMARY KEY (`ID`) USING BTREE;

--
-- Indexes for table `server_ships`
--
ALTER TABLE `server_ships`
  ADD PRIMARY KEY (`ship_id`) USING BTREE;

--
-- Indexes for table `server_ships_designs`
--
ALTER TABLE `server_ships_designs`
  ADD PRIMARY KEY (`Id`) USING BTREE;

--
-- Indexes for table `server_titles`
--
ALTER TABLE `server_titles`
  ADD PRIMARY KEY (`ID`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `player_data`
--
ALTER TABLE `player_data`
  MODIFY `PLAYER_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1001;

--
-- AUTO_INCREMENT for table `player_deaths`
--
ALTER TABLE `player_deaths`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `player_drones`
--
ALTER TABLE `player_drones`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `player_equipment`
--
ALTER TABLE `player_equipment`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `player_hangar`
--
ALTER TABLE `player_hangar`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `player_logs`
--
ALTER TABLE `player_logs`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=514;

--
-- AUTO_INCREMENT for table `server_auctions`
--
ALTER TABLE `server_auctions`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT for table `server_chat_rooms`
--
ALTER TABLE `server_chat_rooms`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `server_clans`
--
ALTER TABLE `server_clans`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `server_galaxy_gates`
--
ALTER TABLE `server_galaxy_gates`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `server_items`
--
ALTER TABLE `server_items`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT for table `server_levels_pet`
--
ALTER TABLE `server_levels_pet`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `server_maps`
--
ALTER TABLE `server_maps`
  MODIFY `ID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT for table `server_payments`
--
ALTER TABLE `server_payments`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `server_premium_packs`
--
ALTER TABLE `server_premium_packs`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `server_ranks`
--
ALTER TABLE `server_ranks`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `server_ships`
--
ALTER TABLE `server_ships`
  MODIFY `ship_id` smallint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=445;

--
-- AUTO_INCREMENT for table `server_ships_designs`
--
ALTER TABLE `server_ships_designs`
  MODIFY `Id` smallint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT for table `server_titles`
--
ALTER TABLE `server_titles`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=459;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
