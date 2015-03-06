<h1>Automatic installer works only for Postgres!</h1>
<?php

if (!empty($this->errors)) {
	foreach ($this->errors as $error) {
		echo "$error<br />\n";
	}
?>
<hr />
<p>
Install missing tables clicking <a href='index.php?app=configuration&view=tables&ist=1'>here</a>
<br />
<br />
Works only on postgres database and only if configuration.xml has been changed to correct values.

<?php
} else {
?>
 All the tables are installed. Tables are someuser and somesession.

<?php
}
?>
</p>
<h2>MySQL tables for MySQL database (XAMPP)</h2>

<pre>

--
-- Table structure for table `someuser`
--

CREATE TABLE IF NOT EXISTS `someuser` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(32) CHARACTER SET latin1 DEFAULT NULL,
  `password` char(32) CHARACTER SET latin1 DEFAULT NULL,
  `userrole` char(32) CHARACTER SET latin1 DEFAULT NULL,
  `email` text CHARACTER SET latin1,
  `homepage` text CHARACTER SET latin1,
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci AUTO_INCREMENT=1 ;

</pre>

<pre>


--
-- Table structure for table `somesession`
--

CREATE TABLE IF NOT EXISTS `somesession` (
  `sesskey` char(32) CHARACTER SET latin1 NOT NULL,
  `expiry` int(11) NOT NULL,
  `value` text CHARACTER SET latin1
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Dumping data for table `somesession`
--


-- --------------------------------------------------------


</pre>