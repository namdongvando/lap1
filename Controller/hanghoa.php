<?php
 

namespace Controller;
 
class hanghoa extends \Application implements IControllerBE{
    public function __construct() {
        
        self::$_Theme = "backend1";
    }
    
    function index() {
        echo 'Danh Sách HÀng Hóa';
    }

    public function delete() {
        
    }

    public function post() {
        
    }

    public function put() {
        
    }

}
