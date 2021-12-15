<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Model;

/**
 * Description of Locations
 *
 * @author MSI
 */
class Locations extends DB implements IModelService, IModelToOptions {

    public $Id, $Name, $ParentsId, $IsPublic, $Note;

    //put your code here
    public function __construct($loc = null) {
        parent::$TableName = prefixTable . "locations";
        parent::__construct();
        if ($loc) {
            if (!is_array($loc)) {
                $id = $loc;
                $loc = $this->GetById($id);
            }
            if ($loc) {
                $this->Id = isset($loc["Id"]) ? $loc["Id"] : 0;
                $this->Name = isset($loc["Name"]) ? $loc["Name"] : 0;
                $this->ParentsId = isset($loc["ParentsId"]) ? $loc["ParentsId"] : 0;
                $this->IsPublic = isset($loc["IsPublic"]) ? $loc["IsPublic"] : 0;
                $this->Note = isset($loc["Note"]) ? $loc["Note"] : 0;
            }
        }
    }

    public function Delete($Id) {
        $this->DeleteById($Id);
    }

    public function GetById($Id) {
        return $this->SelectById($Id);
    }

    public function GetItems($params, $indexPage, $pageNumber, &$total) {
        $name = isset($params["name"]) ? $params["name"] : "";
        $where = "`Name` like '%$name%' ";
        return $this->SelectPT($where, $indexPage, $pageNumber, $total);
    }

    public function Post($model) {
        $this->Insert($model);
    }

    public function Put($model) {
        $this->UpdateRow($model);
    }

    public static function ToSelect($pid = 0) { 
        $loc = new Locations();
        return $loc->SelectToOptions("`ParentsId`= '{$pid}'", ["Id", "Name"]);
    }

}
