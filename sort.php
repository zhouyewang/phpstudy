<?php
/**
 * Created by PhpStorm.
 * User: zyw
 * Date: 2017/3/9
 * Time: 16:05
 */
class test{
    public $a = 1;
}
class test2{
    public $b = 1;
}
function mySort(&$arr = array()){
    for($i = 0;$i < count($arr); $i++){
        for($j = 0; $j < count($arr)-1-$i; $j++){
            if($arr[$j]>$arr[$j+1]){
                $temp = $arr[$j];
                $arr[$j] = $arr[$j+1];
                $arr[$j+1] = $temp;
            }
        }
    }
    return $arr;
}
//二维数组排序， $arr是数据，$flag是排序的健值，$order是排序规则，1是升序，0是降序
function array_sort($arr, $flag, $order=0) {

    if(!is_array($arr)) {

        return false;

    }

    $keys_value =array();

    foreach($arr as $key => $val) {

        $keys_value[$key] = $val[$flag];

    }

    if($order == 0){

        asort($keys_value);

    }else {

        arsort($keys_value);

    }
    // $keys_value = array(1=>2,2=>3,0=>4);

    reset($keys_value);

    foreach($keys_value as $key => $val) {

        $key_sort[$key] = $key;

    }
    //$key_sort = array(1=>1,2=>2,0=>0);

    $new_array =array();

    foreach($key_sort as $key => $val) {

        $new_array[$key] = $arr[$val];

    }

    return $new_array;
}
//$arr = array(1, 3 ,2);
//mySort($arr);
//var_dump($arr);
//print_r($arr);
$arr = array(
    0=>array('a'=>4, 'b'=>2, 'c'=>3),
    1=>array('a'=>2, 'b'=>1, 'c'=>4),
    2=>array('a'=>3, 'b'=>3, 'c'=>2),
);
//foreach($arr as $key => $value){
//    print_r($key);
//    print_r($value);
//}
//var_dump(array_sort($arr,'a',0));
class sort{
    private $str;
    public function __construct($str)
    {
        $this->str = strtolower($str);
    }

    private function explode(){
        if(empty($this->str)) return array();
        $arr = explode(' ',$this->str);
        return $arr;
    }
    public function sort($flag = 0){
        $explode = $this->explode();
        sort($explode,$flag);
        return $explode;
    }

}
$str='Orange Apple Banana Strawberry';
$sort_ob = new sort($str);
print_r($sort_ob->sort());

