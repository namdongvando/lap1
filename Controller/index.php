<?php

namespace Controller;

class index {

    public function __construct() {
        
    }

    function index() {
        echo "index/index"; 
        $db = new \Model\DB();
        $res = $db->query('SELECT * FROM `lap1_users` WHERE `Password` = SHA1(CONCAT(`KeyPassword`,CONCAT("123456",`KeyPassword`)))');
        if ($res) {
            $user = $res->fetch_assoc();
            var_dump($user);
        } 
    }

    function loi404() {
        echo "lỗi 404";
    }

}
