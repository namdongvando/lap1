<?php

namespace Module\quanlysanpham\Model\SanPham;

class SanPhamInfor extends \Model\DB implements \Model\IModelService, \Model\IModelToOptions {

    //put your code here

    public $Id;
    public $Keyword;
    public $Val;
    public $Des;
    public $IdSanPham;

    public function __construct($infor = null) {
        parent::$TableName = prefixTable . "sanpham_infor";
        parent::__construct();
        if ($infor) {
            if (!is_array($infor)) {
                $Id = $infor;
                $infor = $this->GetById($Id);
            }
            if ($infor) {
                $this->Id = isset($infor["Id"]) ? $infor["Id"] : null;
                $this->Keyword = isset($infor["Keyword"]) ? $infor["Keyword"] : null;
                $this->Val = isset($infor["Val"]) ? $infor["Val"] : null;
                $this->IdSanPham = isset($infor["IdSanPham"]) ? $infor["IdSanPham"] : null;
                $this->Des = isset($infor["Des"]) ? $infor["Des"] : null;
            }
        }
    }

    public function Delete($Id) {
        
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

    public static function ToSelect() {
        
    }

    public function GetByKeywordIdSanPham($idSanPham, $keyword) {
        $where = "`Keyword` = '{$keyword}' and `IdSanPham` ='{$idSanPham}'";
        return $this->SelectRow($where);
    }

    /**
     * thong tin tu bang option
     * @param {type} parameter
     */
    public function Val($groupsId) {
        $ops = new \Model\OptionsService();
        return new \Model\OptionsService($ops->GetByValGroupsId($this->Val, $groupsId));
    }

    public function GetByKeywordVal($params, $indexPage, $pageNumber, &$total) {
        $keyword= $params["keyword"];
        $Val= $params["val"];
        $where = "`Keyword` = '{$keyword}' and `Val` ='{$Val}'";
        return $this->SelectPT($where, $indexPage, $pageNumber, $total);
    }

}
