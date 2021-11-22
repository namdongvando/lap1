<?php

namespace Controller;

class quanlyusers extends \Application implements IControllerBE {

    public function __construct() {
        new backend();
        self::$_Theme = "backend";
        \Model\Permission::Check([\Model\User::Admin, md5(quanlyusers::class . "_view")]);
        //336bdbdba15a2836969cb534cc56f9df
    }

    function index() {
//        echo md5(quanlyusers::class);
        \Model\Permission::Check([\Model\User::Admin, md5(quanlyusers::class . "_view")]);
        $modelUsers = new \Model\UserService();
        $params["keyword"] = isset($_GET["keyword"]) ? \Model\Common::TextInput($_GET["keyword"]) : "";
        $indexPage = isset($_GET["indexPage"]) ? intval($_GET["indexPage"]) : 1;
        $indexPage = max(1, $indexPage);
        $pageNumber = isset($_GET["pageNumber"]) ? intval($_GET["pageNumber"]) : 10;
        $pageNumber = max(1, $pageNumber);
        $total = 0;
        $DanhSachTaiKhoan = $modelUsers->GetItems($params, $indexPage, $pageNumber, $total);
        $data["DanhSachTaiKhoan"] = $DanhSachTaiKhoan;
        $data["indexPage"] = $indexPage;
        $data["pageNumber"] = $pageNumber;
        $data["params"] = $params;
        $data["total"] = $total;

        $this->View($data);
    }

    public function delete() {
        \Model\Permission::Check([\Model\User::Admin, md5(quanlyusers::class . "_" . __FUNCTION__)]);
    }

    public function post() {
        \Model\Permission::Check([\Model\User::Admin, md5(quanlyusers::class . "_" . __FUNCTION__)]);
        if (isset($_POST[\Model\Users\FormUser::$ElementsName])) {
            try {
                $userForm = $_POST[\Model\Users\FormUser::$ElementsName];
                $Modeluser["Name"] = \Model\Common::TextInput($userForm["Name"]);
                if ($Modeluser["Name"] == "") {
                    throw new Exception("Họ & Tên Không Để Trống.");
                }
                $Modeluser["Email"] = \Model\Common::TextInput($userForm["Email"]);
                if ($Modeluser["Email"] == "") {
                    throw new Exception("Họ & Tên Không Để Trống.");
                }
                if (\Model\Common::IsEmail($Modeluser["Email"]) == false) {
                    throw new Exception("Email Không Hợp Lệ.");
                }
                $Modeluser["Username"] = \Model\Common::TextInput($userForm["Username"]);
                if ($Modeluser["Username"] == "") {
                    throw new Exception("Tài Khoản Không Để Trống.");
                }
                $Modeluser["Active"] = intval($userForm["Active"]);
                $Modeluser["Password"] = $userForm["CreatePassword"];
                $Modeluser["Id"] = \Model\Common::uuid();
                $Modeluser["KeyPassword"] = \Model\Common::uuid();
                $Modeluser["BOD"] = date(\Model\Common::DateFomatDatabase(), time());
                $Modeluser["Status"] = 0;
                $Modeluser["DateCreate"] = date(\Model\Common::DateFomatDatabase(), time());
                $Modeluser["TokenReset"] = "";
                $Modeluser["Password"] = \Model\UserService::CreatePassword($Modeluser["Password"], $Modeluser["KeyPassword"]);
                $userservice = new \Model\UserService();
                $userservice->Post($Modeluser);
                /**
                 * tạo tài khoản thành công
                 * @param {type} parameter
                 */
                \Model\Common::ToUrl("/index.php?controller=quanlyusers&action=put&id=" . $Modeluser["Id"]);
            } catch (\Exception $exc) {
                new \Model\Error(\Model\Error::danger, $exc->getMessage());
            }
        }

        $this->View();
    }

    public function put() {
        \Model\Permission::Check([\Model\User::Admin, md5(quanlyusers::class . "_" . __FUNCTION__)]);
        $userService = new \Model\UserService();


        $id = \Model\Common::TextInput($_GET["id"]);
        $user = $userService->GetById($id);
        
        $this->View(["user" => $user]);
    }

    function showkey() {
        $data["post"] = md5(quanlyusers::class . "_post");
        $data["put"] = md5(quanlyusers::class . "_put");
        $data["delete"] = md5(quanlyusers::class . "_delete");
        $data["view"] = md5(quanlyusers::class . "_view");
        $this->View($data);
    }

}
