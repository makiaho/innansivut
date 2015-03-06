<?php 
/**
* <p>This class is not used directly! Instead create instance using SomeFactory!</p>
* <code>$database = SomeFactory::getInstance();</code>
* <p>This is instance of PDO class, so use it like http://www.php.net/PDO</p>
* @package wo2009
* @subpackage library
*/
SomeLoader::import('library.some.database.idatabase', SOME_PATH.DS.'interface',null);
/**
* @package wo2009
* @subpackage library
*/
class SomeDatabase extends PDO implements ISomeDatabase {

	public function __construct(array $options) {
		$dns = $options['dns'];
		$username = $options['dbuser'];
        $password = $options['dbpass'];
		if ($username|| $password) {
            if ($username && $password)
			parent::__construct($dns,$username,$password);
			else
			parent::__construct($dns,$username);
        } else {
			parent::__construct($dns);
		}
	}

    public static function getInstance(array $options) {
		static $instance;
        //options has driver, host, databasename
        if (!isset($options['driver'])) {
            //
            throw new Exception('No driver selected for database');
        }
        $driver = $options['driver'];
        if (!$instance) {
            
            $classname = 'SomeDatabase'.ucfirst($driver);
			if (!class_exists($classname,false)) {
				$driverfile = dirname(__FILE__).DS.'driver'.DS.$driver.'.php';
				if (!file_exists($driverfile)) {
					throw new SomeFrameworkException('can not find database driver ' . $driver);
				}
				
				include($driverfile);
				
				if (!class_exists($classname,false)) {
					throw new SomeFrameworkException('can not find database class ' . $classname);
				}
				
				$instance = new $classname($options);
				
				if (!$instance) {
					throw new SomeFrameworkException("Check you configuration.xml on database values!");
				}
				//make query to make sure we have connection. Else throw exception.
				try {
					$st = $instance->query('SELECT NOW() as one');
					$result = $st->fetch();
				} catch (Exception $e) {
					; //do nothing, this is test
				}
				
				if (!$result) {
					throw new Exception("Check you configuration.xml on database values!");
				}
			}
        }
        return $instance;
        
        
    }

}

