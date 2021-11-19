<?php

namespace Model;

class Role extends DB implements IModelService {

    public $Id;
    public $Name;
    public $Des;
    public $IsNotDelete;

    public function __construct($role = null) {
        self::$TableName = prefixTable . "role";
        parent::__construct();
        if ($role) {
            $this->Id = isset($role["Id"]) ? $role["Id"] : null;
            $this->Name = isset($role["Name"]) ? $role["Name"] : null;
            $this->Des = isset($role["Des"]) ? $role["Des"] : null;
            $this->IsNotDelete = isset($role["IsNotDelete"]) ? $role["IsNotDelete"] : null;
        }
    }

    public function Delete($Id) {
        $ur = new \Model\UserRole(); 
        $roles = $ur->GetByRoleId($Id);
        // liên kết ở bảng khác.
        if ($roles != null) {
            return null;
        }
        $modelRole = new Role();
        DB::$Debug = true;
        $roledetail = $modelRole->GetById($Id);
       
        // cấu hình không cho xóa
        if($roledetail["IsNotDelete"]==1){
            return null; 
        }
        $where = "`Id` = '{$Id}'";
        
        return $modelRole->DeleteDB($where);
    }

    public function GetById($Id) {
        $where = "`Id` = '{$Id}'";
        return $this->SelectRow($where);
    }

    public function GetItems($params, $indexPage, $pageNumber, &$total) {

        $keyword = $params["keyword"];
        $where = "`Id` like '%$keyword%' or `Name` like '%$keyword%'";
        return $this->SelectPT($where, $indexPage, $pageNumber, $total);
    }

    public function Post($model) {
        return $this->Insert($model);
    }

    public function Put($model) {
        $where = "`Id` = '{$model["Id"]}'";
        return $this->Update($model, $where);
    }

    /**
     * nut sua
     * @param {type} parameter
     */
    public function btnSua() {
        if (Permission::CheckPremision([User::Admin, md5(\Controller\quanlyquyen::class)]) == false) {
            return;
        }

        $btn = <<<BTNSUA
                <a class="btn btn-sm btn-primary"  href="/index.php?controller=quanlyquyen&action=put&id={$this->Id}" >Sửa</a>
                
BTNSUA;
        return $btn;
    }

    /**
     * nut xoa
     * @param {type} parameter
     */
    public function btnXoa() {
        if (Permission::CheckPremision(User::Admin) == false) {
            return;
        }
        $btn = <<<BTNSUA
                <a title="Bạn có muốn xóa role này?" class="btn btn-sm btn-danger"  href="/index.php?controller=quanlyquyen&action=delete&id={$this->Id}" >Xóa</a>
                
BTNSUA;
        return $btn;
    }

}
