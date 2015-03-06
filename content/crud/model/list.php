<?php

someloader("some.application.model");

class SomeModelList extends SomeModel {
    
    protected $rows;
    
    // list is reserved word and cannot be name of the method
    public function thelist() {
        someloader("some.database.row");
        
        
      $search = SomeRequest::getString ( 'search');
                  
      if ($search==NULL)
        {
        $row = SomeRow::getRow("crud");
        $table = $row->getTable();
        $primary = $row->getPrimary();
        $sql = "SELECT * FROM {$table} ORDER BY $primary";
	$database = SomeFactory::getDBO();
	$result = $database->query($sql);
	$this->rows = $result->fetchAll(PDO::FETCH_ASSOC);
        }
        else
        {
            
         
        $row = SomeRow::getRow("crud");
        $table = $row->getTable();
        $primary = $row->getPrimary();
        $sql = "SELECT * FROM {$table}";
        $sql.= " WHERE STORY LIKE  '%".$search."%'";
         $sql.=" ORDER BY $primary";
        
	$database = SomeFactory::getDBO();
	$result = $database->query($sql);
	$this->rows = $result->fetchAll(PDO::FETCH_ASSOC);
            
            
            
            
            
            
        }
    }
    
    public function getRows() {
        return $this->rows;
    }
    
}
