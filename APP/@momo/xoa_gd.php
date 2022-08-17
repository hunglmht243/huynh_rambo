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


$CRON_MOMO = $VIP->get_row(" SELECT * FROM `cron_momo` ");
//print_r($CRON_MOMO);
    
$today = date("Y-m-d H:i:s");
$next_day = date('Y-m-d H:i:s',strtotime('+1 day',strtotime(date("Y-m-d 00:00:00"))));

   if (strtotime($today) <= strtotime($CRON_MOMO['time'])) 
   {
        $FAKE_TOP_num=$VIP->num_rows("SELECT * FROM `lich_su_choi` WHERE `partnerName` = 'toptuan'");
        //echo( $FAKE_TOP_num.'  ');
        if($FAKE_TOP_num == 0){        
            for ($x = 0; $x < 20; $x++) { 
                $sdt_random= $generator->visit($ast);
                $amount_random= rand(200,500)*1000;                
                $VIP->insert("lich_su_choi", ['phone' => (string)$sdt_random, 'phone_nhan' => '', 'tranId' => '', 'partnerName' => 'toptuan', 'id_momo' => '', 'amount_play' => (string)$amount_random, 'amount_game' => '', 'comment' => '', 'game' => '', 'ma_game' => '', 'result' => 'success', 'result_text' => '', 'type_gd' => 'real', 'status' => 'success', 'result_number' => 1, 'time_tran' => strtotime(gettime()) , 'time' => gettime() ]);

            }
        }
  
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
         
         date_default_timezone_set('Asia/Ho_Chi_Minh');
         $weekday = date("l");
         $weekday = strtolower($weekday);

         if($weekday=='monday'){
            $VIP->remove('lich_su_choi', "`partnerName` = 'toptuan' ");
         } else {           
               $FAKE_TOP=$VIP->get_list("SELECT * FROM `lich_su_choi` WHERE `partnerName` = 'toptuan' ");
                foreach ($FAKE_TOP as $row){
                $VIP->update("lich_su_choi", [
                        'amount_play' => (int)$row['amount_play']+ rand(400,1000)*1000,
                    ], " `id` = '".$row['id']."' ");
                }                   
         }   

   }





  