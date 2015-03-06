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
class SomeSessionStorageDatabase extends SomeSessionStorage {
	
	public $table = 'somesession';
	public $row = null;
	
	public function __construct($options = array()) {
		//TODO do things needed
		//$this->register($options);
		//or call parent
		parent::__construct($options);
	}
	
	function open($save_path, $session_name)
	{
		//echo "open($save_path, $session_name)<br />";
		someloader('some.database.row');
		$this->row = SomeRow::getRow('session');
		return true;
	}
	
	function close()
	{
		return true;
	}
	
	function read($key)
	{
		//echo "read($key)<br />";
		
		$this->row->setPrimary($key);
		/**
		$qry = "SELECT * FROM {$this->table} WHERE sesskey = ?";
		$database = SomeFactory::getDBO();
		$statement = $database->prepare($qry);
		$result = $statement->execute(
			array(
			$key
			)
		);
		*/
		//$result = $st->fetch();
		if ($this->row->read()) {
			$value = $this->row->value;
			return (string)stripslashes($value);
		}else {
			
			return "";
		}
	}
	
	function write($key, $value)
	{
        //echo "write($key, $value)<br />";
        $expiry = time() + 60*60*24;
        $value = addslashes($value);
        $this->row->value = $value;
		$this->row->expiry = $expiry;
		return $this->row->create();
		
	}
	
	function destroy($id)
	{
		$this->row->sesskey = $id;
		$this->row->delete();
		
		return true;
	}
	
	function gc($maxlifetime)
	{
		//TODO
		return true;
	}


}
