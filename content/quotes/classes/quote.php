<?php


class Quote{

	protected $id;
	protected $thequote;
	protected $bywhom;
	protected $whenyear;
	
	public function __construct() {
	
	}
	
	public function bind(array $data) {
		$this->id       = isset($data['id'])       ? $data['id']       : null;
		$this->thequote = isset($data['thequote']) ? $safehtml = SomeRequest::getString("thequote","","post",JREQUEST_ALLOWHTML) : null;
		$this->bywhom   = isset($data['bywhom'])   ? $data['bywhom']   : null;
		$this->whenyear = isset($data['whenyear']) ? $data['whenyear'] : null;
		return true;
	}
	
	public function __set($key, $value) {
		// @TODO need to check if key is really a class member
		$this->$key = $value;
	}
	
	public function setId($id) {
		$this->id = $id;
	}
	
	public function getId() {
		return $this->id;
	}
	
	public function setThequote($thequote) {
		$this->thequote = $thequote;
	}
	
	public function getThequote() {
		return $this->thequote;
	}
	
	public function setBywhom($bywhom) {
		$this->bywhom = $bywhom;
	}
	
	public function getBywhom() {
		return $this->bywhom;
	}
	
	public function setWhenyear($whenyear) {
		$this->whenyear = $whenyear;
	}
	
	public function getWhenyear() {
		return $this->whenyear;
	}
	
	public function insert() {
		if (!empty($this->id)) {
			$this->update();
		} else {
			$this->create();
		}
	}
	
	public function create() {
		someloader('some.database.row');
		$row = SomeRow::getRow('quotes');
		
		$row->bywhom = $this->getBywhom();
		$row->thequote = $this->getThequote();
		$row->whenyear = $this->getWhenyear();
		$row->id = null;
		
		$id = $row->create();
		$this->setId($id);
		return $id;
	}
	
	public function read() {
		someloader('some.database.row');
		$row = SomeRow::getRow('quotes');
		$row->setPrimary($this->getId());
		$success = $row->read();
		$this->bind((array)$row);
		return true;
	}
	
	public function update() {
		someloader('some.database.row');
		$row = SomeRow::getRow('quotes');
		$row->bywhom = $this->getBywhom();
		$row->thequote = $this->getThequote();
		$row->whenyear = $this->getWhenyear();
		$row->id = $this->getId();
		$row->update();
		return true;
	}
	
	public function delete() {
		someloader('some.database.row');
		$row = SomeRow::getRow('quotes');
		$row->setPrimary($this->getId());
		$row->delete();
		return true;
	}
	
}