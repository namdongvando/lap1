<?php
namespace Module\giaodien\Controller;

class slider extends \Application implements \Controller\IControllerBE {

    public function __construct() {
        new \Controller\backend();
        self::$_Theme = "backend";
    }

    public function index() {
        
        
        $this->View();
    }
    public function delete() {
        
    }


    public function post() {
        
    }

    public function put() {
        
    }

}
