<?php

namespace Controller;

/**
 * Description of locations
 *
 * @author MSI
 */
class locations extends \Application implements IControllerBE {

    //put your code here
    public function __construct() {
        new backend();
        self::$_Theme = "backend";
    }

    public function delete() {
        
    }

    public function index() {
        $this->View();
    }

    public function post() {
          $this->View();
    }

    public function put() {
        
    }

}
