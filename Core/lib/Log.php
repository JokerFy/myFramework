<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/8/27
 * Time: 15:28
 */

namespace core\lib;


class Log
{
    public static $class;
    /**
     * 1.确定日志存储方式
     *
     * 2.写日志
     */
    public static function init(){
        $driver = Config::get('driver','log');
        $class = '\core\lib\driver\log\\'.$driver;
        self::$class = new $class;
    }

    public static function log($data,$file='log'){
        self::$class->log($data);
    }
}