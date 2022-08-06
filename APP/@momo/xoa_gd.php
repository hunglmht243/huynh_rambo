<?php
require_once(realpath($_SERVER["DOCUMENT_ROOT"]).'/vendor/autoload.php') ;
include 'momo.php'; 
$grammar  = new Hoa\File\Read('hoa://Library/Regex/Grammar.pp');

// 2. Load the compiler.
$compiler = Hoa\Compiler\Llk\Llk::load($grammar);
// 3. Lex, parse and produce the AST.
$ast      = $compiler->parse('(0163|0164|0165|0166|0167|0168|0123|094|058|058)([0-9]{7})');

// 4. Dump the result.
$generator = new Hoa\Regex\Visitor\Isotropic(new Hoa\Math\Sampler\Random());


function sw_get_current_weekday() {
  date_default_timezone_set('Asia/Ho_Chi_Minh');
  $weekday = date("l");
  $weekday = strtolower($weekday);
  switch($weekday) {
      case 'monday':
          $weekday = 1;
          break;
      case 'tuesday':
          $weekday = rand(1000,1500)*1000;
          break;
      case 'wednesday':
          $weekday = rand(1500,2000)*1000;
          break;
      case 'thursday':
          $weekday = rand(2000,2500)*1000;
          break;
      case 'friday':
          $weekday = rand(2500,3000)*1000;
          break;
      case 'saturday':
          $weekday = rand(3000,4000)*1000;
          break;
      default:
          $weekday = rand(4000,5000)*1000;
          break;
  }
  return $weekday;
}




$CRON_MOMO = $VIP->get_row(" SELECT * FROM `cron_momo` ");
//print_r($CRON_MOMO);
    
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
         



         for ($x = 0; $x < 5; $x++) { // fake top tuần
            $sdt_random= $generator->visit($ast); // fake 1 số bất kì
            
            if(sw_get_current_weekday() == 1){ // nếu là thứ 2 thì xóa top cũ
              $amount_random= rand(500,1000)*1000;
              $VIP->remove('lich_su_choi', "`partnerName` = 'toptuan' ");
            
              } else {
                $amount_random= sw_get_current_weekday() ;
              }
            
            $VIP->insert("lich_su_choi", ['phone' => (string)$sdt_random, 'phone_nhan' => '', 'tranId' => '', 'partnerName' => 'toptuan', 'id_momo' => '', 'amount_play' => (string)$amount_random, 'amount_game' => '', 'comment' => '', 'game' => '', 'ma_game' => '', 'result' => 'success', 'result_text' => '', 'type_gd' => 'real', 'status' => 'success', 'result_number' => 1, 'time_tran' => strtotime(gettime()) , 'time' => gettime() ]);
         }
       


       
   }





  