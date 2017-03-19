<?php
/**
 * Created by PhpStorm.
 * User: zyw
 * Date: 2017/3/13
 * Time: 9:03
 */
$redis = new Redis();
$redis->connect('127.0.0.1', 6379);
//echo $redis->ping();
echo $redis->get('zyw');
$redis->set('zyw', '222');