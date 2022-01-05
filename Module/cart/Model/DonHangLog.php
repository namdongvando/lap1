<?php

namespace Module\cart\Model;

class DonHangLog extends \Model\DB implements \Model\IModelService, \Model\IModelToOptions {

    public function __construct() {
        parent::__construct();
        parent::$TableName = prefixTable . "sanpham_donhang_log";
    }

    //put your code here
    public function Delete($Id) {
        
    }

    public function GetById($Id) {
        
    }

    public function GetItems($where, $indexPage, $pageNumber, &$total) {
        
    }

    public function Post($model) {
        if (!isset($model["Id"])) {
            $model["Id"] = \Model\Common::uuid();
        }
        $this->Insert($model);
    }

    public function Put($model) {
        
    }

    public static function ToSelect() {
        
    }

}
