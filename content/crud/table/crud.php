<?php

someloader('some.database.row');

class SomeRowCrud extends SomeRow {


    public $columns = array(
  'new',
   'created',
'id',
 'story',
  'year'
);

public $new;
public $created;
public $id;
public $story;
public $year;
public $primary='id';
public $table='crud';
public function __construct() {
parent::__construct();
}


    public function getColumns() {

        return $this->columns;
    }

    public function getPrimary() {

        //echo('getPrimary() ');
return $this->primary;

    }


    public function getTable() {

//echo('getTable() ');
            return $this->table;
}



}


