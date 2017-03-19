<?php
/**
 * Created by PhpStorm.
 * User: zyw
 * Date: 2017/3/10
 * Time: 13:47
 */
$arr1 = array(1, 1, 3);
$arr2 = array(1, 5, 6);
$arr3 = array_combine($arr1, $arr2);//以一个数组为key ,一个数组为value 建立一个数组
$arr4 = range('a','z',3);//从给定的区间生成数组，第三个参数为每次增加的数
$zyw = 'zyw';
$ya_ya = 'ya_ya';
$love = 'love';
//$arr5 = compact($zyw, $ya_ya, $love);//获取变量作为数组的元素
//$arr6 = array_chunk($arr5,2);//将数组数据分块，每一块又是一个数组
//$arr7 = array_merge($arr1,$arr2);//将两个数组合并成一个数组
//$arr8 = array_splice($arr7,1,3,array('a','b','c'));//分隔（并替）换数组 返回切分的部分，原数组是剩余的部分
//$arr9 = array_diff($arr1, $arr2);//差集
//$arr10 = array_intersect($arr1, $arr2);//交集
//$str = array_search(2,$arr1);//在数组中搜索指定的值
//$arr11 = array_slice($arr1,1,2);//从数组中取出一段 不会改变原数组
//$bool = array_key_exists('zyw',$arr5);//判断指定的key值是否存在
////shuffle($arr1);//洗牌
//$arr12 = array_flip($arr1);//交换数组中的键和值
//$arr13 = array_reverse($arr1);//将原数组中的元素顺序翻转，并创建新的数组返回
//$arr14 = array_unique($arr1);
array_shift($arr1);//删除数组的第一个值1
//var_dump($arr3);
//var_dump($arr4);
//var_dump($arr5);
//var_dump($arr6);
//var_dump($arr7);
//var_dump($arr7);
//var_dump($arr8);
//var_dump($arr9);
//var_dump($arr10);
//print_r($str);
//var_dump($arr11);
//var_dump($bool);
//var_dump($arr1);
//var_dump($arr12);
//var_dump($arr13);
//var_dump($arr14);
var_dump($arr1);