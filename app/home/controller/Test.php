<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/9/4
 * Time: 16:59
 */

namespace app\home\controller;
use app\home\model\User as User;
use core\lib\SortTestHelper as Helper;

class Test
{
    public function bubbleSort($arr,$n){
        for($i=0;$i<$n-1;$i++){
            for($j=$i+1;$j<$n;$j++){
                if($arr[$j]>$arr[$i]){
                    Helper::swap($arr[$j],$arr[$i]);
                }
            }
        }
        return $arr;
    }

}

