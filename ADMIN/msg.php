<?php
require('public/head.php'); 
require('public/nav.php'); 
?>
<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header bg-transparent">
                <h3 class="mb-0">Cài đặt Message</h3>
            </div>
            <div class="card-body">
    
           <?php
     $GET_MSG = $VIP->get_row(" SELECT * FROM `message` ");
     
     

     
     
     ?>      
                
                
                <form submit-ajax="VIP"  action="<?=getMyUrl('adm/mini-game/update');?>" method="post" api_token="<?=$VIP->getUsers('token');?>">
                <input type="hidden" name="_token" value="tVjXfr7sEdKf63XpMdYuGZ7wm90Bfptbq3YEq">
                  <input type="hidden" name="action" value="message">             
              <div class="form-group">
                        <label for="example-text-input" class="form-control-label">MSG_GAME (Nhỏ hơn 20 kí tự)</label>
                        <textarea class="form-control" rows="2" name="msg_game" ><?=$GET_MSG['msg_game'];?></textarea>
                    </div>
                      <div class="form-group">
                        <label for="example-text-input" class="form-control-label">MSG_Event (Nhỏ hơn 20 kí tự)</label>
                        <textarea class="form-control" rows="2" name="msg_event" ><?=$GET_MSG['msg_event'];?></textarea>
                      
                    </div>
                      <div class="form-group">
                        <label for="example-text-input" class="form-control-label">MSG_Giftcode (Nhỏ hơn 20 kí tự)</label>
                        <textarea class="form-control" rows="2" name="msg_giftcode" ><?=$GET_MSG['msg_giftcode'];?></textarea>
                      
                    </div>
                        
                 
                    <button class="btn btn-primary" type="submit">Chỉnh Sửa</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php
require('public/end.php'); 

?>