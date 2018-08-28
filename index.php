<?php
/**
 * 入口文件
 * 1.定义常量
 * 2.加载函数库
 * 3.启动框架
 */

define('FYL',__DIR__);
define('Core',FYL.'/core');
define('APP',FYL.'/app');
define('application','\app');
define('DEBUG',true);

//引入composer类库
include "vendor/autoload.php";

if(DEBUG){
    $whoops = new Whoops\Run();
    $errorTitle = '框架出错了！';
    $whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler());
    $whoops->register();
    ini_set('display_errors','On');
}else{
    ini_set('display_errors','Off');
}

include Core.'/Fyl.php';
include Core.'/common/function.php';

spl_autoload_register('\\Core\\Fyl::autoload');   //当访问不存在的类时自动调用该方法引入类库文件

\Core\Fyl::run();
