<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitf3b6271eef9676760e7795d3cf6c2f6a
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PhpAmqpLib\\' => 11,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PhpAmqpLib\\' => 
        array (
            0 => __DIR__ . '/..' . '/php-amqplib/php-amqplib/PhpAmqpLib',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitf3b6271eef9676760e7795d3cf6c2f6a::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitf3b6271eef9676760e7795d3cf6c2f6a::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}