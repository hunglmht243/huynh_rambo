
<?php
require('public/head.php'); 
require('public/nav.php'); 
?>
<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header">
                <h3 class="mb-0">Cài đặt website</h3>
            </div>
            <div class="card-body">
               <form submit-ajax="VIP" action="<?=getMyUrl('adm/setting/action');?>" method="post" api_token="<?=$VIP->getUsers('token');?>">
                            <input type="hidden" name="_token" value="tVjXfr7sEdKf63XpMdYuGZ7wm90Bfptbq3YEq">
                            <input type="hidden" name="action" value="settings">                  <div class="row">
                       
                            <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label" for="">Tên trang</label>
                                <input class="form-control" placeholder="Nhập tên trang" autocomplete="false" type="text" id="title" name="title" value="<?=$VIP->site('title');?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label" for="telegram">Mô tả trang</label>
                                <input class="form-control" placeholder="Nhập description" autocomplete="false" type="text" id="description" name="description" value="<?=$VIP->site('description');?>">
                            </div>
                        </div>
                       
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label" for="zalo">Nhập url logo</label>
                                <input class="form-control" placeholder="Nhập link logo" autocomplete="false" type="text" id="logo" name="logo" value="<?=$VIP->site('logo');?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label" for="telegram">Màu trang</label>
                                <input class="form-control" placeholder="Nhập Màu trang" autocomplete="false" type="color" id="color" name="color" value="<?=$VIP->site('color');?>">
                            </div>
                        </div>
                             <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label" for="telegram">Màu button</label>
                                <input class="form-control" placeholder="Nhập Màu Button" autocomplete="false" type="color" id="color_button" name="color_button" value="<?=$VIP->site('color_button');?>">
                            </div>
                        </div>
                                 <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label" for="telegram">Màu head</label>
                                <input class="form-control" placeholder="Nhập Màu Button" autocomplete="false" type="color" id="color_head" name="color_head" value="<?=$VIP->site('color_head');?>">
                            </div>
                        </div>
                          <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label" for="telegram">Màu head2</label>
                                <input class="form-control" placeholder="Nhập Màu Button" autocomplete="false" type="color" id="color_head2" name="color_head2" value="<?=$VIP->site('color_head2');?>">
                            </div>
                        </div>
                                 <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label" for="telegram">Màu footer</label>
                                <input class="form-control" placeholder="Nhập Màu Button" autocomplete="false" type="color" id="color_end" name="color_end" value="<?=$VIP->site('color_end');?>">
                            </div>
                        </div>
                         <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label" for="telegram">Link facebook</label>
                                <input class="form-control" placeholder="Nhập link facebook" autocomplete="false" type="text" id="facebook" name="facebook" value="<?=$VIP->site('facebook');?>">
                            </div>
                        </div>
                                 <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label" for="telegram">Link zalo</label>
                                <input class="form-control" placeholder="Nhập link zalo" autocomplete="false" type="text" id="zalo" name="zalo" value="<?=$VIP->site('zalo');?>">
                            </div>
                        </div>
                              <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-control-label" for="telegram">Link telegram</label>
                                <input class="form-control" placeholder="Nhập link telegram" autocomplete="false" type="text" id="telegram" name="telegram" value="<?=$VIP->site('telegram');?>">
                            </div>
                        </div>
                         <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label" for="telegram">Token bot telegram</label>
                                <input class="form-control" placeholder="Nhập token telegram" autocomplete="false" type="text" id="token_telegram" name="token_telegram" value="<?=$VIP->site('token_telegram');?>">
                            </div>
                        </div>
                         <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label" for="telegram">Nhập id chat telegram</label>
                                <input class="form-control" placeholder="Nhập id telegram" autocomplete="false" type="text" id="id_telegram" name="id_telegram" value="<?=$VIP->site('id_telegram');?>">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-control-label" for="notification">Thông báo</label>
                                <input name="notification" id="notification" type="hidden" value="">
                             
                    <div data-toggle="quill" data-quill-placeholder="Nhập nội dung thông báo" data-quill-content="<?=$VIP->site('notification');?>" class="ql-container ql-snow">
    <div class="ql-editor" data-gramm="false" contenteditable="true" data-placeholder="Nhập nội dung thông báo">
       <?=$VIP->site('notification');?>
    </div>
    <div class="ql-clipboard" contenteditable="true" tabindex="-1"></div>
    <div class="ql-tooltip ql-hidden"><a class="ql-preview" target="_blank" href="about:blank"></a><input type="text" data-formula="e=mc^2" data-link="https://quilljs.com" data-video="Embed URL"><a class="ql-action"></a><a class="ql-remove"></a></div>
</div>
                            </div>
                        </div>
                    </div>
                 
                    <div class="row">
                        <div class="col-md-12">
                             <label class="form-control-label" for="telegram">Script</label>
                             <textarea class="form-control" rows="10"  name="script" value="<?=$VIP->site('script');?>"></textarea>
                               
                          </div>
                        </div> 
                        <br>
                             
                 <center>   <button type="submit"  class="btn btn-primary" 
                    >Lưu cài đặt</button></center>
                    
                </form>
            </div>
        </div>
    </div>
</div>

<?php
require('public/end.php'); 

?>