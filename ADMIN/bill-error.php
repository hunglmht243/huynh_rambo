<?php
require('public/head.php'); 
require('public/nav.php'); 
?>
<div class="row">
    <div class="col">
        <div class="card">
            <!-- Card header -->
            <div class="card-header">
                <h3 class="mb-0">Danh sách bill lỗi</h3>
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
                                         <th class="sorting" tabindex="0" aria-controls="datatable-basic" rowspan="1" colspan="1" aria-label="Thời gian: activate to sort column ascending" style="width: 115.312px;">Thao tác</th>
                                       
                                    </tr>
                                </thead>
                                <tbody>
                                   <?php
                                   $LSGD =$VIP->get_list(" SELECT * FROM `lich_su_choi` WHERE `result` = 'success' AND `status` = 'error' ORDER BY `id` DESC  ");
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
                                       <td > <form submit-ajax="VIP"  action="<?=getMyUrl('adm/bill-loi');?>" method="post" api_token="<?=$VIP->getUsers('token');?>">
                <input type="hidden" name="_token" value="tVjXfr7sEdKf63XpMdYuGZ7wm90Bfptbq3YEq">
                 <input type="hidden" name="tranId" value="<?=$rowls['tranId'];?>">                      
                                            
                                <button type="submit" class="btn btn-success btn-sm">Thanh Toán</button>
                                
                                
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
        <script>
            function getPathFromUrl(url) {
    return url.split("?")[0];
}
    $('[data-toggle="tooltip"]').tooltip();
    $("form[submit-ajax=VIP]").submit(function (e) {
        e.preventDefault();
        let _this = this;
        let url = $(_this).attr("action");
        let method = $(_this).attr("method");
        let href = $(_this).attr("href");
        let api_token = $(_this).attr("api_token");
        let data = $(_this).serialize();
        let button = $(_this).find("button[type=submit]");
        if (button.attr("order")) {
            Swal.fire({
                title: "Xác nhận thanh toán!",
                text: button.attr("order"),
                icon: "warning",
                showCancelButton: true,
                // confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Tôi đồng ý",
                cancelButtonText: "Đóng",
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({
                        icon: "warning",
                        title: "Đang xử lý, vui lòng chờ, nghiêm cấm tắt trình duyệt, f5 trang tránh hụt đơn mất tiền!",
                        timer: 180000,
                        timerProgressBar: true,
                        showCancelButton: false,
                        showConfirmButton: false,
                        didOpen: () => {
                            Swal.showLoading();
                        },
                    });
                    submitForm(url, method, href, api_token, data, button);
                }
            });
        } else {
            submitForm(url, method, href, api_token, data, button);
        }
    });
function submitForm(url, method, href, api_token, data, button) {
    let textButton = button.html().trim();
    let setting = {
        type: method,
        url,
        data,
        dataType: "json",
        beforeSend: function () {
            button
                .prop("disabled", !0)
                .html(
                    '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Đang xử lý...'
                );
        },
        complete: function () {
            button.prop("disabled", !1).html(textButton);
        },
         success: function (response) {
            if (button.attr("callback")) {
                window[`${button.attr("callback")}`](response);
            }
            if (!button.attr("callback")) {
                swal(
                    response.message,
                    response.status === true ? "success" : "error"
                );
            }
            if (response.status === true && !button.attr("href") && !button.attr("callback")) {
                setTimeout(() => {
                    if (!href) {
                        window.location.reload();
                        return;
                    }
                    window.location.href = href;
                }, 2000);
            }
        },
        error: function (error) {
            console.log(error);
        },
    };
    if (api_token) {
        setting["headers"] = {
            "Api-Token": api_token,
        };
    }
    $.ajax(setting);
}

function swal(text, icon) {
    Swal.fire({
        heightAuto: false,
        icon,
        title: "Thông báo",
        text: text,
        confirmButtonText: "Tôi đã hiểu",
    });
}
        </script>
    </div>
</div>
<?php
require('public/end.php'); 

?>