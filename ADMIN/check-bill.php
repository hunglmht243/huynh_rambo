<?php
require('public/head.php'); 
require('public/nav.php'); 
?>
<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header bg-transparent">
                <h3 class="mb-0">Kiểm tra mã giao dịch</h3>
            </div>
            <div class="card-body">
   
                
                
                <form submit-ajax="VIP"  action="<?=getMyUrl('adm/mini-game/update');?>" method="post" api_token="<?=$VIP->getUsers('token');?>">
                <input type="hidden" name="_token" value="tVjXfr7sEdKf63XpMdYuGZ7wm90Bfptbq3YEq">
                  <input type="hidden" name="action" value="check_bill">           

                      <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Mã Giao Dịch</label>
                        <input class="form-control" name="mgd" type="number" value="" placeholder="Nhập mã giao dịch">
                    </div>
                  
                          <o id="callback"></o>
                 
                    <button class="btn btn-primary" type="submit"  callback="rescallback">Kiểm tra</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script>function rescallback(response) {
    if (response.status===true) {
        $('.rescallback').show();
        $('#callback').html(response.data);
       
       
    }
    else {
        $('.rescallback').hide();
        $('#callback').html(response.data);
    }
}

</script>

<?php
require('public/end.php'); 

?>