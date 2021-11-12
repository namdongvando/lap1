<?php
 

namespace Model;
 
class Common {
   
    public function __construct() {
        
    }

    public static function ToUrl($url) {
        header("Location: ".$url);
        exit();
    }

    public static function TextInput($text) {
        $text = trim($text);
        $text = addslashes($text);
        $text = htmlspecialchars($text);
        return $text;
    }

}
