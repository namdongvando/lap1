<?php

namespace Model\Users;

use PFBC\Element;
use Model\FormRender;

class FormUser implements IFormUsers {

    static $properties = ["class" => "form-control"];
    static $ElementsName = "Users";

    public function __construct() {
        
    }

    //put your code here
    public static function Active($val = null) {
        $properties = self::$properties;
        $properties["value"] = $val;
        $options = [1 => "Kích Hoạt", 0 => "Khóa"];
        $name = self::$ElementsName . "[" . __FUNCTION__ . "]";

        return new FormRender(new Element\Select(__FUNCTION__, $name, $options, $properties));
    }

    public static function BOD($val = null) {
        
    }

    public static function DateCreate($val = null) {
        
    }

    public static function Email($val = null) {
        $properties = self::$properties;
        $properties["value"] = $val;
        $properties[FormRender::Required] = "true";
        $options = [1 => "Kích Hoạt", 0 => "Khóa"];
        $name = self::$ElementsName . "[" . __FUNCTION__ . "]";
        return new FormRender(new Element\Email("Email", $name, $properties));
    }

    public static function Id($val = null) {
        
    }

    public static function KeyPassword($val = null) {
        
    }

    public static function Name($val = null) {
        $properties = self::$properties;
        $properties["value"] = $val;
        $properties[FormRender::Required] = "true";
        $options = [1 => "Kích Hoạt", 0 => "Khóa"];
        $name = self::$ElementsName . "[" . __FUNCTION__ . "]";
        return new FormRender(new Element\Textbox("Họ & Tên", $name, $properties));
    }

    public static function Password($val = null) {
        $properties = self::$properties;
        $properties["value"] = $val;
        $properties[FormRender::Required] = "true";
        $options = [1 => "Kích Hoạt", 0 => "Khóa"];
        $name = self::$ElementsName . "[" . __FUNCTION__ . "]";
        return new FormRender(new Element\Password("Mật Khẩu", $name, $properties));
    }

    public static function CreatePassword($val = null) {
        $properties = self::$properties;
        $properties["value"] = $val;
        $properties["id"] = __FUNCTION__;
        $properties[FormRender::Required] = "true";
        $options = [1 => "Kích Hoạt", 0 => "Khóa"];
        $name = self::$ElementsName . "[" . __FUNCTION__ . "]";
        return new FormRender(new Element\Textbox("Mật Khẩu", $name, $properties));
    }

    public static function Status($val = null) {
        
    }

    public static function TokenReset($val = null) {
        
    }

    public static function Username($val = null) {
        $properties = self::$properties;
        $properties["value"] = $val;
        $properties[FormRender::Required] = "true";
        $options = [1 => "Kích Hoạt", 0 => "Khóa"];
        $name = self::$ElementsName . "[" . __FUNCTION__ . "]";
        return new FormRender(new Element\Textbox("Tài Khoản", $name, $properties));
    }

}
