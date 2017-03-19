<?php
/**
 * Created by PhpStorm.
 * User: zyw
 * Date: 2017/3/9
 * Time: 15:51
 */
//session_start();
//$zyw = 'good';
//$_SESSION['zyw'] = $zyw;
//session_destroy();
//$savePath = "./";
//$lifeTime = 10;
//session_save_path($savePath);
//session_set_cookie_params($lifeTime);
session_start();
$_SESSION['zyw'] = '111';
//$_SESSION['yaya'] = 'yaya';
//echo session_save_path();
//session_unset();
var_dump($_SESSION);
//setcookie();
