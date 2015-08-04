<?php
/**
* @package wo2009
* @subpackage library
*/
SomeLoader::import('library.some.database.irow', SOME_PATH.DS.'interface',null);
/**
* SomeRow is factory class to create specialized SomeRow___ objects.
*
* <p>SomeRow povides getRow factory method. It gets arguments that is the suffix of the class extending SomeRow.
* Extending class must be on subfolder rows/ in a file named exactly as class prefix. Example:
* <code>
* get class SomeRowDemo from file rows/demo.php
* This is NOT singleton
* SomeRow::getRow('demo');
*
* </code>
* </p>
* <p>Extendng class MUST implement getTable(), getPrimary() and getColumns methods. See methods for explanation.</p>
*
* @package wo2009
* @subpackage library
*/
class SomeRow implements ISomeRow {
	
	public $sql;
	public $columnsdebug;
	
	protected function __construct() {}
	
	public static function getRow($table) { 
            $classname = 'SomeRow'.ucfirst($table);
            if (!class_exists($classname)) {
                $contentPath = PATH_CONTENT . DS. "table" . DS.$table.'.php';
                $libraryPath = dirname(__FILE__).DS.'rows'.DS.$table.'.php';
                if (file_exists($contentPath)) {
                    require($contentPath);
                } else {
                    require($libraryPath);
                }
                
            }
            return new $classname;
	}
	
	
	public function getTable() {
            throw new Exception('extending class must implement');
	}
	
	public function getPrimary() {
            throw new Exception('extending class must implement');
	}
	
	public function setPrimary($value) {
		$key = $this->getPrimary();
		$this->$key = $value;
	}
	
	public function getColumns() {
	   throw new Exception('extending class must implement');
	}
	   
	/**
	* insert row.
	*
	* @return string last insert id, if row was created or null on failure.
	*/
	public function create() {
		//get the fields. unset primary key
		
		$columnstmp = $this->getColumns();
		foreach ($columnstmp as $colname) {
			$columns[$colname] = $this->$colname;
		}
		$key = $this->getPrimary();
		$table = $this->getTable();
		$qmarks = array_fill( 0  , count($columns)-1, '?');
		array_shift($columns); //get the primary key away, it is first column
		$sql = "INSERT INTO $table (".join(',',array_keys($columns)).") VALUES(".join(',',$qmarks).")";
		$columns = array_values($columns); //values must be integer indexed array
		$database = SomeFactory::getDBO();
        $statement = $database->prepare($sql);
		$this->sql = $sql;
        $success = $statement->execute(
          $columns
        );
		ob_start();
		print_r($columns);
		#$this->columnsdebug = ob_get_clean();
		
        $id = $database->lastInsertId("{$table}_id_seq");
        
        //TODODEBUG. tarkempi virhe täältä?
    
        //debug 	  
	   if (!$id) {
			$dberrs = $database->errorInfo();
                        var_dump($this->sql,$columns, $id,$dberrs); 
			var_dump($dberrs); 
			throw new SomeDatabaseException( $dberrs[2]);
		}
		$this->$key = $id;
        //debug
        return $id;
	}
	
	/**
	* select row.
	*
	* @return boolean if row was found and loaded form database
	*/
	public function read() {
		$key = $this->getPrimary();
		$sql = "SELECT * FROM ".$this->getTable(). " WHERE $key=?";
		$database = SomeFactory::getDBO();
		$statement = $database->prepare($sql);
		
		$statement->execute(
		  array(
		      $this->$key		      
		  )
		);
		$this->sql = $sql;
		
		//result as assoc array
		$row = $statement->fetch();
		if (is_array($row)) {
			foreach ($row as $k => $v) {
				$this->$k = $v;
			}
		}
		return is_array($row);
	}
	/**
	* update row.
	*
	* @return boolean
	*/
	public function update() {
		//get the fields. unset primary key
	    $columnstmp = $this->getColumns();
        foreach ($columnstmp as $colname) {
            $columns[$colname] = $this->$colname;
        }
        $key = $this->getPrimary();
        $table = $this->getTable();

        $sql = "UPDATE $table SET ";
        array_shift($columns); //get the primary key away, it is first column
        
        $sets =array();
        foreach (array_keys($columns) as $k) {
        	$sets[] = "$k=?";
        	$values[] = $this->$k;
        }
        $sql .= join(",",$sets);
        $sql .= " WHERE $key=?";
        $values[] = $this->$key;
        
        $database = SomeFactory::getDBO();
        $statement = $database->prepare($sql);
        //echo "$sql<br />";
		$this->sql = $sql;
        //print_r($values);
        return $statement->execute(
          $values
        );
        
	}
	/**
	* delete row.
	*
	* @return boolean
	*/
	public function delete() {
	    $sql = "DELETE FROM ".$this->getTable(). " WHERE ".$this->getPrimary(). '=?';
        $database = SomeFactory::getDBO();
        $statement = $database->prepare($sql);
        $key = $this->getPrimary();
        return $statement->execute(
          array(
              $this->$key    
          )
        );
		$this->sql = $sql;
		return true;
	}
	/**
	* check that data is valid. should becalled from update and create.
	*
	* @return boolean
	*/
	public function check() {
		return true;
	}
	
}
