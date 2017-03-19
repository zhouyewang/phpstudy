<?php
/**
 * Created by PhpStorm.
 * User: zyw
 * Date: 2017/3/15
 * Time: 10:11
 */

$conn = mysqli_connect('localhost','root','','test',3306);
if(!$conn){
    echo "connect faild";
    exit;
}
mysqli_query($conn,"set names utf8");
$price = 10;
$user_id = 1;
$good_id= 1;
$sku_id = 11;
$number = 1;

//生成唯一订单号
function build_order_no(){
    return date('ymd').substr(implode(null,array_map('ord',str_split(substr(uniqid(),7,13),1))),0,8);
}
//记录日志
function insertLog($event, $type = 0){
    global $conn;
    $sql = "insert into ih_log(event,type) values('$event','$type')";
    $conn->query($sql);
}

//模拟下单操作
//下单前判断redis队列库存量
$redis = new Redis();
$result = $redis->connect('127.0.0.1',6379);
$count = $redis->lpop('good_store');
if(!$count){
    insertLog('error:no store redis');
    return;
}

//生成订单
$order_sn = build_order_no();
$sql = "insert into ih_order(order_sn,user_id,goods_id,sku_id,price)
        values('$order_sn','$user_id','$good_id','$sku_id','$price')";
$order_rs = $conn->query($sql);


//库存减少
$sql = "update ih_store set number = number - {$number} where sku_id = '$sku_id'";
$store_rs = $conn->query($sql);
if(mysqli_affected_rows($conn)){
    insertLog('库存减少');
    echo '库存减少';
}else{
    insertLog('库存减少失败');
    echo '库存减少失败';
}

