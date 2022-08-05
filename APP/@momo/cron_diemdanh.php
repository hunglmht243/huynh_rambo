<?php
    include 'momo.php';
    $today = date("Y-m-d H:i:s");
 $get_phien = $VIP->get_row("SELECT * FROM `diemdanh_phien`  ORDER BY `id` DESC"); 
 //echo (!$get_phien);
 if(!$get_phien){
    $phien_now= $VIP->get_list("SELECT * FROM `diemdanh_win`WHERE `trangthai` = 'success' ORDER BY `id` DESC LIMIT 1 ");
    //print_r($phien_now);
     $VIP->insert("diemdanh_phien",
     [
       'phien' => (int)$phien_now[0]['phien_thang']+1,
       'time_end' => date("Y-m-d H:i:s"),
       'time_next' =>   date('Y-m-d H:i:s',strtotime('+15 minutes',strtotime(date("Y-m-d H:i:s")))),                      
         ]
     
     );
     echo "TẠO TIME ĐIỂM DANH 🚫<br>\n";
     exit();
 }
 
 
  
  
   if (strtotime($today) < strtotime($get_phien['time_next'])) {
          
          echo "CHƯA ĐẾN PHIÊN  ĐIỂM DANH 🚫<br>\n";
           exit();
       
   }else{
        $next_phien= (int)$get_phien['phien']+1;
         $VIP->update("diemdanh_phien", [
            'phien' =>   $next_phien,    
            'time_end' => date("Y-m-d H:i:s"),
            'time_next' =>   date('Y-m-d H:i:s',strtotime('+15 minutes',strtotime(date("Y-m-d H:i:s")))),                      
                                            
        ]," `phien` = '".(string)$get_phien['phien']."' ");


       $USER_MAYMAN=$VIP->get_row("SELECT * FROM `diemdanh_user` ORDER BY RAND()");  
        
        if($USER_MAYMAN){
            
            $mess=$VIP->get_row("SELECT * FROM `message`");  
            
            $message = $mess['msg_event'];
        
            


            $check_fake= $VIP->num_rows(" SELECT * FROM `diemdanh_user` WHERE `sdt`= '".$USER_MAYMAN['sdt']."' AND `fake` = true "); // check có phải số fake hay không
            if ($check_fake>0){
                  // fake diem danh
                    $VIP->insert("diemdanh_win",
                    [
                        'phien_thang' => $get_phien['phien'],
                        'trangthai'  => 'success',
                        'sdt' => $USER_MAYMAN['sdt'],
                        'tien_nhan' => $USER_MAYMAN['money'],
                        'time' => time()                                               
                        ]
                    
                    
                    );                       
                    //$VIP->remove("diemdanh_user", "`sdt` != '0' ");
                    echo "ĐIỂM DANH THÀNH CÔNG ❤<br>\n";
                    $VIP->query("DELETE FROM `diemdanh_user`");
                    exit();
                
            } else {

                $get_Sdt = $VIP->get_row(" SELECT * FROM `cron_momo` WHERE `BALANCE` >= '".$USER_MAYMAN['money']."'  AND   `status` = 'success' ORDER BY RAND() ");
                if(!$get_Sdt) {
                    
                    echo "KHÔNG CÓ MOMO TRẢ THƯỞNG 🚫<br>\n";
                    $VIP->query("DELETE FROM `diemdanh_user`");
                    exit();
                }
                $result_pay = $momo->LoadData($get_Sdt['phone'])->SendMoney($USER_MAYMAN['sdt'],$USER_MAYMAN['money'],$message); 
                if(!$result_pay["full"]){
                    print_r($result_pay);
                // die('lỗi');
                }
                if($result_pay["status"] == "success")
                    {
                        $data_send = $result_pay["full"];
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
                        $VIP->insert("diemdanh_win",
                        [
                            'phien_thang' => $get_phien['phien'],
                            'trangthai'  => $result_pay["status"],
                            'sdt' => $USER_MAYMAN['sdt'],
                            'tien_nhan' => $result_pay["tranDList"]["amount"],
                            'time' => time() 
                            ]
                        
                        
                        );                       
                        //$VIP->remove("diemdanh_user", "`sdt` != '0' ");
                        $VIP->query("DELETE FROM `diemdanh_user`");
                        echo "ĐIỂM DANH THÀNH CÔNG ❤<br>\n";
                        exit();
                    }
            }
  
                
       
    
        }
        else{
     
       echo "KHÔNG CÓ NGƯỜI CHƠI 🚯<br>\n";
        exit();
        }

        
   }
        