<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include './config.php';
include './vendor/autoload.php';

$_controllerName = isset($_GET["controller"]) ? $_GET["controller"] : "index";
Application::SetController($_controllerName);
$_actionName = isset($_GET["action"]) ? $_GET["action"] : "index";
Application::SetAction($_actionName);
Application::$_Theme = "backend";
//$quanlytin = new Controller\quanlytin();
$strController = "Controller\\{$_controllerName}";

if (class_exists($strController)) {
    $_Controller = new $strController();
    if (method_exists($_Controller, $_actionName)) {
        $_Controller->$_actionName();
    } else {
        $_Controller = new \Controller\index();
        $_Controller->loi404();
    }
} else {
    $_Controller = new \Controller\index();
    $_Controller->loi404();
}


//$indexcontroler = new Controller\index();
//$indexcontroler->index();
?> 
<!--<img width="600" src="/app-hero-bg.jpg" alt=""/>-->

