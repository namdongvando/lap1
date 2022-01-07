<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Module\quanlysanpham\Model\SanPham;

/**
 * Description of FormSanPhamThuongHieu
 *
 * @author MSI
 */
use PFBC\Element;
use Model\FormRender;

class FormSanPhamInfor implements iFormSanPhamInfor {

    //put your code here

    static $properties = ["class" => "form-control"];
    static $ElementsName = "SanPhamInfor";

    public function __construct() {
        
    }

    public static function ThuongHieu($val = null) {
        $properties = self::$properties;
        $properties["value"] = $val;
        $name = self::$ElementsName . "[" . __FUNCTION__ . "]";
        $options = \Model\OptionsService::GetGroupsToSelect("ThuongHieu");
        return new FormRender(new Element\Select("Thương Hiệu", $name, $options, $properties));
    }

    public static function TinhTrang($val = null) {
        $properties = self::$properties;
        $properties["value"] = $val;
        $name = self::$ElementsName . "[" . __FUNCTION__ . "]";
        $options = \Model\OptionsService::GetGroupsToSelect("tinhtrangsp");
        return new FormRender(new Element\Select("Tình Trạng", $name, $options, $properties));
    }

    public static function Tag($val=null) {
        $properties = self::$properties;
        $properties["value"] = $val;
        $name = self::$ElementsName . "[" . __FUNCTION__ . "]";
        return new FormRender(new Element\Textbox("Tag", $name, $properties));
    }

}
