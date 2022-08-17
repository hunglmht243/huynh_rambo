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



////////// fake lsgd 
$e=(int ) round(microtime(true) * 1000) % 1000;
if($e % 9 == 0) { // nếu chia hết thì mới add
  $phone=$VIP->get_row("SELECT * FROM `phone` WHERE  `status`= 'run' ORDER BY RAND()"); // lấy bất kì 1 phone đang run
  //$ratio= $VIP->get_row("SELECT * FROM `settings_game` WHERE  `key`= 'chan-le' ORDER BY RAND()");
  
  $sdt_random= $generator->visit($ast); // fake 1 số bất kì
  $amount_random= rand(5,47)*1000;
  
  $game_id_ran= rand(1,8);
  $game_id_row= $VIP->get_row("SELECT * FROM `settings_game` WHERE  `id`= '".$game_id_ran."' ");
  $game= $VIP->get_row("SELECT `ten_game` FROM `danh_sach_game` WHERE  `ma_game`= '".$game_id_row['key']."' ");
  //echo($game);
  $inserted_row= $VIP->insert("lich_su_choi", ['phone' => (string)$sdt_random, 'phone_nhan' => (string)$phone['phone'], 'tranId' => '', 'partnerName' => 'random', 'id_momo' => '', 'amount_play' => (string)$amount_random, 'amount_game' => (string)($amount_random*$game_id_row['tile']), 'comment' => $game_id_row['comment'], 'game' => $game['ten_game'], 'ma_game' => $game_id_row['key'], 'result' => 'success', 'result_text' => '', 'type_gd' => 'real', 'status' => 'success', 'result_number' => 1, 'time_tran' => strtotime(gettime()) , 'time' => gettime() ]);
  //print_r($inserted_row);
  //$h=(int ) round(microtime(true) * 1000) % 1000;
  if($e % 36 == 0) { // đếm chậm lại
    $VIP->query("UPDATE `cron_momo` SET `today` = `today` + '".$amount_random."',`month` = `month` + '".$amount_random."',`today_gd` = `today_gd` + 1 WHERE `phone` = '".(string)$phone['phone']."' ");
  }
  // xóa bớt row trước đó
  $fake_row_array= $VIP->get_list("SELECT * FROM `lich_su_choi` WHERE `partnerName` ='random'  LIMIT 6 ");
  
  if (count($fake_row_array)==6) {
    $VIP->remove('lich_su_choi', "`id` = '".$fake_row_array[0]['id']."' ");
  }
}







//////// fake diem danh
$getdl2 = $VIP->get_row("SELECT * FROM `event` WHERE  `key` = 'diem-danh' AND `trangthai` = 'run'");  
         
$thuong1 = $getdl2['thuong1'];

$thuong2 = $getdl2['thuong2'];

//if($e  == 0) {
$money = rand($thuong1,$thuong2);
$sdtchoi= $generator->visit($ast);
$VIP->insert("diemdanh_user",
[
 'sdt'    => (string)$sdtchoi,
   'money' => (string)$money,
  'time' => gettime(),
  'trangthai' => 0,
  'fake' => true
    ]

);
//}

if($e % 7 == 0) {
$money = rand($thuong1,$thuong2);
$sdtchoi= $generator->visit($ast);
$VIP->insert("diemdanh_user",
[
 'sdt'    => (string)$sdtchoi,
   'money' => (string)$money,
  'time' => gettime(),
  'trangthai' => 0,
  'fake' => true
    ]

);
}

