<?php

session_start();
ob_start();
define("DEFAULT_ACTION", "index");
define("DEFAULT_CONTROLLER", "index");


spl_autoload_register(function($className) {
    $className = str_replace("\\", "/", $className);
    $className = str_replace("_", "/", $className);
    $className = __DIR__ . "/{$className}.php";
    if (file_exists($className)) {
        include_once $className;
    }
//    echo "___".$className; 
});
define("prefixTable", "lap1_");
define("QuanLy", "quanly");
define("LoginPage", "/index.php?controller=login");
global $INI;
if (false) {

    $INI['host'] = "localhost";
    $INI['username'] = "oetkpjhosting_lap1";
    $INI['password'] = "@.rOKU1sh2r*";
    $INI['DBname'] = "oetkpjhosting_lap1";
} else {
    $INI['host'] = "localhost";
    $INI['username'] = "root";
    $INI['password'] = "";
    $INI['DBname'] = "lap1";
}

//#mbne6Y3&foG
?>