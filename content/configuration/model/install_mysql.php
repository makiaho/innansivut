<?php

someloader('some.application.model');

class SomeModelInstall_Mysql extends SomeModelInstall {
	

	
	/**
	 * does table someuser exist?
	 */
	public function isSomeUserInstalled() {
		$database = $this->conf_categories['database']['database'];
		$sql = 'SHOW TABLES FROM ' . $database;
		$database = SomeFactory::getDBO();
		$result = $database->query($sql);
		//echo $sql;
		//var_dump($result);
		$tables = array();
		while ($table = $result->fetchColumn(0)) {
    		$tables[] = $table;
		}
		return in_array('someuser',$tables);
	}
	
	/**
	 * does table somesession exist?
	 */
	public function isSomeSessionInstalled() {
		$database = $this->conf_categories['database']['database'];
		$sql = 'SHOW TABLES FROM ' . $database;
		$database = SomeFactory::getDBO();
		$result = $database->query($sql);
		//echo $sql;
		//var_dump($result);
		$tables = array();
		while ($table = $result->fetchColumn(0)) {
    		$tables[] = $table;
		}
		return in_array('somesession',$tables);
	}
	
	/**
	 * create somesession table to mysql
	 */
	public function installSomeSessionTable() {
		$sql = "CREATE TABLE IF NOT EXISTS `somesession` (
  `sesskey` char(32) NOT NULL,
  `expiry` int(11) NOT NULL,
  `value` text
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci";
		$database = SomeFactory::getDBO();
		return $database->query($sql);
	}
	
	/**
	 * create someuser table to mysql
	 */
	public function installSomeUserTable() {
		$sql = "CREATE TABLE IF NOT EXISTS `someuser` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `username` varchar(32) DEFAULT NULL,
  `password` char(32) DEFAULT NULL,
  `userrole` char(32) DEFAULT NULL,
  `email` text,
  `homepage` text,
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci AUTO_INCREMENT=1";
		$database = SomeFactory::getDBO();
		return $database->query($sql);
	}
	
}