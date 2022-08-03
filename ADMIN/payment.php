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
                                       <th class="sorting_desc" tabindex="0" aria-controls="datatable-basic" rowspan="1" colspan="1" aria-sort="descending" aria-label="Id: activate to sort column ascending" style="width: 30.8125px;">Id</th>
                                        <th class="sorting" tabindex="0" aria-controls="datatable-basic" rowspan="1" colspan="1" aria-label="Phone chơi: activate to sort column ascending" style="width: 109.797px;">Phone Gửi</th>
                                        <th class="sorting" tabindex="0" aria-controls="datatable-basic" rowspan="1" colspan="1" aria-label="Mã GD: activate to sort column ascending" style="width: 64.5156px;">Mã GD</th>
                                        <th class="sorting" tabindex="0" aria-controls="datatable-basic" rowspan="1" colspan="1" aria-label="Phone nhận: activate to sort column ascending" style="width: 116.203px;">Phone nhận</th>
                                         <th class="sorting" tabindex="0" aria-controls="datatable-basic" rowspan="1" colspan="1" aria-label="Phone nhận: activate to sort column ascending" style="width: 116.203px;">Người nhận</th>
                                        <th class="sorting" tabindex="0" aria-controls="datatable-basic" rowspan="1" colspan="1" aria-label="Số tiền: activate to sort column ascending" style="width: 73.75px;">Số tiền</th>
                                        <th class="sorting" tabindex="0" aria-controls="datatable-basic" rowspan="1" colspan="1" aria-label="Comment: activate to sort column ascending" style="width: 91.75px;">Comment</th>
                                        <th class="sorting" tabindex="0" aria-controls="datatable-basic" rowspan="1" colspan="1" aria-label="Trạng thái: activate to sort column ascending" style="width: 105.406px;">Trạng thái</th>
                                        <th class="sorting" tabindex="0" aria-controls="datatable-basic" rowspan="1" colspan="1" aria-label="Thời gian: activate to sort column ascending" style="width: 94.1562px;">Thời gian</th>
                                       
                                       
                                    </tr>
                                </thead>
                                <tbody>
                                   <?php
                                   $LSGD =$VIP->get_list(" SELECT * FROM `chuyen_tien` ORDER BY `id` DESC  ");
                                   foreach($LSGD as $rowls){
                                   ?>
                                    
                                    <tr class="odd">
                                       
                                       <td><?=$rowls['id'];?></td>
                                       <td><?=$rowls['ownerNumber'];?></td>
                                       <td><?=$rowls['tranId'];?></td>
                                       <td><?=$rowls['partnerId'];?></td>
                                             <td><?=$rowls['partnerName'];?></td>
                                       <td><?=$rowls['amount'];?></td>
                                       <td><?=$rowls['comment'];?></td>
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