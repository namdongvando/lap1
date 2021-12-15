<?php

namespace Module\baiviet\Controller;

class duan extends \Application implements \Controller\IControllerBE, \Controller\IControllerMoveToTrash {

    //put your code here
    public function __construct() {
        /**
         * kiem tra đăng nhap
         * @param {type} parameter
         */
        new \Controller\backend();
        self::$_Theme = "backend";
    }

    public function delete() {
        
    }

    public function index() {
        $this->View();
    }

    public function post() {
        
    }

    public function put() {
        
    }

    public function movetotrash() {
        
    }

}
