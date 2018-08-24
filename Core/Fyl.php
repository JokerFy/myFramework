<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/8/24
 * Time: 16:40
 */

namespace Core;

class Fyl
{
    public static $classMap = array();

    public static function run()
    {
        echo "框架已成功运行!";
        $route = new \Core\Route();
        p($route);
    }

    public static function autoload($class)
    {
        if (isset(self::$classMap[$class])) {
            return true;
        }else {
            $classFile = FYL . '/' . str_replace('\\', '/', $class) . '.php';
            if (is_file($classFile)) {
                require $classFile;
                self::$classMap[$class] = $class;
            } else {
                return false;
            }
        }
    }
}