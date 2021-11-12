<?php

namespace Controller;

class index {

    public function __construct() {
        
    }

    function index() {
        echo "index/index";
        $userService = new \Model\UserService();
        $user = $userService->GetUserByUsernamPassword("admin", "123456");
         
    }

    function loi404() {
        echo "lỗi 404";
    }

}
