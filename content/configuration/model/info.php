<?php
someloader('some.application.model');



class SomeModelInfo extends SomeModel {
	
	protected $conf_categories;
	private $connected = null;
	protected $errors = array();

	public function __construct(array $options = array()) {
		parent::__construct($options);
		$this->loadConfiguration();
	}
	
	public function isConfigurationWriteable() {
		if(is_writable(SOME_PATH . DS . 'configuration.php')) {
			return true;
		}
		return false;
	}
	
	public function isDbSelected() {
		return $this->conf_categories['database']['databasedriver'];
	}
	
	public function getDriver() {
		return $this->conf_categories['database']['databasedriver'];
	}
	
	/*
	 * does configuration.xml has database settings set.
	 */
	public function isDatabaseFilled() {
		$valid = true;
		$dbdriver = $this->conf_categories['database']['databasedriver'];
		if (!$dbdriver) {
			$this->errors['databasedriver'] = "databasedriver must be set!";
			$valid = false;
		} else {
			// must be pdomysql or pdopostgres
			if (!in_array($dbdriver,array('pdopostgres','pdomysql'))) {
				$this->errors['databasedriver'] = "databasedriver must be valid value!";
				$valid = false;
			}
			
		}
		if (!$this->conf_categories['database']['databasehost']) {
			$this->errors['databasehost'] = "databasehost is not set!";
			$valid = false;
		}
		if (!$this->conf_categories['database']['database']) {
			$valid = false;
		}
		
		$dbuser = $this->conf_categories['database']['dbuser'];
		$dbpass = $this->conf_categories['database']['dbpass'];
		
		
		
			//must have dpuser and dppass
			if (empty($dbuser)) {
				$this->errors['dbuser'] = "must set dbuser!";
				$valid = false;
			}
			
			#if (empty($dbpass)) {
			#	$this->errors['dbpass'] = "must set dbpass!";
			#	$valid = false;
			#}
			
		
		return $valid;
	}
	
	public function getConnected() {
		if ($this->connected !== null) {
			return $this->connected;
		}
		
		// if not valid database configuration, return false;
		if (!$this->isDatabaseFilled()) {
			$this->connected = false;
			return false;
		}
		
		try {
			$database = SomeFactory::getDBO();
			//
			if (!$database) {
				$this->connected = false;
				return false;
			}
		} catch (Exception  $e) {
			$this->errors['database'] = $e->getMessage();
			$this->connected = false;
			return false;
		}
		$database = SomeFactory::getDBO();
		$st = $database->query("SELECT NOW() as now");
		if ($st->fetch()) {
			$this->connected = true;
			return true;
		} else {
			$this->errors[] = "Can not connect to database with $driver, $host and $database";
			$this->connected = false;
			return false;
		}
			
	}
	
	public function loadConfiguration() {
		//load configuration.
		$conf = SomeFactory::getConfiguration();
		//get it to arrays, for simpler edit.
		$this->conf_categories = $conf->getAsArray();
		return true;
		
	}
	
	public function getConfiguration() {
		return $this->conf_categories;
	}
	
	public function getSomeuserStatus() {
		if (!$this->getConnected()) {
			return false;
		}
		$dbdriver = $this->conf_categories['database']['databasedriver'];
		$installmodel = SomeModelInstall::getModel($dbdriver);
		return $installmodel->isSomeuserInstalled();
	}
	
	public function getSomesessionStatus() {
		if (!$this->getConnected()) {
			return false;
		}
		$dbdriver = $this->conf_categories['database']['databasedriver'];
		$installmodel = SomeModelInstall::getModel($dbdriver);
		return $installmodel->isSomesessionInstalled();
	}
	
	public function getConfigurationHelp() {
		$array_help = array(
			''
		
		
		
		);
		return $array_help;
		
	}
	
	public function getErrors() {
		return $this->errors;
	}
	
	
}
