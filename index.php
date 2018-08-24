<?php
/**
 * 入口文件
 * 1.定义常量
 * 2.加载函数库
 * 3.启动框架
 */

define('FYL',__DIR__);
define('Core',FYL.'/Core');
define('APP',FYL.'/App');

define('DEBUG',true);

if(DEBUG){
    ini_set('display_errors','On');
}else{
    ini_set('display_errors','Off');
}
include Core.'/Fyl.php';
include Core.'/common/function.php';

spl_autoload_register('\\Core\\Fyl::autoload');   //当访问不存在的类时自动调用该方法引入类库文件

\Core\Fyl::run();
