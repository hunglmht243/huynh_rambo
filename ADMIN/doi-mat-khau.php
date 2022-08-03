<?php
require('public/head.php'); 
require('public/nav.php'); 
?>
<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header bg-transparent">
                <h3 class="mb-0">Đổi mật khẩu</h3>
            </div>
            <div class="card-body">
     
                
                
                <form submit-ajax="VIP"  action="<?=getMyUrl('adm/mini-game/update');?>" method="post" api_token="<?=$VIP->getUsers('token');?>">
                <input type="hidden" name="_token" value="tVjXfr7sEdKf63XpMdYuGZ7wm90Bfptbq3YEq">
                  <input type="hidden" name="action" value="doi-mat-khau">              
            
                      <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Mật khẩu cũ</label>
                        <input class="form-control" name="old_password" type="password"  placeholder="Mật khẩu cũ">
                    </div>
                    
                         <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Mật khẩu mới</label>
                        <input class="form-control" name="new_password" type="text"  placeholder="Mật khẩu mới">
                    </div>
                    
                     <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Nhập lại mật khẩu</label>
                        <input class="form-control" name="renew_password" type="password"  placeholder="Mật khẩu mới">
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