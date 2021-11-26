<?php

namespace Controller;

use Model\Users\FormUser;

class profile extends \Application {

    public function __construct() {
        new backend();
        self::$_Theme = "backend";
    }

    function index() {
        $userService = new \Model\UserService();
        if (isset($_POST[FormUser::$ElementsName])) {
            try {
                /**
                 * thông tin cập nhật từ form
                 * @param {type} parameter
                 */
                $modelUser = $_POST[FormUser::$ElementsName];
                /**
                 * user trong database
                 * @param {type} parameter
                 */
                $itemDetail = $userService->GetById(\Model\User::CurentUser()->Id);
                $itemDetail["Name"] = $modelUser["Name"];
                $itemDetail["BOD"] = \Model\Common::StrToDateDB($modelUser["BOD"]);
                if ($itemDetail["Status"] == 0) {
                    /**
                     * có sửa email
                     * @param {type} parameter
                     */
                    if ($itemDetail["Email"] != $modelUser["Email"]) {
                        if ($userService->GetByEmail($modelUser["Email"])) {
                            throw new \Exception("Email này đã có.");
                        }
                    }
                    $itemDetail["Email"] = $modelUser["Email"];
                }
                $userService->Put($itemDetail);
                // cap nhật thong tin user hiện tại
                $_SESSION[QuanLy] = $itemDetail;
//            var_dump($itemDetail);
//
//            exit(); 
            } catch (\Exception $exc) {
                new \Model\Error(\Model\Error::danger, $exc->getMessage());
            }
        }

        /**
         * cập nhật mật khẩu
         * @param {type} parameter
         */
        try {
            if (isset($_POST["Password"])) {
                $password = $_POST["Password"];
                $newpassword = $_POST["NewPassword"];
                $repassword = $_POST["RePassword"];

                $uerService = new \Model\UserService();
                $itemUser = $uerService->GetUserByUsernamPassword(\Model\User::CurentUser()->Username, $password);
                if ($itemUser == null) {
                    throw new \Exception("Mật khẩu cũ không đúng");
                }

                if ($repassword != $newpassword) {
                    throw new \Exception("Mật khẩu mới không khớp");
                } 
                // có thể cập nhật mật khẩu

                $id = \Model\User::CurentUser()->Id;
                $itemDetail = $userService->GetById($id);
                if ($itemDetail) {
                    $keypassword = $itemDetail["KeyPassword"];
                    $itemDetail["Password"] = \Model\UserService::CreatePassword($newpassword, $keypassword);
                    $userService->Put($itemDetail);
                    new \Model\Error(\Model\Error::success, "Cập nhật mật khẩu thành công");
                }
            }
        } catch (\Exception $exc) {
            new \Model\Error(\Model\Error::danger, $exc->getMessage());
        }

        $this->View();
    }

}
