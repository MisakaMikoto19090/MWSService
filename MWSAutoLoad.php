<?php
/**
 * Created by PhpStorm.
 * User: weiru
 * Date: 2017/6/9
 * Time: 11:38
 */

namespace MWSService;


class MWSAutoLoad
{
    public static function autoload($class)
    {
        // Don't interfere with other autoloaders
        if (0 !== strpos($class, 'Swift_')) {
            return;
        }

        $path = __DIR__.'/'.str_replace('_', '/', $class).'.php';

        if (!file_exists($path)) {
            return;
        }

        require $path;

        if (self::$inits && !self::$initialized) {
            self::$initialized = true;
            foreach (self::$inits as $init) {
                call_user_func($init);
            }
        }
    }

    /**
     * Configure autoloading using Swift Mailer.
     *
     * This is designed to play nicely with other autoloaders.
     *
     * @param mixed $callable A valid PHP callable that will be called when autoloading the first Swift class
     */
    public static function registerAutoload($callable = null)
    {
        if (null !== $callable) {
            self::$inits[] = $callable;
        }
        spl_autoload_register(array('Swift', 'autoload'));
    }
}