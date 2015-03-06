<?php
/**
* SomeConfiguration serves as wrapper class aroung configuration.xml.
*
* @author Hannu Lohtander
* @package wo2009
* @subpackage library
*/

/**
* SomeConfiguration serves as wrapper class aroung configuration.xml.
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
interface ISomeConfiguration {
    
	/**
	 * singleton to get instance.
	 * @param string $file fullpath to file that has conf. Usually SOME_PATH.DS.'configuration.xml'.
	 * @return ISomeConfiguration 
	 */
	public static function getInstance($file);
	
/**
 * Method to load configuration. Usually called from constructor.
 * @param string $file fullpath to file that has conf. Usually SOME_PATH.DS.'configuration.xml'.
 * @return boolean true if file was found 
 */
	
	public function load($file);
	/**
	 * Method to save configuration to file.
	 * @param string $file full path to file
	 * @return void
	 */
	public function save($file);
	/**
	 * Fetch single configuration value.
	 * @param string $key the key inside configuration group.
	 * @param string $group name of the group of the key.
	 * @return string value of the configuration or boolean false if nto found
	 */
	 
	public function get($key,$group);
	/**
	 * Method to add new configuration value or replace existing one. 
	 * @param $key name if the key inside conf group
	 * @param $groups name of the group. Default is common.
	 * @param string $value value of the setting
	 * @return boolean false if fails, string old value if value is replaved
	 */
	 
	public function set($key,$group,$value);

}
