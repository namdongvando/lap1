<?php

namespace Module\cart\Controller;

class donhang extends \Application {

    public function __construct() {
        new \Controller\backend();
    }

    public function index() {
        $donhang = new \Module\cart\Model\DonHang();
        $param["keyword"] = isset($_REQUEST["name"]) ? $_REQUEST["name"] : '';
        $indexPage = isset($_REQUEST["indexPage"]) ? $_REQUEST["indexPage"] : 1;
        $pageNumber = isset($_REQUEST["pageNumber"]) ? $_REQUEST["pageNumber"] : 10;
        $total = 0;
        $items = $donhang->GetItems($param, $indexPage, $pageNumber, $total);
        $data["params"] = $param;
        $data["Items"] = $items;
        $data["indexPage"] = $indexPage;
        $data["pageNumber"] = $pageNumber;
        $data["total"] = $total;

        $this->View($data);
    }

    public function detail() {
        if (\Model\Request::Post("GhiChu", null)) {
            $btn = [
                "btnDangGiao" => 1,
                "btnDaGiao" => 2,
                "btnHuy" => -1,
                "btnThanhCong" => 3,
            ];
            $btn = \Model\Request::Post("btn", null);
            $Id = \Model\Request::Post("Id", null);
            $GhiChu = \Model\Request::Post("GhiChu", null);
            $DonHang = new \Module\cart\Model\DonHang();
            $item = $DonHang->GetById($Id);
            $item["TinhTrang"] = $btn; 
            $DonHang->Put($item);
            $DonHangLog = new \Module\cart\Model\DonHangLog();
            $model["Name"] = $GhiChu;
            $model["TinhTrang"] = $btn;
            $model["NgayTao"] = \Model\Common::DateInput();
            $DonHangLog->Post($model); 
        }


        $this->View(["item" => $this->getParams(0)]);
    }

}
