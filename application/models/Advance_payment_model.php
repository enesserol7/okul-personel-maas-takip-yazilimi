<?php
class Advance_payment_model extends MY_Model{
	public function __construct(){
		parent::__construct();
		$this->tableName = "advance_payment";
	}
}