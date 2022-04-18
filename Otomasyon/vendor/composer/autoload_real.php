<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInitac8272c74d6d7eb3be416e1fc92c47ec
{
    private static $loader;

    public static function loadClassLoader($class)
    {
        if ('Composer\Autoload\ClassLoader' === $class) {
            require __DIR__ . '/ClassLoader.php';
        }
    }

    /**
     * @return \Composer\Autoload\ClassLoader
     */
    public static function getLoader()
    {
        if (null !== self::$loader) {
            return self::$loader;
        }

        require __DIR__ . '/platform_check.php';

        spl_autoload_register(array('ComposerAutoloaderInitac8272c74d6d7eb3be416e1fc92c47ec', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInitac8272c74d6d7eb3be416e1fc92c47ec', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        \Composer\Autoload\ComposerStaticInitac8272c74d6d7eb3be416e1fc92c47ec::getInitializer($loader)();

        $loader->register(true);

        return $loader;
    }
}
