<?php
require('public/head.php'); 
require('public/nav.php'); 
?>
<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header bg-transparent">
                <h3 class="mb-0">Cài đặt thưởng top</h3>
            </div>
            <div class="card-body">
     <?php
     $GET_EVENT = $VIP->get_row(" SELECT * FROM `top_up` ");
     
     

     
     
     ?>
                
                
                
                <form submit-ajax="VIP"  action="<?=getMyUrl('adm/mini-game/update');?>" method="post" api_token="<?=$VIP->getUsers('token');?>">
                <input type="hidden" name="_token" value="tVjXfr7sEdKf63XpMdYuGZ7wm90Bfptbq3YEq">
                  <input type="hidden" name="action" value="top_up">             
            
                     
                    
                    <div class="row">
                   <div class="col-12">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Thưởng Mốc 1</label>
                                <input class="form-control" name="thuong1" type="text" value="<?=$GET_EVENT['thuong1'];?>" placeholder="Tiền cho mốc thưởng">
                            </div>
                        </div>
                        
                        <div class="col-12">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Thưởng Mốc 2</label>
                                <input class="form-control" name="thuong2" type="text" value="<?=$GET_EVENT['thuong2'];?>" placeholder="Tiền cho mốc thưởng">
                            </div>
                        </div>
                 
                        
                        <div class="col-12">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Thưởng Mốc 3</label>
                                <input class="form-control" name="thuong3" type="text" value="<?=$GET_EVENT['thuong3'];?>" placeholder="Tiền cho mốc thưởng">
                            </div>
                        </div>
                        
                        
                        
               <div class="col-12">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Thưởng Mốc 4</label>
                                <input class="form-control" name="thuong4" type="text" value="<?=$GET_EVENT['thuong4'];?>" placeholder="Tiền cho mốc thưởng">
                            </div>
                        </div>
                            
              <div class="col-12">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Thưởng Mốc 5</label>
                                <input class="form-control" name="thuong5" type="text" value="<?=$GET_EVENT['thuong5'];?>" placeholder="Tiền cho mốc thưởng">
                            </div>
                        </div>
                        
                        
                        
                        
                        
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