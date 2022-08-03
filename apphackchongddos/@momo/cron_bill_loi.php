<?php
include "momo.php";

$LIST_ERROR = $VIP->get_list(" SELECT * FROM `lich_su_choi` WHERE `result` = 'success' AND `status` = 'error' AND `comment` != 'TIỀN CHƠI KHÔNG HỢP LỆ' ORDER BY `id` DESC  ");

    
    foreach ($LIST_ERROR as $row_error)
     {
         
        if($row_error['status'] != "error" ||  $row_error['status'] != "error") 
        
        {
            
        echo "ĐƠN ĐÃ ĐƯỢC THANH TOÁN <br>";
            
        }
         
         else
         {
                   $tranId = $row_error['tranId']; //MÃ GIAO DỊCH
                    $partnerID = $row_error['phone']; //SỐ ĐIỆN THOẠI
                    $comment = $row_error['comment']; //NỘI DUNG GIAO DỊCH
                    $amount = $row_error['amount_game'];  //SỐ TIỀN NHẬN
                    $partnerName = $row_error['partnerName'];  //NGƯỜI CHUYỂN 
                   $msg_send = "TT MÃ GD: ". $row_error['tranId'];
             if($row_error['result']=="error")
             
             {
                 echo "BILL NÀY THUA RỒI <br>";
             }
             
             
             else
             {
                 
                 $get_Sdt = $VIP->get_row(" SELECT * FROM `cron_momo` WHERE `BALANCE` >= '".$row_error['amount_game']."'  AND   `status` = 'success' ORDER BY RAND() ");
 
                 if(!$get_Sdt)
                 {
                   
                      echo "KHÔNG CÓ SỐ TRẢ THƯỞNG <br>";
                 }
                  
                 
                   $result_pay = $momo->LoadData($get_Sdt['phone'])->SendMoney($partnerID, $amount, $msg_send);
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
                  
                  
                  "CRON BILL LỖI THÀNH CÔNG 💔<br>";
                  
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
                  
                "CRON BILL LỖI THẤT BẠI <br>";
                  
                }
                
                 
                 
                 
                 
                 
                 
                 
                 
                 
                 
                 
                 
                 
                 
                 
                 
                 
                 
                 
             }
             
             
         }
         
         
         
         
         
         
         
         
         
     }
     
     echo "<pre>";
     print_r($LIST_ERROR);
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     ?>