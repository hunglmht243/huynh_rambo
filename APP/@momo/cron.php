<?php
error_reporting(0);
session_start();
$url="https://clmm.nl/private/auto/tra-thuong";
$url1="https://clmm.nl/private/auto/login";
$url2="";
while(true){$i++;
echo "\n";
echo "\033[1;36mBắt Đầu Phiên Thứ : $i \033[1;37m";
chayy($url);
chayy($url1);
chayy($url2);
echo "\033[1;32mHết Phiên Thứ : $i \033[1;37m";
sleep(1);}
function chayy($url){
    $ch=curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.135 Safari/537.36');
curl_setopt($ch, CURLOPT_ENCODING, '');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
curl_setopt($ch, CURLOPT_TIMEOUT, 60);
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 60);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
$access = curl_exec($ch);
curl_close($ch);
    print_r($access);
}