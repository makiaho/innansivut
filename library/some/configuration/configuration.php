<?php
/**
* SomeConfiguration serves as wrapper class aroung configuration.xml.
*
* <p>It would be difficult to every time use complex xml apis to get values from Configuration.
* That is why this class provides easy api to configuration data.
* Class is used through SomeFactory.
* </p>
* <p>
* Usage example, get database settings.
* <code>
* $conf = SomeFactory::getConfiguration();
* $database_host = $conf->get('databasehost','database');
* $database_name = $conf->get('database','database');
* $database_dbuser = $conf->get('dbuser','database');
* $database_dbpass = $conf->get('dbpass','database');
* </code>
* </p>
*
* @author Hannu Lohtander
* @package wo2009
* @subpackage library
*
*/
SomeLoader::import('library.some.configuration.iconfiguration', SOME_PATH.DS.'interface',null);
/**
* SomeConfiguration serves as wrapper class aroung configuration.php.
*
* <p>It would be difficult to every time use xml apis to get values from Configuration.
* That is why this class provides easy api to configuration data.
* Class is used through SomeFactory.
* </p>
* <p>
* Usage example, get database settings.
* <code>
* $conf = SomeFactory::getConfiguration();
* $database_host = $conf->get('databasehost','database');
* $database_name = $conf->get('database','database');
* $database_dbuser = $conf->get('dbuser','database');
* $database_dbpass = $conf->get('dbpass','database');
* </code>
* </p>
*
* @author Hannu Lohtander
* @package wo2009
* @subpackage library
*
*/
class SomeConfiguration implements ISomeConfiguration {
	
	private $configuration = array();

	protected function __construct() {
	
	}
	
	public static function getInstance($file) {
		static $instance;
		if (!$instance) {
			$instance = new self;
			$instance->load($file);
		}
		return $instance;
	}
	
	public function load($file) {
		//configuration
		if (!file_exists($file)) {
			throw new SomeFrameworkException('
			Can not find configuration file ' . $file
			. '
			Rename form the root folder the file configuration.mysql.php OR configuration.postgre.php as configuration.php'
			);
		}
		include $file;
		$this->configuration = $configuration;
	}
	
	public function save($file) {
		throw new Exception('Not implemented');
	}
	
	public function get($key,$group) {
            if (isset($this->configuration[$group][$key])) {
                return $this->configuration[$group][$key];
            }
            return null;
	}
	
	public function set($key,$group,$value) {
        $this->configuration[$group][$key] = $value;
	}
	
	public function getAsArray() {
	    return $this->configuration;
	}

}
