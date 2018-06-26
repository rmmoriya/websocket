<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit3e4a1f9c3ea89329dfee72fd09cfef98
{
    public static $prefixLengthsPsr4 = array (
        'W' => 
        array (
            'WSSC\\' => 5,
            'WSSCTEST\\' => 9,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'WSSC\\' => 
        array (
            0 => __DIR__ . '/..' . '/arthurkushman/php-wss/src',
        ),
        'WSSCTEST\\' => 
        array (
            0 => __DIR__ . '/..' . '/arthurkushman/php-wss/tests',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit3e4a1f9c3ea89329dfee72fd09cfef98::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit3e4a1f9c3ea89329dfee72fd09cfef98::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
