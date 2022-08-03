<?php

include "momo.php";

$giftcode = $_POST['giftcode'];
$sdt =$_POST['sdt'];


 $get_giftcode = $VIP->get_row("SELECT * FROM `giftcode`  WHERE `giftcode` = '$giftcode'");

  if(!$get_giftcode)
  {
      
      $return['status'] = 'error';
        $return['msg']   = "Không tồn tại giftcode này hoặc đã hết !";
        die(json_encode($return));  
  }
if(!$sdt){
          
      $return['status'] = 'error';
        $return['msg']   = "Thiếu số điện thoại !";
        die(json_encode($return));  
}

if(check_phone($sdt) != true)
{
     $return['status'] = 'error';
        $return['msg']   = "Số điện thoại không hợp lệ !";
        die(json_encode($return));  
}



 if($get_giftcode['gioi_han'] <= $get_giftcode['da_nhap'])
 {
      $return['status'] = 'error';
        $return['msg']   = "Giftcode đã đạt giới hạn nhận thưởng !";
        die(json_encode($return));  
  
 }

 
  $get_giftcode_user = $VIP->get_row("SELECT * FROM `user_giftcode`  WHERE `giftcode` = '$giftcode' AND `phone` = '$sdt' ");
  $get_cmt = $VIP->get_row("SELECT * FROM `message`  ");

 if($get_giftcode_user){
       $return['status'] = 'error';
        $return['msg']   = "Số này đã nhận thưởng rồi !";
        die(json_encode($return));  
 }
  $partnerID = $sdt;
$tien_nhan = $get_giftcode['money'];
$msg_send = $get_cmt['msg_giftcode']. " , CODE: ".$giftcode;
  
  
  
  $get_Sdt = $VIP->get_row(" SELECT * FROM `cron_momo` WHERE `BALANCE` >= '".$tien_nhan."'  AND   `status` = 'success' ORDER BY RAND() ");
 
 if(!$get_Sdt)
 {
   
      $return['status'] = 'error'; 
        $return['error'] = true;
        $return['msg']   = "Không có số để trả thưởng !";
        die(json_encode($return));   
 }
 
 $result_pay = $momo->LoadData($get_Sdt['phone'])->SendMoney($partnerID, $tien_nhan, $msg_send);
                $data_send = $result_pay["full"];
                
                if($result_pay["status"] == "success")
                {
                 $SEND_BILL = $VIP->insert("chuyen_tien", [
                 'momo_id'  =>   $result_pay["tranDList"]["ID"],
                 'tranId' => $result_pay["tranDList"]["tranId"],
                  'partnerId' =>   $result_pay["tranDList"]["partnerId"],
                  'partnerName' => $result_pay["tranDList"]["partnerName"],
                 'amount' => $result_pay["tranDList"]["amount"],
                 'comment' => $result_pay["tranDList"]["comment"],
                 'status' => $result_pay["status"],
                 'message' => $result_pay["message"],
                 'data' => $data_send,
                 'balance' => $result_pay["tranDList"]["balance"],
                 'ownerNumber' => $result_pay["tranDList"]["ownerNumber"],
                 'ownerName' => $result_pay["tranDList"]["ownerName"],
                 'type' => 1,
                
                 'time' => time()
                  ]);   
                  
                  $SEND_L = $VIP->insert("user_giftcode", [
               
                 'phone' => $partnerID,
                 'giftcode' => $giftcode,
                 'amount' => $result_pay["tranDList"]["amount"],
                
                 'time' => time()
                  ]);   
               
                  $TTB = $VIP->update("giftcode",
                  [
                 'da_nhap' => $get_giftcode['da_nhap'] + 1,
                      ],
                      " `giftcode` = '$giftcode'  "
                  );
                  
                   $return['status'] = 'success';
        $return['error'] = false;
        $return['msg']   = "Thành Công, ".format_money($tien_nhan)." đ Đã được chuyển đến bạn";
        die(json_encode($return));
                  
                }
                elseif($result_pay["status"] != "success")
                {
                  
                  
                  
                  $return['status'] = 'error'; 
        $return['error'] = true;
        $return['msg']   = "Lỗi nhận quà , vui lòng thử lại sau";
        die(json_encode($return));
                  
                }
                
                
         function check_phone($data)
{
    if (preg_match('/^\+?(\d.*){3,}$/', $data, $matches))
    {
        return true;
    }
    else
    {
        return false;
    }
}       



