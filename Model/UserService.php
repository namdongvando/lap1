<?php

namespace Model;

class UserService extends DB implements IModelService {

    public function __construct() {
        self::$TableName = prefixTable . "users";
        parent::__construct();
    }

    public function Delete($Id) {
        
    }

    public function GetItems($params, $indexPage, $pageNumber, &$total) {
        $keyword = $params["keyword"];
        $where = " `Name` like '%$keyword%' or `Username` like '%$keyword%' or `Email` like '%$keyword%' ";
        return $this->SelectPT($where, $indexPage, $pageNumber, $total);
    }

    public function Post($model) {
        return $this->Insert($model);
    }

    public function Put($model) {
        $where = "`Id` = '{$model["Id"]}'";
        return $this->Update($model, $where);
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

    /**
     * // tạo mật khâu mã hóa
     * @param {type} parameter
     */
    static public function CreatePassword($password, $keypassword) {
        $password = $keypassword . $password . $keypassword;
        return sha1($password);
    }

    public function GetByUsername($username) {
        $where = "`Username` = '{$username}'";
        return $this->SelectRow($where);
    }

    public function GetByEmail($email) {
        $where = "`Email` = '{$email}'";
        return $this->SelectRow($where);
    }

}
