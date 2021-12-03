<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Module\quanlysanpham\Model;

/**
 * Description of SanPham
 *
 * @author MSI
 */
class SanPham extends \Model\DB implements \Model\IModelService {

    public $Id;
    public $Name;
    public $Des;
    public $Keyword;
    public $Title;
    public $DanhMucId;
    public $Alias;
    public $Username;
    public $Price;
    public $oldPrice;
    public $Summary;
    public $Content;
    public $UrlImages;
    public $DateCreate;
    public $Number;
    public $Note;
    public $BuyTimes;
    public $Views;
    public $isShow;
    public $STT;
    public $Lang;

    public function __construct($sp = null) {
        self::$TableName = prefixTable . "sanpham";
        parent::__construct();
        if ($sp) {
            if (!is_array($sp)) {
                $id = $sp;
                $sp = $this->GetById($id);
            }
            if ($sp) {
                $this->Id = isset($sp["Id"]) ? $sp["Id"] : null;
                $this->Name = isset($sp["Name"]) ? $sp["Name"] : null;
                $this->Des = isset($sp["Des"]) ? $sp["Des"] : null;
                $this->Keyword = isset($sp["Keyword"]) ? $sp["Keyword"] : null;
                $this->Title = isset($sp["Title"]) ? $sp["Title"] : null;
                $this->DanhMucId = isset($sp["DanhMucId"]) ? $sp["DanhMucId"] : null;
                $this->Alias = isset($sp["Alias"]) ? $sp["Alias"] : null;
                $this->Username = isset($sp["Username"]) ? $sp["Username"] : null;
                $this->Price = isset($sp["Price"]) ? $sp["Price"] : null;
                $this->oldPrice = isset($sp["oldPrice"]) ? $sp["oldPrice"] : null;
                $this->Summary = isset($sp["Summary"]) ? $sp["Summary"] : null;
                $this->Content = isset($sp["Content"]) ? $sp["Content"] : null;
                $this->UrlImages = isset($sp["UrlImages"]) ? $sp["UrlImages"] : null;
                $this->DateCreate = isset($sp["DateCreate"]) ? $sp["DateCreate"] : null;
                $this->Number = isset($sp["Number"]) ? $sp["Number"] : null;
                $this->Note = isset($sp["Note"]) ? $sp["Note"] : null;
                $this->BuyTimes = isset($sp["BuyTimes"]) ? $sp["BuyTimes"] : null;
                $this->Views = isset($sp["Views"]) ? $sp["Views"] : null;
                $this->isShow = isset($sp["isShow"]) ? $sp["isShow"] : null;
                $this->STT = isset($sp["STT"]) ? $sp["STT"] : null;
                $this->Lang = isset($sp["Lang"]) ? $sp["Lang"] : null;
            }
        }
    }

    //put your code here
    public function Delete($Id) {
        
    }

    static function SanPhamByDanhMuc($id) {
        $Sp = new SanPham();
    }

    static function CountSanPhamByDanhMuc($id) {

        $Sp = new SanPham();
        $where = "`DanhMucId` = '{$id}'";
        return $Sp->SelectCount($where);
    }

    public function GetById($Id) {
        return $this->SelectById($Id);
    }

    public function GetItems($where, $indexPage, $pageNumber, &$total) {
        
    }

    public function Post($model) {
        return $this->Insert($model);
    }

    public function Put($model) {
        return $this->UpdateRow($model);
    }

    public function Content() {
        return htmlspecialchars_decode($this->Content);
    }

}
