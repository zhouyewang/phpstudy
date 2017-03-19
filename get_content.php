<?php
	$url = "http://www.marsplus.com";
	/*
	$read_content = fopen($url,"rb");
	$contents = stream_get_contents($read_content);
	fclose($read_content);
	echo $contents;
	*/
	//echo file_get_contents($url);
	$ch = curl_init("http://www.111cn.net/");
	$fp = fopen("php_homepage.txt", "w");
	curl_setopt($ch, CURLOPT_FILE, $fp);
	curl_setopt($ch, CURLOPT_HEADER, 0);
	curl_exec($ch);
	curl_close($ch);
	fclose($fp);