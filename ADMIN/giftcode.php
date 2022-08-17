<?php
require('public/head.php'); 
require('public/nav.php'); 
?>
<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header bg-transparent">
                <h3 class="mb-0">Thêm Giftcode</h3>
            </div>
            <div class="card-body">
                 <form submit-ajax="VIP"  action="<?=getMyUrl('adm/mini-game/update');?>" method="post" api_token="<?=$VIP->getUsers('token');?>">
                <input type="hidden" name="_token" value="tVjXfr7sEdKf63XpMdYuGZ7wm90Bfptbq3YEq">   
                 <input type="hidden" name="action" value="giftcode">   
                <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Tên Giftcode</label>
                        <input class="form-control" name="giftcode" type="text" placeholder="Ví Dụ : CODENEWBIE">
                    </div>
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Số Tiền</label>
                        <input class="form-control" name="money" type="number" placeholder="10000">
                    </div>
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Giới Hạn Số Lần Nhập Giftcode</label>
                        <input class="form-control" name="limit" type="number" placeholder="Giới Hạn">
                    </div>


                    <button class="btn btn-primary" type="submit">Thêm mới</button>
                </form>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card">
            <!-- Card header -->
            <div class="card-header">
                    <h3 class="mb-0">Danh Sách</h3>

            </div>
            <div class="table-responsive py-4">
                <div id="datatable-basic_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                    
                  <div class="row"><div class="col-sm-12"><table class="table table-flush dataTable no-footer" id="datatable-basic" role="grid" aria-describedby="datatable-basic_info">
                    <thead class="thead-light">
                        <tr role="row"><th class="sorting_asc" tabindex="0" aria-controls="datatable-basic" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Tên Giftcode: activate to sort column descending" style="width: 180.781px;">Tên Giftcode</th><th class="sorting" tabindex="0" aria-controls="datatable-basic" rowspan="1" colspan="1" aria-label="Số Tiền: activate to sort column ascending" style="width: 116.078px;">Số Tiền</th><th class="sorting" tabindex="0" aria-controls="datatable-basic" rowspan="1" colspan="1" aria-label="Giới Hạn: activate to sort column ascending" style="width: 131.625px;">Giới Hạn</th><th class="sorting" tabindex="0" aria-controls="datatable-basic" rowspan="1" colspan="1" aria-label="Số Lượt Đã Nhập: activate to sort column ascending" style="width: 221.984px;">Số Lượt Đã Nhập</th><th class="sorting" tabindex="0" aria-controls="datatable-basic" rowspan="1" colspan="1" aria-label="Ngày Tạo: activate to sort column ascending" style="width: 139.359px;">Ngày Tạo</th><th class="sorting" tabindex="0" aria-controls="datatable-basic" rowspan="1" colspan="1" aria-label="Action: activate to sort column ascending" style="width: 113.172px;">Action</th></tr>
                    </thead>
                    <tbody>
                   <?php
                    $check_code = $VIP->get_list(" SELECT * FROM `giftcode`  ");
                    foreach($check_code as $row_code){
                    ?>
                    
                        
                        
                                            <tr class="odd">
                                                
                                       <td><?=$row_code['giftcode'];?></td>         
                                        <td><?=$row_code['money'];?></td> 
                                        <td><?=$row_code['gioi_han'];?></td> 
                                        <td><?=$row_code['da_nhap'];?></td> 
                                        <td><?=$row_code['time'];?></td> 
                                        <td>
            <form submit-ajax="VIP" action="<?=getMyUrl('adm/mini-game/update');?>" method="post" api_token="<?=$VIP->getUsers('token');?>">
            <input type="hidden" name="_token" value="tVjXfr7sEdKf63XpMdYuGZ7wm90Bfptbq3YEq">
            <input type="hidden" name="action" value="xoa-giftcode">            <input type="hidden" name="giftcode" value="<?=$row_code['giftcode'];?>">                      
                                            
                                <button type="submit" class="btn btn-danger btn-sm">Xóa</button>
                                
                                
                                </form>
                                </td>
                                                
                                                
                                                
                                                
                                                
                                                
                                            </tr>
                                            
                                            <?php }?>
                                            
                                            </tbody>
                </table></div></div>
                
               </div>
            </div>
        </div>
    </div>
</div>

<?php
require('public/end.php'); 

?>