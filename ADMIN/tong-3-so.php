<?php
require('public/head.php'); 
require('public/nav.php'); 
?>
<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header bg-transparent">
                <h3 class="mb-0">Cài đặt mini game Tổng 3 số</h3>
            </div>
            <div class="card-body">
     <?php
     $GET_GAME = $VIP->get_row(" SELECT * FROM `danh_sach_game` WHERE `ma_game` = 'tong-3-so'  ");
     
     $GET_GAME_CONFIG_1 = $VIP->get_row(" SELECT * FROM `settings_game` WHERE `key` = 'tong-3-so' AND  `phan_game` = 'comment_1' ");
     $GET_GAME_CONFIG_2 = $VIP->get_row(" SELECT * FROM `settings_game` WHERE `key` = 'tong-3-so' AND  `phan_game` = 'comment_2' ");
     $GET_GAME_CONFIG_3 = $VIP->get_row(" SELECT * FROM `settings_game` WHERE `key` = 'tong-3-so' AND  `phan_game` = 'comment_3' ");
   
     
     
     ?>
                
                
                
                <form submit-ajax="VIP"  action="<?=getMyUrl('adm/mini-game/update');?>" method="post" api_token="<?=$VIP->getUsers('token');?>">
                <input type="hidden" name="_token" value="tVjXfr7sEdKf63XpMdYuGZ7wm90Bfptbq3YEq">
                  <input type="hidden" name="action" value="setting_games">              <input name="service" type="hidden" value="tong-3-so">
              <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Trạng Thái</label>
                        <select name="status" class="form-control">
                          <option value="<?=$GET_GAME['status'];?>"><?=STATUS_GAME($GET_GAME['status']);?></option>
                          <option value="run">HOẠT ĐỘNG</option>
                          <option value="off">TẮT GAME</option>
                         
                        </select>
                    </div>
                      <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Tên Game</label>
                        <input class="form-control" name="name" type="text" value="<?=$GET_GAME['ten_game'];?>" placeholder="Tên Game">
                    </div>
                   <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Nội Dung S (7 17 27)</label>
                                <input class="form-control" name="comment_1" type="text" value="<?=$GET_GAME_CONFIG_1['comment'];?>" placeholder="Nội Dung <?=$GET_GAME_CONFIG_1['comment'];?>">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Tỉ Lệ </label>
                                <input class="form-control" name="tile_1" type="text" value="<?=$GET_GAME_CONFIG_1['tile'];?>" placeholder="Tỉ Lệ <?=$GET_GAME_CONFIG_1['comment'];?>">
                            </div>
                        </div>
                    </div>
                      <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Nội Dung S (8 18)</label>
                                <input class="form-control" name="comment_2" type="text" value="<?=$GET_GAME_CONFIG_2['comment'];?>" placeholder="Nội Dung <?=$GET_GAME_CONFIG_2['comment'];?>">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Tỉ Lệ</label>
                                <input class="form-control" name="tile_2" type="text" value="<?=$GET_GAME_CONFIG_2['tile'];?>" placeholder="Tỉ Lệ <?=$GET_GAME_CONFIG_2['comment'];?>">
                            </div>
                        </div>
                    </div>
                        <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Nội Dung S (9 19)</label>
                                <input class="form-control" name="comment_3" type="text" value="<?=$GET_GAME_CONFIG_3['comment'];?>" placeholder="Nội Dung <?=$GET_GAME_CONFIG_3['comment'];?>">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Tỉ Lệ </label>
                                <input class="form-control" name="tile_3" type="text" value="<?=$GET_GAME_CONFIG_3['tile'];?>" placeholder="Tỉ Lệ <?=$GET_GAME_CONFIG_3['comment'];?>">
                            </div>
                        </div>
                    </div>
                  
                            <div class="form-group">
                                <label class="form-control-label" for="mo_ta">Mô Tả Game</label>
                                <input name="mo_ta" id="notification" type="hidden" value="">
                             
                    <div data-toggle="quill" data-quill-placeholder="Nhập nội dung mô tả" data-quill-content="<?=$GET_GAME['mo_ta'];?>" value="<?=$GET_GAME['mo_ta'];?>" class="ql-container ql-snow">
    <div class="ql-editor" data-gramm="false" contenteditable="true" data-placeholder="Nhập nội dung mô tả">
       <?=$GET_GAME['mo_ta'];?>
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