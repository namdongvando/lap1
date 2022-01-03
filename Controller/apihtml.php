<?php

namespace Controller;

class apihtml extends \Application {

    public function __construct() {
        
    }

    function GetQuanHuyenTag() {
        $idTinh = $this->getParams(0);
        $location = new \Model\Locations();
        $items = $location->GetByIdParents($idTinh);
        $html = "";
        foreach ($items as $key => $value) {
            $_item = new \Model\Locations($value);
            $html .= <<<THELI
                  <option value="$_item->Id" >$_item->Name</option>  
THELI;
        }
        echo $html;
    }

}
