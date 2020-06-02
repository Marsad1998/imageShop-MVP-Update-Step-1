<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitc4e6a5e747895356c086099832fb18ba
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitc4e6a5e747895356c086099832fb18ba::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitc4e6a5e747895356c086099832fb18ba::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
