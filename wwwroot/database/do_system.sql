-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 28, 2019 at 12:56 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

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
  `XMAS` tinyint(1) NOT NULL,
  `ONLINE_PLAYERS` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `server_infos`
--

INSERT INTO `server_infos` (`ID`, `REGION`, `SHORTCUT`, `NAME`, `SERVER_IP`, `DB_NAME`, `OPEN`, `XMAS`, `ONLINE_PLAYERS`) VALUES
(1, 'Europe', 'GE1', 'Global Europe 1', '127.0.0.1', 'do_server_ge1', 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `server_invitations`
--

CREATE TABLE `server_invitations` (
  `ID` int(11) NOT NULL,
  `CODE` varchar(255) NOT NULL,
  `USED` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

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
-- Table structure for table `server_recovery`
--

CREATE TABLE `server_recovery` (
  `ID` int(11) NOT NULL,
  `USER_ID` int(11) NOT NULL,
  `ACTIVATION_CODE` varchar(255) NOT NULL,
  `SEND_TO` varchar(255) NOT NULL,
  `SEND_DATE` datetime NOT NULL,
  `TIMEOUT` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

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
(58, 'general_Rejection', 'ic3.sh0ck@gmail.com', 'edb22fe2341f91141d3fee59ffd8ce05', '$2y$10$72FZyT8yM3XPE1RM2QTO4OtXu2A5tUauuj/Q/jvZnrlVvsxkegZ4q', 'GE1', '172.18.0.1', 0, 0, 0, '0000-00-00 00:00:00', 'Fat', 'Nigger', 'AF', 1, '2000-02-01 00:00:00', 0, 2147483647),
(59, 'Shock', 'wehaveskillas@gmail.com', '1cc748383cdb8648e049dc1dd4f049dc', '$2y$10$OltsZ3vaMfa3F3L80tWMCOjQePICmFwniICTEn0ANzHTL7p0s.Iru', 'GE1', '172.18.0.1', 0, 0, 0, '0000-00-00 00:00:00', '', '', '', 0, NULL, 0, 0),
(60, 'TestAccount1', 'testacc@pass.com', '', '$2y$10$gDgMM260tX8c6/tMAt96yOVWdp/w8UtRAi81QkuPAu7GyCXtVuIAW', 'GE1', '172.18.0.1', 0, 0, 0, '0000-00-00 00:00:00', '', '', '', 0, NULL, 0, 0),
(61, 'TestAcc', 'testacc@gmail.com', '8b8ce714007990c468599aeb0ee44902', '$2y$10$FAi1Ozbf.otaLtdomj0YxepE27hsLeYuHfDLmPOJOdMfIa1osi3lO', 'GE1', '172.18.0.1', 0, 0, 0, '0000-00-00 00:00:00', '', '', '', 0, NULL, 0, 0),
(62, 'Kurec', 'kur@zalevski.com', '13f65af19d8e639d430f3b0d63ac68c9', '$2y$10$u6GVdyeIiKuEZe8/SQkofORd9pXWpDL9H3/Pf2fvoYSSc0PeybBse', 'GE1', '172.18.0.1', 0, 0, 0, '0000-00-00 00:00:00', '', '', '', 0, NULL, 0, 0);

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
-- Indexes for table `server_recovery`
--
ALTER TABLE `server_recovery`
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
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `server_invitations`
--
ALTER TABLE `server_invitations`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `server_recovery`
--
ALTER TABLE `server_recovery`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `server_verfiy`
--
ALTER TABLE `server_verfiy`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `USER_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
