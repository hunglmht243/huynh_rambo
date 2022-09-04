<?php
   require('core/@connect.php'); 
   ?>
<html class="no-js" lang="vi">
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
      <title> <?=$VIP->site('title');?></title>
      <link href="https://i.imgur.com/hm7QMr7.png" rel="apple-touch-icon">
      <link href="https://i.imgur.com/hm7QMr7.png" rel="shortcut icon" type="image/x-icon">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
      <meta name="title" content="<?=$VIP->site('title');?>">
      <meta name="description" content="<?=$VIP->site('description');?>">
      <meta name="keywords" content="<?=$VIP->site('title');?>,minigamemomo,Clmm,Chan le momo,Tài Xỉu momo,chanlemomo,Chẵn lẻ online,Chẵn Lẻ,momo cl,Cách Chơi chẵn lẽ momo,chẵn lẽ momo tự động">
      <link rel="canonical" href="index.html">
      <meta name="robots" content="index, follow">
      <meta property="fb:app_id" content="">
      <meta property="og:url" content="<?=$base_url;?>">
      <meta property="og:type" content="article">
      <meta property="og:title" content="<?=$VIP->site('title');?>">
      <meta property="og:description" content="<?=$VIP->site('description');?>">
      <link rel="stylesheet" href="/assets/css/bootstrapb1.min.css?=<?=rand(1,99999999);?>">
      <link rel="stylesheet" href="/assets/css/style1.css?=<?=rand(1,99999999);?>">
      <link rel="stylesheet" href="/assets/css/jquery-ui-1.9.2.custom.min.css?=<?=rand(1,99999999);?>">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.2.0/css/font-awesome.css">
      <link rel="stylesheet" href="/assets/css/custom.2.css?=<?=rand(1,99999999);?>">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
      <!--#993300-->
      <style>
         .btn-primary:hover,
         .btn-primary:focus,
         .btn-primary:active,
         .btn-primary.active,
         .open .dropdown-toggle.btn-primary {
         color: #0b0000;
         /* background-color: <?=$VIP->site('color_button');?>; */
         border-color: <?=$VIP->site('color_button');?>;
         }
         .btn-default {
         color: #fff;
         background-color: <?=$VIP->site('color_button');?>;
         border-color: <?=$VIP->site('color_button');?>
         }
         .footer {
         background: <?=$VIP->site('color_end');?>;
         border-top: 7px solid <?=$VIP->site('color_head');?>
         }
         .mainbar {
         background: <?=$VIP->site('color_head');?>;
         }
         .navbar {
         background-color: <?=$VIP->site('color');?>; 
         }
         .panel-primary {
         border-color: <?=$VIP->site('color');?>
         }
         .panel-primary>.panel-heading {
         color: #fff;
         background-color: <?=$VIP->site('color');?>;
         border-color: <?=$VIP->site('color');?>
         }
         .panel-primary>.panel-heading+.panel-collapse .panel-body {
         border-top-color: <?=$VIP->site('color');?>
         }
         .panel-primary>.panel-footer+.panel-collapse .panel-body {
         border-bottom-color: <?=$VIP->site('color');?>
         }
         .aa:hover,
         .aa:focus {
         background: <?=$VIP->site('color');?>;
         border-radius: 5px
         }
         .bg-primary {
         color: #fff;
         background-color: <?=$VIP->site('color');?> !important;
         }
         .coffer-box {
         display: block;
         position: fixed;
         bottom: 90px;
         right: 15px;
         width: 15%;
         z-index: 1000;
         cursor: pointer;
         /*background: #ad410569;*/
         border-radius: 10px;
         text-align: center;
         padding: 15px;
         }
         @media (max-width: 767px) {
         .coffer-box {
         background: unset;
         width: 50%;
         bottom: 20px;
         }
         }
         .mb-0 {
         margin-bottom: 0;
         }
         .dot-text-1 {
         color: #f0ad4e
         }
         .dot-text-2 {
         color: #5bc0de
         }
         .dot-text-3 {
         color: #5cb85c
         }
         .dot-text-4 {
         color: #d9534f
         }
         .dot-text-6 {
         color: #5bc0de
         }
         .dot-text-7 {
         color: #5cb85c
         }
         .dot-text-8 {
         color: #d9534f
         }
         .dot-text-9 {
         color: #f0ad4e
         }
         .dot-text-11 {
         color: #5cb85c
         }
         .dot-text-12 {
         color: #d9534f
         }
         .dot-text-13 {
         color: #f0ad4e
         }
         .dot-text-14 {
         color: #5bc0de
         }
         .dot-text-16 {
         color: #d9534f
         }
         .dot-text-17 {
         color: #f0ad4e
         }
         .dot-text-18 {
         color: #5bc0de
         }
         .dot-text-19 {
         color: #5cb85c
         }
      </style>
   </head>
   <?php
      $diemdanh_phien = $VIP->get_row("SELECT * FROM `diemdanh_phien` ");
      $timecount = strtotime($diemdanh_phien['time_next']) - strtotime(date("Y-m-d H:i:s"));
      
      
      
      ?>
   <body class="" style="">
      <!-- <marquee width="100%" behavior="scroll" style="display: block;
         position: fixed;
         bottom: 70 px;
         left: 15 px;
         z-index: 1000;
         cursor: pointer;
         width: 100%;">
         <font color="white" style="text-shadow: 0 0 0.2em #ff0000, 0 0 0.2em #ff0000,  0 0 0.2em #ff0000">
         <b>Hiện nay có rất nhiều Website lừa đảo, anh em chú ý chỉ chơi trên <?=strtoupper($_SERVER['SERVER_NAME']);?>, không nên thử các web khác tránh mất tiền oan.</b>
         </font>
         </marquee> -->
      <div class="navbar">
         <div class="container">
            <div class="navbar-header">
               <!-- <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                  <i class="fa fa-bars"></i>
                  </button> -->
               <a class="navbar-brand navbar-brand-image" href="index.html">
                  <div class="hidden-xs">
                     <!-- <img src="/assets/img/logo.png"  -->
                     <img src="<?=$VIP->site('logo')? $VIP->site('logo') : "/assets/img/logo.png";?>"                                                             
                        style="margin-top: -5px;
                        margin-bottom: 10px;
                        width: 100px;" alt="clmm Logo">
                  </div>
                  <div class="visible-xs">
                     <img src="<?=$VIP->site('logo')? $VIP->site('logo') : "/assets/img/logo.png";?>" style="margin-top: -14px;
                        /* margin: 13px; */
                        width: 94px;" alt="clmm Logo">
                  </div>
               </a>
            </div>
         </div>
      </div>
      <div class="mainbar hidden-xs">
         <div class="container"></div>
      </div>
      <div class="container">
         <div class="content">
            <div class="content-container">
               <div class="py-5" style="min-height:80px !important;">
                  <div class="output" id="output">
                     <h3 class=""></h3>
                     <h4 class="cursor"></h4>
                  </div>
               </div>
               <div class="text-center mt-5">
                  <?php
                     $GAME_=$VIP->get_list("SELECT * FROM `danh_sach_game` WHERE `status` = 'run' ");
                     
                     foreach ($GAME_ as $row_button){
                     ?>
                  <button class="btn btn-default" server-action="change" server-id="<?=$row_button['ma_game'];?>" server-rate="<?=$row_button['ma_game'];?>"><?=$row_button['ten_game'];?></button>
                  <?php }?> 
                  <br>
                  <?php
                     $get_event_dd = $VIP->get_row("SELECT * FROM `event` WHERE  `key` = 'diem-danh' ");  
                     if($get_event_dd['trangthai']=="run"){
                     ?>
                  <button class="btn btn-default" server-action="change" server-id="010000" server-rate="010000">
                     Điểm danh +100k
                     <b style="
                        padding: 11px 8px 18px 8px;
                        width: 100%;
                        left: 50%;
                        text-align: center;
                        font-size: 13px;"><font color="green"><i class="fa fa-clock-o" aria-hidden="true"></i> <b id="thoigian_head">  <?=$timecount;?> </b></font> <font color="6861b1"><i class="fa fa-users" aria-hidden="true"></i> <b id="diemdanh_users2"> </b></font></b>
                     <p style="</button"></p>
                  </button>
                  <?php }?>
                  <?php
                     $get_event_nvn = $VIP->get_row("SELECT * FROM `event` WHERE  `key` = 'nhiem-vu-ngay' ");  
                     if($get_event_nvn['trangthai']=="run"){
                     ?>
                  <button class="btn btn-default" server-action="change" server-id="456456" server-rate="456456">
                     Nhiệm Vụ Ngày 
                     <p style="</button"></p>
                  </button>
                  <?php }?>
                  <button class="btn btn-default" server-action="change" server-id="789789" server-rate="789789">
                     Nhập Code Nhận Quà 
                     <p style="</button"></p>
                  </button>
                  <!-- <button class="btn btn-default" server-action="change" server-id="abc" server-rate="abc"> abc <p style="</button"></p></button>     -->
               </div>
               <div class="row justify-content-md-center box-cl">
                  <div class="col-md-6 mt-3 cl">
                     <div class="panel panel-primary">
                        <div class="panel-heading text-center font-weight-bold"> Cách chơi </div>
                        <div id="0X2134X555"></div>
                        <?php if($get_event_nvn['trangthai']=="run") {?>         
                        <div class="panel-body turn " turn-tab="456456" style="padding-top: 0px;">
                           <br>
                           <div class="body">
                              <div class="text-center">
                                 <font color="blue"><big><b>Nhiệm Vụ Ngày</b></big></font> <br>
                                 <form role="form" id="nhiemvu_ngay" method="" >
                                    <div class="form-group">
                                       <label for="PhoneChoi">Nhập số điện thoại</label>
                                       <input type="number" class="form-control" id="PhoneChoi" name="PhoneChoi" placeholder="094xxxxxxx">
                                       <small id="checkHelp" class="form-text text-muted">Nhập số điện thoại của
                                       bạn để kiểm tra và
                                       nhận
                                       thưởng.</small>
                                    </div>
                                    <button type="button" onclick="nhiemvu_ngay()" id="submit" name="submit" class="btn btn-success" >Kiểm tra</button>
                                 </form>
                                 <div id="result-nhiemvu_ngay" style="margin-top: 5px;"></div>
                              </div>
                              <div class="occho" id="fghdh">
                                 <?=$get_event_nvn['mota'];?>
                                 <br> - Khi chơi đủ mốc tiền, các bạn ấn vào nhận thưởng để nhận được các mốc như sau: 
                                 <p class="text-center"><b>Tổng tiền NVN trao trong hôm nay: <?=format_money($VIP->get_row("SELECT SUM(`amount`) FROM `chuyen_tien` WHERE  `comment` = 'NHIEMVUNGAY1' OR `comment` = 'NHIEMVUNGAY2' OR `comment` = 'NHIEMVUNGAY3' OR `comment` = 'NHIEMVUNGAY4' OR `comment` = 'NHIEMVUNGAY5'")['SUM(`amount`)']);?></b>
                                    <b id="total_reward" style="color:blue;"></b>
                                    <font style="color:blue;">VNĐ</font>
                                 </p>
                                 <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover text-center">
                                       <thead>
                                          <tr role="row" class="bg-primary">
                                             <th class="text-center text-white">Mốc chơi</th>
                                             <th class="text-center text-white">Thưởng</th>
                                          </tr>
                                       </thead>
                                       <tbody id="zzxc">
                                          <tr>
                                             <td><?=format_money($get_event_nvn['moc1']);?></td>
                                             <td>+<?=format_money($get_event_nvn['thuong1']);?>đ</td>
                                          </tr>
                                          <tr>
                                             <td><?=format_money($get_event_nvn['moc2']);?></td>
                                             <td>+<?=format_money($get_event_nvn['thuong2']);?>đ</td>
                                          </tr>
                                          <tr>
                                             <td><?=format_money($get_event_nvn['moc3']);?></td>
                                             <td>
                                                <font color="red">+<?=format_money($get_event_nvn['thuong3']);?>đ</font>
                                             </td>
                                          </tr>
                                          <tr>
                                             <td><?=format_money($get_event_nvn['moc4']);?></td>
                                             <td>
                                                <font color="red">+<?=format_money($get_event_nvn['thuong4']);?>đ</font>
                                             </td>
                                          </tr>
                                          <tr>
                                             <td><?=format_money($get_event_nvn['moc5']);?></td>
                                             <td>
                                                <font color="red">+<?=format_money($get_event_nvn['thuong5']);?>đ</font>
                                             </td>
                                          </tr>
                                       </tbody>
                                    </table>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <?php }?>
                        <div class="panel-body turn" style="padding-top: 0px" turn-tab="789789">
                           <style>
                              #diemDanhCard {
                              margin-top: 0.5rem;
                              color: #155724;
                              border-color: #c3e6cb;
                              }
                              #occard {
                              margin-top: 0.5rem;
                              color: #155724;
                              background-color: #9cbca4;
                              border-color: #c3e6cb;
                              padding: 20px;
                              }
                              .occho {
                              word-wrap: break-word;
                              margin-top: 0.5rem;
                              color: #155724;
                              background-color: #aed6b8;
                              border-color: #c3e6cb;
                              padding: 20px;
                              }
                           </style>
                           <div class="row collapse show" id="diemDanhCard" style="">
                              <div class="col-lg-12">
                                 <div class="body">
                                    <div class="text-center">
                                       <p style="line-height: 0.8;"></p>
                                       <p style="font-size:120%;text-align:center;"><b>CODE KHUYẾN MẠI</b></p>
                                       <div class="form-group" id="non_query" style="background-color: #f5f5f5; border-color: #ad4105; padding: 20px;">
                                          <form role="form" id="nhap_gifcode" method="" >
                                             <input type="hidden" name="_token" value="tQywbI2ywgTXeQVFS0xx4khDk6Mkur799J4WdkHy">                                <label for="partnerId">Mã code:</label>
                                             <input type="text" class="form-control" name="giftcode" id="giftcode" placeholder="ABCXYZ">
                                             <label for="partnerId" style="margin-top: 10px;">Số điện thoại:</label>
                                             <input type="text" class="form-control" name="sdt" id="sdt" placeholder="094xxxxxxx">
                                             <small id="partnerId" class="form-text text-muted" style="color: #ff0000">Nhập số điện thoại của
                                             bạn để kiểm tra và
                                             nhận
                                             thưởng.</small> <br>
                                             <button type="button" onclick="nhap_gifcode()" id="submit" name="submit" class="btn btn-success" >Kiểm tra</button>
                                          </form>
                                          <div id="result-gif" style="margin-top: 5px;"></div>
                                       </div>
                                       <div class="occho" id="fsdf" style="text-align: left;">
                                          1. Một số điện thoại chỉ được nhập 1 mã/ngày. <br>
                                          2. Mã code khuyến mại sẽ tùy vào điều kiện để sử dụng, có thời hạn. <br>
                                          3. Mã code khuyến mại sẽ được cấp theo các chương trình khuyến mại của hệ thống <?=$VIP->site('title');?>. <br>
                                          4. Vui lòng liên hệ chát CSKH để biết thêm chi tiết khi bạn nhận được CODE. <br>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <!-- <div class="panel-body turn" turn-tab="abc" style="padding-top: 0px;">fsdfsdf</div> -->
                        <div class="panel-body turn" turn-tab="010000" style="padding-top: 0px;">
                           <style>
                              #diemDanhCard {
                              margin-top: 0.5rem;
                              color: #155724;
                              }
                              #occard {
                              margin-top: 0.5rem;
                              color: #155724;
                              padding: 20px;
                              }
                              .occho {
                              margin-top: 0.5rem;
                              color: #155724;
                              padding: 20px;
                              }
                           </style>
                           <div class="row collapse show" id="diemDanhCard" style="">
                              <div class="col-lg-12">
                                 <div class="body">
                                    <div class="text-center">
                                       <font color="blue"><big><b>Điểm Danh Nhận Quà Miễn Phí</b></big></font>
                                       <br>
                                       <small><i class="fa fa-info-circle" aria-hidden="true"></i> Mã quà: <font color="orange"><b id="diemdanh_id">#<?=$diemdanh_phien['phien'];?></b></font></small><br>
                                       <small><i class="fa fa-usd" aria-hidden="true"></i> Giá trị: <font color="Maroon"><b id=""><?=number_format($get_event_dd['thuong1']);?> ~ <?=number_format($get_event_dd['thuong2']);?></b> vnđ</font></small><br>
                                       <small><i class="fa fa-user" aria-hidden="true"></i>: <font color="333366"><b id="diemdanh_users"></b> người</font></small><br>
                                       <small><i class="fa fa-clock-o" aria-hidden="true"></i> Quay thưởng sau: <font color="660000"><b id="diemdanh_thoigian"><?=$timecount;?></b> giây</font></small><br>
                                       <small><i class="fa fa-star" aria-hidden="true"></i> Thắng phiên trước: <font color="333300"><b id="diemdanh_last"><?=substr($VIP->get_list("SELECT * FROM `diemdanh_win`WHERE `trangthai` = 'success' ORDER BY `id` DESC LIMIT 1 ")[0]['sdt'],0,-4).'****';?></b></font></small><br>
                                       <small><i class="fa fa-bandcamp" aria-hidden="true"></i> Tổng tiền đã trao: <font color="blue"><b id="diemdanh_tongtien"><?=format_money($VIP->get_row("SELECT SUM(`tien_nhan`) FROM `diemdanh_win` WHERE `trangthai` = 'success' ")['SUM(`tien_nhan`)']);?></b> VNĐ</font></small><br>
                                       <form role="form" id="diemdanh" method="" >
                                          <div class="form-group">
                                             <label for="diemdanh">Nhập số điện thoại</label>
                                             <input type="number" class="form-control" id="Phone" name="Phone" placeholder="094xxxxxxx">
                                             <small id="checkHelp" class="form-text text-muted">Nhập số điện thoại của bạn để điểm danh.</small>
                                          </div>
                                          <button type="button" onclick="diemdanh()" id="submit" name="submit" class="btn btn-success" >Điểm danh</button>
                                       </form>
                                       <div id="result-diemdanh" style="margin-top: 5px;"></div>
                                       <button class="btn btn-info" onclick="$('#muc_huongdan').show();$('#muc_users').hide();$('#muc_lichsu').hide();">Cách chơi</button> <button class="btn btn-dark" data-toggle="modal" onclick="$('#muc_huongdan').hide();$('#muc_users').hide();$('#muc_lichsu').show();">Lịch sử</button>            <button class="btn btn-danger" onclick="$('#muc_huongdan').hide();$('#muc_users').show();$('#muc_lichsu').hide();">Danh sách</button>
                                    </div>
                                    <div class="occho" id="muc_huongdan">
                                       - Mỗi phiên quà các bạn có 15 phút để điểm danh. <br>
                                       - Số điện thoại điểm danh phải chơi <?=strtoupper($_SERVER['SERVER_NAME']);?> ít nhất 1 lần trong ngày. Không giới hạn số lần điểm danh trong ngày. <br>
                                       - Khi hết thời gian, người may mắn sẽ nhận được số tiền của phiên đó. <br>
                                       - Game <b>Điểm danh</b> hoạt động <b>24/24</b>
                                    </div>
                                    <div class="occho" id="muc_lichsu" style="display:none;">
                                       <div class="table-responsive">
                                          <table class="table table-striped table-bordered table-hover text-center">
                                             <thead>
                                                <tr role="row" class="bg-primary">
                                                   <th class="text-center text-white">Phiên</th>
                                                   <th class="text-center text-white">SDT</th>
                                                   <th class="text-center text-white">VND</th>
                                                </tr>
                                             </thead>
                                             <tbody id="mayman_log">
                                                <?php
                                                   $MM_=$VIP->get_list("SELECT * FROM `diemdanh_win` WHERE `trangthai` = 'success' ORDER BY `id` DESC LIMIT 4");
                                                   
                                                   foreach ($MM_ as $USER){
                                                   ?>
                                                <tr>
                                                   <td><small><?=$USER['phien_thang'];?></small></td>
                                                   <td><?=substr($USER['sdt'],0,-4);?>****</td>
                                                   <td><?=format_money($USER['tien_nhan']);?> VNĐ.</td>
                                                </tr>
                                                <?php }?>
                                             </tbody>
                                          </table>
                                       </div>
                                    </div>
                                    <?php
                                       //   $MM_user=$VIP->get_list("SELECT * FROM `diemdanh_user` WHERE `trangthai` = '0' ");
                                         
                                       //   foreach ($MM_user as $USER_){
                                         ?>
                                    <div class="occho" id="muc_users" style="display:none;"> 
                                       <?//=$USER_['sdt'].",";?> 
                                    </div>
                                    <?php //}?> 
                                 </div>
                              </div>
                           </div>
                        </div>
                        <script>
                           // var timeleft2 = document.getElementById("thoigian_head").innerHTML;
                           
                           
                           
                           // var downloadTimer = setInterval(function(){
                           // if(timeleft2 <= 0){
                           //     timeleft2= 900;
                           //     //clearInterval(downloadTimer);
                           //     document.getElementById("thoigian_head").innerHTML = "0";
                           // } else {
                           //     document.getElementById("thoigian_head").innerHTML = timeleft2;
                           // }
                           // timeleft2 -= 1;
                           // }, 1000);
                           
                           
                           
                           
                           
                           
                           
                           
                        </script>
                     </div>
                  </div>
                  <div class="col-md-3 mt-3 text-center cl">
                     <div class="panel panel-primary">
                        <div class="panel-heading text-center font-weight-bold"> Trạng Thái </div>
                        <div class="panel-body">
                           <div id="trangthai_table">
                           </div>
                           <div class="alert alert-danger" style="text-align: left;">
                                <p></p>Lưu ý: Chỉ chuyển số đang hoạt động<p></p>
                                <p>Chuyển sai nhầm số hoàn 100% cho đơn thắng, thua không hoàn .</p>
                            </div>
                           <div class="alert alert-info text-left"> Nếu quá 15 phút chưa nhận được tiền vui lòng dán mã vào đây để
                              kiểm tra. 
                           </div>
                           <div class="text-center">
                              <form role="form" id="check_tranid" method="" >
                                 <div class="form-group">
                                    <label for="tran_id">Nhập mã giao dịch</label>
                                    <input type="number" class="form-control" id="tran_id" name="tran_id" placeholder="Mã giao dịch: Ví dụ 11223344556">
                                    <small id="checkHelp" class="form-text text-muted">Nhập mã giao dịch của bạn để kiểm tra.</small>
                                 </div>
                                 <button type="button" onclick="check_tranid()" id="submit" name="submit" class="btn btn-success" >Kiểm tra</button>
                              </form>
                              <div id="result-check" style="margin-top: 5px;"></div>
                           </div>
                           <div id="contact" class="mt-5">
                              <!-- <p>
                                 <a class="text-white" href="<?=$VIP->site('facebook');?>" target="_blank">
                                     <span class="btn btn-default text-uppercase">FACEBOOK HỖ TRỢ</span></a>
                                 </p> -->
                              <!-- <p>
                                 <a class="text-white" href="<?=$VIP->site('zalo');?>" target="_blank">
                                     <span class="btn btn-default text-uppercase">ZALO HỖ TRỢ</span></a>
                                 </p> -->
                              <p>
                                 <a class="text-white" href="<?=$VIP->site('telegram');?>" target="_blank">
                                 <span class="btn btn-default text-uppercase" style="background-color: #2fa2d8;border-color: #2fa2d8">TELEGRAM HỖ TRỢ</span></a>
                              </p>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="mt-5 text-center panel panel-primary">
                  <div class="row">
                     <div class="col-md-12 mt-3">
                        <div class="text-center mb-3">
                           <h3 class="text-uppercase">
                              Lịch sử thắng
                           </h3>
                        </div>
                        <h5 style="color:black;font-weight: bold;text-align:center;" id="timer">(Cập nhật liên tục) <img src="/assets/img/loading_ab.jpeg" width="23px">
                        </h5>
                        <div class="table-responsive">
                           <table class="table table-striped table-bordered table-hover text-center" id="0X2134X453">
                              <thead>
                                 <tr class="bg-primary" role="row">
                                    <th class="text-center text-white">
                                       Thời gian
                                    </th>
                                    <th class="text-center text-white">
                                       Số điện thoại
                                    </th>
                                    <th class="text-center text-white">
                                       Tiền đặt
                                    </th>
                                    <th class="text-center text-white">
                                       Tiền nhận
                                    </th>
                                    <th class="text-center text-white">
                                       Game
                                    </th>
                                    <th class="text-center text-white">
                                       Nội dung
                                    </th>
                                    <th class="text-center text-white">
                                       Trạng thái
                                    </th>
                                 </tr>
                              </thead>
                              <tbody role="alert"  aria-live="polite" aria-relevant="all" class="">
                              </tbody>
                           </table>
                        </div>
                     </div>
                  </div>
               </div>
               <hr style="margin-top: 25px; margin-bottom: 25px;">
               <div class="row" id="list">
                  <div class="col-md-6">
                     <div class="panel panel-primary">
                        <div class="panel-heading text-center">
                           <h4>Lưu Ý</h4>
                        </div>
                        <div class="panel-body" id="noidung_thongbaoakditmemay">
                           <h3 style="text-align: justify;"><strong><span style="color: #ff00ff;">Chào mừng bạn đến với <?=strtoupper($_SERVER['SERVER_NAME']);?>.</span></strong></h3>
                           <p style="text-align: justify;"><strong>Trước khi chơi, bạn nên đọc kĩ những lưu ý sau, nếu <span style="color: #ff0000;">bỏ qua</span> những lưu ý này, thì khi&nbsp;<span style="color: #ff0000;">mất tiền</span>, web sẽ <span style="color: #ff0000;">không chịu trách nhiệm</span>.</strong></p>
                           <p style="text-align: justify;"><strong>&nbsp; &nbsp; 1. Chẵn lẻ tài xỉu số cuối mã giao dịch là 0, 9 thua, nếu muốn tính 0 và 9 vui lòng chơi chẵn lẻ 2.</strong></p>
                           <p style="text-align: justify;"><strong>&nbsp; &nbsp; 2. Mỗi số chỉ có thể giao dịch tối đa 50tr hoặc 150 lần một ngày. Vì vậy,&nbsp;<span style="color: #ff0000;">số trên hệ thống&nbsp;sẽ thay đổi liên tục </span></strong><strong>nên&nbsp;trước khi chơi bạn nên lên lấy số trước, tránh việc bị hoàn tiền.</strong></p>
                           <p style="text-align: justify;"><strong>&nbsp; &nbsp; 3. Mỗi số có một mức cược khác nhau, n</strong><strong>ếu chuyển sai hạn mức, sai nội dung,&nbsp;số ngừng hoạt động, hãy sử dụng chức năng&nbsp;KIỂM TRA MÃ GIAO DỊCH để được&nbsp;nhận lại tiền chơi .</strong></p>
                           <p style="text-align: justify;"><em><span style="color: #ff0000;"><strong>&nbsp; &nbsp; &nbsp; - Tất cả các mã giao dịch chỉ được hỗ trợ trong ngày nha ae!</strong></span></em></p>
                           <p style="text-align: justify;"><strong>&nbsp; &nbsp; 4.&nbsp;Nếu gặp các vấn đề khác nữa thì bạn hãy liên hệ hỗ trợ. (24/7).</strong></p>
                           <p style="text-align: center;"><span style="color: #800000;"><em><strong></strong></em></span></p>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="panel panel-primary">
                        <div class="panel-heading text-center">
                           <div class="row">
                              <div>
                                 <h4>TOP THẮNG TUẦN</h4>
                              </div>
                           </div>
                        </div>
                        <div class="panel-body">
                           <div class="col-xs-6">
                              <h4>
                                 <span data-action="phan-thuong" class="label label-danger" style="cursor: pointer;">
                                 <i class="fa fa-gift"></i>&nbsp;&nbsp;Phần thưởng
                                 </span>
                              </h4>
                           </div>
                           <div class="table-responsive">
                              <table class="table table-striped table-bordered table-hover text-center">
                                 <thead>
                                    <tr role="row" class="bg-primary">
                                       <th class="text-center text-white">TOP</th>
                                       <th class="text-center text-white">Số điện thoại</th>
                                       <th class="text-center text-white">Số tiền</th>
                                       <th class="text-center text-white">Thưởng</th>
                                    </tr>
                                 </thead>
                                 <tbody role="alert" aria-live="polite" aria-relevant="all" id="week_top" class="text-center">
                                    <?php
                                       $ngaydaucuatuan = getTimeStartTuan();
                                                          $ngaycuoicuatuan = getTimeEndTuan();
                                                          $result_momo_history = $VIP->get_list("SELECT SUM(amount_play), phone FROM `lich_su_choi` WHERE `status` = 'success' AND `time_tran` >= '".$ngaydaucuatuan."'  AND `time_tran` <= '".$ngaycuoicuatuan."'  GROUP BY `phone` ORDER BY SUM(amount_play) DESC LIMIT 5");
                                                           $i = 0;
                                                          $top_up = $VIP->get_row("SELECT * FROM `top_up` ");
                                                   foreach ($result_momo_history as $eow_top){
                                                       $i++;
                                                          ?>
                                    <tr>
                                       <td><img src="/assets/img/top<?=$i;?>.png" width="28px"></td>
                                       <td><?=substr($eow_top['phone'],0,-5)?>**** </td>
                                       <td><?=number_format($eow_top['SUM(amount_play)'])?></td>
                                       <td><?=number_format($top_up['thuong'.$i]);?> VNĐ.</td>
                                    </tr>
                                    <?php }?>
                                 </tbody>
                              </table>
                              <div class="text-center">
                                 <marquee color="white" style="color:red"><b>Chơi Nhiều Thắng Nhiều Nào Các Con Vợ.</b>
                                 </marquee>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <footer class="footer bg-grad-1">
         <div class="container text-center">
            <div class="row">
               <div class="col-xs-12">
                  <img src="<?=$VIP->site('logo')? $VIP->site('logo') : "/assets/img/logo.png";?>" alt="logo-footer" width="100px">
               </div>
               <div class="col-xs-12 text-white ">
                  Copyright 2022 © <a style="color: white;" href=""><?=strtoupper($_SERVER['SERVER_NAME']);?></a>
               </div>
            </div>
         </div>
      </footer>
      <script src="/assets/js/jquery-1.10.1.min.js"></script>
      <script src="/assets/js/jquery-ui-1.9.2.custom.min.js"></script>
      <script src="/assets/js/jquery.validate.min.js"></script>
      <script src="/assets/js/bootstrap.min.js"></script>
      <div class="modal fade" id="noticeModal" tabindex="-1" role="dialog" aria-labelledby="noticeModal" aria-hidden="true" style="display: none;">
         <div class="modal-dialog" role="document">
            <div class="modal-content">
               <div class="modal-header">
                  <h5 class="modal-title" id="noticeModal">Thông Báo</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
                  </button>
               </div>
               <div class="modal-body">
                  <?=$VIP->site('notification');?>
               </div>
               <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
               </div>
            </div>
         </div>
      </div>
      <div class="modal fade" id="modalGift" tabindex="-1" role="dialog" style="overflow: scroll; display: none;" aria-hidden="true">
         <div class="modal-dialog" role="document">
            <div class="modal-content">
               <div class="modal-header text-center">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                  <h3 class="modal-title">
                  </h3>
                  <h2 class="text-danger"><b>PHẦN THƯỞNG TOP</b></h2>
               </div>
               <div class="modal-body">
                  <p>TOP sẽ dược trao vào 24h chủ nhật hàng tuần.</p>
                  <p>Phần thưởng top :</p>
                  <p>- TOP 1 : <?=number_format($top_up['thuong1']);?> VNĐ</p>
                  <p>- TOP 2 : <?=number_format($top_up['thuong2']);?> VNĐ</p>
                  <p>- TOP 3 : <?=number_format($top_up['thuong3']);?> VNĐ</p>
                  <p>- TOP 4 : <?=number_format($top_up['thuong4']);?> VNĐ</p>
                  <p>- TOP 5 : <?=number_format($top_up['thuong5']);?> VNĐ</p>
               </div>
               <div class="modal-footer">
                  <button type="button" class="btn btn-danger" style="border-radius: 0;" data-dismiss="modal">Đóng</button>
               </div>
            </div>
         </div>
      </div>
      <script>
         $(document).ready(function() {
               $('#noticeModal').modal('show')
               $('[data-toggle="tooltip"]').tooltip()
             });
              $(document).ready(function() {
               $('#nohumodal').modal('hide')
               $('[data-toggle="tooltip"]').tooltip()
             });
         
             $(document).ready(function() {
         
         
         
         
                 function Timer(fn, t) {
                     var timerObj = setInterval(fn, t);
         
                     this.stop = function() {
                         if (timerObj) {
                             clearInterval(timerObj);
                             timerObj = null;
                         }
                         return this;
                     }
         
                     // start timer using current settings (if it's not already running)
                     this.start = function() {
                         if (!timerObj) {
                             this.stop();
                             timerObj = setInterval(fn, t);
                         }
                         return this;
                     }
         
                     // start with new or original interval, stop current interval
                     this.reset = function(newT = t) {
                         t = newT;
                         return this.stop().start();
                     }
                 }
         
         function AdjustingInterval(workFunc, interval, errorFunc) {
         var that = this;
         var expected, timeout;
         this.interval = interval;
         
         this.start = function() {
         expected = Date.now() + this.interval;
         timeout = setTimeout(step, this.interval);
         }
         
         this.stop = function() {
         clearTimeout(timeout);
         }
         
         function step() {
         var drift = Date.now() - expected;
         if (drift > that.interval) {
             // You could have some default stuff here too...
             if (errorFunc) errorFunc();
         }
         workFunc();
         expected += that.interval;
         timeout = setTimeout(step, Math.max(0, that.interval-drift));
         }
         }
         
         // this and send it out to the console.
         
         var justSomeNumber = $('#thoigian_head').text();
         //var justSomeNumber =20;
         // Define the work to be done
         var doWork = function(timeout) {
         
         if(justSomeNumber <= 0  ){
         justSomeNumber=904;
         (async function get_diemdanh() {     
         
             let fetchResponse = await fetch(`/api/giaodien/Get_diemdanh`);
             let data = await fetchResponse.json();
             if(data.phien > $('#diemdanh_id').text().substring(1)){
                 
                 $('#diemdanh_tongtien').html(data.tongtien);                                     
                 var ds_MM_=data.MM_;
                 var html_ds_MM_= '';
                 for (let key in ds_MM_) {
                     html_ds_MM_+=
                     `<tr> 
                         <td><small>`+ds_MM_[key].phien_thang+`</small></td>
                         
                         <td>`+ds_MM_[key].sdt+`</td>
                         
                         <td>`+ds_MM_[key].tien_nhan+` VNĐ.</td>
                     </tr>`;
                 }
                 $('#mayman_log').html( html_ds_MM_);
                 $('#diemdanh_last').html(data.MM_[0].sdt);
                 $('#diemdanh_id').html('#'+data.phien); 
                 justSomeNumber = data['timecount'];
         
             } else {
         
                 setTimeout(async () => {
                     await get_diemdanh();
                 }, 1000);
                 
             } 
         
         })();
         
         } else {
         $('#diemdanh_thoigian').html(justSomeNumber);
         $('#thoigian_head').html(justSomeNumber);
         justSomeNumber -= 1;
         }
         
         };
         
         // Define what to do if something goes wrong
         var doError = function() {
         // console.warn('The drift exceeded the interval.');
         };
         
         // (The third argument is optional)
         
         ticker = new AdjustingInterval(doWork, 1000);
         ticker.interval = 1000;
         ticker.start();
         
         
         
         
         
         
         var timeleft_10s = 0;
         var downloadTimer_10s = new Timer(function(){
         if(timeleft_10s <= 0){
         
         downloadTimer_10s.stop();
         
         $.when( 
         $.ajax({
             method: "POST",
             url: "/api/giaodien/GetLsgd_10s",
         
             success: function(response) {
         
                 var data = JSON.parse(response);        
                 if(data.user_dd){
                     $('#diemdanh_users2').html(data.user_dd);
                     $('#diemdanh_users').html(data.user_dd);
                     
                 }                 
                  else {
                     $('#diemdanh_users2').html(0);
                     $('#diemdanh_users').html(0);
                     
                 };
                 
         
         
         
                 var ds_user_dd=data.MM_user;
                 var html_ds_user_dd= '';
                 for (let key in ds_user_dd) {
                     html_ds_user_dd+=ds_user_dd[key].sdt+'; ';
                 }
                 $('#muc_users').html(html_ds_user_dd);
                 
         
                 var ds_LIST_H=data.LIST_H;
                 var html_ds_LIST_H= '';
                  for (let key in ds_LIST_H) {
                     html_ds_LIST_H+=`<tr>
                     <td>`+ds_LIST_H[key].time+`</td>
                     <td>`+ds_LIST_H[key].phone+`</td>
                     <td>`+ds_LIST_H[key].amount_play+`</td>
                 <td>`+ds_LIST_H[key].amount_game+`</td>
                     <td>`+ds_LIST_H[key].game+`</td>
                     <td><span class="fa-stack">
                         <span class="fa fa-circle fa-stack-2x" style="color:green"></span>
                         <span class="fa-stack-1x text-white">`+ds_LIST_H[key].comment+`</span>
                         </span>
                     </td>
                     <td><span class="label label-success text-uppercase">`+(ds_LIST_H[key].result == 'success'? 'Thắng' :'Thua')+`</span></td>
                     </tr>`;
                 }
                 //console.log(html_ds_LIST_H);
                 //$('#0X2134X453 > tbody').append(
                     $('#0X2134X453 > tbody').html(html_ds_LIST_H);
         
                 
              },       
         
             error: function(xhr) {
             },
         
         })
         
         ).then(function() {
         
         // const elements2 = document.querySelectorAll('.coundown-time');
         // elements2.forEach(el => {
         //     el.innerHTML = 5;
         // });
         timeleft_10s = 10;
         downloadTimer_10s.start();
         
         });
         
         } else {
         
         // const elements3 = document.querySelectorAll('.coundown-time');
         
         // elements3.forEach(el => {
         //     el.innerHTML =timeleft;
         // });
         
         }
         timeleft_10s -= 1;
         }, 1000);
         
         
         
                 
         
         
         
                 var timeleft = 0;
                 var downloadTimer = new Timer(function(){
                 if(timeleft <= 0){
         
                     downloadTimer.stop();
                     const elements = document.querySelectorAll('.coundown-time');
         
                     elements.forEach(el => {
                         el.innerHTML = 0;
                     });
         
         
                     $.when(
         
                         $.ajax({
         
                             method: "POST",
                             url: "/api/giaodien/GetMomo",
         
         
                             success: function(response) {
                                 var data = JSON.parse(response);
                                 var currentTab;
                                 
                                 var arrOfturn_tab= $('#0X2134X555').children()
                                 currentTab='chan-le';
                                 var trure=false;
                                 if (arrOfturn_tab.length!==0) 
                                 {
                                     for (let ele in arrOfturn_tab)
                                         if(arrOfturn_tab[ele].classList?.contains('active')) {
                                             currentTab= arrOfturn_tab[ele].getAttribute("turn-tab");
                                             trure=true;
                                             //console.log(currentTab);
                                             break;
                                         }
                                     if (trure==false) currentTab='';
                                     
                                 }
                                 let body = '';
                                 let trangthai_table='';
                                 //console.log(data);
                                 data.forEach((data) => {
                                    body+=`
                                    <div class="panel-body turn`+(data['ma_game'] == currentTab ? ' active' : '')+`" turn-tab="`+data['ma_game']+`" style="padding-top: 0px;">
                                    `+data['mo_ta']+`
                                    - Chuyển tiền vào một trong các tài khoản ở <a href=""><code> danh sách số</code></a> bên
                                    dưới
                                    <p></p>
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-hover text-center">
                                            <thead>
                                                <tr role="row" class="bg-primary">
                                                <th class="text-center text-white">Số điện thoại</th>
                                                <th class="text-center text-white">Cược tối thiểu</th>
                                                <th class="text-center text-white">Cược tối đa</th>
                                                </tr>
                                            </thead>
                                            <tbody role="alert" aria-live="polite" aria-relevant="all" id="phone-table1" class="">
                                                `;
                                    trangthai_table+=`
                                    <div class="panel-body turn`+(data['ma_game'] == currentTab ? ' active' : '')+`" turn-tab="`+data['ma_game']+`" style="padding-top: 0px;">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-hover text-center">
                                            <thead>
                                                <tr role="row" class="bg-primary">
                                                <th class="text-center text-white">Số điện thoại</th>
                                                <th class="text-center text-white">Trạng thái</th>
                                                <th class="text-center text-white">Lượt</th>
                                                <th class="text-center text-white">GD Ngày</th>
                                                </tr>
                                            </thead>
                                            <tbody role="alert" aria-live="polite" aria-relevant="all" id="trangthai_table" class="">
                                                `;
                                    var ds_phone=data.ds_phone;
                                    //Object.keys(ds_phone).foreach((key) => {
                                    for (let key in ds_phone) {
                                        body+=`
                                        <tr>
                                        <td id="p_1461"><b id="since04_`+ds_phone[key].id+`" style="
                                            position: relative;
                                            ">`+key+` <span class="label label-success text-uppercase" onclick="coppy('`+key+`','`+ds_phone[key].min+`','`+ds_phone[key].max+`')"><i class="fa fa-clipboard" aria-hidden="true"></i></span> </td>
                                        <td>`+ds_phone[key].min+`</td>
                                        <td>`+ds_phone[key].max+`</td>
                                        </tr>
                                        `;
                                        trangthai_table+=   `
                                        <tr>
                                        <td id="p_1353"><b id="since05_`+ds_phone[key].id+`" style="
                                            position: relative;
                                            ">`+key+`  <span  class="label label-success text-uppercase" onclick="coppy('`+key+`','`+ds_phone[key].min+`','`+ds_phone[key].max+`')"><i class="fa fa-clipboard" aria-hidden="true"></i></span> </td>
                                        <td><span class="label label-success text-uppercase">Hoạt động</span></td>
                                        <td>`+ds_phone[key].today_gd+`</td>
                                        <td>`+Intl.NumberFormat().format(ds_phone[key].today)+`<b style="color:red">/30M</b></td>
                                        </tr>
                                        `; 
                                    };
                                    trangthai_table+=`
                                            </tbody>
                                        </table>
                                    </div>
                                    </div>
                                    `;
                                    body+=`
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="text-center font-weight-bold"><b>Làm mới sau <span class="text-danger coundown-time">10</span> s</b>
                                    </div>
                                    - Nội dung chuyển :
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-hover text-center">
                                            <thead>
                                                <tr role="row" class="bg-primary">
                                                <th class="text-center text-white">Nội dung</th>
                                                <th class="text-center text-white">Số</th>
                                                <th class="text-center text-white">Tiền nhận</th>
                                                </tr>
                                            </thead>
                                            <tbody role="alert" aria-live="polite" aria-relevant="all" id="result-table" class="">
                                                `;
                                    var k=0;
                                    var setting=data.setting;
                                    // Object.keys(setting).foreach((key) => {  
                                    for (let key in setting) {                 
                                        k++;
                                        body+=`
                                        <tr>
                                        <td>
                                            <span class="fa-stack"><span class="fa fa-circle fa-stack-2x dot-text-`+k+`"> </span><span class="fa-stack-1x text-white" id=""><b>`+setting[key].comment+`</b></span></span>
                                        </td>
                                        <td> `;
                                        // i = 0;
                                        // kq = ;
                                        // for( var key in setting[key].result ) {
                                        // for(setting[key].result as key_ => row_comment) { 
                                        var result= setting[key].result;
                                        //result.foreach((key) => {  
                                        for (let key in result) { 
                                            body+=`<span class="fa-stack">
                                            <span class="fa fa-circle fa-stack-2x dot-text-`+key+`"> </span>
                                            <span class="fa-stack-1x text-white" id="">`+result[key]+`</span>
                                            </span>`;
                                        };
                                            body+=`
                                        </td>
                                        <td>
                                            <b>x`+setting[key].ratio+`</b>
                                        </td>
                                        </tr>
                                        `;
                                    } ;
                                    body+=`    
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="panel-body turn`+(data['ma_game'] == 'chan-le' ? ' active' : '')+`" turn-tab="`+data['ma_game']+`" style="padding-top: 0px;">
                                        <p style="text-align:justify"><strong>- Nếu kết quả trùng với bảng số trên, bạn sẽ chiến thắng.</strong></p>
                                    </div>
                                    </div>
                                    `;
         
                                  });
                                 
         
         
                                //  console.log(trangthai_table_1);
                                 $('#0X2134X555').html(body);
                                 $('#trangthai_table').html(trangthai_table);
                             },
         
                             
         
                             error: function(xhr) {
                             },
         
                         })
         
                     ).then(function() {
         
                         const elements2 = document.querySelectorAll('.coundown-time');
         
                         elements2.forEach(el => {
                             el.innerHTML = 30;
                         });
         
                         timeleft = 30;
         
                         downloadTimer.start();
         
                     });
         
                 } else {
         
                     const elements3 = document.querySelectorAll('.coundown-time');
         
                     elements3.forEach(el => {
                         el.innerHTML =timeleft;
                     });
         
                 }
                 timeleft -= 1;
                 }, 1000);
             });
      </script>
      <script>
         function diemdanh(){
                    var zData = $("#diemdanh").serialize();
                    $.ajax({
                                  type: "POST",
                                  url: "/api/diemdanh",
                                  data: zData,
                                  success: function (result1) {
                                      result = JSON.parse(result1);
                                      document.getElementById("submit").disabled = false;
                                      if(result.status == 'success'){
                                          $("#result-diemdanh").attr("class","").addClass("alert alert-success").html(result.msg);
                                      }else{
                                          $("#result-diemdanh").attr("class","").addClass("alert alert-danger").html(result.msg);
                                      }
                                  },
                              });
         
                }
         function nhiemvu_ngay(){
                    var zData = $("#nhiemvu_ngay").serialize();
                    $.ajax({
                                  type: "POST",
                                  url: "/api/nhiemvungay",
                                  data: zData,
                                  success: function (result1) {
                                      result = JSON.parse(result1);
                                      document.getElementById("submit").disabled = false;
                                      if(result.status == 'success'){
                                          $("#result-nhiemvu_ngay").attr("class","").addClass("alert alert-success").html(result.msg);
                                      }else{
                                          $("#result-nhiemvu_ngay").attr("class","").addClass("alert alert-danger").html(result.msg);
                                      }
                                  },
                              });
         
                }
         function nhap_gifcode(){
                    var zData = $("#nhap_gifcode").serialize();
                    $.ajax({
                                  type: "POST",
                                  url: "/api/giftcode",
                                  data: zData,
                                  success: function (result1) {
                                      result = JSON.parse(result1);
                                      document.getElementById("submit").disabled = false;
                                      if(result.status == 'success'){
                                          $("#result-gif").attr("class","").addClass("alert alert-success").html(result.msg);
                                      }else{
                                          $("#result-gif").attr("class","").addClass("alert alert-danger").html(result.msg);
                                      }
                                  },
                              });
         
                }
         
            function check_tranid(){
                    var zData = $("#check_tranid").serialize();
                    $.ajax({
                                  type: "POST",
                                  url: "/api/giaodien/check",
                                  data: zData,
                                  success: function (result1) {
                                      result = JSON.parse(result1);
                                      document.getElementById("submit").disabled = false;
                                      if(result.status == 'success'){
                                          $("#result-check").attr("class","").addClass("alert alert-success").html(result.msg);
                                      }else{
                                          $("#result-check").attr("class","").addClass("alert alert-danger").html(result.msg);
                                      }
                                  },
                              });
         
                }
                
                $(document).ready(function() {
         
                    function isJsonString(str) {
            try {
                JSON.parse(str);
            } catch (e) {
                return false;
            }
            return true;
         }
         
         
         $('#ajaxs_form').submit(function(event) {
            event.preventDefault(); // <- avoid reloading
         
            var button = $("#form_smit_btn");
            var btn_text=button.html();
         
            try {
                button.prop('disabled', true);
                button.html("Đang Xử Lý ...");
            }
            catch (e) {
         
                void(0);
         
            }
         
         
            $.ajax({
         
                method: $(this).attr('method'),
                url: $(this).attr('action'),
                data: $(this).serialize(),
                // other AJAX settings goes here
                // ..
         
         
         
                success: function(response) {
         
         
         
         
                    var data = response;
         
         
         
         
                    if (data.success == true){
                        alert(
                            data.message,
                        );
                        setTimeout(function(){ window.location.href = window.location.href; }, 2000);
                    }else{
                        alert(
                            data.message,
                        );
                    }
         
                    try {
                        // Process the response here
                        button.prop('disabled', false);
                        button.html(btn_text);
                    }
                    catch (e) {
         
                        void(0);
         
                    }
         
         
         
         
         
                },
         
                error: function(xhr) {
         
         
                    if (!isJsonString(xhr.responseText)){
                        Swal.fire(
                            'Lỗi',
                            'Có Lỗi Xảy Ra !',
                            'error'
                        );
                        try {
                            // Process the response here
                            button.prop('disabled', false);
                            button.html(btn_text);
                        }
                        catch (e) {
         
                            void(0);
         
                        }
         
         
         
                    }
         
                    var data = JSON.parse(xhr.responseText);
         
                    if (data.success !== true){
                        alert(
                            data.message,
                        );
         
                    }else{
                        alert(
                            data.message,
                        );
                        setTimeout(function(){ window.location.href = window.location.href; }, 2000);
                    }
         
                    try {
                        // Process the response here
                        button.prop('disabled', false);
                        button.html(btn_text);
                    }
                    catch (e) {
         
                        void(0);
         
                    }
         
         
                }
         
            })
         
         });
         
         
         $('#ajaxs_form2').submit(function(event) {
            event.preventDefault(); // <- avoid reloading
         
            var button = $("#form_smit_btn2");
            var btn_text=button.html();
         
            try {
                button.prop('disabled', true);
                button.html("Đang Xử Lý ...");
            }
            catch (e) {
         
                void(0);
         
            }
         
         
            $.ajax({
         
                method: $(this).attr('method'),
                url: $(this).attr('action'),
                data: $(this).serialize(),
                // other AJAX settings goes here
                // ..
         
         
         
                success: function(response) {
         
         
         
         
                    var data = response;
         
         
         
         
                    if (data.success == true){
                        alert(
                            data.message,
                        );
                        setTimeout(function(){ window.location.href = window.location.href; }, 2000);
                    }else{
                        alert(
                            data.message,
                        );
                    }
         
                    try {
                        // Process the response here
                        button.prop('disabled', false);
                        button.html(btn_text);
                    }
                    catch (e) {
         
                        void(0);
         
                    }
         
         
         
         
         
                },
         
                error: function(xhr) {
         
         
                    if (!isJsonString(xhr.responseText)){
                        Swal.fire(
                            'Lỗi',
                            'Có Lỗi Xảy Ra !',
                            'error'
                        );
                        try {
                            // Process the response here
                            button.prop('disabled', false);
                            button.html(btn_text);
                        }
                        catch (e) {
         
                            void(0);
         
                        }
         
         
         
                    }
         
                    var data = JSON.parse(xhr.responseText);
         
                    if (data.success !== true){
                        alert(
                            data.message,
                        );
         
                    }else{
                        alert(
                            data.message,
                        );
                        setTimeout(function(){ window.location.href = window.location.href; }, 2000);
                    }
         
                    try {
                        // Process the response here
                        button.prop('disabled', false);
                        button.html(btn_text);
                    }
                    catch (e) {
         
                        void(0);
         
                    }
         
         
                }
         
            })
         
         });
         
         
         $('#ajaxs_form3').submit(function(event) {
            event.preventDefault(); // <- avoid reloading
         
            var button = $("#form_smit_btn3");
            var btn_text=button.html();
         
            try {
                button.prop('disabled', true);
                button.html("Đang Xử Lý ...");
            }
            catch (e) {
         
                void(0);
         
            }
         
         
            $.ajax({
         
                method: $(this).attr('method'),
                url: $(this).attr('action'),
                data: $(this).serialize(),
                // other AJAX settings goes here
                // ..
         
         
         
                success: function(response) {
         
         
         
         
                    var data = response;
         
         
         
         
                    if (data.success == true){
                        alert(
                            data.message,
                        );
                        setTimeout(function(){ window.location.href = window.location.href; }, 2000);
                    }else{
                        alert(
                            data.message,
                        );
                    }
         
                    try {
                        // Process the response here
                        button.prop('disabled', false);
                        button.html(btn_text);
                    }
                    catch (e) {
         
                        void(0);
         
                    }
         
         
         
         
         
                },
         
                error: function(xhr) {
         
         
                    if (!isJsonString(xhr.responseText)){
                        Swal.fire(
                            'Lỗi',
                            'Có Lỗi Xảy Ra !',
                            'error'
                        );
                        try {
                            // Process the response here
                            button.prop('disabled', false);
                            button.html(btn_text);
                        }
                        catch (e) {
         
                            void(0);
         
                        }
         
         
         
                    }
         
                    var data = JSON.parse(xhr.responseText);
         
                    if (data.success !== true){
                        alert(
                            data.message,
                        );
         
                    }else{
                        alert(
                            data.message,
                        );
                        setTimeout(function(){ window.location.href = window.location.href; }, 2000);
                    }
         
                    try {
                        // Process the response here
                        button.prop('disabled', false);
                        button.html(btn_text);
                    }
                    catch (e) {
         
                        void(0);
         
                    }
         
         
                }
         
            })
         
         });
         
         
         $('#ajaxs_form4').submit(function(event) {
            event.preventDefault(); // <- avoid reloading
         
            var button = $("#form_smit_btn4");
            var btn_text=button.html();
         
            try {
                button.prop('disabled', true);
                button.html("Đang Xử Lý ...");
            }
            catch (e) {
         
                void(0);
         
            }
         
         
            $.ajax({
         
                method: $(this).attr('method'),
                url: $(this).attr('action'),
                data: $(this).serialize(),
                // other AJAX settings goes here
                // ..
         
         
         
                success: function(response) {
         
         
         
         
                    var data = response;
         
         
         
         
                    if (data.success == true){
                        alert(
                            data.message,
                        );
                        setTimeout(function(){ window.location.href = window.location.href; }, 2000);
                    }else{
                        alert(
                            data.message,
                        );
                    }
         
                    try {
                        // Process the response here
                        button.prop('disabled', false);
                        button.html(btn_text);
                    }
                    catch (e) {
         
                        void(0);
         
                    }
         
         
         
         
         
                },
         
                error: function(xhr) {
         
         
                    if (!isJsonString(xhr.responseText)){
                        Swal.fire(
                            'Lỗi',
                            'Có Lỗi Xảy Ra !',
                            'error'
                        );
                        try {
                            // Process the response here
                            button.prop('disabled', false);
                            button.html(btn_text);
                        }
                        catch (e) {
         
                            void(0);
         
                        }
         
         
         
                    }
         
                    var data = JSON.parse(xhr.responseText);
         
                    if (data.success !== true){
                        alert(
                            data.message,
                        );
         
                    }else{
                        alert(
                            data.message,
                        );
                        setTimeout(function(){ window.location.href = window.location.href; }, 2000);
                    }
         
                    try {
                        // Process the response here
                        button.prop('disabled', false);
                        button.html(btn_text);
                    }
                    catch (e) {
         
                        void(0);
         
                    }
         
         
                }
         
            })
         
         });
         
         $('#ajaxs_form5').submit(function(event) {
            event.preventDefault(); // <- avoid reloading
         
            var button = $("#form_smit_btn5");
            var btn_text=button.html();
         
            try {
                button.prop('disabled', true);
                button.html("Đang Xử Lý ...");
            }
            catch (e) {
         
                void(0);
         
            }
         
         
            $.ajax({
         
                method: $(this).attr('method'),
                url: $(this).attr('action'),
                data: $(this).serialize(),
                // other AJAX settings goes here
                // ..
         
         
         
                success: function(response) {
         
         
         
         
                    var data = response;
         
         
         
         
                    if (data.success == true){
                        alert(
                            data.message,
                        );
                        setTimeout(function(){ window.location.href = window.location.href; }, 2000);
                    }else{
                        alert(
                            data.message,
                        );
                    }
         
                    try {
                        // Process the response here
                        button.prop('disabled', false);
                        button.html(btn_text);
                    }
                    catch (e) {
         
                        void(0);
         
                    }
         
         
         
         
         
                },
         
                error: function(xhr) {
         
         
                    if (!isJsonString(xhr.responseText)){
                        Swal.fire(
                            'Lỗi',
                            'Có Lỗi Xảy Ra !',
                            'error'
                        );
                        try {
                            // Process the response here
                            button.prop('disabled', false);
                            button.html(btn_text);
                        }
                        catch (e) {
         
                            void(0);
         
                        }
         
         
         
                    }
         
                    var data = JSON.parse(xhr.responseText);
         
                    if (data.success !== true){
                        alert(
                            data.message,
                        );
         
                    }else{
                        alert(
                            data.message,
                        );
                        setTimeout(function(){ window.location.href = window.location.href; }, 2000);
                    }
         
                    try {
                        // Process the response here
                        button.prop('disabled', false);
                        button.html(btn_text);
                    }
                    catch (e) {
         
                        void(0);
         
                    }
         
         
                }
         
            })
         
         });
         
         $("#form_smit_btn").prop('disabled', false);
         $("#form_smit_btn2").prop('disabled', false);
         $("#form_smit_btn3").prop('disabled', false);
         $("#form_smit_btn4").prop('disabled', false);
         $("#form_smit_btn5").prop('disabled', false);
         
                  $("button[data-action=huongdan]").click((e) => {
                    $("#myModal").modal("show");
                  });
                  $("span[data-action=phan-thuong]").click((e) => {
                    $("#modalGift").modal("show");
                  });
         
         
         
                  $('button[server-action=change]').click(function() {
                    let button = $(this);
                    let id = button.attr('server-id');
                    selection_server = id;
                    selection_rate = button.attr('server-rate');
                    $('.turn').removeClass('active');
                    $(`.turn[turn-tab=${id}]`).addClass('active');
                    $('button[server-action=change]').attr('class', 'btn btn-default');
                    button.attr('class', 'btn btn-primary');
                  });
         
         
                  $('button[bot-action=change]').click(function() {
                    let button = $(this);
                    let id = button.attr('bot-id');
                    $('.bot').removeClass('active');
                    $(`.bot[bot-tab=${id}]`).addClass('active');
                    $('button[bot-action=change]').attr('class', 'btn btn-default');
                    button.attr('class', 'btn btn-primary');
                  });
                  $('button[server-id=1]').click();
                });
         
         
                var i = 0,
                  a = 0,
                  isBackspacing = false,
                  isParagraph = false;
                var textArray = ["Hệ Thống Chẵn Lẻ MoMo|Uy Tín, Giao Dịch Tự Động 24/7 - Bank 30s !"];
                var speedForward = 0,
                  speedWait = 30000,
                  speedBetweenLines = 10,
                  speedBackspace = 0;
                typeWriter("output", textArray);
         
                function typeWriter(id, ar) {
                  var element = $("#" + id),
                    aString = ar[a],
                    eHeader = element.children("h3"),
                    eParagraph = element.children("h4");
                  if (!isBackspacing) {
                    if (i < aString.length) {
                      if (aString.charAt(i) == "|") {
                        isParagraph = true;
                        eHeader.removeClass("cursor");
                        eParagraph.addClass("cursor");
                        i++;
                        setTimeout(function() {
                          typeWriter(id, ar);
                        }, speedBetweenLines);
                      } else {
                        if (!isParagraph) {
                          eHeader.text(eHeader.text() + aString.charAt(i));
                        } else {
                          eParagraph.text(eParagraph.text() + aString.charAt(i));
                        }
                        i++;
                        setTimeout(function() {
                          typeWriter(id, ar);
                        }, speedForward);
                      }
                    } else if (i == aString.length) {
                      isBackspacing = true;
                      setTimeout(function() {
                        typeWriter(id, ar);
                      }, speedWait);
                    }
                  } else {
                    if (eHeader.text().length > 0 || eParagraph.text().length > 0) {
                      if (eParagraph.text().length > 0) {
                        eParagraph.text(eParagraph.text().substring(0, eParagraph.text().length - 1));
                      } else if (eHeader.text().length > 0) {
                        eParagraph.removeClass("cursor");
                        eHeader.addClass("cursor");
                        eHeader.text(eHeader.text().substring(0, eHeader.text().length - 1));
                      }
                      setTimeout(function() {
                        typeWriter(id, ar);
                      }, speedBackspace);
                    } else {
                      isBackspacing = false;
                      i = 0;
                      isParagraph = false;
                      a = (a + 1) % ar.length;
                      setTimeout(function() {
                        typeWriter(id, ar);
                      }, 50);
                    }
                  }
                }
                function setCookie(cname, cvalue, exhour) {
                  var d = new Date();
                  d.setTime(d.getTime() + (exhour * 60 * 60 * 1000));
                  var expires = "expires=" + d.toUTCString();
                  document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
                }
         
                function getCookie(cname) {
                  var name = cname + "=";
                  var ca = document.cookie.split(';');
                  for (var i = 0; i < ca.length; i++) {
                    var c = ca[i];
                    while (c.charAt(0) == ' ') {
                      c = c.substring(1);
                    }
                    if (c.indexOf(name) == 0) {
                      return c.substring(name.length, c.length);
                    }
                  }
                  return false;
                }
                let cookie = getCookie('modal_alert');
                if (!cookie) {
                  $("#modalAlert").modal("show");
                  setCookie('modal_alert', true, 0.5);
                }
         
                function copyStringToClipboard(str) {
                  var el = document.createElement('textarea');
                  var copydown = document.getElementById('copydown');
                  el.value = str;
                  el.setAttribute('readonly', '');
                  el.style = {
                    position: 'absolute',
                    left: '-9999px'
                  };
                  document.body.appendChild(el);
                  el.select();
                  document.execCommand('copy');
                  document.body.removeChild(el);
                  var thongbao = 'Đã sao chép số điện thoại: '+el.value+ ' Vui lòng chú ý hạn mức còn lại trước khi chơi nhé .';
                  alert(thongbao);
                }
                function coppy(text,min,max){
                    var textArea=document.createElement("textarea");
                    textArea.style.position='fixed';textArea.style.top=0;textArea.style.left=0;textArea.style.width='2em';textArea.style.height='2em';textArea.style.padding=0;textArea.style.border='none';
                    textArea.style.outline='none';textArea.style.boxShadow='none';textArea.style.background='transparent';textArea.value=text;document.body.appendChild(textArea);textArea.focus();
                    textArea.select();try{
                        var successful=document.execCommand('copy');var msg=successful?'successful':'unsuccessful';alert('Đã sao chép số điện thoại: '+text+'. Chỉ chơi từ: '+min+' VNĐ đến '+max+' VNĐ chúc bạn may mắn ');}catch(err){console.log('Oops, unable to copy');}
                  document.body.removeChild(textArea);}
      </script>
   </body>
   <div id="smartyContainer" style="position: absolute; bottom: 0px; left: 0px; line-height: initial; z-index: 2147483647; width: auto; font-size: initial;"></div>
</html>