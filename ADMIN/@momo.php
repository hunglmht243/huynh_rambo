
<?php
require('public/head.php'); 
require('public/nav.php'); 
?>
<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header">
                <h3 class="mb-0">Thêm số momo</h3>
            </div>
            <div class="card-body">
               <form submit-ajax="VIP" action="<?= getMyUrl('api/login'); ?>" method="post" api_token="true">
                    <input type="hidden" name="action" value="loginmomo">
                    <o id="act"></o>
                    <div class="row ">

                        <div class="col-md-12">
                            <div class="form-group">
                               <label class="form-label" for="">Số điện thoại</label>
                                <input type="text" rows="5" cols="50" class="form-control" name="phonemomo" value="" placeholder=" Nhập tên số điện thoại momo"></input>
                            </div>
                        </div>
                        <div class="col-md-12 password hidden">
                            <div class="form-group">
                                <label class="form-label" for="">Mật khẩu</label>
                                <input type="text" rows="5" cols="50" class="form-control" name="passmomo" value="" placeholder=" Nhập mật khẩu momo"></input>
                            </div>
                        </div>
                        <div class="col-md-12 codeotp hidden">
                            <div class="form-group">
                                <label class="form-label" for="">Mã xác thực</label>
                                <input type="text" rows="5" cols="50" class="form-control" name="codeotp" value="" placeholder=" Nhập mã xác thực"></input>
                            </div>
                        </div>

                        <div class="col-md-4 mr-auto ml-auto pt-3 ">
                           <center><o id="buttonInput"></o></center>
                        </div>
                        <br>
                    </div> <br>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js?<?=rand(1,9999999999);?>?<?=rand(1,9999999999);?>?<?=rand(1,99999999);?>"></script>
<script>
    $(document).ready(function() {
        $("div.hidden").hide();
        $("#act").html('<input type="hidden" name="act" value="sendotp">');
        $("#buttonInput").html('<button callback="callback" type="submit" class="btn btn-primary btn-block">Đăng nhập</button>');
    });

    function callback(res) {
        if (res.status === true && res.step === 'veryotp') {
            $("div.codeotp").show();
            $("#act").html('<input type="hidden" name="act" value="veryotp">');
            $("#buttonInput").html('<button callback="callback" type="submit" class="btn btn-primary btn-block">Xác thực</button>');
        }
        if (res.status === true && res.step === 'login') {
            $("div.codeotp").remove();
            $("div.password").show();
            $("#act").html('<input type="hidden" name="act" value="login">');
            $("#buttonInput").html('<button callback="callback" type="submit" class="btn btn-primary btn-block">Đăng nhập</button>');
        }

        if (res.status === true && res.step === 'SUCCESS') {
            location.reload();
        }

        swal(
            res.message,
            res.status === true ? "success" : "error"
        );
    }
</script>
<?php
require('public/end.php'); 

?>