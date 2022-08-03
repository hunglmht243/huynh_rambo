<?php require('../core/@connect.php'); 


        $tran_id=$_POST['tran_id'];
        
        if(empty($tran_id)){
            
        $return['status'] = 'error';
        $return['msg']   = "Vui lòng nhập mã giao dịch !";
        die(json_encode($return));    
            
        }
        
        else{
            
      $check_GIAODICH=$VIP->get_row("SELECT * FROM `lich_su_choi` WHERE `tranId`  = '$tran_id' ");      
            
            
       if(!$check_GIAODICH){
          $return['status'] = 'error';
        $return['msg']   = "Không tồn tại mã giao dịch này !";
        die(json_encode($return));  
           
       }     
       
       else{
         
        if($check_GIAODICH['result']=="error"){
            
            
        $return['status'] = 'error';
        $return['msg']   = "MÃ GD: $tran_id, SĐT:".$check_GIAODICH['phone'].", KẾT QUẢ: ".$check_GIAODICH['result_text'];
        die(json_encode($return));  
           
       
            
            
        }
        
        else 
        {
            
            
        $return['status'] = 'success';
        $return['msg']   = "MÃ GD: $tran_id, SĐT:".$check_GIAODICH['phone'].", KẾT QUẢ: ".$check_GIAODICH['result_text']."<br> TIỀN: ".STATUS_B($check_GIAODICH['status']).format_money($check_GIAODICH['amount_game'])." VNĐ";
        die(json_encode($return));  
           
       
            
            
        } 
         
      
           
           
          
           
           
       }
            
            
            
            
            
            
            
            
            
            
            
            
        }


 













?>