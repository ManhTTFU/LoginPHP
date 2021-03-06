<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit2934723e2a861373aee62d842b5fa06e
{
    public static $classMap = array (
        'App\\Controller\\PagesController' => __DIR__ . '/../..' . '/app/controller/PagesController.php',
        'App\\Controller\\UsersController' => __DIR__ . '/../..' . '/app/controller/UsersController.php',
        'App\\Core\\App' => __DIR__ . '/../..' . '/core/App.php',
        'App\\Core\\Request' => __DIR__ . '/../..' . '/core/Request.php',
        'App\\Core\\Router' => __DIR__ . '/../..' . '/core/Router.php',
        'ComposerAutoloaderInit2934723e2a861373aee62d842b5fa06e' => __DIR__ . '/..' . '/composer/autoload_real.php',
        'Composer\\Autoload\\ClassLoader' => __DIR__ . '/..' . '/composer/ClassLoader.php',
        'Composer\\Autoload\\ComposerStaticInit2934723e2a861373aee62d842b5fa06e' => __DIR__ . '/..' . '/composer/autoload_static.php',
        'Connection' => __DIR__ . '/../..' . '/core/database/Connection.php',
        'QueryBuilder' => __DIR__ . '/../..' . '/core/database/QueryBuilder.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->classMap = ComposerStaticInit2934723e2a861373aee62d842b5fa06e::$classMap;

        }, null, ClassLoader::class);
    }
}
