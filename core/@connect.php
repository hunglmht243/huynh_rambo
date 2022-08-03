<?php

// Require các thư viện PHP
require_once(realpath($_SERVER["DOCUMENT_ROOT"]) .'/core/@data.php');
require_once(realpath($_SERVER["DOCUMENT_ROOT"]) .'/core/Session.php');
require_once(realpath($_SERVER["DOCUMENT_ROOT"]) .'/core/@function.php');
// require_once(realpath($_SERVER["DOCUMENT_ROOT"]) .'/core/phpmailer.php');

// Kết nối database
$VIP = new VIP();
$VIP->connect();
$VIP->set_char('utf8');

// Thông tin chung

//$_DOMAIN = "https://".$_SERVER["SERVER_NAME"]."/";
function getMyUrl($path)
{
  $protocol = (!empty($_SERVER['HTTPS']) && (strtolower($_SERVER['HTTPS']) == 'on' || $_SERVER['HTTPS'] == '1')) ? 'https://' : 'http://';
  $server = $_SERVER['SERVER_NAME'];
  $port = $_SERVER['SERVER_PORT'] ? ':'.$_SERVER['SERVER_PORT'] : '';
  return $protocol.$server.$port.'/'.$path;
}
$root = $_SERVER["DOCUMENT_ROOT"];
//Thời gian
date_default_timezone_set('Asia/Ho_Chi_Minh'); 
$date_current = '';
$date_current = date("Y-m-d H:i:sa");
$date_now = '';
$date_now = date("Y-m-d");
$time_now = time();   
$day = date('d',time());
$month = date('m',time());
$year = date('Y',time());

// Khởi tạo session
$session = new Session();
$session->start();
$_SESSION['csrf-token'] = "";
if(!$_SESSION['csrf-token'] || $_SESSION['csrf-token'] = "") {
   $_SESSION['csrf-token'] = random('qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM123456789', '44');
   $_SESSION['session'] = createToken();
   setcookie("COCAILON_BUG_NHE_BY_NQH",$_SESSION['csrf-token']);
   setcookie("session", $_SESSION['session']);
}
$settings = $VIP->fetch_assoc("SELECT * FROM `settings` WHERE `id` = '1' LIMIT 1", 1);

// function getMyUrl($url)
// {
//     global $_DOMAIN;
//     return $_DOMAIN.$url;
// }
 
function api_token() {
    $headers = array();
    foreach($_SERVER as $key => $value) {
        if (substr($key, 0, 5) <> 'HTTP_') {
            continue;
        }
        $header = str_replace(' ', '-', ucwords(str_replace('_', ' ', strtolower(substr($key, 5)))));
        $headers[$header] = $value;
    }
    return $headers['Api-Token'];
}
function curl_get($url)
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $data = curl_exec($ch);
    
    curl_close($ch);
    return $data;
}
// Nếu đăng nhập
if (is_client())
{
    // Lấy dữ liệu tài khoản
    $sql_accounts = "SELECT * FROM users WHERE username = '".$VIP->real_escape_string($_SESSION['user'])."'";
    if ($VIP->num_rows($sql_accounts))
    {
        $accounts = $VIP->fetch_assoc($sql_accounts, 1);
        $session_pass = !empty($_SESSION['pass']) ? $_SESSION['pass'] : '';
        if(!empty($session_pass) && $session_pass != $accounts['password']){$session->destroy();die('Hãy đăng nhập lại !');}
    }else{
        $session->destroy();die('Hãy đăng nhập lại !');
    }
    
}

?>