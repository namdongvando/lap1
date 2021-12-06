<?php

namespace Module\quanlysanpham\Controller;

class api extends \Application {

    //put your code here

    public function __construct() {
        new \Controller\backend();
        header('Content-type: application/json; charset=utf-8');
    }

    function index() {
        echo json_encode($_REQUEST, JSON_UNESCAPED_UNICODE);
    }

    function DanhSachLoaiThuocTinhSanPham() {
        $SPThuocTinh = new \Module\quanlysanpham\Model\SanPhamLoaiThuocTinh();
        $total = 0;
        $items = $SPThuocTinh->GetItems("", 1, 100, $total);
        echo \Model\Response::ToJson($items);
    }

    function dsthuoctinhchitiet() {
        \Model\Response::ToJson($_POST["loaithuocTinh"]);
        $loaithuocTinh = $_POST["loaithuocTinh"];
        $spth = new \Module\quanlysanpham\Model\SanPhamThuocTinhChiTiet();
        $items = $spth->GetItemsByType($loaithuocTinh);
        foreach ($items as $k => $v) {
            $SPThuocTinh = new \Module\quanlysanpham\Model\SanPhamThuocTinh($v["IdThuocTinh"]);
            $items[$k]['ThuocTinh'] = $SPThuocTinh->ToAray();
        }
        echo \Model\Response::ToJson($items);
    }

    function XoaThuocTinhChiTiet() {
        $id = $_REQUEST["id"];
        $spth = new \Module\quanlysanpham\Model\SanPhamThuocTinhChiTiet();
        $spth->Delete($id);
    }

    function themthuoctinhchitiet() {
        $model["Id"] = \Model\Common::uuid();
        $model["IdThuocTinh"] = $_POST["LoaiThuocTinh"];
        $model["Name"] = $_POST["TenThuocTinh"];
        $spth = new \Module\quanlysanpham\Model\SanPhamThuocTinhChiTiet();
        $spth->Post($model);
        echo \Model\Response::ToJson($model);
    }

    function themthuoctinh() {
        $idThuocTinh = $_REQUEST["id"];
        $idSanPham = $_REQUEST["idSanPham"];
        $SPThuocTinh = new \Module\quanlysanpham\Model\SanPhamThuocTinh();
        $model["Id"] = \Model\Common::uuid();
        $model["OptionsTypeId"] = $idThuocTinh;
        $model["IdSanPham"] = $idSanPham;
        $model["GhiChu"] = "";
        $SPThuocTinh->Post($model);
        \Model\Response::ToJson(["status" => "OK"]);
    }

    function xoathuoctinh() {
        $idSanPham = $_REQUEST["id"];
        $SPThuocTinh = new \Module\quanlysanpham\Model\SanPhamThuocTinh();
        $SPThuocTinh->DeleteById($idSanPham);
        echo \Model\Response::ToJson(["status" => "OK"]);
    }

    function DanhSachThuocTinhTheoSanPham() {
        // mã sản phẩm

        $idSanPham = $_REQUEST["id"];
        $SPThuocTinh = new \Module\quanlysanpham\Model\SanPhamThuocTinh();
        $items = $SPThuocTinh->GetItemsByIdSanPham($idSanPham);

        foreach ($items as $k => $item) {
            $SanPhamLoaiThuocTinh = new \Module\quanlysanpham\Model\SanPhamLoaiThuocTinh();
            $items[$k]["LoaiThuocTinh"] = $SanPhamLoaiThuocTinh->GetById($item["OptionsTypeId"]);
        }
        echo \Model\Response::ToJson($items);
    }

}
