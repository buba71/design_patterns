<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit01115cbabf392b0bd5db68c5584f3129
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit01115cbabf392b0bd5db68c5584f3129::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit01115cbabf392b0bd5db68c5584f3129::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}