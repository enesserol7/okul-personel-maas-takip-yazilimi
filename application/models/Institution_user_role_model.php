<?php
class Institution_user_role_model extends MY_Model{
    public function __construct(){
        parent::__construct();
        $this->tableName = "institution_user_roles";
    }
}