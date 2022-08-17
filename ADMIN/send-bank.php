<?php
require('public/head.php'); 
require('public/nav.php'); 
?>
<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header">
                <h3 class="mb-0">Nhập thông tin</h3>
            </div>
            <div class="card-body">
              <form submit-ajax="VIP"  action="<?=getMyUrl('api/e/chuyentien-bank');?>" method="post" ?>
                <input type="hidden" name="_token" value="tVjXfr7sEdKf63XpMdYuGZ7wm90Bfptbq3YEq">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-control-label" for="bankcode">Chọn tài khoản chuyển</label>
                                <select class="form-control" id="id_momo" name="id_momo">
                                     <option value=""> -- Chọn Số MOMO --</option>
                                    <?php
                                     $result = $VIP->get_list("SELECT * FROM `cron_momo` WHERE `status` = 'success' ORDER BY `id` ASC ");
                                     foreach($result as $sdt){
                                         
                                     ?>
                                     
                                    <option value="<?=$sdt['phone'];?>"> <?=$sdt['phone'];?> - Số Dư: <?=$sdt['BALANCE'];?></option>
                                     <?php }?>
                                </select>
                                
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-control-label" for="phone">Chọn ngân hàng</label>
                                <select class="form-control" id="bankcode" name="bankcode">
                                    <option value="0"> - Chọn Ngân Hàng - </option>
                                    <?php
                                   $tmpDiscount = json_decode(file_get_contents(getMyUrl('ADMIN/list_bank.json')),true);
                                   $bankname = array();
                                   $codebank = array();
                                   $shortbank = array();
                                   foreach ($tmpDiscount['napasBanks'] as $value) {
                                       $bankCode = $value['bankCode'];
                                       $bankName = $value['bankName'];
                                       $shortBankName = $value['shortBankName'];
                                       if (!in_array($bankCode, $codebank)) {
                                        $codebank[$shortBankName] = $bankCode;
                                    }
                                    if (!array_key_exists($bankCode, $bankname)) {
                                        $bankname[$bankCode] = array();
                                    }
                                    $bankname[$bankCode] = $bankName;
                                    if (!array_key_exists($bankCode, $shortbank_name)) {
                                        $shortbank_name[$bankCode] = array();
                                    }
                                    $shortbank_name[$bankCode] = $shortBankName;
                                }
                                ?>
                                <?php foreach ($bankname as $key => $val): ?>
                                    <option value="<?=$key?>"><?=$val?></option>
                                <?php endforeach; ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-control-label" for="phone">Số tài khoản nhận</label>
                                <input class="form-control" placeholder="Số tài khoản nhận" type="text" id="account_number" name="account_number" value="">
                            </div>
                        </div>
                        <!-- <div class="form-group row" id="name"></div> -->
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-control-label" for="money">Số tiền</label>
                                <input class="form-control" placeholder="Số tiền" autocomplete="false" type="number" name="money" id="money" value="">
                                <div style="color: red;">Vui lòng nhập số tiền cần gửi >= 10.000 .</div> 
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-control-label" for="comment">Nội dung</label>
                                <input class="form-control" placeholder="Nội dung" autocomplete="false" type="text" name="comment" id="comment" value="">
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-primary" type="submit">Chuyển tiền</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
require('public/end.php'); 



// function get_contents($url, $ua = 'Mozilla/5.0 (Windows NT 5.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', $referer = 'http://www.google.com/') {
//     if (function_exists('curl_exec')) {
//       $header[0] = "Accept-Language: en-us,en;q=0.5";
//       $curl = curl_init();
//       curl_setopt($curl, CURLOPT_URL, $url);
//       curl_setopt($curl, CURLOPT_USERAGENT, $ua);
//       curl_setopt($curl, CURLOPT_REFERER, $referer);
//       curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
//       curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
//       curl_setopt($curl, CURLOPT_TIMEOUT, 10);
//       $content = curl_exec($curl);
//       curl_close($curl);
//     }
//     else { 
//       $content = file_get_contents($url);
//     }
//     return $content;
//   }

//   $tmpDiscount = json_decode(get_contents('ADMIN/list_bank.json'));
?>