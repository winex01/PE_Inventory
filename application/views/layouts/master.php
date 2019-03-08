<?php $this->load->view('layouts/header') ?>
<div class="wrapper">

  <?php $this->load->view('layouts/navbar') ?>
  <?php $this->load->view('layouts/sidebar') ?>

	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
	<!-- Main content -->
	<section class="content">
	  <div class="row">
	    <div class="col-xs-12">

			<?php $this->load->view($page) ?>
	      
	    </div>
	    <!-- /.col -->
	  </div>
	  <!-- /.row -->
	</section>
	<!-- /.content -->
	</div>
	<!-- /.content-wrapper -->

	<?php $this->load->view('layouts/content-footer') ?>
</div>
<!-- ./wrapper -->

<?php $this->load->view('layouts/scripts') ?>

<?php 

switch ($page) {
	case 'user/dashboard':
		$this->load->view('scripts/dashboard');
		break;
		
	case 'user/users':
		$this->load->view('scripts/users');
		break;

	case 'user/equipments':
		$this->load->view('scripts/equipments');
		break;

	case 'user/reports':
		$this->load->view('scripts/reports');
		break;
}

$this->load->view('layouts/footer');



