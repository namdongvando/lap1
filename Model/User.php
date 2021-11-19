<?php

namespace Model;

class User {
    
    const Admin = "Admin";
    const QuanLy = "QuanLy";
    const VietBai = "VietBai";
    const QuanLySanPham = "QuanLySanPham";
    
    public $Id;
    public $Name;
    public $Username;
    public $Email;
    public $Password;
    public $KeyPassword;
    public $BOD;
    public $Status;
    public $Active;
    public $DateCreate;
    public $TokenReset;

    public function __construct($user = null) {

        if ($user) {
            $this->Id = isset($user["Id"]) ? $user["Id"] : null;
            $this->Name = isset($user["Name"]) ? $user["Name"] : null;
            $this->Username = isset($user["Username"]) ? $user["Username"] : null;
            $this->Email = isset($user["Email"]) ? $user["Email"] : null;
            $this->Password = isset($user["Password"]) ? $user["Password"] : null;
            $this->KeyPassword = isset($user["KeyPassword"]) ? $user["KeyPassword"] : null;
            $this->BOD = isset($user["BOD"]) ? $user["BOD"] : null;
            $this->Status = isset($user["Status"]) ? $user["Status"] : null;
            $this->Active = isset($user["Active"]) ? $user["Active"] : null;
            $this->DateCreate = isset($user["DateCreate"]) ? $user["DateCreate"] : null;
            $this->TokenReset = isset($user["TokenReset"]) ? $user["TokenReset"] : null;
        }
    }

    function GetRole() {
        $userRole = new \Model\UserRole();
        $roles = $userRole->GetByUserId($this->Id);
        return $roles;
    }

    /**
     * kiểm tra quền truy cập
     * $Allows: Danh Sách quền được truy cập
     */
    public function CheckPremision($Allows, $delines = []) {
        $roles = $this->GetRole();
        foreach ($roles as $role) {
            foreach ($delines as $deline) {
                if ($deline == $role["RoleId"]) {
                    return false;
                }
            } 
            foreach ($Allows as $Allow) {
                if ($Allow == $role["RoleId"]) {
                    return true;
                }
            }
        } 
        return false;
    }

    public static function CurentUser() {
        return new \Model\User($_SESSION[QuanLy]);
    }

}
