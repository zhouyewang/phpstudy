<?php
/**
 * Created by PhpStorm.
 * User: zyw
 * Date: 2016/8/15
 * Time: 10:06
 */
//namespace my;
//require_once "useful/outputter3.php";
//new output();
//class output{
//    function __construct()
//    {
//        echo "success";
//    }
//}
//session_save_path('./');
session_start();
var_dump($_SESSION);
//$_SESSION['yaya'] = 'beautiful';
echo session_save_path();
