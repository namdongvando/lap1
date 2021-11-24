<?php

namespace Model;

class Common {

    public function __construct() {
        
    }

    public static function ToUrl($url) {
        header("Location: " . $url);
        exit();
    }

    public static function TextInput($text) {
        $text = trim($text);
        $text = addslashes($text);
        $text = htmlspecialchars($text);
        return $text;
    }

    public static function uuid() {
        return sprintf('%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
                // 32 bits for "time_low"
                mt_rand(0, 0xffff), mt_rand(0, 0xffff),
                // 16 bits for "time_mid"
                mt_rand(0, 0xffff),
                // 16 bits for "time_hi_and_version",
                // four most significant bits holds version number 4
                mt_rand(0, 0x0fff) | 0x4000,
                // 16 bits, 8 bits for "clk_seq_hi_res",
                // 8 bits for "clk_seq_low",
                // two most significant bits holds zero and one for variant DCE1.1
                mt_rand(0, 0x3fff) | 0x8000,
                // 48 bits for "node"
                mt_rand(0, 0xffff), mt_rand(0, 0xffff), mt_rand(0, 0xffff)
        );
    }

    public static function IsEmail($email) {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }

    public static function DateTimeFomatDatabase() {
        return "Y-m-d H:i:s";
    }
    public static function DateFomatDatabase() {
        return "Y-m-d";
    }

    public static function StrToDateDB($strdate) {
        return date(\Model\Common::DateFomatDatabase(), strtotime($strdate));
    }

    public static function DateFomatView() {
         return "d-m-Y";
    }

}
