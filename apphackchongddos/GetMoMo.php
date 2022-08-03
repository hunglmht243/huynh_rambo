<?php require('../core/@connect.php'); 
$return=array();
$GAME_INFO=$VIP->get_list("SELECT * FROM `danh_sach_game` WHERE `status` = 'run' ");
foreach ($GAME_INFO as $row_game){
    //$return[$row_game['ma_game']]= 
    $GAME_sdt=$VIP->get_list("SELECT * FROM `phone` WHERE `ma_game` = '".$row_game['ma_game']."' AND `status` = 'run' ");
    //print_r($GAME_sdt);
    $each_game=array();
    $each_game['ma_game']=$row_game['ma_game'];
    $each_game['mo_ta']=$row_game['mo_ta'];
    
    //$each_game['ds_phone']=array();
    foreach($GAME_sdt as $row_sdt ){
        $GAME_SDT_=$VIP->get_row("SELECT `id`,`today_gd`,`today` FROM `cron_momo` WHERE `phone` = '".$row_sdt['phone']."' ");
        
        $each_game['ds_phone'][$row_sdt['phone']]= $GAME_SDT_;
        $each_game['ds_phone'][$row_sdt['phone']]['min']=number_format($row_sdt['min']);
        $each_game['ds_phone'][$row_sdt['phone']]['max']=number_format($row_sdt['max']);
    //     $each_game['min']=$row_game['min'];
    // $each_game['max']=$row_game['max'];
    }
    

    $result_play = $VIP->get_list("SELECT * FROM `settings_game` WHERE `key` = '".$row_game['ma_game']."' ");
    $arr=array();
    foreach($result_play as  $row_play) {
        $kq = explode(",",$row_play['result']);
        $arr[strtoupper($row_play['comment'])]['result']= $kq;      
        $arr[strtoupper($row_play['comment'])]['ratio']=  $row_play['tile'];
    }
    $each_game['setting']=$arr;
    $return[]=$each_game;
    
}

echo json_encode($return);
// echo('<pre>');
// print_r($return);
// echo('</pre>');