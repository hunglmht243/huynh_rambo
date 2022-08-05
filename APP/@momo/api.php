<?php
//FILE CRON
include "momo.php";

// if (file_exists('cron.txt'))
// {
//     header('Location: /');
//     exit;
// }
// else
// {
//     $k = fopen('cron.txt', 'a+');
//     fwrite($k, 'true');
// }

$get_cmt = $VIP->get_row("SELECT * FROM `message`");
$getlist_momo = $VIP->get_list("SELECT * FROM `cron_momo` WHERE `status` = 'success' ORDER BY `id` ASC ");
if ($getlist_momo)
{
    #1
    foreach ($getlist_momo as $rows)
    {
        #2
        
        $gethistt = $momo->LoadData($rows['phone'])->CheckHistory(2);    //////// bản noti 
        //$gethistt = $momo->LoadData($rows['phone'])->GET_HISTORY();   /////// bản api.momo.vn
        $requestkeyRaw = $gethistt['requestkeyRaw'];
        $requestkey= $gethistt['requestkey'];
        //die();
        if ($gethistt['momoMsgHistory'] != null)
        {
            foreach ($gethistt['momoMsgHistory'] as $ROWHIST)
            {
                #3
                $ID_momo = $ROWHIST['ID'];
                $tranId = $ROWHIST['tranId']; //MÃ GIAO DỊCH
                $partnerID = $ROWHIST['partnerID']; //SỐ ĐIỆN THOẠI
                $comment = $ROWHIST['comment']; //NỘI DUNG GIAO DỊCH
                $amount = $ROWHIST['amount']; //SỐ TIỀN GIAO DỊCH
                $partnerName = $ROWHIST['partnerName']; //NGƯỜI CHUYỂN

                $gettranId = $VIP->get_row("SELECT * FROM `lich_su_choi` WHERE `tranId` = '$tranId'");
                $gettranId_momo = $VIP->get_row("SELECT * FROM `lich_su_choi` WHERE `id_momo` = '$ID_momo'");
                if($gettranId || $gettranId_momo) //////// bản noti
                {
                    echo "ĐÃ TỒN TẠI MÃ GIAO DỊCH: ".$tranId." ❎<br>\n";
                }
                else
                {

                // if ($comment !== '') /////// bản api.momo.vn
                //  {

                    $RESULT_PLAY = KETQUA_BILL($comment, $tranId);

                    if ($RESULT_PLAY['status'] == "error")
                    {

                        $GHI_DTB = $VIP->insert("lich_su_choi", ['phone' => $partnerID, 'phone_nhan' => $rows['phone'], 'tranId' => $tranId, 'partnerName' => $partnerName, 'id_momo' => $ID_momo, 'amount_play' => $amount, 'amount_game' => 0, 'comment' => $comment, 'game' => $RESULT_PLAY['game'], 'ma_game' => $RESULT_PLAY['key'], 'result' => $RESULT_PLAY['status'], 'result_text' => $RESULT_PLAY['message'], 'type_gd' => 'real', 'status' => 'success', 'result_number' => 0, 'time_tran' => strtotime(gettime()) , 'time' => gettime() ]);
                        if ($GHI_DTB)
                        {
                            echo "CRON THÀNH CÔNG : " . $tranId . " ✅<br>\n";
                        }
                        else
                        {
                            echo "CRON KHÔNG THÀNH CÔNG, KHÔNG THỂ GHI DỮ LIỆU : " . $tranId . " ⛔<br>\n";
                        }

                    }

                    if ($RESULT_PLAY['status'] == "success")
                    {

                        $get_minmax = $VIP->get_row("SELECT * FROM `phone` WHERE `phone` = '" . $rows['phone'] . "' AND `ma_game` = '" . $RESULT_PLAY['key'] . "' ");

                        if ($get_minmax)
                        {
                            if ($amount < $get_minmax['min'] || $amount > $get_minmax['max'])
                            {
                                echo "TIỀN CHƠI KHÔNG HỢP LỆ : " . $tranId . " ⭕<br>\n";

                                $VIP->insert("lich_su_choi", ['phone' => $partnerID, 'phone_nhan' => $rows['phone'], 'tranId' => $tranId, 'partnerName' => $partnerName, 'id_momo' => $ID_momo, 'amount_play' => $amount, 'amount_game' => 0, 'comment' => $comment, 'game' => $RESULT_PLAY['game'], 'ma_game' => $RESULT_PLAY['key'], 'result' => $RESULT_PLAY['status'], 'result_text' => 'TIỀN CHƠI KHÔNG HỢP LỆ', 'type_gd' => 'real', 'status' => 'success', 'result_number' => 0, 'time_tran' => strtotime(gettime()) , 'time' => gettime() ]);
                            }
                            else
                            {

                                $ti_le = $RESULT_PLAY['tile'];

                                $tien_nhan = so_nguyen($amount * $ti_le);

                                $msg_send = $get_cmt['msg_game'] . " MGD: " . $tranId;

                                $GHI_GAME = $VIP->insert("lich_su_choi", ['phone' => $partnerID, 'phone_nhan' => $rows['phone'], 'tranId' => $tranId, 'partnerName' => $partnerName, 'id_momo' => $ID_momo, 'amount_play' => $amount, 'amount_game' => $tien_nhan, 'comment' => $comment, 'game' => $RESULT_PLAY['game'], 'ma_game' => $RESULT_PLAY['key'], 'result' => $RESULT_PLAY['status'], 'result_text' => $RESULT_PLAY['message'], 'type_gd' => 'real', 'status' => '', 'result_number' => 1, 'time_tran' => strtotime(gettime()) , 'time' => gettime() ]);

                                if ($GHI_GAME)
                                {

                                    $result_pay = $momo->LoadData($rows['phone'])->SendMoney($partnerID, $tien_nhan, $msg_send,$requestkeyRaw,$requestkey);
                                    $data_send = $result_pay["full"];
                                    if(!$result_pay["full"]){
                                        print_r($result_pay);
                                        //die('lỗi');
                                    }

                                    if ($result_pay["status"] == "success")
                                    {
                                        $SEND_BILL = $VIP->insert("chuyen_tien", ['momo_id' => $result_pay["tranDList"]["ID"], 'type_gd' => 'game', 'tranId' => $result_pay["tranDList"]["tranId"], 'partnerId' => $result_pay["tranDList"]["partnerId"], 'partnerName' => $result_pay["tranDList"]["partnerName"], 'amount' => $result_pay["tranDList"]["amount"], 'comment' => $result_pay["tranDList"]["comment"], 'status' => $result_pay["status"], 'message' => $result_pay["message"], 'data' => $data_send, 'balance' => $result_pay["tranDList"]["balance"], 'ownerNumber' => $result_pay["tranDList"]["ownerNumber"], 'ownerName' => $result_pay["tranDList"]["ownerName"], 'type' => 1,

                                        'time' => time() ]);

                                        $TTB = $VIP->update("lich_su_choi", ['status' => $result_pay["status"], 'msg_send' => $result_pay["message"]], " `tranId` = '$tranId'  ");

                                    }
                                    elseif ($result_pay["status"] != "success")
                                    {
                                        $VIP->update("lich_su_choi", ['status' => 'error', 'msg_send' => $result_pay["message"]], " `tranId` = '$tranId'  ");

                                    }

                                    echo "CRON THÀNH CÔNG : " . $tranId . " ✅<br>\n";

                                }
                                else
                                {
                                    echo "CRON KHÔNG THÀNH CÔNG, KHÔNG THỂ GHI DỮ LIỆU : " . $tranId . " ⛔<br>\n";
                                }

                            }
                        }

                        else
                        {
                            echo "KHÔNG TỒN TẠI MOMO NÀY, MOMO ĐÃ BỊ TẮT : " . $tranId . " ⭕<br>\n";
                        }

                    }

                }
                // else {
                //     $VIP->insert("lich_su_choi", ['phone' => $partnerID, 'phone_nhan' => $rows['phone'], 'tranId' => $tranId, 'partnerName' => $partnerName, 'id_momo' => $ID_momo, 'amount_play' => $amount, 'amount_game' => 0, 'comment' => $comment, 'time_tran' => strtotime(gettime()) , 'time' => gettime() ]);
                // }

                #END3
                
            }

        }
        else
        {

            echo "KHÔNG CÓ GIAO DỊCH NÀO🅾<br>\n";
        }

        echo "<pre>";
        //print_r($gethistt);

        #END2
        
    }

    #END1
    
}

//unlink('cron.txt');

?>
