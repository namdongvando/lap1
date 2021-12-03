<?php

namespace Module\quanlysanpham\Model;

class SanPhamThuocTinh extends \Model\DB implements \Model\IModelService {

    public function __construct($sp = null) {
        self::$TableName = prefixTable . "sanpham_options_type";
        parent::__construct();
        if ($sp) {
            if (!is_array($sp)) {
                $id = $sp;
                $sp = $this->GetById($id);
            }
            if ($sp) {
                $this->Id = isset($sp["Id"]) ? $sp["Id"] : null;
                $this->Name = isset($sp["Name"]) ? $sp["Name"] : null;
                $this->Code = isset($sp["Code"]) ? $sp["Code"] : null;
                $this->Parents = isset($sp["Parents"]) ? $sp["Parents"] : null;
            }
        }
    }

    public function Delete($Id) {
        
    }

    public function GetById($Id) {
        return $this->SelectById($Id);
    }

    public function GetItems($name, $indexPage, $pageNumber, &$total) {
        $where= "`Name` like '%$name%' or `Code` like '%$name%' ";
        return $this->SelectPT($where, $indexPage, $pageNumber, $total);
    }

    public function Post($model) {
        return $this->Insert($model);
    }

    public function Put($model) {
        return $this->UpdateRow($model);
    }

}
