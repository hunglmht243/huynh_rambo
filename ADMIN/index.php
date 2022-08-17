<?php
require('public/head.php'); 
require('public/nav.php'); 
$now_time =date('Y-m-d H:i:s');

$time_day =date('Y-m-d')." 00:00:00";
$week_old = date('Y-m-d H:i:s',strtotime('-7 day',strtotime($now_time)));
$month_old = date('Y-m-d H:i:s',strtotime('-30 day',strtotime($now_time)));
?>





    <div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header">
                <h3 class="mb-0">Thống kê</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-xl-4 col-md-12">
                        <div class="card card-stats">
                            <!-- Card body -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0">Hôm nay</h5>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                                            <i class="ni ni-money-coins"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-0 text-sm">
                                    <span class="text-nowrap d-block">Tổng nhận: <?=format_money($VIP->get_row("SELECT SUM(`amount_play`) FROM `lich_su_choi` WHERE `result_text` != 'SAI NỘI DUNG' AND `time` >= '$time_day' AND `tranId` !='' AND `comment` !='' ")['SUM(`amount_play`)']);?>đ</span>
                                    <span class="text-nowrap d-block">Tổng trừ: <?=format_money($VIP->get_row("SELECT SUM(`amount`) FROM `chuyen_tien` WHERE `type_gd` = 'game' AND `date_time` >= '$time_day'  ")['SUM(`amount`)']);?>đ</span>
                                    <span class="text-nowrap d-block">Doanh thu: <?=format_money($VIP->get_row("SELECT SUM(`amount_play`) FROM `lich_su_choi` WHERE `result_text` != 'SAI NỘI DUNG' AND `time` >= '$time_day' AND `tranId` !='' AND `comment` !='' ")['SUM(`amount_play`)'] - $VIP->get_row("SELECT SUM(`amount`) FROM `chuyen_tien` WHERE `type_gd` = 'game' AND `date_time` >= '$time_day'  ")['SUM(`amount`)']);?>đ</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-12">
                        <div class="card card-stats">
                            <!-- Card body -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0">Tuần qua</h5>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-gradient-orange text-white rounded-circle shadow">
                                            <i class="ni ni-money-coins"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-0 text-sm">
                                    <span class="text-nowrap d-block">Tổng nhận: <?=format_money($VIP->get_row("SELECT SUM(`amount_play`) FROM `lich_su_choi` WHERE  `result_text` != 'SAI NỘI DUNG' AND `time` >= '$week_old' AND `time` < '$now_time' AND `tranId` !='' AND `comment` !='' ")['SUM(`amount_play`)']);?>đ</span>
                                    <span class="text-nowrap d-block">Tổng trừ: <?=format_money($VIP->get_row("SELECT SUM(`amount`) FROM `chuyen_tien` WHERE  `type_gd` = 'game' AND `date_time` >= '$week_old' AND `date_time` < '$now_time'  ")['SUM(`amount`)']);?>đ</span>
                                    <span class="text-nowrap d-block">Doanh thu: <?=format_money($VIP->get_row("SELECT SUM(`amount_play`) FROM `lich_su_choi` WHERE  `result_text` != 'SAI NỘI DUNG' AND `time` >= '$week_old' AND `time` < '$now_time' AND `tranId` !='' AND `comment` !='' ")['SUM(`amount_play`)']-$VIP->get_row("SELECT SUM(`amount`) FROM `chuyen_tien` WHERE `type_gd` = 'game' AND  `date_time` >= '$week_old' AND `date_time` < '$now_time'  ")['SUM(`amount`)']);?>đ</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-12">
                        <div class="card card-stats">
                            <!-- Card body -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0">Tháng này</h5>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-gradient-green text-white rounded-circle shadow">
                                            <i class="ni ni-money-coins"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-0 text-sm">
                                    <span class="text-nowrap d-block">Tổng nhận:  <?=format_money($VIP->get_row("SELECT SUM(`amount_play`) FROM `lich_su_choi` WHERE  `result_text` != 'SAI NỘI DUNG' AND `time` >= '$month_old' AND `time` < '$now_time' AND `tranId` !='' AND `comment` !='' ")['SUM(`amount_play`)']);?>đ</span>
                                    <span class="text-nowrap d-block">Tổng trừ: <?=format_money($VIP->get_row("SELECT SUM(`amount`) FROM `chuyen_tien` WHERE  `type_gd` = 'game' AND `date_time` >= '$month_old' AND `date_time` < '$now_time'  ")['SUM(`amount`)']);?>đ</span>
                                    <span class="text-nowrap d-block">Doanh thu: <?=format_money($VIP->get_row("SELECT SUM(`amount_play`) FROM `lich_su_choi` WHERE  `result_text` != 'SAI NỘI DUNG' AND `time` >= '$month_old' AND `time` < '$now_time' AND `tranId` !='' AND `comment` !='' ")['SUM(`amount_play`)'] - $VIP->get_row("SELECT SUM(`amount`) FROM `chuyen_tien` WHERE `type_gd` = 'game' AND `date_time` >= '$month_old' AND `date_time` < '$now_time'  ")['SUM(`amount`)']);?>đ</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card">
            <!-- Card header -->
            <div class="card-header">
                <div class="col-6">
                    <h3 class="mb-0">Thống kê theo số người chơi tháng</h3>
                </div>
              
            </div>
          <div class="table-responsive py-4">
    <div id="datatable-basic_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
        <div class="row">
            <div class="col-sm-12">
                <table class="table table-flush dataTable no-footer" id="datatable-basic" role="grid" aria-describedby="datatable-basic_info">
                    <thead class="thead-light">
                        <tr role="row">
                          <th class="sorting_asc" tabindex="0" aria-controls="datatable-basic" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Phone: activate to sort column descending" style="width: 199.562px;">Phone</th>
                            <th class="sorting" tabindex="0" aria-controls="datatable-basic" rowspan="1" colspan="1" aria-label="Tổng nhận: activate to sort column ascending" style="width: 282.219px;">Tổng nhận</th>
                            <th class="sorting" tabindex="0" aria-controls="datatable-basic" rowspan="1" colspan="1" aria-label="Tổng trả: activate to sort column ascending" style="width: 248.766px;">Tổng trả</th>
                            <th class="sorting" tabindex="0" aria-controls="datatable-basic" rowspan="1" colspan="1" aria-label="Tổng trả: activate to sort column ascending" style="width: 248.766px;">Số giao dịch</th>
                            <th class="sorting" tabindex="0" aria-controls="datatable-basic" rowspan="1" colspan="1" aria-label="Doanh Thu: activate to sort column ascending" style="width: 280.453px;">Doanh Thu</th>
                        </tr>
                    </thead>
                     <tbody>
                    <?php
                  $list_mm = $VIP->get_list(" SELECT * FROM `cron_momo` ") ;
                    if($list_mm){
                  
                        foreach($list_mm as $row ){
                  $TT_TRA = $VIP->get_row("SELECT SUM(`amount_play`) FROM `lich_su_choi` WHERE  `result_text` != 'SAI NỘI DUNG' AND `phone_nhan` = '".$row['phone']."'   ") ['SUM(`amount_play`)']; 
                    ?>
                        <tr class="odd">
                           <td ><?=$row['phone'];?></td>
                            
                             <td ><?=format_money($TT_TRA);?> đ</td>
                              <td ><?=format_money($row['month']);?> đ</td>
                            <td ><?=$row['today_gd'];?></td>
                             <td ><?=format_money($TT_TRA - $row['month']);?> đ</td>
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
