<?php require('../core/@connect.php'); 

$return=array();
$diemdanh_tongtien= $VIP->get_row("SELECT SUM(`tien_nhan`) FROM `diemdanh_win` WHERE `trangthai` = 'success' ")['SUM(`tien_nhan`)'];

$return['tongtien']= number_format($diemdanh_tongtien);
$MM_=$VIP->get_list("SELECT * FROM `diemdanh_win` WHERE `trangthai` = 'success'  ORDER BY `id` DESC LIMIT 4");
$return2=[];  
$d1=0;                
foreach ($MM_ as $USER){
    $SO_DT = substr($USER['sdt'],0,-4).'****';
    $return2[$d1]['sdt']= $SO_DT;
    $return2[$d1]['phien_thang']=$USER['phien_thang'];
    $return2[$d1]['tien_nhan'] = number_format($USER['tien_nhan']);
    $d1++;
}
$return['MM_'] = $return2;


$diemdanh_phien = $VIP->get_row("SELECT * FROM `diemdanh_phien` ");
$timecount = strtotime($diemdanh_phien['time_next']) - strtotime(date("Y-m-d H:i:s"));

$return['timecount'] = $timecount;

$return['phien'] =$diemdanh_phien['phien'];




echo json_encode($return);
// echo('<pre>');
// print_r($return);
// echo('</pre>');