<?php
require('public/head.php'); 
require('public/nav.php'); 
?>
<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header bg-transparent">
                <h3 class="mb-0">Cài đặt event Điểm danh</h3>
            </div>
            <div class="card-body">
     <?php
     $GET_EVENT = $VIP->get_row(" SELECT * FROM `event` WHERE `key` = 'diem-danh'  ");
     
     

     
     
     ?>
                
                
                
                <form submit-ajax="VIP"  action="<?=getMyUrl('adm/mini-game/update');?>" method="post" api_token="<?=$VIP->getUsers('token');?>">
                <input type="hidden" name="_token" value="tVjXfr7sEdKf63XpMdYuGZ7wm90Bfptbq3YEq">
                  <input type="hidden" name="action" value="setting_event">              <input name="service" type="hidden" value="diem-danh">
              <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Trạng Thái</label>
                        <select name="status" class="form-control">
                          <option value="<?=$GET_EVENT['trangthai'];?>"><?=STATUS_GAME($GET_EVENT['trangthai']);?></option>
                          <option value="run">HOẠT ĐỘNG</option>
                          <option value="off">TẮT GAME</option>
                         
                        </select>
                    </div>
                      <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Tên Event</label>
                        <input class="form-control" name="name" type="text" value="<?=$GET_EVENT['game'];?>" placeholder="Tên Game">
                    </div>
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Min Thưởng</label>
                        <input class="form-control" name="min" type="text" value="<?=$GET_EVENT['thuong1'];?>" placeholder="Min">
                    </div>
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Max Thưởng</label>
                        <input class="form-control" name="max" type="text" value="<?=$GET_EVENT['thuong2'];?>" placeholder="Max">
                    </div>
                
                  
                            <div class="form-group">
                                <label class="form-control-label" for="mota">Mô tả game</label>
                                <input name="mota" id="notification" type="hidden" value="">
                             
                    <div data-toggle="quill" data-quill-placeholder="Nhập nội dung mô tả" data-quill-content="<?=$GET_EVENT['mota'];?>" value="<?=$GET_EVENT['mota'];?>" class="ql-container ql-snow">
    <div class="ql-editor" data-gramm="false" contenteditable="true" data-placeholder="Nhập nội dung mô tả">
       <?=$GET_EVENT['mota'];?>
    </div>
    <div class="ql-clipboard" contenteditable="true" tabindex="-1"></div>
    <div class="ql-tooltip ql-hidden"><a class="ql-preview" target="_blank" href="about:blank"></a><input type="text" data-formula="e=mc^2" data-link="https://quilljs.com" data-video="Embed URL"><a class="ql-action"></a><a class="ql-remove"></a></div>
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