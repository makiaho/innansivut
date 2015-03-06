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
class SomeSessionStorageFile extends SomeSessionStorage
 {
	
	public static $sess_save_path;
	
	public function __construct($options = array()) {
		//TODO construct what ever is needed here.
		parent::__construct($options);
	}
	
	function open($save_path, $session_name)
	{

	  self::$sess_save_path = $save_path;
	  return(true);
	}

	function close()
	{
	  return(true);
	}

	function read($id)
	{
	
	  $sess_file = self::$sess_save_path."/sess_$id";
	  return (string) @file_get_contents($sess_file);
	}

	function write($id, $sess_data)
	{

	  $sess_file = self::$sess_save_path."/sess_$id";
	  if ($fp = @fopen($sess_file, "w")) {
	    $return = fwrite($fp, $sess_data);
	    fclose($fp);
	    return $return;
	  } else {
	    return(false);
	  }

	}

	function destroy($id)
	{
	  $sess_file = self::$sess_save_path."/sess_$id";
	  return(@unlink($sess_file));
	}

	function gc($maxlifetime)
	{

	  foreach (glob(self::$sess_save_path."/sess_*") as $filename) {
	    if (filemtime($filename) + $maxlifetime < time()) {
	      @unlink($filename);
	    }
	  }
	  return true;
	}

}
