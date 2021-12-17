<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Model;

/**
 * Description of OptionsService
 *
 * @author MSI
 */
class OptionsService extends DB implements IModelService, IModelToOptions {

    public $Id;
    public $Name;
    public $Val;
    public $GroupsId;

    public function __construct($op = null) {
        parent::$TableName = prefixTable."options";
        parent::__construct();
        if ($op) {
            if (!is_array($op)) {
                $Id = $op;
                $op = $this->GetById($Id);
            }
            if ($op) {
                $this->Id = isset($op["Id"]) ? $op["Id"] : "";
                $this->Name = isset($op["Name"]) ? $op["Name"] : "";
                $this->Val = isset($op["Val"]) ? $op["Val"] : "";
                $this->GroupsId = isset($op["GroupsId"]) ? $op["GroupsId"] : "";
            }
        }
    }

    //put your code here
    public function Delete($Id) {
        return $this->DeleteById($Id);
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

    public static function GetGroupsToSelect($idGroups) {
        return $this->SelectToOptions("`GroupsId`= '{$idGroups}' ", ["Val", "Name"]);
    }

    public static function ToSelect() {
        return $this->SelectToOptions("1=1", ["Val", "Name"]);
    }

}
