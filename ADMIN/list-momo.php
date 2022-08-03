<?php
require('public/head.php'); 
require('public/nav.php'); 
?>
<div class="row">
        <div class="col-xl-12">
            <div class="card">
                <!-- Card header -->
                <div class="card-header">
                    <div class="row">
                        <div class="col-6">
                            <h3 class="mb-0">Danh sách Momo</h3>
                        </div>
                        <div class="col-6 text-right">
                            <span class="text-muted mr-4">Tổng tiền: <span id="tong_tien"> <?=format_money($VIP->get_row("SELECT SUM(`BALANCE`) FROM `cron_momo` WHERE  `status` = 'success' ")['SUM(`BALANCE`)']);?>đ </span></span>
                            <a href="/adm/momo/add" class="btn btn-sm btn-primary btn-round btn-icon" data-toggle="tooltip" data-original-title="Thêm Momo">
                                <span class="btn-inner--icon"><i class="fas fa-user-edit"></i></span>
                                <span class="btn-inner--text">Thêm Momo</span>
                            </a>

                        </div>
                    </div>
                </div>
            <div class="table-responsive py-4">
    <div id="datatable-basic_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
      
        <div class="row">
            <div class="col-sm-12">
                <table class="table table-flush dataTable no-footer" id="datatable-basic" role="grid" aria-describedby="datatable-basic_info">
                    <thead class="thead-light">
                        <tr role="row">
                            <th class="sorting_asc" tabindex="0" aria-controls="datatable-basic" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Số Điện Thoại: activate to sort column descending" style="width: 121.766px;">Số Điện Thoại</th>
                            <th class="sorting" tabindex="0" aria-controls="datatable-basic" rowspan="1" colspan="1" aria-label="Số Dư Trong Ví: activate to sort column ascending" style="width: 133.203px;">Số Dư Trong Ví</th>
                              <th class="sorting" tabindex="0" aria-controls="datatable-basic" rowspan="1" colspan="1" aria-label="GD Tháng: activate to sort column ascending" style="width: 88.7656px;">Tiền GD Tháng</th>
                         <th class="sorting" tabindex="0" aria-controls="datatable-basic" rowspan="1" colspan="1" aria-label="GD Tháng: activate to sort column ascending" style="width: 88.7656px;">GD Tháng</th>
                          
                         
                            <th class="sorting" tabindex="0" aria-controls="datatable-basic" rowspan="1" colspan="1" aria-label="Trạng Thái: activate to sort column ascending" style="width: 100.297px;">Trạng Thái</th>
                            <th class="sorting" tabindex="0" aria-controls="datatable-basic" rowspan="1" colspan="1" aria-label="Ngày Thêm: activate to sort column ascending" style="width: 97.8281px;">Ngày Thêm</th>
                            <th class="sorting" tabindex="0" aria-controls="datatable-basic" rowspan="1" colspan="1" aria-label="Action: activate to sort column ascending" style="width: 67.5781px;">Action</th>
                        </tr>
                    </thead>
                     <tbody>
                    <?php
                  $list_mm = $VIP->get_list(" SELECT * FROM `cron_momo` ") ;
                    
                    if($list_mm){
                        foreach($list_mm as $row ){
                  
                    ?>
                    <tr class="odd">
                            <td ><?=$row['phone'];?></td>
                            <td ><?=$row['BALANCE'];?> đ</td>
                             <td ><?=format_money($row['month']);?> đ</td>
                            <td ><?=$row['today_gd'];?></td>
                            <td ><?=$row['status'];?></td>
                            <td ><?=date("d-m-Y H:i:s",$row['TimeLogin'])?></td>
                            <td > <form submit-ajax="VIP"  action="<?=getMyUrl('adm/mini-game/update');?>" method="post" api_token="<?=$VIP->getUsers('token');?>">
                <input type="hidden" name="_token" value="tVjXfr7sEdKf63XpMdYuGZ7wm90Bfptbq3YEq">
            <input type="hidden" name="action" value="xoa-momo">            <input type="hidden" name="sdt" value="<?=$row['phone'];?>">                      
                                            
                                <button type="submit" class="btn btn-danger btn-sm">Xóa</button>
                                
                                
                                </form></td>
                            
                        
                        </tr>
                    
                    <?php }}else{ ?>
                    
                        <tr class="odd">
                            <td valign="top" colspan="9" class="dataTables_empty">No data available in table</td>
                        </tr>
                    
                    <?php }?>
                    </tbody>
                </table>
            </div>
        </div>
     
    </div>
</div>
            </div>
    </div>
</div>
<?php
require('public/end.php'); 

?>