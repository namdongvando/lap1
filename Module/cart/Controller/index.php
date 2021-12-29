<?php

namespace Module\cart\Controller;

class index extends \Application {

    public function __construct() {
        new \Controller\index();

        self::$_Layout = "cart";
        self::$_ViewTheme = true;
    }
    
    public function dathang() {
        
        $this->View();
    }
    public function index() {
        $this->View();
    }

    public function xoagiohang() {
        // thêm sản phẩm nào vào giỏ hàng
        $id = \Model\Request::Get("id", null);
        \Module\cart\Model\Cart::XoaGioHang();
        \Model\Common::ToUrl("/cart/index/index");
    }

    public function capnhatsl() {
        // thêm sản phẩm nào vào giỏ hàng
        $id = \Model\Request::Get("id", null);
        $sl = \Model\Request::Get("sl", 1);
        $sl = intval($sl);
        \Module\cart\Model\Cart::CapNhatSL($id,$sl);
        \Model\Common::ToUrl("/cart/index/index");
    }

    public function xoasanpham() {
        // thêm sản phẩm nào vào giỏ hàng
        $id = \Model\Request::Get("id", null);
        \Module\cart\Model\Cart::XoaSanPham($id);
        \Model\Common::ToUrl("/cart/index/index");
    }

    public function truslsanpham() {
        // thêm sản phẩm nào vào giỏ hàng
        $id = \Model\Request::Get("id", null);
        $sl = \Model\Request::Get("sl", null);
        if ($sl != null)
            $sl = intval($sl);
        $sl = min(1, $sl);
        \Module\cart\Model\Cart::TruSanPhamVaoGioHang($id, $sl);
        \Model\Common::ToUrl("/cart/index/index");
    }

    public function addtocart() {
        // thêm sản phẩm nào vào giỏ hàng
        $id = \Model\Request::Get("id", null);
        $sl = \Model\Request::Get("sl", null);
        $sp = new \Module\quanlysanpham\Model\SanPham();
        $item = $sp->GetById($id);
        // số lượng sản phẩm
        $item["Number"] = 1;
        if ($sl != null)
            $item["Number"] = intval($sl);

        \Module\cart\Model\Cart::ThemSanPhamVaoGioHang($item);
        \Model\Common::ToUrl("/cart/index/index");
    }

}
