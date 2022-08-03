<?php
include "momo.php";

 $api_token = api_token();
    
   
    
    
    
    if(empty($_SESSION['useradmin'])){
        $return['status'] = false;
        $return['error'] = true;
        $return['message']   = "Bạn không có quyền này !";
        die(json_encode($return));
    }

$GET_B = $VIP->get_row(" SELECT * FROM `lich_su_choi` WHERE `result` = 'success' AND `status` = 'error' AND `tranId` = '".$_POST['tranId']."' ORDER BY `id` DESC  ");
$partnerID = $GET_B['phone'];
$tien_nhan = $GET_B['amount_game'];
$msg_send = "TT MÃ GD: ". $GET_B['tranId'];
$tranId = $GET_B['tranId'];
if(!$GET_B){
    
      $return['status'] = false;
        $return['error'] = true;
        $return['message']   = "Không có mã giao dịch này !";
        die(json_encode($return));
    
    
    
}

if($GET_B['status'] == "success")
{
     $return['status'] = false;
        $return['error'] = true;
        $return['message']   = "Đơn đã được trả thưởng !";
        die(json_encode($return));
}

 $get_Sdt = $VIP->get_row(" SELECT * FROM `cron_momo` WHERE `BALANCE` >= '".$GET_B['amount_game']."'  AND   `status` = 'success' ORDER BY RAND() ");
 
 if(!$get_Sdt)
 {
   
      $return['status'] = false;
        $return['error'] = true;
        $return['message']   = "Không có số để trả thưởng !";
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
                  
                  
                 $TTB = $VIP->update("lich_su_choi",
                  [
                 'status' => $result_pay["status"],
                'msg_send' => $result_pay["message"]   
                      ],
                      " `tranId` = '$tranId'  "
                  );
                  
                  
                   $return['status'] = true;
        $return['error'] = false;
        $return['message']   = "Thanh toán thành công !";
        die(json_encode($return));
                  
                }
                elseif($result_pay["status"] != "success")
                {
                  $VIP->update("lich_su_choi",
                  [
                 'status' => 'error',
                  'msg_send' => $result_pay["message"]      
                      ],
                      " `tranId` = '$tranId'  "
                  );
                  
                  
                  $return['status'] = false;
        $return['error'] = true;
        $return['message']   = $result_pay["message"];
        die(json_encode($return));
                  
                }
                
                
                
                
                
                
                
     ?>           
                
                
                