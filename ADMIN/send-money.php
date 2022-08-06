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
              <form submit-ajax="VIP"  action="<?=getMyUrl('api/e/chuyentien');?>" method="post" >
                <input type="hidden" name="_token" value="tVjXfr7sEdKf63XpMdYuGZ7wm90Bfptbq3YEq">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-control-label" for="id_momo">Chọn tài khoản chuyển</label>
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
                                <label class="form-control-label" for="phone">Số điện thoại nhận</label>
                                <input class="form-control" placeholder="Số điện thoại nhận" type="text" id="phone" name="phone" value="">
                            </div>
                        </div>
                        <div class="form-group row" id="name"></div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-control-label" for="money">Số tiền</label>
                                <input class="form-control" placeholder="Số tiền" autocomplete="false" type="number" name="money" id="money" value="">
                                
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

?>