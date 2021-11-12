<?php

namespace Controller;

class backend extends \Application {

    public function __construct() {

        $_SESSION[QuanLy] = isset($_SESSION[QuanLy]) ? $_SESSION[QuanLy] : null;
        /**
         * chưa đăng nhap
         * @param {type} parameter
         */
//        var_dump($_SESSION[QuanLy]);
        if ($_SESSION[QuanLy] == null) {
            /**
             * chuyển qua trang dăng nhap
             * @param {type} parameter
             */
            \Model\Common::ToUrl(LoginPage); 
            // 
        }
        self::$_Theme = "backend";
        
    }
    
    function index() {
//        echo "backend/index";
        $this->View();
    }
    function logout() { 
       
        $_SESSION[QuanLy] = null;
        \Model\Common::ToUrl(LoginPage);
    }

}
