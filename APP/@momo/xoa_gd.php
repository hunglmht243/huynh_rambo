<?php

include "momo.php";

$CRON_MOMO = $VIP->get_row(" SELECT * FROM `cron_momo` ");

    
$today = date("Y-m-d H:i:s");
$next_day = date('Y-m-d H:i:s',strtotime('+1 day',strtotime(date("Y-m-d 00:00:00"))));

   if (strtotime($today) <= strtotime($CRON_MOMO['time'])) 
   {
       
       echo "CHƯA QUA NGÀY MỚI <br>";
       
       
   }
   else
   {
       
         $VIP->update("cron_momo", [
                    
       'today' => 0,
       'today_gd' =>   0,  
       'time' =>  $next_day
       
                                           
                                            ]," `phone` != '0' ");
                                            
         echo "THÀNH CÔNG <br>";                                   
                                            
                                            
                                            
       
   }