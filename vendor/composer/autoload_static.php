<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit993370ec98b832db4303925213090e7d
{
    public static $prefixLengthsPsr4 = array (
        'Q' => 
        array (
            'QuanLyNhanVien\\' => 15,
        ),
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
            'PFBC\\' => 5,
        ),
        'I' => 
        array (
            'Imagesoptimizer\\' => 16,
        ),
        'H' => 
        array (
            'HangSanXuat\\' => 12,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'QuanLyNhanVien\\' => 
        array (
            0 => __DIR__ . '/../..' . '/App/QuanLyNhanVien/src',
        ),
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
        'PFBC\\' => 
        array (
            0 => __DIR__ . '/..' . '/namdongvando/rpfbc/src',
        ),
        'Imagesoptimizer\\' => 
        array (
            0 => __DIR__ . '/..' . '/namdongvando/imagesoptimizer/src',
        ),
        'HangSanXuat\\' => 
        array (
            0 => __DIR__ . '/../..' . '/App/HangSanXuat/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit993370ec98b832db4303925213090e7d::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit993370ec98b832db4303925213090e7d::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit993370ec98b832db4303925213090e7d::$classMap;

        }, null, ClassLoader::class);
    }
}
