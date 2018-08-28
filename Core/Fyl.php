<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/8/24
 * Time: 16:40
 */

namespace core;

class Fyl
{
    public static $classMap = array();
    protected static $module;
    protected static $controller;
    protected static $action;
    protected $assign = array();

    public static function run()
    {
        $route = new \Core\lib\Route();
        //初始化日志类
        \Core\lib\Log::init();

        self::$module = $module = $route->module;
        self::$controller = $controller = $route->controller;
        self::$action = $action = $route->action;

        $ctrlFile = APP . '/' . $module . '/controller/' . $controller . '.php';
        $ctrlClass = application . '\\' . $module . '\controller\\' . $controller;
        if (is_file($ctrlFile)) {
            include $ctrlFile;
            $ctrl = new $ctrlClass();
            $ctrl->$action();
        } else {
            throw new \Exception('找不到控制器' . $ctrlFile);
        }

    }

    public static function autoload($class)
    {

        if (isset(self::$classMap[$class])) {
            return true;
        } else {
            $classFile = FYL . '/' . str_replace('\\', '/', $class) . '.php';
            if (is_file($classFile)) {
                require $classFile;
                self::$classMap[$class] = $class;
            } else {
                return false;
            }
        }
    }

    public function assign($name, $value)
    {
        $this->assign[$name] = $value;
    }

    public function display($fileName=''){
        if ($fileName = '' || !$fileName) {
            $fileName = self::$action;
        }
        $file = APP . '/' . self::$module . '/view/' . self::$controller . '/' . $fileName . '.html';

        if (is_file($file)) {
            \Twig_Autoloader::register();
            $loader = new \Twig_Loader_Filesystem(APP . '/' . self::$module . '/view/');
            $twig = new \Twig_Environment($loader, array(
                'cache' => FYL.'/Runtime/temp',
                'debug' => DEBUG
            ));
            $template = $twig->loadTemplate(self::$controller.'/'.$fileName.'.html');
            $template->display($this->assign?$this->assign:array());
        } else {
            throw new \Exception('视图文件不存在');
        }
    }
    /*public function display($fileName = '')
    {
        if ($fileName = '' || !$fileName) {
            $file = APP . '/' . self::$module . '/view/' . self::$controller . '/' . self::$action . '.html';
        } else {
            $file = APP . '/' . self::$module . '/view/' . self::$controller . '/' . $fileName . 'html';
        }

        if (is_file($file)) {
            extract($this->assign);
            include $file;
        } else {
            throw new \Exception('视图文件不存在');
        }
    }*/
}