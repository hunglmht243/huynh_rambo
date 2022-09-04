<?php
declare(strict_types=1);
require('../core/@connect.php'); 
require_once(realpath($_SERVER["DOCUMENT_ROOT"]).'/vendor/autoload.php') ;
if(isset($_SESSION['username'])){header('Location: /adm/home');exit;}
//echo getMyUrl('adm/login/action');


?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="">
  <title>Đăng nhập</title>
  <!-- Favicon -->
  <link rel="icon" href="/admin_assets/img/brand/favicon.png" type="image/png">
  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <!-- Icons -->
  <link rel="stylesheet" href="/assets/admin/css/nucleo.css" type="text/css">
  <link rel="stylesheet" href="/assets/admin/css/all.min.css" type="text/css">
  <!-- Argon CSS -->
  <link rel="stylesheet" href="/assets/admin/css/argon.css?=<?=rand(1,9999);?>" type="text/css">
</head>

<body class="bg-default">
  <!-- Navbar -->
  <nav id="navbar-main" class="navbar navbar-horizontal navbar-transparent navbar-main navbar-expand-lg navbar-light">
    <div class="container">
      <a class="navbar-brand" href="/">
        <img src="<?=$VIP->site('logo');?>" style="height: 80px !important;">
      </a>
    </div>
  </nav>
  <!-- Main content -->
  <div class="main-content">
    <!-- Header -->
    <div class="header bg-gradient-primary py-7 py-lg-8 pt-lg-9">
      <div class="container">
        <div class="header-body text-center mb-7">
          <div class="row justify-content-center">
            <div class="col-xl-5 col-lg-6 col-md-8 px-5">
              <h1 class="text-white">Welcome!</h1>
              <p class="text-lead text-white">Đăng nhập vào hệ thống quản lý.</p>
            </div>
          </div>
        </div>
      </div>
      <div class="separator separator-bottom separator-skew zindex-100">
        <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
          <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
        </svg>
      </div>
    </div>
    <!-- Page content -->

    <div class="container mt--8 pb-5">
      <div class="row justify-content-center">
        <div class="col-lg-5 col-md-7">
          <div class="card bg-secondary border-0 mb-0">
            <div class="card-body px-lg-5 py-lg-5">
                <form submit-ajax="VIP"  action="<?=getMyUrl('adm/login/action');?>" method="post">
    <input type="hidden" name="_token" value="tVjXfr7sEdKf63XpMdYuGZ7wm90Bfptbq3YEq">
<input type="hidden" name="action" value="login">
                          <div class="form-group mb-3">
                  <div class="input-group input-group-merge input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-circle-08"></i></span>
                    </div>
                    <input class="form-control" placeholder="email" type="text" name="email" require>
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group input-group-merge input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                    </div>
                    <input class="form-control" placeholder="Password" type="password" name="password" require>
                  </div>
                </div>
                <?php
                    //  $admin= $VIP->get_row(" SELECT * FROM `users`");
                    // //  print_r();die();
                     
                    //  if($admin['2fa']==null){
                    //   $g = new \Sonata\GoogleAuthenticator\GoogleAuthenticator();
                    //   $secret = $g->generateSecret();

                    //   $link=  \Sonata\GoogleAuthenticator\GoogleQrUrl::generate($_SERVER['SERVER_NAME'],$secret,'clmm');
                     ?>
                     <!-- <p><b>Đăng kí 2fa</b></p> 
                         <div><img src="<?=$link?>;"><br>
                         <p><b>Mở app scan mã QR và nhập code</b></p>  
                      <input type="hidden" name="2fa-secret"value="<?=$secret?>" >
                      </div> -->
                  <?php //}  ?>
                  <!-- <div class="form-group">
                  <div class="input-group input-group-merge input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                    </div>
                    <input class="form-control" placeholder="2fa code" type="text" name="2fa-code" require>
                    
                  </div>
                </div> -->
                   
     

                <div class="text-center">
                  <button type="submit" class="btn btn-primary my-4">Đăng Nhập</button>
                </div>
              </form>
            </div>
          </div>
          <div class="row mt-3">
            <div class="col-12 text-center">
              <a href="" class="text-light"><small>Quên mật khẩu?</small></a>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Footer -->
  <footer class="py-5" id="footer-main">
    <div class="container">
      <div class="row align-items-center justify-content-xl-between">
        <div class="col-xl-6">
          <div class="copyright text-center text-xl-left text-muted">
            &copy; 2022 <a href="" class="font-weight-bold ml-1" target="_blank"><?=strtoupper($_SERVER['SERVER_NAME']);?></a>
          </div>
        </div>
        <div class="col-xl-6">
          <ul class="nav nav-footer justify-content-center justify-content-xl-end">
            <li class="nav-item">
              <a href="" class="nav-link" target="_blank">CPanel - MOMO</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </footer>

<script src="/assets/admin/backend/js/bundle.js?95118454"></script>
<script src="/assets/admin/backend/js/app.min.js?47916108"></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/pusher/7.0.3/pusher.min.js?27184805"></script>
<script>
    const pusher = new Pusher('8424c10da800c48a00cf', {
        cluster: 'ap1'
    });
</script> -->
<script src="/assets/admin/backend/js/function.js?93150220?ntd=12167504"></script>
<script>
    $(document).ready(function() {
        $('#modalSystem').modal('show');
    });

    function closeModalSystem() {
        setCookie('modalSystem', true, 1);
        $('#modalSystem').modal('hide');
    }
</script>
  <!-- Core -->
  <script src="/assets/admin/js/jquery.min.js"></script>
  <script src="/assets/admin/js/bootstrap.bundle.min.js"></script>
  <script src="/assets/admin/js/js.cookie.js"></script>
  <script src="/assets/admin/js/jquery.scrollbar.min.js"></script>
  <script src="/assets/admin/js/jquery-scrollLock.min.js"></script>
  <!-- Argon JS -->
  <script src="/assets/admin/js/argon.js"></script>

</body>

</html>
