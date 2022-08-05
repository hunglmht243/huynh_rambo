<?php
    include 'momo.php'; 
    $getdl2 = $VIP->get_row("SELECT * FROM `event` WHERE  `key` = 'diem-danh' AND `trangthai` = 'run'");  
         
           $thuong1 = $getdl2['thuong1'];
           
           $thuong2 = $getdl2['thuong2'];
       
         
           
if(isset($_POST['Phone']))
{
$sdtchoi = htmlspecialchars($_POST['Phone']);
$money = rand($thuong1,$thuong2);


$now = date("Y-m-d");
$lanchoi = $VIP->num_rows("SELECT * FROM `lich_su_choi` WHERE `phone` = '$sdtchoi' AND `time` >= '$now 00:00:00'"); 

if($lanchoi == 0){
    
        $return['status'] = 'error';
        $return['msg']   = "Số điện thoại này hôm nay chưa chơi trên hệ thống !";
        die(json_encode($return));  
   
}else{
     $get_usser = $VIP->get_row("SELECT * FROM `diemdanh_user` WHERE  `sdt` = '".$_POST['Phone']."'");    
    
    if($get_usser){
        
         $return['status'] = 'error';
        $return['msg']   = "Số này đã điểm danh !";
            die(json_encode($return));  
        
    }
    $VIP->insert("diemdanh_user",
    [
     'sdt'    => $sdtchoi,
       'money' => $money,
      'time' => gettime(),
      'trangthai' => 0
        ]
    
    );
    
     

      $return['status'] = 'success';
        $return['msg']   = "Đã điểm danh chờ kết quả !";
            die(json_encode($return));  
    
}}
else
{

$return['status'] = 'error';
        $return['msg']   = "Vui lòng nhập số momo !";
        die(json_encode($return));  

}
?>