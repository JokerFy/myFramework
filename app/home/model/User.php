<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/8/27
 * Time: 17:20
 */
namespace app\home\model;
use core\lib\Model as Model;

class User extends Model
{
    public $table="user";

    public function getOne($id)
    {
        $ret = $this->get($this->table,"*",array(
            'id'=>$id
        ));
        return $ret;
    }

    public function refreshData($id,$data)
    {
        return $this->update($this->table,$data,array(
            'id'=>$id
        ));
    }

    public function delOne($id)
    {
        $ret = $this->delete($this->table,array(
            'id'=>$id
        ));
        return $ret;
    }

    public function lists()
    {
        $ret = $this->select($this->table,"*");
        return $ret;
    }
}