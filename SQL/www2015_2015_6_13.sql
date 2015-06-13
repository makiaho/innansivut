-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 13.06.2015 klo 09:43
-- Palvelimen versio: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `www2015`
--

-- --------------------------------------------------------

--
-- Rakenne taululle `crud`
--

CREATE TABLE IF NOT EXISTS `crud` (
`id` int(11) NOT NULL,
  `year` int(11) DEFAULT NULL,
  `story` text CHARACTER SET utf8,
  `created` datetime DEFAULT NULL,
  `ownerid` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=101 DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Vedos taulusta `crud`
--

INSERT INTO `crud` (`id`, `year`, `story`, `created`, `ownerid`) VALUES
(1, 2000, 'stooriaqqw', NULL, NULL),
(3, 11, 'qwew', NULL, NULL),
(4, 12, 'asd', NULL, NULL),
(5, 1111, 'asfasdfaqweqew', NULL, NULL),
(6, 12, 'qqeqeqeqer', NULL, NULL),
(7, 0, '', NULL, NULL),
(8, NULL, NULL, NULL, NULL),
(9, 2020, '...', NULL, NULL),
(10, 1111, '...234432', NULL, NULL),
(11, 2015, '...', '2015-02-22 00:00:00', NULL),
(12, 2015, 'stooriCREATED', '2015-02-22 00:00:00', NULL),
(13, 2015, '...', '2015-02-22 00:00:00', NULL),
(14, 2015, '.qwe.', NULL, NULL),
(100, 2010, 'kkkk', '0000-00-00 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Rakenne taululle `somesession`
--

CREATE TABLE IF NOT EXISTS `somesession` (
  `sesskey` char(32) COLLATE utf8_swedish_ci NOT NULL,
  `expiry` int(11) NOT NULL,
  `value` text COLLATE utf8_swedish_ci
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

-- --------------------------------------------------------

--
-- Rakenne taululle `someuser`
--

CREATE TABLE IF NOT EXISTS `someuser` (
`id` int(11) NOT NULL,
  `username` varchar(32) COLLATE utf8_swedish_ci DEFAULT NULL,
  `password` char(32) COLLATE utf8_swedish_ci DEFAULT NULL,
  `userrole` char(32) COLLATE utf8_swedish_ci DEFAULT NULL,
  `email` text COLLATE utf8_swedish_ci,
  `homepage` text COLLATE utf8_swedish_ci
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Vedos taulusta `someuser`
--

INSERT INTO `someuser` (`id`, `username`, `password`, `userrole`, `email`, `homepage`) VALUES
(2, 'pekka', 'pekka', 'registered', 'pekka', 'pekka'),
(3, 'pekka', 'kolfkolf', 'registered', 'peksi.es@gmail.com', 'iltalehti.fi'),
(4, 'pekka1', 'd7d8561ea59bd21187b6d7a59e6fa27f', 'registered', 'pekka@gg.gi', 'atu.fi'),
(5, '234', '81a2a10da213a09e78a882e090c0997d', 'registered', '243', '243');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `crud`
--
ALTER TABLE `crud`
 ADD PRIMARY KEY (`id`), ADD KEY `ownerid` (`ownerid`);

--
-- Indexes for table `someuser`
--
ALTER TABLE `someuser`
 ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `crud`
--
ALTER TABLE `crud`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=101;
--
-- AUTO_INCREMENT for table `someuser`
--
ALTER TABLE `someuser`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
