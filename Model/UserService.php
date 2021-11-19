<?php

namespace Model;

class UserService extends DB implements IModelService {

    public function __construct() {
        self::$TableName = prefixTable . "users";
        parent::__construct();
    }

    public function Delete($Id) {
        
    }

    public function GetItems($where, $indexPage, $pageNumber, &$total) {
        
    }

    public function Post($model) {
        
    }

    public function Put($model) {
        
    }

    public function GetUserByUsernamPassword($userName, $password) {
        $where = "`Username` = '{$userName}' and `Password` = SHA1(CONCAT(`KeyPassword`,CONCAT('{$password}',`KeyPassword`)))";
        return $this->SelectRow($where);
    }

    public function GetById($Id) {
        $where = "`Id` = '{$Id}'";
        return $this->SelectRow($where);
    }
    
    public function CreateToken() { 
        return sha1(time());     
    }
    
}
