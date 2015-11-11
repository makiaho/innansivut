<?php


someloader('some.application.model');

class SomeModelDefault extends SomeModel {
	
	protected $errors = array();
	
	public function __construct(array $options=array()) {
		parent::__construct($options);
		$this->diagnose();
	}
	
	public function diagnose() {
		
		$conferrors = $this->confOk();
		if (is_array($conferrors)) {
			$this->errors = array_merge($this->errors,$conferrors);
		}
	}
	
	public function hasErrors() {
		return count($this->errors);
	}
	
	public function getErrors() {
		return $this->errors;
	}
	
	protected function confOk() {
		$conf = SomeFactory::getConfiguration();
		$driver = $conf->get('databasedriver','database');
		$host   = $conf->get('databasehost','database');
		$database   = $conf->get('database','database');
		//if all ok, try to get select now() as now
		$errors = array();
		if (!$driver) {
			$errors[] = "Set configuration.xml databasedriver to pdopostgres or pdomysql";
		}
		if (!$host) {
			$errors[] = "Set configuration.xml databasehost to some host. In cluster host is postgres.cs.uta.fi";
		}
		if (!$database) {
			$errors[] = "Set configuration.xml database to some database name. In cluster database is your account username";
		}
		if (count($errors)) {
			return $errors;
		}
		$database = null;
		try {
			$database = SomeFactory::getDBO();
			$st = $database->query("SELECT NOW() as now");
		} catch (Exception $e) {
			$errors[] = $e->getMessage();
			return $errors;
		}
		if ($st->fetch()) {
			return true;
		} else {
			$errors[] = "Can not connect to database with $driver, $host and $database";
			return $errors;
		}
	}
	
}