<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInita1cf0f6e76813da352adc9e8b949d3f8
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

    public static $prefixesPsr0 = array (
        'S' => 
        array (
            'Slim' => 
            array (
                0 => __DIR__ . '/..' . '/slim/slim',
            ),
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInita1cf0f6e76813da352adc9e8b949d3f8::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInita1cf0f6e76813da352adc9e8b949d3f8::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInita1cf0f6e76813da352adc9e8b949d3f8::$prefixesPsr0;

        }, null, ClassLoader::class);
    }
}