<?php
require('public/head.php'); 
require('public/nav.php'); 
$now_time =date('Y-m-d H:i:s');
$week_old = date('Y-m-d H:i:s',strtotime('-7 day',strtotime($now_time)));
$month_old = date('Y-m-d H:i:s',strtotime('-30 day',strtotime($now_time)));
?>





    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <!-- Card header -->
                <div class="card-header">
                    <div class="row">
                        <div class="col-6">
                            <h3 class="mb-0">Danh sách cron </h3>
                        </div>

                    </div>
                </div>
                <div class="table-responsive py-4" tabindex="1" style="overflow: hidden; outline: none;">
                    <div id="datatable-basic_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">

                        <div class="row">
                            <div class="col-sm-12">
                                <div id="datatable-basic_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                                  
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <table class="table table-flush dataTable no-footer" id="datatable-basic" role="grid" aria-describedby="datatable-basic_info">
                                                <thead class="thead-light">
                                                    <tr role="row">
                                                        <th class="sorting_asc" tabindex="0" aria-controls="datatable-basic" rowspan="1" colspan="1" aria-label="#: activate to sort column descending" style="width: 142.219px;" aria-sort="ascending">#</th>
                                                        <th class="sorting" tabindex="0" aria-controls="datatable-basic" rowspan="1" colspan="1" aria-label="Số Dư Trong Ví: activate to sort column ascending" style="width: 154.969px;">Tên CronJob</th>
                                                        <th class="sorting" tabindex="0" aria-controls="datatable-basic" rowspan="1" colspan="1" aria-label="Tiền GD Tháng: activate to sort column ascending" style="width: 109.922px;">LinkCron</th>
                                                        <th class="sorting" tabindex="0" aria-controls="datatable-basic" rowspan="1" colspan="1" aria-label="GD Tháng: activate to sort column ascending" style="width: 105.359px;">Ghi Chú</th>
                                                        
                                                    </tr>
                                                </thead>
                                                <tbody>









































        <tr class="odd" role="row">
            <td class="sorting_1">1</td>
            <td>Cron Trả Thưởng</td>
            <td><?=getMyUrl('tt');?></td>
            <td> 6-10 Giây </td>
        </tr>
      <tr class="odd" role="row">
    <td class="sorting_1">2</td>
    <td> Cron Login</td>
    <td><?=getMyUrl('login');?></td>
    <td>1 Giờ</td>
  </tr>

   <tr class="odd" role="row">
    <td class="sorting_1">3</td>
    <td> Cron Điểm Danh</td>
    <td><?=getMyUrl('diem-danh');?> </td>
    <td> 15 Phút</td>
</tr>

 <tr class="odd" role="row">
    <td class="sorting_1">4</td>
    <td> Cron Reset Hạn Mức Chơi</td>
    <td><?=getMyUrl('xoa-gd');?> </td>
    <td> 5 Phút</td>
</tr>

<tr class="odd" role="row">
    <td class="sorting_1">5</td>
    <td> Cron Trả Thưởng Bill Lỗi</td>
    <td><?=getMyUrl('bill-loi');?> </td>
    <td> 5 - 10 Phút</td>
</tr>


<!-- <tr class="odd" role="row">
    <td class="sorting_1">6</td>
    <td> Cron Reset Cron</td>
    <td><?=getMyUrl('reset-cron');?> </td>
    <td> 5 - 10 Phút</td>
</tr> -->











                                                   
                                 
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                
                                </div>
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