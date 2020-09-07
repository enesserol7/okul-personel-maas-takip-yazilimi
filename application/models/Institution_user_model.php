<?php
class Institution_user_model extends MY_Model{
	public function __construct(){
		parent::__construct();
		$this->tableName = "institution_users";
	}
}