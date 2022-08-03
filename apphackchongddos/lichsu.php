<?php require('../core/function.php');


        $tran_id=$_POST['tran_id'];
        
        if(empty($tran_id)){
            
        $return['status'] = 'error';
        $return['msg']   = "Vui lòng nhập mã giao dịch !";
        die(json_encode($return));    
            
        }
        
        else{
            
      $check_GIAODICH=$AUTO->get_row("SELECT * FROM `lich_su_choi` WHERE `magiaodich`  = '$tran_id' ");      
            
            
       if(!$check_GIAODICH){
          $return['status'] = 'error';
        $return['msg']   = "Không tồn tại mã giao dịch này !";
        die(json_encode($return));  
           
       }     
       
       else{
         
        if($check_GIAODICH['ketqua']=="false"){
            
            
        $return['status'] = 'error';
        $return['msg']   = "MÃ GD: $tran_id, SĐT:".$check_GIAODICH['sdt_gui'].", KẾT QUẢ: THUA";
        die(json_encode($return));  
           
       
            
            
        }
        
        else if($check_GIAODICH['status']=="false" && $check_GIAODICH['ketqua']=="true"){
            
            
        $return['status'] = 'success';
        $return['msg']   = "MÃ GD: $tran_id, SĐT: ".$check_GIAODICH['sdt_gui'].", KẾT QUẢ: THẮNG,<br> IDFB: ".$check_GIAODICH['idfb'].", ĐÃ CHẠY: 0";
        die(json_encode($return));  
           
       
            
            
        } 
         
         else
           
       {
           $thiet_lap_tra_thuong=$AUTO->get_row("SELECT * FROM `thiet_lap_tra_thuong`  "); 
           
         $post_data = [
            'code_orders'=> $check_GIAODICH['code_order'],
                 
                        ];

      

        $head=
        array(
                'api-token: '.$thiet_lap_tra_thuong['token'],
                'Content-Type: application/json'
                  
                            
                );        
        
        //TIẾN HÀNH POST
        
        $LINK_POST=rtrim($thiet_lap_tra_thuong['link_api'],"order")."list";
        $curl = curl_init();
        
        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://thuycute.hoangvanlinh.vn/'.$LINK_POST,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => json_encode($post_data),
        CURLOPT_HTTPHEADER => $head,
                ));
        $response = curl_exec($curl);
        
        curl_close($curl);  
      
  $result=  json_decode($response, true);
    $data_status = $result['status'];
    if ($data_status == true) {
        $DATA_SUB = explode(',"note"', explode(',"buff":', $response)[1])[0];
       $DATA_SUB2 = explode(',"log"', explode(',"buff":', $response)[1])[0];
       if (check_number($DATA_SUB) == "1") {
            $SUB_CHAY =  $DATA_SUB;
        } elseif (check_number($DATA_SUB2) == "1") {
            $SUB_CHAY = $DATA_SUB2;
        }
        
 
            
            
        $return['status'] = 'success';
        $return['msg']   = "MÃ GD: $tran_id, SĐT: ".$check_GIAODICH['sdt_gui'].", KẾT QUẢ: THẮNG,<br> IDFB: ".$check_GIAODICH['idfb'].", BẮT ĐẦU: ".$check_GIAODICH['bat_dau'].", ĐÃ CHẠY: ".$SUB_CHAY;
        die(json_encode($return));  
           
       
            
            
              
        
        
        
        
     }
     
     
     else {
         $return['status'] = 'success';
        $return['msg']   = "MÃ GD: $tran_id, SĐT: ".$check_GIAODICH['sdt_gui'].", KẾT QUẢ: THẮNG,<br> IDFB: ".$check_GIAODICH['idfb'].", BẮT ĐẦU: ".so_nguyen($check_GIAODICH['bat_dau']).", ĐÃ CHẠY: ".so_nguyen($SUB_CHAY);
        die(json_encode($return));  
     }
       }
           
           
           
          
           
           
       }
            
            
            
            
            
            
            
            
            
            
            
            
        }


 













?>