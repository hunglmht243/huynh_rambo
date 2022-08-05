<?php require('../core/@connect.php'); 

date_default_timezone_set('Asia/Ho_Chi_Minh');


if ( $_SERVER['REQUEST_METHOD'] == 'GET' && realpath(__FILE__) == realpath( $_SERVER['SCRIPT_FILENAME'] ) ) {

    header('Location: /404');exit;
         

}else{
    
     $action            = check_string($_POST['action']);
     
     if($action == "theme_play")
     {
         
    
    $api_token = api_token();
    
     $check_admin = $VIP->get_row(" SELECT * FROM `users` WHERE `email` = '".$_SESSION['username']."'AND   `token` = '$api_token'  ");
 
    
    if(empty($api_token)){
        $return['status'] = false;
        $return['error'] = true;
        $return['message']   = "Thiếu API Token";
        die(json_encode($return));
    }
    
    if(!$check_admin){
        $return['status'] = false;
        $return['error'] = true;
        $return['message']   = "API Token không hợp lệ";
        die(json_encode($return));
    }
    
    if(empty($_SESSION['useradmin'])){
        $return['status'] = false;
        $return['error'] = true;
        $return['message']   = "Bạn không có quyền này !";
        die(json_encode($return));
    }
    
    $theme     = check_string($_POST['theme']);
    
      if($theme == 0)
      {
           $update = $VIP->update("settings", [
        'theme' => 0,
        'color' => '#ad4105',
        'color_head' => '#6d2f0f',
        'color_head2' => '#e18637',
        'color_end' => '#6d2f0f',
        'color_button' => '#e18637',
    ], " `id` = '1' ");
         
      }
    
     elseif($theme == 1)
      {
           $update = $VIP->update("settings", [
        'theme' => 1,
        'color' => '#049fd2',
        'color_head' => '#049fd2',
        'color_head2' => '#049fd2',
        'color_end' => '#049fd2',
        'color_button' => '#10da28',
    ], " `id` = '1' ");
         
      }
    
      elseif($theme == 2)
      {
           $update = $VIP->update("settings", [
        'theme' => 2,
        'color' => '#000000',
        'color_head' => '#000000',
        'color_head2' => '#000000',
        'color_end' => '#000000',
        'color_button' => '#000000',
    ], " `id` = '1' ");
         
      }
     if($update){
                $return['status'] = true;
                $return['error'] = false;
                $return['message']   = 'Thành công';
                die(json_encode($return));
            }else{
                $return['status'] = false;
                $return['error'] = true;
                $return['message']   = "Lỗi";
                die(json_encode($return));
            }
     }
     
   if($action=="xoa-momo"){
        
    
    
    
    $api_token = api_token();
    
     $check_admin = $VIP->get_row(" SELECT * FROM `users` WHERE `email` = '".$_SESSION['username']."'AND   `token` = '$api_token'  ");
 
    
    if(empty($api_token)){
        $return['status'] = false;
        $return['error'] = true;
        $return['message']   = "Thiếu API Token";
        die(json_encode($return));
    }
    
    if(!$check_admin){
        $return['status'] = false;
        $return['error'] = true;
        $return['message']   = "API Token không hợp lệ";
        die(json_encode($return));
    }
    
    if(empty($_SESSION['useradmin'])){
        $return['status'] = false;
        $return['error'] = true;
        $return['message']   = "Bạn không có quyền này !";
        die(json_encode($return));
    }
    
    $sdt     = check_string($_POST['sdt']);
    if(empty($sdt)){
        $return['status'] = false;
        $return['error'] = true;
        $return['message']   = "Vui lòng F5 !";
        die(json_encode($return));
    }else{
        $_get_momo = $VIP->get_row(" SELECT * FROM `cron_momo` WHERE `phone` = '$sdt' ");
        if(!$_get_momo){
            $return['status'] = false;
            $return['error'] = true;
            $return['message']   = "Không có momo này !";
            die(json_encode($return));
        }else{
            $remocve = $VIP->remove("cron_momo", "`phone` = '$sdt'");
            
              $remocve = $VIP->remove("phone", "`phone` = '$sdt'");
            if($remocve){
                $return['status'] = true;
                $return['error'] = false;
                $return['message']   = "Xóa  thành công !";
                die(json_encode($return));
            }else{
                $return['status'] = false;
                $return['error'] = true;
                $return['message']   = "Lỗi";
                die(json_encode($return));
            }
        }
    }
        

    }
    
    if($action=="settings"){
        
     
    

    
    
    
    
    
    $api_token = api_token();
    
     $check_admin = $VIP->get_row(" SELECT * FROM `users` WHERE `email` = '".$_SESSION['username']."'AND   `token` = '$api_token'  ");
 
    
    if(empty($api_token)){
        $return['status'] = false;
        $return['error'] = true;
        $return['message']   = "Thiếu API Token";
        die(json_encode($return));
    }
    
    if(!$check_admin){
        $return['status'] = false;
        $return['error'] = true;
        $return['message']   = "API Token không hợp lệ";
        die(json_encode($return));
    }
    
    if(empty($_SESSION['useradmin'])){
        $return['status'] = false;
        $return['error'] = true;
        $return['message']   = "Bạn không có quyền này !";
        die(json_encode($return));
    }
   
     foreach ($_POST as $key => $value)
    {
      
        
       $update  =   $VIP->update("settings", array(
            $key => $value
        ), " `id` = '1' ");
        
        
        
    }

 
         
      if($update){
            $return['status'] = true;
            $return['error'] = false;
            $return['message']   = "chỉnh sửa thành công !";
            die(json_encode($return));
        }else{
            $return['status'] = false;
            $return['error'] = true;
            $return['message']   = "Lỗi thực hiện #admin";
            die(json_encode($return));
        }
    
        
      
        

    }
  if($action=="login"){
        if(empty(check_string($_POST['email'])) || empty(check_string($_POST['password']))){
        $return['status'] = false;
        $return['error'] = true;
        $return['data'] = '<div class="alert alert-danger text-center" role="alert"><strong>Vui lòng nhập đầy đủ các trường còn thiếu!</strong></div>';
        $return['message']   = 'Vui lòng nhập đầy đủ các trường còn thiếu!';
        die(json_encode($return));
    }else{
      
            
                if(!$VIP->get_row(" SELECT * FROM `users` WHERE `email` = '".check_string($_POST['email'])."'"))
                {
                    $return['status'] = false;
                    $return['error'] = true;
                    $return['data'] = '<div class="alert alert-danger text-center" role="alert"><strong>Tên đăng nhập không tồn tại!</strong></div>';
                    $return['message']   = 'Tên đăng nhập không tồn tại!';
                    die(json_encode($return));
                }else{
                    $check_username = $VIP->get_row(" SELECT * FROM `users` WHERE `email` = '".check_string($_POST['email'])."' AND `password` = '".check_string(TypePassword($_POST['password']))."'");
                    if(!$check_username)
                    {
                        $return['status'] = false;
                        $return['error'] = true;
                        $return['data'] = '<div class="alert alert-danger text-center" role="alert"><strong> Mật khẩu bạn nhập không chính xác!</strong></div>';
                        $return['message']   = 'Mật khẩu bạn nhập không chính xác!';
                        die(json_encode($return));
                    }else{
                       
                           
                            
                          
                            
                            $_SESSION['username'] = check_string($_POST['email']);
                            $_SESSION['useradmin'] = $check_username['email'];
                           
    
                            $return['status'] = true;
                            $return['error'] = false;
                            $return['data'] = '<div class="alert alert-success text-center" role="alert"><strong>Đăng nhập thành công!</strong></div>';
                            $return['message']   = 'Đăng nhập thành công!';
                            die(json_encode($return));
                        
                    }
                }
            
        
  }
}



   
    
    if($action=="doi-mat-khau"){
        $api_token = api_token();
    
     $check_admin = $VIP->get_row(" SELECT * FROM `users` WHERE `email` = '".$_SESSION['username']."'AND   `token` = '$api_token'  ");
 
    
    if(empty($api_token)){
        $return['status'] = false;
        $return['error'] = true;
        $return['message']   = "Thiếu API Token";
        die(json_encode($return));
    }
    
    if(!$check_admin){
        $return['status'] = false;
        $return['error'] = true;
        $return['message']   = "API Token không hợp lệ";
        die(json_encode($return));
    }
    
    if(empty($_SESSION['useradmin'])){
        $return['status'] = false;
        $return['error'] = true;
        $return['message']   = "Bạn không có quyền này !";
        die(json_encode($return));
    }
    
    
    $old_password  = check_string($_POST['old_password']);
     
    $new_password = check_string($_POST['new_password']);
    
    $renew_password = check_string($_POST['renew_password']);
    
    
    if($new_password != $renew_password){
        $return['status'] = false;
        $return['error'] = true;
        $return['message']   = "Mật khẩu mới không giống nhau !";
        die(json_encode($return));
    }
       if(strlen(check_string($_POST['renew_password'])) < 6 || strlen(check_string($_POST['renew_password'])) > 32)
                {
                    $return['status'] = false;
                    $return['error'] = true;
                 
                    $return['message']   = 'Vui lòng nhập mật khẩu từ 6 đến 32 ký tự !';
                    die(json_encode($return));
                }
    
    if(TypePassword($old_password) != $check_admin['password']){
        $return['status'] = false;
        $return['error'] = true;
        $return['message']   = "Mật khẩu cũ không giống nhau !";
        die(json_encode($return));
    }
    
    
    $update = $VIP->update("users", [
        'password' => TypePassword($new_password),
        
        'time' => gettime(),
        
        
    ], " `email` = '".$check_admin['email']."' ");
    
    
        
        if($update){
            $return['status'] = true;
            $return['error'] = false;
            $return['message']   = "đổi thành công !";
            die(json_encode($return));
        }else{
            $return['status'] = false;
            $return['error'] = true;
            $return['message']   = "Lỗi thực hiện #ps";
            die(json_encode($return));
        }
    
    
    
    
    }
    
   if($action=="setting_games"){
          $api_token = api_token();
    
     $check_admin = $VIP->get_row(" SELECT * FROM `users` WHERE `email` = '".$_SESSION['username']."'AND   `token` = '$api_token'  ");
 
    
    if(empty($api_token)){
        $return['status'] = false;
        $return['error'] = true;
        $return['message']   = "Thiếu API Token";
        die(json_encode($return));
    }
    
    if(!$check_admin){
        $return['status'] = false;
        $return['error'] = true;
        $return['message']   = "API Token không hợp lệ";
        die(json_encode($return));
    }
       
       $service = check_string($_POST['service']);
       $status = check_string($_POST['status']);
       $name = check_string($_POST['name']);
       $mo_ta = $_POST['mo_ta'];
       
         $update = $VIP->update("danh_sach_game",
         [
        'status' => $status,
        'ten_game' => $name,
        'mo_ta' => $mo_ta,
        
         ]," `ma_game` = '$service' ");
       
       if($service == "chan-le")
       {
           $CMT_1  = check_string($_POST['comment_1']);
           $CMT_2  = check_string($_POST['comment_2']);
           $RATE  = check_string($_POST['tile']);
           
           $update_tile = $VIP->update("settings_game",
         [
        'tile' => $RATE,
         ]," `key` = '$service' ");
          $update_cmt_1 = $VIP->update("settings_game",
         [
        'comment' => $CMT_1,
         ]," `key` = '$service' AND `phan_game` = 'comment_1' ");
         
         $update_cmt_2 = $VIP->update("settings_game",
         [
        'comment' => $CMT_2,
         ]," `key` = '$service' AND `phan_game` = 'comment_2' ");
         
         
          
           
       }
        if($service == "tai-xiu")
       {
           $CMT_1  = check_string($_POST['comment_1']);
           $CMT_2  = check_string($_POST['comment_2']);
           $RATE  = check_string($_POST['tile']);
           
           $update_tile = $VIP->update("settings_game",
         [
        'tile' => $RATE,
         ]," `key` = '$service' ");
          $update_cmt_1 = $VIP->update("settings_game",
         [
        'comment' => $CMT_1,
         ]," `key` = '$service' AND `phan_game` = 'comment_1' ");
         
         $update_cmt_2 = $VIP->update("settings_game",
         [
        'comment' => $CMT_2,
         ]," `key` = '$service' AND `phan_game` = 'comment_2' ");
         
         
          
           
       }
        if($service == "chan-le-2")
       {
           $CMT_1  = check_string($_POST['comment_1']);
           $CMT_2  = check_string($_POST['comment_2']);
           $RATE  = check_string($_POST['tile']);
           
           $update_tile = $VIP->update("settings_game",
         [
        'tile' => $RATE,
         ]," `key` = '$service' ");
          $update_cmt_1 = $VIP->update("settings_game",
         [
        'comment' => $CMT_1,
         ]," `key` = '$service' AND `phan_game` = 'comment_1' ");
         
         $update_cmt_2 = $VIP->update("settings_game",
         [
        'comment' => $CMT_2,
         ]," `key` = '$service' AND `phan_game` = 'comment_2' ");
         
         
          
           
       }
       if($service == "tai-xiu-2")
       {
           $CMT_1  = check_string($_POST['comment_1']);
           $CMT_2  = check_string($_POST['comment_2']);
           $RATE  = check_string($_POST['tile']);
           
           $update_tile = $VIP->update("settings_game",
         [
        'tile' => $RATE,
         ]," `key` = '$service' ");
          $update_cmt_1 = $VIP->update("settings_game",
         [
        'comment' => $CMT_1,
         ]," `key` = '$service' AND `phan_game` = 'comment_1' ");
         
         $update_cmt_2 = $VIP->update("settings_game",
         [
        'comment' => $CMT_2,
         ]," `key` = '$service' AND `phan_game` = 'comment_2' ");
         
         
          
           
       }
       if($service == "1-phan-3")
       {
           $CMT_1  = check_string($_POST['comment_1']);
           $CMT_2  = check_string($_POST['comment_2']);
            $CMT_3  = check_string($_POST['comment_3']);
             $CMT_4  = check_string($_POST['comment_4']);
           $RATE1  = check_string($_POST['tile_1']);
           $RATE2  = check_string($_POST['tile_2']);
           $RATE3  = check_string($_POST['tile_3']);
           $RATE4 = check_string($_POST['tile_4']);
           
          
         
         
          $update_cmt_1 = $VIP->update("settings_game",
         [
        'tile' => $RATE1,
        'comment' => $CMT_1,
         ]," `key` = '$service' AND `phan_game` = 'comment_1' ");
         
         $update_cmt_2 = $VIP->update("settings_game",
         [
        'tile' => $RATE2,
        'comment' => $CMT_2,
         ]," `key` = '$service' AND `phan_game` = 'comment_2' ");
         
          $update_cmt_3 = $VIP->update("settings_game",
         [
        'tile' => $RATE3,
        'comment' => $CMT_3,
         ]," `key` = '$service' AND `phan_game` = 'comment_3' ");
          
            $update_cmt_4 = $VIP->update("settings_game",
         [
        'tile' => $RATE4,
        'comment' => $CMT_4,
         ]," `key` = '$service' AND `phan_game` = 'comment_4' ");
          
       }
        if($service == "tong-3-so")
       {
           $CMT_1  = check_string($_POST['comment_1']);
           $CMT_2  = check_string($_POST['comment_2']);
            $CMT_3  = check_string($_POST['comment_3']);
            
           $RATE1  = check_string($_POST['tile_1']);
           $RATE2  = check_string($_POST['tile_2']);
           $RATE3  = check_string($_POST['tile_3']);
          
           
          
         
         
          $update_cmt_1 = $VIP->update("settings_game",
         [
        'tile' => $RATE1,
        'comment' => $CMT_1,
         ]," `key` = '$service' AND `phan_game` = 'comment_1' ");
         
         $update_cmt_2 = $VIP->update("settings_game",
         [
        'tile' => $RATE2,
        'comment' => $CMT_2,
         ]," `key` = '$service' AND `phan_game` = 'comment_2' ");
         
          $update_cmt_3 = $VIP->update("settings_game",
         [
        'tile' => $RATE3,
        'comment' => $CMT_3,
         ]," `key` = '$service' AND `phan_game` = 'comment_3' ");
          
            
          
       }
       if($service == "h3")
       {
           $CMT_1  = check_string($_POST['comment_1']);
           $CMT_2  = check_string($_POST['comment_2']);
            $CMT_3  = check_string($_POST['comment_3']);
             $CMT_4  = check_string($_POST['comment_4']);
           $RATE1  = check_string($_POST['tile_1']);
           $RATE2  = check_string($_POST['tile_2']);
           $RATE3  = check_string($_POST['tile_3']);
           $RATE4 = check_string($_POST['tile_4']);
           
          
         
         
          $update_cmt_1 = $VIP->update("settings_game",
         [
        'tile' => $RATE1,
        'comment' => $CMT_1,
         ]," `key` = '$service' AND `phan_game` = 'comment_1' ");
         
         $update_cmt_2 = $VIP->update("settings_game",
         [
        'tile' => $RATE2,
        'comment' => $CMT_2,
         ]," `key` = '$service' AND `phan_game` = 'comment_2' ");
         
          $update_cmt_3 = $VIP->update("settings_game",
         [
        'tile' => $RATE3,
        'comment' => $CMT_3,
         ]," `key` = '$service' AND `phan_game` = 'comment_3' ");
          
            $update_cmt_4 = $VIP->update("settings_game",
         [
        'tile' => $RATE4,
        'comment' => $CMT_4,
         ]," `key` = '$service' AND `phan_game` = 'comment_4' ");
          
       }
       
       
        if($service == "doan-so")
       {
           $CMT_1  = check_string($_POST['comment_1']);
           $CMT_2  = check_string($_POST['comment_2']);
            $CMT_3  = check_string($_POST['comment_3']);
             $CMT_4  = check_string($_POST['comment_4']);
              $CMT_5  = check_string($_POST['comment_5']);
              $CMT_6  = check_string($_POST['comment_6']);
              $CMT_7  = check_string($_POST['comment_7']);
               $CMT_8  = check_string($_POST['comment_8']);
               $CMT_9  = check_string($_POST['comment_9']);
               $CMT_10  = check_string($_POST['comment_10']);
              
              
             
             
           $RATE1  = check_string($_POST['tile_1']);
           $RATE2  = check_string($_POST['tile_2']);
           $RATE3  = check_string($_POST['tile_3']);
           $RATE4 = check_string($_POST['tile_4']);
           $RATE5 = check_string($_POST['tile_5']);
          $RATE6 = check_string($_POST['tile_6']);
         $RATE7 = check_string($_POST['tile_7']);
         $RATE8 = check_string($_POST['tile_8']);
         $RATE9 = check_string($_POST['tile_9']);
             $RATE10 = check_string($_POST['tile_10']);
         
         
         
         
         
         
         
         
         
          $update_cmt_1 = $VIP->update("settings_game",
         [
        'tile' => $RATE1,
        'comment' => $CMT_1,
         ]," `key` = '$service' AND `phan_game` = 'comment_1' ");
         
         $update_cmt_2 = $VIP->update("settings_game",
         [
        'tile' => $RATE2,
        'comment' => $CMT_2,
         ]," `key` = '$service' AND `phan_game` = 'comment_2' ");
         
          $update_cmt_3 = $VIP->update("settings_game",
         [
        'tile' => $RATE3,
        'comment' => $CMT_3,
         ]," `key` = '$service' AND `phan_game` = 'comment_3' ");
          
            $update_cmt_4 = $VIP->update("settings_game",
         [
        'tile' => $RATE4,
        'comment' => $CMT_4,
         ]," `key` = '$service' AND `phan_game` = 'comment_4' ");
         
           $update_cmt_5 = $VIP->update("settings_game",
         [
        'tile' => $RATE5,
        'comment' => $CMT_5,
         ]," `key` = '$service' AND `phan_game` = 'comment_5' ");
         
           $update_cmt_6 = $VIP->update("settings_game",
         [
        'tile' => $RATE6,
        'comment' => $CMT_6,
         ]," `key` = '$service' AND `phan_game` = 'comment_6' ");
         
           $update_cmt_7 = $VIP->update("settings_game",
         [
        'tile' => $RATE7,
        'comment' => $CMT_7,
         ]," `key` = '$service' AND `phan_game` = 'comment_7' ");
         
           $update_cmt_8 = $VIP->update("settings_game",
         [
        'tile' => $RATE8,
        'comment' => $CMT_8,
         ]," `key` = '$service' AND `phan_game` = 'comment_8' ");
         
           $update_cmt_9 = $VIP->update("settings_game",
         [
        'tile' => $RATE9,
        'comment' => $CMT_9,
         ]," `key` = '$service' AND `phan_game` = 'comment_9' ");
         
           $update_cmt_10 = $VIP->update("settings_game",
         [
        'tile' => $RATE10,
        'comment' => $CMT_10,
         ]," `key` = '$service' AND `phan_game` = 'comment_10' ");
         
          
       }
       
       
        if($service == "xien")
       {
           $CMT_1  = check_string($_POST['comment_1']);
           $CMT_2  = check_string($_POST['comment_2']);
            $CMT_3  = check_string($_POST['comment_3']);
             $CMT_4  = check_string($_POST['comment_4']);
           $RATE1  = check_string($_POST['tile_1']);
           $RATE2  = check_string($_POST['tile_2']);
           $RATE3  = check_string($_POST['tile_3']);
           $RATE4 = check_string($_POST['tile_4']);
           
          
         
         
          $update_cmt_1 = $VIP->update("settings_game",
         [
        'tile' => $RATE1,
        'comment' => $CMT_1,
         ]," `key` = '$service' AND `phan_game` = 'comment_1' ");
         
         $update_cmt_2 = $VIP->update("settings_game",
         [
        'tile' => $RATE2,
        'comment' => $CMT_2,
         ]," `key` = '$service' AND `phan_game` = 'comment_2' ");
         
          $update_cmt_3 = $VIP->update("settings_game",
         [
        'tile' => $RATE3,
        'comment' => $CMT_3,
         ]," `key` = '$service' AND `phan_game` = 'comment_3' ");
          
            $update_cmt_4 = $VIP->update("settings_game",
         [
        'tile' => $RATE4,
        'comment' => $CMT_4,
         ]," `key` = '$service' AND `phan_game` = 'comment_4' ");
          
       }
       if($service == "lo")
       {
           $CMT_1  = check_string($_POST['comment_1']);
           $CMT_2  = check_string($_POST['comment_2']);
          
           $RATE1  = check_string($_POST['tile_1']);
           $RATE2  = check_string($_POST['tile_2']);
          
           
          
         
         
          $update_cmt_1 = $VIP->update("settings_game",
         [
        'tile' => $RATE1,
        'comment' => $CMT_1,
         ]," `key` = '$service' AND `phan_game` = 'comment_1' ");
         
         $update_cmt_2 = $VIP->update("settings_game",
         [
        'tile' => $RATE2,
        'comment' => $CMT_2,
         ]," `key` = '$service' AND `phan_game` = 'comment_2' ");
         
       
          
       }
         if($service == "g3")
       {
           $CMT_1  = check_string($_POST['comment_1']);
           $CMT_2  = check_string($_POST['comment_2']);
           $CMT_3  = check_string($_POST['comment_3']);
           $RATE1  = check_string($_POST['tile_1']);
           $RATE2  = check_string($_POST['tile_2']);
           $RATE3  = check_string($_POST['tile_3']);
           
          
         
         
          $update_cmt_1 = $VIP->update("settings_game",
         [
        'tile' => $RATE1,
        'comment' => $CMT_1,
         ]," `key` = '$service' AND `phan_game` = 'comment_1' ");
         
         $update_cmt_2 = $VIP->update("settings_game",
         [
        'tile' => $RATE2,
        'comment' => $CMT_2,
         ]," `key` = '$service' AND `phan_game` = 'comment_2' ");
           $update_cmt_3 = $VIP->update("settings_game",
         [
        'tile' => $RATE3,
        'comment' => $CMT_3,
         ]," `key` = '$service' AND `phan_game` = 'comment_3' ");
       
          
       }
       
       
       
       
       
       
       
       
       
       if($update){
           $return['status'] = true;
         $return['error'] = false;
         $return['message']   = "Chỉnh sửa trò chơi thành công ";
         die(json_encode($return));
       }
       else{
         
          $return['status'] = false;
         $return['error'] = true;
         $return['message']   = "Đã xảy ra lỗi !";
         die(json_encode($return));
       }
       
   }
     if($action=="setting_event"){
         
         
          $api_token = api_token();
    
     $check_admin = $VIP->get_row(" SELECT * FROM `users` WHERE `email` = '".$_SESSION['username']."'AND   `token` = '$api_token'  ");
 
    
    if(empty($api_token)){
        $return['status'] = false;
        $return['error'] = true;
        $return['message']   = "Thiếu API Token";
        die(json_encode($return));
    }
    
    if(!$check_admin){
        $return['status'] = false;
        $return['error'] = true;
        $return['message']   = "API Token không hợp lệ";
        die(json_encode($return));
    }
         
         $service = check_string($_POST['service']);
       $status = check_string($_POST['status']);
       $name = check_string($_POST['name']);
       $mo_ta = $_POST['mota'];
         
           $update = $VIP->update("event",
         [
        'trangthai' => $status,
        'game' => $name,
        'mota' => $mo_ta,
        
         ]," `key` = '$service' ");
       
       if($service == "diem-danh")
       {
           $min  = check_string($_POST['min']);
           $max  = check_string($_POST['max']);
          
           
           $update_tile = $VIP->update("event",
         [
        'thuong1' => $min,
        'thuong2' => $max,
        
         ]," `key` = '$service' ");
      
         
         
          
           
       }
       if($service == "nhiem-vu-ngay")
       {
           $moc1  = check_string($_POST['moc1']);
           $moc2  = check_string($_POST['moc2']);
           $moc3  = check_string($_POST['moc3']);
           $moc4  = check_string($_POST['moc4']);
           $moc5  = check_string($_POST['moc5']);
          $thuong1  = check_string($_POST['thuong1']);
          $thuong2  = check_string($_POST['thuong2']);
          $thuong3  = check_string($_POST['thuong3']);
          $thuong4  = check_string($_POST['thuong4']);
          $thuong5 = check_string($_POST['thuong5']);
           
           $update_tile = $VIP->update("event",
         [
        'thuong1' => $thuong1,
        'thuong2' => $thuong2,
        'thuong3' => $thuong3,
        'thuong4' => $thuong4,
        'thuong5' => $thuong5,
        'moc1' => $moc1,
        'moc2' => $moc2,
        'moc3' => $moc3,
        'moc4' => $moc4,
        'moc5' => $moc5,
        
         ]," `key` = '$service' ");
      
         
         
          
           
       }
         
           
       if($update){
           $return['status'] = true;
         $return['error'] = false;
         $return['message']   = "Chỉnh sửa event thành công ";
         die(json_encode($return));
       }
       else{
         
          $return['status'] = false;
         $return['error'] = true;
         $return['message']   = "Đã xảy ra lỗi !";
         die(json_encode($return));
       }
         
         
     }
   
      if($action=="top_up"){
         
         
          $api_token = api_token();
    
     $check_admin = $VIP->get_row(" SELECT * FROM `users` WHERE `email` = '".$_SESSION['username']."'AND   `token` = '$api_token'  ");
 
    
    if(empty($api_token)){
        $return['status'] = false;
        $return['error'] = true;
        $return['message']   = "Thiếu API Token";
        die(json_encode($return));
    }
    
    if(!$check_admin){
        $return['status'] = false;
        $return['error'] = true;
        $return['message']   = "API Token không hợp lệ";
        die(json_encode($return));
    }
         
     foreach ($_POST as $key => $value)
    {
      
        
       $update  =   $VIP->update("top_up", array(
            $key => $value
        ), " `id` = '1' ");
        
        
        
    }
           
       if($update){
           $return['status'] = true;
         $return['error'] = false;
         $return['message']   = "Chỉnh sửa top thành công ";
         die(json_encode($return));
       }
       else{
         
          $return['status'] = false;
         $return['error'] = true;
         $return['message']   = "Đã xảy ra lỗi !";
         die(json_encode($return));
       }
         
         
     }
   
   
   if($action == "giftcode"){
         $api_token = api_token();
    
     $check_admin = $VIP->get_row(" SELECT * FROM `users` WHERE `email` = '".$_SESSION['username']."'AND   `token` = '$api_token'  ");
 
    
    if(empty($api_token)){
        $return['status'] = false;
        $return['error'] = true;
        $return['message']   = "Thiếu API Token";
        die(json_encode($return));
    }
    
    if(!$check_admin){
        $return['status'] = false;
        $return['error'] = true;
        $return['message']   = "API Token không hợp lệ";
        die(json_encode($return));
    }
         
      $giftcode    = check_string($_POST['giftcode']);
       $money   = check_string($_POST['money']);
          $limit   = check_string($_POST['limit']);
          
          $check_code = $VIP->get_row(" SELECT * FROM `giftcode` WHERE `giftcode` = '$giftcode'  ");
          if($check_code){
              $return['status'] = false;
         $return['error'] = true;
         $return['message']   = "Đã tồn tại giftcode này !";
         die(json_encode($return));  
              
              
          }
           $insert = $VIP->insert("giftcode", [
                           'giftcode'=>$giftcode,
                            'money'          => $money,
                             'gioi_han'            => $limit,
                             'da_nhap'          => 0,
                                  'time'          => gettime(), 
                                            ]);
                                            
         
          if($insert){
           $return['status'] = true;
         $return['error'] = false;
         $return['message']   = "thêm giftcode thành công ";
         die(json_encode($return));
       }
       else{
         
          $return['status'] = false;
         $return['error'] = true;
         $return['message']   = "Đã xảy ra lỗi !";
         die(json_encode($return));
       }
         
         
   }
   
   
     if($action == "xoa-giftcode"){
         $api_token = api_token();
    
     $check_admin = $VIP->get_row(" SELECT * FROM `users` WHERE `email` = '".$_SESSION['username']."'AND   `token` = '$api_token'  ");
 
    
    if(empty($api_token)){
        $return['status'] = false;
        $return['error'] = true;
        $return['message']   = "Thiếu API Token";
        die(json_encode($return));
    }
    
    if(!$check_admin){
        $return['status'] = false;
        $return['error'] = true;
        $return['message']   = "API Token không hợp lệ";
        die(json_encode($return));
    }
         
      $giftcode    = check_string($_POST['giftcode']);
      
          
          $check_code = $VIP->get_row(" SELECT * FROM `giftcode` WHERE `giftcode` = '$giftcode'  ");
          if(!$check_code){
              $return['status'] = false;
         $return['error'] = true;
         $return['message']   = "Không tồn tại giftcode này !";
         die(json_encode($return));  
              
              
          }
    $DEL = $VIP->remove("giftcode", "`giftcode` = '$giftcode' ");
                                            
         
          if($DEL){
           $return['status'] = true;
         $return['error'] = false;
         $return['message']   = "Xóa giftcode thành công ";
         die(json_encode($return));
       }
       else{
         
          $return['status'] = false;
         $return['error'] = true;
         $return['message']   = "Đã xảy ra lỗi !";
         die(json_encode($return));
       }
         
         
   }
   
   
      if($action == "message"){
         $api_token = api_token();
    
     $check_admin = $VIP->get_row(" SELECT * FROM `users` WHERE `email` = '".$_SESSION['username']."'AND   `token` = '$api_token'  ");
 
    
    if(empty($api_token)){
        $return['status'] = false;
        $return['error'] = true;
        $return['message']   = "Thiếu API Token";
        die(json_encode($return));
    }
    
    if(!$check_admin){
        $return['status'] = false;
        $return['error'] = true;
        $return['message']   = "API Token không hợp lệ";
        die(json_encode($return));
    }
         
       foreach ($_POST as $key => $value)
    {
      
        
       $update  =   $VIP->update("message", array(
            $key => $value
        ), " `id` = '1' ");
        
        
        
    }
                                            
         
          if($update){
           $return['status'] = true;
         $return['error'] = false;
         $return['message']   = "chỉnh sửa message thành công ";
         die(json_encode($return));
       }
       else{
         
          $return['status'] = false;
         $return['error'] = true;
         $return['message']   = "Đã xảy ra lỗi !";
         die(json_encode($return));
       }
         
         
   }
   
   
   if($action == "check_bill"){
         $api_token = api_token();
    
     $check_admin = $VIP->get_row(" SELECT * FROM `users` WHERE `email` = '".$_SESSION['username']."'AND   `token` = '$api_token'  ");
 
    
    if(empty($api_token)){
        $return['status'] = false;
        $return['error'] = true;
        $return['message']   = "Thiếu API Token";
        die(json_encode($return));
    }
    
    if(!$check_admin){
        $return['status'] = false;
        $return['error'] = true;
        $return['message']   = "API Token không hợp lệ";
        die(json_encode($return));
    }
    
    
    $check_gd = $VIP->get_row(" SELECT * FROM `lich_su_choi` WHERE `tranId` = '".$_POST['mgd']."' ");
    
    if(!$check_gd){
     $return['status'] = false;
         $return['error'] = true;
         $return['message']   = "thất bại";
         $return['data']   = '<div class="alert alert-danger text-center" role="alert"><strong>Không tồn tại mã giao dịch này !</strong></div>';
         die(json_encode($return));   
    }
    else
    {
       $MSG = "SDT: ".$check_gd['phone'].", SDT NHẬN: ".$check_gd['phone_nhan'].", CTK: ".$check_gd['partnerName'].", SỐ TIỀN: ".$check_gd['amount_play'].", NỘI DUNG: ".$check_gd['comment'].", KẾT QUẢ: ".$check_gd['result_text']."<br> TRẢ THƯỞNG: ".$check_gd['status'];
         $return['status'] = true;
         $return['error'] = false;
         $return['message']   = "thành công ";
         $return['data']   = '<div class="alert alert-success text-center" role="alert"><strong>'.$MSG.'</strong></div>';
         die(json_encode($return)); 
    }
  
    
    
    
    
    
    
    
    
    
    
    
    
    
    
         
   }
   if($action == "them_sdt"){
         $api_token = api_token();
    
     $check_admin = $VIP->get_row(" SELECT * FROM `users` WHERE `email` = '".$_SESSION['username']."'AND   `token` = '$api_token'  ");
 
    
    if(empty($api_token)){
        $return['status'] = false;
        $return['error'] = true;
        $return['message']   = "Thiếu API Token";
        die(json_encode($return));
    }
    
    if(!$check_admin){
        $return['status'] = false;
        $return['error'] = true;
        $return['message']   = "API Token không hợp lệ";
        die(json_encode($return));
    }
    
    
    $sdt = $_POST['phone'];
     $min = $_POST['min'];
      $max = $_POST['max'];
       if(!$sdt){
          
           $return['status'] = false;
         $return['error'] = true;
         $return['message']   = "Thiếu Trường Số Điện Thoại !";
         die(json_encode($return));
      }
      if(!$min || !$max){
          
           $return['status'] = false;
         $return['error'] = true;
         $return['message']   = "Thiếu Trường Min, Max !";
         die(json_encode($return));
      }
      
      
      $chanle = $_POST['ma_chan-le'];
       $chanle2 = $_POST['ma_chan-le-2'];
        $taixiu = $_POST['ma_tai-xiu'];
         $taixiu2 = $_POST['ma_tai-xiu-2'];
          $motphan3 = $_POST['ma_1-phan-3'];
           $h3 = $_POST['ma_h3'];
            $tong3so = $_POST['ma_tong-3-so'];
             $doanso = $_POST['ma_doan-so'];
              $xien = $_POST['ma_xien'];
               $lo = $_POST['ma_lo'];
                $g3 = $_POST['ma_g3'];
      
      
      if($chanle)
      {
          $insert = $VIP->insert("phone", [
                           'phone'=>$sdt,
                            'min'          => $min,'status' => 'run',
                             'max'            => $max,
                             'ma_game'          => $chanle,
                                  
                                            ]);
      }
      if($chanle2)
      { 
          $insert = $VIP->insert("phone", [
                           'phone'=>$sdt,
                            'min'          => $min,'status' => 'run',
                             'max'            => $max,
                             'ma_game'          => $chanle2,
                                  
                                            ]);
      }
      if($taixiu)
      {
          $insert = $VIP->insert("phone", [
                           'phone'=>$sdt,
                            'min'          => $min,'status' => 'run',
                             'max'            => $max,
                             'ma_game'          => $taixiu,
                                  
                                            ]);
      }
      if($taixiu2)
      {
          $insert = $VIP->insert("phone", [
                           'phone'=>$sdt,
                            'min'          => $min,'status' => 'run',
                             'max'            => $max,
                             'ma_game'          => $taixiu2,
                                  
                                            ]);
      }
      if($motphan3)
      {
          $insert = $VIP->insert("phone", [
                           'phone'=>$sdt,
                            'min'          => $min,'status' => 'run',
                             'max'            => $max,
                             'ma_game'          => $motphan3,
                                  
                                            ]);
      }
      if($h3)
      {
          $insert = $VIP->insert("phone", [
                           'phone'=>$sdt,
                            'min'          => $min,'status' => 'run',
                             'max'            => $max,
                             'ma_game'          => $h3,
                                  
                                            ]);
      }
      if($tong3so)
      {
          $insert = $VIP->insert("phone", [
                           'phone'=>$sdt,
                            'min'          => $min,'status' => 'run',
                             'max'            => $max,
                             'ma_game'          => $tong3so,
                                  
                                            ]);
      }
      if($doanso)
      {
          $insert = $VIP->insert("phone", [
                           'phone'=>$sdt,
                            'min'          => $min,'status' => 'run',
                             'max'            => $max,
                             'ma_game'          => $doanso,
                                  
                                            ]);
      }
      if($xien)
      {
          $insert = $VIP->insert("phone", [
                           'phone'=>$sdt,
                            'min'          => $min,'status' => 'run',
                             'max'            => $max,
                             'ma_game'          => $xien,
                                  
                                            ]);
      }
      if($lo)
      {
          $insert = $VIP->insert("phone", [
                           'phone'=>$sdt,
                            'min'          => $min,'status' => 'run',
                             'max'            => $max,
                             'ma_game'          => $lo,
                                  
                                            ]);
      }
      if($g3)
      {
          $insert = $VIP->insert("phone", [
                           'phone'=>$sdt,
                            'min'          => $min,'status' => 'run',
                             'max'            => $max,
                             'ma_game'          => $g3,
                                  
                                            ]);
      }
      
       if($insert){
           $return['status'] = true;
         $return['error'] = false;
         $return['message']   = " thành công ";
         die(json_encode($return));
       }
       else{
         
          $return['status'] = false;
         $return['error'] = true;
         $return['message']   = "Đã xảy ra lỗi !";
         die(json_encode($return));
       }
      
      
      
      
   }
    if($action == "confg_sdt"){
         $api_token = api_token();
    
     $check_admin = $VIP->get_row(" SELECT * FROM `users` WHERE `email` = '".$_SESSION['username']."'AND   `token` = '$api_token'  ");
 
    
    if(empty($api_token)){
        $return['status'] = false;
        $return['error'] = true;
        $return['message']   = "Thiếu API Token";
        die(json_encode($return));
    }
    
    if(!$check_admin){
        $return['status'] = false;
        $return['error'] = true;
        $return['message']   = "API Token không hợp lệ";
        die(json_encode($return));
    }
    
    
    $sdt = $_POST['phone'];
     $ac = $_POST['ac'];
     
       if(!$sdt){
          
           $return['status'] = false;
         $return['error'] = true;
         $return['message']   = "Thiếu Trường Số Điện Thoại !";
         die(json_encode($return));
      }
      if(!$ac){
          
           $return['status'] = false;
         $return['error'] = true;
         $return['message']   = "Thiếu Hành Động !";
         die(json_encode($return));
      }
      if($ac == "delete")
      {
          $AC_ = $VIP->remove("phone", "`phone` = '$sdt' ");
      }
     else
     {
      $AC_ =   $VIP->update("phone", array(
            'status' => $ac
        ), " `phone` = '$sdt' ");
     }
      
       if($AC_){
           $return['status'] = true;
         $return['error'] = false;
         $return['message']   = " thành công ";
         die(json_encode($return));
       }
       else{
         
          $return['status'] = false;
         $return['error'] = true;
         $return['message']   = "Đã xảy ra lỗi !";
         die(json_encode($return));
       }
      
      
      
      
   }

}