<?php
class User_role_model extends MY_Model{
    public function __construct(){
        parent::__construct();
        $this->tableName = "system_user_roles";
    }
}