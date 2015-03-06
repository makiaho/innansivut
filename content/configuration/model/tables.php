<?php

someloader('some.application.model');

class SomeModelTables extends SomeModel {
	
	public $errors = array();
	
	public function __construct(array $options = array()) {
		parent::__construct($options);
		$this->prepare();
	}

	public function prepare() {
		//do we even have
		$installtables = SomeRequest::getInt('ist',0);
		if ($installtables &&$this->confOk()) {
			if (!$this->hasUsertable()) {
				$this->createUserTable();
			}
			if (!$this->hasSessiontable()) {
				$this->createSessionTable();
			}
		}
		//get the information on tables needes and what is installed
		if (!$this->hasUsertable()) {
			$this->errors[] = "No someuser database table installed!";
		}
		if (!$this->hasSessiontable()) {
			$this->errors[] = "No somesession database table installed!";
		}
		if (!$this->confOk()) {
			$this->errors[] = "Check you configuration.xml on database values.";
		}
	}
	
	public function getErrors() {
		return $this->errors;
	}
	
	public function confOk() {
		$conf = SomeFactory::getConfiguration();
		$driver = $conf->get('databasedriver','database');
		$host   = $conf->get('databasehost','database');
		$database   = $conf->get('database','database');
		//if all ok, try to get select now() as now
		if (!$driver) {
			$this->errors[] = "Set configuration databasedriver to pdopostgres or pdomysql";
		}
		if (!$host) {
			$this->errors[] = "Set configuration databasehost to some host. In cluster host is postgres.cs.uta.fi";
		}
		if (!$database) {
			$this->errors[] = "Set configuration database to some database name. In cluster database is your account username";
		}
		if (count($this->errors)) {
			return false;
		}
		$database = SomeFactory::getDBO();
		$st = $database->query("SELECT NOW() as now");
		if ($st->fetch()) {
			return true;
		} else {
			$this->errors[] = "Can not connect to database with $driver, $host and $database";
			return false;
		}
	}

	public function hasUsertable() {
		$sql = 
		"select * from information_schema.tables where table_schema='public' ".
		"and table_type='BASE TABLE' AND table_name='someuser'";
		$database = SomeFactory::getDBO();
		$st = $database->query($sql);
		return $st->fetch();
	}
	
	public function createUserTable() {
		$sql = "
		CREATE TABLE someuser (
   id SERIAL,
   username character varying(32),
   \"password\" character(32),
 userrole character(32),
   email text,
   homepage text
	)
		";
		$database= SomeFactory::getDBO();
		$database->query($sql);
	}
	
	public function hasSessiontable() {
		$sql = 
		"select * from information_schema.tables where table_schema='public' ".
		"and table_type='BASE TABLE' AND table_name='somesession'";
		$database = SomeFactory::getDBO();
		$st = $database->query($sql);
		return $st->fetch();
	}
	
	public function createSessionTable() {
		$sql = "
		 CREATE TABLE somesession (
    sesskey character(32) NOT NULL,
    expiry integer NOT NULL,
    value text
)";
		$database= SomeFactory::getDBO();
		$database->query($sql);
	}

}