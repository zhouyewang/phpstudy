<?php
/**
 * Created by PhpStorm.
 * User: 业旺
 * Date: 2016/8/8
 * Time: 14:58
 */
header("Content-type: text/html; charset=utf-8");
$conn = @mysql_connect("localhost", "root","") or die("数据库连接错误");
mysql_select_db("test",$conn);
$result = mysql_query("select * from user");
var_dump($result);
var_dump(mysql_fetch_array($result));
var_dump(mysql_fetch_assoc($result));
echo "数据库连接成功";
