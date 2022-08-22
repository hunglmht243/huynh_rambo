<?php
include '../inc/config.php'; // config hệ thông
include 'momo/functions_momo.php';


function cut3($e)
{
    
  return(substr((string)$e, -3));
}

function cut2($e)
{
    
  return(substr((string)$e, -2));
}



// $sodu = mysql_fetch_assoc(mysql_query("SELECT * FROM `sxmb` WHERE  `id` = 2"));
// print_r($sodu);

date_default_timezone_set('Asia/Ho_Chi_Minh');
$today= date('d')."-".date('m')."-".date('Y');

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://xoso.me/embedded/kq-mienbac?ngay_quay=".$today);
curl_setopt($ch, CURLOPT_REFERER, 'ref page');
curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/4.0 (compatible; MSIE 5.01; Windows NT 5.0)');
curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
$page = curl_exec($ch);

curl_close($ch);

 if($page) {
     preg_match_all('#<span data-nc(.+?)</span>#is',$page, $matches);  
  
      $result_2so= array_map("cut2",$matches[1]);
      $result_3so= array_map("cut3",$matches[1]);
    //   print_r($result_3so);
     $Giaidau=array();
     $giaisau=array();
     $Giai3so=array();
     for ($x = 0; $x <4; $x++) {
          $Giaidau[]=(int) $result_2so[$x];
          
          $Giai3so[]=(int) $result_3so[$x];
        }
    for ($x = 4; $x <27; $x++) {
          $giaisau[]=(int) $result_2so[$x];
        }
        echo json_encode($Giaidau);
        echo json_encode($giaisau);
        echo json_encode($Giai3so);
     mysql_query("delete from sxmb");
     mysql_query("INSERT INTO sxmb SET Giaidau = '".json_encode($Giaidau)."',	giaisau = '".json_encode($giaisau)."',	Giai3so = '".json_encode($Giai3so)."'  ");
     
 }
 else {echo('loi');}
 
    


