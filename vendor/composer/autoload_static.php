<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit41671e0d39192fa6de5d7c50cfe3b94d
{
    public static $prefixLengthsPsr4 = array (
        'H' => 
        array (
            'HpMa\\PrimeraWeb\\' => 16,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'HpMa\\PrimeraWeb\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit41671e0d39192fa6de5d7c50cfe3b94d::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit41671e0d39192fa6de5d7c50cfe3b94d::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit41671e0d39192fa6de5d7c50cfe3b94d::$classMap;

        }, null, ClassLoader::class);
    }
}
