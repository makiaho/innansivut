<?php

someloader("some.application.model");
someloader("some.database.row");

class SomeModelCrud extends SomeModel {
    
    protected $id;
    
    protected $row;
    
    public function create() {
        

        $row = SomeRow::getRow('crud');
        // is null, no need to set $row->id = null;
        $blacklist = array('id','created');
        $whitelist = array_diff($row->getColumns(), $blacklist);
        foreach ($whitelist as $column) {
            $row->$column = SomeRequest::getString($column);
        }
        $row->created = date('Y-m-d');
        $this->id = $row->create();
        $this->row = $row;
    }
    
    public function update() {
        $row = SomeRow::getRow('crud');
        $id = SomeRequest::getInt('id');
        $row->id = $id;
        $columns = $row->getColumns();
        // blacklist could be configured somewhere
        $blacklist = array('id','created');
        $whitelist = array_diff($columns, $blacklist);
        foreach ($whitelist as $column) {
            $row->$column = SomeRequest::getString($column);
        }
        $row->update();
        $this->row = $row;
    }
    
    public function read() {
        $id = SomeRequest::getInt('id');
        $row = SomeRow::getRow('crud');
        $row->id = $id;
        $row->read();
        $this->row = $row;
    }
    
    public function askdelete() {
        $this->read();
    }
    
    public function delete() {
        $id = SomeRequest::getInt('id');
        $row = SomeRow::getRow('crud');
        $row->id = $id;
        $row->delete();
        $this->row = $row;
    }
    
    public function getRow() {
        return $this->row;
    }
    
    public function getId() {
        return $this->row->id;
    }
    
}
