<div class="box">
    <div class="box-header">
      <h3 class="box-title"><?= $title ?></h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">

   		<!-- Small boxes (Stat box) -->
	      <div class="row">
	        <?php foreach ($boxes as $box): ?>
	        	<!-- ./col -->
		        <div class="col-lg-3 col-xs-6">
		          <!-- small box -->
		          <div class="small-box <?= $box['color'] ?>">
		            <div class="inner">
		              <h3><?= $box['count'] ?></h3>

		              <p><?= $box['title'] ?></p>
		            </div>
		            <div class="icon">
		            	<i class="fa <?= $box['fa_icon'] ?>" aria-hidden="true"></i>
		            </div>
		            <a href="<?= $box['link'] ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
		          </div>
		        </div>
		        <!-- ./col -->
	        <?php endforeach; ?>
	      </div>
	      <!-- /.row -->

    </div>
    <!-- /.box-body -->
</div>
<!-- /.box -->


