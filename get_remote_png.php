<?php
/**
 * Created by PhpStorm.
 * User: zyw
 * Date: 2016/8/15
 * Time: 10:18
 */
$url= "http://www.marsplus.cn/themes/simplebootx/Public/images/loginmanager.png";
//$url = "https://www.baidu.com";
$t = parse_url($url);
$path = $t['path'];
$host = $t['host'];
if($fp = fsockopen($host, 80, $err_no, $err_str, 30)){
    //建立成功后，像服务器写入数据
    $send = "GET $path HTTP/1.1\r\n";
    $send .= "HOST: $host \r\n";
    $send .= "CONNECTION: CLOSE \r\n\r\n";
    fwrite($fp, $send);
    //获取 127个字节的数据
    //$data = fgets($fp);
    $png = fopen(basename($path), "wb");
    $bin = '';
    while(!feof($fp)){
        $bin .= fgets($fp);
    }
    $bin = explode("\r\n\r\n",$bin);
    $img = $bin[1];
    fwrite($png,$img);
    fclose($png);
    fclose($fp);
}else{
    echo "没有连接";
}


