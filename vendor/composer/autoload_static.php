<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit993d0aab66a6f3ab35dffcf91b7f47c2
{
    public static $files = array (
        '2cffec82183ee1cea088009cef9a6fc3' => __DIR__ . '/..' . '/ezyang/htmlpurifier/library/HTMLPurifier.composer.php',
    );

    public static $prefixesPsr0 = array (
        'H' => 
        array (
            'HTMLPurifier' => 
            array (
                0 => __DIR__ . '/..' . '/ezyang/htmlpurifier/library',
            ),
        ),
        'B' => 
        array (
            'Bramus' => 
            array (
                0 => __DIR__ . '/..' . '/bramus/router/src',
            ),
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixesPsr0 = ComposerStaticInit993d0aab66a6f3ab35dffcf91b7f47c2::$prefixesPsr0;
            $loader->classMap = ComposerStaticInit993d0aab66a6f3ab35dffcf91b7f47c2::$classMap;

        }, null, ClassLoader::class);
    }
}
