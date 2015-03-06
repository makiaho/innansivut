<?php
/**
* @author Hannu Lohtander
* @package wo2009
* @subpackage library
*
*/

/**
* @author Hannu Lohtander
* @package wo2009
* @subpackage library
*
*/
class SomeSessionStorageMysql extends SomeSessionStorage {
	
	public $table = 'somesession';
	
	public function __construct($options = array()) {
		//TODO do things needed
		//$this->register($options);
		//or call parent
		parent::__construct($options);
	}
	
	function open($save_path, $session_name)
	{
		return true;
	}
	
	function close()
	{
		return true;
	}
	
	function read($key)
	{
		$qry = "SELECT * FROM {$this->table} WHERE sesskey = '$key'";
		$database = SomeFactory::getDBO();
		$st = $database->query($qry);
		$result = $st->fetch();
		if ($result) {
			return (string)stripslashes($result['value']);
		}else {
			return "";
		}
	}
	
	function write($key, $value)
	{
		
		
        $expiry = time() + 60*60*24;
        $value = addslashes($value);

        $qry = "SELECT 1 FROM {$this->table} WHERE sesskey = '$key'";
        
		$database = SomeFactory::getDBO();
		$st = $database->query($qry);

        if ($st->fetch()) {
                $qry = "UPDATE {$this->table} SET expiry = $expiry, value = '$value' WHERE sesskey = '$key'";
                
				$st = $database->query($qry);
				return $st->rowCount();
        } else {
                $qry = "INSERT INTO {$this->table} VALUES ('$key', $expiry, '$value')";
                $st = $database->query($qry);
				return $st->rowCount();
        }

	}
	
	function destroy($id)
	{
		$database = SomeFactory::getDBO();
        $qry = "DELETE FROM {$this->table} WHERE sesskey = '$id'";
        $st = $database->query($qry);
		return true;
	}
	
	function gc($lifetime = 1440)
	{
		// Get the database connection object and verify its connected.
		$database = SomeFactory::getDBO();
		

		// Determine the timestamp threshold with which to purge old sessions.
		$past = time() - $lifetime;

		// Remove expired sessions from the database.
		$database->query(
			'DELETE FROM somesession' .
			' WHERE `expiry` < '.(int) $past
		);
		return true;
	}


}

