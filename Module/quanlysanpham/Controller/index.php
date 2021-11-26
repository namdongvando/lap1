<?php

namespace Module\quanlysanpham\Controller;

class index extends \Application implements \Controller\IControllerBE {

    public function __construct() {
        new \Controller\backend();
        self::$_Theme = "backend";
    }

    function index() {
        $this->View();
    }

    public function delete() {
        
    }

    public function post() {
        $this->View();
    }

    public function put() {
        $this->View();
    }

}
