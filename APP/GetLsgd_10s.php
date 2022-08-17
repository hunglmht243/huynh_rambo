<?php 
require('../core/@connect.php'); 


$return=array();

$user_dd=$VIP->num_rows("SELECT * FROM `diemdanh_user`"); // tong nguoi diem danh

$return['user_dd'] =$user_dd ;

$MM_user=$VIP->get_list("SELECT `sdt` FROM `diemdanh_user` WHERE `trangthai` = '0' "); // danh sach nguoi diem danh

$d1=0;
$return2=[];
foreach($MM_user as $user_h ){
    $SO_DT = substr($user_h['sdt'],0,-4).'****';
    $return2[$d1]['sdt']= $SO_DT;

    $d1++;

 }



$return['MM_user']= $return2;

$LIST_H=$VIP->get_list("SELECT `phone`, `time`, `amount_play`,`amount_game`,`game`,`comment`,`result`  FROM `lich_su_choi` WHERE  `result` = 'success' AND `partnerName` != 'toptuan' ORDER BY `id` desc LIMIT 5"); // 10 lich su choi gan nhat

 $d=0;
$return1=[];
foreach($LIST_H as $row_h ){
    $SO_DT = substr($row_h['phone'],0,-4).'****';
    $return1[$d]['phone']= $SO_DT;
    $return1[$d]['time']= $row_h['time'];
    $return1[$d]['amount_play'] = number_format($row_h['amount_play']);
    $return1[$d]['amount_game'] = number_format($row_h['amount_game']);
    $return1[$d]['game']= $row_h['game'];
    $return1[$d]['comment']= $row_h['comment'];
    $return1[$d]['result']= $row_h['result'];
    $d++;

 }
 
$return['LIST_H']= $return1;


echo json_encode($return);
// echo('<pre>');
// print_r($return);
// echo('</pre>');