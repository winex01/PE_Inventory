<header class="main-header">
    <!-- Logo -->
    <a href="#" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><?= lang('system_title_short') ?></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b><?= lang('system_title') ?></b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <span class="hidden-xs"><?= auth('first_name') ?> <?= auth('last_name') ?></span>
              <i class="fa fa-gears"></i>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?= base_url('assets/dist/img/user2-160x160.jpg')  ?>" class="img-circle" alt="User Image">

                <p>
                  <?= auth('first_name') ?> <?= auth('last_name') ?>
                  <small>Member since Nov. 2012</small>
                </p>
              </li>
              <!-- Menu Body -->
              <li class="user-body">
                <div class="row">
                  <div class="col-xs-4 text-center">
                    <a href="#">Lorem</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Ipsum</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Test</a>
                  </div>
                </div>
                <!-- /.row -->
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="<?= base_url('logout')  ?>" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>