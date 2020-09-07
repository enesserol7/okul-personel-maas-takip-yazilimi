<?php
class Institution_model extends MY_Model{
	public function __construct(){
		parent::__construct();
		$this->tableName = "institutions";
	}
}