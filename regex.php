<?php
/**
 * Created by PhpStorm.
 * User: zyw
 * Date: 2017/3/10
 * Time: 11:32
 */

class regex{
    public static function check($str){
        if(preg_match("/^([1-9,])+$/",$str)){
            return true;
        }
        return false;
    }
}
$str = "1111";
if(regex::check($str)){
    echo "success";
}else{
    echo "fail";
}
