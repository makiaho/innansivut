<?php

if (!class_exists('SomeModelInfo',false)) {
	include(dirname(__FILE__).DS.'info.php');
}

class SomeModelInstall extends SomeModelInfo {
	
	protected static $model;
	
	public static function getModel($type) {
		if (self::$model) {
			return self::$model;
		}
		if ($type == 'pdopostgres') {
			include(dirname(__FILE__).DS.'install_postgres.php');
			self::$model = new SomeModelInstall_Postgres;
		} else if ($type == 'pdomysql') {
			include(dirname(__FILE__).DS.'install_mysql.php');
			self::$model = new SomeModelInstall_Mysql;
		}
		self::$model->loadConfiguration();
		return self::$model;
	}

	
	/**
	 * does table someuser exist?
	 */
	public function isSomeUserInstalled() {
		throw new Exception("@TODO");
	}
	
	/**
	 * does table somesession exist?
	 */
	public function isSomeSessionInstalled() {
		throw new Exception("@TODO");
	}
	
	public function install() {
		$table = SomeRequest::getCmd('table');
		if ($table == 'someuser') {
			$this->installSomeUserTable();
		} else if ($table == 'somesession') {
			$this->installSomeSessionTable();
		}
	}
	
}