<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitbd0a9ecbc916c9bb8d3af4813e76d897
{
    public static $prefixLengthsPsr4 = array (
        'a' => 
        array (
            'app\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'app\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitbd0a9ecbc916c9bb8d3af4813e76d897::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitbd0a9ecbc916c9bb8d3af4813e76d897::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitbd0a9ecbc916c9bb8d3af4813e76d897::$classMap;

        }, null, ClassLoader::class);
    }
}
