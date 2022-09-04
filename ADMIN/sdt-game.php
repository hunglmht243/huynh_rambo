<?php
require('public/head.php'); 
require('public/nav.php'); 
?>
<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header">
                <h3 class="mb-0">Thêm số vào game</h3>
            </div>
            <div class="card-body">
              <form submit-ajax="VIP"  action="<?=getMyUrl('adm/mini-game/update');?>" method="post" api_token="<?=$VIP->getUsers('token');?>">
                <input type="hidden" name="_token" value="tVjXfr7sEdKf63XpMdYuGZ7wm90Bfptbq3YEq">
                   <input type="hidden" name="action" value="them_sdt">    
                
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-control-label" for="phone">Chọn số momo</label>
                                <select class="form-control" id="phone" name="phone">
                                    <?php
                                     $result = $VIP->get_list("SELECT * FROM `cron_momo` WHERE `status` = 'success' ORDER BY `id` ASC ");
                                     foreach($result as $sdt){
                                         
                                     ?>
                                      <option value=""> -- Chọn Số MOMO --</option>
                                    <option value="<?=$sdt['phone'];?>"> <?=$sdt['phone'];?> - Số Dư: <?=$sdt['BALANCE'];?></option>
                                     <?php }?>
                                                                    </select>
                            </div>
                        </div>
                          <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-control-label" for="id_momo">Min</label>
                               <input type="number" class="form-control" name="min"  placeholder="Min">
                            </div>
                        </div>
                         <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-control-label" for="id_momo">Max</label>
                               <input type="number" class="form-control" name="max"  placeholder="Max">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                            <div class="form-check">
                                
                                <?php
                                     $result_ = $VIP->get_list("SELECT * FROM `danh_sach_game` WHERE `status` = 'run' ORDER BY `id` ASC ");
                                     foreach($result_ as $game){
                                         
                                     ?>
                        <input class="form-check-input "  type="checkbox" name="ma_<?=$game['ma_game'];?>"  value="<?=$game['ma_game'];?>">
                        <label class="form-check-label" for="<?=$game['ma_game'];?>">Trò Chơi <?=$game['ten_game'];?>
                    </label><br>
                    <?php }?>
                    
                    </div>
                            </div>
                        </div>
                      
                    </div>
                    <button class="btn btn-primary" type="submit">Thêm</button>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header">
                <h3 class="mb-0">Thêm số vào game</h3>
            </div>
            <div class="card-body">
              <form submit-ajax="VIP"  action="<?=getMyUrl('adm/mini-game/update');?>" method="post" api_token="<?=$VIP->getUsers('token');?>">
                <input type="hidden" name="_token" value="tVjXfr7sEdKf63XpMdYuGZ7wm90Bfptbq3YEq">
                   <input type="hidden" name="action" value="confg_sdt">    
                
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-control-label" for="phone">Chọn số momo</label>
                                <select class="form-control" id="phone" name="phone">
                                    <?php
                                     $result = $VIP->get_list("SELECT * FROM `cron_momo` WHERE `status` = 'success' ORDER BY `id` ASC ");
                                     foreach($result as $sdt){
                                         
                                     ?>
                                      <option value=""> -- Chọn Số MOMO --</option>
                                    <option value="<?=$sdt['phone'];?>"> <?=$sdt['phone'];?> - Số Dư: <?=$sdt['BALANCE'];?></option>
                                     <?php }?>
                                                                    </select>
                            </div>
                        </div>
                      
                       <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-control-label" for="phone">Chọn action</label>
                                <select class="form-control" id="ac" name="ac">
                                    
                                      <option value=""> -- Chọn ACTION --</option>
                                    <option value="run"> BẬT SỐ </option>
                                   <option value="off"> TẮT SỐ </option>
                                    <option value="delete"> XÓA SỐ </option>
                                                                    </select>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-primary" type="submit">Chỉnh Sửa</button>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col">
        <div class="card">
            <!-- Card header -->
            <div class="card-header">
                <h3 class="mb-0">Danh sách số</h3>
            </div>
            <div class="table-responsive py-4">
                <div id="datatable-basic_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
            
                    <div class="row">
                        <div class="col-sm-12">
                            <table class="table table-flush dataTable no-footer" id="datatable-basic" role="grid" aria-describedby="datatable-basic_info">
                                <thead class="thead-light">
                                    <tr role="row">
                                        <th class="sorting" tabindex="0" aria-controls="datatable-basic" rowspan="1" colspan="1" aria-label="Id: activate to sort column ascending" style="width: 42.9219px;">Id</th>
                                        <th class="sorting" tabindex="0" aria-controls="datatable-basic" rowspan="1" colspan="1" aria-label="Phone gửi: activate to sort column ascending" style="width: 122.156px;">Phone</th>
                                        <th class="sorting" tabindex="0" aria-controls="datatable-basic" rowspan="1" colspan="1" aria-label="Mã GD: activate to sort column ascending" style="width: 81.4375px;">Min</th>
                                        <th class="sorting_asc" tabindex="0" aria-controls="datatable-basic" rowspan="1" colspan="1" aria-label="Phone nhận: activate to sort column descending" style="width: 140.5px;" aria-sort="ascending">Max</th>
                                        <th class="sorting" tabindex="0" aria-controls="datatable-basic" rowspan="1" colspan="1" aria-label="Số tiền: activate to sort column ascending" style="width: 92px;">Game</th>
                                        <th class="sorting" tabindex="0" aria-controls="datatable-basic" rowspan="1" colspan="1" aria-label="Action: activate to sort column ascending" style="width: 67.5781px;">Action</th>                          
                                      
                                       
                                    </tr>
                                </thead>
                                <tbody>
                                   <?php
                                   $LSGD =$VIP->get_list(" SELECT * FROM `phone`  ");
                                   foreach($LSGD as $rowls){
                                   ?>
                                    
                                    <tr class="odd">
                                       
                                       <td><?=$rowls['id'];?></td>
                                       <td><?=$rowls['phone'];?></td>
                                       <td><?=$rowls['min'];?></td>
                                       <td><?=$rowls['max'];?></td>
                                       <td><?=$rowls['ma_game'];?></td>
                                       <td > <form submit-ajax="VIP"  action="<?=getMyUrl('adm/mini-game/update');?>" method="post" api_token="<?=$VIP->getUsers('token');?>">
                <input type="hidden" name="_token" value="tVjXfr7sEdKf63XpMdYuGZ7wm90Bfptbq3YEq">
            <input type="hidden" name="action" value="xoa-so-game">            <input type="hidden" name="id" value="<?=$rowls['id'];?>">                      
                                            
                                <button type="submit" class="btn btn-danger btn-sm">Xóa</button>
                                
                                
                                </form></td>
                                       
                                       
                                    </tr>
                                    
                                    <?php }?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                   
                </div>
            </div>
        </div>
        <!-- Card footer -->
    </div>
</div>
<?php
require('public/end.php'); 

?>