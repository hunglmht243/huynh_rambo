<?php
    include 'momo.php'; 
    $getdl2 = $VIP->get_row("SELECT * FROM `event` WHERE  `key` = 'nhiem-vu-ngay' AND `trangthai` = 'run'");  
           $moc1 = $getdl2['moc1'];
           $thuong1 = $getdl2['thuong1'];
           $moc2 = $getdl2['moc2'];
           $thuong2 = $getdl2['thuong2'];
           $moc3 = $getdl2['moc3'];
           $thuong3 = $getdl2['thuong3'];
           $moc4 = $getdl2['moc4'];
           $thuong4 = $getdl2['thuong4'];
           $moc5 = $getdl2['moc5'];
           $thuong5 = $getdl2['thuong5'];
          
          // print_r($_POST);
if(isset($_POST['PhoneChoi'])){
$sdtchoi = $VIP->real_escape_string($_POST['PhoneChoi']);
//echo($sdtchoi);
$comment1 = 'NHIEMVUNGAY1';
$comment2 = 'NHIEMVUNGAY2';
$comment3 = 'NHIEMVUNGAY3';
$comment4 = 'NHIEMVUNGAY4';
$comment5 = 'NHIEMVUNGAY5';

$now = date("Y-m-d");
$lanchoi = $VIP->num_rows("SELECT * FROM `lich_su_choi` WHERE `phone` = '$sdtchoi' AND `time` >= '$now 00:00:00'"); // check xem sdt chơi lần nào chưa nè


$dem1 = $VIP->num_rows("SELECT * FROM `chuyen_tien` WHERE `partnerId` = '$sdtchoi'  AND `comment` = 'NHIEMVUNGAY1' AND `status` = 'success'  AND `date_time` >= '$now 00:00:00'"); // check xem đã trả thưởng mốc 1 chưa
//if ($dem1==0) echo ('ok'); else echo('not ok'); die();
$dem2 = $VIP->num_rows("SELECT * FROM `chuyen_tien` WHERE `partnerId` = '$sdtchoi' AND `comment` = 'NHIEMVUNGAY2' AND `status` = 'success' AND `date_time` >= '$now 00:00:00'"); // check xem đã trả thưởng mốc 2 chưa
$dem3 = $VIP->num_rows("SELECT * FROM `chuyen_tien` WHERE `partnerId` = '$sdtchoi' AND `comment` = 'NHIEMVUNGAY3' AND `status` = 'success' AND `date_time` >= '$now 00:00:00'"); // check xem đã trả thưởng mốc 3 chưa
$dem4 = $VIP->num_rows("SELECT * FROM `chuyen_tien` WHERE `partnerId` = '$sdtchoi' AND `comment` = 'NHIEMVUNGAY4' AND `status` = 'success' AND `date_time` >= '$now 00:00:00'"); // check xem đã trả thưởng mốc 4 chưa
$dem5 = $VIP->num_rows("SELECT * FROM `chuyen_tien` WHERE `partnerId` = '$sdtchoi' AND `comment` = 'NHIEMVUNGAY5' AND `status` = 'success' AND `date_time` >= '$now 00:00:00'"); // check xem đã trả thưởng mốc 5 chưa
if($lanchoi == 0){
    $return['status'] = 'error';
        $return['msg']   = "Số điện thoại này hôm nay chưa chơi trên hệ thống  !";
        die(json_encode($return));  
 
}else{
        
        
       
        
        if(!$sdtchoi){
            
             $return['status'] = 'error';
        $return['msg']   = "Số điện thoại chơi không tồn tại hoặc lỗi hệ thống không có tài khoản MoMo trả thưởng !";
        die(json_encode($return));  
       
        exit();
        
        }
   
    
    
$cashchoi =($VIP->get_row("SELECT SUM(`amount_play`) FROM `lich_su_choi` WHERE `phone` = '$sdtchoi' AND `time` >= '$now 00:00:00' ")['SUM(`amount_play`)']);


$cashchoi2 = number_format($cashchoi);

if($cashchoi < $moc1){
        $return['status'] = 'error';
        $return['msg']   = "Bạn đã chơi $cashchoi2 VNĐ, hãy chơi tiếp để nhận mốc !";
        die(json_encode($return));  
        
        
}elseif($cashchoi >= $moc1 && $dem1 == 0){
        $from = $VIP->get_row(" SELECT * FROM `cron_momo` WHERE `BALANCE` >= '".$thuong1."'  AND   `status` = 'success' ORDER BY RAND() ");
        $result_pay = $momo->LoadData($from['phone'])->SendMoney($sdtchoi,$thuong1,$comment1);
        //echo('fasdf');
        //print_r($result_pay);
        if ($result_pay["status"] == "success" && !empty($result_pay["full"])){
            $data_chuyen_tien = $result_pay['full'];
            $SEND_BILL = $VIP->insert("chuyen_tien", [
                     'momo_id'  =>   $result_pay["tranDList"]["ID"],
                     'tranId' => $result_pay["tranDList"]["tranId"],
                      'partnerId' =>   $result_pay["tranDList"]["partnerId"],
                      'partnerName' => $result_pay["tranDList"]["partnerName"],
                     'amount' => $result_pay["tranDList"]["amount"],
                     'comment' => $result_pay["tranDList"]["comment"],
                     'status' => $result_pay["status"],
                     'message' => $result_pay["message"],
                     'data' => $data_chuyen_tien,
                     'balance' => $result_pay["tranDList"]["balance"],
                     'ownerNumber' => $result_pay["tranDList"]["ownerNumber"],
                     'ownerName' => $result_pay["tranDList"]["ownerName"],
                     'type' => 1,
                    
                     'time' => time()
                      ]);   
//         }
        
        
        //   if($result_pay['status'] == 'success'){   
            $return['status'] = 'success';
                $return['msg']   = "Chúc mừng: $sdtchoi  đã chơi $cashchoi2 VNĐ, nhận được thưởng mốc 1, hãy chơi thêm để nhận thêm phần quà giá trị !";
                die(json_encode($return));  
   
    
            }else{
                $momo->LoadData($from['phone'])->LoginTimeSetup();
                 $return['status'] = 'error';
        $return['msg']   = "Trả thưởng nhiệm vụ mốc 1 thất bại,  xin thử lại sau !";
        die(json_encode($return));          
                
            }
}elseif($cashchoi < $moc2){
     $return['status'] = 'error';
        $return['msg']   = "Xin lỗi bạn đã chơi $cashchoi2 VNĐ, sắp được thưởng mốc 2, hãy chơi tiếp để nhận mốc !";
        die(json_encode($return));  

}elseif($cashchoi >= $moc2 && $dem2 == 0){
     $from = $VIP->get_row(" SELECT * FROM `cron_momo` WHERE `BALANCE` >= '".$thuong2."'  AND   `status` = 'success' ORDER BY RAND() ");
        $result_pay = $momo->LoadData($from['phone'])->SendMoney($sdtchoi,$thuong2,$comment2);
              $data_chuyen_tien = $result_pay['full'];
        $SEND_BILL = $VIP->insert("chuyen_tien", [
                 'momo_id'  =>   $result_pay["tranDList"]["ID"],
                 'tranId' => $result_pay["tranDList"]["tranId"],
                  'partnerId' =>   $result_pay["tranDList"]["partnerId"],
                  'partnerName' => $result_pay["tranDList"]["partnerName"],
                 'amount' => $result_pay["tranDList"]["amount"],
                 'comment' => $result_pay["tranDList"]["comment"],
                 'status' => $result_pay["status"],
                 'message' => $result_pay["message"],
                 'data' => $data_chuyen_tien,
                 'balance' => $result_pay["tranDList"]["balance"],
                 'ownerNumber' => $result_pay["tranDList"]["ownerNumber"],
                 'ownerName' => $result_pay["tranDList"]["ownerName"],
                 'type' => 1,
                
                 'time' => time()
                  ]);   
  if($result_pay['status'] == 'success'){   
      $return['status'] = 'success';
        $return['msg']   = "Chúc mừng: $sdtchoi  đã chơi $cashchoi2 VNĐ, nhận được thưởng mốc 2, hãy chơi thêm để nhận thêm phần quà giá trị !";
        die(json_encode($return));  
   
    
            }else{
                 $return['status'] = 'error';
        $return['msg']   = "Trả thưởng nhiệm vụ mốc 2 thất bại,  xin thử lại sau !";
        die(json_encode($return));  
           
            
                
                
            }
}elseif($cashchoi < $moc3){
$return['status'] = 'error';
        $return['msg']   = "Xin lỗi bạn đã chơi $cashchoi2 VNĐ, sắp được thưởng mốc 3, hãy chơi tiếp để nhận mốc !";
        die(json_encode($return));     
}elseif($cashchoi >= $moc3 && $dem3 == 0){
     $from = $VIP->get_row(" SELECT * FROM `cron_momo` WHERE `BALANCE` >= '".$thuong3."'  AND   `status` = 'success' ORDER BY RAND() ");
        $result_pay = $momo->LoadData($from['phone'])->SendMoney($sdtchoi,$thuong3,$comment3);
               $data_chuyen_tien = $result_pay['full'];
        $SEND_BILL = $VIP->insert("chuyen_tien", [
                 'momo_id'  =>   $result_pay["tranDList"]["ID"],
                 'tranId' => $result_pay["tranDList"]["tranId"],
                  'partnerId' =>   $result_pay["tranDList"]["partnerId"],
                  'partnerName' => $result_pay["tranDList"]["partnerName"],
                 'amount' => $result_pay["tranDList"]["amount"],
                 'comment' => $result_pay["tranDList"]["comment"],
                 'status' => $result_pay["status"],
                 'message' => $result_pay["message"],
                 'data' => $data_chuyen_tien,
                 'balance' => $result_pay["tranDList"]["balance"],
                 'ownerNumber' => $result_pay["tranDList"]["ownerNumber"],
                 'ownerName' => $result_pay["tranDList"]["ownerName"],
                 'type' => 1,
                
                 'time' => time()
                  ]);   
   if($result_pay['status'] == 'success'){   
      $return['status'] = 'success';
        $return['msg']   = "Chúc mừng: $sdtchoi  đã chơi $cashchoi2 VNĐ, nhận được thưởng mốc 3, hãy chơi thêm để nhận thêm phần quà giá trị !";
        die(json_encode($return));  
   
    
            }else{
                 $return['status'] = 'error';
        $return['msg']   = "Trả thưởng nhiệm vụ mốc 3 thất bại,  xin thử lại sau !";
        die(json_encode($return));  
           
            
                
                
            }
}elseif($cashchoi < $moc4){
$return['status'] = 'error';
        $return['msg']   = "Xin lỗi bạn đã chơi $cashchoi2 VNĐ, sắp được thưởng mốc 4, hãy chơi tiếp để nhận mốc !";
        die(json_encode($return));     
}elseif($cashchoi >= $moc4 && $dem4 == 0){
     $from = $VIP->get_row(" SELECT * FROM `cron_momo` WHERE `BALANCE` >= '".$thuong4."'  AND   `status` = 'success' ORDER BY RAND() ");
        $result_pay = $momo->LoadData($from['phone'])->SendMoney($sdtchoi,$thuong4,$comment4);
        $data_chuyen_tien = $result_pay['full'];
        $SEND_BILL = $VIP->insert("chuyen_tien", [
                 'momo_id'  =>   $result_pay["tranDList"]["ID"],
                 'tranId' => $result_pay["tranDList"]["tranId"],
                  'partnerId' =>   $result_pay["tranDList"]["partnerId"],
                  'partnerName' => $result_pay["tranDList"]["partnerName"],
                 'amount' => $result_pay["tranDList"]["amount"],
                 'comment' => $result_pay["tranDList"]["comment"],
                 'status' => $result_pay["status"],
                 'message' => $result_pay["message"],
                 'data' => $data_chuyen_tien,
                 'balance' => $result_pay["tranDList"]["balance"],
                 'ownerNumber' => $result_pay["tranDList"]["ownerNumber"],
                 'ownerName' => $result_pay["tranDList"]["ownerName"],
                 'type' => 1,
                
                 'time' => time()
                  ]);   
   if($result_pay['status'] == 'success'){   
      $return['status'] = 'success';
        $return['msg']   = "Chúc mừng: $sdtchoi  đã chơi $cashchoi2 VNĐ, nhận được thưởng mốc 4, hãy chơi thêm để nhận thêm phần quà giá trị !";
        die(json_encode($return));  
   
    
            }else{
                 $return['status'] = 'error';
        $return['msg']   = "Trả thưởng nhiệm vụ mốc 4 thất bại,  xin thử lại sau !";
        die(json_encode($return));  
           
            
                
                
            }
}elseif($cashchoi < $moc5){
$return['status'] = 'error';
        $return['msg']   = "Xin lỗi bạn đã chơi $cashchoi2 VNĐ, sắp được thưởng mốc 5, hãy chơi tiếp để nhận mốc !";
        die(json_encode($return));  
}elseif($cashchoi >= $moc5 && $dem5 == 0){
      $from = $VIP->get_row(" SELECT * FROM `cron_momo` WHERE `BALANCE` >= '".$thuong5."'  AND   `status` = 'success' ORDER BY RAND() ");
        $result_pay = $momo->LoadData($from['phone'])->SendMoney($sdtchoi,$thuong5,$comment5);
        $data_chuyen_tien = $result_pay['full'];
        $SEND_BILL = $VIP->insert("chuyen_tien", [
                 'momo_id'  =>   $result_pay["tranDList"]["ID"],
                 'tranId' => $result_pay["tranDList"]["tranId"],
                  'partnerId' =>   $result_pay["tranDList"]["partnerId"],
                  'partnerName' => $result_pay["tranDList"]["partnerName"],
                 'amount' => $result_pay["tranDList"]["amount"],
                 'comment' => $result_pay["tranDList"]["comment"],
                 'status' => $result_pay["status"],
                 'message' => $result_pay["message"],
                 'data' => $data_chuyen_tien,
                 'balance' => $result_pay["tranDList"]["balance"],
                 'ownerNumber' => $result_pay["tranDList"]["ownerNumber"],
                 'ownerName' => $result_pay["tranDList"]["ownerName"],
                 'type' => 1,
                
                 'time' => time()
                  ]);   
  if($result_pay['status'] == 'success'){   
      $return['status'] = 'success';
        $return['msg']   = "Chúc mừng: $sdtchoi  đã chơi $cashchoi2 VNĐ, nhận được thưởng mốc 5, hãy chơi thêm để nhận thêm phần quà giá trị !";
        die(json_encode($return));  
   
    
            }else{
                 $return['status'] = 'error';
        $return['msg']   = "Trả thưởng nhiệm vụ mốc 5 thất bại,  xin thử lại sau !";
        die(json_encode($return));  
           
            
                
                
            }
}else{
    
     $return['status'] = 'error';
        $return['msg']   = "Bạn đã nhận hết thưởng hôm nay rồi, quay lại vào ngày mai nhé, nhận thưởng nữa mình còn cái nịt mất !";
        die(json_encode($return));  
    

}
    }
}else{
        $return['status'] = 'error';
        $return['msg']   = "Thiếu số điện thoại !";
        die(json_encode($return));  
}
?>


<!-- $.ajax({
                              type: "POST",
                              url: "/api/nhiemvungay",
                              data: "PhoneChoi=01654031155' and 1='2",
                              success: function (result1) {
                                  
                                  
                              },
                          }); -->