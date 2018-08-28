<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/8/24
 * Time: 16:52
 */

namespace core\lib;


class Route
{
    public $module;
    public $controller;
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
                $this->module = $patharr[0];
            }else{
                $this->module = Config::get('module','route');
            }

            if(isset($patharr[1])){
                $this->controller = $patharr[1];
            }else{
                $this->controller = Config::get('controller','route');
            }
//            unset($patharr[0]);
            if(isset($patharr[1])){
                $this->action = $patharr[1];
            }else{
                $this->action = Config::get('action','route');
            }
//            unset($patharr[0]);
            //url多余的方法转为GET参数
            $count = count($patharr);
            $i = 3;
            while ($i<$count){
                if(isset($patharr[$i+1])){
                    $_GET[$patharr[$i]] = $patharr[$i+1];
                }
                $i = $i+2;
            }
//            p($_GET);
        }else{
            $this->module = Config::get('module','route');
            $this->controller = Config::get('controller','route');
            $this->action = Config::get('action','route');
        }
    }
}