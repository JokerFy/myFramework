<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/8/24
 * Time: 16:52
 */

namespace Core;


class Route
{
    public $ctrl;
    public $action;
    public function __construct()
    {
        //实际上：xxx.com/index.php/index/index
        //htaccess重写后：xxx.com/index/index
        /**
         * 1.隐藏index.php
         * 2.获取URL参数部分
         * 3.返回对应控制器方法
         */
        if(isset($_SERVER['REQUEST_URI'])&& $_SERVER['REQUEST_URI'] != '/'){
            $path = $_SERVER['REQUEST_URI'];
            $patharr = explode('/',trim($path,'/'));
            if(isset($patharr[0])){
                $this->ctrl = $patharr[0];
            }
            unset($patharr[0]);
            if(isset($patharr[1])){
                $this->action = $patharr[1];
            }
            unset($patharr[0]);

        }else{
            $this->ctrl = 'index';
            $this->action = 'index';
        }
    }
}