<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/8/27
 * Time: 11:04
 */

namespace core\lib;


use Medoo\Medoo;

class Model extends Medoo
{
    public function __construct()
    {
       /* $database = Config::all('database');
        try{
            parent::__construct($database['dsn'], $database['username'], $database['password']);
        }catch (\PDOException $e){
            p($e->getMessage());
        }*/
        $options = Config::all('database');
        parent::__construct($options);
    }
}