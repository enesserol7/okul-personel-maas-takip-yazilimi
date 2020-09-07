<?php
class Personnel_exit_model extends MY_Model{
	public function __construct(){
		parent::__construct();
		$this->tableName = "personnel_exit_table";
	}
}