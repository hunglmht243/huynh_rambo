

<body>
    <!-- Sidenav -->
    <nav class="sidenav navbar navbar-vertical fixed-left navbar-expand-xs navbar-light bg-white" id="sidenav-main">
      <div class="scrollbar-inner">
        <!-- Brand -->
        <div class="sidenav-header d-flex align-items-center">
          <a class="navbar-brand" href="/adm/home">
            <img src="/ADMIN/vendor/img/blue.png" class="navbar-brand-img" alt="...">
          </a>
          <div class="ml-auto">
            <!-- Sidenav toggler -->
            <div class="sidenav-toggler d-none d-xl-block" data-action="sidenav-unpin" data-target="#sidenav-main">
              <div class="sidenav-toggler-inner">
                <i class="sidenav-toggler-line"></i>
                <i class="sidenav-toggler-line"></i>
                <i class="sidenav-toggler-line"></i>
              </div>
            </div>
          </div>
        </div>
        <div class="navbar-inner">
          <!-- Collapse -->
          <div class="collapse navbar-collapse" id="sidenav-collapse-main">
            <!-- Nav items -->
            <ul class="navbar-nav mb-md-3">
              <li class="nav-item">
                  <a class="nav-link" href="/adm/home">
                      <i class="ni ni-spaceship"></i>
                      <span class="nav-link-text">Trang chủ</span>
                  </a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="#navbar-momo" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-components">
                      <i class="ni ni-align-left-2 text-info"></i>
                      <span class="nav-link-text">MoMo</span>
                  </a>
                  <div class="collapse" id="navbar-momo">
                      <ul class="nav nav-sm flex-column">
                          <li class="nav-item">
                              <a href="/adm/momo/add" class="nav-link">Thêm Momo</a>
                          </li>
                          <li class="nav-item">
                              <a href="/adm/momo/list" class="nav-link">Danh sách Momo</a>
                          </li>
                          <li class="nav-item">
                              <a href="/adm/momo/history-transaction" class="nav-link">Lịch sử giao dịch</a>
                          </li>
                          <li class="nav-item">
                              <a href="/ADMIN/lich_su_tung_sdt.php" class="nav-link">Tổng tiền người chơi</a>
                          </li>
                          <li class="nav-item">
                              <a href="/adm/momo/send-money" class="nav-link">Chuyển tiền momo</a>
                          </li>
                          <li class="nav-item">
                              <a href="/adm/momo/send-bank" class="nav-link">Chuyển tiền bank</a>
                          </li>
                      </ul>
                  </div>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="#navbar-service" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-components">
                      <i class="ni ni-atom text-info"></i>
                      <span class="nav-link-text">Dịch Vụ</span>
                  </a>
                  <div class="collapse" id="navbar-service">
                      <ul class="nav nav-sm flex-column">
                         <li class="nav-item">
                              <a href="/adm/service/sdt-game" class="nav-link">Thêm số vào game</a>
                          </li>
                          <li class="nav-item">
                              <a href="/adm/service/history" class="nav-link">Lịch sử</a>
                          </li>
                          <li class="nav-item">
                              <a href="/adm/service/payment" class="nav-link">Danh sách trả tiền</a>
                          </li>
                            <li class="nav-item">
                              <a href="/adm/service/bill-error" class="nav-link">Danh sách bill lỗi</a>
                          </li>
                          <li class="nav-item">
                              <a href="/adm/service/check-bill" class="nav-link">Kiểm tra MGD</a>
                          </li>

                         
                           <li class="nav-item">
                              <a href="/adm/service/msg" class="nav-link">Message Chuyển Tiền</a>
                          </li>
                          <li class="nav-item">
                            <a href="/adm/service/giftcode" class="nav-link">Giftcode</a>
                          </li>
                            <li class="nav-item">
                            <a href="/adm/service/cron" class="nav-link">Cron Auto</a>
                          </li>
                           <li class="nav-item">
                              <a href="/adm/service/website" class="nav-link">Website</a>
                          </li>
                         
                      </ul>
                  </div>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="#navbar-game" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-components">
                      <i class="ni ni-settings-gear-65 text-info"></i>
                      <span class="nav-link-text">Cài đặt mini game</span>
                  </a>
                  <div class="collapse" id="navbar-game">
                      <ul class="nav nav-sm flex-column">
                          <li class="nav-item">
                              <a href="/adm/mini-game/chan-le" class="nav-link">Chẵn lẻ</a>
                          </li>
                          <!-- <li class="nav-item">
                              <a href="/adm/mini-game/tai-xiu" class="nav-link">Tài xỉu</a>
                          </li> -->
                          <li class="nav-item">
                              <a href="/adm/mini-game/chan-le2" class="nav-link">Chẵn Lẻ 2</a>
                          </li>
                          <!-- <li class="nav-item">
                              <a href="/adm/mini-game/tai-xiu2" class="nav-link">Tài Xỉu 2</a>
                          </li> -->
                          <li class="nav-item">
                            <a href="/adm/mini-game/1-phan-3" class="nav-link">1 Phần 3</a>
                          </li>
                          <li class="nav-item">
                            <a href="/adm/mini-game/H3" class="nav-link">H3</a>
                          </li>
                          <li class="nav-item">
                            <a href="/adm/mini-game/tong-3-so" class="nav-link">Tổng 3 Số</a>
                          </li>
                          <li class="nav-item">
                            <a href="/adm/mini-game/doan-so" class="nav-link">Đoán Số</a>
                          </li>
                          <li class="nav-item">
                            <a href="/adm/mini-game/xien" class="nav-link">Xiên</a>
                          </li>
                            <li class="nav-item">
                            <a href="/adm/mini-game/lo" class="nav-link">Lô</a>
                          </li>
                            <li class="nav-item">
                            <a href="/adm/mini-game/g3" class="nav-link">Gấp 3</a>
                          </li>
                          <li class="nav-item">
                            <a href="/adm/mini-game/diem-danh" class="nav-link">Điểm Danh</a>
                          </li>
                          <li class="nav-item">
                            <a href="/adm/mini-game/nhiem-vu-ngay" class="nav-link">Nhiệm Vụ Ngày</a>
                          </li>
                          <li class="nav-item">
                            <a href="/adm/mini-game/top-tuan" class="nav-link">Top Tuần</a>
                          </li>

                      </ul>
                  </div>
              </li>
                                  <li class="nav-item">
                  <a class="nav-link" href="/adm/service/doi-mat-khau">
                      <i class="ni ni-support-16 text-danger"></i>
                      <span class="nav-link-text">Đổi mật khẩu</span>
                  </a>
              </li>
              <!-- </li>
                                  <li class="nav-item">
                  <a class="nav-link" href="/adm/service/doi-mat-khau">
                      <i class="ni ni-support-16 text-danger"></i>
                      <span class="nav-link-text">Đổi mật khẩu</span>
                  </a>
              </li> -->
          </ul>

          </div>
        </div>
      </div>
    </nav>
    <!-- Main content -->
    <div class="main-content" id="panel">
      <!-- Topnav -->
      <nav class="navbar navbar-top navbar-expand navbar-dark border-bottom">
        <div class="container-fluid">
          <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <!-- Navbar links -->
            <ul class="navbar-nav align-items-center ml-md-auto">
              <li class="nav-item d-xl-none">
                <!-- Sidenav toggler -->
                <div class="pr-3 sidenav-toggler sidenav-toggler-dark" data-action="sidenav-pin" data-target="#sidenav-main">
                  <div class="sidenav-toggler-inner">
                    <i class="sidenav-toggler-line"></i>
                    <i class="sidenav-toggler-line"></i>
                    <i class="sidenav-toggler-line"></i>
                  </div>
                </div>
              </li>

            </ul>
            <ul class="navbar-nav align-items-center ml-auto ml-md-0">
              <li class="nav-item dropdown">
                <a class="nav-link pr-0" href="dashboard.html#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <div class="media align-items-center">
                    <span class="avatar avatar-sm rounded-circle">
                      <img alt="Image placeholder" src="/ADMIN/vendor/img/team-4.jpg">
                    </span>
                    <div class="media-body ml-2 d-none d-lg-block">
                      <span class="mb-0 text-sm  font-weight-bold">ADMIIN</span>
                    </div>
                  </div>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                  <div class="dropdown-header noti-title">
                    <h6 class="text-overflow m-0">Welcome!</h6>
                </div>
                 
  <a href="/adm/dang-xuat" class="dropdown-item">
                    <i class="ni ni-bold-right"></i>
                    <span>Đăng xuất</span>
                  </a>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </nav>

<div class="header pb-6">
    <div class="container-fluid">
    <div class="header-body">
        <div class="row align-items-center py-4">
        <div class="col-lg-6 col-7">
            <h6 class="h2 d-inline-block mb-0">Dashboard</h6>

        </div>

        </div>

    </div>
    </div>
</div>
<div class="container-fluid mt--6">
    