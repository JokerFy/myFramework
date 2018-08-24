<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/8/24
 * Time: 17:16
 */
function p($var){
    if(is_bool($var)){
        var_dump($var);
    }elseif (is_null($var)){
        var_dump(NULL);
    }else{
        print_r($var);
    }
}