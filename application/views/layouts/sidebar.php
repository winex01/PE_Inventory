<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="<?= base_url('assets/dist/img/user2-160x160.jpg') ?>" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p><?= auth('first_name') ?> <?= auth('last_name') ?></p>
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>
    <!-- search form -->
    <form action="#" method="get" class="sidebar-form">
      <div class="input-group">
        <input type="text" name="q" class="form-control" placeholder="Search...">
            <span class="input-group-btn">
              <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
              </button>
            </span>
      </div>
    </form>
    <!-- /.search form -->
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu">
      <li class="header"><?= lang('main_navigation') ?></li>
      <li class="treeview <?= active('dashboard') ?>">
        <a href="<?= base_url('dashboard') ?>">
          <i class="<?= lang('dashboard_icon') ?>"></i> <span><?= lang('dashboard') ?></span>
        </a>
      </li>
      <li class="treeview <?= active('users') ?>">
        <a href="<?= base_url('users') ?>">
          <i class="<?= lang('users_icon') ?>"></i> <span><?= lang('users') ?></span>
        </a>
      </li>

      <!-- <li class="treeview active"> -->
      <!-- <li class="treeview">
        <a href="#">
          <i class="fa fa-folder"></i> <span>Examples</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="active"><a href="#"><i class="fa fa-circle-o"></i> Blank Page</a></li>
          <li><a href="#"><i class="fa fa-circle-o"></i> Blank Page</a></li>
          <li><a href="#"><i class="fa fa-circle-o"></i> Pace Page</a></li>
        </ul>
      </li> -->
      
      <li class="header">LABELS</li>
      <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Example 1</span></a></li>
      <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Example 2</span></a></li>
      <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Example 3</span></a></li>
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>

