<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitfeeb09d7668ca3d20d98e0da2c239941
{
    public static $prefixLengthsPsr4 = array (
        'R' => 
        array (
            'Rapkit\\Wire\\' => 12,
        ),
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Rapkit\\Wire\\' => 
        array (
            0 => __DIR__ . '/../..' . '/packages/Rapkit/Wire/src',
        ),
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitfeeb09d7668ca3d20d98e0da2c239941::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitfeeb09d7668ca3d20d98e0da2c239941::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
