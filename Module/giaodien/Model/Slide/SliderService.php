<?php

namespace Module\giaodien\Model\Slide;

class SliderService extends \Model\DB implements \Model\IModelService {

    public $Id;
    public $Name;
    public $Content;
    public $Images;
    public $GroupsId;

    public function __construct($sl = null) {
        parent::__construct();
        parent::$TableName = prefixTable . "slider";
        if ($sl) {
            if (!is_array($sl)) {
                $Id = $sl;
                $sl = $this->GetById($Id);
            }

            $this->Id = isset($sl["Id"]) ? $sl["Id"] : null;
            $this->Name = isset($sl["Name"]) ? $sl["Name"] : null;
            $this->Content = isset($sl["Content"]) ? $sl["Content"] : null;
            $this->Images = isset($sl["Images"]) ? $sl["Images"] : null;
            $this->GroupsId = isset($sl["GroupsId"]) ? $sl["GroupsId"] : null;
        }
    }

    //put your code here
    public function Delete($Id) {
        
    }

    public function GetById($Id) {
        $this->SelectById($Id);
    }

    public function GetItems($params, $indexPage, $pageNumber, &$total) {
        $where = "1-1";
        $this->SelectPT($where, $indexPage, $pageNumber, $total);
    }

    public function Post($model) {
        $this->Insert($model);
    }

    public function Put($model) {
        $this->UpdateRow($model);
    }

}
