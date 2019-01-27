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
-- Database: `do_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `server_crons`
--

CREATE TABLE `server_crons` (
  `ID` int(11) NOT NULL,
  `NAME` varchar(255) NOT NULL,
  `REPEAT` tinyint(1) NOT NULL,
  `TIME` datetime NOT NULL,
  `INTERVAL` int(11) NOT NULL,
  `EXECUTE` text NOT NULL,
  `ACTIVE` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `server_infos`
--

CREATE TABLE `server_infos` (
  `ID` int(11) NOT NULL,
  `REGION` varchar(255) NOT NULL,
  `SHORTCUT` varchar(255) NOT NULL,
  `NAME` varchar(255) NOT NULL,
  `SERVER_IP` varchar(255) NOT NULL,
  `DB_NAME` varchar(255) NOT NULL,
  `OPEN` tinyint(1) NOT NULL,
  `XMAS` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `server_infos`
--

INSERT INTO `server_infos` (`ID`, `REGION`, `SHORTCUT`, `NAME`, `SERVER_IP`, `DB_NAME`, `OPEN`, `XMAS`) VALUES
(1, 'Europe', 'GE1', 'Global Europe 1', '127.0.0.1', 'do_server_ge1', 1, 0),
(2, 'Europe', 'TEST1', 'Test 1', '127.0.0.1', 'do_server_ge1', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `server_invitations`
--

CREATE TABLE `server_invitations` (
  `ID` int(11) NOT NULL,
  `CODE` varchar(255) NOT NULL,
  `USED` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `server_invitations`
--

INSERT INTO `server_invitations` (`ID`, `CODE`, `USED`) VALUES
(1, 'TEST', 1);

-- --------------------------------------------------------

--
-- Table structure for table `server_languages`
--

CREATE TABLE `server_languages` (
  `ID` int(11) NOT NULL,
  `NAME` varchar(255) NOT NULL,
  `LOOT_ID` varchar(255) NOT NULL,
  `SHORTCODE` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `server_languages`
--

INSERT INTO `server_languages` (`ID`, `NAME`, `LOOT_ID`, `SHORTCODE`) VALUES
(1, 'English', 'translations_en', 'en');

-- --------------------------------------------------------

--
-- Table structure for table `server_verfiy`
--

CREATE TABLE `server_verfiy` (
  `ID` int(11) NOT NULL,
  `USER_ID` int(11) NOT NULL,
  `ACTIVATION_CODE` varchar(255) NOT NULL,
  `SEND_TO` varchar(255) NOT NULL,
  `SEND_DATE` datetime NOT NULL,
  `TIMEOUT` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `USER_ID` int(11) NOT NULL,
  `USERNAME` varchar(255) NOT NULL,
  `EMAIL` varchar(255) NOT NULL,
  `SESSION_ID` varchar(255) NOT NULL,
  `PW_HASH` varchar(255) NOT NULL,
  `LAST_SERVER` tinytext NOT NULL,
  `IP` text NOT NULL,
  `VERFIED` tinyint(1) NOT NULL,
  `ONLINE` tinyint(1) NOT NULL DEFAULT '0',
  `WAS_TESTER` smallint(6) NOT NULL,
  `BANNED` datetime NOT NULL,
  `FIRST_NAME` varchar(255) NOT NULL,
  `LAST_NAME` varchar(255) NOT NULL,
  `COUNTRY_NAME` varchar(255) NOT NULL,
  `GENDER` int(11) NOT NULL,
  `BIRTHDATE` datetime DEFAULT NULL,
  `LANGUAGE` int(11) NOT NULL,
  `DISCORD_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`USER_ID`, `USERNAME`, `EMAIL`, `SESSION_ID`, `PW_HASH`, `LAST_SERVER`, `IP`, `VERFIED`, `ONLINE`, `WAS_TESTER`, `BANNED`, `FIRST_NAME`, `LAST_NAME`, `COUNTRY_NAME`, `GENDER`, `BIRTHDATE`, `LANGUAGE`, `DISCORD_ID`) VALUES
(1, 'general_Rejection', 'ic3.sh0ck@gmail.com', '98915450nvlr3e8s28nsi05d3d', '$2y$10$xq5rg5KtJ6ZbFwZWdZUN..lg8iJT4/cZ5E7ntyO8QlL2fxT0lIi.C', 'GE1', '127.0.0.1', 0, 0, 0, '0000-00-00 00:00:00', '', '', '', 0, NULL, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `server_crons`
--
ALTER TABLE `server_crons`
  ADD PRIMARY KEY (`ID`) USING BTREE;

--
-- Indexes for table `server_infos`
--
ALTER TABLE `server_infos`
  ADD PRIMARY KEY (`ID`) USING BTREE,
  ADD UNIQUE KEY `SHORTCUT` (`SHORTCUT`,`NAME`,`DB_NAME`) USING BTREE;

--
-- Indexes for table `server_invitations`
--
ALTER TABLE `server_invitations`
  ADD PRIMARY KEY (`ID`) USING BTREE;

--
-- Indexes for table `server_languages`
--
ALTER TABLE `server_languages`
  ADD PRIMARY KEY (`ID`) USING BTREE;

--
-- Indexes for table `server_verfiy`
--
ALTER TABLE `server_verfiy`
  ADD PRIMARY KEY (`ID`) USING BTREE;

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`USER_ID`,`EMAIL`,`USERNAME`) USING BTREE,
  ADD UNIQUE KEY `USERNAME` (`USERNAME`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `server_infos`
--
ALTER TABLE `server_infos`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `server_invitations`
--
ALTER TABLE `server_invitations`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `server_verfiy`
--
ALTER TABLE `server_verfiy`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `USER_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
