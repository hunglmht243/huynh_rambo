<?php

include "momo.php";
   
    $id_momo = $_POST['id_momo'];
    $sdt_nhan = $_POST['phone'];
    $money = $_POST['money'];
    $comment = $_POST['comment'];
        //$api_token = api_token();
    
     //$check_admin = $VIP->get_row(" SELECT * FROM `users` WHERE `email` = '".$_SESSION['username']."'AND   `token` = '$api_token'  ");
     $check_admin = $VIP->get_row(" SELECT * FROM `users` WHERE `email` = '".$_SESSION['username']."' ");

    
    // if(empty($api_token)){
    //     $return['status'] = false;
    //     $return['error'] = true;
    //     $return['message']   = "Thiếu API Token";
    //     die(json_encode($return));
    // }
    
    // if(!$check_admin){
    //     $return['status'] = false;
    //     $return['error'] = true;
    //     $return['message']   = "API Token không hợp lệ";
    //     die(json_encode($return));
    // }
    
    if(empty($_SESSION['useradmin'])){
        $return['status'] = false;
        $return['error'] = true;
        $return['message']   = "Bạn không có quyền này !";
        die(json_encode($return));
    }
   
    if(!$id_momo)
    {
      $return['status'] = false;
        $return['error'] = true;
        $return['message']   = "Thiếu Phone Gửi";
        die(json_encode($return));  
        
    }
       if(!$sdt_nhan)
    {
      $return['status'] = false;
        $return['error'] = true;
        $return['message']   = "Thiếu Phone Nhận";
        die(json_encode($return));  
        
    }     
          
     if(!$money)
    {
      $return['status'] = false;
        $return['error'] = true;
        $return['message']   = "Thiếu Số Tiền";
        die(json_encode($return));  
        
    }      
         
          
          
            
        $result_pay  = $momo->LoadData($id_momo)->SendMoney($sdt_nhan, $money, $comment);
           
        $data_send = $result_pay["full"];
      //   if(!$result_pay["full"]){
      //     print_r($result_pay);
      //     //die('lỗi');
      // }
      if ($result_pay["status"] == "success" && $result_pay["full"])
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
                  
                   $return['status'] = true;
        $return['error'] = true;
        $return['message']   = $result_pay["message"];
        die(json_encode($return));  
                  
                 
                  
                }
                else
                {
                 
                  $momo->LoadData($id_momo)->LoginTimeSetup();
                  $return['status'] = false;
        $return['error'] = true;
        $return['message']   = $result_pay["message"];
        die(json_encode($return));  
                 
                 
                  
                }
        
        
        
        ?>
       