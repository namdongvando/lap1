<?php

namespace Controller;

use Model\TinTuc;

class quanlytin extends \Application implements IControllerBE {

    public function __construct() {
        
        self::$_Theme = "backend";
    }

    function index() {
        
        $this->View();
    }

    public function delete() {
        $this->View();
    }

    public function post() {
        $this->View();
    }

    public function put() {
        $this->View();
    }

}
