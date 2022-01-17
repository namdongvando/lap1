<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Controller;

class ajaxhtml extends index {

    public function __construct() {
        parent::__construct();
        self::$_Layout = "ajax";
    }
    function index() {
        
        $this->View();
    }
    function shippingImg() {
        
        $this->View();
    }
    function footer() {
        
        $this->View();
    }
    
    function danhsachsanphamtheodanhmuc() {
        $id = $this->getParams(0);
        $this->View(["Item" => $id]);
    }
    function recommended() {
        $this->View();
    }

}
