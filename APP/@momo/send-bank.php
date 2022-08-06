<?php

include "momo.php";
   
    $id_momo = $_POST['id_momo'];
    $bankcode = $_POST['bankcode'];
    $account_number = $_POST['account_number'];
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
       if(!$bankcode)
    {
      $return['status'] = false;
        $return['error'] = true;
        $return['message']   = "Thiếu ngân hàng Nhận";
        die(json_encode($return));  
        
    }     

    if(!$account_number)
    {
      $return['status'] = false;
        $return['error'] = true;
        $return['message']   = "Thiếu stk Nhận";
        die(json_encode($return));  
        
    }  
          
     if(!$money)
    {
      $return['status'] = false;
        $return['error'] = true;
        $return['message']   = "Thiếu Số Tiền";
        die(json_encode($return));  
        
    }      
         
          
          
            
        $result  = $momo->LoadData($id_momo)->SendMoneyBank($bankcode,$account_number,$money,$comment);
        // if(!$result["full"]){
        //     die(json_encode(array("status" => false,"message" => $result['message'])));
        //     //die('lỗi');
        // }   
        die(json_encode(array("status" => $result['status'] == 'success' ? true : false,'error' => true,"message" => $result['message'])));
        
        
        
        ?>
       