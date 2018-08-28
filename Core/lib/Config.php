<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/8/27
 * Time: 14:06
 */

namespace core\lib;


class Config
{
    public static $conf = array();

    public static function get($name, $file)
    {
        /**
         * 1.判断配置文件是否存在
         * 2.判断配置是否存在
         * 3.缓存配置
         */
        if (isset(self::$conf[$file])) {
            return self::$conf[$file][$name];
        } else {
            $path = FYL . '/core/config/' . $file . '.php';
            try {
                if (is_file($path)) {
                    $conf = include $path;
                    if (isset($conf[$name])) {
                        self::$conf[$file] = $conf;
                        return $conf[$name];
                    } else {
                        throw new \Exception('没有这个配置项' . $name);
                    }
                } else {
                    throw new \Exception('找不到配置文件' . $path);
                }
            } catch (\Exception $e) {
                echo $e->getMessage();
                exit;
            }
        }
    }

    public static function all($file)
    {
        if (isset(self::$conf[$file])) {
            return self::$conf[$file];
        } else {
            $path = FYL . '/core/config/' . $file . '.php';
            try {
                if (is_file($path)) {
                    $conf = include $path;
                    self::$conf[$file] = $conf;
                    return $conf;
                } else {
                    throw new \Exception('找不到配置文件' . $path);
                }
            } catch (\Exception $e) {
                echo $e->getMessage();
                exit;
            }
        }
    }
}