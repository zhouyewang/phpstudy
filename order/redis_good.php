<?php
/**
 * Created by PhpStorm.
 * User: zyw
 * Date: 2017/3/16
 * Time: 8:48
 */
$store = 100;
$redis = new Redis();
$result = $redis->connect('127.0.0.1',6379);
$res = $redis->lLen('good_store');
echo $res;
echo '<br>';
$count = $store - $res;
for($i = 0; $i < $count; $i++){
    $redis->lPush('good_store',1);
}
echo $redis->lLen('good_store');