<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Module\quanlysanpham\Model;

/**
 * Description of SanPhamThuocTinh
 *
 * @author MSI
 */
class SanPhamThuocTinh extends \Model\DB implements \Model\IModelService {

    //put your code here
    public $Id;
    public $OptionsTypeId;
    public $IdSanPham;
    public $GhiChu;

    public function __construct($sp = null) {
        self::$TableName = prefixTable . "sanpham_thuoctinh";
        parent::__construct();
        if ($sp) {
            if (!is_array($sp)) {
                $id = $sp;
                $sp = $this->GetById($id);
            }
            if ($sp) {
                $this->Id = isset($sp["Id"]) ? $sp["Id"] : null;
                $this->OptionsTypeId = isset($sp["OptionsTypeId"]) ? $sp["OptionsTypeId"] : null;
                $this->IdSanPham = isset($sp["IdSanPham"]) ? $sp["IdSanPham"] : null;
                $this->GhiChu = isset($sp["GhiChu"]) ? $sp["GhiChu"] : null;
            }
        }
    }

    public function Delete($Id) {
        return $this->DeleteById($Id);
    }

    public function GetById($Id) {
        return $this->SelectById($Id);
    }

    public function GetItems($params, $indexPage, $pageNumber, &$total) {
        $where = "1-1";
        return $this->SelectPT($where, $indexPage, $pageNumber, $total);
    }

    public function GetItemsByIdSanPham($IdSanPham) {
        $where = "`IdSanPham`='{$IdSanPham}'";
        return $this->Select($where);
    }

    public function Post($model) {
        return $this->Insert($model);
    }

    public function Put($model) {
        return $this->UpdateRow($model);
    }

    public function ToAray() {
        $data["Id"] = $this->Id;
        $data["OptionsTypeId"] = $this->OptionsTypeId;
        $data["IdSanPham"] = $this->IdSanPham;
        $data["GhiChu"] = $this->GhiChu;
        $data["LoaiThuocTinh"] = $this->OptionsTypeId();
        return $data;
    }

    public function OptionsTypeId() {
        $LoaiTT = new SanPhamLoaiThuocTinh();
        return $LoaiTT->GetById($this->OptionsTypeId);
    }

}
