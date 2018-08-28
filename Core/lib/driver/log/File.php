<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/8/27
 * Time: 15:31
 */
namespace core\lib\driver\log;

use core\lib\Config;

class File
{
    public $path;
    public function __construct()
    {
        $conf = Config::get('option','log');
        $this->path = $conf['path'];
    }

    public function log($data,$file='log')
    {
        /**
         * 1.确定文件存储位置是否存在
         * 新建目录
         * 2.写入目录
         */
        if(is_dir($this->path)){
            $dir = $this->path.date('Ym');
            if(!is_dir($dir)){
                mkdir($this->path.date('Ym'),'0777',true);
            }
        }
        return file_put_contents($this->path.'/'.date('Ym').'/'.date('d').'.log',date('Y-m-d H:i:s').json_encode($data).PHP_EOL,FILE_APPEND);

    }
}