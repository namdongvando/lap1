<?php

namespace Module\quanlysanpham\Controller;

use Module\quanlysanpham\Model\SanPham\FormSanPham;

class sanpham extends \Application implements \Controller\IControllerBE {

    public function __construct() {
        /**
         * kiem tra đăng nhap
         * @param {type} parameter
         */
        new \Controller\backend();
        self::$_Theme = "backend";
    }

    function index() {
        $this->View();
    }

    public function delete() {
        
    }

    public function post() {
        \Model\Permission::Check([\Model\User::Admin, "quanlysanpham_sanpham_post"]);
        try {
            if (\Model\Request::Post(FormSanPham::$ElementsName, null)) {
                $itemForm = \Model\Request::Post(FormSanPham::$ElementsName, null);
                $itemForm["Id"] = \Model\Common::uuid();
                $itemForm["Alias"] = \Model\Common::BoDauTienViet($itemForm["Name"]);
                $itemForm["Username"] = \Model\User::CurentUser()->Username;
                $SanPham = new \Module\quanlysanpham\Model\SanPham();
                $SanPham->Post($itemForm);
                \Model\Common::ToUrl("/index.php?module=quanlysanpham&controller=sanpham&action=put&id=" . $itemForm["Id"]);
            }
        } catch (\Exception $exc) {
            echo $exc->getMessage();
        }


        $this->View();
    }

    public function put() {
        \Model\Permission::Check([\Model\User::Admin, "quanlysanpham_sanpham_put"]);

        $id = \Model\Request::Get("id", null);
        $SanPham = new \Module\quanlysanpham\Model\SanPham();
        $item = $SanPham->GetById($id);

        $this->View(["item" => $item]);
    }

}
