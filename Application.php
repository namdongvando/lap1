<?php

class Application {

    static public $_Controller;
    static public $_Theme;
    static public $_Action;

    function __construct() {
        
    }

    public static function SetController($_controllerName) {
        self::$_Controller = $_controllerName;
    }

    public static function SetAction($_actionName) {
        self::$_Action = $_actionName;
    }

    public function View() {
        $controller = self::$_Controller;
        $action = self::$_Action;
        $theme = self::$_Theme;
        $_Content = __DIR__ . "/Views/theme/{$theme}/{$controller}/{$action}.phtml";
        include __DIR__. "/Views/theme/{$theme}/layout.phtml";
    }

}

?>