<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/8/27
 * Time: 10:01
 */
namespace app\home\controller;

use app\home\model\User;
use core\Fyl;
use core\lib\Config;
use core\lib\Log;
use core\lib\Model;

class Index extends Fyl
{
    //所有留言
    public function index()
    {

        $this->assign('data',$var);
        $this->display();
    }

    //添加留言
    public function add()
    {

    }

    //保存留言
    public function save()
    {

    }
}