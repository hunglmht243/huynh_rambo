<?php
require('public/head.php'); 
require('public/nav.php'); 
?>
<div class="row">
    <div class="col">
        <div class="card">
            <!-- Card header -->
            <div class="card-header">
                <h3 class="mb-0">Lịch sử nhận tiền</h3>
            </div>
            <div class="table-responsive py-4">
                <div id="datatable-basic_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
            
                    <div class="row">
                        <div class="col-sm-12">
                            <table class="table table-flush dataTable no-footer" id="datatable-basic" role="grid" aria-describedby="datatable-basic_info">
                                <thead class="thead-light">
                                    <tr role="row">
                                        <th class="sorting" tabindex="0" aria-controls="datatable-basic" rowspan="1" colspan="1" aria-label="Id: activate to sort column ascending" style="width: 42.9219px;">Id</th>
                                        <th class="sorting" tabindex="0" aria-controls="datatable-basic" rowspan="1" colspan="1" aria-label="Phone gửi: activate to sort column ascending" style="width: 122.156px;">Phone gửi</th>
                                        <th class="sorting" tabindex="0" aria-controls="datatable-basic" rowspan="1" colspan="1" aria-label="Mã GD: activate to sort column ascending" style="width: 81.4375px;">Mã GD</th>
                                        <th class="sorting_asc" tabindex="0" aria-controls="datatable-basic" rowspan="1" colspan="1" aria-label="Phone nhận: activate to sort column descending" style="width: 140.5px;" aria-sort="ascending">Phone nhận</th>
                                        <th class="sorting" tabindex="0" aria-controls="datatable-basic" rowspan="1" colspan="1" aria-label="Số tiền: activate to sort column ascending" style="width: 92px;">Số tiền</th>
                                         <th class="sorting" tabindex="0" aria-controls="datatable-basic" rowspan="1" colspan="1" aria-label="Số tiền: activate to sort column ascending" style="width: 92px;">Tiền nhận</th>
                                        <th class="sorting" tabindex="0" aria-controls="datatable-basic" rowspan="1" colspan="1" aria-label="Số tiền: activate to sort column ascending" style="width: 92px;">Nội dung</th>
                                        <th class="sorting" tabindex="0" aria-controls="datatable-basic" rowspan="1" colspan="1" aria-label="Trạng thái: activate to sort column ascending" style="width: 128.156px;">Trạng thái</th>
                                         <th class="sorting" tabindex="0" aria-controls="datatable-basic" rowspan="1" colspan="1" aria-label="Trạng thái: activate to sort column ascending" style="width: 128.156px;">Trả Thưởng</th>
                                        <th class="sorting" tabindex="0" aria-controls="datatable-basic" rowspan="1" colspan="1" aria-label="Thời gian: activate to sort column ascending" style="width: 115.312px;">Thời gian</th>
                                       
                                    </tr>
                                </thead>
                                <tbody>
                                   <?php
                                   $LSGD =$VIP->get_list(" SELECT * FROM `lich_su_choi` ORDER BY `id` DESC  ");
                                   foreach($LSGD as $rowls){
                                   ?>
                                    
                                    <tr class="odd">
                                       
                                       <td><?=$rowls['id'];?></td>
                                       <td><?=$rowls['phone'];?></td>
                                       <td><?=$rowls['tranId'];?></td>
                                       <td><?=$rowls['phone_nhan'];?></td>
                                       <td><?=$rowls['amount_play'];?></td>
                                       <td><?=$rowls['amount_game'];?></td>
                                       <td><?=$rowls['comment'];?></td>
                                       <td><?=$rowls['result_text'];?></td>
                                        <td><?=$rowls['status'];?></td>
                                       <td><?=$rowls['time'];?></td>
                                       
                                       
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