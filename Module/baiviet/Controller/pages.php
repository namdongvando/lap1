<?php

namespace Module\baiviet\Controller;

use Module\baiviet\Model\Pages\PagesService;

class pages extends \Application implements \Controller\IControllerBE, \Controller\IControllerMoveToTrash {

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
        $pages = new PagesService();
        $param["keyword"] = isset($_REQUEST["name"]) ? $_REQUEST["name"] : '';
        $indexPage = isset($_REQUEST["indexPage"]) ? $_REQUEST["indexPage"] : 1;
        $pageNumber = isset($_REQUEST["pageNumber"]) ? $_REQUEST["pageNumber"] : 10;
        $total = 0;
        $items = $pages->GetItems($param, $indexPage, $pageNumber, $total);
        $data["params"] = $param;
        $data["items"] = $items;
        $data["indexPage"] = $indexPage;
        $data["pageNumber"] = $pageNumber;
        $data["total"] = $total;
        $this->View($data);
    }

    public function post() {


        $this->View();
    }

    public function put() {

        $this->View();
    }

    public function movetotrash() {
        
    }

}
