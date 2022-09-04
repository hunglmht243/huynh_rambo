<?php

include "momo.php";
header("content-type: application/json;charset=utf-8");
$serverdb = SERVERNAME; // server data base
$udb = USERNAME; // user database
$pdb = PASSWORD; // pass database
$ndb = DATABASE; // name database

$AUTO_connect = mysqli_connect($serverdb, $udb, $pdb, $ndb);

if ($AUTO_connect->connect_error) {
    $return['status'] = false;
    $return['error'] = true;
    $return['message']   = $AUTO_connect->connect_error;
    die(json_encode($return));
}

$AUTO_connect->query("set names 'utf8' ");
@$momo = new MOMO($AUTO_connect);
$requai = '';

$api_token = api_token();




$action = check_string($_POST['action']);

if (!empty($action)) {

    $act = check_string($_POST['act']);

    switch ($action) {
        case 'loginmomo':
            if (!empty($act)) {

                $phonemomo = check_string($_POST['phonemomo']);
                $passmomo = check_string($_POST['passmomo'])  ;
                

                if (!empty($phonemomo)) {
                    switch ($act) {
                        case 'sendotp':
                            $requai = $momo->LoadData($phonemomo)->SendOTP();
                            if ($requai['status'] == 'success') {
                                $return['status'] = true;
                                $return['step'] = 'veryotp';
                                $return['message']   = $requai['message'];
                                die(json_encode($return));
                            } else {
                                $return['status'] = false;
                                $return['message']   = $requai['message'];
                                die(json_encode($return));
                            }
                            break;

                        case 'veryotp':
                            $codeotp = check_string($_POST['codeotp']) ;
                            if (!empty($codeotp)) {
                                $requai = $momo->LoadData($phonemomo)->ImportOTP($codeotp);
                                if ($requai['status'] == 'success') {
                                    $return['status'] = true;
                                    $return['step'] = 'login';
                                    $return['message']   = $requai['message'];
                                    die(json_encode($return));
                                } else {
                                    $return['status'] = false;
                                    $return['message']   = $requai['message'];
                                    die(json_encode($return));
                                }
                            } else {
                                $return['status'] = false;
                                $return['message']   = 'Thiếu mã otp';
                                die(json_encode($return));
                            }

                            break;

                        case 'login':
                            if (!empty($passmomo)) {
                                $requai = $momo->LoadData($phonemomo)->LoginUser($passmomo);
                                if ($requai['status'] == 'success') {
                                    $return['status'] = true;
                                    $return['step'] = 'SUCCESS';
                                    $return['message']   = $requai['message'];
                                    die(json_encode($return));
                                } else {
                                    $return['status'] = false;
                                    $return['message']   = $requai['message'];
                                    die(json_encode($return));
                                }
                            } else {
                                $return['status'] = false;
                                $return['message']   = 'Thiếu mã otp';
                                die(json_encode($return));
                            }
                            break;

                        default:
                            $return['status'] = false;
                            $return['message']   = "Thiếu số điện thoại";
                            die(json_encode($return));
                            break;
                    }
                } else {
                    $return['status'] = false;
                    $return['message']   = "Thiếu số điện thoại";
                    die(json_encode($return));
                }
            } else {
                $return['status'] = false;
                $return['message']   = "Thiếu số điện thoại";
                die(json_encode($return));
            }
            break;

        default:
            $return['status'] = false;
            $return['message']   = "Thiếu số điện thoại";
            die(json_encode($return));
            break;
    }
} else {
    $return['status'] = false;
    $return['message']   = "Thiếu số điện thoại";
    die(json_encode($return));
}
