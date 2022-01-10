<?php

namespace Controller;

class index extends \Application {

    public function __construct() {
        self::$_Theme = "eshopper";
    }

    function index() {
        $this->View();
    }

    function pages() {
        $alias = \Model\Request::Get("param", "");
        $pages = new \Module\baiviet\Model\Pages\PagesService();
        $item = $pages->GetByAlias($alias);
        if ($item == null) {
            \Model\Common::ToUrl("/index/loi404");
        }
        $this->View(["Item" => $item]);
    }

    function timkiem() {
        $keyword = \Model\Request::Reqest("keyword", "");
        $giaTu = \Model\Request::Reqest("giatu", null);
        $giaDen = \Model\Request::Reqest("giaden", null);
        $keyword = \Model\Common::TextInput($keyword);
        $indexPage = \Model\Request::Reqest("indexPage", 1);
        $indexPage = intval($indexPage);
        $indexPage = max(1, $indexPage);
        $pageNumber = \Model\Request::Reqest("pageNumber", 12);
        $pageNumber = intval($pageNumber);
        $pageNumber = max(1, $pageNumber);
        $sanPham = new \Module\quanlysanpham\Model\SanPham();
        $params["keyword"] = $keyword;
        $params["giatu"] = $giaTu;
        $params["giaden"] = $giaDen;
        $params["isShow"] = 1;
        $total = 0;
        //  \Model\DB::$Debug = true;
        $items = $sanPham->GetItems($params, $indexPage, $pageNumber, $total);
        $data["Items"] = $items;
        $data["indexPage"] = $indexPage;
        $data["pageNumber"] = $pageNumber;
        $data["total"] = $total;
        $data["params"] = $params;
        $this->View($data);
    }

    function loi404() {
        $this->View();
    }

    function productdetail() {
        $alias = \Model\Request::Get("param", null);

        $this->View(["Item" => $alias]);
    }

    function danhmuc() {
        $pathDanhMuc = \Model\Request::Get("param", null);
        $DM = new \Module\quanlysanpham\Model\DanhMuc($pathDanhMuc);
        $indexPage = \Model\Request::Reqest("indexPage", 1);
        $indexPage = intval($indexPage);
        $indexPage = max(1, $indexPage);
        $pageNumber = \Model\Request::Reqest("pageNumber", 12);
        $pageNumber = intval($pageNumber);
        $pageNumber = max(1, $pageNumber);
        $sanPham = new \Module\quanlysanpham\Model\SanPham();
        $total = 0;
        $params["danhmuc"] = $DM->Id;
        $items = $sanPham->GetItems($params, $indexPage, $pageNumber, $total);
         $data["Items"] = $items;
        $data["indexPage"] = $indexPage;
        $data["pageNumber"] = $pageNumber;
        $data["total"] = $total;
        $data["params"] = $params;
        $data["DanhMuc"] = $DM;
        $this->View($data);
    }
    function thuonghieu() {
        $thuonghieu = \Model\Request::Get("param", null);
        
        $indexPage = \Model\Request::Reqest("indexPage", 1);
        $indexPage = intval($indexPage);
        $indexPage = max(1, $indexPage);
        $pageNumber = \Model\Request::Reqest("pageNumber", 12);
        $pageNumber = intval($pageNumber);
        $pageNumber = max(1, $pageNumber);
        $sanPham = new \Module\quanlysanpham\Model\SanPham\SanPhamInfor();
        $total = 0;
        $params["val"] = $thuonghieu;
        $params["keyword"] = "ThuongHieu";
        $items = $sanPham->GetByKeywordVal($params, $indexPage, $pageNumber, $total);
         $data["Items"] = $items;
        $data["indexPage"] = $indexPage;
        $data["pageNumber"] = $pageNumber;
        $data["total"] = $total;
        $data["params"] = $params; 
        $this->View($data);
    }

}
