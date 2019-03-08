<div class="box">
    <div class="box-header">
      <h3 class="box-title"><?= $title ?></h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">

      <div class="col-xs-6 col-md-3 col-lg-2">
        <input class="form-control" id="date" type="date" value="<?php echo date_now() ?>">
      </div>
      <div class="col-xs-6 col-md-3 col-lg-2">
        <button type="button" class="btn btn-success" id="print">Print
          <span class="glyphicon glyphicon-print" aria-hidden="true"></span>
        </button>
      </div>


      <div style="margin-bottom: 100px;"></div>


      <table id="table-reports" class="table table-bordered table-striped table-hover">
        <thead>
        <tr>
          <th align="left"><?= lang('student_id') ?></th>
          <th align="left"><?= lang('student_name') ?></th>
          <th align="left" width="15px"><?= lang('student_course') ?></th>
          <th align="left" width="20px"><?= lang('equipment_name') ?></th>
          <th align="left"><?= lang('reason') ?></th>
          <th align="left"><?= lang('date_lost') ?></th>
          <th align="left"><?= lang('date_added') ?></th>
          <th align="left" width="20px;">Qty.</th>
          <th align="left"><?= lang('brand') ?></th>
        </tr>
        </thead>
        <tbody>
        </tbody>
      </table>

    </div>
    <!-- /.box-body -->
</div>
<!-- /.box -->

