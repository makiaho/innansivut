<?php
/**
* @package wo2009
* @subpackage library
*/

//if this interface is not imported, them must remove implements from class declaration
SomeLoader::import('library.some.ifactory', SOME_PATH.DS.'interface'.DS,null);

/**
* @package wo2009
* @subpackage library
*/

class SomeFactory implements ISomeFactory {
	
	/**
	* @return SomeSession instance
	*/
	public static function getSession() {
		someloader('some.session.session');
		$conf = SomeFactory::getConfiguration();
		$session_handler = $conf->get('session_handler','session');
		//only on postgres
		if ($session_handler !== 'file'  && $conf->get('databasedriver','database') === 'pdopostgres') {
			try {
				$database = SomeFactory::getDBO();
				if (!$database) {
					$session_handler = 'file';
				} else {
					$session_table = $conf->get('session_table','session');
					$sql = 
			"select * from information_schema.tables where table_schema='public' ".
			"and table_type='BASE TABLE' AND table_name='$session_table'";
					$st = $database->query($sql);
				if (!$st->fetch()) {
					var_dump($database->errorInfo());
					echo "THERE IS NOT SESSION TABLE somesession WILL USE FILE AS SESSION STORAGE. Change configuration.xml";
					$session_handler = 'file';
				}
				}
			} catch (Exception $e) {
				$session_handler = 'file';
			}
			//echo $session_handler;
		}
		
		return SomeSession::getInstance($session_handler);
	}
	
	/**
	* @param string $file full path to configuration file
	* @return ISomeConfiguration object
	*/
	public static function getConfiguration($file=null) {
		if ($file==null) {
			$file = SOME_PATH.DS.'configuration.php';
		}
		someloader('some.configuration.configuration');
		return SomeConfiguration::getInstance($file);
	}
	
	/**
	* SomeApplication is the Front Controller of our framework.
	* @return SomeApplication instance.
	*/
	
	public static function getApplication() {
		someloader('some.application.application');
		if (!class_exists('SomeApplication')) {
			throw new SomeException('Can not create instance from non-existing class SomeApplication.');
		}
		return SomeApplication::getInstance();
	}
	
	public static function getDBO() {
		//get configuration, database specific values and call SomeDatabase::getInstance(array(...fill with driver, host, databasname,etc))
		$conf = SomeFactory::getConfiguration();
                $databaseIsUser = $conf->get('isused','database');
		if (!$databaseIsUser) {
                    return null;
                }
                $driver = $conf->get('databasedriver','database');
		$host = $conf->get('databasehost','database');
		$database = $conf->get('database','database');
		$dbuser = $conf->get('dbuser','database');
		$dbpass = $conf->get('dbpass','database');
		someloader('some.database.database');
		return SomeDatabase::getInstance(
			array(
				'driver' => $driver,
				'database' => $database,
				'host' => $host,
				'dbuser' => $dbuser,
				'dbpass' => $dbpass
			)
		);
	}
	
	public static function getUser() {
		//if the user is in session, get from there, else create empty user. and put that to session.
		$session = SomeFactory::getSession();
		$user = $session->get('someuser',null);
		if (!$user) {
			$user = new SomeUser();
			$session->set('someuser',$user);
		}
		return $user;
	}
	
	public static function getLanguage($lang = null) {
		static $instance;

		if (!is_object($instance))
		{
			someloader('some.language.language');
			$conf = SomeFactory::getConfiguration();
			$language = $lang ? $lang : $conf->get('language','common');
			//echo "new SomeLanguage($language)<br />\n";
			$instance	= new SomeLanguage($language);
			
		}

		return $instance;
	}
	
	public static function getDocument() {
		someloader('some.document.documenthtml');
		if (!class_exists('SomeDocumentHTML')) {
			throw new SomeFrameworkException('Can not create instance from non-existing class SomeDocumentHTML.');
		}
		return SomeDocumentHTML::getInstance();
	}

}
