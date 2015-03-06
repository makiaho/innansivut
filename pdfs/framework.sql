
SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";



-- --------------------------------------------------------

--
-- Table structure for table `somesession`
--

CREATE TABLE IF NOT EXISTS `somesession` (
  `sesskey` char(32) COLLATE utf8_swedish_ci NOT NULL,
  `expiry` int(11) NOT NULL,
  `value` text COLLATE utf8_swedish_ci
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;



-- --------------------------------------------------------

--
-- Table structure for table `someuser`
--

CREATE TABLE IF NOT EXISTS `someuser` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(32) COLLATE utf8_swedish_ci DEFAULT NULL,
  `password` char(32) COLLATE utf8_swedish_ci DEFAULT NULL,
  `userrole` char(32) COLLATE utf8_swedish_ci DEFAULT NULL,
  `email` text COLLATE utf8_swedish_ci,
  `homepage` text COLLATE utf8_swedish_ci,
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci AUTO_INCREMENT=2 ;
