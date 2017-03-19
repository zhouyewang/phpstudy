<?php
	function get_ext1($file_name){
	return strstr($file_name,'.');
}

function get_ext2($file_name){
	return substr($file_name,strrpos($file_name,'.'));
}
function get_ext3($file_name){
	$arr = explode('.',$file_name);
	return array_pop($arr);
}
function get_ext4($file_name){
	$p = pathinfo($file_name);
	return $p['extension'];
}
function get_ext5($file_name){
	return strrev($file_name);
}
echo get_ext1('zyw.img').'<br>';
echo get_ext2('zyw.img').'<br>';
echo get_ext3('zyw.img').'<br>';
echo get_ext3('zyw.img').'<br>';
echo get_ext3('zyw.img').'<br>';
echo get_ext5('zyw.img').'<br>';